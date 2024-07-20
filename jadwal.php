  <div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
            </div>
            <form action="" method="POST" class="p-3">
                <div class="form-row align-items-end">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kunci">Cari Jadwal</label>
                            <input type="text" id="searchInput" class="form-control" placeholder="Masukkan Hari atau Tempat" onkeyup="searchTable()">
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
                <h5>Reguler</h5>
                <table class="table align-items-center table-flush" id="regulerTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sabtu</td>
                            <td>16.30 - 17.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Minggu</td>
                            <td>08.00 - 10.00</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive p-3">
                <h5>Prestasi</h5>
                <table class="table align-items-center table-flush" id="prestasiTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Senin</td>
                            <td>16.00 - 17.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kamis</td>
                            <td>16.00 - 17.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Minggu</td>
                            <td>10.00 - 11.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive p-3">
                <h5>Akademi</h5>
                <table class="table align-items-center table-flush" id="akademiTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Senin</td>
                            <td>16.00 - 17.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kamis</td>
                            <td>16.00 - 17.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Minggu</td>
                            <td>10.00 - 11.30</td>
                            <td>Gd. Pemuda KNPI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Pencarian -->
<script>
function searchTable() {
    var input, filter, tables, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    tables = ["regulerTable", "prestasiTable", "akademiTable"];
    
    tables.forEach(function(tableID) {
        var table = document.getElementById(tableID);
        tr = table.getElementsByTagName("tr");
        
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    });
}
</script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#regulerTable').DataTable();
        $('#prestasiTable').DataTable();
        $('#akademiTable').DataTable();
    });
</script>
