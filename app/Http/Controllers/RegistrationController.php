<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeAgain;
use Illuminate\Http\Request;
use App\User;
use \App\Mail\Welcome;

class RegistrationController extends Controller
{
    function create() {
    	return view( 'registration.create' );
    }

    function store() {
    	// Validate the form
	    $this->validate( request(), [
		    'name' => 'required',
		    'email' => 'required|email',
		    'password' => 'required|confirmed', // tells laravel that the password should also match the field password_confirmed otherwise throw an error.
	    ] );

	    // Create and save the user. If you don't bcrypt the password , login functionality may not work
	    $user = User::create( ['name' => request()->name, 'email' => request()->email, 'password' => bcrypt( request()->password ) ] );

	    // Sign them in
	    auth()->login( $user );

	    // Send a new mail. $user variable will be available in Mail/Welcome.php
	    \Mail::to( $user )->send( new WelcomeAgain( $user ) ); // Here to() will extract the email address from the $user , by using the instance of Welcome class and inside the welcome.php we are loading the view file welcome.blade.php

	    // Sets a session value for 'message' key to 'Thank...' which can then be accessible on the page its redirected to .
		session()->flash( 'message', 'Thank you for signing up' );

	    // Redirect to user to the home page once signed in
		return redirect( '/posts' );
    }
}
