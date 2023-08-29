<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Review;
use App\Models\Message;
use App\Models\Wishlist;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    //show the register user form page
    public function create()
    {
        return view('users.register');
    }

    //store our infos in the db
    public function store(Request $request)
    {
        // First validation for main fields
        $mainFields = $request->validate([
            'userName' => ['required', 'min:3', 'max:16'],
            'userLocation' => ['required', 'min:3'],
            'userPhone' => ['required', 'min:9'],
            'paymentInfo' => ['required', Rule::in(['Card', 'PayPal', 'GooglePay', 'ApplePay'])],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        // Second validation only for image
        $imageFields = $request->validate([
            'userImage' => ['image', 'max:2048'], // Limiting to 2MB
        ]);

        // Checking and storing the image if it's there
        if ($request->hasFile('userImage')) {
            $imageFields['userImage'] = $request->file('userImage')->store('images', 'public');
        }

        // Merging the two validations
        $formFields = array_merge($mainFields, $imageFields);

        // Hashing the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Setting default values for the new user
        $formFields['banUser'] = false;
        $formFields['role'] = 'basic_user';
        $formFields['dateJoined'] = now();
        $formFields['userRating'] = 3;

        // Creating the new user
        $user = User::create($formFields);

        // Log the user in
        auth()->login($user);

        // Redirecting to the homepage
        return redirect('/')->with('message', 'User created and logged in');
    }

    //Logout user
    public function logout(Request $request)
    {
        //log user out
        auth()->logout();

        //this will remove the authentication info from our session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //log user in
    public function login()
    {
        return view('users.login');
    }

    //authenticate the user so the log in can happen
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //attempt() tries to match the content of $formFields to a user in the table
        //if it found a matching user, it will log in automatically
        if (auth()->attempt($formFields)) {
            //generate a new session (to store the logged user data)
            $request->session()->regenerate();

            //redirect to homepage with a confirmation message
            return redirect('/')->with('message', 'You are now logged in');
        }

        //go back to login form with error message for 'email' field
        //withErrors() allows to pass an error message instead of a flash message
        return back()->withErrors(['email' => 'Invalid credencials...']);
    }

    //manage user for edit profile
    public function manage()
    {
        $user = auth()->user();
        return view('users.edit', ['user' => $user]);
    }

    //dashboard for all the user informations and items/transactions/ messages/etc...
    public function dashboard()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Load user's wishlist items using the wishlist relationship
        $wishlistItems = $user->wishlist;

        // Load user's selling items
        $sellingItems = $user->sellerItems;

        // Load user's selling transactions
        $sellingTransactions = Transaction::where('sellerUser_id', $user->id)
            ->with('item')
            ->get();

        // Load user's buying transactions
        $buyingTransactions = Transaction::where('buyerUser_id', $user->id)
            ->with('item')
            ->get();

        // Load user's messages with sender information
        $messagesSented = Message::where('senderUser_id', $user->id)
            ->with(['receiver', 'item'])
            ->get();

        // Load user's messages with receiver information
        $messagesReceived = Message::where('receiverUser_id', $user->id)
            ->with(['sender', 'item'])
            ->get();

        // Load user's notifications
        $notifications = Notification::where('user_id', $user->id)
            ->with(['sender', 'item', 'typeNotification'])
            ->get();

        // Load user's reviews as reviewer 
        $reviewsGiven = Review::where('reviewer_id', $user->id)->get();

        // Load user's reviews as reviewed 
        $reviewsReceived = Review::where('reviewed_id', $user->id)->get();

        // Pass all this data to the dashboard view
        return view('users.dashboard', compact(
            'user',
            'wishlistItems',
            'sellingItems',
            'sellingTransactions',
            'buyingTransactions',
            'messagesSented',
            'messagesReceived',
            'notifications',
            'banUser',
            'reviewsGiven',
            'reviewsReceived'
        ));
    }
    
    //edit the logged in form
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    //update a logged in user infos in the db
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'userName' => 'required|string|max:255',
            'userImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'userLocation' => 'required|string|max:255',
            'userPhone' => 'required|string|max:255',
            'paymentInfo' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('userImage')) {
            $userImage = $request->file('userImage')->store('images/users', 'public');
            $user->userImage = $userImage;
        }

        $user->userName = $request->userName;
        $user->userLocation = $request->userLocation;
        $user->userPhone = $request->userPhone;
        $user->paymentInfo = $request->paymentInfo;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('dashboard')->with('message', 'Profile updated successfully.');
    }
    
}
