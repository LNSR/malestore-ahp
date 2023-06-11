<div class="row">
  <div class="col-md-12">
      <a href="?page=aalternatif&aksi=hapus" class="btn btn-danger" style="float: right; margin-bottom: 20px;" onclick="return confirm('Jika Anda menghapus tabel, Anda perlu memasukkan ulang nilai karyawan')">Hapus Tabel</a>
  </div>
</div>
<?php

$n    = getJumlahAlternatif();
$m    = getJumlahKriteria();
$matrik = array();
$urut   = 0;
for ($j = 0; $j < $m; $j++) {
  for ($x = 0; $x <= ($n - 2); $x++) {
    for ($y = ($x + 1); $y <= ($n - 1); $y++) {
      $urut++;
      $pilih  = getNilaiPerbandinganAlternatif($x, $y, ($j + 1));
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
  for ($i = 0; $i <= ($n - 1); $i++) {
    $jmlmpb[$i] = 0;
    $jmlmnk[$i] = 0;
    $jmlmnk2[$i] = 0;
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
  }
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b><?= getKriteriaNama($j)?></b> ~ Tabel Matriks Perbandingan Berpasangan</h3>
            <button type="button" class="btn btn-primary btn-sm" style="float: right; margin-bottom: 20px;" data-toggle="collapse" data-target="#collapseExample<?= $j?>" aria-expanded="false" onclick="toggleCard(this)" aria-controls="collapseExample<?= $j?>">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
          <div class="collapse" id="collapseExample<?= $j?>">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Karyawan</th>
                      <?php foreach (range(0, $n - 1) as $i) echo "<th>". getAlternatifNama($i). "</th>";?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (range(0, $n - 1) as $x) {?>
                      <tr>
                        <th><?= getAlternatifNama($x)?></th>
                        <?php foreach (range(0, $n - 1) as $y) {
                          $bgColor = $x == $y? "bgcolor='#888888'" : "";
                          echo "<td $bgColor>". number_format($matrik[$x][$y], 2). "</td>";
                        }?>
                      </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th bgcolor='#4db00c'>Jumlah</th>
                      <?php foreach (range(0, $n - 1) as $i) echo "<th bgcolor='#4db00c'>". number_format($jmlmpb[$i], 2). "</th>";?>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b><?= getKriteriaNama($j)?></b> ~ Tabel Matriks Perbandingan Berpasangan Ternormalisasi</h3>
            <button type="button" class="btn btn-primary btn-sm" style="float: right; margin-bottom: 20px;" data-toggle="collapse" data-target="#collapseExample2<?= $j?>" aria-expanded="false" onclick="toggleCard(this)" aria-controls="collapseExample2<?= $j?>">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
          <div class="collapse" id="collapseExample2<?= $j?>">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Karyawan</th>
                      <?php foreach (range(0, $n - 1) as $i) echo "<th>". getAlternatifNama($i). "</th>";?>
                      <th bgcolor="#4db00c">Jumlah</th>
                      <th bgcolor="#4db00c">Bobot</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $jmljml = 0;
                    $jmlev = 0;
                    foreach (range(0, $n - 1) as $x) {?>
                      <tr>
                        <th><?= getAlternatifNama($x)?></th>
                        <?php foreach (range(0, $n - 1) as $y) echo "<td>". number_format($matrikb[$x][$y], 3). "</td>";?>
                        <td bgcolor='#4db00c'><?= number_format($jmlmnk[$x], 3)?></td>
                        <td bgcolor='#4db00c'><?= number_format($ev[$x], 3)?></td>
                      </tr>
                      <?php
                      $jmljml += $jmlmnk[$x];
                      $jmlev += $ev[$x];
                    }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th bgcolor="#4db00c">Validasi</th>
                      <?php foreach (range(0, $n - 1) as $i) echo "<th bgcolor='#4db00c'>". number_format($jmlmnk2[$i], 0). "</th>";?>
                      <th bgcolor='#4db00c'><?= number_format($jmljml, 0)?></th>
                      <th bgcolor='#4db00c'><?= number_format($jmlev, 0)?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php } ?>