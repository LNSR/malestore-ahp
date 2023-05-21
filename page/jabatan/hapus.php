<?php
include "../../config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan='$id'");

// Untuk mendapatkan semua 'id_jabatan' yang diurutkan dari yang terbesar
$result = mysqli_query($koneksi, "SELECT id_jabatan FROM jabatan ORDER BY id_jabatan ASC");

// Perulangan dari hasil dan update nilai 'id_jabatan'
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_jabatan'];
    mysqli_query($koneksi, "UPDATE jabatan SET id_jabatan='$new_id' WHERE id_jabatan='$old_id'");
    $i++;
}

// Set the auto increment value to the next available id_jabatan value
$max_id = mysqli_query($koneksi, "SELECT MAX(id_jabatan) FROM jabatan");
$new_auto_increment = mysqli_fetch_array($max_id)[0] + 1;
mysqli_query($koneksi, "ALTER TABLE jabatan AUTO_INCREMENT = $new_auto_increment");

echo "<script>alert('Data Berhasil Di Hapus');
            window.location='?page=jabatan';
            </script>";
?>