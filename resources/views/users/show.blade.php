@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <h1 class="text-center mb-4">Detail {{ $user->name }}</h1>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h5 class="card-title"><strong>Nama:</strong> {{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $user->description ?: 'Tidak ada deskripsi' }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $user->address ?: 'Tidak ada alamat' }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
@endsection
