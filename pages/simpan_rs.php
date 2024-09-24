<?php
session_start();

include 'koneksi.php';

$a = $_POST['id_rs'];
$b = $_POST['pilih_dokter'];
$c = $_POST['pilih_tanggal'];
$d = $_POST['pilih_jam'];
$e = $_POST['janji_rs'];
$f = $_SESSION['id'];

if(isset($_POST['Pilih'])){
	if (empty($_POST['id_rs']) || empty($_POST['pilih_dokter']) || empty($_POST['pilih_tanggal']) || empty($_POST['pilih_jam']) || empty($_POST['janji_rs'])) {
        echo "<script>alert('Data RS ada yang masih kosong!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../waktu-rs.php'>";
        
    }   else{
	$sql = 
	"INSERT INTO rs VALUES('$a','$b','$c','$d','$e','$f')";
	$query = mysqli_query($db, $sql);

	echo "<script>alert('Anda berhasil Membuat Janji RS!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	}
} else
?>