<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;

//Beranda
Route::get('/', [PageController::class, 'beranda'])->name('landing');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'detail_berita'])->name('detail.berita');

// Profil
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/pengurus', [PageController::class, 'pengurus'])->name('pengurus');
Route::get('/pendaftaran/pengurus', [PageController::class, 'pendaftaran_pengurus'])->name('pendaftaran.pengurus');
Route::get('/download-formulir-dpd', [PageController::class, 'formulir_dpd'])->name('download.dpd');
Route::get('/download-formulir-dpc', [PageController::class, 'formulir_dpc'])->name('download.dpc');
Route::get('/download-formulir-anggota', [PageController::class, 'formulir_anggota'])->name('download.anggota');
Route::post('/upload-file', [PageController::class, 'store'])->name('pendaftaran.upload');
Route::get('/agenda', [PageController::class, 'agenda'])->name('agenda');

// Keanggotaan
Route::get('/anggota', [PageController::class, 'anggota'])->name('anggota');
Route::get('/pendaftaran/anggota', [PageController::class, 'pendaftaran_anggota'])->name('pendaftaran.anggota');

// kontak
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');


//Backend Auth
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //Post
    Route::resource('berita', PostController::class);

    //Agenda
    Route::resource('agenda', AgendaController::class);

    //Informasi
    Route::resource('info', InfoController::class);

    // Video
    Route::resource('video', VideoController::class);

    // Pengumuman
    Route::resource('pengumuman', PengumumanController::class)->only([
        'create',
        'store',
        'destroy'
    ]);

    //Pengurus
    Route::get('pengurus/pendaftaran', [PengurusController::class, 'pendaftaran'])->name('pengurus.pendaftaran');
    Route::get('pengurus/download', [PengurusController::class, 'download'])->name('pengurus.download');
    Route::get('pengurus/approve/{id}', [PengurusController::class, 'approve'])->name('pengurus.approve');
    Route::resource('pengurus', PengurusController::class);


    //Anggota
    Route::get('anggota/pendaftaran', [AnggotaController::class, 'pendaftaran'])->name('anggota.pendaftaran');
    Route::get('anggota/download', [AnggotaController::class, 'download'])->name('anggota.download');
    Route::get('anggota/approve/{id}', [AnggotaController::class, 'approve'])->name('anggota.approve');
    Route::resource('anggota', AnggotaController::class);
});
