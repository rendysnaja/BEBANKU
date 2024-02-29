@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manajemen Unit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Unit</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6>Tambah Unit</h6>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="/manajemen/evaluasi/store" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Periode Evaluasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="periode" id="exampleInputUsername2" placeholder="Masukan nama periode" required="required">
                            </div>
                            @if($errors->has('periode'))
                            <div class="text-danger">
                                {{ $errors->first('periode')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tahun Pelaksanaan</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="tahun" id="exampleFormControlSelect1">
                                    <option selected disabled>Pilih Tahun Pelaksanaan</option>
                                    @foreach($tahun as $t)
                                    <option value="{{ $t->id }}">{{ $t->tahun_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('tahun'))
                            <div class="text-danger">
                                {{ $errors->first('tahun')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Mulai Evaluasi</label>
                            <div class="col-sm-9">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" name="mulai" class="form-control" placeholder="Pilih tanggal mulai" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                            @if($errors->has('mulai'))
                            <div class="text-danger">
                                {{ $errors->first('mulai')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Berakhir Evaluasi</label>
                            <div class="col-sm-9">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" name="berakhir" class="form-control" placeholder="Pilih tanggal berakhir" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                            @if($errors->has('berakhir'))
                            <div class="text-danger">
                                {{ $errors->first('berakhir')}}
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush