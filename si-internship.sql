-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 04:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `kd_bimbingan` int(11) NOT NULL,
  `kd_pendaftaran` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`kd_bimbingan`, `kd_pendaftaran`, `npm`, `nik`, `status`) VALUES
(1, 6, 2173001, 11367162, 'Approve'),
(2, 7, 2173003, 10983133, NULL),
(3, 9, 2173004, 2288838, NULL),
(4, 10, 2173005, 2288838, NULL),
(5, 11, 2173006, 55666554, NULL),
(6, 12, 2173007, 55666554, NULL),
(7, 12, 2173007, 212100999, NULL),
(8, 13, 2173008, 55666554, 'Approve'),
(9, 14, 2173009, 212100999, 'Approve'),
(10, 15, 2173010, 11367162, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bimbingan`
--

CREATE TABLE `detail_bimbingan` (
  `kd_bimbingan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `kd_detail_bimbingan` int(11) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `topik_bimbingan` text NOT NULL,
  `status_bimbingan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bimbingan`
--

INSERT INTO `detail_bimbingan` (`kd_bimbingan`, `npm`, `kd_detail_bimbingan`, `tanggal_bimbingan`, `topik_bimbingan`, `status_bimbingan`) VALUES
(1, 2173001, 1, '2019-07-19', 'tes', 'Approve'),
(1, 2173001, 2, '2019-07-20', 'tesd', 'Approve'),
(1, 2173001, 3, '0000-00-00', 'lala', 'Approve'),
(1, 2173001, 6, '2019-07-26', 'aku kamu', 'Approve'),
(1, 2173001, 7, '2019-07-31', 'sss', 'Approve'),
(1, 2173001, 8, '2019-07-18', 'ffff', 'Approve'),
(3, 2173004, 9, '2019-08-10', 'yyuiojjuqewjd\r\n', 'Approve'),
(3, 2173004, 10, '2019-07-12', 'jfhqeuy278ywndjiladj', 'Approve'),
(3, 2173004, 11, '2019-07-20', 'dhuwhinsna', 'Approve'),
(4, 2173005, 12, '2019-07-11', 'jndjuwah8ujma', 'Approve'),
(4, 2173005, 13, '2019-07-18', 'ndsuyejkwqaw', 'Approve'),
(4, 2173005, 14, '2019-07-24', 'jhw8u8ijmklsm\r\n', 'Approve'),
(5, 2173006, 15, '2020-04-03', 'huhdsank', 'Approve'),
(5, 2173006, 16, '0000-00-00', 'snqhiueua', 'Approve'),
(5, 2173006, 17, '2020-04-09', 'huiwhinxqwh', 'Approve'),
(7, 2173007, 18, '2020-04-04', 'dewfeeq', 'Approve'),
(7, 2173007, 19, '2020-04-08', 'e nejew,', 'Approve'),
(7, 2173007, 20, '2020-04-20', 'rjjrklwlk', 'Approve'),
(8, 2173008, 21, '2020-12-02', 'jnjiewji', 'Approve'),
(8, 2173008, 22, '2020-12-03', 'jqeuiijac', 'Approve'),
(8, 2173008, 23, '2020-12-04', 'kjoijodeew', 'Approve'),
(9, 2173009, 24, '2021-02-12', 'knuihwnf', 'Approve'),
(9, 2173009, 25, '2121-02-13', 'jwnuiiow', 'Approve'),
(9, 2173009, 26, '2021-02-18', 'jqeijejkwk', 'Approve'),
(10, 2173010, 27, '2021-03-09', 'hjuyujb', 'Approve'),
(10, 2173010, 28, '2021-03-22', 'nfwhuia', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `prodi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `prodi`) VALUES
(2288838, 'Muh Ibnu Choldun', 'D3 Manajemen Informatika'),
(10983133, 'Supono S.T., M.T.', 'D3 Manajemen Informatika'),
(11367162, 'Virdiandry Putratama S.T.,M.Kom ', 'D3 Manajemen Informatika'),
(55666554, 'Maniah S.T.,M.Kom', 'D3 Manajemen Informatika'),
(212100999, 'Sari Armiati, S.Si.,M.T.', 'D3 Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `draft_sidang`
--

CREATE TABLE `draft_sidang` (
  `kd_bimbingan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `terlambat` varchar(5) NOT NULL,
  `cd` varchar(5) DEFAULT NULL,
  `laporan` varchar(5) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft_sidang`
--

INSERT INTO `draft_sidang` (`kd_bimbingan`, `npm`, `tgl_pengumpulan`, `terlambat`, `cd`, `laporan`, `status`) VALUES
(1, 2173001, '2019-07-18', 'iya', 'ada', NULL, 'Approve'),
(3, 2173004, '2019-07-22', 'tidak', 'ada', 'ada', NULL),
(4, 2173005, '2019-07-22', 'tidak', 'ada', 'ada', NULL),
(5, 2173006, '2020-07-22', 'tidak', 'ada', 'ada', NULL),
(8, 2173008, '2020-07-22', 'iya', 'ada', 'ada', 'Approve'),
(9, 2173009, '2021-12-20', 'iya', 'ada', 'ada', 'Approve'),
(7, 2173007, '2020-07-22', 'tidak', 'ada', 'ada', NULL),
(10, 2173010, '2021-07-22', 'tidak', 'ada', 'ada', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `prodi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `kelas`, `prodi`) VALUES
(2173001, 'Eunike Putri', '2A', 'D3 Manajemen Informatika'),
(2173002, 'Agung Gumelar', '2B', 'D3 Manajemen Informatika'),
(2173003, 'Siska Fransiska', '2A', 'D3 Manajemen Informatika'),
(2173004, 'Ahdi Adha', '3A', 'D3 Manajemen Informatika'),
(2173005, 'Budi Amin', '3A', 'D3 Manajemen Informatika'),
(2173006, 'Lala Lini', '3A', 'D3 Manajemen Informatika'),
(2173007, 'Herna Marleni', '3A', 'D3 Manajemen Informatika'),
(2173008, 'Husein Ali', '3A', 'D3 Manajemen Informatika'),
(2173009, 'Maya Sari', '2B', 'D3 Manajemen Informatika'),
(2173010, 'Baharudin', '1B', 'D3 Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pembukuan`
--

CREATE TABLE `pembukuan` (
  `kd_sidang` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `tgl_pembukuan` date NOT NULL,
  `terlambat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembukuan`
--

INSERT INTO `pembukuan` (`kd_sidang`, `npm`, `tgl_pembukuan`, `terlambat`) VALUES
(1, 2173001, '2019-08-07', 'tidak'),
(8, 2173010, '2020-12-09', 'tidak'),
(7, 2173009, '2020-12-02', 'tidak'),
(6, 2173008, '2020-03-30', 'tidak'),
(0, 2173007, '0000-00-00', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kd_pendaftaran` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `nama_perusahaan` varchar(35) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `upload_dhs` text NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kd_pendaftaran`, `npm`, `tgl_pendaftaran`, `nama_perusahaan`, `alamat_perusahaan`, `upload_dhs`, `status`) VALUES
(6, 2173001, '2019-07-28', 'PT. INDOsss', 'BANDUNGsss', '2173001.jpeg', 'Approve'),
(7, 2173003, '2019-07-31', 'PT. Manfaat', 'Bandung', '2173003.jpg', NULL),
(8, 2173002, '2019-07-31', 'PT. In Say', 'Bandung', '2173002.jpg', NULL),
(9, 2173004, '2019-07-01', 'PT. HNA', 'BANDUNG', '2173004.jpg', NULL),
(10, 2173005, '2019-07-02', 'PT. HNAA', 'SURABAYA', '2173005.jpg', NULL),
(11, 2173006, '2020-02-04', 'PT.GEMA', 'BENGKULU\r\n', '2173006.jpg', NULL),
(12, 2173007, '2020-07-22', 'PT.BTA', 'BANDUNG', '2173007.jpg', NULL),
(13, 2173008, '2020-12-01', 'PT.BTA', 'BANDUNG', '2173008.jpg', 'Approve'),
(14, 2173009, '2021-02-03', 'PT. HNAA', 'JAKARTA', '2173009.jpg', 'Approve'),
(15, 2173010, '2021-03-12', 'PT.GEMA', 'BENGKULU', '2173010.jpg', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `kd_sidang` int(11) NOT NULL,
  `kd_bimbingan` int(11) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `waktu_sidang` time NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `nik_penguji` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `upload_berita_acara` text,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`kd_sidang`, `kd_bimbingan`, `tgl_sidang`, `waktu_sidang`, `ruangan`, `nik_penguji`, `nilai`, `upload_berita_acara`, `status`) VALUES
(1, 1, '2019-08-01', '15:45:00', '302', 11367162, 97, '1.jpg', 'Approve'),
(2, 3, '2019-07-23', '21:00:00', 'COT', 10983133, 90, '2.jpg', NULL),
(3, 4, '2019-09-22', '21:00:00', 'COT', 11367162, 89, '3.jpg', NULL),
(4, 5, '2020-09-23', '21:00:00', 'COT', 2288838, 90, '4.jpg', NULL),
(5, 6, '2020-09-12', '21:00:00', 'COT', 212100999, 89, '5.jpg', NULL),
(6, 8, '2020-12-23', '21:00:00', 'COT', 10983133, 80, '6.jpg', 'Approve'),
(7, 9, '2021-09-22', '21:00:00', 'COT', 55666554, 90, '7.jpg', 'Approve'),
(8, 10, '2021-11-09', '21:00:00', 'COT', 55666554, 85, '8.jpg', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`, `id`) VALUES
('2121', '2121', 'dosen', 212100999),
('2173002', '2173002', 'mahasiswa', 2173002),
('2173003', '2173003', 'mahasiswa', 2173003),
('2173004', '2173004', 'mahasiswa', 2173004),
('2173005', '2173005', 'mahasiswa', 2173005),
('2173006', '2173006', 'mahasiswa', 2173006),
('2173007', '2173007', 'mahasiswa', 2173007),
('2173008', '2173008', 'mahasiswa', 2173008),
('2173009', '2173009', 'mahasiswa', 2173009),
('2173010', '2173010', 'mahasiswa', 2173010),
('2211', '2211', 'koordinator', 2288838),
('3131', '3131', 'dosen', 55666554),
('admin', 'admin', 'admin', 0),
('dosen', 'dosen', 'dosen', 10983133),
('kaprodi', '2323', 'kaprodi', 11367162),
('koordinator', '2323', 'kaprodi', 11367162),
('mahasiswa', 'mahasiswa', 'mahasiswa', 2173001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`kd_bimbingan`);

--
-- Indexes for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  ADD PRIMARY KEY (`kd_detail_bimbingan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`kd_pendaftaran`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`kd_sidang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `kd_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  MODIFY `kd_detail_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kd_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `kd_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
