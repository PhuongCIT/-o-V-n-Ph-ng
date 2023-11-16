-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 06:53 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daovanphuongltw`
--

-- --------------------------------------------------------

--
-- Table structure for table `0031_banner`
--

CREATE TABLE `0031_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_brand`
--

CREATE TABLE `0031_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `0031_brand`
--

INSERT INTO `0031_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Apple', 'apple', NULL, 1, 'hãng công nghệ hàng đầu', '2023-10-20 18:44:01', 1, '2023-10-20 18:44:01', NULL, 1),
(2, 'Samsung', 'samsung', NULL, 1, 'Hãng điện thoại hàng đầu', '2023-10-20 18:44:47', 1, '2023-10-20 18:44:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `0031_category`
--

CREATE TABLE `0031_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_contact`
--

CREATE TABLE `0031_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `replay_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_menu`
--

CREATE TABLE `0031_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_order`
--

CREATE TABLE `0031_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deliveryname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryemail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryaddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_orderdetail`
--

CREATE TABLE `0031_orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_post`
--

CREATE TABLE `0031_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_product`
--

CREATE TABLE `0031_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `price_sale` float NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_topic`
--

CREATE TABLE `0031_topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0031_user`
--

CREATE TABLE `0031_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `0031_user`
--

INSERT INTO `0031_user` (`id`, `name`, `email`, `phone`, `username`, `password`, `address`, `image`, `roles`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Đào Văn Phương', 'daovanphuong@gmail.com', '0384311405', 'admin', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'bình thuận', '', 1, '2023-10-21 01:37:10', 1, NULL, NULL, 1),
(2, 'Chinh', 'chinh@gmail.com', '0332929200', 'user1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bình dương', '', 0, '2023-10-21 01:39:39', 1, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0031_banner`
--
ALTER TABLE `0031_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_brand`
--
ALTER TABLE `0031_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_category`
--
ALTER TABLE `0031_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_contact`
--
ALTER TABLE `0031_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_menu`
--
ALTER TABLE `0031_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_order`
--
ALTER TABLE `0031_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_orderdetail`
--
ALTER TABLE `0031_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_post`
--
ALTER TABLE `0031_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_product`
--
ALTER TABLE `0031_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_topic`
--
ALTER TABLE `0031_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0031_user`
--
ALTER TABLE `0031_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0031_banner`
--
ALTER TABLE `0031_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_brand`
--
ALTER TABLE `0031_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `0031_category`
--
ALTER TABLE `0031_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_contact`
--
ALTER TABLE `0031_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_menu`
--
ALTER TABLE `0031_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_order`
--
ALTER TABLE `0031_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_orderdetail`
--
ALTER TABLE `0031_orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_post`
--
ALTER TABLE `0031_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_product`
--
ALTER TABLE `0031_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_topic`
--
ALTER TABLE `0031_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0031_user`
--
ALTER TABLE `0031_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
