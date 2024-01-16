-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 10:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softwaredesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(2, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `department` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `name`, `department`, `password`, `created_at`) VALUES
(1, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2023-12-17 18:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `CompanyName` varchar(128) NOT NULL,
  `InternshipStartDate` date DEFAULT NULL,
  `InternshipEndDate` date DEFAULT NULL,
  `internshipType` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `CIFile` varchar(300) NOT NULL,
  `file_content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `std_id`, `CompanyName`, `InternshipStartDate`, `InternshipEndDate`, `internshipType`, `Country`, `CIFile`, `file_content`) VALUES
(1, 5, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(2, 6, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(3, 7, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(4, 8, 'test', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'GRADUATION PROJECT PROPOSAL.pdf', ''),
(5, 9, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(6, 10, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(7, 11, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', ''),
(8, 12, 'toyota du maroc', '2023-07-08', '2023-08-18', 'I-T', 'MOROCCO', 'Internship report.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `logbookstatus` varchar(128) NOT NULL,
  `logbookremark` varchar(255) NOT NULL,
  `logbookclaimed` date DEFAULT NULL,
  `logbooksigned` date DEFAULT NULL,
  `logbooksubmissiondate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `std_id`, `logbookstatus`, `logbookremark`, `logbookclaimed`, `logbooksigned`, `logbooksubmissiondate`) VALUES
(1, 5, 'test', 'test', '0000-00-00', '0000-00-00', '2024-01-08'),
(2, 6, 'n/a', 'n/a', NULL, NULL, NULL),
(3, 7, 'n/a', 'n/a', NULL, NULL, NULL),
(4, 8, 'submitted', 'good', '2024-01-05', '2024-01-04', '2023-11-06'),
(5, 9, 'n/a', 'n/a', NULL, NULL, NULL),
(6, 10, 'n/a', 'n/a', NULL, NULL, NULL),
(7, 11, 'n/a', 'n/a', NULL, NULL, NULL),
(8, 12, 'n/a', 'n/a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `Oralexamstatus` varchar(128) NOT NULL,
  `Oralremarks` varchar(255) NOT NULL,
  `Oraledate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `std_id`, `Oralexamstatus`, `Oralremarks`, `Oraledate`) VALUES
(1, 5, 'n/atest', 'n/atest', '2024-01-02'),
(2, 6, 'bvjhvjh', 'n/a', '2024-01-11'),
(3, 7, 'n/a', 'n/a', NULL),
(4, 8, 'finished', 'good', '2024-01-03'),
(5, 9, 'n/a', 'n/a', NULL),
(6, 10, 'n/a', 'n/a', NULL),
(7, 11, 'n/a', 'n/a', NULL),
(8, 12, 'n/a', 'n/a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinfo`
--

CREATE TABLE `sinfo` (
  `std_id` int(11) NOT NULL,
  `stdname` varchar(128) NOT NULL,
  `stdnumber` varchar(10) NOT NULL,
  `department` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinfo`
--

INSERT INTO `sinfo` (`std_id`, `stdname`, `stdnumber`, `department`, `email`, `created_at`) VALUES
(5, 'test4', 'test3', 'test', 'test@test', '2024-01-02 08:09:30'),
(6, 'vhgvhg', 'bjhbjh', 'hhu', 'hjgjgghj@bjh', '2024-01-03 11:41:52'),
(7, 'gygfyt', 'hihi', 'guyyu', 'fffyt@gg', '2024-01-03 11:52:01'),
(8, 'Sidi Mohamed Elmine', '201701157', 'computer engineering', 'opmc@gmail.com', '2024-01-05 08:41:37'),
(9, 'mimi', '123456789', 'medical', 'smallone@gmail.com', '2024-01-05 08:42:12'),
(10, 'dora', '987654321', 'medical', 'fluffyone@gmail.com', '2024-01-05 08:42:37'),
(11, 'kazuha', '789456123', 'arts', 'something@gmail.com', '2024-01-05 08:43:01'),
(12, 'solomon', '191601141', 'computer engineering', 'hbjhjrf@rtbktbr', '2024-01-05 09:51:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `sinfo`
--
ALTER TABLE `sinfo`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sinfo`
--
ALTER TABLE `sinfo`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `sinfo` (`std_id`);

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `logbook_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `sinfo` (`std_id`);

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `presentation_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `sinfo` (`std_id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`advisor_id`) REFERENCES `advisors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
