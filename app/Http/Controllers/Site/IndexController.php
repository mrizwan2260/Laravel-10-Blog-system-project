<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->latest()->paginate(8);
        $categories = Category::orderby('name','ASC')->get();
        return view('site.index', compact('posts','categories'));
    }

    public function categorypost(Category $category)
    {
        // $category = Category::find($id);
        $categories = Category::orderby('name','ASC')->get();
        $category_posts = Post::where('category_id', $category->id)->where('status', 1)->latest()->paginate(8);
        return view('site.categorypost',compact('categories','category_posts','category'));
    }
}
