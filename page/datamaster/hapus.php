<?php
include "../../config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id_karyawan='$id'");

// Untuk mendapatkan semua 'id_karyawan' yang diurutkan dari yang terbesar
$result = mysqli_query($koneksi, "SELECT id_karyawan FROM tb_karyawan ORDER BY id_karyawan ASC");

// Perulangan dari hasil dan update nilai 'id_karyawan'
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_karyawan'];
    mysqli_query($koneksi, "UPDATE tb_karyawan SET id_karyawan='$new_id' WHERE id_karyawan='$old_id'");
    $i++;
}

// Set the auto increment value to the next available id_karyawan value
$max_id = mysqli_query($koneksi, "SELECT MAX(id_karyawan) FROM tb_karyawan");
$new_auto_increment = mysqli_fetch_array($max_id)[0] + 1;
mysqli_query($koneksi, "ALTER TABLE tb_karyawan AUTO_INCREMENT = $new_auto_increment");

echo "<script>alert('Data Berhasil Di Hapus');
            window.location='?page=datamaster';
            </script>";
?>