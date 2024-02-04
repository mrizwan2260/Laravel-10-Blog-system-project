<?php

namespace App\Http\Controllers\site;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Display post on home page function
    public function index()
    {
        $posts      = Post::where('status', 1)->latest()->paginate(8);
        $categories = Category::orderby('name', 'ASC')->get();
        return view('site.index', compact('posts', 'categories'));
    }

    //Display specific category wise
    public function categorypost(Category $category)
    {
        $categories     = Category::orderby('name', 'ASC')->get();
        $category_posts = Post::where('category_id', $category->id)->where('status', 1)->latest()->paginate(8);
        return view('site.categorypost', compact('categories', 'category_posts', 'category'));
    }
}
