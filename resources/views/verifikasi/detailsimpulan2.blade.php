@extends('layout3.master')

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
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->tambahan_nama }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Pelaksanaan Kegiatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->tambahan_status }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Kegiatan</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="lama" id="exampleInputUsername2" disabled value="{{ $tambahan->tambahan_lamajam }}">
          </div>
          <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" disabled value="{{ $tambahan->tambahan_lamamenit }}">
          </div>
          <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Pelaksana</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->tambahan_pelaksana }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bukti Pendukung</label>
          <div class="col-sm-9">
            <a href="/harian/download/{{ $tambahan->id }}">
              <button class="btn btn-success btn-sm" type="button">Download</button>
            </a>
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
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ number_format($tambahan->ftetambahan->ftetambahan_nilai,2) }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Beban Kegiatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->ftetambahan->ftetambahan_kategori }}">
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <br>
                    <h6>Hasil Asesor</h6>
                    <br>
                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nilai Beban Kegiatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ number_format($tambahan->ftetambahan->asesortambahan_nilai,2) }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kategori Beban Kegiatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->ftetambahan->asesortambahan_kategori }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Komentar</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="komentar" id="exampleFormControlTextarea1" rows="5" disabled required="required">{{ $tambahan->ftetambahan->asesortambahan_komentar }}</textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Verifikasi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" disabled value="{{ $tambahan->ftetambahan->asesortambahan_status }}">
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
                        <th>Lama Pelaksanaan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tambahan->absentambahan()->get() as $a)
                      <tr>
                        <td>{{ $a->absentambahan_tanggal }}</td>
                        <td>{{ $a->absentambahan_deskripsi }}</td>
                        <td>
                          @if ($a->absentambahan_lamajam == NULL && $a->absentambahan_lamamenit != NULL)

                          {{ $a->absentambahan_lamamenit }} menit

                          @elseif ($a->absentambahan_lamajam != NULL && $a->absentambahan_lamamenit == NULL)

                          {{ $a->absenrutinitas_lamajam }} jam

                          @elseif ($a->absentambahan_lamajam != NULL && $a->absentambahan_lamamenit != NULL)

                          {{ $a->absentambahan_lamajam }} jam {{ $a->absentambahan_lamamenit }} menit

                          @endif
                        </td>
                        <td>
                          <div class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $a->id }}">
                            <i data-feather="eye"></i>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detail Jurnal Pelaksanaan</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="tanggal" id="exampleInputUsername2" required="required" disabled value="{{ $a->absentambahan_tanggal }}">
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi Pelaksanaan</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="nama" id="exampleInputUsername2" required="required" disabled value="{{ $a->absentambahan_deskripsi }}">
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lama Pelaksanaan</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" name="lamajam" id="exampleInputUsername2" disabled value="{{ $a->absentambahan_lamajam }}">
                                    </div>
                                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Jam</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" name="lamamenit" id="exampleInputUsername2" disabled value="{{ $a->absentambahan_lamamenit }}">
                                    </div>
                                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Menit</label>
                                  </div>

                                  <div class="row mb-3">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bukti Pelaksanaan</label>
                                    <div class="col-sm-9">
                                      <a href="/absen2/download/{{ $a->id }}">
                                        <button class="btn btn-success btn-sm" type="button">Download</button>
                                      </a>
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
                      @endforeach
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