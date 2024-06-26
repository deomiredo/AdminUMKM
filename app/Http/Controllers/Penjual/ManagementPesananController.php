<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ManagementPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualId = auth('penjual')->user()->id;
        $transaksi = Transaksi::with('keranjang', 'keranjang.produk', 'keranjang.pembeli')->whereHas('keranjang.produk.penjual', function ($query) use ($penjualId) {
            $query->where('id', $penjualId);
        })->orderBy('updated_at')->get();
        // dd($transaksi);  
        // $transaksi = $transaksi->produk()->where('id_penjual', $penjual->id)->get();
        // $transaksi = $transaksi->keranjang();
        // dd($transaksi->whereIn('status', ['DIBATALKAN', 'SELESAI']));
        //    dd($transaksi);
        return view("client.pesanan.index", compact("transaksi"));
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

    function updateStatus(Transaksi $transaksi, Request $request)
    {
        // dd($request->status);
        $validate = $request->validate([
            'status' => 'required',
        ]);
        $transaksi->update(['status' => $request->status]);

        return back();
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
