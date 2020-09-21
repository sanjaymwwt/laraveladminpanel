-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 03:07 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_adminlte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_supper` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_supper`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(25, 2, 'admin', 'Admin', 'User', 'admin@gmail.com', '544354353', '', '$2y$10$VE.cve.VjFbez4WwZ0mgqe.kqEjdmrGC/cpPOmnt5gc1E1rB1R4W.', '2019-01-09 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-10 06:07:15', '2019-07-10 06:07:15'),
(26, 3, 'bush', 'jorge', 'bush', 'bush@gmail.com', '5446546545665', '1c576d254c9f8a23c9243702bdb45a11.png', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '2018-11-01 09:46:23', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-01-26 02:01:11'),
(27, 5, 'schoo43543', 'rewr', 'erew', 'erew@dfsfs', 'ewre43543', '', '0a7eab610f12cb73aa0a4aa7c0acf691', '2019-01-02 00:00:00', 1, 1, 0, 0, '', '', '', '2018-03-18 00:00:00', '2019-01-16 23:33:26'),
(29, 4, 'mangoman', 'Mango', 'Man', 'mangoman@gmail.com', '06985214562', '', '698d51a19d8a121ce581499d7b701668', '2019-01-03 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-15 00:00:00', '2019-01-26 02:01:16'),
(30, 2, 'johnsmith', 'John', 'Smith', 'johnsmith@gmail.com', '9940314725', '38f33530cd54631c5e43a8fca3510a10.jpg', '$2y$10$RuvYwDlwIbx6CFX7t0CXHuWNYNnRC5hFqARmaTpqu9YeK6N5eAIfO', '2018-04-05 17:00:47', 1, 1, 1, 0, '', '', '', '2019-07-10 12:07:14', '2019-07-18 09:00:34'),
(31, 6, 'naumanit', 'Nauman', 'Ahmed', 'naumanahmedcs@gmail.com', '123456', '', '$2y$10$Yic.I/YRnKVycqPIJW5O2er1wTiHtIt7SMXQnNI6oH9XH5Ap8vrgS', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-01-16 06:01:58', '2019-07-18 10:01:02'),
(37, 2, 'usernew', 'usernew', 'usernew', 'phpdev4@worldwebtechnology.in', '7845129201', '', '$2y$10$yGRN5heK8yyHxMftUp3eTeCpWm5dpmU9bzSG9KFjEjX.uEJnVbyBu', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '981ede722a7928b3e9be985ada35c910', '', '2019-07-12 12:07:03', '2019-07-12 12:07:03'),
(43, 1, 'superadmin', 'superadmin', 'superadmin', 'phpdev41@worldwebtechnology.in', '7845129201', '', '$2y$10$FWwsivmEPyGptam5BlQRFelNKj9DhMiYEbQchmb6P5XTPZad.n5i.', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-12 12:07:03', '2019-08-08 13:01:06'),
(47, 4, 'asvdsv', 'asdv', 'asdv', 'asdv@gmail.com', '2312323441', '', '$2y$10$7Rt8ZYrtbZXIZelUTXHgjOpCc6AbbYnlA7H8NqpgnCEJQgM13VOl.', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-16 01:07:23', '2019-07-16 01:07:23'),
(50, 2, 'sanjay', 'SANJAY', 'mistry', 'sanjya@gmail.com', '1234567890', '', '$2y$10$lqihlwUgLFHN4fxjtGgA5.syss1pDh/JfGYofzACag50lfjrfESCy', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-16 01:07:44', '2019-07-16 01:07:44'),
(51, 2, 'Acc role', 'Acc role', 'Acc role', 'Accrole@gmail.com', '1234567890', '', '$2y$10$RQb.2g/AONO4AGLRaP4/9OWNQl.ATcdMYfwRoO6aXlGukKcMv.6jW', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-16 01:07:23', '2019-07-16 01:07:23'),
(52, 17, 'qa', 'qas', 'qa', 'qa@yopmail.com', '321312312312', '', '$2y$10$4BjD.gLRQIZ.41dQ.netyOiaC7rGqO8gieJKmrZwoX9pGBq8pf3r.', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-16 02:07:34', '2019-07-16 02:07:34'),
(53, 2, 'new role1', 'new role', 'new role', 'new@gmail.com', '1234567890', '', '$2y$10$ckhMeiEVK4Fl3hGKbYP/QeRUo1dOOXfjlR4MOMDdT0Ly4FDppfN36', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-16 03:07:54', '2019-07-16 03:07:54'),
(54, 2, 'admin user', 'admin', 'admin', 'admin@gmail.com', '1234567890', NULL, '1234567', NULL, 1, 1, 1, 0, NULL, NULL, NULL, '2019-07-18 09:37:40', '2019-07-18 09:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `admin_role_id` int(11) NOT NULL,
  `admin_role_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin_role_status` int(11) NOT NULL,
  `admin_role_created_by` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `admin_role_modified_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`admin_role_id`, `admin_role_title`, `admin_role_status`, `admin_role_created_by`, `created_at`, `admin_role_modified_by`, `updated_at`) VALUES
(1, 'Superadmin', 1, 0, '2019-07-17 02:43:05', 0, '2019-07-17 02:43:05'),
(2, 'Admin', 1, 0, '2019-07-17 02:45:24', 0, '2019-07-17 02:45:24'),
(3, 'Accountant', 1, 0, '2019-07-17 02:45:41', 0, '2019-08-08 03:58:15'),
(4, 'HR', 0, 0, '2019-07-17 02:45:53', 0, '2019-07-18 01:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `mobile_no`, `address1`, `address2`, `created_date`, `created_at`, `updated_at`) VALUES
(9, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:18', NULL, NULL),
(8, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:30', NULL, NULL),
(7, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State', 'asvasdv', '2019-07-23 01:07:50', NULL, '2019-07-23 02:59:50'),
(6, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444  United State LLC', '', '2017-12-11 08:12:15', NULL, NULL),
(10, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State', 'acasvsdf', '2019-07-16 01:07:22', NULL, NULL),
(11, 'wwt', 'sad@gmail.com', '23423434', 'ascd', 'asdv', '2019-07-08 10:07:22', NULL, NULL),
(12, 'sadv', 'sadvs@gmail.com', '234234234', 'sadv', 'asdv', '2019-07-05 06:07:26', NULL, NULL),
(13, 'sadv', 'sadvs@gmail.com', '234234234', 'sadv', 'asdv', '2019-07-05 07:07:27', NULL, NULL),
(14, 'sadv', 'sadvs@gmail.com', '234234234', 'sadv', 'asdv', '2019-07-05 07:07:46', NULL, NULL),
(15, 'sadv', 'sadvs@gmail.com', '234234234', 'sadv', 'asdv', '2019-07-08 10:07:13', NULL, NULL),
(16, 'asdv', 'sadv@gmail.com', '234234', 'aaas', 'sadvsdv', '2019-07-08 04:07:28', NULL, NULL),
(17, 'sacsadv', 'asd@gmail.com', '24234234', 'asdv', 'advv', '2019-07-10 11:07:39', NULL, NULL),
(18, 'wwt', 'wwt@gmail.com', '7985416320', 'thaltej shilaj road', 'ahmedabad', '2019-07-22 12:07:51', NULL, '2019-07-22 01:39:51'),
(19, 'asdv', 'asdv@gmail.com', '234234234', 'sadv', 'adv', '2019-07-10 05:07:21', NULL, NULL),
(20, 'saddv', 'asdv sdvv@gmail.com', '24234324232', 'a asdvv', 'asdv', '2019-07-12 10:07:06', NULL, NULL),
(21, 'fds', 'dsfds', '32423234', 'sdfs', 'sdf', '2019-07-15 06:07:01', NULL, NULL),
(22, 'testtes', 'asdv@gmail.com', '2312334567', 'testtes', 'testtes', '2019-07-22 12:07:22', NULL, '2019-07-22 01:38:22'),
(23, 'asdvv', 'asd@gmail.com', '2432343434', 'asdv', 'asdv', '2019-07-16 10:07:56', NULL, NULL),
(24, 'asdvcsdv', 'asdv@gmail.com', '2432344122', 'adsvasdv', 'asdv', '2019-07-16 01:07:42', NULL, NULL),
(25, 'sdfb', 'sdbvdf@yahoo.com', '2131231212', 'dsfb', 'sdfdfbf', '2019-07-16 03:07:13', NULL, NULL),
(26, 'dsvd', 'asdv@gmail.com', '1234567890', 'sdfb', 'dsfb', '2019-07-16 02:07:30', NULL, NULL),
(27, 'XYZ', 'qa@worldwebtechnology.in', '1234567890', 'XYZ, P.O. Box 105', 'P.O. Box 105', '2019-07-16 03:07:11', NULL, NULL),
(28, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'asdv', '2019-07-22 11:07:49', '2019-07-22 00:24:49', '2019-07-22 00:24:49'),
(29, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'asdv', '2019-07-22 11:07:14', '2019-07-22 00:27:14', '2019-07-22 00:27:14'),
(30, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'asdv', '2019-07-22 11:07:12', '2019-07-22 00:31:12', '2019-07-22 00:31:12'),
(31, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'asdv', '2019-07-22 11:07:55', '2019-07-22 00:31:55', '2019-07-22 00:31:55'),
(32, 'test1', 'sad111v@gmail.com', '1234567890', 'address1', 'address2', '2019-07-22 11:07:42', '2019-07-22 00:32:27', '2019-07-22 00:55:42'),
(33, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'fasdf', '2019-07-22 11:07:26', '2019-07-22 00:44:26', '2019-07-22 00:44:26'),
(34, 'asacasd', 'sadv@gmail.com', '1234567890', 'asdv', 'asdsdv', '2019-07-22 12:07:19', '2019-07-22 00:46:05', '2019-07-22 01:01:19'),
(35, 'wwt', 'asdv@gmail.com', '1234567890', 'savdv', 'sadv', '2019-07-24 04:07:58', '2019-07-23 17:29:20', '2019-07-23 17:29:58'),
(36, 'wwt1', 'wwt1@gmail.com', '1234567890', 'wwt1', 'wwt1', '2019-07-24 08:07:09', '2019-07-23 21:01:09', '2019-07-23 21:01:09'),
(37, 'wwt1', 'wwt1@gmail.com', '1234567890', 'wwt1', 'wwt1', '2019-07-24 08:07:13', '2019-07-23 21:01:35', '2019-07-23 21:02:13'),
(38, 'test company', 'test@gmail.com', '1234567890', 'address1', 'address2', '2019-08-08 12:08:44', '2019-08-08 06:42:44', '2019-08-08 06:42:44'),
(39, 'test company', 'test@gmail.com', '1234567890', 'address1', 'address2', '2019-08-08 12:08:03', '2019-08-08 06:43:07', '2019-08-08 06:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `email_template_for` varchar(512) DEFAULT NULL,
  `email_template_subject` longtext DEFAULT NULL,
  `email_template_body` longtext DEFAULT NULL,
  `email_template_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `email_template_for`, `email_template_subject`, `email_template_body`, `email_template_slug`, `created_at`, `updated_at`) VALUES
(1, 'Registration', 'Create new users', 'PHA+SGk8L3A+DQoNCjxwPkNyZWF0ZSBuZXcgdXNlcnM8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+VGhhbmtzICZhbXA7IFJlZ2FyZHM8L3A+', 'registration', '2019-07-02 10:16:50', NULL),
(2, 'Contact US', 'Contact US subject', 'PHA+SGk8L3A+DQoNCjxwPkNvbnRhY3QgdXMgZW1haWwgYm9keTwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD5UaGFua3MgJmFtcDsgUmVnYXJkczwvcD4=', 'contact-us', '2019-07-02 10:23:54', NULL),
(3, 'Inquiry', 'Test Inquiry', 'PHA+SGkgc2FuamF5PC9wPg0KDQo8cD5UaGlzIGlzIGJvZHkgdGVtcGxhdGU8L3A+', 'inquiry', '2019-07-05 05:53:31', '2019-07-10 11:26:46'),
(6, 'Test email1', 'test subject', 'PHA+dGVzdCBib2R5PC9wPg==', 'test-email1', '2019-07-10 08:06:59', '2019-07-10 15:17:53'),
(7, 'Contact US new', 'test email validate', 'PHA+SGk8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+c2FuamF5IGNvbnRhY3QgdXM8L3A+', 'contact-us-new', '2019-07-10 09:46:33', '2019-07-10 15:18:00'),
(8, 'Test email7', 'asdv', 'PHA+c2FkdmR2ZHY8L3A+', '-test-email7', '2019-07-10 09:48:23', '2019-07-10 18:25:17'),
(10, 'Sky Test email', 'Test', 'PHA+dGVzdGluZyBvZiB3b3JraW5nPC9wPg==', 'sky-test-email', '2019-07-15 12:27:03', '2019-07-15 17:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order_no` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `mst_menu_id` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `pageid`, `parent_id`, `order_no`, `active`, `mst_menu_id`, `created_at`, `updated_at`) VALUES
(37, 1, NULL, 100, 1, 24, '2019-07-20 01:35:26', '2019-07-20 01:35:26'),
(38, 2, NULL, 101, 1, 24, '2019-07-20 01:35:26', '2019-07-20 01:35:26'),
(42, 1, NULL, 1, 1, 25, '2019-08-08 04:32:18', '2019-08-08 04:32:34'),
(43, 2, NULL, 2, 1, 25, '2019-08-08 04:32:19', '2019-08-08 04:32:34'),
(44, 6, NULL, 3, 1, 25, '2019-08-08 04:32:19', '2019-08-08 04:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `operation` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `controller_name`, `fa_icon`, `operation`, `sort_order`) VALUES
(1, 'Admin List', 'admin', '', 'view|add|edit|delete|change_status', 0),
(2, 'Role & Permissions', 'admin_roles', '', 'view|add|edit|delete|change_status', 0),
(3, 'User Manage', 'users', '', 'view|add|edit|delete|change_status', 0),
(4, 'Invoice List', 'invoices', '', 'view|add|edit|delete', 0),
(5, 'Datatable Examples', 'example', '', 'view', 0),
(6, 'Joins', 'joins', '', 'view', 0),
(7, 'Export', 'export', '', 'view', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_access`
--

CREATE TABLE `module_access` (
  `id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_access`
--

INSERT INTO `module_access` (`id`, `admin_role_id`, `module`, `operation`, `created_at`, `updated_at`) VALUES
(48, 3, 'users', 'view', NULL, NULL),
(49, 3, 'users', 'add', NULL, NULL),
(50, 3, 'users', 'edit', NULL, NULL),
(51, 3, 'users', 'delete', NULL, NULL),
(52, 3, 'users', 'change_status', NULL, NULL),
(54, 3, 'invoices', 'view', NULL, NULL),
(56, 3, 'invoices', 'add', NULL, NULL),
(57, 3, 'invoices', 'delete', NULL, NULL),
(58, 3, 'invoices', 'edit', NULL, NULL),
(62, 4, 'users', 'view', NULL, NULL),
(63, 4, 'users', 'add', NULL, NULL),
(64, 4, 'users', 'edit', NULL, NULL),
(67, 4, 'users', 'change_status', NULL, NULL),
(68, 4, 'invoices', 'view', NULL, NULL),
(69, 4, 'invoices', 'add', NULL, NULL),
(70, 4, 'invoices', 'edit', NULL, NULL),
(71, 4, 'invoices', 'delete', NULL, NULL),
(164, 2, 'users', 'view', NULL, NULL),
(168, 2, 'users', 'edit', NULL, NULL),
(170, 2, 'users', 'change_status', NULL, NULL),
(171, 2, 'invoices', 'view', NULL, NULL),
(172, 2, 'invoices', 'add', NULL, NULL),
(173, 2, 'invoices', 'edit', NULL, NULL),
(174, 2, 'invoices', 'delete', NULL, NULL),
(175, 2, 'example', 'view', NULL, NULL),
(176, 2, 'joins', 'view', NULL, NULL),
(177, 2, 'export', 'view', NULL, NULL),
(180, 1, 'export', 'view', NULL, NULL),
(181, 7, 'users', 'add', NULL, NULL),
(194, 14, 'admin_roles', 'view', NULL, NULL),
(195, 14, 'admin_roles', 'change_status', NULL, NULL),
(196, 14, 'admin_roles', 'add', NULL, NULL),
(197, 14, 'admin_roles', 'edit', NULL, NULL),
(198, 14, 'admin_roles', 'delete', NULL, NULL),
(199, 14, 'users', 'view', NULL, NULL),
(200, 14, 'users', 'change_status', NULL, NULL),
(201, 14, 'users', 'add', NULL, NULL),
(202, 14, 'users', 'edit', NULL, NULL),
(203, 14, 'users', 'delete', NULL, NULL),
(204, 14, 'invoices', 'view', NULL, NULL),
(206, 14, 'invoices', 'add', NULL, NULL),
(207, 14, 'invoices', 'edit', NULL, NULL),
(208, 14, 'invoices', 'delete', NULL, NULL),
(211, 14, 'admin', 'view', NULL, NULL),
(212, 14, 'admin', 'add', NULL, NULL),
(215, 14, 'admin', 'change_status', NULL, NULL),
(216, 14, 'admin', 'edit', NULL, NULL),
(217, 14, 'admin', 'delete', NULL, NULL),
(218, 15, 'admin', 'view', NULL, NULL),
(219, 15, 'admin', 'add', NULL, NULL),
(220, 15, 'admin', 'change_status', NULL, NULL),
(221, 15, 'admin_roles', 'view', NULL, NULL),
(222, 15, 'invoices', 'add', NULL, NULL),
(223, 15, 'users', 'add', NULL, NULL),
(224, 15, 'users', 'edit', NULL, NULL),
(225, 15, 'users', 'delete', NULL, NULL),
(226, 15, 'invoices', 'delete', NULL, NULL),
(227, 16, 'admin', 'view', NULL, NULL),
(228, 16, 'admin', 'change_status', NULL, NULL),
(229, 16, 'admin', 'add', NULL, NULL),
(230, 16, 'admin', 'edit', NULL, NULL),
(231, 16, 'admin', 'delete', NULL, NULL),
(232, 16, 'admin_roles', 'view', NULL, NULL),
(233, 16, 'admin_roles', 'change_status', NULL, NULL),
(234, 16, 'users', 'view', NULL, NULL),
(235, 16, 'users', 'change_status', NULL, NULL),
(236, 16, 'invoices', 'view', NULL, NULL),
(237, 16, 'example', 'view', NULL, NULL),
(244, 17, 'users', 'view', NULL, NULL),
(245, 17, 'users', 'change_status', NULL, NULL),
(246, 17, 'users', 'add', NULL, NULL),
(247, 17, 'users', 'edit', NULL, NULL),
(248, 17, 'admin_roles', 'view', NULL, NULL),
(249, 17, 'admin_roles', 'change_status', NULL, NULL),
(250, 17, 'admin_roles', 'add', NULL, NULL),
(251, 17, 'admin_roles', 'edit', NULL, NULL),
(252, 17, 'admin_roles', 'delete', NULL, NULL),
(253, 17, 'admin', 'edit', NULL, NULL),
(254, 17, 'admin', 'add', NULL, NULL),
(255, 17, 'admin', 'view', NULL, NULL),
(256, 17, 'admin', 'change_status', NULL, NULL),
(257, 17, 'admin', 'delete', NULL, NULL),
(258, 17, 'invoices', 'view', NULL, NULL),
(259, 17, 'invoices', 'add', NULL, NULL),
(260, 17, 'invoices', 'edit', NULL, NULL),
(261, 17, 'invoices', 'delete', NULL, NULL),
(264, 17, 'users', 'delete', NULL, NULL),
(265, 3, 'admin_roles', 'add', '2019-07-18 02:05:47', '2019-07-18 02:05:47'),
(267, 1, 'admin', 'view', '2019-08-08 04:00:19', '2019-08-08 04:00:19'),
(269, 1, 'admin', 'add', '2019-08-08 04:00:54', '2019-08-08 04:00:54'),
(270, 1, 'admin', 'edit', '2019-08-08 04:01:23', '2019-08-08 04:01:23'),
(271, 1, 'admin', 'delete', '2019-08-08 04:01:29', '2019-08-08 04:01:29'),
(272, 1, 'admin', 'change_status', '2019-08-08 04:01:43', '2019-08-08 04:01:43'),
(273, 1, 'admin_roles', 'view', NULL, NULL),
(275, 1, 'admin_roles', 'edit', '2019-08-08 04:04:30', '2019-08-08 04:04:30'),
(276, 1, 'admin_roles', 'add', '2019-08-08 04:04:48', '2019-08-08 04:04:48'),
(277, 1, 'admin_roles', 'delete', '2019-08-08 04:04:49', '2019-08-08 04:04:49'),
(278, 1, 'admin_roles', 'change_status', '2019-08-08 04:05:12', '2019-08-08 04:05:12'),
(280, 1, 'users', 'view', '2019-08-08 04:05:45', '2019-08-08 04:05:45'),
(282, 1, 'users', 'delete', '2019-08-08 04:06:08', '2019-08-08 04:06:08'),
(283, 1, 'users', 'edit', '2019-08-08 04:06:09', '2019-08-08 04:06:09'),
(284, 1, 'users', 'change_status', '2019-08-08 04:06:11', '2019-08-08 04:06:11'),
(285, 1, 'users', 'add', '2019-08-08 04:06:29', '2019-08-08 04:06:29'),
(291, 1, 'example', 'view', '2019-08-08 06:25:10', '2019-08-08 06:25:10'),
(292, 1, 'joins', 'view', '2019-08-08 06:25:23', '2019-08-08 06:25:23'),
(293, 1, 'invoices', 'view', '2019-08-08 06:25:33', '2019-08-08 06:25:33'),
(294, 1, 'invoices', 'add', '2019-08-08 06:27:43', '2019-08-08 06:27:43'),
(295, 1, 'invoices', 'edit', '2019-08-08 06:27:44', '2019-08-08 06:27:44'),
(296, 1, 'invoices', 'delete', '2019-08-08 06:27:45', '2019-08-08 06:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `menu_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Menu 2', NULL, 1, '2019-07-12 10:31:09', '2019-07-12 16:01:09'),
(25, 'Menu 3', NULL, 1, '2019-07-12 10:31:18', '2019-07-12 16:01:18'),
(26, 'Menu 4', NULL, 1, '2019-07-12 10:31:26', '2019-07-12 16:01:26'),
(27, 'Menu 5', NULL, 1, '2019-07-12 10:32:46', '2019-07-12 16:02:46'),
(29, 'Menu9', NULL, 1, '2019-07-19 05:32:22', '2019-07-19 11:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `newusers`
--

CREATE TABLE `newusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `last_ip` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newusers`
--

INSERT INTO `newusers` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'asdv', 'asdv', 'asv@gmail.com', '1234567890', 'asdvv', 'asdvdvdv', 1, 1, 0, 0, NULL, NULL, NULL, '2019-07-16 13:15:58', '2019-07-17 07:28:56'),
(4, 'User2', 'user2', 'user2', 'user2@gmail.com', '2342467891', '1234', 'saddvd', 1, 1, 0, 0, NULL, NULL, NULL, '2019-07-17 07:33:14', '2019-08-08 10:50:40'),
(5, 'User3', 'user3', 'user3', 'user3@gmail.com', '1234567890', '11', NULL, 1, 0, 0, 0, NULL, NULL, NULL, '2019-08-08 09:39:14', '2019-08-08 09:39:39'),
(6, 'User4', 'User1', 'User1', 'User1@gmail.com', '1234567890', '123', NULL, 1, 1, 0, 0, NULL, NULL, NULL, '2019-08-08 09:40:51', '2019-08-08 09:40:51'),
(11, 'User5', 'user5', 'user5', 'user5@gmail.com', '2345678901', '1', 'test address', 1, 0, 0, 0, NULL, NULL, NULL, '2019-08-08 09:48:59', '2019-08-08 09:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `url_type` varchar(255) NOT NULL,
  `page_slug` text DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `page_target` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `url_type`, `page_slug`, `page_url`, `page_target`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'internal', '', 'home', 'Top', 1, NULL, NULL),
(2, 'Contact Us', 'customized', 'http://www.google.com', NULL, 'Blank', 1, NULL, NULL),
(6, 'Page 4', 'customized', NULL, 'htttp://google.com', 'Blank', 1, NULL, '2019-07-18 08:15:46'),
(7, 'Page New', 'customized', 'google.com', NULL, 'Blank', 1, NULL, NULL),
(8, 'Page1', 'internal', 'Page1', NULL, 'Self', 1, NULL, NULL),
(9, 'Page 5', 'internal', 'Page 5', NULL, 'Self', 1, NULL, NULL),
(10, 'Page2', 'internal', 'Page2', NULL, 'Self', 1, NULL, NULL),
(11, 'Page6', 'customized', 'page6', '', 'Top', 1, NULL, NULL),
(12, 'Page7', 'internal', 'Page7', NULL, 'Self', 1, NULL, NULL),
(13, 'Blog', 'customized', 'blog', '', 'Self', 1, NULL, NULL),
(14, 'About us', 'customized', 'about-us', '', 'Self', 1, NULL, NULL),
(15, 'New Page', 'customized', 'www.google.com', NULL, 'Top', 1, NULL, NULL),
(16, 'Home455', 'internal', '', NULL, 'Top', 1, NULL, NULL),
(18, 'Support us', 'customized', 'support-us', 'http://google.com', 'Self', 1, NULL, NULL),
(19, 'Page8', 'internal', '', 'page8', 'Self', 1, NULL, NULL),
(20, 'Page4', 'customized', 'page4', '', 'Blank', 1, NULL, NULL),
(21, 'Sky test', 'customized', 'sky-test', 'https://www.google.com', 'Top', 1, NULL, NULL),
(22, 'Home 5', 'internal', 'home-5', NULL, 'Self', 1, '2019-07-18 07:56:46', '2019-07-18 07:56:46'),
(23, 'Page 9', 'customized', 'page-9', 'wsadv', 'Self', 1, '2019-07-18 07:58:19', '2019-07-18 08:18:34'),
(24, 'Page  new test', 'customized', 'page-new-test', 'https://google.com', 'Blank', 1, '2019-08-08 04:21:28', '2019-08-08 04:24:00'),
(25, 'update page', 'customized', 'update-page', 'http://google.com', 'Blank', 1, '2019-08-08 04:26:27', '2019-08-08 04:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `items_detail` longtext NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total_tax` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `client_note` longtext DEFAULT NULL,
  `termsncondition` longtext DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `admin_id`, `user_id`, `company_id`, `invoice_no`, `txn_id`, `items_detail`, `sub_total`, `total_tax`, `discount`, `grand_total`, `currency`, `payment_method`, `payment_status`, `client_note`, `termsncondition`, `due_date`, `created_date`, `updated_date`, `created_at`, `updated_at`) VALUES
(12, 24, 6, 20, 'inv-001', '', 'a:1:{i:0;a:5:{s:19:\"product_description\";s:5:\"sadvv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"12.00\";}}', '12.00', '0.12', '11.00', '1.12', 'USD', '', 'Unpaid', 'asdvd dvv', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-08', '2019-07-30', '2019-07-12', NULL, NULL),
(2, 1, 4, 7, 'INV-1001', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:14:\"this is desc 1\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:3:\"tax\";s:1:\"3\";s:5:\"total\";s:5:\"10.00\";}i:1;a:5:{s:19:\"product_description\";s:14:\"this is desc 2\";s:8:\"quantity\";s:1:\"2\";s:5:\"price\";s:2:\"20\";s:3:\"tax\";s:2:\"36\";s:5:\"total\";s:5:\"40.00\";}}', '50.00', '14.70', '2.00', '62.70', 'USD', '', 'Paid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-01-12', '2017-12-12', '2019-07-23', NULL, '2019-07-22 19:42:25'),
(9, 24, 33, 17, 'INV-1230', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:4:\"asdv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"21\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"21.00\";}i:1;a:5:{s:19:\"product_description\";s:5:\"desc2\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"12.00\";}}', '33.00', '0.54', '2.00', '31.54', 'USD', '', 'Unpaid', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-01', '2019-08-02', '2019-07-10', NULL, NULL),
(6, 24, 32, 11, 'INV-001', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:14:\"this is desc 1\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:3:\"tax\";s:1:\"3\";s:5:\"total\";s:5:\"10.00\";}i:1;a:5:{s:19:\"product_description\";s:14:\"this is desc 2\";s:8:\"quantity\";s:1:\"2\";s:5:\"price\";s:2:\"20\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"40.00\";}}', '50.00', '0.70', '1.00', '49.70', 'USD', '', 'Partially Paid', 'this is first note', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-07', '2019-07-23', '2019-07-08', NULL, NULL),
(22, 1, 4, 35, 'INV5001', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:4:\"test\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"15\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"15.00\";}i:1;a:5:{s:19:\"product_description\";s:5:\"test2\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"10.00\";}}', '25.00', '0.35', '1.00', '24.35', 'USD', '', 'Unpaid', 'this is note', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1970-01-01', '2019-07-24', '2019-07-24', '2019-07-23 17:29:20', '2019-07-23 17:29:58'),
(10, 1, 4, 18, 'INV-10111', '', 'a:3:{i:0;a:5:{s:19:\"product_description\";s:18:\"This is first desc\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"15\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"15.00\";}i:1;a:5:{s:19:\"product_description\";s:20:\"this is second desc1\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"20\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"20.00\";}i:2;a:5:{s:19:\"product_description\";s:18:\"this is thirddesc1\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"15\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"15.00\";}}', '50.00', '0.85', '12.00', '38.85', 'USD', '', 'Overdue', 'this is test desc for demo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-07-25', '2019-07-15', '2019-07-22', NULL, '2019-07-22 01:39:51'),
(15, 43, 32, 23, 'INV111', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:5:\"dsadv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"23\";s:3:\"tax\";s:2:\"21\";s:5:\"total\";s:5:\"23.00\";}i:1;a:5:{s:19:\"product_description\";s:5:\"sdfbb\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:1:\"2\";s:3:\"tax\";s:2:\"23\";s:5:\"total\";s:4:\"2.00\";}}', '25.00', '5.29', '23.50', '6.79', 'USD', '', 'Unpaid', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-01', '2019-07-16', '2019-07-16', NULL, NULL),
(16, 43, 42, 24, 'INV-123435', '', 'a:1:{i:0;a:5:{s:19:\"product_description\";s:12:\"test product\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"12.00\";}}', '12.00', '0.12', '0.00', '12.12', 'USD', '', 'Unpaid', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-07-25', '2019-07-24', '2019-07-16', NULL, NULL),
(17, 43, 42, 25, 'INV10012', '', 'a:1:{i:0;a:5:{s:19:\"product_description\";s:6:\"Tesing\";s:8:\"quantity\";s:2:\"12\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:6:\"144.00\";}}', '144.00', '1.44', '0.00', '145.44', 'USD', '', 'Unpaid', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-08', '2019-07-24', '2019-07-16', NULL, NULL),
(18, 51, 44, 26, 'INV10900', '', 'a:1:{i:0;a:5:{s:19:\"product_description\";s:6:\"asdvvd\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"12.00\";}}', '12.00', '0.12', '0.00', '12.12', 'USD', '', 'Unpaid', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-07-18', '2019-07-03', NULL, NULL, NULL),
(20, 1, 6, 32, 'INV3000', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:6:\"asdvdv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"11\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"11.00\";}i:1;a:5:{s:19:\"product_description\";s:4:\"test\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"12.00\";}}', '23.00', '0.35', '1.00', '22.35', 'USD', '', 'Unpaid', 'asdvdvdvd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1970-01-01', '2019-07-24', '2019-07-22', '2019-07-22 00:32:27', '2019-07-22 00:55:42'),
(21, 1, 6, 34, 'INV3000', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:6:\"asdvdv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"11\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"11.00\";}i:1;a:5:{s:19:\"product_description\";s:4:\"sadv\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"12\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:5:\"12.00\";}}', '23.00', '0.35', '2.00', '21.35', 'USD', '', 'Unpaid', 'this is test note', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1970-01-01', '2019-07-24', '2019-07-22', '2019-07-22 00:46:05', '2019-07-22 01:01:19'),
(23, 1, 4, 37, 'INV789', '', 'a:2:{i:0;a:5:{s:19:\"product_description\";s:4:\"test\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"15\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"15.00\";}i:1;a:5:{s:19:\"product_description\";s:7:\"srasssd\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"14\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"14.00\";}}', '29.00', '0.29', '0.00', '29.29', 'USD', '', 'Unpaid', 'This is demo desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-07-26', '2019-07-23', '2019-07-24', '2019-07-23 21:01:35', '2019-07-23 21:02:13'),
(24, 43, 4, 39, 'INV-2220', '', 'a:4:{i:0;a:5:{s:19:\"product_description\";s:10:\"first desc\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"15\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"15.00\";}i:1;a:5:{s:19:\"product_description\";s:11:\"sceond desc\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:2:\"10\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:5:\"10.00\";}i:2;a:5:{s:19:\"product_description\";s:15:\"this third desc\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:1:\"5\";s:3:\"tax\";s:1:\"2\";s:5:\"total\";s:4:\"5.00\";}i:3;a:5:{s:19:\"product_description\";s:11:\"fourth desc\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:1:\"2\";s:3:\"tax\";s:1:\"1\";s:5:\"total\";s:4:\"2.00\";}}', '32.00', '0.37', '0.00', '32.37', 'USD', '', 'Unpaid', 'this is test note', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-15', '2019-08-08', '2019-08-08', '2019-08-08 06:43:07', '2019-08-08 06:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(512) DEFAULT NULL,
  `setting_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'site_logo', '/uploads/setting/1565258879.jpg', NULL, '2019-08-08 04:37:59'),
(2, 'hidden_tab', 'email_setting', NULL, '2019-08-08 04:38:39'),
(3, 'contact_address', NULL, NULL, '2019-07-20 00:55:48'),
(4, 'lat', NULL, NULL, '2019-07-20 00:55:48'),
(5, 'long', NULL, NULL, '2019-07-20 00:55:48'),
(6, 'admin_email', 'phpdev4@worldwebtechnology.in', NULL, NULL),
(7, 'facebook_link', 'https://www.facebook.com/', NULL, '2019-08-08 04:36:20'),
(8, 'twitter_link', 'https://twitter.com/', NULL, '2019-08-08 04:36:20'),
(9, 'instagram_link', 'https://www.instagram.com/', NULL, '2019-08-08 04:36:20'),
(10, 'youtube_link', 'https://www.youtube.com/', NULL, '2019-08-08 04:36:20'),
(11, 'reCAPTCHA_key', '6Ld205gUAAAAABrAt1GwkJTzkMtdPEEcuLcn1dR2', NULL, '2019-07-20 00:56:17'),
(12, 'reCAPTCHA_secret', '6Ld205gUAAAAAGngK2ybDJpHd7omqsJ-vK_Iz6vR', NULL, '2019-07-20 00:56:17'),
(13, 'google_api_key', 'AIzaSyARX_8I2ngA1OY_GZHI9ZNdn1p3-lhu2YE', NULL, NULL),
(14, 'mail_sending_method', 'php_mail', NULL, '2019-08-08 07:23:27'),
(15, 'smtp_host', 'ssl://smtp.gmail.com', NULL, NULL),
(16, 'smtp_port', '465', NULL, NULL),
(17, 'smtp_tls_ssl_opt', 'tls', NULL, NULL),
(18, 'smtp_user', 'worldwebsmtptesting@gmail.com', NULL, NULL),
(19, 'smtp_pass', 'worldweb@1234', NULL, NULL),
(20, 'smtp_mail_from', 'no-reply@adminlte.com', NULL, NULL),
(21, 'test_mail_sending_method', 'smtp', NULL, NULL),
(22, 'test_to_mail', NULL, NULL, '2019-08-08 04:47:43'),
(23, 'test_subject', NULL, NULL, '2019-08-08 04:47:43'),
(24, 'test_email_body', '<p>Hello,</p>\r\n\r\n<p>This is Test message</p>', NULL, '2019-08-08 04:33:41'),
(25, '_token', 'zHOHWwUnai56ZYQX1tl48LtQw3V5Ep7KfEcwVzzh', NULL, '2019-08-08 04:33:41');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$.IXaor7kpLbMGc5x1TWg/Oo9d.jRSAP5nOuLljfgtpB.rh9GIFpAq', NULL, '2019-07-11 04:41:21', '2019-07-11 04:41:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`admin_role_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_access`
--
ALTER TABLE `module_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RoleId` (`admin_role_id`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newusers`
--
ALTER TABLE `newusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `admin_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `module_access`
--
ALTER TABLE `module_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newusers`
--
ALTER TABLE `newusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
