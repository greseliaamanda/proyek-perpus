<?php 
    $id_siswa = $_GET['id'];
    $q_tampil_siswa = mysqli_query($db, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
    $r_tampil_siswa = mysqli_fetch_array($q_tampil_siswa);
?>

<div id="label-page" style="margin-top:100px"><h3><b>Input Data Buku</h3></div>
    <div id="content">
        <form action="proses/daftar-edit-proses.php" method="post" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td class="label-formulir">ID Siswa</td>
                    <td><input class="form-control" type="text" name="id_siswa" value="<?php echo $r_tampil_siswa['id_siswa'];?>" readonly="readonly" aria-label="default input example"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Nama</td>
                    <td><input class="form-control" type="text" name="nama_siswa" value="<?php echo $r_tampil_siswa['nama_siswa'];?>" aria-label="default input example"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Alamat</td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"><?php echo $r_tampil_siswa['alamat'];?></textarea></td>
                </tr>
                <tr>
                    <td class="label-formulir">Jenis Kelamin</td>
                    <?php 
                    if ($r_tampil_siswa['jenis_kelamin']=="L") {
                        echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='L' checked>Laki-laki</label></td>
                            </tr>
                        <tr>
                        <td class='label-formulir'></td>
                        <td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='P'>Perempuan</td>";
                    } elseif ($r_tampil_siswa['jenis_kelamin']=="P") {
                        echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='L'>Laki-laki</label></td>
                            </tr>
                    <tr>
                    <td class='label-formulir'></td>
                    <td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='P' checked>Perempuan</td>";
                    }
                ?>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Agama</td>
                    <td><select class="form-select" aria-label="Default select example" name="agama">
                    <?php
                    if ($r_tampil_siswa['agama'] == "Islam") echo "<option value='Islam' selected>Islam</option>";
                    else echo "<option value='Islam'>Islam</option>";
                 
                    if ($r_tampil_siswa['agama'] == "Kristen") echo "<option value='Kristen' selected>Kristen</option>";
                    else echo "<option value='Kristen'>Kristen</option>";

                    if ($r_tampil_siswa['agama'] == "Katolik") echo "<option value='Katolik' selected>Katolik</option>";
                    else echo "<option value='Katolik'>Katolik</option>";

                    if ($r_tampil_siswa['agama'] == "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
                    else echo "<option value='Hindu'>Hindu</option>";

                    if ($r_tampil_siswa['agama'] == "Budha") echo "<option value='Budha' selected>Budha</option>";
                    else echo "<option value='Budha'>Budha</option>";

                    if ($r_tampil_siswa['agama'] == "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
                    else echo "<option value='Konghucu'>Konghucu</option>";
                    ?>
                    </select></td>
                </tr>
                <tr>
                    <td class="label-formulir">Sekolah Asal</td>
                    <td><input class="form-control" type="text" name="sekolah_asal" value="<?php echo $r_tampil_siswa['sekolah_asal'];?>" aria-label="default input example"></td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td><button type="submit" name="simpan"  value="Simpan" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-success"><a href="index.php?p=pendaftar" style="color:white">Kembali</button></td>
                </tr>

            </table>
        </form>
    </div>