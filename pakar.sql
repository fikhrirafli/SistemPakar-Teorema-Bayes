-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 05:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `no` int(11) NOT NULL,
  `kodegejala` varchar(5) NOT NULL,
  `namagejala` varchar(50) NOT NULL,
  `nilai` float NOT NULL,
  `kodepenyakit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`no`, `kodegejala`, `namagejala`, `nilai`, `kodepenyakit`) VALUES
(1, 'G01', 'Ada luka yang disembunyikan?', 0.6, 'P01'),
(2, 'G02', ' Menjadi agresif dan  emosional', 0.5, 'P03'),
(3, 'G03', 'Merusak diri sendiri', 0.6, 'P03'),
(4, 'G04', 'Kehilangan Nafsu  Makan', 0.6, 'P03'),
(5, 'G05', 'Sulit berteman dengan Teman baru', 0.7, 'P03'),
(6, 'G06', 'Sering mimpi buruk', 0.5, 'P03'),
(7, 'G07', 'Suka menyendiri', 0.7, 'P03'),
(8, 'G08', 'Sering Murung', 0.7, 'P03'),
(9, 'G09', 'Rendah Diri', 0.6, 'P02'),
(10, 'G010', 'Mudah Putus Asa', 0.5, 'P02'),
(11, 'G011', 'Sulit berkomunikasi', 0.6, 'P01'),
(12, 'G012', 'Sering Menangis', 0.4, 'P01'),
(13, 'G013', 'Adanya penurunan Minat Belajar', 0.7, 'P02'),
(14, 'G014', 'Barang kepemikilan yang rusak', 0.2, 'P02'),
(15, 'G015', 'Tidak mau terlibat dalam kegiatan sekolah', 0.6, 'P02'),
(16, 'G016', 'Sering merasa takut', 0.2, 'P01'),
(21, 'G017', 'Tidak nyaman saat jam istirahat tiba', 0.57, 'P01'),
(23, 'G018', 'Susah Makan', 0.5, 'P04');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_diagnosa`
--

CREATE TABLE `laporan_diagnosa` (
  `id_laporan` int(5) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `nilai_bayes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_diagnosa`
--

INSERT INTO `laporan_diagnosa` (`id_laporan`, `tgl_diagnosa`, `nama`, `tgl_lahir`, `jk`, `kelas`, `penyakit`, `nilai_bayes`) VALUES
(1, '2022-08-11', 'fikri', '2022-08-17', 'Laki - Laki', '2', 'Bullying Fisik', '30.8628251'),
(2, '2022-08-21', '', '0000-00-00', '', '', 'Bullying Fisik', '36');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `no` int(5) NOT NULL,
  `kodepenyakit` varchar(5) NOT NULL,
  `namapenyakit` varchar(50) NOT NULL,
  `pengobatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`no`, `kodepenyakit`, `namapenyakit`, `pengobatan`) VALUES
(1, 'P01', 'Bullying Fisik', 'Periksa siswa secara medis untuk memastikan tidak terdapat cedera yang serius'),
(2, 'P02', 'Bullying Verbal', 'Menanamkan rasa kesabaran dari dalam diri siswa, dan berikan dukungan serta motivasi dari orang-orang terdekat.'),
(3, 'P03', 'Bullying Psikologis/Mental', 'Berikan perhatian khusus untuk siswa ikut dalam suatu \r\norganisasi di sekolah. Dukungan dan motivasi dari orang-orang terdekat sangat baik dalam perkembangan siswa.');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ucup', 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `laporan_diagnosa`
--
ALTER TABLE `laporan_diagnosa`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laporan_diagnosa`
--
ALTER TABLE `laporan_diagnosa`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
