-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 06:16 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `sn` int(10) NOT NULL,
  `text` text NOT NULL,
  `activityTime` varchar(30) NOT NULL,
  `triggeredBy` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`sn`, `text`, `activityTime`, `triggeredBy`) VALUES
(1, 'Team Information Technology created ', '30/11/16 10:11:06', 1),
(2, ' Team deleted', '30/11/16 10:11:30', 1),
(3, 'Team Information Technology created ', '30/11/16 10:11:21', 1),
(4, 'Information Technology Team deleted', '30/11/16 10:11:51', 1),
(5, 'Team Human Resources created ', '30/11/16 10:11:52', 1),
(6, 'Human Resources Team deleted', '30/11/16 10:11:55', 1),
(7, 'Team Information Technology created ', '30/11/16 10:11:38', 1),
(8, 'Team Human Resources created ', '30/11/16 10:11:51', 1),
(9, 'Information Technology Team deleted', '30/11/16 10:11:08', 1),
(10, 'Human Resources Team deleted', '30/11/16 10:11:26', 1),
(11, 'Team Human Resources created ', '30/11/16 10:11:50', 1),
(12, 'Team Information Technology created ', '30/11/16 10:11:56', 1),
(13, 'Board ola created ', '30/11/16 11:11:29', 1),
(14, 'Board  created ', '30/11/16 01:11:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_board`
--

CREATE TABLE `tbl_board` (
  `sn` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `addedAt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_board`
--

INSERT INTO `tbl_board` (`sn`, `name`, `addedAt`) VALUES
(1, 'ola', '30/11/16 11:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list`
--

CREATE TABLE `tbl_list` (
  `sn` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `board_id` varchar(255) NOT NULL,
  `team` varchar(100) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `addedAt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_list`
--

INSERT INTO `tbl_list` (`sn`, `title`, `board_id`, `team`, `scope`, `addedAt`) VALUES
(1, 'testing', 'ola', 'Information Technology', '1', '30/11/16 02:11:31'),
(2, 'testlist', 'ola', 'Information Technology', '1', '30/11/16 02:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `sn` int(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`sn`, `name`) VALUES
(1, 'Creator'),
(2, 'Non-Creator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` int(10) NOT NULL COMMENT '1- Private, 2-Public',
  `date_added` varchar(25) NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teams`
--

INSERT INTO `tbl_teams` (`sn`, `name`, `description`, `type`, `date_added`, `created_by`) VALUES
(4, 'Information Technology', 'IT', 1, '30/11/16 10:11:56', 1),
(3, 'Human Resources', 'hr', 1, '30/11/16 10:11:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `sn` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date_Registered` varchar(20) NOT NULL,
  `Login_Status` int(5) NOT NULL,
  `Last_Login` varchar(255) DEFAULT NULL,
  `User_Status` int(5) NOT NULL,
  `User_IP_Address` varchar(20) NOT NULL,
  `hash` text NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`sn`, `Fullname`, `Email`, `Password`, `Date_Registered`, `Login_Status`, `Last_Login`, `User_Status`, `User_IP_Address`, `hash`, `role`) VALUES
(1, 'olaoluwa oyebamiji', 'laoluoyebamiji@gmail.com', '85c8c4bcd9bc117c9233bd8e5d3a4e89', '28/11/16 07:11:51', 1, '30/11/16 02:25', 1, 'localhost', '8d5e957f297893487bd98fa830fa6413', 1),
(2, 'oye', 'laoye815@gmail.com', '85c8c4bcd9bc117c9233bd8e5d3a4e89', '28/11/16 08:11:46', 0, '28/11/16 08:11:46', 0, 'localhost', '3295c76acbf4caaed33c36b1b5fc2cb1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_board`
--
ALTER TABLE `tbl_board`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_list`
--
ALTER TABLE `tbl_list`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_board`
--
ALTER TABLE `tbl_board`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_list`
--
ALTER TABLE `tbl_list`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
