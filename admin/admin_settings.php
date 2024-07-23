<?php
include "../koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user = 1");
$row = mysqli_fetch_assoc($data);

$nama_user = $row['nama_user'];
$username = $row['username'];
$password = $row['password'];
$foto = $row['foto'];

if (isset($_POST["edit"])) {
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($_FILES["foto"]["name"])) {
        unlink("../img/" . $row["foto"]);
        $gambar = $_FILES["foto"]["name"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $n_random = rand(1, 999);
        $nama_file = $n_random . "-" . $gambar;
        $path = "../img/" . $nama_file;
        move_uploaded_file($tmp, $path);
    } else {
        $nama_file = $row["foto"];
    }
    $query = "UPDATE tbl_user SET
        nama_user = '$nama_user',
        username = '$username',
        password = '$password',
        foto = '$nama_file'
        WHERE id_user = '1'";

    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Edit User</h5>
                </div>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <img src="../img/<?= $foto; ?>" alt="" id="preview" class="img-thumbnail" width="150px">
                    </div>
                    <div class="custom-file mt-3">
                        <input type="file" name="foto" class="custom-file-input" id="foto" onchange="previewImage(event)">
                        <label for="foto" class="custom-file-label">Upload Foto</label>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $nama_user; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Ganti Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="<?= $password; ?>">
                    </div>
                    <button type="submit" name="edit" class="btn btn-outline-warning btn-block">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('preview');
      output.src = dataURL;
      output.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
</script>
