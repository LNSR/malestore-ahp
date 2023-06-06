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
        <!-- Chart.js library -->
        <script src="page/laporan/fungsi.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Chart.js chart -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b id="period-title"></b></h3>
            <script>
              setPeriodTitle();
            </script>
          </div>
          <div class="card-body">
            <canvas id="karyawan-chart"></canvas>
          </div>
        </div>

        <!-- Chart.js script -->
        <script>
          // Get the canvas element
          var canvas = document.getElementById('karyawan-chart');

          // Create the chart
          var chart = new Chart(canvas, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode(array_map(function($key, $value) {
              return $value === 0.00? null : getAlternatifNama($key - 1);
            }, array_keys($total), array_values($total)));?>,
            datasets: [{
              label: 'Overall Kinerja Karyawan',
              data: <?php echo json_encode(array_map(function($value) {
                return $value === 0.00? null : $value * 100;
              }, array_values(array_filter($total, function($value) {
                return $value!== 0.00;
              }))));?>,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: false
                }
              }]
            }
          }
        });
        </script>