<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Reset Password' }} | {{ config('setting.name', 'Site Name') }}</title>

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
                    <h2 class="auth-heading text-center mb-4">Reset Password</h2>

                    <div class="auth-intro mb-4 text-center">Masukkan alamat email Anda di bawah ini. Kami akan mengirimkan email berisi tautan ke halaman tempat Anda dapat dengan mudah membuat kata sandi baru.</div>

                    <div class="auth-form-container text-left">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="auth-form resetpass-form">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="reg-email">E-Mail Address</label>
                                <input id="reg-email" name="email" type="email"
                                    class="form-control login-email @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Kirim
                                    Link Reset Password</button>
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
