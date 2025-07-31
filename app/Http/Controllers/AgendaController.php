<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all();
        $pengurus = Pengurus::all();

        return view('backend.agenda.index', compact('agendas', 'pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'penyelenggara' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'lokasi' => 'required',
        ]);

        $agenda = new Agenda();
        $agenda->penyelenggara = $request->penyelenggara;
        $agenda->nama = $request->name;
        $agenda->tanggal = $request->date;
        $agenda->jam = $request->time;
        $agenda->lokasi = $request->lokasi;
        $agenda->detail = $request->detail;
        $agenda->save();

        return redirect()->route('agenda')->with(['pesan' => 'Agenda berhasil ditambahkan', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'penyelenggara' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'lokasi' => 'required',
        ]);

        $agenda = Agenda::findorfail($id);
        $agenda->penyelenggara = $request->penyelenggara;
        $agenda->nama = $request->name;
        $agenda->tanggal = $request->date;
        $agenda->jam = $request->time;
        $agenda->lokasi = $request->lokasi;
        $agenda->detail = $request->detail;
        $agenda->update();

        return redirect()->route('agenda')->with(['pesan' => 'Agenda berhasil diperbarui', 'level-alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agenda = Agenda::findorfail($id);
        $agenda->delete();

        return redirect()->route('agenda')->with(['pesan' => 'Agenda berhasil dihapus', 'level-alert' => 'alert-danger']);
    }
}
