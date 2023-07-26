-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 07:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyleaves`
--

CREATE TABLE `applyleaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applyleaves`
--

INSERT INTO `applyleaves` (`id`, `user_id`, `leave_type_id`, `description`, `leave_from`, `leave_to`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '<p>Game season and Heading for gaming.</p>', '2022-04-09', '2022-04-29', 1, '2022-03-26 16:11:06', '2022-03-28 05:47:47'),
(3, 3, 1, '<p>Heading for championship</p>', '2022-04-02', '2022-04-30', 1, '2022-03-26 16:14:24', '2022-03-27 18:27:54'),
(4, 3, 1, 'Home controller', '2022-05-11', '2022-05-12', 1, '2022-03-26 16:35:45', '2022-05-10 13:10:08'),
(5, 3, 1, 'Emmergency Issues', '2022-05-14', '2022-05-28', 1, '2022-03-26 16:43:14', '2022-05-10 13:09:07'),
(6, 3, 2, 'Berlin scholarship and workshop', '2022-05-10', '2022-05-30', 1, '2022-03-28 03:03:29', '2022-05-05 17:15:09'),
(7, 4, 1, 'Maternity leave for delivery !', '2022-04-09', '2022-05-06', 1, '2022-03-28 11:54:18', '2022-04-02 09:50:25'),
(9, 5, 2, 'Recently I got scholarship and I feel its my right time to make it happen.I will be off for 3years for my postgraduate degree', '2022-05-12', '2022-05-20', 0, '2022-03-29 06:10:29', '2022-05-10 13:32:31'),
(10, 5, 2, 'For three good 1 year of studying to improve my specialization in the area am holding right now.', '2022-05-01', '2023-04-03', 1, '2022-04-02 04:00:14', '2022-04-30 16:41:25'),
(11, 5, 1, 'Having an emergency home and wish to be given two days to sort it out', '2022-05-30', '2022-05-28', 2, '2022-04-02 04:01:40', '2022-05-10 14:11:45'),
(12, 5, 2, 'Allowed on condition', '2022-05-11', '2022-05-28', 0, '2022-04-02 07:27:39', '2022-05-10 13:11:11'),
(13, 5, 2, '<p>aasedwcusioj</p>', '2022-04-30', '2022-04-28', 0, '2022-04-02 08:50:46', '2022-04-02 08:50:46'),
(14, 4, 3, '<p>My wife has delivered today and am applying for paternity right leave.</p>', '2022-04-19', '2022-05-02', 0, '2022-04-18 05:18:16', '2022-04-18 05:18:16'),
(17, 6, 5, 'sgjsksks', '2022-04-30', '2022-05-07', 0, '2022-04-29 16:40:45', '2022-04-29 16:40:45'),
(18, 11, 2, 'Study', '2022-05-10', '2022-05-30', 2, '2022-05-03 07:19:43', '2022-05-03 07:22:14'),
(20, 9, 5, 'I will be having my wedding this September. And fundraising at the same month. During the summer season.', '2022-09-10', '2022-09-20', 0, '2022-05-07 19:14:27', '2022-05-10 09:58:22'),
(21, 9, 2, 'study in Australia to improve my career for a period of six months. Thank you', '2022-05-20', '2022-05-30', 1, '2022-05-07 19:16:08', '2022-05-10 14:16:50'),
(23, 4, 4, 'I need 2 months to take care of my wife who has delivered today. I will attach a document to ensure smoothh running is well taken care of.', '2022-05-15', '2022-07-15', 2, '2022-05-10 10:56:43', '2022-05-10 11:00:52'),
(24, 4, 4, 'I would like to get started with the institution sponsorship on my studies and research to increase the performance of my career. Also, I wanna ensure that my wife gets enough care  during her lactating period.', '2022-05-20', '2022-07-20', 0, '2022-05-10 11:03:21', '2022-05-10 11:03:21'),
(25, 9, 5, 'I have a conference in the United States for a period of a week. And I would like to be considered for this leave. I look forward to hearing from you. Thank you for your consideration.', '2022-05-30', '2022-06-13', 0, '2022-05-10 14:56:11', '2022-05-10 15:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `navbar_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `navbar_status`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Maternity Leave', 'maternity for gaming', '<blockquote>ajdakml;/</blockquote>', '1648323941.jpg', 'axsadsgfh', 'xdefrgfgh', 'DWFETRHSDZ', 0, 1, 3, '2022-03-26 16:45:41', '2022-03-26 16:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dpname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dpname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aeroneuticals', 1, NULL, '2022-05-10 11:08:11'),
(2, 'ICT', 1, NULL, '2022-05-10 10:07:35'),
(3, 'Geography', 0, '2022-03-28 06:08:32', '2022-05-10 10:07:22'),
(4, 'Agricultural', 1, '2022-04-30 13:28:30', '2022-05-10 16:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE `leavetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`id`, `leave_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maternity Leave', 1, NULL, '2022-05-10 16:27:24'),
(2, 'Study', 1, NULL, '2022-05-03 06:32:50'),
(3, 'Paternity', 1, '2022-04-18 05:08:38', '2022-05-03 06:33:10'),
(4, 'Sabbatical', 0, '2022-04-28 14:57:47', '2022-05-10 10:20:03'),
(5, 'Special', 0, '2022-04-28 15:12:45', '2022-05-03 07:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2022_03_12_113222_create_departments_table', 1),
(15, '2022_03_17_081803_add_role_as_to_users_table', 1),
(16, '2022_03_17_192626_create_categories_table', 1),
(17, '2022_03_19_082808_create_leavetypes_table', 1),
(18, '2022_03_25_071158_add_department_id_to_users_table', 1),
(19, '2022_03_25_130534_add_department_id_to_users_table', 2),
(20, '2022_03_25_191352_create_applyleaves_table', 3),
(21, '2022_03_25_194511_add_user_id_to_applyleaves_table', 4),
(22, '2022_03_25_195043_add_leave_type_id_to_applyleaves_table', 5),
(23, '2022_04_02_094646_add_applied_by_to_applyleaves_table', 6),
(24, '2022_04_18_082459_create_products_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(8, 'App\\Models\\User', 3, 'leaveLogin', '5d18b8f16ad25f3fadc4a09fccaa86b6943220010c37a2ce5e1463ff7c9d2bae', '[\"*\"]', NULL, '2022-04-23 06:58:08', '2022-04-23 06:58:08'),
(9, 'App\\Models\\User', 3, 'leaveLogin', 'bf8fc50c93e7edc6708b7fd7f650911ee184b1048e81f0c36f21a3ce3c6eb2df', '[\"*\"]', '2022-05-10 11:08:16', '2022-05-04 15:16:17', '2022-05-10 11:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'pain', 'gaming', 'allowed', 'by', '2022-04-18 07:55:50', '2022-04-18 11:00:35'),
(2, 'Kimbo', NULL, '200', 'Kilograms', '2022-04-18 08:08:38', '2022-04-18 08:08:38'),
(4, 'Toilex', 'New Look', '200', 'grams', '2022-04-20 18:26:22', '2022-05-04 15:30:51'),
(5, 'Ps4', 'Gaming Device', '35000', 'kgs', '2022-05-04 15:18:22', '2022-05-04 15:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `gender`, `phone`, `email`, `department_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(3, 'Faith', 'Tracey', 'Female', '26243200', 'loyal@gmail.com', 2, NULL, '$2y$10$i4v32FOIDmRaKsVApkDoDexrCfZmBZdrswpabdySfM/J06osZOHSS', NULL, '2022-03-25 16:10:11', '2022-04-30 08:34:48', 1),
(4, 'Rony', 'Ryan', 'Male', '999999', 'rony@gmail.com', 2, NULL, '$2y$10$n11y5NJ5HgcQByqfAjduhOpSIXcTP3BIPnFx9PaR7k1bMaaicVfRi', NULL, '2022-03-28 05:44:23', '2022-04-30 16:47:33', 0),
(5, 'Putin', 'Donald', 'Male', '102030', 'putin@gmail.com', 3, NULL, '$2y$10$phGKJE42gDQBroD2rpZ5.eRQFlGAs7sFVfM1nCmuMjyh2Dvqn7pE6', NULL, '2022-03-29 05:47:10', '2022-05-05 08:20:45', 0),
(6, 'Rebecca', 'Isack', 'Female', '228228', 'rony1@gmail.com', 2, NULL, '$2y$10$GRtuA4KTjK8hojQrjHwbvulD35isbOfM6d7RAccNi0g5PfBeCUGJ2', NULL, '2022-04-20 18:14:20', '2022-05-10 12:40:57', 0),
(7, 'Barack', 'Obama', 'Male', '228228', 'obama@gmail.com', 2, NULL, '$2y$10$1bm.SuZKSJfs/PdRKg1K9OufiOjStOyhStz7wKxMwjz/73twlYJiu', NULL, '2022-04-20 18:16:33', '2022-05-10 12:40:07', 0),
(8, 'Sylvian', 'Willies', 'Female', '222222', 'sylvian@gmail.com', 3, NULL, '$2y$10$nR13XPJubykLKzFKn7bPYOsaLAAwgWa9CD1RdFN2nCKWxw5QIgHY6', NULL, '2022-04-21 02:35:05', '2022-04-21 02:35:05', 0),
(9, 'Doris', 'Willies', 'Female', '222222', 'doris@gmail.com', 3, NULL, '$2y$10$FMLutdF2vFB9q.yt22tkcupMs2FwqynBaAOsY9kJP7Gxghb4PIv9m', NULL, '2022-04-21 05:07:58', '2022-04-30 08:44:10', 0),
(11, 'Alicia', 'Williams', 'Female', '262432', 'alicia@gmail.com', 1, NULL, '$2y$10$ECpCsjsyzdW/RgCA6lNpKOERyBHUncCmp.mr52vxhpZNEnu/LkSiC', NULL, '2022-05-03 07:11:41', '2022-05-03 07:17:31', 0),
(23, 'William', 'Rutto', 'Male', '222222222', 'ruto@gmail.com', 2, NULL, '$2y$10$xkb/XmiX6rxQwFhGiSx7BuMpULb2HtNMYRb8uUU5GGe7To0dvmh4W', NULL, '2022-05-04 13:15:29', '2022-05-05 08:24:11', 0),
(35, 'Mucheru', 'Sakaja', 'Male', '999999', 'sakaja@test.com', 2, '2022-05-07 21:10:21', '$2y$10$AYOcCLd78Y4nZ5Qo2y8fceu/N.hfKdnPtzr1nKNcp3YjUQmcqnKdm', 'BvtP1ji12qusSUE60a7cHVeO5M2m5tadibchMzPWBmZfEP7YhUFcn0icEQLC', '2022-05-07 20:55:33', '2022-05-10 16:23:53', 0),
(36, 'William', 'kim', 'Male', '2623825', 'user@test.com', 2, NULL, '$2y$10$utL.44mo8xZxQNXulr/RmOLeJWntPWALsw3KvUmJl8MPAhrEF53wC', NULL, '2022-05-10 15:47:40', '2022-05-10 15:47:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyleaves`
--
ALTER TABLE `applyleaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `applyleaves`
--
ALTER TABLE `applyleaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leavetypes`
--
ALTER TABLE `leavetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
