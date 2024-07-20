<?php
require "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_pelatih.id_sabuk WHERE id_pelatih = $id");
$row = mysqli_fetch_assoc($data);

$nama_pelatih = $row["nama_pelatih"];
$jabatan = $row["jabatan"];
$id_sabuk = $row["id_sabuk"];
$foto = $row["foto"];

if (isset($_POST["edit"])) {
    $nama_pelatih = $_POST["nama_pelatih"];
    $jabatan = $_POST["jabatan"];
    $id_sabuk = $_POST["id_sabuk"];

    if (!empty($_FILES["foto"]["name"])) {
        unlink("foto_pelatih/" . $row["foto"]);
        $gambar = $_FILES["foto"]["name"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $n_random = rand(1, 999);
        $nama_file = $n_random . "-" . $gambar;
        $path = "foto_pelatih/" . $nama_file;
        move_uploaded_file($tmp, $path);
    } else {
        $nama_file = $row["foto"];
    }

    $query = "UPDATE tbl_pelatih SET
        nama_pelatih = '$nama_pelatih',
        jabatan = '$jabatan',
        id_sabuk = '$id_sabuk',
        foto = '$nama_file'
        WHERE id_pelatih = '$id'";

    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=data_pelatih';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=edit_pelatih&id=$id';</script>";
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
                    <label for="nama_pelatih">Nama Pelatih</label>
                    <input name="nama_pelatih" type="text" class="form-control" id="nama_pelatih" placeholder="Masukkan Nama" value="<?= $nama_pelatih ?>">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <textarea name="jabatan" class="form-control" placeholder="Jabatan saat ini"><?= $jabatan ?></textarea>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="foto">Upload Foto</label>
                        <embed src="foto_pelatih/<?= $foto ?>" type="" width="100px" class="mt-3">
                    </div>
                </div>
                    </div>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
