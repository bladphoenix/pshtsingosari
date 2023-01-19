@extends('layouts.app')
@push('title')
<title>Pendaftaran Siswa | {{ config('setting.name') }}</title>
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
@endpush
@section('content')
<h1 class="app-page-title">Pendaftaran Siswa</h1>
<hr class="mb-4">
<div class="app-card app-card-chart shadow-sm p-4">
    <div class="app-card-header p-3">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <h4 class="app-card-title">Data Anak / Siswa</h4>
            </div>
        </div>
    </div>
    <div class="app-card-body p-3 p-lg-4">
        <form class="settings-form" _lpchecked="1" method="POST" action="{{ route('student.create') }}"
        enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="rayon" class="col-sm-2 col-form-label form-label">Rayon</label>
                <div class="col-sm-10">
                    <select class="form-control @error('rayon') is-invalid @enderror" id="rayon" name="rayon">
                        @foreach ($data as $data)
                        <option value="{{ $data->id }}" {{ old('rayon')===$data->id ? "selected" : "" }}>{{ $data->name
                            }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label form-label">Nama Lengkap Anak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name') }}" name="name" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control form-control-sm no-border">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-sm-2 col-form-label form-label">Alamat Domisili</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" required
                        style="height: 100px" name="address">{{ old('address') }}</textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="religion" class="col-sm-2 col-form-label form-label">Agama</label>
                <div class="col-sm-4">
                    <select class="form-control @error('religion') is-invalid @enderror" name="religion"
                        style="width: 100%">
                        @foreach ($religion as $religion)
                        <option value="{{ $religion }}" {{ old('religion')===$religion ? "selected" : "" }}>
                            {{ $religion }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="birth_place" class="col-sm-2 col-form-label form-label">Tempat Lahir</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place"
                        value="{{ old('birth_place') }}" required name="birth_place">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="birth_place" class="col-sm-2 col-form-label form-label">Tanggal Lahir</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('dob') is-invalid @enderror" id="dob"
                        value="{{ old('dob') }}" name="dob" required>
                </div>
                <label for="weton" class="col-sm-2 col-form-label form-label">Weton</label>
                <div class="col-sm-4">
                    <select class="form-control" name="weton" id="weton" style="width: 100%">
                        @foreach ($weton as $weton)
                        <option value="{{ $weton }}" {{ old('weton')===$weton ? "selected" : "" }}>
                            {{ $weton }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="school" class="col-sm-2 col-form-label form-label">Nama Sekolah</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('school') is-invalid @enderror" id="school"
                        value="{{ old('school') }}" name="school" required>
                </div>
                <label for="class" class="col-sm-2 col-form-label form-label">Kelas</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('class') is-invalid @enderror" id="class"
                        value="{{ old('class') }}" name="class" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="certificate" class="col-sm-2 col-form-label form-label">Ijazah Terakhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="certificate" value="{{ old('certificate') }}"
                        name="certificate" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="weight" class="col-sm-2 col-form-label form-label">Berat Badan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                            value="{{ old('weight') }}" name="weight" required>
                        <span class="input-group-text">Kg</span>
                    </div>
                </div>
                <label for="height" class="col-sm-2 col-form-label form-label">Tinggi Badan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                            value="{{ old('height') }}" name="height" required>
                        <span class="input-group-text">Cm</span>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="blood_type" class="col-sm-2 col-form-label form-label">Golongan Darah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('blood_type') is-invalid @enderror" id="blood_type"
                        value="{{ old('blood_type') }}" name="blood_type" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="disease" class="col-sm-2 col-form-label form-label">Riwayat Penyakit</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('disease') is-invalid @enderror" name="disease" id="disease"
                        style="height: 100px">{{ old('disease') }}</textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notes" class="col-sm-2 col-form-label form-label">Lain-Lain</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="notes"
                        style="height: 100px">{{ old('notes') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn app-btn-primary w-100">Daftar</button>
        </form>
    </div>
</div>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script type="text/javascript">
    var picker = new Lightpick({
        field: document.getElementById('dob'),
        minDate: moment().subtract(100, 'year'),
        maxDate: moment().subtract(5, 'year'),
        startDate: moment().subtract(5, 'year'),
    });
    @error('dob')
    var notyf = new Notyf({
        position: {
            x: 'right',
            y: 'top',
        }
    });
    notyf.error('{{ $message }}');
    @enderror
</script>
@endpush
@endsection
