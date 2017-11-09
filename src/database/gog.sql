-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Nov 2017 um 19:58
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `gog`
--
CREATE DATABASE IF NOT EXISTS `gog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gog`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `grade`
--

CREATE TABLE `grade` (
  `ID` int(11) NOT NULL,
  `VALUE` double NOT NULL,
  `userID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `COMMENT` text,
  `WEIGHT` int(11) NOT NULL,
  `REPORT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `PATH` text NOT NULL,
  `TITLE` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `report`
--

INSERT INTO `report` (`ID`, `PATH`, `TITLE`, `userID`) VALUES
(1, 'path', 'title', 2),
(2, 'path2', 'title2', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subjectconfig`
--

CREATE TABLE `subjectconfig` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `EMAIL` text,
  `COACH` tinyint(1) DEFAULT NULL,
  `LOWGRADELIMIT` double DEFAULT NULL,
  `HIGHGRADELIMIT` double DEFAULT NULL,
  `coachID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `NAME`, `USERNAME`, `PASSWORD`, `EMAIL`, `COACH`, `LOWGRADELIMIT`, `HIGHGRADELIMIT`, `coachID`) VALUES
(1, 'TEST', 'testuser', 'pw', 'email', 1, NULL, NULL, NULL),
(2, 'lehrling', 'lernender', 'pw', 'email', 0, 4, 5.5, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `subjectconfig`
--
ALTER TABLE `subjectconfig`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userId` (`userId`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `grade`
--
ALTER TABLE `grade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `subjectconfig`
--
ALTER TABLE `subjectconfig`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `subjectconfig`
--
ALTER TABLE `subjectconfig`
  ADD CONSTRAINT `subjectconfig_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `subjectconfig_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`ID`);
COMMIT;

CREATE USER 'goguser'@'localhost' identified by 'gogpasswort';
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
