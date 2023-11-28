<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    function login(){
        return view("client.login");
    }

    function auth(Request $request){
        $credentials =  $request->validate([
            'username' => 'required',
            'pin' => 'required'
        ]);
        $penjual = Penjual::where('username',$credentials['username'])->where('pin',$credentials['pin'])->first();
        if ($penjual) {
            // dd('berhasil');
            Auth::guard('penjual')->login($penjual);
            // Authentication passed
            return redirect()->intended(route('penjual.dashboard'));
        }
    
        // Authentication failed
        return redirect()->back()->with('message','username atau password salah')
                ->withInput($request->except('password'));
    }
}
