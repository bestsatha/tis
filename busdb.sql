-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 05:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

CREATE TABLE `tb_driver` (
  `driver_id` varchar(15) NOT NULL,
  `driver_prefix` varchar(10) DEFAULT NULL,
  `driver_name` varchar(150) DEFAULT NULL,
  `driver_surname` varchar(255) DEFAULT NULL,
  `driver_nickname` varchar(150) NOT NULL,
  `driver_gender` varchar(10) NOT NULL,
  `driver_birthday` varchar(30) NOT NULL,
  `driver_age` varchar(2) NOT NULL,
  `driver_images` varchar(150) DEFAULT NULL,
  `position` varchar(150) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`driver_id`, `driver_prefix`, `driver_name`, `driver_surname`, `driver_nickname`, `driver_gender`, `driver_birthday`, `driver_age`, `driver_images`, `position`, `username`, `password`, `level`) VALUES
('1-2116694001', 'นาย', 'สถาพร', 'วิเศษทอง', 'เบส', 'ชาย', '23 กุมภาพันธ์ 2545', '21', '32161951420230913_211612.png', 'หัวหน้างานเดินรถโดยสาร', 'sathaporn.wi', '12116694001', 'admin'),
('1-2136694001', 'นางสาว', 'บุณฑริกา', 'ชีวรุโณทัย', 'มินนี่', 'หญิง', '7 มีนาคม 2549', '', '83475192720230913_211834.PNG', '', 'boontika.ch', '12136694001', 'user'),
('1-2136694002', 'นางสาว', 'ณัชชา', 'ไชยพยอม', 'เมจิ', 'หญิง', '5 ตุลาคม 2549', '', '98856536620230913_211944.PNG', '', 'nattcha.ch', '12136694002', 'user'),
('1-2136694003', 'นางสาว', 'พิมพ์ภัทรา', 'เวศย์วรุตม์', 'อิม', 'หญิง', '21 ตุลาคม 2550', '', '123033594520230913_212039.PNG', '', 'pimphattra.we', '12136694003', 'user'),
('1-2136694004', 'นางสาว', 'ชรินทร์ทิพย์ ', 'รุ่งธนเกียรติ', 'คริส', 'หญิง', '16 ธันวาคม 2550', '', '45549169320230913_212140.PNG', 'พนักงานขับรถโดยสาร', 'charintip.ru', '12136694004', 'user'),
('1-2186694001', 'นาย', 'ศิรินภา', 'ชินามน', 'แนน', 'ชาย', '4 สิงหาคม 2546', '', '202847406220230913_212238.jpg', '', 'sirinapha.ch', '12186694001', 'user'),
('1-2856694001', 'นาย', 'ภัคพล', 'นามมะวงค์', 'บอน', 'ชาย', '26 มิถุนายน 2545', '', '211422137420230913_212501.png', '', 'pakkapol.na', '12856694001', 'user'),
('2434', 'นาย', 'werfwr', 'wrtefgsd', 'asd', 'ชาย', 'efgefgef', '', '212547508920230913_222541', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
