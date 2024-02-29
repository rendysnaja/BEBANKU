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
    <li class="breadcrumb-item active" aria-current="page">Tambah Kegiatan Rutinitas</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Tambah Kegiatan Rutinitas</h6>
      </div>
      <div class="card-body">
        <form class="forms-sample" action="/harian/store" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Kegiatan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" required="required">
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
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Pelaksanaan Kegiatan</label>
              <div class="col-sm-9">
                <select class="form-select" name="status" id="exampleFormControlSelect1">
                  <option selected disabled>Pilih Status Pelaksanaan Kegiatan</option>
                  <option>Sedang Dilakukan</option>
                  <option>Telah Selesai</option>
                </select>
              </div>
            </div>

            @if($errors->has('status'))
            <div class="text-danger">
              {{ $errors->first('status')}}
            </div>
            @endif

          </div>

          <!-- <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" placeholder="Contoh 12 Desember 2023 : 12 Desember 2023" required="required">
            </div>
          </div> -->

          <!-- <div class="row mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Lama Kegiatan (menit)</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="lama" id="exampleInputMobile" placeholder="Contoh 1 jam : 60 menit" required="required">
            </div>
          </div> -->

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jumlah Pelaksana</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="pelaksana" id="exampleInputMobile" placeholder="Contoh 2 pelaksana : 2" required="required">
              </div>

              @if($errors->has('pelaksana'))
              <div class="text-danger">
                {{ $errors->first('pelaksana')}}
              </div>
              @endif

            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Estimasi Lama Kegiatan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lamajam" id="exampleInputUsername2" placeholder="Contoh 1 jam : 1">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" placeholder="Contoh 30 menit : 30">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
          </div>

          <!-- <div class="row mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pendukung</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="bukti" id="exampleInputMobile" placeholder="Contohnya surat" required="required">
            </div>
          </div> -->

          <div class="form-group">
            <div class="row mb-3">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pendukung</label>
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