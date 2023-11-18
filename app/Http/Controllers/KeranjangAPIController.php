<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangAPIController extends Controller
{
    public function addCart(Request $request) {

        // $id_pembeli = $request->id_pembeli;
        
        // $keranjangPembeli = Keranjang::where('id_pembeli',$id_pembeli)->get();
        // if($keranjangPembeli){
        //     $penjualDiKeranjang = $keranjangPembeli[0]->produk->id_penjual;
        // }else{
        //     $produk = Produk::find($request->id_produk);
        //     $total = $produk->harga * $request->banyak_produk;
        //     $keranjang = Keranjang::create([
        //         'total'=>$total,
        //         'id_pembeli'=>$request->id_pembeli,
        //         'id_produk'=>$request->id_produk,
        //         'banyak_produk'=>$request->banyak_produk
        //     ]);
        // }

        $produk = Produk::find($request->id_produk);
        $total = $produk->harga * $request->banyak_produk;
        $keranjang = Keranjang::create([
            'total'=>$total,
            'id_pembeli'=>$request->id_pembeli,
            'id_produk'=>$request->id_produk,
            'banyak_produk'=>$request->banyak_produk
        ]);
        return response()->json(['message' => 'berhasil disimpan']);
    }

    function getCart($id) {
        
    }
}
