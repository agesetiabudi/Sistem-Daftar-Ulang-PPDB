<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Peserta\UjianController;
use App\Http\Controllers\Admin\AdminSoalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\Admin\AdminUjianController;
use App\Http\Controllers\Admin\PesertaDidikController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\TahunPelajaranController;
use App\Http\Controllers\Admin\JalurPendaftaranController;
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
Route::get('/',[HomeController::class , 'index'])->name('index');
Route::post('/cari-pendaftar',[HomeController::class , 'cari'])->name('cari-pendaftar');
Route::post('/upload',[HomeController::class , 'upload'])->name('upload');
Route::get('/upload-berkas/{pendaftar}',[HomeController::class , 'berkas'])->name('upload-berkas');
Route::get('/terimakasih/{pendaftar}',[HomeController::class , 'terimakasih'])->name('terimakasih');


Route::middleware('auth')->group(function() {
    Route::get('/home',[DashboardController::class , 'index'])->name('dashboard');
});


Auth::routes();

// Route::get('/',[DashboardController::class , 'index'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'wpa-admin' , 'as' => 'admin.'], function(){
    Auth::routes();
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminDashboardController::class , 'index'])->name('dashboard');

        Route::group(['prefix' => 'jurusan' , 'as' => 'jurusan.'],  function (){
            Route::get('/', [JurusanController::class, 'index'])->name('index');
            Route::get('/create', [JurusanController::class, 'create'])->name('create');
            Route::get('/edit/{jurusan}', [JurusanController::class, 'edit'])->name('edit');
            Route::post('/store', [JurusanController::class, 'store'])->name('store');
            Route::put('/update/{jurusan}', [JurusanController::class, 'update'])->name('update');
            Route::get('/{jurusan}', [JurusanController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'jalur-pendaftaran' , 'as' => 'jalur-pendaftaran.'],  function (){
            Route::get('/', [JalurPendaftaranController::class, 'index'])->name('index');
            Route::get('/create', [JalurPendaftaranController::class, 'create'])->name('create');
            Route::get('/edit/{jalurpendaftaran}', [JalurPendaftaranController::class, 'edit'])->name('edit');
            Route::post('/store', [JalurPendaftaranController::class, 'store'])->name('store');
            Route::put('/update/{jalurpendaftaran}', [JalurPendaftaranController::class, 'update'])->name('update');
            Route::get('/{jalurpendaftaran}', [JalurPendaftaranController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'tahun-pelajaran' , 'as' => 'tahun-pelajaran.'],  function (){
            Route::get('/', [TahunPelajaranController::class, 'index'])->name('index');
            Route::get('/create', [TahunPelajaranController::class, 'create'])->name('create');
            Route::get('/edit/{tahunpelajaran}', [TahunPelajaranController::class, 'edit'])->name('edit');
            Route::post('/store', [TahunPelajaranController::class, 'store'])->name('store');
            Route::put('/update/{tahunpelajaran}', [TahunPelajaranController::class, 'update'])->name('update');
            Route::get('/{tahunpelajaran}', [TahunPelajaranController::class, 'destroy'])->name('delete');
        });
        
        Route::group(['prefix' => 'peserta-didik' , 'as' => 'peserta-didik.'],  function (){
            Route::get('/', [PesertaDidikController::class, 'index'])->name('index');
            Route::get('/detail/{tahunpelajaran}', [PesertaDidikController::class, 'detail'])->name('detail');
            Route::post('/import', [PesertaDidikController::class, 'import'])->name('import');
        });
    });
});
