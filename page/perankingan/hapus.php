<?php 
    include "../../config.php";
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $truncate_pv_alternatif = mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_alternatif");
    $truncate_pv_kriteria = mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_kriteria");
    $truncate_banding_alternatif = mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_alternatif");
    $truncate_banding_kriteria = mysqli_query($koneksi, "TRUNCATE TABLE tb_banding_kriteria");

    if($truncate_pv_alternatif && $truncate_pv_kriteria && $truncate_banding_alternatif && $truncate_banding_kriteria) {
        echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus');
                window.location='?page=perankingan';
                </script>";
    } else {
        echo "<script>alert('Error: Unable to truncate tables.');
                window.location='?page=perankingan';
                </script>";
    }
 ?> 