<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produks = KategoriProduk::all();
        // dd($produk);
        return view('produk.kategori-produk',compact('kategori_produks'));
    }
}
