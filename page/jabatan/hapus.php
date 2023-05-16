<?php 
	include "config.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan='$id'");
	echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=jabatan';
			</script>";
 ?>