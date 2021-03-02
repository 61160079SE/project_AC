-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 02:21 PM
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
-- Table structure for table `ac_base_category`
--

CREATE TABLE `ac_base_category` (
  `bc_id` int(11) NOT NULL COMMENT 'id ข้อมูลพื้นฐาน',
  `bc_name` varchar(255) NOT NULL COMMENT 'เก็บชื่อรายการข้อมูลพื้นฐาน',
  `bc_mt_id` int(11) NOT NULL COMMENT 'FK เชื่อมตาราง ac_money_type',
  `bc_us_id` int(11) NOT NULL COMMENT 'FK เชื่อมตาราง ac_user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_base_category`
--

INSERT INTO `ac_base_category` (`bc_id`, `bc_name`, `bc_mt_id`, `bc_us_id`) VALUES
(1, 'ค่างวดรถยนต์', 2, 1),
(2, 'ค่าผ่อนคอนโด', 2, 1),
(3, 'เงินเดือน', 1, 1),
(4, 'ขายของออนไลน์', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_base_category`
--
ALTER TABLE `ac_base_category`
  ADD PRIMARY KEY (`bc_id`),
  ADD KEY `bc_us_id` (`bc_us_id`),
  ADD KEY `bc_mt_id` (`bc_mt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_base_category`
--
ALTER TABLE `ac_base_category`
  MODIFY `bc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ข้อมูลพื้นฐาน', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_base_category`
--
ALTER TABLE `ac_base_category`
  ADD CONSTRAINT `bc_mt_id` FOREIGN KEY (`bc_mt_id`) REFERENCES `ac_money_type` (`mt_id`),
  ADD CONSTRAINT `bc_us_id` FOREIGN KEY (`bc_us_id`) REFERENCES `ac_user` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
