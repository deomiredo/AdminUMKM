<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use App\Models\Transaksi;

class AnalitikPelangganController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('statistik.analitik-pelanggan',compact('pembelis'));

        // return view('pembeli');
    }
}
