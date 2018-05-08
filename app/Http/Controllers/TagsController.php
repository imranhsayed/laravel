<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    function index( Tag $tag ) {
    	$posts = $tag->posts;
    	return view( 'posts.index', compact( 'posts' ) );
    }
}
