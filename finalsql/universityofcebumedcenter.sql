-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 07:46 PM
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
-- Database: `checkdb`
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
  `patient_type` enum('in','out','','') NOT NULL
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

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `disease_desc`) VALUES
(1, 'Coronary Heart Disease', 'Coronary heart disease has been labelled the ?silent epidemic? by some in the medical field'),
(2, 'hypertension', 'referred to as high blood pressure, is extremely hard to diagnose'),
(3, 'stroke', 'referred to as ?brain attacks,? and occur when the flow of blood to the brain is cut off. When a stroke occurs, brain cells are deprived of oxygen and begin to die.'),
(4, 'Ifluenza', 'Influenza is a very contagious virus that produces flu-like symptoms'),
(5, 'Breast Cancer', 'he tumor is malignant (cancer) if the cells can grow into (invade) surrounding tissues or spread (metastasize) to distant areas of the body'),
(6, 'Pneumonia', 'pneumonia is an infection that causes your lungs to fill up with fluid and puss. '),
(7, 'Tuberculosis', 'an extremely contagious infection that attacks the lungs, but has the ability to spread to other parts of the body such as your brain and spine'),
(8, 'Lung Disease', 'Lung conditions defined by an inability to exhale normally, which causes difficulty breathing. Chronic bronchitis: A form of COPD characterized by a chronic productive cough.'),
(9, 'Diabetes Mellitus', 'a disease that affects your body\'s ability to produce or use insulin. Insulin is a hormone. When your body turns the food you eat into energy (also called sugar or glucose), insulin is released to help transport this energy to the cells. Insulin acts as a ?key.?'),
(10, 'Kidney Disease', 'pair of organs that are found on either side of the spine, just below the rib cage in the back.?Kidneys: filter waste materials out of the blood and pass them out of the body as urine. regulate blood pressure and the levels of water, salts, and minerals in the body.'),
(11, 'Asthma', 'causes recurring periods of wheezing (a whistling sound when you breathe), chest tightness, shortness of breath, and coughing. The coughing often occurs at night or early in the morning.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doc_Fname` varchar(100) NOT NULL,
  `doc_Lname` varchar(100) NOT NULL,
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
  `result` varchar(300) NOT NULL,
  `discharge_date` date NOT NULL,
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
  `patient_contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `birthdate` date NOT NULL,
  `civil_status` enum('married','single','widowed','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients_tests`
--

CREATE TABLE `patients_tests` (
  `pTest_id` int(11) NOT NULL,
  `pTest_result` varchar(200) NOT NULL,
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
  `room_number` varchar(50) NOT NULL,
  `occupants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`) VALUES
(1, 'Full Blood Count Test'),
(2, 'Kidney Test'),
(3, 'Liver Function Test'),
(4, 'Cholesterol Test'),
(5, 'Blood Glucose Test'),
(6, 'Antibodies Test'),
(7, 'Urine test'),
(8, 'Infectious Disease Screening'),
(9, 'Cancer Test'),
(10, 'Heart Test');

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
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
