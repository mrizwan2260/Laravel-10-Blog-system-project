<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'comment', 'status'];

    //Relation of post and comment
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //Relation of user and comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relation of comment replay and comment
    public function replies()
    {
        return $this->hasMany(CommentReplies::class);
    }
}
