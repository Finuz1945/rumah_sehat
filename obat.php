<?php
session_start();
include './pages/koneksi.php';
require './pages/functions-obat.php';
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
    <script type="text/javascript" src="./js/obat.js"></script>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="index.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <?php if (isset($_SESSION['status'])){?>
        <nav class="nav-list">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="reservasi_rs.php">Reservasi RS</a></li>
                <li><a href="reservasi_lab.php">Reservasi Lab</a></li>
                <li><a href="./pages/logout.php" onclick="alert('Anda Berhasil Logout!')">Logout</a></li>
            </ul>
        </nav>
        <?php } else{ ?>
        <nav class="nav-list">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="#">Aplikasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        <?php } ?>
</header>
<!-- End Navbar -->

<!-- Start Main -->

<!-- Start Search -->
<div class="search-container">
    <form class="search" method="post">
        <input class="search" type="search" placeholder="Search" name="keyword" id="keyword">
        <button class="tambah" name="search" type="submit" id="search">Search</button>
    </form>
</div>
<!-- End Search -->

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
            if (isset($_POST['search'])) {
                $data_janji = search($_POST['keyword']);
            } 
			foreach ($data_janji as $d) {
                if(empty($d['foto'])or($d['foto']=='-')){
                    $foto = "image-comingsoon.jpeg";
                }else{
                    $foto = $d['foto'];
                } ?>
        <div class="card-obat">
            <div class="head-obat">
                    <img src="./src/<?php echo $foto; ?>" width=70px height=70px>
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
    <nav class="page-container">
        <?php for($x=1;$x<=$total_halaman;$x++){ ?> 
		<a class="page" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
	<?php } ?>
    </nav>
</main>
<!-- End Main -->

<!-- Start Footer -->
<footer>
    <p>&copy;Rumah Sehat, 2023. ALL RIGHTS RESERVED</p>
    <div class="social-media">
        <p>Follow kami di :</p>
        <ul>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
</footer>
  <!-- End Footer  -->
</body>
</html>