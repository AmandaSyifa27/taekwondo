<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  include "koneksi.php";
  $user = $_POST["username"];
  $password = $_POST["password"];
  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$user' AND password='$password'" );
  $row = mysqli_num_rows($sql);

  if($row > 0){
    $login = mysqli_fetch_array($sql);
    session_start();
    $_SESSION['username'] = $login['username'];
    $_SESSION['status'] = $login['status'];

    if($login['status'] == 'admin'){
      echo "<script language='Javascript'>
        alert('Login Sebagai Admin Berhasil..!');
        document.location='admin/index.php';
        </script>";
    } elseif($login['status'] == 'user'){
      echo "<script language='Javascript'>
        alert('Login Sebagai User Berhasil..!');
        document.location='user/index.php';
        </script>";
    }
  } else {
    echo "<script language='Javascript'>
      alert('Username dan Password Salah');
      document.location='login.php';
      </script>";
  }
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
  <link href="img/tkd.png" rel="icon">
  <title>TKD PEMUDA - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" >
  <div class="bg-image" style="background-image: url(img/tkd-bg.jfif); height: 100vh; opacity: .25; background-repeat: no-repeat;">
  </div>
  <!-- <img src="img/tkd-bg.jfif" class="bg-image opacity-25%" alt=""> -->
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Username" name="username" require>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" require>
                    </div> 
                    <div class="form-group">
                      <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>                    
                  </form>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="sign_up.php">Buat Akun</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
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