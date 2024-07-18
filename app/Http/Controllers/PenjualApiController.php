<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PenjualApiController extends Controller
{
    function profile(String $id){
        $akun = Penjual::find($id);
        return response()->json(['data' => $akun]);
    }
}
