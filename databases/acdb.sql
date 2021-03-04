-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2021 at 07:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acdb`
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

-- --------------------------------------------------------

--
-- Table structure for table `ac_daily_money`
--

CREATE TABLE `ac_daily_money` (
  `dm_id` int(11) NOT NULL COMMENT 'id ข้อมูลสรุปเงินรายวัน',
  `dm_date` date NOT NULL COMMENT 'วัน เดือน ปี ของข้อมูลรายวัน',
  `dm_sum_income` float NOT NULL COMMENT 'ผลรวมรายรับ',
  `dm_sum_expense` float NOT NULL COMMENT 'ผลรวมรายจ่าย',
  `dm_us_id` int(11) NOT NULL COMMENT 'FK เชื่อมตาราง ac_user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_daily_money`
--

INSERT INTO `ac_daily_money` (`dm_id`, `dm_date`, `dm_sum_income`, `dm_sum_expense`, `dm_us_id`) VALUES
(1, '2564-02-17', 56000, 24000, 1),
(2, '2564-02-15', 30500, 18500, 1),
(3, '2564-01-12', 6800, 4000, 1),
(4, '2564-01-10', 7900, 81000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_list_money`
--

CREATE TABLE `ac_list_money` (
  `lm_id` int(11) NOT NULL COMMENT 'id รายการเงิน',
  `lm_date` date NOT NULL COMMENT 'วัน เดือน ปี ของรายการเงิน',
  `lm_customize_category` varchar(255) DEFAULT NULL COMMENT 'เก็บชื่อรายการเงินที่ไม่ใช่ในข้อมูลพื้นฐาน (ถ้าคอลัมน์นี้ไม่เป็น NULL คอลัมน์ lm_bc_id จะต้อง NULL)',
  `lm_money` float NOT NULL COMMENT 'เก็บจำนวนเงิน',
  `lm_bc_id` int(11) DEFAULT NULL COMMENT 'เก็บ id ข้อมูลพื้นฐาน (ถ้าคอลัมน์นี้ไม่เป็น NULL คอลัมน์ lm_customize_category เป็น NULL)',
  `lm_us_id` int(11) NOT NULL DEFAULT 1 COMMENT 'FK เชื่อมตาราง  ac_user',
  `lm_mt_id` int(11) NOT NULL DEFAULT 1 COMMENT 'FK เชื่อตาราง ac_money_type'
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

-- --------------------------------------------------------

--
-- Table structure for table `ac_money_type`
--

CREATE TABLE `ac_money_type` (
  `mt_id` int(11) NOT NULL COMMENT 'id ประเภทเงิน',
  `mt_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทเงิน เช่น รายรับ รายจ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_money_type`
--

INSERT INTO `ac_money_type` (`mt_id`, `mt_name`) VALUES
(1, 'รายรับ'),
(2, 'รายจ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `ac_strange_input_log`
--

CREATE TABLE `ac_strange_input_log` (
  `si_id` int(11) NOT NULL COMMENT 'id ข้อมูล input ที่ผิดปกติ',
  `si_input` varchar(255) NOT NULL COMMENT 'เก็บข้อมูลที่ผิดปกติ',
  `si_url` varchar(255) NOT NULL COMMENT 'เก็บ url ของข้อมูลที่ผิดปกติ',
  `si_request_method` varchar(255) NOT NULL COMMENT 'เก็บ get กับ post ของข้อมูลที่ผิดปกติ',
  `si_client_ip` varchar(255) NOT NULL COMMENT 'เก็บ ip ของ client',
  `si_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'เก็บเวลาของข้อมูลผิดปกติที่เข้ามา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ac_user`
--

CREATE TABLE `ac_user` (
  `us_id` int(11) NOT NULL COMMENT 'id ผู้ใช้งาน',
  `us_name` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้ (Username)',
  `us_pass` varchar(255) NOT NULL COMMENT 'รหัสผ่าน (Passwords)',
  `us_last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ผู้ใช้งานเข้าใช้ระบบครั้งล่าสุดเมื่อไหร่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_user`
--

INSERT INTO `ac_user` (`us_id`, `us_name`, `us_pass`, `us_last_login`) VALUES
(1, 'team2', 'team2', '2021-02-28 09:36:57'),
(2, 'banana', 'banana', '2021-02-28 09:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `ac_user_strange_input`
--

CREATE TABLE `ac_user_strange_input` (
  `usi_id` int(11) NOT NULL COMMENT 'id ของผู้ที่ใส่ข้อมูลผิดปกติ',
  `usi_us_id` int(11) NOT NULL DEFAULT 1 COMMENT 'FK เชื่อมตาราง ac_user',
  `usi_si_id` int(11) NOT NULL DEFAULT 1 COMMENT 'FK เชื่อมตาราง ac_strange_input_log'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `dm_us_id` (`dm_us_id`) USING BTREE;

--
-- Indexes for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  ADD PRIMARY KEY (`lm_id`),
  ADD KEY `lm_mt_id` (`lm_mt_id`),
  ADD KEY `lm_us_id` (`lm_us_id`);

--
-- Indexes for table `ac_money_type`
--
ALTER TABLE `ac_money_type`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `ac_strange_input_log`
--
ALTER TABLE `ac_strange_input_log`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `ac_user`
--
ALTER TABLE `ac_user`
  ADD PRIMARY KEY (`us_id`);

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
-- AUTO_INCREMENT for table `ac_base_category`
--
ALTER TABLE `ac_base_category`
  MODIFY `bc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ข้อมูลพื้นฐาน', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ข้อมูลสรุปเงินรายวัน', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  MODIFY `lm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id รายการเงิน', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ac_money_type`
--
ALTER TABLE `ac_money_type`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ประเภทเงิน', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_strange_input_log`
--
ALTER TABLE `ac_strange_input_log`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ข้อมูล input ที่ผิดปกติ';

--
-- AUTO_INCREMENT for table `ac_user`
--
ALTER TABLE `ac_user`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ผู้ใช้งาน', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_user_strange_input`
--
ALTER TABLE `ac_user_strange_input`
  MODIFY `usi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ของผู้ที่ใส่ข้อมูลผิดปกติ';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_base_category`
--
ALTER TABLE `ac_base_category`
  ADD CONSTRAINT `bc_mt_id` FOREIGN KEY (`bc_mt_id`) REFERENCES `ac_money_type` (`mt_id`),
  ADD CONSTRAINT `bc_us_id` FOREIGN KEY (`bc_us_id`) REFERENCES `ac_user` (`us_id`);

--
-- Constraints for table `ac_daily_money`
--
ALTER TABLE `ac_daily_money`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`dm_us_id`) REFERENCES `ac_user` (`us_id`);

--
-- Constraints for table `ac_list_money`
--
ALTER TABLE `ac_list_money`
  ADD CONSTRAINT `lm_mt_id` FOREIGN KEY (`lm_mt_id`) REFERENCES `ac_money_type` (`mt_id`),
  ADD CONSTRAINT `lm_us_id` FOREIGN KEY (`lm_us_id`) REFERENCES `ac_user` (`us_id`);

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
