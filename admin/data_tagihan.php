<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Tagihan Anggota</h6>
      </div>
      <form action="" method="POST" class="p-3">
        <div class="form-row align-items-end">
          <div class="col-md-4">
            <div class="form-group">
              <label for="kunci">Cari Anggota</label>
              <input type="text" name="kunci" class="form-control" placeholder="Masukkan Nama Anggota">
            </div>
          </div>
          <div class="col-md-3">              
            <div class="form-group">
              <input type="submit" name="cari" class="btn btn-secondary mb-1" value="Cari Data">
            </div>
          </div>
        </div>
      </form>

      <div class="table-responsive p-3">
        <?php
        require '../koneksi.php';
        $kunci = isset($_POST['kunci']) ? $_POST['kunci'] : '';

        // Hitung total anggota
        $total_query = "SELECT COUNT(*) AS total FROM tbl_tagihan 
                        INNER JOIN tbl_anggota ON tbl_tagihan.id_anggota = tbl_anggota.id_anggota 
                        WHERE (tbl_anggota.nama_anggota LIKE '%$kunci%')";

        $total_result = mysqli_query($koneksi, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_records = $total_row['total'];
        $limit = 10; // Jumlah anggota per halaman
        $total_pages = ceil($total_records / $limit);

        $pagination_page = isset($_GET['pagination_page']) ? (int)$_GET['pagination_page'] : 1;
        $offset = ($pagination_page - 1) * $limit;

        $query = "SELECT * FROM tbl_tagihan 
                  INNER JOIN tbl_anggota ON tbl_tagihan.id_anggota = tbl_anggota.id_anggota 
                  WHERE (tbl_anggota.nama_anggota LIKE '%$kunci%')";

        $query .= " LIMIT $offset, $limit";

        $result = mysqli_query($koneksi, $query);
        $i = $offset + 1;
        ?>
        <form method="post" action="index.php?page=multi_delete">
          <div class="mb-3">
            <a href="index.php?page=add_tagihan" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
              </span>
              <span class="text">Tambah Tagihan</span>
            </a>
            <button onclick="return confirm('Apakah ingin menghapus semua data ini?')" class="btn btn-danger btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Delete Selected Data</span>
            </button>
            <?php
            $cari = isset($_POST['kunci']) ? $_POST['kunci'] : '';
            ?>
            <a href="laporan_tagihan.php?cari=<?= urlencode($cari) ?>" target="_blank" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-print"></i>
              </span>
              <span class="text">Cetak Data</span>
            </a>
            <a href="index.php?page=data_tagihan&pagination_page=<?= $pagination_page; ?>" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-sync"></i>
              </span>
            </a>
          </div>
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th></th>
                <th>No</th>
                <th>Nama</th>
                <th>Tagihan Bulanan</th>
                <th>Tunggakan</th>
                <th>Total Tagihan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>No</th>
                <th>Nama</th>
                <th>Tagihan Bulanan</th>
                <th>Tunggakan</th>
                <th>Total Tagihan</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td>
                    <input type="checkbox" name="id_tagihan[]" value="<?= $data['id_tagihan'] ?>">
                  </td>
                  <td><?= $i++; ?></td>
                  <td><?= $data["nama_anggota"] ?></td>
                  <td><?= $data["tagihan_bulanan"] ?></td>
                  <td><?= $data["tunggakan"] ?></td>
                  <td><?= $data["total_tagihan"] ?></td>
                  <td>
                    <a href="index.php?page=edit_tagihan&id=<?= $data['id_tagihan'] ?>" class="btn btn-outline-warning mb-1">Edit</a><br>
                    <a onclick="return confirm('Apakah anda ingin menghapus data?')" href="index.php?page=delete_tagihan&id=<?= $data['id_tagihan'] ?>" class="btn btn-outline-danger mb-1">Hapus</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </form>
      </div>
      <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item<?= ($pagination_page <= 1) ? ' disabled' : ''; ?>">
            <a class="page-link" href="?page=data_tagihan&pagination_page=<?= $pagination_page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item<?= ($i == $pagination_page) ? ' active' : ''; ?>">
              <a class="page-link" href="?page=data_tagihan&pagination_page=<?= $i; ?>"><?= $i; ?></a>
            </li>
          <?php endfor; ?>
          <li class="page-item<?= ($pagination_page >= $total_pages) ? ' disabled' : ''; ?>">
            <a class="page-link" href="?page=data_tagihan&pagination_page=<?= $pagination_page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {
    $("#dataTable").DataTable(); // ID From dataTable
    $("#dataTableHover").DataTable(); // ID From dataTable with Hover
  });
</script>
