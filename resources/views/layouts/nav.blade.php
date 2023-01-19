<header class="app-header fixed-top ml-1">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-notifications-dropdown dropdown">
                            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
                                data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
                                title="Notifications">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                    <path fill-rule="evenodd"
                                        d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg>
                                @if (count($user->unreadNotifications) > 0)
                                <span class="icon-badge">{{ count($user->unreadNotifications) }}</span>
                                @endif
                            </a>

                            <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                <div class="dropdown-menu-header p-3">
                                    <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                </div>
                                <div class="dropdown-menu-content">
                                    @foreach ($user->notifications->sortByDesc('created_at')->take(5) as $notification)
                                    <div class="item p-3 @if(!$notification->read_at)bg-secondary text-white @endif">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col-auto">
                                                @if($notification->type === 'App\Notifications\UserLogin' ||
                                                $notification->type === 'App\Notifications\NewStudent')
                                                <div class="app-icon-holder icon-holder-mono">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-exclamation-octagon-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </div>
                                                @else
                                                <div class="app-icon-holder">
                                                    <img class="profile-image" src="{{ asset($user->photo_url) }}"
                                                        alt="">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">{{ $notification->data['title'] }}</div>
                                                    <div class="meta" @if(!$notification->
                                                        read_at)style="color:#fff"@endif>
                                                        {{
                                                        \Carbon\Carbon::parse($notification->created_at)->diffForHumans()
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="link-mask" href="{{ route('notification') }}"></a>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="dropdown-menu-footer p-2 text-center">
                                    <a href="{{ route('notification') }}">View all</a>
                                </div>

                            </div>
                        </div>
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                role="button" aria-expanded="false"><img class="rounded-circle"
                                    src="{{ asset(Auth::user()->photo_url) }}" alt="user profile"></a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="{{ route('account') }}">Account</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.sidepanel')
</header>
