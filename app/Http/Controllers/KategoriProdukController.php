<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produks = KategoriProduk::all();
        // dd($produk);
        return view('produk.kategori-produk', compact('kategori_produks'));
    }

    public function create()
    {
        return view('produk.create-kategori-produk');
    }

    public function store(Request $request)
    {
        // dd($request->nama_kategori);
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produk,nama_kategori'
        ], [
            'required' => 'kolom tidak boleh kosong', 
            'unique' => 'Nama Kategori sudah ada'
        ]);

        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect(route('kategori-produk'))->with('success', 'Berhasil Menambahkan Kategori Produk');
    }

    public function edit($id) {
        $kategori_produk = KategoriProduk::find($id);

        return view('produk.edit-kategori-produk',compact('kategori_produk'));
        
    }

    function update($id, Request $request) {
        $kategoriProduk = KategoriProduk::find($id);
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produk,nama_kategori,'.$id
        ], [
            'required' => 'kolom tidak boleh kosong', 
            'unique' => 'Nama Kategori sudah ada'
        ]);

        $kategoriProduk->update([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect(route('kategori-produk'))->with('success', 'Berhasil Mengedit Kategori Produk');
    }

    function destroy($id) {
        $kategoriProduk = KategoriProduk::find($id);
        $kategoriProduk->produks()->delete();
        $kategoriProduk->delete();
        return redirect(route('kategori-produk'))->with('success', 'Berhasil Menghapus Kategori Produk');
    }
}
