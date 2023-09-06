@extends('layouts.main')

@section('title', 'Penjamin')

@section('content')
<div class="d-flex">
    <a href="{{ route('penjamin.create') }}" class="btn btn-primary">Tambah Penjamin</a>
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
        @forelse($penjamins as $penjamin)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $penjamin->name }}</td>
            <td>
                <form class="d-inline" action="{{ route('penjamin.destroy', $penjamin->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin')">Hapus</button>
                </form>
                <a href="{{ route('penjamin.edit', $penjamin->id) }}" class="btn btn-success">Edit</a>
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