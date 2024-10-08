@extends('layouts.app')

@section('content')
    <h1>Edit Profil</h1>

    <form action="{{ route('profile.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nama:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
        </div>

        <button type="submit">Perbarui Profil</button>
    </form>
@endsection
