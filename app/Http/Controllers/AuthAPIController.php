<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Pembeli;
use App\Models\Penjual;
use Symfony\Contracts\Service\Attribute\Required;

class AuthAPIController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate(
            [
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'username' => 'required|unique:pembeli,username',
                'no_hp' => 'required|unique:pembeli,no_hp',
                'password' => 'required',
                'deskripsi' => 'required',
                
                // 'status' => ['required', Rule::in(Berita::$enumFields['status'])],
                
            ],
            [
                'foto.image' => 'File yang diupload harus bertipe Gambar: jpeg,png,jpg,gif,svg',
                'required'=>'Kolom Harus Di isi'
                // pesan validasi lainnya
            ],
        );
         $url = asset('img/default-profile.jpg');
        
         $pembeli = Pembeli::create([
            'nama_lengkap'=>$request->nama_lengkap,
            'alamat'=> $request->alamat,
            'username'=>$request->username,
            'no_hp'=>$request->no_hp,
            'password'=>$request->password,
            'verifikasi'=>'false',
            'foto'=>$url,
            'deskripsi'=>  $request->deskripsi
        ]);
        // Keranjang::create([
        //     'total'=>0,
        //     'id_pembeli'=>$pembeli->id,
        // ]);
        // dd($request->gambar);
        return response()->json(['data' => "Registrasi Berhasil, Silahkan Hubungi Admin Untuk Verifikasi Akun",
        'status' => 'Berhasil'
    ]);
    }

    function login(Request $request) {
        $validated = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $akun = Pembeli::where('username',$request->username)->where('password',$request->password)->first();
        if($akun){
            if($akun['verifikasi'] == 'false'){
                return response()->json(['data' => "Silahkan Hubungi Admin Untuk Verifikasi Akun",
        'status' => 'noverif'
    ]);
            }
            return response()->json(['data' => "Selamat datang",
        'status' => 'berhasil',
        'id' => $akun->id
    ]);
        }else{
            return response()->json(['data' => "Username atau password salah",
        'status' => 'gagal'
    ]);
        }
    }
}
