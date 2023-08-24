<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\Message;

class UserController extends Controller
{

    //show the register user form page
    public function create(){
        return view('users.register');
    }

    //store our infos in the db
    public function store(Request $request){
        $formFields = $request->validate([
            'userName' => ['required', 'min:3'],
            'userLocation' => ['required', 'min:3'],
            'userPhone' => ['required', 'min:9'],
            'paymentInfo' => ['required', Rule::in(['Card', 'PayPal', 'GooglePay', 'ApplePay'])],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
            //mixedCase - at least one uppercase and one lowercase
            //numbers - at least one number
            //symbols - at least one symbol
        ]);

        //make sure the image is here before saving it
        if ($request->hasFile('userImage')) {
            $formFields['userImage'] = $request->file('userImage')->store('images', 'public');
        }

        //hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //afect the now() date 
        $formFields['dateJoined'] = now();

        //afect the users rating in 3 to begin, then it will increase/ decrease with other users reviews
        $formFields['userRating'] = 3;

        //create the new user
        $user=User::create($formFields);

        //using auth() helper handles all the login/logout process for us
        auth()->login($user); 
        //so the user that just finished the register form do not have to login again, he will stay in his account right after the register

        //when the user is created and logged in, we'll show them the homepage so they can start navigate the website
        return redirect('/')->with('message', 'User created and logged in');
    }

    //Logout user
    public function logout(Request $request){
        //log user out
        auth()->logout();

        //this will remove the authentication info from our session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //attempt() tries to match the content of $formFields to a user in the table
        //if it found a matching user, it will log in automatically
        if(auth()->attempt($formFields)){
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
        return view('users.edit', ['user'=> $user]);
    }
 
    //edit form
    public function edit(User $user)
    {
        return view('users.edit', ['user'=> $user]);
    }

    //update the new data in the db
    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'userName' => ['required', 'min:3'],
            'userLocation' => ['required', 'min:3'],
            'userPhone' => ['required', 'min:9'],
            'paymentInfo' => ['required', Rule::in(['Card', 'PayPal', 'GooglePay', 'ApplePay'])],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        if ($request->hasFile('userImage')) {
            $formFields['userImage'] = $request->file('userImage')->store('images', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        //update the user
        $user->update($formFields);

        return redirect('/users/' . $user->id . '/edit')->with('message', 'Profile updated successfully');
    }

    public function dashboard()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Load user's wishlist items
        $wishlistItems = Wishlist::where('user_id', $user->id)->with('item')->get();

        // Load user's selling items
        $sellingItems = $user->sellerItems;

        // Load user's buying and selling history (transactions)
        $transactions = Transaction::where('buyerUser_id', $user->id)
            ->orWhere('sellerUser_id', $user->id)
            ->with('item')
            ->get();

       // Load user's buying transactions
        $buyingTransactions = Transaction::where('buyerUser_id', $user->id)
            ->with('item')
            ->get();
            
        // Load user's messages with sender and receiver information
        $messages = Message::where('senderUser_id', $user->id)
            ->orWhere('receiverUser_id', $user->id)
            ->with(['sender', 'receiver', 'item'])
            ->get();

        // Load user's notifications
        $notifications = Notification::where('user_id', $user->id)
            ->with(['sender', 'item'])
            ->get();

        // Load user's reviews as reviewer and reviewed
        $reviewsGiven = Review::where('reviewer_id', $user->id)->get();
        $reviewsReceived = Review::where('reviewed_id', $user->id)->get();

        // You can now pass all this data to your dashboard view
        return view('users.dashboard', compact(
            'user',
            'wishlistItems',
            'sellingItems',
            'transactions',
            'messages',
            'notifications',
            'reviewsGiven',
            'reviewsReceived'
        ));
    }

    public function storeRating(Request $request, User $user) {
        // Assuming the rating value is provided in the request
        $newRating = $request->input('rating');
    
        // Update the user's rating based on the new rating value
        $user->updateRating($newRating);
    
        // Create the review record and save it
        $review = new Review([
            'reviewer_id' => auth()->user()->id,
            'reviewed_id' => $user->id,
            'rating' => $newRating,
            'comment' => $request->input('comment'),
        ]);
        $review->save();
    
        return redirect()->back()->with('message', 'Rating and review submitted.');
    }

    
}


