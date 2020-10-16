-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 06:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` char(10) NOT NULL,
  `g_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`id`, `email`, `otp`, `g_date`) VALUES
(4, 'Nitin.sinha9178@gmail.com', '93445', '2020-10-12 13:16:17'),
(5, 'Nitin.sinha9178@gmail.com', '32486', '2020-10-12 13:18:09'),
(6, 'Nitin.sinha9178@gmail.com', '39815', '2020-10-12 13:24:07'),
(7, 'Nitin.sinha9178@gmail.com', '60920', '2020-10-12 13:26:00'),
(8, 'Nitin.sinha9178@gmail.com', '77183', '2020-10-12 13:29:00'),
(9, 'Nitin.sinha9178@gmail.com', '73759', '2020-10-12 13:30:48'),
(10, 'Nitin.sinha9178@gmail.com', '17979', '2020-10-12 13:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `User_Id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `contact` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `otp` char(10) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`User_Id`, `Fullname`, `contact`, `email`, `pass`, `otp`, `reg_date`) VALUES
(8, 'Nitin Sinha', '9123456789', 'Nitin.sinha9178@gmail.com', '$2y$10$gGGvquAkYDPFmzUF6xNSVO/B/42kG.fCwjRbQJIzfJm./HgFQ1zsK', '34328', '2020-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_mail`, `login_time`, `logout_time`) VALUES
(13, 'Nitin.sinha9178@gmail.com', '0000-00-00 00:00:00', '0000-00-00'),
(14, 'Nitin.sinha9178@gmail.com', '0000-00-00 00:00:00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
