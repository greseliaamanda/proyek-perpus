<div id="content" style="margin-top:100px">
<div id="label-page"><h3>Pendaftar</h3></div>
<div class="form-inline">
    <button type="button" class="btn btn-primary">
        <a href="index.php?p=daftar-baru" class="tombol" style="color:white">Tambah Pendaftar</a></button>
            <div style="right:0px">
                <form method=post style="margin-top:10px; margin-bottom:10px">
                    <input type="text" name="pencarian">
                    <input type="submit" name="search" value="search" class="tombol">
                </form>
            </div>
        </div>

    <!--table-->
    <table id="example" class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">ID Siswa</th>
            <th scope="col">Nama Peserta</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Asal Sekolah</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $batas = 5;
            extract ($_GET);
            if(empty($hal)){
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            }else{
                $posisi = ($hal-1)*$batas;
                $nomor = $posisi+1;
            }
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                if($pencarian != ""){
                    $sql = "SELECT * FROM siswa WHERE nama_siswa LIKE '%$pencarian%'
                    OR id_siswa LIKE '%$pencarian%'
                    OR alamat LIKE '%$pencarian%'
                    OR jenis_kelamin LIKE '%$pencarian%'
                    OR agama LIKE '%$pencarian%'
                    OR sekolah_asal LIKE '%$pencarian%'
                    ";
                    $query = $sql;
                    $queryJml = $sql;
                } else{
                    $query= "SELECT * FROM siswa LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM siswa";
                    $no = $posisi * 1;
                }
            }
            else{
                $query = "SELECT *FROM siswa LIMIT $posisi, $batas";
                $queryJml = "SELECT *FROM siswa";
                $no = $posisi*1;
            }
            $q_tampil_siswa = mysqli_query($db, $query);
            if(mysqli_num_rows($q_tampil_siswa)>0){
                while($r_tampil_siswa=mysqli_fetch_array($q_tampil_siswa)){    
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $r_tampil_siswa['id_siswa'];?></td>
                    <td><?php echo $r_tampil_siswa['nama_siswa'];?></td>
                    <td><?php echo $r_tampil_siswa['alamat'];?></td>
                    <td><?php echo $r_tampil_siswa['jenis_kelamin'];?></td>
                    <td><?php echo $r_tampil_siswa['agama'];?></td>
                    <td><?php echo $r_tampil_siswa['sekolah_asal'];?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm"><a href="index.php?p=daftar-edit&id=<?php echo $r_tampil_siswa['id_siswa'];?>" class="tombol" style="color:white">Edit</a></div>
                        <button type="button" class="btn btn-danger btn-sm"><a href="proses/daftar-hapus.php?id=<?php echo $r_tampil_siswa['id_siswa'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol" style="color:white">Hapus</a></button>
                    </td>
                </tr>
                <?php
                $nomor++;
                }
            }
            else{
                echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        if(isset($_POST['pencarian'])){
            if($_POST['pencarian']!=''){
                echo "<div style=\"float:left;\">";
                $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                echo "Data hasil pencarian: <b>$jml</b>";
                echo "</div>";
            }
        } else{
            ?>
            <div style="float: left;">
            <?php
            $jml= mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Jumlah data : <b>$jml</b>";
            ?>
            </div>
            <div class="pagination">
                <?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i<=$jml_hal; $i++){
                    if($i !=$hal){
                        echo "<button><a href=\"?p=pendaftar&hal=$i\">$i</a></button>";
                    }
                    else{
                        echo "<button><a class=\"active\">$i</a></button>";
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
</div>
    