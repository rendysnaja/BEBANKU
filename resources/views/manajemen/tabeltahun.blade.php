@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Manajemen Tahun</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
                <h6>Tahun</h6>
                <div class="d-flex justify-content-end">
                    <a href="/manajemen/tambahtahun">
                        <button type="button" class="btn btn-light btn-xs btn-icon-text me-2 mb-2 mb-md-0">
                            Tambah
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Jumlah Periode</th>
                                <th>Daftar Periode</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tahun as $t)
                            <tr>
                                <td>{{ $t->tahun_nama }}</td>
                                <td>{{ $t->evaluasi->count() }}</td>
                                <td>
                                    <div class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleDKaryawan{{ $t->id }}">
                                        Lihat Daftar Periode
                                    </div>
                                    <div class="modal fade" id="exampleDKaryawan{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Periode</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table id="table" class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Periode</th>
                                                                    <th>Mulai</th>
                                                                    <th>berakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @foreach($t->evaluasi as $e)
                                                                    <td>{{ $e->evaluasi_periode }}</td>
                                                                    <td>{{ $e->evaluasi_mulai }}</td>
                                                                    <td>{{ $e->evaluasi_berakhir }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $t->id }}">
                                        <i data-feather="eye"></i>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Tahun</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Tahun</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $t->tahun_nama }}" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Hari Kerja</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $t->tahun_jumlahhari}}" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kelonggaran Kerja</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $t->tahun_kelonggaran}}%" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/manajemen/tahunedit/{{ $t->id }}" class="btn btn-success btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="/manajemen/hapusunit/{{ $t->id }}" class="btn btn-danger btn-icon">
                                        <i data-feather="power"></i>
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