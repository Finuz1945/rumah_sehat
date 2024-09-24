<?php
session_start();

include 'koneksi.php';
$a = $_POST['id'];
$b = $_POST['nama'];
$c = $_POST['password'];
$d = $_POST['goldar'];
$e = $_POST['tempat'];
$f = $_POST['tanggal'];
$g = $_POST['kelamin'];
$h = $_POST['alamat'];
$i = 'pasien';

if(isset($_POST['daftar'])){
	if (empty($_POST['id']) || empty($_POST['nama']) || empty($_POST['password']) || empty($_POST['goldar']) || empty($_POST['tempat']) || empty($_POST['tanggal']) || empty($_POST['kelamin']) || empty($_POST['alamat'])) {
        echo "<script>alert('Data Registrasi masih ada yang kosong!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../daftar.php'>";
        
    }   else{
    $sql =
    "INSERT INTO pengguna VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i')";
    $query = mysqli_query($db, $sql);

    echo "<script>alert('Anda berhasil Daftar!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
} else
?>