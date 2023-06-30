<?php 
include '../pages/koneksi.php';
require '../pages/functions-rs.php';


?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./src/Rumah Sehat.png">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Janji RS</title>
</head>
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
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
        
				$data = mysqli_query($db,"SELECT * FROM rs");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
        if ($jumlah_data > 0) {    
          $keyword = $_GET['keyword'];

          $query = "SELECT * FROM rs WHERE pilih_dokter LIKE '%$keyword%' OR pilih_tanggal LIKE '%$keyword%' OR pilih_jam LIKE '%$keyword%' OR janji_rs LIKE '%$keyword%' limit $halaman_awal, $batas";
          $data_janji = query($query);
			$nomor = $halaman_awal+1; 
			foreach ($data_janji as $d) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
			<td><?php echo $d['pilih_dokter']; ?></td>
			<td><?php echo $d['pilih_tanggal']; ?></td>
			<td><?php echo $d['pilih_jam']; ?></td>
			<td><?php echo $d['janji_rs']; ?></td>
			
		</tr>
		<?php } ?>
        </tbody>
        <?php } else{
                echo "<tr><td colspan=6>Data janji RS Tidak Ditemukan</td></tr>";
          } ?>
        </table>
     <nav class="page-container">
    <?php for($x=1;$x<=$total_halaman;$x++){ ?> 
		<a class="page" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
	<?php } ?>
    </nav>
  </div>