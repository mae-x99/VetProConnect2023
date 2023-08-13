-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 09:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinary`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timeslot` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `doctor_name`, `patient_id`, `pet_id`, `date`, `timeslot`, `status`) VALUES
(89, 45, 'Sangeetha Maniam', 44, 32, '2023-02-28', '128', 'Complete'),
(90, 49, 'Mae Liana', 47, 42, '2023-02-28', '147', 'Complete'),
(91, 45, 'Sangeetha Maniam', 47, 33, '2023-02-28', '129', 'Complete'),
(92, 49, 'Mae Liana', 44, 38, '2023-02-28', '150', 'Complete'),
(93, 45, 'Sangeetha Maniam', 51, 37, '2023-02-28', '126', 'Complete'),
(94, 49, 'Mae Liana', 48, 35, '2023-02-28', '152', 'Complete'),
(96, 64, 'Doctor Test', 65, 44, '2023-02-28', '176', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ser_name` text NOT NULL,
  `ser_qty` text NOT NULL,
  `ser_price` text NOT NULL,
  `ser_desc` text NOT NULL,
  `med_name` text NOT NULL,
  `med_qty` text NOT NULL,
  `med_price` text NOT NULL,
  `med_desc` text NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `invo_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `patient_id`, `ser_name`, `ser_qty`, `ser_price`, `ser_desc`, `med_name`, `med_qty`, `med_price`, `med_desc`, `total`, `date`, `invo_note`) VALUES
(26, 51, '[\"1\",\"7\"]', '[\"1\",\"1\"]', '[\"50\",\"50\"]', '[\"Fever\",\"Full Grooming\"]', '[\"7\"]', '[\"1\"]', '[\"40\"]', '[\"Take before breakfast \"]', '140', '2023-02-27', 'Please check your pet\'s condition all the time. Contact us if there is no change for the fever after 3 days consuming the medicine. TQ.'),
(28, 44, '[\"11\"]', '[\"1\"]', '[\"35\"]', '[\"Check-Up For Diarrhea\"]', '[\"5\"]', '[\"1\"]', '[\"50\"]', '[\"Take before breakfast and dinner\"]', '85', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after taking the medication prescribed.'),
(29, 47, '[\"1\",\"10\",\"6\"]', '[\"1\",\"1\",\"1\"]', '[\"50\",\"150\",\"80\"]', '[\"First vaccination for immune system\",\"Observing injuries in pelvic area\",\"-\"]', '[\"7\"]', '[\"1\"]', '[\"40\"]', '[\"Take once a day, after breakfast\"]', '320', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after the treatments and taking the medication prescribed.'),
(30, 47, 'null', 'null', 'null', 'null', '[\"4\",\"5\"]', '[\"1\",\"1\"]', '[\"20\",\"50\"]', '[\"Take once a day, anytime\",\"Take twice a day, before lunch and dinner\"]', '70', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after the treatments and taking the medication prescribed.'),
(31, 44, '[\"3\"]', '[\"1\"]', '[\"1200\"]', '[\"Abdominal mass removal\"]', '[\"4\",\"7\"]', '[\"1\",\"1\"]', '[\"20\",\"40\"]', '[\"Take twice a day, anytime\",\"Take twice a day, anytime\"]', '1260', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after the treatments and taking the medication prescribed.'),
(32, 51, '[\"6\",\"1\"]', '[\"1\",\"1\"]', '[\"80\",\"50\"]', '[\"-\",\"Enhance immunity\"]', '[\"10\"]', '[\"1\"]', '[\"30\"]', '[\"Take once a day, after lunch\"]', '160', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after the treatments and taking the medication prescribed.'),
(33, 48, '[\"3\"]', '[\"1\"]', '[\"1200\"]', '[\"Removal of small brain tumor\"]', '[\"8\",\"10\"]', '[\"1\",\"1\"]', '[\"25\",\"30\"]', '[\"Take twice a day, before or after eating\",\"Take once a day, anytime\"]', '1255', '2023-02-28', 'Please observe your pet constantly. Report to the clinic if your pet shows unusual symptom after the treatments and taking the medication prescribed.'),
(34, 65, '[\"3\",\"10\"]', '[\"1\",\"1\"]', '[\"1200\",\"150\"]', '[\"Description Test\",\"Description Test\"]', '[\"7\",\"8\"]', '[\"1\",\"1\"]', '[\"40\",\"25\"]', '[\"\\tDescription Test\",\"\\tDescription Test\"]', '1415', '2023-02-28', 'Note Test');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `name`, `quantity`, `price`) VALUES
(4, 'Tetracycline', '298', '20'),
(5, 'Mabrofloxacin', '196', '50'),
(7, 'Amoxicillin', '197', '40'),
(8, 'Nitrofurantoin', '198', '25'),
(10, 'Carprofen New', '98', '30'),
(11, 'Medicine Test', '45', '20');

-- --------------------------------------------------------

--
-- Table structure for table `patient_reports`
--

CREATE TABLE `patient_reports` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `services` text NOT NULL,
  `symptoms` text NOT NULL,
  `medication` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_reports`
--

INSERT INTO `patient_reports` (`id`, `doctor_id`, `appointment_id`, `patient_id`, `pet_id`, `services`, `symptoms`, `medication`, `status`) VALUES
(28, 49, 90, 47, 42, '[\"1\",\"10\",\"6\"]', '[\"Vomiting\",\"Coughing\",\"Itching\"]', '[\"7\",\"8\"]', 'Complete'),
(29, 45, 89, 44, 32, '[\"11\"]', '[\"Diarrhea\"]', '[\"5\"]', 'Complete'),
(30, 45, 91, 47, 33, '[\"3\"]', '[\"Abdominal Mass\"]', '[\"4\",\"5\"]', 'Complete'),
(31, 49, 92, 44, 38, '[\"3\"]', '[\"Abdominal Mass\",\"Breathing Difficulty\",\"Loud Respiratory Sounds\"]', '[\"4\",\"7\"]', 'Complete'),
(32, 45, 93, 51, 37, '[\"6\",\"1\"]', '[\"Bloody Urine\"]', '[\"10\"]', 'Complete'),
(33, 49, 94, 48, 35, '[\"3\"]', '[\"Seizure\",\"Excessive Drooling\",\"Limping\"]', '[\"8\",\"10\"]', 'Complete'),
(35, 64, 96, 65, 44, '[\"3\",\"10\"]', '[\"Abdominal Mass\",\"Bloody Urine\"]', '[\"7\",\"8\"]', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `owner_id`, `name`, `breed`, `age`, `weight`, `gender`) VALUES
(32, 44, 'Kevin', 'Golden Retriever', '6 years', '32 kg', 'Male'),
(33, 47, 'Nino', 'Ragdoll', '1 year', '6 kg', 'Female'),
(34, 47, 'Randall', 'Sphynx', '3 year', '2 kg', 'Male'),
(35, 48, 'Nana', 'British Shorthair', '3 years', '4 kg', 'Female'),
(36, 48, 'Johnny', 'Scottish Fold', '2 years', '2 kg', 'Male'),
(37, 51, 'Jacky', 'Birman Cat', '5 years', '3 kg', 'Male'),
(38, 44, 'Christy', 'Maincoone', '4 years', '8 kg', 'Female'),
(41, 44, 'Hailey', 'Maincoone', '1 year', '8.5 kg', 'Female'),
(42, 47, 'Ozzy', 'Persian', '3 years', '5 kg', 'Male'),
(44, 65, 'Pet Test', 'Maincoone', '1 year', '3 kg', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `pet_board`
--

CREATE TABLE `pet_board` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_board`
--

INSERT INTO `pet_board` (`id`, `patient_id`, `pet_id`, `status`, `check_in`, `check_out`) VALUES
(7, 44, 32, 'Owner Vacation', '2023-01-27', '2023-01-28'),
(8, 47, 33, 'Sickness', '2023-01-16', '2023-01-20'),
(9, 48, 35, 'Owner Vacation', '2023-02-25', '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `status`) VALUES
(1, 'Vaccination', '50', 1),
(3, 'Surgery', '1200', 1),
(6, 'Deworming', '80', 1),
(7, 'Grooming', '50', 1),
(10, 'Radiology', '150', 1),
(11, 'Normal Check-Up', '35', 1),
(14, 'Service Test', '25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`id`, `name`) VALUES
(4, 'Vomiting'),
(5, 'Diarrhea'),
(7, 'Coughing'),
(8, 'Abdominal Mass'),
(10, 'Bloody Urine'),
(14, 'Itching'),
(15, 'Eye Clouding'),
(16, 'Seizure'),
(17, 'Aggression'),
(18, 'Excessive Drooling'),
(19, 'Loss Of Balance'),
(20, 'Muscle Tremors'),
(21, 'Breathing Difficulty'),
(22, 'Loud Respiratory Sounds'),
(23, 'Limping'),
(24, 'Symptom Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_slots`
--

CREATE TABLE `tbl_doctor_slots` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `number_of_slots` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_slots`
--

INSERT INTO `tbl_doctor_slots` (`id`, `doctor_id`, `start_time`, `end_time`, `number_of_slots`, `duration`, `status`, `created_on`) VALUES
(1, 42, '08:30', '08:30', 5, 30, 0, '2023-01-26 10:45:14'),
(2, 42, '14:00', '14:00', 4, 60, 0, '2023-01-26 11:07:04'),
(3, 45, '09:00', '09:00', 6, 60, 0, '2023-01-26 11:50:44'),
(4, 45, '10:00', '10:00', 2, 60, 0, '2023-01-26 15:42:46'),
(5, 45, '09:00', '09:00', 20, 30, 0, '2023-01-26 15:43:39'),
(6, 49, '08:30', '08:30', 22, 30, 0, '2023-01-26 21:11:07'),
(7, 45, '08:30', '08:30', 0, 30, 0, '2023-01-29 08:37:44'),
(8, 45, '08:30', '08:30', 0, 30, 0, '2023-01-29 08:38:23'),
(9, 53, '10:00', '10:00', 9, 30, 0, '2023-01-29 14:43:57'),
(10, 45, '10:00', '10:00', 100, 30, 0, '2023-01-30 03:06:16'),
(11, 60, '09:30', '09:30', 8, 30, 0, '2023-02-25 23:31:25'),
(12, 60, '11:30', '11:30', 7, 30, 0, '2023-02-25 23:31:40'),
(13, 45, '08:30', '08:30', 15, 60, 0, '2023-02-28 03:05:44'),
(14, 45, '08:30', '08:30', 12, 30, 0, '2023-02-28 03:07:34'),
(15, 45, '08:30', '08:30', 12, 30, 0, '2023-02-28 03:07:39'),
(16, 45, '08:30', '08:30', 12, 30, 0, '2023-02-28 03:08:37'),
(17, 45, '08:30', '08:30', 16, 30, 0, '2023-02-28 03:08:52'),
(18, 45, '08:30', '08:30', 18, 30, 0, '2023-02-28 03:09:05'),
(19, 45, '08:30', '08:30', 22, 30, 0, '2023-02-28 03:09:13'),
(20, 49, '12:00', '12:00', 11, 60, 0, '2023-02-28 03:13:45'),
(21, 49, '16:00', '16:00', 2, 60, 0, '2023-02-28 03:14:02'),
(22, 61, '09:00', '09:00', 14, 30, 0, '2023-02-28 04:15:54'),
(23, 61, '08:30', '08:30', 17, 30, 0, '2023-02-28 04:16:05'),
(24, 61, '08:30', '08:30', 5, 30, 0, '2023-02-28 04:20:27'),
(25, 64, '12:00', '12:00', 2, 60, 0, '2023-02-28 08:02:21'),
(26, 64, '12:00', '12:00', 2, 60, 0, '2023-02-28 08:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(11) NOT NULL,
  `slot` text NOT NULL,
  `dr_id` int(11) NOT NULL,
  `doctor_slots_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `slot`, `dr_id`, `doctor_slots_id`) VALUES
(125, '08:30-09:00', 45, 1),
(126, '09:00-09:30', 45, 1),
(127, '09:30-10:00', 45, 1),
(128, '10:00-10:30', 45, 1),
(129, '10:30-11:00', 45, 1),
(130, '11:00-11:30', 45, 1),
(131, '11:30-12:00', 45, 1),
(132, '12:00-12:30', 45, 1),
(133, '12:30-13:00', 45, 1),
(134, '13:00-13:30', 45, 1),
(135, '13:30-14:00', 45, 1),
(136, '14:00-14:30', 45, 1),
(137, '14:30-15:00', 45, 1),
(138, '15:00-15:30', 45, 1),
(139, '15:30-16:00', 45, 1),
(140, '16:00-16:30', 45, 1),
(141, '16:30-17:00', 45, 1),
(142, '17:00-17:30', 45, 1),
(143, '17:30-18:00', 45, 1),
(144, '18:00-18:30', 45, 1),
(145, '18:30-19:00', 45, 1),
(146, '19:00-19:30', 45, 1),
(147, '12:00-13:00', 49, 1),
(148, '13:00-14:00', 49, 1),
(149, '14:00-15:00', 49, 1),
(150, '15:00-16:00', 49, 1),
(151, '16:00-17:00', 49, 1),
(152, '17:00-18:00', 49, 1),
(153, '18:00-19:00', 49, 1),
(154, '19:00-20:00', 49, 1),
(155, '20:00-21:00', 49, 1),
(156, '21:00-22:00', 49, 1),
(157, '22:00-23:00', 49, 1),
(176, '12:00-13:00', 64, 1),
(177, '13:00-14:00', 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_type` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `user_type`, `phone`, `city`, `zipcode`, `address`, `token`, `profile_pic`) VALUES
(2, 'Noor Farhana', 'Zainal Abidin', 'vetclinicsystem99@gmail.com', '$2y$10$ikzcpFCpo6eNvra.fV9AeeRLKH3Kik3OE8z3xFjXH.L3mKXLmrxgu', 1, 'admin', '012345678', 'Kota Kinabalu', '88450', 'Kota Kinabalu, Malaysia								                								                								                								                ', '60c291130509c389829a91954a95e9bd', 'Cat.jpg'),
(44, 'Xiang ', 'Guo', 'vetpatientclinicsystem99@gmail.com', '$2y$10$QsY/k/00OSKGScbqlwIhhuNpAOhQcaxSB9uP5HfzUuc2W.VX0p.0W', 1, 'patient', '60148654612', 'Kota Kinabalu', '88450', 'Prince Tower, 1B', NULL, 'Guy 1.jpg'),
(45, 'Sangeetha', 'Maniam', 'vetdoctorclinicsystem99@gmail.com', '$2y$10$UgIu1RUb/p2jJn./OZLCEuvwbk1Ztgwyrg.QUypdSJecch8KG2uUu', 1, 'doctor', '0118973927', 'Kota Kinabalu', '88450', '1 Borneo Tower A', '', 'Woman 1.jpg'),
(47, 'Melysa Kimberly', 'George', 'melysakimberly3110@gmail.com', '$2y$10$CJMPN8W9oVj/Jo7JUXnV..dpNu49.NXDPmk8ymCCmQCTtlDaixXii', 1, 'patient', '0102123110', 'Kota Kinabalu', '88450', '1 Borneo Tower A', NULL, NULL),
(48, 'Muhammad', 'Ridzwan', 'ridzwan@gmail.com', '$2y$10$5LrD6iiryP5DpkIRIDswVO/vw0gOlkoQRUeA8N.ByhNJGOCDABI5K', 1, 'patient', '0198996541', 'Kota Kinabalu', '88450', 'University Utama Condominium', NULL, NULL),
(49, 'Mae', 'Liana', 'farhanazainal.a99@gmail.com', '$2y$10$MINQGis3Zm3dTQMA0m04SufdnBnRYU7a/8Kg.aKLyVZxZT7ZSmR9.', 1, 'doctor', '0198071972', 'Kota Kinabalu', '88450', '1 Borneo Tower A', NULL, '20190911_103525770_iOS.jpg'),
(51, 'Farah', 'Zana', 'farahzana@gmail.com', '$2y$10$Bk7Qj4qTJCTOcoOQeW2agebItzwWDUlkjr7Cmj0j7vkGIF2TfD2km', 1, 'patient', '0118772324', 'Kota Kinabalu', '88450', '1 Borneo Tower A', NULL, NULL),
(64, 'Doctor', 'Test', 'testdoctor@gmail.com', '$2y$10$tM7cIXTF9Ar33Ji1i25SUOu/tRZjYeiFjLCKv808JRjWvwjxGmMZG', 1, 'doctor', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Patient', 'Test', 'testpatient@gmail.com', '$2y$10$TVgXsUNEXFXr1NxOhEJXEOk94xCGG3mO/1cosn3mJFrpa5lwNvyjC', 1, 'patient', '433533', '', '', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_reports`
--
ALTER TABLE `patient_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_board`
--
ALTER TABLE `pet_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor_slots`
--
ALTER TABLE `tbl_doctor_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_reports`
--
ALTER TABLE `patient_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pet_board`
--
ALTER TABLE `pet_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_doctor_slots`
--
ALTER TABLE `tbl_doctor_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
