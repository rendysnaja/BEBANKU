@extends('layout4.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Daftar Laporan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Laporan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h6>Laporan Beban Kegiatan</h6>
      </div>
      <div class="card-body">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Info Untuk Karyawan</h6>
            <p>Ini adalah informasi</p>
          </div>
        </div>
        <br>
        <ul class="nav nav-tabs nav-fill nav-tabs-line" id="lineTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#biodata" role="tab" aria-controls="biodata" aria-selected="true">Biodata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#izin" role="tab" aria-controls="izin" aria-selected="false">Izin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#rutinitas" role="tab" aria-controls="rutinitas" aria-selected="false">Rutinitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" data-bs-target="#tambahan" role="tab" aria-controls="tambahan" aria-selected="false">Tambahan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" data-bs-target="#simpulan" role="tab" aria-controls="simpulan" aria-selected="false">Simpulan</a>
          </li>
        </ul>
        <div class="tab-content mt-3" id="lineTabContent">

          <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-line-tab">
            <br>
            <div class="row row-cols-1 row-cols-md-2 g-4">
              <div class="col">
                <div class="card">
                  <div class="card-header text-white bg-secondary">
                    <h6>Asesor Penilai</h6>
                  </div>
                  <img src="https://th.bing.com/th/id/OIP.L--ejAMtEYclobboenz2FgHaE8?rs=1&pid=ImgDetMain" class="card-img-mid" height="250" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $evaluasidetail->asesor->user->name }}</h5>
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Unit</th>
                            <td>{{ $evaluasidetail->asesor->user->unit->unit_nama }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Jabatan</th>
                            <td>{{ $evaluasidetail->asesor->user->jabatan }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-header text-white bg-secondary">
                    <h6>Peserta Penilaian</h6>
                  </div>
                  <img src="https://149361874.v2.pressablecdn.com/wp-content/uploads/2014/02/Depositphotos_19288743_youngbusinessman.jpg" class="card-img-mid" height="250" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $evaluasidetail->user->name }}</h5>
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Unit</th>
                            <td>{{ $evaluasidetail->user->unit->unit_nama }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Jabatan</th>
                            <td>{{ $evaluasidetail->user->jabatan }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade show" id="izin" role="tabpanel" aria-labelledby="izin-line-tab">
            <br>
            <div class="card">
              <div class="card-header text-white bg-secondary">
                <h6>Izin dan Cuti</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead>
                      <tr>
                        <th>Deskripsi Izin</th>
                        <th>Jenis Izin</th>
                        <th>Tanggal Izin</th>
                        <th>Lama Izin</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($evaluasidetail->izin()->get() as $i)
                      <tr>
                        <td>{{ $i->izin_deskripsi }}</td>
                        <td>{{ $i->izin_jenis }}</td>
                        <td>{{ $i->izin_tanggal }}</td>
                        <td>{{ $i->izin_lamahari }}</td>
                        <td>
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i->id }}">
                            <i data-feather="eye"></i>
                          </div>
                          <div class="modal fade" id="exampleModal{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detail jurnal Pelaksanaan</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Izin</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" disabled value="{{ $i->izin_deskripsi }}" required="required">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Izin</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $i->izin_jenis }}" required="required">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Izin</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $i->izin_tanggal }}" required="required">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
                                    <div class="col-sm-9">
                                      <a href="/izin/download/{{ $i->id }}">
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
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade show" id="rutinitas" role="tabpanel" aria-labelledby="rutinitas-line-tab">
            <br>
            <div class="card">
              <div class="card-header text-white bg-secondary">
                <h6>Kegiatan Rutinitas</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead>
                      <tr>
                        <th>Nama Kegiatan</th>
                        <th>Status Kegiatan</th>
                        <th>Jumlah Pelaksana</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($evaluasidetail->rutinitas()->get() as $r)
                      <tr>
                        <td>{{ $r->rutinitas_nama }}</td>
                        <td>{{ $r->rutinitas_status }}</td>
                        <td>{{ $r->rutinitas_pelaksana }}</td>
                        <td>
                          <a href="/manajemen/detaillaporan/{{ $r->id }}" class="btn btn-primary btn-icon">
                            <i data-feather="eye"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="tambahan-line-tab">
            <br>
            <div class="card">
              <div class="card-header text-white bg-secondary">
                <h6>Kegiatan Tambahan</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead>
                      <tr>
                        <th>Nama Kegiatan</th>
                        <th>Status Kegiatan</th>
                        <th>Jumlah Pelaksana</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($evaluasidetail->tambahan()->get() as $t)
                      <tr>
                        <td>{{ $t->tambahan_nama }}</td>
                        <td>{{ $t->tambahan_status }}</td>
                        <td>{{ $t->tambahan_pelaksana }}</td>
                        <td>
                          <a href="/manajemen/detaillaporan2/{{ $t->id }}" class="btn btn-primary btn-icon">
                            <i data-feather="eye"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="simpulan" role="tabpanel" aria-labelledby="simpulan-line-tab">
            <br>
            <!-- <div class="card"> 
            <div class="card-header text-white bg-secondary">
              <h6>Simpulan Verifikasi</h6>
            </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <thead>
                          <tr>
                            <th>Jenis Kegiatan</th>
                            <th>Jumlah Kegiatan</th>
                            <th>Diterima</th>
                            <th>Ditolak</th>
                            <th>Beban Lebih</th>
                            <th>Beban Normal</th>
                            <th>Beban Kurang</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rutinitas</td>
                            <td>10</td>
                            <td>9</td>
                            <td>1</td>
                            <td>2</td>
                            <td>6</td>
                            <td>1</td>
                          </tr>
                          <tr>
                            <td>Tambahan</td>
                            <td>10</td>
                            <td>9</td>
                            <td>1</td>
                            <td>2</td>
                            <td>6</td>
                            <td>1</td>
                          </tr>
                          <tr class="table-primary">
                            <td><strong>Total Kegiatan</strong></td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>4</td>
                            <td>12</td>
                            <td>2</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>  -->
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Status Verifikasi Kegiatan
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <thead>
                          <tr>
                            <th>Jenis Kegiatan</th>
                            <th>Jumlah Kegiatan</th>
                            <th>Diterima</th>
                            <th>Ditolak</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rutinitas</td>
                            <td>{{ $evaluasidetail->user->rutinitas->count() }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->rutinitasditerima }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->rutinitasditolak }}</td>
                          </tr>
                          <tr>
                            <td>Tambahan</td>
                            <td>{{ $evaluasidetail->user->tambahan->count() }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->tambahanditerima }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->tambahanditolak }}</td>
                          </tr>
                          <tr class="table-primary">
                            <td><strong>Total Kegiatan</strong></td>
                            <td>{{ $evaluasidetail->hasilevaluasi->totalkegiatan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->totalditerima }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->totalditolak }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Beban Kegiatan Oleh FTE
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <thead>
                          <tr>
                            <th>Jenis Kegiatan</th>
                            <th>Beban Lebih</th>
                            <th>Beban Normal</th>
                            <th>Beban Kurang</th>
                            <th>Nilai Beban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rutinitas</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->fterutinitasberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->fterutinitasnormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->fterutinitaskurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumfterutinitas,2) }}</td>
                          </tr>
                          <tr>
                            <td>Tambahan</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->ftetambahanberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->ftetambahannormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->ftetambahankurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumftetambahan,2) }}</td>
                          </tr>
                          <tr class="table-primary">
                            <td><strong>Total Kegiatan</strong></td>
                            <td>{{ $evaluasidetail->hasilevaluasi->fteberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->ftenormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->ftekurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumftetotal,2) }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Beban Kegiatan Oleh Asesor
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="table-responsive">
                      <table id="table" class="table">
                        <thead>
                          <tr>
                            <th>Jenis Kegiatan</th>
                            <th>Beban Lebih</th>
                            <th>Beban Normal</th>
                            <th>Beban Kurang</th>
                            <th>Nilai Beban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rutinitas</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesorrutinitasberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesorrutinitasnormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesorrutinitaskurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumasesorrutinitas,2) }}</td>
                          </tr>
                          <tr>
                            <td>Tambahan</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesortambahanberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesortambahannormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesortambahankurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumasesortambahan,2) }}</td>
                          </tr>
                          <tr class="table-primary">
                            <td><strong>Total Kegiatan</strong></td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesorberlebihan }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesornormal }}</td>
                            <td>{{ $evaluasidetail->hasilevaluasi->asesorkurang }}</td>
                            <td>{{ number_format ($evaluasidetail->hasilevaluasi->sumasesortotal,2) }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-line-tab">...</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="d-flex justify-content-center">
  <button type="button" class="btn btn-primary">Simpan Permanen</button>
</div> -->

<!-- Batas Card -->
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush