@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manajemen User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6>Tambah User</h6>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="/manajemen/register/store" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Masukan nama" required="required">
                            </div>
                            @if($errors->has('nama'))
                            <div class="text-danger">
                                {{ $errors->first('nama')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email Karyawan</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="exampleInputUsername2" placeholder="Masukan email" required="required">
                            </div>
                            @if($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Unit Kerja Karyawan</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="unit" id="exampleFormControlSelect1">
                                    <option selected disabled>Pilih Unit</option>
                                    @foreach($unit as $u)
                                    <option value="{{ $u->id }}">{{ $u->unit_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($errors->has('unit'))
                        <div class="text-danger">
                            {{ $errors->first('unit')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jabatan Karyawan</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="jabatan" id="exampleFormControlSelect2">
                                    <option selected disabled>Pilih Jabatan</option>
                                    <option>Kepala</option>
                                    <option>Anggota</option>
                                </select>
                            </div>
                        </div>
                        @if($errors->has('jabatan'))
                        <div class="text-danger">
                            {{ $errors->first('jabatan')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role User</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="role" id="exampleFormControlSelect1">
                                    <option selected disabled>Pilih Role</option>
                                    @foreach($role as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($errors->has('role'))
                        <div class="text-danger">
                            {{ $errors->first('role')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="exampleInputMobile" placeholder="Masukan password" required="required">
                            </div>
                            @if($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirm" id="exampleInputMobile" placeholder="Masukan kembali password" required="required">
                            </div>
                            @if($errors->has('password_confirm'))
                            <div class="text-danger">
                                {{ $errors->first('password_confirm')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <br>
                    <div class="d-flex justify-content-end">
                        <button type="submit" value="Simpan Data" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ url('/harian') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="{{ asset('assets/js/form-validation.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/tags-input.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<script src="{{ asset('assets/js/pickr.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
@endpush