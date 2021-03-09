-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Mar 2021, 13:29
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
-- Baza danych: `projekt2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `ID` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Producent` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Cena Jednostkowa` double(11,2) NOT NULL,
  `Jednostka miary` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Ilość` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `towary`
--

INSERT INTO `towary` (`ID`, `Nazwa`, `Producent`, `Cena Jednostkowa`, `Jednostka miary`, `Ilość`) VALUES
(1, 'Kapusta Biała', 'Kowalski', 3.00, 'kg', 25.00),
(2, 'Kapusta czerwona', 'Kowalski', 2.50, 'kg', 15.00),
(3, 'Jabłka Ligol', 'Renata Jabłońska', 2.65, 'kg', 23.00),
(4, 'Mandarynka', 'Fritsource SA', 2.70, 'kg', 0.00),
(5, 'Jabłka Jonagold', 'Gruszczyński i synowie sp. z o.o.', 2.21, 'kg', 5.00),
(6, 'Arbuz', 'Exotic SA', 6.50, 'szt', 0.00),
(7, 'Papryka czerwona', 'Piotr Tętnica', 2.80, 'kg', 0.00),
(8, 'Papryka żółta', 'Piotr Tętnica', 2.50, 'kg', 23.00);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `towary`
--
ALTER TABLE `towary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
