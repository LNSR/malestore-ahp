<nav class="main-header navbar navbar-expand">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="dark-mode-toggle">
        <label class="custom-control-label" for="dark-mode-toggle" style="margin-top: 5px;"><span id="dark-mode-toggle-text">Dark Mode</span></label>
        <script>toggleDarkMode();</script>
      </div>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Date and Logout Button -->
    <li class="nav-item dropdown">
        <div align="text-center">
  

          &nbsp;
          <!-- Display logout button if user is logged in -->
          <?php if($userType) {?>
              <a href="logout.php" class="btn btn-danger">Logout</a>
          <?php }?>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item"></a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"></a>
          </div>
        </div>
    </li>


    <!-- Control Sidebar Button -->
    <!-- <li class="nav-item" style="padding: 5px 0px 5px 0px;float: right;font-size: 16px;">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
    </li> -->
  </ul>
</nav>