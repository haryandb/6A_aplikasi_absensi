<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BootstrapController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, "index"]); // ubah

Route::get('/admin/pengguna', [PenggunaController::class, "index"])
    ->name('admin.pengguna.index');

Route::get('/admin/pengguna/tambah', [PenggunaController::class, "insert"])
    ->name('admin.pengguna.tambah');

Route::post('/admin/pengguna', [PenggunaController::class, "store"])
    ->name('admin.pengguna.store');

Route::get('/admin/mahasiswa', [MahasiswaController::class, "index"]);

Route::get('/admin/absensi', [AbsensiController::class, "index"]);


Route::get('/bootstrap', [BootstrapController::class, 'index']);
