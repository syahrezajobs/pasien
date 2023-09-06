@extends('layouts.main')

@section('title', 'Dokter')

@section('content')
<div class="d-flex">
    <a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dokters as $dokter)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $dokter->name }}</td>
            <td>{{ $dokter->address }}</td>
            <td>{{ $dokter->phone }}</td>
            <td>{{ $dokter->gender }}</td>
            <td>
                <form class="d-inline" action="{{ route('dokter.destroy', $dokter->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin')">Hapus</button>
                </form>
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-success">Edit</a>
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