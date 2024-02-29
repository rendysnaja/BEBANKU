@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
	<div>
		<h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
	</div>
	<div class="container">
		<div class="card">
			<div class="card-body">

				<!-- <style type="text/css">
					.pagination li{
						float: left;
						list-style-type: none;
						margin:5px;
					}
				</style> -->

				<!-- <h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2> -->
				<h3>Data Pegawai</h3>

				<p>Cari Data Pegawai :</p>
				<form action="/pegawai/cari" method="GET">
					<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
					<input type="submit" value="CARI">
				</form>

				<br />

				<table border="1">
					<tr>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Umur</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
					@foreach($pegawai as $p)
					<tr>
						<td>{{ $p->pegawai_nama }}</td>
						<td>{{ $p->pegawai_jabatan }}</td>
						<td>{{ $p->pegawai_umur }}</td>
						<td>{{ $p->pegawai_alamat }}</td>
						<td>
							<a href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
							|
							<a href="/pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

				<br />

				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#"><i data-feather="chevron-left"></i></a></li>
						<!-- <li class="page-item active"><a class="page-link" href="#">1</a></li> -->
						<!-- <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
						<li class="page-item"><a class="page-link" href="#"><i data-feather="chevron-right"></i></a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div> <!-- row -->
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush