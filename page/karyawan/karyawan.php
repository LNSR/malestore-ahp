<?php
include "../../config.php";
$pilih = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
$no = 1;
$tableHeaders = array("No", "Nama Karyawan", "Jabatan", "Aksi");

$cek_jabatan = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_jabatan FROM jabatan");
$jumlah_jabatan = mysqli_fetch_assoc($cek_jabatan)['jumlah_jabatan'];
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
    </div>
    <div class="card-body">
        <?php if ($jumlah_jabatan > 0) {?>
            <a href="?page=karyawan&aksi=tambah" class="btn btn-primary" style="float: left; margin-bottom:20px;">Tambah Data</a>
        <?php } else {?>
            <button class="btn btn-primary" style="float: left; margin-bottom:20px;" onclick="alert('Maaf, belum ada data jabatan. Silahkan tambahkan data jabatan terlebih dahulu.');">Tambah Data</button>
        <?php }?>
        <div class="panel-body">
            <form method="post" action="?page=karyawan&aksi=hapus">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all-checkbox"></th>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($pilih)) {?>
                            <tr>
                                <td><input type="checkbox" name="id_karyawan[]" value="<?php echo $data['id_karyawan']; ?>"></td>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_karyawan']; ?></td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <td>
                                    <a href="?page=karyawan&aksi=ubah&id=<?php echo $data['id_karyawan']; ?>" class="btn btn-info"><i class=" fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <script src="page/script.js"></script>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini...?')">Hapus yang dipilih</button>
            </form>
        </div>
    </div>
</section>
