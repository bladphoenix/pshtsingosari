@extends('layouts.app')
@push('title')
<title>Edit Pelatih | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Edit Pelatih</h1>
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
                        <img src="{{ $data->photo_url }}" class="w-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <form class="settings-form" method="POST" action="{{ route('admin.rayon.coach.update', [$rayon->id, $data->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name', $data->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input name="phone" type="tel" class="form-control @error('name') is-invalid @enderror" id="phone"
                    value="{{ old('phone', $data->phone) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email', $data->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                    required style="height: 100px">{{ old('address', $data->address) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <select class="form-control" name="religion" style="width: 100%">
                    @foreach ($religion as $religion)
                    <option value="{{ $religion }}"
                        {{ old('religion') === $data->religion || old('religion') === $religion ? "selected" : "" }}>
                        {{ $religion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jobs" class="form-label">Pekerjaan</label>
                <input name="jobs" type="text" class="form-control @error('jobs') is-invalid @enderror" id="jobs"
                    value="{{ old('jobs', $data->jobs) }}" required>
            </div>
            <button type="submit" class="btn app-btn-primary w-100">Ubah Pelatih</button>
        </form>
    </div>
</div>
@endsection
