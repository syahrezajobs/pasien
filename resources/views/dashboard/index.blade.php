@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="mb-4 text-gray-100 card bg-primary">
            <div class="card-body">{{ $pasiens }} Pasien</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text-gray-900 small stretched-link" href="{{ route('pasien.index') }}">View Details</a>
                <div class="text-gray-900 small"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="mb-4 text-gray-100 card bg-warning">
            <div class="card-body">{{ $dokters }} Dokter</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text-gray-900 small stretched-link" href="{{ route('dokter.index') }}">View Details</a>
                <div class="text-gray-900 small"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="mb-4 text-gray-100 card bg-success">
            <div class="card-body">{{ $rooms }} Ruangan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text-gray-900 small stretched-link" href="{{ route('room.index') }}">View Details</a>
                <div class="text-gray-900 small"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="mb-4 text-gray-100 card bg-success">
            <div class="card-body">{{ $penjamins }} Penjamin</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text-gray-900 small stretched-link" href="{{ route('penjamin.index') }}">View Details</a>
                <div class="text-gray-900 small"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
@endsection