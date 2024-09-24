<?php 
include '../pages/koneksi.php';
require '../pages/functions-obat.php';


?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./src/Rumah Sehat.png">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Obat</title>
</head>
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
          $keyword = $_GET['keyword'];

          $query = "SELECT * FROM obat WHERE nama_obat LIKE '%$keyword%' OR fungsi LIKE '%$keyword%' OR batas LIKE '%$keyword%' OR ket LIKE '%$keyword%' limit $halaman_awal, $batas";
          $data_janji = query($query);
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
						<td><img src="../Rumah_sehat/src/<?php echo $foto; ?>" width=70px height=70px></td>
						<td><?php echo $d['nama_obat']; ?></td>
						<td><?php echo $d['fungsi']; ?></td>
						<td><?php echo $d['batas']; ?></td>
						<td><?php echo $d['ket']; ?></td>
						<td>
              <a href="update-obat.php?id=<?php echo $d['id_obat'];?>" class="page-link">Edit</a>
              <a href="../pages/hapus-obat.php?id=<?php echo $d['id_obat']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="page-link">Hapus</a>
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