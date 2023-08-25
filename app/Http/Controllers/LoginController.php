<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        $credentials =  $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return redirect()->back()->with('message','username atau password salah')
                ->withInput($request->except('password'));
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
