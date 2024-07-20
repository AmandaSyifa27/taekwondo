<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$db = "taekwondo";

$koneksi = mysqli_connect($localhost,$user,$pass,$db);
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>