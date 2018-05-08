<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class PostsController extends Controller
{

	function __construct() {
		// This would ensure all the views except the views returned by index() and show() will only display if the user is signed in
		$this->middleware( 'auth' )->except( 'index', 'show' );
	}

	function index() {
//    	$posts = Post::all();
    	$posts = Post::latest();

    	// If the url ( get request ) contains 'month', then filter the posts by that month
    	if ( $month = request( 'month' ) ) {
    		$posts->whereMonth( 'created_at', Carbon::parse( $month )->month ); // Here Carbon::parse( $month )->month will convert string 'january' to no. 1 and 'April' to 4 etc
    	}

		// If the url ( get request ) contains 'year', then filter the posts by that year
    	if ( $year = request( 'year' ) ) {
    		$posts->whereYear( 'created_at', $year );
    	}

		$posts = $posts->get();

    	// Get the post data ( year, month and published(count) ) by month and year.
//    	$archives = Post::archives();

    	return view( 'posts.index', compact( 'posts' ) );
    }

	public function create() {
    	return view( 'posts.create' );
	}

	public function store(Request $request) { // When user lands to base_url/posts via form's post request , store() is called.
		/**
		 * Create a new post using request data.
		 * Save it to the database.
		 * Then redirect it to the home page.
		 */

//		dd( request()->all() );
		// Create a new post using request data.
//		$post = new Post;
//		$post->title = request( 'title' );
//		$post->body = request( 'body' );
//
//		// Save it to the database.
//		$post->save();
		$this->validate( request(), [
			'title' => 'required',
			'body' => 'required'
		] );
		Post::create( [
			'title' => request( 'title' ),
			'body' => request( 'body' ),
//			'user_id' => auth()->user()->id, // or
			'user_id' => auth()->id(), // will get the currently logged in user id
		] );

		// Sets a session value for 'message' key to 'Thank...' which can then be accessible on the page its redirected to .
		session()->flash( 'message', 'Your post has been published' );

		// Then redirect it to the home page.
		$url = url('posts/', $parameters = [], $secure = null);
		return redirect( $url );

	}
	public function show( Post $post ){
    	return view( 'posts.show', compact( 'post' ) );
	}
	public function edit($id){}
	public function update(Request $request, $id){}
	public function destroy($id){}
}
