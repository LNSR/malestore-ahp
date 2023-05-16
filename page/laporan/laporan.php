<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Bulanan Malestore</title>
  </head>
  <style>
    .hidden {
      display: none;
    }
  </style>
  <body>
    <div class="page">
      <div class="content">
        <?php
        $n = getJumlahKriteria();
        $m = getJumlahAlternatif();
        $matrik = [];
        $matrikb = [];

        // Fill the matrix with values from the database
        for ($x = 1; $x <= $m; $x++) {
          for ($y = 1; $y <= $n; $y++) {
            $pilih = getEVAlternatif($x, $y);
            $matrik[$x][$y] = $pilih;
          }
        }

        // Fill the criteria matrix with values from the database
        for ($y = 1; $y <= $n; $y++) {
          $pilih = getKriteriaPV($y);
          $matrikb[$y] = $pilih;
        }

        // Initialize the total array
        $total = array_fill(0, $n, 0);

        // Calculate the total for each row in the criteria table
        for ($x = 1; $x <= $m; $x++) {
          for ($y = 1; $y <= $n; $y++) {
            $value = $matrik[$x][$y] * $matrikb[$y];
            $total[$x] += $value;
          }
        }
        ?>

        <!-- Add this section above the card -->
        <div class="row">
          <div class="col-md-12">
            <button id="printButton" class="btn btn-primary" onclick="printReport()" style="float: left; margin-bottom: 20px;" >Print</button>
            <button id="reset-button" class="btn btn-danger" style="float: right; margin-bottom: 20px;">Reset Bulan</button>
          </div>
        </div>
        <br />
        <div class="card">
          <div class="card-header">
            <h3 class="text-center"><b>Penilaian Kinerja Karyawan Malestore Periode <input type="month" id="periode" name="periode" /></b></h3>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Tabel Bobot Kriteria</b></h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <?php
                      for ($i = 0; $i <= ($n - 1); $i++) {
                        echo "<th>" . getKriteriaNama($i) . "</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      for ($x = 1; $x <= $n; $x++) {
                        echo "<td>" . number_format(getEVKriteria($x) * 100, 2) . "%</td>";
                      }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <form method="POST">
                <table class="table table-bordered text-center">
                  <?php
                  // Calculate the total score for each alternative
                  for ($x = 1; $x <= $m; $x++) {
                    $total[$x] = 0;
                    for ($y = 1; $y <= $n; $y++) {
                      $total[$x] += ($matrik[$x][$y] * $matrikb[$y]);
                    }
                  }

                  // Display the in descending order of score(percentage version)
                  arsort($total);
                  foreach ($total as $key => $value) {
                    if ($value > 0) {
                      $alternatifNama = getAlternatifNama($key - 1);
                      $alternatifJabatan = getAlternatifJabatan($key - 1);
                      ?>
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><b>Tabel Laporan Karyawan</b></h3>
                        </div>
                        <div class="card-body">
                          <h6><b>Nama : <?php echo $alternatifNama ?></b></h6>
                          <h6><b>Peran : <?php echo $alternatifJabatan ?></b></h6>
                        </div>
                        <form method="POST">
                          <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th>Kriteria</th>
                                <th>Skor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $rank = 1;
                              foreach ($matrik[$key] as $k => $v) {
                                $percentage = number_format(($v * $matrikb[$k]) * 100, 2) . "%";
                                ?>
                                <tr>
                                  <td><?php echo getKriteriaNama($k - 1) ?></td>
                                  <td><?php echo $percentage ?></td>
                                </tr>
                                <?php
                                $rank++;
                              }
                              $totalPercentage = number_format(($total[$key]) * 100, 2) . "%";
                              ?>
                              <tr>
                                <td><b>Skor Final</b></td>
                                <td><b><?php echo $totalPercentage ?></b></td>
                              </tr>
                              <tr>
                                <td><b>Keterangan</b></td>
                                <td>
                                  <?php
                                  if ($totalPercentage > 16 && $totalPercentage <= 100) {
                                    echo "<span style='background-color: #41fc03;'><b>Sangat Baik</b></span>";
                                  } elseif ($totalPercentage > 13 && $totalPercentage <= 16) {
                                    echo "<span style='background-color: #c1fc03;'><b>Baik</b></span>";
                                  } elseif ($totalPercentage > 7 && $totalPercentage <= 13) {
                                    echo "<span style='background-color: yellow;'><b>Cukup</b></span>";
                                  } elseif ($totalPercentage > 3 && $totalPercentage <= 7) {
                                    echo "<span style='background-color: red;'><b>Kurang</b></span>";
                                  } else {
                                    echo "<span style='background-color: red;'><b>Sangat Kurang</b></span>";
                                  }
                                  ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </table>
              </form>
            </div>
          </div>
          <!-- Tanda Tangan -->
          <footer id="printable-content" class="hidden">
            <div class="card">
              <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                  <p><strong style="font-size: larger;">Banjarmasin,.....................................</strong></p>
                  <p><strong style="font-size: larger;">Pimpinan</strong></p>
                  <br />
                  <p><strong style="font-size: larger;">________________________</strong></p>
                  <p><strong style="font-size: larger;">Aldy</strong></p>
                </div>
              </div>
           </div>
          </footer>
          <script src="page/laporan/fungsi.js"></script>
        </div>
      </div>
    </div>
  </body>
</html>
