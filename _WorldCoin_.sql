-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 03:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wc_db`
--
CREATE DATABASE IF NOT EXISTS `wc_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `acct_details`
--

CREATE TABLE `acct_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acct_reqs`
--

CREATE TABLE `acct_reqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_acct_type` int(11) NOT NULL,
  `new_acct_type` int(11) NOT NULL,
  `resolved` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acct_types`
--

CREATE TABLE `acct_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acct_types`
--

INSERT INTO `acct_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, NULL),
(2, 'Teacher', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `btcs`
--

CREATE TABLE `btcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `btcs`
--

INSERT INTO `btcs` (`id`, `address`, `email`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdfghjkloiuytrewq', 'micheal@prime.com', 1, NULL, '2017-11-07 17:25:46', '2017-11-07 17:26:29'),
(2, 'qwertyuioplkjhgfdsa', '', 0, NULL, '2017-11-07 17:25:53', '2017-11-07 18:10:46'),
(3, 'ndfbhnmsdfnksdfsdfsd', '', 0, NULL, '2017-11-08 05:26:43', '2017-11-08 06:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Trading', NULL, NULL, NULL),
(2, 'Withdrawal', NULL, NULL, NULL),
(3, 'Account Upgrade', NULL, NULL, NULL),
(4, 'Referrals', NULL, NULL, NULL),
(5, 'Matrix', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_b_t_cs`
--

CREATE TABLE `email_b_t_cs` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `btc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `error_loggers`
--

CREATE TABLE `error_loggers` (
  `id` int(10) UNSIGNED NOT NULL,
  `error_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_entries`
--

CREATE TABLE `file_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'LOW',
  `read_count` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `user_id`, `message`, `priority`, `read_count`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15, 'Hello', 'MEDIUM', 4, NULL, '2017-11-10 20:47:28', '2017-11-10 21:07:42'),
(2, 15, 'Hello Low', 'LOW', 4, NULL, '2017-11-10 21:03:07', '2017-11-10 21:07:42'),
(3, 15, 'Hello High', 'HIGH', 4, NULL, '2017-11-10 21:03:20', '2017-11-10 21:07:42'),
(4, 15, 'Hello You Randome', 'MEDIUM', 4, NULL, '2017-11-10 21:08:24', '2017-11-10 21:09:07'),
(5, 14, 'Hello Bozz', 'HIGH', 1, NULL, '2017-11-14 06:06:30', '2017-11-14 06:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(10) UNSIGNED NOT NULL,
  `inv_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(15,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `irate` int(11) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `month_count` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL,
  `inv_bon` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_accounts`
--

CREATE TABLE `main_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ref_bal` float(100,2) NOT NULL,
  `trade_bal` double(100,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_04_200827_create_payment_types_table', 1),
(4, '2017_10_04_200845_create_registration_types_table', 1),
(5, '2017_10_04_214522_create_error_loggers_table', 2),
(6, '2017_10_05_105714_create_transactions_table', 3),
(7, '2017_10_05_105724_create_t_names_table', 3),
(8, '2017_10_05_105733_create_t_statuses_table', 3),
(9, '2017_10_05_105808_create_t_types_table', 3),
(10, '2017_10_05_111327_create_investments_table', 4),
(11, '2017_10_05_135345_create_t_classes_table', 5),
(12, '2017_10_06_175022_create_main_accts_table', 6),
(13, '2017_10_06_181543_create_main_accounts_table', 7),
(14, '2017_10_06_202835_create_referrals_table', 8),
(15, '2017_10_06_211723_create_acct_types_table', 9),
(16, '2017_10_07_063859_create_acct_reqs_table', 10),
(17, '2017_10_07_065524_create_utilities_table', 11),
(18, '2017_10_07_212742_create_withdrawals_table', 12),
(19, '2017_10_10_055400_create_user_invs_table', 13),
(20, '2017_10_10_105111_create_tickets_table', 14),
(21, '2017_10_10_105234_create_comments_table', 14),
(22, '2017_10_10_105332_create_categories_table', 14),
(23, '2017_10_10_150101_create_reset_passwords_table', 15),
(24, '2017_10_10_192336_create_user_temps_table', 16),
(25, '2017_10_16_060736_create_file_entries_table', 17),
(26, '2017_10_16_060807_create_email_b_t_cs_table', 17),
(27, '2017_10_16_060850_create_btcs_table', 17),
(28, '2017_10_16_093139_create_school_fees_table', 18),
(29, '2017_10_17_175433_create_acct_details_table', 19),
(30, '2017_11_10_194506_infos', 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bank Deposit', NULL, NULL, NULL),
(2, 'Bitcoin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `referred` int(11) NOT NULL,
  `referrer` int(11) NOT NULL,
  `base_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_ex` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `referred`, `referrer`, `base_link`, `ref_link`, `link_ex`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15, 14, NULL, '14_15', 0, NULL, '2017-11-07 19:34:34', '2017-11-07 19:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `registration_types`
--

CREATE TABLE `registration_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration_types`
--

INSERT INTO `registration_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Matrix Only', NULL, NULL),
(2, 'Trading Only', NULL, NULL),
(3, 'Matrix And Trading', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_type` int(11) NOT NULL,
  `hash_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pop` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolved` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `res` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `category_id`, `ticket_id`, `title`, `message`, `status`, `res`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 'ILNOFSAPM0', 'Trading Approval Not Granted', 'Hello There', 'Open', 1, NULL, '2017-11-08 09:06:00', '2017-11-08 09:49:58'),
(2, 15, 1, 'QTLAQMPHNI', 'Trading Approval Not Granted', 'Hello There', 'Open', 1, NULL, '2017-11-08 09:07:34', '2017-11-08 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `t_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `descn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tn_id` int(11) NOT NULL,
  `t_type` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `t_id`, `user_id`, `amount`, `descn`, `tn_id`, `t_type`, `ts_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'b7Q3PeQQRiAx0ZWOMNVS', 14, 5.00, 'Referral Bonus - 14_15', 3, 1, 1, NULL, '2017-11-07 19:34:34', '2017-11-07 19:34:34'),
(3, 'TQmHed7k9HuqoE5O4pbx', 15, 100000.00, 'Trade - 1GtCIjEHI6K8Xbiz3Dvr', 1, 2, 1, NULL, '2017-11-08 09:53:55', '2017-11-08 09:53:55'),
(4, 'zUAFQFwrZC07cwtn8FwU', 14, 5000.00, 'Investment One Time Bonus - 1GtCIjEHI6K8Xbiz3Dvr', 6, 1, 1, NULL, '2017-11-08 09:53:55', '2017-11-08 09:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `t_classes`
--

CREATE TABLE `t_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_classes`
--

INSERT INTO `t_classes` (`id`, `name`, `target`, `created_at`, `updated_at`) VALUES
(1, 'Bronze', 3, NULL, NULL),
(2, 'Silver', 6, NULL, NULL),
(3, 'Gold', 9, NULL, NULL),
(4, 'Ruby', 12, NULL, NULL),
(5, 'Diamond', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_names`
--

CREATE TABLE `t_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_names`
--

INSERT INTO `t_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trading', NULL, NULL),
(2, 'Withdrawal', NULL, NULL),
(3, 'Referral Bonus', NULL, NULL),
(4, 'Trading Profit', NULL, NULL),
(5, 'T-Capital Return', NULL, NULL),
(6, 'Investment Bonus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_statuses`
--

CREATE TABLE `t_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_statuses`
--

INSERT INTO `t_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Successful', NULL, NULL),
(2, 'Failed', NULL, NULL),
(3, 'Pending Authorization', NULL, NULL),
(4, 'Cancelled By You', NULL, NULL),
(5, 'Cancelled by Admin', NULL, NULL),
(6, 'Running', NULL, NULL),
(7, 'Completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_types`
--

CREATE TABLE `t_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_types`
--

INSERT INTO `t_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'IN', NULL, NULL),
(2, 'OUT', NULL, NULL),
(3, 'BONUS/IN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acc_id` int(11) NOT NULL DEFAULT '1',
  `reg_type` int(11) NOT NULL DEFAULT '1',
  `referrer_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT '0',
  `r_mark` int(11) DEFAULT NULL,
  `r_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` int(11) NOT NULL DEFAULT '1',
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '3',
  `start_date` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `acc_id`, `reg_type`, `referrer_id`, `class_id`, `r_mark`, `r_link`, `payment_id`, `activated`, `is_active`, `role_id`, `start_date`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'prime prime', 'prime@prime.com', '$2y$10$xWj.SMvOawkolaoZrHiXeOq/5SvlqI42sPXofuONxCn1qtNzFgmpa', 1, 1, NULL, 0, 0, 'prime1507205772', 1, 1, 1, 1, NULL, NULL, 'PSeRg57GR6AYcxppWs3fwoN4oafVlxJxLjfk0US3rNz24N0LHbutxbD8vmVQ', '2017-10-05 11:16:12', '2017-11-07 18:13:07'),
(14, 'Micheal Akin', 'micheal@prime.com', '$2y$10$ypWPX2gnxQc5Yhq3fez6Y.H7we5UZE6fCBE3E1iR9OQWQazfVhsaC', 1, 2, NULL, 0, 2, 'Micheal1510079189', 2, 1, 1, 3, '2017-11-07 18:59:47', NULL, 'FQ3FJZPQjEFbVI45DhKsEUniwcOpKdkC6frsxpf3xDLh1vFFqEOSvbEPhiBw', '2017-11-07 17:26:29', '2017-11-07 19:34:34'),
(15, 'abiola@prime.com', 'abiola@prime.com', '$2y$10$L5HTBpVxrDuyPcOZzG.26OkeYqZBEcTcwBmdIUuEv48aM2u.DJTtW', 1, 2, 14, 0, 0, 'abiola@prime.com1510081846', 2, 1, 1, 3, '2017-11-07 19:34:34', NULL, '4XCRupzGVFN67pjGrtgWOlNCIAEmcCHFFrt7DES1Jk9QiEhwsAbdA4nUtBMB', '2017-11-07 18:10:46', '2017-11-07 19:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_invs`
--

CREATE TABLE `user_invs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gb` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_invs`
--

INSERT INTO `user_invs` (`id`, `user_id`, `gb`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, 1, NULL, '2017-11-07 19:59:59', '2017-11-07 19:59:59'),
(2, 15, 1, NULL, '2017-11-08 09:53:55', '2017-11-08 09:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_temps`
--

CREATE TABLE `user_temps` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Withdrawal', '1', NULL, NULL, '2017-10-10 13:44:11'),
(2, 'Entry Fee(Matrix Only)', '0', NULL, NULL, NULL),
(3, 'Entry Fee(Matrix and Trading)', '0', NULL, NULL, NULL),
(4, 'Entry Fee(Trading Only)', '0', NULL, NULL, NULL),
(5, 'Naira Rate', '1', NULL, NULL, NULL),
(6, 'Dollar Rate', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `w_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `t_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `w_id`, `t_id`, `user_id`, `ts_id`, `created_at`, `updated_at`) VALUES
(1, 'gAXZVvcnO8d5lNE65NkG', '1 - Declined', 14, 5, '2017-11-07 19:37:00', '2017-11-07 19:37:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acct_details`
--
ALTER TABLE `acct_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acct_reqs`
--
ALTER TABLE `acct_reqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acct_types`
--
ALTER TABLE `acct_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btcs`
--
ALTER TABLE `btcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_b_t_cs`
--
ALTER TABLE `email_b_t_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_loggers`
--
ALTER TABLE `error_loggers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_entries`
--
ALTER TABLE `file_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_accounts`
--
ALTER TABLE `main_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_types`
--
ALTER TABLE `registration_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_classes`
--
ALTER TABLE `t_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_names`
--
ALTER TABLE `t_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_statuses`
--
ALTER TABLE `t_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_types`
--
ALTER TABLE `t_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_invs`
--
ALTER TABLE `user_invs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_temps`
--
ALTER TABLE `user_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acct_details`
--
ALTER TABLE `acct_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acct_reqs`
--
ALTER TABLE `acct_reqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acct_types`
--
ALTER TABLE `acct_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `btcs`
--
ALTER TABLE `btcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_b_t_cs`
--
ALTER TABLE `email_b_t_cs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `error_loggers`
--
ALTER TABLE `error_loggers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_entries`
--
ALTER TABLE `file_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_accounts`
--
ALTER TABLE `main_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration_types`
--
ALTER TABLE `registration_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_classes`
--
ALTER TABLE `t_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_names`
--
ALTER TABLE `t_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_statuses`
--
ALTER TABLE `t_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_types`
--
ALTER TABLE `t_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_invs`
--
ALTER TABLE `user_invs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_temps`
--
ALTER TABLE `user_temps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
