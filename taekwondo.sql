-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 04:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taekwondo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jk` varchar(16) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `id_sabuk` int(3) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `alamat`, `tgl_lahir`, `tempat_lahir`, `jk`, `no_hp`, `berat_badan`, `tinggi_badan`, `pekerjaan`, `id_sabuk`, `tgl_daftar`, `foto`) VALUES
(3, 'Amanda Sifaul Zanah', 'Indramayu', '2004-11-27', 'Indramayu', 'Perempuan', '0876942233345', 50, 160, 'Mahasiswa', 13, '2024-06-12', '691-20231020037_Amanda Sifaul Zanah__TI.jpg'),
(5, 'Nabila Hafidz Syabina', 'Cirebon', '2005-10-20', 'cirebon', 'Perempuan', '081364826704', 50, 160, 'Mahasiswa', 12, '2024-06-12', '29-20231020048_NABILA HAFIDZ SYABINA_TEKNIK INFORMATIKA.png.jpg'),
(7, 'Belva Calista', 'Cirebon', '2004-12-25', 'Cirebon', 'Perempuan', '081954428306', 50, 160, 'Mahasiswa', 10, '2024-06-21', '207-20231020058_BELVA CALISTA_TEKNIK INFORMATIKA.jpg'),
(14, 'Nethania Emmanuela Rahadian', 'Cirebon', '2005-09-21', 'Cikampek', 'Perempuan', '087848652946', 50, 160, 'Mahasiswa', 11, '2024-07-22', '621-20231020002_Nethania Emmanuela Rahadian_Teknik Informatika.png.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatih`
--

CREATE TABLE `tbl_pelatih` (
  `id_pelatih` int(11) NOT NULL,
  `nama_pelatih` varchar(50) NOT NULL,
  `jabatan` text NOT NULL,
  `id_sabuk` int(3) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelatih`
--

INSERT INTO `tbl_pelatih` (`id_pelatih`, `nama_pelatih`, `jabatan`, `id_sabuk`, `foto`) VALUES
(5, 'Suwiriyadi', 'Kepala Pelatih', 17, '349-Sanim Suwir.jpg'),
(6, 'Supriyadi', 'Bendahara', 16, '269-Sbm Supri.jpg'),
(7, 'Esti Dwi Wahyuni', 'Sekretaris', 16, '703-Kak Esti.jpg'),
(8, 'Belva Calista', 'Asisten Pelatih', 16, '617-Belva.jpg'),
(9, 'Muhammad Arrifat Dhivanagara', 'Asisten Pelatih', 14, '990-Arrifat.jpg'),
(10, 'Vilvi Wanda Sandria', 'Asisten Pelatih', 14, '423-Vilvi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sabuk`
--

CREATE TABLE `tbl_sabuk` (
  `id_sabuk` int(11) NOT NULL,
  `tingkatan` varchar(20) NOT NULL,
  `warna` text NOT NULL,
  `jurus` varchar(20) NOT NULL,
  `jangka_waktu` varchar(20) NOT NULL,
  `usia_minimal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sabuk`
--

INSERT INTO `tbl_sabuk` (`id_sabuk`, `tingkatan`, `warna`, `jurus`, `jangka_waktu`, `usia_minimal`) VALUES
(2, 'GEUP 10', '536-Putih - G.10.JPG', 'BASIC 1 & 2', '3 BULAN', ''),
(3, 'GEUP - 9', '327-Kuning - G.9.JPG', 'BASIC 3', '3 BULAN', ''),
(4, 'GEUP - 8', '618-Kuning Strip Hijau - G.8.JPG', 'TAEGUK 1', '3 BULAN', ''),
(5, 'GEUP - 7', '744-Hijau Polos - G.7.JPG', 'TAEGUK 2', '3 BULAN', ''),
(6, 'GEUP - 6', '61-Hijau Strip Biru - G.6.JPG', 'TAEGUK 3', '3 BULAN', ''),
(7, 'GEUP - 5', '357-Biru Polos - G.5.JPG', 'TAEGUK 4', '3 BULAN', ''),
(8, 'GEUP - 4', '436-Biru Strip Merah - G.4.JPG', 'TAEGUK 5', '3 BULAN', ''),
(9, 'GEUP - 3', '763-Merah Polos - G.3.JPG', 'TAEGUK 6', '3 BULAN', ''),
(10, 'GEUP - 2', '890-Merah Strip Hitam 1 - G.2.JPG', 'TAEGUK 7', '3 BULAN', ''),
(11, 'GEUP - 1', '112-Merah Strip Hitam 2 - G.1.JPG', 'TAEGUK 8', '6 BULAN', ''),
(12, 'POOM 1', '119-Poom 1.JPG', 'KORYO', '-', '-'),
(13, 'DAN - 1', '729-DAN 1.JPG', 'KORYO', '18 BULAN', '15 TAHUN'),
(14, 'DAN - 2', '350-DAN 2.JPG', 'KEUMGANG', '2 TAHUN', '18 TAHUN'),
(15, 'DAN - 3', '161-DAN 3.JPG', 'TAEBAEK', '3 TAHUN', '20 TAHUN'),
(16, 'DAN - 4', '84-DAN 4.JPG', 'PYONGWON', '4 TAHUN', '23 TAHUN'),
(17, 'DAN - 5', '450-DAN 5.JPG', 'SIPJIN', '5 TAHUN', '27 TAHUN'),
(18, 'DAN - 6', '956-DAN 6.JPG', 'JITAE', '6 TAHUN', '33 TAHUN'),
(19, 'DAN - 7', '27-DAN 7.JPG', 'CHEONKWON', '7 TAHUN', '40 TAHUN'),
(20, 'DAN - 8', '719-DAN 8.JPG', 'HANSU', '8 TAHUN', '48 TAHUN'),
(21, 'DAN - 9', '502-DAN 9.JPG', 'ILYEO', '9 TAHUN', '57 TAHUN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tagihan`
--

CREATE TABLE `tbl_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tagihan_bulanan` double NOT NULL,
  `tunggakan` double NOT NULL,
  `total_tagihan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tagihan`
--

INSERT INTO `tbl_tagihan` (`id_tagihan`, `id_anggota`, `tagihan_bulanan`, `tunggakan`, `total_tagihan`) VALUES
(3, 12, 100000, 50000, 150000),
(4, 6, 100000, 100000, 200000),
(5, 7, 100000, 200000, 300000),
(6, 3, 100000, 0, 100000),
(7, 5, 100000, 100000, 200000),
(8, 14, 100000, 0, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `status`, `foto`) VALUES
(1, 'Admin', 'Admin45', '454545', 'admin', '45-stars.jpg'),
(2, 'Amandaa', 'amanda45', '454545', 'user', '575-anime.jpg'),
(3, 'Nabila', 'nanabs', '765765', 'user', ''),
(4, 'Belvaa', 'ciway45', '654654', 'user', '978-2024-07-20 (20).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_pelatih`
--
ALTER TABLE `tbl_pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indexes for table `tbl_sabuk`
--
ALTER TABLE `tbl_sabuk`
  ADD PRIMARY KEY (`id_sabuk`);

--
-- Indexes for table `tbl_tagihan`
--
ALTER TABLE `tbl_tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pelatih`
--
ALTER TABLE `tbl_pelatih`
  MODIFY `id_pelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sabuk`
--
ALTER TABLE `tbl_sabuk`
  MODIFY `id_sabuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_tagihan`
--
ALTER TABLE `tbl_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
