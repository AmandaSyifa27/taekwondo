<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "koneksi.php";
    $user = $_POST["username"];
    $password = $_POST["password"];
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$user' AND password='$password'");
    $row = mysqli_num_rows($sql);

    if ($row > 0) {
        $login = mysqli_fetch_array($sql);
        session_start();
        $_SESSION['username'] = $login['username'];
        $_SESSION['status'] = $login['status'];
        $_SESSION['id_user'] = $login['id_user'];

        if ($login['status'] == 'admin') {
            echo "<script language='Javascript'>
                alert('Login Sebagai Admin Berhasil..!');
                document.location='admin/index.php';
                </script>";
        } elseif ($login['status'] == 'user') {
            echo "<script language='Javascript'>
                alert('Login Sebagai User Berhasil..!');
                document.location='user/index.php';
                </script>";
        }
    } else {
        echo "<script language='Javascript'>
            alert('Username atau Password Salah');
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
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  
  <style>
    .bg-image {
      background-image: url('img/tkd1.jpg');
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
                <h1 class="h4 text-gray-900 mb-4">Login</h1>
              </div>
              <form class="user" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
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
  <!-- Login Content -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
