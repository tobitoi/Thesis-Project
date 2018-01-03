-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 08:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE IF NOT EXISTS `agen` (
  `idAgen` varchar(50) NOT NULL,
  `namaAgen` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`idAgen`, `namaAgen`, `alamat`) VALUES
('BKS', 'BINTANG KARTIKA SAMUDERA, PT', 'Jln. Pramuka Raya Kav 151 Gd Is Plaza Lt 10 R 1001'),
('ECS', 'TANTO1', 'bajigau'),
('IBS', 'INDAH BUANA SAMUDERA, PT', 'JL.PRAMUKA RAYA KA.151 GD.IS JAKARTA TIMUR'),
('JKP', 'JAYA KUSUMA PERDANA LINES, PT', 'JL.MADIDIR URE LINGK.III BITUNG'),
('MRT', 'MERATUS LINE, PT', 'JAKARTA PUSAT'),
('PAB', 'PELITA ANUGERAH BAHARI, PT', 'JL.ALUR KIAT BLOK 6G NO.5 KOJA JAKARTA UTARA'),
('SLP', 'SALAM PACIFIC INDONESIA, PT', 'JL.KARET N.104 BONGKARAN-PABEAN CANTIAN SURABAYA'),
('TAS', 'TEMAS LINE, PT', 'JAKARTA BARAT'),
('TCo', 'adbcdajflaf123', 'balagjagjajglagja'),
('TCP', 'TIRTACIPTA M.PERSADA, PT', 'JL.POLO KAMBING RAYA KAV.II BLOK E NO.7JAKARTA TIM'),
('TNT', 'TANTO INTIM,  PT', 'JL.TUGU ARU NO.36 BITUNG');

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE IF NOT EXISTS `container` (
`kode` int(11) NOT NULL,
  `idkontainer` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `blok` varchar(4) NOT NULL,
  `row` int(3) NOT NULL,
  `slot` int(3) NOT NULL,
  `tier` int(3) NOT NULL,
  `idKapal` int(20) NOT NULL,
  `idAlat` varchar(20) NOT NULL,
  `tanggalm` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`kode`, `idkontainer`, `status`, `blok`, `row`, `slot`, `tier`, `idKapal`, `idAlat`, `tanggalm`) VALUES
(30, 'SPNU2780879 ', '2', 'E', 5, 5, 5, 162415, 'cc03', '2016-10-13 19:16:54'),
(31, 'JPLU3007149 ', '3', 'Q', 3, 3, 2, 141551, 'cc06', '2016-06-02 15:55:17'),
(32, 'JPLU3028181 ', '3', 'Q', 3, 2, 1, 141551, 'cc06', '2016-09-20 02:14:42'),
(33, 'SPNU2968444 ', '3', 'E', 3, 3, 3, 162415, 'cc03', '2016-09-20 02:13:14'),
(34, 'MRTU2069599 ', '2', 'A', 1, 1, 1, 141551, 'cc01', '2016-10-13 20:29:12'),
(35, 'MRTU2072592 ', '1', 'A', 1, 1, 2, 162415, 'cc01', '2016-09-20 02:16:59'),
(36, 'SPNU2978151 ', '1', 'B', 1, 1, 1, 162415, 'cc01', '2016-09-20 02:17:21'),
(38, 'TEGU7052900 ', '1', 'C', 1, 1, 2, 141551, 'cc01', '2016-09-20 02:19:37'),
(40, 'TEGU7002108 ', '2', 'A', 2, 2, 2, 141551, 'cc01', '2016-10-14 19:21:48'),
(41, 'TGS123', '2', 'm', 4, 2, 5, 1234, 'cc01', '2016-10-14 09:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE IF NOT EXISTS `kapal` (
  `idKapal` int(20) NOT NULL,
  `Nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`idKapal`, `Nama`) VALUES
(1234, 'KM TANTO'),
(141551, 'STRAIT MAS MV'),
(162415, 'AMAZON KM');

-- --------------------------------------------------------

--
-- Table structure for table `masteralat`
--

CREATE TABLE IF NOT EXISTS `masteralat` (
  `idAlat` varchar(20) NOT NULL,
  `namaAlat` varchar(20) NOT NULL,
  `statusa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masteralat`
--

INSERT INTO `masteralat` (`idAlat`, `namaAlat`, `statusa`) VALUES
('cc01', 'Crane 01', 'baik'),
('cc02', 'Crane 02', 'baik'),
('cc03', 'Crane 03', 'baik'),
('cc04', 'Crane 04', 'baik'),
('cc05', 'Crane 05', 'rusak'),
('cc06', 'Crane 06', 'baik'),
('cc07', 'Crane 07', 'baik'),
('tango1', 'Tango 01', 'baik'),
('tango5', 'Tango5', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `masterkontainer`
--

CREATE TABLE IF NOT EXISTS `masterkontainer` (
  `idkontainer` varchar(20) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `size` int(3) NOT NULL,
  `idAgen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterkontainer`
--

INSERT INTO `masterkontainer` (`idkontainer`, `tipe`, `size`, `idAgen`) VALUES
('JPLU3007149 ', 'DRY', 20, 'JKP'),
('JPLU3028181 ', 'DRY', 20, 'JKP'),
('MRTU2069599 ', 'DRY', 20, 'MRT'),
('MRTU2072592 ', 'DRY', 20, 'MRT'),
('SPNU2780879 ', 'DRY', 20, 'SLP'),
('SPNU2968444 ', 'DRY', 20, 'SLP'),
('SPNU2978151 ', 'UC', 20, 'BKS'),
('TEGU7002108 ', 'UC					', 20, 'TAS'),
('TEGU7052900 ', '	DRY						', 40, 'TAS'),
('TGS123', 'DRY', 40, 'ECS');

-- --------------------------------------------------------

--
-- Table structure for table `pelindo`
--

CREATE TABLE IF NOT EXISTS `pelindo` (
  `IdPegawai` int(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelindo`
--

INSERT INTO `pelindo` (`IdPegawai`, `Nama`, `Alamat`, `tanggal_lahir`) VALUES
(1261008, 'kamtri', 'ponegoro', '1994-03-03'),
(1261025, 'fadli', 'abdesir', '1994-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idkontainer` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idkontainer`, `status`, `tanggal`) VALUES
('JPLU3007149 ', '1', '2016-05-30 23:20:23'),
('MRTU2069599 ', '1', '2016-09-20 02:16:24'),
('MRTU2072592 ', '1', '2016-09-20 02:16:59'),
('SPNU2780879 ', '1', '2016-05-30 20:51:41'),
('SPNU2978151 ', '1', '2016-09-20 02:17:21'),
('TEGU7002108 ', '1', '2016-09-20 02:18:19'),
('TEGU7052900 ', '1', '2016-09-20 02:19:37'),
('TGS123', '1', '2016-10-14 09:43:14'),
('JPLU3007149 ', '2', '2016-06-02 00:16:23'),
('MRTU2069599 ', '2', '2016-10-13 20:29:12'),
('SPNU2780879 ', '2', '2016-10-13 19:16:54'),
('TEGU7002108 ', '2', '2016-10-14 19:21:48'),
('TGS123', '2', '2016-10-14 09:43:42'),
('JPLU3007149 ', '3', '2016-06-02 15:55:17'),
('JPLU3028181 ', '3', '2016-09-20 01:45:44'),
('SPNU2968444 ', '3', '2016-09-20 02:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `statusa`
--

CREATE TABLE IF NOT EXISTS `statusa` (
  `idAlat` varchar(20) NOT NULL,
  `statusa` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusa`
--

INSERT INTO `statusa` (`idAlat`, `statusa`, `tanggal`) VALUES
('cc01', 'baik', '2016-06-02 19:31:19'),
('cc01', 'Rusak', '2016-06-02 19:30:32'),
('cc02', 'baik', '2016-06-02 20:28:57'),
('cc02', 'maintenance', '2016-06-02 20:27:51'),
('cc03', 'baik', '2016-06-02 20:30:05'),
('cc04', 'baik', '2016-06-02 20:30:52'),
('cc05', 'baik', '2016-06-02 20:31:16'),
('cc05', 'rusak', '2016-06-02 20:32:47'),
('cc06', 'baik', '2016-06-02 20:31:28'),
('cc07', 'baik', '2016-06-02 20:31:42'),
('tango5', 'baik', '2016-10-14 09:38:31'),
('tango5', 'rusak', '2016-10-14 09:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('1261025', '6b69c695177e3798fc9a763a2577644f'),
('1261008', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
 ADD PRIMARY KEY (`idAgen`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
 ADD PRIMARY KEY (`kode`), ADD UNIQUE KEY `key` (`kode`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
 ADD PRIMARY KEY (`idKapal`);

--
-- Indexes for table `masteralat`
--
ALTER TABLE `masteralat`
 ADD PRIMARY KEY (`idAlat`);

--
-- Indexes for table `masterkontainer`
--
ALTER TABLE `masterkontainer`
 ADD PRIMARY KEY (`idkontainer`);

--
-- Indexes for table `pelindo`
--
ALTER TABLE `pelindo`
 ADD PRIMARY KEY (`IdPegawai`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status`,`idkontainer`);

--
-- Indexes for table `statusa`
--
ALTER TABLE `statusa`
 ADD PRIMARY KEY (`idAlat`,`statusa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
