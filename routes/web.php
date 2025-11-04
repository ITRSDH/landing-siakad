<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingContentController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileKampusController;
use App\Models\Profilekampus;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfilKampusController;



Route::get('/', [BerandaController::class, 'index'])->name('landing.index');
Route::get('/programstudibaru', [BerandaController::class, 'programStudi'])->name('programstudi.index');
Route::get('/jadwalbaru', [BerandaController::class, 'jadwal'])->name('jadwal.index');
Route::get('/ormawa', [BerandaController::class, 'ormawa'])->name('landing.ormawa');
Route::get('/beasiswa', [BerandaController::class, 'beasiswa'])->name('landing.beasiswa');
Route::get('/prestasibaru', [BerandaController::class, 'prestasi'])->name('landing.prestasi');
Route::get('/kontakbaru', [BerandaController::class, 'kontak'])->name('kontak.index');
Route::get('/infopembayaran', [BerandaController::class, 'pembayaran'])->name('pembayaran.index');
Route::get('/transkrip', [BerandaController::class, 'transkrip'])->name('transkrip.index');
Route::get('/detailprodi', [BerandaController::class, 'detailProdi'])->name('detailprodi.index');
Route::get('/detailormawa/{id}', [BerandaController::class, 'detailOrmawa'])->name('landing.detailormawa');
Route::get('/detailbeasiswa/{id}', [BerandaController::class, 'detailBeasiswa'])->name('landing.detailbeasiswa');
Route::get('/detailprestasi/{id}', [BerandaController::class, 'detailPrestasi'])->name('landing.detailprestasi');
Route::get('/detailpengumuman/{id}', [BerandaController::class, 'detailPengumuman'])->name('detailpengumuman.index');
Route::get('/detailberita/{id}', [BerandaController::class, 'detailBerita'])->name('landing.detailberita');
Route::get('/detailgaleri/{id}', [BerandaController::class, 'detailGaleri'])->name('detailgaleri.index');
Route::get('/pengumumanbaru', [BerandaController::class, 'pengumuman'])->name('pengumuman.index');
Route::get('/beritabaru', [BerandaController::class, 'berita'])->name('landing.berita');
Route::get('/kalender-akademikbaru', [BerandaController::class, 'kalender'])->name('kalender.index');
Route::get('/galeribaru', [BerandaController::class, 'galeri'])->name('landing.galeri.index');
Route::get('/kampusbaru', [BerandaController::class, 'kampus'])->name('kampus.index');
Route::get('/test-kampus-connection', [BerandaController::class, 'testKampusConnection'])->name('test.kampus.connection');
Route::get('/test-kampus/{id}', [BerandaController::class, 'testKampusById'])->name('test.kampus.byid');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    Route::resource('galeri', GaleriController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('ormawa', OrmawaController::class);
     Route::resource('prestasi', PrestasiController::class)->parameters([
        'prestasi' => 'prestasi'
    ]);
    Route::resource('beasiswa', BeasiswaController::class);

    
    Route::get('landingcontent', [LandingContentController::class, 'index'])->name('landingcontent.index');
    Route::post('landingcontent', [LandingContentController::class, 'store'])->name('landingcontent.store');
    Route::get('/admin/profilkampus/edit', [ProfilKampusController::class, 'edit'])->name('profilkampus.edit');
    Route::post('/admin/profilkampus/update', [ProfilKampusController::class, 'update'])->name('profilkampus.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
