<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Menyimpan data login dan memulai sesi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Login berhasil
            return redirect()->intended('photos.index')->with('success', 'Login berhasil.');
        }
        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
