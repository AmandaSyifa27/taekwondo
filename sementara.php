
<div class="col-lg-8 ">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambahkan Anggota</h6>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="tingkatan">Tingkatan</label>
                      <input name="tingkatan" type="text" class="form-control" id="tingkatan" placeholder="Masukkan Tingkat Sabuk">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jurus">Jurus</label>
                                <input name="jurus" type="text" class="form-control" id="jurus" placeholder="Masukkan jurus">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jangka_waktu">Jangka Waktu</label>
                                <input name="jangka_waktu" type="text" class="form-control" id="jangka_waktu" placeholder="jangka waktu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="usia_minimal">Usia Minimal</label>
                                <input name="usia_minimal" type="text" class="form-control" id="usia_minimal" placeholder="usia minimal">
                            </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="warna" class="custom-file-input" id="warna">
                        <label class="custom-file-label" for="warna">Upload Foto Sabuk</label>
                      </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </form>
                </div>
</div>

<?php

require "../koneksi.php";

if (isset($_POST["tambah"])){
    $tingkatan = $_POST["tingkatan"];
    $jurus = $_POST["jurus"];
    $jangka_waktu = $_POST["jangka_waktu"];
    $usia_minimal = $_POST["usia_minimal"];

    // Foto
    $nama = $_FILES['warna']['name'];
    $lokasi = $_FILES['warna']['tmp_name'];
    $n_random = rand(1,999);
    $nama_file = $n_random. "-".$nama;
    $folder = 'foto_sabuk';

    // upload file
    move_uploaded_file($lokasi, "$folder/$nama_file");

    $query = "INSERT INTO tbl_sabuk (`tingkatan`, `jurus`, `jangka_waktu`, `usia_minimal`, `warna`) VALUES('$tingkatan','$jurus','$jangka_waktu','$usia_minimal', '$nama_file')";

    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>alert('Data berhasil ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=data_sabuk';</script>";
    } else {
        echo "<script>alert('Data Gagal ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=sementara';</script>";        
    }
}

?>