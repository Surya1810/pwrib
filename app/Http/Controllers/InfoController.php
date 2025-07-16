<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::all();

        return view('backend.informasi.index', compact('infos'));
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
            'judul' => 'required',
            'detail' => 'required',
        ]);

        $info = new Info();
        $info->judul = $request->judul;
        $info->body = $request->detail;
        $info->save();

        return redirect()->route('info.index')->with(['pesan' => 'Informasi berhasil ditambahkan', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'detail' => 'required',
        ]);

        $info = Info::findorfail($id);
        $info->judul = $request->judul;
        $info->body = $request->detail;
        $info->update();

        return redirect()->route('info.index')->with(['pesan' => 'Informasi berhasil diperbarui', 'level-alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $info = Info::findorfail($id);
        $info->delete();

        return redirect()->route('info.index')->with(['pesan' => 'Informasi berhasil dihapus', 'level-alert' => 'alert-danger']);
    }
}
