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

Route::get('/admin', [AdminController::class, "index"])->name('admin.index');

Route::get('/admin/pengguna', [PenggunaController::class, "index"])
    ->name('admin.pengguna.index');

Route::get('/admin/pengguna/tambah', [PenggunaController::class, "insert"])
    ->name('admin.pengguna.tambah');

Route::post('/admin/pengguna', [PenggunaController::class, "store"])
    ->name('admin.pengguna.store');

Route::get('/admin/pengguna/{id}/edit', [PenggunaController::class, "edit"])
    ->name('admin.pengguna.edit');

Route::post('/admin/pengguna/{id}', [PenggunaController::class, "update"])
    ->name('admin.pengguna.update');

Route::delete('/admin/pengguna/{id}/hapus', [PenggunaController::class, "destroy"])
    ->name('admin.pengguna.hapus');

Route::get('/admin/mahasiswa', [MahasiswaController::class, "index"])->name('admin.mahasiswa.index');

Route::get('/admin/absensi', [AbsensiController::class, "index"])->name('admin.absensi.index');

Route::get('/bootstrap', [BootstrapController::class, 'index']);
