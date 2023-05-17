<?php 
    include "config.php";
    mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_alternatif");
    mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_alternatif");
    echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus');
            window.location='?page=aalternatif';
            </script>";
 ?> 