<?php
session_start();
include './pages/koneksi.php';

$id= $_GET['id'];
$kode=mysqli_query($db,"SELECT * FROM obat WHERE id_obat='$id'");
$data=mysqli_fetch_assoc($kode);
if(empty($data['foto'])or($data['foto']=='-')) {
    $foto = "image-comingsoon.jpeg";
}else{
    $foto = $data['foto'];
}
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
    <title>Edit Waktu RS</title>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="dokter.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <?php if (isset($_SESSION['status'])){?>
        <nav class="nav-list">
            <ul>
                <li><a href="dokter.php">Beranda</a></li>
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
<main>
    <div class="form-container">
        <form action="./pages/edit-obat.php" method="post" class="warp" enctype="multipart/form-data">
            <label for="id_obat">
                <span>ID Obat</span>
                <input type="text" name="id_obat" id="id_obat" value="<?php echo $data['id_obat']; ?>" readonly>
            </label>
            <label for="foto">
                <span>Foto obat</span>
                <img src="./src/<?php echo $foto; ?>" width=70px height=70px>
			    <input type="file" name="foto" class="file">
			    <input type="hidden" name="foto_awal" value="<?php echo $data['foto']; ?>">
            </label>
            <label for="nama_obat">
                <span>Nama Obat</span>
                <input type="text" name="nama_obat" id="nama_obat" value="<?php echo $data['nama_obat']; ?>">
            </label>
            <label for="fungsi">
                <span>Fungsi Obat</span>
                <input type="text" name="fungsi" id="fungsi" value="<?php echo $data['fungsi']; ?>">
            </label>
            <label for="batas">
                <span>Batas Penggunasn</span>
                <input type="text" name="batas" id="batas" value="<?php echo $data['batas']; ?>">
            </label>
            <label for="ket">
                <span>Anjuran Dokter</span>
                <input type="text" name="ket" id="ket" value="<?php echo $data['ket']; ?>">
            </label>
            <input type="submit" value="Pilih" name="Pilih" class="tombol">
        </form>
    </div>
    <aside>
        <img src="../src/desain3.png" alt="" class="desain">
    </aside>
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