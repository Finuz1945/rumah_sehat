<?php
include './pages/koneksi.php';
require './pages/functions-obat.php';

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
  <script type="text/javascript" src="./js/display-obat.js"></script>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="./dokter.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <nav class="nav-list">
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
    <a href="obat-input.php" class="tambah">Tambah Obat</a>
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
          <th>Foto</th>
          <th>Nama Obat</th>
          <th>Fungsi</th>
          <th>Batas</th>
          <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
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
				$nomor = $halaman_awal+1; 
			foreach ($data_janji as $d) {
          if(empty($d['foto'])or($d['foto']=='-')){
            $foto = "image-comingsoon.jpeg";
            }else{
              $foto = $d['foto'];
          }
        ?>
          <tr>
						<td><?php echo $nomor++; ?></td>
						<td><img src="./src/<?php echo $foto; ?>" width=70px height=70px></td>
						<td><?php echo $d['nama_obat']; ?></td>
						<td><?php echo $d['fungsi']; ?></td>
						<td><?php echo $d['batas']; ?></td>
						<td><?php echo $d['ket']; ?></td>
						<td>
              <a href="update-obat.php?id=<?php echo $d['id_obat'];?>" class="page-link">Edit</a>
              <a href="./pages/hapus-obat.php?id=<?php echo $d['id_obat']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="page-link">Hapus</a>
            </td>
					</tr>
				<?php } ?>
        </tbody>
        <?php } else{
                echo "<tr><td colspan=6>Data Obat Tidak Ditemukan</td></tr>";
          } ?>
        </table>
      <nav class="page-container">
      <?php for($x=1;$x<=$total_halaman;$x++){ ?> 
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