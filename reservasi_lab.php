<?php
session_start();
include './pages/koneksi.php';
$id = $_SESSION['id'];
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
    <title>Reservasi Lab</title>
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
    <div class="table-container">
        <table class="tampil-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal Janji</th>
                    <th>Jam Janji</th>
                    <th>Kepentingan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;


$data = mysqli_query($db, "SELECT * FROM lab WHERE id = '$id'");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
if ($jumlah_data > 0) {


    $data_janji = mysqli_query($db, "SELECT * FROM lab WHERE id = '$id' limit $halaman_awal, $batas;");
    $nomor = $halaman_awal + 1;
    while ($d = mysqli_fetch_assoc($data_janji)) { ?>
                    <tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $d['pilih_dokterlab']; ?></td>
						<td><?php echo $d['pilih_tanggallab']; ?></td>
						<td><?php echo $d['pilih_jamlab']; ?></td>
						<td><?php echo $d['janji_lab']; ?></td>
						<td>
                            <a href="waktu-lab.php?id=<?php echo $d['id_lab'];?>" class="page-link">Edit</a>
                            <a href="./pages/hapus-lab.php?id=<?php echo $d['id_lab']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="page-link">Hapus</a>
                        </td>
					</tr>
					<?php } ?>
            </tbody>
            <?php } else {
                echo "<tr><td colspan=6>Reservasi Lab Tidak Ditemukan</td></tr>";
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