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
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{ $pasien->id }}">
                    Info
                </button>
            </td>
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="detail{{ $pasien->id }}" tabindex="-1" aria-labelledby="detail{{ $pasien->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Info Pasien</h5>
                        </div>
                        <div class="modal-body">
                            <p>No. RM : {{ $pasien->no_rm }}</p>
                            <p>Nama : {{ $pasien->name }}</p>
                            <p>Alamat : {{ $pasien->address }}</p>
                            <p>No. Hp : {{ $pasien->phone }}</p>
                            <p>Jenis kelamin : {{ $pasien->gender }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
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
<form action="{{ route('pasien.index') }}" method="GET">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="no_rm">No RM:</label>
            <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="Masukkan No RM" value="{{ request('no_rm') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="dokter_id">Dokter:</label>
            <select name="dokter_id" id="dokter_id" class="form-control">
                <option value="">Semua Dokter</option>
                @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}" @if(request('dokter_id')==$dokter->id) selected @endif>{{ $dokter->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="room_id">Ruangan:</label>
            <select name="room_id" id="room_id" class="form-control">
                <option value="">Semua Ruangan</option>
                @foreach($rooms as $room)
                <option value="{{ $room->id }}" @if(request('room_id')==$room->id) selected @endif>{{ $room->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="date_start">Tanggal Registrasi Dari:</label>
            <input type="date" class="form-control" id="date_start" name="date_start">
        </div>
        <div class="form-group col-md-3">
            <label for="date_end">Tanggal Registrasi Sampai:</label>
            <input type="date" class="form-control" id="date_end" name="date_end">
        </div>
        <div class="form-group col-md-4" style="margin-top:30px;">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>

@endsection