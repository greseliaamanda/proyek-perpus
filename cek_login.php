<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
    if ( isset($_POST['submit']))
    {
        $user = isset($_POST['user']) ? $_POST['user'] : "";
        $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
        $qry = mysqli_query($db, "SELECT * FROM login WHERE username = '$user' AND password = '$pass'");
        $sesi = mysqli_num_rows($qry);

        if ($sesi == 1)
        {
            $data_admin = mysqli_fetch_array($qry);
            $_SESSION['id_login'] = $data_admin['id_login'];
            $_SESSION['sesi'] = $data_admin['nama'];

            echo "<script>alert('Anda berhasil Log In');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";      
        }
        else
        {
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
            echo "<script>alert('Anda gagal Log In');</script>";
        }
    }
    else
    {
        include "login.php";
    }
?>