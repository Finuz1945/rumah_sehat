<?php
session_start();
$_SESSION['sesi'] = NULL;
include 'koneksi.php';
 
$id = $_POST['id'];
$password = $_POST['password'];
 
 
$login = mysqli_query($db,"select * from pengguna where id='$id' and password='$password'");
$cek = mysqli_num_rows($login);
 
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['status'] == "dokter") {
        $_SESSION['id'] = $id;
        $_SESSION['status'] = "dokter";
        $_SESSION['sesi'] = $data['nama'];
        header("Location: ../dokter.php?status=success&role=dokter");
        exit();
    } elseif ($data['status'] == "pasien") {
        $_SESSION['id'] = $id;
        $_SESSION['status'] = "pasien";
        $_SESSION['sesi'] = $data['nama'];
        header("Location: ../index.php?status=success&role=pasien");
        exit();
    }
} else {
    header("Location: ../login.php?status=failed");
    exit();
}
?>