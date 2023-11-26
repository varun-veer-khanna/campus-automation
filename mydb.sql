-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 03:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `pwd`, `img`, `course`) VALUES
('abc1', 'abc', 'abc', '', 'bca'),
('xyz1', 'xyz', 'xyz', '', 'b.tech.');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `sr_no` int(11) NOT NULL,
  `course` varchar(8) DEFAULT NULL,
  `sem` varchar(6) DEFAULT NULL,
  `Topic` varchar(30) DEFAULT NULL,
  `assignment_link` varchar(30) DEFAULT NULL,
  `deadline` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`sr_no`, `course`, `sem`, `Topic`, `assignment_link`, `deadline`) VALUES
(0, 'C++', '5', 'Pointers', 'pdf/Pointers.pdf', '11/5/2015');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `student_id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `MST` int(11) DEFAULT NULL,
  `assignments` int(11) DEFAULT NULL,
  `projects` int(11) DEFAULT NULL,
  `seminars` int(11) DEFAULT NULL,
  `other` int(11) DEFAULT NULL,
  `external` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`student_id`, `subject`, `MST`, `assignments`, `projects`, `seminars`, `other`, `external`) VALUES
(1, '1', 12, 12, 12, 12, 12, 12),
(1, '1', 12, 12, 12, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `Name` varchar(20) DEFAULT NULL,
  `Father` varchar(20) DEFAULT NULL,
  `Birth` varchar(20) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Courses` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Contact` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Name`, `Father`, `Birth`, `Gender`, `Address`, `Courses`, `Email`, `Contact`) VALUES
('Abhishek', 'Sant', '27/7/1992', 'Male', 'Solan', 'C', 'aryandev27', '9816194556'),
('Manoj', 'Suresh', '30/10/1992', 'Male', 'Jodhpur', 'JAVA', 'manojparihar27', '9882564563'),
('Sanchit', 'Ramesh', '10/3/1991', 'Male', 'Solan', 'C++', 'sanchitpandeyar', '9886512362'),
('Vishal', 'Sant', '3/3/1990', 'Male', 'Chandigarh', 'JAVA', 'vishalpandeyar', '9856326526');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `student_id` int(11) NOT NULL,
  `ten_uni` varchar(30) DEFAULT NULL,
  `ten_year` int(11) DEFAULT NULL,
  `ten_percent` int(11) DEFAULT NULL,
  `t_uni` varchar(30) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `t_percent` int(11) DEFAULT NULL,
  `gra_uni` varchar(30) DEFAULT NULL,
  `gra_year` int(11) DEFAULT NULL,
  `gra_percent` int(11) DEFAULT NULL,
  `post_uni` varchar(30) DEFAULT NULL,
  `post_year` int(11) DEFAULT NULL,
  `post_percent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`student_id`, `ten_uni`, `ten_year`, `ten_percent`, `t_uni`, `t_year`, `t_percent`, `gra_uni`, `gra_year`, `gra_percent`, `post_uni`, `post_year`, `post_percent`) VALUES
(1, 'sggswu', 2014, 80, 'sggswu', 2014, 80, 'sggswu', 2014, 80, 'sggswu', 2014, 80),
(2, 'sggs', 2004, 70, 'ggddgh', 2006, 70, 'sggswu', 2009, 80, 'hhfs', 20122, 70),
(3, 'sggswu', 2014, 80, 'sggswu', 2014, 80, 'sggswu', 2014, 80, 'sggswu', 2014, 80);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(1) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `f_name` varchar(30) DEFAULT NULL,
  `m_name` varchar(30) DEFAULT NULL,
  `dob` varchar(12) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `email_id` varchar(30) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `student_img` varchar(30) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `date` varchar(12) DEFAULT NULL,
  `course_avail` varchar(20) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `f_name`, `m_name`, `dob`, `gender`, `address`, `email_id`, `contact_no`, `student_img`, `pwd`, `date`, `course_avail`) VALUES
(1, 'def', 'abc', 'xyz', '10/12/1988', 'male', 'chandigarh', 'abc@gmail.com', '9876543211', 'project_form/small_folder.gif', 'fff', '11 Apr 2012', 'b.tech.'),
(2, 'ghi', 'xy', 'yx', '8/12/1994', 'male', 'hvjhs', 'ab@gmail.com', '9555566333', 'project_form/small_folder.gif', 'bye', '12 Jan 2014', 'bca'),
(3, '1', '', '', '12/12/1996', 'female', NULL, '', '', NULL, '', '13 May 2011', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

CREATE TABLE IF NOT EXISTS `student1` (
  `std_id` varchar(20) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `internal` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`std_id`, `sem`, `internal`) VALUES
('1', '3', '30');

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE IF NOT EXISTS `student2` (
  `std_id` varchar(20) DEFAULT NULL,
  `MST1` varchar(20) DEFAULT NULL,
  `MST2` varchar(20) DEFAULT NULL,
  `viva` varchar(20) DEFAULT NULL,
  `sub` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student2`
--

INSERT INTO `student2` (`std_id`, `MST1`, `MST2`, `viva`, `sub`) VALUES
('1', '20', '30', '10', 'RDBMS'),
('1', '20', '30', '10', 'SE');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `sr_no` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `topic` varchar(30) DEFAULT NULL,
  `uploaded_assign` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`sr_no`, `student_id`, `topic`, `uploaded_assign`) VALUES
(3, 2, 'php', 'uploaded_assign/23.docx'),
(1, 2, 'c++', 'uploaded_assign/1.docx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
 ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
