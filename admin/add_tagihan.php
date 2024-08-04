
<div class="col-lg-7 ">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambahkan Tagihan</h6>
                </div>
                <div class="card-body">
                  <form method="post" name="autoSumForm" enctype="multipart/form-data">
                  <div class="form-group">
                          <label for="nama_anggota">Nama Anggota</label>
                          <select name="nama_anggota" id="" class="form-control mb-3" required>
                          <option value="">Pilih Nama Anggota</option>
                            <?php 
                            include '../koneksi.php';
                            // $jsArray = "var dtSabuk = new Array();\n";
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
                            while($row = mysqli_fetch_array($data)) {
                                echo "<option value='".$row['id_anggota']."'>".$row['nama_anggota']."</option>";
                                // $jsArray .= "dtSabuk['".$row['id_anggota']."'] = {warna:'".addslashes($row['warna'])."'};\n";
                            }
                            ?>
                          </select>
                        </div>
                            <div class="form-group">
                                <label for="tagihan_bulanan">Tagihan Bulanan</label>
                                <input name="tagihan_bulanan" type="number" class="form-control" id="tagihan_bulanan" placeholder="Masukkan tagihan bulanan" onfocus="startCalc()" onblur="stopCalc()">
                            </div>
                            <div class="form-group">
                                <label for="tunggakan">Tunggakan</label>
                                <input name="tunggakan" type="number" class="form-control" id="tunggakan" placeholder="Masukkan Tunggakan" onfocus="startCalc()" onblur="stopCalc()">
                            </div>
                            <div class="form-group">
                                <label for="total_tagihan">Total Tagihan</label>
                                <input name="total_tagihan" type="number" class="form-control" id="total_tagihan" placeholder="Masukkan Total Tagihan" readonly onfocus="startCalc()" onblur="stopCalc()">
                            </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </form>
                </div>
</div>

<script>
    function startCalc(){
        interval = setInterval(calc, 1);
    }

    function calc(){
        var tagihan_bulanan = parseFloat(document.autoSumForm.tagihan_bulanan.value) || 0;
        var tunggakan = parseFloat(document.autoSumForm.tunggakan.value) || 0;

        var total_tagihan = tagihan_bulanan + tunggakan;

        document.autoSumForm.total_tagihan.value = total_tagihan.toFixed(2);
    }

    function stopCalc(){
        clearInterval(interval);
    }
</script>

<?php

require "../koneksi.php";

if (isset($_POST["tambah"])){
    $nama_anggota = $_POST["nama_anggota"];
    $tagihan_bulanan = $_POST["tagihan_bulanan"];
    $tunggakan = $_POST["tunggakan"];
    $total_tagihan = $_POST["total_tagihan"];

    $query = "INSERT INTO tbl_tagihan (`id_anggota`, `tagihan_bulanan`, `tunggakan`, `total_tagihan`) VALUES('$nama_anggota','$tagihan_bulanan','$tunggakan','$total_tagihan')";

    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>alert('Data berhasil ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=data_tagihan';</script>";
    } else {
        echo "<script>alert('Data Gagal ditambah');</script>";
        echo "<script>window.location.href = 'index.php?page=add_tagihan';</script>";        
    }
}

?>