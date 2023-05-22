<?php 
    include "../../config.php";
    if(mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_kriteria") && mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_kriteria")) {
        echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus'); window.location='?page=akriteria';</script>";
    } else {
        echo "<script>alert('Gagal menghapus matriks perbandingan tabel'); window.location='?page=akriteria';</script>";
    }
?>