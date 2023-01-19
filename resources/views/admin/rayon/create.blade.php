@extends('layouts.app')
@push('title')
<title>Tambah Rayon | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Tambah Rayon</h1>
<hr class="mb-4">
<div class="app-card app-card-settings shadow-sm p-4">
    <div class="app-card-body">
        @if ($errors->any())
        <div class="item mb-3">
            <div class="alert alert-danger m-0 alert-dismissible fade show">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <form class="settings-form" method="POST" action="{{ route('admin.rayon.create') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input name="phone" type="tel" class="form-control @error('name') is-invalid @enderror" id="phone"
                    value="{{ old('phone') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                    required style="height: 100px">{{ old('address') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input name="logo" type="file" class="form-control no-border  @error('logo') is-invalid @enderror"
                    id="logo" value="{{ old('logo') }}">
            </div>
            <button type="submit" class="btn app-btn-primary w-100">Tambah Rayon</button>
        </form>
    </div>
</div>
@endsection
