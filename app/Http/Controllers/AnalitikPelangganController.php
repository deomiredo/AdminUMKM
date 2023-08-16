<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalitikPelangganController extends Controller
{
    public function index()
    {
        return view('statistik.analitik-pelanggan');
    }
}
