
<div class="col-lg-10 ">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendaftaran Anggota</h6>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_anggota">Nama</label>
                      <input name="nama_anggota" type="text" class="form-control" id="nama_anggota" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                <textarea name='alamat' class="form-control" placeholder="Alamat saat ini"> </textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio">
                            <input value="Laki-Laki" type="radio" id="Laki-Laki" name="jk" class="custom-control-input">
                            <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input value="Perempuan" type="radio" id="Perempuan" name="jk" class="custom-control-input">
                            <label class="custom-control-label" for="Perempuan">Perempuan</label>
                          </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="no_hp">Nomor Telepon</label>
                    <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="08...">
                </div>
            </div>
                </div>
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <input name="berat_badan" type="number" class="form-control" id="berat_badan" placeholder="..kg">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tinggi_badan">Tinggi Badan</label>
                                <input name="tinggi_badan" type="number" class="form-control" id="tinggi_badan" placeholder="..cm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="pekerjaan">Pekerjaan</label>
                      <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan">
                    </div>
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
    $nama_anggota = $_POST["nama_anggota"];
    $alamat = $_POST["alamat"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $jk = $_POST["jk"];
    $no_hp = $_POST["no_hp"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];
    $pekerjaan = $_POST["pekerjaan"];
    $tingkatan = $_POST["tingkatan"];

    // Foto
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $n_random = rand(1,999);
    $nama_file = $n_random. "-".$nama;
    $folder = 'foto_anggota';

    // upload file
    move_uploaded_file($lokasi, "$folder/$nama_file");

    $query = "INSERT INTO tbl_anggota (`nama_anggota`, `alamat`, `tgl_lahir`, `tempat_lahir`, `jk`, `no_hp`, `berat_badan`, `tinggi_badan`, `pekerjaan`, `id_sabuk`, `foto`) VALUES('$nama_anggota','$alamat','$tgl_lahir','$tempat_lahir','$jk','$no_hp','$berat_badan','$tinggi_badan','$pekerjaan','$tingkatan','$nama_file')";

    $result = mysqli_query($koneksi, $query);
    if($result){
        echo'<div class="card mb-4">
    <div class="card-body"><div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Success!</b></h6>
                    A simple success alert—check it out!
                  </div>
    </div>
</div>
        ';
        echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
    } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-ban"></i><b> Stop!</b></h6>
                    A simple danger alert—check it out!
                  </div>';
        echo "<script>window.location.href = 'index.php?page=add_anggota';</script>";        
    }
}

?>