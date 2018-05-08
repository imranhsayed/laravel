<?php

namespace App\Repositories;

use App\Post;

class Posts {
	function all() {
		return Post::all();
	}
}