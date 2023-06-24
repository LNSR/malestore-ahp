<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Data Pengguna</h3>
          </div>
          <div class="card-body">
            <?php
              $data = mysqli_fetch_array(mysqli_query($koneksi, "select * from user WHERE id_users='$_GET[id]'"));
           ?>
            <form action="#" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>ID Pengguna</label>
                <input class="form-control" name="id_users" value="<?php echo $data['id_users'];?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="nama" value="<?php echo ucwords($data['nama']);?>">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="">
              </div>
              <div class="form-group" <?php echo ($_SESSION['id_users'] != 1)? 'hidden' : '';?>>
                <label>Tipe Pengguna</label>
                <select class="form-control" name="tipe" required>
                  <option value="admin" <?php echo ($data['tipe'] == 'admin')? 'selected' : '';?>>admin</option>
                  <option value="karyawan" <?php echo ($data['tipe'] == 'karyawan')? 'selected' : '';?> <?php echo ($data['id_users'] == 1)? 'hidden' : '';?>>karyawan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <input type="hidden" name="default_foto" value="<?php echo $data['foto'];?>">
                <br>
                <?php if($data['foto']) {?>
                  <img src="uploads/profiles/<?php echo $data['nama'];?>/<?php echo $data['foto'];?>" width="100">
                <?php }?>
              </div>
              <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
              <a href="?page=user" class="btn btn-danger">Tutup</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  if(isset($_POST['Simpan'])) {
    $data = [
      'id_users' => $_POST['id_users'],
      'nama' => ucwords(trim($_POST['nama'])),
      'username' => $_POST['username'],
      'tipe' => $_POST['tipe'],
      'foto' => $_POST['default_foto']
    ];

    if(!empty($_FILES['foto']['name'])) {
      $target_dir = "uploads/profiles/". $data['nama']. "/";
      $target_file = $target_dir. str_replace(' ', '_', $_FILES['foto']['name']);
      $data['foto'] = str_replace(' ', '_', $_FILES['foto']['name']);

      if(!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
      }

      move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    $query = mysqli_query($koneksi, "SELECT nama, username, password, tipe, foto FROM user WHERE id_users='". $data['id_users']. "'");
    $row = mysqli_fetch_array($query);

    $data_update = [
      'nama' => $data['nama']!= $row['nama']? $data['nama'] : $row['nama'],
      'username' => $data['username']!= $row['username']? $data['username'] : $row['username'],
      'tipe' => $data['tipe']!= $row['tipe']? $data['tipe'] : $row['tipe'],
      'password' =>!empty($_POST['password'])? password_hash($_POST['password'], PASSWORD_DEFAULT) : $row['password'],
      'foto' => $data['foto']
    ];

    // Check if profile picture has been changed
    if($data_update['foto']!= $row['foto']) {
      // Create new folder for new file profile picture
      $new_dir = "uploads/profiles/". $data['nama'];
      if(!file_exists($new_dir)) {
        mkdir($new_dir, 0777, true);
      }

      // Delete old profile picture
      $old_file = "uploads/profiles/". $row['nama']. "/". $row['foto'];
      if(file_exists($old_file)) {
        unlink($old_file);
      }

      // Move uploaded file to target directory
      move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    } else if($data_update['nama']!= $row['nama']) {
      // Create new folder for new file profile picture
      $new_dir = "uploads/profiles/". $data['nama'];
      if(!file_exists($new_dir)) {
        mkdir($new_dir, 0777, true);
      }

      // Move old profile picture to new folder
      $old_file = "uploads/profiles/". $row['nama']. "/". $row['foto'];
      $new_file = $new_dir. "/". $row['foto'];
      if(file_exists($old_file)) {
        rename($old_file, $new_file);
      }
    }

    // Update user data
    $sql = "UPDATE user SET ".
          "nama = '". $data_update['nama']. "', ".
          "username = '". $data_update['username']. "', ".
          "password = '". $data_update['password']. "', ".
          "tipe = '". $data_update['tipe']. "', ".
          "foto = '". $data_update['foto']. "' ".
          "WHERE id_users = '". $data['id_users']. "'";

    $hasil = mysqli_query($koneksi, $sql);

    // Update session variable
    if($hasil && $data_update['nama']!= $row['nama'] && $_SESSION['id_users'] == $data['id_users']) {
      $_SESSION['nama'] = $data_update['nama'];
    }

    $message = $hasil? 'Data Berhasil di Edit' : 'Data Gagal di Edit';

    // Delete unregistered directories
    deleteUnregisteredDirectories();

    // redirect
    echo "<script>alert('$message');window.location.href='?page=user';</script>";
  }
?>
</section>