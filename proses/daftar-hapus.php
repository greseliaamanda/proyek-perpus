<?php
include '../koneksi.php';

$id_siswa = $_GET['id'];

mysqli_query($db, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'") or die(mysql_error());

header("location:../index.php?p=pendaftar");
?>