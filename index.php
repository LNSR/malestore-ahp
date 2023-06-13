<?php
include('config.php');
include('fungsi.php');
session_start();

// Check user type and redirect to login page if not logged in
$userTypes = ['admin', 'karyawan'];
$userType = isset($_SESSION['admin'])? 'admin' : (isset($_SESSION['karyawan'])? 'karyawan' : null);

if (!$userType) {
    header("location:login.php");
    exit;
}

// Include common header and footer
includeHeaderAndNav($userType);
$page = $_GET['page']?? '';
$aksi = $_GET['aksi']?? $_GET['c']?? '';

switch ($userType) {
  case "admin":
    // Code for admin user
    error_reporting(1);
    
    $pages = [
      "karyawan" => ["karyawan", "tambah", "ubah", "hapus"],
      "jabatan" => ["jabatan", "tambah", "ubah", "hapus"],
      "user" => ["user", "tambah", "ubah", "hapus"],
      "kriteria" => ["kriteria", "tambah", "ubah", "hapus"],
      "akriteria" => ["akriteria", "hapus"],
      "aalternatif" => ["aalternatif", "hapus"],
      "perankingan" => ["perankingan", "hapus"],
      "laporan" => ["laporan", "print"],
    ];
    
    $pageContent = "home.php";
    
    if (array_key_exists($page, $pages)) {
      $pageContent = "page/$page/". ($aksi?: $pages[$page][0]). ".php";
    } elseif ($page === "bobot_alternatif" || $page === "bobot_kriteria") {
      $jenis = $_GET['c']?? 1;
      $pageContent = "page/pembobotan/pembobotan.php";
    }
    
    include $pageContent;
    break;

  case "karyawan":
    // Code for karyawan user
    error_reporting(1);

    $pages = [
      "user" => ["user", "tambah", "ubah", "hapus"],
      "perankingan" => ["perankingan"],
    ];

    $pageContent = "home.php";

    if (array_key_exists($page, $pages)) {
      $pageContent = "page/$page/". ($aksi?: $pages[$page][0]). ".php";
    }

    include $pageContent;
    break;
}

// Include Footer
includeFooter();