-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 08:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id` int(32) NOT NULL,
  `kode` varchar(32) DEFAULT NULL,
  `alternatif` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id`, `kode`, `alternatif`, `keterangan`) VALUES
(1, 'A01', 'Alternatif 1', NULL),
(2, 'A02', 'Alternatif 2', NULL),
(3, 'A03', 'Alternatif 3', NULL),
(4, 'A04', 'Alternatif 4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_atribut`
--

CREATE TABLE `tb_atribut` (
  `id` int(32) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `atribut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atribut`
--

INSERT INTO `tb_atribut` (`id`, `kode`, `atribut`) VALUES
(1, '1', 'BENEFIT'),
(2, '2', 'COST');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(32) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `idatribut` int(32) DEFAULT NULL,
  `atribut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `kode`, `kriteria`, `idatribut`, `atribut`) VALUES
(1, 'C01', 'Kriteria 1', 2, NULL),
(2, 'C02', 'Kriteria 2', 1, NULL),
(4, 'C03', 'Kriteria 3', 1, NULL),
(5, 'C05', 'Kriteria 5', 1, NULL),
(6, 'C06', 'Kriteria 6', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilaialternatif`
--

CREATE TABLE `tb_nilaialternatif` (
  `id` int(32) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `idalternatif` int(32) NOT NULL,
  `c1` float(53,0) DEFAULT NULL,
  `c2` float(53,0) DEFAULT NULL,
  `c3` float(53,0) DEFAULT NULL,
  `c4` float(53,0) DEFAULT NULL,
  `c5` float(53,0) DEFAULT NULL,
  `c6` float(53,0) DEFAULT NULL,
  `idatribut` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilaialternatif`
--

INSERT INTO `tb_nilaialternatif` (`id`, `kode`, `idalternatif`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `idatribut`) VALUES
(1, 'A1', 1, 3500, 70, 10, 80, 3000, 36, 2),
(2, 'A2', 2, 4500, 90, 10, 60, 2500, 48, 1),
(3, 'A3', 3, 4000, 80, 9, 90, 2000, 48, 1),
(4, 'A4', 4, 4000, 70, 8, 50, 1500, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_bobot`
--

CREATE TABLE `temp_bobot` (
  `id` char(32) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `nilai1` double DEFAULT NULL,
  `nilai2` double DEFAULT NULL,
  `nilai3` double DEFAULT NULL,
  `nilai4` double DEFAULT NULL,
  `nilai5` double DEFAULT NULL,
  `nilai6` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_bobot`
--

INSERT INTO `temp_bobot` (`id`, `kriteria`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`) VALUES
('1bd449a0-05d6-11ec-8b52-c5725c21', 'Kepentingan', 5, 5, 8, 8, 8, 8),
('1bd44b00-05d6-11ec-ab95-9b8edf09', 'Bobot', 0.11904761904762, 0.11904761904762, 0.19047619047619, 0.19047619047619, 0.19047619047619, 0.19047619047619),
('1bd44b60-05d6-11ec-b4cf-1952db9d', 'Pangkat', -0.11904761904762, 0.11904761904762, 0.19047619047619, 0.19047619047619, 0.19047619047619, 0.19047619047619);

-- --------------------------------------------------------

--
-- Table structure for table `temp_rangking`
--

CREATE TABLE `temp_rangking` (
  `id` char(32) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rangking` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_vektor`
--

CREATE TABLE `temp_vektor` (
  `id` char(32) NOT NULL,
  `alternatif` varchar(255) DEFAULT NULL,
  `vektors` double DEFAULT NULL,
  `vektorv` double DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_vektor`
--

INSERT INTO `temp_vektor` (`id`, `alternatif`, `vektors`, `vektorv`, `judul`) VALUES
('1bd59010-05d6-11ec-b4db-b15c1be1', 'Alternatif 1', 20.3919, 0.2646, 'A01-Alternatif 1'),
('1bd59220-05d6-11ec-88ad-e38b5283', 'Alternatif 2', 19.6959, 0.2556, 'A02-Alternatif 2'),
('1bd59380-05d6-11ec-817a-5dc5e73a', 'Alternatif 3', 19.9868, 0.2594, 'A03-Alternatif 3'),
('1bd59440-05d6-11ec-839f-7957b62c', 'Alternatif 4', 16.9877, 0.2204, 'A04-Alternatif 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `namauser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `namauser`) VALUES
(1, 'Admin', NULL, NULL, '$2y$10$yGNwHofYeBXhSknLn/Lhp.g4Agy8R/KVPO8elkQzRY3/i9N37HzHS', NULL, '2021-08-13 23:43:33', '2021-08-14 06:01:21', 'admin'),
(2, 'Super', NULL, NULL, '$2y$10$UibhVDKLKruh06eGVEmbQOsWwZrdYilA0X5ob9eqeHLc2XcG/09Wu', NULL, '2021-08-13 23:51:34', '2021-08-13 23:51:34', 'Super'),
(3, 'User', NULL, NULL, '$2y$10$0RpUHaZDfb7fQgD1B5Lb4.48/i3Hs2KTnC9NdUkN8t0rPOGs1ywey', NULL, '2021-08-24 05:14:05', '2021-08-24 05:14:05', 'User'),
(4, 'B', NULL, NULL, '$2y$10$zM8YLsvoqohfPffwMv9We.1xZ4aWcr/Bz1EfC.8Xb0dI/otpRWdBm', NULL, '2021-08-24 05:29:47', '2021-08-25 11:56:55', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_atribut`
--
ALTER TABLE `tb_atribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nilaialternatif`
--
ALTER TABLE `tb_nilaialternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_bobot`
--
ALTER TABLE `temp_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_rangking`
--
ALTER TABLE `temp_rangking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_vektor`
--
ALTER TABLE `temp_vektor`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
