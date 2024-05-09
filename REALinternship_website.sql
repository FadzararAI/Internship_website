-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2024 at 07:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_details`
--

DROP TABLE IF EXISTS `application_details`;
CREATE TABLE IF NOT EXISTS `application_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_uid` int NOT NULL,
  `student_name` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_cv` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_target_name` varchar(535) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `job_title` mediumtext NOT NULL,
  `salary` int NOT NULL,
  `duration` int NOT NULL,
  `job_location` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_uid` (`student_uid`),
  KEY `company_target_name` (`company_target_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int NOT NULL,
  `name` varchar(535) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logo_fname` varchar(535) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo_fname`, `description`) VALUES
(4, 'Asus', 'asus.png', 'Asus leads the technology'),
(6, 'Huawei', 'huawei.png', 'Huawei leads the advancement'),
(3, 'IBM', 'ibm.png', 'IBM is the coolest'),
(7, 'Intel', 'intel.png', 'Intel is the best CPU maker'),
(1, 'Microsoft', 'microsoft.png', 'Microsoft is a great company'),
(2, 'Nestle', 'nestle.png', 'Nestle is one of the best'),
(9, 'Netflix', 'netflix.png', 'Netflix is the best entertainment platform'),
(10, 'Oracle', 'oracle.png', 'Oracle is the best vendor'),
(5, 'PayPal', 'paypal.png', 'PayPal is the best payment method'),
(11, 'Siemens', 'siemens.png', 'Siemens leads the manufacturing industry'),
(8, 'TikTok', 'tiktok.png', 'TikTok is the best platform');

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

DROP TABLE IF EXISTS `company_users`;
CREATE TABLE IF NOT EXISTS `company_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email_address` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_users`
--

INSERT INTO `company_users` (`id`, `email_address`, `password`) VALUES
(1, 'oliver@microsoft.com', 'oliveratmicrosoft'),
(2, 'brian@id.nestle.com', 'brianatnestle'),
(3, 'timothy@my.ibm.com', 'timothyatibm'),
(4, 'harry@asus.com', 'harryatasus'),
(5, 'edward@paypal.com', 'edwardatpaypal'),
(6, 'chen@huawei.cn', 'chenathuawei'),
(7, 'amelia@intel.com', 'ameliaatintel'),
(8, 'audrey@tiktok.com', 'audreyattiktok'),
(9, 'avery@netflix.com', 'averyatnetflix'),
(10, 'steven@oracle.com', 'stevenatoracle'),
(11, 'lucas@siemens.com', 'lucasatsiemens');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

DROP TABLE IF EXISTS `job_details`;
CREATE TABLE IF NOT EXISTS `job_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `job_kind` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `salary` int NOT NULL,
  `bonuses` text NOT NULL,
  `responsibilities` text NOT NULL,
  `qualifications` text NOT NULL,
  `duration` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_name` (`company_name`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`id`, `company_name`, `company_id`, `title`, `location`, `job_kind`, `type`, `salary`, `bonuses`, `responsibilities`, `qualifications`, `duration`) VALUES
(4, 'Microsoft', 1, 'Senior Software Engineer', 'Jakarta', 'Work From Office', 'Technology', 8000000, 'Health Insurance;Bonus Allowance', 'Assisting in the optimization of sales and operations workflows;Fill out data tables;Analyzing data and make decision of the\r\nbest offers;Developing and processing daily reports Developing\r\nand processing weekly reports', 'Bachelor\'s degree in Business, Economics/ International Business/ Law.;Fluent in English;Minimum of 4 year of experience in administrative or operations support roles.;Proficiency in Microsoft Office Suite (Word, Excel, Outlook) and other relevant software applications.', 6),
(6, 'Nestle', 2, 'Marketing Manager', 'Bandung', 'Work From Home', 'Marketing', 7000000, 'THR;Health Insurance', 'Developing and implementing strategic marketing plans;Conducting market research and analyzing consumer behavior;Managing advertising campaigns and promotional activities.', 'Bachelor\\\'s degree in Marketing or related field;Minimum of 5 years of experience in marketing roles;Strong communication and leadership skills.', 9),
(7, 'IBM', 3, 'Financial Analyst', 'Surabaya', 'Work From Offce', 'Finance', 6000000, 'Bonus Allowance;Catering', 'Analyzing financial data and creating financial models;Forecasting future financial trends and presenting reports;Providing recommendations to improve financial performance.', 'Bachelor\\\'s degree in Finance, Accounting, or related field;Proficiency in financial software and MS Excel;Strong analytical and problem-solving skills.', 3),
(8, 'Microsoft', 1, 'Data Analyst', 'Bandung', 'WFO', 'Technology', 9000000, 'a;b;c;', 'd;e;f;', 'h;i;j;', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `firstname` mediumtext NOT NULL,
  `lastname` mediumtext NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `cv` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `user_id`, `firstname`, `lastname`, `dateofbirth`, `gender`, `location`, `cv`) VALUES
(1, 1, 'Fadzar', 'Ainurizky', '2002-10-21', 'male', 'Jakarta', 'fadzarar.pdf'),
(2, 2, 'Dicky', 'Trianza', '2012-07-16', 'male', 'Jakarta', 'dickya.pdf'),
(8, 11, 'John', 'Doe', '1996-03-21', 'male', 'Jakarta', ''),
(9, 12, 'a', 'b', '2024-04-19', 'male', 'Jakarta', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_users`
--

DROP TABLE IF EXISTS `student_users`;
CREATE TABLE IF NOT EXISTS `student_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email_address` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `profile_picture` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_users`
--

INSERT INTO `student_users` (`id`, `email_address`, `password`, `profile_picture`) VALUES
(1, 'fadzarar@gmail.com', 'fadzararusegmail', 'fdz.png'),
(2, 'dicky@su.mail', 'dickyusesu', 'dicky.jpg'),
(11, 'johndoe@myemail.net', 'johndoeusesmyemail', ''),
(12, 'a@a.com', 'abc', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_details`
--
ALTER TABLE `application_details`
  ADD CONSTRAINT `application_details_ibfk_1` FOREIGN KEY (`student_uid`) REFERENCES `student_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_details_ibfk_2` FOREIGN KEY (`company_target_name`) REFERENCES `company` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id`) REFERENCES `company_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`company_name`) REFERENCES `company` (`name`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `job_details_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
