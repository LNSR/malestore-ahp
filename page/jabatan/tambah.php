<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Jabatan</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Jabatan</label>
                                <input type="text" class="form-control" name="nama_jabatan" required="">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Jabatan</label>
                                <textarea class="form-control" name="job_desc" required=""></textarea>
                            </div>
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=jabatan" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    $id_jabatan = $_POST['id_jabatan'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $job_desc = $_POST['job_desc'];
    $Simpan = $_POST['Simpan'];

    if ($Simpan) {
        $sql = $koneksi->query("insert into jabatan (id_jabatan, nama_jabatan,job_desc) values ('$id_jabatan','$nama_jabatan','$job_desc')");
        if ($sql) {
    ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=jabatan";
            </script>
    <?php
        }
    }
    ?>