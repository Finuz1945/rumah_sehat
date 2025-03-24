<?php
session_start();
include './pages/koneksi.php';

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
    <title>Umum</title>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="dokter.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <button class="menu-toggle" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>
    <?php if (isset($_SESSION['status'])) {?>
        <nav class="nav-list" id="navList">
        <ul>
            <li><a href="dokter.php">Obat</a></li>
            <li><a href="#">Janji RS</a></li>
            <li><a href="#">Janji Lab</a></li>
            <li><a href="./pages/logout.php" onclick="alert('Anda Berhasil Logout!')">Logout</a></li>
        </ul>
    </nav>
        <?php } else { ?>
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
        <form action="./pages/simpan_obat.php" method="post" class="warp" enctype="multipart/form-data">
            <label for="id_obat">
                <span>ID Obat</span>
                <input type="text" name="id_obat" id="id_obat">
            </label>
            <label for="foto">
                <span>Foto Obat</span>
                <input type="file" name="foto" id="foto" class="file">
            </label>
            <label for="nama_obat">
                <span>Nama Obat</span>
                <input type="text" name="nama_obat" id="nama_obat">
            </label>
            <label for="fungsi">
                <span>Fungsi Obat</span>
                <input type="text" name="fungsi" id="fungsi">
            </label>
            <label for="batas">
                <span>Batas Penggunaan</span>
                <input type="text" name="batas" id="batas">
            </label>
            <label for="ket">
                <span>Anjuran Dokter</span>
                <input type="text" name="ket" id="ket">
            </label>
            <input type="submit" value="Pilih" name="Pilih" class="tombol">
        </form>
    </div>
</main>
<!-- End Main -->

<!-- Start Footer -->
<footer>
    <p>&copy;Rumah Sehat, 2023. ALL RIGHTS RESERVED</p>
    <div class="social-media">
        <p>Follow kami di :</p>
        <ul>
            <li><a href="www.linkedin.com/in/firdaus-nuzula-nur-rosyid-228114166" aria-label="Linkedin"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://github.com/Finuz1945" aria-label="github"><i class="fab fa-github"></i></a></li>
        </ul>
      </div>
</footer>
  <!-- End Footer  -->
  <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>