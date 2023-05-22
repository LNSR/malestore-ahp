<?php
// error_reporting(E_ALL & ~E_WARNING);
include('../../config.php');
include('../../fungsi.php');

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $m    = getJumlahKriteria();

    // jumlah kriteria
    switch ($jenis) {
        case 'kriteria':
            $n = getJumlahKriteria();
            break;
        default:
            $n = getJumlahAlternatif();
            break;
    }

    // memetakan nilai ke dalam bentuk matrik
    // x = baris
    // y = kolom
    $matrik = array();
    $urut     = 0;

    for ($x=0; $x <= ($n-2) ; $x++) {
        for ($y=($x+1); $y <= ($n-1) ; $y++) {
            $urut++;
            $pilih    = "pilih".$urut;
            $bobot     = "bobot".$urut;
            if ($_POST[$pilih] == 1) {
                $matrik[$x][$y] = $_POST[$bobot];
                $matrik[$y][$x] = 1 / $_POST[$bobot];
            } else {
                $matrik[$x][$y] = 1 / $_POST[$bobot];
                $matrik[$y][$x] = $_POST[$bobot];
            }

            switch ($jenis) {
                case 'kriteria':
                    inputDataPerbandinganKriteria($x, $y, $matrik[$x][$y]);
                    break;
                default:
                    inputDataPerbandinganAlternatif($x, $y, ($jenis - 1), $matrik[$x][$y]);
                    break;
            }
        }
    }

    for ($j = 0; $j < $m; $j++) {
        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih    = "pilih".$urut;
                $bobot  = getNilaiPerbandinganAlternatif($x, $y, ($j + 1));
                $matrik[$x][$y] = $bobot;
                $matrik[$y][$x] = 1 / $bobot;
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

            switch ($jenis) {
                case 'kriteria':
                    break;
                default:
                    $id_kriteria  = getKriteriaID($j);
                    $id_alternatif  = getAlternatifID($x);
                    inputAlternatifPV($id_alternatif, $id_kriteria, $ev[$x]);
                    break;
            }
            $j + 1;
        }
    }

    switch ($jenis) {
        case 'kriteria':
            header('Location: ../../index.php?page=akriteria');
            break;
        default:
            header('Location: ../../index.php?page=aalternatif');
            break;
    }
}