@extends('layouts.app')
@push('title')
<title>Dashboard | {{ config('setting.name') }}</title>
@endpush
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Pelatih Rayon</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <a class="btn app-btn-secondary" href="{{ route('admin.rayon.coach.add', $data->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                            <path
                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                        Tambah Pelatih
                    </a>
                </div>
                <div class="col-auto">
                    <div class="custom-file">
                        <form action="{{ route('admin.rayon.coach.import', $data->id) }}" id="import" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="custom-file-input visually-hidden"
                                id="validatedCustomFile" required>
                            <label class="btn app-btn-secondary" for="validatedCustomFile"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-upload" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                </svg>
                                Upload Excel</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mb-4">
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
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-sm-12">
                        <p class="lead fw-bold">{{ $data->name }}</p>
                        <p><strong>Telepon :</strong> {{ $data->phone }}</p>
                        <p><strong>Email : </strong> {{ $data->email }}</p>
                        <p><strong>Alamat : </strong> {{ $data->address }}</p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <img src="{{ $data->logo }}" class="img-thumbnail w-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">#</th>
                                    <th class="cell">Nama Pelatih</th>
                                    <th class="cell">Telepon</th>
                                    <th class="cell">Alamat</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->coach->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data!</td>
                                </tr>
                                @else
                                @foreach ($data->coach as $key => $coach)
                                <tr>
                                    <td class="cell">{{ $key+1 }}</td>
                                    <td class="cell">{{ $coach->name }}</td>
                                    <td class="cell">{{ $coach->phone }}</td>
                                    <td class="cell">{{ $coach->address }}</td>
                                    <form class="settings-form" method="POST"
                                        action="{{ route('admin.rayon.coach.suspend', [$data->id, $coach->id]) }}">@csrf
                                        <td class="cell"><a class="btn btn-primary text-white btn-sm"
                                                href="{{ route('admin.rayon.coach.detail', [$data->id, $coach->id]) }}">Detail</a>
                                            | @if($coach->status)<button class="btn btn-danger text-white btn-sm"
                                                type="submit" id="suspend">Suspend</button>@else <button
                                                class="btn btn-warning text-white btn-sm" type="submit"
                                                id="suspend">Activate</button> @endif</td>
                                    </form>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script type="text/javascript">
    document.getElementById("validatedCustomFile").onchange = function() {
    document.getElementById("import").submit();
};
</script>
@endpush
@endsection
