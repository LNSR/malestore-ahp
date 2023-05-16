<?php

$n    = getJumlahKriteria();
$m = getJumlahAlternatif();
$matrik = array();
$matrikb = array();

for ($x = 1; $x <= $m; $x++) {
  for ($y = 1; $y <= $n; $y++) {
    $pilih  = getEVAlternatif($x, $y);
    $matrik[$x][$y] = $pilih;
  }
}

for ($y = 1; $y <= $n; $y++) {
  $pilih  = getKriteriaPV($y);
  $matrikb[$y] = $pilih;
}

// inisialisasi jumlah tiap kolom dan baris kriteria
$total = array();
for ($i = 0; $i <= ($n - 1); $i++) {
  $total[$i] = 0;
}

// menghitung jumlah pada baris kriteria tabel nilai kriteria
// matrikb merupakan matrik yang telah dinormalisasi
for ($x = 1; $x <= $m; $x++) {
  for ($y = 1; $y <= $n; $y++) {
    $value  = $matrik[$x][$y] * $matrikb[$y];
    $total[$x] += $value;
  }
}
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
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
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                      echo "<th>" . getKriteriaNama($i) . "</th>";
                    } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($x = 1; $x <= $m; $x++) {
                    echo "<tr>";
                    echo "<th>" . getAlternatifNama($x - 1) . "</th>";
                    for ($y = 1; $y <= $n; $y++) {
                      echo "<td>" . number_format(getEVAlternatif($x, $y), 3) . "</td>";
                    }
                    echo "</tr>";
                  } ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Bobot Kriteria</h3>
          </div>
          <div class="card-body">
            <form method="POST">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                      echo "<th>" . getKriteriaNama($i) . "</th>";
                    } ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    for ($x = 1; $x <= $n; $x++) {
                      echo "<td>" . number_format(getEVKriteria($x), 3) . "</td>";
                    } ?>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>

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
            <?php
            for ($i = 0; $i <= ($n - 1); $i++) {
              echo "<th>" . getKriteriaNama($i) . "</th>";
            } ?>
            <th bgcolor="#41fc03">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Kalkulasi masing-masing total score karyawan(alternatif)
          for ($x = 1; $x <= $m; $x++) {
            $total[$x] = 0;
            for ($y = 1; $y <= $n; $y++) {
              $total[$x] += ($matrik[$x][$y] * $matrikb[$y]);
            }
          }

          // Display the alternatives in descending order of score
          arsort($total);
          $ranking = 1;
          foreach ($total as $key => $value) {
            if ($value > 0) {
              echo "<tr>";
              echo "<td>" . $ranking++ . "</td>";
              echo "<th>" . getAlternatifNama($key - 1) . "</th>";
              for ($y = 1; $y <= $n; $y++) {
                echo "<td>" . number_format(($matrik[$key][$y] * $matrikb[$y]), 4) . "</td>";
              }
              echo "<td bgcolor='#41fc03'>" . number_format(($total[$key]), 4) . "</td>";
              echo "</tr>";
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