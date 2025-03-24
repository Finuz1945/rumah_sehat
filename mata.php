<?php
session_start();
include './pages/koneksi.php';

$kode = mysqli_query($db, "SELECT * FROM lab");
$num = mysqli_num_rows($kode);
$jmlh = $num + 1;
$waktu = date('dmy');
$nounik = "REG-".$waktu.-$jmlh;
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
    <title>Test Mata</title>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="index.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
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
                <li><a href="./pages/logout.php" onclick="alert('Anda Berhasil Logout!')">Logout</a></li>
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

<!-- Start Main -->
<main>
    <div class="form-container">
        <form action="./pages/simpan_lab.php" method="post" class="warp">
            <label for="id_lab">
                <span>No Reg</span>
                <input type="text" name="id_lab" id="id_lab" value="<?php echo $nounik ?>" readonly>
            </label>
            <label for="pilih_dokterlab">
                <span>Pilih dokter</span>
                <select name="pilih_dokterlab" id="pilih_dokterlab" class="goldar">
                        <option value="dr. Dimas Zirnawan, Sp.M.">dr. Dimas Zirnawan, Sp.M.</option>
                        <option value="dr. Luthfi Shafwan, Sp.M.">dr. Luthfi Shafwan, Sp.M.</option>
                </select>
            </label>
            <label for="janji_lab">
            <span>Kepentingan janji</span>
                <input type="text" name="janji_lab" id="janji_lab" value="Test Mata" readonly>
            </label>
            <label for="pilih_tanggallab">
                <span>Pilih tanggal</span>
                <input type="date" name="pilih_tanggallab" id="pilih_tanggallab" placeholder="Tanggal Janji Lab . . .">
            </label>
            <label for="pilih_jamlab">
                <span>Pilih jam</span>
                <select name="pilih_jamlab" id="pilih_jamlab" class="goldar">
                        <option value="11.00 - 12.00">11.00 - 12.00</option>
                        <option value="16.00 - 15.00">16.00 - 15.00</option>
                        <option value="19.00 - 20.00">19.00 - 20.00</option>
                </select>
            </label>
            <input type="submit" value="Pilih" name="Pilih" class="tombol">
        </form>
    </div>
    <aside>
        <img src="./src/desain3.png" alt="" class="desain">
    </aside>
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