<?php
include "../koneksi.php";
// Query untuk menghitung jumlah pelatih
$query_pelatih = "SELECT COUNT(*) AS jumlah_pelatih FROM tbl_pelatih";
$result_pelatih = mysqli_query($koneksi, $query_pelatih);
$data_pelatih = mysqli_fetch_assoc($result_pelatih);
$jumlah_pelatih = $data_pelatih['jumlah_pelatih'];

// Query untuk menghitung jumlah anggota
$query_anggota = "SELECT COUNT(*) AS jumlah_anggota FROM tbl_anggota";
$result_anggota = mysqli_query($koneksi, $query_anggota);
$data_anggota = mysqli_fetch_assoc($result_anggota);
$jumlah_anggota = $data_anggota['jumlah_anggota'];

// Query untuk menghitung jumlah sabuk
$query_sabuk = "SELECT COUNT(*) AS jumlah_sabuk FROM tbl_sabuk";
$result_sabuk = mysqli_query($koneksi, $query_sabuk);
$data_sabuk = mysqli_fetch_assoc($result_sabuk);
$jumlah_sabuk = $data_sabuk['jumlah_sabuk'];
?>
<div class="row mb-3">
    <!-- Pelatih Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <a href="index.php?page=data_pelatih" class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="row">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Data</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">PELATIH</div>
                                <small class="text-success">Jumlah Pelatih <b><?= $jumlah_pelatih ?></b></small>
                            </div>
                            <div class="col">
                                <img width="90%" src="../img/pelatiw.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Anggota Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <a href="index.php?page=data_anggota" class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Data</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">ANGGOTA</div>
                                <small class="text-success">Jumlah Anggota Terdaftar <b><?= $jumlah_anggota ?></b></small>
                            </div>
                            <div class="col">
                                <img width="90%" src="../img/anggota.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Sabuk Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <a href="index.php?page=data_sabuk" class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Detail</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">SABUK</div>
                                <small class="text-success">Jumlah Sabuk <b><?= $jumlah_sabuk ?></b></small>
                            </div>
                            <div class="col">
                                <img width="75%" src="../img/sabuk.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Jadwal Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <a href="index.php?page=jadwal" class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Detail</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">JADWAL</div>
                            </div>
                            <div class="col">
                                <img width="75%" src="../img/jadwal.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Area Charts -->
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
            </div>
            <div class="card-body">
                <div
                style="display: flex;
    justify-content: center;
    align-items: center;
    height: 400px;
    "
    class="chart-area d-flex justify-content-center">
                    <canvas id="myBarChart"></canvas>
                </div>
                <hr>
                Jumlah anggota berdasarkan tingkatan sabuk
            </div>
        </div>
    </div>
<!-- Athlete -->
    <div class="row mb-3">
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card-atlet h-100 text-center">
      <div class="d-flex justify-content-center mt-3">
        <img src="../img/Belva.png" alt="Belva" class="atlet" style="width: 80%;">
      </div>
      <div class="card-body cb-atlet">
        <ul class="list-unstyled text-left">
          <li class="mb-2"><strong>Juara 3</strong> Poomsae Individu Putri PORPROV XIV JAWA BARAT 2022</li>
          <li class="mb-2"><strong>Juara 1</strong> Poomsae Pair Kejuaraan Yogyakarta International Open 2023</li>
          <li><strong>Juara 2</strong> Poomsae Pair Kejuaraan Bhayangkara Presisi 2024</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card-atlet h-100 text-center">
      <div class="d-flex justify-content-center mt-3">
        <img src="../img/Arrifat.png" alt="Arrifat" class="atlet" style="width: 80%;">
      </div>
      <div class="card-body cb-atlet">
        <ul class="list-unstyled text-left">
          <li class="mb-2"><strong>Juara 3</strong> Poomsae Individu Putra PORPROV XIV JAWA BARAT 2022</li>
          <li class="mb-2"><strong>Juara 1</strong> Poomsae Pair Kejuaraan Yogyakarta International Open 2023</li>
          <li><strong>Juara 2</strong> Poomsae Pair Kejuaraan Bhayangkara Presisi 2024</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card-atlet h-100 text-center">
      <div class="d-flex justify-content-center mt-3">
        <img src="../img/Vilvi.png" alt="Vilvi" class="atlet" style="width: 80%;">
      </div>
      <div class="card-body cb-atlet">
        <ul class="list-unstyled text-left">
          <li class="mb-2"><strong>Juara 3</strong> Poomsae Individu Putri Kejuaraan Yogyakarta International Open 2023</li>
          <li class="mb-2"><strong>Juara 2</strong> Poomsae Individu Putri Kejuaraan Indonesia Expo Battle 2021</li>
          <li><strong>Atlet Terbaik</strong> Poomsae Putri Kejuaraan Raos Open 2023</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include "../koneksi.php";

$sql = "SELECT s.tingkatan, COUNT(a.id_sabuk) as jumlah_anggota 
        FROM tbl_anggota a 
        JOIN tbl_sabuk s ON a.id_sabuk = s.id_sabuk 
        WHERE s.id_sabuk BETWEEN 2 AND 14 
        GROUP BY s.tingkatan 
        ORDER BY s.id_sabuk";
$result = $koneksi->query($sql);

$tingkatan = [];
$jumlah_anggota = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tingkatan[] = $row['tingkatan'];
        $jumlah_anggota[] = $row['jumlah_anggota'];
    }
} else {
    echo "0 results";
}

$koneksi->close();
?>

<!-- Script for Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    var tingkatanLabels = <?php echo json_encode($tingkatan); ?>;
    var jumlahAnggota = <?php echo json_encode($jumlah_anggota); ?>;

    var ctx = document.getElementById("myBarChart").getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tingkatanLabels,
            datasets: [{
                label: "Jumlah Anggota",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: jumlahAnggota,
            }],
        },
        options: {
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12,
                        fontSize: 14,
                        fontColor: '#333'
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: Math.max(...jumlahAnggota) + 1,
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function (value) {
                            return number_format(value);
                        },
                        fontSize: 14,
                        fontColor: '#333'
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true,
                labels: {
                    fontSize: 14,
                    fontColor: '#333'
                }
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>
