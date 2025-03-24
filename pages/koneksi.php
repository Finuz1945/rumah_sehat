<?php

$server = "mariadb";
$user = "root";
$password = "rootpassword";
$nama_database = "db_rs";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
