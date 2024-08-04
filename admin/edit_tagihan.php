<?php
require "../koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_tagihan INNER JOIN tbl_anggota ON tbl_anggota.id_anggota = tbl_tagihan.id_anggota WHERE id_tagihan = $id");
$row = mysqli_fetch_assoc($data);

$id_anggota = $row['id_anggota'];
$tagihan_bulanan = $row['tagihan_bulanan'];
$tunggakan = $row['tunggakan'];
$total_tagihan = $row['total_tagihan'];

if (isset($_POST["edit"])) {
    $id_anggota = $_POST['id_anggota'];
    $tagihan_bulanan = $_POST['tagihan_bulanan'];
    $tunggakan = $_POST['tunggakan'];
    $total_tagihan = $_POST['total_tagihan'];

    $query = "UPDATE tbl_tagihan SET
        id_anggota = '$id_anggota',
        tagihan_bulanan = '$tagihan_bulanan',
        tunggakan = '$tunggakan',
        total_tagihan = '$total_tagihan'
        WHERE id_tagihan = '$id'";

    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=data_tagihan';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
        echo "<script>window.location.href = 'index.php?page=edit_tagihan&id=$id';</script>";
    }
}
?>

<div class="col-lg-7">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Tagihan</h6>
    </div>
    <div class="card-body">
      <form method="post" name="autoSumForm" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama_anggota">Nama Anggota</label>
          <input type="text" name="nama_anggota" class="form-control mb-3" value="<?= $row["nama_anggota"] ?>" readonly>
          <input type="hidden" name="id_anggota" value="<?= $id_anggota ?>">
        </div>
            <div class="form-group">
              <label for="tagihan_bulanan">Tagihan Bulanan</label>
              <input name="tagihan_bulanan" type="number" class="form-control" id="tagihan_bulanan" placeholder="Masukkan tagihan bulanan" onfocus="startCalc()" onblur="stopCalc()" value="<?= $tagihan_bulanan ?>">
            </div>
            <div class="form-group">
              <label for="tunggakan">Tunggakan</label>
              <input name="tunggakan" type="number" class="form-control" id="tunggakan" placeholder="Masukkan tunggakan" onfocus="startCalc()" onblur="stopCalc()" value="<?= $tunggakan ?>">
            </div>
            <div class="form-group">
              <label for="total_tagihan">Total Tagihan</label>
              <input name="total_tagihan" type="number" class="form-control" id="total_tagihan" placeholder="Masukkan total tagihan" readonly onfocus="startCalc()" onblur="stopCalc()" value="<?= $total_tagihan ?>">
            </div>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
      </form>
    </div>
  </div>
</div>

<script>
    function startCalc() {
        interval = setInterval(calc, 1);
    }

    function calc() {
        var tagihan_bulanan = parseFloat(document.autoSumForm.tagihan_bulanan.value) || 0;
        var tunggakan = parseFloat(document.autoSumForm.tunggakan.value) || 0;
        var total_tagihan = tagihan_bulanan + tunggakan;
        document.autoSumForm.total_tagihan.value = total_tagihan.toFixed(2);
    }

    function stopCalc() {
        clearInterval(interval);
    }
</script>
