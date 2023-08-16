<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistikPembeliPenjualController extends Controller
{
    public function index()
    {
        return view('statistik.statistik-pembeli-penjual');
    }
}
