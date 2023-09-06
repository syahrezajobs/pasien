@extends('layouts.main')

@section('title', 'Ruangan')

@section('content')
<div class="d-flex">
    <a href="{{ route('room.create') }}" class="btn btn-primary">Tambah Ruangan</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rooms as $room)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $room->name }}</td>
            <td>
                <form class="d-inline" action="{{ route('room.destroy', $room->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin')">Hapus</button>
                </form>
                <a href="{{ route('room.edit', $room->id) }}" class="btn btn-success">Edit</a>
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="7" class="text-center">
                Belum ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection