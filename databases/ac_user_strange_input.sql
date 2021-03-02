-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 02:22 PM
-- Server version: 5.6.38-log
-- PHP Version: 7.3.19-1+0~20200612.60+debian9~1.gbp6c8fe1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsp61_acrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_user_strange_input`
--

CREATE TABLE `ac_user_strange_input` (
  `usi_id` int(11) NOT NULL COMMENT 'id ของผู้ที่ใส่ข้อมูลผิดปกติ',
  `usi_us_id` int(11) NOT NULL DEFAULT '1' COMMENT 'FK เชื่อมตาราง ac_user',
  `usi_si_id` int(11) NOT NULL DEFAULT '1' COMMENT 'FK เชื่อมตาราง ac_strange_input_log'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_user_strange_input`
--
ALTER TABLE `ac_user_strange_input`
  ADD PRIMARY KEY (`usi_id`),
  ADD KEY `usi_us_id` (`usi_us_id`),
  ADD KEY `usi_si_id` (`usi_si_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_user_strange_input`
--
ALTER TABLE `ac_user_strange_input`
  MODIFY `usi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ของผู้ที่ใส่ข้อมูลผิดปกติ';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_user_strange_input`
--
ALTER TABLE `ac_user_strange_input`
  ADD CONSTRAINT `usi_si_id` FOREIGN KEY (`usi_si_id`) REFERENCES `ac_user_strange_input` (`usi_id`),
  ADD CONSTRAINT `usi_us_id` FOREIGN KEY (`usi_us_id`) REFERENCES `ac_user` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
