<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

	    // Redirect to user to the home page once signed in
		return redirect( '/posts' );
    }
}
