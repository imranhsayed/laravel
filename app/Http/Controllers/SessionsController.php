<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	function __construct() {
		// This will ensure the rest of the methods are executed in the class only if the user is not signed in , except the destroy method.
		$this->middleware( 'guest', ['except'=> 'destroy'] );
	}

	function create() {
    	return view( 'sessions.create' );
    }

    function store() {
	    /**
	     * Attempt to authenticate the user.
	     * This function will return true and automatically sign the user if the user with given  email and password exists.
	     */
	    $user_exits = auth()->attempt( request([ 'email', 'password' ]) );
	    if ( ! $user_exits ) {
		    return back()->withErrors(['message'=>'error']);
	    } else {
		    return redirect( '/' );
	    }
    }

    function destroy() {
    	// Logs the user out.
		auth()->logout();
		return redirect( url( '/posts' ) );
    }
}
