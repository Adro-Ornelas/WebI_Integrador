-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2025 at 01:07 AM
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

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id`, `apodo`, `year`, `descripcion`, `marca`, `valorhora`) VALUES
(1, 'Vocho', 1924, 'El Mercedes 24/100/140 CV fue el nuevo modelo tope de gama en la gama de turismos. En este sentido, reemplazó a los 28/95 CV, cuya fabricación se interrumpió en agosto de 1924. En diciembre de 1924, la producción de todos los demás modelos de turismos Mercedes había llegado a su fin. En enero de 1925 se fabricaron solo dos unidades del Mercedes Knight 16/50 CV.\r\n', 'Mercedes-Benz', 2000),
(2, 'Frankie', 1967, 'Eleanor surgió de la película de 1974 \"60 segundos\", dirigida por HB Toby Haliki. Eleanor es el único Ford Mustang que aparece en los créditos como estrella en una película. El Eleanor original era un fastback de 1971 rediseñado en 1973 para la película. Estaba pintado de amarillo pálido y la película se convirtió en un clásico de culto en los años 70.', 'Ford', 2500),
(3, 'Dorado', 1965, 'En 1965, Mercedes-Benz presentaba modelos icónicos como la serie\r\nW108/W109, que incluía los 250 S y 300 SEL, marcando el debut de la carrocería de seguridad en el 220 SE, además de otras líneas como los sedanes de cuatro cilindros W110 (190c/190Dc). Estos vehículos se caracterizaban por su ingeniería robusta, diseños elegantes (especialmente los cupés y descapotables) y avances tecnológicos como la inyección de combustible en los modelos más lujosos.', 'Mercedes-Benz', 3000),
(4, 'Cobra', 1963, 'El Shelby Cobra es un icónico deportivo de los años 60, creado por Carroll Shelby, que fusiona un chasis y carrocería británicos de AC Cars con potentes motores V8 estadounidenses de Ford. Fue un éxito en las carreras y se convirtió en un símbolo de rendimiento y diseño agresivo. Además del Cobra original, el nombre también se ha utilizado en modelos posteriores de Ford Mustang, como el SVT Cobra. ', 'Ford', 2999);

-- --------------------------------------------------------

--
-- Table structure for table `foto_auto`
--

CREATE TABLE `foto_auto` (
  `id` int(10) NOT NULL,
  `id_auto` bigint(10) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_auto`
--

INSERT INTO `foto_auto` (`id`, `id_auto`, `foto`) VALUES
(1, 4, 'http://localhost/ao_rent_cars/cobra1.jpg'),
(2, 4, 'http://localhost/ao_rent_cars/cobra1.jpg'),
(3, 4, 'http://localhost/ao_rent_cars/cobra3.jpg'),
(4, 4, 'http://localhost/ao_rent_cars/cobra3.jpg'),
(5, 4, 'http://localhost/ao_rent_cars/cobra5.jpg'),
(6, 3, 'http://localhost/ao_rent_cars/dorado1.jpeg'),
(7, 3, 'http://localhost/ao_rent_cars/dorado1.jpeg'),
(8, 3, 'http://localhost/ao_rent_cars/dorado3.jpeg'),
(9, 3, 'http://localhost/ao_rent_cars/dorado4.jpeg'),
(10, 2, 'http://localhost/ao_rent_cars/dorado4.jpeg'),
(11, 2, 'http://localhost/ao_rent_cars/dorado4.jpeg'),
(12, 2, 'http://localhost/ao_rent_cars/frankie3.jpg'),
(13, 2, 'http://localhost/ao_rent_cars/frankie4.jpg'),
(14, 1, 'http://localhost/ao_rent_cars/frankie4.jpg'),
(15, 1, 'http://localhost/ao_rent_cars/vocho2.jpg'),
(16, 1, 'http://localhost/ao_rent_cars/vocho4.jpg'),
(17, 1, 'http://localhost/ao_rent_cars/vocho4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_renta`
--

CREATE TABLE `solicitud_renta` (
  `id` bigint(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userphone` bigint(10) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `punto_inicio` varchar(200) NOT NULL,
  `punto_final` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitud_renta`
--

INSERT INTO `solicitud_renta` (`id`, `username`, `userphone`, `fecha_evento`, `hora_inicio`, `hora_final`, `punto_inicio`, `punto_final`, `estado`) VALUES
(1, 'Adro', 3312345678, '2025-12-09', '13:55:41', '17:55:42', 'Juan Alvarez 143 Z', 'Nueva Escocia 22400', 'pendiente'),
(2, 'Pedro', 3387654321, '2025-12-01', '18:00:00', '20:00:00', 'General Arteaga 123', 'Ávila Camacho 123', 'confirmado');

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
-- Dumping data for table `solicitud_renta_auto`
--

INSERT INTO `solicitud_renta_auto` (`id`, `id_solicitud`, `id_auto`) VALUES
(1, 1, 4),
(2, 2, 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foto_auto`
--
ALTER TABLE `foto_auto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `solicitud_renta`
--
ALTER TABLE `solicitud_renta`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solicitud_renta_auto`
--
ALTER TABLE `solicitud_renta_auto`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
