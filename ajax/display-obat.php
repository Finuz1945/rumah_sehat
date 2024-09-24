<?php 
include '../pages/koneksi.php';
require '../pages/functions-obat.php';

?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/Rumah Sehat.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Display Obat</title>
    <title>Dokter</title>
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
  </head>
<body>
<!-- Start Main -->
<main class="display">
    <div class="display-container" id="display-container">
            <?php
            $batas = 5;
		    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

		    $data = mysqli_query($db,"SELECT * FROM obat");
		    $jumlah_data = mysqli_num_rows($data);
		    $total_halaman = ceil($jumlah_data / $batas);
            if ($jumlah_data > 0) {    
				$data_janji = query("SELECT * FROM obat limit $halaman_awal, $batas");
        $keyword = $_GET['keyword'];

        $query = "SELECT * FROM obat WHERE nama_obat LIKE '%$keyword%' OR fungsi LIKE '%$keyword%' OR batas LIKE '%$keyword%' OR ket LIKE '%$keyword%' limit $halaman_awal, $batas";
        $data_janji = query($query);
			foreach ($data_janji as $d) {
                if(empty($d['foto'])or($d['foto']=='-')){
                    $foto = "image-comingsoon.jpeg";
                }else{
                    $foto = $d['foto'];
                } ?>
        <div class="card-obat">
            <div class="head-obat">
                    <img src="../Rumah_sehat/src/<?php echo $foto; ?>" width=70px height=70px>
            </div>
            <div class="body-obat">
                <h2><?php echo $d['nama_obat']; ?></h2>
				<p><?php echo $d['fungsi']; ?></p>
				<p><?php echo $d['batas']; ?></p>
				<p><?php echo $d['ket']; ?></p>
            </div>
        </div>	
		<?php } ?>
    </div>
  <?php } else{
        echo "<p>Data Obat Tidak Ditemukan</p>";
  } ?>
</main>
<!-- End Main -->