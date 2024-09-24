<?php
session_start();
include 'koneksi.php';


if(isset($_POST['Pilih'])){
    $a = $_POST['janji_rs'];
    if($a == "Persalinan"){
        echo "<meta http-equiv='refresh' content='0; url=../persalinan.php'>";
    } else{
        echo "<meta http-equiv='refresh' content='0; url=../umum.php'>";
    }
}
?>