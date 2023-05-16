<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama" required="">
                            </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" class="form-control" name="username" required="">
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label>Tipe Pengguna</label>
                                <select class="form-control" name="tipe" required>
                                    <option value="admin">admin</option>
                                    <option value="karyawan">karyawan</option>
                                </select>
                            </div>
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=user" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    $id_users = $_POST['id_users'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $tipe = $_POST['tipe'];
    $Simpan = $_POST['Simpan'];

    if ($Simpan) {
        $sql = $koneksi->query("insert into user (id_users,nama,username,password,tipe) values ('$id_users','$nama','$username','$password','$tipe')");
        if ($sql) {
    ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=user";
            </script>
    <?php
        }
    }
    ?>