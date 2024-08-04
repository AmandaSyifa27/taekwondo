<?php
include '../koneksi.php';

if(isset($_POST['id_anggota'])){
    $success = true; 
    foreach($_POST['id_anggota'] as $id){
        
        $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_anggota WHERE id_anggota = $id");
        $data = mysqli_fetch_array($sql1);
        $file = $data['foto'];
        
        $delete = "DELETE FROM tbl_anggota WHERE id_anggota = ?";
        $proses = $koneksi->prepare($delete);
        $proses->bind_param("i", $id); 
        $result = $proses->execute();
        
        if(!$result){
            $success = false; 
            break; 
        }
        
        unlink("../foto_anggota/".$file);
    }
    
    if($success){
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
    
    echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
}
elseif(isset($_POST['id_pelatih'])){
    $success = true; 
    foreach($_POST['id_pelatih'] as $id){
        $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih WHERE id_pelatih = $id");
        $data = mysqli_fetch_array($sql1);
        $file = $data['foto'];
        
        $delete = "DELETE FROM tbl_pelatih WHERE id_pelatih = ?";
        $proses = $koneksi->prepare($delete);
        $proses->bind_param("i", $id); 
        $result = $proses->execute(); 
        
        if(!$result){
            $success = false; 
            break; 
        }
        
        unlink("foto_pelatih/".$file);
    }
    
    if($success){
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
    
    echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
} elseif(isset($_POST['id_tagihan'])){
    $success = true; 
    foreach($_POST['id_tagihan'] as $id){
        $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_tagihan WHERE id_tagihan = $id");
        $data = mysqli_fetch_array($sql1);
        
        $delete = "DELETE FROM tbl_tagihan WHERE id_tagihan = ?";
        $proses = $koneksi->prepare($delete);
        $proses->bind_param("i", $id); 
        $result = $proses->execute(); 
     
        if(!$result){
            $success = false; 
            break; 
        }
        
    }
    
    if($success){
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
    
    echo "<script>window.location.href = 'index.php?page=data_tagihan';</script>";
}
?>
