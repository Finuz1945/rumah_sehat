<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Rumah Sehat - Layanan kesehatan terpadu untuk reservasi rumah sakit, lab, dan toko obat online. Solusi sehat untuk keluarga Anda.">
    <meta name="keywords" content="rumah sehat, reservasi rumah sakit, janji lab, toko obat online, layanan kesehatan">
    <meta name="author" content="Firdaus Nuzula Nur Rosyid">
    
    <!-- Favicon -->
    <link rel="icon" href="./src/Rumah Sehat.png">
    <link rel="apple-touch-icon" href="./src/Rumah Sehat.png">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <title>Rumah Sehat - Solusi Sehat Untuk Kita</title>
</head>
<body>
    <!-- Start Navbar -->
    <header class="navbar-container">
        <div class="logo">
           <a href="index.php" aria-label="Rumah Sehat Home"><img src="./src/Rumah Sehat.png" alt="Logo Rumah Sehat"></a>
        </div>
        
        <button class="menu-toggle" aria-label="Toggle menu">
            <i class="fas fa-bars"></i>
        </button>
        
        <?php if (isset($_SESSION['status'])) {?>
        <nav class="nav-list" id="navList">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="reservasi_rs.php">Reservasi RS</a></li>
                <li><a href="reservasi_lab.php">Reservasi Lab</a></li>
                <li><a href="./pages/logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a></li>
            </ul>
        </nav>
        <?php } else { ?>
        <nav class="nav-list" id="navList">
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
            <h1 class="title">Solusi Sehat Untuk Kita</h1>
            <p>Janji RS, lihat obat, bahkan janji lab ke rumah. Semua bisa di Rumah Sehat!</p>
            <div class="container">
                <div class="card">
                    <a href="rs.php">
                        <div class="head-card">
                            <img src="./src/janji RS.png" alt="Ikon Janji Rumah Sakit">
                            <div class="body-card">
                                <p>Janji RS</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="obat.php">
                        <div class="head-card">
                            <img src="./src/toko obat.png" alt="Ikon Toko Obat">
                            <div class="body-card">
                                <p>Toko Obat</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="lab.php">
                        <div class="head-card">
                            <img src="./src/Janji lab.png" alt="Ikon Janji Laboratorium">
                            <div class="body-card">
                                <p>Janji Lab</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <aside>
            <img src="./src/desain.png" alt="Ilustrasi Layanan Kesehatan">
        </aside>
    </main>
    
    <footer>
        <p>&copy; Rumah Sehat, 2023. ALL RIGHTS RESERVED</p>
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
    
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>