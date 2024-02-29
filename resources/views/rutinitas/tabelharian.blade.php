@extends('layout2.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rutinitas</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
      <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
        <h6>Kegiatan Rutinitas</h6>
        <div class="d-flex justify-content-end">
          <a href="/harian/tambah">
            <button type="button" class="btn btn-light btn-xs btn-icon-text me-2 mb-2 mb-md-0">
              Tambah
            </button>
          </a>
          <!-- <a href="" class="btn btn-light btn-icon btn-xs">
            <i data-feather="plus"></i>
          </a> -->
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-end">
          <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
         <a href="/harian/tambah">
           <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              Tambah
            </button>
          </a>
        </div> -->
        </div>

        <!-- <br> -->
        
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
                        @foreach($e->rutinitas as $r)
                            <tr>
                                <td>{{ $r->rutinitas_nama }}</td>
                                <td>{{ $r->rutinitas_status }}</td>
                                <td>{{ $r->rutinitas_pelaksana }}</td>
                                <td>
                                    <a href="/harian/edit/{{ $r->id }}" class="btn btn-primary btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="/harian/absen/{{ $r->id }}" class="btn btn-success btn-icon">
                                        <i data-feather="file-plus"></i>
                                    </a>
                                    <a href="/harian/hapus/{{ $r->id }}" class="btn btn-danger btn-icon">
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