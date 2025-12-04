-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2025 at 11:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ao_rent_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Adro', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('Kosey', 'fe2592b42a727e977f055947385b709cc82b16b9a87f88c6abf3900d65d0cdc3');

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `id` bigint(10) NOT NULL,
  `apodo` varchar(100) NOT NULL,
  `year` smallint(4) NOT NULL,
  `descripcion` text NOT NULL,
  `marca` varchar(100) NOT NULL,
  `valorhora` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_auto`
--

CREATE TABLE `foto_auto` (
  `id` int(10) NOT NULL,
  `id_auto` bigint(10) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_renta`
--

CREATE TABLE `solicitud_renta` (
  `id` bigint(10) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `punto_inicio` varchar(200) NOT NULL,
  `punto_final` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_renta_auto`
--

CREATE TABLE `solicitud_renta_auto` (
  `id` bigint(10) NOT NULL,
  `id_solicitud` bigint(10) NOT NULL,
  `id_auto` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_auto`
--
ALTER TABLE `foto_auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indexes for table `solicitud_renta`
--
ALTER TABLE `solicitud_renta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitud_renta_auto`
--
ALTER TABLE `solicitud_renta_auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solicitud` (`id_solicitud`,`id_auto`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_auto`
--
ALTER TABLE `foto_auto`
  ADD CONSTRAINT `foto_auto_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `solicitud_renta_auto`
--
ALTER TABLE `solicitud_renta_auto`
  ADD CONSTRAINT `solicitud_renta_auto_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitud_renta_auto_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud_renta` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
