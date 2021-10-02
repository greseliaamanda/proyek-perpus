<?php 
    include '../koneksi.php';

    $id_siswa = $_POST['id_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];
    

    if (isset($_POST['simpan'])) {

        mysqli_query($db, "UPDATE siswa
        SET nama_siswa='$nama_siswa', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', sekolah_asal='$sekolah_asal' 
        WHERE id_siswa = '$id_siswa'");


        echo "<script>alert('Edit Data Berhasil');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php?p=beranda-edit'>";
    }
    else{
        header("location:../index.php?p=daftar-edit");
    }
?>