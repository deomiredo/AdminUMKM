<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ManajemenPenjualController extends Controller
{
    public function index()
    {
        $penjuals = Penjual::all();
        
        return view('penjual',compact('penjuals'));
        // return view('penjual');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategori_produks = KategoriProduk::all();
        // $penjuals = Penjual::all();
        return view('create-penjual');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'nama' => 'required',
                'username' => 'required',
                'no_hp' => 'required',
                'pin' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'nama_toko' => 'required',
                'nama_bank' => 'required',
                'no_rekening' => 'required',
                'atas_nama' => 'required',
                'deskripsi' => 'required',
                
                // 'status' => ['required', Rule::in(Berita::$enumFields['status'])],
                
            ],
            [
                'logo.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        // dd($request->gambar);

        $logo = $request->file('logo');
        // dd($gambar);
        $nama_file = Str::uuid() . '.' . $logo->getClientOriginalExtension();
        $path = $logo->storeAs('images/penjual', $nama_file);
        $url = Storage::url($path);

        $penjual = Penjual::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'no_hp'=>$request->no_hp,
            'pin'=>$request->pin,
            'logo'=>$url,
            'nama_toko'=> $request->nama_toko,
            'nama_bank'=> $request->nama_bank,
            'no_rekening'=> $request->no_rekening,
            'atas_nama'=> $request->atas_nama,
            'deskripsi'=> $request->deskripsi
        ]);
        return redirect(route('penjual'))->with('success','Berhasil Menambahkan Penjual');
    }
}
