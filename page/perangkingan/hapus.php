<?php 
    include "config.php";
    mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_alternatif");
    mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_kriteria");
    mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_alternatif");
    mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_kriteria");
    echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus');
            window.location='?page=perangkingan';
            </script>";
 ?> 