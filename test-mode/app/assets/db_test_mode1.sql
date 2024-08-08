-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 10:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test_mode`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `detail`, `price`, `category`, `status`, `point`) VALUES
(1, '66b43429ef9aa.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `webboard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webboards`
--

CREATE TABLE `webboards` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `webboard_id` (`webboard_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webboards`
--
ALTER TABLE `webboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webboards`
--
ALTER TABLE `webboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`webboard_id`) REFERENCES `webboards` (`id`);

--
-- Constraints for table `webboards`
--
ALTER TABLE `webboards`
  ADD CONSTRAINT `webboards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
