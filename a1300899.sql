-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 08:05 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a1300899`
--

-- --------------------------------------------------------

--
-- Table structure for table `spotting`
--

CREATE TABLE IF NOT EXISTS `spotting` (
`spotting_id` int(10) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `whereItHappend` varchar(50) NOT NULL,
  `specialCharacteristics` varchar(100) DEFAULT NULL,
  `role` varchar(6) NOT NULL,
  `language` varchar(20) DEFAULT NULL,
  `whatHappend` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spotting`
--

INSERT INTO `spotting` (`spotting_id`, `name`, `whereItHappend`, `specialCharacteristics`, `role`, `language`, `whatHappend`) VALUES
(6, 'Alexssshh', 'North of Elektrozavodsk', 'Red pants, gas mask', 'bandit', 'English', 'Sneaking up on people and robbing them with axe.'),
(7, 'Rick', 'Middle of Chernogorsk', 'Sheriff hat, revolver, beard', 'hero', 'English', 'Saved me from walkers'),
(8, '', 'Solnichniy', 'Sniper rifle', 'hero', '', 'Protecting town from a safe distance'),
(9, '', 'Berezino', 'Silenced weapon', 'hero', '', 'No idea, heard silenced shots and died.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spotting`
--
ALTER TABLE `spotting`
 ADD PRIMARY KEY (`spotting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spotting`
--
ALTER TABLE `spotting`
MODIFY `spotting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
