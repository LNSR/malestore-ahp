<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Date and Logout Button -->
    <li class="nav-item dropdown">
      <div style="color: black; padding: 10px 0px 5px 40px; float: right; font-size: 16px;">
        <div align="text-center">
          <!-- Display current date -->
          <span>
            <?php
              $array_hr = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
              $hr = $array_hr[date('N')];
              $tgl = date('j');
              $array_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
              $bln = $array_bln[date('n')];
              $thn = date('Y');
              echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
            ?>
          </span>

          &nbsp;
          <!-- Display logout button if user is logged in -->
          <?php
          if(isset($_SESSION['admin']) || isset($_SESSION['karyawan'])) {
          ?>
              <a href="logout.php" class="btn btn-danger">Logout</a>
          <?php
          }
          ?>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item"></a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"></a>
          </div>
        </div>
      </div>
    </li>

    <!-- Control Sidebar Button -->
    <li class="nav-item" style="padding: 10px 0px 5px 0px;float: right;font-size: 16px;">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
    </li>
  </ul>
</nav>