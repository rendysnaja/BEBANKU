@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manajemen Laporan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Laporan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
                <h6>Daftar Laporan Tahunan {{ $tahun->tahun_nama }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Jumlah Periode Evaluasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->unit->unit_nama }}</td>
                                <td>
                                    <a href="/manajemen/tahunanreport/{{ $tahun->id }}/{{ $u->id }}" class="btn btn-primary btn-icon">
                                        <i data-feather="eye"></i>
                                    </a>        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush