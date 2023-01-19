@php
$in = $data->where('type', 'in')->sum('total');
$out = $data->where('type', 'out')->sum('total');
$total = $in-$out;
@endphp
@extends('layouts.app')
@push('title')
<title>Dashboard | {{ config('setting.name') }}</title>
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Keuangan</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-center align-items-center">
                <div class="col-auto">
                    <a class="btn app-btn-secondary" href="{{ route('admin.finance.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                            <path
                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                        Tambah Keuangan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mb-4">
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
<div class="app-card shadow-sm mb-4">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <form action="{{ route('admin.finance.index') }}" method="GET" class="row">
                    @csrf
                    <div class="mb-3 col-lg-3 col-md-12">
                        <input type="text" class="form-control  @error('start') is-invalid @enderror"
                            value="{{ old('start', (\Request::get('start') ?? \Carbon\Carbon::now()->format('d-m-Y'))) }}"
                            id="start" name="start">
                    </div>
                    <div class="mb-3 col-lg-3 col-md-12">
                        <input type="text" class="form-control  @error('end') is-invalid @enderror"
                            value="{{ old('end', (\Request::get('end') ?? \Carbon\Carbon::now()->format('d-m-Y'))) }}"
                            id="end" name="end">
                    </div>
                    <div class="mb-3 col-lg-3 col-md-12">
                        <select name="type" class="form-control">
                            <option value="all" {{ \Request::get('type')==='all' ? 'selected' : 'selected' }}>Semua
                            </option>
                            <option value="in" {{ \Request::get('type')==='in' ? 'selected' : '' }}>Masuk</option>
                            <option value="out" {{ \Request::get('type')==='out' ? 'selected' : '' }}>Keluar</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-3 col-md-12">
                        <button type="submit" class="btn app-btn-primary w-100">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <p class="lead fw-bold">Saldo: Rp. {{ number_format($total) }}</p>
                        <p><strong>Masuk : Rp. {{ number_format($in) }}</strong></p>
                        <p><strong>Keluar : Rp. {{ number_format($out) }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">

        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="table-responsive mb-3">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">#</th>
                                    <th class="cell">Tanggal</th>
                                    <th class="cell">Tipe</th>
                                    <th class="cell">Jumlah</th>
                                    <th class="cell">Keterangan</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td class="cell">{{ $key+1 }}</td>
                                    <td class="cell">{{ $value->date }}</td>
                                    <td class="cell">{{ $value->type === 'in' ? 'Masuk' : 'Keluar' }}</td>
                                    <td class="cell">Rp. {{ number_format($value->total) }}</td>
                                    <td class="cell">{{ $value->description }}</td>
                                    <td class="cell">
                                        <a class="btn btn-primary text-white btn-sm"
                                            href="{{ route('admin.finance.show', $value->id) }}">Detail</a>
                                        @role('Super Admin|Ranting')
                                        | <a class="btn btn-warning text-white btn-sm"
                                            href="{{ route('admin.finance.edit', $value->id) }}">Edit</a>
                                        |
                                        <form action="{{ route('admin.finance.destroy', $value->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger text-white btn-sm"
                                                type="submit">Delete</button>
                                        </form>
                                        @endrole
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script type="text/javascript">
    new Lightpick({
        field: document.getElementById('start'),
        secondField: document.getElementById('end')
});
</script>
@endpush
@endsection
