<?php
include '../koneksi.php';

if(isset($_POST['id_anggota'])){
    $success = true; // Inisialisasi variabel untuk menandai keberhasilan operasi
    foreach($_POST['id_anggota'] as $id){
        // Ambil nama file foto
        $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_anggota WHERE id_anggota = $id");
        $data = mysqli_fetch_array($sql1);
        $file = $data['foto'];
        
        // Hapus record dari database menggunakan prepared statement
        $delete = "DELETE FROM tbl_anggota WHERE id_anggota = ?";
        $proses = $koneksi->prepare($delete);
        $proses->bind_param("i", $id); // Mengikat parameter sebagai integer
        $result = $proses->execute(); // Eksekusi query dan simpan hasilnya
        
        // Periksa apakah operasi penghapusan berhasil
        if(!$result){
            $success = false; // Jika ada satu pun operasi yang gagal, ubah status keberhasilan menjadi false
            break; // Keluar dari loop, karena tidak perlu melanjutkan operasi jika sudah terjadi kegagalan
        }
        
        // Hapus file setelah record dihapus
        unlink("foto_anggota/".$file);
    }
    
    // Tampilkan alert berdasarkan hasil operasi
    if($success){
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
    
    // Redirect setelah menampilkan alert
    echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
}
elseif(isset($_POST['id_pelatih'])){
    $success = true; // Inisialisasi variabel untuk menandai keberhasilan operasi
    foreach($_POST['id_pelatih'] as $id){
        // Ambil nama file foto
        $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih WHERE id_pelatih = $id");
        $data = mysqli_fetch_array($sql1);
        $file = $data['foto'];
        
        // Hapus record dari database menggunakan prepared statement
        $delete = "DELETE FROM tbl_pelatih WHERE id_pelatih = ?";
        $proses = $koneksi->prepare($delete);
        $proses->bind_param("i", $id); // Mengikat parameter sebagai integer
        $result = $proses->execute(); // Eksekusi query dan simpan hasilnya
        
        // Periksa apakah operasi penghapusan berhasil
        if(!$result){
            $success = false; // Jika ada satu pun operasi yang gagal, ubah status keberhasilan menjadi false
            break; // Keluar dari loop, karena tidak perlu melanjutkan operasi jika sudah terjadi kegagalan
        }
        
        // Hapus file setelah record dihapus
        unlink("foto_pelatih/".$file);
    }
    
    // Tampilkan alert berdasarkan hasil operasi
    if($success){
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
    
    // Redirect setelah menampilkan alert
    echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
}
?>
