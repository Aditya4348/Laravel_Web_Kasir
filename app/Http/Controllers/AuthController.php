<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        
        // Cek apakah username ada di database
        $user = Petugas::where('username', $request->username)->first();
        

        // Jika username tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Username salah');
        }

        // Cek apakah password sesuai
        if (!password_verify($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password salah');
        }

        // Autentikasi user
        auth()->login($user);

        // Redirect berdasarkan role user
        if ($user->role === 'admin') {
            
            return redirect()->route('dashboard');
        }

        return redirect()->route('petugas.dashboard')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Anda telah logout.');
    }
}
