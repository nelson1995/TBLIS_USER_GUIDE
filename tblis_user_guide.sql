-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 09:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tblis_user_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `status` enum('Active','Archived') NOT NULL DEFAULT 'Active',
  `author` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `topic_id`, `subject`, `body`, `status`, `author`, `date_created`) VALUES
(2, 20, 'introduction222', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"background-color: #339966;\">An information system vvvvvvvvvvvvvvvvvvvvv</span></p>\r\n<p>&nbsp;</p>\r\n<p>gggggggggggggggggggg</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', 'Active', 'nelson', '2019-01-11'),
(20, 22, 'chapter 10', 'Some content here', 'Active', 'nelson', '0000-00-00'),
(21, 20, 'chapter11', 'Add content here !', 'Active', 'Wes', '2018-12-06'),
(23, 20, 'chapter12', 'content', 'Active', 'Peterson', '2018-12-06'),
(25, 32, 'chapter18', 'Add content here', 'Active', 'Asana', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` enum('Active','Archived') NOT NULL DEFAULT 'Active',
  `author` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name`, `status`, `author`, `date_created`) VALUES
(20, 'index16', 'Active', 'Nelson katale', '2018-12-05'),
(21, 'index17', 'Active', 'patrick katale', '0000-00-00'),
(22, 'index18', 'Active', 'susane katale', '0000-00-00'),
(32, 'topic12', 'Active', 'Henrietta', '2018-12-06'),
(33, 'topic14', 'Active', 'charles', '2018-12-06'),
(34, 'topic18', 'Active', 'lily', '2018-12-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
