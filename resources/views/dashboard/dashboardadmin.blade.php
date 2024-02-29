@extends('layout4.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Simpulan</li>
  </ol>
</nav>   -->

<div>
    <h4 class="mb-3 mb-md-0">Selamat Datang {{Auth::user()->name}} Semangat Pasti Bisa</h4>
</div>

<br>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h6>Notifikasi</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table id="table" class="table">
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Kegiatan Telah Diverifikasi</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Segera Selesaikan Rekap Kegiatan Anda</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Harap Mengecek Kembali Kegiatan Anda</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>    
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-md-4 col-xl-6">
    <div class="card">
      <div class="card-header">
        <h6>Ringkasan Profil</h6>
      </div>
      <img src="https://www.mysystemsjournal.com/wp-content/uploads/2019/06/9.jpg" class="card-img-mid" height="250" alt="...">
      <div class="card-body">
        <div class="card-title">{{Auth::user()->name}}</div>
        <div class="table-responsive">
            <table id="table" class="table">
                <tbody>
                    <tr>
                        <th scope="row">Unit</th>
                        <td>{{Auth::user()->unit->unit_nama}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        <td>{{Auth::user()->jabatan}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>    
  </div>
</div>



<!-- Batas Card -->
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush