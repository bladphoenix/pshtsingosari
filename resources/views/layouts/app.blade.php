<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('title')
    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ url('images/logoranting.jpg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    @stack('style')

</head>

<body class="app">
    @auth
    @role('Super Admin|Ranting|Bendahara Ranting')
    @include('layouts.navadmin')
    @else
    @include('layouts.nav')
    @endrole
    @endauth
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    @stack('script')
    <script type="text/javascript">
        @if (session('success'))
        var success = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            }
        });
        success.success('{{ session()->get('success') }}');
        @endif
    </script>
    @role('Super Admin|Ranting|Bendahara Ranting')
    <script type="text/javascript">
        const notification = document.getElementById('notifications-dropdown-toggle');
        notification.addEventListener('show.bs.dropdown', function () {
            axios.post('/admin/notification/read');
        });
    </script>
    @else
    <script type="text/javascript">
        const notification = document.getElementById('notifications-dropdown-toggle');
        notification.addEventListener('show.bs.dropdown', function () {
            axios.post('/notification/read');
        });
    </script>
    @endrole
</body>

</html>
