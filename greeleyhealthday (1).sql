-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2015 at 03:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `greeleyhealthday`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpassword`
--

CREATE TABLE IF NOT EXISTS `adminpassword` (
  `number` int(11) NOT NULL COMMENT 'This exists entirely to make my life simpler',
  `current_password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminpassword`
--

INSERT INTO `adminpassword` (`number`, `current_password`) VALUES
(1, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `asdf`
--

CREATE TABLE IF NOT EXISTS `asdf` (
  `student` int(11) NOT NULL,
  `student_number` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asdfasdf`
--

CREATE TABLE IF NOT EXISTS `asdfasdf` (
  `student` int(11) NOT NULL,
  `student_number` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `class_number` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `parent_creator` varchar(30) NOT NULL,
  `student_cap` int(200) NOT NULL,
  `time` varchar(40) NOT NULL,
  PRIMARY KEY (`class_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is the master list of class, NOT the class roster' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_number`, `name`, `description`, `image_url`, `parent_creator`, `student_cap`, `time`) VALUES
(4, 'asdf', 'asdf', '', 'asdf', 1, ''),
(5, 'Class Title!', 'This is my description! It is long!This is my description! It is long!', 'http://www.jpl.nasa.gov/spaceimages/images/mediumsize/PIA17011_ip.jpg', 'Scharf', 5, '2:00'),
(7, 'asdfasdf', 'asdfsdf', 'asdfsdf', 'asdfadsf', 1, 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `student` int(11) NOT NULL,
  `student_number` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_id_base`
--

CREATE TABLE IF NOT EXISTS `student_id_base` (
  `class` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_id_list`
--

CREATE TABLE IF NOT EXISTS `student_id_list` (
  `student_id` int(11) NOT NULL,
  `person` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`person`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `student_id_list`
--

INSERT INTO `student_id_list` (`student_id`, `person`) VALUES
(1234, 9),
(1234, 10),
(1234, 11),
(1234, 12),
(1234, 13),
(1234, 14),
(1234, 15),
(1234, 16),
(1234, 17),
(1234, 18),
(1234, 19),
(1234, 20),
(1234, 21),
(1234, 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
