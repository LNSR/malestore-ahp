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
                <input class="form-control" name="id_users" value="<?php echo $data['id_users']; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="">
              </div>
              <div class="form-group">
                <label>Tipe Pengguna</label>
                <select class="form-control" name="tipe" required>
                  <option value="admin" <?php echo ($data['tipe'] == 'admin') ? 'selected' : ''; ?>>admin</option>
                  <option value="karyawan" <?php echo ($data['tipe'] == 'karyawan') ? 'selected' : ''; ?> <?php echo ($data['id_users'] == '1') ? 'disabled' : ''; ?>>karyawan</option>
                </select>
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
      $id_users = $_POST['id_users'];
      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $tipe = $_POST['tipe'];
      $password = $_POST['password'];

      // Check if fields have been changed
      $query = mysqli_query($koneksi, "SELECT nama, username, password, tipe FROM user WHERE id_users='$id_users'");
      if ($query) {
        $row = mysqli_fetch_array($query);
        $data = array();
      
        if ($nama != $row['nama']) {
          $data['nama'] = $nama;
        }
      
        if ($username != $row['username']) {
          $data['username'] = $username;
        }
      
        if ($tipe != $row['tipe']) {
          $data['tipe'] = $tipe;
        }
      
        // Check if password is empty
        if (!empty($password)) {
          $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
      
        // Update user data
        if (!empty($data)) {
          $sql = "UPDATE user SET ";
          foreach($data as $key => $value){
            $sql .= "$key = '$value', ";
          }
          $sql = rtrim($sql, ", ") . " WHERE id_users = '$id_users'";
          $hasil = mysqli_query($koneksi, $sql);
      
          $message = $hasil ? 'Data Berhasil di Edit' : 'Data Gagal di Edit';
        } else {
          $message = 'Tidak ada data yang diubah!';
        }
      } else {
        $message = 'Terjadi kesalahan dalam mengambil data pengguna';
      }

      echo "<script>alert('$message');window.location.href='?page=user';</script>";
    }
  ?>
</section>