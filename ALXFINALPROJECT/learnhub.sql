-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 08:32 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `instructor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `instructor_id`, `created_at`) VALUES
(1, 'Web Development Basics', 'Learn the foundations of web development, including HTML, CSS, and JavaScript.', 1, '2025-01-09 14:30:40'),
(2, 'Introduction to Python', 'Master the basics of Python programming and start building your own projects.', 1, '2025-01-09 14:30:40'),
(3, 'Graphic Design Essentials', 'Explore the principles of design and learn how to create stunning visuals.', 5, '2025-01-09 14:30:40'),
(4, 'Digital Marketing 101', 'Understand the fundamentals of digital marketing and how to grow your online presence.', 4, '2025-01-09 14:30:40'),
(5, 'Cybersecurity Essentials', 'Learn the fundamentals of cybersecurity, including network security, cryptography, and threat detection.', 2, '2025-01-09 14:30:40'),
(6, 'Software Engineering 101', 'Understand the key concepts of software engineering, including algorithms, data structures, and software development methodologies.', 3, '2025-01-09 14:30:40'),
(7, 'Virtual Assistant Training', 'Learn how to become an effective virtual assistant, managing tasks like scheduling, email communication, and customer service.', 3, '2025-01-09 14:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `content_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `enrollment_date`) VALUES
(1, 4, 3, '2025-01-09 14:37:21'),
(2, 1, 6, '2025-01-09 19:03:47'),
(3, 5, 4, '2025-01-10 08:39:27'),
(4, 6, 1, '2025-01-10 09:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Rose Mwende', 'tt@gmail.com', '$2y$10$.57QJbg6qvNxogMuPI1k/Odl8KygPCIYPCovIrXywq7NRAQ2KdEZG', '2025-01-07 19:37:07'),
(2, 'James Juma', 'james4@gmail.com', '$2y$10$gxt9Eeic/rnqSx3zfbze0O/TbP1Opb0XaRNW47BRzP6x3VIfFNxGC', '2025-01-08 15:09:49'),
(3, 'Lennis Peter', 'len2@gmail.com', '$2y$10$OxQV1zmoNcxBhjcmKyN03eQEVaeqMv.yIwz3LrUZ8RLs.MgMbbzEa', '2025-01-08 15:21:57'),
(4, 'Derrick juma', 'deri@gmail.com', '$2y$10$Q/nWSw0HAosVPtkvDkGA7eAxiaBJ/62HgcfXc9Hqi.g7nlSOGB7pm', '2025-01-09 10:29:17'),
(5, 'Marko James', 'mar@gmail.com', '$2y$10$u8H15621FVa0ul9Doxy6SOs35XcxyiWnKcVhTCLS2aHKns2bpI6qO', '2025-01-10 08:38:48'),
(6, 'jane marko', 'jane@gmail.com', '$2y$10$klyiJMfd8QvCGt99Aptif.54y4o71baOOwH7ybRYF8.Ux6rwF8zdm', '2025-01-10 09:24:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
