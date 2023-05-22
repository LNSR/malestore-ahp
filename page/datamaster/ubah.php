<?php
include "../../config.php";
$pilih = mysqli_query($koneksi, "select * from tb_karyawan WHERE id_karyawan='$_GET[id]'");
while ($tampil = mysqli_fetch_array($pilih)) {
    $deskripsi = $tampil['deskripsi'];
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Karyawan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- <label>ID Karyawan</label>
                                    <input class="form-control" name="id_karyawan" value="<?php echo $tampil['id_karyawan']; ?>" readonly /> -->

                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $tampil['nama_karyawan']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan" required="">
                                        <?php
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
                                    <a href="?page=datamaster" class="btn btn-danger">Tutup</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php

$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$jabatan = $_POST['jabatan'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("UPDATE tb_karyawan set nama_karyawan='$nama_karyawan',jabatan='$jabatan' where id_karyawan ='$id_karyawan'");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil di Edit");
            window.location.href = "?page=datamaster";
        </script>
<?php
    }
}
?>