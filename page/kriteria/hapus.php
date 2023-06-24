<?php
include ('../../config.php');

// Get the IDs of the selected kriteria
$selected_ids = $_POST['kriteria_id'];

// Check if any IDs were selected
if (empty($selected_ids)) {
    echo "<script>alert('Tidak ada yang dipilih');
            window.location = '?page=kriteria';
            </script>";
    exit();
}

// Loop through each selected ID and delete the corresponding record from the database
foreach ($selected_ids as $id) {
    $query = "DELETE FROM tb_kriteria WHERE kriteria_id = '$id'";
    mysqli_query($koneksi, $query);

    // Delete from tb_banding_alternatif
    $query = "DELETE FROM tb_banding_alternatif WHERE pembanding= '$id' ";
    mysqli_query($koneksi, $query);

    // Delete from tb_banding_kriteria
    $query = "DELETE FROM tb_banding_kriteria WHERE kriteria1= '$id' OR kriteria2= '$id' ";
    mysqli_query($koneksi, $query);

    // Delete from tb_pv_alternatif
    $query = "DELETE FROM tb_pv_alternatif WHERE id_kriteria = '$id'";
    mysqli_query($koneksi, $query);

    // Delete from tb_pv_kriteria
    $query = "DELETE FROM tb_pv_kriteria WHERE id_kriteria = '$id'";
    mysqli_query($koneksi, $query);
}

// Update kriteria_id values
$result = mysqli_query($koneksi, "SELECT kriteria_id FROM tb_kriteria ORDER BY kriteria_id ASC");
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $new_id = $i;
    $old_id = $row['kriteria_id'];

    // Update tb_kriteria table with new ID
    $query = "UPDATE tb_kriteria SET kriteria_id = '$new_id' WHERE kriteria_id = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_banding_kriteria table with new IDs
    $query = "UPDATE tb_banding_kriteria SET kriteria1 = '$new_id' WHERE kriteria1 = '$old_id'";
    mysqli_query($koneksi, $query);
    $query = "UPDATE tb_banding_kriteria SET kriteria2 = '$new_id' WHERE kriteria2 = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_banding_alternatif table with new ID
    $query = "UPDATE tb_banding_alternatif SET pembanding = '$new_id' WHERE pembanding = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_pv_alternatif table with new ID
    $query = "UPDATE tb_pv_alternatif SET id_kriteria = '$new_id' WHERE id_kriteria = '$old_id'";
    mysqli_query($koneksi, $query);

    // Update tb_pv_kriteria table with new ID
    $query = "UPDATE tb_pv_kriteria SET id_kriteria = '$new_id' WHERE id_kriteria = '$old_id'";
    mysqli_query($koneksi, $query);

    $i++;
}

// Reset the auto_increment value for the tb_kriteria table
$query = "ALTER TABLE tb_kriteria AUTO_INCREMENT = 1";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil dihapus');
        window.location = '?page=kriteria';
        </script>";
?>
