-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 07:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eposting`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginaccounts`
--

CREATE TABLE `loginaccounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginaccounts`
--

INSERT INTO `loginaccounts` (`id`, `fullname`, `username`, `userpass`) VALUES
(1, 'Elmer B. Gonzaga', 'elmer@eposting.com', '123'),
(2, 'Daphnie A. Tubilan', 'daph@eposting.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `poseremail` varchar(100) NOT NULL,
  `ptitle` varchar(100) NOT NULL,
  `pcontent` text NOT NULL,
  `ptimedone` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `poseremail`, `ptitle`, `pcontent`, `ptimedone`) VALUES
(6, 'elmer@eposting.com', 'Hi Batch 2019 BSIT!', 'Hi guys! I hope this will help you on the skills test; that you will study and learn from this simple PHP programming codes I made for you.', '2019-03-17 23:03:11'),
(8, 'daph@eposting.com', 'Hi Batch 2019 BSIT!', 'Congratulations in advance ninyo guys, I hope makatabang ug gamiton ni ninyo ang gbuhat sakong domdom.', '2019-03-17 23:20:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginaccounts`
--
ALTER TABLE `loginaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginaccounts`
--
ALTER TABLE `loginaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
