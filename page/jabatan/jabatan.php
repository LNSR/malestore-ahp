<!-- Advanced Tables -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";
                $pilih = mysqli_query($koneksi, "SELECT * FROM jabatan");
                $no = 1;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jabatan</h3>
                    </div>
                    <div class="card-body">
                        <a href="?page=jabatan&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>

                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jabatan</th>
                                        <th>Deskripsi Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($pilih)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_jabatan']; ?></td>
                                            <td><?php echo $data['job_desc']; ?></td>
                                            <td>
                                                <a href="?page=jabatan&aksi=ubah&id=<?php echo $data['id_jabatan']; ?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data ini...?')" href="?page=jabatan&aksi=hapus&id=<?php echo $data['id_jabatan']; ?>" class="btn btn-danger"><i class=" fa fa-trash"></i> Hapus</a>
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