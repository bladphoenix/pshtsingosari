@extends('layouts.app')
@push('title')
<title>Akun Saya | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title mb-3">Akun Saya</h1>
<hr class="mb-4">
<div class="row">
    @if (session('success'))
    <div class="item mb-3">
        <div class="alert alert-success m-0 alert-dismissible fade show">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
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
    <div class="col-12 col-lg-6 mb-3">
        <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title">Akun</h4>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label mb-2"><strong>Foto</strong></div>
                                <div class="item-data"><img class="rounded-circle profile-image"
                                        src="{{ $user->photo_url }}" alt="">
                                </div>
                            </div>
                            <div class="col text-right">
                                <input type="file" name="photo" class="form-control form-control-sm no-border">
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label mb-2"><strong>Tanda Tangan</strong></div>
                                <div class="item-data"><img id="ttd" class="img-fluid" src="{{ $user->signature }}" alt="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="hidden" id="ttdinput" name="signature" value="{{ old('signature', $user->signature) }}">
                                <button type="button" class="btn btn-primary text-white float-end"
                                    data-bs-toggle="modal" data-bs-target="#ttdModal" id="btnmodal">
                                    Klik untuk tanda tangan digital
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Nama</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="text" name="name"
                                        value="{{ old('name', $user->name) }}" autofocus></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Nomor Telepon</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="tel" name="phone"
                                        value="{{ old('phone', $user->phone) }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Email</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="email"
                                        name="email" value="{{ old('email', $user->email) }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Alamat</strong></div>
                                <div class="item-data"><textarea class="form-control no-border p-0"
                                        name="address">{{ old('address', $user->address) }}</textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Pekerjaan</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="text" name="jobs"
                                        value="{{ old('jobs', $user->jobs) }}" autofocus></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Agama</strong></div>
                                <div class="item-data">
                                    <select class="form-control no-border" name="religion" style="width: 100%">
                                        @foreach ($religion as $religion)
                                        <option value="{{ $religion }}"
                                            {{ old('religion') === $religion || $user->religion === $religion ? "selected" : "" }}>
                                            {{ $religion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-card-footer p-4 mt-auto">
                    @csrf
                    <button class="btn btn-primary text-white" type="submit">Update Akun</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 col-lg-6 mb-3">
        <form method="POST" action="{{ route('account.password') }}">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title">Keamanan</h4>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Password Lama</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="password"
                                        name="old_password" value="{{ old('old_password') }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Password Baru</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="password"
                                        name="new_password" value="{{ old('new_password') }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Konfirmasi Password Baru</strong></div>
                                <div class="item-data"><input class="form-control no-border p-0" type="password"
                                        name="confirm_password" value="{{ old('confirm_password') }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="item-label"><strong>Login Terakhir</strong></div>
                                <div class="item-data">
                                    {{ \Carbon\Carbon::parse($user->last_login_at)->format('d/m/Y H:i:s')}} /
                                    {{ $user->last_login_ip }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-card-footer p-4 mt-auto">
                    @csrf
                    <button class="btn btn-primary text-white" type="submit">Update Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="ttdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ttdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ttdModal">Tanda Tangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Silahkan tanda tangan di ruang kosong dibawah ini</p>
                <div class="border">
                    <canvas id="signature-pad" class="signature-pad" width=250 height=150></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clear">Ulangi</button>
                <button type="button" class="btn btn-primary text-white" id="save"
                    data-bs-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
    var myModalEl = document.getElementById('ttdModal');
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    var cancelButton = document.getElementById('clear');
    var saveButton = document.getElementById('save');
    var ttd = document.getElementById('ttd');
    var ttdinput = document.getElementById('ttdinput');
    cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
    });
    saveButton.addEventListener('click', function (event) {
        var a = signaturePad.isEmpty();
        if(!a) {
            var data = signaturePad.toDataURL('image/png');
            ttd.src = data;
            ttdinput.value = data;
            document.getElementById("btnmodal").innerText = "Ulangi Tanda Tangan";
        }
    });
</script>
@endpush
@endsection
