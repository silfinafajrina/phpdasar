<?php
// Koneksi ke Database
	
$conn = mysqli_connect("localhost", "root", "", "db_siswa");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_siswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis =  htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }


	$query = "INSERT INTO tb_siswa
				VALUES
			('', '$nama', '$nis', '$email', '$jurusan', '$gambar')
            ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['nama'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    //cekapakah tidak ada gambar yang di upload
    if($error === 4 ) {
        echo "<script>
                    alert('pilih gambar terlebih dahulu');
                    </script>";
                    return false;
    }
//cek apakah yang diupload adalah gambar
$ekstensiGambarValid = ['jpg','jpeg','png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if(in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;

}

//cek jika ukurannya terlalu besar
if($ukuranfile > 1000000){
    echo "<script>
    alert('Ukuran gambar terlalu besar!');
</script>";
return false;
}

//lolos pengecekan,gambar siap di upload
 move_uploaded_file($tmp_name, 'img/' .  $namaFile);

 return $namaFile;
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nis = htmlspecialchars($data["nis"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE tb_siswa SET
                        nama = '$nama',
                        nis = '$nis',
                        email = '$email',
                        jurusan = '$jurusan',
                        gambar = '$gambar'

                    WHERE id = $id
			        ";
	// var_dump($query); die;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function cari($keyword) {
    $query ="SELECT * FROM tb_siswa
                WHERE
                nama LIKE '%$keyword%' OR
                nis LIKE  '%$keyword%' OR
                email LIKE  '%$keyword%' OR
                jurusan LIKE  '%$keyword%' 
                ";

return query($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
            alert('username yang sudah dipilih sudah terdaftar!')
            </script>";
        return false;
    }

    //cek konfirmasi masuk
    if( $password !== $password2 ) {
        echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
 

   // tambahkan user ke databse
    mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$password' )");

    return mysqli_affected_rows($conn);



}



 








?>