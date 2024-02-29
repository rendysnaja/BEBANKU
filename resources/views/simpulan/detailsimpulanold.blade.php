@extends('layout2.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Rekap Kegiatan</a></li>
    <li class="breadcrumb-item"><a href="#">Simpulan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Kegiatan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Detail Kegiatan </h6>
      </div>
        <div class="card-body">
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="avcdfvrvg">
            </div>
          </div>

          <!-- <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="b">
            </div>
          </div> -->

          <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Kegiatan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lama" id="exampleInputUsername2" placeholder="1" disabled value="1">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" placeholder="30" disabled value="30">
            </div>
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Pelaksana</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="c">
            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bukti Pendukung</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="d">
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
      <div class="card-header text-white bg-primary">
        <h6>Hasil Verifikasi</h6>
      </div>
        <div class="card-body">
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Verifikasi</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Diterima">
            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Komentar</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Bagus">
            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nilai Beban Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="1.28">
            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Beban Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Normal">
            </div>
          </div>

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bukti Pendukung</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="d">
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
      <div class="card-header text-white bg-primary">
          <h6>Jurnal Pelaksanaan Kegiatan</h6>
        </div>
      <div class="card-body">
       
        <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
         <a href="/absen2/tambah">
           <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              Tambah
            </button>
          </a>
        </div>
   
        <br> -->
       
        <div class="table-responsive">
          <table id="table" class="table">
            <thead>
              <tr>
                <th>Tanggal Kegiatan</th>
                <th>Deskripsi Pelaksanaan</th>
                <th>Bukti Pelaksanaan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>12 Desember 2023</td>
                <td>Menari sambil cari ayang</td>
                <td>1</td>
                <td>
                  <a href="/absen2/edit" class="btn btn-primary btn-icon">
                   <i data-feather="eye"></i>
                  </a>
                </td>
              </tr>

              <tr>
                <td>12 Desember 2023</td>
                <td>Menari sambil cari ayang</td>
                <td>1</td>
                <td>
                  <a href="/absen2/edit" class="btn btn-primary btn-icon">
                   <i data-feather="eye"></i>
                  </a>
                </td>
              </tr>

              <tr>
                <td>12 Desember 2023</td>
                <td>Menari sambil cari ayang</td>
                <td>1</td>
                <td>
                  <!-- Button trigger modal -->
                  <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   <i data-feather="eye"></i>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  </div>
                </td>
              </tr>
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