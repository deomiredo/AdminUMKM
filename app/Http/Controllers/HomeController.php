<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    

    public function home()
    {
        $startdate = Carbon::now('Asia/Jakarta')->subDays(6);
        $enddate = Carbon::now('Asia/Jakarta');
        
        $transaksiPerHari = Transaksi::select(DB::raw('DATE_FORMAT(created_at,"%D") as tanggal'), DB::raw('COUNT(*) as total_transaksi'))
        ->whereBetween('created_at',[$startdate,$enddate])->where('status','selesai')->groupBy('tanggal')->get()->pluck('total_transaksi','tanggal')->toArray();
        for ($date = $startdate; $date <= $enddate; $date->addDay()) {
            $formattedDate = $date->format('d M Y');
            // $tanggal = DateHelpers::tgl_indo($formattedDate);
            $transaksi['label-tanggal'][] = $formattedDate;
            $transaksi['jumlah-transaksi'][] = $transaksiPerHari[$formattedDate] ?? 0;
        }
        // dd($transaksi);
        return view('home.index',compact('transaksi'));
    }
}
