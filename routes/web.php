<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;

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

Route::get('/', [HomeController::class, 'index']);

//crud user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//crud barang
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

//crud jenis barang
Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store'])->name('jenisbarang.store');
Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update'])->name('jenisbarang.update');
Route::get('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy'])->name('jenisbarang.destroy');