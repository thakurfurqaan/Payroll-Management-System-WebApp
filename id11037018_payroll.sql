-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2020 at 11:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11037018_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NAME` text NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NAME`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` int(11) NOT NULL,
  `E_NAME` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Type` text NOT NULL,
  `Desig` text NOT NULL,
  `DOJ` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `E_NAME`, `Password`, `Phone`, `Type`, `Desig`, `DOJ`) VALUES
(1, 'Furqaan Sabiula Thakur', 'hello', 9167115979, 'Full Time', 'Business System Analyst', '2019-09-04'),
(8, 'Usaid Hussain', 'h', 435454564, 'Full Time', 'Content Manager', '2019-09-13'),
(12, 'Anas Lakdawala', 'h', 2147483647, 'Full Time', 'Content Manager', '2019-09-18'),
(13, 'Sharique Shaikh', 'h', 233532434, 'Full Time', 'Database Admin', '2019-02-23'),
(16, 'Pritam Gouda', '', 5656, 'Full Time', 'Boss', '2019-09-11'),
(17, 'Atik Shaikh', 'h', 54545324, 'Full Time', 'Content Manager', '2019-09-11'),
(18, 'Irfan Tagala', 'h', 987978, 'Part Time', 'Content Manager', '2019-09-13'),
(19, 'Sameer Shaikh', 'h', 4646764, 'Full Time', 'Business System Analyst', '2019-09-21'),
(24, 'Mustafa Hussain', 'hello', 1234567890, 'Part Time', 'Database Admin', '2019-10-26'),
(25, 'Farhan ', 'hello', 1234567890, 'Full Time', 'Content Manager', '2019-10-17'),
(26, 'Bhupesh ', 'hello', 9004460440, 'Full Time', 'Content Manager', '2019-10-10'),
(27, 'Sameer shaikh', '12345', 7021650429, 'Full Time', 'Boss', '2019-10-31'),
(28, 'Himanshu Patil', '123456789', 9167115978, 'Part Time', 'Content Manager', '2019-10-31'),
(29, 'Lalu', 'prasad', 6455646464, 'Full Time', 'Database Admin', '2019-10-03'),
(30, 'shubham agarwal', 'vivaan123', 7977773863, 'Full Time', 'Business System Analyst', '2018-03-01'),
(31, 'Arif Kazi', 'arifkazi', 9865329868, 'Full Time', 'Content Manager', '2019-10-17'),
(32, 'Sachin nishad', 'qwerty12', 8547286512, 'Part Time', 'Data Scientist', '1960-10-01'),
(33, 'Abcd', '12345', 1234543215, 'Full Time', 'Content Manager', '2019-11-30'),
(34, 'mohammed', '123456789', 7738403532, 'Full Time', 'Business System Analyst', '2020-02-05'),
(35, 'mmra', '123456789', 7738426985, 'Full Time', 'Database Admin', '2020-02-05'),
(36, 'Shaikh Almas Mohd Sarwar', 'almassqlinjection', 9082833348, 'Part Time', 'Database Admin', '2020-04-01'),
(37, 'Brandt Julian', '12345678', 8767898709, 'Part Time', 'Business System Analyst', '4343-12-31'),
(38, 'Test', 'test@2000', 9643545465, 'Part Time', 'Data Scientist', '2020-05-11'),
(39, 'Sahil Shaikh', 'sahil', 1234567890, 'Full Time', 'Content Manager', '2020-08-22'),
(40, 'Sahil Shaikh', 'sahil', 1234567890, 'Full Time', 'Content Manager', '2020-08-22'),
(41, 'Sahil Shaikh', 'sahil', 1234567890, 'Full Time', 'Content Manager', '2020-08-22'),
(42, 'Sahil Shaikh', 'sahil', 1234567890, 'Full Time', 'Content Manager', '2020-08-22'),
(43, 'Sahil Shaikh', 'sahil', 1234567890, 'Full Time', 'Content Manager', '2020-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `L_ID` int(11) NOT NULL,
  `type` text NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`L_ID`, `type`, `s_date`, `e_date`, `E_ID`) VALUES
(1, 'Marital Leave', '2019-09-02', '2019-09-11', 8),
(2, 'Holiday', '2019-09-17', '2019-09-18', 8),
(3, 'Preparatory Leave', '2019-09-20', '2019-09-23', 8),
(4, 'Earned Leave', '2019-09-18', '2019-09-26', 1),
(5, 'Casual Leave', '1970-01-01', '1970-01-01', 1),
(6, 'Casual Leave', '2019-09-19', '2019-09-22', 8),
(7, 'Sick Leave', '2019-09-18', '2019-09-28', 12),
(8, 'Sick Leave', '2019-10-01', '2019-10-13', 1),
(9, 'Sick Leave', '2019-10-18', '2019-10-18', 1),
(10, 'Quarantine Leave', '2019-10-09', '2019-10-12', 1),
(11, 'Casual Leave', '2019-10-08', '2019-10-19', 26),
(12, 'Maternity Leave', '2020-08-09', '2020-08-12', 1),
(13, 'Casual Leave', '0032-03-05', '0322-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `S_ID` int(11) NOT NULL,
  `GI` decimal(20,2) DEFAULT 0.00,
  `DA` decimal(20,2) DEFAULT 0.00,
  `HRA` decimal(20,2) DEFAULT 0.00,
  `HC` decimal(20,2) DEFAULT 0.00,
  `NI` decimal(20,2) DEFAULT 0.00,
  `E_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`S_ID`, `GI`, `DA`, `HRA`, `HC`, `NI`, `E_ID`) VALUES
(1, 5000.00, 2000.00, 5020.00, 789.00, 11231.00, 1),
(3, 0.00, 444.00, 0.00, 0.00, 444.00, 8),
(4, 60050.00, 0.00, 70099.00, 100.00, 130049.00, 12),
(11, 5000.00, 0.00, 9000.00, 8000.00, 6000.00, 17),
(12, 4000.00, 0.00, 0.00, 400.00, 3600.00, 13),
(13, 0.00, 0.00, 0.00, 0.00, 0.00, 16),
(14, 0.00, 0.00, 0.00, 0.00, 0.00, 18),
(31, 0.00, 0.00, 0.00, 0.00, 0.00, 24),
(32, 0.00, 0.00, 0.00, 0.00, 0.00, 25),
(33, 4000.00, 0.00, 0.00, 0.00, 4000.00, 26),
(34, 0.00, 0.00, 0.00, 0.00, 0.00, 27),
(35, 1000.00, 0.00, 0.00, 1000.00, 0.00, 28),
(36, 0.00, 0.00, 0.00, 0.00, 0.00, 29),
(37, 0.00, 0.00, 0.00, 0.00, 0.00, 30),
(38, 0.00, 0.00, 0.00, 0.00, 0.00, 31),
(39, 0.00, 0.00, 0.00, 0.00, 0.00, 32),
(40, 90909.00, 0.00, 0.00, 0.00, 90909.00, 33),
(41, 0.00, 0.00, 0.00, 0.00, 0.00, 34),
(42, 0.00, 0.00, 0.00, 0.00, 0.00, 35),
(43, 0.00, 0.00, 0.00, 0.00, 0.00, 36),
(44, 0.00, 0.00, 0.00, 0.00, 0.00, 37),
(45, 0.00, 0.00, 0.00, 0.00, 0.00, 38),
(46, 0.00, 0.00, 0.00, 0.00, 0.00, 39),
(47, 0.00, 0.00, 0.00, 0.00, 0.00, 40),
(48, 0.00, 0.00, 0.00, 0.00, 0.00, 41),
(49, 0.00, 0.00, 0.00, 0.00, 0.00, 42),
(50, 0.00, 0.00, 0.00, 0.00, 0.00, 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`L_ID`),
  ADD KEY `fk_foreign_key_name1` (`E_ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `fk_foreign_key_name` (`E_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `L_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
