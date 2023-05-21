<?php
<<<<<<< Updated upstream
include "config.php";
$pilih = mysqli_query($koneksi, "select * from jabatan WHERE id_jabatan='$_GET[id]'");
while ($tampil = mysqli_fetch_array($pilih)) {
    $deskripsi = $tampil['deskripsi'];
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Jabatan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Jabatan</label>
                                    <input class="form-control" name="id_jabatan" value="<?php echo $tampil['id_jabatan']; ?>" readonly />

                                    <div class="form-group">
                                        <label>Nama Jabatan</label>
                                        <input type="text" class="form-control" name="nama_jabatan" value="<?php echo $tampil['nama_jabatan']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Jabatan</label>
                                        <textarea class="form-control" name="job_desc"><?php echo $tampil['job_desc']; ?></textarea>
                                    </div>

                                    <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                                    <a href="?page=jabatan" class="btn btn-danger">Tutup</a>
                                </div>
                            </form>
                        </div>
=======
include "../../config.php";
if(isset($_POST['Simpan'])) {
    $data = [
        "nama_jabatan" => $_POST["nama_jabatan"],
        "job_desc" => $_POST["job_desc"],
        "id_jabatan" => $_POST["id_jabatan"]
    ];
    $sql = "UPDATE jabatan SET nama_jabatan='{$data['nama_jabatan']}', job_desc='{$data['job_desc']}' WHERE id_jabatan='{$data['id_jabatan']}'";
    $query = $koneksi->query($sql);
    $query ? exit("<script>alert('Data Berhasil di Edit'); window.location.href='?page=jabatan';</script>") : "";
}
$id = $_GET['id'];
$tampil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jabatan='$id'"));
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Jabatan</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>ID Jabatan</label>
                                <input class="form-control" name="id_jabatan" value="<?= $tampil['id_jabatan'] ?>" readonly />
                                <div class="form-group">
                                    <label>Nama Jabatan</label>
                                    <input type="text" class="form-control" name="nama_jabatan" value="<?= $tampil['nama_jabatan'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Jabatan</label>
                                    <textarea class="form-control" name="job_desc"><?= $tampil['job_desc'] ?></textarea>
                                </div>
                                <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                                <a href="?page=jabatan" class="btn btn-danger">Tutup</a>
                            </div>
                        </form>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php

$id_jabatan = $_POST['id_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$job_desc = $_POST['job_desc'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("UPDATE jabatan set nama_jabatan='$nama_jabatan',job_desc='$job_desc' where id_jabatan ='$id_jabatan'");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil di Edit");
            window.location.href = "?page=jabatan";
        </script>
<?php
    }
}
?>