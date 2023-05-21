<!-- Advanced Tables -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "../../config.php";
                $pilih = mysqli_query($koneksi, "SELECT * FROM user");
                $no = 1;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Profil Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <a href="?page=user&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>

                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Tipe Pengguna</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
<<<<<<< Updated upstream
                                    <?php while ($data = mysqli_fetch_array($pilih)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo password_hash($data['password'], PASSWORD_DEFAULT); ?></td>
                                            <td><?php echo $data['tipe']; ?></td>
                                            <td>
=======
                                <?php while ($data = mysqli_fetch_array($pilih)) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['tipe']; ?></td>
                                        <td>
                                            <?php if ($_SESSION['id_users'] != 1 || $data['id_users'] != 1) { ?>
>>>>>>> Stashed changes
                                                <a href="?page=user&aksi=ubah&id=<?php echo $data['id_users']; ?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                                <?php if ($_SESSION['admin'] != $data['nama']) { ?>
                                                    <a onclick="return confirm('Anda yakin ingin menghapus data ini...?')" href="?page=user&aksi=hapus&id=<?php echo $data['id_users']; ?>" class="btn btn-danger"><i class=" fa fa-trash"></i> Hapus</a>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>