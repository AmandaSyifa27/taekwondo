<div class="row">
    
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">   
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <form action="" method="POST" class="p-3">
    <div class="form-row align-items-end">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kunci">Cari Anggota</label>
                <input type="text" name="kunci" class="form-control" placeholder="Masukkan Nama atau Sabuk">
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
                    $query = "SELECT * FROM tbl_anggota INNER JOIN tbl_sabuk ON tbl_anggota.id_sabuk = tbl_sabuk.id_sabuk WHERE tbl_anggota.nama_anggota LIKE '%$kunci%' OR tbl_sabuk.tingkatan LIKE '%$kunci%'";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
            } else{
                require '../koneksi.php';
                    $query = "SELECT * FROM tbl_anggota INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_anggota.id_sabuk";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
                
            }
            
            ?>
            
                  <form method="post" action="index.php?page=multi_delete"> 
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
            <a href="laporan_anggota.php?cari=<?= urlencode($cari) ?>" target="_blank" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak Data</span>
            </a>
                </div>
                    <table class="table align-items-center table-flush" id="dataTable">
                      <thead class="thead-light">
                      <tr>
                        <th></th>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Pekerjaan</th>
                        <th>Sabuk</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th></th>
                      <th>No</th>
                      <th>Foto</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Pekerjaan</th>
                        <th>Sabuk</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($result)):
                        ?>
                      <tr>
                        <td>
                            <input type="checkbox" name="id_anggota[]" value="<?= $data['id_anggota']?>" >
                        </td>
                        <td><?= $i++; ?></td>
                        <td><img src="foto_anggota/<?= $data['foto'] ?>" alt="Foto Anggota" width="100px"></td>
                        <td><?= $data["nama_anggota"] ?></td>
                        <td><?= $data["alamat"] ?></td>
                        <td><?= $data["tempat_lahir"] ?>, <?= $data["tgl_lahir"]?></td>
                        <td><?= $data["jk"] ?></td>
                        <td><?= $data["no_hp"] ?></td>
                        <td><?= $data["berat_badan"] ?></td>
                        <td><?= $data["tinggi_badan"] ?></td>
                        <td><?= $data["pekerjaan"] ?></td>
                        <td><img src="../foto_sabuk/<?= $data['warna'] ?>" width="100px" alt="<?= $data['tingkatan']?>"></td>                        
                        <td><a href="index.php?page=edit_anggota&id=<?= $data['id_anggota'] ?>" class="btn btn-outline-warning mb-1">Edit</a><br>
                        <a onclick="return confirm('Apakah anda ingin menghapus data?')" href="index.php?page=delete_anggota&id=<?= $data['id_anggota'] ?>" class="btn btn-outline-danger mb-1">Hapus</a>
                        </td>
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

<!-- 
<div class="table-responsive">
            
            
            
            -->