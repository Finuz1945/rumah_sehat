<?php
include '../pages/koneksi.php';
$a = $_POST['id_obat'];
$b = $_POST['nama_obat'];
$c = $_POST['fungsi'];
$d = $_POST['batas'];
$e = $_POST['ket'];


if(isset($_POST['Pilih'])){
    extract($_POST);
		$nama_file = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $a.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../src/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;

    $sql="UPDATE obat SET id_obat='$a',nama_obat='$b',fungsi='$c',batas='$d',ket='$e',foto='$file_foto' WHERE id_obat='$a'";
    $query = mysqli_query($db, $sql);

    echo "<script>alert('Anda berhasil mengubah data obat!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=../dokter.php'>";
} else
?>