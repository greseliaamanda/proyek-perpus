<?php
include '../koneksi.php';

$id_siswa = $_POST['id_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$sekolah_asal = $_POST['sekolah_asal'];

if(isset($_POST['simpan'])){

    $sql = "INSERT INTO siswa VALUES('$id_siswa', '$nama_siswa','$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";
    $query = mysqli_query($db, $sql);

    echo "<script>alert('Pendaftaran Berhasil');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php?p=beranda-daftar'>";
}else{
    header("location:../index.php?p=daftar-baru");
}
?>