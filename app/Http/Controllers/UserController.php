<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //show the register user form
    public function create(){
        return view('users.register');
    }

    //store the new user created in the db
    public function store(Request $request){
        $formFields = $request->validate([
            'userName' => ['required', 'min:3'],
            'userLocation' => ['required', 'min:3'],  
            'userRating'=> ['required', 'numeric'],   
            'userPhone' => ['required', 'min:9'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
            //mixedCase - at least one uppercase and one lowercase
            //numbers - at least one number
            //symbols - at least one symbol
        ]);

        // Set the registration date to the current date and time
        $formFields['dateJoined'] = now();

        // Provide a value for userRating
        $formFields['userRating'] = 3;

        //make sure the image is here before saving it
         if ($request->hasFile('userImage')) {

            $formFields['userImage'] = $request->file('userImage')->store('images', 'public');
        } 

        //hash the password using bcrypt function that will encrypt the value
        $formFields['password'] = bcrypt($formFields['password']);

        //create the new user
        $user=User::create($formFields);

        //using auth() helper handles all the login/logout process for us
        auth()->login($user); 
        //so the user that just finished the register form do not have to login again, he will stay in his account right after the register

        //when the user is created and logged in, we'll show them the homepage so they can start navigate the website
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

    //login method
    public function login()
    {
        return view('users.login');
    }

    //authenticate method, it sees if the fields are valide
    public function authenticate(Request $request)
    {
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
        //we do not write the exact error message to prevent people spamming random emails to find out which ones are used
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
            'dateJoined' => ['required', 'date'],
            'userLocation' => ['required', 'min:3'],
            'userRating' => ['required', 'numeric'],        
            'userPhone' => ['required', 'numeric'],
            'paymentInfo' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        if ($request->hasFile('userImage')) {
            $formFields['userImage'] = $request->file('userImage')->store('images', 'public');
        }

        //update the user
        $user->update($formFields);

        return redirect('/users/' . $user->id . '/edit')->with('message', 'Profile updated successfully');
    }
}

