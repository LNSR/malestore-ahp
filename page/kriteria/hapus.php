<?php
include "../../config.php";

if (isset($_POST['kriteria_id'])) {
    // Get the IDs of the selected kriteria
    $selected_ids = $_POST['kriteria_id'];

    // Loop through each selected ID and delete the corresponding record from the database
    foreach ($selected_ids as $id) {
        $query = "DELETE FROM tb_kriteria WHERE kriteria_id = '$id'";
        mysqli_query($koneksi, $query);
    }

    // Update kriteria_id values
    $result = mysqli_query($koneksi, "SELECT kriteria_id FROM tb_kriteria ORDER BY kriteria_id ASC");
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $new_id = $i;
        $old_id = $row['kriteria_id'];
        $query = "UPDATE tb_kriteria SET kriteria_id = '$new_id' WHERE kriteria_id = '$old_id'";
        mysqli_query($koneksi, $query);
        $i++;
    }

    // Reset the auto_increment value for the tb_kriteria table
    $query = "ALTER TABLE tb_kriteria AUTO_INCREMENT = 1";
    mysqli_query($koneksi, $query);

    echo "<script>alert('Data berhasil dihapus');
            window.location = '?page=kriteria';
            </script>";
}
?>