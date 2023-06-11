<?php
require('config.php');
require('fungsi.php');
session_start();

// Check user type and redirect to login page if not logged in
if (!isset($_SESSION['admin']) && !isset($_SESSION['karyawan'])) {
    header("location:login.php");
    exit;
}

// Check user type and include common header and navbar
if (isset($_SESSION['admin'])) {
    $userType = "admin";
    includeHeaderAndNav($userType);
} elseif (isset($_SESSION['karyawan'])) {
    $userType = "karyawan";
    includeHeaderAndNav($userType);
}

switch ($userType) {
  case "admin":
    // Code for admin user
    error_reporting(1);
    $page = $_GET['page']?? '';
    $aksi = $_GET['aksi']?? '';

    $pages = [
      "karyawan" => ["karyawan", "tambah", "ubah", "hapus"],
      "jabatan" => ["jabatan", "tambah", "ubah", "hapus"],
      "user" => ["user", "tambah", "ubah", "hapus"],
      "kriteria" => ["kriteria", "tambah", "ubah", "hapus"],
      "akriteria" => ["akriteria", "hapus"],
      "aalternatif" => ["aalternatif", "hapus"],
      "perankingan" => ["perankingan", "hapus"],
      "laporan" => ["laporan"],
    ];

    $pageContent = "home.php";

    if (array_key_exists($page, $pages)) {
      $pageContent = "page/$page/". ($aksi?: $pages[$page][0]). ".php";
    } elseif ($page === "bobot_alternatif" || $page === "bobot_kriteria") {
      $jenis = $_GET['c']?? 1;
      $pageContent = "page/pembobotan/pembobotan.php";
    }

    include $pageContent;
    includeFooter();
    break;

  case "karyawan":
    // Code for karyawan user
    error_reporting(1);
    $page = $_GET['page']?? '';
    $aksi = $_GET['aksi']?? '';

    $pages = [
      "user" => ["user", "tambah", "ubah", "hapus"],
      "perankingan" => ["perankingan"],
    ];

    $pageContent = "home.php";

    if (array_key_exists($page, $pages)) {
      $pageContent = "page/$page/". ($aksi?: $pages[$page][0]). ".php";
    }

    include $pageContent;
    includeFooter();
    break;
}