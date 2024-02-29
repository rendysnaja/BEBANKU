@extends('layout3.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Simpulan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Verifikasi Kegiatan</h6>
      </div>
      <div class="card-body">

        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Informasi Asesor</h6>
            <div class="table-responsive">
              <table id="table" class="table">
                <tbody>
                  <tr>
                    <th scope="row">Nama</th>
                    <td class="text-left">{{ $asesor->user->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Unit Kerja</th>
                    <td>{{ $asesor->user->unit->unit_nama }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Jabatan</th>
                    <td>{{ $asesor->user->jabatan }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header text-white bg-secondary">
            Daftar Peserta Verifikasi
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Asal Unit</th>
                    <th>Periode Evaluasi</th>
                    <th>Status Verifikasi</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($asesor->evaluasidetail()->get() as $e)
                  <tr>
                    <td>{{ $e->user->name }}</td>
                    <td>{{ $e->user->unit->unit_nama }}</td>
                    <td>{{ $e->evaluasi->evaluasi_periode }}</td>
                    <td>
                      @if ($e->status == 1)
                        Rencana Kegiatan Belum Dibuat
                      @elseif ($e->status == 2)
                        Rencana Kegiatan Sedang Dibuat
                      @elseif ($e->status == 3)
                       Belum Dilakukan Verifikasi
                      @elseif ($e->status == 4)
                        Sudah Dilakukan Verifikasi
                      @endif
                    </td>
                    <td>
                      @if ($e->status == 1)
                       <a href="/verifikasi" class="btn btn-secondary btn-xs disabled">Verifikasi</a>
                      @elseif ($e->status == 2)
                        <a href="/verifikasi" class="btn btn-primary btn-xs disabled">Verifikasi</a>
                      @elseif ($e->status == 3)
                        <a href="/verifikasi/{{ $e->id }}" class="btn btn-primary btn-xs">Verifikasi</a>
                      @elseif ($e->status == 4)
                        <a href="/verifikasi/{{ $e->id }}" class="btn btn-success btn-xs">Lihat Verifikasi</a>
                      @endif
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