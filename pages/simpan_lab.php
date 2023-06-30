<?php
session_start();

include 'koneksi.php';

$a = $_POST['id_lab'];
$b = $_POST['pilih_dokterlab'];
$c = $_POST['pilih_tanggallab'];
$d = $_POST['pilih_jamlab'];
$e = $_POST['janji_lab'];
$f = $_SESSION['id'];

if(isset($_POST['Pilih'])){
	if (empty($_POST['id_lab']) || empty($_POST['pilih_dokterlab']) || empty($_POST['pilih_tanggallab']) || empty($_POST['pilih_jamlab']) || empty($_POST['janji_lab'])) {
        echo "<script>alert('Data janji lab ada yang masih kosong!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../waktu-rs.php'>";
        
    }   else{
	$sql = 
	"INSERT INTO lab VALUES('$a','$b','$c','$d','$e','$f')";
	$query = mysqli_query($db, $sql);

	echo "<script>alert('Anda berhasil Membuat Janji Lab!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	}
} else
?>