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
        <li class="breadcrumb-item"><a href="#">Manajemen Evaluasi</a></li>
        <li class="breadcrumb-item"><a href="#">Detail Evaluasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Peserta</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6>Tambah Peserta</h6>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="/manajemen/evaldetail/store/{{ $evaluasi->id }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

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
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Asesi</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="asesi" id="exampleFormControlSelect1">
                                    <option selected disabled>Pilih Asesi</option>
                                    @foreach($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->role->name }}) - ({{ $u->unit->unit_nama}}) - ({{ $u->jabatan}})</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('asesi'))
                            <div class="text-danger">
                                {{ $errors->first('asesi')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Asesor</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="asesor" id="exampleFormControlSelect1">
                                    <option selected disabled>Pilih Asesor</option>
                                    @foreach($asesor as $a)
                                    <option value="{{ $a->id }}">{{ $a->user->name }} ({{ $a->user->role->name }}) - ({{ $a->user->unit->unit_nama}}) - ({{ $a->user->jabatan}})</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('asesor'))
                            <div class="text-danger">
                                {{ $errors->first('asesor')}}
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