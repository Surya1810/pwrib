<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.publikasi.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.admin.publikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
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
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $imageName;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('landing')->with(['pesan' => 'Berita berhasil terbit', 'level-alert' => 'alert-success']);
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
        $post = Post::findorfail($id);
        return view('frontend.admin.publikasi.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'      => 'required',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'body'       => 'required',
        ]);

        $post = Post::findOrFail($id);

        $image = $request->file('image');
        if (isset($image)) {
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            // Hapus gambar lama jika ada
            if ($post->image && $post->image !== 'default.png' && Storage::disk('public')->exists('post/' . $post->image)) {
                Storage::disk('public')->delete('post/' . $post->image);
            }

            // Baca dan simpan gambar baru
            $image = Image::read($request->file('image'));
            $imageName = uniqid() . time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = 'post/' . $imageName;
            Storage::disk('public')->put($destinationPath, (string) $image->toWebp(90));
        } else {
            $imageName = $post->image; // gunakan gambar lama jika tidak ada upload baru
        }

        // Update post
        $post->title       = $request->title;
        $post->slug        = Str::slug($request->title);
        $post->image       = $imageName;
        $post->body        = $request->body;
        $post->save();

        return redirect()->route('landing')->with([
            'pesan' => 'Post Berhasil Diperbarui',
            'level-alert' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);

        if ($post->image && Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }

        $post->delete();

        return redirect()->route('landing')->with(['pesan' => 'Berita berhasil dihapus', 'level-alert' => 'alert-danger']);
    }
}
