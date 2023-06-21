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
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title"><b id="period-title"></b></h3>
            <script>
              setPeriodTitle();
            </script>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="karyawan-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

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