<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags',
        ]);


        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return redirect()->route('categories.index')->with(['pesan' => 'Tag created successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags',
        ]);


        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->update();

        return redirect()->route('categories.index')->with(['pesan' => 'Tag updated successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('categories.index')->with(['pesan' => 'Tag deleted successfully', 'level-alert' => 'alert-danger']);
    }
}
