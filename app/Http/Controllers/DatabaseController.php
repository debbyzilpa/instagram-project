<?php

namespace App\Http\Controllers;

use App\Models\User; // Ganti dengan model yang sesuai
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data pengguna (atau model yang sesuai)
        return view('database.index', compact('users')); // Buat tampilan ini
    }
}

