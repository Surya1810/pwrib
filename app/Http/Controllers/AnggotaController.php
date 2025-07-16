<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::all();

        return view('backend.keanggotaan.index', compact('anggotas'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
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

        return redirect()->route('anggota.pendaftaran')->with(['pesan' => 'Pendaftaran Berhasil Dihapus', 'level-alert' => 'alert-danger']);
    }

    public function pendaftaran(Anggota $anggota)
    {
        $datas = File::where('jenis', 'anggota')->get();

        return view('backend.keanggotaan.pendaftaran', compact('datas'));
    }

    public function approve($id)
    {
        $post = File::findorfail($id);
        $post->status = true;
        $post->update();

        return redirect()->route('anggota.index')->with(['pesan' => 'Anggota Diterima', 'level-alert' => 'alert-success']);
    }
}
