<?php
$n = getJumlahKriteria();
$m = getJumlahAlternatif();

// Initialize matrices
$matrik = [];
$matrikb = [];
$total = [];

// Fill in the matrices
for ($x = 1; $x <= $m; $x++) {
  for ($y = 1; $y <= $n; $y++) {
    $pilih = getEVAlternatif($x, $y);
    $matrik[$x][$y] = $pilih;
  }
}

for ($y = 1; $y <= $n; $y++) {
  $pilih = getKriteriaPV($y);
  $matrikb[$y] = $pilih;
}

// Calculate the total for each row in the criteria table
for ($i = 0; $i <= ($n - 1); $i++) {
  $total[$i] = 0;
}

for ($x = 1; $x <= $m; $x++) {
  for ($y = 1; $y <= $n; $y++) {
    $value = $matrik[$x][$y] * $matrikb[$y];
    $total[$x] += $value;
  }
}
?>
<!-- Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Tabel Bobot Karyawan -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Bobot Karyawan</h3>
          </div>
          <div class="card-body">
            <form method="POST">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Karyawan</th>
                    <?php for ($i = 0; $i <= ($n - 1); $i++) { ?>
                      <th><?= getKriteriaNama($i) ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($x = 1; $x <= $m; $x++) { ?>
                    <tr>
                      <th><?= getAlternatifNama($x - 1) ?></th>
                      <?php for ($y = 1; $y <= $n; $y++) { ?>
                        <td><?= number_format(getEVAlternatif($x, $y), 3) ?></td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>

        <!-- Tabel Bobot Kriteria -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Bobot Kriteria</h3>
          </div>
          <div class="card-body">
            <form method="POST">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <?php for ($i = 0; $i <= ($n - 1); $i++) { ?>
                      <th><?= getKriteriaNama($i) ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php for ($x = 1; $x <= $n; $x++) { ?>
                      <td><?= number_format(getEVKriteria($x), 3) ?></td>
                    <?php } ?>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>

        <!-- Tabel Ranking -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Ranking</h3>
          </div>
          <div class="card-body">
            <form method="POST">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Ranking</th>
                    <th>Karyawan</th>
                    <?php for ($i = 0; $i <= ($n - 1); $i++) { ?>
                      <th><?= getKriteriaNama($i) ?></th>
                    <?php } ?>
                    <th bgcolor="#41fc03">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Kalkulasi masing-masig total skor karyawan
                  for ($x = 1; $x <= $m; $x++) {
                    $total[$x] = 0;
                    for ($y = 1; $y <= $n; $y++) {
                      $total[$x] += ($matrik[$x][$y] * $matrikb[$y]);
                    }
                  }

                  // Tampilkan Skor karyawan
                  arsort($total);
                  $ranking = 1;
                  foreach ($total as $key => $value) {
                    if ($value > 0) {
                      ?>
                      <tr>
                        <td><?= $ranking++ ?></td>
                        <th><?= getAlternatifNama($key - 1) ?></th>
                        <?php for ($y = 1; $y <= $n; $y++) { ?>
                          <td><?= number_format(($matrik[$key][$y] * $matrikb[$y]), 4) ?></td>
                        <?php } ?>
                        <td bgcolor='#41fc03'><?= number_format(($total[$key]), 4) ?></td>
                      </tr>
                    <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>