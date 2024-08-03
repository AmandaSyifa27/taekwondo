-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 04:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(3, 'Amanda szzz', ' alamat alamat alamat', '2024-07-02', 'Indramayu', 'Laki-Laki', '0876942233345', 545, 547, 'Nganggurrr', 6, '2024-06-12', '861-Download_premium_png_of_Side_view_of_a_gray_in_3D_about_car_png_side_view__car__convertible_car__car_modern__and_cabriolet_563927-removebg-preview.png'),
(5, 'Nabila', ' address', '2024-07-04', 'cirebon', 'Perempuan', '4557545', 45, 445, 'mahasiswa', 12, '2024-06-12', '63-Screenshot (300).png'),
(6, 'Amanda', ' apaya', '2024-07-27', 'cirebon', 'Perempuan', '7645764557', 45, 456, 'IRT', 3, '2024-06-26', '400-8f120301ceaadfa6557e18aacf33a88a.png'),
(7, 'Belva Calistung', ' alamtas', '2024-08-03', 'Bandung', 'Perempuan', '0876942233347', 456, 456, 'buli', 16, '2024-06-21', '180-Screenshot (295).png'),
(8, 'Felicia', ' Deps', '2024-07-05', 'Cirebon', 'Perempuan', '0854864258', 20, 100, '-', 3, '2024-05-06', '789-Screenshot (300).png'),
(9, 'Nida', ' Imy', '2024-07-26', 'Indramayu', 'Perempuan', '086425677', 24, 25, 'iya', 15, '2024-07-11', '127-girl.png'),
(10, 'Elang', 'Depok ', '2024-07-05', 'Depok', 'Laki-Laki', '4557545', 30, 130, 'Pelajar', 8, '2024-07-25', '969-Screenshot (214).png'),
(11, 'Ardi', ' Indonesia', '2024-07-27', 'Indramayu', 'Laki-Laki', '7645764557', 45, 456, 'Pelajar', 8, '2024-05-29', '91-DSC01932.JPG'),
(12, 'Nayla', 'Yogya ', '2024-07-11', 'Indramayu', 'Perempuan', '0876942233347', 60, 154, 'Pelajar', 14, '2024-07-08', '884-fantasy.jpg'),
(13, 'Giska', 'Tangerang ', '2024-07-03', 'Tangerang', 'Perempuan', '7474574576457', 456, 456, 'pelazar', 10, '2024-07-03', '707-moon.jpg'),
(14, 'Dina', 'Mana ', '2024-07-04', 'Depok', 'Perempuan', '46577654', 455, 544, 'Pelajar', 10, '2024-07-22', '910-moon2.jpg');

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
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
