<?php
include('config.php');
// include('fungsi.php');
?>
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Perbandingan Kriteria(Pilih yang lebih penting)</h3>
		</div>
		<div class="card-body">
			<?php showTabelPerbandingan('kriteria', 'tb_kriteria'); ?>
		</div>
	</div>
</section>