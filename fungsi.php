<?php
// error_reporting(E_ALL & ~E_WARNING);

//|============================================================================================|
//|***********************************Fungsi Index*********************************************|
//|============================================================================================|


// Header and Navbar Scripts
function includeHeaderAndNav($userType) {
	include 'config.php';
    ?>
    <html>

    <head>
		<!-- Link rel & href -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPK Malestore(<?php echo $userType ?>)</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="assets/plugins/Ionicons/css/ionicons.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
		<!-- summernote -->
		<link rel="stylesheet" href="assets/plugins/summernote/summernote.css">
		<!-- My own CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- Scripts -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<!-- Bootstrap 4 -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
		<!-- ChartJS -->
		<script src="assets/plugins/chart.js/Chart.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<!-- My Own Page Scripts -->
		<script src="page/script.js"></script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include "navbar.php" ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
			<?php
			$page = $_GET['page']?? '';
			$aksi = $_GET['aksi']?? $_GET['c']?? '';
			?>
            <?php include "sidebar.php"?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">

                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">

                            <!-- ./col -->

                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->    
    <?php
}

// Footer Scripts
function includeFooter() {
	include 'config.php';
    ?>
    <!-- /.card-header -->
    <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!--  -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- JQVMap -->
    <script src="assets/plugins/jqvmap/jquery.vmap.js"></script>
    <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="assets/dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets/dist/js/demo.js"></script> -->

  </body>
    </html>
    <?php
}

// Gambar Profile
function getProfilePicture($userType) {
    include 'config.php';
    $nama = $_SESSION[$userType];
    $query = "SELECT foto FROM user WHERE nama = '$nama'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $pp = $row['foto'];

    $user = isset($_SESSION[$userType])? 'uploads/profiles/'. $_SESSION[$userType]. '/' : '';
    $foto = $pp;

    return array($user, $foto);
}


// Check if there are any Profile directories that don't belong to any user
function deleteUnregisteredDirectories() {
	include ('config.php');
	$directories = glob('uploads/profiles/*', GLOB_ONLYDIR);
	foreach ($directories as $directory) {
		$user_name = basename($directory);
		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$user_name'");
		if (mysqli_num_rows($query) == 0) {
		// Directory doesn't belong to a user, delete it
		$iterator = new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS);
		$files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($files as $file) {
			if ($file->isDir()) {
			rmdir($file->getPathname());
			} else {
			unlink($file->getPathname());
			}
		}
		rmdir($directory);
		}
	}
}


//|============================================================================================|
//|***********************************Fungsi untuk Pembobotan AHP******************************|
//|============================================================================================|


// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut) {
    include ('config.php');
    $query = "SELECT kriteria_id FROM tb_kriteria ORDER BY kriteria_id";
    $result = mysqli_query($koneksi, $query);
    $listID = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return isset($listID[$no_urut]['kriteria_id']) ? $listID[$no_urut]['kriteria_id'] : null;
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut) {
    include ('config.php');
    $query = "SELECT id_karyawan FROM tb_karyawan ORDER BY id_karyawan";
    $result = mysqli_query($koneksi, $query);
    $listID = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return isset($listID[$no_urut]['id_karyawan']) ? $listID[$no_urut]['id_karyawan'] : null;
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
    include ('config.php');
    $query = "SELECT kriteria_nama FROM tb_kriteria ORDER BY kriteria_id";
    $result = mysqli_query($koneksi, $query);
    $nama = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return isset($nama[$no_urut]['kriteria_nama']) ? $nama[$no_urut]['kriteria_nama'] : null;
}

// mencari nama alternatif
function getAlternatifNama($no_urut) {
    include ('config.php');
    $query = "SELECT nama_karyawan FROM tb_karyawan ORDER BY id_karyawan";
    $result = mysqli_query($koneksi, $query);
    $nama = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return isset($nama[$no_urut]['nama_karyawan']) ? $nama[$no_urut]['nama_karyawan'] : null;
}

// mencari nama jabatan
function getAlternatifJabatan($no_urut) {
    include ('config.php');
    $query = "SELECT jabatan FROM tb_karyawan ORDER BY id_karyawan";
    $result = mysqli_query($koneksi, $query);
    $jabatan = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return isset($jabatan[$no_urut]['jabatan']) ? $jabatan[$no_urut]['jabatan'] : null;
}

// mencari priority vector alternatif
function getAlternatifPV($id_karyawan, $id_kriteria)
{
	include ('config.php');
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
	include ('config.php');
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
	include ('config.php');
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
	include ('config.php');
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
	include ('config.php');

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
	/* if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	} */


    // delete row where id_kriteria do not have a corresponding kriteria_id in tb_kriteria
    $query = "DELETE FROM tb_pv_kriteria WHERE id_kriteria NOT IN (SELECT kriteria_id FROM tb_kriteria)";
    $result = mysqli_query($koneksi, $query);

}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV($id_karyawan, $id_kriteria, $pv)
{
    include ('config.php');

    $query  = "SELECT * FROM tb_pv_alternatif WHERE id_alternatif = $id_karyawan AND id_kriteria = $id_kriteria";
    $result = mysqli_query($koneksi, $query);

    /* if (!$result) {
        echo "Error bro!!!";
        exit();
    } */

    // jika result kosong maka masukkan data baru
    // jika telah ada maka diupdate
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO tb_pv_alternatif (id_alternatif,id_kriteria,nilai) VALUES ($id_karyawan,$id_kriteria,$pv)";
    } else {
        $query = "UPDATE tb_pv_alternatif SET nilai=$pv WHERE id_alternatif=$id_karyawan AND id_kriteria=$id_kriteria";
    }

    $result = mysqli_query($koneksi, $query);
    /* if (!$result) {
        echo "Gagal memasukkan / update nilai priority vector alternatif";
        exit();
    } */

    // delete row where id_alternatif or id_kriteria do not have a corresponding id_karyawan in tb_karyawan or kriteria_id in tb_kriteria
    $query = "DELETE FROM tb_pv_alternatif WHERE id_alternatif NOT IN (SELECT id_karyawan FROM tb_karyawan) OR id_kriteria NOT IN (SELECT kriteria_id FROM tb_kriteria)";
    $result = mysqli_query($koneksi, $query);

    return $result;
}

// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1, $kriteria2, $nilai)
{
    include ('config.php');

    $id_kriteria1 = getKriteriaID($kriteria1);
    $id_kriteria2 = getKriteriaID($kriteria2);

    $query  = "SELECT * FROM tb_banding_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error!!!";
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

    // delete rows where kriteria1 or kriteria2 do not have a corresponding kriteria_id in tb_kriteria
    $query = "DELETE FROM tb_banding_kriteria WHERE kriteria1 NOT IN (SELECT kriteria_id FROM tb_kriteria) OR kriteria2 NOT IN (SELECT kriteria_id FROM tb_kriteria)";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error!!!";
        exit();
    }
}

// memasukkan bobot nilai Perbandingan Karyawan
function inputDataPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding, $nilai)
{
    include ('config.php');

    $id_alternatif1 = getAlternatifID($alternatif1);
    $id_alternatif2 = getAlternatifID($alternatif2);
    $id_pembanding  = getKriteriaID($pembanding);

    $query  = "SELECT * FROM tb_banding_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error!!!";
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

    // delete rows where alternatif1 or alternatif2 do not have a corresponding id_karyawan in tb_karyawan or pembanding do not have corresponding kriteria_id from tb_kriteria
    $query = "DELETE FROM tb_banding_alternatif WHERE alternatif1 NOT IN (SELECT id_karyawan FROM tb_karyawan) OR alternatif2 NOT IN (SELECT id_karyawan FROM tb_karyawan) OR pembanding NOT IN (SELECT kriteria_id FROM tb_kriteria)";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error!!!";
        exit();
    }
}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
{
	include ('config.php');

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
	include ('config.php');
	error_reporting(0);
	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);

	$query  = "SELECT nilai FROM tb_banding_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $pembanding";
	$result = mysqli_query($koneksi, $query);

	/* if (!$result) {
		echo "Error!!!";
		exit();
	} */
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
	include ('config.php');
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
	include ('config.php');

	$query = "SELECT nilai FROM tb_pv_kriteria WHERE id_kriteria=(SELECT kriteria_id FROM tb_kriteria WHERE kriteria_id=$id_kriteria)";
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

function getEVAlternatif($id_alternatif, $kriteria_id)
{
    include ('config.php');

    $query = "SELECT nilai FROM tb_pv_alternatif WHERE id_alternatif=(SELECT id_karyawan FROM tb_karyawan WHERE id_karyawan=$id_alternatif) AND id_kriteria=(SELECT kriteria_id FROM tb_kriteria WHERE kriteria_id=$kriteria_id)";
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

// List opsi pilihan tabel perbandingan
function TablePerbandingan($pilihan, $edit_pilihan, $idi, $urut, $x, $y) {
    $options = [
        1 => ["label" => "1. Sama penting dengan", "value" => 1],
        2 => ["label" => "2. Sama hingga sedikit lebih penting", "value" => 0.5],
        3 => ["label" => "3. Sedikit lebih penting", "value" => 0.333333],
        4 => ["label" => "4. Sedikit lebih hingga jelas lebih penting", "value" => 0.25],
        5 => ["label" => "5. Jelas lebih penting", "value" => 0.2],
        6 => ["label" => "6. Jelas hingga sangat jelas lebih penting", "value" => 0.166667],
        7 => ["label" => "7. Sangat jelas lebih penting", "value" => 0.142857],
        8 => ["label" => "8. Sangat jelas hingga mutlak lebih penting", "value" => 0.125],
        9 => ["label" => "9. Mutlak lebih penting", "value" => 0.111111],
    ];
    $is_checked = array_search($edit_pilihan[$idi], array_column($options, 'value')) === false ? '1' : '2';
    ?>

	<div class="row border-bottom mb-3">
		<div class="col-sm-3 col-lg-3">
			<div class="form-group">
				<input name="pilih<?= $urut?>" value="1" class="hidden radio-primary" type="radio" <?= ($is_checked == "1")? "checked" : ""?>>
				<label><?= $pilihan[$x]?></label>
			</div>
		</div>
		<div class="col-sm-3 col-lg-3">
			<div class="form-group">
				<input name="pilih<?= $urut?>" value="2" class="hidden radio-primary" type="radio" <?= ($is_checked == "2")? "checked" : ""?>>
				<label><?= $pilihan[$y]?></label>
			</div>
		</div>
		<div class="col-sm-3 col-lg-5">
			<div class="form-group">
				<select class="form-control" name="bobot<?= $urut?>">
					<?php
						foreach ($options as $value => $option) {
							$selected = ($edit_pilihan[$idi] == $option["value"] || $edit_pilihan[$idi] == $value)? "selected" : "";
							echo "<option value=\"$value\" $selected>{$option['label']}</option>";
						}
				?>
				</select>
			</div>
		</div>
	</div>
    <?php
}

// menampilkan tabel perbandingan bobot kriteria atau bobot alternatif
function showTabelPerbandingan($jenis, $jenis_perbandingan)
{
    include ('config.php');

    if ($jenis_perbandingan == 'bobot_kriteria') {
        $query = "SELECT kriteria_nama FROM tb_kriteria ORDER BY kriteria_id";
        $hasil = "SELECT nilai FROM tb_banding_kriteria";
    } elseif ($jenis_perbandingan == 'bobot_alternatif') {
        $query = "SELECT nama_karyawan FROM tb_karyawan ORDER BY id_karyawan";
        $hasil = "SELECT nilai FROM tb_banding_alternatif WHERE pembanding=$jenis";
    } else {
        echo "Error: invalid jenis_perbandingan parameter.";
        exit();
    }

    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Error koneksi database!!!";
        exit();
    }

    // buat list nama pilihan
    while ($row = mysqli_fetch_array($result)) {
        $pilihan[] = $row[0];
    }

    $result1 = mysqli_query($koneksi, $hasil);
    while ($row1 = mysqli_fetch_array($result1)) {
        $edit_pilihan[] = $row1['nilai'];
    }

    $n = ($jenis_perbandingan == 'bobot_kriteria') ? getJumlahKriteria() : getJumlahAlternatif();
?>
    <form class="ui form" action="page/pembobotan/proses.php" method="post">
        <?php
        $urut = 0;
        $idi = 0;

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                TablePerbandingan($pilihan, $edit_pilihan, $idi, $urut, $x, $y);
                $idi++;
            }
        }
        ?>

        <input type="text" name="jenis" value="<?= $jenis ?>" hidden>
        <input class="btn btn-success" type="submit" name="submit" value="SUBMIT" style="margin-left: 59%;">
    </form>
<?php
} ?>
