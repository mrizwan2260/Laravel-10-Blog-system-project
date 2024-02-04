<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Admin dashboard index page
    public function dashboard()
    {
        $tagCount       = Tag::count();
        $userCount      = User::count();
        $postCount      = Post::count();
        $categoryCount  = Category::count();
        return view('auth.dashboard', compact(
            'tagCount',
            'userCount',
            'postCount',
            'categoryCount',
        ));
    }
}
