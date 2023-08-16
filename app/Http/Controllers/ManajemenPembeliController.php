<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenPembeliController extends Controller
{
    public function index()
    {
        return view('pembeli');
    }
}
