-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 11:12 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curriculum`
--
CREATE DATABASE IF NOT EXISTS `curriculum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `curriculum`;

-- --------------------------------------------------------

--
-- Table structure for table `anim-1516`
--

CREATE TABLE `anim-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anim-1516`
--

INSERT INTO `anim-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `ID` int(5) NOT NULL,
  `SID` int(15) NOT NULL,
  `Term` int(2) NOT NULL,
  `Subjects` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fd-1516`
--

CREATE TABLE `fd-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fd-1516`
--

INSERT INTO `fd-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `fm-1516`
--

CREATE TABLE `fm-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm-1516`
--

INSERT INTO `fm-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `gd-1516`
--

CREATE TABLE `gd-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd-1516`
--

INSERT INTO `gd-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `mm-1516`
--

CREATE TABLE `mm-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm-1516`
--

INSERT INTO `mm-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `mma-1516`
--

CREATE TABLE `mma-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mma-1516`
--

INSERT INTO `mma-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `se-1516`
--

CREATE TABLE `se-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se-1516`
--

INSERT INTO `se-1516` (`Term`, `Subjects`) VALUES
(1, 'MATH1,INTROIT,PROG,EUTH,PE1,FIL1,ENG1,'),
(2, 'FIL2,ENG2,MATH2,PROG1,LOGIDES,NSTP1,FIL1,'),
(3, 'ARTAP,ENG3,MATH3,PROG2,DATSTRUCT,NSTP2,PE3,ENG1,FIL1,'),
(4, 'HIST1,PSYCH,ECON,MATH4,JAVA1,DATABASE,PE4,'),
(5, 'PHILO,PHYS1,ENG4,JAVA2,WEBPROG1,SOFTENG1,'),
(6, 'PHYS2,MATH5,MOBCOM1,JAVA3,WEBPROG2,SOFTENG2,'),
(7, 'MATH6,JAVA4,MOBCOM2,PROJMAN,SERM,SEELECT1,'),
(8, 'MATH7,SOCCUL,OPERSYS,SETHES1,SEELECT2,SEELECT3,'),
(9, 'PETHICS,RIZAL,DATACOM,HCI,SETHES2,SEELECT4,'),
(10, 'INTERN1,'),
(11, 'INTERN2,'),
(12, 'COMARCH,SYSNET,THECOM,TECHNO,SEFELECT1,SEFELECT2,');

-- --------------------------------------------------------

--
-- Table structure for table `wd-1516`
--

CREATE TABLE `wd-1516` (
  `Term` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd-1516`
--

INSERT INTO `wd-1516` (`Term`, `Subjects`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anim-1516`
--
ALTER TABLE `anim-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fd-1516`
--
ALTER TABLE `fd-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `fm-1516`
--
ALTER TABLE `fm-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `gd-1516`
--
ALTER TABLE `gd-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `mm-1516`
--
ALTER TABLE `mm-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `mma-1516`
--
ALTER TABLE `mma-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `se-1516`
--
ALTER TABLE `se-1516`
  ADD PRIMARY KEY (`Term`);

--
-- Indexes for table `wd-1516`
--
ALTER TABLE `wd-1516`
  ADD PRIMARY KEY (`Term`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anim-1516`
--
ALTER TABLE `anim-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fd-1516`
--
ALTER TABLE `fd-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fm-1516`
--
ALTER TABLE `fm-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gd-1516`
--
ALTER TABLE `gd-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mm-1516`
--
ALTER TABLE `mm-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mma-1516`
--
ALTER TABLE `mma-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `se-1516`
--
ALTER TABLE `se-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wd-1516`
--
ALTER TABLE `wd-1516`
  MODIFY `Term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;--
-- Database: `enrollment`
--
CREATE DATABASE IF NOT EXISTS `enrollment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `enrollment`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `Type` varchar(8) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `email`, `Type`, `Password`) VALUES
(1, '', 'Admin', 'password'),
(2012479131, 'brays_420@yahoo.com', 'Admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `ID` int(10) NOT NULL,
  `actCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Picture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Picture`) VALUES
(1, 'Admin', 'admin.jpg'),
(2012479131, 'Brice Brays Bryce', '2012479131.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `UserID` int(15) NOT NULL,
  `Title` varchar(80) NOT NULL,
  `Message` varchar(5000) DEFAULT NULL,
  `Icon` varchar(30) DEFAULT NULL,
  `Color` varchar(15) NOT NULL,
  `isRead` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `ID` bigint(15) NOT NULL,
  `Total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` bigint(15) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Province` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Start` varchar(20) NOT NULL,
  `End` varchar(20) DEFAULT NULL,
  `Color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `ID` bigint(20) NOT NULL,
  `Midterm` int(2) NOT NULL,
  `Final` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `ID` int(10) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `MName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ID` int(15) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `MName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(5) NOT NULL,
  `Sender` bigint(15) NOT NULL,
  `Recipient` bigint(15) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(32767) NOT NULL,
  `Attachment` varchar(50) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileSize` varchar(30) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `isRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `ID` int(15) NOT NULL,
  `Code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `ID` int(3) NOT NULL,
  `ProfID` bigint(15) NOT NULL,
  `Section` varchar(25) NOT NULL,
  `Code` varchar(25) NOT NULL,
  `Files` varchar(255) NOT NULL,
  `FileCount` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `ID` int(15) NOT NULL,
  `Year` varchar(25) NOT NULL,
  `Term` varchar(25) NOT NULL,
  `Enrollment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`ID`, `Year`, `Term`, `Enrollment`) VALUES
(1, '2016', '1st', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(10) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `MName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Age` int(2) NOT NULL,
  `Year` varchar(7) NOT NULL,
  `Course` varchar(15) NOT NULL,
  `Curriculum` varchar(25) NOT NULL,
  `Picture` varchar(25) NOT NULL,
  `Subjects` varchar(255) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject12016`
--

CREATE TABLE `subject12016` (
  `SID` int(11) NOT NULL,
  `SCode` varchar(15) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `Room` varchar(10) DEFAULT NULL,
  `Time` int(4) DEFAULT NULL,
  `Day` varchar(2) DEFAULT NULL,
  `ProfID` int(15) DEFAULT NULL,
  `Count` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject12016`
--

INSERT INTO `subject12016` (`SID`, `SCode`, `Section`, `Room`, `Time`, `Day`, `ProfID`, `Count`) VALUES
(15, 'FIL1', 'SE11', '101', 800, 'M', 2016000007, 0),
(16, 'ENG1', 'SE11', '101', 1130, 'M', 2016000006, 0),
(17, 'MATH1', 'SE11', '204', 1445, 'W', 2016000008, 0),
(18, 'INTROIT', 'SE11', 'LAB1', 1800, 'W', 2016000008, 0),
(19, 'EUTH', 'SE11', '100', 1200, 'F', 2016000010, 0),
(20, 'PE1', 'SE11', '206', 1300, 'F', 2016000008, 0),
(21, 'FIL1', 'SE12', '202', 1445, 'T', 2016000007, 0),
(22, 'ENG1', 'SE12', '102', 1800, 'T', 2016000006, 0),
(23, 'INTROIT', 'SE12', 'LAB2', 1130, 'TH', 2016000008, 0),
(24, 'MATH1', 'SE12', '404', 800, 'TH', 2016000008, 0),
(25, 'EUTH', 'SE12', '212', 2000, 'S', 2016000010, 0),
(26, 'PE1', 'SE12', '209', 1800, 'S', 2016000007, 0),
(27, 'LOGIDES', 'GD12', '113', 800, 'M', 2016000010, 0),
(28, 'LOGIDES', 'GD13', '118', 1445, 'TH', 2016000010, 0),
(29, 'HIST1', 'A11', '202', 1445, 'W', 2016000010, 0),
(30, 'HIST1', 'SE21', '202', 1800, 'S', 2016000010, 0),
(31, 'PSYCH', 'SE21', '304', 1800, 'M', 2016000008, 0),
(32, 'ECON', 'SE21', '307', 1800, 'T', 2016000008, 0),
(33, 'MATH4', 'SE21', '302', 1445, 'M', 2016000007, 0),
(34, 'JAVA1', 'SE21', 'LAB2', 1800, 'TH', 2016000007, 0),
(35, 'DATABASE', 'SE21', '106', 1445, 'F', 2016000006, 0),
(36, 'PE4', 'SE21', '301', 1800, 'W', 2016000006, 0),
(37, 'ENG1', 'SE22', '107', 800, 'M', 2016000008, 0),
(40, 'INTROIT', 'SE13', 'LAB3', 800, 'F', 2016000006, 0),
(41, 'PROG1', 'SE11', 'Lab7', 800, 'S', 2016000016, 0),
(42, 'PROG1', 'SE12', 'Lab7', 1800, 'F', 2016000016, 0),
(43, 'MATH4', 'WD41', '806', 800, 'TH', 2016000016, 0),
(44, 'JAVA1', 'FA42', '705', 800, 'TH', 2016000015, 0),
(45, 'TECHNO', 'SE12', '101', 800, 'W', 2016000015, 0),
(46, 'INTROIT', 'SE11', 'Lab6', 1800, 'F', 2016000020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject22016`
--

CREATE TABLE `subject22016` (
  `SCode` int(15) NOT NULL,
  `Section` int(15) NOT NULL,
  `Room` int(10) NOT NULL,
  `Time` int(4) NOT NULL,
  `Day` int(2) NOT NULL,
  `ProfID` int(15) NOT NULL,
  `Count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `ID` int(11) NOT NULL,
  `SCode` varchar(15) NOT NULL,
  `Subject Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Lab` int(1) NOT NULL,
  `Lec` int(1) NOT NULL,
  `Requisite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`ID`, `SCode`, `Subject Name`, `Description`, `Lab`, `Lec`, `Requisite`) VALUES
(1, 'a1', 'asd', 'asdasdasd', 2, 0, '0'),
(8, 'FIL1', 'Filipino 1', 'KOMUNIKASYON SA AKADEMIKONG FILIPINO', 0, 3, '0'),
(9, 'ENG1', 'English 1', 'Critical Reading and Thinking Skills', 0, 3, '0'),
(10, 'MATH1', 'Mathematics 1', 'College Algebra', 0, 3, '0'),
(11, 'INTROIT', 'Intro to IT', 'Introduction to Information Technology', 2, 1, '0'),
(12, 'EUTH', 'Euthenics', 'Euthenics', 0, 1, '0'),
(13, 'PE1', 'Physical Education 1', 'Physical Fitness and Health', 0, 2, '0'),
(14, 'FIL2', 'Filipino 2', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 0, 3, '8'),
(15, 'ENG2', 'English 2', 'Oral Communication and Public Speaking', 0, 3, '9'),
(16, 'MATH2', 'Mathematics 2', 'Statistics and Probabilities', 0, 3, '10'),
(17, 'PROG1', 'Programming 1', 'Advanced Programming', 2, 1, '11-73'),
(18, 'LOGIDES', 'Logical Design', 'Digital Logical Design', 0, 3, '0'),
(19, 'NSTP1', 'NSTP 1', 'National Service Training Program 1', 0, 1, '0'),
(20, 'PE2', 'Physical Education 2', 'Rhytmic Activities and Dance', 0, 2, '13'),
(21, 'ARTAP', 'Humanities', 'Art Appreciation', 0, 3, '0'),
(22, 'ENG3', 'English 3', 'Business Communication and Writing', 0, 3, '15'),
(23, 'MATH3', 'Mathematics 3', 'Trigonometry', 0, 3, '16'),
(24, 'PROG2', 'Programming 2', 'Object Oriented Programming', 2, 1, '17'),
(25, 'DATSTRUCT', 'Data Structures', 'Data Structures', 2, 1, '18'),
(26, 'NSTP2', 'NSTP 2', 'National Service Training Program 2', 0, 2, '19'),
(27, 'PE3', 'Physical Education 3', 'Individual or Dual Sports', 0, 2, '20'),
(28, 'HIST1', 'History 1', 'Philippine History', 0, 3, '0'),
(29, 'PSYCH', 'Psychology', 'General Psychology', 0, 3, '0'),
(30, 'ECON', 'Economics', 'Economics and Taxation', 0, 3, '0'),
(31, 'MATH4', 'Mathematics 4', 'Discrete Mathematics', 0, 3, '23'),
(32, 'JAVA1', 'Java 1', 'Core Java 1', 2, 1, '24-25'),
(33, 'DATABASE', 'Database', 'Database Systems', 2, 1, '25'),
(34, 'PE4', 'Physical Education 4', 'Team Sports', 0, 2, '27'),
(35, 'PHILO', 'Philosophy', 'Philosophy of Man', 0, 3, '0'),
(36, 'PHYS1', 'Physics 1', 'Mechanics and Thermodynamics', 0, 3, '23'),
(37, 'ENG4', 'English 4', 'World Literature', 0, 3, '22'),
(38, 'JAVA2', 'Java 2', 'Core Java 2', 2, 1, '32'),
(39, 'WEBPROG1', 'Website Programming 1', 'Website Programming 1', 2, 1, '24-25'),
(40, 'SOFTENG1', 'Software Engineering 1', 'Software Engineering 1', 0, 3, '0'),
(41, 'PHYS2', 'Physics 2', 'Waves and Optics', 0, 3, '36'),
(42, 'MATH5', 'Mathematics 5', 'Differential Calculus', 0, 3, '23'),
(43, 'MOBCOM1', 'Mobile Computing 1', 'Mobile Programming 1', 2, 1, '0'),
(44, 'JAVA3', 'Java 3', 'Enterprise Java 1', 2, 1, '38'),
(45, 'WEBPROG2', 'Website Programming 2', 'Website Programming 2', 2, 1, '39'),
(46, 'SOFTENG2', 'Software Engineering 2', 'Software Engineering 2', 2, 1, '40'),
(47, 'MATH6', 'Mathematics 6', 'Integral Calculus', 0, 3, '42'),
(48, 'JAVA4', 'Java 4', 'Enterprise Java 2', 2, 1, '44'),
(49, 'MOBCOM2', 'Mobile Computing 2', 'Mobile Programming 2', 2, 1, '43'),
(50, 'PROJMAN', 'Project Management', 'Project Management', 0, 3, '0'),
(51, 'SERM', 'SE Research', 'Research Methods', 0, 3, '46'),
(52, 'SEELECT1', 'SE Elective 1', 'Software Engineering Elective 1', 2, 1, '0'),
(53, 'MATH7', 'Mathematics 7', 'Linear Algebra and Differential Equations', 0, 3, '47'),
(54, 'SOCCUL', 'Society and Culture', 'Social Anthropology with Family Planning', 0, 3, '0'),
(55, 'OPERSYS', 'Operating Systems', 'Operating Systems', 0, 3, '0'),
(56, 'SETHES1', 'SE Thesis 1', 'Software Engineering Thesis 1', 0, 3, '51'),
(57, 'SEELECT2', 'SE Elective 2', 'Software Engineering Elective 2', 2, 1, '0'),
(58, 'SEELECT3', 'SE Elective 3', 'Software Engineering Elective 3', 2, 1, '0'),
(59, 'PETHICS', 'Professional Ethics', 'Professional Ethics and Practices', 0, 3, '0'),
(60, 'RIZAL', 'Rizal', 'Rizal''s Life and Works', 0, 3, '0'),
(61, 'DATACOM', 'Data Communication', 'Data Communications and Computer Networking', 2, 1, '33'),
(62, 'HCI', 'Computer Interaction', 'Human and Computer Interaction', 2, 1, '0'),
(63, 'SETHES2', 'SE Thesis 2', 'Software Engineering Thesis 2', 0, 3, '56'),
(64, 'SEELECT4', 'SE Elective 4', 'Software Engineering Thesis 4', 2, 1, '0'),
(65, 'INTERN1', 'Internship 1', 'Internship 1', 0, 12, '59-63-51'),
(66, 'INTERN2', 'Internship 2', 'Internship 2', 0, 12, '65'),
(67, 'COMARCH', 'Computer Architecture', 'Computer Architecture and Organization', 0, 3, '51'),
(68, 'SYSNET', 'System Administration', 'System and Network Administration', 0, 3, '51-55'),
(69, 'THECOM', 'Theory of Computation', 'Theory of Computation and Automata Theory', 0, 3, '0'),
(70, 'TECHNO', 'Technopreneurship', 'Technopreneurship', 0, 3, '0'),
(71, 'SEFELECT1', 'C# ELECTIVE', 'Software Engineering Free Elective 1', 2, 1, '0'),
(72, 'SEFELECT2', 'SE Free Elective 2', 'Software Engineering Free Elective 2', 2, 1, '0'),
(73, 'PROG', 'Programming', 'Fundamentals of Programming', 2, 1, '0'),
(74, 'qwe', 'asdasd', 'asdasdasd', 2, 1, NULL),
(75, 'Code', 'Name', 'Description', 2, 4, '1-8-9-');

-- --------------------------------------------------------

--
-- Table structure for table `tempsubjects`
--

CREATE TABLE `tempsubjects` (
  `ID` int(11) NOT NULL,
  `Subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `T_ID` int(18) NOT NULL,
  `ID` int(10) NOT NULL,
  `Amount` int(15) NOT NULL,
  `Type` varchar(5) NOT NULL,
  `Card Number` varchar(20) NOT NULL,
  `Date` datetime NOT NULL,
  `Term` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject12016`
--
ALTER TABLE `subject12016`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tempsubjects`
--
ALTER TABLE `tempsubjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject12016`
--
ALTER TABLE `subject12016`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `T_ID` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
