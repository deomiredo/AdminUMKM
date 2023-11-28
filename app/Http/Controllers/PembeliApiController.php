<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PembeliApiController extends Controller
{
    function profile(String $id){
        $akun = Pembeli::find($id);
        return response()->json(['data' => $akun]);
    }

    function editProfile(Request $request, String $id) {
        $pembeli = Pembeli::find($id);
        // if($request->hasFile('foto')){
        //     return response()->json(['data' => $request->foto,'message'=>'berhasil update akun']);
            
        // }
        // return response()->json(['data' => $request->nama_lengkap,'message'=>'berhasil foto update akun']);
        // $pembeli = Pembeli::findOrFail($id);
        

        $validated = $request->validate(
            [
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'username' => 'required|unique:pembeli,username,'.$pembeli->id,
                'no_hp' => 'required|unique:pembeli,no_hp,'.$pembeli->id,
                'password' => 'required',
                'foto' => 'mimes:jpeg,png,jpg,gif,svg',
                'deskripsi' => 'required',
                
                // 'status' => ['required', Rule::in(Berita::$enumFields['status'])],
                
            ],
            [
                'foto.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
        
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            // dd($gambar);
            $nama_file = Str::uuid() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('images/pembeli', $nama_file);
            $url = Storage::url($path);
            $pembeli->update(['foto'=>$url]);
        }
        dd($request->username, $request->foto);
        $pembeli->update([
            'nama_lengkap'=>$request->nama_lengkap,
            'alamat'=> $request->alamat,
            'username'=>$request->username,
            'no_hp'=>$request->no_hp,
            'password'=>$request->password,
            'deskripsi'=> $request->deskripsi
        ]);
        return response()->json(['data' => $pembeli,'message'=>'berhasil update akun']);
    }
}
