<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::where('id_penjual',auth('penjual')->user()->id)->get();
        // dd($produks);
        return view("client.produk.index",compact("produks"));
    }

    /**
     * Show the form for creating a new resource.
     *-
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_produks = KategoriProduk::all();
        return view("client.produk.create",compact("kategori_produks"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'id_kategori_produk' => 'required',
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
 
        $produk = Produk::create([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'stok'=>$request->stok??0,
            'id_kategori_produk'=>$request->id_kategori_produk,
            'gambar'=>$url,
            'id_penjual'=> auth('penjual')->user()->id,
        ]);
        return redirect(route('penjual.produk.index'))->with('success','Berhasil Menambahkan Produk');
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
    public function edit(Produk $produk)
    {
        // dd($produk);
        $kategori_produks = KategoriProduk::all();
        return view('client.produk.edit',compact('produk','kategori_produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        
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
            // dd($pathFoto);
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
        return redirect(route('penjual.produk.index'))->with('success','Berhasil Mengedit Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $pathFoto = str_replace(url('/storage'), '', $produk->gambar);
        Storage::delete($pathFoto);
        $produk->delete();
        return redirect(route('list-produk'))->with('success','Berhasil Menghapus Produk');
    }
}
