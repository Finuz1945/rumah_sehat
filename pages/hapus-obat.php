<?php
include '../pages/koneksi.php';
$id=$_GET['id'];

mysqli_query($db,"DELETE FROM obat WHERE id_obat='$id'");

echo "<meta http-equiv='refresh' content='0; url=../dokter.php'>";
?>