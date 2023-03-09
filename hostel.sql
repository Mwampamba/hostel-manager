-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 09:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `student_id`, `room_id`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-02-17', '2023-02-20', '2023-02-17 17:17:11', '2023-02-17 17:17:11'),
(2, 2, 2, '2023-03-01', '2023-06-30', '2023-02-18 03:27:48', '2023-02-18 03:27:48'),
(3, 10, 2, '2023-02-18', '2023-02-20', '2023-02-18 13:43:50', '2023-02-18 13:43:50'),
(4, 10, 2, '2023-02-18', '2023-02-20', '2023-02-18 13:44:40', '2023-02-18 13:44:40'),
(5, 11, 3, '2023-02-18', '2023-02-18', '2023-02-18 13:45:52', '2023-02-18 13:45:52'),
(6, 11, 4, '2023-02-28', '2023-02-24', '2023-02-18 13:47:35', '2023-02-18 13:47:35'),
(7, 11, 4, '2023-02-23', '2023-02-20', '2023-02-18 13:49:26', '2023-02-18 13:49:26'),
(8, 11, 4, '2023-02-21', '2023-02-28', '2023-02-18 13:51:40', '2023-02-18 13:51:40'),
(9, 12, 4, '2023-02-17', '2023-02-24', '2023-02-18 14:04:26', '2023-02-18 14:04:26'),
(10, 12, 1, '2023-02-16', '2023-02-18', '2023-02-18 14:23:35', '2023-02-18 14:23:35'),
(11, 11, 3, '2023-02-23', '2023-02-18', '2023-02-18 14:24:07', '2023-02-18 14:24:07'),
(12, 12, 2, '2023-02-17', '2023-02-17', '2023-02-18 15:17:29', '2023-02-18 15:17:29'),
(13, 13, 3, '2023-02-17', '2023-02-20', '2023-02-18 16:04:45', '2023-02-18 16:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dormitories`
--

INSERT INTO `dormitories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Block One - Femaile ', 'This is a block one dormitory', '2023-02-15 19:16:39', '2023-02-15 18:49:17'),
(2, 'Block Two - Female', 'This is a block two dormitory', '2023-02-15 19:16:39', '2023-02-15 18:49:30'),
(3, 'Block three - Male', 'This is a block three dormitory', '2023-02-15 17:49:18', '2023-02-15 18:55:56'),
(4, 'Block four - Male', 'This is a block four dormitory', '2023-02-15 17:50:07', '2023-02-15 18:55:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_02_15_185525_create_domitories_table', 1),
(4, '2023_02_15_222915_create_rooms_table', 2),
(5, '2023_02_16_175947_create_room_images_table', 3),
(6, '2023_02_17_143937_create_students_table', 4),
(7, '2023_02_17_144556_create_bookings_table', 4),
(8, '2023_02_19_115426_create_payments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('paschalmachibya@yahoo.com', '8bBSlIxjZgiIuJ3Q8sih6OtTChS3AJjvPKpno3DBDwczxgHB6wm9rOtzbuABGGbW', '2023-02-17 05:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_ID` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dormitory_id` bigint(20) UNSIGNED NOT NULL,
  `price` float NOT NULL DEFAULT 100,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0==taken, 1==not taken',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `dormitory_id`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Room number 1', 1, 1, 'Room number 1', 1, '2023-02-17 10:51:10', '2023-02-17 10:51:10'),
(2, 'Room number 2', 1, 100, 'Room number 2', 1, '2023-02-17 10:51:47', '2023-02-17 10:51:47'),
(3, 'Room number 3', 1, 100, 'Room number 3', 1, '2023-02-17 10:52:45', '2023-02-17 10:52:45'),
(4, 'Room number 5', 2, 100, 'Room number 5', 1, '2023-02-17 10:55:06', '2023-02-17 10:55:06'),
(5, 'Room number 4', 2, 100, 'Room number 4', 1, '2023-02-17 10:55:50', '2023-02-17 10:55:50'),
(6, 'Room number 6', 2, 100, 'Room number 6', 1, '2023-02-18 17:23:52', '2023-02-18 17:23:52'),
(7, 'Room number 7', 4, 100, 'Room number 7', 1, '2023-02-18 17:25:24', '2023-02-18 17:25:24'),
(8, 'Room number 8', 3, 100, 'Room number 8', 1, '2023-02-18 17:26:04', '2023-02-18 17:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image_path`, `room_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/rooms/16766418701.png', 'Room number 1', '2023-02-17 10:51:10', '2023-02-17 10:51:10'),
(2, 1, 'uploads/rooms/16766418712.png', 'Room number 1', '2023-02-17 10:51:11', '2023-02-17 10:51:11'),
(3, 1, 'uploads/rooms/16766418713.png', 'Room number 1', '2023-02-17 10:51:11', '2023-02-17 10:51:11'),
(4, 2, 'uploads/rooms/16766419071.jpeg', 'Room number 2', '2023-02-17 10:51:47', '2023-02-17 10:51:47'),
(5, 2, 'uploads/rooms/16766419082.jpeg', 'Room number 2', '2023-02-17 10:51:48', '2023-02-17 10:51:48'),
(6, 2, 'uploads/rooms/16766419083.jpeg', 'Room number 2', '2023-02-17 10:51:48', '2023-02-17 10:51:48'),
(7, 3, 'uploads/rooms/16766419651.jpg', 'Room number 3', '2023-02-17 10:52:45', '2023-02-17 10:52:45'),
(8, 3, 'uploads/rooms/16766419652.jpg', 'Room number 3', '2023-02-17 10:52:45', '2023-02-17 10:52:45'),
(9, 3, 'uploads/rooms/16766419653.jpg', 'Room number 3', '2023-02-17 10:52:45', '2023-02-17 10:52:45'),
(10, 4, 'uploads/rooms/16766421071.jpg', 'Room number 5', '2023-02-17 10:55:07', '2023-02-17 10:55:07'),
(11, 4, 'uploads/rooms/16766421072.jpg', 'Room number 5', '2023-02-17 10:55:07', '2023-02-17 10:55:07'),
(12, 4, 'uploads/rooms/16766421073.jpg', 'Room number 5', '2023-02-17 10:55:07', '2023-02-17 10:55:07'),
(13, 5, 'uploads/rooms/16766421501.jpeg', 'Room number 4', '2023-02-17 10:55:50', '2023-02-17 10:55:50'),
(14, 5, 'uploads/rooms/16766421502.jpeg', 'Room number 4', '2023-02-17 10:55:50', '2023-02-17 10:55:50'),
(15, 5, 'uploads/rooms/16766421503.jpg', 'Room number 4', '2023-02-17 10:55:50', '2023-02-17 10:55:50'),
(16, 5, 'uploads/rooms/16766421504.jpg', 'Room number 4', '2023-02-17 10:55:50', '2023-02-17 10:55:50'),
(17, 6, 'uploads/rooms/16767518321.png', 'Room number 6', '2023-02-18 17:23:52', '2023-02-18 17:23:52'),
(20, 6, 'uploads/rooms/16767518324.jpeg', 'Room number 6', '2023-02-18 17:23:52', '2023-02-18 17:23:52'),
(21, 6, 'uploads/rooms/16767518861.jpg', 'Room number 6', '2023-02-18 17:24:46', '2023-02-18 17:24:46'),
(23, 7, 'uploads/rooms/16767519242.jpg', 'Room number 7', '2023-02-18 17:25:24', '2023-02-18 17:25:24'),
(24, 7, 'uploads/rooms/16767519243.jpg', 'Room number 7', '2023-02-18 17:25:24', '2023-02-18 17:25:24'),
(25, 7, 'uploads/rooms/16767519244.jpg', 'Room number 7', '2023-02-18 17:25:24', '2023-02-18 17:25:24'),
(27, 8, 'uploads/rooms/16767519652.jpg', 'Room number 8', '2023-02-18 17:26:05', '2023-02-18 17:26:05'),
(28, 8, 'uploads/rooms/16767519653.jpg', 'Room number 8', '2023-02-18 17:26:05', '2023-02-18 17:26:05'),
(29, 8, 'uploads/rooms/16767519654.jpeg', 'Room number 8', '2023-02-18 17:26:05', '2023-02-18 17:26:05'),
(30, 8, 'uploads/rooms/16767519655.png', 'Room number 8', '2023-02-18 17:26:05', '2023-02-18 17:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `programme` varchar(255) NOT NULL,
  `collage` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `sex`, `programme`, `collage`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Nehemiah Balozi', '0789087656', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth Year', '2023-02-17 15:38:05', '2023-02-17 15:38:05'),
(2, 'Redemptor Peter', '0689087756', 'Female', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth Year', '2023-02-17 15:38:05', '2023-02-17 15:38:05'),
(3, 'Peter Mkomange', '0789097756', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Third Year', '2023-02-17 15:38:05', '2023-02-17 15:38:05'),
(4, 'Fataki Stephano', '0789456732', 'Male', 'BSc. in Business Administration', 'CoBA', 'Second year', '2023-02-18 10:17:18', '2023-02-18 10:17:18'),
(6, 'Irene Siame', '0687546464', 'Female', 'BSc. in Business Administration', 'CoBA', 'Third year', '2023-02-18 10:22:32', '2023-02-18 10:22:32'),
(7, 'Paul Ernest', '0654321567', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Third year', '2023-02-18 10:25:40', '2023-02-18 10:25:40'),
(8, 'Olivia Swai', '0656098765', 'Female', 'BSc. in Business Administration', 'CoBA', 'Third year', '2023-02-18 13:08:06', '2023-02-18 13:08:06'),
(9, 'Okechi Kelvin', '0765457898', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth year', '2023-02-18 13:20:23', '2023-02-18 13:20:23'),
(10, 'Emmanuel Mhagama', '0765345467', 'Male', 'BSc. in Business Administration', 'CoBA', 'Third year', '2023-02-18 13:37:02', '2023-02-18 13:37:02'),
(11, 'Pascal Machibya', '0786575765', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth year', '2023-02-18 13:45:32', '2023-02-18 13:45:32'),
(12, 'Jennipher Siriwa', '0789345467', 'Female', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth year', '2023-02-18 14:03:47', '2023-02-18 14:03:47'),
(13, 'Gift Mtalemwa', '0798646464', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Third year', '2023-02-18 16:02:54', '2023-02-18 16:02:54'),
(14, 'Abdulazak Ismail', '0657890987', 'Male', 'BSc. in Computer Engineering and IT', 'CoET', 'Fourth year', '2023-02-19 07:28:19', '2023-02-19 07:28:19'),
(15, 'Sabina Mushi', '0786543321', 'Female', 'BSc. in Computer Engineering and IT', 'CoET', 'Third year', '2023-02-19 16:22:25', '2023-02-19 16:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Beno Mwampamba', 'bennomwampamba@gmail.com', 0, '$2y$10$U7iWj/W2fBRJDtPz4sM.XeaE6VgMgVtQNj7ObCI3QW3sQKW88sIeK', '1676564752.jpg', '2023-02-16 12:25:08', '2023-02-16 13:35:22'),
(3, 'Pascal Machibya', 'paschalmachibya@yahoo.com', 0, '$2y$10$CWiJQ4GWJ6BW2VtrVIlcSe5SNeOzIJQpm89oI2oX9RY3v.rZJDgJO', '1676621136.jpeg', '2023-02-17 05:05:41', '2023-02-17 05:05:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_student_id_foreign` (`student_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `dormitories`
--
ALTER TABLE `dormitories`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_dormitory_id_foreign` (`dormitory_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_dormitory_id_foreign` FOREIGN KEY (`dormitory_id`) REFERENCES `dormitories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
