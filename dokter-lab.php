<?php
include './pages/koneksi.php';
require './pages/functions-lab.php';


?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Dokter</title>
  <script type="text/javascript" src="./js/jquery.js"></script>
  <script type="text/javascript" src="./js/lab.js"></script>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="./dokter.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <button class="menu-toggle" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="nav-list" id="navList">
        <ul>
            <li><a href="dokter.php">Obat</a></li>
            <li><a href="dokter-rs.php">Janji RS</a></li>
            <li><a href="dokter-lab.php">Janji Lab</a></li>
            <li><a href="./pages/logout.php" onclick="alert('Anda Berhasil Logout!')">Logout</a></li>
        </ul>
    </nav>
</header>
<!-- End Navbar -->

<!-- Start Search -->
<div class="search-container">
    <form class="search" method="post">
        <input class="search" type="search" placeholder="Search" name="keyword" id="keyword">
        <button class="tambah" name="search" type="submit" id="search">Search</button>
    </form>
</div>
<!-- End Search -->

<!-- Start Main -->
<main>
  <div class="table-container" id="table-container">
    <table class="tampil-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Dokter</th>
          <th>Tanggal Janji</th>
          <th>Jam Janji</th>
          <th>Kepentingan</th>
        </tr>
      </thead>
      <tbody>
      <?php
                $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$data = mysqli_query($db, "SELECT * FROM lab");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
if ($jumlah_data > 0) {
    $data_janji = query("SELECT * FROM lab limit $halaman_awal, $batas");
    if (isset($_POST['search'])) {

        $data_janji = search($_POST['keyword']);

    }
    $nomor = $halaman_awal + 1;
    foreach ($data_janji as $d) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $d['pilih_dokterlab']; ?></td>
            <td><?php echo $d['pilih_tanggallab']; ?></td>
            <td><?php echo $d['pilih_jamlab']; ?></td>
            <td><?php echo $d['janji_lab']; ?></td>
        </tr>
		<?php } ?>
        </tbody>
        <?php } else {
            echo "<tr><td colspan=6>Data Obat Tidak Ditemukan</td></tr>";
        } ?>
        </table>
      <nav class="page-container">
      <?php for ($x = 1;$x <= $total_halaman;$x++) { ?> 
				<a class="page" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
			<?php } ?>
    </nav>
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