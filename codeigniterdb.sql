-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 16 mei 2015 om 20:11
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
-- Tabelstructuur voor tabel `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'hello@welcome.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'test@user.com', '1a1dc91c907325c69271ddf0c944bc72'),
(3, 'thisuser@lol.com', 'cd0acfe085eeb0f874391fb9b8009bed'),
(4, 'sanderfets@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT voor een tabel `temp_users`
--
ALTER TABLE `temp_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
