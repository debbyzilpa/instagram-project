@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fafafa;
            color: #262626;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #dbdbdb;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #262626;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #dbdbdb;
        }

        .card-img-top {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 10px;
        }

        .card-text {
            font-size: 14px;
            color: #262626;
            margin: 5px 0;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-top: 1px solid #efefef;
        }

        .btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #262626;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn:hover {
            color: #3897f0;
        }

        .likes-count {
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Tombol tambah dengan efek yang menarik */
        .btn-add {
            /* Tambahkan gaya sesuai keinginan */
            background-color: #ff5e62;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
        }


        .btn-add:hover {
            background: linear-gradient(45deg, #ff9966, #ff5e62);
            /* Warna berubah saat hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            /* Efek bayangan lebih besar saat hover */
        }

        .btn-add i {
            font-size: 28px;
        }
    </style>

    <div class="container">
        <h2>Foto Terbaru</h2>

        @foreach ($photos as $photo)
            <div class="card">
                <img src="{{ asset('storage/photos/' . $photo->photo_path) }}" class="card-img-top" alt="Foto">
                <div class="card-body">
                    <p class="card-text">{{ $photo->caption }}</p>
                    <p class="card-text"><small>Diunggah oleh: {{ $photo->user->name }}</small></p>
                </div>
                <div class="card-footer">
                    @if ($photo->likes()->where('user_id', Auth::id())->exists())
                        <form action="{{ route('photos.unlike', $photo->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="fas fa-heart-broken"></i> Unlike
                            </button>
                        </form>
                    @else
                        <form action="{{ route('photos.like', $photo->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="fas fa-heart"></i> Like
                            </button>
                        </form>
                    @endif
                    <span class="likes-count">{{ $photo->likes->count() }} likes</span>
                    @if (Auth::id() === $photo->user_id)
                        <div class="action-buttons">
                            <a href="{{ route('photos.edit', $photo->id) }}" class="btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol tambah dengan ikon + di bagian bawah -->
    <a href="{{ route('photos.create') }}" class="btn-add">
        <i class="fas fa-plus"></i>
    </a>
@endsection
