-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 10:31 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appsophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `antwoord`
--

CREATE TABLE `antwoord` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `vraag_id` int(11) NOT NULL,
  `antwoordtekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antwoord`
--

INSERT INTO `antwoord` (`id`, `student_id`, `vraag_id`, `antwoordtekst`) VALUES
(1, 1, 1, 'abcdsgf'),
(2, 1, 2, 'hallo hoi allemaal'),
(3, 4, 2, 'pizza is lekker'),
(4, 6, 3, 'dsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `naam` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `naam`) VALUES
(1, 'piet'),
(2, 'fred'),
(3, 'stefan'),
(4, 'albert'),
(5, 'karin'),
(6, 'joris'),
(7, 'andes'),
(8, 'tony'),
(9, 'fred'),
(10, 'eduard'),
(11, 'gert'),
(12, 'pietje'),
(13, 'joost'),
(14, 'miechiel'),
(15, 'joris');

-- --------------------------------------------------------

--
-- Table structure for table `vraag`
--

CREATE TABLE `vraag` (
  `id` int(11) NOT NULL,
  `vraagtekst` text NOT NULL,
  `vraagcode` text NOT NULL,
  `publiceer_toelichting` int(11) NOT NULL,
  `vraagtoelichting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vraag`
--

INSERT INTO `vraag` (`id`, `vraagtekst`, `vraagcode`, `publiceer_toelichting`, `vraagtoelichting`) VALUES
(1, 'go', 'jo', 0, 'do'),
(2, 'asdfsadf', 'asdfasdf', 0, 'asdfsdaf'),
(3, 'wat is vijf', 'asfd', 0, 'asdf'),
(4, 'asdfsdaf', 'sdfsadf', 0, 'sdafsdaf'),
(5, 'a', 'b', 0, 'c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antwoord`
--
ALTER TABLE `antwoord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vraag`
--
ALTER TABLE `vraag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antwoord`
--
ALTER TABLE `antwoord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vraag`
--
ALTER TABLE `vraag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
