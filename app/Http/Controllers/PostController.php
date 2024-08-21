<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('backend.post.created', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        return view('backend.post.create', compact('categories', 'tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            $image = Image::read($request->file('image'));

            // Main Image Upload on Folder Code
            $imageName = uniqid() . time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = 'post/' . $imageName;
            // Simpan gambar ke disk 'public'
            Storage::disk('public')->put($destinationPath, (string) $image->toWebp(90));
        } else {
            $imageName = "default.png";
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $imageName;
        $post->body = $request->body;
        $post->category_id = $request->categories;
        $post->is_approved = false;
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with(['pesan' => 'Post created successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            //delete old post image
            if (Storage::disk('public')->exists('post/' . $post->image)) {
                Storage::disk('public')->delete('post/' . $post->image);
            }

            $image = Image::read($request->file('image'));

            // Main Image Upload on Folder Code
            $imageName = uniqid() . time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = 'post/' . $imageName;
            // Simpan gambar ke disk 'public'
            Storage::disk('public')->put($destinationPath, (string) $image->toWebp(90));
        } else {
            $imageName = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $imageName;
        $post->body = $request->body;
        $post->category_id = $request->categories;
        $post->is_approved = false;
        $post->update();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with(['pesan' => 'Post Updated successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->route('posts.index')->with(['pesan' => 'Post deleted successfully', 'level-alert' => 'alert-danger']);
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('backend.post.trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('posts.index')->with(['pesan' => 'Post restored successfully', 'level-alert' => 'alert-success']);
    }

    public function kill(Post $post, $id)
    {
        if (Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->category()->detach();
        $post->tags()->detach();
        $post->forceDelete();

        return redirect()->route('posts.index')->with(['pesan' => 'Post deleted successfully', 'level-alert' => 'alert-danger']);
    }
}
