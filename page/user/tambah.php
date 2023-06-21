<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Pengguna</h3>
          </div>
          <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="nama" required="" pattern="[A-Za-z]+" title="Tidak boleh ada nomor" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
              </div>
              <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="username" required="">
              </div>
              <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" name="password" required="">
              </div>
              <div class="form-group">
                  <label>Tipe Pengguna</label>
                  <select class="form-control" name="tipe" required>
                      <?php echo (isset($_SESSION['id_users']) && $_SESSION['id_users'] === 1)? '<option value="admin">admin</option>' : '';?>
                      <option value="karyawan">karyawan</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <br>
                <img id="preview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                <script>GambarProfile()</script>
              </div>
              <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
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
    'nama' => ucwords(trim($_POST['nama'])),
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'tipe' => $_POST['tipe'],
    'foto' => str_replace(" ", "_", basename($_FILES["foto"]["name"]))
  ];

  // Upload foto profil
  if(isset($_FILES['foto'])) {
    $target_dir = "uploads/profiles/".$data['nama']."/";
    if(!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir. $data['foto'];
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
  }

  echo ($koneksi->query("INSERT INTO user (".implode(',', array_keys($data)).") VALUES ('".implode("','", $data)."')"))? "<script>alert('Data Berhasil Disimpan');window.location.href='?page=user';</script>" : "<script>alert('Data Gagal Disimpan');</script>";
}
?>
</section>