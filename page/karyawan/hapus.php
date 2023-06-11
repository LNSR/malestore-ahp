<?php
include ('config.php');

// Get the IDs of the selected jabatan
$selected_ids = $_POST['id_karyawan'];

// Loop through each selected ID and delete the corresponding record from the database
foreach ($selected_ids as $id) {
    $query = "DELETE FROM tb_karyawan WHERE id_karyawan = '$id'";
    mysqli_query($koneksi, $query);
}

// Get all remaining tb_karyawan records from the database
$result = mysqli_query($koneksi, "SELECT id_karyawan FROM tb_karyawan ORDER BY id_karyawan ASC");

// Update the id_karyawan values to start from 1 and increment by 1 for each record
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_karyawan'];
    $query = "UPDATE tb_karyawan SET id_karyawan = '$new_id' WHERE id_karyawan = '$old_id'";
    mysqli_query($koneksi, $query);
    $i++;
}

// Reset the auto_increment value for the tb_karyawan table
$query = "ALTER TABLE tb_karyawan AUTO_INCREMENT = 1";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil dihapus');
        window.location = '?page=karyawan';
        </script>";
?>