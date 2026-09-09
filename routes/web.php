<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UtamaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;  
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AuthController;


//ini adalah perubahan dari daniel
// ini adalah homepage yang mengarah pada controller
// Route::get('/', [UtamaController::class, 'boleh']);

// Route::get('/', function () {
//     return view('utama');
// });

Route::get('/horeee-saya-bisa', function(){
    return 'Ini adalah halaman saya...hore';
});

//ini adalah komentar dari daniel
Route::get('/bisa-aja-bikin-lagi', function(){
    return 'ini loh tak bikin lagi';
});

Route::get('/daftar-kategori', [KategoriController::class, 'tampil']);
Route::get('/tambah-kategori', [KategoriController::class, 'create']);
Route::post('/simpan-kategori', [KategoriController::class, 'simpan']);
Route::get('/daftar-barang', [BarangController::class, 'tampil']);
Route::get('/tambah-barang', [BarangController::class, 'create']);
Route::post('/simpan-barang', [BarangController::class, 'simpan']);
Route::get('/ubah-barang/{barang}', [BarangController::class, 'ubah'])->name('barang.ubah');
Route::put('/update-barang', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/hapus-barang/{barang}', [BarangController::class, 'hapus'])->name('barang.hapus');

Route::delete('/hapus-kategori/{kategori}', [KategoriController::class, 'hapus'])->name('kategori.hapus');
Route::get('/ubah-kategori/{kategori}', [KategoriController::class, 'ubah'])->name('kategori.ubah');
Route::put('/update-kategori', [KategoriController::class, 'update']);

Route::get('/', [InformasiController::class, 'publicIndex'])->name('informasi.public');
Route::get('/informasi/{id}', [InformasiController::class, 'publicDetail'])->name('informasi.detail');

Route::get('/daftar-informasi', [InformasiController::class, 'tampil'])->name('informasi.daftar');
Route::get('/tambah-informasi', [InformasiController::class, 'create'])->name('informasi.create');
Route::post('/simpan-informasi', [InformasiController::class, 'simpan'])->name('informasi.simpan');
Route::get('/ubah-informasi/{informasi}', [InformasiController::class, 'ubah'])->name('informasi.ubah');
Route::put('/update-informasi', [InformasiController::class, 'update'])->name('informasi.update');
Route::delete('/hapus-informasi/{informasi}', [InformasiController::class, 'hapus'])->name('informasi.hapus');
Route::get('/menu', [BarangController::class, 'publicMenu'])->name('menu.public');

// ==========================================
// ROUTE AUTENTIKASI PEGAWAI
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//haloo
//tes