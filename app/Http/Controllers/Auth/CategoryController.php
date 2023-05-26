<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Category\CreateRequest as CategoryCreateRequest;
use App\Http\Requests\Category\CreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('auth.Categories.index',compact('categories'));
    }

    public function create()
    {
        return view('auth.Categories.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success','Category Added Successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('delete','SuccessFully Delete Category');
    }
}
