<?php
require '../koneksi.php';

$awal = isset($_GET['awal']) ? $_GET['awal'] : '';
$akhir = isset($_GET['akhir']) ? $_GET['akhir'] : '';
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$query = "SELECT * FROM tbl_anggota 
          INNER JOIN tbl_sabuk ON tbl_anggota.id_sabuk = tbl_sabuk.id_sabuk 
          WHERE (tbl_anggota.nama_anggota LIKE '%$cari%' OR tbl_sabuk.tingkatan LIKE '%$cari%')";

if (!empty($awal) && !empty($akhir)) {
    $query .= " AND tbl_anggota.tgl_daftar BETWEEN '$awal' AND '$akhir'";
}

$result = mysqli_query($koneksi, $query);
                    $i = 1;
?>
<body onload="javascript:window.print()" style="margin:0 auto; width: 1000px;">
    <img src="../img/tkd.png" alt="" style="width: 10%; float: left;">
    <table width="90%" cellspacing="0" cellpadding="0">
        <tr>
            <td style="font-size: 32; color: blue; text-align:center;"><b>Taekwondo Pemuda Cirebon</b></td>
        </tr>
        <tr>
            <td style="font-size: 18; text-align: center; padding-top: 10px;">Jl. Ciremai Raya No.04, Kel. Kecapi, Kec. Harjamukti, Kota Cirebon, Jawa Barat</td>
        </tr>
        <tr>
            <td style="font-size: 18; text-align: center; padding-top: 10px;">Telp: 346745(4556546), Email : Sejahtera@gmail.com</td>
        </tr>
    </table><br>
    <div style="border-bottom: 3px dotted gray"></div><br>

    <label style="font-size: 20; text-align: center;" for=""><u>Laporan Data Anggota</u></label>
    <p>&nbsp;</p>

    <?php if (!empty($awal) && !empty($akhir)): ?>
        <p>Pendaftar dari tanggal <?= date("d-m-Y", strtotime($awal)) ?> sampai <?= date("d-m-Y", strtotime($akhir)) ?></p>
    <?php endif; ?>

    <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #000; padding: 3px 5px">
    <thead>
                    <tr style="background-color: lightgray;">
                        <th style="border: 1px solid #000; padding: 3px 5px">No</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Foto</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Nama</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Alamat</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">TTL</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Gender</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Kontak</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">BB</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">TB</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Pekerjaan</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Sabuk</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($data = mysqli_fetch_assoc($result)):
                    ?>
                    <tr>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $i++ ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><img src="../foto_anggota/<?= $data['foto'] ?>" alt="Foto Anggota" width="100px"></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['nama_anggota']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['alamat']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data["tempat_lahir"] ?>, <?= $data["tgl_lahir"]?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['jk']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['no_hp']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['berat_badan']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['tinggi_badan']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['pekerjaan']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><img src="../foto_sabuk/<?= $data['warna'] ?>" width="100px" alt=""></td>                        
                    </tr>
                    <?php endwhile; ?>
                </tbody>
    </table>
    <p>&nbsp;</p>
    <table align="right" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: center;">Cirebon, <?= date("d F Y");?></td>
        </tr>
        <tr>
            <td style="text-align: center;">Admin,
                <p>&nbsp;</p>
                <u><b>Belva Calista</b></u>
            </td>
        </tr>
    </table>
</body>
