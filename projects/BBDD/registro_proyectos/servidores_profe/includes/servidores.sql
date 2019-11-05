-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2019 at 05:57 AM
-- Server version: 10.1.41-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servidores`
--

-- --------------------------------------------------------

--
-- Table structure for table `alertas`
--

CREATE TABLE `alertas` (
  `id` int(10) UNSIGNED NOT NULL,
  `alerta` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `proyecto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alertas`
--

INSERT INTO `alertas` (`id`, `alerta`, `fecha`, `proyecto`) VALUES
(15, 'Renovar dominio', '2020-09-19', 16);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `log` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proyecto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `log`, `fecha`, `proyecto`) VALUES
(1, 'klklas djfkljasdfkl jklasdjf ljalsdk fjkljasd fkljasd fkljasdfkljas dfkljdkas fjkljasd flkjasdfkl jkldjas fkljas dfjkldjas fkljldkjasf kljasd fkljadfskljasdf kljadjs fkljasdf kljasd fkldjas fkljasd fkljds lkasdjf kljasdfj kldjasf lkjasdfkl jdjasf djsf kljasdfklj lkasdf jlñasdjfñlkasjdfkljasdfdkasfldkasfjlkjasdfklasdjfkljasdfñldkasj fkjasldfjkl', '2019-09-25 08:13:43', 9),
(2, 'Añadimos usuarios al sistema de ftp', '2019-09-25 09:16:48', 9),
(3, 'Añadimos un nuevo dominio y actualizamos el kernel', '2019-09-25 09:17:42', 9),
(4, 'adfsa sgfasdf asdf asdf asdf asdf asdf asdf asdf asd fasd f', '2019-09-25 09:18:44', 8),
(5, 'Esto es mi primer estado en un log', '2019-09-25 09:20:44', 4),
(6, ' asdasdasd asdasdasd v asdasdasd asdasdasd asdasdasd asdasdasd fsdfsd asdasdasd', '2019-09-25 16:59:20', 7),
(7, '', '2019-09-26 07:29:13', 9),
(8, '', '2019-09-26 08:35:14', 9),
(9, 'heellooe worl', '2019-09-26 19:14:42', 9),
(10, 'qweqwqwe', '2019-09-26 19:58:46', 14),
(11, 'Esto es un logs nuevo', '2019-09-27 08:26:02', 16),
(12, 'Dar de alta el domino', '2019-09-28 13:42:26', 16),
(13, 'Añadir DNS', '2019-09-28 13:43:20', 16);

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `proyecto` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `proyecto`) VALUES
(14, 'alv.com'),
(15, 'asdasdasd'),
(9, 'ciberweb.com'),
(13, 'CRINA.COM'),
(8, 'hartodepepi.com'),
(5, 'lapepi.com'),
(10, 'lasdospalmeras.com'),
(11, 'nuevoproyecto.es'),
(4, 'pepita.com'),
(1, 'pepito.com'),
(7, 'pepitoselpintas.com'),
(6, 'superpepi.com'),
(16, 'virgi.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto` (`proyecto`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto` (`proyecto`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proyecto` (`proyecto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
