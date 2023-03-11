-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 01:59 AM
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
(1, '', 'army', '', 'admin', 'admin', 'army@gmail.com', 'admin', 'sadmin', '', '', '', '', '', '', '', '2023-03-04', '00:58:24.441520', '2023-03-04', '00:00:00.000000');

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
  `reservist_id` int(100) NOT NULL,
  `army_user_id` int(100) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `afpsn` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rotc_graduates`
--

CREATE TABLE `rotc_graduates` (
  `rg_id` int(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middle_initial` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
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
  `user_id` int(250) NOT NULL,
  `date_attended` date NOT NULL,
  `time_attended` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `ann_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ann_descrip`
--
ALTER TABLE `ann_descrip`
  MODIFY `ad_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aor`
--
ALTER TABLE `aor`
  MODIFY `aor_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ap_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `army_users`
--
ALTER TABLE `army_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `below_info`
--
ALTER TABLE `below_info`
  MODIFY `bi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `pi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservists`
--
ALTER TABLE `reservists`
  MODIFY `reservist_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rotc_graduates`
--
ALTER TABLE `rotc_graduates`
  MODIFY `rg_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rpi`
--
ALTER TABLE `rpi`
  MODIFY `rpi_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seminar_attendance`
--
ALTER TABLE `seminar_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_attendance`
--
ALTER TABLE `training_attendance`
  MODIFY `att_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
