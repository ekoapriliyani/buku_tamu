-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 02:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl` date DEFAULT current_timestamp(),
  `check_in` varchar(25) NOT NULL,
  `check_out` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id`, `kode_booking`, `kategori`, `nama`, `asal`, `hp`, `email`, `alamat`, `pic`, `lokasi`, `keperluan`, `tgl`, `check_in`, `check_out`) VALUES
(80, 'E7933F8F14', 'REGULER', 'HORAS SIHITE', 'PT BAC', '085179975120', 'alfazzatech22@gmail.com', 'MALAYSIA', 'FARID', 'PABRIK CIKARANG', 'AUDIT SNI', '2024-11-20', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu_in`
--

CREATE TABLE `tbl_tamu_in` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl` date DEFAULT current_timestamp(),
  `check_in` varchar(25) NOT NULL,
  `check_out` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tamu_in`
--

INSERT INTO `tbl_tamu_in` (`id`, `kode_booking`, `kategori`, `nama`, `asal`, `hp`, `email`, `alamat`, `pic`, `lokasi`, `keperluan`, `tgl`, `check_in`, `check_out`) VALUES
(55, '5BFC363EFA', 'REGULER', 'MAREKO EKO', 'PT BMS', '085179975120', 'ekoapriliyani@gmail.com', 'Cibitung', 'Ibu Wenda', 'PABRIK CIKARANG', 'presentasi', '2024-11-08', '13:50:40', ''),
(58, '07207D4FE1', 'REGULER', 'DJONI BUDIMAN', 'PT BCD', '085648973921', 'ekoapriliyani@gmail.com', 'Taman Kertamukti Residence Blok C30/02', 'FARID', 'PABRIK CIKARANG', 'AUDIT SNI', '2024-11-21', '09:16:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu_out`
--

CREATE TABLE `tbl_tamu_out` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl` date DEFAULT current_timestamp(),
  `check_in` varchar(25) NOT NULL,
  `check_out` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tamu_out`
--

INSERT INTO `tbl_tamu_out` (`id`, `kode_booking`, `kategori`, `nama`, `asal`, `hp`, `email`, `alamat`, `pic`, `lokasi`, `keperluan`, `tgl`, `check_in`, `check_out`) VALUES
(2, 'AC35094B8B', 'VVIP', 'SUGENG RAHARJO CS', 'KEMENTERIAN PUPR', '09786877', 'sugeng@pupr.go.id', 'JAKARTA', 'PAK ROBERTUS', 'PABRIK CIKARANG', 'CEK BRONJONG', '2024-11-07', '15:11:04', '16:03:38'),
(3, 'B381592B3D', 'REGULER', 'sasi', 'freeport', '0787989', 'sasi@taf', 'bekasi', 'roni', 'PABRIK CIKARANG', 'meeting', '2024-10-31', '14:41:41', '16:20:19'),
(4, 'E1A7CA7949', 'REGULER', 'SAPTO', 'PT SASA', '0678789', 'saptop@gmail.com', 'JAKARTA', 'TATAR SUHARMOKO', 'PABRIK CIKARANG', 'CEK BAHAN BAKU', '2024-10-31', '14:48:39', '16:21:28'),
(5, '6AC7C7FA41', 'REGULER', 'CAKRA BINTARA', 'PT MAKSINO', '097897', 'cakra@gmail.com', 'SURABAYA', 'BAPAK AGUS', 'PABRIK CIKARANG', 'MEETING', '2024-11-01', '16:21:52', '16:22:04'),
(6, '979F3CD8E3', 'VVIP', 'BUNTORO', 'PT BEKAERT', '0787879', 'buntoro@bekaert.co.id', 'KARAWANG', 'PAK ROBERTUS', 'PABRIK CIKARANG', 'MEETING BRONJONG', '2024-11-08', '16:40:34', '16:40:45'),
(7, '49B130778C', 'VVIP', 'BASUKI, ADI PRAWITO', 'KEMENTERIAN PUPR', '087867687', 'basuki@pupr.go.id', 'JAKARTA', 'BPK CHANO', 'PABRIK CIKARANG', 'MEETING', '2024-11-05', '15:27:01', '15:27:34'),
(8, '4D0C11718F', 'REGULER', 'APOY', 'WARUNG APOY', '0978676', 'apoy@gmail.com', 'CIKARANG', 'DADAN', 'PABRIK CIKARANG', 'ANTAR KOPI', '2024-11-01', '15:29:18', '15:29:29'),
(9, '47CB6EA01C', 'VVIP', 'JOKO WIDODO CS', 'INSTANA NEGARA', '0867576', 'joko@ir.go.id', 'SOLO JAWA TENGAH', 'BAPAK SABIK K', 'PABRIK CIKARANG', 'MEETING', '2024-11-05', '15:14:43', '15:15:04'),
(10, '87B0D67DC6', 'REGULER', 'MESH', 'PT BEKA', '099787', 'mesh@beka.com', 'JAKARTA', 'BAPAK AGUS', 'PABRIK CIKARANG', 'MEETING', '2024-11-05', '09:13:43', '12:00:45'),
(11, '74E50859BB', 'REGULER', 'EKO APRILIYANI', 'PT BICOM MITRA SOLUSINDO', '0867675797', 'edp@bevananda.com', 'Cibitung', 'Bapak Agus', 'PABRIK CIKARANG', 'PASANG PABX', '2024-11-05', '14:18:20', '14:55:46'),
(12, 'F36D617F6B', 'REGULER', 'DJONI BUDIMAN', 'PT TES', '0878787', 'prodev@bevananda.com', 'Jakarta', 'Pak Agus', 'PABRIK CIKARANG', 'meeting', '2024-11-06', '15:29:52', '13:35:56'),
(13, '9E33A876F0', 'REGULER', 'SURIPTO', 'PT JKIU', '08676769', 'surip@gmail.com', 'Jakarta', 'Ibu Vania', 'PABRIK CIKARANG', 'Meeting', '2024-11-05', '15:29:46', '13:36:01'),
(14, '14519D6E13', 'REGULER', 'EKO APRILIYANI', 'PT BICOM MITRA SOLUSINDO', '0867675797', 'edp@bevananda.com', 'Cibitung', 'Pak Robertus', 'PABRIK CIKARANG', 'Meeting', '2024-11-06', '14:55:36', '13:48:00'),
(15, 'CCE557B14F', 'REGULER', 'ALBERT', 'PT PRATAMA', '097868', 'albert@pratama.com', 'CIKARANG', 'PAK ATO', 'PABRIK CIKARANG', 'MEETING', '2024-11-01', '09:12:38', '15:25:13'),
(16, '486C61CD28', 'REGULER', 'IRIANA', 'PT KEM', '087878', 'iriana@gmail.com', 'Bekasi Jaya', 'Ibu Wenda', 'PABRIK CIKARANG', 'asas', '2024-11-05', '14:55:20', '15:25:20'),
(17, '024343D872', 'REGULER', 'MANG APOY', 'APOY SEJAHTERA', '08789787', 'alfazzatech22@gmail.com', 'cikarang', 'Bapak Chano', 'PABRIK CIKARANG', 'antar kopi', '2024-11-05', '14:55:27', '15:25:25'),
(18, '8E65867301', 'REGULER', 'APOY', 'APOY MAJU', '097979', 'ekoapriliyani@gmail.com', 'Taman Kertamukti Residence Blok C30/02', 'Pak Chano', 'PABRIK CIKARANG', 'antar kopi', '2024-11-05', '15:21:48', '15:25:31'),
(19, '49B05AE3C7', 'VIP', 'Jokowibowo', 'Abc', '8888888888', 'rdanarto@yahoo.com', 'Ancol griya', 'Eko', 'PABRIK CIKARANG', 'Koordinasi', '2024-11-06', '15:22:07', '15:25:38'),
(20, '17A141CBFE', 'REGULER', 'ZILKARNAIN', 'PT WIPARO', '09786879', 'zulpicarw@gmail.com', 'Cikarang', 'Bapak Chano', 'PABRIK CIKARANG', 'Ambil Waste', '2024-11-05', '15:22:13', '15:25:44'),
(21, '0EEFB1D4CC', 'REGULER', 'SINUM MAULANA', 'PT BEKAERT', '089798', 'edp@bevananda.com', 'KARAWANG', 'IBU VANIA', 'PABRIK CIKARANG', 'meeting', '2024-11-07', '15:23:04', '15:26:00'),
(22, '37B57EEFAD', 'REGULER', 'HERMAN SUHERMAN', 'PT ABC', '0997879', 'ekoapriliyani@gmail.com', 'CIKARANG', 'Bapak Chano', 'PABRIK CIKARANG', 'CEK', '2024-11-08', '15:23:10', '15:26:06'),
(23, '70998AD6B3', 'VVIP', 'TONI MARTONO', 'PT ABC', '0997868', 'hrd@bevananda.com', 'JAKARTA', 'PAK ROBERTUS', 'PABRIK CIKARANG', 'MEETING', '2024-11-08', '15:37:15', '15:37:49'),
(24, '37B05EB128', 'REGULER', 'MISTER LEYONG', 'SCHLATTER', '0787980', 'alfazzatech22@gmail.com', 'MALAYSIA', 'MR TATAR SUHARMOKO', 'PABRIK CIKARANG', 'CHECK MACHINE', '2024-11-07', '15:22:48', '13:14:42'),
(25, '34BC071E5E', 'REGULER', 'EKO APRILIYANI', 'PT BICOM MITRA SOLUSINDO', '085179975120', 'ekoapriliyani@gmail.com', 'Taman Kertamukti Residence Blok C30/02', 'FARID', 'PABRIK CIKARANG', 'MEETING', '2024-11-08', '13:14:27', '13:46:19'),
(26, '2F3D324A85', 'REGULER', 'MR LEYONG', 'SCHLATTER', '7879595', 'ekoapriliyani@gmail.com', 'MALAYSIA', 'MR TATAR SUHARMOKO', 'PABRIK CIKARANG', 'CHECK MACHINE', '2024-11-07', '15:22:39', '13:46:32'),
(27, '2B078ABB9C', 'VVIP', 'MR LEYONG', 'SCHLATTER', '098786797', 'ekoapriliyani@gmail.com', 'MALAYSIA', 'MR TATAR SUHARMOKO', 'PABRIK CIKARANG', 'CHECK MACHINE', '2024-11-07', '15:22:26', '13:46:40'),
(28, '79A1304CBC', 'REGULER', 'MR LEYONG', 'SCHLATTER', '7879595', 'ekoapriliyani@gmail.com', 'MALAYSIA', 'MR TATAR SUHARMOKO', 'PABRIK CIKARANG', 'CHECK MACHINE', '2024-11-07', '15:22:32', '13:46:49'),
(29, '4343D1A3E2', 'REGULER', 'Sabik, Robert, Dhani', 'Sejahtera Bersama', '085717984074', 'sabik@bevananda.com', 'Bekasi Utara', 'Eko - IT', 'PABRIK CIKARANG', 'Penawaran test hardware', '2024-11-11', '15:33:32', '15:33:52'),
(31, '1784064510', 'REGULER', 'Robert, Cano, Zul', 'Bevananda', '081788888899', 'rdanarto@yahoo.com', 'Griya Inti', 'Sabik', 'PABRIK CIKARANG', 'Koordinasi Project', '2024-11-11', '15:11:06', '08:53:50'),
(32, '4D51AB839F', 'VVIP', 'hari aja', 'tamu', '081295407301', 'it.erp@bevananda.com', 'cikarang', 'eko', 'PABRIK CIKARANG', 'janjian', '2024-11-15', '13:20:05', '13:20:29'),
(33, '4B23E3B09A', 'VIP', 'HASANAH KARIMAH', 'PT BERCA ABC', '087812435836', 'widi@bevananda.com', 'Jakarta Center', 'MR SABIK', 'PABRIK CIKARANG', 'CEK BAHAN BAKU', '2024-11-21', '14:10:31', '14:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrator','satpam','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'eko', 'eko@gmail.com', '$2y$10$LSnqfRCSU1B0zVO/2shUYu7H1mWF1P.VrcLVuzHFdY5sU/pTubhEm', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tamu_in`
--
ALTER TABLE `tbl_tamu_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tamu_out`
--
ALTER TABLE `tbl_tamu_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_tamu_in`
--
ALTER TABLE `tbl_tamu_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_tamu_out`
--
ALTER TABLE `tbl_tamu_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
