<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReplies extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'user_id', 'comment'];

    //Relation of comment and comment replay
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }


    //Relation of user and comment replay
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
