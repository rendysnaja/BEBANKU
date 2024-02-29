@extends('layout2.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="#">Izin</a></li> -->
        <li class="breadcrumb-item active" aria-current="page">Izin dan Cuti</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
                <h6>Daftar Izin dan Cuti</h6>
                <div class="d-flex justify-content-end">
                    <a href="/tambahizin">
                        <button type="button" class="btn btn-light btn-xs btn-icon-text me-2 mb-2 mb-md-0">
                            Tambah
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if($evaluasidetail)
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Deskripsi Izin</th>
                                <th>Jenis Izin</th>
                                <th>Tanggal Izin</th>
                                <th>Lama Izin</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluasidetail as $e)
                                @foreach($e->izin as $i)
                                    <tr>
                                        <td>{{ $i->izin_deskripsi }}</td>
                                        <td>{{ $i->izin_jenis }}</td>
                                        <td>{{ $i->izin_tanggal }}</td>
                                        <td>{{ $i->izin_lamahari }}</td>
                                        <td>
                                            <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i->id }}">
                                                <i data-feather="eye"></i>
                                            </div>
                                            <div class="modal fade" id="exampleModal{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail jurnal Pelaksanaan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Izin</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $i->izin_deskripsi }}" required="required">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Izin</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $i->izin_jenis }}" required="required">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Izin</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $i->izin_tanggal }}" required="required">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
                                                                <div class="col-sm-9">
                                                                    <a href="/izin/download/{{ $i->id }}">
                                                                        <button class="btn btn-success btn-sm" type="button">Download</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/editizin/{{ $i->id }}" class="btn btn-success btn-icon">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a href="/izinhapus/{{ $i->id }}" class="btn btn-danger btn-icon">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Evaluasi belum dimulai atau telah selesai</p>
                    @endif
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