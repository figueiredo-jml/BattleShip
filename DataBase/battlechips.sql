-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 08:09 PM
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
-- Database: `battlechips`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `funcao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `nome`, `email`, `pass`, `avatar`, `funcao`) VALUES
(1, 'Filipe', 'filipe@mail.pt', '$2y$10$BLqpVz/yt83S7HSNZ8GCjeYZ7UigzfQq63Ia8ng2A3OopKMKnMDKO', 'admin1', 'Admin'),
(8, 'Jose', 'jose@mail.pt', '$2y$10$Ijo/DKTHqWJionjUvT55muZJBf8jGLlBlRDIGBvpNzeP6PCHNJyqu', 'client3', 'Cliente'),
(9, 'JoseFigueiredo', 'Josefigueiredo@mail.pt', '$2y$10$.brGQxeXEX0gUh8G7FIbhuvjbaXE5W3HKGkNnVyF9OvPR.8mEbs5C', 'admin2', 'Admin'),
(10, 'Hashpass', 'hashpass@mail.pt', '$2y$10$NSjopxYWt8dT9f1Mb4PyseHsL6YRQY3SQM4w65ppADfIFDs2R4HUi', 'client5', 'Cliente'),
(11, 'Register', 'Register@mail.pt', '$2y$10$X1uoOR2.ANeZcIG7eP8u2.bbY9v7llhHM/ZD4EW1DstKAP3JBiZYy', 'client6', 'Cliente'),
(20, 'Register', '', '$2y$10$PcScVLAMV4KAqbk1jtNErOcbCCxZxtsXrX.Src1ZZElrPQgxTOtMe', 'client1', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
