-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 04:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmaga`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(255) NOT NULL,
  `alamat_distributor` varchar(255) NOT NULL,
  `no_hp_distributor` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id_distributor`, `nama_distributor`, `alamat_distributor`, `no_hp_distributor`, `updated_at`, `created_at`) VALUES
(11, 'UCL', 'dekat sana', '091231', '2022-01-26 04:29:12', '2022-01-26 04:29:12'),
(12, 'KALISTA', 'dekat kalista', '091231', '2022-01-26 05:36:04', '2022-01-26 05:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `satuan_product` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nama_product`, `satuan_product`, `updated_at`, `created_at`) VALUES
(1, 'Promag', 'dussss', '2022-01-26 03:05:55', '2022-01-26 02:50:30'),
(3, 'OSKADON', 'dus', '2022-01-26 05:34:44', '2022-01-26 03:23:11'),
(4, 'Promagaa', 'dus', '2022-01-26 03:23:19', '2022-01-26 03:23:19'),
(5, 'Panadol', 'kotak', '2022-01-26 03:23:35', '2022-01-26 03:23:35'),
(6, 'HufaGrip', 'Papan', '2022-01-26 05:34:34', '2022-01-26 03:23:56'),
(7, 'OBH', 'BOX', '2022-01-26 12:49:06', '2022-01-26 12:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `products_price`
--

CREATE TABLE `products_price` (
  `id_product_price` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_price`
--

INSERT INTO `products_price` (`id_product_price`, `id_product`, `id_distributor`, `harga`, `created_at`, `updated_at`) VALUES
(3, 3, 11, 125002, '2022-01-26 05:33:48', '2022-01-26 04:34:55'),
(5, 6, 11, 2222, '2022-01-26 05:50:28', '2022-01-26 05:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id_product_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `harga_order` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `username`, `cabang`, `status`) VALUES
(1, 'Iqbal Mahatma Putra', 'iqbal@alumni.pcr.ac.id', NULL, '$2y$10$.bB0yrKlPoDyAVBYjBr7FeTCdoy5V0AYr1IhLVpYVkJUgUin8Xylu', NULL, '2022-01-25 22:13:39', '2022-01-25 22:13:39', 'ADMIN', '', '', 1),
(2, 'tes', 'tes@gmail.com', NULL, '$2y$10$CdhFcC.4aVuNQCZjyc8u/utUgnLpHztVu.fY34EA8xQ07zruWqqkS', NULL, '2022-01-25 22:17:20', '2022-01-25 22:17:20', 'ADMIN', 'user', 'Cabang 1', 0),
(6, 'ika suhasmi', 'ikasuhasmi@gmail.com', NULL, '$2y$10$jpALUjWbplsvmzNtKjsn5OsIkotpHMj04Uq4bIiGN9OpG04r9pbM6', NULL, '2022-01-25 22:57:26', '2022-01-25 22:57:26', 'USER', 'IKA', 'Cabang 3', 1),
(7, 'cbg1', 'cbg1@gmail.com', NULL, '$2y$10$wBgFu4r/vsy3WvovwCH09.CpDIPXhHgQchXXnduMujV/LwEBslUHW', NULL, '2022-01-26 08:49:50', '2022-01-26 08:49:50', 'USER', 'cbg1', 'Cabang 3', 1),
(8, 'afnan', 'afnan@gmail.com', NULL, '$2y$10$N/d2iUSlsIHeckw1ra1In.600U/IfaWHs27YE9vwKbc0CfG2YAdyy', NULL, '2022-01-26 09:35:59', '2022-01-26 09:35:59', 'USER', 'afnan', 'Cabang 1', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_harga_product`
-- (See below for the actual view)
--
CREATE TABLE `v_harga_product` (
`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`harga` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_harga_products`
-- (See below for the actual view)
--
CREATE TABLE `v_harga_products` (
`id_product_price` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`harga` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_harga_produk`
-- (See below for the actual view)
--
CREATE TABLE `v_harga_produk` (
`id_product_price` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`harga` bigint(20)
);

-- --------------------------------------------------------

--
-- Structure for view `v_harga_product`
--
DROP TABLE IF EXISTS `v_harga_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_harga_product`  AS  select `p`.`nama_product` AS `nama_product`,`d`.`nama_distributor` AS `nama_distributor`,`pr`.`harga` AS `harga` from ((`products_price` `pr` left join `products` `p` on((`pr`.`id_product` = `p`.`id_product`))) left join `distributors` `d` on((`pr`.`id_distributor` = `d`.`id_distributor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_harga_products`
--
DROP TABLE IF EXISTS `v_harga_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_harga_products`  AS  select `pr`.`id_product_price` AS `id_product_price`,`p`.`nama_product` AS `nama_product`,`d`.`nama_distributor` AS `nama_distributor`,`pr`.`harga` AS `harga` from ((`products_price` `pr` left join `products` `p` on((`pr`.`id_product` = `p`.`id_product`))) left join `distributors` `d` on((`pr`.`id_distributor` = `d`.`id_distributor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_harga_produk`
--
DROP TABLE IF EXISTS `v_harga_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_harga_produk`  AS  select `pr`.`id_product_price` AS `id_product_price`,`p`.`id_product` AS `id_product`,`pr`.`id_distributor` AS `id_distributor`,`p`.`nama_product` AS `nama_product`,`d`.`nama_distributor` AS `nama_distributor`,`pr`.`harga` AS `harga` from ((`products_price` `pr` left join `products` `p` on((`pr`.`id_product` = `p`.`id_product`))) left join `distributors` `d` on((`pr`.`id_distributor` = `d`.`id_distributor`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_price`
--
ALTER TABLE `products_price`
  ADD PRIMARY KEY (`id_product_price`),
  ADD KEY `id_produk` (`id_product`,`id_distributor`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id_product_order`),
  ADD KEY `id_product` (`id_product`,`id_distributor`,`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_price`
--
ALTER TABLE `products_price`
  MODIFY `id_product_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id_product_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_price`
--
ALTER TABLE `products_price`
  ADD CONSTRAINT `id_distributor` FOREIGN KEY (`id_distributor`) REFERENCES `distributors` (`id_distributor`),
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
