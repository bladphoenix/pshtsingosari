@extends('layouts.app')
@push('title')
<title>Pendaftaran Siswa | {{ config('setting.name') }}</title>
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
                    <h2 class="text-center h4 py-2">FORMULIR PERNYATAAN</h2>
                    <h2 class="text-center h5 py-2">ORANG TUA SISWA PERSAUDARAAN SETIA HATI TERATE</h2>
                    <p>Saya yang bertanda tangan dibawah ini :</p>
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
                                AGAMA
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->religion }}
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
                                NO. TELEPON
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $data->phone }}
                            </div>
                        </div>
                        <p class="py-1">Adalah orang tua / wali dari :</p>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                NAMA ANAK
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $session['name'] }}
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                TEMPAT / TGL LAHIR
                            </div>
                            <div class="col-12 col-md-10">
                                {{ $session['birth_place'] }} / {{ \Carbon\Carbon::parse($session['dob'])->format('d m Y') }}
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                SEKOLAH
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control p-0 @error('school') is-invalid @enderror"
                                    value="{{ old('school') }}" name="school">
                            </div>
                        </div>
                        <div class="row align-items-start py-1">
                            <div class="col-12 col-md-2 fw-bold">
                                KELAS
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control p-0 @error('class') is-invalid @enderror"
                                    value="{{ old('class') }}" name="class">
                            </div>
                        </div>
                    </div>

                    <p class="mt-3">Dengan ini menyatakan tidak keberatan anak saya menjadi siswa <strong>“PERSAUDARAAN
                            SETIA HATI TERATE”</strong> yang merupakan suatu wadah untuk belajar PENCAK SILAT. Oleh
                        karena itu segala aturan yang ditetapkan oleh <strong>“PERSAUDARAAN SETIA HATI TERATE”</strong>
                        dengan ini saya siap untuk mematuhinya.
                        Adapun aturan dasar yang harus saya patuhi adalah :
                    </p>
                    <ol class="px-4 py-2">
                        <li>Saya menyatakan bahwa anak saya belum pernah ikut PECAK SILAT manapun dan juga tidak terikat
                            dengan PENCAK SILAT lain.</li>
                        <li>Saya siap mengikut sertakan anak saya latihan di <strong>“PSHT”</strong> dalam seminggu
                            sebanyak 3 kali pertemuan.</li>
                        <li>Saya siap mengikuti aturan dan tata tertib yang berlaku di <strong>“PERSAUDARAAN SETIA HATI
                                TERATE”</strong></li>
                    </ol>
                    <p>Demikianlah surat penyataan ini saya buat dalam keadaan sadar dan tanpa paksaan dari pihak
                        manapun.</p>
                    <p>Oleh karena itu saya memohon kepada Ketua <strong>“PERSAUDARAAN SETIA HATI TERATE”</strong> untuk dapat menerima
                        anak saya menjadi siswa <strong>“PERSAUDARAAN SETIA HATI TERATE”</strong> dan dengan ini saya menyatakan dengan
                        tegas bahwa anak saya adalah siswa <strong>“PERSAUDARAAN SETIA HATI TERATE”</strong> .
                        Sebelumnya saya ucapkan terima kasih.
                    </p>
                    <div class="row align-items-center text-center py-1 mb-3">
                        <div class="col-md-6 ">
                            Hormat Saya<br>
                            <img src="{{ $session['signature'] }}" class="img-fluid">
                            <div class="clearfix"></div>
                            Singosari, {{ \Carbon\Carbon::now()->format('d/M/Y') }}<br>
                            ({{ $data->name }})
                        </div>
                        <div class="col-md-6 ">
                            Mengetahui<br>
                            ( Ketua Persaudaraan Setia Hati Terate )
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white float-end">
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script type="text/javascript">
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
