<?php
// include('page/pembobotan/fungsi.php');

$n    = getJumlahKriteria();
$matrik = array();
$urut   = 0;

for ($x = 0; $x <= ($n - 2); $x++) {
  for ($y = ($x + 1); $y <= ($n - 1); $y++) {
    $urut++;
    $pilih  = getNilaiPerbandinganKriteria($x, $y);
    $matrik[$x][$y] = $pilih;
    $matrik[$y][$x] = 1 / $pilih;
  }
}

// diagonal --> bernilai 1
for ($i = 0; $i <= ($n - 1); $i++) {
  $matrik[$i][$i] = 1;
}

// inisialisasi jumlah tiap kolom dan baris kriteria
$jmlmpb = array();
$jmlmnk = array();
$jmlmnk2 = array();
$jmlmkk = array();
$jmlmkk2 = array();
for ($i = 0; $i <= ($n - 1); $i++) {
  $jmlmpb[$i] = 0;
  $jmlmnk[$i] = 0;
  $jmlmnk2[$i] = 0;
  $jmlmkk[$i] = 0;
  $jmlmkk2[$i] = 0;
}

// menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
for ($x = 0; $x <= ($n - 1); $x++) {
  for ($y = 0; $y <= ($n - 1); $y++) {
    $value    = $matrik[$x][$y];
    $jmlmpb[$y] += $value;
  }
}

// menghitung jumlah pada baris kriteria tabel nilai kriteria
// matrikb merupakan matrik yang telah dinormalisasi
for ($x = 0; $x <= ($n - 1); $x++) {
  for ($y = 0; $y <= ($n - 1); $y++) {
    $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
    $value  = $matrikb[$x][$y];
    $jmlmnk[$x] += $value;
    $jmlmnk2[$y] += $value;
  }

  // nilai eigen vektor
  $ev[$x]   = $jmlmnk[$x] / $n;

  $id_kriteria = getKriteriaID($x);
  inputKriteriaPV($id_kriteria, $ev[$x]);
}


for ($x = 0; $x <= ($n - 1); $x++) {
  for ($y = 0; $y <= ($n - 1); $y++) {
    $matrikk[$x][$y] = $matrik[$x][$y] * $ev[$y];
    $value  = $matrikk[$x][$y];
    $jmlmkk[$x] += $value;
    $jmlmkk2[$y] += $value;
  }
  $bobot[$x]   = $jmlmkk[$x] / $ev[$x];
}
?>
<div class="row">
  <div class="col-md-12">
      <a href="?page=akriteria&aksi=hapus" class="btn btn-danger" style="float: right; margin-bottom: 20px;" onclick="return confirm('Jika Anda menghapus tabel, Anda perlu memasukkan ulang nilai kriteria')">Hapus Tabel</a>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Matriks Berpasangan Desimal</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Kriteria</th>
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                      echo "<th>" . getKriteriaNama($i) . "</th>";
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($x = 0; $x <= ($n - 1); $x++) {
                    echo "<tr>";
                    echo "<th>" . getKriteriaNama($x) . "</th>";
                    for ($y = 0; $y <= ($n - 1); $y++) {
                      if ($x == $y) {
                        echo "<td bgcolor='#888888'>" . number_format($matrik[$x][$y], 2) . "</td>";
                      } else {
                        echo "<td>" . number_format($matrik[$x][$y], 2) . "</td>";
                      }
                    }
                    echo "</tr>";
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th bgcolor="#4db00c">Jumlah</th>
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                      echo "<th bgcolor='#4db00c'>" . number_format($jmlmpb[$i], 2) . "</th>";
                    }
                    ?>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Matriks Berpasangan Ternormalisasi</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Kriteria</th>
                    <?php
                    for ($i = 0; $i <= ($n - 1); $i++) {
                      echo "<th>" . getKriteriaNama($i) . "</th>";
                    }
                    ?>
                    <th bgcolor="#4db00c">Jumlah</th>
                    <th bgcolor="#4db00c">Bobot</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($x = 0; $x <= ($n - 1); $x++) {
                    echo "<tr>";
                    echo "<th>" . getKriteriaNama($x) . "</th>";
                    for ($y = 0; $y <= ($n - 1); $y++) {
                      echo "<td>" . number_format($matrikb[$x][$y], 3) . "</td>";
                    }
                    echo "<td bgcolor='#4db00c'>" . number_format($jmlmnk[$x], 3) . "</td>";
                    echo "<td bgcolor='#4db00c'>" . number_format($ev[$x], 3) . "</td>";
                    echo "</tr>";
                    $jmljml += $jmlmnk[$x];
                    $jmlev += $ev[$x];
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th bgcolor="#4db00c">Validasi</th>
                    <?php
                    for ($i = 0; $i <= (($n - 1)); $i++) {
                      echo "<th bgcolor='#4db00c'>" . number_format($jmlmnk2[$i], 0) . "</th>";
                    }
                    echo "<th bgcolor='#4db00c'>" . number_format($jmljml, 0) . "</th>";
                    echo "<th bgcolor='#4db00c'>" . number_format($jmlev, 0) . "</th>";
                    ?>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Matriks Konsistensi Kriteria</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Kriteria</th>
                  <?php
                  for ($i = 0; $i <= ($n - 1); $i++) {
                    echo "<th>" . getKriteriaNama($i) . "</th>";
                  }
                  ?>
                  <th bgcolor="#4db00c">Jumlah</th>
                  <th bgcolor="#4db00c">Bobot</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($x = 0; $x <= ($n - 1); $x++) {
                  echo "<tr>";
                  echo "<th>" . getKriteriaNama($x) . "</th>";
                  for ($y = 0; $y <= ($n - 1); $y++) {
                    echo "<td>" . number_format($matrikk[$x][$y], 3) . "</td>";
                  }
                  echo "<td bgcolor='#4db00c'>" . number_format($jmlmkk[$x], 3) . "</td>";
                  echo "<td bgcolor='#4db00c'>" . number_format($bobot[$x], 3) . "</td>";
                  echo "</tr>";
                  $∑jml += $jmlmkk[$x];
                  $∑bobot += $bobot[$x];
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th bgcolor="#4db00c">∑</th>
                  <?php
                  for ($i = 0; $i <= (($n - 1)); $i++) {
                    echo "<th bgcolor='#4db00c'>" . number_format($jmlmkk2[$i], 3) . "</th>";
                  }
                  echo "<th bgcolor='#4db00c'>" . number_format($∑jml, 3) . "</th>";
                  echo "<th bgcolor='#4db00c'>" . number_format($∑bobot, 3) . "</th>";
                  ?>
                </tr>
              </tfoot>
            </table>
          </div>
        </div> -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Rasio Konsistensi</h3>
          </div>
          <div class="card-body">
            <h6><b>λ maks	 : <?php echo (round(($∑jml), 3)) ?></b></h6>
            <h6><b>Konsistensi Indeks : <?php echo (round(((($∑jml - $n)) / ($n - 1)), 4)) ?></b></h6>
            <h6><b>Konsistensi Rasio: <?php echo (round(((($∑jml - $n)) / ($n - 1)) / getNilaiIR($n), 4) * 100) ?>%</b></h6>
          </div>
        <!-- Rasio Konsistensi Memakai Tabel Bobot -->
        <!--   <div class="card-body">
            <h6>Lamda Maksimum : <?php echo (round(($∑bobot / $n), 3)) ?></h6>
            <h6>Consistensi Index : <?php echo (round(((($∑bobot / $n) - $n) / ($n - 1)), 3)) ?></h6>
            <h6>Consistensi Rasio : <?php echo (round((((($∑bobot / $n) - $n) / ($n - 1)) / getNilaiIR($n)), 3)) ?></h6>
          </div> -->
        </div>
      </div>
    </div>
  </div>
<?php
$cr = (round(((($∑jml - $n)) / ($n - 1)) / getNilaiIR($n), 4));
if ($cr > 0.1) {
?>
  <script type="text/javascript">
    alert("Nilai Consistensi Rasio lebih dari 0.1, Silahkan input kembali !");
    window.location.href = "?page=bobot_kriteria";
  </script>
<?php } ?>