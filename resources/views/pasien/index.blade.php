@extends('layouts.main')

@section('title', 'Pasien')

@section('content')
<div class="d-flex">
    <a href="{{ route('pasien.create') }}" class="btn btn-primary">Daftar Pasien Baru</a>
</div>
<table class="table table-bordered" id="datatable" width="100%">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No RM</th>
            <th scope="col">Nama</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Dokter Penanggung Jawab</th>
            <th scope="col">Penjamin</th>
            <th scope="col">Tgl Registrasi</th>
            <th scope="col">Tgl Keluar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pasiens as $pasien)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $pasien->no_rm }}</td>
            <td>{{ $pasien->name }}</td>
            <td>{{ $pasien->room_id }}</td>
            <td>{{ $pasien->dokter_id }}</td>
            <td>{{ $pasien->penjamin_id }}</td>
            <td>{{ date('d-m-Y', strtotime($pasien->created_at)) }}</td>
            <td>{{ date('d-m-Y', strtotime($pasien->tgl_keluar)) }}</td>
            <td>
                <form class="d-inline" action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin')">Hapus</button>
                </form>
                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-success">Edit</a>
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="10" class="text-center">
                Belum ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection