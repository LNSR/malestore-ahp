<!-- Library Ionicons -->
<link rel=""="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<body>
  <h3><b style="color: #555555">Dashboard</b></h3>

  <div class="card">
    <section class="content-header">
<<<<<<< Updated upstream
=======
      <?php if (isset($_SESSION['admin'])) { ?>
      <!-- Jika pengguna adalah admin, tampilkan data untuk setiap tabel dalam baris kotak (box) -->
>>>>>>> Stashed changes
      <div class="row">
        <?php 
        // Tentukan array dari elemen, di mana setiap elemen adalah array asosiatif informasi tentang suatu tabel
        $elements = [
          ['name' => 'Data Kriteria', 'link' => '?page=kriteria', 'color' => 'bg-info', 'table' => 'tb_kriteria'],
          ['name' => 'Data Karyawan', 'link' => '?page=datamaster', 'color' => 'bg-warning', 'table' => 'tb_karyawan'],
          ['name' => 'Data Login Pengguna', 'link' => '?page=user', 'color' => 'bg-gradient-success', 'table' => 'user'],
          ['name' => 'Data Jabatan', 'link' => '?page=jabatan', 'color' => 'bg-danger', 'table' => 'jabatan'],
        ];

        // Loop setiap elemen dalam array dan tampilkan informasi tentang tabel yang sesuai dalam sebuah kotak (box)
        foreach ($elements as $e) {
          // Hubungkan ke basis data dan lakukan query untuk mendapatkan jumlah baris dalam tabel
          $koneksi = mysqli_connect("localhost", "root", "", "malestore");
          $sql = "SELECT * FROM {$e['table']}";
          if ($result = mysqli_query($koneksi, $sql)) {
            $rowcount = mysqli_num_rows($result);

            // Tampilkan sebuah kotak (box) yang berisi informasi tentang tabel
            printf('
            <div class="col-lg-4 col-9">
              <div class="small-box %s">
                <div class="inner">
                  <h3>%d</h3>
                  <h5>%s</h5>
                </div>
                <div class="icon"></div>
                <a href="%s" class="small-box-footer">
                  Selengkapnya 
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>', $e['color'], $rowcount, $e['name'], $e['link']);

            // Bebaskan hasil dan tutup koneksi ke database
            mysqli_free_result($result);
          }
          mysqli_close($koneksi);
        }
        ?>
      </div>
<<<<<<< Updated upstream
=======
      <?php } 
      // Jika pengguna adalah karyawan, tampilkan satu kotak untuk perangkingan
      else if (isset($_SESSION['karyawan'])) { ?>
      <div class="row">
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h5>Perangkingan</h5>
            </div>
            <div class="icon"></div>
            <a href="?page=perangkingan" class="small-box-footer">
              Selengkapnya 
              <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <?php } ?>

    </section>
>>>>>>> Stashed changes
  </div>
</body>