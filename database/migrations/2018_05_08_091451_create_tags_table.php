<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'name' )->unique();
            $table->timestamps();
        });

	    Schema::create('post_tags', function (Blueprint $table) {
	    	$table->integer( 'post_id' );
	    	$table->integer( 'tag_id' );
		    $table->primary( ['post_id', 'tag_id'] ); // ensures that combination of post id and tag id ( e.g. 12 ) should be unique
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
	    Schema::dropIfExists('post_tags');
    }
}
