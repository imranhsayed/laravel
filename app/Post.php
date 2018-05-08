<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments() {
    	return $this->hasMany( Comment::class ); // Comment::class is equivalent to 'App\Comment'
    }

    public function user() { // will give access to $comment->post->user
    	return $this->belongsTo( User::class );
    }

    public function addComments( $body ) {

	    Comment::create([
		    'body'=> request( 'body' ),
		    'post_id' => $this->id,
		    'user_id' => 1,
	    ]);
    }

    static function archives() {
	    return static::selectRaw( 'year(created_at) year, monthname(created_at) month, count(*) published'  )
		    ->groupBy( 'year', 'month' )  // Groups it by month and year
		    ->orderByRaw( 'min(created_at) desc' ) // Orders then by created at means the latest first
		    ->get()       // Get all data
		    ->toArray();  // convert the object into an array
    }

    public function tags() {
    	// Any post can have many tags and Any tags may be applied to many posts ( many to many relationship )
	    $this->belongsToMany( Tag::class );
    }
}
