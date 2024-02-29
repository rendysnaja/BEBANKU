@extends('layout2.master')

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
    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
    <li class="breadcrumb-item"><a href="#">Rutinitas</a></li>
    <li class="breadcrumb-item"><a href="#">Jurnal Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Jurnal</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Ubah Jurnal Kegiatan</h6>
      </div>
      <div class="card-body">
        <form class="forms-sample" action="/absen/update/{{ $absenrutinitas->id }}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" placeholder="Contoh 12 Desember 2023 : 12 Desember 2023" value="{{ $absenrutinitas->absenrutinitas_tanggal }}" required="required">
              </div>
            </div>
            @if($errors->has('tanggal'))
            <div class="text-danger">
              {{ $errors->first('tanggal')}}
            </div>
            @endif
          </div>

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Pelaksanaan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="deskripsi" id="exampleInputUsername2" placeholder="Contoh perencanaan menari : perencanaan menari" value="{{ $absenrutinitas->absenrutinitas_deskripsi }}" required="required">
              </div>
            </div>
            @if($errors->has('deskripsi'))
            <div class="text-danger">
              {{ $errors->first('deskripsi')}}
            </div>
            @endif
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Pelaksanaan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lamajam" id="exampleInputUsername2" value="{{ $absenrutinitas->absenrutinitas_lamajam }}" placeholder="Contoh 1 jam : 1">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" value="{{ $absenrutinitas->absenrutinitas_lamamenit }}" placeholder="Contoh 30 menit : 30">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
          </div>

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
              <div class="col-sm-9">
                <input class="form-control" name="file" type="file" id="formFile">
              </div>
            </div>
            @if($errors->has('file'))
            <div class="text-danger">
              {{ $errors->first('file')}}
            </div>
            @endif
          </div>

          <div class="row mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $absenrutinitas->absenrutinitas_file }}">
            </div>
          </div>

          </br>
          <div class="d-flex justify-content-end">
            <button type="submit" value="Simpan Data" class="btn btn-primary me-2">Submit</button>
            <a href="/harian/absen/{id}" class="btn btn-secondary">Cancel</a>
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