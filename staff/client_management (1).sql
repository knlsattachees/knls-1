-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 11:09 PM
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
-- Database: `client_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_ins`
--

CREATE TABLE `check_ins` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `check_in_time` datetime DEFAULT current_timestamp(),
  `check_out_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `check_ins`
--

INSERT INTO `check_ins` (`id`, `client_name`, `check_in_time`, `check_out_time`) VALUES
(1, NULL, '2024-06-14 17:50:08', '2024-06-14 17:50:17'),
(2, 'winner', '2024-06-14 18:09:40', '2024-06-14 18:09:46'),
(3, 'kip', '2024-06-18 10:56:45', NULL),
(4, 'kip', '2024-06-18 10:57:27', NULL),
(5, 'kip', '2024-06-18 10:57:43', NULL),
(6, 'kip', '2024-06-18 11:00:55', NULL),
(7, 'kip', '2024-06-18 11:02:06', NULL),
(8, 'kip', '2024-06-18 11:02:14', '2024-06-18 11:06:10'),
(9, 'kip', '2024-06-18 14:13:23', '2024-06-18 14:13:32'),
(10, 'kip', '2024-06-19 16:15:28', '2024-06-19 16:15:36'),
(11, 'fff', '2024-06-20 17:26:25', NULL),
(12, 'winner', '2024-06-20 18:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `id_no` varchar(50) DEFAULT NULL,
  `date_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone_no`, `id_no`, `date_stamp`, `address`, `check_in`, `check_out`) VALUES
(3, 'winner', NULL, '098765432', '5432679', '2024-06-15 01:09:31', NULL, NULL, NULL),
(4, 'pov', NULL, '0767854566', '12345678', '2024-06-15 19:46:26', NULL, NULL, NULL),
(5, 'kip', NULL, '0987654', '45067867', '2024-06-15 23:38:05', NULL, NULL, NULL),
(6, 'fff', NULL, '0986', '6798767', '2024-06-20 00:02:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires_at`) VALUES
(1, 'poppixieempire@gmail.com', 'f1ffc6b3e0fec86083d3fccd8557cf9a1646e0e28181eb900241a8962654e7eaccf775a1dfa348b7a9ef1f5ff83903635d8b', '2024-06-21 18:17:35'),
(2, 'poppixieempire@gmail.com', '3a3ff3e5a7da18f90558a11e999642ccdbeb7f42f41d2c783c4f4ee30cc70947c22a89447059ff2dc841ee29cb309342cfea', '2024-06-21 18:21:14'),
(3, 'poppixieempire@gmail.com', '6c476066a076fa7f0f4fa46d6e821cd032524fe9cf7896d12fd40a2b2cd69f8b361fd70b9a13e97d29e3645dd2e2f93d18a0', '2024-06-21 18:26:41'),
(4, 'poppixieempire@gmail.com', '0c6655ef49a42eca0a975d1c606f241b738592decc6ef984ce3e5c12c216a61f86eccdffd3bfec5312e21352ca97c8028edf', '2024-06-21 18:45:53'),
(5, 'poppixieempire@gmail.com', '9767fa880b2c54127860d8ac7211314333089ec8f706f6fdaf527d63f47a5b5cebdd57485a1d02ceceff8231d828f8b806ab', '2024-06-21 19:57:42'),
(6, 'poppixieempire@gmail.com', 'e78e36319c96ad7b474c6fa2f41d9b855540c1156c66c5ddf0989449507536178eb6756773bec97a3353599ac3828a2b7d77', '2024-06-21 20:26:38'),
(7, 'pogba1762@gmail.com', 'bb6acbca94a9f35c47274514afa2b96617ad8c0ac9fc235ae0e0f042482e4182e5cad031c2926df9c460be84850efda514dc', '2024-06-21 20:28:32'),
(8, 'pogba1762@gmail.com', 'b8ffdaa7fc4668ed56509c9e83b1fd0fd95f8a5dd5f5d32cc0ac8a5986699641919dc8518a7776377eda4a2bc5d0e2558240', '2024-06-21 20:34:54'),
(9, 'pogba1762@gmail.com', '870a6164c1e90bb486f83b0f8af4ac8ed5735d35d2d9348fe3ba6b0b443adb6ed44cac2816124b9fdaf9c21106dcabc824e0', '2024-06-21 20:35:36'),
(10, 'pogba1762@gmail.com', 'b14624368cd615e390a35d439534b7347cf066dad69812b49f42737a24c64a17998cdd7902340001be84352b354a69a758a8', '2024-06-21 20:37:37'),
(11, 'pogba1762@gmail.com', '79f96a363209bec2a52eab9e861faf15639a430cece198a2bce2bf4be11fe814a1884eb2d1fce71709fcdc5e8a3b5674ecc6', '2024-06-21 20:38:54'),
(12, 'pogba1762@gmail.com', 'f003bb3f77ae2afad34c0eb662803d93e496b4ded3070d92ae9aa8592c21669df41a981b6487d8ce58c57e059cde61b0587d', '2024-06-21 20:40:12'),
(13, 'pogba1762@gmail.com', 'dc8a9e43f11697139cd31643e71a686327ca535f3e103e2fdac7c1afd64dcfcd0d766fb6c4dd0b5b85106017cfd73730e242', '2024-06-21 20:41:25'),
(14, 'pogba1762@gmail.com', '3fabbeefb88ff995c3349d5c7537d532297098f0728e0c6254d30d3ee3bd65cfba79e6c1ea732d53c94547c35051f8b83855', '2024-06-21 20:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'cele', '', '$2y$10$qXEg.r3d4rCphDoRIrSVNOfHA9O0Y4iNOwFsutgQSpYPF.8akF8s6', 'user'),
(4, 'poze', '', '$2y$10$JOp4kFTbVqnGjhQsYEK./eBpWHa3gCN7cryFQQiGuGUJD.hxgEKCu', 'admin'),
(8, 'william', 'pogba1762@gmail.com', '$2y$10$HX1B5YmnAFgF61P1Z37DSOak8VpzfZthp7Q9DqleknL5Xh5tFIvVe', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_name` (`client_name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_ins`
--
ALTER TABLE `check_ins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD CONSTRAINT `check_ins_ibfk_1` FOREIGN KEY (`client_name`) REFERENCES `clients` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
