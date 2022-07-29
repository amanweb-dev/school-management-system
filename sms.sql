-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 06:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_img`) VALUES
(4, 'xyz', '48297731.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admission_admin`
--

CREATE TABLE `admission_admin` (
  `a_a_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_contact` varchar(255) NOT NULL,
  `u_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mailing_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_details` varchar(255) NOT NULL,
  `event_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `event_details`, `event_img`) VALUES
(9, 'Upcoming Events Title', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the', 'evnt.jpg'),
(10, 'Upcoming Events Title new', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the ', 'evee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(255) NOT NULL,
  `notice_date` text NOT NULL,
  `notice_pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_date`, `notice_pdf`) VALUES
(8, 'winter vacation', '2020-09-21', 'rajib.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `stdnt_id` int(11) NOT NULL,
  `std_class` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `std_group` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `result_year` int(11) NOT NULL,
  `grade_letter` varchar(50) NOT NULL,
  `grade_point` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `rtn_id` int(11) NOT NULL,
  `tchr_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `std_group` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `cls_time` varchar(255) NOT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `class_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_ecademic_info`
--

CREATE TABLE `std_ecademic_info` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `class_year` int(11) NOT NULL,
  `current_class` varchar(255) NOT NULL,
  `current_sub` varchar(255) NOT NULL,
  `current_result` varchar(255) DEFAULT NULL,
  `std_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `std_group` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `ftr_name` varchar(255) NOT NULL,
  `mtr_name` varchar(255) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `care_of` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(100) NOT NULL,
  `upazila` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `post_code` varchar(50) NOT NULL,
  `ftr_number` varchar(50) NOT NULL,
  `std_number` varchar(50) NOT NULL,
  `std_email` varchar(255) NOT NULL,
  `psc_xm_type` varchar(100) NOT NULL,
  `psc_board` varchar(100) NOT NULL,
  `psc_roll` varchar(100) NOT NULL,
  `psc_passing_yr` varchar(50) NOT NULL,
  `jsc_xm_type` varchar(100) DEFAULT NULL,
  `jsc_board` varchar(100) DEFAULT NULL,
  `jsc_roll` varchar(100) DEFAULT NULL,
  `jsc_passing_yr` varchar(50) DEFAULT NULL,
  `admission_date` varchar(100) DEFAULT NULL,
  `std_img` text DEFAULT NULL,
  `std_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_problem`
--

CREATE TABLE `student_problem` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `tchr_id` int(11) NOT NULL,
  `prb_title` varchar(255) NOT NULL,
  `prb_details` varchar(255) NOT NULL,
  `solution` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_class` varchar(255) NOT NULL,
  `subject_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_code`, `subject_name`, `subject_class`, `subject_group`) VALUES
(1, 'bang1', 'Bangla 1st part', 'All', 'All'),
(2, 'bang2', 'Bangla 2nd part', 'All', 'All'),
(3, 'eng1', 'English 1st Part', 'All', 'All'),
(4, 'eng2', 'English 2nd Part', 'All', 'All'),
(5, 'math1', 'Math', 'All', 'All'),
(6, 'ict', 'ICT', 'All', 'All'),
(7, 'phy', 'Physics', 'Nine', 'Science'),
(8, 'phy', 'Physics', 'Ten', 'Science'),
(9, 'che', 'Chemistry', 'Nine', 'Science'),
(10, 'che', 'Chemistry', 'Ten', 'Science'),
(11, 'bio', 'Biology', 'Nine', 'Science'),
(12, 'bio', 'Biology', 'Ten', 'Science'),
(13, 'math2', 'Higher Math', 'Nine', 'Science'),
(14, 'math2', 'Higher Math', 'Ten', 'Science'),
(15, 'his', 'History', 'Nine', 'Humanities'),
(16, 'his', 'History', 'Ten', 'Humanities');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_pass` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_designation` varchar(255) NOT NULL,
  `t_qualification` varchar(255) NOT NULL,
  `t_gender` varchar(255) NOT NULL,
  `t_address` varchar(255) NOT NULL,
  `t_contact` varchar(255) NOT NULL,
  `t_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admission_admin`
--
ALTER TABLE `admission_admin`
  ADD PRIMARY KEY (`a_a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`rtn_id`);

--
-- Indexes for table `std_ecademic_info`
--
ALTER TABLE `std_ecademic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_problem`
--
ALTER TABLE `student_problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admission_admin`
--
ALTER TABLE `admission_admin`
  MODIFY `a_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `rtn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `std_ecademic_info`
--
ALTER TABLE `std_ecademic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_problem`
--
ALTER TABLE `student_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
