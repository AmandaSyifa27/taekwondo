<?php
require '../koneksi.php';
// Ambil data
$id = $_GET['id'];
$mysqli = mysqli_query($koneksi,"SELECT * FROM tbl_pelatih WHERE id_pelatih=$id");
$data = mysqli_fetch_array($mysqli);
$query = "DELETE FROM tbl_pelatih WHERE id_pelatih = '$id'";
$result = mysqli_query($koneksi, $query);

unlink('foto_pelatih/'.$data['foto']);
// Alert
if ($result) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
    echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
}