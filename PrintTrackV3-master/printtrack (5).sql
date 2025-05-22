-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 06:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printtrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `hourly_reports`
--

CREATE TABLE `hourly_reports` (
  `id` int(11) NOT NULL,
  `job_ticket_number` varchar(50) DEFAULT NULL,
  `job_name` varchar(255) DEFAULT NULL,
  `machine` varchar(255) DEFAULT NULL,
  `impression` varchar(255) DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `time_block` int(11) NOT NULL,
  `status_1` varchar(50) DEFAULT NULL,
  `output_1` int(11) DEFAULT NULL,
  `remarks_1` text DEFAULT NULL,
  `status_2` varchar(50) DEFAULT NULL,
  `output_2` int(11) DEFAULT NULL,
  `remarks_2` text DEFAULT NULL,
  `status_3` varchar(50) DEFAULT NULL,
  `output_3` int(11) DEFAULT NULL,
  `remarks_3` text DEFAULT NULL,
  `status_4` varchar(50) DEFAULT NULL,
  `output_4` int(11) DEFAULT NULL,
  `remarks_4` text DEFAULT NULL,
  `status_5` varchar(50) DEFAULT NULL,
  `output_5` int(11) DEFAULT NULL,
  `remarks_5` text DEFAULT NULL,
  `status_6` varchar(50) DEFAULT NULL,
  `output_6` int(11) DEFAULT NULL,
  `remarks_6` text DEFAULT NULL,
  `status_7` varchar(50) DEFAULT NULL,
  `output_7` int(11) DEFAULT NULL,
  `remarks_7` text DEFAULT NULL,
  `status_8` varchar(50) DEFAULT NULL,
  `output_8` int(11) DEFAULT NULL,
  `remarks_8` text DEFAULT NULL,
  `status_9` varchar(50) DEFAULT NULL,
  `output_9` int(11) DEFAULT NULL,
  `remarks_9` text DEFAULT NULL,
  `status_10` varchar(50) DEFAULT NULL,
  `output_10` int(11) DEFAULT NULL,
  `remarks_10` text DEFAULT NULL,
  `status_11` varchar(50) DEFAULT NULL,
  `output_11` int(11) DEFAULT NULL,
  `remarks_11` text DEFAULT NULL,
  `status_12` varchar(50) DEFAULT NULL,
  `output_12` int(11) DEFAULT NULL,
  `remarks_12` text DEFAULT NULL,
  `total_output` int(11) DEFAULT NULL,
  `general_remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hourly_reports`
--

INSERT INTO `hourly_reports` (`id`, `job_ticket_number`, `job_name`, `machine`, `impression`, `shift`, `time_block`, `status_1`, `output_1`, `remarks_1`, `status_2`, `output_2`, `remarks_2`, `status_3`, `output_3`, `remarks_3`, `status_4`, `output_4`, `remarks_4`, `status_5`, `output_5`, `remarks_5`, `status_6`, `output_6`, `remarks_6`, `status_7`, `output_7`, `remarks_7`, `status_8`, `output_8`, `remarks_8`, `status_9`, `output_9`, `remarks_9`, `status_10`, `output_10`, `remarks_10`, `status_11`, `output_11`, `remarks_11`, `status_12`, `output_12`, `remarks_12`, `total_output`, `general_remarks`, `created_at`, `last_update`) VALUES
(35, '03213123', 'MCDO', 'CX2', '94,507', 'Day Shift', 0, 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Job Done', 5000, '', 'Waiting', 5000, '', 'Running', 5000, '', 'Cleaning', 5000, '', 'Running', 5000, '', NULL, NULL, '2025-05-09 06:37:00', '2025-05-21 02:23:42'),
(36, '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'CX1', '381,457', 'Day Shift', 0, 'Job Done', 40000, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 07:07:56', '2025-05-15 02:05:18'),
(37, '2502152D8', 'PAPER CUP, SELECTA PAPER CUP SELECTA CUPS CHOCO 16X100ML(2023)', 'CX2', '63161', 'Night Shift', 0, 'Job Done', 6000, '', 'Job Done', 6000, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 07:08:03', '2025-05-15 02:03:13'),
(38, '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'CX2', '62,878', 'Day Shift', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 08:07:25', '2025-05-09 08:07:25'),
(39, 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'CX1', '622,580', 'Night Shift', 0, 'Makeready', 5000, '', 'Running', 5000, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-21 05:29:34', '2025-05-21 05:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `hourly_update_users`
--

CREATE TABLE `hourly_update_users` (
  `id` int(11) NOT NULL,
  `job_ticket_number` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hourly_update_users`
--

INSERT INTO `hourly_update_users` (`id`, `job_ticket_number`, `fullname`, `action`, `date`) VALUES
(1, 'UNKNOWN', 'Unknown User', '07:45–08:45', '2025-05-02 16:25:46'),
(2, 'UNKNOWN', 'Unknown User', '07:45–08:45', '2025-05-02 16:26:11'),
(3, 'UNKNOWN', 'Unknown User', 'Unknown Block', '2025-05-02 16:27:30'),
(4, 'UNKNOWN', 'Unknown User', '08:45–09:45', '2025-05-06 12:43:51'),
(5, 'UNKNOWN', 'Unknown User', '08:45–09:45', '2025-05-06 12:44:55'),
(6, 'UNKNOWN', 'Unknown User', '07:45–08:45', '2025-05-06 12:44:58'),
(7, 'UNKNOWN', 'Unknown User', '07:45–08:45', '2025-05-06 12:45:18'),
(8, 'UNKNOWN', 'Unknown User', '08:45–09:45', '2025-05-06 12:45:37'),
(9, 'UNKNOWN', 'Unknown User', 'Unknown Block', '2025-05-06 12:47:36'),
(10, 'UNKNOWN', 'Unknown User', 'Unknown Block', '2025-05-06 12:47:54'),
(11, '2409138D1', 'Unknown User', '09:45–10:45', '2025-05-06 12:48:38'),
(12, 'D8W07-8003-24D', 'Unknown User', '16:45–17:45', '2025-05-06 13:03:16'),
(13, 'D8W07-8003-24D', 'Unknown User', '15:45–16:45', '2025-05-06 13:04:15'),
(14, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 13:17:57'),
(15, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 13:19:59'),
(16, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 13:20:42'),
(17, '2409138D1', 'Unknown User', '08:45–09:45', '2025-05-06 13:20:51'),
(18, '2409138D1', 'Unknown User', '09:45–10:45', '2025-05-06 13:21:04'),
(19, '2409138D1', 'Unknown User', '09:45–10:45', '2025-05-06 13:21:20'),
(20, '2409138D1', 'Unknown User', '10:45–11:45', '2025-05-06 13:21:26'),
(21, '2409138D1', 'Unknown User', '13:45–14:45', '2025-05-06 13:22:00'),
(22, '2409138D1', 'Unknown User', '14:45–15:45', '2025-05-06 13:22:02'),
(23, '2409138D1', 'Unknown User', '15:45–16:45', '2025-05-06 13:22:04'),
(24, '2409138D1', 'Unknown User', '16:45–17:45', '2025-05-06 13:22:06'),
(25, '2409138D1', 'Unknown User', '18:45–19:45', '2025-05-06 13:22:08'),
(26, '2409138D1', 'Unknown User', '12:45–13:45', '2025-05-06 13:22:14'),
(27, '2409138D1', 'Unknown User', '11:45–12:45', '2025-05-06 13:22:18'),
(28, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 13:22:46'),
(29, '2409138D1', 'Unknown User', '08:45–09:45', '2025-05-06 13:22:48'),
(30, '2409138D1', 'Unknown User', '09:45–10:45', '2025-05-06 13:22:51'),
(31, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 14:29:11'),
(32, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 14:30:17'),
(33, '2409138D1', 'Unknown User', '17:45–18:45', '2025-05-06 14:33:04'),
(34, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 15:29:06'),
(35, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 15:29:09'),
(36, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-06 15:29:12'),
(37, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:35:49'),
(38, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:35:56'),
(39, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:36:06'),
(40, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:37:05'),
(41, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:38:03'),
(42, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 08:38:17'),
(43, '2409138D1', 'Unknown User', '13:45–14:45', '2025-05-07 08:38:19'),
(44, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 09:23:05'),
(45, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 09:23:16'),
(46, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-07 09:23:24'),
(47, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-08 15:53:09'),
(48, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-08 15:54:05'),
(49, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-08 15:54:11'),
(50, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-08 15:54:21'),
(51, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-08 15:54:24'),
(52, '2502152D8', 'Unknown User', '08:45–09:45', '2025-05-08 15:54:33'),
(53, '2502152D8', 'Unknown User', '08:45–09:45', '2025-05-08 15:54:35'),
(54, '2502152D8', 'Unknown User', '09:45–10:45', '2025-05-08 15:54:46'),
(55, '2502152D8', 'Unknown User', '09:45–10:45', '2025-05-08 15:55:01'),
(56, '2502152D8', 'Unknown User', '09:45–10:45', '2025-05-08 15:55:20'),
(57, '2502152D8', 'Unknown User', '17:45–18:45', '2025-05-08 15:55:58'),
(58, '03213123', 'Unknown User', '07:45–08:45', '2025-05-08 16:19:56'),
(59, '03213123', 'Unknown User', '07:45–08:45', '2025-05-08 16:28:14'),
(60, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 07:57:41'),
(61, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 08:05:12'),
(62, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 12:01:43'),
(63, '03213123', 'Unknown User', '08:45–09:45', '2025-05-09 12:02:02'),
(64, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 12:02:04'),
(65, '03213123', 'Unknown User', '08:45–09:45', '2025-05-09 13:25:56'),
(66, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 13:25:58'),
(67, '03213123', 'Unknown User', '09:45–10:45', '2025-05-09 13:26:01'),
(68, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 16:11:36'),
(69, '03213123', 'Unknown User', '08:45–09:45', '2025-05-09 16:11:46'),
(70, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 16:14:30'),
(71, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 16:18:36'),
(72, '03213123', 'Unknown User', '07:45–08:45', '2025-05-09 16:19:08'),
(73, '03213123', 'Unknown User', '09:45–10:45', '2025-05-09 17:09:32'),
(74, '03213123', 'Unknown User', '11:45–12:45', '2025-05-09 17:09:37'),
(75, '03213123', 'Unknown User', '10:45–11:45', '2025-05-13 08:13:07'),
(76, '03213123', 'Unknown User', '12:45–13:45', '2025-05-13 09:13:22'),
(77, '03213123', 'Unknown User', '13:45–14:45', '2025-05-13 11:58:14'),
(78, '03213123', 'Unknown User', '14:45–15:45', '2025-05-13 11:58:18'),
(79, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 09:22:17'),
(80, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 09:25:54'),
(81, '03213123', 'Unknown User', '08:45–09:45', '2025-05-15 09:26:09'),
(82, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 09:39:38'),
(83, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 09:53:16'),
(84, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 09:58:33'),
(85, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 10:00:36'),
(86, '03213123', 'Unknown User', '08:45–09:45', '2025-05-15 10:01:09'),
(87, '2502152D8', 'Unknown User', '07:45–08:45', '2025-05-15 10:03:05'),
(88, '2502152D8', 'Unknown User', '08:45–09:45', '2025-05-15 10:03:13'),
(89, '2409138D1', 'Unknown User', '07:45–08:45', '2025-05-15 10:05:18'),
(90, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 10:13:48'),
(91, '03213123', 'Unknown User', '15:45–16:45', '2025-05-15 17:06:51'),
(92, '03213123', 'Unknown User', '07:45–08:45', '2025-05-15 17:07:49'),
(93, '03213123', 'Unknown User', '07:45–08:45', '2025-05-20 08:58:11'),
(94, '03213123', 'Unknown User', '07:45–08:45', '2025-05-20 08:58:39'),
(95, '03213123', 'Unknown User', '07:45–08:45', '2025-05-20 08:59:07'),
(96, '03213123', 'Unknown User', '16:45–17:45', '2025-05-21 10:22:07'),
(97, '03213123', 'Unknown User', '12:45–13:45', '2025-05-21 10:22:19'),
(98, '03213123', 'Unknown User', '17:45–18:45', '2025-05-21 10:22:35'),
(99, '03213123', 'Unknown User', '17:45–18:45', '2025-05-21 10:23:33'),
(100, '03213123', 'Unknown User', '18:45–19:45', '2025-05-21 10:23:42'),
(101, 'D8W07-8001-24B', 'Nares, Erwin ', '07:45–08:45', '2025-05-21 13:29:59'),
(102, 'D8W07-8001-24B', 'Nares, Erwin ', '08:45–09:45', '2025-05-21 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_ticket_number` varchar(50) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `sheet_size` varchar(50) NOT NULL,
  `number_of_colors` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `rcl_code` varchar(50) NOT NULL,
  `pieces_size` varchar(50) NOT NULL,
  `grain_direction` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `impression` varchar(50) NOT NULL,
  `number_of_outs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_ticket_number`, `job_name`, `material`, `sheet_size`, `number_of_colors`, `customer_name`, `rcl_code`, `pieces_size`, `grain_direction`, `color`, `impression`, `number_of_outs`) VALUES
(17, '2412006D8B', 'Folding Cartons, Magnolia, Carton Pack, Mag Cheezee 160g', 'Claycoated NB, 300 gsm, Cal 15', '679x906mm', 5, 'Magnolia Inc', 'RCL-22-0094', '165mmx178.5mm', 'Long Grain', 'CMYK, P485C', ' 84,290 ', 20),
(18, '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'FBB High Bulk FSC Chenming, 235 gsm, Cal 15', '469mmx658mm', 1, 'Uniliver RFM Ice Cream Inc.', 'RCL-22-0076', '60mmx80mm', 'Long Grain', 'P299C', ' 381,457 ', 60),
(20, '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'P1C1 Cupstock, 228 gsm, Cal 12', '642mmx942mm', 4, 'Uniliver RFM Ice Cream Inc.', 'RCL-23-0057', '92.43mmx217.51mm', 'Long Grain', 'CMYK', ' 62,878 ', 33),
(27, 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'Coated Kraftback Board, 350gsm, Cal 24', '658mmx970mm', 1, 'Goldilocks Bakeshop', 'RCL-24-0186', '639mmx956.1mm', 'Long Grain', 'P7408C', '106,691', 1),
(28, '232', 'Folding Cartons, Magnolia, Carton Pack, Mag Cheezee 160g', 'Claycoated NB, 300 gsm, Cal 15', '679x906mm', 5, 'Magnolia Inc', 'RCL-22-0094', '165mmx178.5mm', 'Long Grain', 'CMYK, P485C', '94,507', 20),
(29, '13123', 'Jollibee', 'P1C1 Cupstock, 228 gsm, Cal 12', '679x906mm', 5, 'Paiffy', 'RCL-22-0094', '165mmx178.5mm', 'Long Grain', 'CMYK, P485C', '94,507', 20),
(30, '2502152D8', 'PAPER CUP, SELECTA PAPER CUP SELECTA CUPS CHOCO 16X100ML(2023)', 'P1C1 CUPSTOCK, 228GSM, CAL. 12', '642MM X 942MM', 4, 'UNILEVER RFM ICE CREAM INC.', 'RCL-23-0048', '622.57mmx928.63mm', 'Long Grain', 'CMYK', '63161', 33),
(31, '03213123', 'MCDO', 'P1C1 Cupstock, 228 gsm, Cal 12', '679x906mm', 5, 'Paiblakey', 'RCL-22-0094', '165mmx178.5mm', 'Long Grain', 'CMYK, P485C', '94,507', 20);

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `machine_id` int(11) NOT NULL,
  `machine_name` varchar(50) NOT NULL,
  `job_ticket_number` varchar(100) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `rcl_code` varchar(100) NOT NULL,
  `impression` varchar(100) NOT NULL,
  `plant` varchar(50) NOT NULL,
  `machine_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`machine_id`, `machine_name`, `job_ticket_number`, `job_name`, `rcl_code`, `impression`, `plant`, `machine_status`, `created_at`) VALUES
(2, 'CX1', '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'RCL-22-0076', ' 381,457 ', 'D1', 'Not working', '2025-04-07 01:07:23'),
(4, 'CX1', 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'RCL-24-0039', ' 622,580 ', 'D5', 'Idle', '2025-04-07 02:50:35'),
(14, 'CX2', '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'RCL-23-0057', ' 62,878 ', 'D2', 'Idle', '2025-04-16 00:57:47'),
(15, 'CX2', 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'RCL-24-0186', '106,691', 'D2', 'Idle', '2025-04-16 06:38:15'),
(18, 'CX2', '2502152D8', 'PAPER CUP, SELECTA PAPER CUP SELECTA CUPS CHOCO 16X100ML(2023)', 'RCL-23-0048', '63161', 'D8', 'Running', '2025-05-08 07:48:58'),
(19, 'CX2', '03213123', 'MCDO', 'RCL-22-0094', '94,507', 'D6', 'Running', '2025-05-08 08:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `plates`
--

CREATE TABLE `plates` (
  `id` int(11) NOT NULL,
  `job_ticket_number` varchar(50) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `job_date` date NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `shift` varchar(20) NOT NULL,
  `plant` varchar(50) NOT NULL,
  `job_status` varchar(50) NOT NULL,
  `plate_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`id`, `job_ticket_number`, `job_name`, `job_date`, `color`, `shift`, `plant`, `job_status`, `plate_status`) VALUES
(33, '2502152D8', 'PAPER CUP, SELECTA PAPER CUP SELECTA CUPS CHOCO 16X100ML(2023)', '2025-05-13', 'CMYK, P485C', 'Night', 'D8', 'Proofing', 'Pending'),
(34, '13123', 'Jollibee', '2025-05-14', 'P299C', 'Day', 'D2', 'New JT', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `machine` varchar(100) NOT NULL,
  `job_ticket_number` varchar(100) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `rcl_code` varchar(100) NOT NULL,
  `impression` varchar(100) NOT NULL,
  `shift` enum('Day Shift','Night Shift') NOT NULL,
  `line_supervisor` varchar(100) DEFAULT NULL,
  `operator` varchar(100) NOT NULL,
  `helper` varchar(100) NOT NULL,
  `qa_inspector` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `machine`, `job_ticket_number`, `job_name`, `rcl_code`, `impression`, `shift`, `line_supervisor`, `operator`, `helper`, `qa_inspector`, `date`, `created_at`) VALUES
(17, 'CX2', '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'RCL-23-0057', ' 62,878 ', 'Day Shift', 'Yuri', 'Jim', 'Doe', 'john', '2025-04-22', '2025-04-22 02:55:43'),
(18, 'CX2', 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'RCL-24-0186', '106,691', 'Day Shift', 'meow', 'meowmeow', 'meowmeowmeow', 'meowmeowmeowmeow', '2025-04-22', '2025-04-22 06:21:41'),
(19, 'CX1', '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'RCL-22-0076', ' 381,457 ', 'Day Shift', '1', '2', '3', '4', '2025-04-25', '2025-04-25 09:02:43'),
(20, 'CX1', 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'RCL-24-0039', ' 622,580 ', 'Day Shift', 'cow ', 'cow cow ', 'cow cow cow ', 'cow cow cow cow ', '2025-04-29', '2025-04-29 00:25:16'),
(21, 'CX2', '2502152D8', 'PAPER CUP, SELECTA PAPER CUP SELECTA CUPS CHOCO 16X100ML(2023)', 'RCL-23-0048', '63161', 'Night Shift', 'A. VILLLANUEVA', 'BERNARDO BANAGUA', 'meowmeowmeow', 'arfarfarfarf', '2025-05-08', '2025-05-08 07:50:46'),
(22, 'CX2', '03213123', 'MCDO', 'RCL-22-0094', '94,507', 'Day Shift', 'A. VILLLANUEVA', 'BERNARDO BANAGUA', 'meowmeowmeow', 'arfarfarfarf', '2025-05-08', '2025-05-08 08:18:57'),
(25, 'CX2', '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'RCL-23-0057', ' 62,878 ', 'Day Shift', 'A. VILLLANUEVA', 'BERNARDO BANAGUA', 'meowmeowmeow', 'arfarfarfarf', '0000-00-00', '2025-05-13 01:39:10'),
(26, 'CX1', 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'RCL-24-0039', ' 622,580 ', 'Day Shift', 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', '2025-05-21', '2025-05-21 05:27:53'),
(27, 'CX1', '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'RCL-22-0076', ' 381,457 ', 'Day Shift', 'bbbbbbbb', 'bbbbbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbbb', '2025-05-21', '2025-05-21 05:28:23'),
(28, 'CX1', 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'RCL-24-0039', ' 622,580 ', 'Night Shift', '4', '4', '4', '4', '2025-05-21', '2025-05-21 05:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `job_ticket_number` varchar(100) NOT NULL,
  `pdb_number` varchar(100) NOT NULL,
  `job_date` date NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `request_type` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_needed` date NOT NULL,
  `additional_instruction` text DEFAULT NULL,
  `priority_level` tinyint(4) NOT NULL,
  `request_by` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `job_ticket_number`, `pdb_number`, `job_date`, `attachment`, `customer_name`, `product_description`, `request_type`, `quantity`, `date_needed`, `additional_instruction`, `priority_level`, `request_by`, `department`, `created_at`, `status`) VALUES
(19, '15', '2409138D1', '0987654321', '2025-05-14', 'uploads/05102025 RND Signage.pdf', 'Uniliver RFM Ice Cream Inc.', 'none', 'Prototype/Mock-up,Technical Drawing', 1, '2025-05-14', 'none', 5, 'caesar', 'PPIC', '2025-05-14 01:32:30', 'In Progress'),
(31, '15', '2412006D8C', '1122334455', '0000-00-00', 'Narrative Report_.pdf', 'Magnolia Inc', 'none', 'Digital Proof', 1, '2025-05-21', 'none', 5, 'beabadobee', 'Quality Assurance', '2025-05-20 00:10:01', 'Completed'),
(32, NULL, '2410236D2', '5544332211', '0000-00-00', 'EMERLIZA-JAMEELAH-ZARA-TICKET-13-MAY-TO-11-JUNE.pdf', 'Red Ribbon Bakeshop Inc.', 'none', 'Digital Proof', 2, '2025-05-21', 'none', 5, 'beabadobee', 'Research and Development', '2025-05-20 01:30:05', 'Completed'),
(33, NULL, 'D8W07-8003-24D', '09876544321', '0000-00-00', '05102025 RND Signage.pdf', 'Goldilocks Bakeshop', 'none', 'Sample Cutting', 2, '2025-05-22', 'none', 5, 'beabadobee', 'Production', '2025-05-20 02:05:08', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `request_type_status`
--

CREATE TABLE `request_type_status` (
  `id` int(11) NOT NULL,
  `job_ticket_number` varchar(50) DEFAULT NULL,
  `request_type` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_type_status`
--

INSERT INTO `request_type_status` (`id`, `job_ticket_number`, `request_type`, `status`) VALUES
(7, '2412006D8B', 'Digital Proof', 'Done'),
(22, 'D8W07-8001-24B', 'Sample Cutting', 'In Progress'),
(29, '2412006D8B', 'RCL Layout', 'Done'),
(33, '2412006D8B', 'E-Proof', 'Done'),
(35, '2412006D8B', 'Ink Laydown', 'Done'),
(42, '2409138D1', 'Technical Drawing', 'Done'),
(43, '2409138D1', 'Prototype/Mock-up', 'Done'),
(44, '2410236D2', 'Digital Proof', 'Done'),
(45, '2412006D8C', 'Digital Proof', 'Done'),
(46, 'D8W07-8003-24D', 'Sample Cutting', 'Done'),
(47, '1234', 'Ink Laydown', 'Done'),
(50, '1', '', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `bio_id` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `disney` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `role` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `bio_id`, `email`, `fullname`, `department`, `disney`, `password`, `status`, `role`, `profile_picture`) VALUES
(4, 86546, 'yuricy20@gmail.com', 'Ausan, Yuri Neil Aims G.', 'R&D', 'Disney 2', '$2y$10$wfXIt6Sm5Exl1Ppkx5zIUepJ0H/y4vQYKQ73Za4XBAS6U5rnpwiMy', 'approved', 'Admin', 'default.jpg'),
(7, 86544, 'adriandepamaylo@gmail.com', 'Depamaylo, Adrian J.', 'R&D', 'Disney 2', '$2y$10$I3id/0HCdOGDJEpgPhU6/Ol/sqZqAXXgdHZZaU.cZDZR7zdojP1QO', 'pending', 'User', 'default.jpg'),
(8, 17560, 'sample123@gmail.com', 'Doe, John S.', 'R&D', 'Disney 2', '$2y$10$fEvphwdOHKqtskLcAfXGGuejt65nW/LDhhxPe.cvE4p4oXJOYrqeu', 'pending', 'User', 'default.jpg'),
(9, 54321, 'meownie123@gmail.com', 'Doe, Meow S.', 'PPIC', 'Disney 5', '$2y$10$W4XmJplbdjt210.6zpPuAOLsBWzBTTR.qstgShqw1SuvDGY7tgsfy', 'rejected', 'User', 'default.jpg'),
(10, 86543, 'hoojin@gmail.com', 'Hoo Jin Woo', 'Accounts', 'Disney 1', '$2y$10$0H620EYni3/YbEpoxJABBucphBmlgNHr6lOHWw3wVq0ju7hXK2Th2', 'pending', 'User', 'default.jpg'),
(11, 12312, 'paiffy@gmail.com', 'paiffy c cadjksajd', 'Accounts', 'Disney 3', '$2y$10$o0xeCEsDOptTSK/DAH.N/uMVtwEQHnVtY0MRO49KETY8AcLAVvw/C', 'pending', 'User', 'default.jpg'),
(12, 9876, 'jamesbond@gmail.com', 'Bond, James ', 'R&D', 'Disney 4', '$2y$10$Eg.2m.MF74mWyFEbJEaZPOMuCfQJamTiLxtrjFDcS4ZwAdjuwcCl6', 'approved', 'Admin', 'default.jpg'),
(13, 12345, 'admin@gmail.com', 'Nares, Erwin', 'Accounts', 'Disney 1', '$2y$10$zOBGBMWCsBF0jy8vsk8hCuoXLzrPTlmWJXfVJAP1wR6s4Fh6BywtC', 'approved', 'Admin', 'default.jpg'),
(14, 12314, 'secondary@gmail.com', 'Nares, Erwin ', 'Accounts', 'Disney 2', '$2y$10$ipjj.yJPJUb7mXFzz.L6WOBLRtLubBm7cRWZ3Sq3aovaLTetr.jM2', 'approved', 'Secondary', 'default.jpg'),
(15, 12345, 'ework@gmail.com', 'nares', 'PPIC', 'Disney 2', '$2y$10$WKsbbhLLyY8fKRkCZtyD/OxtsXZj1m3gq8c9VsqkBygU./rTnZB1G', 'approved', 'Ework', 'default.jpg'),
(16, 66666, 'production@gmail.com', 'prod, sample', 'Production', 'Disney 8', '$2y$10$YGsCG2dyHeWVRIYpn0q0DOcYiWMq8PMPiqNMAJ35J2kIEvG5owrbi', 'approved', 'Production', 'default.jpg'),
(17, 66555, 'pending@gmail.com', 'pending, sample', 'Accounts', 'Disney 4', '$2y$10$dxqiDvWO6kOi9Pc4voMfoe/uaIEUhZvAdwiC2q0c9DMsmPKuSD5dK', 'pending', 'User', 'default.jpg'),
(18, 12444, 'rejected@gmail.com', 'rejected, sample', 'Accounts', 'Disney 3', '$2y$10$1Zu/Hi5sW0GtPYBNmWZ8TeJEIM07X50eZ2bDEBJ7Fj6bSacjGfHv.', 'rejected', 'User', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hourly_reports`
--
ALTER TABLE `hourly_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hourly_update_users`
--
ALTER TABLE `hourly_update_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`machine_id`),
  ADD UNIQUE KEY `job_ticket_number` (`job_ticket_number`);

--
-- Indexes for table `plates`
--
ALTER TABLE `plates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_job_ticket` (`job_ticket_number`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `request_type_status`
--
ALTER TABLE `request_type_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_ticket_number` (`job_ticket_number`,`request_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hourly_reports`
--
ALTER TABLE `hourly_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hourly_update_users`
--
ALTER TABLE `hourly_update_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `plates`
--
ALTER TABLE `plates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `request_type_status`
--
ALTER TABLE `request_type_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
