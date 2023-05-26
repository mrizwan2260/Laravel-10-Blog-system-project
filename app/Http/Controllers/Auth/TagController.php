<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Tag\CreateRequest as TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('auth.Tags.index',compact('tags'));
    }

    public function create()
    {
        return view('auth.Tags.create');
    }

    public function store(TagCreateRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tag.index')->with('success','Tag Added SuccessFully.');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->back()->with('delete','Tag Delete SuccessFully.');
    }
}
