<?php 
	include "config.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM tb_kriteria WHERE kriteria_id='$id'");
	echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=kriteria';
			</script>";
 ?>