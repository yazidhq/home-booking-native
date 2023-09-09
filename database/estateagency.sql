-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estateagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `harga_rumah` bigint(20) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `status_booking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_rumah`, `alamat_rumah`, `harga_rumah`, `tanggal_booking`, `status_booking`) VALUES
(68, 18, 8, 'Jl. H. Gani No.47-44, RT.010/RW.014, Jatimakmur, Kec. Pd. Gede, Kota Bks, Jawa Barat 17411', 3500000000, '2023-08-12', 'pesanan diproses');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(100) NOT NULL,
  `email_kontak` varchar(50) NOT NULL,
  `pesan_kontak` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `email_kontak`, `pesan_kontak`) VALUES
(3, 'Iyan', 'iyan@gmail.com', 'Bagaimana cara booking rumah?');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaatm_pembayaran` varchar(20) NOT NULL,
  `atasnama_pembayaran` varchar(100) NOT NULL,
  `norek_pembayaran` int(25) NOT NULL,
  `nominal_pembayaran` bigint(20) NOT NULL,
  `tanggal_pembayaran` varchar(15) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `id_user`, `namaatm_pembayaran`, `atasnama_pembayaran`, `norek_pembayaran`, `nominal_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`) VALUES
(18, 68, 18, 'BSI', 'Yazid Dhiaulhaq', 24634245, 3500000000, '2023-08-12', '1691827294.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(11) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `luas_rumah` int(11) NOT NULL,
  `kamartidur_rumah` int(11) NOT NULL,
  `kamarmandi_rumah` int(11) NOT NULL,
  `garasi_rumah` int(11) NOT NULL,
  `fasilitas_rumah` varchar(255) NOT NULL,
  `deskripsi_rumah` longtext NOT NULL,
  `harga_rumah` bigint(20) NOT NULL,
  `gambar_rumah` varchar(255) NOT NULL,
  `status_rumah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `alamat_rumah`, `luas_rumah`, `kamartidur_rumah`, `kamarmandi_rumah`, `garasi_rumah`, `fasilitas_rumah`, `deskripsi_rumah`, `harga_rumah`, `gambar_rumah`, `status_rumah`) VALUES
(6, 'Jl. Bintara No.4, RT.001/RW.010, Bintara, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17134', 150, 5, 3, 1, 'Kolam renang, Billiard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam ex et neque ornare, vitae consectetur leo commodo. Vivamus id fermentum mi. Praesent ipsum ante, consectetur a efficitur a, consequat sit amet lectus. Phasellus hendrerit, sem tincidunt sodales condimentum, elit velit viverra turpis, sed posuere dui est et massa. Nulla vel lectus nisi. Suspendisse vel pulvinar tellus, et faucibus nisl. Quisque eget felis lobortis turpis ultricies ultricies. ', 2000000000, '1691771629.jpg', 'tersedia'),
(7, 'QX94+PRG, Gg. H. Kobun, RT.001/RW.005, Bintara, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17134', 125, 6, 5, 2, 'Kolam renang, studio musik, rooftop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam ex et neque ornare, vitae consectetur leo commodo. Vivamus id fermentum mi. Praesent ipsum ante, consectetur a efficitur a, consequat sit amet lectus. Phasellus hendrerit, sem tincidunt sodales condimentum, elit velit viverra turpis, sed posuere dui est et massa. Nulla vel lectus nisi. Suspendisse vel pulvinar tellus, et faucibus nisl. Quisque eget felis lobortis turpis ultricies ultricies. ', 3000000000, '1691771638.jpg', 'tidak tersedia'),
(8, 'Jl. H. Gani No.47-44, RT.010/RW.014, Jatimakmur, Kec. Pd. Gede, Kota Bks, Jawa Barat 17411', 170, 12, 7, 3, 'Ruang musik, Billiard, Kolam Renang, Rooftop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam ex et neque ornare, vitae consectetur leo commodo. Vivamus id fermentum mi. Praesent ipsum ante, consectetur a efficitur a, consequat sit amet lectus. Phasellus hendrerit, sem tincidunt sodales condimentum, elit velit viverra turpis, sed posuere dui est et massa. Nulla vel lectus nisi. Suspendisse vel pulvinar tellus, et faucibus nisl. Quisque eget felis lobortis turpis ultricies ultricies. ', 3500000000, '1691771646.jpg', 'tidak tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `status`) VALUES
(3, 'admin', 'admin', 'admin', 'admin'),
(18, 'Yazid Dhiaulhaq Ismail', 'yazid', 'yazid', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rumah` (`id_rumah`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
