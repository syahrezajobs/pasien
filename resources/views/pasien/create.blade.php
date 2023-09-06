@extends('layouts.main')

@section('title', 'Daftar Pasien')

@section('content')
<form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    <input type="hidden" id="no_rm" name="no_rm" value="">
    <div class="form-group">
        <label for="name" class="form-label">Nama:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">No HP:</label>
        <input type="phone_number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address" class="form-label">Alamat:</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
        @error('address')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <p>Jenis Kelamin:</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki">
            <label class="form-check-label" for="laki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
            <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
    </div>
    <div class="form-group">
        <label for="dokter_id" class="form-label">Pilih Dokter Penanggung Jawab:</label>
        <select name="dokter_id" class="form-control">
            @foreach($dokters as $dokter)
            <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="penjamin_id" class="form-label">Pilih Penjamin:</label>
        <select name="penjamin_id" class="form-control">
            @foreach($penjamins as $penjamin)
            <option value="{{ $penjamin->id }}">{{ $penjamin->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="room_id" class="form-label">Pilih Ruangan:</label>
        <select name="room_id" class="form-control">
            @foreach($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_keluar" class="form-label">Tanggal Pulang:</label>
        <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" id="tgl_keluar" value="{{ old('tgl_keluar') }}">
        @error('tgl_keluar')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection