<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_process(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username tidak terisi!',
            'password.required' => 'Password tidak terisi!'
        ]);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Sukses login!');
        }
        return redirect()->back()->with('error', 'Username atau password salah!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
