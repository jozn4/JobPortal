-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 05:28 PM
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
-- Database: `db_jobportalfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `loginid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`loginid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `companyid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `licensenumber` varchar(30) NOT NULL,
  `locationid` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `contactnum` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `renewaldate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`companyid`, `name`, `email`, `photo`, `licensenumber`, `locationid`, `regdate`, `contactnum`, `username`, `password`, `status`, `description`, `plan_id`, `renewaldate`) VALUES
(24, 'Infosys', 'alenjohn3000@gmail.com', 'infosys-nyn-tagline-jpg.jpg', 'U72200KL2010PTC025678', 11, '2025-10-02', '2147483647', 'alen', 'alen@3000', 'accepted', 'Infosys is a global leader in IT consulting and services with a strong presence in Kerala.\r\nIt offer', 2, '2025-12-31'),
(25, 'Wipro', 'wipro1231@gmail.com', 'WIT-1453b096.png', 'T72200KL2010PTC025623', 5, '2025-10-02', '2147483647', 'wipro', 'wipro@3000', 'accepted', 'Wipro is a leading global IT services and consulting company, delivering innovative solutions to cli', 2, '2025-12-31'),
(26, 'Oracle', 'oracle2221@gmail.com', 'Logo_oracle.jpg', 'H2342P142342', 9, '2025-10-02', '2147483647', 'oracle', 'oracle@3000', 'accepted', 'Oracle is a global technology company specializing in cloud solutions, database management, and ente', 3, '2026-04-02'),
(27, 'TCS', 'tcs12134@gmail.com', 'TCS-Logo-Tata-consultancy-service-1920x1144.png', 'P1232H12334', 8, '2025-10-02', '2147483647', 'tcs', 'tcs@3000', 'accepted', 'TCS is a leading global IT services, consulting, and business solutions organization.\r\nWe help busin', 2, '2025-12-31'),
(28, 'IBS software', 'ibs12323@gmail.com', 'images.png', 'P1232H22312334', 7, '2025-10-02', '2147483647', 'ibs', 'ibs@3000', 'accepted', 'IBS Software is a global provider of innovative software solutions for the travel, transportation, a', 0, NULL),
(29, 'Nest', 'nest23423@gmail.com', 'nest-digital-squarelogo-1647421869741.webp', 'Z4232H2232334', 4, '2025-10-02', '2147483647', 'nest', 'nest@3000', 'accepted', 'NEST is a forward-thinking company focused on innovative technology solutions and smart digital prod', 2, '2025-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companypost`
--

CREATE TABLE `tbl_companypost` (
  `postid` int(11) NOT NULL,
  `postname` varchar(30) NOT NULL,
  `companyid` int(11) NOT NULL,
  `postdate` date NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `enddate` date NOT NULL,
  `jobtypeid` int(11) NOT NULL,
  `jobtime` varchar(50) NOT NULL,
  `jobdescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_companypost`
--

INSERT INTO `tbl_companypost` (`postid`, `postname`, `companyid`, `postdate`, `criteria`, `enddate`, `jobtypeid`, `jobtime`, `jobdescription`) VALUES
(29, 'Frontend developer', 24, '2025-10-02', 'HTML/CSS/JS\r\nResponsive\r\n\r\n', '2025-10-01', 12, 'parttime', 'join our team as a Front-End Developer to build and maintain engaging, user-friendly web interfaces.'),
(30, 'Data Analyst', 24, '2025-10-02', 'SQL\r\nAnalytics\r\nInsights\r\nCommunication', '2025-10-10', 14, 'fulltime', 'Join our team as a Data Analyst to collect, process, and interpret complex datasets.\r\nTranslate data'),
(31, 'Security Analyst', 25, '2025-10-02', 'Networking\r\nMonitoring\r\nSIEM', '2025-10-11', 15, 'fulltime', 'ensuring the protection of systems, networks, and data from cyber threats.\r\nMonitor security alerts,'),
(32, 'Manual Tester', 25, '2025-10-02', 'SDLC/STLC\r\n\r\nTest-cases\r\n\r\nBug-tracking\r\n\r\nAnalysis\r\n\r\nDetail-oriented', '2025-10-12', 18, 'parttime', 'Join our team as a Manual Tester, ensuring software quality through detailed test planning and execu'),
(33, 'AI Engineer', 26, '2025-10-02', 'Python\r\n\r\nML/DL\r\n\r\nData\r\n\r\nCloud\r\n\r\nAnalytics', '2025-10-24', 16, 'fulltime', 'developing intelligent solutions that power next-generation business applications.\r\nDesign, build, a'),
(34, 'Web Designer', 26, '2025-10-02', 'HTML/CSS\r\n\r\nDesign\r\n\r\nResponsive\r\n\r\nUI/UX\r\n\r\nCreativity', '2025-10-16', 17, 'fulltime', 'Creating visually appealing and user-friendly website designs.\r\nWork closely with developers and sta'),
(35, 'Web Developer', 26, '2025-10-02', 'HTML/CSS/JS\r\n\r\nFrameworks\r\n\r\nBack-end\r\n\r\nDatabases\r\n\r\nScalable', '2025-10-11', 17, 'parttime', 'building and maintaining dynamic, high-performing websites and applications.\r\nCollaborate with desig'),
(36, 'frontend developer', 27, '2025-10-02', 'HTML/CSS/JS\r\n\r\nResponsive\r\n\r\nProblem-solving\r\n\r\nGit\r\n\r\nTeamwork', '2025-10-25', 12, 'parttime', 'Join our team as a Front-End Developer to build and maintain engaging, user-friendly web interfaces.'),
(37, 'backend developer', 27, '2025-10-02', 'Node/Python/Java\r\n\r\nDatabases\r\n\r\nAPIs\r\n\r\nSecurity\r\n\r\nScalability', '2025-10-19', 12, 'parttime', 'Join our team as a Back-End Developer, building the server-side logic that powers web and mobile app'),
(38, 'Data Scientist', 29, '2025-10-02', 'Python/R\r\n\r\nML/AI\r\n\r\nStatistics\r\n\r\nBig Data\r\n\r\nVisualization', '2025-10-18', 14, 'parttime', 'Join our team as a Data Scientist, leveraging data to drive innovation and business decision-making.'),
(39, 'Security Engineer', 29, '2025-10-02', 'Networking\r\n\r\nFirewalls\r\n\r\nSIEM\r\n\r\nTesting\r\n\r\nCompliance', '2025-10-17', 15, 'parttime', 'Join our team as a Security Engineer, designing and implementing security measures to protect system'),
(40, 'frontend developer', 29, '2025-10-02', 'HTML/CSS/JS\r\n\r\nFrameworks\r\n\r\nResponsive\r\n\r\nUI/UX\r\n\r\nTeamwork', '2025-10-25', 12, 'parttime', 'Join our team as a Front-End Developer, creating engaging, responsive, and user-friendly web interfa'),
(41, 'backend developer', 29, '2025-10-02', 'HTML/CSS/JS\r\n\r\nFrameworks\r\n\r\nResponsive\r\n\r\nUI/UX\r\n\r\nTeamwork', '2025-10-12', 12, 'fulltime', 'creating engaging, responsive, and user-friendly web interfaces.\r\nWork closely with designers and ba'),
(42, 'Data Analyst', 29, '2025-10-02', 'SQL\r\n\r\nExcel\r\n\r\nVisualization\r\n\r\nStatistics\r\n\r\nInsights', '2025-10-17', 14, 'parttime', 'Join our team as a Data Analyst, transforming raw data into meaningful insights for business growth.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `districtid` int(11) NOT NULL,
  `districtname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`districtid`, `districtname`) VALUES
(1, 'Idukki'),
(2, 'Thiruvananthapuram'),
(3, 'kollam'),
(4, 'Alappuzha'),
(5, 'Pathanamthitta'),
(6, 'Kottayam'),
(7, 'Ernakulam'),
(8, 'Thrissur'),
(9, 'Palakkad'),
(10, 'Malappuram'),
(11, 'Kozhikode'),
(12, 'Wayanad'),
(13, 'Kannur'),
(14, 'Kasaragod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker`
--

CREATE TABLE `tbl_jobseeker` (
  `jobseekerid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactnum` varchar(30) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `locationid` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `dob` date NOT NULL,
  `plan_id` int(11) NOT NULL,
  `renewaldate` date DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobseeker`
--

INSERT INTO `tbl_jobseeker` (`jobseekerid`, `name`, `email`, `contactnum`, `qualification`, `photo`, `username`, `password`, `locationid`, `regdate`, `dob`, `plan_id`, `renewaldate`, `status`) VALUES
(11, 'Manu john', 'alenjohn3000@gmail.com', '2147483647', 'BCA', 'testimonial-2.jpg', 'manu', 'manu@3000', 11, '2025-10-02', '2005-10-17', 2, '2025-12-31', 'registered'),
(12, 'Akash', 'akashtest1212@gmail.com', '2147483647', 'BCA', 'testimonial-1.jpg', 'akash', 'akash@3000', 5, '2025-10-02', '2005-10-01', 0, NULL, 'processing'),
(13, 'Omen', 'omentesat2@gmail.com', '2147483647', 'BCA', 'testimonial-2.jpg', 'omen', 'omen@3000', 6, '2025-10-02', '2025-10-13', 2, '2025-12-31', 'registered'),
(14, 'Devana', 'deva21312test@gmail.com', '923134134', 'BCA', 'testimonial-4.jpg', 'devana', 'deva@123', 7, '2025-10-02', '2025-10-15', 2, '2025-12-31', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobtype`
--

CREATE TABLE `tbl_jobtype` (
  `jobtypeid` int(11) NOT NULL,
  `jobtypename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobtype`
--

INSERT INTO `tbl_jobtype` (`jobtypeid`, `jobtypename`) VALUES
(12, 'Software Development'),
(13, 'IT Infrastructure and Networki'),
(14, 'Data and Analytics'),
(15, 'Cybersecurity'),
(16, 'Artificial Intelligence and Ma'),
(17, 'Web and Digital'),
(18, 'Testing and Quality Assurance'),
(19, 'Project and Business Roles'),
(20, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `locationid` int(11) NOT NULL,
  `locationname` varchar(30) NOT NULL,
  `districtid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`locationid`, `locationname`, `districtid`) VALUES
(3, 'Munnar', 1),
(4, 'Kattappana', 1),
(5, 'Thodupuzha', 1),
(6, 'Varkala', 2),
(7, 'Neyyattinkara', 2),
(8, 'Attingal', 2),
(9, 'Paravur', 3),
(10, 'Pathanapuram', 3),
(11, 'Kazhakkoottam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentplan`
--

CREATE TABLE `tbl_paymentplan` (
  `payid` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `jobseekerid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `renewaldate` date NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paymentplan`
--

INSERT INTO `tbl_paymentplan` (`payid`, `plan_id`, `jobseekerid`, `amount`, `status`, `renewaldate`, `regdate`) VALUES
(16, 2, 13, 799, 'Paid', '2025-12-31', '2025-10-02'),
(17, 2, 11, 799, 'Paid', '2025-12-31', '2025-10-02'),
(18, 2, 14, 799, 'Paid', '2025-12-31', '2025-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentplanc`
--

CREATE TABLE `tbl_paymentplanc` (
  `payid` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `renewaldate` date NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paymentplanc`
--

INSERT INTO `tbl_paymentplanc` (`payid`, `plan_id`, `companyid`, `amount`, `status`, `renewaldate`, `regdate`) VALUES
(10, 2, 24, 799, 'Paid', '2025-12-31', '2025-10-02'),
(11, 2, 25, 799, 'Paid', '2025-12-31', '2025-10-02'),
(12, 3, 26, 1499, 'Paid', '2026-04-02', '2025-10-02'),
(13, 2, 27, 799, 'Paid', '2025-12-31', '2025-10-02'),
(14, 2, 29, 799, 'Paid', '2025-12-31', '2025-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`plan_id`, `plan_name`, `amount`, `duration`) VALUES
(1, 'Monthlyaccess', 199, 30),
(2, 'Quarterlyedge', 799, 90),
(3, 'Half-Year Prime', 1499, 182);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `requestid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `requestdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `biodata` varchar(100) NOT NULL,
  `jobseekerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`requestid`, `postid`, `companyid`, `requestdate`, `status`, `biodata`, `jobseekerid`) VALUES
(1, 30, 24, '2025-10-02', 'requested', 'testimonial-4.jpg', 13),
(12, 30, 24, '2025-10-02', 'accepted', 'com-logo-1.jpg', 11),
(13, 31, 25, '2025-10-02', 'requested', 'com-logo-1.jpg', 11),
(14, 31, 25, '2025-10-02', 'requested', 'com-logo-1.jpg', 13),
(15, 32, 25, '2025-10-02', 'requested', 'about-3.jpg', 13),
(16, 33, 26, '2025-10-02', 'accepted', 'lbs.pdf', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `scheduleid` int(11) NOT NULL,
  `jobseekerid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `scheduledate` date NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`scheduleid`, `jobseekerid`, `postid`, `companyid`, `scheduledate`, `remark`) VALUES
(3, 13, 33, 26, '2025-10-10', 'scheduled'),
(4, 11, 30, 24, '2025-10-08', 'scheduled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  ADD PRIMARY KEY (`loginid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`companyid`);

--
-- Indexes for table `tbl_companypost`
--
ALTER TABLE `tbl_companypost`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`districtid`);

--
-- Indexes for table `tbl_jobseeker`
--
ALTER TABLE `tbl_jobseeker`
  ADD PRIMARY KEY (`jobseekerid`);

--
-- Indexes for table `tbl_jobtype`
--
ALTER TABLE `tbl_jobtype`
  ADD PRIMARY KEY (`jobtypeid`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`locationid`);

--
-- Indexes for table `tbl_paymentplan`
--
ALTER TABLE `tbl_paymentplan`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `tbl_paymentplanc`
--
ALTER TABLE `tbl_paymentplanc`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `companyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_companypost`
--
ALTER TABLE `tbl_companypost`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `districtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_jobseeker`
--
ALTER TABLE `tbl_jobseeker`
  MODIFY `jobseekerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_jobtype`
--
ALTER TABLE `tbl_jobtype`
  MODIFY `jobtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `locationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_paymentplan`
--
ALTER TABLE `tbl_paymentplan`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_paymentplanc`
--
ALTER TABLE `tbl_paymentplanc`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
