-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 07:06 AM
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

INSERT INTO `hourly_reports` (`id`, `job_ticket_number`, `job_name`, `machine`, `impression`, `time_block`, `status_1`, `output_1`, `remarks_1`, `status_2`, `output_2`, `remarks_2`, `status_3`, `output_3`, `remarks_3`, `status_4`, `output_4`, `remarks_4`, `status_5`, `output_5`, `remarks_5`, `status_6`, `output_6`, `remarks_6`, `status_7`, `output_7`, `remarks_7`, `status_8`, `output_8`, `remarks_8`, `status_9`, `output_9`, `remarks_9`, `status_10`, `output_10`, `remarks_10`, `status_11`, `output_11`, `remarks_11`, `status_12`, `output_12`, `remarks_12`, `total_output`, `general_remarks`, `created_at`, `last_update`) VALUES
(13, 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'CX1', '622,580', 0, 'Running', 4, '2', 'Running', 4, '4', 'Makeready', 3, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-29 05:27:31', '2025-05-06 04:44:58'),
(19, '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', 'CX1', '381,457', 0, 'Makeready', 3123123, '1233', 'Running', 3, '3', 'Repairing', 4, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Makeready', 3, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-29 09:24:04', '2025-05-06 04:48:38'),
(20, '2502010D8', 'Paper Cup, Selecta SUP Cups CNC 100mL (2023)', 'CX2', '62,878', 0, 'Makeready', 2, '2', 'Makeready', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-02 00:53:59', '2025-05-06 04:45:37'),
(21, 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'CX2', '106,691', 0, 'Running', 5, '5', 'Makeready', 5, '5', 'Waiting', 6, '5', 'Makeready', 5, '5', NULL, NULL, NULL, NULL, NULL, NULL, 'Job Done', 2, '2', 'Makeready', 5, '5', 'Makeready', 3, '2', 'Waiting', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-02 07:23:39', '2025-05-06 05:04:15');

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
(13, 'D8W07-8003-24D', 'Unknown User', '15:45–16:45', '2025-05-06 13:04:15');

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
(27, 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'Coated Kraftback Board, 350gsm, Cal 24', '658mmx970mm', 1, 'Goldilocks Bakeshop', 'RCL-24-0186', '639mmx956.1mm', 'Long Grain', 'P7408C', '106,691', 1);

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
(15, 'CX2', 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', 'RCL-24-0186', '106,691', 'D2', 'Idle', '2025-04-16 06:38:15');

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
(17, '2412006D8B', 'Folding Cartons, Magnolia, Carton Pack, Mag Cheezee 160g', '2025-03-26', NULL, 'Day', 'D5', 'Balance', 'Plate done'),
(28, 'D8W07-8003-24D', 'Self Formed, Goldilocks, 8x12 Greeting cake box 2SPL-Omnibus Design 2024', '2025-04-16', NULL, 'Day', 'D2', 'Proofing', 'Pending'),
(30, '2409138D1', 'Paper Lid, Selecta Cone Lid- Cornetto-2022 Design (Lower GSM)', '2025-04-21', '', 'Day', 'D5', 'New JT', 'Pending');

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
(20, 'CX1', 'D8W07-8001-24B', 'Self Formed, Goldilocks, Box 9rd Cake (1SPL) O23', 'RCL-24-0039', ' 622,580 ', 'Day Shift', 'cow ', 'cow cow ', 'cow cow cow ', 'cow cow cow cow ', '2025-04-29', '2025-04-29 00:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `pdb_number` varchar(100) NOT NULL,
  `job_date` date NOT NULL,
  `job_ticket_number` varchar(100) NOT NULL,
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

INSERT INTO `requests` (`request_id`, `pdb_number`, `job_date`, `job_ticket_number`, `attachment`, `customer_name`, `product_description`, `request_type`, `quantity`, `date_needed`, `additional_instruction`, `priority_level`, `request_by`, `department`, `created_at`, `status`) VALUES
(1, '14134313151', '2025-04-07', '2410236D2', 'uploads/THERMOFORMED CUPS WITH PAPER SLEEVES, MONDE NISSIN, MINI PP CUP_SOTANGHON USE 2023 VENICE_ ADDITIVE.pdf', 'Red Ribbon Bakeshop Inc.', 'adwadaa', 'RCL Layout,E-Proof', 2, '2025-04-10', 'none', 4, 'daniel', 'Quality Assurance', '2025-04-07 01:38:32', 'Pending'),
(2, '12414414124', '2025-04-14', 'D8W07-8001-24B', 'uploads/Narrative Report_.pdf', 'Goldilocks Bakeshop', 'n/a', 'Ink Laydown', 1, '2025-04-15', 'n/a', 4, 'adrian', 'Research and Development', '2025-04-14 05:37:27', 'Pending'),
(3, '67171771', '2025-04-14', '2410236D2', 'uploads/REQUEST 04-07-25.pdf', 'Red Ribbon Bakeshop Inc.', 'n/a', 'Digital Proof', 0, '2025-04-16', 'n/a', 5, 'yuri', 'PPIC', '2025-04-14 07:20:50', 'Pending'),
(5, 'PB25-03-0428', '2025-04-16', '2502010D8', 'uploads/REQUEST 04-7-25_.pdf', 'Uniliver RFM Ice Cream Inc.', 'N/A', 'Prototype/Mock-up', 1, '2025-04-17', 'N/A', 5, 'John Doe', 'Accounts', '2025-04-16 00:16:16', 'Pending'),
(6, 'PB25-03-0428', '2025-04-16', '2502010D8', 'uploads/RCL-24-0018, RCL-24-0360 THERMOFORMED CUPS WITH PAPER SLEEVES, MONDE NISSIN, CUP PP BATCHOY MIN.pdf', 'Uniliver RFM Ice Cream Inc.', 'N/A', 'Ink Laydown,RCL Layout,E-Proof,Digital Proof', 1, '2025-04-17', 'N/A', 5, 'John Doe', 'Accounts', '2025-04-16 06:30:41', 'Pending'),
(8, 'PB25-03-0428', '2025-04-21', '2502010D8', 'uploads/REQUEST 04-7-25_.pdf', 'Uniliver RFM Ice Cream Inc.', 'N/A', 'Ink Laydown,RCL Layout,E-Proof,Digital Proof', 1, '2025-04-22', 'N/A', 3, 'John Doe', 'Accounts', '2025-04-21 06:32:40', 'Pending'),
(9, '1313131313', '2025-04-21', '', 'uploads/REQUEST 04-07-25.pdf', 'meow', 'na', 'Technical Drawing,Sample Cutting', 1, '2025-04-30', 'na', 4, 'meow', 'Production', '2025-04-21 06:34:12', 'Pending');

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
  `profile_picture` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `bio_id`, `email`, `fullname`, `department`, `disney`, `password`, `status`, `role`, `profile_picture`) VALUES
(4, 86546, 'yuricy20@gmail.com', 'Ausan, Yuri Neil Aims G.', 'R&D', 'Disney 2', '$2y$10$wfXIt6Sm5Exl1Ppkx5zIUepJ0H/y4vQYKQ73Za4XBAS6U5rnpwiMy', 'approved', 'Admin(Primary)', 'default.png'),
(7, 86544, 'adriandepamaylo@gmail.com', 'Depamaylo, Adrian J.', 'R&D', 'Disney 2', '$2y$10$I3id/0HCdOGDJEpgPhU6/Ol/sqZqAXXgdHZZaU.cZDZR7zdojP1QO', 'approved', 'User', 'default.png'),
(8, 17560, 'sample123@gmail.com', 'Doe, John S.', 'R&D', 'Disney 2', '$2y$10$fEvphwdOHKqtskLcAfXGGuejt65nW/LDhhxPe.cvE4p4oXJOYrqeu', 'approved', 'User', 'default.png'),
(9, 54321, 'meownie123@gmail.com', 'Doe, Meow S.', 'PPIC', 'Disney 5', '$2y$10$W4XmJplbdjt210.6zpPuAOLsBWzBTTR.qstgShqw1SuvDGY7tgsfy', 'rejected', NULL, 'default.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hourly_update_users`
--
ALTER TABLE `hourly_update_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `plates`
--
ALTER TABLE `plates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
