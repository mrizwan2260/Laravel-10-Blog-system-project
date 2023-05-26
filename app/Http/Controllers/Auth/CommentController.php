<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReplies;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('auth.Comment.commentindex', compact('comments'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->status = $request->status;
        $comment->save();

        return redirect()->back()->with('success','Comment Updated SuccessFully.');
    }

    public function commentdestroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->with('delete','Delete Comment SuccessFully');
    }


    public function replayindex()
    {

        $commentreplies = Comment::join('comment_replies', 'comments.id', '=', 'comment_replies.comment_id')
    ->get();

        return view('auth.CommentReplay.commentreplayindex', compact('commentreplies'));
    }

    public function replayupdate(Request $request, $id)
    {
        $commentreplies = CommentReplies::find($id);
        $commentreplies->status = $request->status;
        $commentreplies->save();

        return back()->with('success','Update Status SuccessFully');
    }

    public function destroy($id)
    {
        $commentreply = CommentReplies::find($id);
        $commentreply->delete();

        return back()->with('delete','Delete Comment Reply SuccessFully');
    }
}
