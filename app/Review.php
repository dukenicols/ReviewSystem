<?php

namespace App;

use App\Vote;
use App\User;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title', 'client', 'url', 'description', 'score', 'user_id', 'review_url'];
    protected $hidden = ['approved', 'user_id', 'created_at', 'updated_at', 'comment_count'];
    protected $appends = ['comment_count'];
    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getAuthorAttribute($value)
    {
        return User::findOrFail($value)->first();
    }


    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getCommentCountAttribute($value)
    {
      return Comment::where('review_id', $this->id)->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'review_id', 'id')->orderBy('comments.created_at', 'desc');
    }

    public function getCommentsAttribute($value)
    {
        return Comment::findOrFail($value)->get();
    }

    public function getCreatedAtAttribute($value)
    {
        $dt = new Carbon($value);
        return $dt->toIso8601String();
    }



}
