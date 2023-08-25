<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatistikPembeliPenjualController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::count();
        $pembeli = Pembeli::count();
        $penjual = Penjual::count();
        return view('statistik.statistik-pembeli-penjual',compact('transaksi','pembeli','penjual'));
    }
}
