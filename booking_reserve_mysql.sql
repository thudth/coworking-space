-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 04:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_reserve`
--
CREATE DATABASE IF NOT EXISTS `booking_reserve` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booking_reserve`;

-- --------------------------------------------------------

--
-- Table structure for table `conferenceroombookingdetail`
--

CREATE TABLE `conferenceroombookingdetail` (
  `code` varchar(5) NOT NULL,
  `ordercode` varchar(5) DEFAULT NULL,
  `roomType` char(5) DEFAULT NULL,
  `date` date NOT NULL,
  `startingTime` int(2) NOT NULL,
  `finishingTime` int(2) NOT NULL,
  `roomNumber` varchar(5) DEFAULT NULL,
  `payingAmount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conferenceroombookingdetail`
--

INSERT INTO `conferenceroombookingdetail` (`code`, `ordercode`, `roomType`, `date`, `startingTime`, `finishingTime`, `roomNumber`, `payingAmount`) VALUES
('CD1', 'O2', 'CT1', '2017-06-03', 7, 10, NULL, 240),
('CD2', 'O3', 'CT2', '2017-06-02', 13, 17, NULL, 400),
('CD3', 'O3', 'CT3', '2017-06-03', 8, 12, NULL, 800),
('CD4', 'O7', 'CT3', '2017-06-15', 8, 11, 'C5', 600),
('CD5', 'O7', 'CT3', '2017-06-14', 6, 12, 'C6', 1200),
('CD6', 'O10', 'CT2', '2017-06-30', 17, 20, 'C3', 300),
('CD7', 'O11', 'CT5', '2017-07-31', 17, 21, 'C8', 1600),
('CD8', 'O14', 'CT2', '2017-07-02', 6, 9, 'C3', 300);

-- --------------------------------------------------------

--
-- Table structure for table `conferencerooms`
--

CREATE TABLE `conferencerooms` (
  `roomNumber` varchar(5) NOT NULL,
  `roomType` varchar(5) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conferencerooms`
--

INSERT INTO `conferencerooms` (`roomNumber`, `roomType`, `description`) VALUES
('C1', 'CT1', 'Loại 1 ph&ograve;ng 1'),
('C2', 'CT1', 'Loại 1 ph&ograve;ng 2'),
('C3', 'CT2', 'Loại 2 ph&ograve;ng 1'),
('C4', 'CT2', 'Loại 2 ph&ograve;ng 2'),
('C5', 'CT3', 'Loại 3 phòng 1'),
('C6', 'CT3', 'Loại 3 phòng 2'),
('C7', 'CT4', 'Loại 4 phòng 1'),
('C8', 'CT5', 'Loại 5 phòng 1');

-- --------------------------------------------------------

--
-- Table structure for table `conferenceroomtypes`
--

CREATE TABLE `conferenceroomtypes` (
  `code` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pricePerHour` float NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conferenceroomtypes`
--

INSERT INTO `conferenceroomtypes` (`code`, `name`, `pricePerHour`, `note`) VALUES
('CT1', 'Less 40 people', 80, 'Ph&ograve;ng thuyết tr&igrave;nh, hội thảo cỡ nhỏ. C&oacute; trang bị m&aacute;y chiếu v&agrave; 1 loa đơn.'),
('CT2', '50 people', 100, 'Ph&ograve;ng chứa được khoảng 50 người. Được trang bị m&aacute;y chiếu, bảng viết v&agrave; 2 loa đơn'),
('CT3', '100 people', 200, 'Ph&ograve;ng chứa được khoảng 100 người. Được trang bị m&aacute;y chiếu, bảng viết v&agrave; 2 loa đ&ocirc;i'),
('CT4', '150 people', 300, 'Ph&ograve;ng chứa được khoảng 150 người. Được hỗ trợ 3 loa đ&ocirc;i v&agrave; m&agrave;n h&igrave;nh chiếu 12x8m'),
('CT5', 'more 200 people', 400, 'Ph&ograve;ng lớn, chứa được từ 200 đến 300 người. Được trang bị m&agrave;n h&igrave;nh chiếu 12x8m v&agrave; 5 loa đ&ocirc;i');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `code` varchar(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `confirmStaffMember` varchar(50) DEFAULT NULL,
  `orderState` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`code`, `username`, `orderDate`, `confirmStaffMember`, `orderState`) VALUES
('O1', 'letuanh97', '2015-07-16', NULL, 2),
('O10', 'nguyenthilien', '2017-06-01', 'huyenthu', 3),
('O11', 'nguyentrungnghia', '2017-05-25', 'trangtrang1210', 3),
('O12', 'trinhminhtri', '2017-06-21', NULL, 2),
('O13', 'trinhminhtri', '2017-06-26', NULL, 5),
('O14', 'letuanh97', '2017-06-27', 'huyenthu', 3),
('O15', 'nguyentrungnghia', '2017-06-28', NULL, 2),
('O16', 'letuanh97', '2017-07-04', NULL, 1),
('O2', 'letuanh97', '2016-06-20', NULL, 2),
('O3', 'nguyenthilien', '2016-03-20', NULL, 1),
('O4', 'nguyentrungnghia', '2015-02-20', NULL, 2),
('O5', 'nguyenthilien', '2016-05-18', NULL, 2),
('O6', 'letuanh97', '2015-04-20', 'huyenthu', 3),
('O7', 'trinhminhtri', '2017-08-10', 'huyenthu', 3),
('O8', 'trinhminhtri', '2016-04-10', 'trangtrang1210', 2),
('O9', 'nguyentrungnghia', '2017-06-20', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderstate`
--

CREATE TABLE `orderstate` (
  `code` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderstate`
--

INSERT INTO `orderstate` (`code`, `status`) VALUES
(1, 'Unpaid for'),
(2, 'Paid for, not yet allocated'),
(3, 'Allocated'),
(4, 'Finished using'),
(5, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `code` int(11) NOT NULL,
  `roles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`code`, `roles`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Old Admin');

-- --------------------------------------------------------

--
-- Table structure for table `seatbookingdetail`
--

CREATE TABLE `seatbookingdetail` (
  `code` varchar(5) NOT NULL,
  `ordercode` varchar(5) DEFAULT NULL,
  `startingDate` date NOT NULL,
  `finishingDate` date NOT NULL,
  `seatNumber` varchar(5) DEFAULT NULL,
  `payingAmount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seatbookingdetail`
--

INSERT INTO `seatbookingdetail` (`code`, `ordercode`, `startingDate`, `finishingDate`, `seatNumber`, `payingAmount`) VALUES
('SD1', 'O1', '2017-06-01', '2017-06-10', NULL, 1000),
('SD10', 'O11', '2017-07-15', '2017-07-31', 'S3', 1600),
('SD11', 'O11', '2017-07-15', '2017-07-31', 'S4', 1600),
('SD12', 'O12', '2017-06-01', '2017-06-23', NULL, 2300),
('SD13', 'O13', '2017-06-14', '2017-06-15', NULL, 200),
('SD14', 'O14', '2017-07-01', '2017-07-05', 'S1', 500),
('SD15', 'O15', '2017-06-01', '2017-06-04', NULL, 400),
('SD16', 'O16', '2017-07-05', '2017-07-11', NULL, 665),
('SD17', 'O16', '2017-07-05', '2017-08-06', NULL, 2970),
('SD18', 'O16', '2017-07-05', '2017-10-05', NULL, 7440),
('SD2', 'O1', '2017-06-15', '2017-06-18', NULL, 400),
('SD3', 'O4', '2017-06-25', '2017-07-12', NULL, 1800),
('SD4', 'O5', '2017-06-14', '2017-06-30', NULL, 1700),
('SD5', 'O6', '2017-06-03', '2017-06-25', 'S2', 2300),
('SD6', 'O8', '2017-06-10', '2017-06-15', NULL, 600),
('SD7', 'O8', '2017-06-01', '2017-06-14', NULL, 1400),
('SD8', 'O10', '2017-06-22', '2017-06-30', 'S5', 900),
('SD9', 'O10', '2017-06-20', '2017-06-30', 'S7', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `code` varchar(5) NOT NULL,
  `seatNumber` varchar(5) NOT NULL,
  `pricePerDay` float NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`code`, `seatNumber`, `pricePerDay`, `note`) VALUES
('S1', '101', 100, 'Ph&ograve;ng 1 ghế 1.'),
('S2', '102', 100, 'Ph&ograve;ng 1 ghế 2'),
('S3', '103', 100, 'Ph&ograve;ng 1 ghế 3'),
('S4', '104', 100, 'Ph&ograve;ng 1 ghế 4'),
('S5', '201', 100, 'Ph&ograve;ng 2 ghế 1'),
('S6', '202', 100, 'Ph&ograve;ng 2 ghế 2'),
('S7', '203', 100, 'Ph&ograve;ng 2 ghế 3'),
('S8', '204', 100, 'Ph&ograve;ng 2 ghế 4');

-- --------------------------------------------------------

--
-- Table structure for table `teamroombookingdetail`
--

CREATE TABLE `teamroombookingdetail` (
  `code` varchar(5) NOT NULL,
  `ordercode` varchar(5) DEFAULT NULL,
  `roomType` char(5) DEFAULT NULL,
  `lengthoftime` int(11) DEFAULT NULL,
  `startingDate` date NOT NULL,
  `finishingDate` date NOT NULL,
  `roomNumber` varchar(5) DEFAULT NULL,
  `payingAmount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamroombookingdetail`
--

INSERT INTO `teamroombookingdetail` (`code`, `ordercode`, `roomType`, `lengthoftime`, `startingDate`, `finishingDate`, `roomNumber`, `payingAmount`) VALUES
('TD1', 'O2', 'RT2', 5, '2017-05-01', '2017-09-28', NULL, 500),
('TD10', 'O16', 'RT4', 3, '2017-07-28', '2017-10-26', NULL, 540),
('TD11', 'O16', 'RT4', 6, '2017-07-09', '2018-01-05', NULL, 1020),
('TD12', 'O16', 'RT4', 12, '2017-07-30', '2018-07-25', NULL, 1920),
('TD2', 'O2', 'RT3', 5, '2017-05-01', '2017-09-28', NULL, 750),
('TD3', 'O3', 'RT2', 6, '2017-06-01', '2017-11-28', NULL, 600),
('TD4', 'O5', 'RT2', 2, '2017-06-23', '2017-08-22', NULL, 200),
('TD5', 'O6', 'RT4', 7, '2017-06-17', '2018-01-13', NULL, 1400),
('TD6', 'O9', 'RT2', 5, '2017-06-12', '2017-11-09', NULL, 500),
('TD7', 'O9', 'RT2', 6, '2017-06-12', '2017-12-09', NULL, 600),
('TD8', 'O14', 'RT1', 5, '2017-07-01', '2017-11-28', 'R1', 250),
('TD9', 'O15', 'RT4', 30, '2017-06-01', '2019-11-18', NULL, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `teamrooms`
--

CREATE TABLE `teamrooms` (
  `roomNumber` varchar(5) NOT NULL,
  `roomType` varchar(5) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamrooms`
--

INSERT INTO `teamrooms` (`roomNumber`, `roomType`, `description`) VALUES
('R1', 'RT1', 'Loại 1 ph&ograve;ng 1'),
('R2', 'RT1', 'Loại 1 ph&ograve;ng 2'),
('R3', 'RT2', 'Loại 2 ph&ograve;ng 1'),
('R4', 'RT3', 'Ph&ograve;ng 1 loại 3'),
('R5', 'RT2', 'Ph&ograve;ng 2 loại 2'),
('R6', 'RT4', 'Loại 4 ph&ograve;ng 1'),
('R7', 'RT4', 'Loại 4 ph&ograve;ng 2'),
('R8', 'RT2', 'Ph&ograve;ng 2 loại 2');

-- --------------------------------------------------------

--
-- Table structure for table `teamroomtypes`
--

CREATE TABLE `teamroomtypes` (
  `code` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pricePerMonth` float NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamroomtypes`
--

INSERT INTO `teamroomtypes` (`code`, `name`, `pricePerMonth`, `note`) VALUES
('RT1', '4 people', 50, 'Ph&ograve;ng chứa được khoảng 4 người. Được trang bị bảng viết'),
('RT2', '8 people', 100, 'Ph&ograve;ng chứa được khoảng 8 người. Được trang bị bảng viết'),
('RT3', '12 people', 150, 'Ph&ograve;ng chứa được khoảng 12 người. Được trang bị m&aacute;y chiếu v&agrave; bảng viết'),
('RT4', 'more 15 people', 200, 'Ph&ograve;ng chứa được khoảng 15 đến 20 người. Được trang bị m&aacute;y chiếu v&agrave; bảng viết.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `roles` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` bit(1) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `roles`, `firstName`, `lastName`, `gender`, `dateOfBirth`, `phone`, `email`) VALUES
('huyenthu', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Huyền Thu', 'Đặng Thanh', b'0', '1997-12-07', '01626509670', 'huyenthudangthanh@gmail.com'),
('lannhi97', 'e10adc3949ba59abbe56e057f20f883e', 3, 'Nhi', 'Lan', b'0', '1998-05-28', '0987654321', 'nhinhi@gmail.com'),
('letuanh97', 'e10adc3949ba59abbe56e057f20f883e', 2, '', 'Tu Anh', b'1', '1997-08-02', '09876543222', 'tuanh977@gmail.com'),
('nguyenthilien', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Lien', 'Nguyen', b'0', '1997-12-12', '0987654322', 'liennguyen@gmail.com'),
('nguyentrungnghia', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Nghĩa', 'NT', b'1', '1996-08-15', '0987652143', 'nghiant@gmail.com'),
('thuthuthu', 'e10adc3949ba59abbe56e057f20f883e', 2, 'ThuThu', 'Huyền', b'1', '1998-07-06', '01667803528', 'thuthu@gmail.com'),
('trangtrang1210', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Quỳnh Trang', 'Trương', b'0', '1997-10-12', '01673850104', 'quynhtrang1210'),
('trinhminhtri', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Tri', 'Trinh', b'1', '1996-06-17', '6547839201', 'tritrinh96@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferenceroombookingdetail`
--
ALTER TABLE `conferenceroombookingdetail`
  ADD PRIMARY KEY (`code`),
  ADD KEY `ordercode` (`ordercode`),
  ADD KEY `roomType` (`roomType`),
  ADD KEY `roomNumber` (`roomNumber`);

--
-- Indexes for table `conferencerooms`
--
ALTER TABLE `conferencerooms`
  ADD PRIMARY KEY (`roomNumber`),
  ADD KEY `roomType` (`roomType`);

--
-- Indexes for table `conferenceroomtypes`
--
ALTER TABLE `conferenceroomtypes`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`code`),
  ADD KEY `username` (`username`),
  ADD KEY `confirmStaffMember` (`confirmStaffMember`),
  ADD KEY `orderState` (`orderState`);

--
-- Indexes for table `orderstate`
--
ALTER TABLE `orderstate`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `seatbookingdetail`
--
ALTER TABLE `seatbookingdetail`
  ADD PRIMARY KEY (`code`),
  ADD KEY `seatNumber` (`seatNumber`),
  ADD KEY `ordercode` (`ordercode`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `teamroombookingdetail`
--
ALTER TABLE `teamroombookingdetail`
  ADD PRIMARY KEY (`code`),
  ADD KEY `ordercode` (`ordercode`),
  ADD KEY `roomType` (`roomType`),
  ADD KEY `roomNumber` (`roomNumber`);

--
-- Indexes for table `teamrooms`
--
ALTER TABLE `teamrooms`
  ADD PRIMARY KEY (`roomNumber`),
  ADD KEY `roomType` (`roomType`);

--
-- Indexes for table `teamroomtypes`
--
ALTER TABLE `teamroomtypes`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roles` (`roles`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferenceroombookingdetail`
--
ALTER TABLE `conferenceroombookingdetail`
  ADD CONSTRAINT `conferenceroombookingdetail_ibfk_1` FOREIGN KEY (`ordercode`) REFERENCES `orders` (`code`),
  ADD CONSTRAINT `conferenceroombookingdetail_ibfk_2` FOREIGN KEY (`roomType`) REFERENCES `conferenceroomtypes` (`code`),
  ADD CONSTRAINT `conferenceroombookingdetail_ibfk_3` FOREIGN KEY (`roomNumber`) REFERENCES `conferencerooms` (`roomNumber`);

--
-- Constraints for table `conferencerooms`
--
ALTER TABLE `conferencerooms`
  ADD CONSTRAINT `conferencerooms_ibfk_1` FOREIGN KEY (`roomType`) REFERENCES `conferenceroomtypes` (`code`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`confirmStaffMember`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`orderState`) REFERENCES `orderstate` (`code`);

--
-- Constraints for table `seatbookingdetail`
--
ALTER TABLE `seatbookingdetail`
  ADD CONSTRAINT `seatbookingdetail_ibfk_1` FOREIGN KEY (`seatNumber`) REFERENCES `seats` (`code`),
  ADD CONSTRAINT `seatbookingdetail_ibfk_2` FOREIGN KEY (`ordercode`) REFERENCES `orders` (`code`);

--
-- Constraints for table `teamroombookingdetail`
--
ALTER TABLE `teamroombookingdetail`
  ADD CONSTRAINT `teamroombookingdetail_ibfk_1` FOREIGN KEY (`ordercode`) REFERENCES `orders` (`code`),
  ADD CONSTRAINT `teamroombookingdetail_ibfk_2` FOREIGN KEY (`roomType`) REFERENCES `teamroomtypes` (`code`),
  ADD CONSTRAINT `teamroombookingdetail_ibfk_3` FOREIGN KEY (`roomNumber`) REFERENCES `teamrooms` (`roomNumber`);

--
-- Constraints for table `teamrooms`
--
ALTER TABLE `teamrooms`
  ADD CONSTRAINT `teamrooms_ibfk_1` FOREIGN KEY (`roomType`) REFERENCES `teamroomtypes` (`code`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
