-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 03:35 AM
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
  `rekomendasi` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`kd_bimbingan`, `kd_pendaftaran`, `npm`, `nik`, `rekomendasi`, `status`) VALUES
(15, 18, 2173010, 10983133, 'Rekomendasi', NULL),
(16, 21, 2173010, 55666554, 'Rekomendasi', NULL);

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
(15, 2173010, 32, '2019-08-01', 'ASD', 'Approve'),
(15, 2173010, 33, '2019-08-02', 'ASD', 'Approve'),
(15, 2173010, 34, '2019-08-03', 'ASD', 'Approve'),
(16, 2173010, 35, '2019-08-10', 'ASD', 'Approve'),
(16, 2173010, 36, '2019-08-09', 'ASD', 'Approve');

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
  `judul_laporan` text NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft_sidang`
--

INSERT INTO `draft_sidang` (`kd_bimbingan`, `npm`, `tgl_pengumpulan`, `terlambat`, `judul_laporan`, `status`) VALUES
(16, 2173010, '2019-08-10', 'tidak', 'Hikayat Mimi Peri', 'Approve'),
(15, 2173010, '2019-08-10', 'tidak', 'Hikayat Mama Perih', 'Approve');

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
  `terlambat` varchar(5) NOT NULL,
  `cd` varchar(10) DEFAULT NULL,
  `laporan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembukuan`
--

INSERT INTO `pembukuan` (`kd_sidang`, `npm`, `tgl_pembukuan`, `terlambat`, `cd`, `laporan`) VALUES
(14, 2173010, '2019-08-10', 'tidak', 'ada', NULL);

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
  `upload_balasan` text,
  `diterima` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kd_pendaftaran`, `npm`, `tgl_pendaftaran`, `nama_perusahaan`, `alamat_perusahaan`, `upload_dhs`, `upload_balasan`, `diterima`, `status`) VALUES
(18, 2173010, '2019-07-31', 'PT. INDO', 'ASD', '2173010.png', '', 'Diterima', 'Approve'),
(19, 2173009, '2019-07-31', 'PT. WWE', 'BANDUNG', '2173009.png', '', '', NULL),
(20, 2173001, '2019-07-31', 'PT. INDO', 'BANDUNG', '2173001.png', '', 'Diterima', NULL),
(21, 2173010, '2019-08-10', 'PT. ASD', 'BANDUNG', '2173010.png', '', NULL, 'Approve'),
(22, 2173003, '2020-02-08', 'PT. INDO', 'SURABAYA', '2173003.png', '2173003.png', NULL, NULL);

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
(14, 16, '2019-08-10', '21:30:00', 'COT', 10983133, 80, '14.png', 'Approve'),
(15, 15, '2019-08-10', '21:30:00', 'COT', 212100999, NULL, NULL, NULL);

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
  MODIFY `kd_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  MODIFY `kd_detail_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kd_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `kd_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
