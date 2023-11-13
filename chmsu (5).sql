-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 04:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chmsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_admin_id` text DEFAULT NULL,
  `acc_fname` text DEFAULT NULL,
  `acc_mname` text DEFAULT NULL,
  `acc_lname` text DEFAULT NULL,
  `acc_email` text DEFAULT NULL,
  `acc_phone` text DEFAULT NULL,
  `acc_birth` text DEFAULT NULL,
  `acc_address` text DEFAULT NULL,
  `acc_org` text DEFAULT NULL,
  `acc_uname` text DEFAULT NULL,
  `acc_password` text DEFAULT NULL,
  `acc_profile` text DEFAULT NULL,
  `acc_type` text DEFAULT NULL,
  `acc_status` text DEFAULT NULL,
  `acc_active` text DEFAULT NULL,
  `acc_check` text DEFAULT NULL,
  `acc_otp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`acc_id`, `acc_admin_id`, `acc_fname`, `acc_mname`, `acc_lname`, `acc_email`, `acc_phone`, `acc_birth`, `acc_address`, `acc_org`, `acc_uname`, `acc_password`, `acc_profile`, `acc_type`, `acc_status`, `acc_active`, `acc_check`, `acc_otp`) VALUES
(8, '489757715', 'jer', 'super', 'admin', 'jerlendelosreyes7@gmail.com', '123456789', '2000-08-08', NULL, NULL, 'super_admin', '21232f297a57a5a743894a0e4a801fc3', 'default-profile.png', 'admin', NULL, NULL, NULL, '384731'),
(143, '563340509', 'jerlen', 'bontogon', 'delos reyes', 'jerlyngariando@gmail.com', '0972343274', '1999-11-03', 'Barangay 1', 'one org', 'jer1', 'a898bccc63539682acb264afa1b78dc8', 'default-profile.png', 'sub_admin', NULL, 'Active', 'View', NULL),
(144, '20228320', 'karen', 'egca', 'egca', 'marygrace28delosreyes@gmail.com', '0985653453', '1999-11-03', 'Barangay 2', 'two org', 'jer2', 'a90c815a8bf9335483c0ed817c422538', 'default-profile.png', 'sub_admin', NULL, 'Not Active', 'View', NULL),
(145, '1170461083', 'pat', 'pat', 'pat', 'pat@gmail.com', '0945678876', '1999-11-03', 'Barangay 3', 'tree org', 'pat', '7852341745c93238222a65a910d1dcc5', 'default-profile.png', 'sub_admin', NULL, 'Not Active', 'View', NULL),
(146, '1365623232', 'jerjer', 'bon', 'delos', 'jerjer@gmail.com', '09876543211', '1999-11-03', 'Barangay 1', 'one org', 'jerjer', '52e8ef76cb4c6ee672740d6646256357', 'WIN_20220803_20_32_30_Pro.jpg', 'user', 'Approved', 'Not Active', 'View', NULL),
(147, '2007773466', 'patty', 'patty', 'patty', 'patty@gmail.com', '09887654321', '2023-11-12', 'Barangay 3', 'tree org', 'patty', '81069b209152545c2c3a86aa40f60699', 'WIN_20220803_20_32_30_Pro.jpg', 'user', 'Approved', 'Not Active', 'View', NULL),
(148, '1519681623', 'karen', 'kar', 'kar', 'karkar@gmail.com', '09778654321', '2023-11-12', 'Barangay 2', 'two org', 'kar', 'aa8ae3b340c34010e4500a0d6294dc2c', 'WIN_20220803_20_32_30_Pro.jpg', 'user', 'Approved', 'Not Active', 'View', NULL),
(149, '924596266', 'agay', 'agay', 'agay', 'agay@gmail.com', '0987654334', '1999-11-03', 'Barangay 4', NULL, 'agay', 'cb1c5c94adbd1cfc3e3bc59f9538784c', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(150, '892733720', 'aguy', 'aguy', 'aguy', 'aguy@gmail.com', '09876543215', '1999-11-03', 'Barangay 4', 'four org', 'aguy', '9d1c349efc6071e9f66301020266734a', 'default-profile.png', 'user', 'Pending', NULL, 'Not View', NULL),
(151, '2119482758', 'ahem', 'ahem', 'ahem', 'ahem@gmail.com', '09876543212', '1999-11-03', 'Anahaw', NULL, 'ahem', 'cf00c3dfdb61eb1343846e95a9789315', 'default-profile.png', 'sub_admin', NULL, 'Not Active', 'View', NULL),
(152, '1205538037', 'ala', 'ala', 'ala', 'ala@gmail.com', '098765432', '1999-11-03', 'Aranda', NULL, 'ala', 'e88e6128e26eeff4daf1f5db07372784', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(153, '1697157716', 'agw', 'agw', 'agw', 'agw@gmail.com', '09876543212', '1999-11-03', 'Bato', 'bato org', 'agw', '698f7a896e1a902919f1b4d6cf60f894', 'default-profile.png', 'user', 'Approved', 'Not Active', 'View', NULL),
(154, '874480055', 'wad', 'wad', 'wad', 'wad@gmail.com', '09876543212', '1999-11-03', 'Bato', NULL, 'wad', 'c389f0f28ae2d2055b0749d13edf426c', 'default-profile.png', 'sub_admin', NULL, 'Not Active', NULL, NULL),
(155, '1162276595', 'pew', 'pew', 'pew', 'pew@gmail.com', '0987654321', '1999-11-03', 'Calapi', NULL, 'pew', '08db7753f1701612b8524b87f1177518', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(156, '1396383821', 'ahay', 'ahay', 'ahay', 'ahay@gmail.com', '0987654322', '1999-11-03', 'Camalobalo', NULL, 'ahay', 'f38ac704959f3e39b5b9d70274c2d074', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(157, '103114278', 'maria', 'kurason', 'atay', 'ahaw@gmail.com', '09876543211', '2023-11-13', 'Camba-og', NULL, 'cambaog', 'a7341fb58cda17e62eedb055eaa41677', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(158, '6418924', 'ana', 'po', 'ke', 'wdaw@gmail.com', '07967967868', '2023-11-13', 'Cambugsa', NULL, 'cambugsa', '9c88af96a886471025ea1b81dc0ebf19', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(159, '884051749', 'afs', 'hjgu', 'buh', 'fafa@gmail.com', '09786767567', '2023-11-13', 'Candumarao', NULL, 'candumarao', 'e93939c7dbe429b2f14919364783083f', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(160, '1818920146', 'fsegse', 'sefes', 'sefsefs', 'sfse@gmail.com', '09876543234', '2023-11-13', 'Gargato', NULL, 'gargato', '8753c516003f28ab95196bab0399cba7', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(161, '277733864', 'weshs', 'hgyu', 'bubj', 'wdwa@gmail.com', '09876543456', '2023-11-13', 'Himaya', NULL, 'himaya', 'dcd17a83cd3179abe778f9c6949f2859', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(162, '212055715', 'fhgsf', 'awdaw', 'wadaw', 'awdaw@gmail.com', '09876543345', '2023-11-13', 'Miranda', NULL, 'miranda', '1ee1877c6655ecc71dfead311c771bd0', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(163, '1423036606', 'ese', 'sfse', 'fesfs', 'dfsef@gmail.com', '09876545678', '2023-11-13', 'Nanunga', NULL, 'nanunga', 'a807433e00316ac6e294f43e094b2349', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(164, '2020439957', 'trhdr', 'rdgd', 'drgdr', 'ddwa@gmail.com', '09876787654', '2023-11-13', 'Narauis', NULL, 'narauis', '7d8388992bc73a23ec0a03ff7ed77d28', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(165, '1112981283', 'ytr', 'ete', 'sferg', 'da@gmail.com', '09888776544', '2023-11-13', 'Paticui', NULL, 'paticui', '6362425fb5ebe1de263aaff8a3b79fb3', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(166, '248793689', 'ey', 'rdtd', 'grd', 'df@gmail.com', '09876566554', '2023-11-13', 'Pilar', NULL, 'pilar', '31c7d084f0460fcde98ee9314fc8ef30', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(167, '89363909', 'jthfh', 'thfh', 'htfhf', 'fsf@gmail.com', '09876543455', '2023-11-13', 'Quiwi', NULL, 'quiwi', 'bff3c61339a456124d0e4289b2f50042', 'default-profile.png', 'sub_admin', NULL, NULL, 'View', NULL),
(168, '2002387514', 'kiujgyh', 'yft', 'grrdg', 'fdrgdrh@gmail.com', '09876787676', '2023-11-13', 'Tagda', NULL, 'tagda', '60ac027a1b642e34e55f97a3e443f20f', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(169, '1519395801', 'ghhg', 'hrg', 'grrsrgd', 'dgxdbx@gmail.com', '09653424242', '2023-11-13', 'Tuguis', NULL, 'tuguis', '0163276c8121dfc297d465e8529cedb0', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL),
(170, '1461773590', 'drge', 'sefes', 'efs', 'fsefsgs@gmail.com', '09777665333', '2023-11-13', 'Palayog', NULL, 'palayog', 'a1d6cc7915b31453a0179694739af7f0', 'default-profile.png', 'sub_admin', NULL, 'Not Active', NULL, NULL),
(171, '2009422758', 'ssdda', 'adaw', 'awda', 'adwa3@gmail.com', '09876543218', '2023-11-13', 'Palayog', 'palayog org', 'aws', 'ac68bbf921d953d1cfab916cb6120864', 'default-profile.png', 'user', 'Approved', 'Not Active', 'View', NULL),
(172, '314619958', 'dfs', 'sefs', 'esfs', 'sgr@gmail.com', '09876687656', '2023-11-13', 'Palayog', 'pis', 'awss', '5e59fdfadb43c4e29c9fa843328d7804', 'default-profile.png', 'user', 'Approved', NULL, 'View', NULL),
(173, '548334767', 'bagaas', 'bagaas', 'bagaas', 'bagaas@gmail.com', '09876576546', '2023-11-13', 'Baga-as', NULL, 'bagaas', 'b9cdeacb0badbdef5c3490554e92ae19', 'default-profile.png', 'sub_admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `appointment_rand_id` text DEFAULT NULL,
  `appointment_name` text DEFAULT NULL,
  `appointment_email` text DEFAULT NULL,
  `appointment_contact` text DEFAULT NULL,
  `appointment_address` text DEFAULT NULL,
  `appointment_date` text DEFAULT NULL,
  `appointment_time` text DEFAULT NULL,
  `appointment_message` text DEFAULT NULL,
  `appointment_title` text DEFAULT NULL,
  `appointment_type` text DEFAULT NULL,
  `appointment_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `appointment_rand_id`, `appointment_name`, `appointment_email`, `appointment_contact`, `appointment_address`, `appointment_date`, `appointment_time`, `appointment_message`, `appointment_title`, `appointment_type`, `appointment_status`) VALUES
(1, '1365623232', 'jerjer bon delos', 'jerjer@gmail.com', '09876543211', 'Barangay 1', '2023-11-15', '13:06', 'makwa card', 'card', 'CH', 'Accept');

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
(8, 'Anahaw'),
(9, 'Aranda'),
(10, 'Baga-as'),
(11, 'Bato'),
(12, 'Calapi'),
(13, 'Camalobalo'),
(14, 'Camba-og'),
(15, 'Cambugsa'),
(16, 'Candumarao'),
(17, 'Gargato'),
(18, 'Himaya'),
(19, 'Miranda'),
(20, 'Nanunga'),
(21, 'Narauis'),
(22, 'Paticui'),
(23, 'Pilar'),
(24, 'Quiwi'),
(25, 'Tagda'),
(26, 'Tuguis'),
(27, 'Palayog');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election_list`
--

CREATE TABLE `tbl_election_list` (
  `election_list_id` int(11) NOT NULL,
  `election_list_year` text DEFAULT NULL,
  `election_list_rand_id` text DEFAULT NULL,
  `election_list_name` text DEFAULT NULL,
  `election_list_brgy` text DEFAULT NULL,
  `election_list_position` text DEFAULT NULL,
  `election_list_org` text DEFAULT NULL,
  `election_list_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_election_list`
--

INSERT INTO `tbl_election_list` (`election_list_id`, `election_list_year`, `election_list_rand_id`, `election_list_name`, `election_list_brgy`, `election_list_position`, `election_list_org`, `election_list_status`) VALUES
(1, '2023', '1365623232', 'jerjer bon delos', 'Barangay 1', 'President', NULL, 'admin election'),
(2, '2023', '1365623232', 'jerjer bon delos', 'Barangay 1', 'President', NULL, 'admin election'),
(3, '2023', '1365623232', 'jerjer bon delos', 'Barangay 1', 'President', NULL, 'admin election'),
(4, '2023', '2007773466', 'patty patty patty', 'Barangay 3', 'President', NULL, 'admin election'),
(5, '2023', '2007773466', 'patty patty patty', 'Barangay 3', 'President', NULL, 'admin election'),
(6, '2023', '2009422758', 'ssdda adaw awda', 'Palayog', 'President', NULL, 'admin election'),
(7, '2023', '1365623232', 'jerjer bon delos', 'Barangay 1', 'President', NULL, 'admin election');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election_result`
--

CREATE TABLE `tbl_election_result` (
  `election_result_id` int(11) NOT NULL,
  `election_result_year` text DEFAULT NULL,
  `election_result_voter_id` text DEFAULT NULL,
  `election_result_candidates_id` text DEFAULT NULL,
  `election_result_address` text DEFAULT NULL,
  `election_result_position` text DEFAULT NULL,
  `election_result_org` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `org_id` int(11) NOT NULL,
  `org_name` text DEFAULT NULL,
  `org_brgy` text DEFAULT NULL,
  `org_create_date` text DEFAULT NULL,
  `org_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`org_id`, `org_name`, `org_brgy`, `org_create_date`, `org_status`) VALUES
(1, 'two org', 'Barangay 2', '2023-11-12', 'Accept'),
(2, 'one orgs', 'Barangay 1', '2023-11-12', 'Accept'),
(3, 'tree org', 'Barangay 3', '2023-11-12', 'Accept'),
(4, 'four org', 'Barangay 4', '2023-11-12', 'Accept'),
(5, 'anahaw org', 'Anahaw', '2023-11-12', 'Accept'),
(6, 'aranda org', 'Aranda', '2023-11-12', 'Accept'),
(7, 'baga-as org', 'Baga-as', '2023-11-12', 'Accept'),
(8, 'bato org', 'Bato', '2023-11-12', 'Accept'),
(9, 'calapi org', 'Calapi', '2023-11-12', 'Accept'),
(10, 'camalobalo', 'Camalobalo', '2023-11-12', 'Accept'),
(11, 'camba-og org', 'Camba-og', '2023-11-12', 'Accept'),
(12, 'cambugsa org', 'Cambugsa', '2023-11-12', 'Accept'),
(13, 'candumarao', 'Candumarao', '2023-11-12', 'Accept'),
(14, 'gargato org', 'Gargato', '2023-11-12', 'Accept'),
(15, 'himaya org', 'Himaya', '2023-11-12', 'Accept'),
(16, 'miranda org', 'Miranda', '2023-11-12', 'Accept'),
(17, 'nanunga org', 'Nanunga', '2023-11-12', 'Accept'),
(18, 'narauis org', 'Narauis', '2023-11-12', 'Accept'),
(19, 'paticui', 'Paticui', '2023-11-12', 'Accept'),
(20, 'pilar org', 'Pilar', '2023-11-12', 'Accept'),
(21, 'quiwi org', 'Quiwi', '2023-11-12', 'Accept'),
(22, 'tagda org', 'Tagda', '2023-11-12', 'Accept'),
(23, 'tuguis org', 'Tuguis', '2023-11-12', 'Accept'),
(24, 'palayog org', 'Palayog', '2023-11-12', 'Accept'),
(25, 'another one org', 'Barangay 1', '2023-11-12', 'Accept'),
(26, 'another two org', 'Barangay 2', '2023-11-12', 'Accept'),
(27, 'another tre org', 'Barangay 3', '2023-11-12', 'Accept'),
(28, 'batobalani', 'Bato', '1999-11-03', 'Accept'),
(29, 'ahem org', 'Anahaw', '2023-11-12', 'Accept'),
(30, 'pis', 'Palayog', '2023-11-13', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_org_mem`
--

CREATE TABLE `tbl_org_mem` (
  `org_mem_id` int(11) NOT NULL,
  `org_mem_oname` text DEFAULT NULL,
  `org_mem_brgy` text DEFAULT NULL,
  `org_mem_name_id` text DEFAULT NULL,
  `org_mem_name` text DEFAULT NULL,
  `org_mem_pos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pre_election`
--

CREATE TABLE `tbl_pre_election` (
  `pre_election_id` int(11) NOT NULL,
  `pre_election_year` text DEFAULT NULL,
  `pre_election_statrting` text DEFAULT NULL,
  `pre_election_end` text DEFAULT NULL,
  `pre_election_status` text DEFAULT NULL,
  `pre_election_type` text DEFAULT NULL,
  `pre_election_address` text DEFAULT NULL,
  `pre_election_period` text DEFAULT NULL,
  `pre_election_sysDef` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pre_election`
--

INSERT INTO `tbl_pre_election` (`pre_election_id`, `pre_election_year`, `pre_election_statrting`, `pre_election_end`, `pre_election_status`, `pre_election_type`, `pre_election_address`, `pre_election_period`, `pre_election_sysDef`) VALUES
(1, '2023', '2023-11-12', '2023-11-16', 'Start', 'super_admin', NULL, NULL, NULL),
(2, '2023', '2023-11-12', '2023-11-16', 'Start', 'admin', 'Barangay 1', NULL, NULL),
(4, '2023', '2023-11-13', '2023-11-14', 'Start', 'admin', 'Barangay 3', NULL, NULL),
(5, '2023', '2023-11-13', '2023-11-15', 'Start', 'admin', 'Palayog', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sched_events`
--

CREATE TABLE `tbl_sched_events` (
  `sched_events_id` int(11) NOT NULL,
  `sched_events_title` text DEFAULT NULL,
  `sched_events_date` text DEFAULT NULL,
  `sched_events_message` text DEFAULT NULL,
  `sched_events_type` text DEFAULT NULL,
  `sched_events_address` text DEFAULT NULL,
  `sched_events_org` text DEFAULT NULL,
  `sched_events_sponsor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sched_events`
--

INSERT INTO `tbl_sched_events` (`sched_events_id`, `sched_events_title`, `sched_events_date`, `sched_events_message`, `sched_events_type`, `sched_events_address`, `sched_events_org`, `sched_events_sponsor`) VALUES
(1, 'lugaw', '1999-11-03', 'kaun lugaw', 'Brgy Notice', 'Bato', 'All', NULL),
(2, 'serbisyong totoo lamang', '1999-11-03', 'para ni sa imo', 'Brgy Service', 'Bato', 'All', 'jerlen gwapo'),
(3, 'libre bata', '2023-11-12', 'pabata para sa tanan', 'City Notice', NULL, NULL, NULL),
(4, 'libre gatas', '2023-11-12', 'may bata na may gatas pa', 'City Notice', NULL, NULL, NULL),
(5, 'work', '2023-11-12', 'ma ubra para sa mga bata nyo', 'City Service', NULL, NULL, 'ako'),
(6, 'anounce', '2023-11-12', 'anounce lng ah', 'Brgy Notice', 'Anahaw', 'All', NULL),
(7, 'ubraha', '2023-11-12', 'ubra para kakwarta', 'Brgy Service', 'Anahaw', 'All', 'ikw'),
(8, 'wew', '2023-11-12', 'wew', 'Brgy Service', 'Barangay 1', 'All', 'wew'),
(9, 'aws', '2023-11-12', 'aws', 'Brgy Service', 'Barangay 2', 'All', 'aws'),
(10, 'hahahah', '2023-11-12', 'hahahahah', 'Brgy Notice', 'Barangay 2', 'All', NULL),
(11, 'women&#039;s month', '2023-11-12', 'for all women&#039;s', 'Brgy Notice', 'Barangay 1', 'All', NULL),
(12, 'cafa', '2023-11-13', 'awfagaga', 'Brgy Notice', 'Barangay 3', 'All', NULL),
(13, 'awit', '2023-11-13', 'kwaa kay ma tagasak ka', 'Brgy Service', 'Barangay 3', 'All', 'kamo'),
(14, 'bcfncf', '2023-11-13', 'bxnhdr', 'Brgy Notice', 'Palayog', 'palayog org', NULL),
(15, 'sa', '2023-11-13', 'waga', 'Brgy Service', 'Palayog', 'palayog org', 'dwa'),
(16, 'wda', '2023-11-13', 'awda', 'Brgy Notice', 'Palayog', 'pis', NULL),
(17, 'hdfrs', '2023-11-13', 'esgseehse', 'Brgy Service', 'Palayog', 'pis', 'ses'),
(18, 'awsssss', '2023-11-13', 'awssss', 'Brgy Service', 'Palayog', 'All', 'awssss'),
(19, 'awfsdff', '2023-11-13', 'agaw', 'Brgy Notice', 'Palayog', 'All', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `ser_id` int(11) NOT NULL,
  `ser_name` text DEFAULT NULL,
  `ser_rand_id_user` text DEFAULT NULL,
  `ser_user_name` text DEFAULT NULL,
  `ser_date` text DEFAULT NULL,
  `ser_type` text NOT NULL,
  `ser_address` text DEFAULT NULL,
  `ser_sponsor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `tbl_election_list`
--
ALTER TABLE `tbl_election_list`
  ADD PRIMARY KEY (`election_list_id`);

--
-- Indexes for table `tbl_election_result`
--
ALTER TABLE `tbl_election_result`
  ADD PRIMARY KEY (`election_result_id`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `tbl_org_mem`
--
ALTER TABLE `tbl_org_mem`
  ADD PRIMARY KEY (`org_mem_id`);

--
-- Indexes for table `tbl_pre_election`
--
ALTER TABLE `tbl_pre_election`
  ADD PRIMARY KEY (`pre_election_id`);

--
-- Indexes for table `tbl_sched_events`
--
ALTER TABLE `tbl_sched_events`
  ADD PRIMARY KEY (`sched_events_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`ser_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_election_list`
--
ALTER TABLE `tbl_election_list`
  MODIFY `election_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_election_result`
--
ALTER TABLE `tbl_election_result`
  MODIFY `election_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_org_mem`
--
ALTER TABLE `tbl_org_mem`
  MODIFY `org_mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pre_election`
--
ALTER TABLE `tbl_pre_election`
  MODIFY `pre_election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sched_events`
--
ALTER TABLE `tbl_sched_events`
  MODIFY `sched_events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
