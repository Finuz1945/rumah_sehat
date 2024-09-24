<?php
session_start();

include '../pages/koneksi.php';

$a = $_POST['id_obat'];
$b = $_POST['nama_obat'];
$c = $_POST['fungsi'];
$d = $_POST['batas'];
$e = $_POST['ket'];

if(isset($_POST['Pilih'])){
    if (empty($_POST['id_obat']) || empty($_POST['nama_obat']) || empty($_POST['fungsi']) || empty($_POST['ket'])) {
        echo "<script>alert('Data Obat ada yang masih kosong!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../obat-input.php'>";
        
    }   else{
    extract($_POST);
    $nama_file   = $_FILES['foto']['name'];
        if(!empty($nama_file)) {
            // Baca lokasi file sementar dan nama file dari form (fupload)
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
            $file_foto = $a.".".$tipe_file;

            // Tentukan folder untuk menyimpan file
            $folder = "../src/$file_foto";
            // Apabila file berhasil di upload
            move_uploaded_file($lokasi_file, "$folder");
        } else
            $file_foto="-";
        

        $sql =
        "INSERT INTO obat VALUES('$a','$b','$c','$d','$e','$file_foto')";
        $query = mysqli_query($db, $sql);

        echo "<script>alert('Anda berhasil Membuat Data Obat!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../dokter.php'>";
    }
} else
?>