@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <h1 class="text-center mb-4">Edit {{ $user->name }}</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="card p-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto (maks 2MB, kosongkan jika tidak ganti)</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            @if($user->photo)
                <img src="{{ asset($user->photo) }}" alt="Foto {{ $user->name }}" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi (opsional)</label>
            <textarea name="description" id="description" class="form-control">{{ $user->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat (opsional)</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
