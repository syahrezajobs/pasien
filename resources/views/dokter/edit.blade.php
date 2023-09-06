@extends('layouts.main')

@section('title', 'Edit Dokter')

@section('content')
<form action="{{ route('dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
    @csrf()
    @method('PUT')
    <div class="form-group">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
        @error('address')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">No HP</label>
        <input type="phone_number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
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
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
@endsection