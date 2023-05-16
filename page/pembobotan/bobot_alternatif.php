<?php
include('config.php');
// include('fungsi.php');

$jenis = $_GET['c'];
include('../../header.php');
?>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Perbandingan Karyawan &rarr; <?php echo getKriteriaNama($jenis - 1) ?></h3>
		</div>
		<div class="card-body">
			<?php showTabelPerbandingan2($jenis, 'tb_karyawan'); ?>
		</div>
	</div>
</section>
<?php
include('../../footer.php');
?>