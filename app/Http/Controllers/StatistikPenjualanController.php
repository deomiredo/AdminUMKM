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
        $items = $transaksis->where('status','selesai');
        foreach($items as $item){
            $total = $total+ $item->total;
        }
        $avg = $total/(count($items)>0 ?count($items):1);
        // dd($total);
        // dd($transaksis->where('status','dibatalkan'));
        return view('statistik.statistik-penjualan',compact('transaksis','avg'));
    }
}
