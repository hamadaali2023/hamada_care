-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2023 at 07:38 AM
-- Server version: 10.3.38-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beaunqrp_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `doctorId`, `patientId`, `created_at`, `updated_at`) VALUES
(9, 5, 1, '2021-09-10 08:09:27', '2021-09-10 08:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `top` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `icon`, `image`, `color`, `slug`, `status`, `top`, `type`, `created_at`, `updated_at`) VALUES
(1, 'شراء او تأجير أدوات طبية', 'Buying or renting medical equipment', 'Buying or renting medical equipment', 'Buying or renting medical equipment', '1636529457.jpeg', '1636529457.jpeg', 'iuhiuyguy', 'Buying or renting medical equipment', 0, 0, 1, NULL, '2021-11-10 07:30:57'),
(2, 'خدمات التمريض', 'service patient', 'Covid-19 patient', 'Covid-19 patient', '1636529441.jpeg', '1636529441.jpeg', 'iuhiuyguy', 'service patient', 0, 0, 0, NULL, '2021-11-10 07:30:41'),
(3, 'أطباء  إستشارات وزيارات', 'أطباء  إستشارات وزيارات', 'أطباء - إستشارات وزيارات', 'أطباء - إستشارات وزيارات', '164110491629.jpeg', '164110491684.jpeg', 'بطزد', 'أطباء - إستشارات وزيارات', 0, 1, NULL, '2022-01-02 06:28:36', '2022-01-02 15:55:27'),
(4, 'خدمات كبار السن', 'خدمات كبار السن', 'خدمات كبار السن', 'خدمات كبار السن', '164110497812.jpeg', '164110497859.jpeg', 'gdtgd', 'خدمات كبار السن', 0, 1, NULL, '2022-01-02 06:29:38', '2022-01-02 06:29:38'),
(5, 'اطباء', 'Doctors', 'طبيب', 'Doctord', '164113903320.jpeg', '164113903360.jpg', NULL, 'Doctors', 0, 0, NULL, '2022-01-02 15:57:13', '2022-01-02 15:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `doctorId`, `patientId`, `updated_at`, `created_at`) VALUES
(1, 5, 1, '2021-07-29 10:09:41', '2021-04-14 21:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subCategoryId` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `slug_ar` varchar(255) DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `top` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryId` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countryId`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'الرياض', 'jbu', NULL, NULL),
(2, 1, 'جدة', 'jbu', NULL, NULL),
(3, 2, 'القاهرة', 'jbu', NULL, NULL),
(4, 2, 'الفيوم', 'jbu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies_insurances`
--

CREATE TABLE `companies_insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_insurances`
--

INSERT INTO `companies_insurances` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'gteg', 'tegetget', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_ar` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `terms_conditions_ar` text DEFAULT NULL,
  `terms_conditions_en` text DEFAULT NULL,
  `mesion_image` text DEFAULT NULL,
  `vesion_ar` text DEFAULT NULL,
  `vesion_en` text DEFAULT NULL,
  `vesion_image` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `privacy_ar` text DEFAULT NULL,
  `privacy_en` text DEFAULT NULL,
  `version` double DEFAULT NULL,
  `favicon` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `logo`, `title_ar`, `title_en`, `phone`, `email`, `address_ar`, `address_en`, `location`, `terms_conditions_ar`, `terms_conditions_en`, `mesion_image`, `vesion_ar`, `vesion_en`, `vesion_image`, `description_ar`, `description_en`, `privacy_ar`, `privacy_en`, `version`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'هعلاهع نعل', 'uyguy', '013249874', 'freofihir@iuehrfre.com', 'نتزتازتا نعا', 'iyiuhih', 'vervre', 'خهاهعاه', ' Contact Us to Learn About Joining for Free. Over 200 Tech Companies. Improve Patent Quality. Unique Tools & Database. Stop Patent Trolls.', 'verver', 'حن ندرك أن هذه مسؤولية كبيرة ونعمل بجدية لحماية معلوماتك ونمنحك التحكم فيها. تهدف سياسةُ الخصوصية هذه إلى مساعدتك على فهم ماهية المعلومات التي نجمعها وسبب جمعنا لها', ' Contact Us to Learn About Joining for Free. Over 200 Tech Companies. Improve Patent Quality. Unique Tools & Database. Stop Patent Trolls.', 'vervre', 'حن ندرك أن هذه مسؤولية كبيرة ونعمل بجدية لحماية معلوماتك ونمنحك التحكم فيها. تهدف سياسةُ الخصوصية هذه إلى مساعدتك على فهم ماهية المعلومات التي نجمعها وسبب جمعنا لها', ' Contact Us to Learn About Joining for Free. Over 200 Tech Companies. Improve Patent Quality. Unique Tools & Database. Stop Patent Trolls.', 'حن ندرك أن هذه مسؤولية كبيرة ونعمل بجدية لحماية معلوماتك ونمنحك التحكم فيها. تهدف سياسةُ الخصوصية هذه إلى مساعدتك على فهم ماهية المعلومات التي نجمعها وسبب جمعنا لها', 'حن ندرك أن هذه مسؤولية كبيرة ونعمل بجدية لحماية معلوماتك ونمنحك التحكم فيها. تهدف سياسةُ الخصوصية هذه إلى مساعدتك على فهم ماهية المعلومات التي نجمعها وسبب جمعنا لها', 1, 'vervev.png', '2021-07-13 12:01:33', '2021-07-20 12:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'السعودية', 'iuhiu', NULL, NULL),
(2, 'مصر', 'iuhiu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_dayId` bigint(20) UNSIGNED NOT NULL,
  `sat` varchar(255) NOT NULL DEFAULT '0',
  `sun` varchar(255) NOT NULL DEFAULT '0',
  `mon` varchar(255) NOT NULL DEFAULT '0',
  `tus` varchar(255) NOT NULL DEFAULT '0',
  `wed` varchar(255) NOT NULL DEFAULT '0',
  `thu` varchar(255) NOT NULL DEFAULT '0',
  `fri` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `work_dayId`, `sat`, `sun`, `mon`, `tus`, `wed`, `thu`, `fri`, `created_at`, `updated_at`) VALUES
(38, 39, '1', '0', '0', '0', '0', '0', '0', '2022-01-02 08:33:09', '2022-01-02 08:33:09'),
(42, 43, '0', '1', '1', '1', '1', '1', '1', '2022-01-26 06:41:48', '2022-01-26 06:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'verve', 'verver', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryId` bigint(20) UNSIGNED NOT NULL,
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `dateOfBirth` varchar(255) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `personality_number` varchar(30) DEFAULT NULL,
  `personality_photo` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `membershipTypeId` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_activated` tinyint(4) DEFAULT 0,
  `token` text DEFAULT NULL,
  `device_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `countryId`, `cityId`, `first_name`, `last_name`, `email`, `password`, `mobile`, `state`, `gender`, `type`, `longitude`, `latitude`, `dateOfBirth`, `nationality`, `photo`, `personality_number`, `personality_photo`, `bio`, `rate`, `membershipTypeId`, `status`, `is_activated`, `token`, `device_token`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 'حماده ‏علي', 'Maher', 'hamadaali221133@gmail.com', '$2y$10$v8B8idYHemGAR9EflO7MhebBTSKNWhvmQuqpxrQm0lCUFrRRIcm2m', '01015024714', 'القاهره', '1', '1', '31.093269288539886', '29.02669780347304', '2000-01-01', '875867', '163652845435.jpg', '35645677', '1627147425.jpg', 'vervrver ‎ ‎system ‎sus ‎eye ‎yehehe ‎ueheh ‎gets ‎he ‎eh ‎hejsjsje ‎hehe ‎', 0, 1, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9iZWF1dGloZWF0aC5jb21cL3N1YlwvY2FyZVwvYXBpXC92MVwvZG9jdG9yXC9sb2dpbiIsImlhdCI6MTY2NDM1MTYxMCwiZXhwIjoxNjY0MzU1MjEwLCJuYmYiOjE2NjQzNTE2MTAsImp0aSI6IlJwRVZCU3ZIZkJKTWt5Qm4iLCJzdWIiOjUsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.nau2SJ0bCtkv4MP4IX8AP9UM23mv469JLO7d9V1uC74', 'frwfwrfrr', '2021-07-02 05:47:40', '2022-09-28 11:53:30'),
(6, 1, 1, 'gtrg', 'rtgr', 'hamadaali221133r@gmail.com', '$2y$10$Y1WdpRc8eW3Bw8QSdlLa/usFcNWWati3La6uqBN6vzNMS9bwv2xi6', '24564765', NULL, 'male', 'gtrgr', NULL, NULL, 'gtrgtd', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 0, NULL, NULL, '2022-01-02 05:06:37', '2022-01-02 05:06:37'),
(12, 1, 1, 'بائع', 'بائع', 'vendor@vendor.com', '$2y$10$t7rPvE.q8nyC3yFPhD0U2uUGN.aMJpKVwWrjUKkKrNbyGm5G93YzK', '01150769418', NULL, 'ذكر', 'منظمه', NULL, NULL, '2000-01-01', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvZmluZGZhbWlseS5uZXRcL2NhcmVcL2FwaVwvdjFcL2RvY3RvclwvbG9naW4iLCJpYXQiOjE2NDExMDMxMzAsImV4cCI6MTY0MTEwNjczMCwibmJmIjoxNjQxMTAzMTMwLCJqdGkiOiJNUUx3YXFEeDVnTlNsQXk0Iiwic3ViIjoxMiwicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.GSQxJJZa7HosVvvG95X9n8-Wyn-nXo6YF64s8sF1HGw', 'f9fUWkHxQ6WrS2fJK6L_Nt:APA91bHOha7K4fQ2Sdejx2boOuBpiECoz24bH7m3w5Qkgo6rLxQGaeiXDp1DIO6tBExPhgTm6ZdHlTXLQgAcbRsymPps6U3gVRy7BVq7x9hzgHQoziQjmqoKvrkuKsAHAnB9rn6nb598', '2022-01-02 05:57:55', '2022-01-03 05:53:56'),
(17, 1, 2, 'خالد', 'سليمان', 'f123456khkh@gmail.com', '$2y$10$R6su4GUSKbKg.D8M2wmc3OnqWlnjhSQrwbDGUnCNAbXvGnTQop2Di', '0534066660', NULL, 'ذكر', 'شخصي', '40.10001752525568', '30.126943576702125', '2000-01-01', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvZmluZGZhbWlseS5uZXRcL2NhcmVcL2FwaVwvdjFcL2RvY3RvclwvbG9naW4iLCJpYXQiOjE2NDExMTM2OTcsImV4cCI6MTY0MTExNzI5NywibmJmIjoxNjQxMTEzNjk3LCJqdGkiOiIzVXNFN3ZJQjlVMTJ0ZHF5Iiwic3ViIjoxNywicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.raVaqtxGVLhlQm_itQYDkzaSxYeE_wSy-bB5d4lZX_c', 'et3YnKZjQN2q_Fb26nzotr:APA91bFhbCrpU6jXICOB1nGpBQ-ClwBw_3NtPY6uBhqY2Q84FZIJf6ZprVZzV5qjDsVnwk15h431onYCslNRPPZ5-AC-u17bMa_M-GDFrbbtcKpELPGvL0HUMKGniJ6_DQpyGJ2qJZZr', '2022-01-02 08:26:59', '2022-01-02 08:54:57'),
(18, 1, 1, 'gtrg', 'rtgr', 'totalhealthcare2021@gmail.com', '$2y$10$9D8Z8v0CJz6kQMByUpS34.85SefWogoIcciYSIz9uYOyw756J04Ny', '24564765', NULL, 'male', 'gtrgr', NULL, NULL, 'gtrgtd', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 0, NULL, NULL, '2022-01-24 03:45:55', '2022-01-24 03:45:55'),
(19, 1, 1, 'gtrg', 'rtgr', 'coursesloai2021@gmail.com', '$2y$10$2fgx/sdQxVER6f16Ht/ZZ.4lAarr9xczKw7OrRvxqBeApYkvorsfS', '24564765', NULL, 'male', 'gtrgr', NULL, NULL, 'gtrgtd', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 0, NULL, NULL, '2022-01-24 03:47:35', '2022-01-24 03:47:35'),
(20, 1, 1, 'gtrg', 'rtgr', 'hamada.ali158@yahoo.com', '$2y$10$PnUBbuJQjkhni7R1nZq/deIg/ZuPw15XvwkYvymAGPCz2D3CsirZm', '24564765', NULL, 'male', 'gtrgr', NULL, NULL, 'gtrgtd', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 0, NULL, NULL, '2022-01-24 03:54:43', '2022-01-24 03:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_activation`
--

CREATE TABLE `doctors_activation` (
  `id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors_activation`
--

INSERT INTO `doctors_activation` (`id`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_banks`
--

CREATE TABLE `doctor_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `countryId` bigint(20) UNSIGNED NOT NULL,
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `name_acount` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `International_bank_number` varchar(50) NOT NULL,
  `swift_code` varchar(50) NOT NULL,
  `transit_number` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_banks`
--

INSERT INTO `doctor_banks` (`id`, `doctorId`, `countryId`, `cityId`, `name_acount`, `name`, `number`, `International_bank_number`, `swift_code`, `transit_number`, `created_at`, `updated_at`) VALUES
(9, 5, 1, 1, 'male', 'bjbkj', '8968767777777', 'dwedw', 'ed test', 'wedew', '2021-07-15 08:34:58', '2021-07-15 08:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_cases`
--

CREATE TABLE `doctor_cases` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `status_servic` tinyint(1) NOT NULL DEFAULT 1,
  `status_not` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_cases`
--

INSERT INTO `doctor_cases` (`id`, `doctorId`, `status_servic`, `status_not`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 1, '2021-07-17 08:21:54', '2022-01-12 15:42:49'),
(7, 12, 0, 0, '2022-01-02 05:57:55', '2022-01-02 05:57:55'),
(8, 13, 0, 0, '2022-01-02 07:52:01', '2022-01-02 07:52:01'),
(9, 14, 0, 0, '2022-01-02 08:13:58', '2022-01-02 08:13:58'),
(10, 15, 0, 0, '2022-01-02 08:19:19', '2022-01-02 08:19:19'),
(11, 16, 0, 0, '2022-01-02 08:20:13', '2022-01-02 08:20:13'),
(12, 17, 1, 1, '2022-01-02 08:26:59', '2022-01-02 08:28:12'),
(13, 18, 0, 0, '2022-01-24 03:45:55', '2022-01-24 03:45:55'),
(14, 19, 0, 0, '2022-01-24 03:47:35', '2022-01-24 03:47:35'),
(15, 20, 0, 0, '2022-01-24 03:54:43', '2022-01-24 03:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_certificates`
--

CREATE TABLE `doctor_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_educations`
--

CREATE TABLE `doctor_educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `degreeId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_educations`
--

INSERT INTO `doctor_educations` (`id`, `doctorId`, `degreeId`, `name`, `degree`, `speciality`, `created_at`, `updated_at`) VALUES
(61, 5, 3, '8768', '876bjhb', 'jhbjh', '2021-08-08 10:35:01', '2021-08-08 10:35:01'),
(62, 17, 3, 'جامعة الرباض', 'ماستر', 'باطني', '2022-01-02 08:32:07', '2022-01-02 08:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_experiences`
--

CREATE TABLE `doctor_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_experiences`
--

INSERT INTO `doctor_experiences` (`id`, `doctorId`, `year`, `organization`, `from`, `to`, `job_title`, `job_desc`, `created_at`, `updated_at`) VALUES
(107, 5, '2021', '1', '2021-07-04', '2021-07-22', 'jnkjn', 'uinjkn', '2021-08-08 10:35:01', '2021-08-08 10:35:01'),
(108, 17, 'سنوات 8', 'طب', '2022-01-01 00:00:00.000', '2022-01-06 00:00:00.000', 'الجوف', 'طبيب', '2022-01-02 08:32:07', '2022-01-02 08:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_insurances`
--

CREATE TABLE `doctor_insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `companies_insuranceId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_insurances`
--

INSERT INTO `doctor_insurances` (`id`, `doctorId`, `companies_insuranceId`, `name`, `type`, `number`, `date`, `created_at`, `updated_at`) VALUES
(74, 5, 1, 'ikbjk', 'hbjhb', 'iubjh', '2021-07-22', '2021-08-08 10:35:01', '2021-08-08 10:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_languages`
--

CREATE TABLE `doctor_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `languageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_languages`
--

INSERT INTO `doctor_languages` (`id`, `doctorId`, `languageId`, `created_at`, `updated_at`) VALUES
(109, 5, 1, '2021-08-08 10:35:01', '2021-08-08 10:35:01'),
(110, 17, 1, '2022-01-02 08:32:07', '2022-01-02 08:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_licenses`
--

CREATE TABLE `doctor_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `placeLicensesId` int(11) NOT NULL,
  `placeLicensesName` varchar(50) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_licenses`
--

INSERT INTO `doctor_licenses` (`id`, `doctorId`, `placeLicensesId`, `placeLicensesName`, `place`, `num`, `name`, `created_at`, `updated_at`) VALUES
(52, 5, 2, '8687', NULL, '875867', 'uygukbj', '2021-08-08 10:35:01', '2021-08-08 10:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_services`
--

CREATE TABLE `doctor_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not verified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_services`
--

INSERT INTO `doctor_services` (`id`, `categoryId`, `subCategoryId`, `doctorId`, `price`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(29, 1, 1, 5, '150', '0', 'not verified', '2021-07-24 17:59:11', '2021-07-24 17:59:11'),
(30, 1, 2, 5, '18', '2', 'not verified', '2021-07-24 17:59:11', '2021-07-24 17:59:11'),
(35, 1, 3, 5, '18', '2', 'not verified', '2021-07-24 17:59:11', '2021-07-24 17:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `doctorId`, `patientId`, `created_at`, `updated_at`) VALUES
(12, 5, 1, '2021-09-10 08:09:38', '2021-09-10 08:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `local`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'erver', 'عربي', 'arabic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lives`
--

CREATE TABLE `lives` (
  `id` int(11) NOT NULL,
  `liveId` text DEFAULT NULL,
  `channelId` text DEFAULT NULL,
  `channelName` text DEFAULT NULL,
  `liveDate` date DEFAULT NULL,
  `noOfViewers` text DEFAULT NULL,
  `hostImage` text DEFAULT NULL,
  `hostName` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lives`
--

INSERT INTO `lives` (`id`, `liveId`, `channelId`, `channelName`, `liveDate`, `noOfViewers`, `hostImage`, `hostName`, `created_at`, `updated_at`) VALUES
(28, NULL, '433266186', 'channel:userId', '2021-11-28', '0', NULL, 'host name', '2021-11-28 15:25:06', '2021-11-28 15:25:17'),
(29, NULL, '-831864382', 'channel:userId', '2022-03-06', '0', 'https://i.dlpng.com/static/png/1686552--avatar-png-512_512_preview.png', 'host name', '2022-03-06 18:49:57', '2022-03-06 18:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `member_ship_types`
--

CREATE TABLE `member_ship_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member_ship_types`
--

INSERT INTO `member_ship_types` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'jvjbhv', 66, '2021-07-06 16:30:28', '2021-07-01 16:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `chatID` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `senderType` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chatID`, `sender_id`, `senderType`, `message`, `file`, `date`, `time`, `created_at`, `updated_at`) VALUES
(43, 1, 1, 1, 'مرحبا', '', '2021-06-27', '1:02 AM', '2021-06-27 23:02:54', '2021-06-27 23:02:54'),
(95, 1, 5, 5, 'helllo', '', '2021-07-29', NULL, '2021-07-29 11:29:19', '2021-07-29 11:29:19'),
(96, 1, 5, 5, 'helllo', '', '2021-07-29', NULL, '2021-07-29 11:30:37', '2021-07-29 11:30:37'),
(97, 1, 5, 5, 'helllo', '', '2021-07-29', NULL, '2021-07-29 11:30:41', '2021-07-29 11:30:41'),
(98, 1, 5, 5, 'helllo', '', '2021-07-29', NULL, '2021-07-29 12:00:48', '2021-07-29 12:00:48'),
(99, 1, 1, 1, 'helllo', '', '2021-07-29', NULL, '2021-07-29 12:05:26', '2021-07-29 12:05:26'),
(100, 1, 1, 1, 'helllo', '', '2021-07-29', NULL, '2021-07-29 12:06:08', '2021-07-29 12:06:08'),
(101, 1, 1, 1, 'helllo', '', '2021-07-29', NULL, '2021-07-29 12:07:28', '2021-07-29 12:07:28'),
(102, 1, 5, 5, 'tydfgg', '', '2021-07-29', '2:26 PM', '2021-07-29 12:26:12', '2021-07-29 12:26:12'),
(103, 1, 5, 5, 'ggg', '', '2021-07-29', '2:26 PM', '2021-07-29 12:26:32', '2021-07-29 12:26:32'),
(104, 1, 5, 5, 'gg', '', '2021-07-29', '2:26 PM', '2021-07-29 12:26:54', '2021-07-29 12:26:54'),
(105, 1, 5, 5, 'ddddd', '', '2021-07-29', '2:43 PM', '2021-07-29 12:43:14', '2021-07-29 12:43:14'),
(106, 1, 5, 5, 'tttv', '', '2021-07-29', '2:48 PM', '2021-07-29 12:48:04', '2021-07-29 12:48:04'),
(107, 1, 5, 5, 'yfhdjsvgg', '', '2021-07-29', '2:48 PM', '2021-07-29 12:48:11', '2021-07-29 12:48:11'),
(108, 1, 5, 5, 'بسم الله الرحمن الرحيم', '', '2021-07-29', '4:25 PM', '2021-07-29 14:25:33', '2021-07-29 14:25:33'),
(109, 1, 5, 5, '', '1627568765.jpg', '2021-07-29', '4:26 PM', '2021-07-29 14:26:05', '2021-07-29 14:26:05'),
(110, 1, 5, 5, 'ss', '', '2021-07-31', '12:18 PM', '2021-07-31 10:18:30', '2021-07-31 10:18:30'),
(111, 1, 5, 5, 'hi', '', '2021-07-31', '12:18 PM', '2021-07-31 10:18:35', '2021-07-31 10:18:35'),
(112, 1, 5, 5, 'fgzccvvv', '1627729191.jpg', '2021-07-31', '12:59 PM', '2021-07-31 10:59:51', '2021-07-31 10:59:51'),
(113, 1, 5, 5, 'test', '', '2021-07-31', '1:13 PM', '2021-07-31 11:13:22', '2021-07-31 11:13:22'),
(114, 1, 5, 5, 'rr', '', '2021-07-31', '1:13 PM', '2021-07-31 11:13:27', '2021-07-31 11:13:27'),
(115, 1, 5, 5, '', '1627730017.jpg', '2021-07-31', '1:13 PM', '2021-07-31 11:13:37', '2021-07-31 11:13:37'),
(116, 1, 5, 5, '', '1627730150.jpg', '2021-07-31', '1:15 PM', '2021-07-31 11:15:50', '2021-07-31 11:15:50'),
(117, 1, 1, 1, 'helllo', '', '2021-07-31', NULL, '2021-07-31 11:16:34', '2021-07-31 11:16:34'),
(118, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:16:51', '2021-07-31 11:16:51'),
(119, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:17:57', '2021-07-31 11:17:57'),
(120, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:19:46', '2021-07-31 11:19:46'),
(121, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:21:57', '2021-07-31 11:21:57'),
(122, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:22:32', '2021-07-31 11:22:32'),
(123, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:22:48', '2021-07-31 11:22:48'),
(124, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:23:18', '2021-07-31 11:23:18'),
(125, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:24:14', '2021-07-31 11:24:14'),
(126, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:25:15', '2021-07-31 11:25:15'),
(127, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:26:13', '2021-07-31 11:26:13'),
(128, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:26:20', '2021-07-31 11:26:20'),
(129, 1, 5, 5, 'xx', '', '2021-07-31', '1:26 PM', '2021-07-31 11:26:40', '2021-07-31 11:26:40'),
(130, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:26:47', '2021-07-31 11:26:47'),
(131, 1, 5, 5, 'test', '', '2021-07-31', '1:34 PM', '2021-07-31 11:34:37', '2021-07-31 11:34:37'),
(132, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:34:55', '2021-07-31 11:34:55'),
(133, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:35:00', '2021-07-31 11:35:00'),
(134, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:35:15', '2021-07-31 11:35:15'),
(135, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:35:20', '2021-07-31 11:35:20'),
(136, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:35:27', '2021-07-31 11:35:27'),
(137, 1, 5, 5, 'hi', '', '2021-07-31', '1:39 PM', '2021-07-31 11:39:04', '2021-07-31 11:39:04'),
(138, 1, 5, 5, 'ff', '', '2021-07-31', '1:41 PM', '2021-07-31 11:41:27', '2021-07-31 11:41:27'),
(139, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:41:35', '2021-07-31 11:41:35'),
(140, 1, 5, 5, 'tt', '', '2021-07-31', '1:41 PM', '2021-07-31 11:41:42', '2021-07-31 11:41:42'),
(141, 1, 5, 5, 'r', '', '2021-07-31', '1:42 PM', '2021-07-31 11:42:40', '2021-07-31 11:42:40'),
(142, 1, 5, 5, 'lklk', '', '2021-07-31', '1:43 PM', '2021-07-31 11:43:43', '2021-07-31 11:43:43'),
(143, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 11:44:05', '2021-07-31 11:44:05'),
(144, 1, 1, 1, 'tt', '', '2021-07-31', '1:45 PM', '2021-07-31 11:45:30', '2021-07-31 11:45:30'),
(145, 1, 1, 1, 'dd', '', '2021-07-31', '1:45 PM', '2021-07-31 11:45:34', '2021-07-31 11:45:34'),
(146, 1, 5, 5, 'gt', '', '2021-07-31', '1:46 PM', '2021-07-31 11:46:08', '2021-07-31 11:46:08'),
(147, 1, 1, 1, 'cccc', '', '2021-07-31', '2:14 PM', '2021-07-31 12:14:36', '2021-07-31 12:14:36'),
(148, 1, 1, 1, 'r', '', '2021-07-31', '2:14 PM', '2021-07-31 12:14:43', '2021-07-31 12:14:43'),
(149, 1, 1, 1, 'helllo 3', '', '2021-07-31', NULL, '2021-07-31 12:36:39', '2021-07-31 12:36:39'),
(150, 1, 5, 5, 'مرحبا', '', '2021-07-31', '4:26 PM', '2021-07-31 14:26:40', '2021-07-31 14:26:40'),
(151, 1, 5, 5, 'hi', '', '2021-07-31', '4:26 PM', '2021-07-31 14:26:52', '2021-07-31 14:26:52'),
(152, 1, 5, 5, '', '1627741652.jpg', '2021-07-31', '4:27 PM', '2021-07-31 14:27:32', '2021-07-31 14:27:32'),
(153, 1, 5, 5, '', '1627741676.jpg', '2021-07-31', '4:27 PM', '2021-07-31 14:27:56', '2021-07-31 14:27:56'),
(154, 1, 5, 5, '', '1627741710.jpg', '2021-07-31', '4:28 PM', '2021-07-31 14:28:30', '2021-07-31 14:28:30'),
(155, 1, 5, 5, 'hdhh', '', '2021-08-08', '8:33 PM', '2021-08-08 18:33:25', '2021-08-08 18:33:25'),
(156, 1, 5, 5, 'hdhhhbbb', '', '2021-08-08', '8:33 PM', '2021-08-08 18:33:26', '2021-08-08 18:33:26'),
(157, 1, 5, 5, 'hhs', '', '2021-08-08', '8:33 PM', '2021-08-08 18:33:28', '2021-08-08 18:33:28'),
(158, 1, 1, 1, '', '', '2021-08-17', NULL, '2021-08-17 14:58:42', '2021-08-17 14:58:42'),
(159, 1, 1, 1, 'ةىل', '', '2021-09-14', '7:41 PM', '2021-09-14 17:41:38', '2021-09-14 17:41:38'),
(160, 1, 1, 1, 'ىىى', '', '2021-09-14', '7:41 PM', '2021-09-14 17:41:41', '2021-09-14 17:41:41'),
(161, 1, 5, 5, 'تااااااا', '', '2021-11-10', '9:24 AM', '2021-11-10 07:24:33', '2021-11-10 07:24:33'),
(162, 1, 5, 5, 'تتتتا', '', '2021-11-10', '9:24 AM', '2021-11-10 07:24:36', '2021-11-10 07:24:36'),
(163, 1, 5, 5, 'ااااا', '', '2021-11-10', '9:24 AM', '2021-11-10 07:24:39', '2021-11-10 07:24:39'),
(164, 1, 5, 5, 'اااا', '', '2021-11-10', '9:24 AM', '2021-11-10 07:24:41', '2021-11-10 07:24:41'),
(165, 1, 5, 5, 'ا', '', '2021-11-10', '9:24 AM', '2021-11-10 07:24:44', '2021-11-10 07:24:44'),
(166, 1, 1, 1, 'ةىلا', '', '2021-11-11', '12:51 PM', '2021-11-11 10:51:33', '2021-11-11 10:51:33'),
(167, 1, 1, 1, 'الللل', '', '2021-11-11', '12:51 PM', '2021-11-11 10:51:35', '2021-11-11 10:51:35'),
(168, 1, 1, 1, 'مرحبا', '', '2021-11-25', '12:06 PM', '2021-11-25 10:06:23', '2021-11-25 10:06:23');

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
(22, '2021_06_12_113030_create_working_days_table', 1),
(26, '2021_06_23_054152_create_placeـissuanceـlicenses_table', 1),
(61, '2014_10_12_000000_create_users_table', 2),
(62, '2014_10_12_100000_create_password_resets_table', 2),
(63, '2018_08_19_000000_create_failed_jobs_table', 2),
(64, '2020_11_09_035609_create_specialities_table', 2),
(65, '2020_11_09_040539_create_contact_infos_table', 2),
(66, '2020_12_30_150639_create_permission_tables', 2),
(67, '2021_05_12_113817_create_services_table', 2),
(68, '2021_06_12_103149_create_categories_table', 2),
(69, '2021_06_12_103220_create_sub_categories_table', 2),
(70, '2021_06_12_103243_create_child_categories_table', 2),
(71, '2021_06_12_103309_create_countries_table', 2),
(72, '2021_06_12_103324_create_cities_table', 2),
(73, '2021_06_12_103344_create_states_table', 2),
(74, '2021_06_12_103358_create_languages_table', 2),
(75, '2021_06_12_105626_create_foreign_keys_table', 2),
(76, '2021_06_12_112150_create_doctors_table', 2),
(94, '2021_06_12_112203_create_patients_table', 3),
(95, '2021_06_12_112215_create_appointments_table', 3),
(96, '2021_06_12_112227_create_offers_table', 3),
(97, '2021_06_12_112240_create_articles_table', 3),
(98, '2021_06_12_112255_create_comments_table', 3),
(99, '2021_06_12_113042_create_favorites_table', 3),
(100, '2021_06_12_113054_create_payments_table', 3),
(101, '2021_06_12_113106_create_reviews_table', 3),
(102, '2021_06_23_054152_create_placeissuancelicenses_table', 3),
(103, '2021_06_23_054354_create_degrees_table', 3),
(104, '2021_06_23_102938_create_companies_insurances_table', 3),
(105, '2021_06_24_095432_create_doctor_insurances_table', 3),
(106, '2021_06_24_095446_create_doctor_certificates_table', 3),
(107, '2021_06_24_095709_create_doctor_languages_table', 3),
(108, '2021_06_24_111908_create_doctor_banks_table', 3),
(109, '2021_06_25_055810_create_doctor_services_table', 3),
(110, '2021_06_25_095532_create_doctor_educations_table', 3),
(111, '2021_06_25_101420_create_doctor_licenses_table', 4),
(112, '2021_06_30_074733_create_doctor_experiences_table', 4),
(113, '2021_06_30_125517_create_work_days_table', 4),
(114, '2021_06_31_122714_create_days_table', 4),
(115, '2021_06_31_122859_create_times_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `patientId` int(11) NOT NULL,
  `patientUnderCareId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `patientlocationId` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `age` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `language` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `time` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `method_payment` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `doctorId`, `patientId`, `patientUnderCareId`, `categoryId`, `patientlocationId`, `message`, `gender`, `age`, `language`, `mobile`, `date`, `time`, `method_payment`, `status`, `created_at`, `updated_at`) VALUES
(169, NULL, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 15:46:30', '2021-09-13 15:46:30'),
(170, NULL, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 15:49:20', '2021-09-13 15:49:20'),
(172, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 15:59:06', '2021-09-13 15:59:06'),
(173, NULL, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 16:00:29', '2021-09-13 16:00:29'),
(174, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 16:07:26', '2021-09-13 16:07:26'),
(175, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0233455352222', '2021-08-30', '22:00', 1, 0, '2021-09-13 16:07:41', '2021-09-13 16:07:41'),
(176, 5, 1, 12, 2, 18, NULL, NULL, NULL, '1', NULL, '2021-09-15', '8:54 م', 1, 2, '2021-09-14 11:55:02', '2021-09-14 11:55:53'),
(177, 5, 1, 14, 2, 18, NULL, '1', '29-40', '1', NULL, '2021-09-14', '6:56 م', 1, 0, '2021-09-14 17:35:52', '2021-09-14 17:35:52'),
(178, 2, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-22', '6:58 AM', 1, 0, '2021-09-15 07:59:56', '2021-09-15 07:59:56'),
(179, 2, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-22', '6:58 AM', 1, 0, '2021-09-15 08:00:55', '2021-09-15 08:00:55'),
(180, 2, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-22', '6:58 AM', 1, 0, '2021-09-15 08:01:47', '2021-09-15 08:01:47'),
(181, 2, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-22', '6:58 AM', 1, 0, '2021-09-15 08:02:26', '2021-09-15 08:02:26'),
(182, 2, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-22', '6:58 AM', 1, 0, '2021-09-15 08:03:20', '2021-09-15 08:03:20'),
(183, NULL, 1, NULL, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-15 08:05:24', '2021-09-15 08:05:24'),
(184, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2021-09-15 08:06:35', '2021-09-15 08:06:35'),
(185, 5, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-07', '7:06 ص', 1, 0, '2021-09-15 08:06:41', '2021-09-15 08:06:41'),
(186, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2021-09-15 08:06:42', '2021-09-15 08:06:42'),
(187, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2021-09-15 08:06:48', '2021-09-15 08:06:48'),
(188, 5, 1, 14, 2, 18, NULL, NULL, NULL, NULL, NULL, '2021-09-15', '11:28 ص', 0, 0, '2021-09-15 09:29:57', '2021-09-15 09:29:57'),
(189, NULL, 1, NULL, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-16 14:08:26', '2021-09-16 14:08:26'),
(190, 6, 1, 14, 2, 17, NULL, '1', NULL, '1', NULL, '2021-09-22', '2:07 ص', 1, 0, '2021-09-19 21:08:35', '2021-09-19 21:08:35'),
(191, NULL, 1, NULL, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-22 05:54:33', '2021-09-22 05:54:33'),
(192, NULL, 1, NULL, 1, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 05:06:47', '2021-09-23 05:06:47'),
(193, 10, 1, NULL, 2, 17, NULL, NULL, NULL, NULL, NULL, '2021-09-21', '8:08 ص', 1, 0, '2021-09-23 05:09:22', '2021-09-23 05:09:22'),
(194, 10, 1, NULL, 2, 17, NULL, NULL, NULL, NULL, NULL, '2021-09-21', '8:08 ص', 1, 0, '2021-09-23 05:10:16', '2021-09-23 05:10:16'),
(195, NULL, 1, NULL, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 05:11:15', '2021-09-23 05:11:15'),
(196, NULL, 1, NULL, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-08 13:11:31', '2021-11-08 13:11:31'),
(197, NULL, 1, NULL, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-11 10:00:02', '2021-11-11 10:00:02'),
(198, 5, 1, NULL, 2, 17, NULL, NULL, NULL, NULL, NULL, '2021-11-11', '12:48 م', 1, 0, '2021-11-11 10:50:33', '2021-11-11 10:50:33'),
(199, NULL, 1, NULL, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-01 04:31:50', '2022-01-01 04:31:50'),
(200, 5, 1, NULL, 2, 17, NULL, '1', NULL, NULL, NULL, '2022-01-02', '9:37 ص', 1, 0, '2022-01-01 04:39:26', '2022-01-01 04:39:26'),
(201, NULL, 1, NULL, 1, 17, NULL, '1', NULL, NULL, NULL, '2022-01-02', '9:37 ص', 1, 0, '2022-01-01 04:40:04', '2022-01-01 04:40:04'),
(202, 5, 1, NULL, 2, 17, NULL, '1', NULL, NULL, NULL, '2022-01-11', '6:41 ص', 1, 0, '2022-01-01 04:41:23', '2022-01-01 04:41:23'),
(203, 5, 1, NULL, 2, 17, NULL, '2', '29-40', '1', NULL, '2022-01-02', '8:53 ص', 1, 0, '2022-01-01 04:54:38', '2022-01-01 04:54:38'),
(204, 5, 1, NULL, 2, 17, NULL, '2', '29-40', '1', NULL, '2022-01-01', '10:09 ص', 1, 0, '2022-01-01 05:10:55', '2022-01-01 05:10:55'),
(205, NULL, 1, NULL, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-12 15:43:22', '2022-01-12 15:43:22'),
(206, 5, 1, NULL, 2, 20, NULL, NULL, NULL, NULL, NULL, '2022-01-13', '5:46 م', 1, 0, '2022-01-12 15:48:20', '2022-01-12 15:48:20'),
(207, NULL, 1, NULL, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-17 15:30:56', '2022-01-17 15:30:56'),
(208, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:18:39', '2022-01-20 08:18:39'),
(209, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:23:59', '2022-01-20 08:23:59'),
(210, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:24:21', '2022-01-20 08:24:21'),
(211, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:24:58', '2022-01-20 08:24:58'),
(212, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:32:06', '2022-01-20 08:32:06'),
(213, 5, 1, 1, 1, 17, 'طلب خاص', 'ذكر', '33', 'عربي', '0245535', '2021-08-30', '22:00', 1, 0, '2022-01-20 08:32:48', '2022-01-20 08:32:48'),
(214, NULL, 1, NULL, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-02-22 14:23:55', '2022-02-22 14:23:55'),
(215, NULL, 1, NULL, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-02-22 14:24:10', '2022-02-22 14:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `orderId`, `productId`, `created_at`, `updated_at`) VALUES
(1, 197, 1, '2021-11-11 10:00:02', '2021-11-11 10:00:02'),
(2, 199, 1, '2022-01-01 04:31:50', '2022-01-01 04:31:50'),
(3, 201, 1, '2022-01-01 04:40:04', '2022-01-01 04:40:04'),
(4, 205, 1, '2022-01-12 15:43:22', '2022-01-12 15:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_images`
--

CREATE TABLE `order_images` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Order_sub_categories`
--

CREATE TABLE `Order_sub_categories` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `duration` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Order_sub_categories`
--

INSERT INTO `Order_sub_categories` (`id`, `orderId`, `subCategoryId`, `duration`, `created_at`, `updated_at`) VALUES
(1, 198, 4, 1, '2021-11-11 10:50:33', '2021-11-11 10:50:33'),
(2, 198, 3, 1, '2021-11-11 10:50:33', '2021-11-11 10:50:33'),
(3, 200, 4, 1, '2022-01-01 04:39:26', '2022-01-01 04:39:26'),
(4, 202, 4, 1, '2022-01-01 04:41:23', '2022-01-01 04:41:23'),
(5, 203, 3, 1, '2022-01-01 04:54:38', '2022-01-01 04:54:38'),
(6, 204, 4, 1, '2022-01-01 05:10:55', '2022-01-01 05:10:55'),
(7, 206, 3, 1, '2022-01-12 15:48:20', '2022-01-12 15:48:20'),
(8, 206, 4, 1, '2022-01-12 15:48:20', '2022-01-12 15:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `countryId` int(11) NOT NULL,
  `cityId` int(11) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `personality_number` varchar(25) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dateOfBirth` varchar(50) DEFAULT NULL,
  `payment_method` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_activated` tinyint(4) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  `device_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `email`, `password`, `countryId`, `cityId`, `state`, `personality_number`, `mobile`, `photo`, `gender`, `dateOfBirth`, `payment_method`, `status`, `is_activated`, `token`, `device_token`, `created_at`, `updated_at`) VALUES
(1, 'hamada', 'ali', 'hamadaali221133@gmail.com', '$2y$10$v8B8idYHemGAR9EflO7MhebBTSKNWhvmQuqpxrQm0lCUFrRRIcm2m', 1, 1, 'القاهرهه', '12345625', '010150247144', '1634446162.jpg', '2', '2000-01-01 00:00:00.000', 3, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9iZWF1dGloZWF0aC5jb21cL3N1YlwvY2FyZVwvYXBpXC92MVwvcGF0aWVudFwvbG9naW4iLCJpYXQiOjE2NjQzNTE3MjcsImV4cCI6MTY2NDM1NTMyNywibmJmIjoxNjY0MzUxNzI3LCJqdGkiOiI5Qm9zSzFNcW1YZE5wZW9hIiwic3ViIjoxLCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.v8iIeFZO2BIMZVilctVtgnPnYx7PCPjaii6ZDXmDvmo', 'frwfwrfrr', NULL, '2022-09-28 11:55:27'),
(2, 'gtrg', 'rtgr', 'hamadaali22113tttt3@gmail.com', '$2y$10$kqWoaGv8G0eT9XrC7a6zQeUI8ELe7Zp6GHKwmKe/dCQ24HrEPOz9.', 1, NULL, NULL, NULL, '24564765', NULL, 'male', 'gtrgtd', 0, 1, 0, NULL, NULL, '2021-07-28 14:20:12', '2021-07-28 14:20:12'),
(3, 'gtrg', 'rtgr', 'hamadaali22113tttfft3@gmail.com', '$2y$10$t1RtigF1m/IToFvsFI3I7eHFaeJIjx9oauW9SekuMvLIR1ORnFEeO', 1, NULL, NULL, NULL, '24564765', NULL, 'male', 'gtrgtd', 0, 1, 0, NULL, NULL, '2021-07-29 09:16:23', '2021-07-29 09:16:23'),
(4, 'khaled', 'sayed', 'khaled@kh.com', '$2y$10$vAaXkSNEKMBMWI7nsqZHvuwmnmbClypqa6qNONrvMm3qLPWdjJvBW', 1, NULL, NULL, NULL, '0154545454', NULL, 'Male', '2000-01-01 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-07-29 09:43:54', '2021-07-29 09:43:54'),
(5, 'gtrg', 'rtgr', 'hamadaali25552113tttfft3@gmail.com', '$2y$10$I9cfHyms3Tx9OSRYgkA2bOqxAYOrZtaixH6IvFqZdxRuuoUfuiUZy', 1, NULL, NULL, NULL, '24564765', NULL, 'male', 'gtrgtd', 0, 1, 0, NULL, NULL, '2021-08-23 07:51:34', '2021-09-14 08:43:59'),
(6, 'gtrg', 'rtgr', 'hamadaali2555211663tttfft3@gmail.com', '$2y$10$y0iUA6YGR9jxa51Lmc5Ihe7ax/azdgK/7R0EzHPGoKWs4EgEMDjGe', 1, NULL, NULL, NULL, '24564765', NULL, 'male', 'gtrgtd', 0, 1, 0, NULL, NULL, '2021-08-23 08:03:57', '2021-08-23 08:03:57'),
(7, 'gtrg', 'rtgr', 'hamadaali11663tttfft3@gmail.com', '$2y$10$ooqArNoMlV.JIgEXPBLh1./6emg566CRKqD4DuF/Ct6if.z578A4i', 1, NULL, NULL, NULL, '24564765', NULL, 'male', 'gtrgtd', 0, 1, 0, NULL, NULL, '2021-08-23 08:09:58', '2021-08-23 08:09:58'),
(8, 'احمد', 'تمام', 'a.medo58158@gmail.com', '$2y$10$SFus6/TBYEKWtfKjuksj5OpWHWz.RxzA3U8YFQd6s.pvN1EQVIs.G', 1, NULL, NULL, NULL, '01003458159', NULL, 'ذكر', '2000-01-01 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-11-08 17:39:55', '2021-11-08 17:39:55'),
(9, 'حسين', 'الاسدي', 'hhr323@gmail.com', '$2y$10$vVqU4lv4zhm3hs.iUyHkfeN2vkBHzXXwrVMeSO9AiU2EUSQ.Z8WMW', 1, NULL, NULL, NULL, '+9647718707502', NULL, 'ذكر', '2021-12-27 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-12-27 06:26:33', '2021-12-27 06:26:33'),
(10, 'غالب', 'فارس', 'ASDFG5556@YAHOO.COM', '$2y$10$CCHrmfmVHm9E8fwOI73YFeFvFaSd6VVilaNouS0BjneQYc7lFolNi', 1, NULL, NULL, NULL, '0534066660', NULL, 'ذكر', '2000-01-01 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-12-29 18:55:17', '2021-12-29 18:55:17'),
(11, 'غالب', 'فارس', 'falahkh@YAHOO.COM', '$2y$10$9dYYhvxyRUnhJIsuNGpmCeIoSEFAb/.JrrnEIL1RMxQs2gtGYfQvS', 1, NULL, NULL, NULL, '0534066660', NULL, 'ذكر', '2000-01-01 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-12-29 18:59:46', '2021-12-29 18:59:46'),
(12, 'محمد', 'غالب', 'falqhkh@yahoo.com', '$2y$10$UXPdq3MVZw2xZ1LOvhHqmesyHrPRlRZ9dyN6MBxFLqFSQQhHojuCy', 1, NULL, NULL, NULL, '00966534066660', NULL, 'ذكر', '2020-12-30 00:00:00.000', 0, 1, 0, NULL, NULL, '2021-12-30 09:26:45', '2021-12-30 09:26:45'),
(13, 'سعد', 'سليمان', 'f123456khkh@gmail.com', '$2y$10$MircHowd2t637qrMolLxJ.G0fVqLPT5IzzzG.Rqov.jqyiJpw8TcS', 1, NULL, NULL, NULL, '0534066660', NULL, 'ذكر', '2021-01-02 00:00:00.000', 0, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvZmluZGZhbWlseS5uZXRcL2NhcmVcL2FwaVwvdjFcL3BhdGllbnRcL2xvZ2luIiwiaWF0IjoxNjQxMTEzMzk1LCJleHAiOjE2NDExMTY5OTUsIm5iZiI6MTY0MTExMzM5NSwianRpIjoiZG1FTFpJelc1bVZBbGRDWSIsInN1YiI6MTMsInBydiI6IjFmZDU0MjMxNjI4ZmU3NDk3ZGI2ZjkxNjJjMjQ2NTc4YTdjNzgxY2EifQ.00nW5pyXAepYNHDIHbIVft7WE4kz_dbeP6BHSvWDuzw', 'et3YnKZjQN2q_Fb26nzotr:APA91bFhbCrpU6jXICOB1nGpBQ-ClwBw_3NtPY6uBhqY2Q84FZIJf6ZprVZzV5qjDsVnwk15h431onYCslNRPPZ5-AC-u17bMa_M-GDFrbbtcKpELPGvL0HUMKGniJ6_DQpyGJ2qJZZr', '2022-01-02 08:49:03', '2022-01-02 08:49:55'),
(14, 'Vdyg G6gf', 'GGHFFG', 'Saisldvgsg@gmail.com', '$2y$10$.1oxZuKMtwLgxJskN13AcOwxKpZkRcGTb4m/hIoGCtkW/yNYxfjNC', 1, NULL, NULL, NULL, '76556u', NULL, 'ذكر', '2000-01-01 00:00:00.000', 0, 1, 0, NULL, NULL, '2022-01-02 08:51:16', '2022-01-02 08:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `patient_cases`
--

CREATE TABLE `patient_cases` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `status_servic` tinyint(1) NOT NULL DEFAULT 1,
  `status_not` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_cases`
--

INSERT INTO `patient_cases` (`id`, `patientId`, `status_servic`, `status_not`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-07-17 08:21:54', '2021-09-16 14:08:05'),
(4, 5, 1, 1, '2021-08-02 16:16:01', '2021-08-02 16:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_information`
--

CREATE TABLE `patient_health_information` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `blood` varchar(20) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `pressure` varchar(10) DEFAULT NULL,
  `chronic` varchar(10) DEFAULT NULL,
  `ege` int(11) DEFAULT NULL,
  `companies_insuranceId` int(11) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_health_information`
--

INSERT INTO `patient_health_information` (`id`, `patientId`, `blood`, `weight`, `height`, `pressure`, `chronic`, `ege`, `companies_insuranceId`, `number`, `type`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '4', 4242, 244, '2', '1', 333333, 1, '9566698', '1', '2021-09-22', '2021-08-22 09:45:50', '2021-09-15 10:09:49'),
(2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-23 08:09:58', '2021-08-23 08:09:58'),
(3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-08 17:39:55', '2021-11-08 17:39:55'),
(4, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-27 06:26:33', '2021-12-27 06:26:33'),
(5, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 18:55:17', '2021-12-29 18:55:17'),
(6, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 18:59:46', '2021-12-29 18:59:46'),
(7, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-30 09:26:45', '2021-12-30 09:26:45'),
(8, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-02 08:49:03', '2022-01-02 08:49:03'),
(9, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-02 08:51:16', '2022-01-02 08:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `patient_location`
--

CREATE TABLE `patient_location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientId` int(11) NOT NULL,
  `countryId` bigint(20) UNSIGNED NOT NULL,
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `floor_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_location`
--

INSERT INTO `patient_location` (`id`, `patientId`, `countryId`, `cityId`, `location_name`, `state`, `street`, `building_name`, `longitude`, `latitude`, `floor_number`, `created_at`, `updated_at`) VALUES
(17, 1, 1, 1, 'lin', 'iugi', 'kjkj', 'kjb', 'kbk', 'iugiu', 'uihg', '2021-08-29 14:16:56', '2021-08-29 14:16:56'),
(18, 1, 1, 1, 'Sdddddd', NULL, NULL, NULL, '31.099380366504192', '29.06612660195941', NULL, '2021-08-30 13:31:08', '2021-08-30 13:31:08'),
(19, 1, 1, 1, 'lin', 'iugi', 'kjkj', 'kjb', 'kbk', 'iugiu', 'uihg', '2021-09-14 11:10:30', '2021-09-14 11:10:30'),
(20, 1, 1, 1, 'VvvvvVv', 'Bbb', 'Hhh', 'Hhh', '30.721436329185963', '29.25248360871642', '999', '2021-09-14 14:55:57', '2021-09-14 14:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `appointmentId` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `cvc` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people_under_care`
--

CREATE TABLE `people_under_care` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `age` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `years` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `relationship` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `blood` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `weight` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `height` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pressure` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `chronic` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `companies_insuranceId` int(11) DEFAULT NULL,
  `other_companies_insurance` varchar(200) DEFAULT NULL,
  `number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people_under_care_health`
--

CREATE TABLE `people_under_care_health` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `blood` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `pressure` varchar(10) NOT NULL,
  `chronic` varchar(10) NOT NULL,
  `insurance` varchar(10) NOT NULL,
  `ege` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'الفواتير', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(2, 'قائمة الفواتير', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(3, 'الفواتير المدفوعة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(4, 'الفواتير المدفوعة جزئيا', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(5, 'الفواتير الغير مدفوعة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(6, 'ارشيف الفواتير', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(7, 'التقارير', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(8, 'تقرير الفواتير', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(9, 'تقرير العملاء', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(10, 'المستخدمين', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(11, 'قائمة المستخدمين', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(12, 'صلاحيات المستخدمين', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(13, 'الاعدادات', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(14, 'المنتجات', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(15, 'الاقسام', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(16, 'اضافة فاتورة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(17, 'حذف الفاتورة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(18, 'تصدير EXCEL', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(19, 'تغير حالة الدفع', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(20, 'تعديل الفاتورة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(21, 'ارشفة الفاتورة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(22, 'طباعةالفاتورة', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(23, 'اضافة مرفق', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(24, 'حذف المرفق', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(25, 'اضافة مستخدم', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(26, 'تعديل مستخدم', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(27, 'حذف مستخدم', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(28, 'عرض صلاحية', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(29, 'اضافة صلاحية', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(30, 'تعديل صلاحية', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(31, 'حذف صلاحية', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(32, 'اضافة منتج', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(33, 'تعديل منتج', 'web', '2021-06-30 12:42:07', '2021-06-30 12:42:07'),
(34, 'حذف منتج', 'web', '2021-06-30 12:42:08', '2021-06-30 12:42:08'),
(35, 'اضافة قسم', 'web', '2021-06-30 12:42:08', '2021-06-30 12:42:08'),
(36, 'تعديل قسم', 'web', '2021-06-30 12:42:08', '2021-06-30 12:42:08'),
(37, 'حذف قسم', 'web', '2021-06-30 12:42:08', '2021-06-30 12:42:08'),
(38, 'الاشعارات', 'web', '2021-06-30 12:42:08', '2021-06-30 12:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `placeissuancelicenses`
--

CREATE TABLE `placeissuancelicenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placeissuancelicenses`
--

INSERT INTO `placeissuancelicenses` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'jhv', 'hfhv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `descraption` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) DEFAULT NULL,
  `rates` varchar(200) DEFAULT NULL,
  `slug` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `subCategoryId`, `title`, `price`, `descraption`, `image`, `status`, `type`, `rates`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'جهاز تنفس', '20', 'vsvsf', 'gergt', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productsss`
--

CREATE TABLE `productsss` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `products_descraption` text NOT NULL,
  `price` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `BuyWay` int(11) NOT NULL,
  `countity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Seller_id` int(11) NOT NULL DEFAULT 1,
  `Status` varchar(20) NOT NULL DEFAULT 'نشر',
  `visits` int(11) NOT NULL DEFAULT 0,
  `offer` int(1) DEFAULT 0,
  `seen` int(11) DEFAULT NULL,
  `Rates` int(11) DEFAULT NULL,
  `more_sell` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsss`
--

INSERT INTO `productsss` (`id`, `title`, `products_descraption`, `price`, `categoryId`, `subCategoryId`, `country`, `BuyWay`, `countity`, `created_at`, `updated_at`, `Seller_id`, `Status`, `visits`, `offer`, `seen`, `Rates`, `more_sell`, `slug`) VALUES
(295, 'سامسونج A50', 'المعالج: Exynos 9610 ثماني النواة بتكنولوجيا 10 نانو\r\nالتخزين / الرام: 128 جيجا مع 4 جيجا رام\r\nالكاميرا: خلفية ثلاثية 25+8+5 م.ب. / امامية 25 م.ب.\r\nالشاشة: 6.4 بوصة بدقة FHD+ بها نوتش صغير\r\nنظام التشغيل: اندرويد 9.0\r\nالبطارية: 4000 مللي أمبير\r\nمواصفات موبايل Samsung Galaxy A50 :-\r\nيأتي الهاتف بأبعاد 158.5×74.7×7.7 ملم .\r\nيدعم الهاتف شريحتين إتصال من نوع Nano Sim .\r\nيدعم الهاتف شبكات الاتصال بدايةً من الجيل الثاني الـ 2G والجيل الثالث الـ 3G والجيل الرابع الـ 4G .\r\nلا يوجد حماية من الماء والأتربة .\r\nمتانة وجودة تصنيع الهاتف من البلاستيك بشكل الزجاج اللامع حيث تستخدم تقنية الـ 3D Glasstic ليعطي شعور أفضل بمتانة وشكل الهاتف .\r\nالشاشة تأتي بشكل النوتش الـ Infinity U من نوع Super AMOLED وتأتي الشاشة بمساحة 6.4 إنش بجودة الـ FHD+ بدقة 1080×2340 بكسل بمعدل كثافة بكسلات 403 بكسل لكل إنش وتقدم الشاشة أبعاد عرض بنسبة 19.5:9 وتحتل الشاشة من الواجهة الأمامية للهاتف نسبة 84.9% والشاشة عليها حماية جوريلا الجيل الثالث .\r\nالهاتف يأتي بمعالج من شركة سامسونج نفسها من نوع Exynos 9610 Octa بتقنية الـ 10nm وهو معالج جديد من سامسونج نتوقع اداء باهر ليه خصوصا لوجود اربع انوية به من نوع Cortex A73 يعملوا بتردد عالي 2.3 جيجا هرتز , والاربعة الأخرين A53 بتردد 1.6 جيجا هرتز , ويتفوق معالج السامسونج على معالج سناب دراجون 660 بفارق بسيط مع استهلاك بطارية افضل في معالج السامسونج لان التكنولوجيا 10 نانو .\r\nالمعالج الرسومي يأتي من نوع Mali-G72 MP3 وهو نفس المعالج الرسومي المعتاد في الفئة المتوسطة من سامسونج وهو صاحب اداء مميز ويقوم بتشغيل Pubg على اعدادات High HD بدون مشاكل .\r\n– يأتي بذاكرة صلبة بسعة 128 جيجا بايت مع ذاكرة عشوائية بسعة 4 جيجا بايت ( النسخة الي موجودة في مصر والوطن العربي ) .\r\n-يدعم الهاتف إمكانية زيادة المساحة التخزينية عن طريق كارت ميموري حتى سعة 512 جيجا بايت بمنفذ مخصص .\r\nالكاميرا الخلفية تأتي بكاميرا ثلاثية حيث تأتي الكاميرا الأولى بدقة 25 ميجا بكسل بفتحة عدسة F/1.7 وهي الكاميرا الأساسية والكاميرا الثانية تأتي بدقة 8 ميجا بكسل بفتحة عدسة F/2.2 وهي الخاصة بالتصوير الـ Wide Angle والكاميرا الثالثة تأتي بدقة 5 ميجا بكسل بفتحة عدسة F/2.2 للتصوير البورتريه والعمق بالإضافة إلى فلاش خلفي من نوع ليد .\r\nالكاميرا الأمامية تأتي بدقة 25 ميجا بكسل بفتحة عدسة F/2.0 والكاميرا الأمامية تدعم عمل البورتريه أيضا .\r\nالهاتف يدعم تصوير فيديوهات بالكاميرا الخلفية بجودة الـ FHD بدقة 1080 بكسل بمعدل إلتقاط 30 إطار في الثانية كما تدعم الكاميرات خاصية الـ AR Emoji والـ Slow Motion والـ Hyperlapse مثل هواتفها الرائدة .\r\nالهاتف يدعم ميكروفون ثانوي الخاص بعزل الضوضاء والضجيج أثناء التحدث أو التسجيل أو التصوير أو إستخدام الهاتف بصفة عامة وستجده في أعلى الهاتف .\r\nالهاتف يدعم الواي فاي بترددات a/b/g/n/ac بالإضافة إلى دعمه لـ Dual-band, WiFi Direct, hotspot .\r\nالهاتف يدعم البلوتوث بأحدث إصدار الإصدار الخامس مع دعمه لخاصيتي الـ A2DP, LE .\r\nالهاتف يدعم تحديد الموقع الجغرافي الـ GPS بالإضافة إلى دعمه لخاصيتي الـ A-GPS, GLONASS, BDS .\r\nالهاتف يدعم الإتصال قريب المدى الـ NFC ولكن في إصدارات محدودة .\r\nمنفذ الـ USB يأتي بالنوع الأحدث حيث يأتي من نوع Type C بإصدار 2.0 .\r\nما زال الهاتف يدعم منفذ الـ 3.5 ملم الخاص بسماعات الراس لإستخدام السماعات التقليدية ويأتي في أسفل الهاتف .\r\nيدعم الهاتف مستشعر البصمة ويأتي أسفل الشاشة ليكون أول هاتف في سلسلة الـ A يدعم ذلك وهي تقنية قريبة جدا من هاتف Samsung S10 ولكنها للأسف لا تعمل بالموجات الفوق صوتية مثل S10 وبالتالي فهي بطيئة في الاستجابة ولكنها مقبولة بالنسبة لسعر الهاتف , كما يدعم الهاتف خاصية Face Unlock .\r\nكما يدعم الهاتف معظم المستشعرات الأخرى مثل التسارع والضوء والبوصلة والجيروسكوب .\r\nالبطارية تأتي بسعة 4000 ملي أمبير والبطارية تدعم الشحن السريع بقوة 15 واط .\r\nالهاتف يأتي بأحدث نظام تشغيل Android 9.0 Pie مع واجهة Samsung One UI والتي ستجدها في هواتف الـ S10 الجديدة .\r\nيدعم تشغيل الراديو Fm .\r\nيدعم نسختين من برامج التواصل الاجتماعي .\r\nيتوفر الهاتف بأكثر من لون حيث يتوفر بعدة ألوان وهي اللون الأسود واللون الأزرق واللون الأبيض واللون', 900, 33, 119, 'كوريا', 1, 14, '2019-12-28 00:28:12', '2021-08-22 20:50:36', 98, 'نشر', 0, 0, 105, 3, 17, 'سامسونج-a50'),
(196, 'معطف نسائي', 'معطف نسائي شتوي لاطلالة انيقة و شتاء دافئ', 175, 46, 138, 'الصين', 1, 6, '2019-10-05 23:54:40', '2021-08-26 12:56:16', 98, 'نشر', 0, 1, 272, 3, 75, 'معطف-نسائي'),
(282, 'بيجامة قطنيه للحوامل', 'بيجامة قطنيه للحوامل ثلاثه قطع', 98, 48, 147, 'Turkey', 1, 10, '2019-12-26 00:10:37', '2021-08-23 15:30:48', 121, 'نشر', 0, 0, 46, NULL, 13, 'بيجامة-قطنيه-للحوامل-1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `liveId` text DEFAULT NULL,
  `channelId` text DEFAULT NULL,
  `channelName` text DEFAULT NULL,
  `liveDate` date DEFAULT NULL,
  `noOfViewers` text DEFAULT NULL,
  `hostImage` text DEFAULT NULL,
  `hostName` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `liveId`, `channelId`, `channelName`, `liveDate`, `noOfViewers`, `hostImage`, `hostName`, `created_at`, `updated_at`) VALUES
(28, NULL, '433266186', 'channel:userId', '2021-11-28', '0', NULL, 'host name', '2021-11-28 15:25:06', '2021-11-28 15:25:17'),
(39, 'verv', 'v', 'rever', '2021-07-29', 'ervre', '163890108283.jpeg', 'verver', '2021-12-07 18:18:02', '2021-12-07 18:18:02'),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-12 23:06:37', '2021-12-12 23:06:37'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 18:53:37', '2021-12-20 18:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryId` bigint(20) UNSIGNED NOT NULL,
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug_ar` varchar(255) DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `top` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categoryId`, `title_ar`, `title_en`, `price`, `description_ar`, `description_en`, `icon`, `image`, `slug_ar`, `slug_en`, `status`, `top`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'مرافق مريض', 'مرافق مريض', 2, '\r\nالإحصاءات\r\nالحالات الجديدةحالات الوفاةعمليات التلقيح\r\nمن JHU CSSE COVID-19 Data · تاريخ آخر تعديل: قبل يوم واحد\r\nمصر\r\nجميع الأوقات\r\n10 نوفمبر 2021\r\nالحالات الجديدة: ٩٣٤\r\nمتوسط 7 أيام: ٩١٨\r\nالحالات الجديدةمتوسط 7 أيام\r\nتُظهر بيانات كلّ يوم الحالات الجديدة التي تمّ الإبلاغ عنها منذ اليوم السابق.·لمحة عن هذه البيانات\r\nأهم النتائج\r\n\r\nعلاج كوفيد 19 في المنزل: نصائح للعناية بنفسك وبالآخرينhttps://www.mayoclinic.org › in-depth › art-20483273\r\nيجب اتباع توصيات الطبيب بشأن الرعاية والعزل المنزلي لنفسك وأحبائك. وإذا كانت لديك أي أسئلة بشأن العلاجات، يمكنك التحدث مع الطبيب. وساعد المريض في الحصول على', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(2, 1, 'إعطاء الادوية', 'إعطاء الادوية', 4, '\r\nالإحصاءات\r\nالحالات الجديدةحالات الوفاةعمليات التلقيح\r\nمن JHU CSSE COVID-19 Data · تاريخ آخر تعديل: قبل يوم واحد\r\nمصر\r\nجميع الأوقات\r\n10 نوفمبر 2021\r\nالحالات الجديدة: ٩٣٤\r\nمتوسط 7 أيام: ٩١٨\r\nالحالات الجديدةمتوسط 7 أيام\r\nتُظهر بيانات كلّ يوم الحالات الجديدة التي تمّ الإبلاغ عنها منذ اليوم السابق.·لمحة عن هذه البيانات\r\nأهم النتائج\r\n\r\nعلاج كوفيد 19 في المنزل: نصائح للعناية بنفسك وبالآخرينhttps://www.mayoclinic.org › in-depth › art-20483273\r\nيجب اتباع توصيات الطبيب بشأن الرعاية والعزل المنزلي لنفسك وأحبائك. وإذا كانت لديك أي أسئلة بشأن العلاجات، يمكنك التحدث مع الطبيب. وساعد المريض في الحصول على', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(3, 2, 'العناية بالجروح', 'العناية بالجروح', 6, '\r\nالإحصاءات\r\nالحالات الجديدةحالات الوفاةعمليات التلقيح\r\nمن JHU CSSE COVID-19 Data · تاريخ آخر تعديل: قبل يوم واحد\r\nمصر\r\nجميع الأوقات\r\n10 نوفمبر 2021\r\nالحالات الجديدة: ٩٣٤\r\nمتوسط 7 أيام: ٩١٨\r\nالحالات الجديدةمتوسط 7 أيام\r\nتُظهر بيانات كلّ يوم الحالات الجديدة التي تمّ الإبلاغ عنها منذ اليوم السابق.·لمحة عن هذه البيانات\r\nأهم النتائج\r\n\r\nعلاج كوفيد 19 في المنزل: نصائح للعناية بنفسك وبالآخرينhttps://www.mayoclinic.org › in-depth › art-20483273\r\nيجب اتباع توصيات الطبيب بشأن الرعاية والعزل المنزلي لنفسك وأحبائك. وإذا كانت لديك أي أسئلة بشأن العلاجات، يمكنك التحدث مع الطبيب. وساعد المريض في الحصول على', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(4, 2, 'زيارة تقييم اولي منزلي', 'زيارة تقييم اولي منزلي', 3, '\r\nالإحصاءات\r\nالحالات الجديدةحالات الوفاةعمليات التلقيح\r\nمن JHU CSSE COVID-19 Data · تاريخ آخر تعديل: قبل يوم واحد\r\nمصر\r\nجميع الأوقات\r\n10 نوفمبر 2021\r\nالحالات الجديدة: ٩٣٤\r\nمتوسط 7 أيام: ٩١٨\r\nالحالات الجديدةمتوسط 7 أيام\r\nتُظهر بيانات كلّ يوم الحالات الجديدة التي تمّ الإبلاغ عنها منذ اليوم السابق.·لمحة عن هذه البيانات\r\nأهم النتائج\r\n\r\nعلاج كوفيد 19 في المنزل: نصائح للعناية بنفسك وبالآخرينhttps://www.mayoclinic.org › in-depth › art-20483273\r\nيجب اتباع توصيات الطبيب بشأن الرعاية والعزل المنزلي لنفسك وأحبائك. وإذا كانت لديك أي أسئلة بشأن العلاجات، يمكنك التحدث مع الطبيب. وساعد المريض في الحصول على', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(5, 4, 'العناية بالنظافة الشخصية', 'العناية بالنظافة الشخصية', 6, 'سواء كان المسن قادرا علي الاستحمم مع قليل من المساعده او غير قادر عل الاطلاق', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(6, 4, 'رعاية التغذية', 'رعاية التغذية', 3, 'يمكن لكبار السن ان يشعرو بالتحسس تجاه بعض الاطعمه وذلك بسبب الشيخوخة والمرض', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(7, 3, 'طبيب الامراض  الباطنية', 'طبيب الامراض  الباطنية', 6, 'يعد التدليك أو المساج لفترة ما قبل الولادة أو أثناء الحمل طريقة مفيدة للمساعدة في التغلب علي العديد من الألم', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL),
(8, 3, 'طبيب أمراض نساء', 'طبيب أمراض نساء', 3, 'الفريق المختص من المعالجين الطبيعيين المؤهلين هو الأقدر علي تقديم التمارين العلاجية الطبيعية المعتمدة', 'home isolation folloup', '1613493502.png', '1613493502.png', 'vvervr', 'vervver', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_dayId` bigint(20) UNSIGNED NOT NULL,
  `from_time` varchar(255) DEFAULT NULL,
  `to_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `work_dayId`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(38, 39, '15:10', '23:36', '2022-01-02 08:33:09', '2022-01-02 08:33:09'),
(42, 43, '08:00', '01:00', '2022-01-26 06:41:48', '2022-01-26 06:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `walletId` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `transferFrom` int(11) DEFAULT NULL,
  `transferTo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `withdraw` float DEFAULT NULL,
  `value` float DEFAULT NULL,
  `report` text DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `oldValue` float DEFAULT NULL,
  `newValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `walletId`, `orderId`, `transferFrom`, `transferTo`, `type`, `withdraw`, `value`, `report`, `date`, `time`, `created_at`, `updated_at`, `oldValue`, `newValue`) VALUES
(36, 4, NULL, 1, 'total health', 'دفع', NULL, 20, NULL, NULL, NULL, '2021-09-13 15:46:30', '2021-09-13 15:46:30', NULL, NULL),
(37, 1, NULL, 1, 'total health', 'دفع', NULL, 20, NULL, NULL, NULL, '2021-09-13 15:46:30', '2021-09-13 15:46:30', NULL, NULL),
(39, 4, NULL, 1, 'total health', 'دفع', NULL, 2, NULL, NULL, NULL, '2021-09-13 15:59:06', '2021-09-13 15:59:06', NULL, NULL),
(40, 1, NULL, 1, 'total health', 'دفع', NULL, 2, NULL, NULL, NULL, '2021-09-13 15:59:06', '2021-09-13 15:59:06', NULL, NULL),
(41, 4, NULL, 1, 'total health', 'دفع', NULL, 2, NULL, NULL, NULL, '2021-09-13 16:00:29', '2021-09-13 16:00:29', NULL, NULL),
(42, 1, NULL, 1, 'total health', 'دفع', NULL, 2, NULL, NULL, NULL, '2021-09-13 16:00:29', '2021-09-13 16:00:29', NULL, NULL),
(43, 4, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-13 16:07:26', '2021-09-13 16:07:26', NULL, NULL),
(44, 5, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-13 16:07:26', '2021-09-13 16:07:26', NULL, NULL),
(45, 4, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-13 16:07:41', '2021-09-13 16:07:41', NULL, NULL),
(46, 5, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-13 16:07:41', '2021-09-13 16:07:41', NULL, NULL),
(47, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-14 11:55:02', '2021-09-14 11:55:02', NULL, NULL),
(48, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-14 11:55:02', '2021-09-14 11:55:02', NULL, NULL),
(49, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-14 17:35:52', '2021-09-14 17:35:52', NULL, NULL),
(50, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-14 17:35:52', '2021-09-14 17:35:52', NULL, NULL),
(51, 4, NULL, 1, '2', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-15 07:59:56', '2021-09-15 07:59:56', NULL, NULL),
(52, 4, NULL, 1, '2', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-15 08:00:55', '2021-09-15 08:00:55', NULL, NULL),
(53, 4, NULL, 1, '2', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-15 08:01:47', '2021-09-15 08:01:47', NULL, NULL),
(54, 4, NULL, 1, '2', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-15 08:02:26', '2021-09-15 08:02:26', NULL, NULL),
(55, 4, NULL, 1, '2', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-15 08:03:20', '2021-09-15 08:03:20', NULL, NULL),
(56, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-15 08:06:41', '2021-09-15 08:06:41', NULL, NULL),
(57, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-15 08:06:41', '2021-09-15 08:06:41', NULL, NULL),
(58, 4, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-15 08:06:42', '2021-09-15 08:06:42', NULL, NULL),
(59, 5, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-15 08:06:42', '2021-09-15 08:06:42', NULL, NULL),
(60, 4, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-15 08:06:49', '2021-09-15 08:06:49', NULL, NULL),
(61, 5, NULL, 1, '5', 'دفع', NULL, 150, NULL, NULL, NULL, '2021-09-15 08:06:49', '2021-09-15 08:06:49', NULL, NULL),
(62, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-15 09:29:57', '2021-09-15 09:29:57', NULL, NULL),
(63, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-09-15 09:29:57', '2021-09-15 09:29:57', NULL, NULL),
(64, 4, NULL, 1, '6', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-19 21:08:35', '2021-09-19 21:08:35', NULL, NULL),
(65, 4, NULL, 1, '10', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-23 05:09:22', '2021-09-23 05:09:22', NULL, NULL),
(66, 4, NULL, 1, '10', 'دفع', NULL, 0, NULL, NULL, NULL, '2021-09-23 05:10:16', '2021-09-23 05:10:16', NULL, NULL),
(67, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-11-11 10:50:33', '2021-11-11 10:50:33', NULL, NULL),
(68, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2021-11-11 10:50:33', '2021-11-11 10:50:33', NULL, NULL),
(69, 4, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 04:39:26', '2022-01-01 04:39:26', NULL, NULL),
(70, 5, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 04:39:26', '2022-01-01 04:39:26', NULL, NULL),
(71, 4, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 04:41:23', '2022-01-01 04:41:23', NULL, NULL),
(72, 5, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 04:41:23', '2022-01-01 04:41:23', NULL, NULL),
(73, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2022-01-01 04:54:38', '2022-01-01 04:54:38', NULL, NULL),
(74, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2022-01-01 04:54:38', '2022-01-01 04:54:38', NULL, NULL),
(75, 4, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 05:10:55', '2022-01-01 05:10:55', NULL, NULL),
(76, 5, NULL, 1, '5', 'دفع', NULL, 0, NULL, NULL, NULL, '2022-01-01 05:10:55', '2022-01-01 05:10:55', NULL, NULL),
(77, 4, NULL, 1, 'total health', 'دفع', NULL, 20, NULL, NULL, NULL, '2022-01-12 15:43:22', '2022-01-12 15:43:22', NULL, NULL),
(78, 1, NULL, 1, 'total health', 'دفع', NULL, 20, NULL, NULL, NULL, '2022-01-12 15:43:22', '2022-01-12 15:43:22', NULL, NULL),
(79, 4, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2022-01-12 15:48:20', '2022-01-12 15:48:20', NULL, NULL),
(80, 5, NULL, 1, '5', 'دفع', NULL, 18, NULL, NULL, NULL, '2022-01-12 15:48:20', '2022-01-12 15:48:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `roles_name` text NOT NULL,
  `Status` varchar(10) NOT NULL,
  `expire` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>active 1=>expire',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dateOfBirth`, `mobile`, `address`, `photo`, `type`, `roles_name`, `Status`, `expire`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$v8B8idYHemGAR9EflO7MhebBTSKNWhvmQuqpxrQm0lCUFrRRIcm2m', NULL, '023454', 'القاهره', '1613493502.png', 'admin', '[\"owner\"]', 'مفعل', 1, NULL, '2021-01-03 03:43:48', '2021-06-28 01:58:41'),
(2, 'hamada', 'hamada@hamada.com', '$2y$10$bOrXfCIhO5mCFWHeNoPNKuPHfpNxduJn4QDKGuZsnj72RPzSOTZK2', NULL, NULL, NULL, NULL, 'admin', '[\"employee\"]', 'مفعل', 1, NULL, '2021-01-03 07:02:34', '2021-06-28 01:57:43'),
(3, 'Diaa', 'diaa@gmail.com', '$2y$10$Yc7zKvx/Tf9Cc1jb3qhxre9V9KUOV3ntaWRq3J140n8zA.fSpmzeu', '2021-04-18', '0568645742', 'hail', '1618695044.png', 'admin', '[\"Admin\"]', 'مفعل', 1, NULL, '2021-04-17 19:30:44', '2021-06-28 01:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `id_user`, `token`, `created_at`) VALUES
(17, 46, 'wRCUuY6p4FNsU8AkTS6lhsj3fqpnZv', '2019-07-26 15:05:12'),
(18, 47, 'aJh0nf5Qd6cF9JCvATURoKyZiLXaDC', '2019-07-26 15:06:39'),
(19, 48, 'tI8o1v3KYSkuvW4UvZlppbl1GSLAlg', '2019-07-26 15:07:35'),
(20, 49, '5znaQl1c8czNqIBK78NPQjrCjhDKbS', '2019-07-26 15:12:48'),
(21, 50, 'I9KOruqrYwyhwnETiHOQlDgkq4MGsX', '2019-07-26 15:13:38'),
(22, 51, 'rGrupyZ4pLBCH0hzzJxmWrKlYN3fX0', '2019-07-26 15:14:26'),
(23, 52, 'ldy9v4fbJLQeo602BqHoAUl63GByBy', '2019-07-26 15:16:54'),
(24, 53, 'JtMVXPqRCSXXkO82RkRvuQHacNB5o3', '2019-07-26 15:21:19'),
(25, 54, 'u8uq6TD1N35qSwzD8Y5qtcTgMFmPix', '2019-07-26 15:22:48'),
(27, 56, 'D817mWCY3ohbejmY7VqycupmCeBgRM', '2019-07-26 15:43:57'),
(28, 57, 'aAq3F7pLrXVatrRHqUbWx25riI1dTu', '2019-07-26 16:09:02'),
(30, 59, '9MnCNruNYlAg7r8NGnZCwQAFy4Jnkm', '2019-07-26 16:18:06'),
(33, 62, 'eoBEFeJ97bVdGfQxakcCtvpxZqi1it', '2019-07-31 13:58:15'),
(34, 63, 'gSMcY3YH7ih4o46xcajdxLFCeCVLrc', '2019-07-31 14:01:45'),
(35, 64, '2wggWg0km1DwoAuxGzjp5iM8CLwN4y', '2019-07-31 14:18:35'),
(36, 66, '9vTjokj1XfQ6YBrmKlHLStosu4ZlxP', '2019-07-31 14:52:39'),
(37, 68, '88vKtOb9gQHRgTURMkLNF7w2LTnfU2', '2019-08-14 08:57:57'),
(38, 69, 'HFjv33PE7cRNYbWtyKXqO75CId1pXx', '2019-08-17 18:12:01'),
(39, 71, 'IzuYfBFFNoZUJS8IVgXBTzs47hFVir', '2019-08-26 10:49:58'),
(40, 72, 'XHwBU9lKRSeCORwEWvRE0w6A5FvwUi', '2019-08-26 13:42:00'),
(41, 73, 'qqU1KuJRNTM84aL3v2qWHi66XFv77F', '2019-08-26 13:55:46'),
(42, 74, 'Pg504T5fUwsroaylcsLjlPzmSAGidW', '2019-08-26 14:07:26'),
(43, 75, 've1At2uRTu8W3XK9sfWhumU7lmJjuX', '2019-08-26 14:18:42'),
(44, 76, 'XFILt9WUndtHKinLyvwsQMYQ2t1yme', '2019-08-26 14:37:19'),
(45, 77, 'O6Dfqb2VDmIbro2aHYL1BYPSCiRG5y', '2019-08-26 14:44:15'),
(46, 78, 'XlPQiVDqLf1IT4QOP5elgWswPhk301', '2019-08-26 14:45:05'),
(47, 79, 'oUgzXqj9XIHp8Y9Ve6g4IQXe2NJDpz', '2019-08-26 14:46:39'),
(51, 83, 'XFUv8LVBvy52rESkSY0yW3jQs0EYQv', '2019-09-12 11:53:02'),
(52, 84, 'h5Vz05ZamaqQfBYifoCXOLrisFj3sU', '2019-09-12 11:54:25'),
(53, 85, 'kitHeA3OfvVNfc8A6O1eeltwtMyQhT', '2019-09-18 09:28:25'),
(55, 87, 'xBEK7PLPHzJ6iPFV3NGdyHkf8ucLBF', '2019-09-20 18:17:54'),
(57, 89, 'AtRIr7iuGKuRuv1C1emI0EeTpvfnfx', '2019-09-22 10:46:31'),
(58, 90, 'UUhU7WmsXgQHdTfzjJrAFr6071hpSv', '2019-09-23 07:23:49'),
(59, 91, 'l34hgty99FZMYVC1ZnQ2emzh57lKhf', '2019-09-24 14:07:57'),
(61, 93, 'FsN2rsEaS2BkkPeV4I6mwarIK6ooHS', '2019-10-01 12:10:26'),
(62, 94, 'S8DxkOQgFvNRhLNtBMZy16SA8cSm8l', '2019-10-01 12:10:55'),
(63, 95, '6jArwMUENPDtVw6pxa2lHdBy79ZgZN', '2019-10-01 16:54:33'),
(64, 96, '5uHL98cvPMo7DArFbKHkabfxgRzmI0', '2019-10-01 16:56:52'),
(65, 97, 'vVRcckylQloyIZVEilROsNB67n2fXM', '2019-10-01 16:57:37'),
(67, 99, 'cBPmcGEO48lAG8xvT29wXvbXCLgTRf', '2019-10-06 13:04:12'),
(68, 100, 'tJdTeWizQK8HqVazFUNnAObVPhJQGH', '2019-10-06 13:20:55'),
(69, 101, '1ozQpbPauG4JYLl8U1z5VipWcwmE9p', '2019-10-06 13:38:09'),
(70, 102, 'PBDezHw6gFkHBYZM5OpIhRsOtn9jrA', '2019-10-06 14:32:42'),
(71, 103, '4Zm6wQEx8KnP7oE4vBRxtGxDtcbXJs', '2019-10-09 16:49:45'),
(72, 104, 'YR450vdwnBytSRU62rwb6g745B57Sy', '2019-10-09 16:51:40'),
(73, 105, 'WrqHpWFSVUvaUr5icPQzI8zDZ2gaZW', '2019-10-10 11:09:47'),
(74, 106, 'souTev0X8U3DK3PgMiNZetDMZHsE9g', '2019-10-10 11:13:02'),
(76, 108, 'rtXgNdMFmgzoVUPPY2ZbHIUpa2neg4', '2019-10-13 11:24:08'),
(77, 109, 'aF88mHmPqv6RreqUmUz4GgHTLa2gqQ', '2019-10-13 14:03:10'),
(79, 111, 'p2PBn6rFQuhiToQr5ZAOEi2MHDxGuG', '2019-10-14 08:29:05'),
(80, 112, 'axR44ep4AEkaf1sTCK5s7qUDYhUwIE', '2019-10-14 08:33:51'),
(81, 114, 'ZnWezytEji1RdY9L5WJaGEO829Udel', '2019-10-14 08:46:43'),
(82, 115, 'cvD6DrT9Y8jgirJ56Ph6qi2YzZ0Rxt', '2019-10-14 08:50:58'),
(84, 117, 'mKthSBmihRwIUGtLyItDL1VmWavCXh', '2019-10-22 05:02:25'),
(85, 118, 'YZUqNyBvFxEz7AraOZfMevxH3wNwgw', '2019-10-25 14:44:54'),
(86, 122, 'wE5pJUNgOSXCzlCFlBBjNhfdy8wjV8', '2019-12-23 14:27:18'),
(87, 123, 'JgySjzbZA6fAapizsPPdjeNEr4eiL2', '2019-12-23 14:57:13'),
(88, 124, 'oTSsmcEtmYBK6kUedNwNJbTJqfaD2l', '2019-12-23 15:20:32'),
(89, 125, 'PHcpSW3Z1kNeOSDRW9jxZKroyVOw67', '2019-12-23 15:21:41'),
(90, 126, '7ioXkbjfrAM18i3xVu8KlKgLwP1gVV', '2019-12-23 15:26:30'),
(91, 127, 'OquNYgYaYB4RcB1YwOMneCowh4bFtu', '2019-12-23 15:30:27'),
(92, 128, 'KNSPjzrIMPNTE2AKZK3brQZQnMv7Js', '2019-12-23 15:48:46'),
(94, 130, 'OI6EXyxmf5lVdQa6XV1GcuaKlS1BCY', '2020-01-06 16:30:23'),
(95, 131, 'ezzIFPBrGdrtu6aTBGnwdx5Eh1o35d', '2020-01-09 12:23:13'),
(97, 18, 'Lr9A7s1DohdRxPo41S61vr6lKow7n9C0', '2021-03-08 05:43:26'),
(98, 19, 'xbkYxOaqEExohIoLvlD7691elszuhgWc', '2021-03-08 05:44:30'),
(99, 21, 'bB5krp2D1ww1QxoO0ofXnM7DDU1u5LR4', '2021-03-08 06:24:07'),
(100, 22, 'hHqFopeYzWKX71152KA9VfCGC9DVzCyF', '2021-03-08 06:24:47'),
(101, 23, '9Z45uVsiqdLsk5OyxHhOAIGgtGkmCyUT', '2021-03-08 06:26:08'),
(102, 24, 'y4wi8F5fPfF7EhaY32UmQng4DMDuVbXR', '2021-03-08 06:31:31'),
(103, 25, 'ouiDlyHVmrquSbo3zL9OfLCTpSwaAFjM', '2021-03-08 06:35:23'),
(104, 26, 'spXGUNHWgUOWVYJQu1wNyc6CcZwQVUvW', '2021-04-13 01:54:21'),
(105, 27, 'Hs6qny9ENuXTFndxEqFvLVCjUFumLkjL', '2021-04-13 01:59:13'),
(106, 28, '2HXjJ8jeaj8XUHiY9MP2dtJKNIEnW6Ib', '2021-04-13 02:02:31'),
(107, 29, 'xdKy16vIfVrI4Nx5DOxCngy8KeWP198b', '2021-04-13 02:03:33'),
(108, 30, 'uO2seA1rH8Y7d6iAjwPfibX0haR0KIsB', '2021-04-13 02:07:35'),
(109, 31, 'oR71euAjzWwvm3xaMjmxyetz6sOfsx9s', '2021-04-13 02:08:47'),
(110, 18, 'wn0yaN7ykvvIzdJHY2r3eBPvAL4Cq8VD', '2021-04-13 02:25:31'),
(111, 19, 'mMWydEeZi0nCTXIdeEocTPUsGBipJmOn', '2021-04-13 02:51:10'),
(112, 20, 'eNqKpv4aVfMZ0pTZsEaktVKfHxycNiiF', '2021-04-13 03:41:44'),
(113, 21, 'jYHZ6v0KuepNJEdFaIRW2RiW31VSv58x', '2021-04-13 03:53:01'),
(118, 33, 'FWYPC2E7QLycWjmlDACPSIr7AuJHA3KI', '2021-04-13 10:16:44'),
(121, 36, '9mtn1STG17qiD2KODyZBL9xJZeDmjltQ', '2021-04-16 05:58:39'),
(122, 38, 'NGIgugxwSNadoJBwq6gOG9kJRKb3qfJu', '2021-04-16 06:06:21'),
(123, 39, 'fQQNuNlVoPz0ojou7j3Efq0wStRnvrBt', '2021-04-16 06:07:14'),
(124, 40, 'Zz7o9PU6ia5v3c1sIN3QLThg1BEQ7kpK', '2021-04-16 07:42:43'),
(126, 44, 'sHLZLQfeaBJw7fBLhLQZ5jHhDFbOuc7V', '2021-04-16 12:10:56'),
(127, 37, 'W235XWrIOTusZyEHUTvs2F6afR4nf6L1', '2021-04-16 22:17:18'),
(128, 38, 'TsYlhRArS9XAoiI7xnXQQfmrTALeCVBM', '2021-04-17 16:22:29'),
(129, 46, 'DQgMUIcmgzZY4vQa1cPpGmJ38aQ4pzkX', '2021-04-20 05:35:00'),
(130, 42, 'B1NBvkxJDppE66IpeoY0SSBtLHwVuC5Q', '2021-04-20 05:39:03'),
(131, 44, 'FKPA9TSul9uz7DAvqcPt4ZDLwSK0P8in', '2021-04-21 09:59:30'),
(132, 45, 'w3E0MDQnGixxbGYYpbF39ERvZ1nSfH9a', '2021-04-21 10:04:08'),
(133, 46, 'Pe3Jo2LzzG2Iimdl7cQbVoqBrNRWXanI', '2021-04-21 10:07:06'),
(134, 47, 'sP7pjEvuNMzasrtZa0XRFsZ8dZ9X5W1D', '2021-04-21 10:08:23'),
(135, 48, 'zTzJAwrpfnS5gxHoJoeEVhx0X9BSLQPS', '2021-04-24 04:49:50'),
(137, 2, 'pz4vDNG7fQ5iKAoJFmr8chTyNjkiOVTG', '2021-06-30 15:06:53'),
(138, 3, 'JMSfOYbODEAxDMRHh67e5J9LYLRKZbNQ', '2021-07-02 04:26:48'),
(139, 4, 'U751E0uKjJlBWF4jtfgA4D7oXdTQWLYa', '2021-07-02 07:31:20'),
(140, 5, '93mDjYAg8rSi0Jec5tVYa38n1xUWL99d', '2021-07-02 07:47:40'),
(141, 6, 'OlWmM2kAlbOeO7RIDe12ijwYvuYVQWmF', '2021-07-09 17:43:40'),
(142, 7, 'r5LbP4AIih50lv9NtVIUc4iuwGBSGfh8', '2021-07-09 17:45:17'),
(143, 8, '2QIRjOd2oSWFFekTTaYPg4gAVHbpPh0P', '2021-07-09 17:45:31'),
(144, 9, 'cgbsqJUEYLwSgLav53em1XeYnjmS6GAx', '2021-07-09 17:46:14'),
(145, 10, '6yEQmgNl8YceHn9jVhOT0POQ07dFQdtG', '2021-07-11 10:36:38'),
(146, 11, 'qxt23glOKU4dWVBi3LiVMjzCmsyVodQu', '2021-07-11 10:40:38'),
(147, 12, 'FJ8FZPgglwWymctpD0ZyvVzADvMsCQuI', '2021-07-11 10:45:24'),
(148, 13, 'Z4gcDKuNx3HpiXhgaSmlhtHlQt7wThE2', '2021-07-11 10:51:39'),
(149, 2, '8gaxV6vxODkeHdxxnmhfy6AkjwHwXQmb', '2021-07-28 14:20:12'),
(150, 3, 'YqPA8DU4rHUxNCa0VHj4RRfzs4LIN1Bb', '2021-07-29 09:16:23'),
(151, 4, 'WMcMGEjRHNc9gCTKvS7hzaIWfl1qfuqt', '2021-07-29 09:43:54'),
(152, 7, '3TTSFomcBcvFkBwgbX9QafvlpFTliz9W', '2021-08-23 08:09:58'),
(153, 8, 'U7gQw5ruMUm0KnP67ilAF2uWDfgcywIN', '2021-11-08 17:39:55'),
(154, 9, 'WSt4k4eNgwFKQwFJLrb6ljDzOYb5Q61N', '2021-12-27 06:26:33'),
(155, 10, 'DVUI1b4D1xQ2rECzL72Tf1CSL0DoEmso', '2021-12-29 18:55:17'),
(156, 11, 'EwzFNTOHhl8OHhARlBh7BcIisFWjmdoE', '2021-12-29 18:59:46'),
(157, 12, 'NKEo2no6ohwMKayBZ5F91FaZJie67qnd', '2021-12-30 09:26:45'),
(158, 6, 'LzSbBNV8SBcW0MHXifiGP6P8UgShncv5', '2022-01-02 05:06:37'),
(162, 10, 'QMdwFP0j0szbQCcdgOVb7zkfUgFkj1Rd', '2022-01-02 05:49:44'),
(163, 11, 'jEOMJrk8n59Zl9u7MhBtkHog9wvqOti7', '2022-01-02 05:56:39'),
(165, 13, 't0hQjVpqUq20keUWck0xQhxVwK6MDvFe', '2022-01-02 07:52:01'),
(166, 14, 'iORviO9UMDKEnNtcKcELr9oBtmGTewjL', '2022-01-02 08:13:58'),
(167, 15, '5zaePKtbW6tvwz81P7G1KOjGjmsBp0j1', '2022-01-02 08:19:19'),
(171, 14, 'U6lV5NFa2ewJoEFyZcKmPGJkcMMSJk3r', '2022-01-02 08:51:16'),
(172, 18, 'rv8PDhrwcmBm4bW9xlKjKD0e0L9G3pSz', '2022-01-24 03:45:55'),
(173, 19, 'lp8jruMhNLNca06uWoJzdsFaGspFojOV', '2022-01-24 03:47:35'),
(174, 20, 'hQmtrE9K7IAgmpbwQOlgnPvzWJZcIuVk', '2022-01-24 03:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `patientId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `total` float DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `doctorId`, `patientId`, `userId`, `total`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1044, NULL, '2022-01-12 15:43:22'),
(4, NULL, 1, NULL, 230, NULL, '2022-01-12 15:48:20'),
(5, 5, NULL, NULL, 1252, NULL, '2022-01-12 15:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `work_days`
--

CREATE TABLE `work_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_days`
--

INSERT INTO `work_days` (`id`, `doctorId`, `from_date`, `to_date`, `duration`, `created_at`, `updated_at`) VALUES
(39, 17, NULL, NULL, NULL, '2022-01-02 08:33:09', '2022-01-02 08:33:09'),
(43, 5, NULL, NULL, NULL, '2022-01-26 06:41:48', '2022-01-26 06:41:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctorid_foreign` (`doctorId`),
  ADD KEY `appointments_patientid_foreign` (`patientId`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_doctorid_foreign` (`doctorId`),
  ADD KEY `favorites_patientid_foreign` (`patientId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_categories_categoryid_foreign` (`categoryId`),
  ADD KEY `child_categories_subcategoryid_foreign` (`subCategoryId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_countryid_foreign` (`countryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_patientid_foreign` (`patientId`);

--
-- Indexes for table `companies_insurances`
--
ALTER TABLE `companies_insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `days_work_dayid_foreign` (`work_dayId`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_countryid_foreign` (`countryId`),
  ADD KEY `doctors_cityid_foreign` (`cityId`);

--
-- Indexes for table `doctors_activation`
--
ALTER TABLE `doctors_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_banks`
--
ALTER TABLE `doctor_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_banks_doctorid_foreign` (`doctorId`),
  ADD KEY `doctor_banks_countryid_foreign` (`countryId`),
  ADD KEY `doctor_banks_cityid_foreign` (`cityId`);

--
-- Indexes for table `doctor_cases`
--
ALTER TABLE `doctor_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_certificates`
--
ALTER TABLE `doctor_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_certificates_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `doctor_educations`
--
ALTER TABLE `doctor_educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_educations_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `doctor_experiences`
--
ALTER TABLE `doctor_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_experiences_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `doctor_insurances`
--
ALTER TABLE `doctor_insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_insurances_doctorid_foreign` (`doctorId`),
  ADD KEY `doctor_insurances_companies_insuranceid_foreign` (`companies_insuranceId`);

--
-- Indexes for table `doctor_languages`
--
ALTER TABLE `doctor_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_languages_doctorid_foreign` (`doctorId`),
  ADD KEY `doctor_languages_languageid_foreign` (`languageId`);

--
-- Indexes for table `doctor_licenses`
--
ALTER TABLE `doctor_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_licenses_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `doctor_services`
--
ALTER TABLE `doctor_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_services_categoryid_foreign` (`categoryId`),
  ADD KEY `doctor_services_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_doctorid_foreign` (`doctorId`),
  ADD KEY `favorites_patientid_foreign` (`patientId`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lives`
--
ALTER TABLE `lives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_ship_types`
--
ALTER TABLE `member_ship_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`(191),`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_doctorid_foreign` (`doctorId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_images`
--
ALTER TABLE `order_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Order_sub_categories`
--
ALTER TABLE `Order_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `patient_cases`
--
ALTER TABLE `patient_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_health_information`
--
ALTER TABLE `patient_health_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_location`
--
ALTER TABLE `patient_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_countryid_foreign` (`countryId`),
  ADD KEY `doctors_cityid_foreign` (`cityId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_doctorid_foreign` (`doctorId`),
  ADD KEY `payments_patientid_foreign` (`patientId`),
  ADD KEY `payments_appointmentid_foreign` (`appointmentId`);

--
-- Indexes for table `people_under_care`
--
ALTER TABLE `people_under_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_under_care_health`
--
ALTER TABLE `people_under_care_health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placeissuancelicenses`
--
ALTER TABLE `placeissuancelicenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsss`
--
ALTER TABLE `productsss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_doctorid_foreign` (`doctorId`),
  ADD KEY `reviews_patientid_foreign` (`patientId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_countryid_foreign` (`countryId`),
  ADD KEY `states_cityid_foreign` (`cityId`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_categoryid_foreign` (`categoryId`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `times_work_dayid_foreign` (`work_dayId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_id_user_foreign` (`id_user`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_days`
--
ALTER TABLE `work_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_days_doctorid_foreign` (`doctorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies_insurances`
--
ALTER TABLE `companies_insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctors_activation`
--
ALTER TABLE `doctors_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_banks`
--
ALTER TABLE `doctor_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor_cases`
--
ALTER TABLE `doctor_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_certificates`
--
ALTER TABLE `doctor_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_educations`
--
ALTER TABLE `doctor_educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `doctor_experiences`
--
ALTER TABLE `doctor_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `doctor_insurances`
--
ALTER TABLE `doctor_insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `doctor_languages`
--
ALTER TABLE `doctor_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `doctor_licenses`
--
ALTER TABLE `doctor_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `doctor_services`
--
ALTER TABLE `doctor_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lives`
--
ALTER TABLE `lives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `member_ship_types`
--
ALTER TABLE `member_ship_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_images`
--
ALTER TABLE `order_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Order_sub_categories`
--
ALTER TABLE `Order_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient_cases`
--
ALTER TABLE `patient_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_health_information`
--
ALTER TABLE `patient_health_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_location`
--
ALTER TABLE `patient_location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_under_care`
--
ALTER TABLE `people_under_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_under_care_health`
--
ALTER TABLE `people_under_care_health`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `placeissuancelicenses`
--
ALTER TABLE `placeissuancelicenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productsss`
--
ALTER TABLE `productsss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_days`
--
ALTER TABLE `work_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `favorites_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `favorites_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_subcategoryid_foreign` FOREIGN KEY (`subCategoryId`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_countryid_foreign` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);

--
-- Constraints for table `days`
--
ALTER TABLE `days`
  ADD CONSTRAINT `days_work_dayid_foreign` FOREIGN KEY (`work_dayId`) REFERENCES `work_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_cityid_foreign` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_countryid_foreign` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_banks`
--
ALTER TABLE `doctor_banks`
  ADD CONSTRAINT `doctor_banks_cityid_foreign` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_banks_countryid_foreign` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_banks_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_certificates`
--
ALTER TABLE `doctor_certificates`
  ADD CONSTRAINT `doctor_certificates_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_educations`
--
ALTER TABLE `doctor_educations`
  ADD CONSTRAINT `doctor_educations_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_experiences`
--
ALTER TABLE `doctor_experiences`
  ADD CONSTRAINT `doctor_experiences_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_insurances`
--
ALTER TABLE `doctor_insurances`
  ADD CONSTRAINT `doctor_insurances_companies_insuranceid_foreign` FOREIGN KEY (`companies_insuranceId`) REFERENCES `companies_insurances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_insurances_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_languages`
--
ALTER TABLE `doctor_languages`
  ADD CONSTRAINT `doctor_languages_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_languages_languageid_foreign` FOREIGN KEY (`languageId`) REFERENCES `languages` (`id`);

--
-- Constraints for table `doctor_licenses`
--
ALTER TABLE `doctor_licenses`
  ADD CONSTRAINT `doctor_licenses_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_services`
--
ALTER TABLE `doctor_services`
  ADD CONSTRAINT `doctor_services_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_services_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_appointmentid_foreign` FOREIGN KEY (`appointmentId`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `payments_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `payments_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `reviews_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_cityid_foreign` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `states_countryid_foreign` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `times_work_dayid_foreign` FOREIGN KEY (`work_dayId`) REFERENCES `work_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_days`
--
ALTER TABLE `work_days`
  ADD CONSTRAINT `work_days_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
