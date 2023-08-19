-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 05:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE IF NOT EXISTS `nominees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `year` varchar(3) NOT NULL,
  `stud_id` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `org`, `pos`, `name`, `course`, `year`, `stud_id`) VALUES
(1, 'TASIJA', 'President', 'AA, AA', 'BSIT', 'IV', '11-11111'),
(2, 'TASIJA', 'President', 'BB, BB.', 'BEE', 'III', '11-22222'),
(3, 'TASIJA', 'Vice-President', 'CC, CC', 'BSE', 'II', '11-33333'),
(4, 'TASIJA', 'Vice-President', 'Cruz, Juan D.', 'BSF', 'III', '11-44444'),
(5, 'TASIJA', 'Secretary', 'DD, DD.', 'COE', 'III', '11-55555'),
(6, 'TASIJA', 'Secretary', 'EE, EE.', 'BEE', 'II', '11-66666');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org`) VALUES
(1, 'TASIJA');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `org`, `pos`) VALUES
(1, 'TASIJA', 'President'),
(2, 'TASIJA', 'Vice-President'),
(3, 'TASIJA', 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `year` varchar(2) NOT NULL,
  `stud_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `course`, `year`, `stud_id`) VALUES
(1, 'ABCD', 'EFG','BCA', 'IV', '1200000'),
(2, 'HIJ, KLM', 'MCA', 'II', '11900000');


-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `org`, `pos`, `candidate_id`, `voters_id`) VALUES
(1, 'TASIJA', 'President', 1, 1),
(2, 'TASIJA', 'Vice-President', 4, 1),
(3, 'TASIJA', 'Secretary', 5, 1),
(4, 'TASIJA', 'President', 1, 2),
(5, 'TASIJA', 'Vice-President', 3, 2),
(6, 'TASIJA', 'Secretary', 5, 2),
(7, 'TASIJA', 'President', 1, 3),
(8, 'TASIJA', 'Vice-President', 3, 3),
(9, 'TASIJA', 'Secretary', 5, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
