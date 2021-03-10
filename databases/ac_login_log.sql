-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2021 at 12:55 AM
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
-- Table structure for table `ac_login_log`
--

CREATE TABLE `ac_login_log` (
  `lo_id` int(11) NOT NULL,
  `lo_input_user` varchar(255) NOT NULL COMMENT 'เก็บ user ที่ทำการ login ที่ผิดปกติ',
  `lo_url` varchar(255) NOT NULL COMMENT 'เก็บ url ของข้อมูลผู้ใช้งานที่ผิดปกติ',
  `lo_request_method` varchar(255) NOT NULL COMMENT 'เก็บ get กับ post ของข้อมูลที่ผิดปกติ',
  `lo_client_ip` varchar(255) NOT NULL COMMENT 'เก็บ ip ของ client',
  `lo_time` timestamp NOT NULL COMMENT 'เก็บเวลาที่ผู้ใช้ทำการ login ที่เข้ามา',
  `lo_input_pass` varchar(255) NOT NULL COMMENT 'เก็บ Password ของผู้ใช้งานที่เข้าใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_login_log`
--
ALTER TABLE `ac_login_log`
  ADD PRIMARY KEY (`lo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_login_log`
--
ALTER TABLE `ac_login_log`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
