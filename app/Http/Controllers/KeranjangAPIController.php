<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pembeli;
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
        $id_pembeli = $request->id_pembeli;
        
        $keranjangPembeli = Keranjang::where('id_pembeli',$id_pembeli)->get();
        $produkSama = $keranjangPembeli->where('id_produk',$request->id_produk)->first();
        if($produkSama){
            $produkSama->update([
                'banyak_produk'=>$produkSama->banyak_produk+1,
            ]);
            return response()->json(['message' => 'berhasil disimpan dan dari produk yang sama']);
        }
        // if id produk yang ditambahkan === id produk di keranjang maka jumlah +1
        // return response()->json(['message' => 'berhasil disimpan']);
        $keranjang = Keranjang::create([
            'id_pembeli'=>$request->id_pembeli,
            'id_produk'=>$request->id_produk,
            'banyak_produk'=>1
        ]);
        return response()->json(['message' => 'berhasil disimpan']);
    }

    function getCart($id) {
        $pembeli = Pembeli::findOrFail($id);
        $keranjang = $pembeli->keranjang()->with('produk')->get();
        return response()->json(['data' => $keranjang]);
    }

    function deleteCart($id) {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return response()->json(['message' => 'berhasil dihapus']);
    }
}
