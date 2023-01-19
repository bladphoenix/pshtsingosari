@extends('layouts.app')
@push('title')
<title>Data Rayon | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Data Rayon</h1>
<hr class="mb-4">
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-sm-12">
                        <p class="lead fw-bold">{{ $data->name }}</p>
                        <p><strong>Telepon :</strong> {{ $data->phone }}</p>
                        <p><strong>Email : </strong> {{ $data->email }}</p>
                        <p><strong>Alamat : </strong> {{ $data->address }}</p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <img src="{{ $data->logo }}" class="img-thumbnail w-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Pelatih</h4>
                <div class="stats-figure">{{ $coach->count() }}</div>
            </div>
            <a class="app-card-link-mask" href="{{ route('admin.rayon.coach.index', $data->id) }}"></a>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Orang Tua</h4>
                <div class="stats-figure">{{ $parent->count() }}</div>
            </div>
            <a class="app-card-link-mask" href="#"></a>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Siswa</h4>
                <div class="stats-figure">{{ $data->student->count() }}</div>
            </div>
            <a class="app-card-link-mask" href="{{ route('admin.rayon.student.index', $data->id) }}"></a>
        </div>
    </div>
</div>
@endsection
