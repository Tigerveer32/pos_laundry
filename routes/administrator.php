<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\http\Controllers\Admin\User\AdminController;
use App\Http\Controllers\Admin\User\KaryawanController;
use App\Http\Controllers\Admin\Layanan\LayananController;
use App\Http\Controllers\Admin\Layanan\ListLayananController;
use App\Http\Controllers\Admin\Pesanan\PesananController;
use App\Http\Controllers\Admin\Laporan\LaporanController;

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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::middleware(['auth', 'verified'])->group(function(){

        Route::resource('dashboard', DashboardController::class);

        Route::resource('administrator', AdminController::class);
        Route::resource('karyawan', KaryawanController::class);

        Route::resource('layanan', LayananController::class);
        Route::resource('layanan.list_layanan', ListLayananController::class)->shallow();

        Route::resource('pesanan', PesananController::class);

        Route::resource('laporan', LaporanController::class);

    });

});
