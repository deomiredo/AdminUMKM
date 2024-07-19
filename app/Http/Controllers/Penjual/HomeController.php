<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualId = auth('penjual')->user()->id;
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $salesData = Transaksi::selectRaw('DATE(transaksi.created_at) as date, SUM(transaksi.total_harga) as total_sales')
        ->join('keranjang', 'transaksi.id_keranjang', '=', 'keranjang.id')
        ->join('keranjang_produk', 'keranjang.id', '=', 'keranjang_produk.id_keranjang')
        ->join('produk', 'keranjang_produk.id_produk', '=', 'produk.id')
        ->where('produk.id_penjual', $penjualId)
        ->where('transaksi.status','SELESAI')
        ->whereBetween('transaksi.created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        $dataPoints = [];
        
        foreach ($salesData as $data) {
            $dataPoints[] = ['date' => $data->date, 'total_sales' => $data->total_sales];
        }
        $jsonData = json_encode($dataPoints);
        // dd(auth('penjual')->user());
        return view("client.home.index",compact('jsonData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
