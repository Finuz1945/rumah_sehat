<?php
session_start();

include 'koneksi.php';

if(isset($_POST['Pilih'])){
    $a = $_POST['janji_lab'];
    if($a == "darah"){
        echo "<meta http-equiv='refresh' content='0; url=../darah.php'>";
    }elseif($a == "mata"){
        echo "<meta http-equiv='refresh' content='0; url=../mata.php'>";
    }else{
        echo "<meta http-equiv='refresh' content='0; url=../usg.php'>";
    }
}
?>