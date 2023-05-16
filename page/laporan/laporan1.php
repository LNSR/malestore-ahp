<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Bulanan Malestore</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    .page {
      display: flex;
      flex-direction: column;
      min-height: 90%;
    }
    .content {
      flex-grow: 1;
    }
    .hidden {
      display: none;
    }
    .card-footer {
      flex-shrink: 0;
    }

    @media print {
      .page {
        height: auto;
      }
      .content {
        height: auto;
      }
      .card {
        page-break-inside: avoid;
      }
      @page {
        size: auto;
        margin: 20mm;
      }
    }
  </style>
</head>
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
        <div class="col-md-12 text-right">
          <button id="printButton" class="btn btn-primary" onclick="printReport()">Print</button>
          <button id="reset-button" class="btn btn-danger">Reset Bulan</button>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header">
        <h3 class="text-center"><b>Penilaian Kinerja Karyawan Malestore Periode <input type="month" id="periode" name="periode"></b></h3>
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
                    } ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    for ($x = 1; $x <= $n; $x++) {
                      echo "<td>" . number_format(getEVKriteria($x) * 100, 2) . "%</td>";
                    } ?>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b>Tabel Skor Karyawan</b></h3>
          </div>
          <div class="card-body">
        <form method="POST">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Ranking</th>
                <th>Kriteria/Karyawan</th>
                <th>Jabatan</th>
                <?php
                // Display the criteria names
                for ($i = 0; $i < $n; $i++) {
                  echo "<th>" . getKriteriaNama($i) . "</th>";
                }
                ?>
                <th>Skor Final</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Calculate the total score for each alternative
              for ($x = 1; $x <= $m; $x++) {
                $total[$x] = 0;
                for ($y = 1; $y <= $n; $y++) {
                  $total[$x] += ($matrik[$x][$y] * $matrikb[$y]);
                }
              }

              // Display the alternatives in descending order of score(percentage version)
              arsort($total);
              $rank = 1;
              foreach ($total as $key => $value) {
                if ($value > 0) {
                  echo "<tr>";
                  echo "<td>" . $rank . "</td>";
                  echo "<th>" . getAlternatifNama($key - 1) . "</th>";
                  echo "<th>" . getAlternatifJabatan($key - 1) . "</th>";
                  for ($y = 1; $y <= $n; $y++) {
                    $percentage = number_format(($matrik[$key][$y] * $matrikb[$y]) * 100, 2) . "%";
                    echo "<td>" . $percentage . "</td>";
                  }
                  $totalPercentage = number_format(($total[$key]) * 100, 2) . "%";
                  echo "<td>" . $totalPercentage . "</td>";
                  if ($totalPercentage > 16 && $totalPercentage <= 100) {
                    echo "<td style='background-color: #41fc03;'>Sangat Baik</td>";
                  } elseif ($totalPercentage > 13 && $totalPercentage <= 16) {
                    echo "<td style='background-color: #c1fc03;'>Baik</td>";
                  } elseif ($totalPercentage > 7 && $totalPercentage <= 13){
                    echo "<td style='background-color: yellow;'>Cukup</td>";
                  } elseif ($totalPercentage > 3 && $totalPercentage <= 7) {
                    echo "<td style='background-color: red;'>Kurang</td>";
                  } else {
                    echo "<td style='background-color: red;'>Sangat Kurang</td>";
                  }
                  echo "</tr>";
                  $rank++;
                }
              }
              ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
<!--     <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Tabel Catatan Skor</b></h3>
      </div>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>Skor</th>
            <th>Keterangan Skor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>>16% ー <=100%</th>
            <th>Sangat Baik</th>
          </tr>
            <tr>
            <th>>13% ー <=16%</th>
            <th>Baik</th>
          </tr>
            <tr>
            <th>>7% ー <=13%</th>
            <th>Cukup</th>
          </tr>
            <tr>
            <th>>3% ー <=7%</th>
            <th>Kurang</th>
          </tr>
            <tr>
            <th>>0% ー <=3%</th>
            <th>Sangat Kurang</th>
          </tr>
        </tbody>
      </table>
    </div> -->
    <!-- Tanda Tangan -->
    <div id="printable-content" class="hidden">
      <div class="card">
        <div class="row justify-content-center">
          <div class="col-md-12 text-center">
            <p><strong style="font-size: larger;">Banjarmasin,.....................................</strong></p>
            <p><strong style="font-size: larger;">Pimpinan</strong></p>
            <br>
            <p><strong style="font-size: larger;">________________________</strong></p>
            <p><strong style="font-size: larger;">Aldy</strong></p>
          </div>
        </div>
      </div>
    </div>
  <script src="page/laporan/fungsi.js"></script>
</body>
</html>
<!--           // Display the alternatives in descending order of score
          arsort($total);
          $rank = 1;
          foreach ($total as $key => $value) {
            if ($value > 0) {
              echo "<tr>";
              echo "<td>" . $rank . "</td>";
              echo "<th>" . getAlternatifNama($key - 1) . "</th>";
              for ($y = 1; $y <= $n; $y++) {
                echo "<td>" . number_format(($matrik[$key][$y] * $matrikb[$y]), 4) . "</td>";
              }
              echo "<td bgcolor='#41fc03'>" . number_format(($total[$key]), 4) . "</td>";
              echo "</tr>";
              $rank++;
            }
          }
          ?> -->
