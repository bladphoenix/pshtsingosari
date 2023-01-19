<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">
</head>

<body class="app app-404-page">

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
                <div class="app-branding text-center mb-5">
                    <a class="app-logo" href="{{ url('/') }}"><img class="logo-icon me-2" src="/assets/images/app-logo.svg"
                            alt="logo"><span class="logo-text"> {{ config('setting.name') }}</span></a>

                </div>
                <div class="app-card p-5 text-center shadow-sm">
                    <h1 class="page-title mb-4">@yield('code')</h1>
                    <div class="mb-4">
                        @yield('message')
                    </div>
                    <a class="btn app-btn-primary"
                        href="{{ app('router')->has('welcome') ? route('welcome') : url('/') }}">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
