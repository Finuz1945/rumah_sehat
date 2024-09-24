<?php
session_start();
include './pages/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./src/Rumah Sehat.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/Rumah Sehat.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Home</title>
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
    <main class="content">
        <div class="content-description">
            <h3 class="title">Solusi Sehat Untuk Kita</h3>
            <p>Janji rs, lihat obat, bahkan janji lab ke rumah. Semua bisa di Rumah Sehat !</p>
            <div class="container">
                <div class="card">
                    <a href="rs.php">
                    <div class="head-card">
                        <img src="./src/janji RS.png" alt="">
                        <div class="body-card">
                            <p>Janji RS</p>
                        </div>
                    </div>
                </a>
                </div>
                <div class="card">
                    <a href="obat.php">
                    <div class="head-card">
                        <img src="./src/toko obat.png" alt="">
                        <div class="body-card">
                            <p>Toko Obat</p>
                        </div>
                    </div>
                </a>
                </div>
                <div class="card">
                    <a href="lab.php">
                    <div class="head-card">
                        <img src="./src/Janji lab.png" alt="">
                        <div class="body-card">
                            <p>Janji lab</p>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
        <aside>
                <img src="./src/desain.png" alt="">
        </aside>
    </main>
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
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>