<?php 
    include "../../config.php";
    if(mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_alternatif") && mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_alternatif")) {
        echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus'); window.location='?page=aalternatif';</script>";
    } else {
        echo "<script>alert('Gagal menghapus matriks perbandingan tabel'); window.location='?page=aalternatif';</script>";
    }
?>