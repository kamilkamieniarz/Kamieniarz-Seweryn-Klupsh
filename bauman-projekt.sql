-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Maj 2021, 23:07
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `client_NIP_used_in_creation` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `type`, `number`, `value`, `date`, `date_foreign_documents`, `id_author`, `id_client`, `client_name_used_in_creation`, `client_adress_used_in_creation`, `client_NIP_used_in_creation`) VALUES
(92, 'PZ', 20, '13.00', '2021-04-17 17:34:42', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(93, 'WZ', 21, '0.00', '2021-04-17 17:38:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0),
(94, 'PZ', 22, '27.00', '2021-04-17 17:53:39', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(95, 'PZ', 23, '25.00', '2021-04-17 17:55:41', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(96, 'PZ', 24, '86.00', '2021-04-17 17:57:26', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(97, 'PZ', 25, '19.00', '2021-04-17 18:04:06', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(98, 'WZ', 26, '61.00', '2021-04-17 18:05:58', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0),
(99, 'WZ', 27, '0.00', '2021-04-17 18:07:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0),
(100, 'PZ', 28, '0.00', '2021-04-17 18:10:53', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(101, 'WZ', 29, '90.00', '2021-04-17 18:11:15', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0),
(102, 'PZ', 30, '14.00', '2021-04-17 18:11:45', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(103, 'PZ', 31, '23.00', '2021-04-17 18:14:14', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(109, 'PZ', 37, '0.00', '2021-04-20 12:07:52', NULL, 2, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(110, 'PZ', 38, '0.00', '2021-05-01 12:02:33', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(112, 'PZ', 39, '0.00', '2021-05-01 14:42:24', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 0),
(113, 'WZ', 40, '0.00', '2021-05-01 17:56:30', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 0),
(114, 'PZ', 41, '0.00', '2021-05-03 14:45:20', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(117, 'PZ', 44, '0.00', '2021-05-03 15:19:36', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(118, 'PZ', 45, '0.00', '2021-05-03 20:38:00', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(119, 'WZ', 46, '0.00', '2021-05-03 20:38:09', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(120, 'WZ', 47, '0.00', '2021-05-03 20:38:18', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(121, 'WZ', 48, '0.00', '2021-05-03 20:39:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(122, 'WZ', 49, '0.00', '2021-05-03 20:45:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(123, 'PZ', 50, '0.00', '2021-05-03 20:46:38', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(124, 'PZ', 51, '0.00', '2021-05-03 21:01:03', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(125, 'PZ', 52, '0.00', '2021-05-03 21:04:49', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(126, 'PZ', 53, '0.00', '2021-05-03 21:19:13', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(127, 'PZ', 54, '0.00', '2021-05-03 21:20:28', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(128, 'PZ', 55, '0.00', '2021-05-03 21:26:33', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(129, 'PZ', 56, '0.00', '2021-05-03 21:28:23', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(132, 'PZ', 59, '0.00', '2021-05-03 21:55:43', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(138, 'WZ', 60, '1.00', '2021-05-03 22:12:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(139, 'WZ', 61, '1.00', '2021-05-03 22:13:23', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(140, 'WZ', 62, '10.00', '2021-05-03 22:26:17', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(142, 'WZ', 64, '100.00', '2021-05-03 22:30:44', '0000-00-00 00:00:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(144, 'WZ', 65, '56.00', '2021-05-03 22:34:45', '2021-05-27 02:36:00', 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(145, 'WZ', 66, '0.00', '2021-05-03 22:35:52', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(146, 'WZ', 67, '0.00', '2021-05-03 22:37:07', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(147, 'WZ', 68, '0.00', '2021-05-03 22:37:11', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(148, 'PZ', 69, '0.00', '2021-05-03 22:37:55', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(149, 'WZ', 70, '0.00', '2021-05-03 22:59:45', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(150, 'WZ', 71, '0.00', '2021-05-03 23:01:32', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(151, 'WZ', 72, '0.00', '2021-05-03 23:01:39', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(152, 'WZ', 73, '0.00', '2021-05-03 23:02:50', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(153, 'PZ', 74, '0.00', '2021-05-03 23:05:26', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(154, 'PZ', 75, '0.00', '2021-05-03 23:05:54', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa', 1234567890),
(155, 'WZ', 76, '0.00', '2021-05-03 23:06:02', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891),
(156, 'WZ', 77, '0.00', '2021-05-03 23:06:06', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno', 1234567891);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_goods`
--

CREATE TABLE `documents_goods` (
  `id` int(11) NOT NULL,
  `amount` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `total_value` decimal(50,2) NOT NULL,
  `vat` decimal(3,0) NOT NULL,
  `markup` decimal(3,2) NOT NULL,
  `discount` decimal(3,2) NOT NULL,
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
(176, '1', '56.00', '27', '0.00', '0.00', 1, 144, 5, 'Jabłka Jonagold');

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
(12, 4, 4, 61);

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
-- AUTO_INCREMENT for dumped tables
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT dla tabeli `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
