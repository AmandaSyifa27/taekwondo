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

    <label style="font-size: 20; text-align: center;" for=""><u>Laporan Data Pelatih</u></label>
    <p>&nbsp;</p>

    <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #000; padding: 3px 5px">
    <thead>
                    <tr style="background-color: lightgray;">
                        <th style="border: 1px solid #000; padding: 3px 5px">No</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Foto</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Nama</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Jabatan</th>
                        <th style="border: 1px solid #000; padding: 3px 5px">Tingkat Sabuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../koneksi.php';

                    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

                    if (!empty($cari)) {
                        $query = "SELECT * FROM tbl_pelatih INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_pelatih.id_sabuk WHERE tbl_pelatih.nama_pelatih LIKE '%$cari%' OR tbl_sabuk.tingkatan LIKE '%$cari%' OR tbl_pelatih.jabatan LIKE '%$cari%'";
                    } else {
                        $query = "SELECT * FROM tbl_pelatih INNER JOIN tbl_sabuk ON tbl_sabuk.id_sabuk = tbl_pelatih.id_sabuk";
                    }

                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($result)):
                    ?>
                    <p>cari<?= $cari;?></p>
                    <tr>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $i++ ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><img src="foto_pelatih/<?= $data['foto'] ?>" alt="Foto Pelatih" width="100px"></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['nama_pelatih']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><?= $data['jabatan']; ?></td>
                        <td style="border: 1px solid #000; padding: 3px 5px"><img src="../foto_sabuk/<?= $data['warna'] ?>" width="100px" alt=""></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
    </table>
    <p>&nbsp;</p>
    <table align="border-right" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: center;">Cirebon, <?= date("d F Y");?></td>
        </tr>
        <tr>
            <td style="text-align: center;">Admin,
                <p>&nbsp;</p>
                <u><b>Belva Calistung</b></u>
            </td>
        </tr>
    </table>
</body>
