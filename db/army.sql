-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 01:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `army`
--

-- --------------------------------------------------------

--
-- Table structure for table `army_admin`
--

CREATE TABLE `army_admin` (
  `admin_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_admin`
--

INSERT INTO `army_admin` (`admin_id`, `army_user_id`, `rank`, `company`, `afpsn`, `date_created`, `time_created`) VALUES
(1, 16, 'None', 'None', '', '2023-02-14', '04:22:43.000000'),
(2, 21, 'Rank 1', 'Company 1', '20-sldkfasl;dkjf-sdkfj', '2023-02-14', '04:57:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `army_commander`
--

CREATE TABLE `army_commander` (
  `admin_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_commander`
--

INSERT INTO `army_commander` (`admin_id`, `army_user_id`, `rank`, `company`, `afpsn`, `date_created`, `time_created`) VALUES
(1, 19, 'Rank 1', 'Company 1', 'sdf-sdfjasdf-sdf', '2023-02-14', '04:40:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `army_sc`
--

CREATE TABLE `army_sc` (
  `admin_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_sc`
--

INSERT INTO `army_sc` (`admin_id`, `army_user_id`, `rank`, `date_created`, `time_created`) VALUES
(2, 22, 'None', '2023-02-14', '04:58:39.000000'),
(3, 23, 'None', '2023-02-14', '04:59:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `army_staff`
--

CREATE TABLE `army_staff` (
  `admin_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_staff`
--

INSERT INTO `army_staff` (`admin_id`, `army_user_id`, `rank`, `company`, `afpsn`, `date_created`, `time_created`) VALUES
(1, 17, 'Rank 2', 'Company 2', 'slkdjf-staffsjdf', '2023-02-14', '04:30:26.000000'),
(2, 18, 'Rank 2', 'Company 2', 'sdfsdgsdgfd', '2023-02-14', '04:35:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `army_users`
--

CREATE TABLE `army_users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `date_modified` date DEFAULT NULL,
  `time_modified` time(6) NOT NULL,
  `reg_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_users`
--

INSERT INTO `army_users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `status`, `user_status`, `date_modified`, `time_modified`, `reg_user`) VALUES
(1, 'Rodelio', 'Domingo', 'gwapo', 'rodel@sample.com', 'admin', 'admin', 'standby', 'active', NULL, '00:00:00.000000', 0),
(2, 'Sample', 'Sample', '', 'sample2@sample.com', 'sample', 'lvl2', 'standby', 'active', NULL, '00:00:00.000000', 0),
(3, 'Sample', 'Sample', '', 'sample3@sample.com', 'sample', 'lvl3', 'standby', 'active', NULL, '00:00:00.000000', 0),
(4, 'Sample', 'Sample', '', 'sample4@sample.com', 'sample', 'lvl4', 'standby', 'active', '2022-12-22', '00:00:00.000000', 0),
(15, 'Rodelio', 'Domingo', 'reservist', 'reservist@sample.com', 'sample', 'reservist', 'standby', 'active', '2023-02-14', '11:39:59.000000', 12),
(17, 'Admin', 'Staff', 'username', 'staff@sample.com', 'sample', 'staff', 'standby', 'active', '2023-02-14', '04:30:26.000000', 7),
(18, 'Admin', 'Staff', 'staff', '', 'sample', 'staff', 'standby', 'active', '2023-02-14', '04:35:45.000000', 8),
(19, 'Company', 'Commander', 'commander', 'commander@sample.com', 'sample', 'commander', 'standby', 'active', '2023-02-14', '04:40:34.000000', 11),
(21, 'Company', 'Uno', 'username', 'company@sample.com', 'sample', 'admin', 'standby', 'active', '2023-02-14', '04:57:00.000000', 5),
(22, 'Rodelio', 'Domingo', 'rodel_coordinator', 'rodeliobdomingojr@gmail.com', 'sample', 'school_coordinator', 'standby', 'active', '2023-02-14', '04:58:39.000000', 1),
(23, 'school', 'second', 'second_school', 'second@sample.com', 'sample', 'school_coordinator', 'standby', 'active', '2023-02-14', '04:59:09.000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registration_sc`
--

CREATE TABLE `registration_sc` (
  `sc_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_user`
--

CREATE TABLE `registration_user` (
  `reg_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservists`
--

CREATE TABLE `reservists` (
  `reservist_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservists`
--

INSERT INTO `reservists` (`reservist_id`, `army_user_id`, `rank`, `company`, `afpsn`, `date_created`, `time_created`) VALUES
(4, 15, 'Rank 1', 'Company 1', 'kljsdf-sdfsadfsadf-sdf', '2023-02-14', '11:39:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(100) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL,
  `uploader` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `acronym`, `description`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`, `uploader`) VALUES
(1, 'Central Luzon State University', 'CLSU', 'My College Now Today', 'archive', '2023-02-15', '07:01:56.000000', '2023-02-15', '08:40:53.000000', 'gwapo'),
(2, 'Nueva Ecija University of Santo Tomas', 'NEUST', 'Their College', 'inactive', '2023-02-15', '08:41:58.000000', '2023-02-15', '08:41:58.000000', 'gwapo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `army_admin`
--
ALTER TABLE `army_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `army_commander`
--
ALTER TABLE `army_commander`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `army_sc`
--
ALTER TABLE `army_sc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `army_staff`
--
ALTER TABLE `army_staff`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `army_users`
--
ALTER TABLE `army_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_sc`
--
ALTER TABLE `registration_sc`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `registration_user`
--
ALTER TABLE `registration_user`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `reservists`
--
ALTER TABLE `reservists`
  ADD PRIMARY KEY (`reservist_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `army_admin`
--
ALTER TABLE `army_admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `army_commander`
--
ALTER TABLE `army_commander`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `army_sc`
--
ALTER TABLE `army_sc`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `army_staff`
--
ALTER TABLE `army_staff`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `army_users`
--
ALTER TABLE `army_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registration_sc`
--
ALTER TABLE `registration_sc`
  MODIFY `sc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_user`
--
ALTER TABLE `registration_user`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservists`
--
ALTER TABLE `reservists`
  MODIFY `reservist_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
