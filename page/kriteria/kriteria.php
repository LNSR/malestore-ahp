<?php
include "../../config.php";
$pilih = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
$count = mysqli_num_rows($pilih);
$no = 1;
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kriteria</h3>
    </div>
    <div class="card-body">
        <?php if ($count < 15) { ?>
            <a href="?page=kriteria&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom: 20px;">Tambah Data</a>
        <?php } else { ?>
            <button class="btn btn-primary" style="float: left; margin-bottom: 20px;" onclick="alert('Maksimum kriteria adalah 15');">Tambah Data</button>
        <?php } ?>
        <div class="panel-body">
            <form method="post" action="?page=kriteria&aksi=hapus">
                <table class="table table-striped table-bordered" id="dataTables-example">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all-checkbox"></th>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Deskripsi Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($pilih)) {?>
                            <tr>
                                <td><input type="checkbox" name="kriteria_id[]" value="<?php echo $data['kriteria_id'];?>"></td>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['kriteria_nama'];?></td>
                                <td><?php echo $data['kriteria_deskripsi'];?></td>
                                <td>
                                    <a href="?page=kriteria&aksi=ubah&id=<?php echo $data['kriteria_id'];?>" class="btn btn-info" style="margin: 7px 0;"><i class=" fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <script>CheckboxSelect()</script>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini...?')"><i class=" fa fa-trash"></i> Hapus yang dipilih</button>
            </form>
        </div>
    </div>
</div>