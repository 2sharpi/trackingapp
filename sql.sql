-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 12 Maj 2019, 14:43
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
  `isHidden` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Log`
--

INSERT INTO `Log` (`idLog`, `Date`, `Description`, `Tracking_idTracking`, `isHidden`) VALUES
(519, '2019-02-11T10:47:12', 'Parcel delivered', 20, 0),
(520, '2019-02-07T23:13:25.135', 'In transit', 20, 0),
(521, '2019-02-07T21:37:20.992', 'Parcel has been picked up in office', 20, 0),
(522, '2019-02-07T14:56:04', 'Parcel has been picked up in office', 20, 0),
(523, '2019-02-07T14:34:57.51', 'Parcel has been picked up by our agent', 20, 0),
(524, '2019-02-06T08:46:22.953', 'Parcel Registered, waiting for pickup.', 20, 0),
(525, '2019-02-14T16:11:33', 'Parcel delivered', 21, 0),
(526, '2019-02-08T20:31:30.181', 'In transit', 21, 0),
(527, '2019-02-08T14:42:29', 'Parcel has been picked up in office', 21, 0),
(528, '2019-02-08T14:14:55.491', 'Parcel has been picked up by our agent', 21, 0),
(529, '2019-02-08T10:28:43.566', 'Parcel Registered, waiting for pickup.', 21, 0),
(530, '2019-03-22T15:16:00', 'Parcel delivered', 22, 0),
(531, '2019-03-18T22:18:21.459', 'In transit', 22, 0),
(532, '2019-03-18T15:35:19', 'Parcel has been picked up in office', 22, 0),
(533, '2019-03-18T14:38:43.783', 'Parcel has been picked up by our agent', 22, 0),
(534, '2019-03-18T11:24:55.348', 'Parcel Registered, waiting for pickup.', 22, 0),
(535, '2019-03-25T14:41:55', 'Parcel delivered', 23, 0),
(536, '2019-03-19T03:23:02.411', 'In transit', 23, 0),
(537, '2019-03-18T23:49:56.978', 'Parcel has been picked up in office', 23, 0),
(538, '2019-03-18T16:46:57', 'Parcel has been picked up in office', 23, 0),
(539, '2019-03-18T16:20:35.254', 'Parcel has been picked up by our agent', 23, 0),
(540, '2019-03-18T14:52:27.546', 'Parcel Registered, waiting for pickup.', 23, 0),
(541, '2019-03-21T12:35:50', 'Parcel delivered', 24, 0),
(542, '2019-03-19T04:38:54.71', 'In transit', 24, 0),
(543, '2019-03-19T04:38:04.003', 'Parcel has been picked up in office', 24, 0),
(544, '2019-03-18T21:22:06.799', 'Parcel has been picked up in office', 24, 0),
(545, '2019-03-18T15:34:24', 'Parcel has been picked up in office', 24, 0),
(546, '2019-03-18T14:38:35.012', 'Parcel has been picked up by our agent', 24, 0),
(547, '2019-03-18T11:24:55.464', 'Parcel Registered, waiting for pickup.', 24, 0),
(548, '2019-04-17T11:42:50', 'Parcel delivered', 25, 0),
(549, '2019-04-13T03:48:11.488', 'In transit', 25, 0),
(550, '2019-04-12T23:50:49.519', 'Parcel has been picked up in office', 25, 0),
(551, '2019-04-12T19:21:37', 'Parcel has been picked up in office', 25, 0),
(552, '2019-04-12T16:14:51.649', 'Parcel has been picked up by our agent', 25, 0),
(553, '2019-04-12T14:51:44.824', 'Parcel Registered, waiting for pickup.', 25, 0),
(554, '2019-04-23T14:44:19', 'Parcel delivered', 26, 0),
(555, '2019-04-16T23:41:56.999', 'In transit', 26, 0),
(556, '2019-04-16T17:49:11', 'Parcel has been picked up in office', 26, 0),
(557, '2019-04-16T16:55:37', 'Parcel has been picked up by our agent', 26, 0),
(558, '2019-04-16T16:49:55.752', 'Parcel has been picked up by our agent', 26, 0),
(559, '2019-04-15T10:43:05.841', 'Parcel Registered, waiting for pickup.', 26, 0),
(560, '2019-05-02T10:56:11', 'Parcel delivered', 27, 0),
(561, '2019-04-24T00:56:40.594', 'In transit', 27, 0),
(562, '2019-04-24T00:52:34.814', 'Parcel has been picked up in office', 27, 0),
(563, '2019-04-23T14:48:56', 'Parcel has been picked up in office', 27, 0),
(564, '2019-04-23T14:21:13.371', 'Parcel has been picked up by our agent', 27, 0),
(565, '2019-04-19T10:17:59.517', 'Parcel Registered, waiting for pickup.', 27, 0),
(566, '2019-05-01T09:37:59', 'Parcel delivered', 28, 0),
(567, '2019-04-26T02:22:46.594', 'In transit', 28, 0),
(568, '2019-04-25T20:45:57', 'Parcel has been picked up in office', 28, 0),
(569, '2019-04-25T16:03:46.139', 'Parcel has been picked up by our agent', 28, 0),
(570, '2019-04-23T16:03:01.45', 'Parcel Registered, waiting for pickup.', 28, 0),
(571, '2019-02-05T14:56:04', 'TEST', 20, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tracking`
--

CREATE TABLE `Tracking` (
  `idTracking` int(11) NOT NULL,
  `realTracking` varchar(45) NOT NULL,
  `generatedTracking` varchar(45) NOT NULL,
  `isDelivered` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Tracking`
--

INSERT INTO `Tracking` (`idTracking`, `realTracking`, `generatedTracking`, `isDelivered`) VALUES
(20, '13439300055369', '96355000393431', 1),
(21, '13439300055644', '44655000393431', 1),
(22, '13439300061284', '48216000393431', 1),
(23, '13439300061405', '50416000393431', 1),
(24, '13439300061293', '39216000393431', 1),
(25, '13439300065880', '08856000393431', 1),
(26, '13439300066102', '20166000393431', 1),
(27, '13439300067023', '32076000393431', 1),
(28, '13439300067486', '68476000393431', 1),
(29, '13439300067559', '95576000393431', 0),
(30, '13439300067641', '14676000393431', 0),
(31, '13439300067924', '42976000393431', 0),
(32, '13439300068354', '45386000393431', 0),
(33, '13439300068351', '15386000393431', 0),
(34, '13439300068695', '59686000393431', 0);

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
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;
--
-- AUTO_INCREMENT dla tabeli `Tracking`
--
ALTER TABLE `Tracking`
  MODIFY `idTracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
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
