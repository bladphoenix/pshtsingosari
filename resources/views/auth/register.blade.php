<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Registrasi' }} | {{ config('setting.name', 'Site Name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet">
</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="{{ config('setting.logo') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Registrasi {{ config('setting.name') }}</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Nama</label>
                                <input id="signup-name" name="name" type="text"
                                    class="form-control signup-name @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Nama Lengkap" required="required">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Nomor Telepon</label>
                                <input id="signup-phone" name="phone" type="tel"
                                    class="form-control signup-email @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="Nomor Telepon" required="required">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Email</label>
                                <input id="signup-email" name="email" type="email"
                                    class="form-control signup-email @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder=" Email" required="required">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="signup-password" name="password" type="password"
                                    class="form-control signup-password @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" placeholder="Password" required="required">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
                            </div>
                        </form>
                        <div class="auth-option text-center pt-5">Sudah memiliki akun? <a class="text-link"
                                href="{{ route('login') }}">Log in</a></div>
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
