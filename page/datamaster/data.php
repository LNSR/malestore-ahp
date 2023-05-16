<!-- Advanced Tables -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";
                $pilih = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                $no = 1;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <a href="?page=datamaster&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>

                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($pilih)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_karyawan']; ?></td>
                                            <td><?php echo $data['jabatan']; ?></td>
                                            <td>
                                                <a href="?page=datamaster&aksi=ubah&id=<?php echo $data['id_karyawan']; ?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                                <br>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data ini...?')" href="?page=datamaster&aksi=hapus&id=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger"><i class=" fa fa-trash"></i> Hapus</a>
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