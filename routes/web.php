<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Peserta\UjianController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AdminSoalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\Admin\AdminUjianController;
use App\Http\Controllers\Admin\AdminDashboardController;
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
Route::middleware('auth')->group(function() {
    Route::get('/home',[DashboardController::class , 'index'])->name('dashboard');
});


Auth::routes();

// Route::get('/',[DashboardController::class , 'index'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'wpa-admin' , 'as' => 'admin.'], function(){
    Auth::routes();
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminDashboardController::class , 'index'])->name('dashboard');

        Route::group(['prefix' => 'kategori' , 'as' => 'kategori.'],  function (){
            Route::get('/', [KategoriController::class, 'index'])->name('index');
            Route::get('/create', [KategoriController::class, 'create'])->name('create');
            Route::get('/edit/{kategori}', [KategoriController::class, 'edit'])->name('edit');
            Route::post('/store', [KategoriController::class, 'store'])->name('store');
            Route::put('/update/{kategori}', [KategoriController::class, 'update'])->name('update');
            Route::get('/{kategori}', [KategoriController::class, 'destroy'])->name('delete');
        });
    });
});
