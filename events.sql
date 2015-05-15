-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 11:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` varchar(4095) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `description`, `location`) VALUES
(1, '2015-06-01 08:30:00', 'Begin examens', 'deze event heeft niet veel beschrijving nodig, kijk gewoon naar de titel', 'PXL Hogeschool Hasselt'),
(2, '2015-05-22 12:00:00', 'Een event (leeg)', NULL, NULL),
(3, '2015-05-20 08:30:00', 'Random event', 'beschrijving van deze random event', 'locatie van deze random event'),
(4, '2015-06-17 13:30:00', 'Einde examens', 'Deze dag is het laatste examen', 'PXL Hogeschool Hasselt'),
(5, '2015-06-17 14:00:00', 'Begin feesten', 'Hopelijk vielen de examens genoeg mee om te kunnen feesten', 'Maakt niet uit'),
(6, '2015-05-10 00:00:00', 'Randy''s verjaardag', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
