-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Maj 2021, 17:53
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
(5, 'Kowalski sp.zoo', 'KOW', '', 987654321, 'Jana Pawła', '12', 'A', '64-100', 'Leszno');

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
  `client_adress_used_in_creation` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `type`, `number`, `value`, `date`, `date_foreign_documents`, `id_author`, `id_client`, `client_name_used_in_creation`, `client_adress_used_in_creation`) VALUES
(92, 'PZ', 20, '13.00', '2021-04-17 17:34:42', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(93, 'WZ', 21, '0.00', '2021-04-17 17:38:25', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno'),
(94, 'PZ', 22, '27.00', '2021-04-17 17:53:39', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(95, 'PZ', 23, '25.00', '2021-04-17 17:55:41', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(96, 'PZ', 24, '86.00', '2021-04-17 17:57:26', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(97, 'PZ', 25, '19.00', '2021-04-17 18:04:06', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(98, 'WZ', 26, '61.00', '2021-04-17 18:05:58', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno'),
(99, 'WZ', 27, '0.00', '2021-04-17 18:07:29', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno'),
(100, 'PZ', 28, '0.00', '2021-04-17 18:10:53', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(101, 'WZ', 29, '90.00', '2021-04-17 18:11:15', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno'),
(102, 'PZ', 30, '14.00', '2021-04-17 18:11:45', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(103, 'PZ', 31, '23.00', '2021-04-17 18:14:14', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(104, 'PZ', 32, '250.00', '2021-04-17 18:16:57', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(105, 'PZ', 33, '15.00', '2021-04-17 18:20:01', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(106, 'PZ', 34, '15.00', '2021-04-17 18:20:18', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(107, 'PZ', 35, '18.00', '2021-04-17 18:21:01', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(108, 'PZ', 36, '246.00', '2021-04-17 18:21:27', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(109, 'PZ', 37, '0.00', '2021-04-20 12:07:52', NULL, 2, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(110, 'PZ', 38, '0.00', '2021-05-01 12:02:33', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(112, 'PZ', 39, '0.00', '2021-05-01 14:42:24', NULL, 1, 7, 'Maspex', 'ul. Główna 6/ ,01-385 Warszawa'),
(113, 'WZ', 40, '0.00', '2021-05-01 17:56:30', NULL, 1, 5, 'Kowalski sp.zoo', 'ul. Jana Pawła 12/A ,64-100 Leszno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_goods`
--

CREATE TABLE `documents_goods` (
  `id` int(11) NOT NULL,
  `amount` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `total_value` decimal(50,2) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_documents` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `good_name_used_in_creation` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents_goods`
--

INSERT INTO `documents_goods` (`id`, `amount`, `total_value`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES
(82, '6', '36.00', 1, 93, 2, 'Kapusta czerwona'),
(83, '10', '27.00', 1, 94, 4, 'Mandarynka'),
(84, '5', '12.50', 1, 95, 2, 'Kapusta czerwona'),
(85, '5', '12.50', 1, 95, 2, 'Kapusta czerwona'),
(86, '8', '21.60', 1, 96, 4, 'Mandarynka'),
(87, '8', '21.60', 1, 96, 4, 'Mandarynka'),
(88, '8', '21.60', 1, 96, 4, 'Mandarynka'),
(89, '8', '21.60', 1, 96, 4, 'Mandarynka'),
(90, '7', '18.55', 1, 97, 3, 'Jabłka Ligol'),
(91, '6', '36.00', 1, 98, 2, 'Kapusta czerwona'),
(92, '5', '25.00', 1, 98, 4, 'Mandarynka'),
(98, '10', '90.00', 1, 101, 2, 'Kapusta czerwona'),
(99, '5', '14.00', 1, 102, 7, 'Papryka czerwona'),
(100, '9', '22.50', 1, 103, 8, 'Papryka żółta'),
(101, '100', '250.00', 1, 104, 2, 'Kapusta czerwona'),
(102, '6', '15.00', 1, 105, 2, 'Kapusta czerwona'),
(103, '6', '15.00', 1, 106, 2, 'Kapusta czerwona'),
(104, '7', '17.50', 1, 107, 2, 'Kapusta czerwona'),
(105, '67', '180.90', 1, 108, 4, 'Mandarynka'),
(106, '10', '65.00', 1, 108, 6, 'Arbuz');

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
(2, 'Kapusta czerwona', '2.50', 'kg', 7),
(3, 'Jabłka Ligol', '2.65', 'kg', 7),
(4, 'Mandarynka', '2.70', 'kg', 7),
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
(1, 2, 2, 11),
(2, 4, 6, 10),
(3, 2, 6, 10),
(4, 2, 4, 10),
(12, 4, 4, 67),
(13, 4, 6, 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
