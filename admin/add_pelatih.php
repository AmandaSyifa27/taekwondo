
<div class="col-lg-8 ">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambahkan Pelatih</h6>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_pelatih">Nama</label>
                      <input name="nama_pelatih" type="text" class="form-control" id="nama_pelatih" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input name="jabatan" type="text" class="form-control" id="jabatan" placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="tingkatan">Tingkat Sabuk</label>
                          <select name="tingkatan" id="" class="form-control mb-3">
                          <option value="">Pilih Tingkatan Sabuk</option>
                            <?php 
                            include '../koneksi.php';
                            $jsArray = "var dtSabuk = new Array();\n";
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_sabuk");
                            while($row = mysqli_fetch_array($data)) {
                                echo "<option value='".$row['id_sabuk']."'>".$row['tingkatan']."</option>";
                                $jsArray .= "dtSabuk['".$row['id_sabuk']."'] = {warna:'".addslashes($row['warna'])."'};\n";
                            }
                            ?>
                          </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="foto">Upload Foto</label>
                      </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </form>
                </div>
</div>

<?php

require "../koneksi.php";

if (isset($_POST["tambah"])){
    $nama_pelatih = $_POST["nama_pelatih"];
    $jabatan = $_POST["jabatan"];
    $tingkatan = $_POST["tingkatan"];

    // Foto
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $n_random = rand(1,999);
    $nama_file = $n_random. "-".$nama;
    $folder = 'foto_pelatih';

    // upload file
    move_uploaded_file($lokasi, "$folder/$nama_file");

    $query = "INSERT INTO tbl_pelatih (`nama_pelatih`, `jabatan`, `id_sabuk`, `foto`) VALUES('$nama_pelatih','$jabatan','$tingkatan','$nama_file')";

    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>alert('Data berhasil ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
    } else {
        echo "<script>alert('Data Gagal ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=add_pelatih';</script>";        
    }
}

?>