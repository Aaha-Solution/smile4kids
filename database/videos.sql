-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smile4kids_news4k`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL COMMENT 'Hindi, Panjabi, Gujarati',
  `category` varchar(50) NOT NULL COMMENT 'prejunior, junior',
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `language`, `category`, `title`, `filename`, `file_path`, `description`, `upload_date`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092232_Hindi_junior_681dad389c95d.mp4', 'videoUploads/20250509092232_Hindi_junior_681dad389c95d.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:22:32', NULL),
(2, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092622_Hindi_junior_681dae1e02708.mp4', 'videoUploads/20250509092622_Hindi_junior_681dae1e02708.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:26:22', NULL),
(3, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092631_Hindi_junior_681dae278111b.mp4', 'videoUploads/20250509092631_Hindi_junior_681dae278111b.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:26:31', NULL),
(4, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092713_Hindi_junior_681dae51a89b1.mp4', 'videoUploads/20250509092713_Hindi_junior_681dae51a89b1.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:27:13', NULL),
(5, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092722_Hindi_junior_681dae5ad38b6.mp4', 'videoUploads/20250509092722_Hindi_junior_681dae5ad38b6.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:27:22', NULL),
(6, 'Hindi', 'junior', 'Sample Hindi Video', '20250509092733_Hindi_junior_681dae652aaae.mp4', 'videoUploads/20250509092733_Hindi_junior_681dae652aaae.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:27:33', NULL),
(7, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092858_Hindi_prejunior_681daebaaa56e.mp4', 'videoUploads/20250509092858_Hindi_prejunior_681daebaaa56e.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:28:58', NULL),
(8, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092912_Hindi_prejunior_681daec83bb58.mp4', 'videoUploads/20250509092912_Hindi_prejunior_681daec83bb58.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:29:12', NULL),
(9, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092917_Hindi_prejunior_681daecd7a3a0.mp4', 'videoUploads/20250509092917_Hindi_prejunior_681daecd7a3a0.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:29:17', NULL),
(10, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092923_Hindi_prejunior_681daed38ca22.mp4', 'videoUploads/20250509092923_Hindi_prejunior_681daed38ca22.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:29:23', NULL),
(11, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092931_Hindi_prejunior_681daedb0a47e.mp4', 'videoUploads/20250509092931_Hindi_prejunior_681daedb0a47e.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:29:31', NULL),
(12, 'Hindi', 'prejunior', 'Sample Hindi Video', '20250509092937_Hindi_prejunior_681daee132ad1.mp4', 'videoUploads/20250509092937_Hindi_prejunior_681daee132ad1.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:29:37', NULL),
(13, 'Panjabi', 'junior', 'Sample  Video', '20250509093311_Panjabi_junior_681dafb796382.mp4', 'videoUploads/20250509093311_Panjabi_junior_681dafb796382.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:11', NULL),
(14, 'Panjabi', 'junior', 'Sample  Video', '20250509093317_Panjabi_junior_681dafbdeab19.mp4', 'videoUploads/20250509093317_Panjabi_junior_681dafbdeab19.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:17', NULL),
(15, 'Panjabi', 'junior', 'Sample  Video', '20250509093323_Panjabi_junior_681dafc3195ef.mp4', 'videoUploads/20250509093323_Panjabi_junior_681dafc3195ef.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:23', NULL),
(16, 'Panjabi', 'junior', 'Sample  Video', '20250509093333_Panjabi_junior_681dafcd0eb53.mp4', 'videoUploads/20250509093333_Panjabi_junior_681dafcd0eb53.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:33', NULL),
(17, 'Panjabi', 'junior', 'Sample  Video', '20250509093338_Panjabi_junior_681dafd2376e2.mp4', 'videoUploads/20250509093338_Panjabi_junior_681dafd2376e2.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:38', NULL),
(18, 'Panjabi', 'junior', 'Sample  Video', '20250509093345_Panjabi_junior_681dafd92f595.mp4', 'videoUploads/20250509093345_Panjabi_junior_681dafd92f595.mp4', 'This is a sample video for Hindi junior category', '2025-05-09', '2025-05-09 07:33:45', NULL),
(19, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093419_Panjabi_prejunior_681daffba2cd9.mp4', 'videoUploads/20250509093419_Panjabi_prejunior_681daffba2cd9.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:19', NULL),
(20, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093426_Panjabi_prejunior_681db0027ac9c.mp4', 'videoUploads/20250509093426_Panjabi_prejunior_681db0027ac9c.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:26', NULL),
(21, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093434_Panjabi_prejunior_681db00a1e79b.mp4', 'videoUploads/20250509093434_Panjabi_prejunior_681db00a1e79b.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:34', NULL),
(22, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093439_Panjabi_prejunior_681db00f7d542.mp4', 'videoUploads/20250509093439_Panjabi_prejunior_681db00f7d542.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:39', NULL),
(23, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093448_Panjabi_prejunior_681db0181f1e3.mp4', 'videoUploads/20250509093448_Panjabi_prejunior_681db0181f1e3.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:48', NULL),
(24, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093455_Panjabi_prejunior_681db01f0a22a.mp4', 'videoUploads/20250509093455_Panjabi_prejunior_681db01f0a22a.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:34:55', NULL),
(25, 'Panjabi', 'prejunior', 'Sample  Video', '20250509093502_Panjabi_prejunior_681db026885d7.mp4', 'videoUploads/20250509093502_Panjabi_prejunior_681db026885d7.mp4', 'This is a sample video for panjabi  junior category', '2025-05-09', '2025-05-09 07:35:02', NULL),
(26, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093604_Gujarati_prejunior_681db0640836d.mp4', 'videoUploads/20250509093604_Gujarati_prejunior_681db0640836d.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:04', NULL),
(27, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093609_Gujarati_prejunior_681db069f2ca6.mp4', 'videoUploads/20250509093609_Gujarati_prejunior_681db069f2ca6.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:09', NULL),
(28, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093614_Gujarati_prejunior_681db06eaf61d.mp4', 'videoUploads/20250509093614_Gujarati_prejunior_681db06eaf61d.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:14', NULL),
(29, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093625_Gujarati_prejunior_681db07921b35.mp4', 'videoUploads/20250509093625_Gujarati_prejunior_681db07921b35.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:25', NULL),
(30, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093632_Gujarati_prejunior_681db080850e4.mp4', 'videoUploads/20250509093632_Gujarati_prejunior_681db080850e4.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:32', NULL),
(31, 'Gujarati', 'prejunior', 'Sample  Video', '20250509093639_Gujarati_prejunior_681db0872d47d.mp4', 'videoUploads/20250509093639_Gujarati_prejunior_681db0872d47d.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:36:39', NULL),
(32, 'Gujarati', 'junior', 'Sample  Video', '20250509093705_Gujarati_junior_681db0a1212a7.mp4', 'videoUploads/20250509093705_Gujarati_junior_681db0a1212a7.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:37:05', NULL),
(33, 'Gujarati', 'junior', 'Sample  Video', '20250509093710_Gujarati_junior_681db0a6450b5.mp4', 'videoUploads/20250509093710_Gujarati_junior_681db0a6450b5.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:37:10', NULL),
(34, 'Gujarati', 'junior', 'Sample  Video', '20250509093716_Gujarati_junior_681db0ac5bdc7.mp4', 'videoUploads/20250509093716_Gujarati_junior_681db0ac5bdc7.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:37:16', NULL),
(35, 'Gujarati', 'junior', 'Sample  Video', '20250509093722_Gujarati_junior_681db0b22bb36.mp4', 'videoUploads/20250509093722_Gujarati_junior_681db0b22bb36.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:37:22', NULL),
(36, 'Gujarati', 'junior', 'Sample  Video', '20250509093727_Gujarati_junior_681db0b7e5bac.mp4', 'videoUploads/20250509093727_Gujarati_junior_681db0b7e5bac.mp4', 'This is a sample video for Gujarati  junior category', '2025-05-09', '2025-05-09 07:37:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_language_category` (`language`,`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
