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
        
        return view('penjual.penjual',compact('penjuals'));
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
        return view('penjual.create-penjual');
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
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'nama_toko' => 'required',
                'nama_bank' => 'required',
                'no_rekening' => 'required',
                'atas_nama' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'logo.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        // dd($request->gambar);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('images/penjual', $nama_file);
            $url = Storage::url($path);
        }
        else{
            $url = asset('img/nopict.jpg');
        }
        // $logo = $request->file('logo');
        // // dd($gambar);
        // $nama_file = Str::uuid() . '.' . $logo->getClientOriginalExtension();
        // $path = $logo->storeAs('images/penjual', $nama_file);
        // $url = Storage::url($path);

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

    public function edit($id) {
        $penjual = Penjual::findOrFail($id);

        return view('penjual.edit-penjual',compact('penjual'));
    }

    function update($id, Request $request) {
        $penjual = Penjual::findOrFail($id);

        $validated = $request->validate(
            [
                'nama' => 'required',
                'username' => 'required',
                'no_hp' => 'required',
                'pin' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'nama_toko' => 'required',
                'nama_bank' => 'required',
                'no_rekening' => 'required',
                'atas_nama' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'logo.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        if($request->file('logo'))
        {
            $pathFoto = str_replace(url('/storage'), '', $penjual->logo);
            Storage::delete($pathFoto);

            $gambar = $request->file('logo');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('images/penjual', $nama_file);
            $url = Storage::url($path);
            $penjual->update(['logo'=>$url]);  
        }
        $penjual->update([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'no_hp'=>$request->no_hp,
            'pin'=>$request->pin,
            'nama_toko'=> $request->nama_toko,
            'nama_bank'=> $request->nama_bank,
            'no_rekening'=> $request->no_rekening,
            'atas_nama'=> $request->atas_nama,
            'deskripsi'=> $request->deskripsi
        ]);
        return redirect(route('penjual'))->with('success','Berhasil Mengedit Penjual');
    }

    function destroy($id) {
        $penjual = Penjual::findOrFail($id);
        $pathFoto = str_replace(url('/storage'), '', $penjual->logo);
        Storage::delete($pathFoto);
        $penjual->produks()->delete();
        $penjual->delete();
    }

}
