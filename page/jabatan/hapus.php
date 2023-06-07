<?php
include "../../config.php";

// Get the IDs of the selected jabatan
$selected_ids = $_POST['id_jabatan'];

// Loop through each selected ID and delete the corresponding record from the database
foreach ($selected_ids as $id) {
    $query = "DELETE FROM jabatan WHERE id_jabatan = '$id'";
    mysqli_query($koneksi, $query);
}

// Get all remaining jabatan records from the database
$result = mysqli_query($koneksi, "SELECT id_jabatan FROM jabatan ORDER BY id_jabatan ASC");

// Update the id_jabatan values to start from 1 and increment by 1 for each record
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_jabatan'];
    $query = "UPDATE jabatan SET id_jabatan = '$new_id' WHERE id_jabatan = '$old_id'";
    mysqli_query($koneksi, $query);
    $i++;
}

// Reset the auto_increment value for the jabatan table
$query = "ALTER TABLE jabatan AUTO_INCREMENT = 1";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil dihapus');
        window.location = '?page=jabatan';
        </script>";
?>