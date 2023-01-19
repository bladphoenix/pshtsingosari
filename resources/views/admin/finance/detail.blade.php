@extends('layouts.app')
@push('title')
<title>Data Keuangan | {{ config('setting.name') }}</title>
@endpush
@section('content')
<h1 class="app-page-title">Data Keuangan</h1>
<hr class="mb-4">
<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <p class="lead fw-bold">Rp {{ number_format($finance->total) }}</p>
                        <p><strong>Tipe :</strong> {{ $finance->type === 'in' ? 'Masuk' : 'Keluar' }}</p>
                        <p><strong>Tanggal : </strong> {{ $finance->date }}</p>
                        <p><strong>Keterangan : </strong> {{ $finance->description}}</p>
                    </div>
                </div>
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Waktu</th>
                            <th class="cell">Perubah</th>
                            <th class="cell">Dirubah</th>
                            <th class="cell">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($finance->revisionHistory->sortByDesc('created_at') as $key => $history)
                        <tr>
                            <td class="cell">{{ $key+1 }}</td>
                            <td class="cell">{{ $history->created_at }}</td>
                            <td class="cell">{{ \App\Models\Admin::find($history->user_id)->name }}</td>
                            <td class="cell">{{ $history->fieldName() }}</td>
                            @if($history->old_value === 'in' || $history->old_value === 'out')
                            <td class="cell">{{ $history->old_value === 'in' ? 'Masuk' : 'Keluar' }} ke {{ $history->new_value === 'out' ? 'Keluar' : 'Masuk' }}</td>
                            @else
                            <td class="cell">{{ $history->old_value }} ke {{ $history->new_value }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
