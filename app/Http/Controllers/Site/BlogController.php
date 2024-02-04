<?php

namespace App\Http\Controllers\site;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CommentReplies;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //Display single blog page function
    public function blogpage(string $slug)
    {
        $blog           = Post::where('slug', $slug)->firstOrFail();
        // $blog = Post::find($id);
        $categories     = Category::all();
        $latestposts    = Post::where('id', '!=', $blog->id)->latest()->limit(5)->get();
        $tags           = $blog->tags;
        $comments       = Comment::where('post_id', $blog->id)->where('status', 1)->get();
        return view('site.singalblog', compact('blog', 'latestposts', 'categories', 'tags', 'comments'));
    }


    //All post when specific tag clicked
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
