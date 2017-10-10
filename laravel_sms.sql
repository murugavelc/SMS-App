-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 08:20 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` smallint(6) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '437d7a40a99f398a50cdb6310b03ba9089b2887f', 1, 0, '2017-04-03 13:13:09', '2017-04-03 13:13:09', NULL),
(2, 4, '2ef8352f36e334cba202144b1821986892912898', 2, 0, '2017-04-04 00:34:50', '2017-04-04 00:34:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE IF NOT EXISTS `api_logs` (
  `id` int(10) unsigned NOT NULL,
  `api_key_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_logs`
--

INSERT INTO `api_logs` (`id`, `api_key_id`, `user_id`, `route`, `method`, `params`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=asmin123', '127.0.0.1', '2017-04-03 12:59:39', '2017-04-03 12:59:39'),
(2, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:02:00', '2017-04-03 13:02:00'),
(3, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:03:37', '2017-04-03 13:03:37'),
(4, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:04:17', '2017-04-03 13:04:17'),
(5, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'username=lilly.priya%40vividinfotech.com&password=WyVLwptjfMlvU1s3', '127.0.0.1', '2017-04-03 13:09:11', '2017-04-03 13:09:11'),
(6, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=lilly.priya%40vividinfotech.com&password=WyVLwptjfMlvU1s3', '127.0.0.1', '2017-04-03 13:09:42', '2017-04-03 13:09:42'),
(7, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:10:28', '2017-04-03 13:10:28'),
(8, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:13:09', '2017-04-03 13:13:09'),
(9, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:13:47', '2017-04-03 13:13:47'),
(10, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:21:35', '2017-04-03 13:21:35'),
(11, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:34:31', '2017-04-03 13:34:31'),
(12, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:35:56', '2017-04-03 13:35:56'),
(13, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:37:03', '2017-04-03 13:37:03'),
(14, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:37:57', '2017-04-03 13:37:57'),
(15, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:39:05', '2017-04-03 13:39:05'),
(16, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:39:57', '2017-04-03 13:39:57'),
(17, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:40:59', '2017-04-03 13:40:59'),
(18, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 13:42:47', '2017-04-03 13:42:47'),
(19, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:01:30', '2017-04-03 14:01:30'),
(20, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:10:54', '2017-04-03 14:10:54'),
(21, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:11:55', '2017-04-03 14:11:55'),
(22, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:13:54', '2017-04-03 14:13:54'),
(23, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:14:10', '2017-04-03 14:14:10'),
(24, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:18:09', '2017-04-03 14:18:09'),
(25, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=', '127.0.0.1', '2017-04-03 14:18:31', '2017-04-03 14:18:31'),
(26, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:18:47', '2017-04-03 14:18:47'),
(27, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:21:17', '2017-04-03 14:21:17'),
(28, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', 'email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:21:40', '2017-04-03 14:21:40'),
(29, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:22:40', '2017-04-03 14:22:40'),
(30, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin1', '127.0.0.1', '2017-04-03 14:46:53', '2017-04-03 14:46:53'),
(31, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=ssdfd', '127.0.0.1', '2017-04-03 14:48:58', '2017-04-03 14:48:58'),
(32, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=sdfsd', '127.0.0.1', '2017-04-03 14:50:11', '2017-04-03 14:50:11'),
(33, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=cdcxvxvxc', '127.0.0.1', '2017-04-03 14:50:52', '2017-04-03 14:50:52'),
(34, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=', '127.0.0.1', '2017-04-03 14:52:40', '2017-04-03 14:52:40'),
(35, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=dssdfdsf', '127.0.0.1', '2017-04-03 14:55:20', '2017-04-03 14:55:20'),
(36, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=ddsf%40dfds.hj&password=sdsdsafs', '127.0.0.1', '2017-04-03 14:55:51', '2017-04-03 14:55:51'),
(37, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=murugavel.c%40vividinfotech.com&password=admin123', '127.0.0.1', '2017-04-03 14:56:12', '2017-04-03 14:56:12'),
(38, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=mNsz7ylbdahlaKZcN9tQU2wWQxz5ZOjEoRj6qRKj&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 14:56:31', '2017-04-03 14:56:31'),
(39, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=hTYxguYlLBeb4yIQ7uq5zxE6LwFyxiptvBgkcJOm&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 23:37:25', '2017-04-03 23:37:25'),
(40, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=hTYxguYlLBeb4yIQ7uq5zxE6LwFyxiptvBgkcJOm&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-03 23:42:44', '2017-04-03 23:42:44'),
(41, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '_token=hTYxguYlLBeb4yIQ7uq5zxE6LwFyxiptvBgkcJOm&email=admin%40gmail.com&password=admin123', '127.0.0.1', '2017-04-04 00:23:30', '2017-04-04 00:23:30'),
(42, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '', '127.0.0.1', '2017-04-04 00:34:49', '2017-04-04 00:34:49'),
(43, NULL, NULL, 'App\\Http\\Controllers\\LoginController@authenticate', 'POST', '', '127.0.0.1', '2017-04-04 00:35:41', '2017-04-04 00:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_31_132930_create_staff_details_table', 1),
('2015_03_02_031822_create_api_keys_table', 2),
('2017_04_01_055626_create_staff_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE IF NOT EXISTS `staff_details` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_join` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`id`, `user_id`, `emp_id`, `degree`, `department`, `date_of_join`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 333, 'BE', 'CSE', '2016-06-21', '2017-04-02 06:55:54', '2017-04-02 06:55:54', NULL),
(2, 3, 322, 'BE', 'CSE', '2017-02-06', '2017-04-03 00:27:17', '2017-04-03 00:27:17', NULL),
(3, 4, 123, 'BE', 'ECE', '2017-01-24', '2017-04-03 01:27:23', '2017-04-03 01:27:23', NULL),
(4, 5, 535, 'BE', 'CSE', '2017-01-09', '2017-04-03 08:49:46', '2017-04-03 08:49:46', NULL),
(5, 6, 344, 'BE', 'CSE', '2015-05-21', '2017-04-03 23:32:34', '2017-04-03 23:32:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `phone`, `profile`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$f4PhVkbjZxpdMKilF3pVH./jnGOI7Y3nOfIHUQ293v9Fg1guPUaxe', '1', '0987654321', '', '4KVd8SYcfJwsG5ozGOQdGKdZAz5G0UEQKeqZ8SqQIXCCVWO8E1J7xhS9mzfj', '2017-04-02 06:47:07', '2017-04-03 23:38:50', NULL),
(2, 'Murugavel', 'murugavel.c@vividinfotech.com', '$2y$10$Ks2TNs.Qf4H0CVITDstFlePnVKZ/FzPnluevF/xAc5svXQDrvcRr2', '2', '7200190271', '333-Murugavel.jpg', NULL, '2017-04-02 06:55:54', '2017-04-02 06:55:54', NULL),
(3, 'Sathish', 'sathishkumar.s@vividinfotech.com', '$2y$10$gGj3WjKHYBe/qYaxQ1a3Ru3FO8FVrzOSFvOfWNziw4.6./ePBIP7.', '2', '8676464563', '322-Sathish.jpg', NULL, '2017-04-03 00:27:16', '2017-04-03 00:27:16', NULL),
(4, 'Lilly', 'lilly.priya@vividinfotech.com', '$2y$10$jCjGRs.Ed/e0P9l5wRY2HOKtOA37WRyEBf1vdKbJgUmmrU3L2FyGS', '2', '8986756745', '123-Lilly.jpg', NULL, '2017-04-03 01:27:23', '2017-04-03 01:27:23', NULL),
(5, 'Sakthi', 'sakthivel.a@vividinfotech.com', '$2y$10$TAh4eaVkOlkSyfBfg50hEeg6BUuwkYG7RNya3KgVPyciwyl9SJLxq', '2', '8554845642', '535-Sakthi.jpg', NULL, '2017-04-03 08:49:46', '2017-04-03 08:49:46', NULL),
(6, 'Kabilan', 'kabilan.k@vividinfotech.com', '$2y$10$W7EghQfVKUOVsYcOu4CrVOiD/W0oVwPEVccvsFtUs1Bq8j91YK1Ya', '2', '7200190271', '344-Kabilan.jpg', NULL, '2017-04-03 23:32:33', '2017-04-03 23:32:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `api_keys_key_unique` (`key`), ADD KEY `api_keys_user_id_index` (`user_id`);

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`), ADD KEY `api_logs_api_key_id_foreign` (`api_key_id`), ADD KEY `api_logs_route_index` (`route`), ADD KEY `api_logs_method_index` (`method`), ADD KEY `api_logs_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_logs`
--
ALTER TABLE `api_logs`
ADD CONSTRAINT `api_logs_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
