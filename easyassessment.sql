-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 06:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyassessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Sr.No.` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `module` text NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Sr.No.`, `username`, `password`, `module`, `create_datetime`) VALUES
(4, '21cs037', '21CS037@Admin', 'admin', '2022-09-23 23:30:46'),
(5, '21cs036', '21CS036@Admin', 'admin', '2022-09-23 23:31:52'),
(6, '21cs041', '21CS041@Admin', 'admin', '2022-09-23 23:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sr` int(2) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `ccode` varchar(50) NOT NULL,
  `csem` int(2) NOT NULL,
  `module` text NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sr`, `cname`, `ccode`, `csem`, `module`, `create_datetime`) VALUES
(5, 'java', 'ce250', 3, 'course', '2022-10-07 17:17:28'),
(6, 'DCN', 'CE257', 3, 'course', '2022-10-08 10:44:23'),
(7, 'Maths I', 'MA143', 1, 'course', '2022-10-08 10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ex_id` int(10) NOT NULL,
  `cou_id` varchar(50) NOT NULL,
  `ex_title` varchar(50) NOT NULL,
  `ex_time_limit` varchar(50) NOT NULL,
  `ex_questlimit` varchar(50) NOT NULL,
  `ex_noofque` int(10) NOT NULL,
  `ex_description` varchar(50) NOT NULL,
  `ex_created` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `exam_date` date DEFAULT NULL,
  `fusername` varchar(20) NOT NULL COMMENT 'for faculty username'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit`, `ex_noofque`, `ex_description`, `ex_created`, `status`, `exam_date`, `fusername`) VALUES
(18, 'CE257', 'JAVA Program', '5', '1', 5, 'This is java practical exam', '2023-03-10 09:41:05', 'old', '2023-03-10', 'Vidhisha@cse'),
(19, 'CE257', 'python Program', '5', '1', 5, 'python exam', '2023-03-10 10:19:50', '', '2023-03-10', 'Vidhisha@cse');

-- --------------------------------------------------------

--
-- Table structure for table `exmminee`
--

CREATE TABLE `exmminee` (
  `sr` int(100) NOT NULL,
  `ex_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `sem` int(10) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `result` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exmminee`
--

INSERT INTO `exmminee` (`sr`, `ex_id`, `username`, `fname`, `branch`, `sem`, `statuss`, `result`) VALUES
(74, 17, '21cs037', 'jinesh', 'cse', 3, 'active', 0),
(75, 17, '21cs044', 'hemil', 'cse', 3, 'active', 0),
(76, 1, '21cs037', 'jinesh', 'cse', 3, 'active', 0),
(77, 1, '21cs044', 'hemil', 'cse', 3, 'active', 0),
(78, 18, '21cs037', 'Jinesh', 'cse', 3, 'deactive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Sr.No.` int(3) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `subcode` varchar(10) DEFAULT NULL,
  `module` text NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Sr.No.`, `name`, `username`, `password`, `subcode`, `module`, `create_datetime`) VALUES
(26, 'Vidhisha ', 'Vidhisha@cse', 'Vidhisha@cse', 'CE245', 'faculty', '2023-03-10 05:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ex_id` int(10) NOT NULL,
  `que_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `que_ans` text NOT NULL,
  `examstatus` int(11) NOT NULL,
  `sr` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ex_id`, `que_id`, `question`, `op1`, `op2`, `op3`, `op4`, `que_ans`, `examstatus`, `sr`) VALUES
(18, 1, '  Number of primitive data types in Java are?', '6', '7', '8', '9', 'c', 0, 44),
(18, 2, 'What is the size of float and double in java?', '32 AND 64', '32 AND 32', '64 AND 64', '64 AND 34', 'a', 0, 45),
(18, 3, 'Automatic type conversion is possible in which of the possible cases?', ' Byte to int', 'int to long', 'long to int ', 'log to short', 'b', 0, 46);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sr.No.` int(3) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `yearcode` int(4) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `currsem` int(2) NOT NULL,
  `module` text NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Sr.No.`, `name`, `username`, `password`, `yearcode`, `branch`, `currsem`, `module`, `create_datetime`) VALUES
(85, 'Jinesh', '21cs037', '21cs037', 2021, 'cse', 3, 'student', '2023-03-10 05:06:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Sr.No.`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `ccode` (`ccode`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `exmminee`
--
ALTER TABLE `exmminee`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Sr.No.`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sr.No.`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Sr.No.` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sr` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ex_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exmminee`
--
ALTER TABLE `exmminee`
  MODIFY `sr` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Sr.No.` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `sr` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Sr.No.` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
