<?php 
    include "../../config.php";
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $truncate_all_tables = mysqli_query($koneksi, "TRUNCATE TABLE tb_pv_alternatif, tb_pv_kriteria, tb_banding_alternatif, tb_banding_kriteria");

    if($truncate_all_tables) {
        echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus');
                window.location='?page=perankingan';
                </script>";
    } else {
        echo "<script>alert('Error: Matriks Perbandingan Gagal Di Hapus');
                window.location='?page=perankingan';
                </script>";
    }
 ?> 