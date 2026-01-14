-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuad_bnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_contents`
--

CREATE TABLE `about_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL DEFAULT 'আমার সম্পর্কে',
  `page_subtitle` text DEFAULT NULL,
  `bio_image` varchar(255) DEFAULT NULL,
  `bio_title` varchar(255) NOT NULL DEFAULT 'রাজনৈতিক নেতা ও সমাজসেবক',
  `bio_description_1` text DEFAULT NULL,
  `bio_description_2` text DEFAULT NULL,
  `full_name` varchar(255) NOT NULL DEFAULT 'BNP রাজনৈতিক নেতা',
  `party_name` varchar(255) NOT NULL DEFAULT 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)',
  `constituency` varchar(255) NOT NULL DEFAULT 'ঢাকা, বাংলাদেশ',
  `experience` varchar(255) NOT NULL DEFAULT '১০+ বছর জনসেবা',
  `quote_text` text DEFAULT NULL,
  `quote_author` varchar(255) NOT NULL DEFAULT 'রাজনৈতিক নেতা',
  `vision_cards` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`vision_cards`)),
  `timeline_events` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`timeline_events`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_contents`
--

INSERT INTO `about_contents` (`id`, `page_title`, `page_subtitle`, `bio_image`, `bio_title`, `bio_description_1`, `bio_description_2`, `full_name`, `party_name`, `constituency`, `experience`, `quote_text`, `quote_author`, `vision_cards`, `timeline_events`, `created_at`, `updated_at`) VALUES
(1, 'আমার সম্পর্কে', 'জনগণের সেবায় নিবেদিত একজন আদর্শিক রাজনৈতিক নেতা', 'about/jrKLIePhVOzohE8mjV8nNx1ay9TAYGFJCMAH3iIr.jpg', 'রাজনৈতিক নেতা ও সমাজসেবক', 'বাংলাদেশ জাতীয়তাবাদী দল (BNP) এর একজন নিবেদিতপ্রাণ রাজনীতিবিদ এবং জনসেবক। দীর্ঘ বছরের রাজনৈতিক অভিজ্ঞতা এবং জনগণের প্রতি অকৃত্রিম ভালোবাসা নিয়ে কাজ করে যাচ্ছেন।', 'ছাত্র রাজনীতির মাধ্যমে রাজনৈতিক জীবন শুরু। তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন এবং শিক্ষা, স্বাস্থ্য ও সামাজিক উন্নয়নে অগ্রণী ভূমিকা পালন করছেন।', 'BNP রাজনৈতিক নেতা', 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)', 'ঢাকা, বাংলাদেশ', '১০+ বছর জনসেবা', 'গণতন্ত্র, ন্যায়বিচার এবং সমান সুযোগ—এই তিনটি স্তম্ভের উপর দাঁড়িয়ে আমরা গড়ব একটি সুন্দর বাংলাদেশ।', 'রাজনৈতিক নেতা', '[{\"title\":\"\\u0997\\u09a3\\u09a4\\u09a8\\u09cd\\u09a4\\u09cd\\u09b0 \\u09b8\\u09c1\\u09b0\\u0995\\u09cd\\u09b7\\u09be\",\"description\":\"\\u09aa\\u09cd\\u09b0\\u0995\\u09c3\\u09a4 \\u0997\\u09a3\\u09a4\\u09be\\u09a8\\u09cd\\u09a4\\u09cd\\u09b0\\u09bf\\u0995 \\u09ae\\u09c2\\u09b2\\u09cd\\u09af\\u09ac\\u09cb\\u09a7 \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09b7\\u09cd\\u09a0\\u09be \\u0995\\u09b0\\u09be \\u098f\\u09ac\\u0982 \\u099c\\u09a8\\u0997\\u09a3\\u09c7\\u09b0 \\u09ae\\u09a4\\u09be\\u09ae\\u09a4\\u0995\\u09c7 \\u09b8\\u09b0\\u09cd\\u09ac\\u09cb\\u099a\\u09cd\\u099a \\u0997\\u09c1\\u09b0\\u09c1\\u09a4\\u09cd\\u09ac \\u09aa\\u09cd\\u09b0\\u09a6\\u09be\\u09a8 \\u0995\\u09b0\\u09be\\u0964\"},{\"title\":\"\\u0985\\u09b0\\u09cd\\u09a5\\u09a8\\u09c8\\u09a4\\u09bf\\u0995 \\u0989\\u09a8\\u09cd\\u09a8\\u09af\\u09bc\\u09a8\",\"description\":\"\\u0995\\u09b0\\u09cd\\u09ae\\u09b8\\u0982\\u09b8\\u09cd\\u09a5\\u09be\\u09a8 \\u09b8\\u09c3\\u09b7\\u09cd\\u099f\\u09bf, \\u09b6\\u09bf\\u09b2\\u09cd\\u09aa\\u09be\\u09af\\u09bc\\u09a8 \\u098f\\u09ac\\u0982 \\u09ac\\u09cd\\u09af\\u09ac\\u09b8\\u09be-\\u09ac\\u09be\\u09a3\\u09bf\\u099c\\u09cd\\u09af\\u09c7\\u09b0 \\u09b8\\u09c1\\u09af\\u09cb\\u0997 \\u09ac\\u09c3\\u09a6\\u09cd\\u09a7\\u09bf\\u09b0 \\u09ae\\u09be\\u09a7\\u09cd\\u09af\\u09ae\\u09c7 \\u09a6\\u09c7\\u09b6\\u09c7\\u09b0 \\u0985\\u09b0\\u09cd\\u09a5\\u09a8\\u09c0\\u09a4\\u09bf \\u09b6\\u0995\\u09cd\\u09a4\\u09bf\\u09b6\\u09be\\u09b2\\u09c0 \\u0995\\u09b0\\u09be\\u0964\"},{\"title\":\"\\u09b8\\u09be\\u09ae\\u09be\\u099c\\u09bf\\u0995 \\u09a8\\u09cd\\u09af\\u09be\\u09af\\u09bc\\u09ac\\u09bf\\u099a\\u09be\\u09b0\",\"description\":\"\\u09b8\\u09ae\\u09be\\u099c\\u09c7\\u09b0 \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u099f\\u09bf \\u09ae\\u09be\\u09a8\\u09c1\\u09b7\\u09c7\\u09b0 \\u099c\\u09a8\\u09cd\\u09af \\u09b8\\u09ae\\u09be\\u09a8 \\u0985\\u09a7\\u09bf\\u0995\\u09be\\u09b0, \\u09b8\\u09c1\\u09af\\u09cb\\u0997 \\u098f\\u09ac\\u0982 \\u09ae\\u09b0\\u09cd\\u09af\\u09be\\u09a6\\u09be \\u09a8\\u09bf\\u09b6\\u09cd\\u099a\\u09bf\\u09a4 \\u0995\\u09b0\\u09be\\u0964\"},{\"title\":\"\\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09be \\u0993 \\u09b8\\u09cd\\u09ac\\u09be\\u09b8\\u09cd\\u09a5\\u09cd\\u09af\",\"description\":\"\\u09ae\\u09be\\u09a8\\u09b8\\u09ae\\u09cd\\u09ae\\u09a4 \\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09be \\u0993 \\u09b8\\u09c1\\u09b2\\u09ad \\u09b8\\u09cd\\u09ac\\u09be\\u09b8\\u09cd\\u09a5\\u09cd\\u09af\\u09b8\\u09c7\\u09ac\\u09be \\u09aa\\u09cd\\u09b0\\u09a6\\u09be\\u09a8\\u09c7\\u09b0 \\u09ae\\u09be\\u09a7\\u09cd\\u09af\\u09ae\\u09c7 \\u098f\\u0995\\u099f\\u09bf \\u09b8\\u09c1\\u09b8\\u09cd\\u09a5 \\u0993 \\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09bf\\u09a4 \\u09b8\\u09ae\\u09be\\u099c \\u0997\\u09a0\\u09a8\\u0964\"},{\"title\":\"\\u09a6\\u09c1\\u09b0\\u09cd\\u09a8\\u09c0\\u09a4\\u09bf \\u09ae\\u09c1\\u0995\\u09cd\\u09a4 \\u09b8\\u09ae\\u09be\\u099c\",\"description\":\"\\u09b8\\u09cd\\u09ac\\u099a\\u09cd\\u099b\\u09a4\\u09be, \\u099c\\u09ac\\u09be\\u09ac\\u09a6\\u09bf\\u09b9\\u09bf\\u09a4\\u09be \\u098f\\u09ac\\u0982 \\u09b8\\u09c1\\u09b6\\u09be\\u09b8\\u09a8 \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09b7\\u09cd\\u09a0\\u09be\\u09b0 \\u09ae\\u09be\\u09a7\\u09cd\\u09af\\u09ae\\u09c7 \\u09a6\\u09c1\\u09b0\\u09cd\\u09a8\\u09c0\\u09a4\\u09bf\\u09ae\\u09c1\\u0995\\u09cd\\u09a4 \\u09ac\\u09be\\u0982\\u09b2\\u09be\\u09a6\\u09c7\\u09b6 \\u0997\\u09a1\\u09bc\\u09be\\u0964\"},{\"title\":\"\\u09af\\u09c1\\u09ac \\u0989\\u09a8\\u09cd\\u09a8\\u09af\\u09bc\\u09a8\",\"description\":\"\\u09a4\\u09b0\\u09c1\\u09a3 \\u09aa\\u09cd\\u09b0\\u099c\\u09a8\\u09cd\\u09ae\\u0995\\u09c7 \\u09a6\\u0995\\u09cd\\u09b7 \\u0993 \\u0986\\u09a4\\u09cd\\u09ae\\u09a8\\u09bf\\u09b0\\u09cd\\u09ad\\u09b0\\u09b6\\u09c0\\u09b2 \\u0995\\u09b0\\u09c7 \\u09a4\\u09cb\\u09b2\\u09be \\u098f\\u09ac\\u0982 \\u09a4\\u09be\\u09a6\\u09c7\\u09b0 \\u09a8\\u09c7\\u09a4\\u09c3\\u09a4\\u09cd\\u09ac \\u09ac\\u09bf\\u0995\\u09be\\u09b6\\u09c7 \\u09b8\\u09b9\\u09be\\u09af\\u09bc\\u09a4\\u09be \\u0995\\u09b0\\u09be\\u0964\"}]', '[{\"year\":\"\\u09e8\\u09e6\\u09e7\\u09e6\",\"title\":\"\\u099b\\u09be\\u09a4\\u09cd\\u09b0 \\u09b0\\u09be\\u099c\\u09a8\\u09c0\\u09a4\\u09bf\\u09a4\\u09c7 \\u09af\\u09c1\\u0995\\u09cd\\u09a4\",\"description\":\"\\u099b\\u09be\\u09a4\\u09cd\\u09b0 \\u0986\\u09a8\\u09cd\\u09a6\\u09cb\\u09b2\\u09a8\\u09c7\\u09b0 \\u09ae\\u09be\\u09a7\\u09cd\\u09af\\u09ae\\u09c7 \\u09b0\\u09be\\u099c\\u09a8\\u09c8\\u09a4\\u09bf\\u0995 \\u099c\\u09c0\\u09ac\\u09a8\\u09c7\\u09b0 \\u09b8\\u09c2\\u099a\\u09a8\\u09be\\u0964 \\u09a4\\u09b0\\u09c1\\u09a3\\u09a6\\u09c7\\u09b0 \\u0985\\u09a7\\u09bf\\u0995\\u09be\\u09b0 \\u0986\\u09a6\\u09be\\u09af\\u09bc\\u09c7 \\u09a8\\u09c7\\u09a4\\u09c3\\u09a4\\u09cd\\u09ac \\u09aa\\u09cd\\u09b0\\u09a6\\u09be\\u09a8\\u0964\"},{\"year\":\"\\u09e8\\u09e6\\u09e7\\u09e9\",\"title\":\"BNP \\u09a4\\u09c7 \\u09af\\u09cb\\u0997\\u09a6\\u09be\\u09a8\",\"description\":\"\\u09ac\\u09be\\u0982\\u09b2\\u09be\\u09a6\\u09c7\\u09b6 \\u099c\\u09be\\u09a4\\u09c0\\u09af\\u09bc\\u09a4\\u09be\\u09ac\\u09be\\u09a6\\u09c0 \\u09a6\\u09b2\\u09c7 \\u0986\\u09a8\\u09c1\\u09b7\\u09cd\\u09a0\\u09be\\u09a8\\u09bf\\u0995\\u09ad\\u09be\\u09ac\\u09c7 \\u09af\\u09c1\\u0995\\u09cd\\u09a4 \\u09b9\\u09a8 \\u098f\\u09ac\\u0982 \\u09b8\\u09cd\\u09a5\\u09be\\u09a8\\u09c0\\u09af\\u09bc \\u09aa\\u09b0\\u09cd\\u09af\\u09be\\u09af\\u09bc\\u09c7 \\u09b8\\u09be\\u0982\\u0997\\u09a0\\u09a8\\u09bf\\u0995 \\u09a6\\u09be\\u09af\\u09bc\\u09bf\\u09a4\\u09cd\\u09ac \\u09aa\\u09be\\u09b2\\u09a8 \\u09b6\\u09c1\\u09b0\\u09c1\\u0964\"},{\"year\":\"\\u09e8\\u09e6\\u09e7\\u09ec\",\"title\":\"\\u09b8\\u09be\\u09ae\\u09be\\u099c\\u09bf\\u0995 \\u0989\\u09a8\\u09cd\\u09a8\\u09af\\u09bc\\u09a8 \\u0995\\u09b0\\u09cd\\u09ae\\u09b8\\u09c2\\u099a\\u09bf\",\"description\":\"\\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09be, \\u09b8\\u09cd\\u09ac\\u09be\\u09b8\\u09cd\\u09a5\\u09cd\\u09af \\u0993 \\u09a6\\u09be\\u09b0\\u09bf\\u09a6\\u09cd\\u09b0\\u09cd\\u09af \\u09ac\\u09bf\\u09ae\\u09cb\\u099a\\u09a8\\u09c7 \\u09ac\\u09bf\\u09ad\\u09bf\\u09a8\\u09cd\\u09a8 \\u0989\\u09a6\\u09cd\\u09af\\u09cb\\u0997 \\u0997\\u09cd\\u09b0\\u09b9\\u09a3\\u0964 \\u09b8\\u09cd\\u09a5\\u09be\\u09a8\\u09c0\\u09af\\u09bc \\u099c\\u09a8\\u0997\\u09a3\\u09c7\\u09b0 \\u09b8\\u09c7\\u09ac\\u09be\\u09af\\u09bc \\u09a8\\u09bf\\u09af\\u09bc\\u09cb\\u099c\\u09bf\\u09a4\\u0964\"},{\"year\":\"\\u09e8\\u09e6\\u09e7\\u09ef\",\"title\":\"\\u099c\\u09c7\\u09b2\\u09be \\u09aa\\u09b0\\u09cd\\u09af\\u09be\\u09af\\u09bc\\u09c7\\u09b0 \\u09a8\\u09c7\\u09a4\\u09c3\\u09a4\\u09cd\\u09ac\",\"description\":\"\\u09a6\\u09b2\\u09c7\\u09b0 \\u099c\\u09c7\\u09b2\\u09be \\u0995\\u09ae\\u09bf\\u099f\\u09bf\\u09a4\\u09c7 \\u0997\\u09c1\\u09b0\\u09c1\\u09a4\\u09cd\\u09ac\\u09aa\\u09c2\\u09b0\\u09cd\\u09a3 \\u09a6\\u09be\\u09af\\u09bc\\u09bf\\u09a4\\u09cd\\u09ac \\u09b2\\u09be\\u09ad\\u0964 \\u0986\\u099e\\u09cd\\u099a\\u09b2\\u09bf\\u0995 \\u0989\\u09a8\\u09cd\\u09a8\\u09af\\u09bc\\u09a8\\u09c7 \\u09ac\\u09b2\\u09bf\\u09b7\\u09cd\\u09a0 \\u09ad\\u09c2\\u09ae\\u09bf\\u0995\\u09be\\u0964\"},{\"year\":\"\\u09e8\\u09e6\\u09e8\\u09e9 - \\u09ac\\u09b0\\u09cd\\u09a4\\u09ae\\u09be\\u09a8\",\"title\":\"\\u099c\\u09a8\\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09a8\\u09bf\\u09a7\\u09bf \\u09aa\\u09cd\\u09b0\\u09be\\u09b0\\u09cd\\u09a5\\u09c0\",\"description\":\"\\u0986\\u09b8\\u09a8\\u09cd\\u09a8 \\u09a8\\u09bf\\u09b0\\u09cd\\u09ac\\u09be\\u099a\\u09a8\\u09c7 \\u099c\\u09a8\\u0997\\u09a3\\u09c7\\u09b0 \\u09ac\\u09bf\\u09b6\\u09cd\\u09ac\\u09be\\u09b8 \\u0985\\u09b0\\u09cd\\u099c\\u09a8 \\u098f\\u09ac\\u0982 \\u0989\\u09a8\\u09cd\\u09a8\\u09af\\u09bc\\u09a8\\u09c7\\u09b0 \\u09a8\\u09a4\\u09c1\\u09a8 \\u09a6\\u09bf\\u0997\\u09a8\\u09cd\\u09a4 \\u0996\\u09c1\\u09b2\\u09c7 \\u09a6\\u09bf\\u09a4\\u09c7 \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09b6\\u09cd\\u09b0\\u09c1\\u09a4\\u09bf\\u09ac\\u09a6\\u09cd\\u09a7\\u0964\"}]', '2026-01-13 12:19:14', '2026-01-13 12:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'social',
  `order` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `image`, `title`, `description`, `category`, `order`, `active`, `created_at`, `updated_at`) VALUES
(1, 'activities/bylFn1CRL6AIOAbBdbB6KDLRxewZSm7PPCrb3AI3.jpg', 'মানবিক সহায়তা', 'দরিদ্র পরিবারে খাদ্য সামগ্রী বিতরণ', 'social', 1, 1, '2026-01-13 11:16:45', '2026-01-14 04:49:18'),
(2, 'activities/x5iVy1ABMki8hI6GyWwB9MpQf8QwaM5giVAo52yO.jpg', 'স্বাস্থ্যসেবা কর্মসূচি', 'বিনামূল্যে চিকিৎসা শিবির', 'health', 2, 1, '2026-01-13 11:16:45', '2026-01-14 03:22:00'),
(3, 'activities/rRXSUWrs904y7DVxDG7LxB9ix4xk2IpwxItaQahk.jpg', 'শিক্ষা সহায়তা', 'মেধাবী শিক্ষার্থীদের বৃত্তি প্রদান', 'education', 3, 1, '2026-01-13 11:16:45', '2026-01-13 11:47:57'),
(4, 'activities/n6k6Ecry1RL4ojJzwT8O8S4qhU1rOPGLflAUrZ2n.jpg', 'জনসভা ও মিটিং', 'জনগণের সাথে সরাসরি মতবিনিময়', 'events', 4, 1, '2026-01-13 11:16:45', '2026-01-14 04:20:12'),
(5, 'activities/OqFFjiF05SDEp7eSMnBXfiyvKrSV5Uwe9uPDyLUE.jpg', 'শীতবস্ত্র বিতরণ', 'শীতার্ত মানুষের মাঝে কম্বল ও শীতবস্ত্র বিতরণ', 'social', 5, 1, '2026-01-13 11:16:45', '2026-01-13 11:19:03'),
(6, 'activities/QwxnnlqSvYCV9aR1qv9ZdSYPtaTXvTPybuZjErN1.jpg', 'স্বাস্থ্য সচেতনতা', 'জনগণকে স্বাস্থ্য বিষয়ে সচেতন করা', 'health', 6, 1, '2026-01-13 11:16:45', '2026-01-14 03:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Fahim Shariar', 'shariarfahim21@gmail.com', '01892382840', 'support', 'vhcvxcv', 1, '2026-01-13 13:02:14', '2026-01-13 13:02:26'),
(2, 'Fahim Shariar', NULL, '+8801892382840', 'support', 'test', 0, '2026-01-14 02:45:27', '2026-01-14 02:45:27'),
(3, 'Fahim Shariar', NULL, '01892382840', 'volunteer', 'test data sent', 0, '2026-01-14 04:49:48', '2026-01-14 04:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `badge_text` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `secondary_button_text` varchar(255) DEFAULT NULL,
  `secondary_button_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `title`, `subtitle`, `badge_text`, `button_text`, `button_url`, `secondary_button_text`, `secondary_button_url`, `image`, `order`, `active`, `created_at`, `updated_at`) VALUES
(1, 'জনগণের সেবায় নিবেদিত', 'আমরা দেশের উন্নয়ন এবং সমৃদ্ধির জন্য কাজ করছি', 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)', 'আজই যোগ দিন', '/contact', 'আরও জানুন', '/about', 'hero-slides/RmYeJSuBQHJLGev6XZj1PhWwsNpoXv9F87R5jIZu.jpg', 1, 1, '2026-01-13 11:16:45', '2026-01-14 05:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_13_142343_create_hero_slides_table', 1),
(5, '2026_01_13_145033_add_content_fields_to_hero_slides_table', 1),
(6, '2026_01_13_151101_create_site_contents_table', 1),
(7, '2026_01_13_165150_create_activities_table', 1),
(8, '2026_01_13_181511_create_about_contents_table', 2),
(9, '2026_01_13_185255_create_contact_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CPgTWIe8iLj8lCtsJSSMrHPkOazMGAS4Anyh9zPj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzlJMFRLT0VpU21DYlZqMmcyMmNFeGJwd2RDMTUzUVJjdHAzZTZQUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0IjtzOjU6InJvdXRlIjtzOjc6ImNvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768381795),
('h5pQAPa2okAlvwJR6N50fDvLxXpTmjyOi8jp7qJo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnU3eWh6N0tsYkNOQmd1RWRZMmVINktZNXRycGVKR2d1UHE1dWZKRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768388929),
('I3Fycs5DGk0PeDWaBdeGVFXHZ3qluQTpCOQcbTNW', 1, '192.168.0.10', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.151 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU1k2Z1lzUXg0bUNhWkRzSVpUcmh2OXVJRnppenJSOXVmbWN4NUFFayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly8xOTIuMTY4LjAuNzAvQ2xpZW50X3Byb2plY3QvRnVhZF9ibnAvcHVibGljL2FkbWluL2hlcm8tc2xpZGVzIjtzOjU6InJvdXRlIjtzOjIzOiJhZG1pbi5oZXJvLXNsaWRlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1768386572),
('mQ23P6OwRsuU25tSGSIeXWBB15buAWthsVDt65xP', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidEdISmU5SkRTMFlqb2g5MmVFTDcyM1kwM3dvZWVDc1hsMEpYbWRodiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3QvQ2xpZW50X3Byb2plY3QvRnVhZF9ibnAvYWRtaW4vaGVyby1zbGlkZXMiO3M6NToicm91dGUiO3M6MjM6ImFkbWluLmhlcm8tc2xpZGVzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1768389285),
('SrQmI45IKTPyuz891dPrAq4SJ0fGPgtv8lK3v0bA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2pXZDg5eWF4cDhRdmhQOFdWWFYwc3hGNjRLbkplNlFZWFY5aUNpTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0IjtzOjU6InJvdXRlIjtzOjc6ImNvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768381814);

-- --------------------------------------------------------

--
-- Table structure for table `site_contents`
--

CREATE TABLE `site_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contents`
--

INSERT INTO `site_contents` (`id`, `key`, `value`, `section`, `created_at`, `updated_at`) VALUES
(1, 'hero_badge_text', 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)', 'hero', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(2, 'hero_title', 'একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে', 'hero', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(3, 'hero_subtitle', 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।', 'hero', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(4, 'hero_button_primary', 'আজই যোগ দিন', 'hero', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(5, 'hero_button_secondary', 'আরও জানুন', 'hero', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(6, 'stat1_number', '১০+', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:55:35'),
(7, 'stat1_label', 'বছর সমাজ সেবা', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(8, 'stat2_number', '৫০+', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:55:35'),
(9, 'stat2_label', 'উদ্যোগ/প্রকল্প', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(10, 'stat3_number', '২৪/৭', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:55:35'),
(11, 'stat3_label', 'জনগণের পাশে', 'stats', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(12, 'goals_title', 'আমাদের লক্ষ্য', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(13, 'goals_subtitle', 'স্বাস্থ্য, শিক্ষা, কর্মসংস্থান, সামাজিক নিরাপত্তা এবং মানবিক সহায়তা—এগুলোকে অগ্রাধিকার দিয়ে টেকসই উন্নয়ন।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(14, 'goal1_icon', 'balance-scale', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(15, 'goal1_title', 'গণতন্ত্র ও ন্যায়বিচার', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(16, 'goal1_description', 'সকল নাগরিকের ভোটের অধিকার রক্ষা এবং স্বাধীন বিচার ব্যবস্থা নিশ্চিত করা আমাদের প্রধান লক্ষ্য।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(17, 'goal2_icon', 'graduation-cap', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(18, 'goal2_title', 'শিক্ষা ও স্বাস্থ্যসেবা', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(19, 'goal2_description', 'মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা সবার জন্য সহজলভ্য করা এবং দক্ষ জনশক্তি গড়ে তোলা।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(20, 'goal3_icon', 'chart-line', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(21, 'goal3_title', 'দেশীয় অর্থনীতি', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(22, 'goal3_description', 'দেশের অর্থনৈতিক উন্নয়ন ও কর্মসংস্থানের সুযোগ বৃদ্ধির জন্য কাজ করা এবং নতুন উদ্যোগ ও পরিকল্পনার মাধ্যমে দেশের অর্থনীতি শক্তিশালী করা।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(23, 'goal4_icon', 'venus', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(24, 'goal4_title', 'নারী অধিকার', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(25, 'goal4_description', 'নারী অধিকারের প্রতি প্রতিশ্রুতিবদ্ধ। এমন একটি সমাজ গড়ে তোলা যেখানে নারীরা সমান অধিকার ও মর্যাদা পাবে।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(26, 'goal5_icon', 'globe', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(27, 'goal5_title', 'বৈদেশিক নীতি', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(28, 'goal5_description', 'শক্তিশালী এবং বন্ধুত্বপূর্ণ বৈদেশিক নীতি গড়ে তোলা যা দেশের আন্তর্জাতিক সম্পর্ককে উন্নত করবে এবং বাণিজ্যিক সুযোগ সৃষ্টি করবে।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(29, 'goal6_icon', 'book-open', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(30, 'goal6_title', 'শিক্ষার প্রতি মনোযোগ', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(31, 'goal6_description', 'শিক্ষার মান উন্নয়ন এবং সবার জন্য সমান শিক্ষার সুযোগ নিশ্চিত করা। শিক্ষিত সমাজই দেশের পথ প্রদর্শক এবং উন্নয়নের চালিকা শক্তি।', 'goals', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(32, 'leader_image', 'leader-images/vVJPu6LmONzbzSjv1aA1BCohirHJcFJoVBzNLhlS.jpg', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:57:36'),
(33, 'leader_badge', 'তরুণ প্রজন্মের আদর্শ', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(34, 'leader_title', 'তরুণ প্রজন্মের আদর্শিক নেতা', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(35, 'leader_description', 'সকলের অংশগ্রহণে উন্নয়ন—মানুষের অধিকার, ন্যায়বিচার ও সমান সুযোগ নিশ্চিত করাই লক্ষ্য।', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(36, 'leader_bio', 'রাজনৈতিক জীবনের শুরু হয়েছিল ছাত্র রাজনীতিতে যোগদানের মাধ্যমে। একজন মেধাবী ছাত্রনেতা হিসেবে তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন।', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(37, 'leader_value1', 'জনসেবায় স্বচ্ছতা ও জবাবদিহিতা', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(38, 'leader_value2', 'দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(39, 'leader_value3', 'সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(40, 'leader_value4', 'শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার', 'leader', '2026-01-13 11:16:45', '2026-01-13 11:16:45'),
(42, 'footer_about_title', 'আমাদের সম্পর্কে', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(43, 'footer_about_text', 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(44, 'footer_facebook_url', 'facebook.com', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:59:29'),
(45, 'footer_youtube_url', '#', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(46, 'footer_twitter_url', '#', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(47, 'footer_phone', '+৮৮০ ১৮৯২-৩৮২৮৪০', 'footer', '2026-01-13 11:40:24', '2026-01-13 12:50:56'),
(48, 'footer_email', 'info@example.com', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(49, 'footer_address', 'ঢাকা, বাংলাদেশ', 'footer', '2026-01-13 11:40:24', '2026-01-13 11:40:24'),
(50, 'footer_copyright', 'মির্জা আব্বাস। সর্বস্বত্ব সংরক্ষিত।', 'footer', '2026-01-13 11:40:24', '2026-01-14 04:39:33'),
(51, 'about_logo', 'about/YNVNMf8z4eC3j2QRGiWUcL4BXXA1GUyFH5I1xIUd.png', 'about', '2026-01-13 11:40:24', '2026-01-13 11:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bnp.com', '2026-01-14 03:52:02', '$2y$12$WDzwm/23qStPKw9l4M0ZDejNSZg3VpirgoCEpY7mqKIXfaRnEj96u', NULL, '2026-01-14 03:52:02', '2026-01-14 03:52:02'),
(2, 'Fahim Shariar', 'shariarfahim21@gmail.com', NULL, '$2y$12$4pODV0oW7JbCJMCb311EB.I5nUXbu9tUkkU30lEaWVfIrYdxGDs5C', '3bzDo81zUMlGanf8aWzXO0EZ7vPOeIDkZAjP7Hjafcd8ezKQKjhanHPQk26g', '2026-01-14 03:59:36', '2026-01-14 03:59:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_contents`
--
ALTER TABLE `about_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_contents`
--
ALTER TABLE `site_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_contents_key_unique` (`key`);

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
-- AUTO_INCREMENT for table `about_contents`
--
ALTER TABLE `about_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_contents`
--
ALTER TABLE `site_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
