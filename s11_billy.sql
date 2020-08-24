-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 06:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s11_billy`
--

-- --------------------------------------------------------

--
-- Table structure for table `decrypted_file`
--

CREATE TABLE `decrypted_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uploaded_file_id` bigint(20) UNSIGNED NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decrypted_file`
--

INSERT INTO `decrypted_file` (`id`, `uploaded_file_id`, `key`, `file`, `created_at`, `updated_at`) VALUES
(13, 63, 'unkhairxyz', '1586030788.docx', '2020-04-04 13:06:28', '2020-04-04 13:06:28'),
(14, 70, 'unkhairxyz', '1586281414.docx', '2020-04-07 10:43:35', '2020-04-07 10:43:35'),
(15, 76, 'Corona2019xyzxyzxyzxyzxy', '1586284588.docx', '2020-04-07 11:36:28', '2020-04-07 11:36:28'),
(16, 77, 'unkhairxyz', '1586284752.docx', '2020-04-07 11:39:12', '2020-04-07 11:39:12'),
(17, 78, 'Corona2019xyzxyzxyzxyzxy', '1586284763.docx', '2020-04-07 11:39:23', '2020-04-07 11:39:23'),
(18, 78, 'Corona2019xyzxyzxyzxyzxy', '1586284959.docx', '2020-04-07 11:42:39', '2020-04-07 11:42:39'),
(19, 79, 'unkhairxyz', '1586284972.docx', '2020-04-07 11:42:52', '2020-04-07 11:42:52'),
(20, 79, 'unkhairxyz', '1586284996.docx', '2020-04-07 11:43:16', '2020-04-07 11:43:16'),
(21, 80, 'Corona2019xyzxyzxyzxyzxy', '1586285007.docx', '2020-04-07 11:43:27', '2020-04-07 11:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `encrypted_file`
--

CREATE TABLE `encrypted_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uploaded_file_id` bigint(20) UNSIGNED NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encrypted_file`
--

INSERT INTO `encrypted_file` (`id`, `uploaded_file_id`, `key`, `file`, `created_at`, `updated_at`) VALUES
(26, 62, 'unkhairxyz', '1586030615.docx', '2020-04-04 13:03:35', '2020-04-04 13:03:35'),
(27, 65, 'unkhairxyz', '1586032163.docx', '2020-04-04 13:29:23', '2020-04-04 13:29:23'),
(28, 66, 'Corona2019xyzxyzxyzxyzxy', '1586281208.docx', '2020-04-07 10:40:09', '2020-04-07 10:40:09'),
(29, 69, 'Corona2019xyzxyzxyzxyzxy', '1586281356.docx', '2020-04-07 10:42:36', '2020-04-07 10:42:36'),
(30, 72, 'Corona2019xyzxyzxyzxyzxy', '1586281465.docx', '2020-04-07 10:44:25', '2020-04-07 10:44:25'),
(31, 72, 'Corona2019xyzxyzxyzxyzxy', '1586281472.docx', '2020-04-07 10:44:32', '2020-04-07 10:44:32'),
(32, 72, 'Corona2019xyzxyzxyzxyzxy', '1586281531.docx', '2020-04-07 10:45:32', '2020-04-07 10:45:32'),
(33, 72, 'Corona2019xyzxyzxyzxyzxy', '1586281536.docx', '2020-04-07 10:45:36', '2020-04-07 10:45:36'),
(34, 72, 'Corona2019xyzxyzxyzxyzxy', '1586281805.docx', '2020-04-07 10:50:05', '2020-04-07 10:50:05'),
(35, 74, 'Corona2019xyzxyzxyzxyzxy', '1586282230.docx', '2020-04-07 10:57:10', '2020-04-07 10:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_31_083225_create_uploaded_file_table', 2),
(4, '2020_03_31_083854_create_encrypted_file_table', 3),
(5, '2020_03_31_084203_create_decrypted_file_table', 4),
(6, '2020_03_31_084439_add_crypto_to_uploaded_file', 5);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE `uploaded_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plaintext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `crypto` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`id`, `plaintext`, `file`, `crypto`, `created_at`, `updated_at`) VALUES
(62, 'RositaSAli', '1586030599.docx', 0, '2020-04-04 13:03:19', '2020-04-04 13:03:19'),
(63, 'xª¨ðÍíêÙt', '1586030646.docx', 1, '2020-04-04 13:04:06', '2020-04-04 13:04:06'),
(64, 'xª¨ðÍíêÙt', '1586032031.docx', 0, '2020-04-04 13:27:11', '2020-04-04 13:27:11'),
(65, 'RositaSAli', '1586032160.docx', 0, '2020-04-04 13:29:20', '2020-04-04 13:29:20'),
(66, 'Stay Home Bebas Covid-19', '1586281197.docx', 0, '2020-04-07 10:39:57', '2020-04-07 10:39:57'),
(67, '¦ö÷cÅtúT{­Üéé&quot;}Þ(ç!Æ=', '1586281287.docx', 1, '2020-04-07 10:41:28', '2020-04-07 10:41:28'),
(68, '¦ö÷cÅtúT{­Üéé&quot;}Þ(ç!Æ=', '1586281341.docx', 1, '2020-04-07 10:42:21', '2020-04-07 10:42:21'),
(69, 'Stay Home Bebas Covid-19', '1586281352.docx', 0, '2020-04-07 10:42:32', '2020-04-07 10:42:32'),
(70, 'xª¨ðÍíêÙt', '1586281398.docx', 1, '2020-04-07 10:43:18', '2020-04-07 10:43:18'),
(71, '¦ö÷cÅtúT{­Üéé&quot;}Þ(ç!Æ=', '1586281425.docx', 1, '2020-04-07 10:43:45', '2020-04-07 10:43:45'),
(72, 'Stay Home Bebas Covid-19', '1586281461.docx', 0, '2020-04-07 10:44:21', '2020-04-07 10:44:21'),
(73, 'WÞ§oó=%rG«,%ay.V¸õxw', '1586281868.docx', 1, '2020-04-07 10:51:08', '2020-04-07 10:51:08'),
(74, 'Stay Home Bebas Covid-19', '1586282214.docx', 0, '2020-04-07 10:56:54', '2020-04-07 10:56:54'),
(75, 'WÞ§oó=%rG«,%ay.V¸õxw', '1586282260.docx', 1, '2020-04-07 10:57:40', '2020-04-07 10:57:40'),
(76, 'WÞ§oó=%rG«,%ay.V¸õxw', '1586283349.docx', 1, '2020-04-07 11:15:49', '2020-04-07 11:15:49'),
(77, 'xª¨ðÍíêÙt', '1586284615.docx', 1, '2020-04-07 11:36:55', '2020-04-07 11:36:55'),
(78, 'WÞ§oó=%rG«,%ay.V¸õxw', '1586284760.docx', 1, '2020-04-07 11:39:20', '2020-04-07 11:39:20'),
(79, 'xª¨ðÍíêÙt', '1586284969.docx', 1, '2020-04-07 11:42:49', '2020-04-07 11:42:49'),
(80, 'WÞ§oó=%rG«,%ay.V¸õxw', '1586285004.docx', 1, '2020-04-07 11:43:24', '2020-04-07 11:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost', NULL, '$2y$10$EpbIbI1T.Ma/WtFCGXuDmel35iFN.Rbm.1ZenGwR/LzEXS0HrgRy2', NULL, '2020-03-29 16:24:53', '2020-03-29 16:24:54'),
(2, 'billy', 'billy@gmail.com', NULL, '$2y$10$Kt3t5AIihRfahRaFnWadtOad42aRJoudY.b4hZD0uF.IiAFGohC2G', NULL, '2020-03-31 00:56:44', '2020-03-31 01:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decrypted_file`
--
ALTER TABLE `decrypted_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decrypted_file_uploaded_file_id_foreign` (`uploaded_file_id`);

--
-- Indexes for table `encrypted_file`
--
ALTER TABLE `encrypted_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encrypted_file_uploaded_file_id_foreign` (`uploaded_file_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decrypted_file`
--
ALTER TABLE `decrypted_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `encrypted_file`
--
ALTER TABLE `encrypted_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `decrypted_file`
--
ALTER TABLE `decrypted_file`
  ADD CONSTRAINT `decrypted_file_uploaded_file_id_foreign` FOREIGN KEY (`uploaded_file_id`) REFERENCES `uploaded_file` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `encrypted_file`
--
ALTER TABLE `encrypted_file`
  ADD CONSTRAINT `encrypted_file_uploaded_file_id_foreign` FOREIGN KEY (`uploaded_file_id`) REFERENCES `uploaded_file` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
