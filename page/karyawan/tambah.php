<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan" required="">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="jabatan" required="">
                                    <?php
                                        include '../../config.php';
                                        $pilih = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY id_jabatan");
                                            while ($jab = mysqli_fetch_array($pilih)) {
                                            $id = $jab['id_jabatan'];
                                            $najab = $jab['nama_jabatan'];
                                            echo "<option value='$najab'>$najab</option>";
                                        }
                                    ?>
                                </select>
                            </div>                           
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=karyawan" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $jabatan = $_POST['jabatan'];
    $Simpan = $_POST['Simpan'];
    
    if ($Simpan) {
        $sql = $koneksi->query("insert into tb_karyawan (id_karyawan, nama_karyawan,jabatan) values ('$id_karyawan','$nama_karyawan','$jabatan')");
        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=karyawan";
            </script>
            <?php
        }
    }