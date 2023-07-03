-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 02:57 PM
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
-- Database: `pt_lifestyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `for_custom_food`
--

CREATE TABLE `for_custom_food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calories` int(11) NOT NULL,
  `fatContent` int(11) NOT NULL,
  `satuatedfatContent` int(11) NOT NULL,
  `cholesterolContent` int(11) NOT NULL,
  `sodiumContent` int(11) NOT NULL,
  `carbohydrateContent` int(11) NOT NULL,
  `fiberContent` int(11) NOT NULL,
  `sugarContent` int(11) NOT NULL,
  `proteinContent` int(11) NOT NULL,
  `numberOfRecommendations` int(11) NOT NULL,
  `specifyingIngredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_custom_food`
--

INSERT INTO `for_custom_food` (`id`, `calories`, `fatContent`, `satuatedfatContent`, `cholesterolContent`, `sodiumContent`, `carbohydrateContent`, `fiberContent`, `sugarContent`, `proteinContent`, `numberOfRecommendations`, `specifyingIngredients`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1000, 70, 13, 100, 900, 155, 23, 10, 33, 5, 'apple;banana', 1, '2023-06-27 13:23:48', '2023-07-01 06:47:31'),
(2, 500, 40, 8, 200, 1600, 300, 32, 25, 30, 15, 'meat;egg', 2, '2023-06-27 13:24:54', '2023-07-01 06:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `for_diets`
--

CREATE TABLE `for_diets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_loss_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meals` int(11) NOT NULL,
  `bmi` double(8,2) NOT NULL,
  `bmi_string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmi_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmi_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmr` double(8,2) NOT NULL,
  `maintain_calories` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_diets`
--

INSERT INTO `for_diets` (`id`, `age`, `height`, `weight`, `gender`, `physical_activity`, `weight_loss_plan`, `meals`, `bmi`, `bmi_string`, `bmi_category`, `bmi_color`, `bmr`, `maintain_calories`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 35, 170, 75, 'male', 'Light exercise', 'Weight loss', 3, 25.95, '25.95 kg/m²', 'Overweight', 'Yellow', 1642.50, 2258.44, 1, '2023-06-27 13:09:40', '2023-06-27 13:21:53'),
(2, 30, 162, 56, 'female', 'Light exercise', 'Maintain weight', 3, 21.34, '21.34 kg/m²', 'Normal', 'Green', 1583.50, 2177.31, 2, '2023-06-27 13:10:07', '2023-07-02 16:25:23');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_11_000000_create_otps_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_16_161220_create_permission_tables', 1),
(7, '2023_06_20_134842_create_for_diets_table', 1),
(8, '2023_06_20_135356_create_for_custom_food_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `identifier`, `token`, `validity`, `valid`, `created_at`, `updated_at`) VALUES
(1, 'breksamhassan17@gmail.com', '571315', 60, 1, '2023-06-27 13:09:13', '2023-06-27 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'message create', 'web', NULL, NULL),
(2, 'message view', 'web', NULL, NULL),
(3, 'message edit', 'web', NULL, NULL),
(4, 'message delete', 'web', NULL, NULL),
(5, 'settings create', 'web', NULL, NULL),
(6, 'settings view', 'web', NULL, NULL),
(7, 'settings edit', 'web', NULL, NULL),
(8, 'settings delete', 'web', NULL, NULL),
(9, 'reports orders', 'web', NULL, NULL),
(10, 'reports exams', 'web', NULL, NULL),
(11, 'reports users', 'web', NULL, NULL),
(12, 'reports view', 'web', NULL, NULL),
(13, 'users create', 'web', NULL, NULL),
(14, 'users view', 'web', NULL, NULL),
(15, 'users edit', 'web', NULL, NULL),
(16, 'users delete', 'web', NULL, NULL),
(17, 'sliders create', 'web', NULL, NULL),
(18, 'sliders view', 'web', NULL, NULL),
(19, 'sliders edit', 'web', NULL, NULL),
(20, 'sliders delete', 'web', NULL, NULL),
(21, 'categories create', 'web', NULL, NULL),
(22, 'categories view', 'web', NULL, NULL),
(23, 'categories edit', 'web', NULL, NULL),
(24, 'categories delete', 'web', NULL, NULL),
(25, 'brands create', 'web', NULL, NULL),
(26, 'brands view', 'web', NULL, NULL),
(27, 'brands edit', 'web', NULL, NULL),
(28, 'brands delete', 'web', NULL, NULL),
(29, 'posts create', 'web', NULL, NULL),
(30, 'posts view', 'web', NULL, NULL),
(31, 'posts edit', 'web', NULL, NULL),
(32, 'posts delete', 'web', NULL, NULL),
(33, 'products create', 'web', NULL, NULL),
(34, 'products view', 'web', NULL, NULL),
(35, 'products edit', 'web', NULL, NULL),
(36, 'products delete', 'web', NULL, NULL),
(37, 'carts create', 'web', NULL, NULL),
(38, 'carts view', 'web', NULL, NULL),
(39, 'carts edit', 'web', NULL, NULL),
(40, 'carts delete', 'web', NULL, NULL),
(41, 'wishlist create', 'web', NULL, NULL),
(42, 'wishlist view', 'web', NULL, NULL),
(43, 'wishlist edit', 'web', NULL, NULL),
(44, 'wishlist delete', 'web', NULL, NULL),
(45, 'orders create', 'web', NULL, NULL),
(46, 'orders view', 'web', NULL, NULL),
(47, 'orders edit', 'web', NULL, NULL),
(48, 'orders delete', 'web', NULL, NULL),
(49, 'promos create', 'web', NULL, NULL),
(50, 'promos view', 'web', NULL, NULL),
(51, 'promos edit', 'web', NULL, NULL),
(52, 'promos delete', 'web', NULL, NULL),
(53, 'returning create', 'web', NULL, NULL),
(54, 'returning view', 'web', NULL, NULL),
(55, 'returning edit', 'web', NULL, NULL),
(56, 'returning delete', 'web', NULL, NULL),
(57, 'payment_method create', 'web', NULL, NULL),
(58, 'payment_method view', 'web', NULL, NULL),
(59, 'payment_method edit', 'web', NULL, NULL),
(60, 'payment_method delete', 'web', NULL, NULL),
(61, 'blogs create', 'web', NULL, NULL),
(62, 'blogs view', 'web', NULL, NULL),
(63, 'blogs edit', 'web', NULL, NULL),
(64, 'blogs delete', 'web', NULL, NULL),
(65, 'reviews create', 'web', NULL, NULL),
(66, 'reviews view', 'web', NULL, NULL),
(67, 'reviews edit', 'web', NULL, NULL),
(68, 'reviews delete', 'web', NULL, NULL),
(69, 'shipping_fees create', 'web', NULL, NULL),
(70, 'shipping_fees view', 'web', NULL, NULL),
(71, 'shipping_fees edit', 'web', NULL, NULL),
(72, 'shipping_fees delete', 'web', NULL, NULL),
(73, 'delivery_companies create', 'web', NULL, NULL),
(74, 'delivery_companies view', 'web', NULL, NULL),
(75, 'delivery_companies edit', 'web', NULL, NULL),
(76, 'delivery_companies delete', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'App\\Models\\User', 2, 'user', 'b485fadf8e55727234cdff882a2a91e8621fe5b697e7f120c8283a7acc2a0fc8', '[\"app:all\"]', NULL, '2023-06-27 13:09:13', '2023-06-27 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2023-06-27 13:07:20', '2023-06-27 13:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `gender`, `birth_date`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'PT lifeStyle', 'pt.lifestyle11@gmail.com', NULL, '$2y$10$39s4/FtmjyuPjvla0gC2huitOcSRrYjVwCA1gOOka3pN6E/UMyeca', 'female', '2000-01-01', NULL, 'super admin', NULL, '2023-06-27 13:07:29', '2023-06-27 13:07:29'),
(2, 'Breksam', 'Hassan', 'breksamhassan17@gmail.com', NULL, '$2y$10$zY5CCrcEGnICMJfs55nwEuxSQNdwzjbvm8ogHvY90R4f3G6ozB37e', 'female', NULL, NULL, 'user', NULL, '2023-06-27 13:09:12', '2023-06-27 13:09:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `for_custom_food`
--
ALTER TABLE `for_custom_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_custom_food_user_id_foreign` (`user_id`);

--
-- Indexes for table `for_diets`
--
ALTER TABLE `for_diets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_diets_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_id_index` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `for_custom_food`
--
ALTER TABLE `for_custom_food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `for_diets`
--
ALTER TABLE `for_diets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `for_custom_food`
--
ALTER TABLE `for_custom_food`
  ADD CONSTRAINT `for_custom_food_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `for_diets`
--
ALTER TABLE `for_diets`
  ADD CONSTRAINT `for_diets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
