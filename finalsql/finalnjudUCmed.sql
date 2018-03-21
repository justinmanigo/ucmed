-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 06:42 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `diagnose_date` date NOT NULL,
  `treatment` varchar(300) NOT NULL,
  `paid_amount` float NOT NULL,
  `patient_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `disease_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doc_Fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `in_patients`
--

CREATE TABLE `in_patients` (
  `in_id` int(11) NOT NULL,
  `results` varchar(300) NOT NULL,
  `room_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `out_patients`
--

CREATE TABLE `out_patients` (
  `out_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `consultation_result` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_Fname` varchar(100) NOT NULL,
  `patient_Lname` varchar(100) NOT NULL,
  `patient_contact` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `civil_status` enum('in','out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients_tests`
--

CREATE TABLE `patients_tests` (
  `pTest_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pTest_date` date NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` enum('ward','semi private','private','') NOT NULL,
  `room_number` int(11) NOT NULL,
  `occupants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_result` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `doctors_diagnosis` (`doctor_id`),
  ADD KEY `doctors_patients` (`patient_id`),
  ADD KEY `doctors_disease` (`disease_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `in_patient_diagnosis` (`diagnosis_id`),
  ADD KEY `in_patient_room` (`room_id`);

--
-- Indexes for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `out_patients_diagnosis` (`diagnosis_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patients_tests`
--
ALTER TABLE `patients_tests`
  ADD PRIMARY KEY (`pTest_id`),
  ADD KEY `patient_test_patient` (`patient_id`),
  ADD KEY `test_patienttest` (`test_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `in_patients`
--
ALTER TABLE `in_patients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `out_patients`
--
ALTER TABLE `out_patients`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients_tests`
--
ALTER TABLE `patients_tests`
  MODIFY `pTest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `doctors_diagnosis` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `doctors_disease` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`disease_id`),
  ADD CONSTRAINT `doctors_patients` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD CONSTRAINT `in_patient_diagnosis` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`),
  ADD CONSTRAINT `in_patient_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD CONSTRAINT `out_patients_diagnosis` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`);

--
-- Constraints for table `patients_tests`
--
ALTER TABLE `patients_tests`
  ADD CONSTRAINT `patient_test_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `test_patienttest` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
