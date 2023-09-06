@extends('layouts.main')

@section('title', 'Tambah Penjamin')

@section('content')
<form action="{{ route('penjamin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="form-group">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection