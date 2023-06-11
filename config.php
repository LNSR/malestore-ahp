<?php
global $koneksi;
$koneksi = mysqli_connect('localhost', 'root', '', 'malestore') or die("Koneksi error");