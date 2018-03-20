-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 03:29 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `pre_pregnancy`
--

CREATE TABLE `pre_pregnancy` (
  `prepregnancy_id` int(11) NOT NULL,
  `mother_id` int(10) NOT NULL,
  `last_menstrual_period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 2);

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
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_exam`
--
ALTER TABLE `lab_exam`
  MODIFY `lab_num` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `med_history_num` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `mother_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `obstetrical_history`
--
ALTER TABLE `obstetrical_history`
  MODIFY `obs_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_pregnancy`
--
ALTER TABLE `post_pregnancy`
  MODIFY `postpregnancy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_visit_notes`
--
ALTER TABLE `post_visit_notes`
  MODIFY `postvisit_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pregnancy_termination`
--
ALTER TABLE `pregnancy_termination`
  MODIFY `termination_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pre_pregnancy`
--
ALTER TABLE `pre_pregnancy`
  MODIFY `prepregnancy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pre_visit_notes`
--
ALTER TABLE `pre_visit_notes`
  MODIFY `previsit_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `TT_id` int(10) NOT NULL AUTO_INCREMENT;
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

--
-- Constraints for table `risk_table`
--
ALTER TABLE `risk_table`
  ADD CONSTRAINT `risk_table_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risk_table_ibfk_2` FOREIGN KEY (`risk_code`) REFERENCES `risks` (`risk_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risk_table_ibfk_3` FOREIGN KEY (`prepregnancy_id`) REFERENCES `pre_pregnancy` (`prepregnancy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `symptom_table`
--
ALTER TABLE `symptom_table`
  ADD CONSTRAINT `symptom_table_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `symptom_table_ibfk_2` FOREIGN KEY (`symptom_code`) REFERENCES `symptoms` (`symptom_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `symptom_table_ibfk_3` FOREIGN KEY (`prepregnancy_id`) REFERENCES `pre_pregnancy` (`prepregnancy_id`) ON UPDATE CASCADEs;

--
-- Constraints for table `tt_status`
--
ALTER TABLE `tt_status`
  ADD CONSTRAINT `tt_status_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mother` (`mother_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
