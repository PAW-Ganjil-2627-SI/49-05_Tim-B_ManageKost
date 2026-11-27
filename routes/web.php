<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;


Route::get('/tes-koneksi', function () {
    try{
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e){
        return "DB gagal connect: ". $e->getMessage();
    }
})->withoutMiddleware('web');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('inventaris', InventarisController::class)->except(['show']);;
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/inventaris/daftar', function () {
    $inventaris = [
        (object) ['Barang' => 'AC', 'Merek' => 'Daikin', 'Kondisi' => 'Terawat'],
        (object) ['Barang' => 'Lampu', 'Merek' => 'Phillips', 'Kondisi' => 'Terawat'],
        (object) ['Barang' => 'Lemari', 'Merek' => 'Tidak Bermerek', 'Kondisi' => 'Perlu Diperbaiki'],
        (object) ['Barang' => 'TV', 'Merek' => 'Polytron', 'Kondisi' => 'Perlu Diperbaiki'],
    ];

    return view('inventaris.daftar', [
        'inventaris' => $inventaris,
    ]);
})->name('inventaris.daftar');



Route::resource('inventaris', InventarisController::class);