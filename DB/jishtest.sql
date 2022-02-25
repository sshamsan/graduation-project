-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 07:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jishtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(11) NOT NULL,
  `Therapist_Name` varchar(20) DEFAULT NULL,
  `Payment_Status` varchar(20) DEFAULT 'Pending',
  `Appointment_Time` time DEFAULT NULL,
  `Appointment_Date` date DEFAULT NULL,
  `file_number` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_ID`, `Therapist_Name`, `Payment_Status`, `Appointment_Time`, `Appointment_Date`, `file_number`, `employee_id`) VALUES
(1, 'Lubna', 'Paid', '14:43:21', '2022-02-03', 119, 112),
(7, '1', 'unpaid', '14:56:00', '2020-01-27', 111, 0),
(8, '1', 'unpaid', '15:07:00', '2022-02-25', 111, 0),
(9, '1', 'unpaid', '09:14:00', '2022-02-25', 111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_Name` varchar(20) DEFAULT NULL,
  `Employee_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `Employee_ID`) VALUES
(11, 'Hearing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `Specialization` varchar(20) DEFAULT NULL,
  `Hired_date` date DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Department_ID` int(11) NOT NULL,
  `employee_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Name`, `Role`, `Specialization`, `Hired_date`, `Password`, `Department_ID`, `employee_email`) VALUES
(0, '', 'admin', '', '0000-00-00', '111', 0, ''),
(112, 'lubna', 'therapist', 'hearing', '0000-00-00', 'f498dbbbdfebcb93a140', 11, ''),
(123, 'lubna', 'therapist', 'dwf', '2022-02-21', 'ff738d8dcb92d869dca3', 11, ''),
(11234, 'lubna', 'therapist', 'hearing', '2022-02-21', 'b7aed9487f0b1d66e050', 11, 'lubnasah@gmail.com'),
(12334, 'lubna', 'admin', 'hearing', '2022-02-23', '80b009e6e2eb6eb73b73', 11, 'lubnasah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `intake_appointments`
--

CREATE TABLE `intake_appointments` (
  `Patient_Name` varchar(20) DEFAULT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Therapist_ID` int(11) DEFAULT NULL,
  `Consult_Date` date DEFAULT NULL,
  `id` int(20) NOT NULL,
  `Consult_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intake_appointments`
--

INSERT INTO `intake_appointments` (`Patient_Name`, `Phone_Number`, `Therapist_ID`, `Consult_Date`, `id`, `Consult_Time`) VALUES
('lubna', 541320855, 0, '0000-00-00', 18, NULL),
('dsdsf', 541320855, 0, '0000-00-00', 19, NULL),
('wef', 541320855, 0, '0000-00-00', 20, NULL),
('rgd', 541320855, 0, '2022-02-02', 21, NULL),
('new', 541320855, 0, '2022-02-02', 22, NULL),
('dsf', 436566, 112, '2022-02-24', 23, '15:06:00'),
('dsf', 436566, 112, '2022-02-24', 24, '15:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `File_Number` int(11) NOT NULL,
  `National_ID` varchar(20) NOT NULL,
  `Religion` varchar(20) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Languages` varchar(20) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`File_Number`, `National_ID`, `Religion`, `Address`, `Nationality`, `Birth_Date`, `Languages`, `Gender`, `Phone_Number`, `Name`) VALUES
(100, '12', '', '', '', '0000-00-00', '', '', 0, ''),
(101, '122345', '', '', '', '0000-00-00', '', '', 0, ''),
(102, '', '', '', '', '0000-00-00', '', '', 0, ''),
(103, '', '', '', '', '0000-00-00', '', '', 0, ''),
(111, '', '', '', '', '0000-00-00', '', '', 0, ''),
(112, '', '', '', '', '0000-00-00', '', '', 0, ''),
(113, '123947', 'slfk', 'werlk', 'sdf', '0000-00-00', 'dskfl', 'female', 23478, 'lubna'),
(114, '1435', 'as', 'a', 'efw', '0000-00-00', 'sdf', 'lubna', 2147483647, 'lb'),
(115, '134', 'ad', 'fadssd', 'sdf', '0000-00-00', 'sf', 'male', 541320855, 'l'),
(116, '1106110676', 'muslim', 'sdf', 'saudi', '2022-02-15', 'arabic', 'female', 541320855, 'xsaasdsdfadas dsffgs'),
(117, '9', 'fe', 'e', 'e', '0000-00-00', 'we', 'f', 541320855, 'lubna salem'),
(118, '1106110676', 'ds', 'da', 'saudi', '0000-00-00', 'l', 'female', 541320855, 'dsf saf'),
(119, '1106110676', 'sdf', 'sdf', 'ds', '0000-00-00', 'asf', 'female', 541320855, 'lubna salem'),
(120, '1106110676', 'w', 'wd', 'wd', '0000-00-00', 'w', 'fe', 541320855, 'ldsfe asd'),
(121, '1106110676', 'muslim', 'asd', 'saudi', '0000-00-00', 'arabic', 'female', 541320855, 'lubna salem'),
(122, '1106110676', 'msulim', 'asdkdf', 'saudi', '0000-00-00', 'arabic', 'female', 541320855, 'lubnazainab eajfdias'),
(123, '1106110676', 'sf', 'rgsf', 'd', '2022-02-01', 'dsf', 'female', 541320855, 'lubna df');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `File_Number` int(11) NOT NULL,
  `Report_ID` int(11) NOT NULL,
  `Report_Recommandation` text DEFAULT NULL,
  `therapist_name` varchar(20) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`File_Number`, `Report_ID`, `Report_Recommandation`, `therapist_name`, `Type`) VALUES
(112, 1, 'DXnull', 'HUDA. M', 'DX'),
(112, 2, 'DXnull', 'HUDA. M', 'DX'),
(112, 3, 'DXnull', 'HUDA. M', 'DX'),
(112, 4, 'TXnull', 'HUDA. M', 'TX');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`Type`) VALUES
('DX'),
('TX');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_sessions`
--

CREATE TABLE `treatment_sessions` (
  `Session_ID` int(11) NOT NULL,
  `Treatment_Plan` varchar(20) DEFAULT NULL,
  `Diagnosis` varchar(20) DEFAULT NULL,
  `Treatment_date` date DEFAULT NULL,
  `File_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `file_number` (`file_number`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `intake_appointments`
--
ALTER TABLE `intake_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Therapist` (`Therapist_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`File_Number`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`File_Number`,`Report_ID`),
  ADD KEY `Report_ID` (`Report_ID`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`Type`);

--
-- Indexes for table `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  ADD PRIMARY KEY (`Session_ID`),
  ADD KEY `File_Number` (`File_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `intake_appointments`
--
ALTER TABLE `intake_appointments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `File_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  MODIFY `Session_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`file_number`) REFERENCES `patient` (`File_Number`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `intake_appointments`
--
ALTER TABLE `intake_appointments`
  ADD CONSTRAINT `intake_appointments_ibfk_1` FOREIGN KEY (`Therapist_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`File_Number`) REFERENCES `patient` (`File_Number`);

--
-- Constraints for table `treatment_sessions`
--
ALTER TABLE `treatment_sessions`
  ADD CONSTRAINT `treatment_sessions_ibfk_1` FOREIGN KEY (`File_Number`) REFERENCES `patient` (`File_Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
