<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        return view('produk.kategori-produk');
    }
}
