<?php

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut)
{
	include('config.php');
	$query  = "SELECT kriteria_id FROM tb_kriteria ORDER BY kriteria_id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['kriteria_id'];
	}
	return $listID[($no_urut)];
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut)
{
	include('config.php');
	$query  = "SELECT id_karyawan FROM tb_karyawan ORDER BY id_karyawan";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id_karyawan'];
	}
	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut)
{
	include('config.php');
	$query  = "SELECT kriteria_nama FROM tb_kriteria ORDER BY kriteria_id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['kriteria_nama'];
	}
	return $nama[($no_urut)];
}

// mencari nama alternatif
function getAlternatifNama($no_urut)
{
	include('config.php');
	$query  = "SELECT nama_karyawan, jabatan FROM tb_karyawan ORDER BY id_karyawan";
	$result = mysqli_query($koneksi, $query);
	
	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama_karyawan'];
	}
	return $nama[($no_urut)];
}
function getAlternatifJabatan($no_urut)
{
	include('config.php');
	$query  = "SELECT nama_karyawan, jabatan FROM tb_karyawan ORDER BY id_karyawan";
	$result = mysqli_query($koneksi, $query);
	
	while ($row = mysqli_fetch_array($result)) {
		$jabatan[] = $row['jabatan'];
	}
	return $jabatan[($no_urut)];
}

// mencari priority vector alternatif
function getAlternatifPV($id_karyawan, $id_kriteria)
{
	include('config.php');
	$query = "SELECT nilai FROM pv_alternatif WHERE id_alternatif=$id_karyawan AND id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}
	return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria)
{
	include('config.php');
	$query = "SELECT nilai FROM tb_pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}
	return $pv;
}

// mencari jumlah alternatif
function getJumlahAlternatif()
{
	include('config.php');
	$query  = "SELECT count(*) FROM tb_karyawan";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}
	return $jmlData;
}

// mencari jumlah kriteria
function getJumlahKriteria()
{
	include('config.php');
	$query  = "SELECT count(*) FROM tb_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}
	return $jmlData;
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV($id_kriteria, $pv)
{
	include('config.php');

	$query = "SELECT * FROM tb_pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO tb_pv_kriteria (id_kriteria, nilai) VALUES ($id_kriteria, $pv)";
	} else {
		$query = "UPDATE tb_pv_kriteria SET nilai=$pv WHERE id_kriteria=$id_kriteria";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}
}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV($id_karyawan, $id_kriteria, $pv)
{
	include('config.php');

	$query  = "SELECT * FROM tb_pv_alternatif WHERE id_alternatif = $id_karyawan AND id_kriteria = $id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error bro!!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO tb_pv_alternatif (id_alternatif,id_kriteria,nilai) VALUES ($id_karyawan,$id_kriteria,$pv)";
	} else {
		$query = "UPDATE tb_pv_alternatif SET nilai=$pv WHERE id_alternatif=$id_karyawan AND id_kriteria=$id_kriteria";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}
}

// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1, $kriteria2, $nilai)
{
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM tb_banding_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO tb_banding_kriteria (kriteria1,kriteria2,nilai) VALUES ($id_kriteria1,$id_kriteria2,$nilai)";
	} else {
		$query = "UPDATE tb_banding_kriteria SET nilai=$nilai WHERE kriteria1=$id_kriteria1 AND kriteria2=$id_kriteria2";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}
}

// memasukkan bobot nilai Perbandingan Karyawan
function inputDataPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding, $nilai)
{
	include('config.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM tb_banding_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO tb_banding_alternatif (alternatif1,alternatif2,pembanding,nilai) VALUES ($id_alternatif1,$id_alternatif2,$id_pembanding,$nilai)";
	} else {
		$query = "UPDATE tb_banding_alternatif SET nilai=$nilai WHERE alternatif1=$id_alternatif1 AND alternatif2=$id_alternatif2 AND pembanding=$id_pembanding";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}
}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
{
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT nilai FROM tb_banding_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result) == 0) {
		$nilai = 0;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}
	return $nilai;
}

// mencari nilai bobot Perbandingan Karyawan
function getNilaiPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding)
{
	include('config.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);

	$query  = "SELECT nilai FROM tb_banding_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error bro!!!";
		exit();
	}
	if (mysqli_num_rows($result) == 0) {
		$nilai = 0;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}
	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria)
{
	include('config.php');
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a, $matrik_b, $n)
{
	$eigenvektor = 0;
	for ($i = 0; $i <= ($n - 1); $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a, $matrik_b, $n)
{
	$eigenvektor = getEigenVector($matrik_a, $matrik_b, $n);
	$consindex = ($eigenvektor - $n) / ($n - 1);

	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a, $matrik_b, $n)
{
	$consindex = getConsIndex($matrik_a, $matrik_b, $n);
	$consratio = $consindex / getNilaiIR($n);

	return $consratio;
}

function getEVKriteria($id_kriteria)
{
	include('config.php');

	$query = "SELECT nilai FROM tb_pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (mysqli_num_rows($result) == 0) {
		$nilai = 0;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}
	return $nilai;
}

function getEVAlternatif($id_alternatif, $id_kriteria)
{
	include('config.php');

	$query = "SELECT nilai FROM tb_pv_alternatif WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (mysqli_num_rows($result) == 0) {
		$nilai = 0;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}
	return $nilai;
}

// menampilkan tabel perbandingan bobot kriteria
function showTabelPerbandingan($jenis, $kriteria)
{
	include('config.php');

	$n = getJumlahKriteria();

	$hasil = "SELECT nilai FROM tb_banding_kriteria";
	$result1	= mysqli_query($koneksi, $hasil);
	while ($row1 = mysqli_fetch_array($result1)) {
		$edit_pilihan[] = $row1['nilai'];
	}

	$query = "SELECT kriteria_nama FROM $kriteria ORDER BY kriteria_id";
	$result	= mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['kriteria_nama'];
	}
?>
	<form class="ui form" action="page/pembobotan/proses.php" method="post">
		<?php
		$urut = 0;
		$idi = 0;

		for ($x = 0; $x <= ($n - 2); $x++) {
			for ($y = ($x + 1); $y <= ($n - 1); $y++) {
				$urut++;
		?>
				<div class="row">
					<div class="col-lg-2">
						<div class="form-group">
						<input name="pilih<?php echo $urut?>" value="1" class="hidden" type="radio" checked>
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<select class="form-control" name="bobot<?= $urut ?>" id="nilai" style="width:100%">
    						<?php
    						$options = [
								1 => "1. Sama penting dengan",
								2 => "2. Sama hingga sedikit lebih penting",
								3 => "3. Sedikit lebih penting",
								4 => "4. Sedikit lebih hingga jelas lebih penting",
								5 => "5. Jelas lebih penting",
								6 => "6. Jelas hingga sangat jelas lebih penting",
								7 => "7. Sangat jelas lebih penting",
								8 => "8. Sangat jelas hingga mutlak lebih penting",
								9 => "9. Mutlak lebih penting"
   							];
    						foreach ($options as $value => $label) {
        						$selected = ($edit_pilihan[$idi] == $value) ? "selected" : "";
        						echo "<option value=\"$value\" $selected>$label</option>";
    						}
    						?>
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</div>
		<?php
				$idi++;
			}
		}
		?>
		<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
		<input class="btn btn-success" type="submit" name="submit" value="SUBMIT" style="margin-left: 59%;">
	</form>
<?php
}

function showTabelPerbandingan2($jenis, $alternatif)
{
	include('config.php');

	$n = getJumlahAlternatif();

	$hasil = "SELECT nilai FROM tb_banding_alternatif WHERE pembanding=$jenis";
	$result1	= mysqli_query($koneksi, $hasil);
	while ($row1 = mysqli_fetch_array($result1)) {
		$edit_pilihan[] = $row1['nilai'];
	}

	$query = "SELECT nama_karyawan FROM $alternatif ORDER BY id_karyawan";
	$result	= mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nama_karyawan'];
	}
?>
	<form class="ui form" action="../../page/pembobotan/proses.php" method="post">
		<?php
		$urut = 0;
		$idi = 0;

		for ($x = 0; $x <= ($n - 2); $x++) {
			for ($y = ($x + 1); $y <= ($n - 1); $y++) {
				$urut++;
		?>
				<div class="row">
					<div class="col-lg-2">
						<div class="form-group">
						<input name="pilih<?php echo $urut?>" value="1" class="hidden" type="radio" checked>
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<select class="form-control" name="bobot<?= $urut ?>" id="nilai" style="width:100%">
    						<?php
    						$options = [
								1 => "1. Sama penting dengan",
								2 => "2. Sama hingga sedikit lebih penting",
								3 => "3. Sedikit lebih penting",
								4 => "4. Sedikit lebih hingga jelas lebih penting",
								5 => "5. Jelas lebih penting",
								6 => "6. Jelas hingga sangat jelas lebih penting",
								7 => "7. Sangat jelas lebih penting",
								8 => "8. Sangat jelas hingga mutlak lebih penting",
								9 => "9. Mutlak lebih penting"
   							];
    						foreach ($options as $value => $label) {
        						$selected = ($edit_pilihan[$idi] == $value) ? "selected" : "";
        						echo "<option value=\"$value\" $selected>$label</option>";
    						}
    						?>
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
						<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</div>
		<?php
				$idi++;
			}
		}
		?>
		<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
		<input class="btn btn-success" type="submit" name="submit" value="SUBMIT" style="margin-left: 59%;">
	</form>
<?php } ?>