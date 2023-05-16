<?php 
	include "config.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM user WHERE id_users='$id'");
	echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=user';
			</script>";
 ?>