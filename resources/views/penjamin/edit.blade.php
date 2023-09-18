@extends('layouts.main')

@section('title', 'Edit Penjamin')

@section('content')
<form action="{{ route('penjamin.update', $penjamin->id) }}" method="POST" enctype="multipart/form-data">
    @csrf()
    @method('PUT')
    <div class="form-group">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $penjamin->name) }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
@endsection