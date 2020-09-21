-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 09:23 AM
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
-- Database: `laravel_admin`
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
(37, 2, 'usernew', 'usernew', 'usernew', 'phpdev4@worldwebtechnology.in', '', '', '$2y$10$yGRN5heK8yyHxMftUp3eTeCpWm5dpmU9bzSG9KFjEjX.uEJnVbyBu', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '981ede722a7928b3e9be985ada35c910', '', '2019-07-12 12:07:03', '2019-07-12 12:07:03'),
(43, 1, 'superadmin', 'superadmin', 'superadmin', 'phpdev41@worldwebtechnology.in', '', '', '$2y$10$yGRN5heK8yyHxMftUp3eTeCpWm5dpmU9bzSG9KFjEjX.uEJnVbyBu', '0000-00-00 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-12 12:07:03', '2019-07-16 01:07:38'),
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
(3, 'Accountant', 1, 0, '2019-07-17 02:45:41', 0, '2019-07-17 02:45:41'),
(4, 'HR', 0, 0, '2019-07-17 02:45:53', 0, '2019-07-18 01:16:00');

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
(4, 'Test email', 'Subject Email', 'PHA+SGkmbmJzcDs8L3A+DQoNCjxwPnNhbmpheSBoZXJlIGZvciB0ZXN0IGVtYWlsPC9wPg==', 'test-email-1', '2019-07-10 05:54:08', '2019-07-10 11:28:17'),
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
(38, 2, NULL, 101, 1, 24, '2019-07-20 01:35:26', '2019-07-20 01:35:26');

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
(5, 'CI Examples', 'example', '', 'view', 0),
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
(5, 1, 'admin', 'change_status', NULL, NULL),
(7, 1, 'admin_roles', 'view', NULL, NULL),
(8, 1, 'admin_roles', 'add', NULL, NULL),
(9, 1, 'admin_roles', 'edit', NULL, NULL),
(10, 1, 'admin_roles', 'delete', NULL, NULL),
(11, 1, 'admin_roles', 'change_status', NULL, NULL),
(24, 1, 'invoices', 'add', NULL, NULL),
(25, 1, 'invoices', 'edit', NULL, NULL),
(26, 1, 'invoices', 'delete', NULL, NULL),
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
(76, 1, 'admin', 'edit', NULL, NULL),
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
(178, 1, 'example', 'view', NULL, NULL),
(179, 1, 'joins', 'view', NULL, NULL),
(180, 1, 'export', 'view', NULL, NULL),
(181, 7, 'users', 'add', NULL, NULL),
(183, 1, 'admin', 'add', NULL, NULL),
(185, 1, 'invoices', 'view', NULL, NULL),
(186, 1, 'users', 'view', NULL, NULL),
(187, 1, 'admin', 'view', NULL, NULL),
(188, 1, 'admin', 'delete', NULL, NULL),
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
(238, 1, 'users', 'delete', NULL, NULL),
(240, 1, 'users', 'edit', NULL, NULL),
(242, 1, 'users', 'add', NULL, NULL),
(243, 1, 'users', 'change_status', NULL, NULL),
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
(265, 3, 'admin_roles', 'add', '2019-07-18 02:05:47', '2019-07-18 02:05:47');

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
(4, 'User2', 'user2', 'user2', 'user2@gmail.com', '2342467891', '1234', 'saddvd', 1, 1, 0, 0, NULL, NULL, NULL, '2019-07-17 07:33:14', '2019-07-17 07:33:14');

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
(23, 'Page 9', 'customized', 'page-9', 'wsadv', 'Self', 1, '2019-07-18 07:58:19', '2019-07-18 08:18:34');

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
(1, 'site_logo', NULL, NULL, '2019-07-20 00:55:48'),
(2, 'hidden_tab', 'email_setting', NULL, '2019-07-20 00:56:55'),
(3, 'contact_address', NULL, NULL, '2019-07-20 00:55:48'),
(4, 'lat', NULL, NULL, '2019-07-20 00:55:48'),
(5, 'long', NULL, NULL, '2019-07-20 00:55:48'),
(6, 'admin_email', 'phpdev4@worldwebtechnology.in', NULL, NULL),
(7, 'facebook_link', 'https://www.facebook.com/', NULL, '2019-07-20 00:56:04'),
(8, 'twitter_link', 'https://twitter.com/', NULL, '2019-07-20 00:56:04'),
(9, 'instagram_link', 'https://www.instagram.com/', NULL, '2019-07-20 00:56:04'),
(10, 'youtube_link', 'https://www.youtube.com/', NULL, '2019-07-20 00:56:04'),
(11, 'reCAPTCHA_key', '6Ld205gUAAAAABrAt1GwkJTzkMtdPEEcuLcn1dR2', NULL, '2019-07-20 00:56:17'),
(12, 'reCAPTCHA_secret', '6Ld205gUAAAAAGngK2ybDJpHd7omqsJ-vK_Iz6vR', NULL, '2019-07-20 00:56:17'),
(13, 'google_api_key', 'AIzaSyARX_8I2ngA1OY_GZHI9ZNdn1p3-lhu2YE', NULL, NULL),
(14, 'mail_sending_method', 'php_mail', NULL, '2019-07-20 00:56:55'),
(15, 'smtp_host', 'ssl://smtp.gmail.com', NULL, NULL),
(16, 'smtp_port', '465', NULL, NULL),
(17, 'smtp_tls_ssl_opt', 'tls', NULL, NULL),
(18, 'smtp_user', 'worldwebsmtptesting@gmail.com', NULL, NULL),
(19, 'smtp_pass', 'worldweb@1234', NULL, NULL),
(20, 'smtp_mail_from', 'no-reply@adminlte.com', NULL, NULL),
(21, 'test_mail_sending_method', 'smtp', NULL, NULL),
(22, 'test_to_mail', 'phpdev4@worldwebtechnology.in', NULL, '2019-07-20 00:56:55'),
(23, 'test_subject', 'test', NULL, '2019-07-20 00:56:55'),
(24, 'test_email_body', '<p>Hello,</p>\r\n                                    <p>This is Test message</p>', NULL, '2019-07-20 00:55:48'),
(25, '_token', 'TKJdUIP2UHarmYqfElT74Un9hdlgLtQW9t1xlH40', NULL, NULL);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `admin_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `newusers`
--
ALTER TABLE `newusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
