@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
    <h1 class="text-center mb-4">Detail {{ $user->name }}</h1>
    <div class="card shadow-sm">
        <div class="card-body d-flex align-items-center p-4">
            @if($user->photo)
                <img src="{{ asset($user->photo) }}" alt="Foto {{ $user->name }}" class="me-4" style="width: 120px; height: 160px; object-fit: cover; border: 2px solid #dee2e6; border-radius: 5px;">
            @else
                <div class="me-4" style="width: 120px; height: 160px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; border: 2px solid #dee2e6; border-radius: 5px;">No Image</div>
            @endif
            <div class="flex-grow-1">
                <h5 class="card-title"><strong>Nama:</strong> {{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $user->description ?: 'Tidak ada deskripsi' }}</p>
                <p class="card-text"><strong>Alamat:</strong> {{ $user->address ?: 'Tidak ada alamat' }}</p>
                <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
