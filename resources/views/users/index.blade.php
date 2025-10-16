@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <h1 class="text-center mb-4">Daftar Pengguna</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card d-flex flex-row align-items-start p-3">
                    <div class="flex-grow-1">
                        <h5 class="card-title text-truncate" style="max-width: 200px;">{{ $user->name }}</h5>
                        <p class="card-text text-truncate" style="max-width: 200px;">{{ $user->description }}</p>
                        <p class="card-text"><small class="text-muted text-truncate" style="max-width: 200px;">{{ $user->address }}</small></p>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm me-2">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                        </div>
                    </div>
                    @if($user->photo)
                        <img src="{{ asset($user->photo) }}" alt="Foto {{ $user->name }}" class="ms-3" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;"> <!-- Bikin bulat untuk lebih rapi, atau ganti radius ke 5px kalau mau kotak -->
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
