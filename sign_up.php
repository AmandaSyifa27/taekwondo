
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

</head>

<body class="bg-gradient-login">
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
                    <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <label for="nama_user">Nama</label>
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Nama" name="nama_user" require>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Username" name="username" require>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" require>
                    </div> 
                    <div class="form-group">
                      <button type="submit" name="sign-up" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                    <hr>                    
                  </form>
                  
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Log In</a>
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

<?php

require "koneksi.php";

if(isset($_POST['sign-up'])){
  $nama_user = $_POST['nama_user'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = 'user';

  $query = "INSERT INTO tbl_user(`nama_user`, `username`, `password`, `status`) VALUES('$nama_user', '$username', '$password','$status')";
  $result = mysqli_query($koneksi, $query);
  if($result){
    echo "<script>alert('Sign Up Berhasil');</script>";
    echo "<script>window.location.href = 'user/index.php';</script>";
} else {
    echo "<script>alert('Sign Up Gagal');</script>";
    // echo "<script>window.location.href = 'index.php?';</script>";        
}
}

?>