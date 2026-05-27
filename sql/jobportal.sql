-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2026 at 03:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `job_code` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `expectations` text NOT NULL,
  `salary` int(11) NOT NULL,
  `reporting_line` varchar(255) NOT NULL,
  `requirements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `job_code`, `description`, `responsibilities`, `expectations`, `salary`, `reporting_line`, `requirements`) VALUES
(1, 'Junior Developer Position', 'Jdev1', 'As a Junior Developer you will work across both front-end (HTML) and back-end (CSS) code an ideal position for furthering your experience in the industry early on, with room to expand into further responsibilities', 'Assist in the design, development and testing of our web applications,Debug and troubleshoot application performance,Build and integrate back-end systems for expansion', 'Contribute to technical documentation,Continuously build and improve your technical skills', 60000, 'You will be expected to report to the senior developers of your team', 'Prior experience with HTML5 coding,Basic understanding of industry/web standards,Strong communication and collaboration skills'),
(2, 'Senior Developer Position', 'Sdev1', 'You will help lead a team to build a platform, lead designing and coding fit to the best practices of modern standards', 'Design and develop our platform to above industry standards,Lead your development team through creation of the platform,Drive expansion and integration of the application to requirements', 'Skilled at working to build alignment,Drive decision making,Transparent communication', 138000, 'You will be expected to report to the project head', 'At least 7 years of in industry HTML5 coding,Advanced understanding of industry/web standards,Strong communication and collaboration skills'),
(3, 'UX/UI Designer Position', 'UXD1', 'As a UX/UI Designer you will create intuitive and visually engaging interfaces for our educational platform while collaborating closely with developers and project managers.', 'Design user-friendly web interfaces,Create wireframes and mockups for new features,Collaborate with developers to improve usability', 'Maintain consistency across platform designs,Communicate design decisions clearly,Continuously improve user experience knowledge', 85000, 'You will report directly to the lead product designer', 'Experience with Figma or Adobe XD,Strong understanding of UX principles,Ability to work collaboratively in teams');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
