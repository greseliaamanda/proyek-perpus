<?php
session_start();

include 'koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <title>PMB</title>
    </head>
    <body>
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="margin-left: 110px; margin-right:110px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">DIGITAL TALENT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?p=pendaftar">Calon Peserta</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?p=daftar-baru">Daftar Baru</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Keluar</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        
        <?php
            $pages_dir = 'pages';
            if(!empty($_GET['p'])){
                $pages = scandir($pages_dir,0);
                unset($pages[0], $pages[1]);

                $p = $_GET['p'];
                if(in_array($p.'.php',$pages)){
                    include($pages_dir.'/'.$p.'.php');
                }else{
                    echo'Halaman Tidak Ditemukan';
                }
            }else{
                include($pages_dir.'/beranda.php');
            }
        ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>

<?php
} else{
    echo "<script>aler('Anda Harus Login Dahulu!');</script>";
    header('location:login.php');
}
?>