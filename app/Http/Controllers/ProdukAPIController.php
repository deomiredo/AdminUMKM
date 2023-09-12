<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukAPIController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::all();
        return response()->json(['data' => $produk]);

    }
}
