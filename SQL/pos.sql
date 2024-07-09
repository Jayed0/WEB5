-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 09:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 'phone', 1, 5, 'Nazim', NULL, NULL, '2021-03-20 08:20:53', '2021-03-20 08:20:53'),
(2, 'watch', 1, 6, 'Tanvir', NULL, NULL, '2021-03-20 11:17:16', '2021-03-20 11:17:16'),
(3, 'laptop', 1, 5, 'Nazim', NULL, NULL, '2021-03-24 10:38:46', '2021-03-24 10:38:46'),
(4, 'Smart band', 1, 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 15:42:49', '2021-05-20 15:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 'tanvir', '012345467', NULL, 'badda', 1, NULL, NULL, NULL, NULL, '2021-03-20 11:32:00', '2021-03-20 11:32:00'),
(2, 'nazim', '01712549599', NULL, 'badda', 1, NULL, NULL, NULL, NULL, '2021-03-21 00:02:23', '2021-03-21 00:02:23'),
(3, 'hasan', '045678954', NULL, 'badda', 1, NULL, NULL, NULL, NULL, '2021-03-24 10:54:06', '2021-03-24 10:54:06'),
(4, 'Farhan', '01853264661', 'farhan@gmail.com', 'Dhanmondi,Dhaka', 1, NULL, NULL, NULL, NULL, '2021-05-20 15:55:56', '2021-05-20 15:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Approve',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `created_by_name`, `approved_by`, `approved_by_name`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-03-20', NULL, 1, 6, 'Tanvir', 6, 'Tanvir', '2021-03-20 11:31:59', '2021-03-20 11:32:58'),
(2, '2', '2021-03-21', 'fghjfd', 1, 7, 'sharik', 7, 'sharik', '2021-03-21 00:02:22', '2021-03-21 00:03:03'),
(3, '3', '2021-03-24', 'hjkgfh', 1, 5, 'Nazim', 5, 'Nazim', '2021-03-24 10:54:05', '2021-03-24 10:54:55'),
(4, '4', '2021-05-20', 'This is good', 1, 9, 'Md.Iqbal Hossain', 9, 'Md.Iqbal Hossain', '2021-05-20 15:55:56', '2021-05-20 15:56:17'),
(5, '5', '2021-05-20', NULL, 1, 9, 'Md.Iqbal Hossain', 9, 'Md.Iqbal Hossain', '2021-05-20 16:05:47', '2021-05-20 16:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_by`, `created_by_name`, `approved_by`, `approved_by_name`, `created_at`, `updated_at`) VALUES
(1, '2021-03-20', 1, 2, 3, 5, 3000, 15000, 1, NULL, NULL, NULL, NULL, '2021-03-20 11:32:00', '2021-03-20 11:32:57'),
(2, '2021-03-21', 2, 1, 4, 2, 9000, 18000, 1, NULL, NULL, NULL, NULL, '2021-03-21 00:02:23', '2021-03-21 00:03:03'),
(3, '2021-03-24', 3, 3, 5, 3, 3000, 9000, 1, NULL, NULL, NULL, NULL, '2021-03-24 10:54:06', '2021-03-24 10:54:54'),
(4, '2021-05-20', 4, 4, 6, 3, 2500, 7500, 1, NULL, NULL, NULL, NULL, '2021-05-20 15:55:56', '2021-05-20 15:56:17'),
(5, '2021-05-20', 5, 1, 2, 2, 4000, 8000, 1, NULL, NULL, NULL, NULL, '2021-05-20 16:05:49', '2021-05-20 16:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_28_055418_create_suppliers_table', 1),
(5, '2021_03_02_071107_create_customers_table', 1),
(6, '2021_03_02_150841_create_units_table', 1),
(7, '2021_03_02_175048_create_categories_table', 1),
(8, '2021_03_03_044224_create_products_table', 1),
(9, '2021_03_03_073252_create_purchases_table', 1),
(10, '2021_03_05_091919_create_invoices_table', 1),
(11, '2021_03_05_092131_create_invoice_details_table', 1),
(12, '2021_03_05_092231_create_payments_table', 1),
(13, '2021_03_05_092335_create_payment_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_by`, `created_by_name`, `approved_by`, `approved_by_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'full_paid', 14900, 0, 14900, 100, NULL, NULL, NULL, NULL, '2021-03-20 11:32:00', '2021-05-20 16:00:53'),
(2, 2, 2, 'full_paid', 17900, 0, 17900, 100, NULL, NULL, NULL, NULL, '2021-03-21 00:02:23', '2021-03-21 00:02:23'),
(3, 3, 3, 'full_paid', 8900, 0, 8900, 100, NULL, NULL, NULL, NULL, '2021-03-24 10:54:06', '2021-03-24 10:57:08'),
(4, 4, 4, 'full_paid', 7300, 0, 7300, 200, NULL, NULL, NULL, NULL, '2021-05-20 15:55:56', '2021-05-20 15:55:56'),
(5, 5, 3, 'partial_paid', 7000, 800, 7800, 200, NULL, NULL, NULL, NULL, '2021-05-20 16:05:49', '2021-05-20 16:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, '2021-03-20', 6, 'Tanvir', NULL, NULL, '2021-03-20 11:32:00', '2021-03-20 11:32:00'),
(2, 2, 17900, '2021-03-21', 7, 'sharik', NULL, NULL, '2021-03-21 00:02:23', '2021-03-21 00:02:23'),
(3, 3, 6000, '2021-03-24', 5, 'Nazim', NULL, NULL, '2021-03-24 10:54:06', '2021-03-24 10:54:06'),
(4, 3, 2900, '2021-03-25', 5, 'Nazim', NULL, NULL, '2021-03-24 10:57:10', '2021-03-24 10:57:10'),
(5, 4, 7300, '2021-05-20', 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 15:55:56', '2021-05-20 15:55:56'),
(6, 1, 4900, '2021-05-21', 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 16:00:53', '2021-05-20 16:00:53'),
(7, 5, 5000, '2021-05-20', 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 16:05:49', '2021-05-20 16:05:49'),
(8, 5, 2000, '2021-05-21', 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 16:06:59', '2021-05-20 16:06:59'),
(9, 5, NULL, '2021-06-21', 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-06-08 11:41:06', '2021-06-08 11:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'oppo 9', 3, 1, 5, 'Nazim', NULL, NULL, '2021-03-20 08:21:14', '2021-03-20 08:22:14'),
(2, 1, 1, 1, 'oppo 10', 2, 1, 5, 'Nazim', NULL, NULL, '2021-03-20 08:21:30', '2021-05-20 16:06:20'),
(3, 2, 1, 2, 'vivo watch', 15, 1, 6, 'Tanvir', NULL, NULL, '2021-03-20 11:19:17', '2021-03-20 11:32:58'),
(4, 3, 1, 1, 'y1s', 10, 1, 7, 'sharik', NULL, NULL, '2021-03-20 23:55:33', '2021-03-21 00:03:03'),
(5, 4, 1, 3, 'lenovo 9', 17, 1, 5, 'Nazim', NULL, NULL, '2021-03-24 10:39:24', '2021-03-24 10:54:55'),
(6, 4, 1, 4, 'Huawaei band', 7, 1, 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 15:43:37', '2021-05-20 15:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '01', '2021-03-20', NULL, 3, 2000, 6000, 1, 5, 'Nazim', 5, 'Nazim', '2021-03-20 08:22:06', '2021-03-20 08:22:06'),
(2, 1, 1, 2, '02', '2021-03-20', NULL, 4, 2000, 8000, 1, 5, 'Nazim', 5, 'Nazim', '2021-03-20 08:33:20', '2021-03-20 08:33:20'),
(3, 2, 2, 3, '03', '2021-03-20', 'ghjkfd', 20, 2000, 40000, 1, 6, 'Tanvir', 6, 'Tanvir', '2021-03-20 11:21:04', '2021-03-20 11:21:04'),
(4, 3, 1, 4, '04', '2021-03-21', 'fghjf', 12, 9000, 108000, 1, 7, 'sharik', 7, 'sharik', '2021-03-20 23:57:02', '2021-03-20 23:57:02'),
(5, 4, 3, 5, '09', '2021-03-24', 'hjgkl', 20, 2000, 40000, 1, 5, 'Nazim', 5, 'Nazim', '2021-03-24 10:43:28', '2021-03-24 10:43:28'),
(6, 4, 4, 6, '123', '2021-05-21', NULL, 10, 2000, 20000, 1, 9, 'Md.Iqbal Hossain', 9, 'Md.Iqbal Hossain', '2021-05-20 15:47:26', '2021-05-20 15:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 'oppo', '01679632572', 'oppo@gmail.com', 'Mohammadpur', 1, 5, 'Nazim', NULL, NULL, '2021-03-20 08:20:22', '2021-03-20 08:20:22'),
(2, 'tanvir1', '0145678945', 'tanvir@gmail.com', 'badda', 1, 6, 'Tanvir', 9, 'Md.Iqbal Hossain', '2021-03-20 11:14:11', '2021-05-20 15:40:00'),
(3, 'vivo', '01630463288', 'vivoyuyouqimobile@gmail.com', 'police plaza gulshan', 1, 7, 'sharik', NULL, NULL, '2021-03-20 23:52:33', '2021-03-20 23:52:33'),
(4, 'huawei', '014567854', 'huwai@gmail.com', 'badda', 1, 5, 'Nazim', NULL, NULL, '2021-03-24 10:36:02', '2021-03-24 10:36:02'),
(5, 'Huawei', '0188332211', 'huawei44@gmail.com', 'Gulshan,Dhaka', 1, 9, 'Md.Iqbal Hossain', NULL, NULL, '2021-05-20 15:40:58', '2021-05-20 15:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `created_by_name`, `updated_by`, `updated_by_name`, `created_at`, `updated_at`) VALUES
(1, 'pcs', 1, 5, 'Nazim', NULL, NULL, '2021-03-20 08:20:42', '2021-03-20 08:20:42'),
(2, 'kg', 1, 5, 'Nazim', NULL, NULL, '2021-03-24 10:38:13', '2021-03-24 10:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Admin', 'Md.Iqbal Hossain', 'iqbal.hossain.cse@ulab.edu.bd', NULL, '$2y$10$yXwAcu0GKb5Uh255bek5Aed.Wg0VDGQu0KtvRnWMm95wcymq0DvOS', '01853264661', 'Dhanmondi,Dhaka', 'Male', '202105202136apple-fruit.jpg', 1, NULL, '2021-05-20 03:51:24', '2021-05-20 15:36:54'),
(11, 'Admin', 'Jayed', 'Jayed@ulab.edu.bd', NULL, '$2y$10$VWbuU0lo20NLIJGHwnL5P.JmpIYCcaRNf.BS8ysYoGR4ZRvgeZmtW', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-07 12:58:27', '2021-06-07 12:58:27'),
(12, 'Admin', 'Mimi', 'mimi@ulab.edu.bd', NULL, '$2y$10$QM4844LUzobEgguzrDM3PucFs.5es0T0ezNX3Oe5OsouYPsynkxpe', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-07 12:59:30', '2021-06-07 13:01:16'),
(13, 'Admin', 'Mita', 'mita@ulab.edu.bd', NULL, '$2y$10$gmNZz3AqRwfHdqYBocKkgubuZV996ReH.52FnSurfRDFPvkH0ZbvS', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-07 13:01:57', '2021-06-07 13:01:57'),
(14, 'User', 'Anik', 'anik@ulab.edu.bd', NULL, '$2y$10$/Pj7nzCIzYVZeP867rnz9em2B0uIZI9fqCS9lR3qNxhBs3JFHBGv.', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-07 13:02:41', '2021-06-07 13:02:41'),
(15, 'User', 'rifat', 'rifat@ulab.edu.bd', NULL, '$2y$10$LFg0OmjFeAo1VchpdMUZVepKWehJLMleEBiwE27OgRTUpCsX575Jm', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-07 13:03:30', '2021-06-07 13:03:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
