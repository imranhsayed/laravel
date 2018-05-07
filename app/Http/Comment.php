<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];

	public function post() {
		return $this->belongsTo( Post::class );
	}

	public function user() {// $comment->user->name
		return $this->belongsTo( User::class );
	}
}
