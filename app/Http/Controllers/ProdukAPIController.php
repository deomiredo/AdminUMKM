<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukAPIController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::with('kategori','penjual')->get();;
        return response()->json(['data' => $produk]);

    }

    public function categoryProduk($id) {
        $produk = Produk::find($id);
        $category = $produk->kategori->nama_kategori;
        return response()->json(['data' => $category]);
    }

    public function moreProduk($id) {
        $produk = Produk::find($id);
        $products = Produk::where('id_penjual',$produk->id_penjual)->whereNotIn('id', [$id])->inRandomOrder()->take(5)->get();
        return response()->json(['data' => $products]);
    }

    public function lastFive(){
        $produk = Produk::orderBy('id','desc')->limit(5)->get();
        return response()->json(['data' => $produk]);
    }

    function random() {
        $produk = Produk::inRandomOrder()->get();
        return response()->json(['data' => $produk]);
    }

    public function searchProduk(Request $request){
        $query = $request->query('query');
        $categoryFilter = $request->query('categoryFilter');
        

        $products = Produk::query();

        if ($query) {
            $products->where('nama_produk', 'like', "%$query%");
        }

        if ($categoryFilter) {
            $products->whereHas('kategori', function ($query) use ($categoryFilter) {
                $query->where('nama_kategori', $categoryFilter);
            });
        }
        

        $result = $products->get();

        return response()->json(['data' => $result]);
    }
    public function komentar($id){
        $produk = Produk::find($id);
        $komentar = Komentar::with ('pembeli')->where ('id_produk', $id)->get();
        return response()->json(['data' => $komentar]);
    }

}
