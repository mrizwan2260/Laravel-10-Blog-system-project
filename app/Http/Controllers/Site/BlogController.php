<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReplies;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogpage(string $slug)
    {
        $blog = Post::where('slug', $slug)->firstOrFail();
        // $blog = Post::find($id);
        $categories = Category::all();
        $latestposts = Post::where('id', '!=', $blog->id)->latest()->limit(5)->get();
        $tags = $blog->tags;
        $comments = Comment::where('post_id', $blog->id)->where('status', 1)->get();
        return view('site.singalblog', compact('blog', 'latestposts', 'categories', 'tags','comments'));
    }


    public function tagpost(Tag $tag)
    {
        // $tag = Tag::find($id);
        $categories = Category::all();
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag->name); // Access the name property of the $tag object
        })->paginate(8);



        return view('site.tagpost', compact('tag', 'categories', 'posts',));
    }
}
