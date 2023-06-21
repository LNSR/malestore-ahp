<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kriteria</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input type="text" class="form-control" name="kriteria_nama" required=""></input>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kriteria</label>
                                <textarea class="form-control" name="kriteria_deskripsi"></textarea>
                            </div>
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=kriteria" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include ('config.php');
$kriteria_id = $_POST['kriteria_id'];
$kriteria_deskripsi = $_POST['kriteria_deskripsi'];
$kriteria_nama = $_POST['kriteria_nama'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("insert into tb_kriteria (kriteria_id, kriteria_deskripsi,kriteria_nama) values ('$kriteria_id','$kriteria_deskripsi','$kriteria_nama')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=kriteria";
        </script>
<?php
    }
}
?>