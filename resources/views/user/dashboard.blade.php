@extends('layouts.app')
@push('title')
<title>Dashboard | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Dashboard</h1>
<hr class="mb-4">
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card-body p-4">
            <div class="row align-items-center">
                <div class="col-lg-9 col-sm-12">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </div>
                <div class="col-lg-3 col-sm-12 text-center">
                    <a class="btn app-btn-primary" href="https://www.chartjs.org/docs/latest/" target="_blank"><svg
                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z">
                            </path>
                        </svg> Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
