<?php
include './pages/koneksi.php';

$a = $_POST['id_lab'];
$b = $_POST['pilih_dokterlab'];
$c = $_POST['pilih_tanggallab'];
$d = $_POST['pilih_jamlab'];
$e = $_POST['janji_lab'];

if(isset($_POST['Pilih'])){
    $sql="UPDATE lab SET id_lab='$a',pilih_dokterlab='$b',pilih_tanggallab='$c',pilih_jamlab='$d',janji_lab='$e' WHERE id_lab='$a'";
    $query = mysqli_query($db, $sql);

    echo "<script>alert('Anda berhasil Mengubah Waktu Janji lab!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=../reservasi_lab.php'>";
} else
?>