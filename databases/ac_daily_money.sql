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
-- Table structure for table `ac_daily_money`
--

CREATE TABLE `ac_daily_money` (
  `dm_id` int(11) NOT NULL,
  `dm_date` date NOT NULL,
  `dm_sum_income` float NOT NULL,
  `dm_sum_expense` float NOT NULL,
  `dm_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_daily_money`
--

INSERT INTO `ac_daily_money` (`dm_id`, `dm_date`, `dm_sum_income`, `dm_sum_expense`, `dm_us_id`) VALUES
(1, '2564-02-17', 56000, 24000, 1),
(2, '2564-02-15', 30500, 18500, 1),
(3, '2564-01-12', 6800, 4000, 1),
(4, '2564-01-10', 7900, 81000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `dm_us_id` (`dm_us_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`dm_us_id`) REFERENCES `ac_user` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
