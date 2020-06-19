-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 10:58 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2019x047`
--

-- --------------------------------------------------------

--
-- Table structure for table `dijete`
--

CREATE TABLE `dijete` (
  `Id` int(11) NOT NULL,
  `Ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Djecji_Vrtici_Skupine_Id` int(11) NOT NULL,
  `Korisnici_Id_Registrirani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dijete`
--

INSERT INTO `dijete` (`Id`, `Ime`, `Prezime`, `Djecji_Vrtici_Skupine_Id`, `Korisnici_Id_Registrirani`) VALUES
(1, 'Jeff', 'Russo', 42, 4),
(2, 'Loren', 'Nicholson', 43, 4),
(3, 'Khadeejah', 'Cortez', 44, 0),
(4, 'Keeva', 'Parks', 44, 0),
(5, 'Emilis ', 'Britt', 45, 0),
(6, 'Lorelei', 'Griffith', 46, 0),
(7, 'Ace', 'Ferry', 48, 0),
(8, 'Ernie', 'Marsh', 48, 0),
(9, 'Dianne', 'Cobb', 48, 0),
(10, 'Monica', 'Rowland', 49, 0),
(11, 'Nial', 'Carr', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dijete_dolazak`
--

CREATE TABLE `dijete_dolazak` (
  `Id` int(11) NOT NULL,
  `Dijete_Id` int(11) NOT NULL,
  `Djecji_Vrtici_Id` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `Korisnici_Id_Moderator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dijete_dolazak`
--

INSERT INTO `dijete_dolazak` (`Id`, `Dijete_Id`, `Djecji_Vrtici_Id`, `Datum`, `Korisnici_Id_Moderator`) VALUES
(1, 1, 1, '2020-02-02 08:00:00', 2),
(2, 2, 2, '2020-02-02 07:30:00', 5),
(3, 3, 3, '2020-02-03 09:00:00', 8),
(4, 4, 4, '2020-02-03 06:30:00', 11),
(5, 5, 5, '2020-02-03 08:00:00', 12),
(6, 6, 6, '2020-02-04 07:15:00', 13),
(7, 7, 7, '2020-02-04 07:30:00', 14),
(8, 8, 8, '2020-02-04 08:00:00', 15),
(9, 9, 9, '2020-02-04 08:10:00', 16),
(10, 10, 10, '2020-02-04 07:50:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `djecji_vrtici`
--

CREATE TABLE `djecji_vrtici` (
  `Id` int(11) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Korisnici_Id_Administrator` int(11) NOT NULL,
  `Korisnici_Id_Moderator` int(11) NOT NULL,
  `Kapacitet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `djecji_vrtici`
--

INSERT INTO `djecji_vrtici` (`Id`, `Naziv`, `Adresa`, `Korisnici_Id_Administrator`, `Korisnici_Id_Moderator`, `Kapacitet`) VALUES
(1, 'Suncokret', 'Trg kralja Tomislava 1', 1, 2, 200),
(2, 'Čarolija', 'Vukovarska 10', 1, 8, 120),
(3, 'Lubenica', 'Slavonska 67b', 1, 5, 350),
(4, 'Zvijezdica', 'Pavlinska 87d', 1, 11, 180),
(5, 'Ptičica', 'Zvonimirova 34', 1, 12, 80),
(6, 'Jaglac', 'Ozaljska 3', 1, 13, 70),
(7, 'Tratinčica', 'Varaždinska 31', 1, 14, 100),
(8, 'Ljubičica', 'Bakarska 13', 1, 15, 135),
(9, 'Ivančica', 'Splitska 8', 1, 16, 180),
(10, 'Maslačak', 'Istarska 2b', 1, 17, 110),
(13, 'gagaga', 'fagagag', 1, 35, 0),
(14, 'test', 'testt', 1, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `djecji_vrtici_ocjena`
--

CREATE TABLE `djecji_vrtici_ocjena` (
  `Id` int(11) NOT NULL,
  `Godina` int(11) NOT NULL,
  `Mjesec` int(11) NOT NULL,
  `Korisnici_Id_Administrator` int(11) NOT NULL,
  `Djecji_Vrtici_Id` int(11) NOT NULL,
  `Ocjena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `djecji_vrtici_ocjena`
--

INSERT INTO `djecji_vrtici_ocjena` (`Id`, `Godina`, `Mjesec`, `Korisnici_Id_Administrator`, `Djecji_Vrtici_Id`, `Ocjena`) VALUES
(1, 2020, 1, 1, 1, 7),
(2, 2020, 3, 1, 2, 9),
(3, 2020, 3, 1, 3, 7),
(4, 2020, 3, 1, 4, 4),
(5, 2020, 1, 1, 5, 6),
(6, 2020, 1, 1, 6, 7),
(7, 2020, 3, 1, 7, 8),
(8, 2020, 1, 1, 8, 10),
(9, 2020, 3, 1, 9, 9),
(10, 2020, 3, 1, 10, 8),
(11, 2020, 2, 1, 1, 9),
(12, 2020, 3, 1, 1, 3),
(13, 2020, 2, 1, 2, 5),
(14, 2020, 1, 1, 2, 8),
(15, 2020, 2, 1, 3, 6),
(16, 2020, 1, 1, 3, 8),
(17, 2020, 2, 1, 4, 5),
(18, 2020, 1, 1, 4, 9),
(19, 2020, 2, 1, 5, 9),
(20, 2020, 3, 1, 6, 9),
(21, 2020, 3, 1, 5, 7),
(22, 2020, 2, 1, 6, 8),
(23, 2020, 1, 1, 7, 6),
(24, 2020, 2, 1, 7, 6),
(25, 2020, 2, 1, 8, 8),
(26, 2020, 3, 1, 8, 7),
(27, 2020, 2, 1, 9, 9),
(28, 2020, 1, 1, 9, 8),
(29, 2020, 1, 1, 10, 8),
(30, 2020, 2, 1, 10, 6),
(31, 2020, 4, 1, 1, 6),
(32, 2020, 5, 1, 1, 3),
(33, 2020, 6, 1, 1, 3),
(34, 2020, 7, 1, 1, 6),
(35, 2020, 8, 1, 1, 10),
(36, 2020, 9, 1, 1, 1),
(37, 2020, 4, 1, 2, 8),
(38, 2020, 4, 1, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `djecji_vrtici_skupine`
--

CREATE TABLE `djecji_vrtici_skupine` (
  `Id` int(11) NOT NULL,
  `Djecji_Vrtici_Id` int(11) NOT NULL,
  `Skupine_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `djecji_vrtici_skupine`
--

INSERT INTO `djecji_vrtici_skupine` (`Id`, `Djecji_Vrtici_Id`, `Skupine_Id`) VALUES
(42, 1, 1),
(43, 1, 2),
(44, 1, 3),
(45, 2, 4),
(46, 2, 7),
(47, 3, 9),
(48, 4, 1),
(49, 4, 4),
(50, 4, 9),
(51, 5, 7),
(52, 5, 8),
(53, 5, 10),
(54, 6, 2),
(55, 6, 4),
(56, 7, 6),
(57, 7, 9),
(58, 8, 1),
(59, 9, 9),
(60, 9, 10),
(61, 10, 4),
(62, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik`
--

CREATE TABLE `dnevnik` (
  `Id` int(11) NOT NULL,
  `Sifra_Radnje` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vrijeme` int(11) NOT NULL,
  `Korisnicko_Ime` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis_Radnje` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dnevnik`
--

INSERT INTO `dnevnik` (`Id`, `Sifra_Radnje`, `Vrijeme`, `Korisnicko_Ime`, `Ip`, `Opis_Radnje`) VALUES
(1, '1', 0, 'ivic', '::1', 'Prijava ok'),
(2, '2', 1592127585, 'ivic', '::1', 'Odjava ok'),
(3, '1', 1592127704, 'ivo2', '::1', 'Prijava ok'),
(4, '2', 1592127716, 'ivo2', '::1', 'Odjava ok'),
(5, '1', 1592127721, 'ivo2', '::1', 'Prijava ok'),
(6, '2', 1592127723, 'ivo2', '::1', 'Odjava ok'),
(7, '3', 1592128034, 'ivo2', '::1', 'Pogrešna prijava'),
(8, '3', 1592128090, 'ivo2', '::1', 'Pogrešna prijava'),
(9, '1', 1592128095, 'ivo2', '::1', 'Prijava ok'),
(10, '2', 1592130262, 'ivo2', '::1', 'Odjava ok'),
(11, '1', 1592131723, 'admin', '::1', 'Prijava ok'),
(12, '2', 1592131804, 'admin', '::1', 'Odjava ok'),
(13, '1', 1592131810, 'admin', '::1', 'Prijava ok '),
(14, '2', 1592131977, 'admin', '::1', 'Odjava ok'),
(15, '1', 1592131983, 'admin', '::1', 'Prijava ok admin'),
(16, '2', 1592132210, 'admin', '::1', 'Odjava ok'),
(17, '1', 1592132216, 'admin', '::1', 'Prijava ok'),
(18, '3', 1592132216, 'admin', '::1', 'Pogrešna prijava'),
(19, '1', 1592132274, 'admin', '::1', 'Prijava ok'),
(20, '2', 1592132284, 'admin', '::1', 'Odjava ok'),
(21, '1', 1592132290, 'admin', '::1', 'Prijava ok'),
(22, '2', 1592132552, 'admin', '::1', 'Odjava ok'),
(23, '1', 1592132557, 'admin', '::1', 'Prijava ok'),
(24, '2', 1592132624, 'admin', '::1', 'Odjava ok'),
(25, '1', 1592132819, 'admin', '::1', 'Prijava ok'),
(26, '2', 0, 'admin', '::1', 'Odjava ok'),
(27, '1', 0, 'admin', '::1', 'Prijava ok'),
(28, '2', 0, 'admin', '::1', 'Odjava ok'),
(29, '1', 0, 'admin', '::1', 'Prijava ok'),
(30, '2', 0, 'admin', '::1', 'Odjava ok'),
(31, '1', 0, 'admin', '::1', 'Prijava ok'),
(32, '2', 0, 'admin', '::1', 'Odjava ok'),
(33, '1', 1592134240, 'admin', '::1', 'Prijava ok'),
(34, '2', 1592156693, 'admin', '::1', 'Odjava ok'),
(35, '1', 1592142322, 'admin', '::1', 'Prijava ok'),
(36, '2', 1592156759, 'admin', '::1', 'Odjava ok'),
(37, '1', 1592142504, 'admin', '::1', 'Prijava ok'),
(38, '2', 1592142524, 'admin', '::1', 'Odjava ok'),
(39, '1', 1592144710, 'admin', '::1', 'Prijava ok'),
(40, '1', 1592235455, 'admin', '::1', 'Prijava ok'),
(41, '7', 1592236793, 'admin', '::1', 'Dodavanje vrtića, status 2'),
(42, '7', 1592236874, 'admin', '::1', 'Dodavanje vrtića, status 1'),
(43, '7', 1592237100, 'admin', '::1', 'Dodavanje vrtića, status 1'),
(44, '7', 1592237192, 'admin', '::1', 'Dodavanje vrtića, status 1'),
(45, '7', 1592238854, 'admin', '::1', '1'),
(46, '7', 1592238901, 'admin', '::1', '1'),
(47, '7', 1592238934, 'admin', '::1', 'Pregled slika vrtića (id: 1)'),
(48, '2', 1592238946, 'admin', '::1', 'Odjava ok'),
(49, '7', 1592238950, NULL, '::1', 'Pregled slika vrtića (id: 1)'),
(50, '1', 1592239127, 'admin', '::1', 'Prijava ok'),
(51, '2', 1592150369, NULL, '::1', 'Odjava ok'),
(52, '1', 1592150379, 'admin', '::1', 'Prijava ok'),
(53, '7', 1592156717, 'admin', '::1', 'Pregled slika vrtića (id: 1)'),
(54, '6', 1592162643, 'admin', '::1', 'Dodavanje vrtića, status 2'),
(55, '6', 1592162654, 'admin', '::1', 'Dodavanje vrtića, status 2'),
(56, '6', 1592162662, 'admin', '::1', 'Dodavanje vrtića, status 2'),
(57, '1', 1592216204, 'admin', '127.0.0.1', 'Prijava ok'),
(58, '9', 1592219278, 'admin', '127.0.0.1', 'Lista korisnika'),
(59, '9', 1592219290, 'admin', '127.0.0.1', 'Lista korisnika'),
(60, '9', 1592219370, 'admin', '127.0.0.1', 'Lista korisnika'),
(61, '9', 1592219387, 'admin', '127.0.0.1', 'Lista korisnika'),
(62, '9', 1592219411, 'admin', '127.0.0.1', 'Lista korisnika'),
(63, '9', 1592219427, 'admin', '127.0.0.1', 'Lista korisnika'),
(64, '10', 1592219430, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(65, '9', 1592219439, 'admin', '127.0.0.1', 'Lista korisnika'),
(66, '10', 1592219450, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(67, '9', 1592219499, 'admin', '127.0.0.1', 'Lista korisnika'),
(68, '9', 1592219504, 'admin', '127.0.0.1', 'Lista korisnika'),
(69, '10', 1592219512, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(70, '9', 1592219550, 'admin', '127.0.0.1', 'Lista korisnika'),
(71, '10', 1592219554, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(72, '9', 1592219698, 'admin', '127.0.0.1', 'Lista korisnika'),
(73, '9', 1592219741, 'admin', '127.0.0.1', 'Lista korisnika'),
(74, '9', 1592219800, 'admin', '127.0.0.1', 'Lista korisnika'),
(75, '10', 1592219803, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(76, '9', 1592219807, 'admin', '127.0.0.1', 'Lista korisnika'),
(77, '9', 1592219897, 'admin', '127.0.0.1', 'Lista korisnika'),
(78, '10', 1592219900, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(79, '9', 1592219970, 'admin', '127.0.0.1', 'Lista korisnika'),
(80, '10', 1592219974, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(81, '9', 1592219991, 'admin', '127.0.0.1', 'Lista korisnika'),
(82, '10', 1592219996, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(83, '9', 1592220139, 'admin', '127.0.0.1', 'Lista korisnika'),
(84, '10', 1592220142, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(85, '9', 1592220166, 'admin', '127.0.0.1', 'Lista korisnika'),
(86, '10', 1592220171, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(87, '9', 1592220179, 'admin', '127.0.0.1', 'Lista korisnika'),
(88, '9', 1592220205, 'admin', '127.0.0.1', 'Lista korisnika'),
(89, '10', 1592220207, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(90, '10', 1592220217, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(91, '10', 1592220245, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(92, '9', 1592220250, 'admin', '127.0.0.1', 'Lista korisnika'),
(93, '10', 1592220255, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(94, '10', 1592220264, NULL, '127.0.0.1', 'Promjena statusa korisnika admin'),
(95, '10', 1592220270, NULL, '127.0.0.1', 'Promjena statusa korisnika admin'),
(96, '9', 1592220274, 'admin', '127.0.0.1', 'Lista korisnika'),
(97, '9', 1592220330, 'admin', '127.0.0.1', 'Lista korisnika'),
(98, '10', 1592220332, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(99, '10', 1592220337, NULL, '127.0.0.1', 'Promjena statusa korisnika admin'),
(100, '10', 1592220339, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(101, '10', 1592220345, NULL, '127.0.0.1', 'Promjena statusa korisnika kkeeling'),
(102, '10', 1592220350, NULL, '127.0.0.1', 'Promjena statusa korisnika admin'),
(103, '10', 1592220353, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(104, '10', 1592220361, NULL, '127.0.0.1', 'Promjena statusa korisnika ivo2'),
(105, '10', 1592220363, NULL, '127.0.0.1', 'Promjena statusa korisnika ivo2'),
(106, '2', 1592220477, 'admin', '127.0.0.1', 'Odjava ok'),
(107, '1', 1592220502, 'admin', '127.0.0.1', 'Prijava ok'),
(108, '9', 1592220507, 'admin', '127.0.0.1', 'Lista korisnika'),
(109, '10', 1592220512, NULL, '127.0.0.1', 'Promjena statusa korisnika dhodson'),
(110, '9', 1592220699, 'admin', '127.0.0.1', 'Lista korisnika'),
(111, '9', 1592220722, 'admin', '127.0.0.1', 'Lista korisnika'),
(112, '9', 1592220733, 'admin', '127.0.0.1', 'Lista korisnika'),
(113, '9', 1592220734, 'admin', '127.0.0.1', 'Lista korisnika'),
(114, '9', 1592220759, 'admin', '127.0.0.1', 'Lista korisnika'),
(115, '9', 1592220760, 'admin', '127.0.0.1', 'Lista korisnika'),
(116, '9', 1592220790, 'admin', '127.0.0.1', 'Lista korisnika'),
(117, '9', 1592220825, 'admin', '127.0.0.1', 'Lista korisnika'),
(118, '9', 1592220893, 'admin', '127.0.0.1', 'Lista korisnika'),
(119, '9', 1592220906, 'admin', '127.0.0.1', 'Lista korisnika'),
(120, '9', 1592220920, 'admin', '127.0.0.1', 'Lista korisnika'),
(121, '9', 1592220933, 'admin', '127.0.0.1', 'Lista korisnika'),
(122, '9', 1592220946, 'admin', '127.0.0.1', 'Lista korisnika'),
(123, '10', 1592220948, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(124, '10', 1592220953, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(125, '7', 1592221943, 'admin', '127.0.0.1', 'Pregled slika vrtića (id: 1)'),
(126, '9', 1592222024, 'admin', '127.0.0.1', 'Lista korisnika'),
(127, '10', 1592222048, NULL, '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(128, '9', 1592222098, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(129, '9', 1592222119, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(130, '9', 1592222250, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(131, '9', 1592222333, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(132, '9', 1592222361, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(133, '10', 1592222378, '', '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(134, '9', 1592222408, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(135, '9', 1592222463, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(136, '10', 1592222467, '', '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(137, '9', 1592222496, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(138, '10', 1592222498, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago'),
(139, '9', 1592222566, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(140, '10', 1592222568, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago Nova vrijednost aktivan: 1'),
(141, '10', 1592222570, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago Nova vrijednost aktivan: 0'),
(142, '10', 1592222704, 'admin', '127.0.0.1', 'Promjena statusa korisnika ivo2. Nova vrijednost aktivan: 0'),
(143, '10', 1592222705, 'admin', '127.0.0.1', 'Promjena statusa korisnika ivo2. Nova vrijednost aktivan: 1'),
(144, '7', 1592223044, 'admin', '127.0.0.1', 'Pregled slika vrtića (id: 1)'),
(145, '11', 1592233976, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(146, '9', 1592233990, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(147, '10', 1592233993, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 1'),
(148, '9', 1592234056, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(149, '2', 1592234213, 'admin', '127.0.0.1', 'Odjava ok'),
(150, '13', 1592234231, 'ivo3', '127.0.0.1', 'Greška kod registracije za kor. ime ivo3'),
(151, '12', 1592234268, 'ivo3', '127.0.0.1', 'Registracija uspješna'),
(152, '12', 1592236076, 'ivo4', '127.0.0.1', 'Registracija uspješna'),
(153, '14', 1592236091, 'ivo5', '127.0.0.1', 'Neispravna captcha.'),
(154, '13', 1592236091, 'ivo5', '127.0.0.1', 'Greška kod registracije za kor. ime ivo5'),
(155, '14', 1592236209, 'ivo5', '127.0.0.1', 'Neispravna captcha.'),
(156, '13', 1592236209, 'ivo5', '127.0.0.1', 'Greška kod registracije za kor. ime ivo5'),
(157, '1', 1592246613, 'admin', '127.0.0.1', 'Prijava ok'),
(158, '11', 1592246618, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(159, '9', 1592246637, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(160, '10', 1592246670, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 0'),
(161, '10', 1592246684, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 1'),
(162, '10', 1592246685, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 0'),
(163, '10', 1592246686, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 1'),
(164, '10', 1592246688, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 0'),
(165, '10', 1592246691, 'admin', '127.0.0.1', 'Promjena statusa korisnika csantiago. Nova vrijednost aktivan: 1'),
(166, '2', 1592250808, 'admin', '127.0.0.1', 'Odjava ok'),
(167, '1', 1592251336, 'admin', '127.0.0.1', 'Prijava ok'),
(168, '11', 1592251506, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(169, '9', 1592251510, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(170, '2', 1592252289, 'admin', '127.0.0.1', 'Odjava ok'),
(171, '7', 1592252296, NULL, '127.0.0.1', 'Pregled slika vrtića (id: 8)'),
(172, '7', 1592252303, NULL, '127.0.0.1', 'Pregled slika vrtića (id: 3)'),
(173, '7', 1592252306, NULL, '127.0.0.1', 'Pregled slika vrtića (id: 1)'),
(174, '1', 1592252392, 'admin', '127.0.0.1', 'Prijava ok'),
(175, '2', 1592252394, 'admin', '127.0.0.1', 'Odjava ok'),
(176, '1', 1592252400, 'admin', '127.0.0.1', 'Prijava ok'),
(177, '11', 1592252404, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(178, '9', 1592252413, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(179, '10', 1592252420, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 1'),
(180, '10', 1592252421, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 0'),
(181, '10', 1592252422, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 1'),
(182, '10', 1592252423, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 0'),
(183, '10', 1592252427, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 1'),
(184, '10', 1592252438, 'admin', '127.0.0.1', 'Promjena statusa korisnika fglover. Nova vrijednost aktivan: 0'),
(185, '2', 1592252495, 'admin', '127.0.0.1', 'Odjava ok'),
(186, '7', 1592252509, NULL, '127.0.0.1', 'Pregled slika vrtića (id: 1)'),
(187, '1', 1592252576, 'admin', '127.0.0.1', 'Prijava ok'),
(188, '11', 1592252579, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(189, '9', 1592252590, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(190, '10', 1592252594, 'admin', '127.0.0.1', 'Promjena statusa korisnika admin. Nova vrijednost aktivan: 0'),
(191, '9', 1592254929, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(192, '9', 1592255590, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(193, '9', 1592256250, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(194, '2', 1592263407, 'admin', '127.0.0.1', 'Odjava ok'),
(195, '1', 1592263844, 'admin', '127.0.0.1', 'Prijava ok'),
(196, '2', 1592317283, 'admin', '127.0.0.1', 'Odjava ok'),
(197, '1', 1592317315, 'akidd', '127.0.0.1', 'Prijava ok'),
(198, '2', 1592317377, 'akidd', '127.0.0.1', 'Odjava ok'),
(199, '1', 1592317382, 'akidd', '127.0.0.1', 'Prijava ok'),
(200, '2', 1592317415, 'akidd', '127.0.0.1', 'Odjava ok'),
(201, '1', 1592317420, 'akidd', '127.0.0.1', 'Prijava ok'),
(202, '2', 1592318379, 'akidd', '127.0.0.1', 'Odjava ok'),
(203, '1', 1592318385, 'admin', '127.0.0.1', 'Prijava ok'),
(204, '2', 1592319159, 'admin', '127.0.0.1', 'Odjava ok'),
(205, '1', 1592319164, 'akidd', '127.0.0.1', 'Prijava ok'),
(206, '2', 1592325233, 'akidd', '127.0.0.1', 'Odjava ok'),
(207, '1', 1592325241, 'admin', '127.0.0.1', 'Prijava ok'),
(208, '2', 1592325244, 'admin', '127.0.0.1', 'Odjava ok'),
(209, '1', 1592325260, 'akidd', '127.0.0.1', 'Prijava ok'),
(210, '13', 1592330010, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(211, '13', 1592330058, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(212, '13', 1592330077, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(213, '13', 1592330123, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(214, '13', 1592330152, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(215, '13', 1592330165, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(216, '13', 1592330186, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(217, '13', 1592330196, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(218, '13', 1592330235, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(219, '13', 1592330255, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(220, '13', 1592330283, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(221, '13', 1592330301, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(222, '13', 1592330309, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(223, '13', 1592330348, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(224, '13', 1592330360, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(225, '13', 1592330363, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(226, '13', 1592330392, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(227, '13', 1592330423, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(228, '13', 1592330435, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(229, '13', 1592330449, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(230, '13', 1592330559, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(231, '13', 1592330588, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(232, '13', 1592330654, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(233, '13', 1592330677, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(234, '13', 1592330784, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(235, '13', 1592330849, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(236, '13', 1592330932, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(237, '13', 1592334625, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(238, '13', 1592334705, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(239, '13', 1592335027, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(240, '13', 1592335048, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(241, '13', 1592335437, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(242, '13', 1592335483, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(243, '13', 1592335809, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(244, '2', 1592338193, 'akidd', '127.0.0.1', 'Odjava ok'),
(245, '3', 1592338257, 'moderator', '127.0.0.1', 'Pogrešna prijava'),
(246, '1', 1592338297, 'moderator', '127.0.0.1', 'Prijava ok'),
(247, '2', 1592338631, 'moderator', '127.0.0.1', 'Odjava ok'),
(248, '1', 1592338640, 'akidd', '127.0.0.1', 'Prijava ok'),
(249, '13', 1592338644, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(250, '13', 1592338652, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(251, '13', 1592338743, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(252, '13', 1592339237, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(253, '13', 1592339339, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(254, '14', 1592339346, 'akidd', '127.0.0.1', 'Plaćen račun br:  1'),
(255, '13', 1592339407, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(256, '14', 1592339412, 'akidd', '127.0.0.1', 'Plaćen račun br:  1'),
(257, '13', 1592339505, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(258, '13', 1592339529, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(259, '14', 1592339533, 'akidd', '127.0.0.1', 'Plaćen račun br:  1'),
(260, '13', 1592339633, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(261, '14', 1592339637, 'akidd', '127.0.0.1', 'Plaćen račun br:  2'),
(262, '14', 1592339644, 'akidd', '127.0.0.1', 'Plaćen račun br:  1'),
(263, '2', 1592339697, 'akidd', '127.0.0.1', 'Odjava ok'),
(264, '1', 1592339704, 'admin', '127.0.0.1', 'Prijava ok'),
(265, '9', 1592342489, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(266, '11', 1592342494, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 2h'),
(267, '15', 1592343044, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(268, '15', 1592343112, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(269, '15', 1592343120, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(270, '15', 1592343183, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(271, '15', 1592343187, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(272, '15', 1592343347, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(273, '15', 1592343659, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(274, '15', 1592343663, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(275, '15', 1592343676, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(276, '15', 1592343763, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(277, '15', 1592343824, 'admin', '127.0.0.1', 'Promjena postavki sustava2'),
(278, '15', 1592343828, 'admin', '127.0.0.1', 'Promjena postavki sustava1'),
(279, '2', 1592349362, 'admin', '127.0.0.1', 'Odjava ok'),
(280, '1', 1592349368, 'akidd', '127.0.0.1', 'Prijava ok'),
(281, '15', 1592350182, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(282, '15', 1592350297, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(283, '15', 1592350412, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(284, '15', 1592350445, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(285, '15', 1592350480, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(286, '15', 1592350565, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(287, '15', 1592350616, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(288, '15', 1592350731, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(289, '15', 1592350755, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(290, '15', 1592350802, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(291, '15', 1592351039, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(292, '15', 1592351085, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(293, '15', 1592351125, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(294, '15', 1592351160, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(295, '1', 1592390474, 'akidd', '127.0.0.1', 'Prijava ok'),
(296, '15', 1592390479, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(297, '15', 1592390493, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(298, '15', 1592390520, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(299, '15', 1592390597, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(300, '15', 1592390624, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(301, '15', 1592390643, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(302, '15', 1592390650, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(303, '15', 1592390765, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(304, '13', 1592390777, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(305, '13', 1592390797, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(306, '13', 1592390945, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(307, '15', 1592390962, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(308, '15', 1592390970, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(309, '15', 1592390979, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(310, '15', 1592391011, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(311, '15', 1592391054, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(312, '15', 1592391062, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(313, '13', 1592391092, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(314, '13', 1592391106, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(315, '13', 1592391128, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(316, '15', 1592391135, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(317, '2', 1592391140, 'akidd', '127.0.0.1', 'Odjava ok'),
(318, '1', 1592391146, 'admin', '127.0.0.1', 'Prijava ok'),
(319, '9', 1592391162, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(320, '9', 1592391186, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(321, '15', 1592391228, 'admin', '127.0.0.1', 'Promjena postavki sustava1'),
(322, '11', 1594184039, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 500h'),
(323, '11', 1592388387, 'admin', '127.0.0.1', 'Čita pomak (1h)'),
(324, '11', 1594184803, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 500h'),
(325, '11', 1594184803, 'admin', '127.0.0.1', 'Čita pomak (500h)'),
(326, '11', 1592392026, 'admin', '127.0.0.1', 'Čita pomak (2h)'),
(327, '11', 1592392048, 'admin', '127.0.0.1', 'Čita pomak (2h)'),
(328, '11', 1592392093, 'admin', '127.0.0.1', 'Čita pomak (2h)'),
(329, '11', 1594184909, 'admin', '127.0.0.1', 'Izvršen pomak virtualnog vremena za 500h'),
(330, '11', 1594184909, 'admin', '127.0.0.1', 'Čita pomak (500h)'),
(331, '11', 1592395722, 'admin', '127.0.0.1', 'Čita pomak (3h)'),
(332, '15', 1592396094, 'admin', '127.0.0.1', 'Promjena postavki sustava1'),
(333, '15', 1592396136, 'admin', '127.0.0.1', 'Čita postavke sustava'),
(334, '9', 1592396264, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(335, '9', 1592396276, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(336, '2', 1592398189, 'admin', '127.0.0.1', 'Odjava ok'),
(337, '7', 1592398325, NULL, '127.0.0.1', 'Pregled slika vrtića (id: 1)'),
(338, '1', 1592398432, 'akidd', '127.0.0.1', 'Prijava ok'),
(339, '13', 1592398441, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(340, '14', 1592398450, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(341, '13', 1592398618, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(342, '13', 1592398647, 'akidd', '127.0.0.1', 'Lista sve svoje račune'),
(343, '15', 1592398672, 'akidd', '127.0.0.1', 'Lista prijave za upis'),
(344, '2', 1592398722, 'akidd', '127.0.0.1', 'Odjava ok'),
(345, '3', 1592398726, 'akidd', '127.0.0.1', 'Pogrešna prijava'),
(346, '3', 1592398729, 'akidd', '127.0.0.1', 'Pogrešna prijava'),
(347, '3', 1592398731, 'akidd', '127.0.0.1', 'Pogrešna prijava'),
(348, '3', 1592398734, 'akidd', '127.0.0.1', 'Pogrešna prijava'),
(349, '4', 1592398734, 'akidd', '127.0.0.1', 'Blokada korisnika'),
(350, '1', 1592398743, 'admin', '127.0.0.1', 'Prijava ok'),
(351, '9', 1592398748, 'admin', '127.0.0.1', 'Lista sve korisnike'),
(352, '10', 1592398758, 'admin', '127.0.0.1', 'Promjena statusa korisnika akidd. Nova vrijednost aktivan: 1'),
(353, '2', 1592398760, 'admin', '127.0.0.1', 'Odjava ok'),
(354, '1', 1592398765, 'akidd', '127.0.0.1', 'Prijava ok'),
(355, '2', 1592398854, 'akidd', '127.0.0.1', 'Odjava ok'),
(356, '12', 1592398877, 'ivo5', '127.0.0.1', 'Registracija uspješna'),
(357, '6', 1592398923, 'ivo5', '::1', 'Token istekao'),
(358, '6', 1592398935, 'ivo5', '::1', 'Token istekao'),
(359, '6', 1592398981, 'ivo5', '::1', 'Token istekao'),
(360, '6', 1592399055, 'ivo5', '::1', 'Token istekao'),
(361, '12', 1592399242, 'ivo6', '127.0.0.1', 'Registracija uspješna'),
(362, '6', 1592399266, 'ivo6', '::1', 'Aktiviran'),
(363, '6', 1592399313, 'ivo6', '::1', 'Token istekao'),
(364, '6', 1592399329, 'ivo6', '::1', 'Aktiviran'),
(365, '1', 1592399418, 'admin', '::1', 'Prijava ok'),
(366, '2', 1592388904, 'admin', '::1', 'Istekla sesija'),
(367, '2', 1592388904, 'admin', '::1', 'Odjava ok'),
(368, '2', 1592388931, 'admin', '::1', 'Istekla sesija'),
(369, '1', 1592388934, 'admin', '::1', 'Prijava ok'),
(370, '2', 1592388936, 'admin', '::1', 'Odjava ok'),
(371, '1', 1592388945, 'admin', '::1', 'Prijava ok'),
(372, '2', 1592410572, 'admin', '::1', 'Istekla sesija'),
(373, '1', 1592389123, 'admin', '::1', 'Prijava ok'),
(374, '11', 1592389130, 'admin', '::1', 'Čita pomak (0h)'),
(375, '15', 1592389438, 'admin', '::1', 'Čita postavke sustava'),
(376, '15', 1592389447, 'admin', '::1', 'Promjena postavki sustava (status: 1)'),
(377, '15', 1592389447, 'admin', '::1', 'Čita postavke sustava'),
(378, '2', 1592418301, 'admin', '::1', 'Istekla sesija'),
(379, '1', 1592389513, 'admin', '::1', 'Prijava ok'),
(380, '15', 1592389517, 'admin', '::1', 'Čita postavke sustava'),
(381, '15', 1592389521, 'admin', '::1', 'Promjena postavki sustava (status: 1)'),
(382, '15', 1592389521, 'admin', '::1', 'Čita postavke sustava'),
(383, '2', 1592389701, 'admin', '::1', 'Odjava ok'),
(384, '1', 1592389707, 'akidd', '::1', 'Prijava ok'),
(385, '15', 1592389712, 'akidd', '::1', 'Lista prijave za upis'),
(386, '13', 1592389733, 'akidd', '::1', 'Lista sve svoje račune'),
(387, '2', 1592389739, 'akidd', '::1', 'Odjava ok'),
(388, '1', 1592389743, 'admin', '::1', 'Prijava ok'),
(389, '2', 1592394591, 'admin', '::1', 'Odjava ok'),
(390, '1', 1592394670, 'admin', '::1', 'Prijava ok'),
(391, '15', 1592395944, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(392, '15', 1592396048, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(393, '15', 1592396123, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(394, '15', 1592396148, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(395, '15', 1592396186, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(396, '15', 1592396208, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(397, '15', 1592396263, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(398, '15', 1592396791, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(399, '15', 1592396802, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(400, '15', 1592396919, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(401, '15', 1592396962, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(402, '15', 1592396963, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(403, '15', 1592396970, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(404, '15', 1592397063, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(405, '15', 1592397066, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(406, '15', 1592397083, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(407, '15', 1592397086, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(408, '15', 1592397086, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 1'),
(409, '15', 1592397140, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(410, '15', 1592397143, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 1'),
(411, '15', 1592397143, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(412, '15', 1592397190, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(413, '15', 1592397192, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 1'),
(414, '15', 1592397192, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(415, '15', 1592397263, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(416, '15', 1592397266, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 1'),
(417, '15', 1592397266, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(418, '15', 1592397346, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 7'),
(419, '15', 1592397349, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 7'),
(420, '15', 1592397349, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 7'),
(421, '15', 1592397359, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 8'),
(422, '15', 1592397363, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 8'),
(423, '15', 1592397363, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 8'),
(424, '15', 1592397378, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 3'),
(425, '15', 1592397380, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 3'),
(426, '15', 1592397380, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 3'),
(427, '15', 1592397390, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 9'),
(428, '15', 1592397392, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 9'),
(429, '15', 1592397392, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 9'),
(430, '15', 1592397413, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 9'),
(431, '15', 1592397415, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 4'),
(432, '15', 1592397417, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 4'),
(433, '15', 1592397418, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 4'),
(434, '15', 1592397421, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 4'),
(435, '15', 1592397421, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 4'),
(436, '15', 1592397438, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(437, '15', 1592397441, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(438, '15', 1592397441, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(439, '15', 1592397513, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(440, '15', 1592397516, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(441, '15', 1592397516, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(442, '15', 1592397534, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(443, '15', 1592397536, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(444, '15', 1592397536, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(445, '15', 1592397546, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(446, '15', 1592397546, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(447, '15', 1592397557, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(448, '15', 1592397564, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(449, '15', 1592397566, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(450, '15', 1592397607, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(451, '15', 1592397608, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(452, '15', 1592397608, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(453, '15', 1592397617, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(454, '15', 1592397617, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(455, '15', 1592397620, 'admin', '::1', 'Upis ocjene za vrtić 2 i mjesec 2'),
(456, '15', 1592397620, 'admin', '::1', 'Dohvat ocjene za vrtić 2 i mjesec 2'),
(457, '15', 1592397637, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(458, '15', 1592397641, 'admin', '::1', 'Upis ocjene za vrtić 1 i mjesec 1'),
(459, '15', 1592397641, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(460, '15', 1592397646, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 1'),
(461, '15', 1592397648, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 3'),
(462, '15', 1592397649, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(463, '15', 1592397653, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(464, '15', 1592397653, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(465, '15', 1592397683, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(466, '15', 1592397686, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(467, '15', 1592397686, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(468, '15', 1592397688, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(469, '15', 1592397688, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(470, '15', 1592397693, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(471, '15', 1592397693, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(472, '15', 1592397713, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(473, '15', 1592397715, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(474, '15', 1592397715, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(475, '15', 1592397718, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(476, '15', 1592397718, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(477, '15', 1592397721, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(478, '15', 1592397721, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(479, '15', 1592397724, 'admin', '::1', 'Upis ocjene za vrtić 10 i mjesec 4'),
(480, '15', 1592397724, 'admin', '::1', 'Dohvat ocjene za vrtić 10 i mjesec 4'),
(481, '15', 1592425792, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 4'),
(482, '15', 1592425794, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 1'),
(483, '15', 1592425797, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 2'),
(484, '15', 1592425800, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 8'),
(485, '15', 1592425803, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 12'),
(486, '15', 1592425806, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 11'),
(487, '15', 1592425808, 'admin', '::1', 'Dohvat ocjene za vrtić 1 i mjesec 9'),
(488, '2', 1592425814, 'admin', '::1', 'Istekla sesija'),
(489, '1', 1592425822, 'admin', '::1', 'Prijava ok'),
(490, '15', 1592425832, 'admin', '::1', 'Čita postavke sustava'),
(491, '2', 1592425861, 'admin', '::1', 'Odjava ok'),
(492, '1', 1592425869, 'akidd', '::1', 'Prijava ok'),
(493, '15', 1592425923, 'akidd', '::1', 'Lista prijave za upis'),
(494, '13', 1592425934, 'akidd', '::1', 'Lista sve svoje račune'),
(495, '14', 1592425954, 'akidd', '::1', 'Lista sve svoje račune'),
(496, '2', 1592472784, 'akidd', '::1', 'Istekla sesija'),
(497, '1', 1592472807, 'akidd', '::1', 'Prijava ok'),
(498, '15', 1592472863, 'akidd', '::1', 'Lista prijave za upis'),
(499, '13', 1592472924, 'akidd', '::1', 'Lista sve svoje račune'),
(500, '13', 1592472953, 'akidd', '::1', 'Lista sve svoje račune'),
(501, '14', 1592472959, 'akidd', '::1', 'Plaćen račun br:  1'),
(502, '14', 1592472978, 'akidd', '::1', 'Plaćen račun br:  2'),
(503, '14', 1592472994, 'akidd', '::1', 'Lista sve svoje račune'),
(504, '15', 1592472999, 'akidd', '::1', 'Lista prijave za upis'),
(505, '13', 1592473985, 'akidd', '::1', 'Lista sve svoje račune'),
(506, '14', 1592473987, 'akidd', '::1', 'Lista sve svoje račune'),
(507, '14', 1592474259, 'akidd', '::1', 'Lista sve svoje račune'),
(508, '14', 1592474445, 'akidd', '::1', 'Lista sve svoje račune'),
(509, '14', 1592474476, 'akidd', '::1', 'Lista sve svoje račune'),
(510, '14', 1592474514, 'akidd', '::1', 'Lista sve svoje račune'),
(511, '14', 1592474564, 'akidd', '::1', 'Lista sve svoje račune'),
(512, '2', 1592474573, 'akidd', '::1', 'Odjava ok'),
(513, '1', 1592474586, 'admin', '::1', 'Prijava ok'),
(514, '15', 1592474591, 'admin', '::1', 'Čita postavke sustava'),
(515, '15', 1592474596, 'admin', '::1', 'Promjena postavki sustava (status: 1)'),
(516, '15', 1592474596, 'admin', '::1', 'Čita postavke sustava'),
(517, '15', 1592474626, 'admin', '::1', 'Promjena postavki sustava (status: 1)'),
(518, '15', 1592474626, 'admin', '::1', 'Čita postavke sustava'),
(519, '2', 1592474631, 'admin', '::1', 'Odjava ok'),
(520, '1', 1592474638, 'akidd', '::1', 'Prijava ok'),
(521, '14', 1592474643, 'akidd', '::1', 'Lista sve svoje račune'),
(522, '2', 1592474890, 'akidd', '::1', 'Odjava ok'),
(523, '1', 1592474903, 'moderator', '::1', 'Prijava ok'),
(524, '16', 1592475491, 'moderator', '::1', 'Dodavanje skupine, status 1'),
(525, '16', 1592475650, 'moderator', '::1', 'Dodavanje skupine, status 1'),
(526, '7', 1592475960, 'moderator', '::1', 'Pregled slika vrtića (id: 5)'),
(527, '7', 1592475964, 'moderator', '::1', 'Pregled slika vrtića (id: 1)'),
(528, '2', 1592476760, 'moderator', '::1', 'Odjava ok'),
(529, '1', 1592476789, 'moderator', '::1', 'Prijava ok'),
(530, '7', 1592488669, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 7)'),
(531, '7', 1592488673, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 4)'),
(532, '7', 1592488724, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(533, '7', 1592488747, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(534, '7', 1592488919, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(535, '7', 1592488934, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(536, '7', 1592488967, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(537, '1', 1592490978, 'admin', '93.138.29.138', 'Prijava ok'),
(538, '11', 1592490987, 'admin', '93.138.29.138', 'Čita pomak (0h)'),
(539, '11', 1592490994, 'admin', '93.138.29.138', 'Izvršen pomak virtualnog vremena za 0h'),
(540, '11', 1592490994, 'admin', '93.138.29.138', 'Čita pomak (0h)'),
(541, '11', 1592491064, 'admin', '93.138.29.138', 'Čita pomak (0h)'),
(542, '11', 1592509084, 'admin', '93.138.29.138', 'Izvršen pomak virtualnog vremena za 5h'),
(543, '11', 1592509084, 'admin', '93.138.29.138', 'Čita pomak (5h)'),
(544, '11', 1592494729, 'admin', '93.138.29.138', 'Čita pomak (1h)'),
(545, '2', 1592494748, 'admin', '93.138.29.138', 'Odjava ok'),
(546, '1', 1592494767, 'admin', '93.138.29.138', 'Prijava ok'),
(547, '2', 1592495431, 'admin', '93.138.29.138', 'Odjava ok'),
(548, '1', 1592495437, 'akidd', '93.138.29.138', 'Prijava ok'),
(549, '2', 1592495440, 'akidd', '93.138.29.138', 'Odjava ok'),
(550, '1', 1592495445, 'akidd', '93.138.29.138', 'Prijava ok'),
(551, '2', 1592495447, 'akidd', '93.138.29.138', 'Odjava ok'),
(552, '1', 1592495455, 'akidd', '93.138.29.138', 'Prijava ok'),
(553, '15', 1592495463, 'akidd', '93.138.29.138', 'Lista prijave za upis'),
(554, '2', 1592500327, NULL, '93.138.29.138', 'Odjava ok'),
(555, '1', 1592500334, 'admin', '93.138.29.138', 'Prijava ok'),
(556, '11', 1592500339, 'admin', '93.138.29.138', 'Čita pomak (1h)'),
(557, '11', 1592514778, 'admin', '93.138.29.138', 'Izvršen pomak virtualnog vremena za 5h'),
(558, '11', 1592514778, 'admin', '93.138.29.138', 'Čita pomak (5h)'),
(559, '2', 1592514819, 'admin', '93.138.29.138', 'Istekla sesija'),
(560, '1', 1592514824, 'admin', '93.138.29.138', 'Prijava ok'),
(561, '11', 1592514828, 'admin', '93.138.29.138', 'Čita pomak (5h)'),
(562, '11', 1592515872, 'admin', '93.138.29.138', 'Čita pomak (5h)'),
(563, '11', 1592515888, 'admin', '93.138.29.138', 'Čita pomak (5h)'),
(564, '11', 1592479897, 'admin', '93.138.29.138', 'Izvršen pomak virtualnog vremena za -5h'),
(565, '11', 1592479897, 'admin', '93.138.29.138', 'Čita pomak (-5h)'),
(566, '3', 1592483418, 'admin', '89.164.1.2', 'Pogrešna prijava'),
(567, '3', 1592483435, 'admin', '89.164.1.2', 'Pogrešna prijava'),
(568, '3', 1592483442, 'admin', '89.164.1.2', 'Pogrešna prijava'),
(569, '3', 1592483499, 'admin', '93.142.248.75', 'Pogrešna prijava'),
(570, '4', 1592483499, 'admin', '93.142.248.75', 'Blokada korisnika'),
(571, '7', 1592484075, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(572, '7', 1592484084, NULL, '93.138.29.138', 'Pregled slika vrtića (id: 1)'),
(573, '12', 1592490622, 'ivi', '93.138.29.138', 'Registracija uspješna'),
(574, '12', 1592490771, 'ivvi', '93.138.29.138', 'Registracija uspješna'),
(575, '6', 1592490780, 'ivvi', '93.138.29.138', 'Aktiviran'),
(576, '1', 1592490993, 'ivvi', '93.138.29.138', 'Prijava ok'),
(577, '13', 1592491001, 'ivvi', '93.138.29.138', 'Lista sve svoje račune'),
(578, '15', 1592491004, 'ivvi', '93.138.29.138', 'Lista prijave za upis'),
(579, '14', 1592491007, 'ivvi', '93.138.29.138', 'Lista sve svoje račune'),
(580, '2', 1592491017, 'ivvi', '93.138.29.138', 'Odjava ok'),
(581, '1', 1592491058, 'admin', '93.138.29.138', 'Prijava ok'),
(582, '15', 1592491069, 'admin', '93.138.29.138', 'Dohvat ocjene za vrtić 1 i mjesec 4'),
(583, '15', 1592491075, 'admin', '93.138.29.138', 'Dohvat ocjene za vrtić 1 i mjesec 4'),
(584, '15', 1592491075, 'admin', '93.138.29.138', 'Upis ocjene za vrtić 1 i mjesec 4'),
(585, '2', 1592491088, 'admin', '93.138.29.138', 'Odjava ok'),
(586, '5', 1592491093, 'ivvi', '93.138.29.138', 'Resetirana lozinka'),
(587, '5', 1592491161, 'ivvi', '93.138.29.138', 'Resetirana lozinka'),
(588, '5', 1592491281, 'ivvi', '93.138.29.138', 'Resetirana lozinka'),
(589, '1', 1592491306, 'ivvi', '93.138.29.138', 'Prijava ok'),
(590, '2', 1592491625, 'ivvi', '93.138.29.138', 'Odjava ok'),
(591, '1', 1592491629, 'admin', '93.138.29.138', 'Prijava ok'),
(592, '8', 1592492238, 'admin', '93.138.29.138', 'Dodavanje vrtića, status 1'),
(593, '15', 1592492896, 'admin', '93.138.29.138', 'Dohvat ocjene za vrtić 1 i mjesec 3'),
(594, '15', 1592492898, 'admin', '93.138.29.138', 'Dohvat ocjene za vrtić 1 i mjesec 4'),
(595, '11', 1592492916, 'admin', '93.138.29.138', 'Čita pomak (-5h)'),
(596, '15', 1592492930, 'admin', '93.138.29.138', 'Čita postavke sustava'),
(597, '9', 1592492973, 'admin', '93.138.29.138', 'Lista sve korisnike'),
(598, '1', 1592495763, 'admin', '93.138.29.138', 'Prijava ok'),
(599, '15', 1592495775, 'admin', '93.138.29.138', 'Dohvat ocjene za vrtić 1 i mjesec 4');

-- --------------------------------------------------------

--
-- Table structure for table `javni_pozivi`
--

CREATE TABLE `javni_pozivi` (
  `Id` int(11) NOT NULL,
  `Broj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Datum` datetime NOT NULL,
  `Datum_Od` datetime NOT NULL,
  `Datum_Do` datetime NOT NULL,
  `Korisnici_Id_Moderator` int(11) NOT NULL,
  `Broj_Mjesta` int(11) NOT NULL,
  `Djecji_Vrtici_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `javni_pozivi`
--

INSERT INTO `javni_pozivi` (`Id`, `Broj`, `Datum`, `Datum_Od`, `Datum_Do`, `Korisnici_Id_Moderator`, `Broj_Mjesta`, `Djecji_Vrtici_Id`) VALUES
(1, '2020/J01', '2020-03-30 11:00:00', '2020-04-01 08:00:00', '2020-04-15 16:00:00', 2, 30, 1),
(2, '2020/J02', '2020-03-30 11:00:00', '2020-04-01 10:00:00', '2020-04-15 18:00:00', 8, 40, 2),
(3, '2020/J03', '2020-03-30 11:00:00', '2020-04-02 08:00:00', '2020-04-16 16:00:00', 5, 20, 3),
(4, '2020/J04', '2020-03-30 11:00:00', '2020-04-02 10:00:00', '2020-04-16 18:00:00', 11, 10, 4),
(5, '2020/J05', '2020-03-30 11:00:00', '2020-04-03 08:00:00', '2020-04-17 16:00:00', 12, 50, 5),
(6, '2020/J06', '2020-03-30 11:00:00', '2020-04-03 10:00:00', '2020-04-17 18:00:00', 13, 40, 6),
(7, '2020/J07', '2020-03-30 11:00:00', '2020-04-04 08:00:00', '2020-04-18 16:00:00', 14, 60, 7),
(8, '2020/J08', '2020-03-30 11:00:00', '2020-04-04 10:00:00', '2020-04-18 18:00:00', 15, 15, 8),
(9, '2020/J09', '2020-03-30 11:00:00', '2020-04-05 08:00:00', '2020-04-19 16:00:00', 16, 8, 9),
(10, '2020/J10', '2020-03-30 11:00:00', '2020-04-05 10:00:00', '2020-04-19 18:00:00', 17, 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `Id` int(11) NOT NULL,
  `Ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Godina_Rodenja` int(11) NOT NULL,
  `Tipovi_Korisnika_Id` int(11) NOT NULL,
  `Korisnicko_Ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka_Sha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Potvrda_Registracije` tinyint(1) NOT NULL,
  `Token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aktivan` int(11) NOT NULL,
  `Broj_Pogresnih_Prijava` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`Id`, `Ime`, `Prezime`, `Godina_Rodenja`, `Tipovi_Korisnika_Id`, `Korisnicko_Ime`, `Lozinka`, `Lozinka_Sha`, `Email`, `Potvrda_Registracije`, `Token`, `Aktivan`, `Broj_Pogresnih_Prijava`) VALUES
(1, 'Admin', 'Admin', 0, 1, 'admin', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin@localhost', 1, NULL, 1, 0),
(2, 'Charlton', 'Santiago', 0, 2, 'csantiago', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'csantiago@gmail.com', 1, NULL, 1, 0),
(3, 'Dani', 'Hodson', 0, 4, 'dhodson', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'dhodson@gmail.com', 0, NULL, 1, 0),
(4, 'Adyan', 'Kidd', 0, 3, 'akidd', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'akidd@gmail.com', 1, NULL, 1, 0),
(5, 'Herbert', 'Alisson', 0, 2, 'halisson', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'halisson@gmail.com', 0, NULL, 0, 0),
(7, 'Faisal', 'Glover', 0, 4, 'fglover', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'fglover@gmail.com', 0, NULL, 0, 0),
(8, 'Kristin', 'Keeling', 0, 2, 'kkeeling', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'kkeeling@gmail.com', 0, NULL, 1, 0),
(9, 'Lennox', 'Holcomb', 0, 3, 'lholcomb', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'lholcomb@gmail.com', 0, NULL, 0, 0),
(10, 'Sharmin', 'Stokes', 0, 3, 'sstokes', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'sstokes@gmail.com', 0, NULL, 0, 0),
(11, 'Ariana', 'Knight', 0, 2, 'aknight', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'aknight@gmail.com', 1, NULL, 0, 0),
(12, 'Deon', 'Sandoval', 0, 2, 'dsandoval', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'dsandoval@gmail.com', 1, NULL, 0, 0),
(13, 'Rabia', 'Nicholls', 0, 2, 'rnicholls', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'rnicholls@gmail.com', 1, NULL, 0, 0),
(14, 'Anis', 'Blackwell', 0, 2, 'ablackwell', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'ablackwell@gmail.com', 1, NULL, 0, 0),
(15, 'Victoria', 'Yu', 0, 2, 'vyu', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'vyu@gmail.com', 1, NULL, 0, 0),
(16, 'Mae', 'Hale', 0, 2, 'mhale', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'mhale@gmail.com', 1, NULL, 0, 0),
(17, 'Teddie', 'Watt', 0, 2, 'twatt', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'twatt@gmail.com', 1, NULL, 0, 0),
(18, 'Jarrad', 'King', 0, 3, 'jking', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'jking@gmail.com', 0, NULL, 0, 0),
(19, 'Gregor', 'Fisher', 0, 3, 'gfisher', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'gfisher@gmail.com', 0, NULL, 0, 0),
(20, 'Maha', 'Felix', 0, 3, 'mfelix', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'mfelix@gmail.com', 1, NULL, 0, 0),
(21, 'Judah', 'Wilder', 0, 3, 'jwilder', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'jwilder@gmail.com', 0, NULL, 0, 0),
(22, 'Glen', 'Hogg', 0, 3, 'ghogg', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'ghogg@gmail.com', 1, NULL, 0, 0),
(23, 'Yusha', 'Shea', 0, 3, 'yshea', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'yshea@gmail.com', 1, NULL, 0, 0),
(24, 'Haiden', 'Guest', 0, 3, 'hguest', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'hguest@gmail.com', 0, NULL, 0, 0),
(31, 'Ivo', 'Ivic', 0, 2, 'ivic', '14ad2L591A', '18f2a02710c93e5554b582f20d9027966c4a86242fe6956945314a4ea6aa262a', 'test@gmail.com', 1, '1592046943', 1, 0),
(32, 'Dadad', 'Markic', 0, 2, 'iivic', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'test@gmail.com', 0, '1592065026', 0, 0),
(33, 'Ivo', 'Ivo', 2000, 3, 'ivo2', '102030', 'a76b7f25b6ba5ec51bd9fa42f4143b63c2495996e783baa4d9f8459d314f6ad2', 'test@test.hr', 1, '1592080054', 1, 0),
(35, 'Moderator', 'Moderator', 1996, 2, 'moderator', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'moderator@gmail.com', 1, NULL, 1, 0),
(36, 'Ddada', 'Dadd', 2015, 2, 'ivo3', '102030', 'a76b7f25b6ba5ec51bd9fa42f4143b63c2495996e783baa4d9f8459d314f6ad2', 'test@test.hr', 0, '1592227067', 0, 0),
(37, 'Ivo', 'Ivo', 2020, 3, 'ivo4', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'test@test.hr', 0, '1592228876', 0, 0),
(38, 'Ivo', 'Ivo', 2020, 3, 'ivo5', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'test@test.hr', 0, '1592388077', 0, 0),
(39, 'Ivo', 'Ivo', 2020, 3, 'ivo6', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'test@test.hr', 1, '1592399241', 1, 0),
(41, 'Ivvo', 'Ivvic', 2010, 3, 'ivvi', 'L91d52a41A', '8a055b1941417983c964b2c0407e717e5ff503b7a0326bd52093783d99002d79', 'ihribljan@gmail.com', 1, '1592490771', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logovi`
--

CREATE TABLE `logovi` (
  `Id` int(11) NOT NULL,
  `Radnja` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Datum_Vrijeme` datetime NOT NULL,
  `Korisnicko_Ime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logovi`
--

INSERT INTO `logovi` (`Id`, `Radnja`, `Datum_Vrijeme`, `Korisnicko_Ime`) VALUES
(1, 'create', '2020-04-01 09:00:00', 'lmelia'),
(2, 'update', '2020-04-02 09:00:00', 'aconnelly'),
(3, 'delete', '2020-04-03 09:00:00', 'lmelia'),
(4, 'delete', '2020-04-05 09:00:00', 'aconnelly'),
(5, 'create', '2020-04-11 09:00:00', 'lmelia'),
(6, 'update', '2020-04-11 10:00:00', 'aconnelly'),
(7, 'delete', '2020-04-11 11:00:00', 'lmelia'),
(8, 'delete', '2020-04-11 12:00:00', 'aconnelly'),
(9, 'create', '2020-04-11 13:00:00', 'lmelia'),
(10, 'update', '2020-04-15 09:00:00', 'aconnelly');

-- --------------------------------------------------------

--
-- Table structure for table `pomak`
--

CREATE TABLE `pomak` (
  `Id` int(11) NOT NULL,
  `Sati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pomak`
--

INSERT INTO `pomak` (`Id`, `Sati`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 0),
(48, 4),
(49, 0),
(50, 0),
(51, 24),
(52, 24),
(53, 24),
(54, 24),
(55, 24),
(56, -1),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 1),
(64, 2),
(65, 0),
(66, 0),
(67, 1),
(68, 5),
(69, -5);

-- --------------------------------------------------------

--
-- Table structure for table `postavke`
--

CREATE TABLE `postavke` (
  `Id` int(11) NOT NULL,
  `Stranicenje_Broj_Stranica` int(11) NOT NULL,
  `Broj_Neuspjesnih_Prijava` int(11) NOT NULL,
  `Vrijeme_Trajanja_Sesije` int(11) NOT NULL,
  `Poslovna_Godina` int(11) NOT NULL,
  `Trajanje_Tokena_Za_Registraciju` int(11) NOT NULL,
  `Dark_Mode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postavke`
--

INSERT INTO `postavke` (`Id`, `Stranicenje_Broj_Stranica`, `Broj_Neuspjesnih_Prijava`, `Vrijeme_Trajanja_Sesije`, `Poslovna_Godina`, `Trajanje_Tokena_Za_Registraciju`, `Dark_Mode`) VALUES
(1, 5, 4, 4, 2020, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prijave_za_upise`
--

CREATE TABLE `prijave_za_upise` (
  `Id` int(11) NOT NULL,
  `Broj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Datum` datetime NOT NULL,
  `Javni_Pozivi_Id` int(11) NOT NULL,
  `Korisnici_Id_Registrirani` int(11) NOT NULL,
  `Djecji_Vrtici_Skupine_Id` int(11) NOT NULL,
  `Prihvaceno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prijave_za_upise`
--

INSERT INTO `prijave_za_upise` (`Id`, `Broj`, `Datum`, `Javni_Pozivi_Id`, `Korisnici_Id_Registrirani`, `Djecji_Vrtici_Skupine_Id`, `Prihvaceno`) VALUES
(11, '2020/P01', '2020-04-01 19:00:00', 1, 4, 42, 1),
(12, '2020/P02', '2020-04-02 18:00:00', 2, 9, 45, 0),
(13, '2020/P03', '2020-04-03 12:00:00', 3, 10, 47, 0),
(14, '2020/P04', '2020-04-05 17:00:00', 4, 18, 48, 0),
(15, '2020/P05', '2020-04-04 08:00:00', 5, 19, 51, 0),
(16, '2020/P06', '2020-04-06 10:00:00', 6, 20, 54, 0),
(17, '2020/P07', '2020-04-05 13:00:00', 7, 21, 57, 0),
(18, '2020/P08', '2020-04-01 09:00:00', 8, 22, 58, 0),
(19, '2020/P09', '2020-04-10 10:00:00', 9, 23, 59, 0),
(20, '2020/P10', '2020-04-11 09:00:00', 10, 24, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `racuni`
--

CREATE TABLE `racuni` (
  `Id` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `Dijete_Id` int(11) NOT NULL,
  `Djecji_Vrtici_Id` int(11) NOT NULL,
  `Iznos` decimal(15,2) NOT NULL,
  `Korisnici_Id_Registrirani` int(11) NOT NULL,
  `Placeno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racuni`
--

INSERT INTO `racuni` (`Id`, `Datum`, `Dijete_Id`, `Djecji_Vrtici_Id`, `Iznos`, `Korisnici_Id_Registrirani`, `Placeno`) VALUES
(1, '2020-04-01 09:00:00', 1, 1, '300.00', 4, 0),
(2, '2020-04-02 09:00:00', 2, 2, '500.00', 4, 1),
(3, '2020-04-02 09:00:00', 3, 3, '400.00', 10, 1),
(4, '2020-04-03 09:00:00', 4, 4, '500.00', 18, 0),
(5, '2020-04-03 09:00:00', 5, 5, '500.00', 19, 1),
(6, '2020-04-03 09:00:00', 6, 6, '600.00', 20, 0),
(7, '2020-04-04 09:00:00', 7, 7, '700.00', 21, 0),
(8, '2020-04-08 09:00:00', 8, 8, '250.00', 22, 1),
(9, '2020-04-11 09:00:00', 9, 9, '300.00', 23, 1),
(10, '2020-04-11 09:00:00', 10, 10, '900.00', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skupine`
--

CREATE TABLE `skupine` (
  `Id` int(11) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cijena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skupine`
--

INSERT INTO `skupine` (`Id`, `Naziv`, `Cijena`) VALUES
(1, 'Bumbari', 600),
(2, 'Ptičice', 900),
(3, 'Bubamare', 700),
(4, 'Kikići', 800),
(5, 'Pčelice', 1000),
(6, 'Leptirići', 600),
(7, 'Ježići', 900),
(8, 'Zvijezdice', 700),
(9, 'Pužići', 800),
(10, 'Mačkice', 1000),
(11, 'aa', 1),
(12, 'test', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tipovi_korisnika`
--

CREATE TABLE `tipovi_korisnika` (
  `Id` int(11) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipovi_korisnika`
--

INSERT INTO `tipovi_korisnika` (`Id`, `Naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Registrirani korisnik'),
(4, 'Neregistrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `upisi`
--

CREATE TABLE `upisi` (
  `Id` int(11) NOT NULL,
  `Broj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prijave_Za_Upise_Id` int(11) NOT NULL,
  `Ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Godina_Rodenja` int(11) NOT NULL,
  `Spol` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Potvrda` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upisi`
--

INSERT INTO `upisi` (`Id`, `Broj`, `Prijave_Za_Upise_Id`, `Ime`, `Prezime`, `Godina_Rodenja`, `Spol`, `Slika`, `Potvrda`) VALUES
(3, '2020/U01', 11, 'Abiha', 'Hanson', 2015, 'Ž', 'uploads/photogalleries/3/index.jfif', 0),
(4, '2020/U02', 12, 'Kadie', 'Harrington', 2014, 'Ž', 'uploads/photogalleries/4/index.jfif', 0),
(5, '2020/U03', 13, 'Waqar', 'Wikes', 2016, 'M', 'uploads/photogalleries/5/index.jfif', 0),
(6, '2020/U04', 14, 'Sami', 'Vinson', 2017, 'M', 'uploads/photogalleries/6/index.jfif', 1),
(7, '2020/U05', 15, 'Peter', 'Willis', 2015, 'M', 'uploads/photogalleries/7/index.jfif', 0),
(8, '2020/U06', 16, 'Fynley', 'Munoz', 2014, 'M', 'uploads/photogalleries/8/index.jfif', 0),
(9, '2020/U07', 17, 'Bevan', 'Wells', 2016, 'M', 'uploads/photogalleries/9/index.jfif', 0),
(10, '2020/U08', 18, 'Corrie', 'Chester', 2017, 'Ž', 'uploads/photogalleries/10/index.jfif', 1),
(11, '2020/U09', 19, 'Katrin', 'Gale', 2016, 'Ž', 'uploads/photogalleries/11/index.jfif', 0),
(12, '2020/U10', 20, 'Noor', 'Powers', 2016, 'M', 'uploads/photogalleries/12/index.jfif', 1),
(13, '2020/U11', 11, 'Ivo', 'Ivic', 2015, 'M', 'uploads/photogalleries/13/slika2.jfif', 1),
(14, '2020/U12', 11, 'Pero', 'Perić', 2016, 'M', 'uploads/photogalleries/14/pero.jfif', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dijete`
--
ALTER TABLE `dijete`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_dijete_djecji_vrtici_skupine_idx` (`Djecji_Vrtici_Skupine_Id`);

--
-- Indexes for table `dijete_dolazak`
--
ALTER TABLE `dijete_dolazak`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_dijete_dolazak_dijete_idx` (`Dijete_Id`),
  ADD KEY `fk_dijete_dolazak_djecji_vrtici_idx` (`Djecji_Vrtici_Id`);

--
-- Indexes for table `djecji_vrtici`
--
ALTER TABLE `djecji_vrtici`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_djecji_vrtici_korisnici_idx` (`Korisnici_Id_Administrator`),
  ADD KEY `fk2_djecji_vrtici_korisnici_idx` (`Korisnici_Id_Moderator`);

--
-- Indexes for table `djecji_vrtici_ocjena`
--
ALTER TABLE `djecji_vrtici_ocjena`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_djecji_vrtici_ocjena_korisnici_idx` (`Korisnici_Id_Administrator`),
  ADD KEY `fk_djecji_vrtici_ocjena_djecji_vrtici_idx` (`Djecji_Vrtici_Id`);

--
-- Indexes for table `djecji_vrtici_skupine`
--
ALTER TABLE `djecji_vrtici_skupine`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_djecji_vrtici_skupine_skupine_idx` (`Skupine_Id`),
  ADD KEY `fk_djecji_vrtici_skupine_djecji_vrtici_idx` (`Djecji_Vrtici_Id`);

--
-- Indexes for table `dnevnik`
--
ALTER TABLE `dnevnik`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `javni_pozivi`
--
ALTER TABLE `javni_pozivi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_idx` (`Djecji_Vrtici_Id`),
  ADD KEY `fk_javni_pozivi_korisnici_idx` (`Korisnici_Id_Moderator`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_korisnici_tipovi_korisnika_idx` (`Tipovi_Korisnika_Id`);

--
-- Indexes for table `logovi`
--
ALTER TABLE `logovi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pomak`
--
ALTER TABLE `pomak`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `postavke`
--
ALTER TABLE `postavke`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `prijave_za_upise`
--
ALTER TABLE `prijave_za_upise`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_prijave_za_upise_korisnici_idx` (`Korisnici_Id_Registrirani`),
  ADD KEY `fk_prijave_za_upise_javni_pozivi_idx` (`Javni_Pozivi_Id`),
  ADD KEY `Djecji_Vrtici_Skupine_Id` (`Djecji_Vrtici_Skupine_Id`);

--
-- Indexes for table `racuni`
--
ALTER TABLE `racuni`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_racuni_diijete_idx` (`Dijete_Id`),
  ADD KEY `fk_racuni_djecji_vrtici_idx` (`Djecji_Vrtici_Id`),
  ADD KEY `fk_racuni_korisnici_idx` (`Korisnici_Id_Registrirani`);

--
-- Indexes for table `skupine`
--
ALTER TABLE `skupine`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tipovi_korisnika`
--
ALTER TABLE `tipovi_korisnika`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `upisi`
--
ALTER TABLE `upisi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_upisi_prijave_za_upise_idx` (`Prijave_Za_Upise_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dijete`
--
ALTER TABLE `dijete`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dijete_dolazak`
--
ALTER TABLE `dijete_dolazak`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `djecji_vrtici`
--
ALTER TABLE `djecji_vrtici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `djecji_vrtici_ocjena`
--
ALTER TABLE `djecji_vrtici_ocjena`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `djecji_vrtici_skupine`
--
ALTER TABLE `djecji_vrtici_skupine`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `dnevnik`
--
ALTER TABLE `dnevnik`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;
--
-- AUTO_INCREMENT for table `javni_pozivi`
--
ALTER TABLE `javni_pozivi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `logovi`
--
ALTER TABLE `logovi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pomak`
--
ALTER TABLE `pomak`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `prijave_za_upise`
--
ALTER TABLE `prijave_za_upise`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `racuni`
--
ALTER TABLE `racuni`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `skupine`
--
ALTER TABLE `skupine`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tipovi_korisnika`
--
ALTER TABLE `tipovi_korisnika`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `upisi`
--
ALTER TABLE `upisi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dijete`
--
ALTER TABLE `dijete`
  ADD CONSTRAINT `fk_dijete_djecji_vrtici_skupine` FOREIGN KEY (`Djecji_Vrtici_Skupine_Id`) REFERENCES `djecji_vrtici_skupine` (`Id`);

--
-- Constraints for table `dijete_dolazak`
--
ALTER TABLE `dijete_dolazak`
  ADD CONSTRAINT `fk_dijete_dolazak_dijete` FOREIGN KEY (`Dijete_Id`) REFERENCES `dijete` (`Id`),
  ADD CONSTRAINT `fk_dijete_dolazak_djecji_vrtici` FOREIGN KEY (`Djecji_Vrtici_Id`) REFERENCES `djecji_vrtici` (`Id`);

--
-- Constraints for table `djecji_vrtici`
--
ALTER TABLE `djecji_vrtici`
  ADD CONSTRAINT `fk2_djecji_vrtici_korisnici` FOREIGN KEY (`Korisnici_Id_Moderator`) REFERENCES `korisnici` (`Id`),
  ADD CONSTRAINT `fk_djecji_vrtici_korisnici` FOREIGN KEY (`Korisnici_Id_Administrator`) REFERENCES `korisnici` (`Id`);

--
-- Constraints for table `djecji_vrtici_ocjena`
--
ALTER TABLE `djecji_vrtici_ocjena`
  ADD CONSTRAINT `fk_djecji_vrtici_ocjena_djecji_vrtici` FOREIGN KEY (`Djecji_Vrtici_Id`) REFERENCES `djecji_vrtici` (`Id`),
  ADD CONSTRAINT `fk_djecji_vrtici_ocjena_korisnici` FOREIGN KEY (`Korisnici_Id_Administrator`) REFERENCES `korisnici` (`Id`);

--
-- Constraints for table `djecji_vrtici_skupine`
--
ALTER TABLE `djecji_vrtici_skupine`
  ADD CONSTRAINT `fk_djecji_vrtici_skupine_djecji_vrtici` FOREIGN KEY (`Djecji_Vrtici_Id`) REFERENCES `djecji_vrtici` (`Id`),
  ADD CONSTRAINT `fk_djecji_vrtici_skupine_skupine` FOREIGN KEY (`Skupine_Id`) REFERENCES `skupine` (`Id`);

--
-- Constraints for table `javni_pozivi`
--
ALTER TABLE `javni_pozivi`
  ADD CONSTRAINT `fk_javni_pozivi_djecji_vrtici` FOREIGN KEY (`Djecji_Vrtici_Id`) REFERENCES `djecji_vrtici` (`Id`),
  ADD CONSTRAINT `fk_javni_pozivi_korisnici` FOREIGN KEY (`Korisnici_Id_Moderator`) REFERENCES `korisnici` (`Id`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `fk_korisnici_tipovi_korisnika` FOREIGN KEY (`Tipovi_Korisnika_Id`) REFERENCES `tipovi_korisnika` (`Id`);

--
-- Constraints for table `prijave_za_upise`
--
ALTER TABLE `prijave_za_upise`
  ADD CONSTRAINT `fk_prijave_za_upise_javni_pozivi` FOREIGN KEY (`Javni_Pozivi_Id`) REFERENCES `javni_pozivi` (`Id`),
  ADD CONSTRAINT `fk_prijave_za_upise_korisnici` FOREIGN KEY (`Korisnici_Id_Registrirani`) REFERENCES `korisnici` (`Id`),
  ADD CONSTRAINT `prijave_za_upise_ibfk_1` FOREIGN KEY (`Djecji_Vrtici_Skupine_Id`) REFERENCES `djecji_vrtici_skupine` (`Id`);

--
-- Constraints for table `racuni`
--
ALTER TABLE `racuni`
  ADD CONSTRAINT `fk_racuni_diijete` FOREIGN KEY (`Dijete_Id`) REFERENCES `dijete` (`Id`),
  ADD CONSTRAINT `fk_racuni_djecji_vrtici` FOREIGN KEY (`Djecji_Vrtici_Id`) REFERENCES `djecji_vrtici` (`Id`),
  ADD CONSTRAINT `fk_racuni_korisnici` FOREIGN KEY (`Korisnici_Id_Registrirani`) REFERENCES `korisnici` (`Id`);

--
-- Constraints for table `upisi`
--
ALTER TABLE `upisi`
  ADD CONSTRAINT `fk_upisi_prijave_za_upise` FOREIGN KEY (`Prijave_Za_Upise_Id`) REFERENCES `prijave_za_upise` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
