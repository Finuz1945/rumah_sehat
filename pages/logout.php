<?php
session_start();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['status']);
unset($_SESSION['sesi']);
header('Location:../index.php');
?>