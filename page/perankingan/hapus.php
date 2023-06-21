<?php 
    include ('../../config.php');
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $tables = array("tb_pv_alternatif", "tb_pv_kriteria", "tb_banding_alternatif", "tb_banding_kriteria");
    $success = array_reduce($tables, function($success, $table) use ($koneksi) {
        return $success && mysqli_query($koneksi, "TRUNCATE TABLE $table");
    }, true);

    if($success) {
        echo "<script>alert('Matriks Perbandingan Tabel Berhasil Di Hapus'); window.location='?page=perankingan';</script>";
    } else {
        echo "<script>alert('Error: Matriks Perbandingan Gagal Di Hapus'); window.location='?page=perankingan';</script>";
    }
?>