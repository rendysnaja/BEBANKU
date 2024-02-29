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
        <h6>Simpulan Pengisian Kegiatan</h6>
      </div>
      <div class="card-body">
          <!-- <div class="card">
              <div class="card-body">
                <h6 class="card-title">Info Untuk Asesor</h6>
                <p>Ini adalah informasi</p>
              </div>
          </div>
          <br> -->
          <ul class="nav nav-tabs nav-fill nav-pills" id="lineTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#biodata" role="tab" aria-controls="biodata" aria-selected="true">Biodata</a>
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
          <!-- <li class="nav-item">
            <a class="nav-link disabled" id="disabled-line-tab" data-bs-toggle="tab" data-bs-target="#disabled" role="tab" aria-controls="disabled" aria-selected="false">Disabled</a>
          </li> -->
        </ul>
        <div class="tab-content mt-3" id="lineTabContent">

        <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-line-tab">
            <!-- <br>  -->
            <div class="table-responsive">
              <table id="table" class="table">
                <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <!-- <th>Lama Kegiatan</th>
                    <th>Jumlah Pelaksana</th> -->
                    <th>Status Verifikasi </th>
                    <th>Beban Kegiatan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12 Desember 2023</td>
                    <!-- <td>Menari sambil cari ayang</td>
                    <td>1</td> -->
                    <td>Diterima</td>
                    <td>-</td>
                    <td>
                      <a href="/simpulan/detail" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Ditolak</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Belum Terverifikasi</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="rutinitas" role="tabpanel" aria-labelledby="rutinitas-line-tab">
            <!-- <br>  -->
            <div class="table-responsive">
              <table id="table" class="table">
                <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <!-- <th>Lama Kegiatan</th>
                    <th>Jumlah Pelaksana</th> -->
                    <th>Status Verifikasi </th>
                    <th>Beban Kegiatan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12 Desember 2023</td>
                    <!-- <td>Menari sambil cari ayang</td>
                    <td>1</td> -->
                    <td>Diterima</td>
                    <td>-</td>
                    <td>
                      <a href="/simpulan/detail" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Ditolak</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Belum Terverifikasi</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="tambahan-line-tab">
            <div class="table-responsive">
              <table id="table" class="table">
                <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Status Verifikasi </th>
                    <th>Beban Kegiatan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Diterima</td>
                    <td>-</td>
                    <td>
                      <a href="/simpulan/detail" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Ditolak</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>12 Desember 2023</td>
                    <td>Belum Terverifikasi</td>
                    <td>-</td>
                    <td>
                      <a href="/absen2/edit" class="btn btn-primary btn-icon">
                        <i data-feather="eye"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Batas Navigasi Tab -->
          
          <div class="tab-pane fade" id="simpulan" role="tabpanel" aria-labelledby="simpulan-line-tab">
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
                    <td>Rutinitas</td>
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

          <!-- Batas Navigasi Tab -->

          <div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-line-tab">...</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex justify-content-center">
<button type="button" class="btn btn-primary">Submit</button>
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