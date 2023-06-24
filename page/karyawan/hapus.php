<?php
include ('../../config.php');

// Get the IDs of the selected karyawan
$selected_ids = $_POST['id_karyawan'];

// Check if any IDs were selected
if (empty($selected_ids)) {
    echo "<script>alert('Tidak ada data yang dipilih');
            window.location = '?page=karyawan';
            </script>";
    exit();
}

// Loop through each selected ID and delete the corresponding record from the database
foreach ($selected_ids as $id) {
    $query = "DELETE FROM tb_karyawan WHERE id_karyawan = '$id'";
    mysqli_query($koneksi, $query);

    // Delete the corresponding record from the tb_banding table
    $query = "DELETE FROM tb_banding_alternatif WHERE alternatif1 = '$id' OR alternatif2 = '$id'";
    mysqli_query($koneksi, $query);

    // Delete the corresponding record from the tb_pv_alternatif table
    $query = "DELETE FROM tb_pv_alternatif WHERE id_alternatif = '$id'";
    mysqli_query($koneksi, $query);
}

// Get all remaining tb_karyawan records from the database
$result = mysqli_query($koneksi, "SELECT id_karyawan FROM tb_karyawan ORDER BY id_karyawan ASC");

// Update the id_karyawan values to start from 1 and increment by 1 for each record
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['id_karyawan'];

    // Update tb_karyawan table with new ID
    $query = "UPDATE tb_karyawan SET id_karyawan = '$new_id' WHERE id_karyawan = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_banding_alternatif table with new IDs
    $query = "UPDATE tb_banding_alternatif SET alternatif1 = '$new_id' WHERE alternatif1 = '$old_id'";
    mysqli_query($koneksi, $query);
    $query = "UPDATE tb_banding_alternatif SET alternatif2 = '$new_id' WHERE alternatif2 = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_pv_alternatif table with new ID
    $query = "UPDATE tb_pv_alternatif SET id_alternatif = '$new_id' WHERE id_alternatif = '$old_id'";
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
