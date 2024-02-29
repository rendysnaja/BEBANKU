<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<form action="/formulir/proses" method="post">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
      	Nama Kegiatan :
		<input type="text" name="namakegiatan"> <br/>
		Tanggal Kegiatan :
		<input type="text" name="tanggalkegiatan"> <br/>
		<input type="submit" value="Simpan">
	</form>
 
</body>
</html>