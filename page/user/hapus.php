<?php
include "../../config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM user WHERE id_users='$id'");

// Untuk mendapatkan semua 'id_users' yang diurutkan dari yang terbesar
$result = mysqli_query($koneksi, "SELECT id_users FROM user ORDER BY id_users ASC");

// Perulangan dari hasil dan update nilai 'id_users'
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_users'];
    mysqli_query($koneksi, "UPDATE user SET id_users='$new_id' WHERE id_users='$old_id'");
    $i++;
}

// Set the auto increment value to the next available id_users value
$max_id = mysqli_query($koneksi, "SELECT MAX(id_users) FROM user");
$new_auto_increment = mysqli_fetch_array($max_id)[0] + 1;
mysqli_query($koneksi, "ALTER TABLE user AUTO_INCREMENT = $new_auto_increment");

echo "<script>alert('Data Berhasil Di Hapus');
            window.location='?page=user';
            </script>";
?>