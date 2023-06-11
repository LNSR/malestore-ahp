<?php

// Include the configuration file
include ('config.php');

// Define the available pages with their titles, parameters, functions, and arguments
$pages = array(
  'bobot_alternatif' => array(
    'title' => 'Perbandingan Karyawan &rarr; '. getKriteriaNama($jenis - 1),
    'params' => array('c'),
    'function' => 'showTabelPerbandingan',
    'args' => array(null, 'tb_karyawan')
  ),
  'bobot_kriteria' => array(
    'title' => 'Perbandingan Kriteria(Pilih yang lebih penting)',
    'params' => array(),
    'function' => 'showTabelPerbandingan',
    'args' => array('kriteria', 'tb_kriteria')
  )
);

// Get the requested page's information from the $pages array
$page = isset($_GET['page']) && array_key_exists($_GET['page'], $pages)? $_GET['page'] : null;

// Output the HTML for the page header
echo '<section class="content">
        <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">'. $pages[$page]['title']. '</h3>
              </div>
              <div class="card-body">';

// Get the requested page's parameters and arguments
$params = array();
foreach ($pages[$page]['params'] as $param) {
  $params[] = isset($_GET[$param])? $_GET[$param] : null;
}
$args = array_merge($params, $pages[$page]['args']);

// Call the requested page's function with the provided arguments
call_user_func_array($pages[$page]['function'], $args);

// Output the HTML for the page footer
echo '</div>
          </div>
        </div>
      </section>';

?>