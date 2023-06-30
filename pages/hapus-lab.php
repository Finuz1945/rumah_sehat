<?php
include 'koneksi.php';
$id=$_GET['id'];

mysqli_query($db,"DELETE FROM lab WHERE id_lab='$id'");

echo "<meta http-equiv='refresh' content='0; url=../reservasi_lab.php'>";
?>