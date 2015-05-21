-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 21 mei 2015 om 23:05
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `codeigniterdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` varchar(4095) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `description`, `location`) VALUES
(1, '2015-06-01 08:30:00', 'Begin examens', 'deze event heeft niet veel beschrijving nodig, kijk gewoon naar de titel', 'PXL Hogeschool Hasselt'),
(2, '2015-05-22 12:00:00', 'Een event (leeg)', NULL, NULL),
(3, '2015-05-20 08:30:00', 'Random event', 'beschrijving van deze random event', 'locatie van deze random event'),
(4, '2015-06-17 13:30:00', 'Einde examens', 'Deze dag is het laatste examen', 'PXL Hogeschool Hasselt'),
(5, '2015-06-17 14:00:00', 'Begin feesten', 'Hopelijk vielen de examens genoeg mee om te kunnen feesten', 'Maakt niet uit'),
(6, '2015-05-10 00:00:00', 'Randy''s verjaardag', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
`comment_id` int(10) NOT NULL,
  `postedBy` varchar(50) NOT NULL,
  `comment` varchar(30000) NOT NULL,
  `thread_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `forum_comments`
--

INSERT INTO `forum_comments` (`comment_id`, `postedBy`, `comment`, `thread_id`) VALUES
(1, 'faggot', 'IM A FAG', 3),
(2, 'faggot', 'IM A FAG, second comment :'')', 3),
(3, 'faggot', 'third comment :'')', 3),
(4, 'faggot', 'first ;D comment :'')', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forum_threads`
--

CREATE TABLE IF NOT EXISTS `forum_threads` (
`thread_id` int(20) NOT NULL,
  `postedBy` varchar(24) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` varchar(30000) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `forum_threads`
--

INSERT INTO `forum_threads` (`thread_id`, `postedBy`, `title`, `post`, `timestamp`) VALUES
(1, 'AdminMaurice', 'FAQ!', 'What is up guys! \r\n\r\nI''ve decided to post a FAQ on the forums. You can check it out below :)\r\n\r\nEnjoy!', '4/20/2069 13:37'),
(2, 'faggot', 'Thread testing', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren ''60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.', '5/24/2015 16:21'),
(3, 'faggot', 'second Thread.', 'Als u dit leest bent u homofiel :'')\r\nfeggit', '5/24/2015 16:22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nickname`, `role`) VALUES
(5, 'hello@welcome.com', '9cdfb439c7876e703e307864c9167a15', 'Ben', NULL),
(6, 'test@user.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL),
(7, 'admin@master.com', '21232f297a57a5a743894a0e4a801fc3', 'Benny', 'admin'),
(8, 'test@mail.com', '5d41402abc4b2a76b9719d911017c592', NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `forum_comments`
--
ALTER TABLE `forum_comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexen voor tabel `forum_threads`
--
ALTER TABLE `forum_threads`
 ADD PRIMARY KEY (`thread_id`);

--
-- Indexen voor tabel `temp_users`
--
ALTER TABLE `temp_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `forum_comments`
--
ALTER TABLE `forum_comments`
MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `forum_threads`
--
ALTER TABLE `forum_threads`
MODIFY `thread_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `temp_users`
--
ALTER TABLE `temp_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
