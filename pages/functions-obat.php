<?php
include 'koneksi.php';

function  query($query) {
	global $db;
	$result = mysqli_query($db, $query);
	$d = [];
	while($data = mysqli_fetch_assoc($result)) {
		$d[] = $data;
	}
	return $d;
}
function search($keyword) {
	$query = "SELECT * FROM obat WHERE nama_obat LIKE '%$keyword%' OR fungsi LIKE '%$keyword%' OR batas LIKE '%$keyword%' OR ket LIKE '%$keyword%'";

	return query($query);
}

?>