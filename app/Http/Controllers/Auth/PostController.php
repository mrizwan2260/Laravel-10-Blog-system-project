<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\CreatePost;
use App\Http\Requests\Auth\Post\UpdateRequest;
use App\Http\Requests\Auth\Category\CreateRequest;

class PostController extends Controller
{
    //Admin post index page
    public function index()
    {
        $posts = Post::latest()->get();
        return view('auth.Posts.index', compact('posts'));
    }


    //Create post page
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $tags       = Tag::orderBy('name', 'ASC')->get();
        return view('auth.Posts.create', compact(['categories', 'tags']));
    }


    //Store post function
    public function store(CreatePost $request)
    {
        try {
            DB::beginTransaction();

            if ($file       = $request->file('image')) {
                $fileName   = $this->uploadfile($file);
                $gallery    = $this->storeimage($fileName);
            }

            //Post store in database
            $post = Post::create([
                'user_id'       => Auth::user()->id,
                'gallery_id'    => $gallery->id,
                'title'         => $request->title,
                'description'   => $request->description,
                'status'        => $request->is_publish,
                'category_id'   => $request->category,
            ]);

            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }

            DB::commit();

        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->withErrors($ex->getMessage());
        }
        return to_route('post.index')->with('success', 'Post Created SuccessFully.');
    }


    //Edit post page function
    public function edit($id)
    {
        $post       = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        return view('auth.Posts.edit', compact('post', 'categories', 'tags'));
    }


    //Update post function
    public function update(UpdateRequest $request, $id)
    {
        $post = Post::find($id);

        if ($file = $request->file('image')) {
            $oldimage = $post->gallery->image;
            $imageName = null;
            if ($post->gallery) {
                $imageName = $post->gallery->image;
                $imagePath = public_path('/storage/auth/posts/');

                if (file_exists($imagePath . $imageName)) {
                    unlink($imagePath . $imageName);
                }
            }
            $fileName = $this->uploadfile($file);
            $post->gallery->update([
                'image' => $fileName
            ]);

            File::delete(public_path() . '/storage/auth/posts/' . $oldimage);
        }

        // Remove existing tags before attaching the updated tags
        $post->tags()->detach();

        //Update post
        $post->update([
            'user_id'       => auth()->id(),
            'title'         => $request->title,
            'slug'          => $request->slug,
            'description'   => $request->description,
            'status'        => $request->is_publish,
            'category_id'   => $request->category,
        ]);

        // Attach the new tags
        $post->tags()->attach($request->tags);
        return redirect()->route('post.index')->with('success', 'Post Updated Successfully.');
    }


    //Delete post before detach tags, delete comment and delete image.
    public function delete($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->comment()->delete();
        File::delete(public_path() . '/storage/auth/posts/' . $post->gallery->image);
        $post->delete();

        return redirect()->back()->with('delete', 'Post Deleted SuccessFully.');
    }

    //Upload image function
    private function uploadfile($file)
    {
        $fileName = rand(100, 1000) . time() . $file->getClientOriginalName();
        $filePath = public_path('/storage/auth/posts/');
        $file->move($filePath, $fileName);
        return $fileName;
    }

    //Image store
    private function storeimage($fileName)
    {
        $gallery = Gallery::create([
            'image' => $fileName,
            'type'  => Gallery::POST_IMAGE,
        ]);
        return $gallery;
    }
}
