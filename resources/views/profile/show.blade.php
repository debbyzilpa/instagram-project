@extends('layouts.app')

@section('content')
    <h1>Profil Pengguna</h1>
    <p>Nama: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <a href="{{ route('profile.edit') }}">Edit Profil</a>
@endsection
