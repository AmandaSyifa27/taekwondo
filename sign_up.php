<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/tkd.png" rel="icon">
  <title>TAEKWONDO PEMUDA - Sign Up</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <style>
    .bg-image {
      /* background-image: url('img/tkd2.jpg'); */
      background-image: url('img/tkd3.jpg');
      height: 100vh;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      opacity: 0.25;
      z-index: -1; /* Ensure background is behind other elements */
    }

    .container-login {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      width: 100%;
      max-width: 500px;
    }
  </style>
</head>

<body class="bg-gradient-login">
  <div class="bg-image"></div>

  <!-- Login Content -->
  <div class="container-login">
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="login-form">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
              </div>
              <form class="user" method="POST">
                <div class="form-group">
                  <label for="nama_user">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Lengkap" name="nama_user" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
                </div> 
                <div class="form-group">
                  <button type="submit" name="sign-up" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                <hr>                    
              </form>
              
              <div class="text-center">
                <a class="font-weight-bold small" href="login.php">Log In</a>
              </div>
              <div class="text-center">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>


<?php
require "koneksi.php";
session_start();

if(isset($_POST['sign-up'])){
  $nama_user = $_POST['nama_user'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = 'user';

  $query = "INSERT INTO tbl_user(`nama_user`, `username`, `password`, `status`) VALUES('$nama_user', '$username', '$password','$status')";
  $result = mysqli_query($koneksi, $query);

  if($result){
    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['status'] = $status;

    echo "<script>alert('Sign Up Berhasil');</script>";
    echo "<script>window.location.href = 'user/index.php';</script>";
  } else {
    echo "<script>alert('Sign Up Gagal');</script>";
    // echo "<script>window.location.href = 'index.php';</script>";        
  }
}
?>
