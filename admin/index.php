<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['username']) || $_SESSION['status'] != 'admin'){
    echo "<script language='Javascript'>
    alert('Anda tidak memiliki akses ke halaman ini!');
    document.location='../index.php';
    </script>";
    exit;
}
$query = "SELECT * FROM tbl_user WHERE id_user = 1";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_admin = $row['nama_user'];
    $foto = $row['foto'];
} else {
    $nama_admin = "gada";
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
  <link href="../css/stylee.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePelatih" aria-expanded="true"
          aria-controls="collapsePelatih">
          <img src="../img/pelatiw.png" alt="" width="24px">
          <span>Pelatih</span>
        </a>
        <div id="collapsePelatih" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pelatih</h6>
            <a class="collapse-item" href="index.php?page=data_pelatih">Data Pelatih</a>
            <a class="collapse-item" href="index.php?page=add_pelatih">Tambah Pelatih</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="true"
          aria-controls="collapseAnggota">
          <img src="../img/anggota.png" alt="" width="24px">
          <span>Anggota</span>
        </a>
        <div id="collapseAnggota" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Anggota</h6>
            <a class="collapse-item" href="index.php?page=data_anggota">Data Anggota</a>
            <a class="collapse-item" href="index.php?page=add_anggota">Tambah anggota</a>
          </div>
        </div>
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
        <a class="nav-link" href="index.php?page=data_tagihan">
          <img src="../img/tagihan.png" alt="" width="24px">
          <span>Tagihan</span>
        </a>
      </li>      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        ACCOUNT
      </div>
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
                <img class="img-profile rounded-circle" src="../img/<?= $foto; ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $nama_admin; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?page=admin_settings">
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
              case "data_anggota":
                include "data_anggota.php";
                break;
              case "add_anggota":
                include "add_anggota.php";
                break;
              case "edit_anggota":
                include "edit_anggota.php";
                break;
              case "delete_anggota":
                include "delete_anggota.php";
                break;
              case "data_pelatih":
                include "data_pelatih.php";
                break;
              case "add_pelatih":
                include "add_pelatih.php";
                break;
              case "edit_pelatih":
                include "edit_pelatih.php";
                break;
              case "delete_pelatih":
                include "delete_pelatih.php";
                break;
              case "data_sabuk":
                include "../data_sabuk.php";
                break;
              case "data_tagihan":
                include "data_tagihan.php";
                break;
              case "add_tagihan":
                include "add_tagihan.php";
                break;
              case "edit_tagihan":
                include "edit_tagihan.php";
                break;
              case "delete_tagihan":
                include "delete_tagihan.php";
                break;
              case "jadwal":
                include "../jadwal.php";
                break;
              case "multi_delete":
                include "multi_delete.php";
                break;
              case "admin_settings":
                include "admin_settings.php";
                break;
              case "404":
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

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>
  
</body>

</html>