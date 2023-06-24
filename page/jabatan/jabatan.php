<?php
include ('../../config.php');
$pilih = mysqli_query($koneksi, "SELECT * FROM jabatan");
$no = 1;
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jabatan</h3>
            </div>
            <div class="card-body">
                <a href="?page=jabatan&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>
                <div class="panel-body">
                    <form method="post" action="?page=jabatan&aksi=hapus">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all-checkbox"></th>
                                        <th>No</th>
                                        <th>Nama Jabatan</th>
                                        <th>Deskripsi Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($pilih)) {?>
                                        <tr>
                                            <td><input type="checkbox" name="id_jabatan[]" value="<?php echo $data['id_jabatan'];?>"></td>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_jabatan'];?></td>
                                            <td><?php echo $data['job_desc'];?></td>
                                            <td>
                                                <a href="?page=jabatan&aksi=ubah&id=<?php echo $data['id_jabatan'];?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <script>CheckboxSelect()</script>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Jika Anda menghapus data ini, maka karyawan yang berkaitan dengan jabatan tersebut akan ikut terhapus!. Anda yakin ingin menghapus data ini...?')"><i class=" fa fa-trash"></i> Hapus yang dipilih</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>