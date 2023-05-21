<!-- Advanced Tables -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "../../config.php";
                $pilih = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                $no = 1;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kriteria</h3>
                    </div>
                    <div class="card-body">
                        <a href="?page=kriteria&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom: 20px;">Tambah Data</a>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Deskripsi Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($pilih)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kriteria_nama']; ?></td>
                                            <td><?php echo $data['kriteria_deskripsi']; ?></td>
                                            <td>
                                            <a href="?page=kriteria&aksi=ubah&id=<?php echo $data['kriteria_id']; ?>" class="btn btn-info" style="margin: 7px 0;"><i class=" fa fa-edit"></i> Edit</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus data ini...?')" href="?page=kriteria&aksi=hapus&id=<?php echo $data['kriteria_id']; ?>" class="btn btn-danger" style="margin: 7px 0;"><i class=" fa fa-trash"></i> Hapus</a>
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