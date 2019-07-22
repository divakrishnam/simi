-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 01:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

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
(2, 7, 2173003, 10983133, NULL);

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
(1, 2173001, 3, '0000-00-00', 'lala', NULL),
(1, 2173001, 6, '2019-07-26', 'aku kamu', NULL),
(1, 2173001, 7, '2019-07-31', 'sss', NULL),
(1, 2173001, 8, '2019-07-18', 'ffff', NULL);

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
(10983133, 'Supono S.T., M.T.', 'D3 Manajemen Informatika'),
(11367162, 'Mubassiran, S.Si., M.T. ', 'D3 Manajemen Informatika');

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
(1, 2173001, '2019-07-18', 'iya', 'ada', NULL, 'Approve');

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
(2173003, 'Siska Fransiska', '2A', 'D3 Manajemen Informatika');

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
(1, 2173001, '2019-08-07', 'tidak');

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
(8, 2173002, '2019-07-31', 'PT. In Say', 'Bandung', '2173002.jpg', NULL);

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
(1, 1, '2019-08-01', '15:45:00', '302', 11367162, 97, '1.jpg', 'Approve');

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
('2173002', '2173002', 'mahasiswa', 2173002),
('2173003', '2173003', 'mahasiswa', 2173003),
('admin', 'admin', 'admin', 0),
('dosen', 'dosen', 'dosen', 10983133),
('kaprodi', 'kaprodi', 'kaprodi', 11367162),
('koordinator', 'koordinator', 'koordinator', 11367162),
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
  MODIFY `kd_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  MODIFY `kd_detail_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kd_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `kd_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
