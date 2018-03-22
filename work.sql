-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 08:32 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(36, 'Computer Periferail'),
(37, 'Computer'),
(38, 'yujkyukj');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `designation_name`) VALUES
(541, 'Software Engg'),
(542, 'Hr'),
(543, 'ceo');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `em_id` int(11) NOT NULL,
  `em_name` varchar(255) NOT NULL,
  `em_email` varchar(255) NOT NULL,
  `em_phone` varchar(255) NOT NULL,
  `em_address` varchar(255) NOT NULL,
  `em_image` varchar(255) NOT NULL,
  `em_dp_id` int(255) NOT NULL,
  `em_dg_id` varchar(255) NOT NULL,
  `em_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`em_id`, `em_name`, `em_email`, `em_phone`, `em_address`, `em_image`, `em_dp_id`, `em_dg_id`, `em_status`) VALUES
(58, 'shimu111', 'parvez11@gmail.com', '0168505060411', '', '18-beautiful-peacock-picture.jpg', 36, '', 'yes'),
(60, '', '', '', '', '', 0, 'Chose Your Designation name', 'yes'),
(61, '', '', '', '', '', 0, 'Chose Your Designation name', 'yes'),
(63, 'Parvez', 'parvez@gmail.com', '01685050604', 'dd kk\r\nhhh jj', '18-beautiful-peacock-picture.jpg', 38, '540', 'yes'),
(575, 'shimugh', 'parvgfgez@gmail.com', '0168500604', 're 4tt jj', '18-beautjiful-peacock-picture.jpg', 366, '5395', 'no'),
(576, 'shimu', 'parvez@gmail.com', '01685050604', 'yer eye', 'images.jfif', 36, '541', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `re` int(11) NOT NULL,
  `re_name` varchar(255) NOT NULL,
  `re_email` varchar(255) NOT NULL,
  `re_phone` varchar(255) NOT NULL,
  `re_image` varchar(255) NOT NULL,
  `re_pass` varchar(255) NOT NULL,
  `confirm_pass` varchar(255) NOT NULL,
  `re_status` varchar(255) NOT NULL,
  `re_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`re`, `re_name`, `re_email`, `re_phone`, `re_image`, `re_pass`, `confirm_pass`, `re_status`, `re_role`) VALUES
(22, 'Parvez', 'parvez@gmail.com', '01685050604', '18-beautiful-peacock-picture.jpg', '12345', '12345', 'admin', 'view,add,edit,delete'),
(23, 'kfwfkhk', 'kfwfkhk@gmail.com', '000999', 'apple-watch.png', '12345', '12345', 'client', 'view,add,edit,delete');

-- --------------------------------------------------------

--
-- Table structure for table `sallares`
--

CREATE TABLE `sallares` (
  `sa_id` int(11) NOT NULL,
  `sa_grade_position` varchar(255) NOT NULL,
  `sa_salary` int(255) NOT NULL,
  `sa_house` int(255) NOT NULL,
  `sa_medical` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sallares`
--

INSERT INTO `sallares` (`sa_id`, `sa_grade_position`, `sa_salary`, `sa_house`, `sa_medical`) VALUES
(9, '1St Grad', 20000, 5000, 2500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`re`);

--
-- Indexes for table `sallares`
--
ALTER TABLE `sallares`
  ADD PRIMARY KEY (`sa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `re` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sallares`
--
ALTER TABLE `sallares`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
