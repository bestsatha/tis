<?php
include("config/condb.php");
//require("Logintrue.php");
$mdc_id = $_SESSION["mdc_id"];
$mdc_name = $_SESSION["mdc_name"];
$mdc_surname = $_SESSION["mdc_surname"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$level = $_SESSION["level"];

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/img/logoddu_old.png" alt="บริหารจัดการข้อมูล" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">มหาวิทยาลัยดินแดง</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <!-- <a href="index.php" class="d-block"><?php echo $mdc_name. " ".$mdc_level;?></a> -->
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">DATA CENTER</li>


          <li class="nav-item">
            <a href="menuadmin.php" class="nav-link <?php if($menu=="menuadmin"){echo "active";} ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="faculty.php" class="nav-link <?php if($menu=="faculty"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>คณะ/วิทยาลัย</p>
            </a>
          </li>  

          <li class="nav-item">
            <a href="major.php" class="nav-link <?php if($menu=="major"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>สาขาวิชา</p>
            </a>
          </li>     

          <li class="nav-item">
            <a href="student.php" class="nav-link <?php if($menu=="student"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ข้อมูลนิสิต</p>
            </a>
          </li>

          <!-- <li class="nav-header">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>