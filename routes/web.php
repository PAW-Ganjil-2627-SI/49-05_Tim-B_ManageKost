<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenghuniKostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/kamar', 'modules.kamar.index')->name('kamar.index');
    Route::view('/housekeeper', 'modules.housekeeper.index')->name('housekeeper.index');
    Route::view('/inventaris', 'modules.inventaris.index')->name('inventaris.index');

    Route::middleware('role:admin,operator')->group(function () {
        Route::get('/penghuni', [PenghuniKostController::class, 'index'])->name('penghuni.index');
        Route::get('/penghuni/create', [PenghuniKostController::class, 'create'])->name('penghuni.create');
        Route::post('/penghuni', [PenghuniKostController::class, 'store'])->name('penghuni.store');
        Route::get('/penghuni/{penghuni}', [PenghuniKostController::class, 'show'])->name('penghuni.show');
        Route::get('/penghuni/{penghuni}/edit', [PenghuniKostController::class, 'edit'])->name('penghuni.edit');
        Route::match(['put', 'patch'], '/penghuni/{penghuni}', [PenghuniKostController::class, 'update'])->name('penghuni.update');
    });

    Route::delete('/penghuni/{penghuni}', [PenghuniKostController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('penghuni.destroy');
});
