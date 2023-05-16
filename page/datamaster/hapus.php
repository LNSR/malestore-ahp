<?php
include "config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id_karyawan='$id'");
echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=datamaster';
			</script>";
