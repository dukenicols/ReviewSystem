<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['review_id', 'user_id', 'text'];

    protected $hidden = ['updated_at', 'id', 'review_id', 'user_id', 'id'];


    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getAuthorAttribute($value)
    {
    	return User::findOrFail($value)->first();
    }

    public function getCreatedAtAttribute($value)
    {
    	$dt = new Carbon($value);
    	return $dt->toIso8601String();
    }
}
