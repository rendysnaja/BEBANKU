@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manajemen Evaluasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Evaluasi</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6>Detail Evaluasi {{ $evaluasi->evaluasi_periode }}</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Periode Evaluasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="periode" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $evaluasi->evaluasi_periode }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tahun Pelaksanaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tahun" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $evaluasi->tahun->tahun_nama }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Evaluasi Mulai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="mulai" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $evaluasi->evaluasi_mulai }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Evaluasi Berakhir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="berakhir" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $evaluasi->evaluasi_berakhir }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Batas Card -->

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
                <h6>Daftar Peserta Evaluasi Periode {{ $evaluasi->evaluasi_periode }}</h6>
                <div class="d-flex justify-content-end align-items-center flex-wrap text-nowrap">
                    <a href="/manajemen/evaldetailtambah/{{ $evaluasi->id }}">
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
                                <th>Asesi</th>
                                <th>Asesor</th>
                                <th>Unit</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluasi->evaluasidetail()->get() as $e)
                            <tr>
                                <td>{{ $e->user->name }}</td>
                                <td>{{ $e->asesor->user->name }}</td>
                                <td>{{ $e->unit->unit_nama }}</td>
                                <td>
                                    @if ($e->status == 1)
                                        <a href="/manajemen/evaluasimulai/{{ $e->id }}" class="btn btn-primary btn-xs">Mulai Evaluasi</a>
                                    @elseif ($e->status == 2)
                                        Asesi Mengisi Kegiatan
                                    @elseif ($e->status == 3)
                                        Asesor Meverifikasi Kegiatan
                                    @elseif ($e->status == 4)
                                        <a href="/manajemen/laporan/{{ $e->id }}" class="btn btn-primary btn-xs">Lihat Laporan Evaluasi</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $e->id }}">
                                        <i data-feather="eye"></i>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Peserta Evaluasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Asesi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $e->user->name }}" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jabatan Asesi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $e->user->jabatan }} {{ $e->user->unit->unit_nama }}" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Asesor</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $e->asesor->user->name }}" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jabatan Asesor</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $e->asesor->user->jabatan }} {{ $e->asesor->user->unit->unit_nama }}" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/manajemen/evaldetailedit/{{ $e->id }}" class="btn btn-success btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="/manajemen/hapusevaldetail/{{ $e->id }}" class="btn btn-danger btn-icon">
                                        <i data-feather="trash"></i>
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