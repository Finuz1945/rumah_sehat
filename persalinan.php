<?php
session_start();
include './pages/koneksi.php';

$kode=mysqli_query($db,"SELECT * FROM rs");
$num=mysqli_num_rows($kode);
$jmlh=$num+1;
$waktu=date('dmy');
$nounik="REG-".$waktu.-$jmlh;
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
    <title>Spesialis</title>
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
<main>
    <div class="form-container">
        <form action="./pages/simpan_rs.php" method="post" class="warp">
        <label for="id_rs">
            <span>No Reg</span>
                <input type="text" name="id_rs" id="id_rs" value="<?php echo $nounik ?>" readonly>
            </label>
            <label for="pilih_dokter">
                <span>Pilih dokter</span>
                <select name="pilih_dokter" id="pilih_dokter" class="goldar">
                        <option value="Siti Washilah, S.Tr.Keb.">Siti Washilah, S.Tr.Keb.</option>
                        <option value="Intan Bilqis, S.Tr.Keb.">Intan Bilqis, S.Tr.Keb.</option>
                </select>
            </label>
            <label for="janji_rs">
            <span>Kepentingan janji</span>
                <input type="text" name="janji_rs" id="janji_rs" value="Persalinan" readonly>
            </label>
            <label for="pilih_tanggal">
                <span>Pilih tanggal</span>
                <input type="date" name="pilih_tanggal" id="pilih_tanggal" placeholder="Tanggal Janji RS . . .">
            </label>
            <label for="pilih_jam">
                <span>Pilih jam</span>
                <select name="pilih_jam" id="pilih_jam" class="goldar">
                        <option value="08.00 - 9.00">08.00 - 09.00</option>
                        <option value="12.00 - 13.00">12.00 - 13.00</option>
                        <option value="17.00 - 18.00">17.00 - 18.00</option>
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