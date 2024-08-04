<body onload="javascript:window.print()" style="margin:0 auto; width: 1000px;">
    <img src="../img/tkd.png" alt="" style="width: 10%; float: left;">
    <table width="90%" cellspacing="0" cellpadding="0">
        <tr>
            <td style="font-size: 32px; color: blue; text-align:center;"><b>Taekwondo Pemuda Cirebon</b></td>
        </tr>
        <tr>
            <td style="font-size: 18px; text-align: center; padding-top: 10px;">Jl. Brigjend Dharsono By pass, Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132</td>
        </tr>
        <tr>
            <td style="font-size: 18px; text-align: center; padding-top: 10px;">Telp: +62 819-5331-9204, Email: amanda.zanah.ti.23@cic.ac.id </td>
        </tr>
    </table>
    <br>
    <div style="border-bottom: 3px dotted gray"></div>
    <br>
    <label style="font-size: 20px; text-align: center;" for=""><u>Laporan Tagihan Keuangan Anggota</u></label>
    <p>&nbsp;</p>

    <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #000; padding: 3px 5px;">
        <thead>
            <tr style="background-color: lightgray;">
                <th style="border: 1px solid #000; padding: 3px 5px;">No</th>
                <th style="border: 1px solid #000; padding: 3px 5px;">Nama</th>
                <th style="border: 1px solid #000; padding: 3px 5px;">Tagihan Bulanan</th>
                <th style="border: 1px solid #000; padding: 3px 5px;">Tunggakan</th>
                <th style="border: 1px solid #000; padding: 3px 5px;">Total Tagihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../koneksi.php';

            $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

            if (!empty($cari)) {
                $query = "SELECT * FROM tbl_tagihan INNER JOIN tbl_anggota ON tbl_anggota.id_anggota = tbl_tagihan.id_anggota WHERE tbl_tagihan.id_anggota LIKE '%$cari%' OR tbl_anggota.nama_anggota LIKE '%$cari%'";
            } else {
                $query = "SELECT * FROM tbl_tagihan INNER JOIN tbl_anggota ON tbl_anggota.id_anggota = tbl_tagihan.id_anggota";
            }

            $result = mysqli_query($koneksi, $query);
            $i = 1;
            while ($data = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td style="border: 1px solid #000; padding: 3px 5px;"><?= $i++ ?></td>
                <td style="border: 1px solid #000; padding: 3px 5px;"><?= $data['nama_anggota']; ?></td>
                <td style="border: 1px solid #000; padding: 3px 5px;"><?= $data['tagihan_bulanan']; ?></td>
                <td style="border: 1px solid #000; padding: 3px 5px;"><?= $data['tunggakan']; ?></td>
                <td style="border: 1px solid #000; padding: 3px 5px;"><?= $data['total_tagihan']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <table align="right" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: center;">Cirebon, <?= date("d F Y"); ?></td>
        </tr>
        <tr>
            <td style="text-align: center;">Admin,
                <p>&nbsp;</p>
                <u><b>Belva Calista</b></u>
            </td>
        </tr>
    </table>
</body>
