-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 09:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inputkegiatan`
--

CREATE TABLE `inputkegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inputkegiatan`
--

INSERT INTO `inputkegiatan` (`id`, `nama`, `tanggal`, `deskripsi`, `poster`) VALUES
(1, 'Ibadah Mingguan', '2023-06-17', 'Ibadah yang diadakan setiap minggu. Minggu ini akan mengangkat tema \"Praise the Lord\" dengan dipimpin oleh Pdt. ABC.', 'ibadahmingguan.jpg'),
(2, 'Perjamuan Kudus', '2023-07-02', 'Acara perjamuan kudus yang bisa diterima oleh semua jemaat. Diadakan pada setiap awal bulan termasuk awal bulan Juli.', 'perjamuankudus.jpg'),
(3, 'Penyerahan Anak', '2023-06-24', 'Upacara penyerahan anak yang akan diadakan di minggu ketiga bulan Juni. Jemaat yang ingin menyerahkan anaknya bisa mendaftar di form yang tersedia.', 'penyerahananak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inputpenggalangandana`
--

CREATE TABLE `inputpenggalangandana` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` date NOT NULL,
  `target` int(11) NOT NULL,
  `poster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `namaJabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `namaJabatan`) VALUES
(1, 'Penasihat'),
(2, 'Ketua'),
(3, 'Gembala Sidang'),
(4, 'Sekretaris Gereja'),
(5, 'Bendahara Gereja'),
(6, 'Kepala Bidang Persekutuan dan Kemitraan'),
(7, 'Kepala Bidang Misi dan Pelayanan'),
(8, 'Kepala Bidang Pembinaan dan Pengembangan SDM'),
(9, 'Kepala Bidang Youth'),
(10, 'Kepala Bidang Teen'),
(11, 'Kepala Bidang kids'),
(12, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `pendeta`
--

CREATE TABLE `pendeta` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputkegiatan`
--
ALTER TABLE `inputkegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputpenggalangandana`
--
ALTER TABLE `inputpenggalangandana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendeta`
--
ALTER TABLE `pendeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inputkegiatan`
--
ALTER TABLE `inputkegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inputpenggalangandana`
--
ALTER TABLE `inputpenggalangandana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendeta`
--
ALTER TABLE `pendeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
