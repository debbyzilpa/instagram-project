<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Menampilkan semua foto terbaru di halaman utama
    public function index()
    {
        $photos = Photo::with('user', 'likes')->latest()->get();
        return view('photos.index', compact('photos'));
    }

    // Menampilkan form unggah foto
    public function create()
    {
        return view('photos.create');
    }

    // Menyimpan foto yang diunggah
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur ukuran maksimal gambar
            'caption' => 'nullable|string|max:255',
        ]);

        // Cek apakah file foto berhasil diunggah
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');

            // Simpan data foto ke dalam database
            Photo::create([
                'photo_path' => basename($photoPath), // Simpan nama file saja
                'caption' => $request->input('caption'),
                'user_id' => auth()->id(), // Pastikan user login
            ]);

            return redirect()->route('photos.index')->with('success', 'Foto berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah foto.');
    }

    // Menampilkan form untuk mengedit foto
    public function edit(Photo $photo)
    {
        // Cek apakah user yang sedang login adalah pemilik foto
        if ($photo->user_id !== auth()->id()) {
            return redirect()->route('photos.index')->with('error', 'Anda tidak diizinkan untuk mengedit foto ini.');
        }

        return view('photos.edit', compact('photo'));
    }

    // Menyimpan perubahan foto
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        // Cek apakah user yang sedang login adalah pemilik foto
        if ($photo->user_id !== auth()->id()) {
            return redirect()->route('photos.index')->with('error', 'Anda tidak diizinkan untuk mengedit foto ini.');
        }

        $photo->update([
            'caption' => $request->caption,
        ]);

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diperbarui!');
    }

    // Menghapus foto
    public function destroy(Photo $photo)
    {
        // Cek apakah user yang sedang login adalah pemilik foto
        if ($photo->user_id !== auth()->id()) {
            return redirect()->route('photos.index')->with('error', 'Anda tidak diizinkan untuk menghapus foto ini.');
        }

        Storage::delete('public/photos/' . $photo->photo_path);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus!');
    }
    // Fungsi untuk men-like foto
    public function like(Photo $photo)
    {
        if (!$photo->likes()->where('user_id', auth()->id())->exists()) {
            Like::create([
                'user_id' => auth()->id(),
                'photo_id' => $photo->id,
            ]);
        }
        return redirect()->back()->with('success', 'Foto berhasil di-like!');
    }

    // Fungsi untuk meng-unlike foto
    public function unlike(Photo $photo)
    {
        $like = $photo->likes()->where('user_id', auth()->id())->first();
        if ($like) {
            $like->delete();
        }

        return redirect()->back()->with('success', 'Like berhasil dihapus.');
    }
}
