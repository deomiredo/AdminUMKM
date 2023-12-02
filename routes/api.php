<?php

use App\Http\Controllers\KategoriProdukAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukAPIController;
use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\KeranjangAPIController;
use App\Http\Controllers\PembeliApiController;
use App\Http\Controllers\TransaksiAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthAPIController::class, 'register']);
Route::post('/login', [AuthAPIController::class, 'login']);


Route::get('/profile-pembeli/{id}',[PembeliApiController::class,'profile']);
Route::post('/profile-pembeli/{id}',[PembeliApiController::class,'editProfile']);

Route::get('/produk', [ProdukAPIController::class, 'index'])->name('list-produk');
Route::get('/category-produk/{id}', [ProdukAPIController::class, 'categoryProduk']);
Route::get('/more-produk-penjual/{id}', [ProdukAPIController::class, 'moreProduk']);
Route::get('/produk/{id}/komentar', [ProdukAPIController::class, 'komentar']);


Route::get('/lihat-keranjang/{id}', [KeranjangAPIController::class, 'getCart']);
Route::post('/tambah-keranjang', [KeranjangAPIController::class, 'addCart']);
Route::put('/update-keranjang', [KeranjangAPIController::class, 'updateCart']);
Route::delete('/delete-produk-keranjang/{id}', [KeranjangAPIController::class, 'deleteProdukCart']);


Route::post('/tambah-transaksi', [TransaksiAPIController::class, 'addTransaksi']);
Route::get('/riwayat-transaksi/{pembeli}', [TransaksiAPIController::class, 'riwayatTransaksi']);
Route::get('/update-bukti/{transaksi}', [TransaksiAPIController::class, 'updateBukti']);


Route::get('/produk/search', [ProdukAPIController::class, 'searchProduk']);
Route::get('/produklast', [ProdukAPIController::class, 'lastFive']);
Route::get('/random-produk', [ProdukAPIController::class, 'random']);
Route::get('/kategori-produk', [KategoriProdukAPIController::class, 'index'])->name('list-kategori-produk');
Route::get('/kategori-produk/{kategori}', [KategoriProdukAPIController::class, 'produk']);

