<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan Bulan Malestore</title>
  <style>
    .hidden {
      display: none;
    }
    body {
      margin: 0;
      padding: 0;
      min-height: 100%;
      position: relative;
    }
    .page {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .content {
      padding-bottom: 100px;
      flex: 1;
    }

    .table-container {
      display: flex;
      flex-wrap: wrap;
    }

    .table-container .table-wrapper {
      width: 100%;
      padding: 10px;
    }

    .table-container table {
      width: 100%;
      border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
      border: 1px solid black;
      padding: 8px;
    }

    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100px; /* Height of the footer */
      background-color: #f5f5f5;
      padding: 20px;
    }

    .footer.card {
      margin-bottom: 0;
    }

    .footer.card.row {
      justify-content: center;
    }

    .footer.card.col-md-12 {
      text-align: center; 
    } 

    .footer.card p {
      font-size: larger;
    }
    .page-break {
      page-break-after: always;
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
      <div class="col-md-12">
        <button id="printButton" class="btn btn-primary" onclick="printReport()" style="float: left; margin-bottom: 20px;">Print</button>
        <button id="reset-button" class="btn btn-danger" style="float: right; margin-bottom: 20px;">Reset Bulan</button>
      </div>
    </div>
    <br/>
    <div class="card">
      <div class="card-header">
        <h3 class="text-center"><b>Penilaian Kinerja Karyawan Malestore Periode <input type="month" id="periode" name="periode"/></b>
        </h3>
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
    <h3 class="card-title"><b>Tabel Laporan Karyawan</b></h3>
  </div>
  <div class="card-body">
    <form method="POST">
      <?php
      // Calculate the total score for each alternative
      arsort($total);
      foreach ($total as $key => $value) {
        if ($value > 0) {
          $alternatifNama = getAlternatifNama($key - 1);
          $alternatifJabatan = getAlternatifJabatan($key - 1);
          ?>
          <div class="card">
            <div class="card-header">
              <h6><b>Nama: <?php echo $alternatifNama ?></b></h6>
              <h6><b>Peran: <?php echo $alternatifJabatan ?></b></h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center table-sm" <th style="padding: 5px;">
                <thead>
                  <tr>
                    <th style="padding: 8px 12px;">Kriteria</th>
                    <th style="padding: 8px 12px;">Skor</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $rank = 1;
                  foreach ($matrik[$key] as $k => $v) {
                    $percentage = number_format(($v * $matrikb[$k]) * 100, 2) . "%";
                    ?>
                    <tr>
                      <td style="padding: 8px 12px;"><?php echo getKriteriaNama($k - 1) ?></td>
                      <td style="padding: 8px 12px;"><?php echo $percentage ?></td>
                    </tr>
                    <?php
                    $rank++;
                  }
                  $totalPercentage = number_format(($total[$key]) * 100, 2) . "%";
                  ?>
                  <tr>
                    <td style="padding: 8px 12px;"><b>Skor Final</b></td>
                    <td style="padding: 8px 12px;"><b><?php echo $totalPercentage ?></b></td>
                  </tr>
                  <tr>
                    <td style="padding: 8px 12px;"><b>Keterangan</b></td>
                    <td style="padding: 8px 12px;">
                      <?php
                      if ($totalPercentage > 23 && $totalPercentage <= 100) {
                        echo "<span style='background-color: #41fc03;'><b>Sangat Baik</b></span>";
                      } elseif ($totalPercentage > 17 && $totalPercentage <= 23) {
                        echo "<span style='background-color: #c1fc03;'><b>Baik</b></span>";
                      } elseif ($totalPercentage > 10 && $totalPercentage <= 17) {
                        echo "<span style='background-color: yellow;'><b>Cukup</b></span>";
                      } elseif ($totalPercentage > 4 && $totalPercentage <= 10) {
                        echo "<span style='background-color: red;'><b>Kurang</b></span>";
                      } else {
                        echo "<span style='background-color: red;'><b>Sangat Kurang</b></span>";
                      }
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </form>
  </div>
  <script src="page/laporan/fungsi.js"></script>
</div>
</body>
<br>
    <!-- Tanda Tangan -->
    <footer id="printable-content" class="footer hidden">
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
</html>
