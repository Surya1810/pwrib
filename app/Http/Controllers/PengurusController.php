<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $penguruses = Pengurus::all();

        // return view('backend.pengurus.index', compact('penguruses'));
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
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'jabatan' => 'required',
        //     'photo' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        // ]);

        // $image = $request->file('photo');
        // if (isset($image)) {
        //     if (!Storage::disk('public')->exists('photo')) {
        //         Storage::disk('public')->makeDirectory('photo');
        //     }

        //     $image = Image::read($request->file('photo'));

        //     // Main Image Upload on Folder Code
        //     $imageName = uniqid() . time() . '-' . $request->file('photo')->getClientOriginalName();
        //     $destinationPath = 'photo/' . $imageName;
        //     // Simpan gambar ke disk 'public'
        //     Storage::disk('public')->put($destinationPath, (string) $image->toWebp(90));
        // } else {
        //     $imageName = "default.png";
        // }

        // $pengurus = new Pengurus();
        // $pengurus->nama = $request->nama;
        // $pengurus->jabatan = $request->jabatan;
        // $pengurus->photo = $imageName;
        // $pengurus->save();

        // return redirect()->route('pengurus.index')->with(['pesan' => 'Pengurus berhasil ditambahkan', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengurus $pengurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'jabatan' => 'required',
        //     'photo' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        // ]);

        // $pengurus = Pengurus::findorfail($id);
        // if ($request->hasFile('photo')) {
        //     if (!Storage::disk('public')->exists('photo')) {
        //         Storage::disk('public')->makeDirectory('photo');
        //     }

        //     //delete old post image
        //     if (Storage::disk('public')->exists('photo/' . $pengurus->photo)) {
        //         Storage::disk('public')->delete('photo/' . $pengurus->photo);
        //     }

        //     $image = Image::read($request->file('photo'));

        //     // Main Image Upload on Folder Code
        //     $imageName = uniqid() . time() . '-' . $request->file('photo')->getClientOriginalName();
        //     $destinationPath = 'photo/' . $imageName;
        //     // Simpan gambar ke disk 'public'
        //     Storage::disk('public')->put($destinationPath, (string) $image->toWebp(90));
        // } else {
        //     $imageName = $pengurus->photo;
        // }

        // $pengurus->photo = $imageName;
        // $pengurus->nama = $request->nama;
        // $pengurus->jabatan = $request->jabatan;
        // $pengurus->update();

        // return redirect()->route('pengurus.index')->with(['pesan' => 'Pengurus berhasil diperbarui', 'level-alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = File::findorfail($id);

        if ($file->file && Storage::disk('public')->exists($file->file)) {
            Storage::disk('public')->delete($file->file);
        }

        $file->delete();

        return redirect()->route('pengurus.pendaftaran')->with(['pesan' => 'Pendaftaran Berhasil Dihapus', 'level-alert' => 'alert-danger']);
    }

    public function pendaftaran()
    {
        $datas = File::whereIn('jenis', ['dpd', 'dpc'])->get();

        return view('backend.pengurus.pendaftaran', compact('datas'));
    }

    public function approve($id)
    {
        $post = File::findorfail($id);
        $post->status = true;
        $post->update();

        return redirect()->route('pengurus.pendaftaran')->with(['pesan' => 'Pengurus Diterima', 'level-alert' => 'alert-success']);
    }
}
