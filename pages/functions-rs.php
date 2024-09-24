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
	$query = "SELECT * FROM rs WHERE pilih_dokter LIKE '%$keyword%' OR pilih_tanggal LIKE '%$keyword%' OR pilih_jam LIKE '%$keyword%' OR janji_rs LIKE '%$keyword%'";

	return query($query);
}

?>