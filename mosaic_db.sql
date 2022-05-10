-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 10, 2022 alle 09:36
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
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(19, 10),
(20, 10),
(21, 10),
(22, 10),
(23, 10),
(24, 10),
(25, 10),
(26, 10),
(27, 10),
(28, 10),
(29, 10),
(30, 10),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 10),
(46, 10),
(47, 10),
(48, 10),
(49, 10),
(50, 10),
(51, 10),
(52, 10),
(53, 10),
(54, 10),
(55, 10),
(56, 10),
(57, 10),
(58, 10),
(59, 10),
(60, 10),
(61, 10),
(62, 10),
(63, 10),
(64, 10),
(65, 10),
(66, 10),
(67, 10),
(68, 10),
(69, 10),
(70, 10),
(71, 10),
(72, 10),
(73, 10),
(74, 10),
(75, 10),
(76, 10),
(77, 10),
(78, 10),
(79, 10),
(80, 10),
(81, 10),
(82, 10),
(83, 10),
(84, 10),
(85, 10),
(86, 10),
(87, 10),
(88, 10),
(89, 10),
(90, 10),
(91, 10),
(92, 10),
(93, 10),
(94, 10),
(95, 10),
(96, 10),
(97, 10),
(98, 10),
(99, 10),
(100, 10),
(101, 10),
(102, 10),
(103, 10),
(104, 10),
(105, 10),
(106, 10),
(107, 10),
(108, 10),
(109, 10),
(110, 10),
(111, 10),
(112, 10),
(113, 10),
(114, 10),
(115, 10),
(116, 10),
(117, 10),
(118, 10),
(119, 10),
(120, 10),
(121, 10),
(122, 10),
(123, 10),
(124, 10),
(125, 10),
(126, 10),
(127, 10),
(128, 10),
(129, 10),
(130, 10),
(131, 10),
(132, 10),
(133, 10),
(134, 10),
(135, 10),
(136, 10),
(137, 10),
(138, 10),
(139, 10),
(140, 10),
(141, 10),
(142, 10),
(143, 10),
(144, 10);

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
