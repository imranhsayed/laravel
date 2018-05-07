<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    static function scopeInComplete( $query ) {
    	return $query->where('complete',0);
    }
}
