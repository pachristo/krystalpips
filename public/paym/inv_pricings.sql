-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 12, 2024 at 06:56 PM
-- Server version: 11.5.2-MariaDB-ubu2404
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_pricings`
--

CREATE TABLE `courses_pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_pricings`
--

INSERT INTO `courses_pricings` (`id`, `name`, `duration`, `price`, `benefits`, `created_at`, `updated_at`) VALUES
(1, 'How Long do you want to Invest Funds?', '1 month', '0', '[{\"benefit\":\"31 Days-60 Days______at-12% P.A\"},{\"benefit\":\"61 Days-90 Days______at-12% P.A\"},{\"benefit\":\"91 Days-180 Days______at-12% P.A\"},{\"benefit\":\"181 Days-270 Days______at-12% P.A\"},{\"benefit\":\"271 Days-365 Days___at-12% P.A\"},{\"benefit\":\"Above 1 - 2 years\"},{\"benefit\":\"Above 2 years\"}]', '2024-08-18 09:18:22', '2024-09-11 15:48:45'),
(3, 'How Long do you want to Invest Funds?', '1 month', '0', '[{\"benefit\":\"31 Days-60 Days______at-12% P.A\"},{\"benefit\":\"61 Days-90 Days______at-12% P.A\"},{\"benefit\":\"91 Days-180 Days______at-12% P.A\"},{\"benefit\":\"181 Days-270 Days______at-12% P.A\"},{\"benefit\":\"271 Days-365 Days___at-12% P.A\"},{\"benefit\":\"Above 1 - 2 years\"},{\"benefit\":\"Above 2 years\"}]', '2024-08-18 09:18:22', '2024-09-11 15:48:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_pricings`
--
ALTER TABLE `courses_pricings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_pricings`
--
ALTER TABLE `courses_pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
