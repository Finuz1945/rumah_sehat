<?php
session_start();
$_SESSION['sesi'] = NULL;
include 'koneksi.php';
 
$id = $_POST['id'];
$password = $_POST['password'];
 
 
$login = mysqli_query($db,"select * from pengguna where id='$id' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    if($data['status']=="dokter") {

        $_SESSION['id'] = $id;
        $_SESSION['status'] = "dokter";
        $_SESSION['sesi'] = $data['nama'];

        echo "<script>alert('Anda berhasil Login');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../dokter.php?user=$cek'>";

    } elseif($data['status']=="pasien") {

        $_SESSION['id'] = $id;
        $_SESSION['status'] = "pasien";
        $_SESSION['sesi'] = $data['nama'];

        echo "<script>alert('Anda berhasil Login');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php?user=$cek'>";

    } 
}else {

    echo "<script>alert('Anda Gagal Log In');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}	
?>