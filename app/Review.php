<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function created_by(){
    	return $this->belongsTo('App\User', 'created_by');
    }

    public function titleToUrl() {
    	return 'review/' . strtolower(str_replace(' ', '-', $this->title));
    }

    public static function findByUrl($title) {
    	
    	$search = ucfirst(str_replace('-', ' ', $title));
    	return Review::where('title', $search)->first();
    }
}
