<?php
include "../../config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_kriteria WHERE kriteria_id='$id'");

// Untuk mendapatkan semua 'kriteria_id' yang diurutkan dari yang terbesar
$result = mysqli_query($koneksi, "SELECT kriteria_id FROM tb_kriteria ORDER BY kriteria_id ASC");

// Perulangan dari hasil dan update nilai 'kriteria_id'
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['kriteria_id'];
    mysqli_query($koneksi, "UPDATE tb_kriteria SET kriteria_id='$new_id' WHERE kriteria_id='$old_id'");
    $i++;
}

// Set the auto increment value to the next available kriteria_id value
$max_id = mysqli_query($koneksi, "SELECT MAX(kriteria_id) FROM tb_kriteria");
$new_auto_increment = mysqli_fetch_array($max_id)[0] + 1;
mysqli_query($koneksi, "ALTER TABLE tb_kriteria AUTO_INCREMENT = $new_auto_increment");

echo "<script>alert('Data Berhasil Di Hapus');
            window.location='?page=kriteria';
            </script>";
?>