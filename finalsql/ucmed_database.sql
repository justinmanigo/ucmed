-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 07:53 AM
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
-- Database: `ucmed_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cares`
--

CREATE TABLE `cares` (
  `care_id` int(11) NOT NULL,
  `in_id` int(11) NOT NULL,
  `nurse_name` varchar(100) NOT NULL,
  `blood_pressure` varchar(30) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `respiratory_rate` varchar(100) NOT NULL,
  `pulse_rate` varchar(30) NOT NULL,
  `care_date` date NOT NULL,
  `care_time` time NOT NULL,
  `concern` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cares`
--

INSERT INTO `cares` (`care_id`, `in_id`, `nurse_name`, `blood_pressure`, `temperature`, `respiratory_rate`, `pulse_rate`, `care_date`, `care_time`, `concern`) VALUES
(1, 1, 'christine pena', 'asd', '32', '32', '32', '2009-09-09', '14:00:00', 'none'),
(2, 1, 'mam sir', '10/10', '20/20', '30/30', '40/40', '2008-08-08', '15:00:00', 'Need help'),
(3, 1, 'dasda', '101', '20/20', '30/30', '40/40', '2007-07-07', '15:00:00', 'Need help'),
(4, 1, '123', '1321', '20/20', '30/30', '40/40', '2018-03-14', '15:00:00', 'Need help'),
(5, 1, 'qwe', '1321', '60', '46/21', '75/24', '2018-03-14', '16:00:00', 'none'),
(6, 8, 'Mam sir', '1232131', '30', '54/45', '84/', '2018-03-22', '03:08:00', 'none'),
(7, 11, 'pia wurerads', '60', '30', '30', '40', '2018-03-22', '02:01:00', 'NONE'),
(8, 13, 'mary', '65', '30', '48', '60', '2018-03-26', '01:00:00', 'none'),
(10, 19, 'aljay', '12', '40', '30', '23', '2018-03-27', '01:02:00', 'none'),
(11, 26, 'mary anne', '65', '65', '655', '65', '2018-03-16', '01:00:00', 'none');

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
  `results` varchar(300) NOT NULL,
  `paid_amount` float NOT NULL,
  `patient_type` enum('in','out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `patient_id`, `doctor_id`, `disease_id`, `diagnose_date`, `results`, `paid_amount`, `patient_type`) VALUES
(1, 2, 1, 8, '2018-03-15', 'to be observe', 450, 'in'),
(2, 3, 1, 6, '2018-04-12', 'none', 500, 'out'),
(3, 4, 1, 3, '2018-03-20', 'rest', 120, 'in'),
(4, 5, 1, 11, '2018-03-21', 'drink water', 600, 'out'),
(5, 6, 1, 10, '2018-05-23', 'none', 500, 'out'),
(6, 7, 1, 8, '2018-02-15', 'none', 500, 'out'),
(8, 13, 1, 1, '2010-10-10', 'Results are fine', 0, 'in'),
(9, 14, 1, 1, '0012-12-12', '1212', 0, 'in'),
(12, 17, 1, 1, '1010-03-12', '123123123', 0, 'in'),
(13, 18, 1, 1, '0012-12-12', '1212', 0, 'in'),
(14, 19, 1, 1, '2018-12-31', 'qweqwe', 0, 'in'),
(23, 28, 1, 3, '0000-00-00', '123123', 0, 'out'),
(24, 29, 1, 2, '0000-00-00', 'qweqweqwe', 0, 'in'),
(25, 30, 1, 1, '0000-00-00', 'qweqwe', 500, 'out'),
(26, 31, 1, 1, '2018-12-31', 'qweqwe', 0, 'in'),
(28, 32, 1, 1, '2018-12-31', 'qweqwe', 0, 'in'),
(29, 33, 1, 1, '2018-12-31', 'ewqeqwe', 5680, 'in'),
(30, 34, 1, 3, '2018-05-18', 'tbd', 0, 'in'),
(31, 35, 1, 1, '0000-00-00', 'bad', 500, 'out'),
(32, 36, 1, 1, '0000-00-00', '12313', 500, 'out'),
(33, 37, 1, 1, '0000-00-00', 'qweqwe', 1975, 'out'),
(34, 38, 1, 1, '0000-00-00', 'qwe', 1990, 'out'),
(35, 39, 1, 1, '0000-00-00', 'qwe', 1990, 'out'),
(36, 39, 1, 1, '0000-00-00', 'qwe', 1990, 'out'),
(37, 39, 1, 1, '2010-10-10', 'qwe', 1990, 'out'),
(38, 40, 1, 1, '2018-03-11', 'qwe', 100, 'in'),
(39, 41, 1, 1, '2004-04-04', 'qwe', 2004, 'out'),
(40, 42, 1, 3, '2018-03-11', '12121', 100, 'in'),
(44, 42, 1, 1, '2018-03-11', 'bad', 40, 'in'),
(46, 2, 1, 1, '2018-03-13', 'bad', 500, 'out'),
(48, 3, 1, 1, '2018-03-12', 'sever cough due to disease', 500, 'out'),
(49, 2, 1, 1, '2018-03-25', 'wew', 500, 'out'),
(50, 2, 1, 1, '2018-03-25', 'wew', 500, 'out'),
(51, 3, 1, 2, '2018-03-27', 'w3w', 500, 'out'),
(52, 4, 1, 3, '2018-03-13', 'w3w', 500, 'out'),
(53, 4, 1, 3, '2018-03-13', 'w3w', 500, 'out'),
(54, 4, 1, 3, '0000-00-00', 'w3w', 500, 'out'),
(55, 4, 1, 4, '2018-03-28', 'w3w', 500, 'out'),
(56, 4, 1, 11, '2018-03-25', 'w3w', 500, 'out'),
(57, 4, 1, 5, '2018-03-18', 'weqe', 500, 'out'),
(58, 46, 1, 3, '2018-03-14', 'ok', 500, 'out'),
(59, 47, 1, 1, '2018-03-26', 'ok', 0, 'in'),
(60, 48, 1, 3, '2018-03-10', 'ok', 800, 'in'),
(62, 49, 1, 5, '2018-03-21', 'none', 0, 'in'),
(63, 50, 1, 22, '2018-03-26', 'severe', 160, 'in'),
(64, 50, 1, 6, '2018-03-27', 'none', 120, 'in'),
(65, 51, 1, 6, '2018-03-21', 'ok', 500, 'out'),
(66, 52, 1, 4, '2018-03-21', 'sada', 480, 'in'),
(68, 2, 1, 5, '2018-03-22', '123', 500, 'out'),
(69, 2, 1, 2, '2018-03-20', 'ZXCCX', 0, 'in'),
(70, 2, 1, 2, '2018-03-20', 'ZXCCX', 0, 'in'),
(72, 53, 1, 11, '2018-03-27', 'severe', 80, 'in'),
(73, 54, 1, 2, '2018-03-23', 'fine', 500, 'out'),
(74, 55, 1, 3, '2018-03-06', 'ok', 0, 'in'),
(75, 56, 1, 2, '2018-03-15', 'dsa', 0, 'in'),
(76, 2, 1, 2, '2018-03-17', 'kjkj', 500, 'out'),
(77, 57, 1, 4, '2018-03-21', 'edsa', 4500, 'in'),
(78, 58, 1, 3, '2018-03-20', 'none', 500, 'out'),
(79, 59, 1, 3, '2018-03-21', 'dadas', 500, 'out'),
(80, 2, 1, 2, '2018-03-20', 'dsada', 500, 'out'),
(81, 60, 1, 2, '2018-03-27', 'dsada', 120, 'in'),
(82, 61, 1, 3, '2018-03-20', 'ddsaa', 500, 'out'),
(84, 62, 1, 8, '2018-03-29', 'severe', 1000, 'in'),
(87, 62, 1, 4, '2018-03-20', 'saads', 500, 'out'),
(88, 62, 1, 22, '2018-03-13', 'severe', 0, 'in'),
(89, 63, 1, 9, '2018-03-28', 'amazing', 0, 'in');

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
(11, 'Asthma', 'causes recurring periods of wheezing (a whistling sound when you breathe), chest tightness, shortness of breath, and coughing. The coughing often occurs at night or early in the morning.'),
(22, 'anemia', 'saefs');

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

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doc_Fname`, `doc_Lname`, `email`, `username`, `password`) VALUES
(1, 'Jester Ivan', 'Manigo', 'JesterIvanManigo@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `in_patients`
--

CREATE TABLE `in_patients` (
  `in_id` int(11) NOT NULL,
  `discharge_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_patients`
--

INSERT INTO `in_patients` (`in_id`, `discharge_date`, `room_id`, `diagnosis_id`) VALUES
(1, '2018-03-30', 17, 1),
(2, '2018-03-14', 4, 3),
(4, '0000-00-00', 1, 28),
(5, '2018-03-21', 1, 29),
(6, '0000-00-00', 2, 30),
(7, '2018-03-16', 1, 38),
(8, '2018-03-16', 1, 40),
(9, '2018-03-13', 2, 44),
(10, '0000-00-00', 6, 59),
(11, '2018-03-30', 26, 60),
(12, '0000-00-00', 26, 62),
(13, '2018-03-30', 27, 63),
(14, '2018-03-30', 28, 64),
(15, '2018-03-08', 30, 66),
(16, '0000-00-00', 27, 69),
(17, '0000-00-00', 27, 70),
(19, '2018-03-29', 29, 72),
(20, '0000-00-00', 17, 74),
(21, '0000-00-00', 20, 75),
(22, '2018-03-30', 3, 77),
(23, '2018-03-31', 19, 81),
(25, '2018-03-31', 5, 84),
(26, '0000-00-00', 20, 88),
(27, '0000-00-00', 30, 89);

-- --------------------------------------------------------

--
-- Table structure for table `out_patients`
--

CREATE TABLE `out_patients` (
  `out_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `doctors_prescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_patients`
--

INSERT INTO `out_patients` (`out_id`, `diagnosis_id`, `doctors_prescription`) VALUES
(1, 2, ''),
(2, 4, ''),
(3, 5, ''),
(4, 6, ''),
(5, 23, ''),
(6, 34, 'qwe'),
(7, 35, 'qwe'),
(8, 39, 'qwewqe'),
(50, 48, 'qwe'),
(51, 48, ''),
(52, 48, ''),
(53, 48, ''),
(54, 48, ''),
(55, 48, ''),
(56, 48, ''),
(57, 48, ''),
(58, 48, ''),
(59, 48, ''),
(60, 48, ''),
(61, 48, ''),
(62, 48, ''),
(63, 49, 'w3w'),
(64, 50, 'w3w'),
(65, 51, 'w3w'),
(66, 52, 'w3w'),
(67, 53, 'w3w'),
(68, 54, 'w3w'),
(69, 54, ''),
(70, 55, 'w3w'),
(71, 55, ''),
(72, 56, 'w3w'),
(73, 57, 'weqwe'),
(74, 58, 'none'),
(75, 65, 'none'),
(77, 68, 'nnn'),
(78, 73, 'none'),
(79, 76, 'kjii'),
(80, 78, 'none'),
(81, 79, 'dda'),
(82, 80, 'none'),
(83, 82, 'dsada'),
(86, 87, 'sdad');

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
  `civil_status` enum('married','single','widowed','') NOT NULL,
  `patient_BloodType` varchar(100) NOT NULL,
  `patient_height` float NOT NULL,
  `patient_weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_Fname`, `patient_Lname`, `patient_contact`, `address`, `gender`, `birthdate`, `civil_status`, `patient_BloodType`, `patient_height`, `patient_weight`) VALUES
(1, 'justin graig', 'manigo', '09559270965', 'plaridel baybay city leyte', 'male', '0000-00-00', 'single', '', 0, 0),
(2, '  mark eleazir', '  salazar', '  0913252322131', '  minglanilla cebu ', 'male', '2018-03-25', 'single', 'O+', 190, 40),
(3, 'Jiezel', 'Janohan', ' 09234253332', 'Balao Baybay City Leyte ', 'female', '1997-10-01', 'single', 'O-', 170, 50),
(4, 'joseph ', 'boleche', '09235534', 'maslug baybay leyte', 'male', '1997-03-14', 'single', '', 0, 0),
(5, 'mary anne', 'gegrimosa ', '09235123', 'upper malibu', 'female', '1996-03-14', 'single', '', 0, 0),
(6, 'aljay', 'manigo', '09231234', 'plaridel baybay leyte', 'male', '2018-03-20', 'single', '', 0, 0),
(7, 'rannie', 'villaver', '09231234', 'talamban cebu', 'male', '2018-03-14', 'married', '', 0, 0),
(8, 'Mark', 'Salazar', '222-1122', 'Cebu', 'male', '2010-10-10', 'single', 'B+', 159.23, 45.2),
(9, 'testme', 'mark', '222-3344', 'cebu', 'male', '2010-10-10', 'single', 'O+', 150.2, 130.1),
(10, 'qwe', 'qwe', 'qwe', 'qwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(11, 'qwe', 'qwe', 'qwe', 'qweq', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(12, 'qwe', 'qwe', 'qwe', 'qweq', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(13, 'qweqwe', 'qwewqe', 'eqweqwe', 'qweqwe', 'female', '0010-10-10', 'single', 'O+', 1231, 123123),
(14, '123123', '123123', '123123', '123123', 'male', '2017-12-31', 'single', 'O+', 123123, 123123),
(15, 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(16, 'ewqqwe', 'qweqwe', 'weqwe', 'qwe', 'male', '1010-10-10', 'single', 'O+', 0, 0),
(17, 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'male', '0010-10-10', 'single', 'O+', 123, 123),
(18, '123123', '123123', '123123', '123123', 'male', '2017-12-31', 'single', 'O+', 123123, 123123),
(19, 'qweqwe', 'qweqwe', 'qweqwe', '123123', 'male', '2018-12-31', 'single', 'O+', 123123, 123123),
(28, 'qwewqe', 'qweqwe', 'qwewqe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 123, 123),
(29, 'qwewqe', 'qweqwe', 'qewqweqwe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(30, 'qwewqe', 'qwewqe', 'qweqwe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(31, 'qwewqe', 'qweqwe', 'qweqwe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(32, 'qweqwe', 'qweqwe', 'qweqwe', 'qwewqe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(33, 'qweqweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'male', '2018-12-31', 'single', 'O+', 0, 0),
(34, 'justin graig', 'manigo', '12324', 'adas2f', 'male', '2018-03-15', 'single', 'B-', 167, 67),
(35, 'qwe', 'qwe', 'qwe', 'qwe', 'male', '2018-12-31', 'single', 'A-', 123.1, 123.1),
(36, 'qwe', 'qew', 'qwe', 'qwe', 'male', '2018-12-31', 'single', 'O+', 1212, 1212),
(37, 'qwe', 'qwe', 'qwe', 'qwe', 'male', '2018-12-31', 'single', 'O+', 123, 123),
(38, 'qwe', 'qwe', 'qwe', 'qweqwe', 'male', '2001-10-10', 'single', 'O+', 0, 0),
(39, 'qwe', 'qwe', 'qwe', 'qweqwe', 'male', '2001-10-10', 'single', 'O+', 0, 0),
(40, 'qwe', 'qwe', 'qwe', '', 'male', '2010-10-10', 'single', 'O+', 0, 0),
(41, 'qwe', 'qwe', 'qwe', 'qwe', 'male', '2018-12-31', 'single', 'O+', 123, 123),
(42, 'paoo', 'v', '121212', 'cebu', 'male', '2005-10-10', 'single', 'O+', 121, 121),
(46, 'rondina', 'cherry', '09234', 'cebu', 'male', '2018-03-04', 'single', 'A+', 124, 65),
(47, 'boss1', 'xb', '0921323', 'manila', 'male', '2018-03-07', 'single', 'O+', 156, 65),
(48, 'tommy', 'osmena', '092315123', 'cebu', 'male', '2018-03-01', 'married', 'B+', 198, 65),
(49, 'dynacom', 'dalata', '09123', 'cebu', 'female', '2018-03-22', 'single', 'A+', 13223, 43),
(50, 'justin', 'graig', '09234', 'cebu', 'male', '2018-03-15', 'single', 'O-', 176, 65),
(51, 'asus', 'asus', '1312', '2GG', 'male', '2018-03-21', 'single', 'A-', 166, 176),
(52, 'dsa', 'dsada', 'dsa', 'dasda', 'male', '2018-03-07', 'single', 'A+', 22, 31231),
(53, 'Charisse Abigail', 'Manigo', '09123134', 'cebu', 'female', '1996-12-10', 'single', 'A+', 176, 100),
(54, 'josh', 'sjieee', '0923123', 'bislig davao', 'male', '2018-03-07', 'married', 'O-', 165, 45),
(55, 'Roble', 'Shipping', '0932142', 'cebu city', 'male', '1923-01-09', 'single', 'O-', 1231, 53),
(56, 'usc', 'scasd', 'a01923', 'cebue', 'female', '2018-03-07', 'single', 'O-', 165, 65),
(57, 'nada', 'rang', '1234', 'dsac', 'female', '2018-03-01', 'married', 'A+', 165, 16),
(58, 'bon', 'jovi', '0945923123', 'USA', 'male', '2018-03-20', 'married', 'B+', 165, 65),
(59, 'dsa', 'das', 'dsa', 'dasd', 'male', '2018-02-28', 'married', 'O-', 164, 165),
(60, 'aljay', 'manigo', '1231', '32131', 'male', '2018-03-14', 'married', 'A+', 176, 165),
(61, 'dsada', 'dasda', 'dasda', 'dasda', 'female', '2018-03-08', 'widowed', 'A+', 123, 354),
(62, ' tonys', ' parkers', ' 092351233', ' Argentinas', 'female', '2018-03-30', 'single', 'O+', 150, 60),
(63, 'aljay', 'manigo', '09268421476', 'plaridel,baybay city,leyte', 'male', '2000-12-26', 'single', 'A+', 173, 84);

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

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_number`, `occupants`) VALUES
(1, 'ward', '1', 2),
(2, 'ward', '2', 1),
(3, 'ward', '3', 0),
(4, 'ward', '4', 0),
(5, 'ward', '5', 0),
(6, 'ward', '6', 1),
(7, 'ward', '7', 0),
(8, 'ward', '8', 0),
(9, 'ward', '9', 0),
(10, 'ward', '10', 0),
(11, 'ward', '11', 0),
(12, 'ward', '12', 0),
(13, 'ward', '13', 0),
(14, 'ward', '14', 0),
(15, 'ward', '15', 0),
(16, 'semi private', '16', 0),
(17, 'semi private', '17', 1),
(18, 'semi private', '18', 0),
(19, 'semi private', '19', 0),
(20, 'semi private', '20', 2),
(21, 'semi private', '21', 0),
(22, 'semi private', '22', 0),
(23, 'semi private', '23', 0),
(24, 'semi private', '24', 0),
(25, 'semi private', '25', 0),
(26, 'private', '26', 0),
(27, 'private', '27', 0),
(28, 'private', '28', 0),
(29, 'private', '29', 0),
(30, 'private', '30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `test_interpretation` varchar(200) NOT NULL,
  `test_date` date NOT NULL,
  `test_time` time NOT NULL,
  `test_price` float NOT NULL,
  `test_paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `diagnosis_id`, `test_name`, `test_interpretation`, `test_date`, `test_time`, `test_price`, `test_paid`) VALUES
(1, 46, 'cbc', 'dsada', '2018-04-12', '06:14:00', 500, 1000),
(2, 1, 'urine', 'dsada', '2018-04-21', '06:56:00', 500, 1000),
(3, 46, 'test', 'ok', '2018-03-11', '17:00:00', 100, 50),
(4, 46, 'test2', 'bad', '2018-03-12', '18:00:00', 200, 100),
(18, 8, '', '', '0000-00-00', '00:00:00', 0, 0),
(20, 88, 'basdd', 'dsada', '2018-03-22', '01:00:00', 55, 555),
(21, 89, 'blood', 'asdasadsa', '5311-02-12', '16:14:00', 300, 43666);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cares`
--
ALTER TABLE `cares`
  ADD PRIMARY KEY (`care_id`),
  ADD KEY `in_cares` (`in_id`),
  ADD KEY `nurse_care` (`nurse_name`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `diagnosis_test` (`diagnosis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cares`
--
ALTER TABLE `cares`
  MODIFY `care_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `in_patients`
--
ALTER TABLE `in_patients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `out_patients`
--
ALTER TABLE `out_patients`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cares`
--
ALTER TABLE `cares`
  ADD CONSTRAINT `in_cares` FOREIGN KEY (`in_id`) REFERENCES `in_patients` (`in_id`);

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
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `diagnosis_test` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
