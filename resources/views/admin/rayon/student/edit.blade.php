@extends('layouts.app')
@push('title')
<title>Edit Siswa | {{ config('setting.name') }}</title>
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
@endpush
@section('content')
<h1 class="app-page-title">Edit Siswa</h1>
<hr class="mb-4">
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <p class="lead fw-bold">{{ $data->name }}</p>
                        <p><strong>Tingkat : </strong> {{ $data->level->name }}</p>
                        <p><strong>Alamat : </strong> {{ $data->address }}</p>
                        <p><strong>Tanggal Lahir :</strong> {{ $data->dob }}</p>
                        <p><strong>Tempat Lahir :</strong> {{ $data->birth_place }}</p>
                        <p><strong>Weton:</strong> {{ $data->weton }}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="settings-form" method="POST" action="{{ route('admin.rayon.student.update', [$rayon->id, $data->id]) }}"
    enctype="multipart/form-data">
    @csrf
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Orang Tua</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Siswa</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="app-card app-card-settings shadow-sm">
                <div class="app-card-body p-4">
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
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" value="{{ old('name', $data->parent->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" value="{{ old('phone', $data->parent->phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email', $data->parent->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                            id="address" required style="height: 100px">{{ old('address', $data->parent->address) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="religion" class="form-label">Agama</label>
                        <select class="form-control" name="religion" style="width: 100%">
                            @foreach ($religion as $religion)
                            <option value="{{ $religion }}" {{ old('religion', $data->parent->religion) === $religion ? "selected" : "" }}>
                                {{ $religion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jobs" class="form-label">Pekerjaan</label>
                        <input name="jobs" type="text" class="form-control @error('jobs') is-invalid @enderror"
                            id="jobs" value="{{ old('jobs', $data->parent->jobs) }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="app-card app-card-settings shadow-sm">
                <div class="app-card-body p-4">
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="name_student" class="form-label">Nama</label>
                            <input name="name_student" type="text"
                                class="form-control @error('name_student') is-invalid @enderror" id="name_student"
                                value="{{ old('name_student', $data->name) }}" required>
                        </div>
                        <div class="col-6">
                            @if($data->photo)
                            <img src="{{ $data->photo }}" alt="{{ $data->name }}" class="rounded-circle img-thumbnail">
                            @endif
                            <label for="photo" class="col-sm-2 col-form-label form-label">Foto</label>
                            <input type="file" name="photo" class="form-control form-control-sm no-border">
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="birth_place" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control  @error('birth_place') is-invalid @enderror"
                                value="{{ old('birth_place', $data->birth_place) }}" name="birth_place">
                        </div>
                        <div class="col-6">
                            <label for="dob" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control  @error('dob') is-invalid @enderror"
                                value="{{ old('dob', $data->dob) }}" id="datepicker" name="dob">
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="weton" class="form-label">Weton</label>
                            <select class="form-control" name="weton" id="weton" style="width: 100%">
                                @foreach ($weton as $weton)
                                <option value="{{ $weton }}" {{ old('weton', $data->weton) === $weton ? "selected" : "" }}>
                                    {{ $weton }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="level" class="form-label">Tingkatan</label>
                            <select class="form-control" name="level" id="level" style="width: 100%">
                                @foreach ($level as $key => $level )
                                <option value="{{ $key }}" {{ old('level', $data->level_id) === $key ? "selected" : "" }}>
                                    {{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="school" class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control @error('school') is-invalid @enderror"
                                value="{{ old('school', $data->school) }}" name="school">
                        </div>
                        <div class="col-6">
                            <label for="class" class="form-label">Kelas</label>
                            <input type="number" class="form-control  @error('class') is-invalid @enderror"
                                value="{{ old('class', $data->class) }}" name="class">
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="certificate" class="form-label">Ijazah Terakhir</label>
                            <input name="certificate" type="text"
                                class="form-control @error('certificate') is-invalid @enderror" id="certificate"
                                value="{{ old('certificate', $data->certificate) }}" required>
                        </div>
                        <div class="col-6">
                            <label for="blood_type" class="form-label">Golongan Darah</label>
                            <input name="blood_type" type="text"
                                class="form-control @error('blood_type') is-invalid @enderror" id="blood_type"
                                value="{{ old('blood_type', $data->blood_type) }}" required>
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="weight" class="form-label">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight', $data->weight) }}" name="weight">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="height" class="form-label">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" class="form-control  @error('height') is-invalid @enderror"
                                    value="{{ old('height', $data->height) }}" name="height">
                                <span class="input-group-text">Cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start mb-3">
                        <div class="col-6">
                            <label for="disease" class="form-label">Riwayat Penyakit</label>
                            <textarea class="form-control  @error('disease') is-invalid @enderror" style="height: 100px"
                                name="disease">{{ old('disease', $data->disease) }}</textarea>
                        </div>
                        <div class="col-6">
                            <label for="notes" class="form-label">Lain Lain</label>
                            <textarea class="form-control  @error('notes') is-invalid @enderror" style="height: 100px"
                                name="notes">{{ old('notes', $data->notes) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn app-btn-primary w-100">Ubah Siswa</button>
    </div>
</form>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script type="text/javascript">
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        minDate: moment().subtract(100, 'year'),
        maxDate: moment().subtract(5, 'year'),
        startDate: moment().subtract(5, 'year'),
    });
</script>
@endpush
@endsection
