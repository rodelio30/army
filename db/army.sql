-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 02:18 PM
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
-- Database: `army_testing`
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
(5, 'news.png', 'Balita', 'This news broom', 'active', '2023-03-09', '07:58:39.000000', '2023-03-09', '07:58:48.000000');

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
(6, 'Charlie', 'Palayan City', 'active');

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
(12, 'Rodelio Domingo', 'rodel@sample.com', '9273756299', 'Testing', 'To show if working', 'pending', '2023-03-09', '08:05:00.000000', '2023-03-09', '08:01:58.000000', '2023-03-09', '08:02:25.000000');

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
(1, '', 'Army', '', 'Admin', 'admin', 'army@gmail.com', 'admin', 'sadmin', 'none', 'none', '', '', '', 'standby', 'active', '2023-03-04', '00:58:24.441520', '2023-03-09', '10:16:47.000000'),
(45, '', 'Rodelio', '', 'Domingo', 'rodel', 'rodel@sample.com', 'sample', 'reservist', 'Private', 'None', 'asdjkfh-sj1ksldf', '', '', 'ready', 'active', '2023-03-09', '05:43:23.000000', '2023-03-11', '10:10:30.000000'),
(46, '', 'Admin', '', 'First', 'fiadmin', 'fiadmin@sample.com', 'sample', 'admin', 'Private', 'none', 'sdfsdf-sdf1', '', '', 'standby', 'active', '2023-03-09', '06:13:13.000000', '2023-03-11', '10:49:26.000000'),
(47, '', 'Staff', '', 'First', 'fistaff', 'fistaff@sample.com', 'sample', 'staff', 'Private', 'None', '', '', '', 'retired', 'active', '2023-03-09', '06:14:09.000000', '2023-03-09', '06:14:24.000000'),
(48, '', 'School', '', 'First', 'fischool', 'fischool@sample.com', 'sample', 'school_coordinator', 'Private', 'none', '', 'None', 'No School Address', 'standby', 'active', '2023-03-09', '06:22:05.000000', '2023-03-09', '06:41:41.000000'),
(49, '', 'Commander', '', 'First', 'ficommander', 'ficommander@sample.com', 'sample', 'commander', 'Private', 'None', 'sdfsadf', '', '', 'retired', 'active', '2023-03-09', '06:22:56.000000', '2023-03-09', '06:24:55.000000');

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
(7, 45, 'Private', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(8, 54, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00');

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
(6, 'A', 'Alpha', 'active', '2023-03-11', '09:49:46.000000', '2023-03-11', '10:27:56.000000', 'admin'),
(7, 'B', 'Bravo', 'active', '2023-03-11', '09:49:57.000000', '2023-03-11', '10:26:01.000000', 'admin'),
(8, 'C', 'Charlie', 'active', '2023-03-11', '09:50:07.000000', '2023-03-11', '10:26:07.000000', 'admin'),
(9, 'D', 'Headquarter', 'active', '2023-03-11', '09:50:20.000000', '2023-03-11', '10:26:13.000000', 'admin'),
(10, '', 'Delta', 'active', '2023-03-11', '10:29:20.000000', '2023-03-11', '10:29:26.000000', 'admin');

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
(7, 45, '', '', 0, '', '', '', '09273756299', '0000-00-00', '', 0, '', '', '', '', '', 0, 0, '', '', '', 'rodel@sample.com', '', ''),
(8, 54, '', '', 0, '', '', '', '', '0000-00-00', '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(100) NOT NULL,
  `ranked` int(100) NOT NULL,
  `acronym` varchar(20) NOT NULL,
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

INSERT INTO `ranks` (`rank_id`, `ranked`, `acronym`, `rank_name`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`, `uploader`) VALUES
(18, 0, 'Pvt', 'Private', 'active', '2023-03-09', '05:42:18.000000', '2023-03-09', '05:42:36.000000', 'admin');

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
  `school_name` varchar(250) NOT NULL,
  `school_address` varchar(250) NOT NULL,
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
  `rg_id` int(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middle_initial` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `extname` varchar(10) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `rank` varchar(100) NOT NULL,
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
-- Dumping data for table `reservists`
--

INSERT INTO `reservists` (`rg_id`, `firstname`, `middle_initial`, `lastname`, `extname`, `afpsn`, `rank`, `date_of_birth`, `home_address`, `date_graduated`, `age`, `sex`, `school_graduated`, `status`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(17, 'Rodelio', 'Bago', 'Domingo', '', 'alskdjfo=iodjf1', 'none', '1997-12-30', 'Poblacion West, SCM, Nueva Ecija', '2025-2026', 25, 'Male', 'None', 'archive', '2023-03-09', '06:43:39.000000', '2023-03-11', '09:42:24.000000'),
(18, 'Analyn', 'M. ', 'Paraguison', '', 'lskdjf-sdh1', 'none', '2002-08-18', 'Rang Ayan, Munoz, Nueva Ecija', '2019-2020', 20, 'Female', '', 'active', '2023-03-11', '09:45:48.000000', '2023-03-12', '09:10:12.000000'),
(19, 'Shai', 'B.', 'Obedoza', '', 'flaksdfpsdkfj1lkf2', 'none', '2000-03-06', 'Rang Ayan, Munoz, Nueva Ecija', '2019-2020', 23, 'Female', 'None', 'active', '2023-03-11', '09:47:42.000000', '2023-03-12', '09:11:21.000000'),
(20, 'Rodel', 'B.', 'Domingo', '', 'lkjdf=dfj2lk', 'none', '1997-12-30', 'Munoz, Nueva Ecija', '2019-2020', 25, 'Male', 'None', 'active', '2023-03-11', '11:00:16.000000', '2023-03-11', '11:00:16.000000'),
(21, 'Rodelio', 'B.', 'Domingo', 'Jr.', 'kljdf-dfjl10jkdf7 ', 'none', '1997-12-30', 'Munoz, Nueva Ecija', '2019-2020', 25, 'Male', 'None', 'active', '2023-03-12', '09:05:24.000000', '2023-03-12', '09:08:09.000000');

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
(7, 45, '', 'INF', 'MNSA', '', '', '', '', '', '', '', '', 0, 0, 0),
(8, 54, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0);

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
(3, 'Central Luzon State University', 'CLSU', 'Best School', 'Munoz, Nueva Ecija', 'inactive', '2023-03-11', '10:32:17.000000', '2023-03-11', '10:32:17.000000', 'admin'),
(4, 'Nueva Ecija University of Santo Thomas', 'NEUST', 'Broom', 'Cab', 'inactive', '2023-03-11', '10:51:35.000000', '2023-03-11', '10:51:35.000000', 'fiadmin');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `seminar_id` int(250) NOT NULL,
  `seminar_name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `venue` varchar(250) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
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

INSERT INTO `seminars` (`seminar_id`, `seminar_name`, `description`, `venue`, `start_date`, `end_date`, `status`, `student_count`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(3, 'First Seminar', 'First Seminar for the philippines', 'Munoz', '2023-03-09', '2023-03-10', 'active', 0, '2023-03-09', '07:07:13.000000', '2023-03-12', '08:43:15.000000'),
(4, 'Second Seminar', 'Jaan lang', 'San Jose', '2023-03-09', '2023-03-10', 'active', 0, '2023-03-09', '07:39:24.000000', '2023-03-12', '08:43:09.000000'),
(5, 'Final Seminar', 'Every day is lifer', 'Munoz', '2023-03-13', '2023-03-15', 'inactive', 0, '2023-03-11', '10:12:03.000000', '2023-03-11', '10:12:03.000000');

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
(5, 3, 45, '2023-03-12', '09:15:36.000000');

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

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `training_id` int(250) NOT NULL,
  `training_name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `venue` varchar(250) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
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

INSERT INTO `trainings` (`training_id`, `training_name`, `description`, `venue`, `start_date`, `end_date`, `status`, `student_count`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(5, 'First Training', 'Events', 'CLSU', '2023-03-09', '2023-03-10', 'archive', 0, '2023-03-09', '06:56:24.000000', '2023-03-11', '11:10:54.000000'),
(6, 'Second Training', 'Jaan lang', 'Munoz', '2023-03-09', '2023-03-10', 'archive', 0, '2023-03-09', '07:38:52.000000', '2023-03-11', '11:10:52.000000'),
(7, 'Final Training', 'Everyday', 'Pag asa gym', '2023-03-13', '2023-03-14', 'inactive', 0, '2023-03-11', '10:11:36.000000', '2023-03-11', '10:11:36.000000');

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
  MODIFY `ann_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ann_descrip`
--
ALTER TABLE `ann_descrip`
  MODIFY `ad_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aor`
--
ALTER TABLE `aor`
  MODIFY `aor_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ap_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `army_users`
--
ALTER TABLE `army_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `below_info`
--
ALTER TABLE `below_info`
  MODIFY `bi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `pi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration_sc`
--
ALTER TABLE `registration_sc`
  MODIFY `sc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_user`
--
ALTER TABLE `registration_user`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reservists`
--
ALTER TABLE `reservists`
  MODIFY `rg_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rpi`
--
ALTER TABLE `rpi`
  MODIFY `rpi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seminar_attendance`
--
ALTER TABLE `seminar_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training_attendance`
--
ALTER TABLE `training_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
