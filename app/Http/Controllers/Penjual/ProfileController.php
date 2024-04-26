<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    function index()
    {
        $penjual = auth('penjual')->user();
        return view('client.profile.index', compact('penjual'));
    }

    function update(Request $request)
    {
        $penjual = Penjual::findOrFail(auth('penjual')->user()->id);

        $validated = $request->validate(
            [
                'nama' => 'required',
                'username' => 'required',
                'no_hp' => 'required',
                'pin' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'nama_toko' => 'required',
                'alamat' => 'required',
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
        if($request->hasFile('logo'))
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
            'alamat'=> $request->alamat,
            'nama_bank'=> $request->nama_bank,
            'no_rekening'=> $request->no_rekening,
            'atas_nama'=> $request->atas_nama,
            'deskripsi'=> $request->deskripsi
        ]);
        return redirect(route('penjual.profile.index'))->with('success','Berhasil Mengedit Profile');
    }
}
