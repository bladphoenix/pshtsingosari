<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Konfirmasi Password' }} | {{ config('setting.name', 'Site Name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet">
</head>

<body class="app app-reset-password p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="{{ config('setting.logo') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Konfirmasi Password</h2>

                    <div class="auth-intro mb-4 text-center">Harap konfirmasi kata sandi Anda sebelum melanjutkan.</div>

                    <div class="auth-form-container text-left">
                        <form method="POST" action="{{ route('password.confirm') }}" class="auth-form resetpass-form">
                            @csrf
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password @error('password') is-invalid @enderror"
                                    placeholder="Password" required="required">
                                @error('password')
                                <span class="invalid-feedback is-invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-12">
                                        <div class="forgot-password text-end">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Lupa password?</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">{{ config('setting.name') }}</h5>
                        <div>{{ config('setting.description') }}.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
