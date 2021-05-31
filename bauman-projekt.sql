-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Maj 2021, 12:43
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bauman-projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contractors`
--

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `shortcut` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `NIP` int(10) NOT NULL,
  `street` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `house_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `apartment_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `town` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contractors`
--

INSERT INTO `contractors` (`id`, `name`, `shortcut`, `description`, `NIP`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES
(5, 'Kowalski sp.zoo', 'KOW', '', 1234567891, 'Jana Pawła', '12', 'A', '64-100', 'Leszno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `number` int(50) NOT NULL,
  `value` decimal(50,2) NOT NULL,
  `date` datetime NOT NULL,
  `date_foreign_documents` datetime DEFAULT NULL,
  `id_author` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `client_name_used_in_creation` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `client_adress_used_in_creation` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `client_NIP_used_in_creation` int(10) NOT NULL,
  `id_magazine` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `type`, `number`, `value`, `date`, `date_foreign_documents`, `id_author`, `id_client`, `client_name_used_in_creation`, `client_adress_used_in_creation`, `client_NIP_used_in_creation`, `id_magazine`) VALUES
(92, 'PZ', 20, '13.00', '2021-04-17 17:34:42', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(93, 'WZ', 21, '0.00', '2021-04-17 17:38:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0, 0),
(94, 'PZ', 22, '27.00', '2021-04-17 17:53:39', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(95, 'PZ', 23, '25.00', '2021-04-17 17:55:41', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(96, 'PZ', 24, '86.00', '2021-04-17 17:57:26', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(97, 'PZ', 25, '19.00', '2021-04-17 18:04:06', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(98, 'WZ', 26, '61.00', '2021-04-17 18:05:58', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0, 0),
(99, 'WZ', 27, '0.00', '2021-04-17 18:07:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0, 0),
(100, 'PZ', 28, '0.00', '2021-04-17 18:10:53', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(101, 'WZ', 29, '90.00', '2021-04-17 18:11:15', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0, 0),
(102, 'PZ', 30, '14.00', '2021-04-17 18:11:45', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(103, 'PZ', 31, '23.00', '2021-04-17 18:14:14', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(109, 'PZ', 37, '0.00', '2021-04-20 12:07:52', NULL, 2, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(110, 'PZ', 38, '0.00', '2021-05-01 12:02:33', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(112, 'PZ', 39, '0.00', '2021-05-01 14:42:24', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0, 0),
(113, 'WZ', 40, '0.00', '2021-05-01 17:56:30', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0, 0),
(114, 'PZ', 41, '0.00', '2021-05-03 14:45:20', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(117, 'PZ', 44, '0.00', '2021-05-03 15:19:36', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(118, 'PZ', 45, '0.00', '2021-05-03 20:38:00', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(119, 'WZ', 46, '0.00', '2021-05-03 20:38:09', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(120, 'WZ', 47, '0.00', '2021-05-03 20:38:18', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(121, 'WZ', 48, '0.00', '2021-05-03 20:39:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(122, 'WZ', 49, '0.00', '2021-05-03 20:45:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(123, 'PZ', 50, '0.00', '2021-05-03 20:46:38', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(124, 'PZ', 51, '0.00', '2021-05-03 21:01:03', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(125, 'PZ', 52, '0.00', '2021-05-03 21:04:49', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(126, 'PZ', 53, '0.00', '2021-05-03 21:19:13', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(127, 'PZ', 54, '0.00', '2021-05-03 21:20:28', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(128, 'PZ', 55, '0.00', '2021-05-03 21:26:33', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(129, 'PZ', 56, '0.00', '2021-05-03 21:28:23', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(132, 'PZ', 59, '0.00', '2021-05-03 21:55:43', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(138, 'WZ', 60, '1.00', '2021-05-03 22:12:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(139, 'WZ', 61, '1.00', '2021-05-03 22:13:23', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(140, 'WZ', 62, '10.00', '2021-05-03 22:26:17', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(142, 'WZ', 64, '100.00', '2021-05-03 22:30:44', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(144, 'WZ', 65, '56.00', '2021-05-03 22:34:45', '2021-05-27 02:36:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(145, 'WZ', 66, '0.00', '2021-05-03 22:35:52', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(146, 'WZ', 67, '0.00', '2021-05-03 22:37:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(147, 'WZ', 68, '0.00', '2021-05-03 22:37:11', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(148, 'PZ', 69, '0.00', '2021-05-03 22:37:55', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(149, 'WZ', 70, '0.00', '2021-05-03 22:59:45', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(150, 'WZ', 71, '0.00', '2021-05-03 23:01:32', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(151, 'WZ', 72, '0.00', '2021-05-03 23:01:39', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(152, 'WZ', 73, '0.00', '2021-05-03 23:02:50', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(153, 'PZ', 74, '0.00', '2021-05-03 23:05:26', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(154, 'PZ', 75, '0.00', '2021-05-03 23:05:54', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(155, 'WZ', 76, '0.00', '2021-05-03 23:06:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(156, 'WZ', 77, '0.00', '2021-05-03 23:06:06', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(157, 'PZ', 78, '265.00', '2021-05-04 00:18:50', '2021-03-10 02:22:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(158, 'WZ', 79, '0.00', '2021-05-04 00:19:16', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(159, 'PZ', 80, '1300.00', '2021-05-04 02:02:00', '0000-00-00 00:00:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(160, 'WZ', 81, '0.00', '2021-05-04 02:02:14', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(161, 'WZ', 82, '0.00', '2021-05-04 04:13:04', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(162, 'WZ', 83, '0.00', '2021-05-04 04:13:34', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(163, 'WZ', 84, '0.00', '2021-05-04 04:14:15', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(164, 'PZ', 85, '0.00', '2021-05-04 04:14:32', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(165, 'WZ', 86, '0.00', '2021-05-04 04:14:38', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(166, 'WZ', 87, '0.00', '2021-05-04 04:16:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(167, 'WZ', 88, '0.00', '2021-05-04 04:16:03', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(168, 'WZ', 89, '0.00', '2021-05-04 04:16:04', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(169, 'WZ', 90, '0.00', '2021-05-04 04:16:04', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(170, 'WZ', 91, '0.00', '2021-05-04 04:16:05', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(171, 'WZ', 92, '0.00', '2021-05-04 04:16:05', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(172, 'WZ', 93, '0.00', '2021-05-04 04:16:06', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(173, 'WZ', 94, '0.00', '2021-05-04 04:16:06', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(174, 'WZ', 95, '0.00', '2021-05-04 04:16:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(175, 'WZ', 96, '0.00', '2021-05-04 04:16:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(176, 'WZ', 97, '0.00', '2021-05-04 04:16:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(177, 'WZ', 98, '0.00', '2021-05-04 04:16:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(178, 'WZ', 99, '0.00', '2021-05-04 04:16:08', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(179, 'WZ', 100, '0.00', '2021-05-04 04:16:08', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(180, 'WZ', 101, '0.00', '2021-05-04 04:16:09', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(181, 'WZ', 102, '0.00', '2021-05-04 04:16:22', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(182, 'WZ', 103, '0.00', '2021-05-04 04:16:33', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(184, 'WZ', 105, '201.50', '2021-05-04 04:20:38', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(185, 'WZ', 106, '0.00', '2021-05-04 04:23:30', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(186, 'PZ', 107, '0.00', '2021-05-04 10:55:53', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(187, 'WZ', 108, '0.00', '2021-05-04 10:59:40', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(188, 'WZ', 109, '0.00', '2021-05-04 11:29:54', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(189, 'WZ', 110, '0.00', '2021-05-04 11:35:09', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(190, 'WZ', 111, '0.00', '2021-05-04 11:35:20', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(191, 'PZ', 112, '0.00', '2021-05-04 11:45:58', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(192, 'WZ', 113, '0.00', '2021-05-04 11:46:21', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(193, 'WZ', 114, '0.00', '2021-05-04 11:54:52', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(194, 'WZ', 115, '0.00', '2021-05-04 11:56:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(195, 'WZ', 116, '18.48', '2021-05-04 12:04:33', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(196, 'WZ', 117, '0.00', '2021-05-04 12:17:23', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(197, 'PZ', 118, '65.00', '2021-05-04 12:33:13', '0000-00-00 00:00:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(198, 'PZ', 119, '221.00', '2021-05-04 12:47:51', '0000-00-00 00:00:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(199, 'WZ', 120, '0.00', '2021-05-04 12:50:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(200, 'WZ', 121, '0.00', '2021-05-09 12:12:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(201, 'PZ', 122, '0.00', '2021-05-09 12:13:36', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(202, 'WZ', 123, '0.00', '2021-05-09 13:29:24', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(203, 'WZ', 124, '0.00', '2021-05-19 13:59:30', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(204, 'WZ', 125, '0.00', '2021-05-19 14:05:09', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(205, 'WZ', 126, '0.00', '2021-05-19 14:10:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(206, 'WZ', 127, '0.00', '2021-05-19 14:17:43', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(207, 'PZ', 128, '0.00', '2021-05-19 14:20:53', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(208, 'WZ', 129, '0.00', '2021-05-19 14:21:21', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(209, 'WZ', 130, '0.00', '2021-05-19 14:24:03', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(210, 'WZ', 131, '0.00', '2021-05-19 14:29:53', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(211, 'WZ', 132, '0.00', '2021-05-19 14:46:27', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(212, 'WZ', 133, '0.00', '2021-05-19 14:49:16', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(213, 'WZ', 134, '0.00', '2021-05-19 14:51:39', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(215, 'WZ', 135, '0.00', '2021-05-19 14:54:05', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(216, 'WZ', 136, '0.00', '2021-05-19 14:59:04', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(217, 'WZ', 137, '0.00', '2021-05-19 15:00:35', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(218, 'PZ', 138, '0.00', '2021-05-19 15:05:21', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(219, 'PZ', 139, '20.00', '2021-05-19 15:05:40', '0000-00-00 00:00:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(220, 'WZ', 140, '0.00', '2021-05-19 15:07:48', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(221, 'WZ', 141, '0.00', '2021-05-19 15:09:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(222, 'WZ', 142, '0.00', '2021-05-19 15:10:15', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(223, 'WZ', 143, '0.00', '2021-05-19 15:12:11', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(224, 'WZ', 144, '0.00', '2021-05-19 15:12:38', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(225, 'WZ', 145, '0.00', '2021-05-19 15:14:14', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(226, 'WZ', 146, '0.00', '2021-05-19 15:16:16', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(227, 'PZ', 147, '325.00', '2021-05-19 15:18:21', '0000-00-00 00:00:00', 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890, 0),
(228, 'WZ', 148, '0.00', '2021-05-30 12:51:47', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(229, 'WZ', 149, '0.00', '2021-05-30 15:04:40', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891, 0),
(230, 'PM', 150, '0.00', '2021-05-30 15:59:01', NULL, 1, 4, 'test', 'ul. test test/test ,test test', 0, 0),
(231, 'PM', 151, '0.00', '2021-05-30 16:04:46', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(232, 'PM', 152, '113.95', '2021-05-30 16:30:51', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(233, 'PM', 153, '0.00', '2021-05-30 16:31:51', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(239, 'PM', 159, '0.00', '2021-05-30 17:06:58', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(240, 'PM', 160, '0.00', '2021-05-30 17:07:50', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(242, 'PM', 162, '0.00', '2021-05-30 17:33:43', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(243, 'PM', 163, '0.00', '2021-05-30 17:33:49', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(244, 'PM', 164, '0.00', '2021-05-30 17:38:49', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(246, 'PM', 166, '0.00', '2021-05-30 17:41:17', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(247, 'PM', 167, '0.00', '2021-05-30 18:32:53', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(248, 'PM', 168, '0.00', '2021-05-30 18:33:31', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(249, 'PM', 169, '0.00', '2021-05-30 18:33:37', NULL, 1, 4, 'test', 'ul. test test/test ,test test', 0, 0),
(252, 'PM', 172, '0.00', '2021-05-30 18:40:04', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(253, 'PM', 173, '0.00', '2021-05-31 11:50:44', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(254, 'PM', 174, '0.00', '2021-05-31 11:52:20', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(255, 'PM', 175, '0.00', '2021-05-31 11:52:32', NULL, 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(256, 'PM', 176, '0.00', '2021-05-31 12:17:55', NULL, 1, 4, 'test', 'ul. test test/test ,test test', 0, 0),
(257, 'PM', 177, '91.50', '2021-05-31 12:17:59', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 0),
(258, 'PM', 178, '26.50', '2021-05-31 12:20:50', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 2),
(259, 'PM', 179, '26.50', '2021-05-31 12:21:55', '0000-00-00 00:00:00', 1, 2, 'Magazyn-slep1', 'ul. Leszno 12/5 ,64-100 Leszno', 0, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_goods`
--

CREATE TABLE `documents_goods` (
  `id` int(11) NOT NULL,
  `amount` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `total_value` decimal(50,2) NOT NULL,
  `vat` decimal(3,0) NOT NULL,
  `markup` decimal(6,2) NOT NULL,
  `discount` decimal(6,2) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_documents` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `good_name_used_in_creation` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents_goods`
--

INSERT INTO `documents_goods` (`id`, `amount`, `total_value`, `vat`, `markup`, `discount`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES
(82, '6', '36.00', '0', '0.00', '0.00', 1, 93, 2, 'Kapusta czerwona'),
(83, '10', '27.00', '0', '0.00', '0.00', 1, 94, 4, 'Mandarynka'),
(84, '5', '12.50', '0', '0.00', '0.00', 1, 95, 2, 'Kapusta czerwona'),
(85, '5', '12.50', '0', '0.00', '0.00', 1, 95, 2, 'Kapusta czerwona'),
(86, '8', '21.60', '0', '0.00', '0.00', 1, 96, 4, 'Mandarynka'),
(87, '8', '21.60', '0', '0.00', '0.00', 1, 96, 4, 'Mandarynka'),
(88, '8', '21.60', '0', '0.00', '0.00', 1, 96, 4, 'Mandarynka'),
(89, '8', '21.60', '0', '0.00', '0.00', 1, 96, 4, 'Mandarynka'),
(90, '7', '18.55', '0', '0.00', '0.00', 1, 97, 3, 'Jabłka Ligol'),
(91, '6', '36.00', '0', '0.00', '0.00', 1, 98, 2, 'Kapusta czerwona'),
(92, '5', '25.00', '0', '0.00', '0.00', 1, 98, 4, 'Mandarynka'),
(98, '10', '90.00', '0', '0.00', '0.00', 1, 101, 2, 'Kapusta czerwona'),
(99, '5', '14.00', '0', '0.00', '0.00', 1, 102, 7, 'Papryka czerwona'),
(100, '9', '22.50', '0', '0.00', '0.00', 1, 103, 8, 'Papryka żółta'),
(111, '10', '20.00', '0', '0.00', '0.00', 1, 124, 2, 'Kapusta czerwona'),
(112, '10', '26.50', '0', '0.00', '0.00', 1, 124, 3, 'Jabłka Ligol'),
(124, '10', '15.00', '0', '0.00', '0.00', 1, 125, 4, 'Mandarynka'),
(125, '10', '28.00', '0', '0.00', '0.00', 1, 125, 7, 'Papryka czerwona'),
(126, '20', '56.00', '0', '0.00', '0.00', 1, 125, 7, 'Papryka czerwona'),
(140, '10', '20.00', '27', '0.00', '0.00', 1, 128, 2, 'Kapusta czerwona'),
(141, '10', '20.00', '8', '0.00', '0.00', 1, 128, 2, 'Kapusta czerwona'),
(142, '10', '20.00', '27', '0.00', '0.00', 1, 129, 2, 'Kapusta czerwona'),
(157, '10', '20.00', '27', '0.00', '0.00', 1, 132, 2, 'Kapusta czerwona'),
(158, '10', '20.00', '27', '0.00', '0.00', 1, 132, 2, 'Kapusta czerwona'),
(171, '1', '1.00', '27', '0.00', '0.00', 1, 138, 5, 'Jabłka Jonagold'),
(172, '1', '1.00', '27', '0.00', '0.00', 1, 139, 5, 'Jabłka Jonagold'),
(173, '10', '10.00', '27', '0.00', '0.00', 1, 140, 2, 'Kapusta czerwona'),
(174, '10', '100.00', '8', '0.00', '0.00', 1, 142, 4, 'Mandarynka'),
(176, '1', '56.00', '27', '0.00', '0.00', 1, 144, 5, 'Jabłka Jonagold'),
(177, '100', '265.00', '8', '0.00', '0.00', 1, 157, 3, 'Jabłka Ligol'),
(178, '200', '1300.00', '12', '0.00', '0.00', 1, 159, 6, 'Arbuz'),
(187, '31', '201.50', '23', '9.99', '9.99', 1, 184, 6, 'Arbuz'),
(189, '10', '22.26', '23', '20.00', '30.00', 1, 185, 3, 'Jabłka Ligol'),
(190, '11', '18.48', '23', '12.00', '0.00', 1, 195, 4, 'Mandarynka'),
(191, '10', '65.00', '27', '0.00', '0.00', 1, 197, 6, 'Arbuz'),
(192, '34', '221.00', '27', '0.00', '0.00', 1, 198, 6, 'Arbuz'),
(225, '10', '20.00', '27', '0.00', '0.00', 1, 219, 2, 'Kapusta czerwona'),
(229, '50', '325.00', '23', '0.00', '0.00', 1, 222, 6, 'Arbuz'),
(230, '50', '325.00', '23', '0.00', '0.00', 1, 223, 6, 'Arbuz'),
(234, '50', '325.00', '27', '0.00', '0.00', 1, 227, 6, 'Arbuz'),
(241, '10', '65.00', '23', '0.00', '0.00', 1, 240, 6, 'Arbuz'),
(243, '23', '60.95', '23', '0.00', '0.00', 1, 243, 3, 'Jabłka Ligol'),
(245, '10', '26.50', '23', '0.00', '0.00', 1, 246, 3, 'Jabłka Ligol'),
(246, '10', '26.50', '23', '0.00', '0.00', 1, 246, 3, 'Jabłka Ligol'),
(247, '10', '26.50', '23', '0.00', '0.00', 1, 246, 3, 'Jabłka Ligol'),
(248, '10', '65.00', '23', '0.00', '0.00', 1, 246, 6, 'Arbuz'),
(255, '10', '26.50', '0', '0.00', '0.00', 1, 259, 3, 'Jabłka Ligol');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `unit_of_measure` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_producer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `goods`
--

INSERT INTO `goods` (`id`, `name`, `unit_price`, `unit_of_measure`, `id_producer`) VALUES
(2, 'Kapusta czerwona', '2.00', 'kg', 7),
(3, 'Jabłka Ligol', '2.65', 'kg', 7),
(4, 'Mandarynka', '1.50', 'kg', 7),
(5, 'Jabłka Jonagold', '2.21', 'kg', 7),
(6, 'Arbuz', '6.50', 'szt', 7),
(7, 'Papryka czerwona', '2.80', 'kg', 7),
(8, 'Papryka żółta', '2.50', 'kg', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazines`
--

CREATE TABLE `magazines` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `shortcut` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` varchar(5) NOT NULL,
  `apartment_number` varchar(5) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `town` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `magazines`
--

INSERT INTO `magazines` (`id`, `name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES
(2, 'Magazyn-slep1', 'MGS', 'przetrzeń magazynowa w sklepie', 'Leszno', '12', '5', '64-100', 'Leszno'),
(4, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazines_goods`
--

CREATE TABLE `magazines_goods` (
  `id` int(11) NOT NULL,
  `id_magazines` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `magazines_goods`
--

INSERT INTO `magazines_goods` (`id`, `id_magazines`, `id_goods`, `amount`) VALUES
(12, 4, 4, 0),
(58, 4, 3, 90),
(59, 4, 6, 100),
(70, 4, 6, -50),
(71, 4, 6, 50),
(72, 4, 6, -55),
(73, 4, 6, 55),
(74, 4, 6, -50),
(75, 4, 6, 50),
(96, 4, 3, -10),
(97, 2, 3, 10),
(98, 4, 6, -10),
(99, 2, 6, 10),
(100, 4, 3, -10),
(101, 2, 3, 10),
(102, 4, 3, -10),
(103, 2, 3, 10),
(104, 4, 3, -10),
(105, 2, 3, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `shortcut` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `NIP` int(10) NOT NULL,
  `offered_products` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `house_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `apartment_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `town` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `producers`
--

INSERT INTO `producers` (`id`, `name`, `shortcut`, `description`, `NIP`, `offered_products`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES
(7, 'Maspex', 'mas', '', 1234567890, '', 'Główna', '6', '', '01-385', 'Warszawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$BcUUGq3bOpHGW.k9FKuhIOOeoqvTNRXzmO4Nq.6OEdM8nLACxYzNG', 1),
(2, 'nieadmin', '$2y$10$e0HOXMfzFtCEOPJbF1ln1OoSVPN9rl4hZJCCcr6iu3VJYGj5cCUJm', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- Indeksy dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_documents` (`id_documents`),
  ADD KEY `id_goods` (`id_goods`);

--
-- Indeksy dla tabeli `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producer` (`id_producer`);

--
-- Indeksy dla tabeli `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `magazines_goods`
--
ALTER TABLE `magazines_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_goods` (`id_goods`),
  ADD KEY `id_magazines` (`id_magazines`);

--
-- Indeksy dla tabeli `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT dla tabeli `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `magazines_goods`
--
ALTER TABLE `magazines_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT dla tabeli `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  ADD CONSTRAINT `documents_goods_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `documents_goods_ibfk_2` FOREIGN KEY (`id_documents`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `documents_goods_ibfk_3` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`id`);

--
-- Ograniczenia dla tabeli `magazines_goods`
--
ALTER TABLE `magazines_goods`
  ADD CONSTRAINT `magazines_goods_ibfk_1` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `magazines_goods_ibfk_2` FOREIGN KEY (`id_magazines`) REFERENCES `magazines` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
