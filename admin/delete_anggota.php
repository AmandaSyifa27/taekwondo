<?php
require '../koneksi.php';
// Ambil data
$id = $_GET['id'];
$mysqli = mysqli_query($koneksi,"SELECT * FROM tbl_anggota WHERE id_anggota=$id");
$data = mysqli_fetch_array($mysqli);
$query = "DELETE FROM tbl_anggota WHERE id_anggota = '$id'";
$result = mysqli_query($koneksi, $query);

unlink('../foto_anggota/'.$data['foto']);
// Alert
if ($result) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
    echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
}