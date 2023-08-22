<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ManajemenPembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        
        return view('pembeli',compact('pembelis'));
        // return view('pembeli');
    }

    public function create()
    {
        // $kategori_produks = KategoriProduk::all();
        // $penjuals = Penjual::all();
        return view('create-pembeli');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'nama_lengkap' => 'required',
                'username' => 'required',
                'no_hp' => 'required',
                'password' => 'required',
                'verifikasi' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'deskripsi' => 'required',
                
                // 'status' => ['required', Rule::in(Berita::$enumFields['status'])],
                
            ],
            [
                'foto.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        // dd($request->gambar);

        $foto = $request->file('foto');
        // dd($gambar);
        $nama_file = Str::uuid() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('images/penjual', $nama_file);
        $url = Storage::url($path);

        $pembeli = Pembeli::create([
            'nama_lengkap'=>$request->nama_lengkap,
            'username'=>$request->username,
            'no_hp'=>$request->no_hp,
            'password'=>$request->password,
            'verifikasi'=> $request->verifikasi,
            'foto'=>$url,
            'deskripsi'=> $request->deskripsi
        ]);
        return redirect(route('pembeli'))->with('success','Berhasil Menambahkan Pembeli');
    }
}

