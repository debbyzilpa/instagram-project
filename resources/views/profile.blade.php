@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .profile-header img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        margin-right: 20px;
    }

    .profile-info {
        text-align: left;
    }

    .profile-info h2 {
        margin: 0;
        color: #333;
    }

    .profile-info p {
        margin: 5px 0;
        color: #555;
    }

    .btn-edit {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('path/to/profile-pic.jpg') }}" alt="Profile Picture"> <!-- Ganti dengan path gambar profil -->
        <div class="profile-info">
            <h2>{{ Auth::user()->name }}</h2>
            <p>Email: {{ Auth::user()->email }}</p>
            <p>Username: {{ Auth::user()->username }}</p>
        </div>
    </div>
    <a href="{{ route('profile.edit') }}" class="btn-edit">Edit Profil</a>
</div>
@endsection
