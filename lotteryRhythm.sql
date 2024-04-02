-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2023 at 09:32 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `firsthalfprocedure`$$
CREATE PROCEDURE `firsthalfprocedure` (`fromnum` INT, `tonum` INT)  BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i < max_rows DO
						INSERT INTO firsthalfticket (firsthalfticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END$$

DROP PROCEDURE IF EXISTS `fullprocedure`$$
CREATE PROCEDURE `fullprocedure` (`fromnum` INT, `tonum` INT)  BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO fullticket (fullticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END$$

DROP PROCEDURE IF EXISTS `singleprocedure`$$
CREATE  PROCEDURE `singleprocedure` (`fromnum` INT, `tonum` INT)  BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO singleticket (singleticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END$$

DROP PROCEDURE IF EXISTS `sprocedure`$$
CREATE  PROCEDURE `sprocedure` (`fromnum` INT, `tonum` INT)  BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO sticket (sticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addticket`
--

DROP TABLE IF EXISTS `addticket`;
CREATE TABLE IF NOT EXISTS `addticket` (
  `tickettype` varchar(100) DEFAULT NULL,
  `fromno` int(11) DEFAULT NULL,
  `tono` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addticket`
--

INSERT INTO `addticket` (`tickettype`, `fromno`, `tono`) VALUES
('SINGLE TICKETS', 11, 52);

-- --------------------------------------------------------

--
-- Table structure for table `firsthalfticket`
--

DROP TABLE IF EXISTS `firsthalfticket`;
CREATE TABLE IF NOT EXISTS `firsthalfticket` (
  `firsthalfticketno` int(11) NOT NULL,
  PRIMARY KEY (`firsthalfticketno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firsthalfticket`
--

INSERT INTO `firsthalfticket` (`firsthalfticketno`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Table structure for table `fullticket`
--

DROP TABLE IF EXISTS `fullticket`;
CREATE TABLE IF NOT EXISTS `fullticket` (
  `fullticketno` int(11) NOT NULL,
  PRIMARY KEY (`fullticketno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fullticket`
--

INSERT INTO `fullticket` (`fullticketno`) VALUES
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52);

-- --------------------------------------------------------

--
-- Table structure for table `singleticket`
--

DROP TABLE IF EXISTS `singleticket`;
CREATE TABLE IF NOT EXISTS `singleticket` (
  `singleticketno` int(11) NOT NULL,
  PRIMARY KEY (`singleticketno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singleticket`
--

INSERT INTO `singleticket` (`singleticketno`) VALUES
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52);

-- --------------------------------------------------------

--
-- Table structure for table `singleticketnew`
--

DROP TABLE IF EXISTS `singleticketnew`;
CREATE TABLE IF NOT EXISTS `singleticketnew` (
  `singleticketnonew` varchar(200) NOT NULL,
  PRIMARY KEY (`singleticketnonew`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singleticketnew`
--

INSERT INTO `singleticketnew` (`singleticketnonew`) VALUES
(''),
('AB12'),
('AB14'),
('AB16'),
('AB18'),
('AB20'),
('AB25'),
('AB30'),
('AB33'),
('AB38'),
('AB48'),
('AB50'),
('BC15'),
('BC17'),
('BC26'),
('BC27'),
('BC29'),
('BC34'),
('BC37'),
('BC39'),
('BC43'),
('BC47'),
('BC49'),
('BC51'),
('BC52'),
('CD11'),
('CD13'),
('CD19'),
('CD22'),
('CD32'),
('CD36'),
('CD40'),
('CD41'),
('CD42'),
('CD45'),
('CD46'),
('FG21'),
('FG23'),
('FG24'),
('FG28'),
('FG31'),
('FG35'),
('FG44');

-- --------------------------------------------------------

--
-- Table structure for table `sticket`
--

DROP TABLE IF EXISTS `sticket`;
CREATE TABLE IF NOT EXISTS `sticket` (
  `sticketno` int(11) NOT NULL,
  PRIMARY KEY (`sticketno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sticket`
--

INSERT INTO `sticket` (`sticketno`) VALUES
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20);

-- --------------------------------------------------------

--
-- Table structure for table `ticketbooking`
--

DROP TABLE IF EXISTS `ticketbooking`;
CREATE TABLE IF NOT EXISTS `ticketbooking` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticketdate` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `ticketcount` int(11) DEFAULT NULL,
  `ticketcode` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobilenumber` mediumtext COLLATE utf8_unicode_ci,
  `imagefile` longblob,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticketbooking`
--

INSERT INTO `ticketbooking` (`sno`, `fname`, `lname`, `ticketdate`, `amount`, `ticketcount`, `ticketcode`, `mobilenumber`, `imagefile`) VALUES
(1, 'PRAKASH', 'V', '2023-07-15', 480, 200, 'AB,CD,FG,BC', '8489941840', 0x34326637373539316661616234336565396162313434396332366539343337352e6a7067),
(2, 'PRAKASH', 'V', '2023-07-16', 480, 200, 'AB,CD,FG,BC', '08489941840', 0x38376539396332616531656634363730396163393136316139343663343432392e6a7067),
(3, 'PRAKASH', 'V', '2023-07-16', 480, 200, 'AB,CD,FG,BC', '8489941840', 0x34326637373539316661616234336565396162313434396332366539343337352e6a7067),
(4, 'PRAKASH', 'V', '2023-07-17', 5, 200, 'AB,CD,FG,BC', '8489941840', 0x38376539396332616531656634363730396163393136316139343663343432392e6a7067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
