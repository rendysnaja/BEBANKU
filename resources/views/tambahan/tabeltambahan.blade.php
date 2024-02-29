@extends('layout2.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambahan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
        <h6>Kegiatan Tambahan</h6>
        <a href="/tambahan/tambah">
          <div class="d-flex justify-content-end">
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
              <th>Nama Kegiatan</th>
              <th>Status Kegiatan</th>
              <th>Jumlah Pelaksana</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($evaluasidetail as $e)
              @foreach($e->tambahan as $t)
                <tr>
                  <td>{{ $t->tambahan_nama }}</td>
                  <td>{{ $t->tambahan_status }}</td>
                  <td>{{ $t->tambahan_pelaksana }}</td>
                  <td>
                    <a href="/tambahan/edit/{{ $t->id }}" class="btn btn-primary btn-icon">
                      <i data-feather="edit-2"></i>
                    </a>
                    <a href="/tambahan/absen/{{ $t->id }}" class="btn btn-success btn-icon">
                      <i data-feather="file-plus"></i>
                    </a>
                    <a href="/tambahan/hapus/{{ $t->id }}" class="btn btn-danger btn-icon">
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