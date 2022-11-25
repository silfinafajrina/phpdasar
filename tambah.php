<?php 

require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {


//cek apakah data berhasil di tambahkan atau tidak	
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			  </script>
        ";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body class="bg-secondary">
	<h1 class="text-center mt-5">Tambah Data siswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row">
	
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id">
</div>
	<div class="input-group mb-3 col-md-6">
  <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama">
</div>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">NIS</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nis">
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Jurusan</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jurusan">
</div>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="gambar">

</div>
</div>
	<br><br>
		<ul>
			<li>
				<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>
	</form>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>