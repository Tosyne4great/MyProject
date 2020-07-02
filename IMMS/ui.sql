-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 11:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4', '2017-10-30 11:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `subunit_name` varchar(150) DEFAULT NULL,
  `subunit_short_name` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `subunit_name`, `subunit_short_name`, `CreationDate`) VALUES
(1, 'Networking', 'NETWRK', '2019-02-07 14:40:56'),
(2, 'Software', 'SFW', '2019-02-07 14:41:16'),
(3, 'Hardware', 'HRW', '2019-02-07 14:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Supervisor` varchar(5) NOT NULL,
  `Subunit` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Position_type` varchar(200) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Supervisor`, `Subunit`, `Address`, `Position_type`, `Phonenumber`, `Status`, `RegDate`) VALUES
(1, 'COMUI/15388', 'Tomisin', 'Owolabi', 'oluwatomisin.owolabi@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'Yes', 'Networking', 'Ijokodo, Ibadan', 'Permanent staff', '08140341105', 1, '2019-02-07 16:39:53'),
(2, 'COMUI/14373', 'Deborah', 'Adeyemi', 'deborahadeyemi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Female', 'No', 'Software', 'Ibadan', 'Corp member', '08042668234', 1, '2019-02-07 16:41:46'),
(3, 'COMUI/26387', 'Winner', 'Onalapo', 'winneronalapo@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'No', 'Hardware', 'Ibadan', 'Corp member', '07092345683', 1, '2019-02-07 16:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `Subunit` varchar(20) NOT NULL,
  `Position_type` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Task` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `Subunit`, `Position_type`, `ToDate`, `FromDate`, `Task`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`) VALUES
(1, 'Networking', 'Permanent staff', '31/01/2019', '04/01/2019', '•	Continuation of my online courses.\r\n•	Established the relationship (using the Entity Relationship Diagram) between the tables used for the staff appraisal online form using Microsoft Access. \r\n•	Installed HP Laser jet printer to the PC of one of the senior staff at the provost\'s office. \r\n', '2019-02-07 17:04:59', 'Not satisfied', NULL, 0, 0, 1),
(2, 'Software', 'Corp member', '31/01/2019', '04/01/2019', '•	Continuation of my online courses.\r\n•	Established the relationship (using the Entity Relationship Diagram) between the tables used for the staff appraisal online form using Microsoft Access. \r\n•	Installed HP Laser jet printer to the PC of one of the senior staff at the provost\'s office. \r\n•	Sketched out the site map for the college website indicating the dead links.\r\n•	Went for hubround at IMRAT and Ajose building.\r\n•	Continuation of the online implementation of the staff appraisal form\r\n•	Continuation of my online courses.\r\n•	Preparation of Manual for Advanced Microsoft Word and Excel.', '2019-02-07 17:07:39', 'Satisfactory', '2019-02-08 20:29:42 ', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `position_type` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `position_type`, `description`, `CreationDate`) VALUES
(2, 'Permanent staff', 'The department\'s regular staff', '2019-02-07 14:28:12'),
(3, 'Corp member', 'One year service', '2019-02-07 14:28:28'),
(4, 'Intern', '3, 6 months or 1 year internship', '2019-02-07 14:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
