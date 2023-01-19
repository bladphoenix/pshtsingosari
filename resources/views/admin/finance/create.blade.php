@extends('layouts.app')
@push('title')
<title>Tambah Keuangan | {{ config('setting.name') }}</title>
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
@endpush
@section('content')
<h1 class="app-page-title">Tambah Keuangan</h1>
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
        <form class="settings-form" method="POST" action="{{ route('admin.finance.store') }}">
            @csrf
            @include('admin.finance.form')
            <button type="submit" class="btn app-btn-primary w-100">Tambah Keuangan</button>
        </form>
    </div>
</div>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script type="text/javascript">
    function convertRp(value) {
        let number_string = value.replace(/[^,\d]/g, '').toString(),
            split	= number_string.split(','),
            sisa 	= split[0].length % 3,
            rupiah 	= split[0].substr(0, sisa),
            ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        minDate: moment(),
        startDate: moment(),
    });
    var total = document.getElementById('total');
    total.addEventListener('keyup', function(e)
    {
        this.value = convertRp(this.value);
    });
</script>
@endpush
@endsection
