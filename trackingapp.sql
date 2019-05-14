-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 13 Maj 2019, 04:44
-- Wersja serwera: 5.7.26-0ubuntu0.18.04.1
-- Wersja PHP: 7.1.29-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `trackingapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `AppLog`
--

CREATE TABLE `AppLog` (
  `idAppLog` int(11) NOT NULL,
  `Date` varchar(45) NOT NULL,
  `Code` int(11) NOT NULL,
  `Description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Log`
--

CREATE TABLE `Log` (
  `idLog` int(11) NOT NULL,
  `Date` tinytext,
  `Description` mediumtext,
  `Tracking_idTracking` int(11) NOT NULL,
  `isHidden` tinyint(1) DEFAULT '0',
  `notes` longtext,
  `isFailure` tinyint(1) DEFAULT '0',
  `hierarchy` int(11) NOT NULL,
  `address` tinytext,
  `countryCode` tinytext,
  `realDescription` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tracking`
--

CREATE TABLE `Tracking` (
  `idTracking` int(11) NOT NULL,
  `realTracking` varchar(45) NOT NULL,
  `generatedTracking` varchar(45) NOT NULL,
  `address` tinytext NOT NULL,
  `postalCode` tinytext NOT NULL,
  `countryCode` tinytext NOT NULL,
  `overallStatus` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `username` tinytext,
  `password` tinytext,
  `lastFailedLogin` date DEFAULT NULL,
  `lastLoginDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`idUser`, `username`, `password`, `lastFailedLogin`, `lastLoginDate`) VALUES
(1, 'admin', '$2y$10$3Cdsxgj0is9X0OsLBBY30uOHzmDGueVBboaOAIm8UnOm9IWlykg26', NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `AppLog`
--
ALTER TABLE `AppLog`
  ADD PRIMARY KEY (`idAppLog`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`idLog`,`Tracking_idTracking`),
  ADD KEY `fk_Log_Tracking_idx` (`Tracking_idTracking`);

--
-- Indexes for table `Tracking`
--
ALTER TABLE `Tracking`
  ADD PRIMARY KEY (`idTracking`),
  ADD UNIQUE KEY `realTracking_UNIQUE` (`realTracking`),
  ADD UNIQUE KEY `generatedTracking_UNIQUE` (`generatedTracking`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `AppLog`
--
ALTER TABLE `AppLog`
  MODIFY `idAppLog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `Log`
--
ALTER TABLE `Log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;
--
-- AUTO_INCREMENT dla tabeli `Tracking`
--
ALTER TABLE `Tracking`
  MODIFY `idTracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT dla tabeli `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `fk_Log_Tracking` FOREIGN KEY (`Tracking_idTracking`) REFERENCES `Tracking` (`idTracking`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
