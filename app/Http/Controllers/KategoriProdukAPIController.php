<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukAPIController extends Controller
{
    function index() {
        $kategori = KategoriProduk::all();
        return response()->json(['data' => $kategori]);
    }

    function produk(KategoriProduk $kategori) {
        $produk = $kategori->produks()->get();
        return response()->json(['data' => $produk]);
    }
}
