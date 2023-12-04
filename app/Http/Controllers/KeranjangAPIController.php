<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Pembeli;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangAPIController extends Controller
{
    public function addCart(Request $request)
    {
        $validate = $request->validate([
            'id_produk' => 'required',
            'id_pembeli' => 'required',
        ]);
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

        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($request->id_produk);
        if($produk->stok < 1){
            return response()->json(['message' => 'Stok habis']);
        }

        // Cek apakah pembeli sudah memiliki keranjang
        $pembeliId = $request->id_pembeli;
        $keranjang = Keranjang::where('id_pembeli', $pembeliId)->first();
        // Jika pembeli belum memiliki keranjang, buat keranjang baru
        if (!$keranjang) {
            $keranjang = Keranjang::create(['id_pembeli' => $pembeliId]);
        }

        //jika ada produk di keranjang
        if (count($keranjang->produk) > 0) {
            $penjualyangsama = $keranjang
                ->produk()
                ->where('id_penjual', $produk->id_penjual)
                ->first();
            //jika ada penjual yang sama dengan produk yg dipilih
            if ($penjualyangsama) {
                $isProdukExist = $keranjang
                    ->produk()
                    ->where('id_produk', $produk->id)
                    ->exists();
                //jika dikeranjang sudah ada produknya maka tambah jumlahnya
                if ($isProdukExist) {
                    $keranjangProduk = $keranjang
                        ->produk()
                        ->where('id_produk', $produk->id)
                        ->first();
                    if($keranjangProduk->pivot->jumlah+1 > $produk->stok){
                        return response()->json(['message' => 'Stok terbatas']);
                    }
                    $keranjangProduk->pivot->update([
                        'jumlah' => $keranjangProduk->pivot->jumlah + 1,
                    ]);
                } else {
                    // Jika produk belum ada dalam keranjang, tambahkan ke keranjang
                    KeranjangProduk::create([
                        'id_keranjang' => $keranjang->id,
                        'id_produk' => $produk->id,
                        'jumlah' => 1,
                    ]);
                }
            }else{
                return response()->json(['message' => 'Dikarenakan penjual berbeda apakah yakin menghapus keranjang yang ada?','status'=>'beda penjual']);
            }

            // Jika produk sudah ada dalam keranjang, tambahkan jumlahnya
        }else{
            KeranjangProduk::create([
                'id_keranjang' => $keranjang->id,
                'id_produk' => $produk->id,
                'jumlah' => 1,
            ]);
        }

        // Cek apakah produk sudah ada dalam keranjang

       

        // $id_pembeli = $request->id_pembeli;

        // $keranjangPembeli = Keranjang::where('id_pembeli',$id_pembeli)->get();
        // $produkSama = $keranjangPembeli->where('id_produk',$request->id_produk)->first();
        // if($produkSama){
        //     $produkSama->update([
        //         'banyak_produk'=>$produkSama->banyak_produk+1,
        //     ]);
        //     return response()->json(['message' => 'berhasil disimpan dan dari produk yang sama']);
        // }
        // // if id produk yang ditambahkan === id produk di keranjang maka jumlah +1
        // // return response()->json(['message' => 'berhasil disimpan']);
        // $keranjang = Keranjang::create([
        //     'id_pembeli'=>$request->id_pembeli,
        //     'id_produk'=>$request->id_produk,
        //     'banyak_produk'=>1
        // ]);
        return response()->json(['message' => 'berhasil disimpan']);
    }

    function getCart($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        //ambil data keranjangnya
        $keranjang = Keranjang::with('produk')
            ->where('id_pembeli', $pembeli->id)
            ->first();
        //seleksi produk yang dalam keranjang melebihi stok 
        $dataProdukOverStok = [];
        foreach ($keranjang->produk as $key => $produk) {
            if($produk->pivot->jumlah > $produk->stok){
                $dataProdukOverStok[]=$produk;
                //opsi 1: langsung hapus produk dari keranjang
                KeranjangProduk::find($produk->pivot->id)->delete();
                //opsi 2: mengurangi jumlah produk berdasarkan minimal stok yang ada
                    //tetapi jika stok 0 maka produk dalam keranjang dihapus
                // $produkInKeranjang = KeranjangProduk::find($produk->pivot->id);
                // $produkInKeranjang->update(['jumlah'=>$produk->stok]);
            }
        }
        $keranjang = Keranjang::with('produk')
        ->where('id_pembeli', $pembeli->id)
        ->first();
        // $keranjang = $pembeli->keranjang()->with('produk')->get();
        return response()->json(['data' => $keranjang,'dataProdukOverStok'=> $dataProdukOverStok]);
    }

    function updateCart(Request $request){

        $validate = $request->validate([
            'id_pembeli'=> 'required',
            'id_produk'=>'required'
        ]);
        //membutuhkan request id_produk dan id_pembeli
        $pembeli = Pembeli::findOrFail($request->id_pembeli);
        $keranjang = Keranjang::where('id_pembeli',$pembeli->id)->first();
        DB::table('keranjang_produk')->where('id_keranjang', $keranjang->id)->delete();
        $keranjang->forceDelete();

        
        return $this->addCart($request);
    }

    function deleteProdukCart($id)
    {
        $keranjang = KeranjangProduk::findOrFail($id);
        $keranjang->delete();
       
        return response()->json(['message' => 'berhasil dihapus']);
    }
}
