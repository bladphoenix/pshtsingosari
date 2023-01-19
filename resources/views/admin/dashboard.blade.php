@extends('layouts.app')
@push('title')
<title>Dashboard | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Dashboard</h1>
<hr class="mb-4">
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Rayon</h4>
                <div class="stats-figure">{{ $data->count() }}</div>
            </div>
            <a class="app-card-link-mask" href="{{ route('admin.rayon.index') }}"></a>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Pelatih</h4>
                <div class="stats-figure">{{ array_sum($data->map(function($value){return $value->coach->count();})->toArray()) }}</div>
            </div>
            <a class="app-card-link-mask" href="{{ route('admin.rayon.index') }}"></a>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Siswa</h4>
                <div class="stats-figure">{{ array_sum($data->map(function($value){return $value->student->count();})->toArray()) }}</div>
            </div>
            <a class="app-card-link-mask" href="{{ route('admin.rayon.index') }}"></a>
        </div>
    </div>
</div>

@endsection
