@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Manajemen User</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
                <h6>Manajemen User</h6>
                <div class="d-flex justify-content-end">
                    <a href="/manajemen/register">
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->unit->unit_nama }}</td>
                                <td>{{ $u->role->name }}</td>
                                <td>
                                    <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u->id }}">
                                        <i data-feather="eye"></i>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $u->name }}" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $u->email }}" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Unit</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $u->unit->unit_nama }}" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jabatan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $u->jabatan }}" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $u->role->name }}" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $u->password }}" required="required">
                                                        </div>
                                                    </div>     
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/manajemen/edituser/{{ $u->id }}" class="btn btn-success btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="/manajemen/hapususer/{{ $u->id }}" class="btn btn-danger btn-icon">
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