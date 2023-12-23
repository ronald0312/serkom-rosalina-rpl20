-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 01:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `jenis_beasiswa` varchar(20) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `status_ajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `email`, `hp`, `semester`, `ipk`, `jenis_beasiswa`, `berkas`, `status_ajuan`) VALUES
(29, 'Satya Prakash', 'prakashtia499@gmail.com', '089636176619', 7, 3.6, 'Akademik', 'transkip_semester5.pdf', 'belum di verifikasi'),
(38, 'yoga naden', '20102205@gmail.com', '0808080808', 7, 3.1, 'Prestasi', 'album-2.png', 'belum di verifikasi'),
(41, 'bintang', 'bintang432@gmail.com', '082166294871', 7, 3, 'Pascasarjana', 'istockphoto-1261754581-612x612.jpg', 'belum di verifikasi'),
(42, 'prasasti', 'prasastiadilla@gmail.com', '089654723567', 7, 2.9, '', '', ''),
(43, 'rosalina', 'rosalina43@gmail.com', '089764532737', 7, 3.8, 'Prestasi', 'ittp.png', 'belum di verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
