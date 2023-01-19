@extends('layouts.app')
@push('title')
<title>Tambah Pelatih | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Tambah Pelatih</h1>
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
        <form class="settings-form" method="POST" action="{{ route('admin.rayon.coach.create', $data->id) }}"
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
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    value="{{ old('password') }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                    required style="height: 100px">{{ old('address') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <select class="form-control" name="religion" style="width: 100%">
                    @foreach ($religion as $religion)
                    <option value="{{ $religion }}" {{ old('religion') === $religion ? "selected" : "" }}>
                        {{ $religion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jobs" class="form-label">Pekerjaan</label>
                <input name="jobs" type="text" class="form-control @error('jobs') is-invalid @enderror" id="jobs"
                    value="{{ old('jobs') }}" required>
            </div>
            <button type="submit" class="btn app-btn-primary w-100">Tambah Pelatih</button>
        </form>
    </div>
</div>
@endsection
