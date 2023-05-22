<?php
include "../../config.php";
$pilih = mysqli_query($koneksi, "select * from tb_kriteria WHERE kriteria_id='$_GET[id]'");
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
                                    <div class="form-group" hidden />
                                        <label>ID Kriteria</label>
                                        <input class="form-control" name="kriteria_id" value="<?= $tampil['kriteria_id']; ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input type="text" class="form-control" name="kriteria_nama" value="<?= $tampil['kriteria_nama']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Kriteria</label>
                                        <textarea class="form-control" name="kriteria_deskripsi"><?= $tampil['kriteria_deskripsi']; ?></textarea>
                                    </div>

                                    <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                                    <a href="?page=kriteria" class="btn btn-danger">Tutup</a>
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
$kriteria_id = $_POST['kriteria_id'] ?? '';
$kriteria_deskripsi = $_POST['kriteria_deskripsi'] ?? '';
$kriteria_nama = $_POST['kriteria_nama'] ?? '';
$Simpan = $_POST['Simpan'] ?? '';

if ($Simpan) {
    $sql = $koneksi->query("SELECT * FROM tb_kriteria WHERE kriteria_id ='$kriteria_id'");
    $data = mysqli_fetch_array($sql);
    if ($data['kriteria_nama'] == $kriteria_nama && $data['kriteria_deskripsi'] == $kriteria_deskripsi) {
        echo "<script>alert('Tidak ada perubahan data');</script>";
    } else {
        $sql = $koneksi->query("UPDATE tb_kriteria SET kriteria_deskripsi='$kriteria_deskripsi',kriteria_nama='$kriteria_nama' WHERE kriteria_id ='$kriteria_id'");
        if ($sql) {
?>
            <script type="text/javascript">
                alert("Data Berhasil di Edit");
                window.location.href = "?page=kriteria";
            </script>
<?php
        }
    }
}
?>