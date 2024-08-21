<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PageController extends Controller
{
    //Beranda
    public function beranda()
    {
        return view('frontend.beranda.index');
    }

    //Profil
    public function sejarah()
    {
        return view('frontend.profil.sejarah');
    }
    public function visi_misi()
    {
        return view('frontend.profil.visi_misi');
    }
    public function pengurus()
    {
        return view('frontend.profil.pengurus');
    }
    public function staff()
    {
        return view('frontend.profil.staff');
    }

    // publikasi
    public function berita()
    {
        return view('frontend.publikasi.berita');
    }
    public function siaran_pers()
    {
        return view('frontend.publikasi.siaran_pers');
    }
    public function galeri()
    {
        return view('frontend.publikasi.galeri');
    }
    public function agenda()
    {
        return view('frontend.publikasi.agenda');
    }

    //Program
    public function program()
    {
        return view('frontend.program.index');
    }

    //Anggota
    public function dpd()
    {
        return view('frontend.anggota.dpd');
    }
    public function dpc()
    {
        return view('frontend.anggota.dpc');
    }
    public function informasi_iuran()
    {
        return view('frontend.anggota.informasi_iuran');
    }
    public function ukw()
    {
        return view('frontend.anggota.ukw');
    }
    public function data()
    {
        return view('frontend.anggota.data');
    }

    //Pelaporan
    public function etik()
    {
        return view('frontend.pelaporan.etik');
    }
    public function seksual()
    {
        return view('frontend.pelaporan.seksual');
    }
}
