<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
	function store( Post $post ) {

		$this->validate( request(), ['body'=> 'required|min:2'] );
		$post->addComments( request( 'body' ) );
    	return back();
    }
}
