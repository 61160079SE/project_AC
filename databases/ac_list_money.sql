-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2021 at 05:37 PM
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
-- Table structure for table `ac_list_money`
--

CREATE TABLE `ac_list_money` (
  `lm_id` int(11) NOT NULL,
  `lm_date` date NOT NULL,
  `lm_customize_category` varchar(255) DEFAULT NULL,
  `lm_money` float NOT NULL,
  `lm_bc_id` int(11) DEFAULT NULL,
  `lm_us_id` int(11) NOT NULL DEFAULT '1',
  `lm_mt_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_list_money`
--

INSERT INTO `ac_list_money` (`lm_id`, `lm_date`, `lm_customize_category`, `lm_money`, `lm_bc_id`, `lm_us_id`, `lm_mt_id`) VALUES
(1, '2564-02-17', 'อังเปา', 56000, NULL, 1, 1),
(2, '2564-02-17', 'ค่าน้ำ', 24000, NULL, 1, 1),
(3, '2564-02-15', NULL, 30500, 4, 1, 1),
(4, '2564-02-15', NULL, 18500, 1, 1, 1),
(5, '2564-01-12', NULL, 6800, 4, 1, 1),
(6, '2564-01-12', NULL, 4000, 2, 1, 1),
(7, '2564-01-10', NULL, 5000, 3, 1, 1),
(8, '2564-01-10', NULL, 61000, 2, 1, 1),
(9, '2564-01-10', NULL, 2900, 4, 1, 1),
(10, '2564-01-10', NULL, 20000, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  ADD PRIMARY KEY (`lm_id`),
  ADD KEY `lm_mt_id` (`lm_mt_id`),
  ADD KEY `lm_us_id` (`lm_us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  MODIFY `lm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  ADD CONSTRAINT `lm_mt_id` FOREIGN KEY (`lm_mt_id`) REFERENCES `ac_money_type` (`mt_id`),
  ADD CONSTRAINT `lm_us_id` FOREIGN KEY (`lm_us_id`) REFERENCES `ac_user` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
