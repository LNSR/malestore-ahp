<?php 
	include "config.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM peta WHERE id_Jabatan='$id'");
	echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=peta';
			</script>";
