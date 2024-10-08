<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengirim data user ke view
        return view('profile.edit', compact('user'));
    }
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255'
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->update($request->only('name', 'email', 'username'));

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
