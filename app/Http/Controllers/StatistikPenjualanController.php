<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistikPenjualanController extends Controller
{
    public function index()
    {
        return view('statistik.statistik-penjualan');
    }
}
