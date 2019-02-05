-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 01:09 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

CREATE TABLE `1` (
  `sno` int(11) NOT NULL,
  `question` varchar(700) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `unit` int(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1`
--

INSERT INTO `1` (`sno`, `question`, `comment`, `unit`, `marks`, `tid`) VALUES
(1, 'question1', 'comment1', 1, 2, 1),
(4, 'question12', 'comment12', 1, 2, 1),
(5, 'question13', 'comment13', 1, 3, 1),
(6, 'question110', 'comment110', 1, 10, 1),
(7, 'question22', 'comment22', 2, 2, 1),
(8, 'question23', 'comment23', 2, 3, 1),
(9, 'question210', 'comment210', 2, 10, 1),
(10, 'question32', 'comment32', 3, 2, 1),
(11, 'question33', 'comment33', 3, 3, 1),
(12, 'question310', 'comment310', 3, 10, 1),
(13, 'question42', 'comment42', 4, 2, 1),
(14, 'question43', 'comment43', 4, 3, 1),
(15, 'question410', 'comment410', 4, 10, 1),
(16, 'question52', 'comment52', 5, 2, 1),
(17, 'question53', 'comment53', 5, 3, 1),
(18, 'question510', 'comment510', 5, 10, 1),
(19, 'question112', 'comment112', 1, 2, 1),
(20, 'question113', 'comment113', 1, 3, 1),
(21, 'question1110', 'comment1110', 1, 10, 1),
(22, 'question122', 'comment122', 2, 2, 1),
(23, 'question123', 'comment123', 2, 3, 1),
(24, 'question1210', 'comment1210', 2, 10, 1),
(25, 'question132', 'comment132', 3, 2, 1),
(26, 'question133', 'comment133', 3, 3, 1),
(27, 'question1310', 'comment1310', 3, 10, 1),
(28, 'question142', 'comment142', 4, 2, 1),
(29, 'question143', 'comment143', 4, 3, 1),
(30, 'question1410', 'comment1410', 4, 10, 1),
(31, 'question152', 'comment152', 5, 2, 1),
(32, 'question153', 'comment153', 5, 3, 1),
(33, 'question1510', 'comment1510', 5, 10, 1),
(34, 'question212', 'comment212', 1, 2, 1),
(35, 'question213', 'comment213', 1, 3, 1),
(36, 'question2110', 'comment2110', 1, 10, 1),
(37, 'question222', 'comment222', 2, 2, 1),
(38, 'question223', 'comment223', 2, 3, 1),
(39, 'question2210', 'comment2210', 2, 10, 1),
(40, 'question232', 'comment232', 3, 2, 1),
(41, 'question233', 'comment233', 3, 3, 1),
(42, 'question2310', 'comment2310', 3, 10, 1),
(43, 'question242', 'comment242', 4, 2, 1),
(44, 'question243', 'comment243', 4, 3, 1),
(45, 'question2410', 'comment2410', 4, 10, 1),
(46, 'question252', 'comment252', 5, 2, 1),
(47, 'question253', 'comment253', 5, 3, 1),
(48, 'question2510', 'comment2510', 5, 10, 1),
(49, 'question 212', 'comment 212', 1, 2, 1),
(50, 'question 213', 'comment 213', 1, 3, 1),
(51, 'question 2110', 'comment 2110', 1, 10, 1),
(52, 'question 222', 'comment 222', 2, 2, 1),
(53, 'question 223', 'comment 223', 2, 3, 1),
(54, 'question 2210', 'comment 2210', 2, 10, 1),
(55, 'question 232', 'comment 232', 3, 2, 1),
(56, 'question 233', 'comment 233', 3, 3, 1),
(57, 'question 2310', 'comment 2310', 3, 10, 1),
(58, 'question 242', 'comment 242', 4, 2, 1),
(59, 'question 243', 'comment 243', 4, 3, 1),
(60, 'question 2410', 'comment 2410', 4, 10, 1),
(61, 'question 252', 'comment 252', 5, 2, 1),
(62, 'question 253', 'comment 253', 5, 3, 1),
(63, 'question 2510', 'comment 2510', 5, 10, 1),
(64, 'quest ion 2110', 'com ment 2110', 1, 10, 1),
(65, 'quest ion 222', 'com ment 222', 2, 2, 1),
(66, 'quest ion 223', 'com ment 223', 2, 3, 1),
(67, 'quest ion 2210', 'com ment 2210', 2, 10, 1),
(68, 'quest ion 232', 'com ment 232', 3, 2, 1),
(69, 'quest ion 233', 'com ment 233', 3, 3, 1),
(70, 'quest ion 2310', 'com ment 2310', 3, 10, 1),
(71, 'quest ion 242', 'com ment 242', 4, 2, 1),
(72, 'quest ion 243', 'com ment 243', 4, 3, 1),
(73, 'quest ion 2410', 'com ment 2410', 4, 10, 1),
(74, 'quest ion 252', 'com ment 252', 5, 2, 1),
(75, 'quest ion 253', 'com ment 253', 5, 3, 1),
(76, 'qu est ion 212', 'com me nt 212', 1, 2, 1),
(77, 'qu est ion 213', 'com me nt 213', 1, 3, 1),
(78, 'qu est ion 2110', 'com me nt 2110', 1, 10, 1),
(79, 'qu est ion 222', 'com me nt 222', 2, 2, 1),
(80, 'qu est ion 223', 'com me nt 223', 2, 3, 1),
(81, 'qu est ion 2210', 'com me nt 2210', 2, 10, 1),
(82, 'qu e st ion 2410', 'com m e nt 2410', 4, 10, 1),
(83, 'qu e st ion 252', 'com m e nt 252', 5, 2, 1),
(84, 'qu e st ion 253', 'com m e nt 253', 5, 3, 1),
(85, 'qu e st ion 2510', 'com m e nt 2510', 5, 10, 1),
(86, 'qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410', 'com m e nt 2410', 4, 10, 1),
(87, 'asd', 'ads', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `sno` int(10) NOT NULL,
  `tid` int(10) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`sno`, `tid`, `ip`, `timestamp`) VALUES
(2, 1, '192.168.0.13', '2019-02-01 12:22:21'),
(3, 2, '192.168.0.13', '2019-02-01 12:23:41'),
(4, 1, '192.168.0.13', '2019-02-01 12:28:25'),
(5, 1, '127.0.0.1', '2019-02-01 12:29:21'),
(6, 1, '127.0.0.1', '2019-02-01 12:29:32'),
(7, 1, '127.0.0.1', '2019-02-01 12:37:53'),
(8, 2, '192.168.0.100', '2019-02-01 12:39:38'),
(9, 1, '127.0.0.1', '2019-02-01 15:11:37'),
(10, 1, '127.0.0.1', '2019-02-01 15:16:36'),
(11, 1, '127.0.0.1', '2019-02-01 16:55:28'),
(12, 1, '::1', '2019-02-01 17:17:37'),
(13, 1, '192.168.0.13', '2019-02-01 20:03:39'),
(14, 2, '192.168.0.100', '2019-02-01 21:19:07'),
(15, 1, '192.168.0.13', '2019-02-02 00:06:58'),
(16, 1, '::1', '2019-02-02 21:24:45'),
(17, 1, '::1', '2019-02-03 11:51:28'),
(18, 1, '::1', '2019-02-03 12:55:57'),
(19, 1, '::1', '2019-02-03 13:01:26'),
(20, 2, '192.168.0.100', '2019-02-03 14:06:09'),
(21, 2, '192.168.0.100', '2019-02-03 14:19:45'),
(22, 1, '192.168.0.100', '2019-02-03 14:22:09'),
(23, 1, '::1', '2019-02-03 18:21:20'),
(24, 2, '::1', '2019-02-04 14:30:38'),
(25, 2, '::1', '2019-02-04 14:44:07'),
(26, 2, '::1', '2019-02-04 14:51:52'),
(27, 1, '::1', '2019-02-04 21:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `sno` int(11) NOT NULL,
  `id` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`sno`, `id`, `pwd`, `name`, `email`, `status`) VALUES
(1, 'dev1', '321654', 'Chandrahas', 'chandu32123@gmail.com', 1),
(2, 'dev2', '12345', 'raghu', 'raghu@gmail.com', 1),
(3, 'dev3', '12345', 'manasa', 'manasa@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resetpwd`
--

CREATE TABLE `resetpwd` (
  `sno` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `opt` int(11) NOT NULL,
  `requesttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectlist`
--

CREATE TABLE `subjectlist` (
  `subid` int(11) NOT NULL,
  `subcode` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectlist`
--

INSERT INTO `subjectlist` (`subid`, `subcode`, `name`, `status`) VALUES
(1, 't123', 'testsubject', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `sno` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`sno`, `tid`, `subid`, `status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testsubject`
--

CREATE TABLE `testsubject` (
  `sno` int(11) NOT NULL,
  `question` varchar(700) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `unit` int(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testsubject`
--

INSERT INTO `testsubject` (`sno`, `question`, `comment`, `unit`, `marks`, `tid`) VALUES
(1, 'question1', 'comment1', 1, 2, 1),
(4, 'question12', 'comment12', 1, 2, 1),
(5, 'question13', 'comment13', 1, 3, 1),
(6, 'question110', 'comment110', 1, 10, 1),
(7, 'question22', 'comment22', 2, 2, 1),
(8, 'question23', 'comment23', 2, 3, 1),
(9, 'question210', 'comment210', 2, 10, 1),
(10, 'question32', 'comment32', 3, 2, 1),
(11, 'question33', 'comment33', 3, 3, 1),
(12, 'question310', 'comment310', 3, 10, 1),
(13, 'question42', 'comment42', 4, 2, 1),
(14, 'question43', 'comment43', 4, 3, 1),
(15, 'question410', 'comment410', 4, 10, 1),
(16, 'question52', 'comment52', 5, 2, 1),
(17, 'question53', 'comment53', 5, 3, 1),
(18, 'question510', 'comment510', 5, 10, 1),
(19, 'question112', 'comment112', 1, 2, 1),
(20, 'question113', 'comment113', 1, 3, 1),
(21, 'question1110', 'comment1110', 1, 10, 1),
(22, 'question122', 'comment122', 2, 2, 1),
(23, 'question123', 'comment123', 2, 3, 1),
(24, 'question1210', 'comment1210', 2, 10, 1),
(25, 'question132', 'comment132', 3, 2, 1),
(26, 'question133', 'comment133', 3, 3, 1),
(27, 'question1310', 'comment1310', 3, 10, 1),
(28, 'question142', 'comment142', 4, 2, 1),
(29, 'question143', 'comment143', 4, 3, 1),
(30, 'question1410', 'comment1410', 4, 10, 1),
(31, 'question152', 'comment152', 5, 2, 1),
(32, 'question153', 'comment153', 5, 3, 1),
(33, 'question1510', 'comment1510', 5, 10, 1),
(34, 'question212', 'comment212', 1, 2, 1),
(35, 'question213', 'comment213', 1, 3, 1),
(36, 'question2110', 'comment2110', 1, 10, 1),
(37, 'question222', 'comment222', 2, 2, 1),
(38, 'question223', 'comment223', 2, 3, 1),
(39, 'question2210', 'comment2210', 2, 10, 1),
(40, 'question232', 'comment232', 3, 2, 1),
(41, 'question233', 'comment233', 3, 3, 1),
(42, 'question2310', 'comment2310', 3, 10, 1),
(43, 'question242', 'comment242', 4, 2, 1),
(44, 'question243', 'comment243', 4, 3, 1),
(45, 'question2410', 'comment2410', 4, 10, 1),
(46, 'question252', 'comment252', 5, 2, 1),
(47, 'question253', 'comment253', 5, 3, 1),
(48, 'question2510', 'comment2510', 5, 10, 1),
(49, 'question 212', 'comment 212', 1, 2, 1),
(50, 'question 213', 'comment 213', 1, 3, 1),
(51, 'question 2110', 'comment 2110', 1, 10, 1),
(52, 'question 222', 'comment 222', 2, 2, 1),
(53, 'question 223', 'comment 223', 2, 3, 1),
(54, 'question 2210', 'comment 2210', 2, 10, 1),
(55, 'question 232', 'comment 232', 3, 2, 1),
(56, 'question 233', 'comment 233', 3, 3, 1),
(57, 'question 2310', 'comment 2310', 3, 10, 1),
(58, 'question 242', 'comment 242', 4, 2, 1),
(59, 'question 243', 'comment 243', 4, 3, 1),
(60, 'question 2410', 'comment 2410', 4, 10, 1),
(61, 'question 252', 'comment 252', 5, 2, 1),
(62, 'question 253', 'comment 253', 5, 3, 1),
(63, 'question 2510', 'comment 2510', 5, 10, 1),
(64, 'quest ion 2110', 'com ment 2110', 1, 10, 1),
(65, 'quest ion 222', 'com ment 222', 2, 2, 1),
(66, 'quest ion 223', 'com ment 223', 2, 3, 1),
(67, 'quest ion 2210', 'com ment 2210', 2, 10, 1),
(68, 'quest ion 232', 'com ment 232', 3, 2, 1),
(69, 'quest ion 233', 'com ment 233', 3, 3, 1),
(70, 'quest ion 2310', 'com ment 2310', 3, 10, 1),
(71, 'quest ion 242', 'com ment 242', 4, 2, 1),
(72, 'quest ion 243', 'com ment 243', 4, 3, 1),
(73, 'quest ion 2410', 'com ment 2410', 4, 10, 1),
(74, 'quest ion 252', 'com ment 252', 5, 2, 1),
(75, 'quest ion 253', 'com ment 253', 5, 3, 1),
(76, 'qu est ion 212', 'com me nt 212', 1, 2, 1),
(77, 'qu est ion 213', 'com me nt 213', 1, 3, 1),
(78, 'qu est ion 2110', 'com me nt 2110', 1, 10, 1),
(79, 'qu est ion 222', 'com me nt 222', 2, 2, 1),
(80, 'qu est ion 223', 'com me nt 223', 2, 3, 1),
(81, 'qu est ion 2210', 'com me nt 2210', 2, 10, 1),
(82, 'qu e st ion 2410', 'com m e nt 2410', 4, 10, 1),
(83, 'qu e st ion 252', 'com m e nt 252', 5, 2, 1),
(84, 'qu e st ion 253', 'com m e nt 253', 5, 3, 1),
(85, 'qu e st ion 2510', 'com m e nt 2510', 5, 10, 1),
(86, 'qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410qu e st ion 2410', 'com m e nt 2410', 4, 10, 1),
(87, 'asd', 'ads', 2, 3, 1),
(88, 'Qwerty', '', 2, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1`
--
ALTER TABLE `1`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `question` (`question`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `resetpwd`
--
ALTER TABLE `resetpwd`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `subjectlist`
--
ALTER TABLE `subjectlist`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `subid` (`subid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `testsubject`
--
ALTER TABLE `testsubject`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `question` (`question`),
  ADD KEY `tid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1`
--
ALTER TABLE `1`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resetpwd`
--
ALTER TABLE `resetpwd`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjectlist`
--
ALTER TABLE `subjectlist`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testsubject`
--
ALTER TABLE `testsubject`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resetpwd`
--
ALTER TABLE `resetpwd`
  ADD CONSTRAINT `resetpwd_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `logindetails` (`sno`);

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `teacher_subject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `logindetails` (`sno`),
  ADD CONSTRAINT `teacher_subject_ibfk_2` FOREIGN KEY (`subid`) REFERENCES `subjectlist` (`subid`),
  ADD CONSTRAINT `teacher_subject_ibfk_3` FOREIGN KEY (`subid`) REFERENCES `subjectlist` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject_ibfk_4` FOREIGN KEY (`tid`) REFERENCES `logindetails` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testsubject`
--
ALTER TABLE `testsubject`
  ADD CONSTRAINT `testsubject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `logindetails` (`sno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
