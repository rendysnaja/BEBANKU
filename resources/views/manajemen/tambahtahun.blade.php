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
        <li class="breadcrumb-item"><a href="#">Manajemen Unit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Tahun</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6>Tambah Tahun</h6>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="/manajemen/tahun/store" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Masukan nama tahun" required="required">
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
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Hari Kerja</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah" id="exampleInputUsername2" placeholder="Masukan jumlah hari" required="required">
                            </div>
                            @if($errors->has('jumlah'))
                            <div class="text-danger">
                                {{ $errors->first('jumlah')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kelonggaran Kerja</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kelonggaran" id="exampleInputUsername2" placeholder="Masukan persentase kelonggaran contoh 10% = 10" required="required">
                            </div>
                            @if($errors->has('kelonggaran'))
                            <div class="text-danger">
                                {{ $errors->first('kelonggaran')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <br>
                    <div class="d-flex justify-content-end">
                        <button type="submit" value="Simpan Data" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ url('/manajemen/tahun') }}" class="btn btn-secondary">Cancel</a>
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