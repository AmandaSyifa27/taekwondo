<?php
require "koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = "SELECT * FROM tbl_user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "taken"; // Username sudah ada
    } else {
        echo "available"; // Username tersedia
    }
}
?>
