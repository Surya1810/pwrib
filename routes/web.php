<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Beranda
Route::get('/', [PageController::class, 'beranda'])->name('landing');

//Profil
Route::get('/sejarah', [PageController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [PageController::class, 'visi_misi'])->name('visi_misi');
Route::get('/pengurus', [PageController::class, 'pengurus'])->name('pengurus');
Route::get('/staff', [PageController::class, 'staff'])->name('staff');
//Publikasi
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/siaran-pers', [PageController::class, 'siaran_pers'])->name('siaran_pers');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/agenda', [PageController::class, 'agenda'])->name('agenda');
//Program
Route::get('/program', [PageController::class, 'program'])->name('program');
//Anggota
Route::get('/data-anggota', [PageController::class, 'data'])->name('data');
Route::get('/informasi-iuran', [PageController::class, 'informasi_iuran'])->name('informasi_iuran');
Route::get('/uji-kompetensi-wartawan', [PageController::class, 'ukw'])->name('ukw');
Route::get('/dewan-pengurus-daerah', [PageController::class, 'dpd'])->name('dpd');
Route::get('/dewan-pengurus-cabang', [PageController::class, 'dpc'])->name('dpc');
//Pelaporan
Route::get('/pelaporan-etik', [PageController::class, 'etik'])->name('etik');
Route::get('/pelaporan-kekerasan-seksual', [PageController::class, 'seksual'])->name('seksual');

//Backend Auth
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Profile Section
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'password'])->name('profile.password');
    Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User
    Route::resource('users', UserController::class);
    //Category
    Route::resource('categories', CategoryController::class);
    //Tag
    Route::resource('tags', TagController::class);
    //Post
    Route::resource('posts', PostController::class);
    Route::get('trashed/posts', [PostController::class, 'trashed'])->name('posts.trashed');
});
