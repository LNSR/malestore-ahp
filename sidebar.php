<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="img/logo.png" alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light"><b>SPK Malestore</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo isset($_SESSION['admin']) ? 'assets/dist/img/avatar5.jpg' : (isset($_SESSION['karyawan']) ? 'assets/dist/img/avatar.png' : 'assets/dist/img/default-avatar.png'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php foreach ($_SESSION as $key => $value) {
          if ($key == 'admin' || $key == 'karyawan') {
            echo "<a href='#' class='d-block'>$value</a>";
          }
        } ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard<i class="right badge badge-danger"></i></p>
                </a>
            </li>

            <?php 
                if(isset($_SESSION['admin'])) { 
            ?>
            <!-- Data Master -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Data Master<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="?page=karyawan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Karyawan</p></a></li>
                    <li class="nav-item"><a href="?page=kriteria" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Kriteria</p></a></li>
                    <li class="nav-item"><a href="?page=jabatan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Jabatan</p></a></li>
                    <li class="nav-item"><a href="?page=user" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Login Pengguna</p></a></li>
                </ul>
            </li>
            <!-- Pembobotan Kriteria -->
            <?php 
                if(isset($_SESSION['admin'])) { 
                    if(getJumlahKriteria() >= 3) { 
            ?>
                        <li class="nav-item"><a href="?page=bobot_kriteria" class="nav-link"><i class="far fa-edit nav-icon"></i><p>Pembobotan Kriteria</p></a></li>
            <?php 
                    } else { 
            ?>
                        <li class="nav-item"><a href="#" class="nav-link" onclick="alert('Tolong isi kriteria minimal 3')"><i class="far fa-edit nav-icon"></i><p>Pembobotan Kriteria</p></a></li>
            <?php 
                    } 
                } 
            ?>
            <!-- Pembobotan Karyawan -->
            <?php 
                if(isset($_SESSION['admin'])) { 
                    if(getJumlahAlternatif() >= 2 && getJumlahKriteria() >= 3) { 
            ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Pembobotan Karyawan<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php 
                                    for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) { 
                                ?>
                                        <li class='nav-item'>
                                            <a class='nav-link' href='?page=bobot_alternatif&c=<?php echo ($i + 1); ?>'>
                                                <i class='nav-icon far fa-circle'></i><?php echo getKriteriaNama($i); ?>
                                            </a>
                                        </li>
                                <?php } ?>
                            </ul>
                        </li>
            <?php 
                    } else { 
            ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="alert('Tolong isi kriteria minimal 3 dan karyawan minimal 2');">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Pembobotan Karyawan</p>
                            </a>
                        </li>
            <?php 
                    } 
                } 
            ?>
            <!-- Data Analisa -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Data Analisa<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="?page=akriteria" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Analisa Kriteria</p></a></li>
                    <li class="nav-item"><a href="?page=aalternatif" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Analisa Karyawan</p></a></li>
                    <li class="nav-item"><a href="?page=perankingan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Perankingan</p></a></li>
                    <li class="nav-item"><a href="?page=laporan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Laporan</p></a></li>
                </ul>
            </li>
            <?php 
                } else if(isset($_SESSION['karyawan'])) { 
            ?>
            <!-- Perankingan -->
            <li class="nav-item">
                <a href="?page=perankingan" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Perankingan<i class="right badge badge-danger"></i></p>
                </a>
            </li>
            <?php 
                } 
            ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>