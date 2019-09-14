-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 02:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuisonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `username` varchar(255) DEFAULT NULL,
  `agenda` varchar(255) DEFAULT NULL,
  `jadwal_agenda` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`username`, `agenda`, `jadwal_agenda`) VALUES
('natsume', 'mancing', '0000-00-00 00:00:00'),
('natsume', 'nonton', '0000-00-00 00:00:00'),
('natsume', 'nonton', '0000-00-00 00:00:00'),
('tes', 'entah', '2019-01-05 00:00:00'),
('sebuah_akun', 'Main Dota', '2018-12-31 00:00:00'),
('yuyuyu', 'Mengerjakan PR', '2018-12-26 00:00:00'),
('yuyuyu', 'Menabung', '2018-12-26 00:00:00'),
('yuyuyu', 'Membalas Netizen', '2018-12-27 00:00:00'),
('waw', 'Makan', '2018-12-25 00:00:00'),
('waw', 'Minum', '2018-12-26 00:00:00'),
('waw', 'Beli', '2018-12-25 00:00:00'),
('tes', 'ngamok', '2019-01-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nilai` int(3) DEFAULT '0',
  `tes_status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nilai`, `tes_status`) VALUES
('natsume', '$2y$10$dTHodHU5aztcY3dK3suWF.XbFyuPEdxCWaOQU0u6mnvBA45PGbyVG', 100, 1),
('sebuah_akun', '$2y$10$HLVe8shLVk977W5oD17Cxe3d8MViFcOSdmm4h9LNUux8WD8YJEYue', 50, 1),
('tes', '$2y$10$8N4OWeWAtcxMZIItj6hUCO3meeyj538Yi2cLpC3g87wSpIXZqr6KK', 0, 1),
('us', '$2y$10$M2xvAFaB3lzq.6XMqFoEhOz0C4ZToMKwtjmjOFigilg/YAbkxHvZO', 0, 0),
('waw', '$2y$10$bWBf7v4h.7Rn1ZcbXAJ5Aea1CPdBFHfFqUmTsUkciiC9ZOx7l7wkG', 0, 1),
('wew', '$2y$10$Uyvi6ltZBgwnGRKhp.9dNeM.Tz1EOPbSBKfR06UuA4nE/3yql3TP.', 0, 0),
('wildanaja', '$2y$10$09kP03PexJj1MfQKxQh4yOFATCsvyTEBD1yX9K.lCu9jH8Qz/nNs6', 0, 0),
('yuyuyu', '$2y$10$xTpaxL4vg7CDb9PMfAx5a.KGQax6vAuPytVeseqzMi7rIUB3PXgaG', 100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD KEY `todolist_FK` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_FK` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
