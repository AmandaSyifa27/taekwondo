<?php
require '../koneksi.php';
$id = $_GET["id_anggota"];

$query = "SELECT * FROM tbl_anggota 
          INNER JOIN tbl_sabuk ON tbl_anggota.id_sabuk = tbl_sabuk.id_sabuk 
          WHERE tbl_anggota.id_anggota = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<body onload="javascript:window.print()" style="margin:0 auto; width: 1000px;">
    <img src="../img/tkd.png" alt="" style="width: 10%; float: left;">
    <table width="90%" cellspacing="0" cellpadding="0">
        <tr>
            <td style="font-size: 32px; color: blue; text-align:center;"><b>Taekwondo Pemuda Cirebon</b></td>
        </tr>
        <tr>
            <td style="font-size: 18px; text-align: center; padding-top: 10px;">Jl. Ciremai Raya No.04, Kel. Kecapi, Kec. Harjamukti, Kota Cirebon, Jawa Barat</td>
        </tr>
        <tr>
            <td style="font-size: 18px; text-align: center; padding-top: 10px;">Telp: 346745(4556546), Email : Sejahtera@gmail.com</td>
        </tr>
    </table><br>
    <div style="border-bottom: 3px dotted gray"></div><br>

    <label style="font-size: 20px; text-align: center;" for=""><u>Bukti Pendaftaran</u></label>
    <p>&nbsp;</p>

    <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #000; padding: 3px 5px">
        <tbody>
            <tr>
            <td style="border: 1px solid #000; padding: 3px 5px; text-align: center;" rowspan="10">
                <img src="../foto_anggota/<?= $data['foto'] ?>" alt="Foto Anggota" width="300px">
            </td>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Nama</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['nama_anggota']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Alamat</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['alamat']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Tempat, Tanggal Lahir</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data["tempat_lahir"] ?>, <?= $data["tgl_lahir"] ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Gender</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['jk']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Kontak</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['no_hp']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Berat Badan</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['berat_badan']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Tinggi Badan</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['tinggi_badan']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Pekerjaan</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px"><b>Sabuk</b></td>
                <td style="border: 1px solid #000; padding: 3px 5px"><img src="../foto_sabuk/<?= $data['warna'] ?>" width="100px" alt=""></td>
            </tr>
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
