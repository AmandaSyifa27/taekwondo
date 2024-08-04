<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/tkd.png" rel="icon">
  <title>TKD PEMUDA - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/stylee.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/tkd.png">
        </div>
        <div class="sidebar-brand-text mx-3">PEMUDA</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
        <img src="img/dashboard.png" width="24px" alt="">
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        DATA
      </div>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
          <img src="img/daftar.png" alt="" width="24px">
          <span>Daftar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=data_sabuk">
          <img src="img/sabuk.png" alt="" width="24px">
          <span>Sabuk</span>
        </a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=jadwal">
          <img src="img/jadwal.png" alt="" width="24px">
          <span>Jadwal</span>
        </a>
      </li>      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        ACCOUNT
      </div>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <img width="24px" src="img/login.png" alt="">
          <span>Log In</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_up.php">
          <img width="24px" src="img/sign-up.png" alt="">
          <span>Sign Up</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TAEKWONDO PEMUDA</h1>
          </div>
          <?php
          if (isset($_GET["page"])){
            $page = $_GET["page"];
            switch ($page){
              case "data_sabuk":
                include "data_sabuk_lp.php";
                break;
              case "jadwal":
                include "jadwal.php";
                break;
              default:
                include "404.php";
                break;
            }
          } else {
            include "dashboard.php";
          }
          ?>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">        
        <div class="container my-auto py-2">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - distributed by
              <b><a href="https://www.cic.ac.id/" target="_blank">Universitas Catur Insan Cendekia</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>