@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Unggah Foto Baru</h2>

    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form untuk mengunggah foto -->
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="upload-form">
        @csrf
        <div class="form-group">
            <label for="photo" class="upload-label">Pilih Foto</label>
            <input type="file" name="photo" id="photo" class="upload-input" required>
            <!-- Menampilkan pesan error jika validasi gagal -->
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="caption" class="upload-label">Caption</label>
            <textarea name="caption" id="caption" class="upload-input" placeholder="Tambahkan caption (opsional)"></textarea>
            @error('caption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn-upload">Unggah</button>
    </form>
</div>
<style>
    .container {
        max-width: 450px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        color: #262626;
    }

    h2 {
        font-size: 22px;
        color: #262626;
        font-weight: 600;
        text-align: center;
        margin-bottom: 20px;
    }

    .upload-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .upload-label {
        font-size: 14px;
        font-weight: 500;
        color: #8e8e8e;
    }

    .upload-input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #dbdbdb;
        border-radius: 6px;
        background-color: #fafafa;
        color: #262626;
    }

    input[type="file"] {
        padding: 5px;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    .btn-upload {
        width: 100%;
        padding: 10px 0;
        background-color: #0095f6;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        text-align: center;
    }

    .btn-upload:hover {
        background-color: #007bbf;
    }

    textarea::placeholder {
        color: #8e8e8e;
        font-size: 14px;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
        color: white;
    }

    .alert-success {
        background-color: #28a745;
    }

    .alert-danger {
        background-color: #dc3545;
    }
</style>
@endsection
