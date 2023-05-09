-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2023 at 09:58 AM
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
-- Database: `army_uat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE `agreement` (
  `agree_id` int(100) NOT NULL,
  `army_id` int(100) NOT NULL,
  `check_agreement` int(10) NOT NULL,
  `created_time` time(6) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `company_id` int(100) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `army_users`
--

CREATE TABLE `army_users` (
  `army_id` int(255) NOT NULL,
  `user_img` varchar(250) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `rank_id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `school_id` int(100) NOT NULL,
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

INSERT INTO `army_users` (`army_id`, `user_img`, `firstname`, `middle_name`, `lastname`, `username`, `email`, `password`, `type`, `rank_id`, `company_id`, `afpsn`, `school_id`, `status`, `user_status`, `date_created`, `time_created`, `date_modified`, `time_modified`) VALUES
(1, '', 'Super', '', 'Admin', 'supadmin', 'supadmin@gmail.com', '$2y$10$K7yKqRNnZt2SeY396SuRn.yJZBmXVRNmNWrwiHcFxWb14dGbudoYu', 'sadmin', 0, 0, '', 0, 'ready', 'active', '2023-05-08', '15:20:08.000000', '2023-05-08', '15:20:08.000000');

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
  `rank_id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `school_id` int(100) NOT NULL,
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
  `reservist_id` int(250) NOT NULL,
  `army_id` int(200) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middle_initial` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `extname` varchar(10) NOT NULL,
  `afpsn` varchar(250) NOT NULL,
  `rank_id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `date_graduated` varchar(250) NOT NULL,
  `age` int(250) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `school_id` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL,
  `date_modified` date NOT NULL,
  `time_modified` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rids`
--

CREATE TABLE `rids` (
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
  `size_bda` int(100) NOT NULL,
  `p_o` varchar(50) NOT NULL,
  `company_name_address` varchar(100) NOT NULL,
  `tel_no` int(20) NOT NULL,
  `town` varchar(100) NOT NULL,
  `res_tel_no` int(30) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `tin` varchar(30) NOT NULL,
  `sss` varchar(30) NOT NULL,
  `philhealth` varchar(30) NOT NULL,
  `height` int(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `fb_account` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `special_skills` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `date_of_rank` date NOT NULL,
  `rank_authority` varchar(30) NOT NULL,
  `military_schooling` varchar(50) NOT NULL,
  `school` varchar(40) NOT NULL,
  `school_date_graduated` date NOT NULL,
  `awards` varchar(30) NOT NULL,
  `awards_authority` varchar(20) NOT NULL,
  `date_awarded` date NOT NULL,
  `relation` varchar(30) NOT NULL,
  `dependents_name` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `course_school` varchar(40) NOT NULL,
  `course_date_graduated` date NOT NULL,
  `unit_cad` varchar(30) NOT NULL,
  `unit_authority` varchar(30) NOT NULL,
  `unit_date_started` date NOT NULL,
  `unit_date_end` date NOT NULL,
  `unit_assignment` varchar(30) NOT NULL,
  `assign_authority` varchar(30) NOT NULL,
  `assign_date_from` date NOT NULL,
  `assign_date_to` date NOT NULL,
  `position` varchar(30) NOT NULL,
  `pos_authority` varchar(30) NOT NULL,
  `pos_date_from` date NOT NULL,
  `pos_date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `seminar_attendance`
--

CREATE TABLE `seminar_attendance` (
  `att_id` int(250) NOT NULL,
  `seminar_id` int(250) NOT NULL,
  `army_id` int(250) NOT NULL,
  `date_attended` date NOT NULL,
  `time_attended` time(6) NOT NULL,
  `status` varchar(10) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `training_attendance`
--

CREATE TABLE `training_attendance` (
  `att_id` int(250) NOT NULL,
  `training_id` int(250) NOT NULL,
  `army_id` int(250) NOT NULL,
  `date_attended` date NOT NULL,
  `time_attended` time(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
  ADD PRIMARY KEY (`agree_id`);

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
  ADD PRIMARY KEY (`army_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

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
-- Indexes for table `rids`
--
ALTER TABLE `rids`
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
-- AUTO_INCREMENT for table `agreement`
--
ALTER TABLE `agreement`
  MODIFY `agree_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ann_descrip`
--
ALTER TABLE `ann_descrip`
  MODIFY `ad_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aor`
--
ALTER TABLE `aor`
  MODIFY `aor_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ap_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `army_users`
--
ALTER TABLE `army_users`
  MODIFY `army_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `registration_user`
--
ALTER TABLE `registration_user`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `reservists`
--
ALTER TABLE `reservists`
  MODIFY `reservist_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rids`
--
ALTER TABLE `rids`
  MODIFY `rpi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminar_attendance`
--
ALTER TABLE `seminar_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `training_attendance`
--
ALTER TABLE `training_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
