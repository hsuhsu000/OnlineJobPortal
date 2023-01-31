-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 05:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinejobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `aName` varchar(255) NOT NULL,
  `aEmail` varchar(255) NOT NULL,
  `aPhNo` varchar(255) NOT NULL,
  `aAddress` varchar(255) NOT NULL,
  `aCV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `uid`, `jid`, `aName`, `aEmail`, `aPhNo`, `aAddress`, `aCV`) VALUES
(73, 3, 4, 'May', 'may@gmail.com', '09782253965', 'Yangon', '2. UML.pdf'),
(78, 1, 5, 'Hsu Shwe Sin Oo', 'hsushwesinoo2002@gmail.com', '09782253965', 'Yangon,Mayangone', '109d732d44806095d8c29e89b8dddb54.jpg'),
(79, 1, 17, 'HsuShweSinOo', 'hsu@gmail.com', '09782253965', 'Yangonn', '0d85e0b9d2e957ceda805a6446fd9850.png'),
(80, 1, 20, 'HsuShweSinOo', 'hsu@gmail.com', '09782253965', 'Yangon,Tarmwe', '7f8378aad23923610c6058f56b8fcc96.jpg'),
(81, 3, 21, 'HsuShweSinOo', 'hsu@gmail.com', '09782253965', 'Yangon,Tarmwe', '0d85e0b9d2e957ceda805a6446fd9850.png');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jid` int(225) NOT NULL,
  `uid` int(11) NOT NULL,
  `companyLogo` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `jobType` varchar(255) NOT NULL,
  `jobLocation` varchar(255) NOT NULL,
  `skillRequired` varchar(255) NOT NULL,
  `jobDescription` text NOT NULL,
  `salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jid`, `uid`, `companyLogo`, `jobTitle`, `companyName`, `category`, `jobType`, `jobLocation`, `skillRequired`, `jobDescription`, `salary`) VALUES
(4, 4, '41a2dc7330380efe5b5df88d6230a4ad.jpg', 'Hair Dresser', 'ABC', 'Beauty', 'Part-Time', 'Thamaing, Yangon', 'Good Skill in hair dressing', 'greeting and welcoming clients to the salon', '200000'),
(5, 5, '7f8378aad23923610c6058f56b8fcc96.jpg', 'Teacher', 'ABCDE', 'Teaching', 'Full-Time', 'Kamayut, Yangon', 'Patient, Good in teaching', 'Teaching ', '300000'),
(17, 4, '3f42779ae7b469804159819c60a7519d.jpg', 'English Teacher', 'Learning Forward', 'Education and training', 'Full-Time', 'Yangon, Dagon', 'High School or Diploma', 'Applicants must be able to speak good English and 1 yr experience in a similar role and completion of high school or equivalent education. ', '3000000'),
(20, 4, '156-1567589_kyoukai-no-kanata-image-anime-girl-glasses-reading.png', 'Junior Executive', 'IT Enterprise', 'Computing and ICT', 'Full-Time', 'Yangon,Hleden', 'Experience in developing web application: PHP, Jav', 'Design, Develop, and maintain web applications, testing for the system', '500000'),
(21, 6, '0d85e0b9d2e957ceda805a6446fd9850.png', 'Junior Executive', 'Brighter Future', 'Computing and ICT', 'Full-Time', 'Yangon,Hleden', 'Experience in developing web application: PHP, Jav', 'Design, Develop, and maintain web applications, testing for the system', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(225) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `uaddress`, `upassword`, `role`) VALUES
(1, 'Hsu', 'hsu@gmail.com', 'Yangon,Mayangone', '123', 'JobSeeker'),
(2, 'KyawKyaw', 'kyawkyaw@gmail.com', 'Yangon,Tarmwe', '12345', 'JobSeeker'),
(3, 'May', 'may@gmail.com', 'Yangon', '1234', 'JobSeeker'),
(4, 'Htet', 'htet@gmail.com', 'Yangon', '12345', 'CompanyRepresentative'),
(5, 'A', 'aa@gmail.com', 'Yangon', '123456', 'CompanyRepresentative'),
(6, 'Papi', 'papi33@gmail.com', 'Yangon', '1111', 'CompanyRepresentative'),
(7, 'arkar', 'arkar@gmial.com', 'shwepyithar', '123', 'JobSeeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `jid` (`jid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jid` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`jid`) REFERENCES `jobs` (`jid`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
