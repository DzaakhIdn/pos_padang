-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 02:15 AM
-- Server version: 8.0.39-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_padang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name_category` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at_category` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `created_at_category`) VALUES
(20, 'Seafood', '2024-11-08 02:03:39'),
(21, 'kukus', '2024-11-13 23:31:05'),
(22, 'Bakar', '2024-11-14 01:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `name_item` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `attachment` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `created_at_item` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `name_item`, `attachment`, `price`, `category_id`, `created_at_item`) VALUES
(14, 'Ayam Bakar', '4068.webp', '25.000', 22, '2024-11-14 01:44:38'),
(15, 'Dimsum', '5749.webp', '20.000', 21, '2024-11-14 02:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `pivot_items_sales`
--

CREATE TABLE `pivot_items_sales` (
  `item_id_pivot` int NOT NULL,
  `sale_id_pivot` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sale` int NOT NULL,
  `name_customer` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `note` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('paid','debt') COLLATE utf8mb4_general_ci NOT NULL,
  `amout` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at_sale` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `full_name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('P','L') COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `avatar`, `gender`, `email`, `password`, `created_at_user`) VALUES
(1, 'Muhammad Iqbal Pahlevi', '5153.jpg', 'L', 'leqbal314@gmail.com', 'MDcwNTA3', '2024-11-06 01:42:45'),
(2, 'Iqbal pahlevi', '7756.jpg', 'L', 'ib', '', '2024-11-06 23:37:25'),
(3, 'apaaja', '5759.webp', 'L', 'apaaja@gmail.com', 'MTIz', '2024-11-11 02:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `pivot_items_sales`
--
ALTER TABLE `pivot_items_sales`
  ADD PRIMARY KEY (`item_id_pivot`,`sale_id_pivot`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sale` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
