-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 05:15 AM
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
  `address` text NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `message` text DEFAULT 'กำลังอยู่ในช่วงรอรับออเดอร์',
  `create_at` datetime DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
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

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `product_id`, `user_id`, `point`) VALUES
(13, 1, 1, 4),
(14, 2, 1, 5),
(15, 2, 2, 5);

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
  `point` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `detail`, `price`, `category`, `status`, `point`) VALUES
(1, '66b497f1be168.png', 'อาหารแมว SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารแมว', 0, 4),
(2, '66b497f1be168.png', 'อาหารนก SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 10),
(3, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(5, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(6, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(7, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(8, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(9, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(10, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(11, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(12, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(13, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(14, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(15, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0),
(16, '66b497f1be168.png', 'อาหารสุนัข SmartHeart', 'สุนัขอายุมากกว่า 1 ปีขึ้นไปหรือสุนัขโตเต็มวัย ต้องการสารอาหารจำเป็นที่เหมาะสมกับช่วงอายุ อาหารสุนัขโตสมาร์ทฮาร์ท® ได้คัดสรรโปรตีนจากเนื้อสัตว์ ที่มีคุณภาพ พร้อมธัญพืช เกลือแร่ และวิตามิน จึงมีสารอาหารที่ครบถ้วนสมบูรณ์อย่างแท้จริง พร้อมด้วยคุณค่าจากน้ำมันปลาทะเลที่มีดีเอชเอ (DHA) และโอเมก้า 3 (Omega-3) และเลซิทิน (Lecithin) ที่มีโคลีน (Choline) ช่วยพัฒนาความจำที่ดี และเสริมพัฒนาการทางสมองและสร้างความแข็งแรงให้หัวใจ', 100.00, 'อาหารสุนัข', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `webboard_id` int(11) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `content`, `user_id`, `webboard_id`, `create_at`) VALUES
(1, 'gg', 1, 1, '2024-08-11 20:26:28'),
(2, 'โม้อะโจ๊กกกกกกกก', 1, 1, '2024-08-11 20:28:42'),
(3, 'When considering building a community of like-minded people, these versatile forum templates will do you well.', 1, 1, '2024-08-11 20:29:01'),
(4, 'Frontend web developer and web designer specializing in WordPress theme development. ', 1, 1, '2024-08-11 20:29:19'),
(6, 'ปัญญาอ่อน', 2, 1, '2024-08-12 00:31:07');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'MrMaxing', 'parinya24dev@gmail.com', '$2y$10$5ZpCkHxj6nwiRhazKvXyCOrNyAf.Jh8dvRFa015e/NeOOynG3Czvq', 'admin'),
(2, 'ปริญญา พันติมิตร', 'parinya24personal@gmail.com', '$2y$10$eb9fP8cKVHwo5brtCoolgOV5/cazWdp3kRKi6SiV6htW7H2xsE9/K', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `webboards`
--

CREATE TABLE `webboards` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `webboards`
--

INSERT INTO `webboards` (`id`, `title`, `content`, `user_id`, `create_at`) VALUES
(1, '12 Best Bootstrap Forum Templates 2024', 'Gaming enthusiasts willing to start their online project, make it with SquadForce. You can use this versatile Bootstrap tool for an array of different intentions. For instance, SquadForce works to build anything from news pages and game portals to eCommerce websites and forums, plus heaps more in between. Also, you can be an beginner and still make some noise on the internet with SquadForce.\r\n\r\nLoads of ready to use blocks, convenient navigation styles, eSport tournaments, WooCommerce support and stunning galleries are a few of the specialties SquadForce has available for you. The bbPress integration allows you to create a forum and grow a loyal community. By the way, if you want to translate SquadForce, you can do that, too. Moreover, SquadForce includes automatic updates to ensure smooth website operation for years.', 1, '2024-08-11 19:56:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webboards`
--
ALTER TABLE `webboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
