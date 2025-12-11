-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 04:01 PM
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
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harsh Tilala', 'ht@gmail.com', '$2y$12$XF8MOt10AY69l2ojxmiyAe0cGBJ.nY1xVF..fngDhRr05puUbozUK', NULL, '2025-10-21 05:41:48', '2025-10-21 05:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `total_tickets` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','completed','failed','refunded') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `contact`, `event_id`, `total_tickets`, `price`, `payment_status`, `created_at`, `updated_at`) VALUES
(3, 'num_tickets', 'num_tickets@gami.com', '123123123', 4, NULL, 135.00, NULL, '2025-11-23 08:15:51', '2025-11-23 08:15:51'),
(4, 'num_tickets', 'num_tickets@gami.com', '123123123', 4, NULL, 135.00, NULL, '2025-11-23 08:16:51', '2025-11-23 08:16:51'),
(5, 'abc', 'abc@gmail.com', '123123123', 4, NULL, 180.00, NULL, '2025-11-23 08:27:44', '2025-11-23 08:27:44'),
(6, 'ht', 'ht@gmail.com', '123123123', 4, NULL, 225.00, NULL, '2025-11-23 11:29:13', '2025-11-23 11:29:13'),
(7, 'ht', 'ht@gamil.com', '123123123', 4, NULL, 450.00, NULL, '2025-11-23 11:32:52', '2025-11-23 11:32:52'),
(8, 'qw', 'qw@gmail.com', '1231231233', 4, NULL, 450.00, NULL, '2025-11-23 11:33:21', '2025-11-23 11:33:21'),
(9, 'ert', 'wet@gmail.com', '123123123', 4, NULL, 450.00, NULL, '2025-11-23 11:33:35', '2025-11-23 11:33:35'),
(10, 'ht', 'qw@gmail.com', '1231231231', 4, NULL, 450.00, NULL, '2025-11-23 11:33:53', '2025-11-23 11:33:53'),
(11, 'ert', 'ert@gmail.com', '872435325', 4, NULL, 450.00, NULL, '2025-11-23 11:35:05', '2025-11-23 11:35:05'),
(12, 'abc@gmail.com', 'abc@gmail.com', '5454545466', 4, NULL, 45.00, NULL, '2025-11-23 11:48:02', '2025-11-23 11:48:02'),
(13, 'abc@gmail.com', 'abc@gmail.com', '1312312312', 4, NULL, 45.00, NULL, '2025-11-23 11:48:44', '2025-11-23 11:48:44'),
(14, 'harsh tilala', 'tilala@gmail.com', '8374829384', 5, NULL, 3450.00, NULL, '2025-11-30 04:24:10', '2025-11-30 04:24:10'),
(15, 'harsh', 'harsh@gmail.com', '8273893849', 6, NULL, 24240.00, NULL, '2025-11-30 04:32:04', '2025-11-30 04:32:04'),
(16, 'gr@gmail.com', 'gr@gmail.com', '3253223423', 6, NULL, 24240.00, NULL, '2025-11-30 04:32:40', '2025-11-30 04:32:40'),
(17, 'ht', 'ht@gmail.com', '3532434234', 6, NULL, 7272.00, NULL, '2025-11-30 05:41:42', '2025-11-30 05:41:42'),
(18, 'ht', 'ht@gmail.com', '3532434234', 6, NULL, 7272.00, NULL, '2025-11-30 05:46:05', '2025-11-30 05:46:05'),
(19, 'ht', 'ht@gmail.com', '3532434234', 6, NULL, 7272.00, NULL, '2025-11-30 05:47:44', '2025-11-30 05:47:44'),
(20, 'harsh', 'harsh@gmial.com', '2342342342', 6, NULL, 4848.00, NULL, '2025-11-30 06:00:38', '2025-11-30 06:00:38'),
(21, 'ht', 'ht@gmail.com', '3234234234', 6, NULL, 4848.00, NULL, '2025-11-30 06:06:07', '2025-11-30 06:06:07'),
(22, 'abc', 'abc@gmail.com', '9874382978', 6, NULL, 16968.00, NULL, '2025-12-05 00:18:47', '2025-12-05 00:18:47'),
(23, 'harsh', 'harsh@gmail.com', '8374912934', 6, NULL, 19392.00, NULL, '2025-12-07 04:36:35', '2025-12-07 04:36:35'),
(24, 'harsh', 'harsh@gmail.com', '8374912934', 6, NULL, 2424.00, NULL, '2025-12-07 04:39:05', '2025-12-07 04:39:05'),
(25, 'ht', 'ht@gmail.com', '3848559595', 6, NULL, 2424.00, NULL, '2025-12-07 04:39:57', '2025-12-07 04:39:57'),
(26, 'ht', 'ht@gmail.com', '2948230948', 6, '1', 2424.00, NULL, '2025-12-07 04:43:23', '2025-12-07 04:43:23'),
(27, 'dhdh@gmail.com', 'dhdh@gmail.com', '34234242342342', 6, '2', 4848.00, NULL, '2025-12-07 06:10:08', '2025-12-07 06:10:08'),
(28, 'ewwe', 'ewfe@gmail.com', '83749172933', 6, '10', 24240.00, NULL, '2025-12-10 11:14:40', '2025-12-10 11:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `display_order`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(7, 2429, 'ht', 'ht', 'ht', '1760616876_68f0e1ac6faf9.png', '2025-10-16 02:36:49', '2025-11-15 02:02:59'),
(11, 3, 'Music & Food Festivals', 'music-food-festivals', 'Beats, Bites, and Vibes', '1761389627_68fcac3b7ea71.png', '2025-10-25 05:23:47', '2025-10-25 05:23:47'),
(13, 4, 'School & College Fests', 'school-college-fests', 'Celebrate Youthful Creativity', '1761390566_68fcafe67e287.jpg', '2025-10-25 05:39:26', '2025-10-25 05:39:26'),
(14, 5, 'New Year Celebrations', 'new-year-celebrations', 'New year, new vibes, same amazing energy!', '1761390616_68fcb0180bd3e.png', '2025-10-25 05:40:16', '2025-10-25 05:40:16'),
(15, 6, 'Sports Events', 'sports-events', 'Play, compete, celebrate, and win', '1761391231_68fcb27f61a47.png', '2025-10-25 05:50:31', '2025-10-25 05:50:31'),
(16, 7, 'Holi Events', 'holi-events', 'Festival Of Colors', '1761391429_68fcb345c7142.jpg', '2025-10-25 05:53:49', '2025-10-25 05:53:49'),
(17, 8, 'Navratri Events', 'navratri-events', 'Turning Moments into Memories!', '1761391763_68fcb4930a67d.jpg', '2025-10-25 05:59:23', '2025-10-25 05:59:23'),
(20, 34, 'ht', 'ht', 'erter', NULL, '2025-12-10 11:08:14', '2025-12-10 11:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(233) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` bigint(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `num_tickets` int(11) NOT NULL DEFAULT 0,
  `available_tickets` int(244) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `slug`, `sub_title`, `description`, `category_id`, `location`, `price`, `status`, `num_tickets`, `available_tickets`, `start_date`, `end_date`, `image`, `created_at`, `updated_at`) VALUES
(4, 'AA', 'aa', 'aa', 'aaaaaz', 17, 'aa', 45, 1, 34, 34, '2025-10-08 16:42:00', '2025-11-02 16:42:00', '\"[\\\"1763480525_691c93cda5bca.jpg\\\",\\\"1763480525_691c93cda69c2.jpg\\\",\\\"1763480525_691c93cda7696.jpg\\\",\\\"1763480525_691c93cda84da.jpg\\\",\\\"1763480525_691c93cda92dd.jpg\\\",\\\"1763480525_691c93cdaa1d6.jpg\\\",\\\"1763480525_691c93cdaaf85.jpg\\\",\\\"1763480525_691c93cdabb56.jpg\\\"]\"', '2025-11-02 05:43:04', '2025-11-30 00:34:43'),
(5, 'hd', 'hd', 'hd', 'happy \r\nholi', 17, 'rajkot', 345, 1, 530, 520, '2025-11-04 10:13:00', '2025-11-09 10:13:00', '\"[\\\"1762663485_69101c3d2bc28.png\\\",\\\"1763192832_69183000832a0.jpg\\\"]\"', '2025-11-08 23:13:47', '2025-11-30 04:24:10'),
(6, 'ddd', 'ddd', 'dddd', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passag', 17, 'dddd', 2424, 1, 30, 17, '2025-11-15 11:15:00', '2025-11-21 11:15:00', '\"[\\\"1763185548_6918138c70bfa.jpg\\\",\\\"1763224532_6918abd45f2be.jpg\\\",\\\"1763224532_6918abd46010d.jpg\\\",\\\"1763224532_6918abd460acc.jpg\\\",\\\"1763224532_6918abd4617a7.jpg\\\"]\"', '2025-11-15 00:15:48', '2025-12-10 11:14:40'),
(7, 'zzzzzzzz', 'zzzzzzzz', 'zzzz', 'zzzzzz', 17, 'zzz', 4545, 1, 544, 544, '2025-11-19 13:31:00', '2025-11-26 13:32:00', '\"[\\\"1763193738_6918338a70141.jpg\\\",\\\"1763193738_6918338a70a3f.jpg\\\",\\\"1763193738_6918338a71283.jpg\\\"]\"', '2025-11-15 02:32:18', '2025-11-30 00:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `total_person` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `contact`, `event_type`, `event_name`, `start_date`, `end_date`, `location`, `total_person`, `message`, `created_at`, `updated_at`) VALUES
(1, 'harsh', 'harshtilala2429@gmail.com', '8347917293', 'Birthday Celebration', 'HT Event', '2005-01-24', '2005-01-24', 'Rajkot', 24, 'Hii my name is harsh and i celebratie this event on this location', NULL, NULL),
(2, 'ht', 'harshtilala010@gmail.com', '(435) 435-435', 'corporate', 'regerg', '2025-11-09', '2025-11-20', 'ergerg', 45, 'trrth', '2025-11-09 01:16:34', '2025-11-09 01:16:34'),
(3, 'Ht', 'harshtilala010@gmail.com', '(345) 435-3443', 'corporate', 'rgergerg', '2025-11-09', '2025-11-19', 'ht', 44, 'rgergergr', '2025-11-09 01:30:25', '2025-11-09 01:30:25'),
(4, 'Ht', 'harshtilala010@gmail.com', '(464) 334-5', 'Conference', 'ht', '2025-11-14', '2025-11-18', 'ht', 343, 'rthrthrth', '2025-11-14 01:20:25', '2025-11-14 01:20:25'),
(5, 'abcdddd', 'ht@gmail.com', '3434534534', 'Corporate Event', 'rgegerg', '2025-11-14', '2025-11-25', 'rj', 453, 'thrthrth', '2025-11-14 01:26:43', '2025-11-14 01:26:43'),
(6, 'abcdddd', 'ht@gmail.com', '3434534534', 'Corporate Event', 'rgegerg', '2025-11-14', '2025-11-25', 'rj', 453, 'thrthrth', '2025-11-14 01:29:31', '2025-11-14 01:29:31'),
(7, 'ttt', 'ttt@gmail.com', '9999999999', 'Birthday Celebration', 'ttttttt', '2025-11-15', '2025-11-15', 'tttt', 34, 'tttt', '2025-11-15 02:43:58', '2025-11-15 02:43:58'),
(8, 'harsh', 'harshtilala010@gmail.com', '2342342355', 'Sports Events', 'navratri', '2025-12-14', '2025-12-14', 'rajkot', 150, 'i elebrate navratiri with people wo plave and win gifts', '2025-12-07 04:34:34', '2025-12-07 04:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_09_06_151617_create_sliders_table', 2),
(13, '2025_09_28_115527_create_categories_table', 3),
(14, '2025_10_16_120235_create_event_inquiries_table', 4),
(15, '2025_10_17_111243_create__event_table', 5),
(16, '2025_10_20_063921_create_admins_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gfaAz7AEwjwr638tM4Hf050VnaCxMKcouToS6WFx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUh5RU5iQmFucEpSZXF5RjBJQ0xFOVV2c21pVmtQZ1h2bzl5ZFNqaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ldmVudC1kZXRhaWwvZGRkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1765385135);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harsh Tilala', 'harshtilala2429@gmail.com', NULL, 'ht', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_event_id_foreign` (`event_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
