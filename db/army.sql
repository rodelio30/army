-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 02:57 PM
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
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `img`, `title`, `description`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, '', 'First Title', 'First Description 2', 'active', '2023-02-21', '09:24:17.000000', '2023-02-27', '11:29:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ann_descrip`
--

CREATE TABLE `ann_descrip` (
  `ad_id` int(250) NOT NULL,
  `announce_id` int(250) NOT NULL,
  `description` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aor`
--

CREATE TABLE `aor` (
  `aor_id` int(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aor`
--

INSERT INTO `aor` (`aor_id`, `company_name`, `place`, `status`) VALUES
(1, 'Headquarter', 'Palayan CIty', 'active'),
(2, 'Headquarter', 'Cabanatuan City', 'active'),
(3, 'Alpha', 'Gapan City', 'active'),
(4, 'Bravo', 'Science City of Muñoz', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ap_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `number` varchar(20) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_appoint` date NOT NULL,
  `time_appoint` time(6) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ap_id`, `name`, `email`, `number`, `purpose`, `text`, `status`, `date_appoint`, `time_appoint`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'Rodelio Domingo', 'rodel@gmail.com', '927-3756-299', 'Meeting With General', 'General Meeting', 'approved', '2023-02-28', '14:30:00.000000', '2023-02-27', '11:28:35.000000', '2023-02-27', '04:48:56.000000'),
(2, 'Sample Name', 'sample@emials.com', '927-3756-299', '', '', 'pending', '0000-00-00', '00:00:00.000000', '2023-02-27', '12:13:43.000000', '2023-02-27', '03:38:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `army_users`
--

CREATE TABLE `army_users` (
  `id` int(255) NOT NULL,
  `user_img` varchar(250) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `school_address` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `date_created` date DEFAULT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date DEFAULT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `army_users`
--

INSERT INTO `army_users` (`id`, `user_img`, `firstname`, `middle_name`, `lastname`, `username`, `email`, `password`, `type`, `rank`, `company`, `afpsn`, `school_name`, `school_address`, `status`, `user_status`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'download (2).jpg', 'Rodelio', '', 'Domingo', 'gwapo', 'rodel@sample.com', 'admin', 'sadmin', 'Private', 'Charlie', 'sladkjf=234234saefq3245325w', '', '', 'standby', 'active', '2023-02-17', '03:32:22.000000', '2023-02-17', '06:51:07.000000'),
(3, 'download (1).jpg', 'Sample', '', 'Sample', 'lvl3', 'sample3@sample.com', 'sample', 'reservist', 'none', 'Alpha', '', '', '', 'standby', 'active', NULL, '00:00:00.000000', '2023-02-21', '04:40:47.000000'),
(4, 'download (1).jpg', 'Sample', '', 'Sample', 'lvl4 comsldkfj', 'sample4@sample.com', 'sample', 'commander', 'First Lieutenant', 'none', '', '', '', 'standby', 'active', NULL, '00:00:00.000000', '2023-02-21', '11:43:23.000000'),
(15, 'download (1).jpg', 'Rodelio', 'B', 'Domingo', 'reservist', 'reservist@sample.com', 'sample', 'reservist', 'Major', '', '', '', '', 'retired', 'active', NULL, '00:00:00.000000', '2023-02-20', '04:23:20.000000'),
(24, 'ava3.webp', 'Sample', '', 'Testing', 'testschool', 'testschool@sample.com', 'sample', 'school_coordinator', '', 'none', '', 'NEUST', '', 'standby', 'active', NULL, '00:00:00.000000', '2023-02-28', '01:05:21.000000'),
(25, '', 'Private', '', 'Domingo', 'prinon', 'prinon@sample.com', 'sample', 'reservist', 'Private', '', '', '', '', 'standby', 'active', NULL, '00:00:00.000000', '2023-02-27', '08:37:55.000000'),
(26, 'download (1).jpg', 'Captain', '', 'Bravo', 'capbra', 'capbra@sample.com', 'sample', 'staff', 'none', 'none', '', '', '', 'ready', 'active', NULL, '00:00:00.000000', '2023-02-17', '07:55:15.000000'),
(27, 'smile.png', 'Colonel', '', 'Domingo', 'coldom', 'coldom@sample.com', 'sample', 'admin', 'Private', 'Alpha', '', '', '', 'standby', 'active', NULL, '00:00:00.000000', '2023-02-17', '07:11:44.000000'),
(28, 'istockphoto-1338134336-170667a.jpg', 'Commander', '', 'Alpha', 'comaplh', 'comaplh@sample.com', 'sample', 'commander', 'Command Sergeant Major', 'Alpha', 'dfsdf-sdflkjsdf-dfl;kjdf', '', '', 'standby', 'active', '2023-02-17', '04:49:15.000000', '2023-02-17', '04:49:15.000000'),
(30, 'download (4).jpg', 'Staff', '', 'Sirjint', 'ssalp', 'ssalp@sample.com', 'sample', 'admin', 'Staff Sergeant', 'Alpha', 'sdfsadf-sdfsdf-', '', '', 'standby', 'active', '2023-02-17', '04:51:17.000000', '2023-02-17', '04:51:17.000000'),
(31, '', 'staff', '', 'huhu', 'staffuhhu', 'staffhuhu@sample.com', 'sample', 'staff', 'none', 'none', '', '', '', 'standby', 'active', '2023-02-17', '04:53:47.000000', '2023-02-17', '04:53:47.000000'),
(32, '', 'Cab', '', 'coordinator', 'cabcoo', 'cabcoo@gmail.com', 'sample', 'school_coordinator', 'None', 'none', '', 'CLSU', 'Cab NE', 'standby', 'active', '2023-02-17', '04:58:50.000000', '2023-02-28', '02:59:46.000000'),
(33, '', 'Pri', '', 'Admin', 'priadmin', 'priadmin@sample.com', 'samplle', 'admin', 'Private', 'Headquarter', 'sdfasdfwtt4sdfgedfg', '', '', 'standby', 'active', '2023-02-17', '06:50:32.000000', '2023-02-17', '06:50:32.000000'),
(34, '', 'sdfasdfas', '', 'sadfsadfsd', 'sdsdseef', 'sdfsdfo@sjldhfosadf.iodsjfg', 'sample', 'staff', 'Private First Class', 'Alpha', 'sdfasdf', '', '', 'ready', 'active', '2023-02-26', '02:58:18.000000', '2023-02-26', '02:58:18.000000'),
(35, '', 'sadfsadf', '', 'sadfsadf', 'sadfsdf', 'sdf@saldkjf.com', 'sample', 'admin', 'Private First Class', 'Headquarter', 'sadfsadf', '', '', 'standby', 'active', '2023-02-27', '03:45:26.000000', '2023-02-27', '03:45:26.000000');

-- --------------------------------------------------------

--
-- Table structure for table `below_info`
--

CREATE TABLE `below_info` (
  `bi_id` int(250) NOT NULL,
  `reservist_id` int(250) NOT NULL,
  `rank` varchar(250) NOT NULL,
  `date_of_rank` date NOT NULL,
  `rank_authority` varchar(250) NOT NULL,
  `military_schooling` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `school_date_graduated` date NOT NULL,
  `awards` varchar(250) NOT NULL,
  `awards_authority` varchar(250) NOT NULL,
  `date_awarded` date NOT NULL,
  `relation` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `course` varchar(100) NOT NULL,
  `course_school` varchar(250) NOT NULL,
  `course_date_graduated` date NOT NULL,
  `unit_cad` varchar(250) NOT NULL,
  `unit_authority` varchar(250) NOT NULL,
  `unit_date_started` date NOT NULL,
  `unit_date_end` date NOT NULL,
  `unit_assignment` varchar(100) NOT NULL,
  `assign_authority` varchar(250) NOT NULL,
  `assign_date_from` date NOT NULL,
  `assign_date_to` date NOT NULL,
  `position` varchar(100) NOT NULL,
  `pos_authority` varchar(350) NOT NULL,
  `pos_date_from` date NOT NULL,
  `pos_date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `below_info`
--

INSERT INTO `below_info` (`bi_id`, `reservist_id`, `rank`, `date_of_rank`, `rank_authority`, `military_schooling`, `school`, `school_date_graduated`, `awards`, `awards_authority`, `date_awarded`, `relation`, `name`, `course`, `course_school`, `course_date_graduated`, `unit_cad`, `unit_authority`, `unit_date_started`, `unit_date_end`, `unit_assignment`, `assign_authority`, `assign_date_from`, `assign_date_to`, `position`, `pos_authority`, `pos_date_from`, `pos_date_to`) VALUES
(1, 15, 'Major', '0000-00-00', '', '', '', '2023-02-16', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(2, 25, 'Private', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(3, 3, 'none', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(100) NOT NULL,
  `rank_letter` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL,
  `uploader` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `rank_letter`, `company_name`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`, `uploader`) VALUES
(1, 'A', 'Headquarter', 'active', '2023-02-16', '10:26:46.000000', '2023-02-16', '10:31:54.000000', 'gwapo'),
(2, 'B', 'Alpha', 'active', '2023-02-16', '10:27:29.000000', '2023-02-16', '10:34:56.000000', 'gwapo'),
(3, 'C', 'Bravo', 'active', '2023-02-16', '10:27:40.000000', '2023-02-17', '09:18:40.000000', 'gwapo'),
(4, 'D', 'Charlie', 'active', '2023-02-16', '10:27:53.000000', '2023-02-17', '11:26:55.000000', 'gwapo');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(250) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `student_count` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `status`, `student_count`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'Rodel Tutorial', 'This broom broom', 'inactive', 2, '2023-02-20', '09:42:13.000000', '2023-02-21', '10:35:37.000000'),
(2, 'Second Tutorial', 'My Own Tutorial', 'active', 2, '2023-02-21', '09:18:07.000000', '2023-02-21', '02:56:46.000000');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `pi_id` int(250) NOT NULL,
  `reservist_id` int(250) NOT NULL,
  `p_o` varchar(250) NOT NULL,
  `company_name_address` varchar(250) NOT NULL,
  `tel_no` int(250) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `town` varchar(250) NOT NULL,
  `res_tel_no` varchar(250) NOT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(250) NOT NULL,
  `age` int(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `tin` varchar(30) NOT NULL,
  `sss` varchar(30) NOT NULL,
  `philhealth` varchar(30) NOT NULL,
  `height` int(40) NOT NULL,
  `weight` int(40) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `fb_account` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `special_skills` varchar(250) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`pi_id`, `reservist_id`, `p_o`, `company_name_address`, `tel_no`, `home_address`, `town`, `res_tel_no`, `mobile_number`, `birth_date`, `birth_place`, `age`, `religion`, `blood_type`, `tin`, `sss`, `philhealth`, `height`, `weight`, `marital_status`, `sex`, `fb_account`, `email`, `special_skills`, `language`) VALUES
(1, 15, 'Research Assistant', '', 0, '', '', '', '', '0000-00-00', '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '', ''),
(2, 25, '', '', 0, '', '', '', '', '1997-12-30', '', 25, '', '', '', '', '', 0, 0, '', '', '', '', '', ''),
(3, 3, '', '', 0, '', '', '', '', '0000-00-00', '', 20, '', '', '', '', '', 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(100) NOT NULL,
  `ranked` int(100) NOT NULL,
  `rank_name` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL,
  `uploader` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `ranked`, `rank_name`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`, `uploader`) VALUES
(1, 1, 'Private', 'active', '2023-02-16', '09:53:18.000000', '2023-02-16', '10:07:14.000000', 'gwapo'),
(2, 2, 'Private First Class', 'active', '2023-02-16', '10:04:10.000000', '2023-02-16', '10:04:48.000000', 'gwapo'),
(3, 3, 'Corporal', 'active', '2023-02-16', '10:07:40.000000', '2023-02-17', '08:35:40.000000', 'gwapo'),
(4, 4, 'Sergeant', 'active', '2023-02-16', '10:07:52.000000', '2023-02-17', '08:35:47.000000', 'gwapo'),
(5, 5, 'Staff Sergeant', 'active', '2023-02-16', '10:08:21.000000', '2023-02-17', '08:35:54.000000', 'gwapo'),
(6, 6, 'Sergeant First Class', 'active', '2023-02-16', '10:08:39.000000', '2023-02-17', '08:36:01.000000', 'gwapo'),
(7, 7, 'Master Sergeant', 'active', '2023-02-16', '10:08:49.000000', '2023-02-17', '08:36:07.000000', 'gwapo'),
(8, 8, 'First Sergeant', 'active', '2023-02-16', '10:09:02.000000', '2023-02-17', '08:36:14.000000', 'gwapo'),
(9, 9, 'Sergeant Major', 'active', '2023-02-16', '10:09:20.000000', '2023-02-17', '08:36:20.000000', 'gwapo'),
(10, 10, 'Command Sergeant Major', 'active', '2023-02-16', '10:09:35.000000', '2023-02-17', '08:36:27.000000', 'gwapo'),
(11, 11, 'Second Lieutenant', 'active', '2023-02-16', '10:09:52.000000', '2023-02-17', '08:36:35.000000', 'gwapo'),
(12, 12, 'First Lieutenant', 'active', '2023-02-16', '10:10:03.000000', '2023-02-17', '08:36:44.000000', 'gwapo'),
(13, 13, 'Captain', 'active', '2023-02-16', '10:10:12.000000', '2023-02-17', '08:36:52.000000', 'gwapo'),
(14, 14, 'Major', 'active', '2023-02-16', '10:10:21.000000', '2023-02-17', '08:37:00.000000', 'gwapo'),
(15, 15, 'Lieutenant Colonel', 'active', '2023-02-16', '10:10:47.000000', '2023-02-17', '08:37:09.000000', 'gwapo'),
(16, 16, 'Colonel', 'active', '2023-02-16', '10:10:56.000000', '2023-02-17', '10:43:33.000000', 'gwapo');

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

--
-- Dumping data for table `registration_sc`
--

INSERT INTO `registration_sc` (`sc_id`, `firstname`, `lastname`, `username`, `email`, `password`, `school_name`, `school_address`, `rank`, `user_type`, `status`, `user_status`, `date`, `time`) VALUES
(5, 'School', ' Testing', 'st', 'st@gmail.com', 'sample', 'Nueva Ecija University of Santo Tomas', 'Cabanatuan, Nueva Ecija', 'None', 'school_coordinator', 'pending', 'inactive', '2023-02-28', '10:20:55.000000');

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

--
-- Dumping data for table `registration_user`
--

INSERT INTO `registration_user` (`reg_id`, `firstname`, `lastname`, `username`, `email`, `password`, `user_type`, `rank`, `company`, `afpsn`, `status`, `user_status`, `date`, `time`) VALUES
(22, 'Testing', 'Admin Staff', 'tas', 'tas@email.com', 'sample', 'staff', 'Private First Class', 'none', '', 'pending', 'inactive', '2023-02-28', '10:16:08.000000'),
(23, 'cc', 'testing', 'ctest', 'ctest@gmnail.com', 'sample', 'commander', 'none', 'none', 'sdfs-dfd-fd-', 'pending', 'inactive', '2023-02-28', '10:21:19.000000'),
(24, 'res', 'test', 'retest', 'retest@sample.com', 'sample', 'reservist', 'none', 'none', 'saldkjfs-dfklsjdf1', 'pending', 'inactive', '2023-02-28', '10:21:44.000000');

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
(5, 25, 'Private', 'none', 'kjsdf-sdlfkjsdfsd=sdopfmn', '2023-02-17', '09:34:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `rotc_graduates`
--

CREATE TABLE `rotc_graduates` (
  `rg_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `date_of_birth` date NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `date_graduated` varchar(250) NOT NULL,
  `age` int(250) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `school_graduated` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rotc_graduates`
--

INSERT INTO `rotc_graduates` (`rg_id`, `name`, `afpsn`, `date_of_birth`, `home_address`, `date_graduated`, `age`, `sex`, `school_graduated`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'Rodelio Domingo', 'sldfjjs-k2h3oisd', '1997-12-30', 'Munoz, Nueva Ecija, Philippines', '2020-2021', 25, 'Male', 'CLSU', 'active', '2023-02-27', '10:24:13.000000', '2023-02-28', '09:14:09.000000'),
(3, 'Third User', 'lskadjfkkljd-2ljk', '2008-07-10', 'Purok Guro', '2020-2021', 14, 'Female', 'CLSU', 'active', '2023-02-28', '09:08:12.000000', '2023-02-28', '09:12:55.000000'),
(4, 'NEUST my student', 'lskdjf-sdfkj2', '1998-12-30', 'Jaan lang', '2023-2024', 24, 'Male', '', 'archive', '2023-02-28', '11:13:50.000000', '2023-02-28', '11:14:42.000000'),
(11, 'NE Final Test', 'lkasdjf-dhjkll1kojfoi1h', '1997-12-29', 'NE Cab Philippines', '2020-2021', 25, 'Male', 'NEUST', 'active', '2023-02-28', '01:08:36.000000', '2023-02-28', '01:08:36.000000'),
(12, 'Staff Add', 'sjdflkiovn1lkjdfoi2p3k=', '1999-12-02', 'Bayan ng munoz', '2019-2020', 23, 'Female', 'CLSU', 'active', '2023-02-28', '01:10:32.000000', '2023-02-28', '01:10:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `rpi`
--

CREATE TABLE `rpi` (
  `rpi_id` int(250) NOT NULL,
  `reservist_id` int(250) NOT NULL,
  `brsvc` varchar(100) NOT NULL,
  `afpos_mos` varchar(100) NOT NULL,
  `soc_enlistment` varchar(100) NOT NULL,
  `initial_rank` varchar(100) NOT NULL,
  `date_of_comsn_enlist` varchar(100) NOT NULL,
  `authority` varchar(200) NOT NULL,
  `mobilization_center` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `squad` varchar(100) NOT NULL,
  `platoon` varchar(100) NOT NULL,
  `battalion` varchar(100) NOT NULL,
  `size_cs` int(100) NOT NULL,
  `size_cap` int(100) NOT NULL,
  `size_bda` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rpi`
--

INSERT INTO `rpi` (`rpi_id`, `reservist_id`, `brsvc`, `afpos_mos`, `soc_enlistment`, `initial_rank`, `date_of_comsn_enlist`, `authority`, `mobilization_center`, `designation`, `squad`, `platoon`, `battalion`, `size_cs`, `size_cap`, `size_bda`) VALUES
(1, 15, '', 'INF', 'MNSA', '', '', 'Me', '', '', '', '', '', 185, 12, 123),
(2, 25, '', 'INF', 'MNSA', '', '', '', '', '', '', '', '', 0, 0, 0),
(3, 3, '', 'INF', 'MNSA', '', '', '', '', '', '', '', '', 120, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(100) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `school_address` varchar(250) NOT NULL,
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

INSERT INTO `schools` (`school_id`, `school_name`, `acronym`, `description`, `school_address`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`, `uploader`) VALUES
(1, 'Central Luzon State University', 'CLSU', 'My College Now Today', 'My School', 'active', '2023-02-15', '07:01:56.000000', '2023-02-16', '06:40:19.000000', 'gwapo'),
(2, 'Nueva Ecija University of Santo Tomas', 'NEUST', 'Their College', '', 'active', '2023-02-15', '08:41:58.000000', '2023-02-15', '08:41:58.000000', 'gwapo');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `seminar_id` int(250) NOT NULL,
  `seminar_name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `student_count` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`seminar_id`, `seminar_name`, `description`, `link`, `status`, `student_count`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'First Seminar', 'My Initial Seminar', 'https://www.facebook.com/', 'inactive', 0, '2023-02-21', '08:45:26.000000', '2023-02-28', '09:54:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_attendance`
--

CREATE TABLE `seminar_attendance` (
  `att_id` int(250) NOT NULL,
  `seminar_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `date_attended` date NOT NULL,
  `time_attended` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar_attendance`
--

INSERT INTO `seminar_attendance` (`att_id`, `seminar_id`, `user_id`, `date_attended`, `time_attended`) VALUES
(1, 1, 15, '2023-02-28', '09:48:51.000000');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(250) NOT NULL,
  `id_no` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `birth_date` date NOT NULL,
  `grade` varchar(20) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `id_no`, `firstname`, `lastname`, `address`, `birth_date`, `grade`, `afpsn`, `course`, `semester`, `academic_year`, `date_created`, `time_created`, `date_modified`, `time_modified`, `status`) VALUES
(3, '20-2012', 'Richard', 'Pable', 'Central Luzon State University', '2023-02-09', '2', 'alsdf=sdljkfh2oi', 'Second Tutorial', '', '', '2023-02-20', '09:59:25.000000', '2023-02-21', '09:25:37.000000', 'inactive'),
(4, '21-2123', 'Second', 'Student', 'sdfsdf', '2019-10-22', '2.5', 'sldjkf=dlkj1', 'Rodel Tutorial', 'Second', '2017-2018', '2023-02-20', '10:07:42.000000', '2023-02-21', '09:30:06.000000', 'inactive'),
(5, 'RA-0989', 'Moises', 'Anana', '#77 Purok Jasmine, Poblacion West', '2002-12-30', '2', 'jslkdjf-0dfjlq2id', 'Rodel Tutorial', 'Second', '2019-2020', '2023-02-21', '09:01:55.000000', '2023-02-21', '02:56:36.000000', 'active'),
(6, '14-2142', 'Daryl', 'Nortado', 'Jaan lang', '1997-12-30', '1.25', 'sldfj-sdj1jhek', 'Second Tutorial', 'Second', '2014-2015', '2023-02-21', '09:11:59.000000', '2023-02-21', '11:17:13.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `training_id` int(250) NOT NULL,
  `training_name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `student_count` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`training_id`, `training_name`, `description`, `link`, `status`, `student_count`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, 'First Training', 'First Training forever', 'https://github.com/rodelio30/army', 'inactive', 0, '2023-02-21', '08:20:25.000000', '2023-02-28', '09:53:43.000000'),
(2, 'Rodelio Profile', 'High this is me', 'https://www.facebook.com/', 'inactive', 0, '2023-02-28', '04:47:05.000000', '2023-02-28', '04:47:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `training_attendance`
--

CREATE TABLE `training_attendance` (
  `att_id` int(250) NOT NULL,
  `training_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `date_attended` date NOT NULL,
  `time_attended` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_attendance`
--

INSERT INTO `training_attendance` (`att_id`, `training_id`, `user_id`, `date_attended`, `time_attended`) VALUES
(1, 1, 15, '2023-02-28', '09:08:16.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `ann_descrip`
--
ALTER TABLE `ann_descrip`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `aor`
--
ALTER TABLE `aor`
  ADD PRIMARY KEY (`aor_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `army_users`
--
ALTER TABLE `army_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `below_info`
--
ALTER TABLE `below_info`
  ADD PRIMARY KEY (`bi_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

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
-- Indexes for table `rotc_graduates`
--
ALTER TABLE `rotc_graduates`
  ADD PRIMARY KEY (`rg_id`);

--
-- Indexes for table `rpi`
--
ALTER TABLE `rpi`
  ADD PRIMARY KEY (`rpi_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `seminar_attendance`
--
ALTER TABLE `seminar_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `training_attendance`
--
ALTER TABLE `training_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ann_descrip`
--
ALTER TABLE `ann_descrip`
  MODIFY `ad_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aor`
--
ALTER TABLE `aor`
  MODIFY `aor_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ap_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `army_users`
--
ALTER TABLE `army_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `below_info`
--
ALTER TABLE `below_info`
  MODIFY `bi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `pi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registration_sc`
--
ALTER TABLE `registration_sc`
  MODIFY `sc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_user`
--
ALTER TABLE `registration_user`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reservists`
--
ALTER TABLE `reservists`
  MODIFY `reservist_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rotc_graduates`
--
ALTER TABLE `rotc_graduates`
  MODIFY `rg_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rpi`
--
ALTER TABLE `rpi`
  MODIFY `rpi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seminar_attendance`
--
ALTER TABLE `seminar_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_attendance`
--
ALTER TABLE `training_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
