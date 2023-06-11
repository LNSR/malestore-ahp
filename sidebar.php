<!-- Main Sidebar Container -->
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
            <?php
            if (isset($_SESSION[$userType])) {
                $user = 'uploads/profiles/' . $_SESSION[$userType];
                $foto = isset($_SESSION['foto']) ? '/' . $_SESSION['foto'] : '';
            } else {
                $user = '';
                $foto = 'assets/dist/img/avatar.png';
            }

            if (!isset($_SESSION['foto'])) {
                $user = '';
                $foto = 'assets/dist/img/avatar.png';
            }
            ?>
            <img src="<?php echo $user;?><?php echo $foto;?>" class="img-circle elevation-2" alt="User Image">    
        </div>
        <div class="info">
            <?php
                if ($userType == 'admin' || $userType == 'karyawan') {
                echo "<a href='#' class='d-block'>" . $_SESSION[$userType] . "</a>";
                }
            ?>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item <?php echo ($page == '' ? 'menu-open' : ''); ?>">
                <a href="index.php" class="nav-link <?php echo ($page == '' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard<i class="right badge badge-danger"></i></p>
                </a>
            </li>

            <?php if($userType == "admin") { ?>
            <!-- Data Master -->
            <li class="nav-item has-treeview <?php echo ($page == 'karyawan' || $page == 'jabatan' || $page == 'user' || $page == 'kriteria' ? 'menu-open' : ''); ?>">
                <a href="#" class="nav-link <?php echo ($page == 'karyawan' || $page == 'jabatan' || $page == 'user' || $page == 'kriteria' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Data Master<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item <?php echo ($page == 'karyawan' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=karyawan" class="nav-link <?php echo ($page == 'karyawan' && $aksi == $_GET['aksi'] ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Data Karyawan</p></a></li>
                    <li class="nav-item <?php echo ($page == 'kriteria' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=kriteria" class="nav-link <?php echo ($page == 'kriteria' && $aksi == $_GET['aksi'] ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Data Kriteria</p></a></li>
                    <li class="nav-item <?php echo ($page == 'jabatan' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=jabatan" class="nav-link <?php echo ($page == 'jabatan' && $aksi == $_GET['aksi'] ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Data Jabatan</p></a></li>
                    <li class="nav-item <?php echo ($page == 'user' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=user" class="nav-link <?php echo ($page == 'user' && $aksi == $_GET['aksi'] ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Data Login Pengguna</p></a></li>
                </ul>
            </li>
            <!-- Pembobotan Kriteria -->
            <?php if($userType == "admin" && getJumlahKriteria() >= 3) { ?>
                <li class="nav-item <?php echo ($page == 'bobot_kriteria' ? 'menu-open' : ''); ?>"><a href="?page=bobot_kriteria" class="nav-link <?php echo ($page == 'bobot_kriteria' ? 'active' : ''); ?>"><i class="far fa-edit nav-icon"></i><p>Pembobotan Kriteria</p></a></li>
            <?php } else if($userType == "admin") { ?>
                <li class="nav-item"><a href="#" class="nav-link" onclick="alert('Tolong isi kriteria minimal 3')"><i class="far fa-edit nav-icon"></i><p>Pembobotan Kriteria</p></a></li>
            <?php } ?>
            <!-- Pembobotan Karyawan -->
            <?php if($userType == "admin" && getJumlahAlternatif() >= 2 && getJumlahKriteria() >= 3) { ?>
                <li class="nav-item has-treeview <?php echo ($page == 'bobot_alternatif' ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo ($page == 'bobot_alternatif' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pembobotan Karyawan<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) { ?>
                            <li class='nav-item <?php echo ($page == 'bobot_alternatif' && $aksi == $i+1 ? 'menu-open' : ''); ?>'>
                                <a class='nav-link <?php echo ($page == 'bobot_alternatif' && $aksi == $i+1 ? 'active' : ''); ?>' href='?page=bobot_alternatif&c=<?php echo ($i + 1); ?>'>
                                    <i class='nav-icon far fa-circle'></i><?php echo getKriteriaNama($i); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } else if($userType == "admin") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="alert('Tolong isi kriteria minimal 3 dan karyawan minimal 2');">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pembobotan Karyawan</p>
                    </a>
                </li>
            <?php } ?>
            <!-- Data Analisa -->
            <li class="nav-item has-treeview <?php echo ($page == 'akriteria' || $page == 'aalternatif' || $page == 'perankingan' || $page == 'laporan' ? 'menu-open' : ''); ?>">
                <a href="#" class="nav-link <?php echo ($page == 'akriteria' || $page == 'aalternatif' || $page == 'perankingan' || $page == 'laporan' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Data Analisa<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item <?php echo ($page == 'akriteria' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=akriteria" class="nav-link <?php echo ($page == 'akriteria' && $aksi == '' ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Analisa Kriteria</p></a></li>
                    <li class="nav-item <?php echo ($page == 'aalternatif' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=aalternatif" class="nav-link <?php echo ($page == 'aalternatif' && $aksi == '' ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Analisa Karyawan</p></a></li>
                    <li class="nav-item <?php echo ($page == 'perankingan' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=perankingan" class="nav-link <?php echo ($page == 'perankingan' && $aksi == '' ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Perankingan</p></a></li>
                    <li class="nav-item <?php echo ($page == 'laporan' && $aksi == '' ? 'menu-open' : ''); ?>"><a href="?page=laporan" class="nav-link <?php echo ($page == 'laporan' && $aksi == '' ? 'active' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Laporan</p></a></li>
                </ul>
            </li>
            <?php } else if($userType == "karyawan") { ?>
            <!-- Profil Pengguna -->
            <li class="nav-item <?php echo ($page == 'user' && $aksi == '' ? 'menu-open' : ''); ?>">
                <a href="?page=user" class="nav-link <?php echo ($page == 'user' && $aksi == '' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Profil<i class="right badge badge-danger"></i></p>
                </a>
            </li>
            <!-- Perankingan -->
            <li class="nav-item <?php echo ($page == 'perankingan' && $aksi == '' ? 'menu-open' : ''); ?>">
                <a href="?page=perankingan" class="nav-link <?php echo ($page == 'perankingan' && $aksi == '' ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Perankingan<i class="right badge badge-danger"></i></p>
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>