-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 12:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Hanan Mohamed', 'superadmin@gmail.com', '$2y$10$/epRSmrv4oBS2sfGapwoiOPapzwjgsJWQHSF5De/AoHDALu6nFm4e');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correct_answer`, `created_at`) VALUES
(49, 'How long is an IPv6 address?', '32 bits', '128 bytes', '64 bits', '16 bytes', '128 bytes', '2020-12-23 11:49:07'),
(50, 'Which protocol does DHCP use at the Transport layer?', 'IP', 'TCP', 'UDP', 'ARP', 'UDP', '2020-12-23 11:50:30'),
(51, 'Where is a hub specified in the OSI model?', 'Session layer', 'Physical layer', 'Data Link layer', 'Application layer', 'Physical layer', '2020-12-23 11:52:23'),
(52, 'Which of the following is private IP address?', '12.0.0.1', '168.172.19.39', '172.15.14.36', '192.168.24.43', '192.168.24.43', '2020-12-23 11:54:23'),
(53, 'If you use either Telnet or FTP, which is the highest layer you are using to transmit data?', 'Application', 'Presentation', 'Session', 'Transport', 'Transport', '2020-12-23 11:56:26'),
(54, 'Which of the following is a layer 2 protocol used to maintain a loop-free network?', 'VTP', 'STP', 'RIP', 'CDP', 'STP', '2020-12-23 11:57:35'),
(55, 'What is the maximum number of IP addresses that can be assigned to hosts on a local subnet that uses the 255.255.255.224 subnet mask?', '14', '15', '16', '30', '30', '2020-12-23 12:00:08'),
(56, 'You need to subnet a network that has 5 subnets, each with at least 16 hosts. Which classful subnet mask would you use?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.224', '2020-12-23 12:01:40'),
(57, 'You have an interface on a router with the IP address of 192.168.192.10/29. Including the router interface, how many hosts can have IP addresses on the LAN attached to the router interface?', '6', '8', '30', '32', '6', '2020-12-23 12:02:31'),
(58, 'The network layer protocol of internet is called?', 'internet protocol', 'hypertext transfer protocol', 'ethernet', 'none of the mentioned', 'internet protocol', '2020-12-23 12:07:34'),
(60, 'What does PHP stand for?', 'Personal Home Page', 'Private Home Page', 'Pretext Hypertext Processor', 'Preprocessor Home Page', 'Pretext Hypertext Processor', '2020-12-24 09:57:57'),
(61, 'Who is the father of PHP?', 'Rasmus Lerdorf', 'Willam Makepiece', 'Drek Kolkevi', 'List Barely', 'Rasmus Lerdorf', '2020-12-24 09:58:54'),
(62, 'PHP files have a default file extension of.', '.html', '.ph', '.php', '.xml', '.php', '2020-12-24 09:59:37'),
(63, 'Which of the looping statements is/are supported by PHP?', 'for loop', 'do-while loop', 'foreach loop', 'All of the above', 'All of the above', '2020-12-24 10:00:22'),
(64, 'Which of the following PHP statements will output Hello World on the screen? 1. echo (“Hello World”); 2. print (“Hello World”); 3. printf (“Hello World”); 4. sprintf (“Hello World”);', '1 and 2', '1, 2 and 3', 'All of the mentioned', '1, 2 and 4', '1, 2 and 3', '2020-12-24 10:02:58'),
(65, 'Which of the following is/are a PHP code editor?', 'Notepad', 'Notepad++', 'Dreamweaver', 'All Of The Above', 'All Of The Above', '2020-12-24 10:17:32'),
(66, 'Which of the following must be installed on your computer so as to run PHP script?', 'IIS', 'PHP', 'APACHE', 'All of the mentioned.', 'All of the mentioned.', '2020-12-24 10:19:19'),
(67, 'Which one of the following function is capable of reading a file into an array?', 'file()', 'arr_file()', 'arrfile()', 'file_arr()', 'file()', '2020-12-24 10:20:50'),
(68, 'A function in PHP which starts with __ (double underscore) is know as..', 'Magic Function', 'Inbuilt Function', 'Default Function', 'User Defined Function', 'Magic Function', '2020-12-24 10:21:45'),
(69, 'Which one of the following statements is used to create a table?', 'CREATE TABLE table_name (column_name column_type);', 'CREATE table_name (column_type column_name);', 'CREATE table_name (column_name column_type);', 'CREATE TABLE table_name (column_type column_name);', 'CREATE TABLE table_name (column_name column_type);', '2020-12-24 10:23:52'),
(70, 'Which of the methods are used to manage result sets using both associative and indexed arrays?', 'get_array() and get_row()', 'fetch_array() and fetch_row()', 'get_array() and get_column()', 'fetch_array() and fetch_column()', 'fetch_array() and fetch_row()', '2020-12-24 10:25:30'),
(71, 'Which one of the following functions can be used to concatenate array elements to form a single delimited string?', 'explode()', 'implode()', 'concat()', 'concatenate()', 'implode()', '2020-12-24 10:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` bigint(20) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `mark_on_right` int(11) NOT NULL,
  `minus_on_wrong` int(11) NOT NULL,
  `quiz_questions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `quiz_title`, `mark_on_right`, `minus_on_wrong`, `quiz_questions`, `created_at`) VALUES
(46, 'IP/TCP', 2, 1, '[71,49,50,51,52,53,54,55,56,57,58]', '2020-12-24 11:43:24'),
(49, 'PHP&amp;MYSQL', 2, 1, '[60,61,62,63,65,66,67,68,69,70,71]', '2020-12-24 12:20:51'),
(51, 'test again', 1, 1, '[49,50,51,52,53,57,58,60,61,62]', '2020-12-24 12:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_result` int(11) NOT NULL,
  `student_correct_answers` text NOT NULL,
  `student_wrong_answers` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `quiz_rank` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `quiz_id`, `quiz_title`, `student_email`, `student_result`, `student_correct_answers`, `student_wrong_answers`, `status`, `quiz_rank`, `created_at`) VALUES
(28, 46, 'IP/TCP', 'quizStudent@gmail.com', 18, '[{\"answer_question_0\":\"implode()\"},{\"answer_question_1\":\"128 bytes\"},{\"answer_question_3\":\"Physical layer\"},{\"answer_question_4\":\"192.168.24.43\"},{\"answer_question_5\":\"Transport\"},{\"answer_question_6\":\"STP\"},{\"answer_question_7\":\"30\"},{\"answer_question_9\":\"6\"},{\"answer_question_10\":\"internet protocol\"}]', '[{\"answer_question_2\":\"TCP\"},{\"answer_question_8\":\"255.255.255.248\"}]', 'success', 22, '2020-12-24 11:15:22'),
(29, 49, 'PHP&amp;MYSQL', 'testStudent@gmail.com', 22, '[{\"answer_question_0\":\"Pretext Hypertext Processor\"},{\"answer_question_1\":\"Rasmus Lerdorf\"},{\"answer_question_2\":\".php\"},{\"answer_question_3\":\"All of the above\"},{\"answer_question_4\":\"All Of The Above\"},{\"answer_question_5\":\"All of the mentioned.\"},{\"answer_question_6\":\"file()\"},{\"answer_question_7\":\"Magic Function\"},{\"answer_question_8\":\"CREATE TABLE table_name (column_name column_type);\"},{\"answer_question_9\":\"fetch_array() and fetch_row()\"},{\"answer_question_10\":\"implode()\"}]', '[]', 'success', 22, '2020-12-24 11:59:00'),
(30, 49, 'PHP&amp;MYSQL', 'test@gmail.com', 16, '[{\"answer_question_2\":\".php\"},{\"answer_question_3\":\"All of the above\"},{\"answer_question_4\":\"All Of The Above\"},{\"answer_question_5\":\"All of the mentioned.\"},{\"answer_question_6\":\"file()\"},{\"answer_question_7\":\"Magic Function\"},{\"answer_question_9\":\"fetch_array() and fetch_row()\"},{\"answer_question_10\":\"implode()\"}]', '[{\"answer_question_0\":\"Personal Home Page\"},{\"answer_question_1\":\"Willam Makepiece\"}]', 'success', 22, '2020-12-24 12:04:46'),
(37, 46, 'IP/TCP', 'testHanan@gmail.com', 10, '[{\"answer_question_1\":\"128 bytes\"},{\"answer_question_3\":\"Physical layer\"},{\"answer_question_5\":\"Transport\"},{\"answer_question_6\":\"STP\"},{\"answer_question_10\":\"internet protocol\"}]', '[{\"answer_question_0\":\"explode()\"},{\"answer_question_2\":\"ARP\"},{\"answer_question_4\":\"168.172.19.39\"},{\"answer_question_7\":\"16\"},{\"answer_question_8\":\"255.255.255.248\"},{\"answer_question_9\":\"8\"}]', 'fail', 22, '2021-03-03 09:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `college`, `created_at`) VALUES
(20, 'Quiz Student', 'quizStudent@gmail.com', '$2y$10$5hP1UfyjOSwbUzO7Ri2AB.g/lJRpyD.31NY3gE0PojSrgB3SlLdyK', 'faculty of computer and information technology', '2020-12-24 11:14:01'),
(21, 'student', 'student@gmail.com', '$2y$10$bB08SgfMZYg1xO/IzjifYe0JWliWAXbA/3pCtd0xvDbfYD2I3x1jC', 'faculty of computer and information technology', '2020-12-24 11:24:28'),
(22, 'testStudent', 'testStudent@gmail.com', '$2y$10$wGhlQeBsh1Gyhm8hJqpcauAocWF7Ou5ai.7D1LD1R4Wv2oJo0KDly', 'Computer Science', '2020-12-24 11:57:36'),
(23, 'test', 'test@gmail.com', '$2y$10$Cs685qod28WUKGg83ZzU6OB9HCWZ3xsaySA3B5/zmHjt3h9f58Sa.', 'faculty of computer and information technology', '2020-12-24 12:02:38'),
(24, 'Hanan Mohamed222', 'testHanan@gmail.com', '$2y$10$/epRSmrv4oBS2sfGapwoiOPapzwjgsJWQHSF5De/AoHDALu6nFm4e', 'faculty of computer and information technology&lt;br&gt;', '2021-03-03 09:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `student_email` (`student_email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
