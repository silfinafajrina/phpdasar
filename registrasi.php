<<?php 
require 'functions.php'; 

if( isset($_POST["register"]) ) {
  
    if( registrasi($_POST) > 0 ) {
     echo "<script>
            alert('user baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($conn);
    } 
   
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halamn Regristrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body class="bg-success">
    
<h1 class="text-center">Halaman Regristrasi</h1>

<form action="" method="post">
<br><br>
<div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ID</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="masukkan id" id="id" name="id">
   
  </div>
</div>
<div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="masukkan nama anda" id="username" name="username">
   
  </div>
</div>
<div class="row mb-3">
  <label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password">
  </div>
</div>
<div class="row mb-3">
  <label for="colFormLabel" class="col-sm-2 col-form-label"> konfirmasi Password</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="password2" name="password2" placeholder="ketik ulang password">
  </div>
</div>

<button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Register!</button>
</li>
</ul>

</form>

</body>
</html>