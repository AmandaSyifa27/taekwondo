<?php
require "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_anggota INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_anggota.id_sabuk WHERE id_anggota = $id");
$row = mysqli_fetch_assoc($data);

$nama_anggota = $row["nama_anggota"];
$alamat = $row["alamat"];
$tgl_lahir = $row["tgl_lahir"];
$tempat_lahir = $row["tempat_lahir"];
$jk = $row["jk"];
$no_hp = $row["no_hp"];
$berat_badan = $row["berat_badan"];
$tinggi_badan = $row["tinggi_badan"];
$pekerjaan = $row["pekerjaan"];
$id_sabuk = $row["id_sabuk"];
$foto = $row["foto"];

if (isset($_POST["edit"])) {
    $nama_anggota = $_POST["nama_anggota"];
    $alamat = $_POST["alamat"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $jk = $_POST["jk"];
    $no_hp = $_POST["no_hp"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];
    $pekerjaan = $_POST["pekerjaan"];
    $id_sabuk = $_POST["id_sabuk"];

    if (!empty($_FILES["foto"]["name"])) {
        unlink("foto_anggota/" . $row["foto"]);
        $gambar = $_FILES["foto"]["name"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $n_random = rand(1, 999);
        $nama_file = $n_random . "-" . $gambar;
        $path = "foto_anggota/" . $nama_file;
        move_uploaded_file($tmp, $path);
    } else {
        $nama_file = $row["foto"];
    }

    $query = "UPDATE tbl_anggota SET
        nama_anggota = '$nama_anggota',
        alamat = '$alamat',
        tgl_lahir = '$tgl_lahir',
        tempat_lahir = '$tempat_lahir',
        jk = '$jk',
        no_hp = '$no_hp',
        berat_badan = '$berat_badan',
        tinggi_badan = '$tinggi_badan',
        pekerjaan = '$pekerjaan',
        id_sabuk = '$id_sabuk',
        foto = '$nama_file'
        WHERE id_anggota = '$id'";

    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=data_anggota';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=edit_anggota&id=$id';</script>";
    }
}
?>

<div class="col-lg-8">
    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Anggota</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_anggota">Nama</label>
                    <input name="nama_anggota" type="text" class="form-control" id="nama_anggota" placeholder="Masukkan Nama" value="<?= $nama_anggota ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat saat ini"><?= $alamat ?></textarea>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir" value="<?= $tgl_lahir ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $tempat_lahir ?>">
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
                                        <input value="Laki-Laki" type="radio" id="Laki-Laki" name="jk" class="custom-control-input" <?= $jk == 'Laki-Laki' ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input value="Perempuan" type="radio" id="Perempuan" name="jk" class="custom-control-input" <?= $jk == 'Perempuan' ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="Perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_hp">Nomor Telepon</label>
                            <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="08..." value="<?= $no_hp ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <input name="berat_badan" type="number" class="form-control" id="berat_badan" placeholder="..kg" value="<?= $berat_badan ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan</label>
                            <input name="tinggi_badan" type="number" class="form-control" id="tinggi_badan" placeholder="..cm" value="<?= $tinggi_badan ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan ?>">
                </div>
                        <div class="form-group">
                            <label for="id_sabuk">Tingkat Sabuk</label>
                            <select name="id_sabuk" id="tingkatan" class="form-control mb-3">
                            <option value="">Pilih Tingkatan Sabuk</option>
                            <?php 
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_sabuk");
                            while($row = mysqli_fetch_array($data)) {
                                $selected = ($row['id_sabuk'] == $id_sabuk) ? 'selected' : '';
                                echo "<option value='".$row['id_sabuk']."' $selected>".$row['tingkatan']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="foto">Upload Foto</label>
                        <embed src="foto_anggota/<?= $foto ?>" type="" width="100px" class="mt-3">
                    </div>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
