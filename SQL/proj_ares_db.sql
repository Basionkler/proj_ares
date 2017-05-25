-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 23, 2017 alle 00:01
-- Versione del server: 10.1.22-MariaDB
-- Versione PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_ares_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `text` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `text` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `comment_like`
--

CREATE TABLE `comment_like` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `link` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `labels` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `uploading_date` datetime NOT NULL,
  `publishing_date` datetime NOT NULL,
  `is_main` int(11) NOT NULL,
  `thumbnail` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `privacy` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `video_evaluation`
--

CREATE TABLE `video_evaluation` (
  `video_evaluation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `evaluation` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `video_playlist`
--

CREATE TABLE `video_playlist` (
  `video_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `IDX_DADD4A25A76ED395` (`user_id`),
  ADD KEY `IDX_DADD4A2529C1004E` (`video_id`),
  ADD KEY `IDX_DADD4A25F8697D13` (`comment_id`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`);

--
-- Indici per le tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`),
  ADD KEY `IDX_9474526C29C1004E` (`video_id`);

--
-- Indici per le tabelle `comment_like`
--
ALTER TABLE `comment_like`
  ADD PRIMARY KEY (`user_id`,`comment_id`),
  ADD KEY `IDX_8A55E25FA76ED395` (`user_id`),
  ADD KEY `IDX_8A55E25FF8697D13` (`comment_id`);

--
-- Indici per le tabelle `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indici per le tabelle `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `IDX_D782112DA76ED395` (`user_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indici per le tabelle `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `UNIQ_7CC7DA2C36AC99F1` (`link`),
  ADD KEY `IDX_7CC7DA2CA76ED395` (`user_id`),
  ADD KEY `IDX_7CC7DA2C82F1BAF4` (`language_id`),
  ADD KEY `IDX_7CC7DA2C12469DE2` (`category_id`);

--
-- Indici per le tabelle `video_evaluation`
--
ALTER TABLE `video_evaluation`
  ADD PRIMARY KEY (`video_evaluation_id`),
  ADD KEY `IDX_9384BDC3A76ED395` (`user_id`),
  ADD KEY `IDX_9384BDC329C1004E` (`video_id`);

--
-- Indici per le tabelle `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD PRIMARY KEY (`video_id`,`playlist_id`),
  ADD KEY `IDX_7F00239129C1004E` (`video_id`),
  ADD KEY `IDX_7F0023916BBD148` (`playlist_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `video_evaluation`
--
ALTER TABLE `video_evaluation`
  MODIFY `video_evaluation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_DADD4A2529C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `FK_DADD4A25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_DADD4A25F8697D13` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`);

--
-- Limiti per la tabella `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C29C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `comment_like`
--
ALTER TABLE `comment_like`
  ADD CONSTRAINT `FK_8A55E25FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_8A55E25FF8697D13` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`);

--
-- Limiti per la tabella `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_D782112DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `FK_7CC7DA2C82F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `FK_7CC7DA2CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `video_evaluation`
--
ALTER TABLE `video_evaluation`
  ADD CONSTRAINT `FK_9384BDC329C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `FK_9384BDC3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD CONSTRAINT `FK_7F00239129C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `FK_7F0023916BBD148` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`playlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
