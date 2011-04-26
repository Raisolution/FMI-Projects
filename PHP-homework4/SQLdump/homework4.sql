-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2011 at 06:53 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homework4`
--

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE IF NOT EXISTS `men` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `haircolor` varchar(15) NOT NULL,
  `salary` int(11) NOT NULL,
  `owns` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`ID`, `fullname`, `username`, `password`, `height`, `haircolor`, `salary`, `owns`) VALUES
(18, 'Димитър Маджаров', 'raisolution', 'd8578edf8458ce06fbc5bb76a58c5ca4', 175, 'черен', 1500, 'a:1:{i:0;s:8:"кола";}'),
(19, 'Георги Георгиев', 'gogata', 'd8578edf8458ce06fbc5bb76a58c5ca4', 180, 'кафяв', 500, 'Нищо!'),
(20, 'Иван Иванов', 'ivanov', '4dfe6e220d16e7b633cfdd92bcc8050b', 173, 'рус', 750, 'a:1:{i:0;s:8:"вила";}'),
(22, 'Петър Петров', 'petrov', 'f396c3b74762b1fee69b10abb875139b', 180, 'черен', 800, 'a:2:{i:0;s:8:"кола";i:1;s:8:"вила";}'),
(24, 'Бойко Борисов', 'borisov', 'a8b3e30df42d90c5d6a44dc1ded72daa', 185, 'черен', 2500, 'a:3:{i:0;s:8:"кола";i:1;s:8:"вила";i:2;s:8:"яхта";}'),
(25, 'Димитър Бербатов', 'berbatov', '2469494efe06c11b7b794bff4d2f62f3', 185, 'черен', 85000, 'a:3:{i:0;s:8:"кола";i:1;s:8:"вила";i:2;s:8:"яхта";}'),
(26, 'Николай Николов', 'nikiphoto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 190, 'кафяв', 1000, 'a:1:{i:0;s:8:"кола";}');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE IF NOT EXISTS `women` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `haircolor` varchar(15) NOT NULL,
  `bust` int(11) NOT NULL,
  `legs` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`ID`, `fullname`, `username`, `password`, `height`, `haircolor`, `bust`, `legs`) VALUES
(4, 'Камелия', 'kamito', '366c1aa7264d33c4a321546a72bd271f', 170, 'рус', 95, 105),
(5, 'Анелия', 'anelia', '68d0872f56713cf1828ce974dc0b5513', 173, 'черен', 88, 95),
(6, 'Андреа', 'andrea', '1c42f9c1ca2f65441465b43cd9339d6c', 173, 'рус', 88, 100),
(7, 'Преслава', 'preslava', '846d6078cb5ce016ae0b54a276e7bddc', 165, 'черен', 95, 90),
(8, 'Мария', 'maria1', '95021724c3acfab92feecc6952189414', 160, 'кафяв', 85, 85),
(9, 'Емилия', 'emilia', 'aafcc615b67a5a2e360fdd7b390060ee', 166, 'рус', 90, 101);
