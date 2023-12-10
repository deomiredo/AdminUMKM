<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pembeli;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransaksiAPIController extends Controller
{
    function addTransaksi(Request $request) {
        $validate = $request->validate([
            "id_pembeli"=> "required",
        ]);
        $keranjang = Keranjang::where('id_pembeli', $request->id_pembeli)->first();
        $produkInCart = $keranjang->produk()->get();
        // dd($produkInCart);
        $total = 0;
        foreach ($produkInCart as $key => $value) {
            $harga = $value->harga*$value->pivot->jumlah;
            $total += $harga;
        }
        Transaksi::create([
            'id_keranjang'=>$keranjang->id,
            'total_harga'=>$total,
            'status'=>'belum dibayar',
            'metode_pembayaran'=>'cod'
        ]);
        
        foreach($produkInCart as $product){
            $product->update([
                'stok'=>$product->stok-$product->pivot->jumlah
            ]);
        }
        
        $keranjang->delete();

        return response()->json(['message' => 'Transaksi Berhasil ditambahkan','status'=>'success']); 
    }

    function riwayatTransaksi(Pembeli $pembeli) {

        
        $riwayatTransaksi = Transaksi::whereHas('keranjang', function ($query) use ($pembeli) {
            $query->withTrashed();
            $query->where('id_pembeli', $pembeli->id);
        })->with('keranjang','keranjang.produk','keranjang.produk.penjual')->get();
        return response()->json(['data' => $riwayatTransaksi,'status'=>'success']); 
    }

    function updateBukti(Transaksi $transaksi, Request $request) {
        $validate = $request->validate([
            'bukti'=> 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('bukti')){
            $gambar = $request->file('bukti');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('images/transaksi/bukti', $nama_file);
            $url = Storage::url($path);
        }

        $transaksi->update([
            'status'=>'menunggu verifikasi',
            'bukti'=> $url,
        ]);
        return response()->json(['message' => 'Bukti berhasil diupload, silahkan menuggu verifikasi penjual','status'=>'success']); 
    }

   
}
