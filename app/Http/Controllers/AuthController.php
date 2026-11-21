<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('kamar.index');
        }

        return view('auth.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route('kamar.index'))
                ->with(
                    'success',
                    'Selamat datang, ' . Auth::user()->username . '!'
                );
        }

        return back()
            ->withErrors([
                'username' => 'USername atau password salah.'
            ])
            ->onlyInput('username');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
