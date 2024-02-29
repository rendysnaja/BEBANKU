@extends('layout2.master')

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
                <h6>Simpulan Rekap</h6>
            </div>
            <div class="card-body">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Informasi</h6>
                        <p>Ini adalah informasi</p>
                    </div>
                </div>
                <br>

                <div class="table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Rencana</th>
                                <th>Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->evaluasidetail()->get() as $e )
                            <tr>
                                <td>{{ $e->evaluasi->evaluasi_periode }}</td>
                                <td>
                                    @if ($e->status == 1)
                                    <div class="d-grid">
                                        <a href="/simpulan/mulai/{{ $e->id }}" class="btn btn-secondary btn-xs disabled">Evaluasi Belum Dimulai</a>
                                    </div>
                                    @elseif ($e->status == 2)
                                    <div class="d-grid">
                                        <a href="/simpulan/rencanakegiatan/{{ $e->id }}" class="btn btn-primary btn-xs">Pengerjaan Rencana Beban Kegiatan</a>
                                    </div>
                                    @elseif ($e->status == 3)
                                    <div class="d-grid">
                                        <a href="/simpulan/rencanakegiatan/{{ $e->id }}" class="btn btn-success btn-xs">Lihat Rencana Beban Kegiatan</a>
                                    </div>
                                    @elseif ($e->status == 4)
                                    <div class="d-grid">
                                        <a href="/simpulan/rencanakegiatan/{{ $e->id }}" class="btn btn-success btn-xs">Lihat Rencana Beban Kegiatan</a>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($e->status == 1)
                                    <div class="d-grid">
                                        <a href="" class="btn btn-secondary btn-xs disabled">Menunggu Simpan Permanen</a>
                                    </div>
                                    @elseif ($e->status == 2)
                                    <div class="d-grid">
                                        <a href="" class="btn btn-secondary btn-xs disabled">Menunggu Simpan Permanen</a>
                                    </div>
                                    @elseif ($e->status == 3)
                                    <div class="d-grid">
                                        <a href="" class="btn btn-primary btn-xs disabled">Kegiatan Sedang Diverifikasi</a>
                                    </div>
                                    @elseif ($e->status == 4)
                                    <div class="d-grid">
                                        <a href="/simpulan/laporankegiatan/{{ $e->evaluasi->id}}" class="btn btn-success btn-xs">Lihat Laporan Verifikasi</a>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td>2023/2024 Genap</td>
                                <td>
                                    <div class="d-grid">
                                        <a href="/simpulan/rencanakegiatan" class="btn btn-primary btn-xs">Lihat Rencana Beban Kegiatan</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid">
                                        <a href="/simpulan" class="btn btn-primary btn-xs">Menunggu Verifikasi</a>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <!-- <div class="card">
                    <div class="card-header text-white bg-secondary">
                        Daftar Rencana dan Laporan Kegiatan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Rencana</th>
                                        <th>Laporan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023/2024 Ganjil</td>
                                        <td>
                                            <div class="d-grid">
                                                <a href="/simpulan/rencanakegiatan" class="btn btn-primary btn-xs">Lihat Rencana Beban Kegiatan</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid">
                                                <a href="/simpulan" class="btn btn-primary btn-xs">Lihat Hasil Verifikasi</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2023/2024 Genap</td>
                                        <td>
                                            <div class="d-grid">
                                                <a href="/simpulan/rencanakegiatan" class="btn btn-primary btn-xs">Lihat Rencana Beban Kegiatan</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid">
                                                <a href="/simpulan" class="btn btn-primary btn-xs">Menunggu Verifikasi</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
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