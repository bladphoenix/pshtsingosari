@extends('layouts.app')
@push('title')
<title>Pendaftaran Siswa | {{ config('setting.name') }}</title>
<link rel="shortcut icon" href="assets/images/psht.jpg">
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
@endpush
@section('content')
<h1 class="app-page-title">Pendaftaran Siswa</h1>
<hr class="mb-4">
<form method="POST" action="{{ route('rayon.registersubmit') }}">
    @csrf
    <div class="app-card app-card-stats-table h-100 shadow-sm">
        <div class="app-card-body p-3 p-lg-4">
            <div class="container">
                <div class="row align-items-center py-4" style="border-bottom: 1rem double #4d4d4e">
                    <div class="col-3">
                        <img src="{{ config('setting.logo') }}" class="w-75 img-thumbnail">
                    </div>
                    <div class="col-6 text-center">
                        <h2 class="h4">PERSAUDARAAN SETIA HATI TERATE</h2>
                        <h2 class="h4">{{ strtoupper($data->rayon->name) }}</h2>
                        <h2 class="h4">RANTING SINGOSARI</h2>
                        <h2 class="h4">CABANG MALANG RAYA</h2>
                        <p class="lead"><strong>Alamat : </strong>{{ $data->rayon->address }}</p>
                    </div>
                    <div class="col-3">
                        <img src="{{ $data->rayon->logo }}" class="w-75 img-thumbnail">
                    </div>
                </div>
                <div class="row py-4">
                    <h2 class="text-center h4 py-2">FORMULIR PENDAFTARAN</h2>
                    <h2 class="text-center h5 py-2"><u>SYARAT-SYARAT PENDAFTARAN SISWA BARU PERSAUDARAAN SETIA HATI
                            TERATE</u></h2>
                    <ol class="px-4 py-2">
                        <li>Mengisi Formulir Pendaftaran Latihan Pencak Silat “Persaudaraan Setia Hati Terate”</li>
                        <li>Meyerahkan foto copy Akta Kelahiran, Kartu Keluarga 1 lembar dan Pas foto 3x4 cm 3 lembar
                    </ol>
                    <h2 class="text-center h5 py-2"><u>FORMULIR PENDAFTARAN PERSAUDARAAN SETIA HARI TERATE</u></h2>
                    <p>Yang bertanda tangan di bawah ini adalah pemohon, atau orang tua dari calon siswa :</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-2 fw-bold">
                                NAMA
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->name }}
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-12 col-md-2 fw-bold">
                                ALAMAT
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->address }}
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-12 col-md-2 fw-bold">
                                PEKERJAAN
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->jobs }}
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-12 col-md-2 fw-bold">
                                NO. TELEPON
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->phone }}
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                NAMA ANAK
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control p-0 @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" name="name">
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                TEMPAT / TGL LAHIR
                            </div>
                            <div class="col-6 col-md-5">
                                <input type="text" class="form-control p-0 @error('birth_place') is-invalid @enderror"
                                    value="{{ old('birth_place') }}" name="birth_place">
                            </div>
                            <div class="col-6 col-md-5">
                                <input type="text" class="form-control p-0 @error('dob') is-invalid @enderror"
                                    value="{{ old('dob') }}" id="datepicker" name="dob">
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                IJAZAH TERAKHIR
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control p-0 @error('certificate') is-invalid @enderror"
                                    value="{{ old('certificate') }}" name="certificate">
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                ALAMAT DOMISILI
                            </div>
                            <div class="col-12 col-md-10">
                                <textarea class="form-control p-0 @error('address') is-invalid @enderror"
                                    style="height: 100px" name="address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                BERAT BADAN
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="input-group">
                                    <input type="number" class="form-control p-0 @error('weight') is-invalid @enderror"
                                        value="{{ old('weight') }}" name="weight">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                TINGGI BADAN
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="input-group">
                                    <input type="number" class="form-control p-0 @error('height') is-invalid @enderror"
                                        value="{{ old('height') }}" name="height">
                                    <span class="input-group-text">Cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                GOLONGAN DARAH
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control p-0 @error('blood_type') is-invalid @enderror"
                                    value="{{ old('blood_type') }}" name="blood_type">
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                RIWAYAT PENYAKIT
                            </div>
                            <div class="col-12 col-md-10">
                                <textarea class="form-control p-0 @error('disease') is-invalid @enderror"
                                    style="height: 100px" name="disease">{{ old('disease') }}</textarea>
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                LAIN LAIN
                            </div>
                            <div class="col-12 col-md-10">
                                <textarea class="form-control p-0 @error('notes') is-invalid @enderror"
                                    style="height: 100px" name="notes">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <p class="mt-3">Demikianlah keterangan data ini kami berikan dengan sebenarnya dan akan mengikuti
                        seluruh ketentuan dan tata tertib “PERSAUDARAAN SETIA HATI TERATE” untuk kebaikan bersama.</p>
                    <div class="row align-items-start py-1">
                        <div class="col-md-6 offset-md-6">
                            <div class="float-end text-end">
                                <img id="ttd" class="img-fluid">
                                <input type="hidden" id="ttdinput" name="signature">
                                <p>Malang, {{ \Carbon\Carbon::now()->format('d M Y')}}<br>
                                    Orang Tua Siswa: {{ $data->name }}</p>
                                <div class="clearfix"></div>
                                <button type="button" class="btn btn-primary text-white float-end"
                                    data-bs-toggle="modal" data-bs-target="#ttdModal" id="btnmodal">
                                    Klik untuk tanda tangan digital
                                </button>
                            </div>
                        </div>
                    </div>
                    <span class="fw-bold text-decoration-underline">Catatan</span>
                    <ul class="px-4 py-2">
                        <li>Setiap Siswa yang telah mengikuti Latihan Wajib Membeli Sakral (Baju Latihan harap dijaga
                            jangan sampai hilang)</li>
                        <li>Waktu latihan siswa wajib memakai Sakral lengkap</li>
                    </ul>
                    <button type="submit" class="btn btn-primary text-white float-end">
                        Isi form pernyataan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="ttdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ttdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ttdModal">Tanda Tangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Silahkan tanda tangan di ruang kosong dibawah ini</p>
                <div class="border">
                    <canvas id="signature-pad" class="signature-pad" width=250 height=150></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clear">Ulangi</button>
                <button type="button" class="btn btn-primary text-white" id="save"
                    data-bs-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script type="text/javascript">
    var myModalEl = document.getElementById('ttdModal');
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        minDate: moment().subtract(100, 'year'),
        maxDate: moment().subtract(5, 'year'),
        startDate: moment().subtract(5, 'year'),
    });
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    var cancelButton = document.getElementById('clear');
    var saveButton = document.getElementById('save');
    var ttd = document.getElementById('ttd');
    var ttdinput = document.getElementById('ttdinput');
    cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
    });
    saveButton.addEventListener('click', function (event) {
        var a = signaturePad.isEmpty();
        if(!a) {
            var data = signaturePad.toDataURL('image/png');
            ttd.src = data;
            ttdinput.value = data;
            document.getElementById("btnmodal").innerText = "Ulangi Tanda Tangan";
        }
    });
    @error('signature')
    var notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    }
    });
    notyf.error('{{ $message }}');
    @enderror
    @error('dob')
    var notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    }
    });
    notyf.error('{{ $message }}');
    @enderror
    @if (session('success'))
    var notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    }
    });
    notyf.success('{{ session()->get('success') }}');
    @endif
</script>
@endpush
@endsection
