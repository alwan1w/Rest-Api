@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
    <h1 class="text-center mb-4">Tambah Pengguna Baru</h1>
    <form action="{{ route('users.store') }}" method="POST" class="card p-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto (maks 2MB)</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi (opsional)</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat (opsional)</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
