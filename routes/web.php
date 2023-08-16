<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ManajemenPenjualController;
use App\Http\Controllers\ManajemenPembeliController;
use App\Http\Controllers\StatistikPenjualanController;
use App\Http\Controllers\StatistikPembeliPenjualController;
use App\Http\Controllers\AnalitikPelangganController;
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
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/produk',[ProdukController::class,'index'])->name('list-produk');
Route::get('/kategori-produk',[KategoriProdukController::class,'index'])->name('kategori-produk');
Route::get('/manajemen-penjual',[ManajemenPenjualController::class,'index'])->name('penjual');
Route::get('/manajemen-pembeli',[ManajemenPembeliController::class,'index'])->name('pembeli');
Route::get('/statistik-penjualan',[StatistikPenjualanController::class,'index'])->name('statistik-penjualan');
Route::get('/statistik-pembeli-penjual',[StatistikPembeliPenjualController::class,'index'])->name('statistik-pembeli-penjual');
Route::get('/analitik-pelanggan',[AnalitikPelangganController::class,'index'])->name('analitik-pelanggan');