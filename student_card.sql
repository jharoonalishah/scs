-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 07:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_on`) VALUES
(1, 'Computer Centre', '2016-02-18 08:51:09'),
(2, 'Economics', '2016-02-18 08:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(15) unsigned NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `department_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `emergency_no` varchar(10) NOT NULL,
  `blood_group` char(3) NOT NULL,
  `residence` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `gender`, `father_name`, `CNIC`, `department_id`, `semester`, `emergency_no`, `blood_group`, `residence`) VALUES
(1011513002, 'Afshan Nazir', 'f', 'Nazir', '6110196087840', 1, '2nd MBA', '', 'o-', 'Address'),
(1011513003, 'Shameer Javed', 'm', 'Javed', '3310265428545', 1, '2nd BBA', '', 'AB+', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `department_id`, `created_on`) VALUES
(1, 'administrator', 'admin', 1, '2016-02-19 06:07:51'),
(2, 'tester', 'tester', 2, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
