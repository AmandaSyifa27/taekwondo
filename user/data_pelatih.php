<div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pelatih</h6>
                </div>
                <form action="" method="POST" class="p-3">
    <div class="form-row align-items-end">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kunci">Cari Pelatih</label>
                <input type="text" name="kunci" class="form-control" placeholder="Masukkan Nama, Sabuk, atau Jabatan">
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
            
            if(isset($_POST['cari'])){
                $kunci = $_POST['kunci'];
                require '../koneksi.php';
                    $query = "SELECT * FROM tbl_pelatih INNER JOIN tbl_sabuk ON tbl_pelatih.id_sabuk = tbl_sabuk.id_sabuk WHERE tbl_pelatih.nama_pelatih LIKE '%$kunci%' OR tbl_sabuk.tingkatan LIKE '%$kunci%' OR tbl_pelatih.jabatan LIKE '%$kunci%'";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
            } else{
                require '../koneksi.php';
                    $query = "SELECT * FROM tbl_pelatih INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_pelatih.id_sabuk";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
                
            }
            
            ?>
                  <form action="index.php?page=multi_delete" method="post">
                  <div class="mb-3">
                  <a href="index.php?page=add_anggota" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Tambah Anggota</span>
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
                  <a href="laporan_pelatih.php?cari=<?= urlencode($cari) ?>" target="_blank" class="btn btn-info btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-print"></i>
                      </span>
                      <span class="text">Cetak Data</span>
                  </a>
                  </div>
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tingkat Sabuk</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tingkat Sabuk</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($result)):                            
                        ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><img src="../admin/foto_pelatih/<?= $data['foto'] ?>" alt="Foto Pelatih" width="100px"></td>
                        <td><?= $data["nama_pelatih"] ?></td>
                        <td><?= $data["jabatan"] ?></td>
                        <td><img src="../foto_sabuk/<?= $data['warna'] ?>" width="100px" alt=""></td>                        
                      </tr>
                      <?php endwhile;?>
                    </tbody>
                  </table>
                  </form>
                </div>
              </div>
            </div>
</div>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
   $(document).ready(function () {
    $("#dataTable").DataTable(); // ID From dataTable
    $("#dataTableHover").DataTable(); // ID From dataTable with Hover
   });
  </script>