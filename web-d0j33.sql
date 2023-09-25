-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 09:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-d0j33`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis_alternatif`
--

CREATE TABLE `analisis_alternatif` (
  `id` int(11) NOT NULL,
  `guru_id_1` int(11) NOT NULL,
  `guru_id_2` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nilai` double NOT NULL DEFAULT 1,
  `bobot` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analisis_alternatif`
--

INSERT INTO `analisis_alternatif` (`id`, `guru_id_1`, `guru_id_2`, `kode_kriteria`, `nilai`, `bobot`, `jumlah`) VALUES
(97, 14, 14, 'KR001', 1, NULL, NULL),
(98, 14, 14, 'KR002', 1, 1.78333333333334, 0.5607476635514),
(99, 14, 14, 'KR003', 1, NULL, NULL),
(100, 14, 14, 'KR004', 1, NULL, NULL),
(101, 14, 14, 'KR005', 1, NULL, NULL),
(102, 14, 15, 'KR001', 1, NULL, NULL),
(103, 15, 14, 'KR001', 1, NULL, NULL),
(104, 15, 15, 'KR001', 1, NULL, NULL),
(105, 14, 15, 'KR002', 4, 7.133333333333339, 0.5607476635514),
(106, 15, 14, 'KR002', 0.25, 1.78333333333334, 0.14018691588785),
(107, 15, 15, 'KR002', 1, 7.133333333333339, 0.14018691588785),
(108, 14, 15, 'KR003', 1, NULL, NULL),
(109, 15, 14, 'KR003', 1, NULL, NULL),
(110, 15, 15, 'KR003', 1, NULL, NULL),
(111, 14, 15, 'KR004', 1, NULL, NULL),
(112, 15, 14, 'KR004', 1, NULL, NULL),
(113, 15, 15, 'KR004', 1, NULL, NULL),
(114, 14, 15, 'KR005', 1, NULL, NULL),
(115, 15, 14, 'KR005', 1, NULL, NULL),
(116, 15, 15, 'KR005', 1, NULL, NULL),
(117, 14, 16, 'KR001', 1, NULL, NULL),
(118, 16, 14, 'KR001', 1, NULL, NULL),
(119, 15, 16, 'KR001', 1, NULL, NULL),
(120, 16, 15, 'KR001', 1, NULL, NULL),
(121, 16, 16, 'KR001', 1, NULL, NULL),
(122, 14, 16, 'KR002', 6, 10.7, 0.5607476635514),
(123, 16, 14, 'KR002', 0.16666666666667, 1.78333333333334, 0.093457943925235),
(124, 15, 16, 'KR002', 1.5, 10.7, 0.14018691588785),
(125, 16, 15, 'KR002', 0.66666666666667, 7.133333333333339, 0.093457943925234),
(126, 16, 16, 'KR002', 1, 10.7, 0.093457943925234),
(127, 14, 16, 'KR003', 1, NULL, NULL),
(128, 16, 14, 'KR003', 1, NULL, NULL),
(129, 15, 16, 'KR003', 1, NULL, NULL),
(130, 16, 15, 'KR003', 1, NULL, NULL),
(131, 16, 16, 'KR003', 1, NULL, NULL),
(132, 14, 16, 'KR004', 1, NULL, NULL),
(133, 16, 14, 'KR004', 1, NULL, NULL),
(134, 15, 16, 'KR004', 1, NULL, NULL),
(135, 16, 15, 'KR004', 1, NULL, NULL),
(136, 16, 16, 'KR004', 1, NULL, NULL),
(137, 14, 16, 'KR005', 1, NULL, NULL),
(138, 16, 14, 'KR005', 1, NULL, NULL),
(139, 15, 16, 'KR005', 1, NULL, NULL),
(140, 16, 15, 'KR005', 1, NULL, NULL),
(141, 16, 16, 'KR005', 1, NULL, NULL),
(142, 14, 17, 'KR001', 1, NULL, NULL),
(143, 17, 14, 'KR001', 1, NULL, NULL),
(144, 15, 17, 'KR001', 1, NULL, NULL),
(145, 17, 15, 'KR001', 1, NULL, NULL),
(146, 16, 17, 'KR001', 1, NULL, NULL),
(147, 17, 16, 'KR001', 1, NULL, NULL),
(148, 17, 17, 'KR001', 1, NULL, NULL),
(149, 14, 17, 'KR002', 6, 10.7, 0.5607476635514),
(150, 17, 14, 'KR002', 0.16666666666667, 1.78333333333334, 0.093457943925235),
(151, 15, 17, 'KR002', 1.5, 10.7, 0.14018691588785),
(152, 17, 15, 'KR002', 0.66666666666667, 7.133333333333339, 0.093457943925234),
(153, 16, 17, 'KR002', 1, 10.7, 0.093457943925234),
(154, 17, 16, 'KR002', 1, 10.7, 0.093457943925234),
(155, 17, 17, 'KR002', 1, 10.7, 0.093457943925234),
(156, 14, 17, 'KR003', 1, NULL, NULL),
(157, 17, 14, 'KR003', 1, NULL, NULL),
(158, 15, 17, 'KR003', 1, NULL, NULL),
(159, 17, 15, 'KR003', 1, NULL, NULL),
(160, 16, 17, 'KR003', 1, NULL, NULL),
(161, 17, 16, 'KR003', 1, NULL, NULL),
(162, 17, 17, 'KR003', 1, NULL, NULL),
(163, 14, 17, 'KR004', 1, NULL, NULL),
(164, 17, 14, 'KR004', 1, NULL, NULL),
(165, 15, 17, 'KR004', 1, NULL, NULL),
(166, 17, 15, 'KR004', 1, NULL, NULL),
(167, 16, 17, 'KR004', 1, NULL, NULL),
(168, 17, 16, 'KR004', 1, NULL, NULL),
(169, 17, 17, 'KR004', 1, NULL, NULL),
(170, 14, 17, 'KR005', 1, NULL, NULL),
(171, 17, 14, 'KR005', 1, NULL, NULL),
(172, 15, 17, 'KR005', 1, NULL, NULL),
(173, 17, 15, 'KR005', 1, NULL, NULL),
(174, 16, 17, 'KR005', 1, NULL, NULL),
(175, 17, 16, 'KR005', 1, NULL, NULL),
(176, 17, 17, 'KR005', 1, NULL, NULL),
(177, 14, 18, 'KR001', 1, NULL, NULL),
(178, 18, 14, 'KR001', 1, NULL, NULL),
(179, 15, 18, 'KR001', 1, NULL, NULL),
(180, 18, 15, 'KR001', 1, NULL, NULL),
(181, 16, 18, 'KR001', 1, NULL, NULL),
(182, 18, 16, 'KR001', 1, NULL, NULL),
(183, 17, 18, 'KR001', 1, NULL, NULL),
(184, 18, 17, 'KR001', 1, NULL, NULL),
(185, 18, 18, 'KR001', 1, NULL, NULL),
(186, 14, 18, 'KR002', 5, 8.91666666666666, 0.5607476635514),
(187, 18, 14, 'KR002', 0.2, 1.78333333333334, 0.11214953271028),
(188, 15, 18, 'KR002', 1.25, 8.91666666666666, 0.14018691588785),
(189, 18, 15, 'KR002', 0.8, 7.133333333333339, 0.11214953271028),
(190, 16, 18, 'KR002', 0.83333333333333, 8.91666666666666, 0.093457943925233),
(191, 18, 16, 'KR002', 1.2, 10.7, 0.11214953271028),
(192, 17, 18, 'KR002', 0.83333333333333, 8.91666666666666, 0.093457943925233),
(193, 18, 17, 'KR002', 1.2, 10.7, 0.11214953271028),
(194, 18, 18, 'KR002', 1, 8.91666666666666, 0.11214953271028),
(195, 14, 18, 'KR003', 1, NULL, NULL),
(196, 18, 14, 'KR003', 1, NULL, NULL),
(197, 15, 18, 'KR003', 1, NULL, NULL),
(198, 18, 15, 'KR003', 1, NULL, NULL),
(199, 16, 18, 'KR003', 1, NULL, NULL),
(200, 18, 16, 'KR003', 1, NULL, NULL),
(201, 17, 18, 'KR003', 1, NULL, NULL),
(202, 18, 17, 'KR003', 1, NULL, NULL),
(203, 18, 18, 'KR003', 1, NULL, NULL),
(204, 14, 18, 'KR004', 1, NULL, NULL),
(205, 18, 14, 'KR004', 1, NULL, NULL),
(206, 15, 18, 'KR004', 1, NULL, NULL),
(207, 18, 15, 'KR004', 1, NULL, NULL),
(208, 16, 18, 'KR004', 1, NULL, NULL),
(209, 18, 16, 'KR004', 1, NULL, NULL),
(210, 17, 18, 'KR004', 1, NULL, NULL),
(211, 18, 17, 'KR004', 1, NULL, NULL),
(212, 18, 18, 'KR004', 1, NULL, NULL),
(213, 14, 18, 'KR005', 1, NULL, NULL),
(214, 18, 14, 'KR005', 1, NULL, NULL),
(215, 15, 18, 'KR005', 1, NULL, NULL),
(216, 18, 15, 'KR005', 1, NULL, NULL),
(217, 16, 18, 'KR005', 1, NULL, NULL),
(218, 18, 16, 'KR005', 1, NULL, NULL),
(219, 17, 18, 'KR005', 1, NULL, NULL),
(220, 18, 17, 'KR005', 1, NULL, NULL),
(221, 18, 18, 'KR005', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analisis_kriteria`
--

CREATE TABLE `analisis_kriteria` (
  `kode_kriteria_1` varchar(20) NOT NULL,
  `kode_kriteria_2` varchar(20) NOT NULL,
  `nilai` double NOT NULL,
  `bobot` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analisis_kriteria`
--

INSERT INTO `analisis_kriteria` (`kode_kriteria_1`, `kode_kriteria_2`, `nilai`, `bobot`, `jumlah`) VALUES
('KR001', 'KR001', 1, 2.0095238095237997, 0.49763033175356),
('KR001', 'KR002', 3, 6.028571428571429, 0.49763033175355),
('KR001', 'KR003', 5, 10.04761904761911, 0.49763033175355),
('KR001', 'KR004', 3, 6.028571428571429, 0.49763033175355),
('KR001', 'KR005', 7, 14.0666666666666, 0.49763033175356),
('KR002', 'KR001', 0.33333333333333, 2.0095238095237997, 0.16587677725118),
('KR002', 'KR002', 1, 6.028571428571429, 0.16587677725118),
('KR002', 'KR003', 1.6666666666667, 10.04761904761911, 0.16587677725119),
('KR002', 'KR004', 1, 6.028571428571429, 0.16587677725118),
('KR002', 'KR005', 2.3333333333333, 14.0666666666666, 0.16587677725118),
('KR003', 'KR001', 0.2, 2.0095238095237997, 0.099526066350711),
('KR003', 'KR002', 0.6, 6.028571428571429, 0.099526066350711),
('KR003', 'KR003', 1, 10.04761904761911, 0.09952606635071),
('KR003', 'KR004', 0.6, 6.028571428571429, 0.099526066350711),
('KR003', 'KR005', 1.4, 14.0666666666666, 0.099526066350711),
('KR004', 'KR001', 0.33333333333333, 2.0095238095237997, 0.16587677725118),
('KR004', 'KR002', 1, 6.028571428571429, 0.16587677725118),
('KR004', 'KR003', 1.6666666666667, 10.04761904761911, 0.16587677725119),
('KR004', 'KR004', 1, 6.028571428571429, 0.16587677725118),
('KR004', 'KR005', 2.3333333333333, 14.0666666666666, 0.16587677725118),
('KR005', 'KR001', 0.14285714285714, 2.0095238095237997, 0.071090047393364),
('KR005', 'KR002', 0.42857142857143, 6.028571428571429, 0.071090047393365),
('KR005', 'KR003', 0.71428571428571, 10.04761904761911, 0.071090047393364),
('KR005', 'KR004', 0.42857142857143, 6.028571428571429, 0.071090047393365),
('KR005', 'KR005', 1, 14.0666666666666, 0.071090047393365);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `gelar_depan` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `jurusan` varchar(250) DEFAULT NULL,
  `sertifikasi` varchar(250) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `kompetensi` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jns_kelamin`, `tmp_lahir`, `tgl_lahir`, `nip`, `gelar_depan`, `gelar_belakang`, `jenjang`, `jurusan`, `sertifikasi`, `tgl_daftar`, `kompetensi`) VALUES
(14, 'Ainur Rohmah', 'P', 'Mojokerto', '1993-12-02', '', '', 'S.Pd', 'S1', 'Biologi', '', '2018-07-16', 'Fisika'),
(15, 'Dian Anggraeny', 'P', 'Mojokerto', '1986-06-28', '', '', 'S.E', 'S1', 'Ekonomi', '', '2018-07-17', ''),
(16, 'Endah Fitriani', 'P', 'Mojokerto', '1981-07-14', '', '', 'S.Pd', 'S1', 'Bahasa Indonesia', '', '2006-11-04', 'Bahasa Indonesia'),
(17, 'Fadly Hadi Maulana', 'L', 'Mojokerto', '1996-03-03', '', '', '', '', '', '', '2020-07-01', ''),
(18, 'Mita Andini', 'P', 'Mojokerto', '2001-05-14', '', '', '', '', '', '', '2020-07-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_alternatif`
--

CREATE TABLE `hasil_alternatif` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nilai_alternatif` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_alternatif`
--

INSERT INTO `hasil_alternatif` (`id`, `guru_id`, `kode_kriteria`, `nilai_alternatif`) VALUES
(19, 14, 'KR001', 0.5),
(20, 15, 'KR001', 0.125),
(21, 16, 'KR001', 0.125),
(22, 17, 'KR001', 0.125),
(23, 18, 'KR001', 0.125),
(24, 14, 'KR002', 0.5607476635514),
(25, 15, 'KR002', 0.14018691588785),
(26, 16, 'KR002', 0.093457943925234),
(27, 17, 'KR002', 0.093457943925234),
(28, 18, 'KR002', 0.11214953271028),
(29, 14, 'KR003', 0.58823529411765),
(30, 15, 'KR003', 0.11764705882353),
(31, 16, 'KR003', 0.098039215686275),
(32, 17, 'KR003', 0.098039215686275),
(33, 18, 'KR003', 0.098039215686275),
(34, 14, 'KR004', 0.55045871559633),
(35, 15, 'KR004', 0.11009174311927),
(36, 16, 'KR004', 0.11009174311927),
(37, 17, 'KR004', 0.13761467889908),
(38, 18, 'KR004', 0.091743119266055),
(39, 14, 'KR005', 0.57692307692308),
(40, 15, 'KR005', 0.096153846153846),
(41, 16, 'KR005', 0.096153846153846),
(42, 17, 'KR005', 0.11538461538462),
(43, 18, 'KR005', 0.11538461538462),
(44, 14, 'KR002', 0.5607476635514),
(45, 15, 'KR002', 0.14018691588785),
(46, 16, 'KR002', 0.093457943925234),
(47, 17, 'KR002', 0.093457943925234),
(48, 18, 'KR002', 0.11214953271028);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_alternatif_saw`
--

CREATE TABLE `hasil_alternatif_saw` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nilai` double NOT NULL,
  `normalisasi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_alternatif_saw`
--

INSERT INTO `hasil_alternatif_saw` (`id`, `guru_id`, `kode_kriteria`, `nilai`, `normalisasi`) VALUES
(46, 8, 'KR001', 90, 0.25),
(47, 8, 'KR002', 84, 0.15),
(48, 8, 'KR003', 100, 0.2),
(49, 8, 'KR004', 82, 0.13666666666667),
(50, 8, 'KR005', 90, 0.225),
(51, 12, 'KR001', 90, 0.25),
(52, 12, 'KR002', 75, 0.13392857142857),
(53, 12, 'KR003', 90, 0.18),
(54, 12, 'KR004', 90, 0.15),
(55, 12, 'KR005', 100, 0.25),
(56, 13, 'KR001', 90, 0.25),
(57, 13, 'KR002', 75, 0.13392857142857),
(58, 13, 'KR003', 75, 0.15),
(59, 13, 'KR004', 90, 0.15),
(60, 13, 'KR005', 100, 0.25),
(61, 14, 'KR001', 90, 0.25),
(62, 14, 'KR002', 82, 0.164),
(63, 14, 'KR003', 100, 0.2),
(64, 14, 'KR004', 84, 0.126),
(65, 14, 'KR005', 90, 0.225),
(66, 15, 'KR001', 90, 0.25),
(67, 15, 'KR002', 75, 0.15),
(68, 15, 'KR003', 90, 0.18),
(69, 15, 'KR004', 90, 0.135),
(70, 15, 'KR005', 100, 0.25),
(71, 16, 'KR001', 90, 0.25),
(72, 16, 'KR002', 75, 0.15),
(73, 16, 'KR003', 75, 0.15),
(74, 16, 'KR004', 90, 0.135),
(75, 16, 'KR005', 100, 0.25),
(76, 17, 'KR001', 90, 0.25),
(77, 17, 'KR002', 100, 0.2),
(78, 17, 'KR003', 80, 0.16),
(79, 17, 'KR004', 70, 0.105),
(80, 17, 'KR005', 80, 0.2),
(81, 18, 'KR001', 90, 0.25),
(82, 18, 'KR002', 90, 0.18),
(83, 18, 'KR003', 70, 0.14),
(84, 18, 'KR004', 100, 0.15),
(85, 18, 'KR005', 80, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(250) NOT NULL,
  `nilai_kriteria` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `kriteria`, `nilai_kriteria`, `created_at`, `updated_at`) VALUES
('KR001', 'Spiritualisme', 0.49763033175355, '2023-06-23 00:09:46', '2023-06-23 00:09:46'),
('KR002', 'Tes Wawancara', 0.16587677725118, '2023-06-23 00:26:37', '2023-06-23 00:26:37'),
('KR003', 'Kedisiplin', 0.099526066350711, '2023-06-23 00:26:51', '2023-06-23 00:26:51'),
('KR004', 'Tanggung Jawab', 0.16587677725118, '2023-06-23 00:27:12', '2023-06-23 00:27:12'),
('KR005', 'CMM', 0.071090047393365, '2023-06-23 22:09:21', '2023-06-23 22:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_saw`
--

CREATE TABLE `kriteria_saw` (
  `kode_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(250) NOT NULL,
  `jenis` enum('benefit','cost') NOT NULL,
  `nilai_kriteria` double DEFAULT NULL,
  `bobot` double NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria_saw`
--

INSERT INTO `kriteria_saw` (`kode_kriteria`, `kriteria`, `jenis`, `nilai_kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
('KR001', 'Spiritualisme', 'benefit', 0.25, 4, '2023-06-23 00:09:46', '2023-06-23 00:09:46'),
('KR002', 'Tes Wawancara', 'benefit', 0.2, 4, '2023-06-23 00:26:37', '2023-06-23 00:26:37'),
('KR003', 'Kedisiplin', 'benefit', 0.2, 4, '2023-06-23 00:26:51', '2023-06-23 00:26:51'),
('KR004', 'Tanggung Jawab', 'benefit', 0.15, 3, '2023-06-23 00:27:12', '2023-06-23 00:27:12'),
('KR005', 'CMM', 'benefit', 0.25, 5, '2023-06-23 22:09:21', '2023-06-23 22:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kepentingan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kepentingan`, `keterangan`) VALUES
(1, 1, 'Kedua elemen sama pentingnya'),
(2, 2, 'Nilai antara dua nilai pertimbangan yang berdekatan'),
(3, 3, 'Elemen yang satu sedikit lebih penting daripada elemen lainnya'),
(4, 4, 'Nilai antara dua nilai pertimbangan yang berdekatan'),
(5, 5, 'Elemen yang satu lebih penting daripada elemen lainnya'),
(6, 6, 'Nilai antara dua nilai pertimbangan yang berdekatan'),
(7, 7, 'Satu elemen jelas lebih mutlak penting daripada elemen lainnya'),
(8, 8, 'Nilai antara dua nilai pertimbangan yang berdekatan'),
(10, 9, 'Satu elemen mutlak penting daripada elemen lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `guru_id`, `nilai`) VALUES
(1, 8, NULL),
(2, 12, NULL),
(3, 13, NULL),
(4, 14, 0.53269673270372),
(5, 15, 0.12226373930261),
(6, 16, 0.11256099653212),
(7, 17, 0.11849352871579),
(8, 18, 0.11398500274575);

-- --------------------------------------------------------

--
-- Table structure for table `ranking_saw`
--

CREATE TABLE `ranking_saw` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking_saw`
--

INSERT INTO `ranking_saw` (`id`, `guru_id`, `nilai`) VALUES
(1, 8, NULL),
(2, 12, NULL),
(3, 13, NULL),
(4, 14, 0.9650000000000001),
(5, 15, 0.9650000000000001),
(6, 16, 0.935),
(7, 17, 0.915),
(8, 18, 0.9200000000000002);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(250) NOT NULL,
  `logo_website` varchar(250) NOT NULL,
  `favicon_website` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo_website`, `favicon_website`) VALUES
(1, 'Seleksi Guru', 'assets/images/Logo-1688483991-577.jpg', 'assets/images/Favicon-1688483992-819.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('Superadmin','Administrator') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Superadmin', '2023-06-22 04:46:15', '2023-06-22 04:46:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis_alternatif`
--
ALTER TABLE `analisis_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analisis_guru_id_2_foreign` (`guru_id_2`) USING BTREE,
  ADD KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `analisis_guru_id_1_foreign` (`guru_id_1`) USING BTREE;

--
-- Indexes for table `analisis_kriteria`
--
ALTER TABLE `analisis_kriteria`
  ADD PRIMARY KEY (`kode_kriteria_1`,`kode_kriteria_2`) USING BTREE,
  ADD KEY `analisis_kode_kriteria_2_foreign` (`kode_kriteria_2`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_alternatif`
--
ALTER TABLE `hasil_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `hasil_alternatif_saw`
--
ALTER TABLE `hasil_alternatif_saw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking_saw`
--
ALTER TABLE `ranking_saw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis_alternatif`
--
ALTER TABLE `analisis_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hasil_alternatif`
--
ALTER TABLE `hasil_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hasil_alternatif_saw`
--
ALTER TABLE `hasil_alternatif_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ranking_saw`
--
ALTER TABLE `ranking_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisis_alternatif`
--
ALTER TABLE `analisis_alternatif`
  ADD CONSTRAINT `analisis_alternatif_2_foreign` FOREIGN KEY (`guru_id_2`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `analisis_alternatif_foreign` FOREIGN KEY (`guru_id_1`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_kriteria_foreign` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE;

--
-- Constraints for table `analisis_kriteria`
--
ALTER TABLE `analisis_kriteria`
  ADD CONSTRAINT `analisis_kode_kriteria_2_foreign` FOREIGN KEY (`kode_kriteria_2`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `analisis_kode_kriteria_foreign` FOREIGN KEY (`kode_kriteria_1`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE;

--
-- Constraints for table `hasil_alternatif`
--
ALTER TABLE `hasil_alternatif`
  ADD CONSTRAINT `guru_id` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
