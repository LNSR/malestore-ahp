<?php
$jenis = isset($_GET['c'])? $_GET['c'] : null;

switch ($page) {
  case 'bobot_kriteria':
   ?>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Perbandingan Kriteria(Pilih yang lebih penting)</h3>
        </div>
        <div class="card-body">
          <?php showTabelPerbandingan(kriteria, $page);?>
        </div>
      </div>
    </section>
    <?php
    break;
  case 'bobot_alternatif':
   ?>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Perbandingan Alternatif &rarr; <?php echo getKriteriaNama($jenis - 1)?></h3>
        </div>
        <div class="card-body">
          <?php showTabelPerbandingan($jenis, $page);?>
        </div>
      </div>
    </section>
    <?php
    break;
}
?>