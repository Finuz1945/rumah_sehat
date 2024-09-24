<?php
include 'koneksi.php';
$id=$_GET['id'];

mysqli_query($db,"DELETE FROM rs WHERE id_rs='$id'");

echo "<meta http-equiv='refresh' content='0; url=../reservasi_rs.php'>";
?>