<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Anggota;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    //Beranda
    public function beranda()
    {
        $latest = Post::latest()->take(3)->get();
        $beritas = Post::latest()->skip(3)->take(60)->paginate(6);
        $agendas = Agenda::all();

        return view('frontend.beranda.index',  compact('latest', 'beritas', 'agendas'));
    }

    public function detail_berita($slug)
    {
        $latest = Post::latest()->take(3)->get();
        $news = Post::where('slug', $slug)->first();

        return view('frontend.beranda.detail',  compact('latest', 'news'));
    }

    public function tentang()
    {
        return view('frontend.beranda.tentang');
    }

    public function pengurus()
    {
        return view('frontend.beranda.pengurus');
    }

    public function pendaftaran_pengurus()
    {
        return view('frontend.pendaftaran.pengurus');
    }

    public function formulir_dpd()
    {
        $filePath = public_path('assets/files/Form Daftar DPD.docx');

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Unduh file
        return response()->download($filePath, 'Form Daftar DPD.docx');
    }

    public function formulir_dpc()
    {
        $filePath = public_path('assets/files/Form Daftar DPC Kota Kabupaten.docx');

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Unduh file
        return response()->download($filePath, 'Form Daftar DPC Kota Kabupaten.docx');
    }

    public function formulir_anggota()
    {
        $filePath = public_path('assets/files/Form Daftar Anggota.docx');

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Unduh file
        return response()->download($filePath, 'Form Daftar Anggota.docx');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'jenis' => 'required',
            'file'  => 'required|file|mimes:zip|max:10240',
        ]);

        $file = $request->file('file');
        $fileName = uniqid() . time() . '-' . $file->getClientOriginalName();
        $filePath = 'uploads/' . $fileName;

        // Pastikan folder uploads/ ada
        if (!Storage::disk('public')->exists('uploads')) {
            Storage::disk('public')->makeDirectory('uploads');
        }

        // Simpan file ZIP ke disk 'public'
        Storage::disk('public')->putFileAs('uploads', $file, $fileName);

        File::create([
            'nama' => $validated['name'],
            'phone' => $validated['phone'],
            'jenis' => $validated['jenis'],
            'file' => $filePath,
        ]);

        return redirect()->back()->with(['pesan' => 'Pendaftaran Berhasil, Menunggu Proses', 'level-alert' => 'alert-success']);
    }

    public function agenda()
    {
        $agendas = Agenda::all();

        return view('frontend.beranda.agenda', compact('agendas'));
    }

    public function anggota()
    {
        $anggotas = Anggota::all();

        return view('frontend.beranda.anggota', compact('anggotas'));
    }

    public function pendaftaran_anggota()
    {
        return view('frontend.pendaftaran.anggota');
    }

    public function kontak()
    {
        return view('frontend.beranda.kontak');
    }
}
