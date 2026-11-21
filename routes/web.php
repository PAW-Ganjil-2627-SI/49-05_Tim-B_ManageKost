<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\AuthController;

// Halaman yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/kamar', [KamarController::class, 'index'])
        ->name('kamar.index');

    Route::get('/kamar/tambah', [KamarController::class, 'create'])
        ->name('kamar.create');

    Route::post('/kamar', [KamarController::class, 'store'])
        ->name('kamar.store');

    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])
        ->name('kamar.edit');

    Route::put('/kamar/{id}', [KamarController::class, 'update'])
        ->name('kamar.update');

    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])
        ->name('kamar.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

// Halaman login tetap bisa dibuka tanpa login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');
