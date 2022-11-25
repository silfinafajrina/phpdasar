<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$sws = query("SELECT * FROM tb_siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
  	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}
  
  
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ubah data siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
	<style>
		ul li { list-style: none; }
	</style>
</head>
    <body class="bg-danger">
	<h1 class="text-center mt-5">ubah data siswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row">
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
	<div class="input-group mb-3 col-md-6">
  <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">NIS</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Jurusan</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

</div>
</div>
	<br><br>
		<ul>
			<li>
				<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>
	</form>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
  
</html>