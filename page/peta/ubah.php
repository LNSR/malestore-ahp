<?php
include "config.php";
$pilih = mysqli_query($koneksi, "select * from peta WHERE id_Jabatan='$_GET[id]'");
while ($tampil = mysqli_fetch_array($pilih)) {
    $deskripsi = $tampil['deskripsi'];
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Kriteria</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Jabatan</label>
                                    <input class="form-control" name="id_Jabatan" value="<?php echo $tampil['id_Jabatan']; ?>" readonly />

                                    <div class="form-group">
                                        <label>Nama Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" value="<?php echo $tampil['jabatan']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" value="<?php echo $tampil['latitude']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="lonfitude" value="<?php echo $tampil['lonfitude']; ?>" />
                                    </div>

                                    <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                                    <a href="?page=peta" class="btn btn-danger">Tutup</a>
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
$id_Jabatan = $_POST['id_Jabatan'];
$jabatan = $_POST['jabatan'];
$latitude = $_POST['latitude'];
$lonfitude = $_POST['lonfitude'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("UPDATE peta set jabatan='$jabatan', latitude='$latitude', lonfitude='$lonfitude' where id_Jabatan ='$id_Jabatan'");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil di Edit");
            window.location.href = "?page=peta";
        </script>
<?php
    }
}
?>