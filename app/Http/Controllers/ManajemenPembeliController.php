<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class ManajemenPembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        
        return view('pembeli',compact('pembelis'));
        // return view('pembeli');
    }
}
