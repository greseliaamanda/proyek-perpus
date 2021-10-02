<div id="label-page" style="margin-top:100px"><h3><b>Input Data Buku</h3></div>
    <div id="content">
        <form action="proses/daftar-baru-proses.php" method="post" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td class="label-formulir">Nama</td>
                    <td><input class="form-control" type="text" name="nama_siswa" aria-label="default input example"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Alamat</td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td class="label-formulir">Jenis Kelamin</td>
                    <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="L">Laki-laki</td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="P">Perempuan</td>
                </tr>
                <tr>
                    <td class="label-formulir">Agama</td>
                    <td><select class="form-select" aria-label="Default select example" name="agama">
                    <option selected>Pilih salah satu</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                    </select></td>
                </tr>
                <tr>
                    <td class="label-formulir">Sekolah Asal</td>
                    <td><input class="form-control" type="text" name="sekolah_asal" aria-label="default input example"></td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td><button type="submit" name="simpan"  value="Simpan" class="btn btn-primary">Simpan</button>
                    <button type="reset" value="clear" class="btn btn-info" onclick="clearform()" style="color:white">Reset</button>
                    <button type="button" class="btn btn-success"><a href="index.php?=beranda" style="color:white">Kembali</button></td>
                </tr>

            </table>
        </form>
    </div>
    <script>
    function clearform() {
        var form = document.getElementById("searchform");
        var textFields = form.getElementsByTagName('input');

        for(var i = 0; i < textFields.length; i++) {
            textFields[i].setAttribute('value', '');
        }
    }
    </script>