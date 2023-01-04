-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 05:11 PM
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
(27, 'Jose', 'Jose@mail.pt', '$2y$10$NMUhip9mPT2qnCWvS73PruhCE8sWxhuYp9uK4qZNWEwXU8dkY6mnG', 'admin2', 'Admin'),
(28, 'Teste', 'teste@mail.pt', '$2y$10$ghM4IZzoQMroxekT9PeF2u5l.47bDmMTEbQ888wgiVPwA2jp6lUiW', 'admin6', 'Admin'),
(34, 'Cliente1', 'Cliente1@mail.pt', '$2y$10$SHeHMBxuZqK47LaXOGA5vuh8LKcgy49VCbeh9LswJT7rKf6yW0a1y', 'client4', 'Cliente'),
(35, 'Cliente2', 'Cliente2@mail.pt', '$2y$10$R91GIHX6q6oSOtLPbsnEZusM8rYnSdplCAJ0e5djmtJcZ4pGhpf8u', 'client1', 'Cliente'),
(36, 'Cliente3', 'Cliente3@mail.pt', '$2y$10$oDkXb1X/tlEe4k0BLL.n4.jSFM2fHOf9CSX5ZMZ8lT/6JH4aoU6z2', 'client2', 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `jogos` int(11) NOT NULL,
  `vitorias` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `nome`, `funcao`, `jogos`, `vitorias`, `derrotas`) VALUES
(1, 'Filipe', 'Admin', 5, 3, 2),
(21, 'Cliente1', 'Cliente', 0, 0, 0),
(22, 'Cliente2', 'Cliente', 0, 0, 0),
(23, 'Cliente3', 'Cliente', 0, 0, 0),
(24, 'Jose', 'Admin', 0, 0, 0),
(25, 'Teste', 'Admin', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome` (`nome`),
  ADD KEY `funcao` (`funcao`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome_conta` (`nome`),
  ADD KEY `funcao_conta` (`funcao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `funcao_conta` FOREIGN KEY (`funcao`) REFERENCES `accounts` (`funcao`),
  ADD CONSTRAINT `nome_conta` FOREIGN KEY (`nome`) REFERENCES `accounts` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
