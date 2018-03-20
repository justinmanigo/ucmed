-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 12:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_plan`
--

CREATE TABLE `delivery_plan` (
  `delivery_id` int(11) NOT NULL,
  `prepregnancy_id` int(11) NOT NULL,
  `to_be_deilvered_by` varchar(15) NOT NULL,
  `where_to_deliver` varchar(250) NOT NULL,
  `newborn_screening_date` date NOT NULL,
  `estimated_confinement_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_plan`
--

INSERT INTO `delivery_plan` (`delivery_id`, `prepregnancy_id`, `to_be_deilvered_by`, `where_to_deliver`, `newborn_screening_date`, `estimated_confinement_date`) VALUES
(1, 1, 'Dr. Lei Gorospe', 'Cebu Velez Hospital', '2009-01-08', '2009-01-02'),
(2, 2, 'Dr. Pamela Maso', 'North General Hospital', '2011-11-15', '2011-11-02'),
(3, 3, 'Dr. Pilar Ramir', 'Talamban Health Center', '2012-12-19', '2012-12-03'),
(4, 4, 'Dr. Ella Igana', 'Cebu Velez Hospital', '2013-06-18', '2013-06-03'),
(5, 5, 'Dr. Lei Hizola', 'Cebu City Medical Center', '2013-08-29', '2013-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `lab_exam`
--

CREATE TABLE `lab_exam` (
  `lab_num` int(10) NOT NULL,
  `prepregnancy_id` int(11) NOT NULL,
  `urinalysis` varchar(25) NOT NULL,
  `CBC` varchar(30) NOT NULL,
  `blood_typing` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_exam`
--

INSERT INTO `lab_exam` (`lab_num`, `prepregnancy_id`, `urinalysis`, `CBC`, `blood_typing`) VALUES
(1, 1, 'Yellow Urine', '13', 'A+'),
(2, 2, 'Yellow Urine', '15', 'B-'),
(3, 3, 'Orange Urine', '14', 'O+'),
(4, 4, 'Orange Urine', '13', 'O+'),
(5, 5, 'Orange Urine', '13', 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `med_history_num` int(10) NOT NULL,
  `previous_hospitilization` varchar(30) DEFAULT NULL,
  `previous_pregnancy_complication` varchar(50) DEFAULT NULL,
  `mother_id` int(11) NOT NULL,
  `illness` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`med_history_num`, `previous_hospitilization`, `previous_pregnancy_complication`, `mother_id`, `illness`) VALUES
(1, NULL, NULL, 1, NULL),
(2, NULL, NULL, 2, NULL),
(3, NULL, NULL, 3, 'Diabetes'),
(4, NULL, 'Eclamsia', 4, NULL),
(5, 'Dengue', NULL, 5, NULL),
(6, 'Appendicitis', NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `mother_id` int(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `husband_name` varchar(40) DEFAULT NULL,
  `height` decimal(4,0) NOT NULL,
  `gravida` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`mother_id`, `address`, `husband_name`, `height`, `gravida`, `first_name`, `last_name`, `date_of_birth`) VALUES
(1, '9646 Kensington Park', 'Douglas Suarez', '148', 2, 'Martha', 'Suarez', '1978-12-28'),
(2, '90 Roth Point', 'Jose Pepito', '153', 3, 'Irene', 'Pepito', '1988-02-27'),
(3, '83 Sutherland Drive', 'Edward Villasencio', '144', 2, 'Beverly', 'Villasencio', '1984-09-08'),
(4, 'Bacayan, Cebu City', 'Dennis Cinco', '161', 2, 'Tammy', 'Cinco', '1981-06-09'),
(5, 'Banilad Mandaue City', 'Harry Cortes', '142', 2, 'Virginia', 'Cortes', '1992-08-05'),
(6, 'Lapu-Lapu City', 'Priam Son', '148', 1, 'Kathy', 'Son', '1982-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `obstetrical_history`
--

CREATE TABLE `obstetrical_history` (
  `obs_id` int(10) NOT NULL,
  `mother_id` int(2) NOT NULL,
  `no_of_children_born_alive` int(2) DEFAULT NULL,
  `no_of_living_children` int(2) DEFAULT NULL,
  `no_of_abortion` int(2) DEFAULT NULL,
  `no_of_fatal_deaths` int(2) DEFAULT NULL,
  `last_delivery_type` varchar(20) DEFAULT NULL,
  `large_babies_history` int(20) DEFAULT NULL,
  `diabetes_history` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obstetrical_history`
--

INSERT INTO `obstetrical_history` (`obs_id`, `mother_id`, `no_of_children_born_alive`, `no_of_living_children`, `no_of_abortion`, `no_of_fatal_deaths`, `last_delivery_type`, `large_babies_history`, `diabetes_history`) VALUES
(1, 1, 0, 0, 0, 1, NULL, 0, 'None'),
(2, 2, 0, 1, 0, 0, NULL, 0, 'None'),
(3, 3, 0, 0, 0, 1, NULL, 0, 'None'),
(4, 4, 1, 1, 0, 1, 'Normal', 1, 'None'),
(5, 5, 0, 0, 1, 0, NULL, 0, 'None'),
(6, 6, 1, 1, 0, 0, 'Normal', 0, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `post_pregnancy`
--

CREATE TABLE `post_pregnancy` (
  `postpregnancy_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `attended_by` varchar(50) NOT NULL,
  `no_of_pad_per_day` int(2) NOT NULL,
  `delivery_time` varchar(10) NOT NULL,
  `delivery_place` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_pregnancy`
--

INSERT INTO `post_pregnancy` (`postpregnancy_id`, `mother_id`, `attended_by`, `no_of_pad_per_day`, `delivery_time`, `delivery_place`, `delivery_date`) VALUES
(1, 2, 'Dr. Elsie Hondrado', 9, '18:45', 'North General Hospital', '2011-11-06'),
(2, 1, 'Dr. Rosita Liao', 12, '04:37', 'Talamban Health Center', '2009-01-08'),
(3, 2, 'Dr. Ella Igana', 10, '09:42', 'Chong Hua Hospital', '2012-12-20'),
(4, 4, 'Dr. Rosita Lahaylahay', 13, '17:43', 'Cebu City Medical Center', '2013-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `post_visit_notes`
--

CREATE TABLE `post_visit_notes` (
  `postpregnancy_id` int(11) NOT NULL,
  `postvisit_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `lochial_discharge` varchar(50) NOT NULL,
  `blood_pressure` varchar(9) NOT NULL,
  `feeding` varchar(40) NOT NULL,
  `findings` varchar(50) DEFAULT NULL,
  `nurse_notes` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_visit_notes`
--

INSERT INTO `post_visit_notes` (`postpregnancy_id`, `postvisit_id`, `date`, `lochial_discharge`, `blood_pressure`, `feeding`, `findings`, `nurse_notes`) VALUES
(1, 1, '2012-02-10', 'present', '120/80', 'breastfeeding', '', 'Exercise Daily'),
(1, 2, '2012-01-04', 'absent', '120/90', 'bottle', '', ''),
(2, 3, '2017-03-09', 'present', '110/90', 'breastfeeding', 'Dehydration', 'Increase intake of fluid'),
(3, 4, '2012-12-23', 'present', '130/90', 'breastfeeding', 'fever', 'Increase intake of fluid, promote proper hygiene'),
(3, 5, '2013-01-26', 'absent', '110/80', 'breastfeeding', '', 'Exercise daily'),
(4, 6, '2013-08-29', 'present', '110/80', 'breastfeeding', '', 'Increase intake of fluids'),
(4, 7, '2013-12-23', 'absent', '120/90', 'bottle', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_termination`
--

CREATE TABLE `pregnancy_termination` (
  `termination_id` int(2) NOT NULL,
  `termination_date` date DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `birth_weight` float DEFAULT NULL,
  `delivery_place` varchar(20) DEFAULT NULL,
  `delivered_by` varchar(50) DEFAULT NULL,
  `mother_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pregnancy_termination`
--

INSERT INTO `pregnancy_termination` (`termination_id`, `termination_date`, `time`, `birth_weight`, `delivery_place`, `delivered_by`, `mother_id`) VALUES
(1, '2017-03-16', '00:21', 29, 'Chong Hua Hospital', 'Dr. Giselle Lahaylahay', 3),
(2, '2006-03-11', '17:17', 12, 'Talamban Health Cent', 'Dr, Rosita Liao', 1),
(3, '2003-11-20', '00:32', 12, 'Talamban Health Cent', 'Dr. Rosita Lahaylahay', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pre_pregnancy`
--

CREATE TABLE `pre_pregnancy` (
  `prepregnancy_id` int(11) NOT NULL,
  `mother_id` int(10) NOT NULL,
  `last_menstrual_period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_pregnancy`
--

INSERT INTO `pre_pregnancy` (`prepregnancy_id`, `mother_id`, `last_menstrual_period`) VALUES
(1, 1, '2008-04-05'),
(2, 2, '2011-02-04'),
(3, 2, '2012-03-02'),
(4, 3, '2012-09-08'),
(5, 4, '2012-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `pre_visit_notes`
--

CREATE TABLE `pre_visit_notes` (
  `previsit_id` int(11) NOT NULL,
  `prepregnancy_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `gestational_age` int(2) NOT NULL,
  `weight` decimal(4,0) NOT NULL,
  `BP` varchar(9) NOT NULL,
  `fundal_height` decimal(3,0) NOT NULL,
  `fetal_heartbeat` int(3) NOT NULL,
  `presenting_part_of_fetus` varchar(25) NOT NULL,
  `findings` varchar(50) NOT NULL,
  `nurse_notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_visit_notes`
--

INSERT INTO `pre_visit_notes` (`previsit_id`, `prepregnancy_id`, `date`, `gestational_age`, `weight`, `BP`, `fundal_height`, `fetal_heartbeat`, `presenting_part_of_fetus`, `findings`, `nurse_notes`) VALUES
(1, 1, '2008-05-07', 1, '52', '110/70', '12', 0, 'none', '', 'Increase intake of fluids'),
(2, 1, '2008-06-12', 2, '54', '140/90', '16', 125, 'none', '', 'Exercise Daily'),
(3, 1, '1970-01-01', 3, '57', '140/90', '21', 142, 'none', '', 'Avoid Strenuous activities'),
(4, 1, '2008-07-31', 3, '57', '120/110', '22', 142, 'none', '', 'Drink much water.\r\nExercise Daily'),
(5, 2, '2011-02-04', 0, '39', '130/90', '12', 0, 'none', 'Fever', 'Drink vitamins for stronger immune system'),
(6, 2, '2011-04-12', 3, '47', '140/80', '23', 143, 'none', 'Good condition', 'Increase intake of fluids'),
(7, 3, '2012-12-12', 2, '48', '120/80', '17', 0, 'none', '', 'Eat nutritious food'),
(8, 4, '2012-09-27', 0, '45', '110/80', '10', 0, 'none', '', 'Drink vitamins daily'),
(9, 4, '2012-10-26', 1, '47', '110/80', '14', 0, 'none', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `risks`
--

CREATE TABLE `risks` (
  `risk_code` int(2) NOT NULL,
  `risk_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `risks`
--

INSERT INTO `risks` (`risk_code`, `risk_desc`) VALUES
(1, 'An age less than 18 or greater than 35'),
(2, 'Height less than 145 cm'),
(3, 'Having a fourth (or more) pregnancy'),
(5, 'Has either previous Caesarian Section, 3 consecutive miscarriages of stillborn baby, or postpartum hemorrhage'),
(6, 'Having either tuberculosis, heart disease, diabetes, bronchial asthma, or goiter');

-- --------------------------------------------------------

--
-- Table structure for table `risk_table`
--

CREATE TABLE `risk_table` (
  `mother_id` int(11) NOT NULL,
  `prepregnancy_id` int(11) NOT NULL,
  `risk_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_table`
--

INSERT INTO `risk_table` (`mother_id`, `prepregnancy_id`, `risk_code`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 6),
(2, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptom_code` int(11) NOT NULL,
  `symptom_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptom_code`, `symptom_desc`) VALUES
(1, 'Vaginal Bleeding'),
(2, 'Severe Headache'),
(3, 'Blurring of Vision'),
(4, 'Abdominal pain'),
(5, 'Severe Vomiting'),
(6, 'Breathing Difficulty'),
(7, 'Convulsion'),
(8, 'Edema'),
(9, 'Varicosities'),
(10, 'Dental Carries'),
(11, 'Chills and fever'),
(12, 'Breast Abnormalities'),
(13, 'Urinating pain'),
(14, 'Vaginal discharges'),
(15, 'Diabetes'),
(16, 'Vaginal fluid');

-- --------------------------------------------------------

--
-- Table structure for table `symptom_table`
--

CREATE TABLE `symptom_table` (
  `mother_id` int(11) NOT NULL,
  `prepregnancy_id` int(11) NOT NULL,
  `symptom_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom_table`
--

INSERT INTO `symptom_table` (`mother_id`, `prepregnancy_id`, `symptom_code`) VALUES
(1, 1, 2),
(1, 1, 3),
(2, 2, 2),
(2, 3, 2),
(2, 3, 13),
(3, 4, 5),
(3, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tt_status`
--

CREATE TABLE `tt_status` (
  `TT_id` int(10) NOT NULL,
  `date_given1` date DEFAULT NULL,
  `date_given2` date DEFAULT NULL,
  `date_given3` date DEFAULT NULL,
  `date_given4` date DEFAULT NULL,
  `date_given5` date DEFAULT NULL,
  `date_given6` date DEFAULT NULL,
  `mother_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tt_status`
--

INSERT INTO `tt_status` (`TT_id`, `date_given1`, `date_given2`, `date_given3`, `date_given4`, `date_given5`, `date_given6`, `mother_id`) VALUES
(1, '2010-11-18', '2010-02-20', NULL, NULL, NULL, NULL, 2),
(2, '2008-12-18', '2009-02-19', NULL, NULL, NULL, NULL, 1),
(3, '2013-07-12', NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_plan`
--
ALTER TABLE `delivery_plan`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `prepregnancy_id` (`prepregnancy_id`);

--
-- Indexes for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD PRIMARY KEY (`lab_num`),
  ADD KEY `prepregnancy_id` (`prepregnancy_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`med_history_num`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`mother_id`);

--
-- Indexes for table `obstetrical_history`
--
ALTER TABLE `obstetrical_history`
  ADD PRIMARY KEY (`obs_id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indexes for table `post_pregnancy`
--
ALTER TABLE `post_pregnancy`
  ADD PRIMARY KEY (`postpregnancy_id`);

--
-- Indexes for table `post_visit_notes`
--
ALTER TABLE `post_visit_notes`
  ADD PRIMARY KEY (`postvisit_id`),
  ADD KEY `postpregnancy_id` (`postpregnancy_id`);

--
-- Indexes for table `pregnancy_termination`
--
ALTER TABLE `pregnancy_termination`
  ADD PRIMARY KEY (`termination_id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indexes for table `pre_pregnancy`
--
ALTER TABLE `pre_pregnancy`
  ADD PRIMARY KEY (`prepregnancy_id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indexes for table `pre_visit_notes`
--
ALTER TABLE `pre_visit_notes`
  ADD PRIMARY KEY (`previsit_id`),
  ADD KEY `prepregnancy_id` (`prepregnancy_id`);

--
-- Indexes for table `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`risk_code`);

--
-- Indexes for table `risk_table`
--
ALTER TABLE `risk_table`
  ADD KEY `mother_id` (`mother_id`),
  ADD KEY `risk_table` (`risk_code`),
  ADD KEY `prepregnancy_id` (`prepregnancy_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptom_code`);

--
-- Indexes for table `symptom_table`
--
ALTER TABLE `symptom_table`
  ADD KEY `previsit_id` (`mother_id`),
  ADD KEY `symptom_code` (`symptom_code`),
  ADD KEY `prepregnancy_id` (`prepregnancy_id`);

--
-- Indexes for table `tt_status`
--
ALTER TABLE `tt_status`
  ADD PRIMARY KEY (`TT_id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_plan`
--
ALTER TABLE `delivery_plan`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lab_exam`
--
ALTER TABLE `lab_exam`
  MODIFY `lab_num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `med_history_num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `mother_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `obstetrical_history`
--
ALTER TABLE `obstetrical_history`
  MODIFY `obs_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post_pregnancy`
--
ALTER TABLE `post_pregnancy`
  MODIFY `postpregnancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post_visit_notes`
--
ALTER TABLE `post_visit_notes`
  MODIFY `postvisit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pregnancy_termination`
--
ALTER TABLE `pregnancy_termination`
  MODIFY `termination_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pre_pregnancy`
--
ALTER TABLE `pre_pregnancy`
  MODIFY `prepregnancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pre_visit_notes`
--
ALTER TABLE `pre_visit_notes`
  MODIFY `previsit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `risks`
--
ALTER TABLE `risks`
  MODIFY `risk_code` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptom_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tt_status`
--
ALTER TABLE `tt_status`
  MODIFY `TT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_plan`
--
ALTER TABLE `delivery_plan`
  ADD CONSTRAINT `delivery_plan_ibfk_2` FOREIGN KEY (`prepregnancy_id`) REFERENCES `pre_pregnancy` (`prepregnancy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD CONSTRAINT `lab_exam_ibfk_2` FOREIGN KEY (`prepregnancy_id`) REFERENCES `pre_pregnancy` (`prepregnancy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE;

--
-- Constraints for table `obstetrical_history`
--
ALTER TABLE `obstetrical_history`
  ADD CONSTRAINT `obstetrical_history_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE;

--
-- Constraints for table `post_visit_notes`
--
ALTER TABLE `post_visit_notes`
  ADD CONSTRAINT `post_visit_notes_ibfk_1` FOREIGN KEY (`postpregnancy_id`) REFERENCES `post_pregnancy` (`postpregnancy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pregnancy_termination`
--
ALTER TABLE `pregnancy_termination`
  ADD CONSTRAINT `pregnancy_termination_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pre_pregnancy`
--
ALTER TABLE `pre_pregnancy`
  ADD CONSTRAINT `pre_pregnancy_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pre_visit_notes`
--
ALTER TABLE `pre_visit_notes`
  ADD CONSTRAINT `pre_visit_notes_ibfk_1` FOREIGN KEY (`prepregnancy_id`) REFERENCES `pre_pregnancy` (`prepregnancy_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
