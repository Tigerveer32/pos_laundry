<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Karyawan\InvoiceController;
use App\Http\Controllers\Karyawan\LayananController;
use App\Http\Controllers\Karyawan\PesananController;
use App\Http\Controllers\Karyawan\DashboardController;
use App\Http\Controllers\Karyawan\PelangganController;
use App\Http\Controllers\Karyawan\TransaksiController;
use App\Http\Controllers\Karyawan\AddPesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('/', DashboardController::class);
    Route::resource('transakisi', TransaksiController::class);
    Route::resource('daftar_layanan', LayananController::class);
    Route::resource('pesanan', PesananController::class);
    Route::put('pesanan/status/{id}', [PesananController::class, 'status'])->name('pesanan.status');
    Route::resource('pesanan.add_pesanan', AddPesananController::class)->shallow();
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('invoice', InvoiceController::class);
});



require __DIR__.'/auth.php';
