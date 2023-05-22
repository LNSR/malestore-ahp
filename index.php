<?php
include('config.php');
include('fungsi.php');
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

// Switch on user type
switch ($userType) {
  case "admin":
      // Code for admin user
      // Include page content
        error_reporting(1);
        $page = $_GET['page'] ?? '';
        $aksi = $_GET['aksi'] ?? '';

        $pages = [
            "datamaster" => ["data", "tambah", "ubah", "hapus"],
            "jabatan" => ["jabatan", "tambah", "ubah", "hapus"],
            "user" => ["user", "tambah", "ubah", "hapus"],
            "kriteria" => ["kriteria", "tambah", "ubah", "hapus"],
            "akriteria" => ["akriteria", "hapus"],
            "aalternatif" => ["aalternatif", "hapus"],
            "perankingan" => ["perankingan", "hapus"],
            "laporan" => ["laporan"],
        ];

        if ($page === "bobot_alternatif" || $page === "bobot_kriteria") {
            $jenis = $_GET['c'] ?? 1;
            include "page/pembobotan/pembobotan.php";
        } elseif (array_key_exists($page, $pages)) {
            $path = "page/$page/" . ($aksi ?: $pages[$page][0]) . ".php";
            include $path;
        } else {
            include "home.php";
        }

      includeFooter();
      break;
  case "karyawan": 
      // Code for karyawan user
      // Include page content
      error_reporting(1);
      $page = $_GET['page'] ?? '';

      $paths = array(
          "perankingan" => "page/perankingan/perankingan.php",
          "" => "home.php"
      );

      include $paths[$page] ?: $paths[""];

      includeFooter();
      break;
}