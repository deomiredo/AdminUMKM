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
Route::get('/produk/tambah-produk', [ProdukController::class,'create'])->name('create-produk');
Route::post('/produk/tambah-produk', [ProdukController::class,'store'])->name('store-produk');
Route::get('/produk/{id}/edit-produk', [ProdukController::class,'edit'])->name('edit-produk');
Route::put('/produk/{id}/edit-produk', [ProdukController::class,'update'])->name('update-produk');
Route::delete('/produk/{id}/edit-produk', [ProdukController::class,'destroy'])->name('destroy-produk');


Route::get('/kategori-produk',[KategoriProdukController::class,'index'])->name('kategori-produk');
Route::get('/kategori-produk/tambah-kategori-produk', [KategoriProdukController::class,'create'])->name('create-kategori-produk');
Route::post('/kategori-produk/tambah-kategori-produk', [KategoriProdukController::class,'store'])->name('store-kategori-produk');
Route::get('/kategori-produk/{id}/edit-kategori-produk', [KategoriProdukController::class,'edit'])->name('edit-kategori-produk');
Route::put('/kategori-produk/{id}/edit-kategori-produk', [KategoriProdukController::class,'update'])->name('update-kategori-produk');
Route::delete('/kategori-produk/{id}/delete-kategori-produk', [KategoriProdukController::class,'destroy'])->name('destroy-kategori-produk');


Route::get('/manajemen-penjual',[ManajemenPenjualController::class,'index'])->name('penjual');
Route::get('/manajemen-penjual/tambah-penjual', [ManajemenPenjualController::class,'create'])->name('create-penjual');
Route::post('/manajemen-penjual/tambah-penjual', [ManajemenPenjualController::class,'store'])->name('store-penjual');
Route::get('/manajemen-penjual/{id}/edit-penjual', [ManajemenPenjualController::class,'edit'])->name('edit-penjual');
Route::put('/manajemen-penjual/{id}/edit-penjual', [ManajemenPenjualController::class,'update'])->name('update-penjual');
Route::delete('/manajemen-penjual/{id}/hapus-penjual', [ManajemenPenjualController::class,'destroy'])->name('destroy-penjual');

Route::get('/manajemen-pembeli',[ManajemenPembeliController::class,'index'])->name('pembeli');
Route::get('/tambah-pembeli', [ManajemenPembeliController::class,'create'])->name('create-pembeli');
Route::post('/tambah-pembeli', [ManajemenPembeliController::class,'store'])->name('store-pembeli');

Route::get('/statistik-penjualan',[StatistikPenjualanController::class,'index'])->name('statistik-penjualan');
Route::get('/statistik-pembeli-penjual',[StatistikPembeliPenjualController::class,'index'])->name('statistik-pembeli-penjual');
Route::get('/analitik-pelanggan',[AnalitikPelangganController::class,'index'])->name('analitik-pelanggan');