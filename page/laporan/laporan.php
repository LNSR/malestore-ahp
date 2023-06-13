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
    @media print {
  table,.avoid-break {
    page-break-inside: avoid;
  }
  @page {
    size: A4;
    margin: 0;
  }
 .main-footer {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px;
    background-color: #f5f5f5;
    padding: 10px;
  }
}
  
  </style>
</head>
<body>
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
<div class="page">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <button id="printButton" class="btn btn-primary" onclick="printReport1()" style="float: left; margin-bottom: 20px;">Print</button>
        <button id="reset-button" class="btn btn-danger" onclick="resetMonth()" style="float: right; margin-bottom: 20px;">Reset Bulan</button>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <img id="logo" src="img/logotrans.png" height="200px" style="display: none; margin:auto;">
            <h3 class="text-center"><b>Penilaian Kinerja Karyawan Malestore Periode <input type="month" id="periode" name="periode"/></b></h3>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b>Tabel Bobot Kriteria</b></h3>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="table-responsive">
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
              </div>
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
                        <td style="padding: 8px 12px; background-color: <?php echo $totalPercentage > 15 && $totalPercentage <= 100? '#41fc03' : ($totalPercentage > 12 && $totalPercentage <= 15? '#c1fc03' : ($totalPercentage > 9 && $totalPercentage <= 12? 'yellow' : ($totalPercentage > 4 && $totalPercentage <= 9? 'red' : '#ff0000')));?>; color: <?php echo $totalPercentage > 15 && $totalPercentage <= 100? '#000' : ($totalPercentage > 12 && $totalPercentage <= 15? '#000' : ($totalPercentage > 9 && $totalPercentage <= 12? '#000' : ($totalPercentage > 4 && $totalPercentage <= 9? '#fff' : '#fff')));?>;"><b><?php echo $totalPercentage > 15 && $totalPercentage <= 100? 'Sangat Baik' : ($totalPercentage > 12 && $totalPercentage <= 15? 'Baik' : ($totalPercentage > 9 && $totalPercentage <= 12? 'Cukup' : ($totalPercentage > 4 && $totalPercentage <= 9? 'Kurang' : 'Sangat Kurang')));?></b></td>
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
        </div>
      </div>
    </section>
  </div>
</div>
</body>
  <!-- Tanda Tangan -->
  <script>updateReportTitle()</script>
  <footer id="printable-content" class="main-footer hidden">
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
  </footer>
</html>