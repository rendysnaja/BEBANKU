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
        <h6>Detail Verifikasi Kegiatan </h6>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Kegiatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Membuat Surat">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Pelaksanaan Kegiatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Sedang Dilakukan">
          </div>
        </div>

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
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="2">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bukti Pendukung</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="-">
          </div>
        </div>

        <!-- Isi Accordion -->
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h6>Hasil Verifikasi</h6>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h6>Hasil FTE</h6>
                    <br>
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
                  </li>
                  <li class="list-group-item">
                    <br>
                    <h6>Hasil Asesor</h6>
                    <br>
                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Beban Kegiatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Normal">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nilai Beban Kegiatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="1.28">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Komentar</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Bagus">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Verifikasi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Contoh kegiatan menari : menari" disabled value="Diterima">
                      </div>
                    </div>
                  </li>
                </ul>
                <!-- <div class="row mb-3">
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
                      </div> -->
              </div>
            </div>
          </div>

          <!-- Batas Accordion -->

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h6>Jurnal Pelaksanaan Kegiatan</h6>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
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
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i data-feather="eye"></i>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>12 Desember 2023</td>
                        <td>Menari sambil cari ayang</td>
                        <td>1</td>
                        <td>
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i data-feather="eye"></i>
                          </div>
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
                        </td>
                      </tr>

                      <tr>
                        <td>12 Desember 2023</td>
                        <td>Menari sambil cari ayang</td>
                        <td>1</td>
                        <td>
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i data-feather="eye"></i>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>12 Desember 2023</td>
                        <td>Menari sambil cari ayang</td>
                        <td>1</td>
                        <td>
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i data-feather="eye"></i>
                          </div>
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
                        </td>
                      </tr>

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
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Batas Card -->
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