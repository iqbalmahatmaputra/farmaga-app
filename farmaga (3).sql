-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 12:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `cabangs`
--

CREATE TABLE `cabangs` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(25) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `limit_perhari` bigint(20) NOT NULL,
  `limit_perbulan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id_cabang`, `nama_cabang`, `lokasi`, `limit_perhari`, `limit_perbulan`, `created_at`, `updated_at`) VALUES
(1, 'Cabang 1', 'Cabang 1', 2500000, 3000000, '2022-02-19 22:34:42', '2022-02-19 22:34:42'),
(2, 'Cabang 2', 'Cabang 2', 1000000, 3000000, '2022-02-20 06:39:04', '2022-02-20 06:39:04'),
(3, 'Cabang 3', 'Cabang 3', 1500000, 3000000, '2022-02-19 21:13:29', '0000-00-00 00:00:00');

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
(13, 'INTI MEDIKA', 'jalan Inti', '0909', '2022-01-31 20:00:45', '2022-01-31 20:00:45'),
(14, 'PENTA', 'jalan PENTA', '0101', '2022-01-31 20:01:02', '2022-01-31 20:01:02'),
(15, 'KALISTA', 'jalan Kalista', '0202', '2022-01-31 20:01:16', '2022-01-31 20:01:16'),
(16, 'UDC', 'jalan UDC', '0303', '2022-01-31 20:01:42', '2022-01-31 20:01:42'),
(17, 'LENCO', 'jalan LENCO', '0404', '2022-01-31 20:02:01', '2022-01-31 20:02:01');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `nomor_order_stock` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_payment`, `nomor_order_stock`, `jenis`, `total_harga`, `tanggal_pembayaran`, `created_at`, `updated_at`) VALUES
(2, '002/GDG/2022.02.22', 'Cash', '783200', '2022-02-21 00:00:00', '2022-02-22 09:30:51', '2022-02-22 11:11:35'),
(7, '003/GDG/2022.02.22', 'Belum', '20000', '2022-02-22 00:00:00', '2022-02-22 11:09:35', '2022-02-22 11:09:35');

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
(9, 'Thermometer', 'Pieces', '2022-01-31 20:02:42', '2022-01-31 20:02:42'),
(10, 'Perban', 'Pieces', '2022-01-31 20:03:04', '2022-01-31 20:03:04'),
(11, 'Lacto-B', 'Tablet', '2022-02-05 09:26:02', '2022-01-31 20:03:35'),
(12, 'Neo Caocitin', 'Botol', '2022-01-31 20:04:11', '2022-01-31 20:04:11'),
(20, 'Fatigon', 'Tablet', '2022-02-22 05:10:30', '2022-02-22 05:10:30'),
(21, 'OBH', 'Botol', '2022-02-22 05:10:40', '2022-02-22 05:10:40'),
(22, 'Rinos', 'Botol', '2022-02-22 05:10:52', '2022-02-22 05:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `products_price`
--

CREATE TABLE `products_price` (
  `id_product_price` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_price`
--

INSERT INTO `products_price` (`id_product_price`, `id_product`, `id_distributor`, `harga`, `created_at`, `updated_at`) VALUES
(7, 10, 15, 25000, '2022-01-31 20:12:29', '2022-01-31 20:12:29'),
(8, 12, 14, 13310, '2022-01-31 20:13:32', '2022-01-31 20:13:32'),
(9, 11, 15, 254400, '2022-01-31 20:15:52', '2022-01-31 20:15:52'),
(10, 10, 17, 100000, '2022-02-18 15:48:34', '2022-02-18 15:48:34'),
(11, 12, 16, 100000, '2022-02-19 07:37:37', '2022-02-19 07:37:37'),
(12, 21, 15, 15000, '2022-02-22 05:11:18', '2022-02-22 05:11:18'),
(13, 22, 15, 10000, '2022-02-22 05:11:49', '2022-02-22 05:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id_product_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_order` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_order` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_order` varchar(255) NOT NULL,
  `id_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id_product_order`, `id_product`, `id_distributor`, `qty`, `harga_order`, `created_at`, `updated_at`, `status_order`, `id_user`, `nomor_order`, `id_product_price`) VALUES
(42, 11, 15, 2, 254400, '2022-02-18 14:13:44', '2022-02-21 17:50:25', 'Request', 14, '002/CBG2/2022.02.18', 9),
(43, 10, 15, 3, 25000, '2022-02-18 14:13:44', '2022-02-21 17:50:24', 'Request', 14, '002/CBG2/2022.02.18', 7),
(44, 12, 14, 2, 13310, '2022-02-18 14:35:13', '2022-02-21 17:50:17', 'Request', 14, '002/CBG2/2022.02.18', 8),
(45, 10, 17, 3, 100000, '2022-02-18 15:48:50', '2022-02-21 16:19:38', 'Request', 14, '002/CBG2/2022.02.18', 10),
(46, 10, 17, 2, 100000, '2022-02-18 17:49:00', '2022-02-20 06:05:29', 'Request', 14, '002/CBG2/2022.02.19', 10),
(47, 11, 15, 3, 254400, '2022-02-18 17:49:00', '2022-02-19 06:24:27', 'Request', 14, '002/CBG2/2022.02.19', 9),
(48, 10, 15, 5, 25000, '2022-02-18 18:17:32', '2022-02-19 06:23:44', 'Keranjang', 7, '003/CBG3/2022.02.19', 7),
(52, 10, 15, 3, 25000, '2022-02-19 06:38:55', '2022-02-19 06:44:15', 'Request', 14, '002/CBG2/2022.02.19', 7),
(53, 10, 17, 2, 100000, '2022-02-19 06:38:55', '2022-02-19 06:44:15', 'Request', 14, '002/CBG2/2022.02.19', 10),
(54, 10, 15, 12, 25000, '2022-02-21 07:48:19', '2022-02-21 07:57:09', 'Proses', 9, '001/CBG1/2022.02.21', 7),
(55, 12, 14, 2, 13310, '2022-02-21 07:48:19', '2022-02-21 07:57:09', 'Proses', 9, '001/CBG1/2022.02.21', 8),
(57, 10, 15, 12, 25000, '2022-02-21 17:42:50', '2022-02-21 17:42:50', 'Keranjang', 14, '002/CBG2/2022.02.22', 7),
(58, 11, 15, 12, 254400, '2022-02-21 17:43:35', '2022-02-21 17:43:35', 'Keranjang', 14, '002/CBG2/2022.02.22', 9),
(59, 10, 15, 22, 25000, '2022-02-21 17:43:55', '2022-02-21 17:43:55', 'Keranjang', 14, '002/CBG2/2022.02.22', 7),
(61, 12, 14, 4, 13310, '2022-02-21 17:46:12', '2022-02-21 17:46:12', 'Keranjang', 14, '002/CBG2/2022.02.22', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id_product_stock` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `qty_stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nomor_order_stock` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id_product_stock`, `id_product`, `id_distributor`, `qty_stock`, `created_at`, `updated_at`, `nomor_order_stock`, `status`, `harga`) VALUES
(32, 22, 15, 2, '2022-02-22 09:30:51', '2022-02-22 09:30:51', '002/GDG/2022.02.22', 'Request', '10000'),
(33, 11, 15, 3, '2022-02-22 09:30:51', '2022-02-22 09:30:51', '002/GDG/2022.02.22', 'Request', '254400'),
(38, 22, 15, 2, '2022-02-22 11:09:35', '2022-02-22 11:09:35', '003/GDG/2022.02.22', 'Request', '10000');

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
  `cabang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `username`, `cabang`, `status`, `id_cabang`) VALUES
(1, 'Iqbal Mahatma Putra', 'iqbal@alumni.pcr.ac.id', NULL, '$2y$10$.bB0yrKlPoDyAVBYjBr7FeTCdoy5V0AYr1IhLVpYVkJUgUin8Xylu', NULL, '2022-01-25 22:13:39', '2022-01-25 22:13:39', 'ADMIN', 'iqbal', 'ADMIN', 1, 0),
(2, 'tes', 'tes@gmail.com', NULL, '$2y$10$CdhFcC.4aVuNQCZjyc8u/utUgnLpHztVu.fY34EA8xQ07zruWqqkS', NULL, '2022-01-25 22:17:20', '2022-01-25 22:17:20', 'GDG', 'user', 'CBG1', 1, 1),
(6, 'ika suhasmi', 'ikasuhasmi@gmail.com', NULL, '$2y$10$jpALUjWbplsvmzNtKjsn5OsIkotpHMj04Uq4bIiGN9OpG04r9pbM6', NULL, '2022-01-25 22:57:26', '2022-01-25 22:57:26', 'USER', 'IKA', 'CBG2', 1, 2),
(7, 'cbg3', 'cbg3@gmail.com', NULL, '$2y$10$wBgFu4r/vsy3WvovwCH09.CpDIPXhHgQchXXnduMujV/LwEBslUHW', NULL, '2022-01-26 08:49:50', '2022-01-26 08:49:50', 'USER', 'cbg3', 'CBG3', 1, 3),
(8, 'afnan', 'afnan@gmail.com', NULL, '$2y$10$N/d2iUSlsIHeckw1ra1In.600U/IfaWHs27YE9vwKbc0CfG2YAdyy', NULL, '2022-01-26 09:35:59', '2022-01-26 09:35:59', 'USER', 'afnan', 'CBG1', 1, 1),
(9, 'cbg1', 'cbg1@gmail.com', NULL, '$2y$10$UwFYONOXafpjufrMrEr75etBl.3SvuEtrBhNQlnTPnIAwsaKEFdrq', NULL, '2022-01-31 20:18:57', '2022-01-31 20:18:57', 'USER', 'cbg1', 'CBG1', 1, 1),
(10, 'cbg2', 'cbg2@gmail.com', NULL, '$2y$10$oZ54QUC5kHVghZV/XA5kduIiT6yboTBvkObrgDJVsEL/RBzMBqIM2', NULL, '2022-01-31 22:14:05', '2022-01-31 22:14:05', 'USER', 'cbg2', 'CBG2', 1, 2),
(14, 'iqbal2', 'iqbal2@gmail.com', NULL, '$2y$10$zdfWhQQ8HBsLTkldVMYqsutzV3P5FDfwMqvae6L3NeKJIevJcQm3a', NULL, '2022-02-18 14:08:49', '2022-02-18 14:08:49', 'USER', 'iqbal2', 'CBG2', 1, 2);

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
-- Stand-in structure for view `v_order_products`
-- (See below for the actual view)
--
CREATE TABLE `v_order_products` (
`id_product_order` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`qty` int(11)
,`harga_order` bigint(20)
,`nomor_order` varchar(255)
,`created_at` timestamp
,`id_user` int(11)
,`status_order` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order_products_user`
-- (See below for the actual view)
--
CREATE TABLE `v_order_products_user` (
`id_cabang` int(11)
,`cabang` varchar(255)
,`name` varchar(255)
,`id_product_order` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`qty` int(11)
,`harga_order` bigint(20)
,`nomor_order` varchar(255)
,`created_at` timestamp
,`id_user` int(11)
,`name_user` varchar(255)
,`roles` varchar(255)
,`status_order` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order_user_cabang`
-- (See below for the actual view)
--
CREATE TABLE `v_order_user_cabang` (
`limit_perhari` bigint(20)
,`limit_perbulan` bigint(20)
,`id_cabang` int(11)
,`cabang` varchar(255)
,`name` varchar(255)
,`id_product_order` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`qty` int(11)
,`harga_order` bigint(20)
,`nomor_order` varchar(255)
,`created_at` timestamp
,`id_user` int(11)
,`name_user` varchar(255)
,`roles` varchar(255)
,`status_order` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_product_order`
-- (See below for the actual view)
--
CREATE TABLE `v_product_order` (
`id_product_order` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`qty` int(11)
,`harga_order` bigint(20)
,`nomor_order` varchar(255)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock_prices`
-- (See below for the actual view)
--
CREATE TABLE `v_stock_prices` (
`id_product_stock` int(11)
,`id_product` int(11)
,`id_distributor` int(11)
,`qty_stock` int(11)
,`created_at` timestamp
,`nomor_order_stock` varchar(255)
,`status` varchar(255)
,`id_product_price` int(11)
,`harga` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock_products`
-- (See below for the actual view)
--
CREATE TABLE `v_stock_products` (
`harga` varchar(255)
,`status` varchar(255)
,`nomor_order_stock` varchar(255)
,`id_product_stock` int(11)
,`id_product` int(11)
,`created_at` timestamp
,`id_distributor` int(11)
,`nama_product` varchar(255)
,`nama_distributor` varchar(255)
,`qty_stock` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock_products_groupby`
-- (See below for the actual view)
--
CREATE TABLE `v_stock_products_groupby` (
`nomor_order_stock` varchar(255)
,`jumlah` decimal(32,0)
,`total_harga` double
,`jumlah_product` bigint(21)
,`status` varchar(255)
,`id_distributor` int(11)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock_products_payments`
-- (See below for the actual view)
--
CREATE TABLE `v_stock_products_payments` (
`nomor_order_stock` varchar(255)
,`jumlah` decimal(32,0)
,`total_harga` double
,`jumlah_product` bigint(21)
,`status` varchar(255)
,`id_distributor` int(11)
,`created_at` timestamp
,`id_payment` int(11)
,`jenis` varchar(255)
,`tanggal_pembayaran` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_harga_produk`
--
DROP TABLE IF EXISTS `v_harga_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_harga_produk`  AS SELECT `pr`.`id_product_price` AS `id_product_price`, `p`.`id_product` AS `id_product`, `pr`.`id_distributor` AS `id_distributor`, `p`.`nama_product` AS `nama_product`, `d`.`nama_distributor` AS `nama_distributor`, `pr`.`harga` AS `harga` FROM ((`products_price` `pr` left join `products` `p` on((`pr`.`id_product` = `p`.`id_product`))) left join `distributors` `d` on((`pr`.`id_distributor` = `d`.`id_distributor`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_products`
--
DROP TABLE IF EXISTS `v_order_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_products`  AS SELECT `po`.`id_product_order` AS `id_product_order`, `po`.`id_product` AS `id_product`, `po`.`id_distributor` AS `id_distributor`, `v`.`nama_product` AS `nama_product`, `v`.`nama_distributor` AS `nama_distributor`, `po`.`qty` AS `qty`, `po`.`harga_order` AS `harga_order`, `po`.`nomor_order` AS `nomor_order`, `po`.`created_at` AS `created_at`, `po`.`id_user` AS `id_user`, `po`.`status_order` AS `status_order` FROM (`product_orders` `po` left join `v_harga_produk` `v` on((`po`.`id_product_price` = `v`.`id_product_price`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_products_user`
--
DROP TABLE IF EXISTS `v_order_products_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_products_user`  AS SELECT `u`.`id_cabang` AS `id_cabang`, `u`.`cabang` AS `cabang`, `u`.`name` AS `name`, `v`.`id_product_order` AS `id_product_order`, `v`.`id_product` AS `id_product`, `v`.`id_distributor` AS `id_distributor`, `v`.`nama_product` AS `nama_product`, `v`.`nama_distributor` AS `nama_distributor`, `v`.`qty` AS `qty`, `v`.`harga_order` AS `harga_order`, `v`.`nomor_order` AS `nomor_order`, `v`.`created_at` AS `created_at`, `v`.`id_user` AS `id_user`, `u`.`name` AS `name_user`, `u`.`roles` AS `roles`, `v`.`status_order` AS `status_order` FROM (`v_order_products` `v` left join `users` `u` on((`v`.`id_user` = `u`.`id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_user_cabang`
--
DROP TABLE IF EXISTS `v_order_user_cabang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_user_cabang`  AS SELECT `c`.`limit_perhari` AS `limit_perhari`, `c`.`limit_perbulan` AS `limit_perbulan`, `v`.`id_cabang` AS `id_cabang`, `v`.`cabang` AS `cabang`, `v`.`name` AS `name`, `v`.`id_product_order` AS `id_product_order`, `v`.`id_product` AS `id_product`, `v`.`id_distributor` AS `id_distributor`, `v`.`nama_product` AS `nama_product`, `v`.`nama_distributor` AS `nama_distributor`, `v`.`qty` AS `qty`, `v`.`harga_order` AS `harga_order`, `v`.`nomor_order` AS `nomor_order`, `v`.`created_at` AS `created_at`, `v`.`id_user` AS `id_user`, `v`.`name_user` AS `name_user`, `v`.`roles` AS `roles`, `v`.`status_order` AS `status_order` FROM (`v_order_products_user` `v` join `cabangs` `c` on((`v`.`id_cabang` = `c`.`id_cabang`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_product_order`
--
DROP TABLE IF EXISTS `v_product_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_product_order`  AS SELECT `po`.`id_product_order` AS `id_product_order`, `po`.`id_product` AS `id_product`, `po`.`id_distributor` AS `id_distributor`, `v`.`nama_product` AS `nama_product`, `v`.`nama_distributor` AS `nama_distributor`, `po`.`qty` AS `qty`, `po`.`harga_order` AS `harga_order`, `po`.`nomor_order` AS `nomor_order`, `po`.`created_at` AS `created_at` FROM (`product_orders` `po` left join `v_harga_produk` `v` on((`po`.`id_product_price` = `v`.`id_product_price`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_prices`
--
DROP TABLE IF EXISTS `v_stock_prices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_prices`  AS SELECT `ps`.`id_product_stock` AS `id_product_stock`, `ps`.`id_product` AS `id_product`, `ps`.`id_distributor` AS `id_distributor`, `ps`.`qty_stock` AS `qty_stock`, `ps`.`created_at` AS `created_at`, `ps`.`nomor_order_stock` AS `nomor_order_stock`, `ps`.`status` AS `status`, `pp`.`id_product_price` AS `id_product_price`, `pp`.`harga` AS `harga` FROM (`product_stocks` `ps` join `products_price` `pp` on(((`ps`.`id_product` = `pp`.`id_product`) and (`ps`.`id_distributor` = `pp`.`id_distributor`))))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_products`
--
DROP TABLE IF EXISTS `v_stock_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_products`  AS SELECT `pr`.`harga` AS `harga`, `pr`.`status` AS `status`, `pr`.`nomor_order_stock` AS `nomor_order_stock`, `pr`.`id_product_stock` AS `id_product_stock`, `p`.`id_product` AS `id_product`, `pr`.`created_at` AS `created_at`, `pr`.`id_distributor` AS `id_distributor`, `p`.`nama_product` AS `nama_product`, `d`.`nama_distributor` AS `nama_distributor`, `pr`.`qty_stock` AS `qty_stock` FROM ((`product_stocks` `pr` left join `products` `p` on((`pr`.`id_product` = `p`.`id_product`))) left join `distributors` `d` on((`pr`.`id_distributor` = `d`.`id_distributor`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_products_groupby`
--
DROP TABLE IF EXISTS `v_stock_products_groupby`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_products_groupby`  AS SELECT `v_stock_products`.`nomor_order_stock` AS `nomor_order_stock`, sum(`v_stock_products`.`qty_stock`) AS `jumlah`, sum((`v_stock_products`.`qty_stock` * `v_stock_products`.`harga`)) AS `total_harga`, count(`v_stock_products`.`nama_product`) AS `jumlah_product`, `v_stock_products`.`status` AS `status`, `v_stock_products`.`id_distributor` AS `id_distributor`, `v_stock_products`.`created_at` AS `created_at` FROM `v_stock_products` GROUP BY `v_stock_products`.`nomor_order_stock``nomor_order_stock`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_products_payments`
--
DROP TABLE IF EXISTS `v_stock_products_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_products_payments`  AS SELECT `v`.`nomor_order_stock` AS `nomor_order_stock`, `v`.`jumlah` AS `jumlah`, `v`.`total_harga` AS `total_harga`, `v`.`jumlah_product` AS `jumlah_product`, `v`.`status` AS `status`, `v`.`id_distributor` AS `id_distributor`, `v`.`created_at` AS `created_at`, `p`.`id_payment` AS `id_payment`, `p`.`jenis` AS `jenis`, `p`.`tanggal_pembayaran` AS `tanggal_pembayaran` FROM (`v_stock_products_groupby` `v` join `payments` `p`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id_cabang`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`);

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
  ADD KEY `id_product` (`id_product`,`id_distributor`,`id_user`),
  ADD KEY `id_product_price` (`id_product_price`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id_product_stock`),
  ADD KEY `id_product` (`id_product`,`id_distributor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products_price`
--
ALTER TABLE `products_price`
  MODIFY `id_product_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id_product_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id_product_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
