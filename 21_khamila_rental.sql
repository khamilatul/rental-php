-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 03:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `21_khamila_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_service`
--

CREATE TABLE `jenis_service` (
  `id` int(11) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_service`
--

INSERT INTO `jenis_service` (`id`, `kode`, `nama`) VALUES
(1, '1', 'ganti oli');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(12) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `telp`) VALUES
(1, 'KR0001', 'khamila', 'kedung', '083834541502'),
(2, 'KR0002', 'arifa', 'cepokomulyo', '0877698');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `no_plat` varchar(12) DEFAULT NULL,
  `tahun` varchar(255) NOT NULL,
  `tarif_perjam` varchar(255) NOT NULL,
  `status_rental` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `no_plat`, `tahun`, `tarif_perjam`, `status_rental`, `type_id`) VALUES
(7, '0', '2019', '567890', '45tgyh', 0),
(567, '0', '2009', '45000', 'ada', 23),
(569, 'jihu12', '201922', '4500022', 'ada2', 458),
(570, 'jihu', '20191', '450001', 'ada1', 457);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `typeuser` varchar(255) NOT NULL,
  `karyawan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `typeuser`, `karyawan_id`) VALUES
(1, 'mila', '25d55ad283aa400af464c76d713c07ad', '', NULL),
(2, 'khamila', '25d55ad283aa400af464c76d713c07ad', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `kode_merk` varchar(12) DEFAULT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `kode_merk`, `nama`) VALUES
(1, 'MRK001', 'yamaha'),
(2, 'MRK002', 'honda');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `no_ktp` varchar(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nip`, `no_ktp`, `nama`, `alamat`, `telp`) VALUES
(1, 'PL0001', '24', 'saya', 'kedung', '5678'),
(2, 'PL0002', '24', 'tyui', 'kedung', '0877698'),
(3, 'PL0003', '476', 'fghj', 'sana', '0877698');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `kode` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id`, `kode`, `nama`, `alamat`, `telp`, `kendaraan_id`) VALUES
(678, 3456, 'saya', 'sana', '867', 224),
(679, 1, 'mila', 'kedufn', '678', 568),
(680, 3456, 'mila', 'sana', '0877698', 569),
(681, 345, 'siwi', 'kepanjen', '9746', 569);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `kode_service` int(11) DEFAULT NULL,
  `tgl` date NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `jenis_service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `kode_service`, `tgl`, `biaya`, `kendaraan_id`, `jenis_service_id`) VALUES
(678, 88, '0000-00-00', '20000', 12, 13),
(6475, 0, '2017-10-14', '56789', 67, 234),
(6476, 678, '2017-10-07', '456789', 567, 0),
(6477, 6789, '2017-10-08', '56789', 567, 0),
(6478, 0, '2017-10-14', '67890', 568, 567),
(6479, 48561, '2017-10-09', '6789011', 569, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `id` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `tgl` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `pemilik_id` int(11) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`id`, `no`, `tgl`, `jumlah`, `pemilik_id`, `karyawan_id`) VALUES
(90, 0, '2017-10-07', 0, 567, 6),
(91, 0, '2017-10-12', 655, 0, 0),
(92, 0, '2017-10-05', 567, 0, 0),
(93, 0, '2017-10-08', 0, 679, 56789),
(94, 0, '2017-10-08', 10, 678, 56789),
(95, 0, '2017-10-19', 647, 679, 0),
(96, 0, '2017-10-25', 30000, 680, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id` int(11) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `no_sim` varchar(11) DEFAULT NULL,
  `tarif_perjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id`, `nis`, `nama`, `alamat`, `telp`, `no_sim`, `tarif_perjam`) VALUES
(1, 'SPR001', 'tyui', 'kedung', '0877698', 'werft', '45000'),
(2, 'SPR002', 'tyui', 'kedung', '5678', 'werft', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksisewa`
--

CREATE TABLE `transaksisewa` (
  `id` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `tglpesan` date DEFAULT NULL,
  `tglpinjam` date DEFAULT NULL,
  `jampinjam` time NOT NULL,
  `tgl_kembali_rencana` date DEFAULT NULL,
  `jam_kembali_rencana` time DEFAULT NULL,
  `tgl_kembali_realisasi` date DEFAULT NULL,
  `jam_kembali_realisasi` time DEFAULT NULL,
  `denda` varchar(255) NOT NULL,
  `kilometer_pinjam` varchar(255) NOT NULL,
  `kilometer_kembali` varchar(255) NOT NULL,
  `BBM_pinjam` varchar(255) NOT NULL,
  `BBM_kembali` varchar(255) NOT NULL,
  `kondisi_mobil_pinjam` varchar(255) NOT NULL,
  `kondisi_mobil_kembali` varchar(255) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `biaya_kerusakan` varchar(255) NOT NULL,
  `biaya_BBM` varchar(255) NOT NULL,
  `sopir_id` int(11) DEFAULT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksisewa`
--

INSERT INTO `transaksisewa` (`id`, `no`, `tglpesan`, `tglpinjam`, `jampinjam`, `tgl_kembali_rencana`, `jam_kembali_rencana`, `tgl_kembali_realisasi`, `jam_kembali_realisasi`, `denda`, `kilometer_pinjam`, `kilometer_kembali`, `BBM_pinjam`, `BBM_kembali`, `kondisi_mobil_pinjam`, `kondisi_mobil_kembali`, `kerusakan`, `biaya_kerusakan`, `biaya_BBM`, `sopir_id`, `kendaraan_id`, `pelanggan_id`, `karyawan_id`) VALUES
(1, 567, '2017-11-05', '0000-00-00', '00:00:00', '2017-11-09', '07:06:00', NULL, NULL, '', '40', '', '897', '', '6yh', '', '', '', '', 1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `nama`, `merk_id`) VALUES
(456, 'mila', 456),
(458, 'tyui-000', 2),
(459, 'Khamila', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_service`
--
ALTER TABLE `jenis_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksisewa`
--
ALTER TABLE `transaksisewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_service`
--
ALTER TABLE `jenis_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6480;
--
-- AUTO_INCREMENT for table `setoran`
--
ALTER TABLE `setoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksisewa`
--
ALTER TABLE `transaksisewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
