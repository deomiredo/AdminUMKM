<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenPenjualController extends Controller
{
    public function index()
    {
        return view('penjual');
    }
}
