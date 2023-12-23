-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 05:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aip_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `appointment_id` int(30) NOT NULL,
  `schedule` date NOT NULL,
  `patient_id` int(30) NOT NULL,
  `prescription_path` text NOT NULL,
  `remark` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`appointment_id`, `schedule`, `patient_id`, `prescription_path`, `remark`, `status`, `date_created`, `date_updated`) VALUES
(42, '2023-06-04', 79, 'PUE.pdf', '', '3', '2023-05-28 07:05:51', '2023-05-28 23:47:06'),
(43, '2023-06-03', 79, 'Question Bank.doc', '', '2', '2023-05-28 08:21:33', '2023-05-29 13:31:43'),
(44, '2023-05-31', 97, '', '', '3', '2023-05-29 07:52:16', '2023-05-29 11:34:55'),
(45, '2023-05-31', 79, 'VINAYGUPTA-2022-23_EVEN_II--certificate (1).pdf', '', '3', '2023-05-29 09:41:31', '2023-05-29 13:16:03'),
(46, '2023-05-30', 97, '', '', '3', '2023-05-29 12:30:53', '2023-05-29 16:02:12'),
(48, '2023-06-10', 99, '', '', '3', '2023-05-30 19:27:06', '2023-06-01 20:11:21'),
(55, '2023-06-01', 100, '', '', '0', '2023-06-01 20:18:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_test_list`
--

CREATE TABLE `appointment_test_list` (
  `appointment_id` int(30) NOT NULL,
  `test_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_test_list`
--

INSERT INTO `appointment_test_list` (`appointment_id`, `test_id`, `date_created`) VALUES
(42, 29, '2023-05-28 07:05:51'),
(43, 9, '2023-05-28 08:22:28'),
(43, 29, '2023-05-28 08:22:28'),
(43, 30, '2023-05-28 08:22:28'),
(41, 9, '2023-05-28 14:54:57'),
(44, 9, '2023-05-29 07:52:16'),
(44, 30, '2023-05-29 07:52:16'),
(44, 31, '2023-05-29 07:52:16'),
(45, 1, '2023-05-29 09:42:37'),
(45, 29, '2023-05-29 09:42:37'),
(45, 30, '2023-05-29 09:42:37'),
(45, 31, '2023-05-29 09:42:37'),
(46, 9, '2023-05-29 12:30:53'),
(46, 30, '2023-05-29 12:30:53'),
(48, 1, '2023-05-30 19:27:06'),
(48, 9, '2023-05-30 19:27:06'),
(48, 29, '2023-05-30 19:27:06'),
(48, 31, '2023-05-30 19:27:06'),
(55, 29, '2023-06-01 20:18:58'),
(55, 31, '2023-06-01 20:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Vinay Gupta', 'vinay.2124mca1127@kiet.edu', 'billing system', 'I want to know about the billing system'),
(2, 'Shubham Dubey', 'Shubham.2124mca1161@kiet.edu', 'Please reply', 'Tell me about the software');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(30) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `username`, `name`, `gender`, `contact`, `email`, `dob`, `address`, `avatar`, `delete_flag`, `date_created`, `date_updated`) VALUES
(77, '0', 'Prashant Sharma', 'Male', '554546467', '', '1234-05-24', 'Modi Nagar Uttar Pradesh', NULL, 0, '2023-05-25 14:02:08', '2023-05-25 19:35:57'),
(79, '0', 'Nishant Sharma', 'Male', '66756756868', '', '1997-12-12', 'guldhar 2, Sanjay Nagar Ghaziabad', NULL, 0, '2023-05-25 14:05:08', '2023-05-29 09:39:23'),
(97, 'abc', 'Satyam Gubrele', 'Male', '2548578543', '', '1999-10-31', 'Jhashi', NULL, 0, '2023-05-29 07:04:28', NULL),
(98, NULL, 'manoj', 'Male', '856941585625', '', '2003-05-10', 'kiet college', NULL, 0, '2023-05-29 09:40:19', NULL),
(99, 'abc', 'Ravi Shankar', 'Male', '8578958654', '', '1996-12-15', 'h no 12 Street 4, Shiv Enclave, Noida, Uttar Pradesh', NULL, 0, '2023-05-30 19:21:04', NULL),
(100, NULL, 'Kajal Singh', 'Female', '3256325412', '', '1995-11-24', 'Raj Nagar Extension', NULL, 0, '2023-05-30 23:16:24', NULL),
(101, 'aaaa', 'Raj Kumar', 'Male', '3258745896', '', '1996-06-14', 'Ghaziabad', NULL, 0, '2023-05-31 22:10:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `appointment_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `bill_amount` float DEFAULT NULL,
  `payment` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `appointment_id`, `status`, `bill_amount`, `payment`) VALUES
(12, 42, 3, 250, '1'),
(13, 44, 3, 750, '1'),
(14, 45, 3, 850, '1'),
(15, 46, 3, 550, '0'),
(16, 48, 3, 900, '0');

-- --------------------------------------------------------

--
-- Table structure for table `report_result`
--

CREATE TABLE `report_result` (
  `appointment_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_result`
--

INSERT INTO `report_result` (`appointment_id`, `test_id`, `result`) VALUES
(42, 29, 5),
(44, 9, 45),
(44, 30, 9850),
(44, 31, 291000),
(45, 1, 490),
(45, 29, 5),
(45, 30, 9800),
(45, 31, 350000),
(46, 9, 60),
(46, 30, 5500),
(48, 1, 420),
(48, 9, 48),
(48, 29, 5),
(48, 31, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `test_list`
--

CREATE TABLE `test_list` (
  `test_id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ref.range` varchar(25) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` varchar(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_list`
--

INSERT INTO `test_list` (`test_id`, `name`, `description`, `ref.range`, `unit`, `price`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Hemoglobin', 'Hemoglobin Level Test', 'M :450-500, F:400-450', 'mg/dL', '150', 1, 0, '2023-05-05 19:29:55', '2023-05-25 19:30:06'),
(9, 'Hematocrit', 'A hematocrit (he-MAT-uh-krit) test measures the proportion of red blood cells in your blood.', 'M:40-55, F45-60', 'mg/dL', '300', 1, 0, '2023-05-05 19:37:20', '2023-05-25 19:25:37'),
(29, 'RBC', 'red blood cells (cells responsible for carrying oxygen throughout the body)', 'male: 4.3–5.9; female: 3.', 'mg/dL', '250', 1, 0, '2023-05-26 18:16:23', '2023-06-01 21:42:25'),
(30, 'WBC', 'white blood cells (immune system cells in the blood)', '4,500–11,000/mm3', '%', '250', 1, 0, '2023-05-26 18:16:56', NULL),
(31, 'Platelets', 'platelets (the substances that control the clotting of the blood)', '150,000–400,000/mm3', '%', '200', 1, 0, '2023-05-26 18:17:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update_history`
--

CREATE TABLE `update_history` (
  `appointment_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_history`
--

INSERT INTO `update_history` (`appointment_id`, `status`, `remarks`, `date_created`) VALUES
(43, 0, '', '2023-05-28 09:41:44'),
(42, 2, '', '2023-05-28 13:43:57'),
(43, 2, '', '2023-05-28 14:07:31'),
(42, 2, '', '2023-05-28 14:07:42'),
(43, 2, '', '2023-05-28 14:55:14'),
(43, 2, '', '2023-05-28 14:55:33'),
(42, 2, '', '2023-05-28 15:31:12'),
(42, 0, '', '2023-05-28 20:14:53'),
(43, 4, '', '2023-05-28 20:15:07'),
(42, 2, '', '2023-05-28 20:15:53'),
(43, 1, '', '2023-05-28 20:44:18'),
(43, 0, '', '2023-05-28 20:50:04'),
(43, 4, '', '2023-05-29 07:32:32'),
(44, 1, '', '2023-05-29 08:01:35'),
(44, 2, '', '2023-05-29 08:03:48'),
(45, 1, '', '2023-05-29 09:43:07'),
(45, 2, '', '2023-05-29 09:43:48'),
(43, 2, '', '2023-05-29 10:01:43'),
(46, 1, '', '2023-05-29 12:31:09'),
(46, 2, '', '2023-05-29 12:31:23'),
(48, 1, '', '2023-06-01 20:09:03'),
(48, 2, '', '2023-06-01 20:09:19'),
(48, 3, '', '2023-06-01 20:11:21'),
(55, 0, '', '2023-06-01 20:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` decimal(10,0) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT 'login.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `username`, `password`, `avatar`) VALUES
(1, 'Vinay Gupta', 'vinayg2701000@gmail.com', '7836894679', 'admin', 'admin123', 'acupunture2.png'),
(2, 'Vinay Gupta ', 'vinay.2124mca1127@kiet.edu', '7503722404', '2124mca1107', 'Vinay@27', 'login.png'),
(3, 'prashant ', 'Prashant.2124mca1161@kiet.edu', '5874965824', 'aaaa', 'prashant123', 'login.png'),
(5, 'Adil khan ', 'Adil@gmail.com', '4785125698', 'Adil123', 'adil@123', 'login.png'),
(7, 'Manish Gupta ', 'manish@gmail.com', '1234567890', 'abc', 'manish123', '321417.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `client_id` (`patient_id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD UNIQUE KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `report_result`
--
ALTER TABLE `report_result`
  ADD KEY `appointment_list_fk` (`appointment_id`);

--
-- Indexes for table `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `update_history`
--
ALTER TABLE `update_history`
  ADD KEY `id` (`appointment_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `contact_2` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `appointment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `test_list`
--
ALTER TABLE `test_list`
  MODIFY `test_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD CONSTRAINT `appointment_list_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `report_result`
--
ALTER TABLE `report_result`
  ADD CONSTRAINT `appointment_list_fk` FOREIGN KEY (`appointment_id`) REFERENCES `report` (`appointment_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `update_history`
--
ALTER TABLE `update_history`
  ADD CONSTRAINT `update_history_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_list` (`appointment_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
