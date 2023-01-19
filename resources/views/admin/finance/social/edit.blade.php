@extends('layouts.app')
@push('title')
<title>Ubah Keuangan | {{ config('setting.name') }}</title>
@endpush
@push('style')
<link href="{{ asset('assets/plugins/litepicker/litepicker.css') }}" rel="stylesheet">
@endpush
@section('content')
<h1 class="app-page-title">Ubah Keuangan</h1>
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
        <form class="settings-form" method="POST" action="{{ route('admin.financesocial.update', $finance->id) }}">
            @method('PUT')
            @csrf
            @include('admin.finance.social.form')
            <button type="submit" class="btn app-btn-primary w-100">Ubah Keuangan</button>
        </form>
    </div>
</div>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/plugins/litepicker/litepicker.min.js') }}"></script>
<script type="text/javascript">
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        minDate: moment(),
        startDate: moment(),
    });
</script>
@endpush
@endsection

