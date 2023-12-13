-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 05:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hwfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_rand_id` text DEFAULT NULL,
  `acc_lname` text DEFAULT NULL,
  `acc_fname` text DEFAULT NULL,
  `acc_mname` text DEFAULT NULL,
  `acc_birth` text DEFAULT NULL,
  `acc_birth_place` text DEFAULT NULL,
  `acc_complete_add` text DEFAULT NULL,
  `acc_brgy` text DEFAULT NULL,
  `acc_martial_status` text DEFAULT NULL,
  `acc_education` text DEFAULT NULL,
  `acc_education_highest` text DEFAULT NULL,
  `acc_eco_status` text DEFAULT NULL,
  `acc_eco_status_other` text DEFAULT NULL,
  `acc_contact` text DEFAULT NULL,
  `acc_religion` text DEFAULT NULL,
  `acc_email` text DEFAULT NULL,
  `acc_profile` text DEFAULT NULL,
  `acc_uname` text DEFAULT NULL,
  `acc_password` text DEFAULT NULL,
  `acc_type` text DEFAULT NULL,
  `acc_status` text DEFAULT NULL,
  `acc_checking_pass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`acc_id`, `acc_rand_id`, `acc_lname`, `acc_fname`, `acc_mname`, `acc_birth`, `acc_birth_place`, `acc_complete_add`, `acc_brgy`, `acc_martial_status`, `acc_education`, `acc_education_highest`, `acc_eco_status`, `acc_eco_status_other`, `acc_contact`, `acc_religion`, `acc_email`, `acc_profile`, `acc_uname`, `acc_password`, `acc_type`, `acc_status`, `acc_checking_pass`) VALUES
(1, '489757715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'super_admin', '21232f297a57a5a743894a0e4a801fc3', 'super-admin', NULL, NULL),
(14, '1051139089', 'admin', 'admin', 'admin', '2004-12-07', 'admin', 'admin', 'Barangay 1', 'Single', 'admin', 'Bachelor&#039;s degree', 'Others', 'Partime', '09948487917', 'admin', 'admin@admin', 'default-profile.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Accept', 'not change'),
(15, '116852267', 'admin1', 'admin1', 'admin1', '2023-12-31', 'admin1', 'admin1', 'Barangay 2', 'Single', 'admin1', '12th Grade or less', 'Employed', 'N/A', '09948487917', 'admin1', 'admin1@admin1', 'default-profile.png', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'Accept', 'not change'),
(16, '301543531', 'user', 'user', 'user', '2023-12-31', 'user', 'user', 'Barangay 1', 'Single', 'user', '12th Grade or less', 'Employed', 'N/A', '09948487917', 'user', 'user@user', '2x2.jpg', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Accept', NULL),
(17, '659311926', 'user2', 'user2', 'user2', '2000-08-07', 'user2', 'user2', 'Barangay 2', 'Single', 'user2', 'Bachelor&#039;s degree', 'Employed', 'N/A', '09948487917', 'user2', 'user2@user2', '352129992_753526386458819_5583503527036168121_n.jpg', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user', 'Accept', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `announce_id` int(11) NOT NULL,
  `announce_what` text DEFAULT NULL,
  `announce_when` text DEFAULT NULL,
  `announce_who` text DEFAULT NULL,
  `announce_where` text DEFAULT NULL,
  `announce_brgy` text DEFAULT NULL,
  `announce_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`announce_id`, `announce_what`, `announce_when`, `announce_who`, `announce_where`, `announce_brgy`, `announce_type`) VALUES
(1, 'asd', '2023-01-01', 'asd', 'asddd', 'Barangay 1', NULL),
(4, 'Meeting de abanse', '2023-12-16', 'To all womens na baog', 'sa balay lang ni kap', 'Barangay 1', NULL),
(5, 'Job Offers to all womens na pabigat sa bahay', '2023-12-14', 'mga tamad kuno hmbal ni mayor', 'hinigaran City hall', 'City', 'Job Offers'),
(7, 'Job Offers', '2023-12-25', 'Only Hinigaranon only', 'hinigaran City hall', 'City', 'Job Offers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brgy`
--

CREATE TABLE `tbl_brgy` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brgy`
--

INSERT INTO `tbl_brgy` (`brgy_id`, `brgy_name`) VALUES
(4, 'Barangay 1'),
(5, 'Barangay 2'),
(6, 'Barangay 3'),
(7, 'Barangay 4'),
(8, 'Barangay Anahaw'),
(9, 'Barangay Aranda'),
(10, 'Barangay Baga-as'),
(11, 'Barangay Bato'),
(12, 'Barangay Calapi'),
(13, 'Barangay Camalobalo'),
(14, 'Barangay Camba-og'),
(15, 'Barangay Cambugsa'),
(16, 'Barangay Candumarao'),
(17, 'Barangay Gargato'),
(18, 'Barangay Himaya'),
(19, 'Barangay Miranda'),
(20, 'Barangay Nanunga'),
(21, 'Barangay Narauis'),
(22, 'Barangay Paticui'),
(23, 'Barangay Pilar'),
(24, 'Barangay Quiwi'),
(25, 'Barangay Tagda'),
(26, 'Barangay Tuguis'),
(27, 'Barangay Palayog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  ADD PRIMARY KEY (`brgy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
