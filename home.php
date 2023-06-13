      <div class="col-sm-6">
        <h3 class="m-0">Dashboard</h3>
      </div><!-- /.col -->
    <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
      </div>
      <section class="content-header">
        <?php if ($userType == 'admin') { ?>
        <!-- Jika pengguna adalah admin, tampilkan data untuk setiap tabel dalam baris kotak (box) -->
        <div class="row">
          <?php 
          // Tentukan array dari elemen, di mana setiap elemen adalah array asosiatif informasi tentang suatu tabel
          $elements = [
              ['name' => 'Data Kriteria', 'link' => '?page=kriteria', 'color' => 'bg-info', 'table' => 'tb_kriteria'],
              ['name' => 'Data Karyawan', 'link' => '?page=karyawan', 'color' => 'bg-warning', 'table' => 'tb_karyawan'],
              ['name' => 'Data Pengguna', 'link' => '?page=user', 'color' => 'bg-gradient-success', 'table' => 'user'],
              ['name' => 'Data Jabatan', 'link' => '?page=jabatan', 'color' => 'bg-danger', 'table' => 'jabatan'],
          ];

          // Loop setiap elemen dalam array dan tampilkan informasi tentang tabel yang sesuai dalam sebuah kotak (box)
          foreach ($elements as $e) {
              $sql = "SELECT * FROM {$e['table']}";
              if ($result = mysqli_query($koneksi, $sql)) {
              $rowcount = mysqli_num_rows($result);

              // Tampilkan sebuah kotak (box) yang berisi informasi tentang tabel
              printf('
              <div class="col-lg-3 col-6">
                <div class="small-box %s">
                  <div class="inner">
                    <h3>%d</h3>
                    <h5>%s</h5>
                  </div>
                  <div class="icon"></div>
                  <a href="%s" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>', $e['color'], $rowcount, $e['name'], $e['link']);
              }
          }
          ?>
        </div
        <?php } 
        // Jika pengguna adalah karyawan, tampilkan satu kotak untuk perankingan
        else if ($userType == 'karyawan') { ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h5>Perankingan</h5>
              </div>
            <div class="icon"></div><a href="?page=perankingan" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } 
          include ("chart.php");
          ?>
        </div>
      </section>
    </div>
          <!-- ./col -->
  </div>
</section>