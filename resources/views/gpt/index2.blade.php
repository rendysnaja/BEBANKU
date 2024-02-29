<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat Pagination Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
 
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
				
				<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
				<h3>Data Pegawai</h3>
				
				<p>Cari Data Pegawai :</p>
				<form action="/pegawai/cari" method="GET">
					<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
					<input type="submit" value="CARI">
				</form>
						
				<br/>
				
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
				
				<br/>
				
			</div>
		</div>
	</div>
</body>
</html>