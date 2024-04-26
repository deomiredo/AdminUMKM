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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Penjual\AuthController;
use App\Http\Controllers\Penjual\HomeController as PenjualHomeController;
use App\Http\Controllers\Penjual\KomentardanPenilaianController;
use App\Http\Controllers\Penjual\ManagementPesananController;
use App\Http\Controllers\Penjual\ProdukController as PenjualProdukController;
use App\Http\Controllers\Penjual\ProfileController;
use App\Models\Produk;

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

Route::middleware(['guest:admin,penjual'])->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
    Route::get('login/penjual', [AuthController::class,'login'])->name('login.penjual');
    Route::post('login/penjual', [AuthController::class,'auth'])->name('auth.penjual');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('logout');

Route::middleware(['penjual'])->group(function(){
    
    Route::prefix('penjual')->group(function(){
        Route::get('/dashboard',[PenjualHomeController::class,'index'])->name('penjual.dashboard');
        
        
        Route::prefix('manajemen-produk')->group(function(){
            Route::get('/',[PenjualProdukController::class,'index'])->name('penjual.produk.index');
            Route::get('/tambah-produk',[PenjualProdukController::class,'create'])->name('penjual.produk.create');
            Route::post('/tambah-produk',[PenjualProdukController::class,'store'])->name('penjual.produk.store');
            Route::get('/edit-produk/{produk}',[PenjualProdukController::class,'edit'])->name('penjual.produk.edit');
            Route::put('/edit-produk/{produk}',[PenjualProdukController::class,'update'])->name('penjual.produk.update');
            Route::delete('/hapus-produk/{produk}',[PenjualProdukController::class,'destroy'])->name('penjual.produk.destroy');
        });
        Route::prefix('manajemen-pesanan')->group(function(){
            Route::get('/',[ManagementPesananController::class,'index'])->name('penjual.pesanan.index');
            Route::post('/update-status/{transaksi}',[ManagementPesananController::class,'updateStatus'])->name('penjual.pesanan.updateStatus');
        });
        Route::prefix('komentar-dan-penilaian')->group(function(){
            Route::get('/',[KomentardanPenilaianController::class,'index'])->name('penjual.komentar.index');
        });
        Route::prefix('myprofile')->group(function(){
            Route::get('/',[ProfileController::class,'index'])->name('penjual.profile.index');
            Route::put('/',[ProfileController::class,'update'])->name('penjual.profile.update');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/produk', [ProdukController::class, 'index'])->name('list-produk');
    Route::get('/produk/tambah-produk', [ProdukController::class, 'create'])->name('create-produk');
    Route::post('/produk/tambah-produk', [ProdukController::class, 'store'])->name('store-produk');
    Route::get('/produk/{id}/edit-produk', [ProdukController::class, 'edit'])->name('edit-produk');
    Route::put('/produk/{id}/edit-produk', [ProdukController::class, 'update'])->name('update-produk');
    Route::delete('/produk/{id}/edit-produk', [ProdukController::class, 'destroy'])->name('destroy-produk');

    Route::get('/kategori-produk', [KategoriProdukController::class, 'index'])->name('kategori-produk');
    Route::get('/kategori-produk/tambah-kategori-produk', [KategoriProdukController::class, 'create'])->name('create-kategori-produk');
    Route::post('/kategori-produk/tambah-kategori-produk', [KategoriProdukController::class, 'store'])->name('store-kategori-produk');
    Route::get('/kategori-produk/{id}/edit-kategori-produk', [KategoriProdukController::class, 'edit'])->name('edit-kategori-produk');
    Route::put('/kategori-produk/{id}/edit-kategori-produk', [KategoriProdukController::class, 'update'])->name('update-kategori-produk');
    Route::delete('/kategori-produk/{id}/delete-kategori-produk', [KategoriProdukController::class, 'destroy'])->name('destroy-kategori-produk');

    Route::get('/manajemen-penjual', [ManajemenPenjualController::class, 'index'])->name('penjual');
    Route::get('/manajemen-penjual/tambah-penjual', [ManajemenPenjualController::class, 'create'])->name('create-penjual');
    Route::post('/manajemen-penjual/tambah-penjual', [ManajemenPenjualController::class, 'store'])->name('store-penjual');
    Route::get('/manajemen-penjual/{id}/edit-penjual', [ManajemenPenjualController::class, 'edit'])->name('edit-penjual');
    Route::put('/manajemen-penjual/{id}/edit-penjual', [ManajemenPenjualController::class, 'update'])->name('update-penjual');
    Route::delete('/manajemen-penjual/{id}/hapus-penjual', [ManajemenPenjualController::class, 'destroy'])->name('destroy-penjual');

    Route::get('/manajemen-pembeli', [ManajemenPembeliController::class, 'index'])->name('pembeli');
    Route::get('/manajemen-pembeli/tambah-pembeli', [ManajemenPembeliController::class, 'create'])->name('create-pembeli');
    Route::post('/manajemen-pembeli/tambah-pembeli', [ManajemenPembeliController::class, 'store'])->name('store-pembeli');
    Route::get('/manajemen-pembeli/{id}/edit-pembeli', [ManajemenPembeliController::class, 'edit'])->name('edit-pembeli');
    Route::put('/manajemen-pembeli/{id}/edit-pembeli', [ManajemenPembeliController::class, 'update'])->name('update-pembeli');
    Route::delete('/manajemen-pembeli/{id}/delete-pembeli', [ManajemenPembeliController::class, 'destroy'])->name('destroy-pembeli');

    Route::get('/statistik-penjualan', [StatistikPenjualanController::class, 'index'])->name('statistik-penjualan');
    Route::get('/statistik-pembeli-penjual', [StatistikPembeliPenjualController::class, 'index'])->name('statistik-pembeli-penjual');
    Route::get('/analitik-pelanggan', [AnalitikPelangganController::class, 'index'])->name('analitik-pelanggan');
});
