<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\reportController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('/change/password',  [AuthController::class,'changePassword'])->name('profile.change.password');
Route::post('/insertkriteria',  [transaksiController::class,'saveKriteria'])->name('insertkriteria');
Route::get('/delete_kriteria',  [transaksiController::class,'deleteKriteria'])->name('delete_kriteria');
Route::post('/insertalternatif',  [transaksiController::class,'saveAlternatif'])->name('insertalternatif');
Route::get('/delete_alternatif',  [transaksiController::class,'deleteAlternatif'])->name('delete_alternatif');
Route::post('/insertnilaialternatif',  [transaksiController::class,'saveNilai'])->name('insertnilaialternatif');
Route::get('/delete_nilai',  [transaksiController::class,'deleteNilai'])->name('delete_nilai');
Route::post('/hasilanalisa',  [transaksiController::class,'hitungHasilSPK'])->name('hitungHasilSPK');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('ubahpassword', [HomeController::class, 'ubahpassword'])->name('ubahpassword');
    Route::get('tr_alternatif', [HomeController::class, 'tr_alternatif'])->name('tr_alternatif');
    Route::get('tr_kriteria', [HomeController::class, 'tr_kriteria'])->name('tr_kriteria');
    Route::get('nilaialternatif', [HomeController::class, 'nilaialternatif'])->name('nilaialternatif');
    Route::get('perhitungan', [HomeController::class, 'perhitungan'])->name('perhitungan');
    Route::get('tambah_alternatif', [HomeController::class, 'tambah_alternatif'])->name('tambah_alternatif');
    Route::get('getdatakriteria', [transaksiController::class, 'getDataKriteria'])->name('getdatakriteria');
    Route::get('tambah_kriteria', [HomeController::class, 'tambah_kriteria'])->name('tambah_kriteria');
    Route::get('update_kriteria',  [HomeController::class,'update_kriteria'])->name('update_kriteria');
    Route::get('cetak_kriteria',  [reportController::class,'cetakLaporanKriteria'])->name('cetak_kriteria');
    Route::get('update_alternatif',  [HomeController::class,'update_alternatif'])->name('update_alternatif');
    Route::get('getdataalternatif', [transaksiController::class, 'getDataAlternatif'])->name('getdataalternatif');
    Route::get('cetak_alternatif',  [reportController::class,'cetakLaporanAlternatif'])->name('cetak_alternatif');
    Route::get('getdatanilaialternatif', [transaksiController::class, 'getDataNilai'])->name('getdatanilaialternatif');
    Route::get('tambah_nilaialternatif', [HomeController::class, 'tambah_nilaialternatif'])->name('tambah_nilaialternatif');
    Route::get('update_nilaialternatif',  [HomeController::class,'update_nilaialternatif'])->name('update_nilaialternatif');
    Route::get('cetak_nilaialternatif',  [reportController::class,'cetakLaporanNilaiAlternatif'])->name('cetak_nilaialternatif');
    Route::get('cetak_hasil',  [reportController::class,'cetakLaporanPerhitungan'])->name('cetak_hasil');
});
