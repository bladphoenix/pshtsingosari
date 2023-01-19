@extends('layouts.app')
@push('title')
<title>Notifikasi | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title mb-3">Notifikasi</h1>
<hr class="mb-4">
{{ $user->unreadNotifications->markAsRead(); }}
@foreach ($user->notifications->sortByDesc('created_at') as $notification)
<div class="app-card app-card-notification shadow-sm mb-4">
    <div class="app-card-header px-4 py-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-lg-auto text-center text-lg-left">
                @if($notification->type === 'App\Notifications\UserLogin' || $notification->type ===
                'App\Notifications\NewStudent')
                <div class="app-icon-holder icon-holder-mono">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                        <path
                            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </div>
                @else
                <img class="profile-image" src="/assets/images/profiles/profile-1.png" alt="">
                @endif
            </div>
            <div class="col-12 col-lg-auto text-center text-lg-left">
                <h4 class="notification-title mb-1">{{ $notification->data['title'] }}</h4>
            </div>
        </div>
    </div>
    <div class="app-card-body p-4">
        <div class="notification-content mb-3">{{ $notification->data['content'] }}</div>

        <ul class="notification-meta list-inline mb-0">
            <li class="list-inline-item">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</li>
        </ul>
    </div>
    @if($notification->type != 'App\Notifications\UserLogin')
    <div class="app-card-footer px-4 py-3">
        <a class="action-link" href="#">View <svg width="1em" height="1em" viewBox="0 0 16 16"
                class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                </path>
            </svg></a>
    </div>
    @endif
</div>
@endforeach

@endsection
