<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReplies;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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

    public function commentreplystore(Request $request, $commentId)
    {
        $request->validate([
            'comment' => ['required','max:255'],
        ]);

        CommentReplies::create([
            'comment_id' => $commentId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('replaymessage', 'it will be visible after admin approval');
    }
}
