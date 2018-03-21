-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 08:05 AM
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
-- Database: `ucmed`
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
  `treatment` varchar(100) NOT NULL,
  `paid_amount` float NOT NULL,
  `patient_type` enum('in','out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `patient_id`, `doctor_id`, `disease_id`, `diagnose_date`, `treatment`, `paid_amount`, `patient_type`) VALUES
(1, 1, 1, 1, '2018-03-28', 'none', 0, 'in'),
(2, 1, 1, 7, '2018-03-21', 'rest for 3-4 days', 0, 'out'),
(5, 4, 1, 1, '0000-00-00', 'nonee', 0, 'in'),
(6, 61, 1, 7, '0000-00-00', 'dasda', 0, 'in'),
(10, 55, 1, 4, '0000-00-00', 'none', 0, 'in'),
(12, 63, 1, 7, '0000-00-00', 'rest for 3-4 days', 0, 'in'),
(13, 64, 1, 7, '0000-00-00', 'rest for 3-4 days', 0, 'in'),
(14, 1, 1, 3, '2018-03-21', 'iyot pa more ', 0, 'in'),
(15, 66, 1, 7, '0000-00-00', 'iyot pa more ', 0, 'in'),
(16, 67, 1, 7, '0000-00-00', 'dsadasda', 0, 'in'),
(17, 68, 1, 7, '0000-00-00', 'asdqwe', 0, 'in'),
(18, 69, 1, 7, '0000-00-00', 'hopeless', 0, 'in'),
(19, 70, 1, 7, '0000-00-00', 'hopeless', 0, 'in'),
(20, 71, 1, 7, '0000-00-00', 'hopeless', 0, 'in'),
(21, 72, 1, 7, '0000-00-00', 'NONE', 0, 'in'),
(22, 69, 1, 2, '2012-12-12', 'none', 0, 'in');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `disease_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `disease_desc`) VALUES
(1, 'rabis', 'dsadsa'),
(2, 'hyper', 'ddsadasd'),
(3, 'hyper', 'dsadsad'),
(4, 'rab', 'bis'),
(5, 'rab', 'bis'),
(6, 'rab', 'bis'),
(7, 'rab', 'bis'),
(8, 'piangg', 'wew'),
(9, '', ''),
(10, 'qwes', 'asw'),
(11, 'haesd', 'dss'),
(12, 'dsada', 'dsadas'),
(13, 'dsadasdad', 'dasda'),
(14, 'wewqs', 'asdad'),
(15, 'dsada', 'dasdas'),
(16, 'dasdasda', 'dasda'),
(17, 'dasdasda', 'dasda'),
(18, 'dadsa', 'dsadas'),
(19, 'dadsa', 'dsadas'),
(20, 'dsadsa', 'aads'),
(21, 'dsadsa', 'aads');

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
  `discharge_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_patients`
--

INSERT INTO `in_patients` (`in_id`, `result`, `discharge_date`, `room_id`, `diagnosis_id`) VALUES
(1, 'dsad', '2012-12-31', 3, 22),
(2, 'dsada', '2018-03-07', 1, 22),
(3, 'dsada', '2018-03-07', 1, 22),
(4, 'dsada', '2018-03-14', 2, 22),
(5, 'dsada', '2018-03-14', 2, 22),
(6, 'wew', '2018-03-07', 4, 22),
(7, 'hahahah', '2018-03-13', 27, 22),
(8, 'dasdas', '2018-03-07', 3, 22),
(9, 'dsadsadasd', '2018-03-07', 5, 22),
(10, 'dsadasdad', '2018-03-07', 5, 22),
(11, 'dsadad', '2018-03-07', 29, 22),
(12, 'dsadasdasddasda', '2018-03-14', 5, 22),
(13, 'dsadasdasddasda', '2018-03-14', 5, 22),
(14, 'dsadsada', '2018-03-15', 10, 22),
(15, 'dsadsada', '2018-03-15', 10, 22),
(16, 'dsadsada', '2018-03-13', 8, 22),
(17, 'dsadsada', '2018-03-13', 8, 22);

-- --------------------------------------------------------

--
-- Table structure for table `out_patients`
--

CREATE TABLE `out_patients` (
  `out_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `consultation_result` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_patients`
--

INSERT INTO `out_patients` (`out_id`, `diagnosis_id`, `consultation_result`) VALUES
(1, 2, 'dsad');

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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_Fname`, `patient_Lname`, `patient_contact`, `address`, `gender`, `birthdate`, `civil_status`) VALUES
(1, 'justin', 'manigo', '09559270965', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single'),
(2, 'justin', 'manigo', '1231', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single'),
(3, 'justin', 'manigo', '1231', 'plaridel,baybay,leyte', 'male', '1998-01-30', 'single'),
(4, 'mark', 'salazar', '231312', 'minglanilla, cebu', 'male', '1997-04-21', 'single'),
(5, 'asdad', 'sadsad', 'asdsad', 'qwewq', 'male', '0000-00-00', 'single'),
(6, 'asdad', 'sadsad', 'asdsad', 'qwewq', 'male', '2012-02-01', 'single'),
(7, 'asdsad', 'wqeqwe', 'asdsad', 'qwewqe', 'female', '2012-01-01', 'single'),
(8, 'asdsad', 'wqeqwe', 'asdsad', 'qwewqe', 'female', '2012-01-01', 'single'),
(9, 'joshua', 'verano', '13231', 'dadad', 'male', '1999-03-10', 'single'),
(10, 'miko', 'aninon', '2321321321', 'guadalupe', 'male', '2010-01-10', 'married'),
(11, 'asdsad', 'asdadsad', 'asdsadsad', 'asdsad', 'male', '2011-02-02', 'single'),
(12, 'bryl', 'lim', '6969', 'plaridel', 'male', '2007-03-10', 'married'),
(14, 'asdsad', 'asdadsad', 'asdsadsad', 'asdsad', 'male', '2011-02-02', 'single'),
(15, 'helli', 'asd', 'sadasd', 'qweqwe', 'female', '2012-02-02', 'married'),
(16, 'hallu', 'waluu', 'asdasd', 'qwewqe', 'male', '2012-01-01', 'married'),
(17, 'dsoul', 'cafe', '131231', 'ddasdas', 'female', '2011-02-02', 'single'),
(18, 'mary', 'anne', '123131', 'mandaue', 'female', '2009-03-02', 'single'),
(19, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single'),
(20, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single'),
(21, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single'),
(22, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single'),
(23, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single'),
(24, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '0000-00-00', 'single'),
(25, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single'),
(26, 'uc ', 'med ', '1998-03-12', 'mandue', 'male', '1970-01-01', 'single'),
(27, 'aljay', 'manigo', '124012', 'plaridel', 'male', '1921-02-03', 'single'),
(28, 'miko', 'aninon', '312321', 'dsadasda', 'female', '2018-02-27', 'single'),
(29, 'miko', 'aninon', '312321', 'dsadasda', 'female', '2018-02-27', 'single'),
(30, 'batas', 'bat', '1231', 'manilaa', 'male', '2018-03-06', 'married'),
(31, 'batas', 'bat', '1231', 'manilaa', 'male', '2018-03-06', 'married'),
(32, 'guraa', 'ads', '123', 'adaa', 'male', '2018-03-07', 'single'),
(33, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single'),
(34, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single'),
(35, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single'),
(36, 'asd', 'asdf', 'asdfg', 'sdfghj', 'male', '2018-03-14', 'single'),
(37, 'dsada', 'ddada', 'dada', 'dsada', 'male', '2018-03-21', 'single'),
(38, 'dsada', 'ddada', 'dada', 'dsada', 'male', '2018-03-21', 'single'),
(39, 'ex', 'b', '12345', 'sdfgh', 'male', '2018-03-23', 'single'),
(40, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(41, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(42, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(43, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(44, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(45, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(46, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(47, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(48, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(49, 'es', 's', 's', 'dada', 'male', '2018-03-08', 'married'),
(50, 'wqeeqeq', 'eqweqw', 'eqweq', 'eqweq', 'female', '2018-03-08', 'married'),
(51, 'bryl', 'baran', '1321', 'dasd', 'male', '2018-03-01', 'single'),
(55, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single'),
(56, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single'),
(57, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single'),
(58, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single'),
(59, 'joshu', 'vera', '124', 'daa', 'male', '2018-03-07', 'single'),
(60, 'kara', 'deguit', '1311321', 'asda', 'female', '2018-03-08', 'married'),
(61, 'kaaw', 'awa', '1321', 'dada', 'male', '2018-03-06', 'married'),
(62, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single'),
(63, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single'),
(64, 'ronna', 'orapa', '09234123', 'plaridel baybay leyte', 'female', '2018-03-08', 'single'),
(65, 'liza', 'berano', '092696969', 'tipolo', 'male', '2018-03-14', 'single'),
(66, 'joshua', 'soberano', '091235', 'mnl', 'male', '2018-03-20', 'married'),
(67, 'jroa', 'exb', '01312', 'adsad', 'male', '2018-03-15', 'single'),
(68, 'joshuag', 'asdqwe', '123123', 'asdasd', 'male', '2016-11-11', 'single'),
(69, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single'),
(70, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single'),
(71, 'mocha', 'uson', '09231234', 'dsadaa', 'female', '2018-03-07', 'single'),
(72, 'mia', 'khalifa', '091234', 'USA', 'female', '2018-03-17', 'widowed'),
(73, '', '', '', '', '', '1970-01-01', ''),
(74, 'bryyyyyyyyyl', 'dsadada', '3213123', 'awda', 'female', '1970-01-01', 'single'),
(75, 'bryyyyyyyyyl', 'dsadada', '3213123', 'awda', 'female', '1970-01-01', 'single'),
(76, 'bryyyyyyyyyl', 'dsadada', '3213123', 'awda', 'female', '1970-01-01', 'single'),
(77, '', '', '', '', '', '1970-01-01', ''),
(78, 'jam', 'mich', '12331', 'adsadas', 'male', '2018-03-14', 'single'),
(79, 'ed', 'sher', '13131', 'das', 'male', '2018-03-14', 'single'),
(80, 'guy', 'yaaa', '12321312', 'das', 'female', '2018-03-08', 'single'),
(81, 'guy', 'yaaa', '12321312', 'das', 'female', '2018-03-08', 'single'),
(82, 'flasg ', 'light', '123131', 'dadas', 'female', '2018-03-01', 'married'),
(83, 'flasg ', 'light', '123131', 'dadas', 'female', '2018-03-01', 'married'),
(84, 'ming', 'ming', '123', 'asda', 'male', '2018-03-16', 'single'),
(85, 'dsadas', 'dsa', 'dasdas', 'dsadas', 'female', '2018-03-06', 'single'),
(86, 'dsadas', 'dsa', 'dasdas', 'dsadas', 'female', '2018-03-06', 'single'),
(87, 'dsadas', 'dsad', 'adsa', 'dsadas', 'female', '2018-03-06', 'single'),
(88, 'dsada', 'dsada', 'dsada', 'dsada', 'male', '2018-03-14', 'married'),
(89, 'jaw', 'weee', 'ddsad', 'adsada', 'female', '2018-03-14', 'single'),
(90, 'jus', 'dsda', 'dsada', 'dsada', 'male', '2018-03-07', 'single'),
(91, 'qwewq', 'qweqwe', 'qweqwe', 'qwewqe', '', '1970-01-01', 'single'),
(92, 'qwewq', 'qweqwe', 'qweqwe', 'qwewqe', '', '1970-01-01', 'single'),
(93, 'mark', 'adsa', '13132131', 'dwadadad', 'female', '2018-03-22', 'single'),
(94, 'maakr', 'daas', 'dasdada', 'dsadas', 'male', '2018-03-01', 'single'),
(95, 'dsada', 'dsada', 'dsada', 'dsada', 'male', '2018-03-08', 'married'),
(96, 'dsadsa', 'dsadas', 'dasda', 'dasdsa', 'male', '2018-02-28', 'single'),
(97, 'dsadsa', 'dsadas', 'dasda', 'dasdsa', 'male', '2018-02-28', 'single'),
(98, 'doc', 'sasa', 'adsad', 'dsada', 'male', '2018-03-14', 'married'),
(99, 'doc', 'sasa', 'adsad', 'dsada', 'male', '2018-03-14', 'married'),
(100, 'sweeee', 'dsadsa', 'dsada', 'dsadas', 'male', '2018-03-01', 'single'),
(101, 'sweeee', 'dsadsa', 'dsada', 'dsadas', 'male', '2018-03-01', 'single');

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
  `room_number` varchar(50) NOT NULL,
  `occupants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_number`, `occupants`) VALUES
(1, 'ward', '1', 8),
(2, 'ward', '2', 4),
(3, 'ward', '3', 7),
(4, 'ward', '4', 8),
(5, 'ward', '5', 6),
(6, 'ward', '6', 7),
(7, 'ward', '7', 8),
(8, 'ward', '8', 5),
(9, 'ward', '9', 5),
(10, 'ward', '10', 9),
(11, 'ward', '11', 3),
(12, 'ward', '12', 6),
(13, 'ward', '13', 3),
(14, 'ward', '14', 6),
(15, 'ward', '15', 2),
(16, 'semi private', '16', 4),
(17, 'semi private', '17', 7),
(18, 'semi private', '18', 4),
(19, 'semi private', '19', 5),
(20, 'semi private', '20', 3),
(21, 'semi private', '21', 9),
(22, 'semi private', '22', 6),
(23, 'semi private', '23', 7),
(24, 'semi private', '24', 4),
(25, 'semi private', '25', 4),
(26, 'private', '26', 0),
(27, 'private', '27', 1),
(28, 'private', '28', 0),
(29, 'private', '29', 1),
(30, 'private', '30', 0);

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
  ADD KEY `inpatients_room` (`room_id`),
  ADD KEY `inpatients_diagnosis` (`diagnosis_id`);

--
-- Indexes for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `out_diagnosis` (`diagnosis_id`);

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
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `in_patients`
--
ALTER TABLE `in_patients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `out_patients`
--
ALTER TABLE `out_patients`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
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
  ADD CONSTRAINT `inpatients_diagnosis` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`),
  ADD CONSTRAINT `inpatients_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD CONSTRAINT `out_diagnosis` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`);

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
