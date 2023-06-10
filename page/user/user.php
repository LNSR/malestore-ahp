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
                        <?php
                        if ($_SESSION['admin'] == true) {
                        echo '<a href="?page=user&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>';
                        } else {
                        echo '<a href="#" class="btn btn-primary" style="float: left; margin-bottom:20px;" onclick="alert(\'Hanya Admin yang dapat menambah user\')">Tambah Data</a>';
                        }
                        ?>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Username</th>
                                        <!-- <th>Password</th> -->
                                        <th>Tipe Pengguna</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while ($data = mysqli_fetch_array($pilih)) { 
                                        $canEditOrDelete = ($_SESSION['id_users'] == 1 || ($_SESSION['tipe'] == $data['tipe'] && $_SESSION['id_users'] == $data['id_users']) || ($_SESSION['admin'] && $data['tipe'] == 'karyawan'));
                                        $isDisabled = ($_SESSION['id_users'] == $data['id_users'])? "disabled" : "";
                                        if ($_SESSION['karyawan'] && $data['tipe']!= 'karyawan') {
                                            continue; // skip this iteration if the user is not a karyawan
                                        }
                                       ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php echo $data['tipe'];?></td>
                                            <td>
                                                <?php if($canEditOrDelete):?>
                                                    <a href="?page=user&aksi=ubah&id=<?php echo $data['id_users'];?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                                    <a <?php echo ($_SESSION['id_users'] == $data['id_users'] || $data['id_users'] == 1)? "onclick=\"alert('".(($data['id_users'] == 1)? "Anda tidak dapat mengedit/hapus akun super admin." : "Anda tidak dapat menghapus akun Anda sendiri.")."')\" class=\"btn btn-danger disabled\"" : "onclick=\"return confirm('Anda yakin ingin menghapus data ini...?')\" href=\"?page=user&aksi=hapus&id=".$data['id_users']."\" class=\"btn btn-danger\"";?>><i class=" fa fa-trash"></i> Hapus</a>
                                                <?php else:?>
                                                    <span class="text-muted"><?php echo ($data['id_users'] == 1)? "Anda tidak dapat mengedit/hapus akun super admin." : "Anda tidak dapat mengedit/hapus akun lain.";?></span>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>