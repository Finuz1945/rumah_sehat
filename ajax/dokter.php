<?php

include '../pages/koneksi.php';
require '../pages/functions-obat.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$query = "SELECT * FROM obat WHERE 
    nama_obat LIKE '%$keyword%' OR 
    fungsi LIKE '%$keyword%' OR 
    batas LIKE '%$keyword%' OR 
    ket LIKE '%$keyword%'";

$data = mysqli_query($db, $query);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

echo '<table class="tampil-table">
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
    <tbody>';

if ($jumlah_data > 0) {
    $query .= " LIMIT $halaman_awal, $batas";
    $data_janji = query($query);
    $nomor = $halaman_awal + 1;

    foreach ($data_janji as $d) {
        $foto = empty($d['foto']) || $d['foto'] == '-' ? "image-comingsoon.jpeg" : $d['foto'];
        echo "<tr>
            <td>" . $nomor++ . "</td>
            <td><img src='./src/$foto' width='70px' height='70px'></td>
            <td>" . $d['nama_obat'] . "</td>
            <td>" . $d['fungsi'] . "</td>
            <td>" . $d['batas'] . "</td>
            <td>" . $d['ket'] . "</td>
            <td>
                <a href='update-obat.php?id=" . $d['id_obat'] . "' class='page-link'>Edit</a>
                <a href='./pages/hapus-obat.php?id=" . $d['id_obat'] . "' onclick='return confirm(\"Apakah Anda Yakin Akan Menghapus Data Ini?\")' class='page-link'>Hapus</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Data Obat Tidak Ditemukan</td></tr>";
}

echo '</tbody>
</table>
<nav class="page-container">';

for ($x = 1; $x <= $total_halaman; $x++) {
    echo "<a class='page' href='?halaman=$x'>$x</a>";
}

echo '</nav>';
