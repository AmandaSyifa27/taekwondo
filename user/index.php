<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['username']) || $_SESSION['status'] != 'user'){
    echo "<script language='Javascript'>
    alert('Anda tidak memiliki akses ke halaman ini!');
    document.location='../index.php';
    </script>";
    exit;
}
$id_user = $_SESSION['id_user'];
$query = "SELECT * FROM tbl_user WHERE id_user = $id_user";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $foto = $row['foto'];
    $nama_user = $row['nama_user'];
} else {
    echo "gagal";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/tkd.png" rel="icon">
  <title>TKD PEMUDA - Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="../img/tkd.png">
        </div>
        <div class="sidebar-brand-text mx-3">PEMUDA</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
        <img src="../img/dashboard.png" width="24px" alt="">
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        DATA
      </div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=data_pelatih">
          <img src="../img/pelatiw.png" alt="" width="24px">
          <span>Pelatih</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=data_sabuk">
          <img src="../img/sabuk.png" alt="" width="24px">
          <span>Sabuk</span>
        </a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=jadwal">
          <img src="../img/jadwal.png" alt="" width="24px">
          <span>Jadwal</span>
        </a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=add_anggota">
          <img src="../img/daftar.png" alt="" width="24px">
          <span>Daftar</span>
        </a>
      </li>  
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        ACCOUNT
      </div>
      <li class="nav-item">
        <a class="nav-link" href="../sign_up.php">
          <img width="24px" src="../img/sign-up.png" alt="">
          <span>Sign Up</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <img width="24px" src="../img/logout.png" alt="">
          <span>Log Out</span>
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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="foto_user/<?= $foto; ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $nama_user; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?page=user_settings">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
            </li>
          </ul>
        </nav>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TAEKWONDO PEMUDA</h1>
          </div>
          <?php
          if (isset($_GET["page"])){
            $page = $_GET["page"];
            switch ($page){
              case "data_pelatih":
                include "data_pelatih.php";
                break;
              case "data_sabuk":
                include "../data_sabuk.php";
                break;
              case "jadwal":
                include "../jadwal.php";
                break;
              case "add_anggota":
                include "add_anggota.php";
                break;
              case "user_settings":
                include "user_settings.php";
                break;
              default:
                include "../404.php";
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
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>

        <div class="container my-auto py-2">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - distributed by
              <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
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

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>  
</body>

</html>