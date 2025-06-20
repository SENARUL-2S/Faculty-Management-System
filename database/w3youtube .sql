-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 07:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w3youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `email`, `subject`, `message`, `reply`, `created_at`) VALUES
(1, 'MD.SENARUL ISLAM', 'mdsenarul72@gmail.com', 'ghj', 'akhgdhqojfek', NULL, '2025-06-17 21:20:44'),
(2, 'MD.SENARUL ISLAM', 'mdsenarul72@gmail.com', 'dd', 'hgsdh', NULL, '2025-06-17 21:24:25'),
(3, 'MD.SENARUL ISLAM', 'mdsenarul72@gmail.com', 'ghj', 'akhgdhqojfek', NULL, '2025-06-17 21:24:50'),
(4, 'MD.SENARUL ISLAM', 'mdsenarul72@gmail.com', 'mas', 'snLJDBFGTBHHYQ5T9U4JJTGFNDKJIRTJNGRJHGURPHVDJHHPURGHDJDVNRJGHRUHGKDVNROOUGHPRUJVNDJ;GHPIU43RGBVDMVNJRIHGUREJVNJGBIGURRGBJDVNRJIGHPV CVHRGBJVM VV', NULL, '2025-06-17 21:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(50) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_title`, `credits`, `department_id`) VALUES
('CCE112', 'Engineering Drawing', 1, 1),
('CHE111', 'Chemistry', 3, 1),
('CHE112', 'Chemistry Sessional', 1, 1),
('CIT111', 'Programming Language', 3, 1),
('CIT112', 'Programming Language Sessional', 2, 1),
('EEE111', 'Basic Electrical Engineering', 3, 1),
('EEE112', 'Basic Electrical Engineering Sessional', 2, 1),
('MAT111', 'Mathematics-I', 3, 1),
('PHY111', 'Physics-I', 3, 1),
('PHY112', 'Physics-I Sessional', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dean_merit`
--

CREATE TABLE `dean_merit` (
  `merit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean_merit`
--

INSERT INTO `dean_merit` (`merit_id`, `student_id`, `student_name`, `session`, `picture`) VALUES
(1, 2102023, 'Md. Senarul Islam', '2021-22', 'senarul.jpg'),
(2, 0, 'naim', '2021-22', 'naim.jpg'),
(3, 0, 'prosen', '2021-22', 'prosen.jpg'),
(4, 0, 'tanmoy', '2022-23', 'tanmoy.jpg'),
(5, 0, 'Sakib Al Hasan', '2022-23', 'sakib.jpg'),
(6, 0, 'Mehjabin Rahman', '2022-23', 'mehjabin.jpg'),
(7, 0, 'Tariq Aziz', '2022-23', 'tariq.jpg'),
(8, 0, 'Nasrin Sultana', '2022-23', 'nasrin.jpg'),
(9, 0, 'Rafiul Islam', '2022-23', 'rafiul.jpg'),
(10, 0, 'Shamim Ahmed', '2022-23', 'shamim.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `faculty_code` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `establishment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`faculty_code`, `department_id`, `dept_name`, `establishment_date`) VALUES
('1', 123, 'sejdh', '1111-11-11'),
('12', 1234, 'ndhd', '1111-11-11'),
('12e', 12341, 'ndhd1', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('mdsenarul72@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `recipient_type` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  `send_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `recipient_type`, `subject`, `message`, `sender`, `send_date`) VALUES
(1, 'teachers', 'huuii', 'njii', 'jjhhy', '2025-05-26 19:08:06'),
(2, 'teachers', 'ghj', 'sdd', 'jjhhy', '2025-05-26 21:41:46'),
(3, 'teachers', 'huuii', 'fgh', 'jjhhy', '2025-05-26 21:59:59'),
(4, 'teachers', 'huuii', 'hk', 'jjhhy', '2025-05-26 22:47:22'),
(5, 'teachers', 'huuii', 'hk', 'jjhhy', '2025-05-26 22:52:55'),
(6, 'individual', 'mas', 'asekdf', 'johir', '2025-05-26 22:53:28'),
(7, 'students', 'mas', 'asekdf', 'johir', '2025-05-26 22:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `description`, `publish_date`) VALUES
(1, 'ফল সেমিস্টার ২০২৩ পরীক্ষার রুটিন', 'ফল সেমিস্টার ২০২৩ এর ফাইনাল পরীক্ষার রুটিন প্রকাশিত হয়েছে। সকল ছাত্র-ছাত্রীদের অবগতির জন্য জানানো যাচ্ছে।', '2023-12-15'),
(2, 'অনলাইন রেজিস্ট্রেশন শুরু', 'স্প্রিং সেমিস্টার ২০২৪ এর জন্য অনলাইন কোর্স রেজিস্ট্রেশন শুরু হয়েছে। রেজিস্ট্রেশনের শেষ তারিখ ৩১ ডিসেম্বর ২০২৩।', '2023-12-10'),
(3, 'সেমিনার: আর্টিফিশিয়াল ইন্টেলিজেন্স', 'আগামী ২০ ডিসেম্বর ২০২৩ তারিখে AI বিষয়ক একটি সেমিনার অনুষ্ঠিত হবে। সকল শিক্ষার্থীদের উপস্থিতি বাঞ্ছনীয়।', '2023-12-05'),
(4, 'মিড টার্ম পরীক্ষার ফলাফল', 'ফল সেমিস্টার ২০২৩ এর মিড টার্ম পরীক্ষার ফলাফল প্রকাশিত হয়েছে। ফলাফল দেখার জন্য স্টুডেন্ট পোর্টালে লগইন করুন।', '2023-12-01'),
(5, 'ক্লাব অ্যাক্টিভিটি: প্রোগ্রামিং কনটেস্ট', 'আগামী শনিবার প্রোগ্রামিং কনটেস্ট অনুষ্ঠিত হবে। অংশগ্রহণের জন্য রেজিস্ট্রেশন করুন।', '2023-11-28'),
(12, 'Final Semester 2024 Exam Routine Published', 'The exam routine for all departments of the Final Semester 2024 has been published. Students are requested to participate in the exams on time. The detailed routine can be found on the university website.', '2025-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_designation` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` float NOT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_designation`, `email`, `join_date`, `department_id`, `salary`, `phone`) VALUES
(1, 'sd', 'sdn', 'mdsenarul1272@gmail.com', '1111-11-11', 12, 12222, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `registration` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `sessions` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hall` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `registration`, `email`, `semester`, `sessions`, `phone`, `password`, `hall`, `picture`) VALUES
(1, 'se', 123, 'mdsenarul72@gmail.com', '1', '123', '1785466972', '1234', NULL, NULL),
(11, 'ses', 1232, 'mdsenaruul72@gmail.com', '11', '122', '1785466972', NULL, NULL, NULL),
(123, 'ses', 12, 'mdsenaqrul72@gmail.com', '11', '22', '1785466972', NULL, NULL, NULL),
(2102023, 'Md. Senarul Islam', 10150, 'ug2102023@cse.pstu.ac.bd', '4th', '2021-22', '01785466972', '1234', 'Bijoy-24 Hall', 'senarul.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_designation` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` float NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_designation`, `email`, `join_date`, `department_id`, `salary`, `phone`, `password`) VALUES
(1, 'senarul', 'prof', 'mdsenarul72@gmail.com', '1111-11-11', 11, 11111, NULL, '1234'),
(455, 'rohit', 'prof', 'mdsheenarul72@gmail.com', '1111-11-11', 1234, 11111, '01784466972', NULL),
(1234, 'hdjj', 'jdjfhf', 'mdsenayerul72@gmail.com', '1111-11-11', 11111, 111111, '01785466972', NULL),
(290039, 'pro', 'stu', 'mdsenar234ul72@gmail.com', '1111-11-11', 23, 1111110, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `dean_merit`
--
ALTER TABLE `dean_merit`
  ADD PRIMARY KEY (`merit_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `faculty_code` (`faculty_code`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `registration` (`registration`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`);


--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dean_merit`
--
ALTER TABLE `dean_merit`
  MODIFY `merit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102024;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
