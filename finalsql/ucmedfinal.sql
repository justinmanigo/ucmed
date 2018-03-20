-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 11:49 AM
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
-- Database: `hims`
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
  `treatment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `patient_id`, `doctor_id`, `disease_id`, `treatment`) VALUES
(4, 1, 1, 1, 'none'),
(5, 4, 1, 1, 'nonee'),
(6, 61, 1, 7, 'dasda'),
(10, 55, 1, 4, 'none'),
(11, 62, 1, 7, 'rest for 3-4 days'),
(12, 63, 1, 7, 'rest for 3-4 days'),
(13, 64, 1, 7, 'rest for 3-4 days'),
(14, 65, 1, 7, 'iyot pa more '),
(15, 66, 1, 7, 'iyot pa more '),
(16, 67, 1, 7, 'dsadasda'),
(17, 68, 1, 7, 'asdqwe'),
(18, 69, 1, 7, 'hopeless'),
(19, 70, 1, 7, 'hopeless'),
(20, 71, 1, 7, 'hopeless'),
(21, 72, 1, 7, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `disease_desc` varchar(200) NOT NULL,
  `treatment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `disease_desc`, `treatment`) VALUES
(1, 'rabis', 'dsadsa', 'dsadas'),
(2, 'hyper', 'ddsadasd', 'nonee'),
(3, 'hyper', 'dsadsad', 'dasda'),
(4, 'rab', 'bis', 'wana'),
(5, 'rab', 'bis', 'wana'),
(6, 'rab', 'bis', 'wana'),
(7, 'rab', 'bis', 'wana');

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
(1, 'justin', 'manigo', 'justingraig.manigo15@gmail.com', 'admin', 'admin'),
(2, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(3, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(4, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(5, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(6, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(7, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(8, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(9, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(10, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(11, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(12, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(13, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(14, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(15, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(16, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(17, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(18, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(19, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(20, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(21, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(22, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(23, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(24, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(25, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(26, 'jazz', 'man', 'jdsa', 'awa', 'awa'),
(27, 'bryl', 'lim', 'dsada@yahoo.com', 'admin', 'asd'),
(28, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(29, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(30, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(31, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(32, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(33, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(34, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(35, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(36, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(37, 'dsada', 'dsadad', 'dsadsada', 'dsadsa', 'asdad'),
(38, 'dsad', 'dsada', 'asdsada', 'dsadsad', 'adsadas'),
(39, 'dsad', 'dsada', 'asdsada', 'dsadsad', 'adsadas'),
(40, 'dsad', 'dsada', 'asdsada', 'dsadsad', 'adsadas'),
(41, 'dasd', 'adsada', 'adsada', 'dsasadsa', 'dsadasda'),
(42, 'dasd', 'adsada', 'adsada', 'dsasadsa', 'dsadasda'),
(43, 'adad', 'asdsad', 'asdsad', 'sadad', 'asdsad'),
(44, 'adad', 'asdsad', 'asdsad', 'sadad', 'asdsad'),
(45, 'adad', 'asdsad', 'asdsad', 'sadad', 'asdsad'),
(46, 'dsada', 'adssad', 'sadsada', 'asdad', 'dsada'),
(47, 'dsada', 'adssad', 'sadsada', 'asdad', 'dsada'),
(48, 'dsadas', 'dasda', 'asdada', 'adasdas', 'adsadasdasd'),
(49, 'asdadsad', 'ASDSAD', 'ASDSAD', 'ASDAD', '131231'),
(50, 'asdadsad', 'ASDSAD', 'ASDSAD', 'ASDAD', '131231'),
(51, 'asdadsad', 'ASDSAD', 'ASDSAD', 'ASDAD', '131231'),
(52, 'asdadsad', 'ASDSAD', 'ASDSAD', 'ASDAD', '131231'),
(53, 'asdadsad', 'ASDSAD', 'ASDSAD', 'ASDAD', '131231'),
(54, 'dsadadas', 'sdasdsad', 'sdsadasd', 'ddsadas', 'dasdasda'),
(55, 'dsadadas', 'sdasdsad', 'sdsadasd', 'ddsadas', 'dasdasda'),
(56, 'dsadadas', 'sdasdsad', 'sdsadasd', 'ddsadas', 'dasdasda'),
(57, 'sadasd', 'sadasd', 'dsadad', 'dsadasda', 'dsadada'),
(58, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(59, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(60, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(61, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(62, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(63, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(64, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(65, 'justin', 'manigo', 'justin', 'mnaigo', 'manigo'),
(66, ' ', 'ad', 'dsad', 'dsdad', 'dsada'),
(67, 'dsada', 'dsada', 'dsada@', 'dsad', 'dsad'),
(68, ' ', ' ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `in_patients`
--

CREATE TABLE `in_patients` (
  `in_id` int(11) NOT NULL,
  `result` varchar(200) NOT NULL,
  `admission_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `paid_amount` float NOT NULL,
  `room_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `out_patients`
--

CREATE TABLE `out_patients` (
  `out_id` int(11) NOT NULL,
  `consultation_date` datetime NOT NULL,
  `consultation_result` varchar(200) NOT NULL,
  `paid_amount` float NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_patients`
--

INSERT INTO `out_patients` (`out_id`, `consultation_date`, `consultation_result`, `paid_amount`, `patient_id`) VALUES
(1, '2018-03-21 00:00:00', 'aewada', 12345, 1),
(2, '2018-03-09 00:00:00', 'dadasda', 12332, 1),
(3, '2018-03-22 00:00:00', 'none', 1321.2, 40),
(4, '2018-03-22 00:00:00', 'none', 1321.2, 7),
(5, '2018-03-22 00:00:00', 'none', 1321.2, 7),
(6, '2018-03-17 00:00:00', 'ok', 2000, 70),
(7, '2018-03-17 00:00:00', 'ok', 2000, 71),
(8, '2018-03-17 00:00:00', 'ok', 1235, 72);

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
  `patient_type` enum('in','out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_Fname`, `patient_Lname`, `patient_contact`, `address`, `gender`, `birthdate`, `civil_status`, `patient_type`) VALUES
(1, 'justin', 'manigo', '1231', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single', 'out'),
(2, 'justin', 'manigo', '1231', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single', 'out'),
(3, 'justin', 'manigo', '1231', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single', 'out'),
(4, 'mark', 'salazar', '231312', 'minglanilla, cebu', 'male', '1997-04-21', 'single', 'in'),
(5, 'asdad', 'sadsad', 'asdsad', 'qwewq', 'male', '0000-00-00', 'single', ''),
(6, 'asdad', 'sadsad', 'asdsad', 'qwewq', 'male', '2012-02-01', 'single', ''),
(7, 'asdsad', 'wqeqwe', 'asdsad', 'qwewqe', 'female', '2012-01-01', 'single', ''),
(8, 'asdsad', 'wqeqwe', 'asdsad', 'qwewqe', 'female', '2012-01-01', 'single', ''),
(9, 'joshua', 'verano', '13231', 'dadad', 'male', '1999-03-10', 'single', ''),
(10, 'miko', 'aninon', '2321321321', 'guadalupe', 'male', '2010-01-10', 'married', ''),
(11, 'asdsad', 'asdadsad', 'asdsadsad', 'asdsad', 'male', '2011-02-02', 'single', 'in'),
(12, 'bryl', 'lim', '6969', 'plaridel', 'male', '2007-03-10', 'married', 'out'),
(14, 'asdsad', 'asdadsad', 'asdsadsad', 'asdsad', 'male', '2011-02-02', 'single', 'in'),
(15, 'helli', 'asd', 'sadasd', 'qweqwe', 'female', '2012-02-02', 'married', 'in'),
(16, 'hallu', 'waluu', 'asdasd', 'qwewqe', 'male', '2012-01-01', 'married', 'in'),
(17, 'dsoul', 'cafe', '131231', 'ddasdas', 'female', '2011-02-02', 'single', 'in'),
(18, 'mary', 'anne', '123131', 'mandaue', 'female', '2009-03-02', 'single', 'in'),
(19, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single', 'in'),
(20, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single', 'in'),
(21, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single', 'in'),
(22, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single', 'in'),
(23, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single', 'in'),
(24, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single', 'in'),
(25, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single', 'in'),
(26, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single', 'in'),
(27, 'aljay', 'manigo', '124012', 'plaridel', 'male', '1921-02-03', 'single', 'in'),
(28, 'miko', 'aninon', '312321', 'dsadasda', 'female', '2018-02-27', 'single', 'out'),
(29, 'miko', 'aninon', '312321', 'dsadasda', 'female', '2018-02-27', 'single', 'out'),
(30, 'batas', 'bat', '1231', 'manilaa', 'male', '2018-03-06', 'married', 'in'),
(31, 'batas', 'bat', '1231', 'manilaa', 'male', '2018-03-06', 'married', 'in'),
(32, 'guraa', 'ads', '123', 'adaa', 'male', '2018-03-07', 'single', 'in'),
(33, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single', 'in'),
(34, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single', 'in'),
(35, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single', 'in'),
(36, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single', 'in'),
(37, 'dsada', 'ddada', 'dada', 'dsada', 'male', '2018-03-21', 'single', 'out'),
(38, 'dsada', 'ddada', 'dada', 'dsada', 'male', '2018-03-21', 'single', 'out'),
(39, 'ex', 'b', '12345', 'sdfgh', 'male', '2018-03-23', 'single', 'out'),
(40, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(41, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(42, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(43, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(44, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(45, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(46, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(47, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(48, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(49, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married', 'out'),
(50, 'wqeeqeq', 'eqweqw', 'eqweq', 'eqweq', 'female', '2018-03-08', 'married', 'in'),
(51, 'bryl', 'baran', '1321', 'dasd', 'male', '2018-03-01', 'single', 'out'),
(52, 'bryl', 'baran', '1321', 'dasd', 'male', '2018-03-01', 'single', 'out'),
(53, 'bryl', 'baran', '1321', 'dasd', 'male', '2018-03-01', 'single', 'out'),
(54, 'ethan', ' uy ', '1313', 'dsada', 'male', '2018-03-07', 'single', 'out'),
(55, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single', 'out'),
(56, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single', 'out'),
(57, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single', 'out'),
(58, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single', 'out'),
(59, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single', 'out'),
(60, 'kara', 'deguit', '1311321', 'asda', 'female', '2018-03-08', 'married', 'out'),
(61, 'kaaw', 'awa', '1321', 'dada', 'male', '2018-03-06', 'married', 'in'),
(62, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single', 'out'),
(63, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single', 'out'),
(64, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single', 'out'),
(65, 'liza', 'berano', '092696969', 'tipolo', 'male', '2018-03-14', 'single', 'out'),
(66, 'joshua', 'soberano', '091235', 'mnl', 'male', '2018-03-20', 'married', 'in'),
(67, 'jroa', 'exb', '01312', 'adsad', 'male', '2018-03-15', 'single', 'in'),
(68, 'joshuag', 'asdqwe', '123123', 'asdasd', 'male', '2016-11-11', 'single', 'out'),
(69, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single', 'out'),
(70, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single', 'out'),
(71, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single', 'out'),
(72, 'mia', 'khalifa', '091234', 'USA', 'female', '2018-03-17', 'widowed', 'out');

-- --------------------------------------------------------

--
-- Table structure for table `patients_tests`
--

CREATE TABLE `patients_tests` (
  `pTest_id` int(11) NOT NULL,
  `pTest_result` varchar(200) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pTest_date` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` enum('ward','semi private','private','') NOT NULL,
  `room_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_number`) VALUES
(1, 'ward', '1'),
(2, 'ward', '2'),
(3, 'ward', '3'),
(4, 'ward', '4'),
(5, 'ward', '5'),
(6, 'ward', '6'),
(7, 'ward', '7'),
(8, 'ward', '8'),
(9, 'ward', '9'),
(10, 'ward', '10'),
(11, 'ward', '11'),
(12, 'ward', '12'),
(13, 'ward', '13'),
(14, 'ward', '14'),
(15, 'ward', '15'),
(16, 'semi private', '16'),
(17, 'semi private', '17'),
(18, 'semi private', '18'),
(19, 'semi private', '19'),
(20, 'semi private', '20'),
(21, 'semi private', '21'),
(22, 'semi private', '22'),
(23, 'semi private', '23'),
(24, 'semi private', '24'),
(25, 'semi private', '25'),
(26, 'private', '26'),
(27, 'private', '27'),
(28, 'private', '28'),
(29, 'private', '29'),
(30, 'private', '30');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_result` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_result`) VALUES
(1, 'urine', 'positive'),
(2, 'blood', 'ok'),
(3, 'blood', 'ok'),
(4, 'blood', 'ok'),
(5, 'blood', 'ok'),
(6, 'awd', 'ok'),
(7, 'awd', 'ok'),
(8, 'awd', 'ok'),
(9, 'awd', 'ok'),
(10, 'awd', 'ok'),
(11, 'heart', 'fail'),
(12, 'dsad', 'dsada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `patients_diagnosis` (`patient_id`),
  ADD KEY `disease_diagnosis` (`disease_id`),
  ADD KEY `doctors_diagnosis` (`doctor_id`);

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
  ADD KEY `patients_in` (`patient_id`),
  ADD KEY `inpatients_room` (`room_id`);

--
-- Indexes for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `patient_out` (`patient_id`);

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
  ADD KEY `test_patients_test` (`test_id`),
  ADD KEY `patient_patients_test` (`patient_id`);

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
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `in_patients`
--
ALTER TABLE `in_patients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `out_patients`
--
ALTER TABLE `out_patients`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `patients_tests`
--
ALTER TABLE `patients_tests`
  MODIFY `pTest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `disease_diagnosis` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`disease_id`),
  ADD CONSTRAINT `doctors_diagnosis` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `patients_diagnosis` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD CONSTRAINT `inpatients_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `patients_in` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD CONSTRAINT `patient_out` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `patients_tests`
--
ALTER TABLE `patients_tests`
  ADD CONSTRAINT `patient_patients_test` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `test_patients_test` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
