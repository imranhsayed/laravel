<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
use \App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    view()->composer( 'layouts.sidebar', function ( $view ) {
			// Will return all archives data provide it under the var $archives
	    	$archives = \App\Post::archives();
		    // Will return all the names of the only tags which have posts associated with them and provide it under the var $tags
	    	$tags = \App\Tag::has('posts')->pluck( 'name' );

		    // Will make the $archives available to sidebar.blade.php
	    	$view->with( compact( 'archives' ) );
		   // Will make $tags available to sidebar.blade.php
	    	$view->with( compact( 'tags' ) );
	    } );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
