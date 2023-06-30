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
	$query = "SELECT * FROM lab WHERE pilih_dokterlab LIKE '%$keyword%' OR pilih_tanggallab LIKE '%$keyword%' OR pilih_jamlab LIKE '%$keyword%' OR janji_lab LIKE '%$keyword%'";

	return query($query);
}

?>