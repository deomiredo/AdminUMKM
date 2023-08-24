<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Penjual;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        // dd($produk);
        return view('produk.list-produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_produks = KategoriProduk::all();
        $penjuals = Penjual::all();
        return view('produk.create-produk',compact('kategori_produks','penjuals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'id_kategori_produk' => 'required',
                'id_penjual' => 'required',
                'harga' => 'required',
                // 'status' => ['required', Rule::in(Berita::$enumFields['status'])],
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'gambar.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        // dd($request->gambar);

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('images/produk', $nama_file);
            $url = Storage::url($path);
        }
        else{
            $url = asset('img/nopict.jpg');
        }
        // $gambar = $request->file('gambar');
        // // dd($gambar);
        // $nama_file = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
        // $path = $gambar->storeAs('images/produk', $nama_file);
        // $url = Storage::url($path);

        $produk = Produk::create([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'stok'=>$request->stok??0,
            'id_kategori_produk'=>$request->id_kategori_produk,
            'gambar'=>$url,
            'id_penjual'=> $request->id_penjual,
        ]);
        return redirect(route('list-produk'))->with('success','Berhasil Menambahkan Produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $produk = Produk::findOrFail($id);
        $kategori_produks = KategoriProduk::all();
        return view('produk.edit-produk',compact('produk','kategori_produks'));
        
    }

    function update($id, Request $request) {
        $produk = Produk::findOrFail($id);
        
        $validated = $request->validate(
            [
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'id_kategori_produk'=>'required',
                'harga' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif',
            ],
            [
                'gambar.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
            ],
        );
        // dd($request);
        // dd($request->gambar);

        if($request->file('gambar')){
            $pathFoto = str_replace(url('/storage'), '', $produk->gambar);
            Storage::delete($pathFoto);

            $gambar = $request->file('gambar');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('images/produk', $nama_file);
            $url = Storage::url($path);
            $produk->update(['gambar'=>$url]);  
        }


        $produk->update([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'id_kategori_produk'=>$request->id_kategori_produk,
            'harga'=>$request->harga,
            'stok'=>$request->stok??0,
        ]);
        return redirect(route('list-produk'))->with('success','Berhasil Mengedit Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $pathFoto = str_replace(url('/storage'), '', $produk->gambar);
        Storage::delete($pathFoto);
        $produk->delete();
        return redirect(route('list-produk'))->with('success','Berhasil Menghapus Produk');
    }
}
