@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Selamat Datang</h2>
    <p>Ini adalah halaman utama setelah Anda berhasil login.</p>
    <!-- Tambahkan tombol "Tambah" di sini -->
    <a href="{{ route('photos.create') }}" class="btn btn-primary">Tambah Foto</a>
</div>
@endsection
