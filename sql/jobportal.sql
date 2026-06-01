-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2026 at 07:45 AM
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
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_ref` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb_town` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `skills` text DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `street_address`, `suburb_town`, `state`, `postcode`, `email`, `phone_number`, `skills`, `other_skills`, `status`) VALUES
(1, 'Jdev1', 'Jane', 'Doe', '2026-05-31', 'F', '2 Main Street', 'Other Example Town', 'NSW', '4321', 'example2@example.com', '87654321', 'Communication', 'Programming', 'Final'),
(2, 'UXID1', 'John', 'Doe', '2026-05-31', 'M', '1 Main Street', 'Example Town', 'VIC', '1234', 'example1@example.com', '12345678', 'Leadership, Communication, Website Development', 'N/A', 'New'),
(3, 'Sdev1', 'John', 'Smith', '2026-05-30', 'X', '3 Main Street', 'Example Suburb', 'NSW', '1243', 'example3@example.com', '18273645', '', '', 'New');

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
(3, 'UX/UI Designer Position', 'UXID1', 'As a UX/UI Designer you will create intuitive and visually engaging interfaces for our educational platform while collaborating closely with developers and project managers.', 'Design user-friendly web interfaces,Create wireframes and mockups for new features,Collaborate with developers to improve usability', 'Maintain consistency across platform designs,Communicate design decisions clearly,Continuously improve user experience knowledge', 85000, 'You will report directly to the lead product designer', 'Experience with Figma or Adobe XD,Strong understanding of UX principles,Ability to work collaboratively in teams');

-- --------------------------------------------------------

--
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `quote` text NOT NULL,
  `quote_lang` varchar(10) NOT NULL DEFAULT 'en',
  `quote_translation` text NOT NULL,
  `quote_source` varchar(100) NOT NULL,
  `project1_contribution` text NOT NULL,
  `project2_contribution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`id`, `name`, `student_id`, `quote`, `quote_lang`, `quote_translation`, `quote_source`, `project1_contribution`, `project2_contribution`) VALUES
(1, 'Cohen Pentland', '106506135', 'Per aspera ad astra.', 'la', '\"Through hardships to the stars.\"', 'Latin', 'Designed and built the About page, including team member profiles, fun facts table, group photo section, and acknowledgement of country.', 'Integrated member contributions into the database and updated the About page to dynamically load data from MySQL via PHP.'),
(2, 'Oliver Wisbey', '106520818', '七転び八起き。', 'ja', '\"Fall seven times, stand up eight.\"', 'Japanese', 'Built the Jobs page, including job listing cards with descriptions, responsibilities, expectations, salary, and requirements pulled from the database.', 'Developed the HR management page (manage.php) for viewing, filtering, sorting, and updating EOI application statuses.'),
(3, 'Connor Taylor', '106348271', 'Petit à petit, l\'oiseau fait son nid.', 'fr', '\"Little by little, the bird builds its nest.\"', 'French', 'Created the Homepage (index page) with the site introduction, navigation layout, and overall page structure and styling.', 'Built shared header and footer include files (header.inc, footer.inc) for consistent navigation and branding across all pages.'),
(4, 'Roman Young', '106520313', 'No hay mal que por bien no venga.', 'es', '\"There is no bad from which good does not come.\"', 'Spanish', 'Built the Application page (apply.php) with the EOI submission form, including all input fields and client-side validation.', 'Implemented the login/logout system (login.php, logout.php) and the EOI form processing backend (process.php) with server-side validation and database insertion.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(2, 'Admin', '$2y$10$V2ndkTA8t.IL.kwkMaps7u.Mz.yKKk8K70xLXl4.PP8AIrM.wRPf.');

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id`            int(11)      NOT NULL AUTO_INCREMENT,
  `content_key`   varchar(100) NOT NULL,
  `content_value` text         NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_content_key` (`content_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`content_key`, `content_value`) VALUES
('group_name',                  'Github Gooners'),
('class_time',                  'Wednesday 10am'),
('unit',                        'COS10026 Web Technology'),
('group_photo_caption',         'Github Gooners — COS10026 Wednesday 10am'),
('acknowledgement_of_country',  'We acknowledge the Wurundjeri Woi-wurrung people of the Kulin Nation as the Traditional Custodians of the land on which Swinburne University is situated in Hawthorn, Victoria. We pay our respects to their Elders past, present, and emerging, and recognise their continuing connection to land, water, and community.');

-- --------------------------------------------------------

--
-- Table structure for table `member_fun_facts`
--

CREATE TABLE `member_fun_facts` (
  `id`            int(11)      NOT NULL AUTO_INCREMENT,
  `member_name`   varchar(100) NOT NULL,
  `fact_key`      varchar(100) NOT NULL,
  `fact_value`    varchar(255) NOT NULL,
  `display_order` int(11)      NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_member_fact` (`member_name`, `fact_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_fun_facts`
--

INSERT INTO `member_fun_facts` (`member_name`, `fact_key`, `fact_value`, `display_order`) VALUES
('Cohen',   'Dream Job',    'Software Engineer',    1),
('Cohen',   'Coding Snack', 'Chips',                1),
('Cohen',   'Hometown',     'Melbourne',            1),
('Oliver',  'Dream Job',    'Web Developer',        2),
('Oliver',  'Coding Snack', 'Coffee',               2),
('Oliver',  'Hometown',     'Melbourne',            2),
('Connor',  'Dream Job',    'UI/UX Designer',       3),
('Connor',  'Coding Snack', 'Chocolate',            3),
('Connor',  'Hometown',     'Melbourne',            3),
('Roman',   'Dream Job',    'Full Stack Developer', 4),
('Roman',   'Coding Snack', 'Energy Drink',         4),
('Roman',   'Hometown',     'Melbourne',            4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_content_key` (`content_key`);

--
-- Indexes for table `member_fun_facts`
--
ALTER TABLE `member_fun_facts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_member_fact` (`member_name`, `fact_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_fun_facts`
--
ALTER TABLE `member_fun_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
