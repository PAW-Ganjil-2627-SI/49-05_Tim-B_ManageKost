sider<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousekeeperController;

Route::redirect('/', '/login');

// =========================================================================
// AUTH & DASHBOARD
// =========================================================================
Route::view('/login', 'auth.login')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

// =========================================================================
// ROUTE 4 MODUL
// Catatan: Saat fitur login & middleware 'auth' sudah siap, pindahkan semua
// route di bawah ini ke dalam: Route::middleware('auth')->group(function () { ... });
// =========================================================================

// INDIVIDU A — MASTER KAMAR
Route::view('/kamar', 'modules.kamar.index')->name('kamar.index');

// INDIVIDU B — DATA PENGHUNI
Route::view('/penghuni', 'modules.penghuni.index')->name('penghuni.index');

// INDIVIDU C — HOUSEKEEPER / STAFF
Route::resource('housekeeper', HousekeeperController::class);

// INDIVIDU D — INVENTARIS ASET KOS
Route::view('/inventaris', 'modules.inventaris.index')->name('inventaris.index');
