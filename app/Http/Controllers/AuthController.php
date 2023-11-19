<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->route('absensi.index')->with('success', 'Berhasil Login');
        }

        // Login gagal
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
