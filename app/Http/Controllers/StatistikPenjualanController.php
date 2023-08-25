<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatistikPenjualanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        $total = 0;
        foreach($transaksis->where('status','selesai') as $item){
            $total = $total+ $item->total;
        }
        // dd($total);
        // dd($transaksis->where('status','dibatalkan'));
        return view('statistik.statistik-penjualan',compact('transaksis','total'));
    }
}
