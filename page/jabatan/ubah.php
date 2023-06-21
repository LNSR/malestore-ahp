<?php
include ('config.php');
if(isset($_POST['Simpan'])) {
    $data = [
        "nama_jabatan" => $_POST["nama_jabatan"],
        "job_desc" => $_POST["job_desc"],
        "id_jabatan" => $_POST["id_jabatan"]
    ];
    $tampil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jabatan='{$data['id_jabatan']}'"));
    if($tampil['nama_jabatan'] == $data['nama_jabatan'] && $tampil['job_desc'] == $data['job_desc']) {
        exit("<script>alert('Tidak ada perubahan data'); window.location.href='?page=jabatan';</script>");
    }
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>