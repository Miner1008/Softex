-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 01:39 PM
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
-- Database: `softex`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_time` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `found_date` date NOT NULL,
  `status` enum('Pending','Completed','Delayed','On schedule') NOT NULL,
  `employee` varchar(255) NOT NULL,
  `founder` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `found_date`, `status`, `employee`, `founder`, `description`, `website`, `facebook`, `twitter`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ExxonMobil', '1999-03-02', 'Pending', 'John D. Rockefeller', 'John D. Rockefeller', 'the largest oil company', NULL, NULL, NULL, NULL, '2020-11-06 13:14:35', '2020-11-06 13:14:35'),
(2, 'JP Morgan Chase', '2000-10-25', 'On schedule', 'John Pierpont Morgan', 'John Pierpont Morgan', 'This is the biggest bank in the United States and the sixth-largest in the World by assets totaling up to $2.5 trillion.', NULL, NULL, NULL, NULL, '2020-11-06 13:15:47', '2020-11-06 13:15:47'),
(3, 'Tencent', '1998-08-13', 'Completed', 'Chen Yidan', 'Xu Chenye', 'Industry: Internet', NULL, NULL, NULL, NULL, '2020-11-06 13:17:53', '2020-11-06 13:17:53'),
(4, 'Alibaba Group', '1999-04-23', 'Completed', 'Jack Ma Yun', 'Jack Ma Yun', 'Industry: E-commerce', NULL, NULL, NULL, NULL, '2020-11-06 13:18:54', '2020-11-06 13:18:54'),
(5, 'Facebook', '2004-06-18', 'On schedule', 'Mark Zuckerberg', 'Mark Zuckerberg', 'Industry: Internet', NULL, NULL, NULL, NULL, '2020-11-06 13:19:44', '2020-11-06 13:19:44'),
(6, 'Alphabet', '1998-05-05', 'Pending', 'SergeyBrin', 'Larry Page', 'Industry: Internet', NULL, NULL, NULL, NULL, '2020-11-06 13:20:59', '2020-11-06 13:20:59'),
(7, 'Amazon', '1994-09-05', 'Completed', 'Jeff Bezos', 'Jeff Bezos ', 'Industry: Retail', NULL, NULL, NULL, NULL, '2020-11-06 13:21:56', '2020-11-06 13:21:56'),
(8, 'Apple Inc.', '1976-12-25', 'On schedule', 'Steve Jobs', 'Steve Wozniak', 'Industry: Information Technology, Electronics', NULL, NULL, NULL, NULL, '2020-11-06 13:22:56', '2020-11-06 13:22:56'),
(9, 'Microsoft', '1975-09-08', 'Pending', 'Bill Gates', 'Bill gates', 'Industry: Software Development', NULL, NULL, NULL, NULL, '2020-11-06 13:23:48', '2020-11-06 13:23:48'),
(10, 'Berkshire Hathaway', '1839-02-08', 'Delayed', 'Berkshire Hathaway', 'Warren Buffet', 'Industry: Finance, Insurance, Transportation, Utilities, Food Products.', NULL, NULL, NULL, NULL, '2020-11-06 13:25:58', '2020-11-06 13:25:58'),
(11, 'Gazprom', '1989-06-30', 'Completed', 'Vladimir', 'Vladimir Putin', ' The company\'s gas transport system comprises of 98,242 miles of gas trunk lines.', NULL, NULL, NULL, NULL, '2020-11-06 13:30:11', '2020-11-06 13:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('Pending','Completed','Delayed','On schedule') NOT NULL,
  `employee` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `requester` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `name`, `product`, `amount`, `status`, `employee`, `start_date`, `requester`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rose Market', 'Beginnings Paper Towel', 33000, 'On schedule', 'John D. Rockefeller', '2020-10-05', 'Alexei Betrov', NULL, '2020-11-06 17:12:28', '2020-11-06 17:12:28'),
(2, 'Golden deal', 'Swave Satin Ultra Strong Paper Towel', 60000, 'Completed', 'Steve Jobs', '2018-01-06', 'Jack', NULL, '2020-11-06 17:17:03', '2020-11-06 17:17:03'),
(3, 'Sweet Dream', 'Swave Satin Ultra Strong Paper Towel', 2000, 'Pending', 'Jeff Bezos', '2020-09-08', 'Marshal', NULL, '2020-11-06 17:19:08', '2020-11-06 17:19:08'),
(4, 'Halloween', 'Beginnings Paper Towel', 33000, 'Delayed', 'Berkshire Hathaway', '2019-10-31', 'Joker', NULL, '2020-11-06 17:21:20', '2020-11-06 17:21:20'),
(5, 'Battle War', 'Swave Kitchen Towel', 20000, 'Completed', 'Berkshire Hathaway', '2020-11-09', 'Pavel', NULL, '2020-11-06 17:24:59', '2020-11-06 17:24:59'),
(6, 'Hero Meeting', 'Dinner Napkin', 60000, 'Pending', 'Mark Zuckerberg', '2020-11-03', 'Joana', NULL, '2020-11-06 17:26:10', '2020-11-06 17:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sign_code` varchar(255) NOT NULL,
  `sheet` varchar(255) NOT NULL,
  `ply` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `quantity_pallet` int(11) NOT NULL,
  `quantity_unit` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sign_code`, `sheet`, `ply`, `package`, `quantity_pallet`, `quantity_unit`, `stock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Beginnings Paper Towel', 'KT3085B01', '85 Hojas/11’’x8.8’’', 3, 30, 24, 100, 0, NULL, '2020-11-06 17:03:50', '2020-11-06 17:03:50'),
(3, 'Swave Satin Ultra Strong Paper Towel', 'KT SWAVE SATIN', '96 Hojas/11’’x5.5’’', 2, 30, 24, 50, 0, NULL, '2020-11-06 17:08:05', '2020-11-06 17:08:05'),
(4, 'Swave Kitchen Towel', '--', '80 sheets/11’’x8.8’’', 1, 12, 33, 10, 0, NULL, '2020-11-06 17:22:56', '2020-11-06 17:22:56'),
(5, 'Dinner Napkin', 'DN 20/150', '150 ct/17’’x15’’', 1, 8, 30, 0, 0, NULL, '2020-11-06 17:24:05', '2020-11-06 17:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Delayed','On schedule') NOT NULL,
  `employee` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('Active','Delayed','On Schedule') NOT NULL,
  `employee` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `requester` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hobby` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` enum('administrator','manager','producter') NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `native`, `email`, `contact`, `nationality`, `address`, `hobby`, `description`, `university`, `password`, `avatar`, `level`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bill Gates', '1980-06-05', NULL, 'BillGates123@outlook.com', NULL, 'U.S', 'BigApple', 'Dancing', 'Apple.Inc', NULL, '123', 'assets/img/avatar/2.jpg', 'administrator', NULL, '2020-11-06 12:57:16', '2020-11-06 23:59:56'),
(2, 'Steve Jobs', '1981-08-24', NULL, 'SteveJobs@outlook.com', NULL, 'U.S', 'NewYork', 'Golf', 'Computer', NULL, '123', 'assets/img/avatar/team-1-800x800.jpg', 'administrator', NULL, '2020-11-06 12:59:20', '2020-11-07 01:43:35'),
(3, 'Jeff Bezos', NULL, NULL, 'JeffBezos@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', NULL, '2020-11-06 13:00:34', '2020-11-06 13:00:34'),
(4, 'SergeyBrin', '1967-02-19', NULL, 'SergeyBrin@outlook.com', NULL, 'U.S', 'Rosanselse', 'swimming', 'fashion', NULL, '123', 'assets/img/avatar/team-4-800x800.jpg', 'administrator', NULL, '2020-11-06 13:02:27', '2020-11-06 13:37:46'),
(5, 'Mark Zuckerberg', NULL, NULL, 'MarkZuckerberg@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', NULL, '2020-11-06 13:05:03', '2020-11-06 13:05:03'),
(6, 'Jack Ma Yun', '1972-07-30', NULL, 'JackMaYun@outlook.com', NULL, 'Chinese', 'Bejing', 'Golf', 'Internet', NULL, '123', 'assets/img/avatar/3.jpg', 'manager', NULL, '2020-11-06 13:06:36', '2020-11-06 13:39:16'),
(7, 'Chen Yidan', NULL, NULL, 'ChenYidan@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', NULL, '2020-11-06 13:08:07', '2020-11-06 13:08:07'),
(8, 'John Pierpont Morgan', '1989-04-06', NULL, 'JohnPierpont@outlook.com', NULL, 'Canada', 'Tavin', 'volleyball', 'shoot', NULL, '123', 'assets/img/avatar/team-3-800x800.jpg', 'producter', NULL, '2020-11-06 13:09:50', '2020-11-06 17:33:08'),
(9, 'John D. Rockefeller', NULL, NULL, 'Rockefeller@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', NULL, '2020-11-06 13:11:23', '2020-11-06 13:11:23'),
(10, 'Berkshire Hathaway', NULL, NULL, 'BerkshireHathaway@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', NULL, '2020-11-06 13:24:25', '2020-11-06 13:24:25'),
(11, 'Vladimir', '1942-08-05', NULL, 'Vladimir@outlook.com', NULL, 'Russian', 'Moscow', 'FootBall', 'Russian Company', NULL, '123', 'assets/img/avatar/perfil.jpg', 'administrator', NULL, '2020-11-06 13:28:19', '2020-11-06 13:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
