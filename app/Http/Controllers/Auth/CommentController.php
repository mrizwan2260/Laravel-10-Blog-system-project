<?php

namespace App\Http\Controllers\Auth;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CommentReplies;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    ////Admin comment index page
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('auth.Comment.commentindex', compact('comments'));
    }


    //Comment approve function
    public function update(Request $request, $id)
    {
        $comment         = Comment::find($id);
        $comment->status = $request->status;
        $comment->save();
        return redirect()->back()->with('success', 'Comment Updated SuccessFully.');
    }


    //Comment delete function
    public function commentdestroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('delete', 'Delete Comment SuccessFully');
    }


    //Comment replay index page
    public function replayindex()
    {
        $commentreplies = Comment::join('comment_replies', 'comments.id', '=', 'comment_replies.comment_id')->get();
        return view('auth.CommentReplay.commentreplayindex', compact('commentreplies'));
    }


    //Comment replay approve function
    public function replayupdate(Request $request, $id)
    {
        $commentreplies = CommentReplies::find($id);
        $commentreplies->status = $request->status;
        $commentreplies->save();
        return back()->with('success', 'Update Status SuccessFully');
    }


    //Comment replay delete function
    public function destroy($id)
    {
        $commentreply = CommentReplies::find($id);
        $commentreply->delete();

        return back()->with('delete', 'Delete Comment Reply SuccessFully');
    }
}
