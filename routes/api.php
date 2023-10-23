<?php

use App\Http\Controllers\KategoriProdukAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukAPIController;

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

Route::get('/produk', [ProdukAPIController::class, 'index'])->name('list-produk');
Route::get('/random-produk', [ProdukAPIController::class, 'random']);
Route::get('/kategori-produk', [KategoriProdukAPIController::class, 'index'])->name('list-kategori-produk');
Route::get('/kategori-produk/{kategori}', [KategoriProdukAPIController::class, 'produk']);

