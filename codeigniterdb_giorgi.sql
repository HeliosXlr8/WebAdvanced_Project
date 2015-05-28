-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 01:07 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `description`, `location`) VALUES
(1, '2015-06-01 08:30:00', 'Begin examens', 'Deze event heeft niet veel beschrijving nodig, kijk gewoon naar de titel. Maar sindsdien dit toch als een voorbeeld dient, zal ik hier een ietwat langere tekst van maken om te zien hoe het eruit gaat zien op de Upcoming Events element.', 'PXL Hogeschool Hasselt'),
(2, '2015-05-22 12:00:00', 'Een event (leeg)', NULL, NULL),
(3, '2015-05-20 08:30:00', 'Random event', 'beschrijving van deze random event', 'Kapermolen'),
(4, '2015-06-17 13:30:00', 'Einde examens', 'Deze dag is het laatste examen', 'PXL Hogeschool Hasselt'),
(5, '2015-06-17 14:00:00', 'Begin feesten', 'Hopelijk vielen de examens genoeg mee om te kunnen feesten', 'Hasselt'),
(6, '2015-05-10 00:00:00', 'Randy''s verjaardag', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
  `comment_id` int(10) NOT NULL,
  `postedBy` varchar(50) NOT NULL,
  `comment` varchar(30000) NOT NULL,
  `thread_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`comment_id`, `postedBy`, `comment`, `thread_id`) VALUES
(1, 'faggot', 'IM A FAG', 3),
(2, 'faggot', 'IM A FAG, second comment :'')', 3),
(3, 'faggot', 'third comment :'')', 3),
(4, 'faggot', 'first ;D comment :'')', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE IF NOT EXISTS `forum_threads` (
  `thread_id` int(20) NOT NULL,
  `postedBy` varchar(24) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` varchar(30000) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_threads`
--

INSERT INTO `forum_threads` (`thread_id`, `postedBy`, `title`, `post`, `timestamp`) VALUES
(1, 'AdminMaurice', 'FAQ!', 'What is up guys! \r\n\r\nI''ve decided to post a FAQ on the forums. You can check it out below :)\r\n\r\nEnjoy!', '4/20/2069 13:37'),
(2, 'faggot', 'Thread testing', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren ''60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.', '5/24/2015 16:21'),
(3, 'faggot', 'second Thread.', 'Als u dit leest bent u homofiel :'')\r\nfeggit', '5/24/2015 16:22');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(60) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `nickname`) VALUES
(1, 'hello@welcome.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', NULL),
(2, 'test@user.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', NULL),
(3, 'thisuser@lol.com', 'cd0acfe085eeb0f874391fb9b8009bed', 'user', NULL),
(4, 'sanderfets@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', NULL),
(5, 'admin@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'admin', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
