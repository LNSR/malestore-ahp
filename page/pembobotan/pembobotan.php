<?php

// Include the configuration file
include('../../config.php');

// Define the available pages with their titles, parameters, functions, and arguments
$pages = array(
  'bobot_alternatif' => array(
    'title' => 'Perbandingan Karyawan &rarr; ' . getKriteriaNama($jenis - 1),
    'params' => array('c'),
    'function' => 'showTabelPerbandingan2',
    'args' => array('tb_karyawan')
  ),
  'bobot_kriteria' => array(
    'title' => 'Perbandingan Kriteria(Pilih yang lebih penting)',
    'params' => array(),
    'function' => 'showTabelPerbandingan',
    'args' => array('kriteria', 'tb_kriteria')
  )
);

// Check if the requested page exists in the $pages array
if (array_key_exists($_GET['page'], $pages)) {

  // Get the page information for the requested page
  $page_info = $pages[$_GET['page']];

  // Output the HTML for the page header
  echo '<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">'.$page_info['title'].'</h3>
        </div>
        <div class="card-body">';

  // Get the requested page's parameters and arguments
  $params = array();
  foreach ($page_info['params'] as $param) {
    $params[] = $_GET[$param];
  }
  $args = array_merge($params, $page_info['args']);

  // Call the requested page's function with the provided arguments
  call_user_func_array($page_info['function'], $args);

  // Output the HTML for the page footer
  echo '</div>
    </div>
    </section>';
} else {
  // Output an error message if the requested page does not exist
  echo 'Invalid page';
}

?>