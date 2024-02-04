<?php

namespace App\Http\Controllers\Auth;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Auth\Category\CreateRequest as CategoryCreateRequest;

class CategoryController extends Controller
{
    //Admin category index page
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('auth.Categories.index', compact('categories'));
    }


    //Create Categpry
    public function create()
    {
        return view('auth.Categories.create');
    }


    //Store category function
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index')->with('success', 'Category Added Successfully.');
    }


    //Delete category function
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('delete', 'SuccessFully Delete Category');
    }
}
