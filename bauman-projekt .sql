-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Mar 2021, 19:03
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
  `street` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `house_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `apartment_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `town` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contractors`
--

INSERT INTO `contractors` (`id`, `name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES
(5, 'Kowalski sp.zoo', 'KOW', '', 'Jana Pawła', '12', 'A', '64-100', 'Leszno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `number` int(50) NOT NULL,
  `value` decimal(50,0) NOT NULL,
  `date` datetime NOT NULL,
  `date_foreign_documents` datetime NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_contractors` int(11) NOT NULL,
  `contractor_name_used_in_creation` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `contractor_adress_used_in_creation` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `type`, `number`, `value`, `date`, `date_foreign_documents`, `id_author`, `id_contractors`, `contractor_name_used_in_creation`, `contractor_adress_used_in_creation`) VALUES
(3, 'pz', 111, '10', '2021-03-27 12:35:30', '2021-03-27 12:35:30', 2, 5, 'testowy kontraktor', 'TKS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_goods`
--

CREATE TABLE `documents_goods` (
  `id` int(11) NOT NULL,
  `quantity` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `total_value` decimal(50,2) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_documents` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `good_name_used_in_creation` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `unit_of_measure` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `id_producer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `goods`
--

INSERT INTO `goods` (`id`, `name`, `unit_price`, `unit_of_measure`, `amount`, `id_producer`) VALUES
(2, 'Kapusta czerwona', '2.50', 'kg', '15.00', 7),
(3, 'Jabłka Ligol', '2.65', 'kg', '23.00', 7),
(4, 'Mandarynka', '2.70', 'kg', '0.00', 7),
(5, 'Jabłka Jonagold', '2.21', 'kg', '5.00', 7),
(6, 'Arbuz', '6.50', 'szt', '0.00', 7),
(7, 'Papryka czerwona', '2.80', 'kg', '0.00', 7),
(8, 'Papryka żółta', '2.50', 'kg', '23.00', 7),
(15, 'test', '0.00', 'szt.', '0.00', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazines`
--

CREATE TABLE `magazines` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shortcut` varchar(5) NOT NULL,
  `description` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` varchar(50) NOT NULL,
  `apartment_number` varchar(50) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
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
(1, 2, 2, 5),
(2, 4, 6, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `shortcut` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `offered_products` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `house_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `apartment_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `town` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `producers`
--

INSERT INTO `producers` (`id`, `name`, `shortcut`, `description`, `offered_products`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES
(7, 'Maspex', 'mas', '', '', 'Główna', '6', '', '01-385', 'Warszawa');

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
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_contractors` (`id_contractors`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `magazines_goods`
--
ALTER TABLE `magazines_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`id_contractors`) REFERENCES `contractors` (`id`);

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
