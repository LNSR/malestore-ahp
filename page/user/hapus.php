<?php
include ('config.php');
$id = $_GET['id'];

// Get the user's data before deleting it
$user_data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE id_users='$id'"));

// Delete the user from the database
if (mysqli_query($koneksi, "DELETE FROM user WHERE id_users='$id'")) {

  // Delete the user's profile picture if it exists
  if (!empty($user_data['foto'])) {
    $target_dir = "uploads/profiles/".$user_data['nama'];
    if (file_exists($target_dir)) {
      array_map('unlink', glob($target_dir. "*"));
      rmdir($target_dir);
    }
  }

  // Get all the remaining user IDs
  $result = mysqli_query($koneksi, "SELECT id_users FROM user ORDER BY id_users ASC");
  $user_ids = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $user_ids[] = $row['id_users'];
  }

  // Update the remaining user IDs
  $i = 1;
  foreach ($user_ids as $user_id) {
    mysqli_query($koneksi, "UPDATE user SET id_users='$i' WHERE id_users='$user_id'");
    $i++;
  }

  // Reset the auto increment value
  mysqli_query($koneksi, "ALTER TABLE user AUTO_INCREMENT = 1");

  // Call the function to delete unregistered directories
  deleteUnregisteredDirectories();
  echo "<script>alert('Data Berhasil Di Hapus');
          window.location='?page=user';
          </script>";
} else {
  echo "<script>alert('Data Gagal Di Hapus');
          window.location='?page=user';
          </script>";   
}
?>