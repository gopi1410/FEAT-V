-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 03:19 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vote`
--
CREATE DATABASE IF NOT EXISTS `vote` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vote`;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `votes1` int(10) DEFAULT '0',
  `votes2` int(10) NOT NULL DEFAULT '0',
  `votes3` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `Name`, `pic`, `post`, `votes1`, `votes2`, `votes3`) VALUES
(2, 'Abhimanyu Arora', 'abhimanyu.jpg', 'president', 0, 0, 0),
(3, 'Jitendra K. Katiyar', 'jitendra.jpg', 'president', 0, 0, 0),
(4, 'Abhishek Tyagi', 'Abhishek Tyagi.jpg', 'Senator, UG Y12', 0, 0, 0),
(5, 'Arjun Singh', 'arjun singh.jpg', 'Senator, UG Y12', 0, 0, 0),
(6, 'Ashwani Roy', 'ashwani roy.jpg', 'Senator, UG Y12', 0, 0, 0),
(7, 'Balendu Shekhar', 'anon.jpg', 'Senator, UG Y12', 0, 0, 0),
(8, 'Chahat Bajpai', 'chahat bajpai.jpg', 'Senator, UG Y12', 0, 0, 0),
(9, 'Pushapjeet Singh', 'anon.jpg', 'Senator, UG Y12', 0, 0, 0),
(10, 'Sabyasachi Verma', 'Sabyasachi Verma.JPG', 'Senator, UG Y12', 0, 0, 0),
(11, 'Saurabh Aggarwal', 'Saurabh Aggarwal.jpg', 'Senator, UG Y12', 0, 0, 0),
(12, 'Vishal Goyal', 'Vishal Goyal.jpg', 'Senator, UG Y12', 0, 0, 0),
(13, 'Abhijeet Swain', 'anon.jpg', 'Senator, PhD', 0, 0, 0),
(14, 'Amarjit P. Kene', 'Amarjit.jpg', 'Senator, PhD', 0, 0, 0),
(15, 'Anand Prakash Dwivedi', 'Anand Prakash.jpg', 'Senator, PhD', 0, 0, 0),
(16, 'Arun Karthik B', 'anon.jpg', 'Senator, PhD', 0, 0, 0),
(17, 'Gopal Sharain Parashari', 'gopal.jpg', 'Senator, PhD', 0, 0, 0),
(18, 'Vipin Kumar Jain', 'Vipin.jpg', 'Senator, PhD', 0, 0, 0),
(20, 'Chirag Agrawal', 'chirag.jpg', 'sports', 0, 0, 0),
(21, 'Bipin Kumar Gupta', 'bipin.jpg', 'cultural', 0, 0, 0),
(22, 'Kshitij Agarwal', 'kshitij.jpg', 'cultural', 0, 0, 0),
(23, 'Shalin Mandowara', 'shalin.jpg', 'cultural', 0, 0, 0),
(24, 'Shivendu Bhushan', 'shivendu.jpg', 'scitech', 0, 0, 0),
(25, 'Chetan Kumar Garg', 'chetan.jpg', 'fmc', 0, 0, 0),
(26, 'Rohit Choudhary', 'rohit.jpg', 'fmc', 0, 0, 0),
(33, 'Arpan Agrawal', 'Arpan Agrawal.jpg', 'Senator, UG Y13', 0, 0, 0),
(34, 'Ashutosh Ranka', 'Ashutosh Ranka.jpg', 'Senator, UG Y13', 0, 0, 0),
(35, 'Harpreet Singh', 'Harpreet Singh.jpg', 'Senator, UG Y13', 0, 0, 0),
(36, 'Karandeep Sharma', 'Karandeep Sharma.jpg', 'Senator, UG Y13', 0, 0, 0),
(37, 'Kush Gupta', 'Kush Gupta.jpg', 'Senator, UG Y13', 0, 0, 0),
(38, 'Manikanta Reddy D', 'Manikanta Reddy D.jpg', 'Senator, UG Y13', 0, 0, 0),
(39, 'Rishabh Jain', 'Rishabh Jain.jpg', 'Senator, UG Y13', 0, 0, 0),
(40, 'Ritika Mulugalaralli', 'Ritika.jpg', 'Senator, UG Y13', 0, 0, 0),
(41, 'Samyak Jain', 'Samyak Jain.jpg', 'Senator, UG Y13', 0, 0, 0),
(42, 'Vibhor Verma', 'Vibhor Verma.jpg', 'Senator, UG Y13', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cultural`
--

CREATE TABLE IF NOT EXISTS `cultural` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `candidates` text NOT NULL,
  `votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cultural`
--

INSERT INTO `cultural` (`id`, `candidates`, `votes`) VALUES
(1, '1st Bipin Kumar Gupta; 2nd Kshitij Agarwal', 0),
(2, '1st Bipin Kumar Gupta; 2nd Shalin Mandowara', 0),
(3, '1st Kshitij Agarwal; 2nd Bipin Kumar Gupta', 0),
(4, '1st Kshitij Agarwal; 2nd Shalin Mandowara', 0),
(5, '1st Shalin Mandowara; 2nd Bipin Kumar Gupta', 0),
(6, '1st Shalin Mandowara; 2nd Kshitij Agarwal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fmc`
--

CREATE TABLE IF NOT EXISTS `fmc` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `candidates` text NOT NULL,
  `votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fmc`
--

INSERT INTO `fmc` (`id`, `candidates`, `votes`) VALUES
(1, 'Chetan Kumar Garg', 0),
(2, 'Rohit Choudhary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nopref`
--

CREATE TABLE IF NOT EXISTS `nopref` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post` varchar(100) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `nopref`
--

INSERT INTO `nopref` (`id`, `post`, `votes`) VALUES
(1, 'president', 0),
(2, 'sports', 0),
(3, 'cultural', 0),
(4, 'scitech', 0),
(5, 'fmc', 0),
(6, 'Senator, UG Y12', 0),
(7, 'Senator, UG Y13', 0),
(8, 'Senator, PhD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `president`
--

CREATE TABLE IF NOT EXISTS `president` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `candidates` text NOT NULL,
  `votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `president`
--

INSERT INTO `president` (`id`, `candidates`, `votes`) VALUES
(1, 'Abhimanyu Arora', 0),
(2, 'Jitendra K. Katiyar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scitech`
--

CREATE TABLE IF NOT EXISTS `scitech` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `candidates` text NOT NULL,
  `votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `scitech`
--

INSERT INTO `scitech` (`id`, `candidates`, `votes`) VALUES
(1, 'Shivendu Bhushan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `candidates` text NOT NULL,
  `votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `candidates`, `votes`) VALUES
(1, 'Chirag Agrawal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `votecount` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `votecount` (`votecount`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`votecount`) VALUES
(0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
