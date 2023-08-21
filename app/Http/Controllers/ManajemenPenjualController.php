<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;

class ManajemenPenjualController extends Controller
{
    public function index()
    {
        $penjuals = Penjual::all();
        
        return view('penjual',compact('penjuals'));
        // return view('penjual');
    }
}
