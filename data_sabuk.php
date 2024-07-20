<div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Keterangan Sabuk</h6>
                </div>
                <form action="" method="POST" class="p-3">
    <div class="form-row align-items-end">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kunci">Cari Sabuk</label>
                <input type="text" name="kunci" class="form-control" placeholder="Masukkan Tingkatan atau Jurus">
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
                    require "koneksi.php";
                    $query = "SELECT * FROM tbl_sabuk WHERE tingkatan LIKE '%$kunci%' OR jurus LIKE '%$kunci%'";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;                    
                  } else {
                    require "koneksi.php";
                    $query = "SELECT * FROM tbl_sabuk";                  
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
                  }
                  ?>
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Tingkatan</th>
                        <th>Warna</th>
                        <th>Jurus</th>
                        <th>Jangka Waktu</th>
                        <th>Usia Minimal</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>No</th>
                        <th>Tingkatan</th>
                        <th>Warna</th>
                        <th>Jurus</th>
                        <th>Jangka Waktu</th>
                        <th>Usia Minimal</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($result)):                            
                        ?>
                      <tr>                        
                        <td><?= $i++; ?></td>
                        <td><?= $data["tingkatan"] ?></td>
                        <td><img src="../foto_sabuk/<?= $data['warna'] ?>" alt="Foto Sabuk" width="100px"></td>
                        <td><?= $data["jurus"] ?></td>
                        <td><?= $data["jangka_waktu"] ?></td>
                        <td><?= $data["usia_minimal"] ?></td>
                      </tr>
                      <?php endwhile;?>
                    </tbody>
                  </table>
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