@extends('layout2.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item"><a href="#">Tambahan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Jurnal Kegiatan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Detail Kegiatan {{ $tambahan->tambahan_nama }}</h6>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Kegiatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $tambahan->tambahan_nama }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Kegiatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="status" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $tambahan->tambahan_status }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Estimasi Lama Pelaksanaan</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="lamajam" id="exampleInputUsername2" placeholder="Contoh 1 jam : 1" disabled value="{{ $tambahan->tambahan_lamajam }}">
          </div>
          <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" placeholder="Contoh 30 menit : 30" disabled value="{{ $tambahan->tambahan_lamamenit }}">
          </div>
          <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Pelaksana</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="{{ $tambahan->tambahan_pelaksana }}">
          </div>
        </div>

        <div class="form-group">
          <div class="row mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pendukung</label>
            <div class="col-sm-9">
              <a href="/tambahan/download/{{ $tambahan->id }}">
                <button class="btn btn-success btn-sm" type="button">Download</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Batas Card -->

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary d-flex justify-content-between align-items-center">
        <h6>Jurnal Pelaksanaan Kegiatan {{ $tambahan->tambahan_nama }}</h6>
        <div class="d-flex justify-content-end align-items-center flex-wrap text-nowrap">
          <a href="/absen2/tambah/{{ $tambahan->id }}">
            <button type="button" class="btn btn-light btn-xs btn-icon-text me-2 mb-2 mb-md-0">
              Tambah
            </button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Tanggal Pelaksanaan</th>
                <th>Deskripsi Pelaksanaan</th>
                <th>Lama Pelaksanaan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tambahan->absentambahan()->get() as $t)
              <tr>
                <td>{{ $t->absentambahan_tanggal }}</td>
                <td>{{ $t->absentambahan_deskripsi }}</td>
                <td>{{ $t->absentambahan_lamajam }} jam {{ $t->absentambahan_lamamenit }} menit</td>
                <td>
                  <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $t->id }}">
                    <i data-feather="eye"></i>
                  </div>
                  <div class="modal fade" id="exampleModal{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Detail jurnal Pelaksanaan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $t->absentambahan_tanggal }}" required="required">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Pelaksanaan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $t->absentambahan_deskripsi }}" required="required">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Pelaksanaan</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="lamajam" id="exampleInputUsername2" disabled value="{{ $t->absentambahan_lamajam }}">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" disabled value="{{ $t->absentambahan_lamamenit }}">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
                          </div>

                          <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
                            <div class="col-sm-9">
                              <a href="/absen2/download/{{ $t->id }}">
                                <button class="btn btn-success btn-sm" type="button">Download</button>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="/absen2/edit/{{ $t->id }}" class="btn btn-success btn-icon">
                    <i data-feather="edit-2"></i>
                  </a>
                  <a href="/absen2/hapus/{{ $t->id }}" class="btn btn-danger btn-icon">
                    <i data-feather="trash"></i>
                  </a>
                </td>
              </tr>

              <!-- <div class="modal fade" id="exampleModal{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" placeholder="Contoh 12 Desember 2023 : 12 Desember 2023" required="required">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Pelaksanaan</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh perencanaan menari : perencanaan menari" required="required">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
                        <div class="col-sm-9">
                          <input class="form-control" name="bukti" type="file" id="formFile">
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div> -->
              @endforeach
            </tbody>
          </table>
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