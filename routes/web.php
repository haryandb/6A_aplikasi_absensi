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

Route::get('/admin/pengguna', [PenggunaController::class, "index"]);

Route::get('/admin/mahasiswa', [MahasiswaController::class, "index"]);

Route::get('/admin/absensi', [AbsensiController::class, "index"]);


Route::get('/bootstrap', [BootstrapController::class, 'index']);
