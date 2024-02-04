<?php

namespace App\Http\Controllers\site;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CommentReplies;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //Add comment on post function
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => ['required', 'max:255'],
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('message', 'it will be visible after admin approval');
    }


    //Add comment replay on comment
    public function commentreplystore(Request $request, $commentId)
    {
        $request->validate([
            'comment' => ['required','max:255'],
        ]);

        CommentReplies::create([
            'comment_id'    => $commentId,
            'user_id'       => auth()->id(),
            'comment'       => $request->comment,
        ]);
        return redirect()->back()->with('replaymessage', 'it will be visible after admin approval');
    }
}
