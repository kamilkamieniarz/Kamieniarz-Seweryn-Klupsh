-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Mar 2021, 13:43
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
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `shortcut` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `house_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `apartment_number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `town` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `number` int(50) NOT NULL,
  `value` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_author` int(11) NOT NULL,
  `id_contractors` int(11) NOT NULL,
  `id_producers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_goods`
--

CREATE TABLE `documents_goods` (
  `id` int(25) NOT NULL,
  `amount` int(255) NOT NULL,
  `total_value` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `id_author` int(255) NOT NULL,
  `id_documents` int(255) NOT NULL,
  `id_goods` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `producer` text COLLATE utf8mb4_polish_ci NOT NULL,
  `unit_price` double(11,2) NOT NULL,
  `unit_of_measure` text COLLATE utf8mb4_polish_ci NOT NULL,
  `quantity` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `goods`
--

INSERT INTO `goods` (`id`, `name`, `producer`, `unit_price`, `unit_of_measure`, `quantity`) VALUES
(1, 'Kapusta Biała', 'Kowalski', 3.00, 'kg', 25.00),
(2, 'Kapusta czerwona', 'Kowalski', 2.50, 'kg', 15.00),
(3, 'Jabłka Ligol', 'Renata Jabłońska', 2.65, 'kg', 23.00),
(4, 'Mandarynka', 'Fritsource SA', 2.70, 'kg', 0.00),
(5, 'Jabłka Jonagold', 'Gruszczyński i synowie sp. z o.o.', 2.21, 'kg', 5.00),
(6, 'Arbuz', 'Exotic SA', 6.50, 'szt', 0.00),
(7, 'Papryka czerwona', 'Piotr Tętnica', 2.80, 'kg', 0.00),
(8, 'Papryka żółta', 'Piotr Tętnica', 2.50, 'kg', 23.00);

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
  ADD KEY `id_contractors` (`id_contractors`),
  ADD KEY `id_producers` (`id_producers`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`id_contractors`) REFERENCES `contractors` (`id`),
  ADD CONSTRAINT `documents_ibfk_3` FOREIGN KEY (`id_producers`) REFERENCES `producers` (`id`);

--
-- Ograniczenia dla tabeli `documents_goods`
--
ALTER TABLE `documents_goods`
  ADD CONSTRAINT `documents_goods_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `documents_goods_ibfk_2` FOREIGN KEY (`id_documents`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `documents_goods_ibfk_3` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
