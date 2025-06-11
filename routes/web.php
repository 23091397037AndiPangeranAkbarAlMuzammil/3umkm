<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UMKMController;

Route::get('/', function () {
    return view('umkm.index');
})->name('index');

// Halaman UMKM (index utama)
Route::get('/', [UMKMController::class, 'index'])->name('home');

// Proses login & register
Route::post('/login', [AuthController::class, 'login'])->name('login.custom');
Route::post('/register', [AuthController::class, 'register'])->name('register.custom');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [UMKMController::class, 'index']);
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');

Route::get('/umkm/{id}', [UMKMController::class, 'show'])->name('umkm.show');
