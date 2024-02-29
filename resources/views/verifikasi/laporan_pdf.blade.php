<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-4">
		<div class="container">
			<h4 class="d-flex justify-content-center font-weight-bold">Laporan Evaluasi Beban Kerja</h4>
			<h5 class="d-flex justify-content-center">Periode {{ $evaluasidetail->evaluasi->evaluasi_periode }}</h5>
		</div>

		<br>

		<div class="container">
			<div class="form-group">
				<table>
					<thead>
						<th>Informasi Asesi</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>{{ $evaluasidetail->user->name }}</td>
						</tr>
						<tr>
							<td>Unit Kerja</td>
							<td>:</td>
							<td>{{ $evaluasidetail->user->unit->unit_nama }}</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td>{{ $evaluasidetail->user->jabatan }}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="form-group">
				<table>
					<thead>
						<th>Informasi Asesor</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>{{ $evaluasidetail->asesor->user->name }}</td>
						</tr>
						<tr>
							<td>Unit Kerja</td>
							<td>:</td>
							<td>{{ $evaluasidetail->asesor->user->unit->unit_nama }}</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td>{{ $evaluasidetail->asesor->user->jabatan }}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<br>

			<h5 class="font-weight-bold d-flex justify-content-center">Rekap Kegiatan</h5>

			<div class="form-group">
				<p class="font-weight-bold">Kegiatan Rutinitas</p>

				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Nama Kegiatan Rutinitas</th>
							<th>Status Verifikasi</th>
							<th>Beban (FTE)</th>
							<th>Beban (Asesor)</th>
						</tr>
					</thead>
					<tbody>
						@foreach($evaluasidetail->rutinitas()->get() as $r)
						<tr>
							<td>{{ $r->rutinitas_nama }}</td>
							<td>{{ $r->fterutinitas->asesorrutinitas_status }}</td>
							<td>{{ number_format ($r->fterutinitas->fterutinitas_nilai, 2) }}</td>
							<td>{{ number_format ($r->fterutinitas->asesorrutinitas_nilai, 2) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<br>

			<div class="form-group">
				<p class="font-weight-bold">Kegiatan Tambahan</p>

				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Nama Kegiatan Tambahan</th>
							<th>Status Verifikasi</th>
							<th>Beban (FTE)</th>
							<th>Beban (Asesor)</th>
						</tr>
					</thead>
					<tbody>
						@foreach($evaluasidetail->rutinitas()->get() as $r)
						<tr>
							<td>{{ $r->rutinitas_nama }}</td>
							<td>{{ $r->fterutinitas->asesorrutinitas_status }}</td>
							<td>{{ number_format ($r->fterutinitas->fterutinitas_nilai, 2) }}</td>
							<td>{{ number_format ($r->fterutinitas->asesorrutinitas_nilai, 2) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<br>

			<h5 class="font-weight-bold d-flex justify-content-center">Kesimpulan</h5>

			<div class="form-group">
				<p class="font-weight-bold">Status Verifikasi Kegiatan</p>

				<table class="table table-bordered">
					<thead class="thead-dark">
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
							<td>{{ $evaluasidetail->rutinitas->count() }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->rutinitasditerima }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->rutinitasditolak }}</td>
						</tr>
						<tr>
							<td>Tambahan</td>
							<td>{{ $evaluasidetail->tambahan->count() }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->tambahanditerima }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->tambahanditolak }}</td>
						</tr>
						<tr class="table-primary">
							<td><strong>Total</strong></td>
							<td>{{ $evaluasidetail->hasilevaluasi->totalkegiatan }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->totalditerima }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->totalditolak }}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<br>

			<div class="form-group">
				<p class="font-weight-bold">Beban Kegiatan Oleh FTE</p>

				<table class="table table-bordered">
					<thead class="thead-dark">
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
							<td><strong>Total</strong></td>
							<td>{{ $evaluasidetail->hasilevaluasi->fteberlebihan }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->ftenormal }}</td>
							<td>{{ $evaluasidetail->hasilevaluasi->ftekurang }}</td>
							<td>{{ number_format ($evaluasidetail->hasilevaluasi->sumftetotal,2) }}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<br>

			<div class="form-group">
				<p class="font-weight-bold">Beban Kegiatan Oleh Asesor</p>

				<table class="table table-bordered">
					<thead class="thead-dark">
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
							<td><strong>Total</strong></td>
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
</body>

</html>