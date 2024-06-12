-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
-- 
-- Host: 127.0.0.1
-- Czas generowania: 14 Sty 2023, 14:10
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Baza danych: `projekt`
-- 
 
-- --------------------------------------------------------

-- 
-- Struktura tabeli dla tabeli `planner`
-- 

CREATE TABLE `planner` (
  `ID_Pracownika` text NOT NULL,
  `Nazwisko i Imie` text NOT NULL,
  `Data` date NOT NULL,
  `Projekt` text NOT NULL,
  `Godziny wypracowane` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Zrzut danych tabeli `planner`
-- 

INSERT INTO `planner` (`ID_Pracownika`, `Nazwisko i Imie`, `Data`, `Projekt`, `Godziny wypracowane`) VALUES
('0000', 'Monika Monika', '2023-01-02', 'RWB', 3),
('0000', 'Monika Monika', '2023-01-02', 'Monde', 2),
('0000', 'Monika Monika', '2023-01-02', 'Pega', 3),
('0008', 'Kowalczyk Piotr', '2023-01-02', 'RWB', 8),
('0006', 'Daniel Andrzek', '2023-01-02', 'RWB', 8),
('0004', 'Nowak Jakub', '2023-01-02', 'RWB', 8),
('0007', 'Bochniak Anna', '2023-01-02', 'Monde', 8),
('0003', 'Kowalczyk Piotr', '2023-01-02', 'Monde', 8),
('0005', 'Sławiński Mariusz', '2023-01-02', 'Pega', 8),
('0002', 'Knapik Katarzyna', '2023-01-02', 'Pega', 8),
('0001', 'Marek Dariusz', '2023-01-02', 'Pega', 8);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla tabeli `projekty_lista`
-- 

CREATE TABLE `projekty_lista` (
  `Nazwa` text NOT NULL,
  `Data konca projektu` date NOT NULL,
  `Sugerowana liczba osob` int(255) NOT NULL,
  `Stawka_1` int(255) NOT NULL,
  `Stawka_2` int(255) NOT NULL,
  `Stawka_3` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Zrzut danych tabeli `projekty_lista`
-- 

INSERT INTO `projekty_lista` (`Nazwa`, `Data konca projektu`, `Sugerowana liczba osob`, `Stawka_1`, `Stawka_2`, `Stawka_3`) VALUES
('RWB', '2025-12-31', 5, 40, 48, 60),
('Monde', '2024-12-31', 3, 50, 64, 75),
('Pega', '2022-12-31', 4, 45, 53, 67);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projekty_przypisanie`
--

CREATE TABLE `projekty_przypisanie` (
  `Nazwa` text NOT NULL,
  `Nazwisko i Imie` text NOT NULL,
  `ID_Pracownika` text NOT NULL,
  `Stanowisko` text NOT NULL,
  `Stawka` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Zrzut danych tabeli `projekty_przypisanie`
-- 
  
INSERT INTO `projekty_przypisanie` (`Nazwa`, `Nazwisko i Imie`, `ID_Pracownika`, `Stanowisko`, `Stawka`) VALUES
('RWB', 'Kowalczyk Piotr', '1', 'Junior Office Administrator', 40),
('RWB', 'Daniel Andrzej', '2', 'Senior Office Administrator', 60),
('RWB', 'Nowak Jakub', '3', 'Senior Office Administrator', 60),
('RWB', 'Monika Monika', '5', 'Head of Services', 40),
('Monde', 'Bochniak Anna', '4', 'Mid Office Administrator', 64),
('Monde', 'Kowalczyk Piotr', '9', 'Mid Office Administrator', 64),
('Monde', 'Monika Monika', '5', 'Head of Services', 40),
('Pega', 'Sławiński Mariusz', '6', 'Mid Office Administrator', 53),
('Pega', 'Knapik Katarzyna', '7', 'Data Scientist', 67),
('Pega', 'Marek Dariusz', '8', 'Helpdesk', 67),
('Pega', 'Monika Monika', '5', 'Head of Services', 45);

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla tabeli `users`
-- 

CREATE TABLE `users` (
  `id_user` int(255) NOT NULL,
  `full_name` text NOT NULL,
  `position` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Zrzut danych tabeli `users`
-- 
 
INSERT INTO `users` (`id_user`, `full_name`, `position`, `type`, `status`, `email`, `password`, `end_date`) VALUES
(1, 'Kowalczyk Piotr', 'Junior Office Administrator', 'Pracownik', 'Aktywny', 'p.kowalczyk1@company.com', 'compk01', '2023-12-31'),
(2, 'Daniel Andrzej', 'Data Scientist', 'Menadżer', 'Aktywny', 'a.daniel@company.com', 'comad02', '2024-12-31'),
(3, 'Nowak Jakub', 'Senior Office Administrator', 'Menadżer', 'Aktywny', 'j.nowak@company.com', 'comjn03', '2023-12-31'),
(4, 'Bochniak Anna', 'Human Operator', 'HR', 'Aktywny', 'a.bochniak@company.com', 'comab04', '2023-12-31'),
(5, 'Monika Monika', 'Head of Services', 'Administrator', 'Aktywny', 'm.monika@company.com', 'commm05', '2032-12-31'),
(6, 'Sławiński Mariusz', 'Mid Office Administrator', 'Pracownik', 'Aktywny', 'm.slawinski@company.com', 'comms06', '2024-12-31'),
(7, 'Knapik Katarzyna', 'HR Menadżer', 'HR', 'Aktywny', 'k.kanapik@company.com', 'comkk07', '2030-12-31'),
(8, 'Marek Dariusz', 'Helpdesk', 'Pracownik', 'Aktywny', 'd.marek@company.com', 'comdm08', '2025-12-31'),
(9, 'Kowalczyk Piotr', 'Mid Office Administrator', 'Pracownik', 'Aktywny', 'p.kowalczyk@company.com', 'compk09', '2023-12-31');

-- 
-- Indeksy dla zrzutów tabel
-- 

-- 
-- Indeksy dla tabeli `users`
-- 
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

-- 
-- AUTO_INCREMENT dla zrzuconych tabel
-- 

-- 
-- AUTO_INCREMENT dla tabeli `users`
-- 
ALTER TABLE `users`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
