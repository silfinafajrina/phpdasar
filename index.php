<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;

}

require 'functions.php';
$siswa = query("SELECT * FROM tb_siswa");

//tombol cari ditekan
if( isset($_POST["cari"])){
	$siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<title>Halaman Administrator</title>

</head>
<body class="bg-dark">
<div class="container-fluid">
	<div class="row">
		<div class="col col-md-10 offset-md-1 shadow mt-5">

		
			
			<h1 class="text-light">Halaman Administrator</h1>
			
			<a class="btn btn-primary" href="tambah.php">Tambah data siswa</a>
			<br><br>
			<a class="btn btn-warning" href="registrasi.php">register</a>
			<br><br>
			<a class="btn btn-danger" href="login.php">Login</a>
			<br><br>
			<form class="d-flex" action="" method="post">
			
			<input class="form-control me-4" type="text" name="keyword" size="40" auotafocus 
			placeholder="Masukkan keyword pencarian..." autocomplete="off">
			<button class="btn btn-dark " type="submit" name="cari">Cari</button>
			</form>
			<br>
			
			<table class="table table-bordered bg-secondary" border="1" cellspacing="0" cellpadding="5">
				<tr>
					<th>No.</th>
					<th>Aksi</th>
					<th>Gambar</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Jurusan</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach( $siswa as $row ) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><a href="ubah.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-pencil-fill text-success"></i></a> 
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yasin gk dek?')"><i class="bi bi-trash-fill text-danger"></i></a></td>
					<td>
						<img src="img/<?= $row["gambar"]; ?>" width="50">
					</td>
					<td><?= $row["nis"]; ?></td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["email"]; ?></td>
					<td><?= $row["jurusan"]; ?></td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
			<br>
			<a href="logout.php">logout</a><br><br><br>
		</div>
	</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>