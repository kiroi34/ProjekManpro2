-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 12:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `idgereja`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `akunjemaat`
--

CREATE TABLE `akunjemaat` (
  `idAkun` int(11) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `jenisKelamin` varchar(20) NOT NULL,
  `tanggalLahir` varchar(50) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `nomorTelepon` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamatDomisili` varchar(255) NOT NULL,
  `waktuDaftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akunjemaat`
--

INSERT INTO `akunjemaat` (`idAkun`, `namaLengkap`, `jenisKelamin`, `tanggalLahir`, `tempatLahir`, `umur`, `nomorTelepon`, `email`, `password`, `kota`, `alamatDomisili`, `waktuDaftar`, `idgereja`) VALUES
(3, 'jemaat1', 'F', '29/07/1551', 'Sukoharjo', 21, '0821324116', 'jemaat1@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'bali', 'surabaya', '2023-05-21 16:22:11', 1),
(4, 'jemaat2', 'F', '29/07/1551', 'Sukoharjo', 12, '0821324116', 'jemaat2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 'bali', 'bali', '2023-05-21 16:22:11', 1),
(6, 'asd', 'F', '29/07/1551', 'Sukoharjo', 21, 'asda', 'c14200196@john.petra.ac.id', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', '2023-05-21 16:22:11', 1),
(7, 'jaja', 'M', '15/05/2002', 'surabaya', 15, '0812345678', 'user@gmail.com', '2e3817293fc275dbee74bd71ce6eb056', 'surabaya', 'siwalankerto', '2023-05-21 16:22:11', 1),
(8, 'tes', 'M', '29/07/31', 'solo', 21, '084211231', 'alansatria@gmail.com', '02558a70324e7c4f269c69825450cec8', 'surabaya', 'bali', '2023-05-21 16:22:11', 1),
(9, 'tes3', 'F', '15/05/2002', 'solo', 23, '0812345678', 'carolineangelia.setiawan55@yahoo.com', 'ee1485911557a04cf7cdfe277e0a109c', 'surabaya', 'siwalankerto', '2023-05-21 16:22:11', 1);

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
  `gambar` varchar(50) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `kategori`, `judul`, `konten`, `tanggal`, `gambar`, `idgereja`) VALUES
(1, '1', 'Gereja', 'Gereja Bagus', '2023-04-24', 'gambar_gereja.jpg', 1),
(2, '2', 'Paskah', 'Selamat Paskah', '2023-04-09', 'paskah.jpg', 1),
(4, '3', 'Natal', 'Selamat Natal', '2023-12-25', 'natal.jpg', 1),
(5, '1', 'Gereja', 'Gereja Bagus Lagi', '2023-04-17', 'gerejaLagi.jpg', 1),
(7, '1', 'Gereja Lagi dan Lagi', 'Gereja Bagusssss', '2023-04-10', 'gambar_gereja.jpg', 1),
(8, '2', 'Paskahhhhh', 'Selamat Paskah', '2023-04-09', 'paskah.jpg', 1),
(9, '1', 'Natallll', 'Selamat Natal', '2023-12-25', 'natal.jpg', 1),
(10, '2', 'tes', 'Selamat Paskah', '2023-04-24', 'gerejaLagi.jpg', 1),
(11, '1', 'Gereja', 'Selamat Paskah', '2023-04-24', 'paskah.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `idgereja`) VALUES
(1, 'Bagaimana cara bergabung dalam pelayanan disini?', 'Disini ada beberapa pelayanan seperti musik. pujian, visual, tarian, dll. Setiap orang yang telah menjadi jemaat, dapat mendaftarkan diri melalui sekretariat gereja. Beberapa tim pelayanan akan melakukan audisi untuk setiap calon anggota yang mendaftarkan diri.', 1),
(2, 'Bagaimana caranya ikut persekutuan disini?', 'Kategori persekutuan disini daat ini adalah keluarga, dewasa dan taruna tersebar di berbagai area di Bandung dan sekitarnya. Untuk bergabung dengan salah satu persekutuan sesuai dengan kategori yang diinginkan, silahkan menghubungi sekretariat gereja yang nantinya akan diarahkan ke Ketua Persekutuan.', 1),
(3, 'Kemana saya dapat memberikan persembahan?', 'Persembahan syukur, persembahan khusus dapat dilakukan melalui transfer atau melalui aplikasi-aplikasi pembayaran pada menu persembahan. Silahkan lihat laman Persembahan, untuk melihat QR code dan nomor rekening.', 1),
(4, 'Bagaimana caranya menjadi jemaat disini?', 'Saudara dapat bergabung menjadi jemaat disini setelah menyelesaikan rangkaian kelas Hidup Baru dan Hidup Berkemenangan. Setelah melalui rangkaian kelas ini, Saudara dapat menghubungi sekretariat gereja untuk mendaftarkan diri sebagai jemaat.', 1),
(5, 'Bagaimana cara mendapatkan Baptisan disini?', 'Saudara dapat mengisi formulir yang telah kami sediakan dan tertera pada menu Formulir kemudian Saudara mencari formulir Baptisme dan dapat dilengkapi disana.', 1),
(6, 'Contoh Pertanyaan', 'Jawabannya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `kategori`, `file_name`, `gambar`, `idgereja`) VALUES
(130, 2, 'messageImage_1627966438871.jpg', '2023-05-09 00:57:41', 1),
(131, 2, 'messageImage_1634361735129.jpg', '2023-05-09 00:57:41', 1),
(132, 10, 'messageImage_1634361735129.jpg', '2023-05-09 01:36:49', 1),
(133, 10, 'messageImage_1634370346060.jpg', '2023-05-09 01:36:49', 1),
(134, 11, 'messageImage_1627879147302.jpg', '2023-05-09 14:50:49', 1),
(135, 11, 'messageImage_1627879222188.jpg', '2023-05-09 14:50:49', 1),
(136, 1, 'messageImage_1634361735129.jpg', '2023-05-09 14:51:33', 1),
(137, 1, 'messageImage_1634370346060.jpg', '2023-05-09 14:51:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galerikategori`
--

CREATE TABLE `galerikategori` (
  `idKategoriGaleri` int(11) NOT NULL,
  `namaKategori` varchar(255) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerikategori`
--

INSERT INTO `galerikategori` (`idKategoriGaleri`, `namaKategori`, `idgereja`) VALUES
(1, 'Retreat Teen', 1),
(2, 'Retreat Dewasa', 1),
(7, 'Retreat Nikah', 1),
(8, 'Retreat Keluarga', 1),
(10, 'Retreat Karyawan', 1),
(11, 'Retreat Dosen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gereja`
--

CREATE TABLE `gereja` (
  `idgereja` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `namapenanggung` varchar(100) NOT NULL,
  `nikpenanggung` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `ktppenanggung` varchar(500) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL,
  `waktudaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `waktukonfirmasi` datetime NOT NULL DEFAULT current_timestamp(),
  `konfirmasi` bit(1) NOT NULL DEFAULT b'0',
  `email` varchar(50) NOT NULL,
  `jamoperasional` varchar(500) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tentang` varchar(5000) NOT NULL,
  `informasipendeta` varchar(5000) NOT NULL,
  `rekeningpersembahan` varchar(500) NOT NULL,
  `fotopersembahan` varchar(500) NOT NULL,
  `fotogereja` varchar(500) NOT NULL,
  `fotopendeta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gereja`
--

INSERT INTO `gereja` (`idgereja`, `nama`, `link`, `namapenanggung`, `nikpenanggung`, `alamat`, `nohp`, `ktppenanggung`, `visi`, `misi`, `waktudaftar`, `waktukonfirmasi`, `konfirmasi`, `email`, `jamoperasional`, `kota`, `tentang`, `informasipendeta`, `rekeningpersembahan`, `fotopersembahan`, `fotogereja`, `fotopendeta`) VALUES
(1, 'Gereja Kita', 'gerejakita', 'Sutrisno', '357070920710006', 'Jl. Siwalankerto no. 101', '081567834672', 'ktp.png', 'Menjadi Gereja yang berkualitas dan takut akan Tuhan', 'Mempertahankan INTEGRITAS, CIVILITAS dan KREDIBILITAS', '2023-05-21 23:20:33', '2023-05-21 23:20:33', b'0', 'gerejakita@gmail.com', 'Senin-Sabtu Open hours: 10.00-18.00', 'Surabaya', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.  Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 'BCA 081.2.3456.0 ', 'QRCode.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inputkegiatan`
--

CREATE TABLE `inputkegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(50) NOT NULL,
  `pendaftaran` bit(1) DEFAULT NULL,
  `biayapendaftaran` int(11) DEFAULT NULL,
  `kuota` int(6) NOT NULL,
  `gender` bit(2) NOT NULL,
  `usiamin` int(3) NOT NULL,
  `usiamax` int(3) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inputkegiatan`
--

INSERT INTO `inputkegiatan` (`id`, `nama`, `tanggal`, `deskripsi`, `poster`, `pendaftaran`, `biayapendaftaran`, `kuota`, `gender`, `usiamin`, `usiamax`, `idgereja`) VALUES
(26, 'Perjamuan Kudus', '2023-06-18', 'Acara perjamuan kudus yang bisa diterima oleh semua jemaat. Diadakan pada setiap awal bulan termasuk awal bulan Juli.', 'perjamuankudus.jpg', b'0', 0, 0, b'00', 0, 0, 1),
(27, 'Penyerahan Anak', '2023-06-24', 'Upacara penyerahan anak yang akan diadakan di minggu ketiga bulan Juni. Jemaat yang ingin menyerahkan anaknya bisa mendaftar di form yang tersedia.', 'penyerahananak.jpg', b'0', 0, 0, b'00', 0, 0, 1),
(28, 'Ibadah Mingguan', '2023-06-18', 'Ibadah yang diadakan setiap minggu. Minggu ini akan mengangkat tema \"Praise the Lord\" dengan dipimpin oleh Pdt. ABC.', 'ibadahmingguan.jpg', b'0', 0, 0, b'00', 0, 0, 1),
(36, 'Retreat Gereja Tahunan', '2023-06-16', 'Acara untuk bonding antar anggota gereja. Bisa diikuti anak-anak mulai usia 10-20 tahun. Berlangsung 2 hari.', 'retreat gereja.jpg', b'1', 100000, 2, b'00', 0, 0, 1),
(37, 'Makan bersama teman-teman', '2023-06-24', 'Kegiatan makan bersama untuk menjalin keeratan antar saudara. Dilakukan oleh remaja usia 10 sampai 30 tahun. ', 'makan-bersama-di-meja-makan.jpg', b'1', 0, 100, b'01', 20, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inputpenggalangandana`
--

CREATE TABLE `inputpenggalangandana` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `subjudul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` date NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inputpenggalangandana`
--

INSERT INTO `inputpenggalangandana` (`id`, `kategori`, `judul`, `subjudul`, `deskripsi`, `deadline`, `terkumpul`, `target`, `poster`, `idgereja`) VALUES
(1, '1', 'Penggalangan Dana 1', '', 'Ini adalah penggalangan dana yang pertama pada gereja ini.', '2023-05-15', 5010000, 10000000, 'donasi gereja.jpeg', 1),
(2, '1', 'Penggalangan Dana 2', '', 'Percobaan penggalangan dana yang kedua', '2023-05-10', 1500000, 5000000, 'galang dana.jpg', 1),
(3, '1', 'Gereja', '', 'Ini adalah penggalangan dana yang pertama pada gereja ini.', '2023-05-11', 500, 4000, 'galang dana.jpg', 1),
(4, '1', 'tes', '', 'tes lagi', '2023-05-16', 0, 25000000, 'donasi gereja.jpeg', 1),
(5, '3', 'Perpuluhan yang Pertama', '', 'Sisihkan dana Anda untuk perpuluhan di gereja', '0000-00-00', 50000, 0, 'perpuluhan.jpg', 1),
(6, '2', 'persembahan hore', '', 'ini coba yang kategori persembahan', '0000-00-00', 0, 0, 'persembahan.jpg', 1),
(7, '2', 'judul', 'sub judulnya', 'deskripsinya', '0000-00-00', 0, 0, 'Motovun_Jack.svg.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `namaJabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `namaJabatan`) VALUES
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
-- Table structure for table `jadwalpendeta`
--

CREATE TABLE `jadwalpendeta` (
  `idjadwal` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `pendeta` int(11) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwalpendeta`
--

INSERT INTO `jadwalpendeta` (`idjadwal`, `tema`, `tanggal`, `pendeta`, `deskripsi`, `idgereja`) VALUES
(1, 'Penciptaan Manusia', '2023-05-20', 5, 'Mengapa manusia harus diciptakan? dan apa tujuan kita hidup di dunia ini?', 1),
(4, 'Kejatuhan Manusia', '2023-05-27', 7, 'Apa itu kejatuhan dan kenapa manusia bisa jatuh dari creation yang Allah yang diciptakan segambar dan serupa dengan diri-Nya?', 1),
(5, 'Manusia dan Ular', '2023-06-03', 10, 'Ular di kehidupan manusia yang sekarang, seperti apa wujudnya?', 1),
(7, 'Creation, Fall, Redemption, and Consummation', '2023-06-24', 5, 'Penciptaan awal manusia, bagaimana manusia jatuh ke dalam dosa, dan penebusan yang dilakukan oleh Yesus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Penggalangan Dana'),
(2, 'Persembahan Gereja'),
(3, 'Perpuluhan');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriberita`
--

CREATE TABLE `kategoriberita` (
  `id` int(11) NOT NULL,
  `namaKategoriBerita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriberita`
--

INSERT INTO `kategoriberita` (`id`, `namaKategoriBerita`) VALUES
(1, 'Ibadah Umum'),
(3, 'Ibadah Pemuda Pemudi (YOUTH)'),
(4, 'Acara Gereja'),
(5, 'Komsel Gabungan'),
(6, 'Ibadah Doa');

-- --------------------------------------------------------

--
-- Table structure for table `keuangankegiatan`
--

CREATE TABLE `keuangankegiatan` (
  `idkk` int(11) NOT NULL,
  `idkegiatan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tipekeuangan` bit(1) NOT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `tanggal` date NOT NULL DEFAULT curdate(),
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangankegiatan`
--

INSERT INTO `keuangankegiatan` (`idkk`, `idkegiatan`, `nama`, `penanggungjawab`, `bukti`, `tipekeuangan`, `keterangan`, `jumlah`, `tanggal`, `idgereja`) VALUES
(6, 36, 'Makan bersama panitia acara', 'Caroline', '778193.jpg', b'1', 'Makan-makan sebelum rapat', 1000000, '2023-05-02', 1),
(7, 36, 'Makan-makan peserta', 'Caroline', 'bintel3.png', b'0', '', 200000, '2023-05-05', 1),
(8, 36, 'balabala', 'Caroline', '-', b'1', '', 200000, '2023-06-13', 1),
(9, 36, 'Lalalala', 'Caroline', '-', b'0', '', 20000, '2023-05-22', 1),
(10, 36, 'Tes123', 'Caroline', '-', b'0', '', 300000, '2023-05-25', 1),
(11, 36, 'Tes Keluar', 'Caroline', '-', b'1', '', 500000, '2023-05-09', 1),
(12, 36, 'Sumbangan teman', 'Caroline', '-', b'0', '', 200000, '2023-05-09', 1),
(13, 36, 'Dana dari gereja', 'Caroline', '-', b'1', '', 1000000, '2023-05-23', 1),
(14, 36, 'Survei tempat', 'Caroline', '-', b'1', '', 300000, '2023-05-17', 1),
(15, 36, 'Sumbangan jemaat', 'Caroline', '-', b'0', '', 750000, '2023-05-19', 1),
(16, 36, 'Akomodasi panitia', 'Caroline', '-', b'1', '', 350000, '2023-05-30', 1),
(18, 36, 'Urunan panitia', 'Caroline', '-', b'0', '', 250000, '2023-05-29', 1),
(19, 36, 'Dana dari gereja', 'Caroline', '-', b'0', '', 500000, '2023-06-09', 1),
(20, 36, 'Akomodasi tamu', 'Caroline', '-', b'1', '', 820000, '2023-06-09', 1),
(21, 36, 'Urunan panitia', 'Caroline', '-', b'0', '', 200000, '2023-06-13', 1),
(28, 36, 'Registrasi jemaat', 'Caroline', '-', b'0', '', 1000000, '2023-06-09', 1),
(29, 36, 'Registrasi awal', 'Caroline', '-', b'0', '', 1000000, '2023-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `idPembayaran` int(11) NOT NULL,
  `metodeBayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`idPembayaran`, `metodeBayar`) VALUES
(1, 'BCA'),
(2, 'Sakuku'),
(3, 'OVO'),
(4, 'Dana'),
(5, 'Gopay'),
(6, 'Link Aja'),
(7, 'Shopeepay');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarankegiatan`
--

CREATE TABLE `pendaftarankegiatan` (
  `idpk` int(11) NOT NULL,
  `idkegiatan` int(11) NOT NULL,
  `idpeserta` int(11) NOT NULL,
  `statuspembayaran` bit(2) NOT NULL,
  `waktudaftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktukonfirmasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `buktipembayaran` varchar(100) DEFAULT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftarankegiatan`
--

INSERT INTO `pendaftarankegiatan` (`idpk`, `idkegiatan`, `idpeserta`, `statuspembayaran`, `waktudaftar`, `waktukonfirmasi`, `buktipembayaran`, `idgereja`) VALUES
(1, 36, 1, b'00', '2023-05-08 15:11:21', '2023-05-13 08:06:24', 'buktibayar.jpeg', 1),
(2, 36, 2, b'01', '2023-05-08 15:11:21', '2023-05-16 11:23:38', 'buktibayar.jpeg', 1),
(3, 36, 3, b'01', '2023-05-08 15:11:21', '2023-05-15 15:35:07', 'buktibayar.jpeg', 1),
(16, 36, 4, b'00', '2023-05-16 11:29:46', '2023-05-16 11:29:46', 'Motovun_Jack.svg.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendeta`
--

CREATE TABLE `pendeta` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `idgereja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendeta`
--

INSERT INTO `pendeta` (`id`, `jabatan`, `nama`, `biodata`, `foto`, `idgereja`) VALUES
(5, '7', 'Pdt. Agus Supriono', 'Lahir pada tanggal 31 juli 1961, Pernah melakukan perjalanan Misionari ke kedalaman desa di kalimantan barat', '644769127739e7.43077663.png', 1),
(7, '2', 'Pdt. Budi Setiawan ', 'Lahir pada tanggal 12 Desember 1965. Melakukan perjalanan misionaris di pedalaman sumatra untuk mewartakan injil Yesus.', '6447761c1bc670.99199739.png', 1),
(10, '5', 'Ibu Tuti Handayati M.Acc.', 'Lahir pada tanggal 19 mei 1971. Menempuh pendidikan sebagai margister akutansi di Univesitas Indonesia', '6447757e50d2b2.09087060.png', 1),
(11, '5', 'Alan Satria Julius Putra Hermawan', 'ini setelah di update', '64477ccd0013b5.20211656.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akunjemaat`
--
ALTER TABLE `akunjemaat`
  ADD PRIMARY KEY (`idAkun`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerikategori`
--
ALTER TABLE `galerikategori`
  ADD PRIMARY KEY (`idKategoriGaleri`);

--
-- Indexes for table `gereja`
--
ALTER TABLE `gereja`
  ADD PRIMARY KEY (`idgereja`);

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
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `jadwalpendeta`
--
ALTER TABLE `jadwalpendeta`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `kategoriberita`
--
ALTER TABLE `kategoriberita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangankegiatan`
--
ALTER TABLE `keuangankegiatan`
  ADD PRIMARY KEY (`idkk`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

--
-- Indexes for table `pendaftarankegiatan`
--
ALTER TABLE `pendaftarankegiatan`
  ADD PRIMARY KEY (`idpk`);

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
-- AUTO_INCREMENT for table `akunjemaat`
--
ALTER TABLE `akunjemaat`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `galerikategori`
--
ALTER TABLE `galerikategori`
  MODIFY `idKategoriGaleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gereja`
--
ALTER TABLE `gereja`
  MODIFY `idgereja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inputkegiatan`
--
ALTER TABLE `inputkegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `inputpenggalangandana`
--
ALTER TABLE `inputpenggalangandana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwalpendeta`
--
ALTER TABLE `jadwalpendeta`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoriberita`
--
ALTER TABLE `kategoriberita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keuangankegiatan`
--
ALTER TABLE `keuangankegiatan`
  MODIFY `idkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `idPembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftarankegiatan`
--
ALTER TABLE `pendaftarankegiatan`
  MODIFY `idpk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendeta`
--
ALTER TABLE `pendeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
