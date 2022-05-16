-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 16, 2022 alle 12:53
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosaic_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `blocchi`
--

CREATE TABLE `blocchi` (
  `id` int(4) UNSIGNED NOT NULL,
  `proprietario` varchar(30) DEFAULT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `titolo` varchar(70) DEFAULT NULL,
  `descrizione` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `blocchi`
--

INSERT INTO `blocchi` (`id`, `proprietario`, `tipo`, `path`, `titolo`, `descrizione`) VALUES
(1, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(2, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(3, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(4, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(5, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(6, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(7, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(8, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(9, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(10, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(11, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(12, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(13, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(14, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(15, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(16, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(17, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(18, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(19, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(20, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(21, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(22, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(23, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(24, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(25, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(26, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(27, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(28, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(29, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(30, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(31, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(32, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(33, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(34, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(35, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(36, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(37, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(38, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(39, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(40, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(41, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(42, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(43, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(44, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(45, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(46, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(47, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(48, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(49, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(50, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(51, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(52, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(53, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(54, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(55, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(56, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(57, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(58, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(59, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(60, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(61, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(62, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(63, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(64, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(65, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(66, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(67, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(68, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(69, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(70, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(71, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(72, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(73, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(74, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(75, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(76, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(77, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(78, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(79, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(80, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(81, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(82, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(83, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(84, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(85, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(86, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(87, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(88, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(89, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(90, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(91, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(92, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(93, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(94, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(95, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(96, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(97, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(98, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(99, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(100, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(101, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(102, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(103, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(104, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(105, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(106, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(107, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(108, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(109, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(110, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(111, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(112, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(113, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(114, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(115, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(116, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(117, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(118, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(119, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(120, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(121, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(122, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(123, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(124, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(125, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(126, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(127, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(128, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(129, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(130, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(131, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(132, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(133, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(134, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(135, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(136, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(137, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(138, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(139, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(140, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(141, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(142, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(143, 'mosaic', 'color', '#FFFFFF', NULL, NULL),
(144, 'mosaic', 'color', '#FFFFFF', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `market`
--

CREATE TABLE `market` (
  `idblocco` int(4) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `market`
--

INSERT INTO `market` (`idblocco`, `price`) VALUES
(1, 70),
(2, 70),
(3, 70),
(4, 70),
(5, 70),
(6, 70),
(7, 70),
(8, 70),
(9, 70),
(10, 70),
(11, 70),
(12, 70),
(13, 70),
(14, 70),
(15, 70),
(16, 70),
(17, 70),
(18, 70),
(19, 70),
(20, 70),
(21, 70),
(22, 70),
(23, 70),
(24, 70),
(25, 60),
(26, 60),
(27, 60),
(28, 60),
(29, 60),
(30, 60),
(31, 60),
(32, 60),
(33, 60),
(34, 60),
(35, 60),
(36, 60),
(37, 60),
(38, 60),
(39, 60),
(40, 60),
(41, 60),
(42, 60),
(43, 60),
(44, 60),
(45, 60),
(46, 60),
(47, 60),
(48, 60),
(49, 50),
(50, 50),
(51, 50),
(52, 50),
(53, 50),
(54, 50),
(55, 50),
(56, 50),
(57, 50),
(58, 50),
(59, 50),
(60, 50),
(61, 50),
(62, 50),
(63, 50),
(64, 50),
(65, 50),
(66, 50),
(67, 50),
(68, 50),
(69, 50),
(70, 50),
(71, 50),
(72, 50),
(73, 40),
(74, 40),
(75, 40),
(76, 40),
(77, 40),
(78, 40),
(79, 40),
(80, 40),
(81, 40),
(82, 40),
(83, 40),
(84, 40),
(85, 40),
(86, 40),
(87, 40),
(88, 40),
(89, 40),
(90, 40),
(91, 40),
(92, 40),
(93, 40),
(94, 40),
(95, 40),
(96, 40),
(97, 30),
(98, 30),
(99, 30),
(100, 30),
(101, 30),
(102, 30),
(103, 30),
(104, 30),
(105, 30),
(106, 30),
(107, 30),
(108, 30),
(109, 30),
(110, 30),
(111, 30),
(112, 30),
(113, 30),
(114, 30),
(115, 30),
(116, 30),
(117, 30),
(118, 30),
(119, 30),
(120, 30),
(121, 20),
(122, 20),
(123, 20),
(124, 20),
(125, 20),
(126, 20),
(127, 20),
(128, 20),
(129, 20),
(130, 20),
(131, 20),
(132, 20),
(133, 20),
(134, 20),
(135, 20),
(136, 20),
(137, 20),
(138, 20),
(139, 20),
(140, 20),
(141, 20),
(142, 20),
(143, 20),
(144, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(319) NOT NULL,
  `password` varchar(100) NOT NULL,
  `punti` int(10) NOT NULL DEFAULT 0,
  `verificato` int(1) NOT NULL DEFAULT 0,
  `codiceconferma` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `nome`, `cognome`, `email`, `password`, `punti`, `verificato`, `codiceconferma`) VALUES
('mosaic', 'nome', 'cognome', 'mosaic@ltw-mosaic.it', 'e7cf3ef4f17c3999a94f2c6f612e8a888e5b1026878e4e19398b23bd38ec221a', 100, 1, 'bacaa10df2fa2174abad8feb187dc8e0');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `blocchi`
--
ALTER TABLE `blocchi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietario` (`proprietario`);

--
-- Indici per le tabelle `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`idblocco`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `emailunica` (`email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `blocchi`
--
ALTER TABLE `blocchi`
  ADD CONSTRAINT `blocchi_ibfk_1` FOREIGN KEY (`proprietario`) REFERENCES `utenti` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
