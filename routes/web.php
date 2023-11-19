<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KoordinatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/warehousestitching', function () {
    return view('stitchingwarehouse');
})->name('warehousestitching');
Route::get('/warehouseEDM', function () {
    return view('EDMwarehouse');
})->name('warehouseEDM');

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/shift', ShiftController::class);

Route::resource('/departemen', DepartemenController::class);

Route::resource('/koordinat', KoordinatController::class);

Route::resource('/pegawai', PegawaiController::class);

Route::middleware('auth')->group(function () {
    // absensi
    Route::get('/absensi/data_absensi',[AbsensiController::class,'data_absensi'])->name('absensi.data_absensi');
    Route::resource('/absensi', AbsensiController::class);
    Route::post('/absensi/masuk', [AbsensiController::class, 'masuk'])->name('absensi.masuk');
    Route::post('/absensi/pulang', [AbsensiController::class, 'pulang'])->name('absensi.pulang');
    Route::post('/absensi/keluar', [AbsensiController::class, 'keluar'])->name('absensi.keluar');
    // cuti
    Route::get('/cuti/pengajuan', [CutiController::class,'pengajuan_cuti'])->name('cuti.pengajuan');
    Route::post('/cuti/pengajuan', [CutiController::class,'simpan_pengajuan'])->name('cuti.simpan_pengajuan');
    Route::get('/cuti/data_pengajuan', [CutiController::class,'data_pengajuan'])->name('cuti.data_pengajuan');
    Route::get('/cuti/data_pengajuan_hrd', [CutiController::class,'data_pengajuan_hrd'])->name('cuti.data_pengajuan_hrd');
    Route::put('/cuti/update_hrda/{id}', [CutiController::class,'simpan_update'])->name('cuti.simpan_update');
    Route::get('/cuti/update_hrda/{id}', [CutiController::class,'update_status_approve'])->name('cuti.update_hrda');
    Route::get('/cuti/update_hrdr/{id}', [CutiController::class,'update_status_reject'])->name('cuti.update_hrdr');
    
});
