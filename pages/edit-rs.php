<?php
include 'koneksi.php';
$a = $_POST['id_rs'];
$b = $_POST['pilih_dokter'];
$c = $_POST['pilih_tanggal'];
$d = $_POST['pilih_jam'];
$e = $_POST['janji_rs'];

if(isset($_POST['Pilih'])){
    $sql="UPDATE rs SET id_rs='$a',pilih_dokter='$b',pilih_tanggal='$c',pilih_jam='$d',janji_rs='$e' WHERE id_rs='$a'";
    $query = mysqli_query($db, $sql);

    echo "<script>alert('Anda berhasil Mengubah Waktu Janji RS!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=../reservasi_rs.php'>";
} else
?>