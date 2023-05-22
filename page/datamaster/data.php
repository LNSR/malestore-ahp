<!-- Advanced Tables -->
<?php
include "../../config.php";
$pilih = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
$no = 1;
$tableHeaders = array("No", "Nama Karyawan", "Jabatan", "Aksi");
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
                        <?php foreach ($tableHeaders as $header) { ?>
                            <th><?php echo $header; ?></th>
                        <?php } ?>
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
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini...?')" href="?page=datamaster&aksi=hapus&id=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger"><i class=" fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>