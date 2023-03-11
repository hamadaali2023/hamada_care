-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 10:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apii`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `roles_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `dateOfBirth`, `mobile`, `address`, `photo`, `type`, `roles_name`, `Status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$SUSNepZCqHtRxTSt7dlpteRE.JOx9EoICe0yMeLK1AdhPH3rEW/nC', NULL, NULL, NULL, NULL, 'admin', '[\"owner\"]', 'مفعل', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxMzM5NDkyNiwiZXhwIjoxNjEzMzk4NTI2LCJuYmYiOjE2MTMzOTQ5MjYsImp0aSI6ImRQaTVLSlVrRVlZckMyNEYiLCJzdWIiOjEsInBydiI6IjFmZDU0MjMxNjI4ZmU3NDk3ZGI2ZjkxNjJjMjQ2NTc4YTdjNzgxY2EifQ.8eWplgB3geuoqBckuZOxXiLXuiluXeutaBVe8u95d1k', NULL, '2021-01-03 03:43:48', '2021-02-15 11:15:26'),
(2, 'hamada', 'hamada@hamada.com', '$2y$10$bOrXfCIhO5mCFWHeNoPNKuPHfpNxduJn4QDKGuZsnj72RPzSOTZK2', NULL, NULL, NULL, NULL, 'admin', '[\"employee\"]', 'مفعل', '', NULL, '2021-01-03 07:02:34', '2021-01-09 07:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT 'confirmed',
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctorId`, `patientId`, `date`, `time`, `permanent_type`, `status`, `payment_status`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(4, 34, 43, '2021-04-17', '2:30', 'AF', 'confirmed', 1, NULL, 'reavel', '2021-04-16 09:46:11', '2021-04-16 09:48:25'),
(5, 34, 43, '2021-04-18', '10:42', 'AM', 'confirmed', 0, NULL, 'Video', '2021-04-16 10:08:08', '2021-04-16 10:08:08'),
(6, 34, 44, '2021-04-17', '2:30', 'AF', 'confirmed', 0, NULL, 'Video', '2021-04-16 10:11:57', '2021-04-16 10:11:57'),
(7, 34, 44, '2021-04-17', '4:00', 'PM', 'confirmed', 1, NULL, 'Video', '2021-04-17 08:33:32', '2021-04-17 08:34:19'),
(10, 39, 44, '2021-04-19', '4:30', 'PM', 'confirmed', 0, NULL, 'reavel', '2021-04-17 15:19:17', '2021-04-17 15:19:17'),
(11, 39, 44, '2021-04-20', '11:30', 'AM', 'confirmed', 0, NULL, 'Video', '2021-04-17 15:19:28', '2021-04-17 15:19:28'),
(12, 39, 44, '2021-04-18', '9:00', 'PM', 'confirmed', 0, NULL, 'Video', '2021-04-17 15:20:42', '2021-04-17 15:20:42'),
(13, 39, 44, '2021-04-17', '9:00', 'PM', 'confirmed', 0, NULL, 'Video', '2021-04-17 15:21:07', '2021-04-17 15:21:07'),
(14, 34, 15, '2021-04-20', '8:00', 'AM', 'confirmed', 0, NULL, 'reavel', '2021-04-20 03:17:14', '2021-04-20 03:17:14'),
(15, 43, 15, '2021-04-20', '8:00', 'AM', 'confirmed', 1, NULL, 'reavel', '2021-04-20 03:17:44', '2021-04-20 03:17:44'),
(16, 42, 15, '2021-04-20', '8:00', 'AM', 'confirmed', 1, NULL, 'Video', '2021-04-20 03:17:56', '2021-04-20 03:17:56'),
(17, 42, 15, '2021-04-25', '8:00', 'AM', 'confirmed', 1, NULL, 'Video', '2021-04-20 03:20:02', '2021-04-20 03:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED DEFAULT NULL,
  `specialityId` int(11) DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `doctorId`, `specialityId`, `title_ar`, `title_en`, `description_ar`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(3, 34, 8, 'المقال عربي١', 'المقال عربي', 'يييييييييييييييييييييييييييييييييييييييييييييي١', 'يييييييييييييييييييييييييييييييييييييييييييييي١', '1618574354.png', '2021-04-16 09:59:14', '2021-04-16 10:00:02'),
(4, 41, 1, 'المقال عربي', 'المقال عربي', 'اااااااااااااااااااااااااااااا', 'اااااااااااااااااااااااااااااا', '1618696613.jpg', '2021-04-17 19:56:53', '2021-04-17 19:56:53'),
(5, 42, 2, 'مقال جديد', 'مقال جديد', 'مقال جديد', 'مقال جديد', '1618898025.jpg', '2021-04-20 03:53:45', '2021-04-20 03:53:45'),
(6, 42, 2, 'مقال ٢', 'مقال ٢', 'مقال جديد٢', 'مقال جديد٢', '1618898255.jpg', '2021-04-20 03:57:35', '2021-04-20 03:57:35'),
(7, 48, 2, 'rfrf', 'rfrf', 'edede', 'edede', '1619243183.jpeg', '2021-04-24 03:46:23', '2021-04-24 03:46:23'),
(8, 42, 6, 'ffff', 'ffff', 'ffff', 'ffff', '1619243287.png', '2021-04-24 03:48:07', '2021-04-24 03:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pannar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `pannar`, `created_at`, `updated_at`) VALUES
(1, '1618679086.png', '2021-04-17 15:04:46', '2021-04-17 15:04:46'),
(2, '1618679125.png', '2021-04-17 15:05:25', '2021-04-17 15:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoriess`
--

CREATE TABLE `categoriess` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `doctorId`, `patientId`, `updated_at`, `created_at`) VALUES
(1, 34, 24, '2021-04-14 21:16:08', '2021-04-14 21:16:08'),
(2, 34, 15, '2021-04-15 09:21:18', '2021-04-15 09:21:18'),
(3, 34, 43, '2021-04-16 09:49:14', '2021-04-16 09:49:14'),
(4, 34, 44, '2021-04-17 08:37:38', '2021-04-17 08:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryId` int(11) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countryId`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'القاهرة', 'cairo', NULL, NULL),
(2, 1, 'ستي عربي غغ', 'ستي انجل ااا', '2021-04-24 00:06:08', '2021-04-24 00:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articleId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mesion_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mesion_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mesion_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vesion_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vesion_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vesion_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` double DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `logo`, `title_ar`, `title_en`, `phone`, `email`, `address_ar`, `address_en`, `location`, `mesion_ar`, `mesion_en`, `mesion_image`, `vesion_ar`, `vesion_en`, `vesion_image`, `description_ar`, `description_en`, `privacy_ar`, `privacy_en`, `version`, `favicon`, `created_at`, `updated_at`) VALUES
(1, '1614064039.png', 'اسبيتالية', 'Espitalia', '0568645742', 'admin@espitalia.com', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Espitalia.com', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1614064069.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1614064069.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1.1, '1614064053.png', NULL, '2021-02-23 05:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'egypt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnostics`
--

CREATE TABLE `diagnostics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `appointmentId` int(11) DEFAULT NULL,
  `weight` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hight` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnostics`
--

INSERT INTO `diagnostics` (`id`, `doctorId`, `patientId`, `appointmentId`, `weight`, `hight`, `blood`, `temp`, `complaint`, `symptoms`, `diagnosis`, `medicine`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 34, 24, NULL, '13', '16', 'O-', '36', 'الشكوى هنا', 'الأعراض هنا', 'التشخيص هنا', 'الدواء هنا', '2021-04-15', '03:07:00', '2021-04-14 23:07:28', '2021-04-14 23:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specialityId` bigint(20) UNSIGNED NOT NULL,
  `specialityDesc_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialityDesc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `longitude` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_degree` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practice_certificate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_qualification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0.0',
  `status` int(11) NOT NULL DEFAULT 1,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membershipNo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority_ar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority_en` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_ar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearOfRegistration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specialityId`, `specialityDesc_ar`, `specialityDesc_en`, `countryId`, `cityId`, `longitude`, `latitude`, `first_name_ar`, `last_name_ar`, `first_name_en`, `last_name_en`, `email`, `password`, `mobile`, `address_ar`, `address_en`, `experience`, `gender`, `photo`, `university_degree`, `practice_certificate`, `other_qualification`, `rate`, `status`, `token`, `membershipNo`, `authority_ar`, `authority_en`, `degree_ar`, `degree_en`, `yearOfRegistration`, `device_token`, `bankNumber`, `is_activated`, `created_at`, `updated_at`) VALUES
(2, 6, 'uygu', 'jyguy', 1, 1, '41.6922193', '27.5239021', 'ضياء', 'سمير', '‏diaa', 'samir', 'dia@gmail.com', '$2y$10$7Au.vsATmQgrOURD1zcLa.rqOQ8E8f9K7.ugJM49Ynw.7rPHg1Yr.', '0568645742', 'العزيزية', 'alazeezia', '45', 'Male', '1613628530.jpg', 'gteg', '454', '45', '4.0', 1, 'egt', '333', 'uytgu', 'uvgg', 'jhvu', 'ytfyt', '333', NULL, '0', 1, '2021-02-18 04:08:50', '2021-04-21 07:33:34'),
(3, 1, 'jg', 'jgvgyuf', 1, 1, '41.6907824', '27.5234334', 'محمد', 'احمد', 'mohammed', 'ahmed', 'moh@gmail.com', '$2y$10$BaO6wMXPI4toB21zscO30OH2YIHVW.KFagoRq0mkZJL5rzPVfobcG', '0568645742', 'العزيزية', 'alazeezia', '22', 'Male', '1613628786.jpg', 'getget', 'get', '45', '35', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjEzNjI4ODA4LCJleHAiOjE2MTM2MzI0MDgsIm5iZiI6MTYxMzYyODgwOCwianRpIjoiVUlxWVNiekFvMzd5elRlMCIsInN1YiI6MywicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.BSnCAAjha39kySsMkkKD8MZ0Ht0T2aYKOwH0mweJSKM', 'jhbjh', 'hvg', 'hvhg', 'yugfu', 'jhgjh', 'hgyt', 'fX9e5Jsk2uI:APA91bGI-i-Wlo9twoeWRwYmUA2VF8VI3VC3A8Zkdp-M6DA44p9KVUnjUOFJ3_cYdBNjZpp1bi9Mr-yqy_lxsXYGW2y-kana4DY3mfRETlkuZX6SrKFin-KMEO2LqvcQJ1RCQPabg1To', '0', 1, '2021-02-18 04:13:06', '2021-02-18 04:13:28'),
(4, 1, 'uyguyg', 'jyg', 1, 1, '30.7069222', '29.2357744', 'تاا', 'تتت', 'تن', 'ععع', 'hggg@gggg.com', '$2y$10$qmn8F8ykS5.Sc12XwLMlvuwTOBdpBLvI.J/EnKV7hXEH7k1a1r77e', '0584449325', 'tf', 'yyy', '45', 'Male', '1613629132.jpg', 'erger', 'get', 'getget', '45', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjEzNjI5MTcyLCJleHAiOjE2MTM2MzI3NzIsIm5iZiI6MTYxMzYyOTE3MiwianRpIjoiMEVicWFRNjFLUW51NlA0USIsInN1YiI6NCwicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.dI_UFeCZV22NlwjybhtrKbOWzXVhLrDyOhoJ439BWu4', 'uyfgty', 'ytfyt', 'ytfy', 'ytfyt', 'ytfyt', 'tyfytf', 'd0-cSm1rWeg:APA91bEkSag9VS9W1MQ-Sx1KQvKpIq_TkjpbvP7N9WrkRnOnBApQs08P5G8q2Z17ogornBjhztml68Xt27owJLocF5m-yoqfyUTK3V7z50tfcram80odJ7dH5flj2qan9iAMsKG2ziZJ', '0', 1, '2021-02-18 04:18:52', '2021-02-18 04:19:32'),
(5, 2, NULL, '', 1, 1, '-122.084', '37.4219983', 'plhfrwf', 'wfrf', 'vfvf', 'rv', 'said@said.com', '$2y$10$NuebxIQsQ47akwBx3.RNCOypejewtG/nxttnErtfXt2Kcno7tH7.G', '0576355554', 'hgrhfv', 'euhrfe', NULL, 'Male', '1613801339.jpg', NULL, NULL, NULL, NULL, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjEzODAxMzU3LCJleHAiOjE2MTM4MDQ5NTcsIm5iZiI6MTYxMzgwMTM1NywianRpIjoicDY1NUV0OGpSVEJES081eSIsInN1YiI6NSwicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.rHGKzZhXalE7HaEA8ZEk_KX09n6tlIuz-oflu1y69ZA', '', '', '', '', '', '', 'e4R55Zdgh8I:APA91bG-JaWvpnWNvGFeiJt44cjCBN1zte3b5qt1tAaSIXrSqNtHiQ5WxJXmRZi-wBCxbD9iJ14sb3ZPHalmwRV6rGLvSiUXMndZsl4IZUGT_EBO1l7wV4pVC4XNI_irCiIQeFWD6ybo', '0', 1, '2021-02-20 04:08:59', '2021-02-20 04:09:17'),
(7, 1, NULL, '', 1, 1, '41.6892254', '27.5230986', NULL, NULL, NULL, NULL, 'adeeb@gmail.com', '$2y$10$o/iyyHWupGAOVAzW7I55J.X16Chh.KX69Qs4aosuPncdF2e5FR3nG', '0568645742', NULL, NULL, NULL, 'Male', '1613886649.jpg', '1613893893.jpg', '1613894127.jpg', '1613894111.pdf', NULL, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE0MTQ3NDkyLCJleHAiOjE2MTQxNTEwOTIsIm5iZiI6MTYxNDE0NzQ5MiwianRpIjoiNEFBd2x1SVdBY3JuSFFvdCIsInN1YiI6NywicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.JHp6awZH1bGXi1X9eO1BOcRpnXAbnp7Ih7Hkm4fqIn0', '2514', '', '', '', '', '2004', 'cYiTogBIqcY:APA91bGh7s2CLFznqRa67z3v_lTlYZPObNkKv5O3Gm2osUcv03KoLB49W1MpHTYTsEvuTv5qg6kKRYSq1lNEg-BF0It5c2LtgT17ewq7JOS4Z_13ixyyFXvtKOxYdNIUPQEZ1bykdtPP', '2147483647', 1, '2021-02-21 03:50:49', '2021-02-24 04:18:12'),
(8, 1, NULL, '', 1, 1, '30.7069225', '29.235775', 'هاني', NULL, 'hany', 'said', 'hany@hany.com', '$2y$10$Jef8VWikVHLX30q1VIHC/.6PQ/eO1oBU/7m/PCopQ4H./P4mX.Yue', '0554646486', NULL, 'cairo', NULL, 'Male', '1613896224.jpg', '1613897639.jpg', '1613897686.jpg', '1613897639.jpg', NULL, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjEzODk2MjQyLCJleHAiOjE2MTM4OTk4NDIsIm5iZiI6MTYxMzg5NjI0MiwianRpIjoib2xKS3djNFkxbHZ3N0ZidyIsInN1YiI6OCwicHJ2IjoiOGQ0NDExY2QyNDFmMWE5ZWFkM2NhNzQ4Njc0NGViNGVkMDY3NjgxYiJ9.amB2YCrVQy58OQzWifIwOpRB59xBb509RjBN9cMHy2s', '', '', '', '', '', '', 'fPBqpE0w0d4:APA91bEoNSTfIPt_8Vmb-niQoPg5nnPVAljF_M7mcbR5Vfk6yAu3RMOX9IkccwceUGsaBcQwiL9BHwF0AZiqJFPFsCc_OArvhyPmFrhIOQwpDCb_YNWeHnsb3rQJPND7SiF59VxSl9RJ', '0', 1, '2021-02-21 06:30:24', '2021-02-21 07:32:39'),
(10, 6, NULL, '', 1, 1, '8.872444666922092', '9.854403807074837', 'جنة', 'محمد', 'جنة', 'محمد', 'jana@altakhses.com', '$2y$10$ziO4sKWU0QUOxWlinYuWReBSrPvQl9UDIjsI8LBW3KMvJmjXTjgm.', '0568645742', 'شارع الملك فيصل حي العزيزية', 'شارع الملك فيصل حي العزيزية', '10', 'Male', '1614150753.jpg', '1614153575.jpg', '1614153647.pdf', '1614151729.jpg', '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE0MTUxMTU3LCJleHAiOjE2MTQxNTQ3NTcsIm5iZiI6MTYxNDE1MTE1NywianRpIjoiSWVaYWVvZVprSHRVOW9LTSIsInN1YiI6MTAsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.W2vJvvkoGVrgryp3stOt6i6tSidExJnz5KpF4TEzfM8', '1425', '', '', '', '', '2007', 'cYiTogBIqcY:APA91bGh7s2CLFznqRa67z3v_lTlYZPObNkKv5O3Gm2osUcv03KoLB49W1MpHTYTsEvuTv5qg6kKRYSq1lNEg-BF0It5c2LtgT17ewq7JOS4Z_13ixyyFXvtKOxYdNIUPQEZ1bykdtPP', '111222333444', 1, '2021-02-24 05:12:33', '2021-02-24 07:10:52'),
(11, 1, NULL, '', 1, 1, '30.7126066', '29.2380066', 'جمعه', 'جمعه', 'gom3a', 'gom3a', 'homa@goma', '$2y$10$C.nV4E9tn3veKTnZMRcysub.AL9YiRQOIyMC6xakAEkAfF63esqoO', '0532145698', 'ggc', 'hgg', NULL, 'Male', '1614153093.jpg', NULL, NULL, NULL, '0.0', 1, NULL, '', '', '', '', '', '', NULL, '', 1, '2021-02-24 05:51:33', '2021-02-24 05:51:33'),
(12, 1, NULL, '', 1, 1, '30.7126066', '29.2380066', 'سما', 'سما', 'sama', 'sama', 'sama@sama.com', '$2y$10$RDOrVARIHEdUwm57jaKZj.KnXbrBPekt.usw919W0/DM8trVz4zKe', '0585445555', 'ggff', 'gfff', NULL, 'Male', '1614153442.jpg', NULL, NULL, NULL, '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE0MTUzNDk4LCJleHAiOjE2MTQxNTcwOTgsIm5iZiI6MTYxNDE1MzQ5OCwianRpIjoiWGZKbGM1UlZWUmFNN2pCbiIsInN1YiI6MTIsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.Eycz20OlXgqVQCcBRsIdIcyD7F50V8pZBzvldhBFEoM', '', '', '', '', '', '', 'for5b90wZuA:APA91bH_Y9vlV4gt07eWyKajRE7f2QhdWBLt3xsOcTdezz2jvwsqtDxGv8cSXMbd0BYKZT0rpLKyq4MqJlwSgckToxFldn8sIf5-TO67nYuQvluerBIJErL6y3iIul94PktUTWUls1mZ', '', 1, '2021-02-24 05:57:22', '2021-02-24 05:58:18'),
(13, 1, 'طبيب اطفال1', '', 0, 0, '41.6922268', '27.523884', 'احمد1', 'ياسر1', 'ahmed1', 'yaser1', 'ahmed.yaser@gmail.com', '$2y$10$ofTN5.f78V4z1dh4Rr1vwuiPmboYPmo3rvzEuM.xyexLCUpd50spm', '0568645742', 'حي امبدة1', '‏ombda', '12', 'Male', '1614874742.jpg', '1614874756.pdf', '1614874806.pdf', '1614874806.pdf', '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE0OTI5MjIxLCJleHAiOjE2MTQ5MzI4MjEsIm5iZiI6MTYxNDkyOTIyMSwianRpIjoiN0tlbmltSDJvelozV1VtaCIsInN1YiI6MTMsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.a_ZqVU0PJGLzmiFwk4LCPFj8TbxRgIrqQEhmEoGnH6Q', '5555', 'السودان', '', 'ماجيستير', '', '2009', 'eerFUCgQ99E:APA91bEGEEnx--uh_uV7xy-Y-j39_UoqzxRyLyAA5j5aYKbMBDfk4QhohS0Enzvfjjw-OELyqZE-6DYxrOybkdZb8enJZEOfRuGoOfBf6IxrtyJfDMb31WuBPxxNRx6cwYVMBAKc5Yeo', '555555555555', 1, '2021-03-04 12:01:47', '2021-03-05 05:27:01'),
(14, 6, 'طبيب اطفال1', 'Child dental', 1, 1, '41.6877052', '27.5341969', 'غفران', 'غفران', 'gofran', 'gofran', 'gofran@gmail.com', '$2y$10$720RlWy4Y.3fDVc3T4OowuO0OUrNjSPZFSi5FVau2TJDySQU.PNnO', '0568645742', 'شارع الملك فيصل,العزيزية,حائل', 'King Faisal Street', '2', 'Male', '1614876876.jpg', NULL, NULL, NULL, '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE0OTI5ODkwLCJleHAiOjE2MTQ5MzM0OTAsIm5iZiI6MTYxNDkyOTg5MCwianRpIjoiRnl4UFVwMWdvS1Qyc0JHbiIsInN1YiI6MTQsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.fcEhyTN2NWplUhpj-6kfR5RrC9lVR2HOGATGVwexCuw', '1254', 'التخصيص', 'altakhses', 'التخصيص', 'doctor', '2005', 'eerFUCgQ99E:APA91bEGEEnx--uh_uV7xy-Y-j39_UoqzxRyLyAA5j5aYKbMBDfk4QhohS0Enzvfjjw-OELyqZE-6DYxrOybkdZb8enJZEOfRuGoOfBf6IxrtyJfDMb31WuBPxxNRx6cwYVMBAKc5Yeo', '112233', 1, '2021-03-04 14:54:36', '2021-03-05 05:38:10'),
(33, 1, NULL, '', 1, 1, '41.6922321', '27.5239043', 'محمد', 'احمد', 'Moh', 'Ahmed', 'moh20@gmail.com', '$2y$10$A.E5RnyahMMAHlz.DNlWRej87ovTfCz4x2Fh.Zksar1A9b/uJFH0G', '0568645742', '‏العزيزية', '‏azeezia', NULL, 'Male', '1618309004.jpg', NULL, NULL, NULL, '0.0', 1, NULL, '', '', '', '', '', '', NULL, '', 1, '2021-04-13 08:16:44', '2021-04-13 08:52:09'),
(34, 8, 'نساء وتوليد1', '', 0, 0, '41.69381596148014', '27.523712519336122', 'جنة1', 'محمد1', '‏jana1', 'Mohammed1', 'mohammed.work44@gmail.com', '$2y$10$zbNE6B39WhRNnN07idIBgOqozYT6IZtANcbeqhsat7s1eJl8nE2WC', '0568645745', 'حائل1', 'Hail1', '20', 'Male', '1618572652.png', '1618441543.pdf', '1618441543.pdf', '1618441543.pdf', '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE4NTcyODc1LCJleHAiOjE2MTg1NzY0NzUsIm5iZiI6MTYxODU3Mjg3NSwianRpIjoicWFQdHJ6enBSM0l4bFljZSIsInN1YiI6MzQsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.T5QyZSXyiSs3sH52__iegRcwFPo3h0a-Rec_YILufTM', '33333', 'السودان', '', 'الدكتورة في النساء و التوليد', '', '2022', 'eerFUCgQ99E:APA91bEGEEnx--uh_uV7xy-Y-j39_UoqzxRyLyAA5j5aYKbMBDfk4QhohS0Enzvfjjw-OELyqZE-6DYxrOybkdZb8enJZEOfRuGoOfBf6IxrtyJfDMb31WuBPxxNRx6cwYVMBAKc5Yeo', '222222222222', 1, '2021-04-14 10:38:00', '2021-04-16 09:34:35'),
(35, 8, NULL, '', 1, 1, '41.6932993', '27.5247744', 'محمد', 'مونجا', 'Mohammed', 'Monja', 'Mohmonja@gmail.com', '$2y$10$5LLhdcwQ.LdqcjOFDxFI3eOfPhdM1e0P3YGyP7v/tePU/a9DI5dhO', '0595982250', 'حائل', 'Hail', NULL, 'Male', '1618404243.jpg', NULL, NULL, NULL, '0.0', 1, NULL, '', '', '', '', '', '', NULL, '', 1, '2021-04-14 10:44:03', '2021-04-14 10:44:03'),
(37, 6, NULL, '', 1, 1, '41.6933281', '27.5247677', 'انس', 'ضياء', 'anas', 'diaa', 'anas123@gmail.com ‎', '$2y$10$ffqWpkkdwfRvqUpgV4evw.n/NPq73WRlDtB2CbncUgxmvOugKnBSm', '0575769748', 'حائل', 'hail', NULL, 'Male', '1618611438.jpg', NULL, NULL, NULL, '0.0', 1, NULL, '', '', '', '', '', '', NULL, '', 0, '2021-04-16 20:17:18', '2021-04-16 20:17:18'),
(38, 6, NULL, '', 1, 1, '41.6933301', '27.5247685', 'سامر', 'خليل', 'samer', 'khalil', 'samer@altakhses.com', '$2y$10$lHBR9ojqyxtjhS0orfD5jueZf2lhxvHRRatz/e.ziW1pTte3tGwNK', '0568645742', 'كوستي', 'kosty', NULL, 'Male', '1618676549.jpg', NULL, NULL, NULL, '0.0', 1, NULL, '', '', '', '', '', '', NULL, '', 0, '2021-04-17 14:22:29', '2021-04-17 14:22:29'),
(39, 6, 'متخصص في موية العيون', '', 1, 1, '41.693261800000016', '27.5247172', 'حمودة', 'قسم الله', 'hamod', 'gesmalla', 'hamodass44@hotmail.com', '$2y$10$mhx6NYE73wSNY2rseVR9LOR96ab6cR2lFeH6dscE8dHKo3ykBRci2', '0568645742', 'العنوان ‏عربي', 'address ‎en', '30', 'Male', '1618676870.jpg', '1618677021.jpg', '1618677021.jpg', '1618677021.jpg', '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE4Njc2ODk5LCJleHAiOjE2MTg2ODA0OTksIm5iZiI6MTYxODY3Njg5OSwianRpIjoicW13MzlXaWpOeHV3ejQzUSIsInN1YiI6MzksInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.RGacTISSfnWWBvk-as95WXsFdQ8pvLZzz78qHcZiClA', '112233', 'الخرطوم السودان', '', 'دكتور', '', '2004', 'eerFUCgQ99E:APA91bEGEEnx--uh_uV7xy-Y-j39_UoqzxRyLyAA5j5aYKbMBDfk4QhohS0Enzvfjjw-OELyqZE-6DYxrOybkdZb8enJZEOfRuGoOfBf6IxrtyJfDMb31WuBPxxNRx6cwYVMBAKc5Yeo', '112233445566', 0, '2021-04-17 14:27:50', '2021-04-17 14:32:38'),
(40, 6, 'جراحة عامة', 'جراحة عامة', 0, 0, '2322', '121', 'سليمان', 'محمد', 'Salamn', 'mohammed', 'salman@gmail.com', '$2y$10$Gzk5mwz0kVusdmBotaAAkux9t7OSuYku.oTtpBZGUU7BNIoOXYY5.', '0568645742', 'حائل1', 'Hail1', '15', 'Male', '1618680845.png', NULL, NULL, NULL, '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE4Njk1NzUwLCJleHAiOjE2MTg2OTkzNTAsIm5iZiI6MTYxODY5NTc1MCwianRpIjoiVnRGdU5HVEk4MWI5em9KZSIsInN1YiI6NDAsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.Z3Kh-xGDidAeEP5fcg4XUtGJ-4BhsvEXDdlW0wjEBMU', '112233', 'السودان', 'السودان', 'دكتور', 'دكتور', '2004', 'eerFUCgQ99E:APA91bEGEEnx--uh_uV7xy-Y-j39_UoqzxRyLyAA5j5aYKbMBDfk4QhohS0Enzvfjjw-OELyqZE-6DYxrOybkdZb8enJZEOfRuGoOfBf6IxrtyJfDMb31WuBPxxNRx6cwYVMBAKc5Yeo', '222222222222', 0, '2021-04-17 15:34:05', '2021-04-17 19:42:30'),
(41, 2, 'جراحة عامة', 'جراحة عامة', 0, 0, '2322', '121', 'سليمان', 'محمد', 'Salamn', 'mohammed', 'salman@gmail.com', '$2y$10$Q6/XVmRbNg/rAYvMgXTWJOJ1LEH9.iX7Qv12FeQeaJ0pD.yHUD7r2', '0568645742', 'حائل1', 'Hail1', '20', 'Male', '1618695718.png', '1618696125.pdf', '1618696125.pdf', '1618696125.pdf', '0.0', 1, NULL, '2211', 'السودان', 'السودان', 'دكتور', 'دكتور', '2004', NULL, '222222222222', 0, '2021-04-17 19:41:58', '2021-04-17 19:48:45'),
(42, 2, NULL, '', 1, 1, '30.7069115', '29.2357766', 'hamada', 'دكتور', 'hamada', 'doctor', 'hamadaali889900@gmail.com', '$2y$10$f.uo0JpsBC7NPi5oqaVCSunDHrkucGqeVp/NZeux/PuHTBFTLmDka', '1015024714', 'القاهره', 'cairo', NULL, 'Male', '1618897143.jpg', NULL, NULL, NULL, '0.0', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9kb2N0b3JcL2xvZ2luIiwiaWF0IjoxNjE4OTI1NTE0LCJleHAiOjE2MTg5MjkxMTQsIm5iZiI6MTYxODkyNTUxNCwianRpIjoiYUxtcG5QNHpiYTdWVnEyMCIsInN1YiI6NDIsInBydiI6IjhkNDQxMWNkMjQxZjFhOWVhZDNjYTc0ODY3NDRlYjRlZDA2NzY4MWIifQ.8dRg5IYERfmN0cMP5Gsf8H4oocuX88tkmDOTwHF57jw', '', '', '', '', '', '', 'c5IHYTF6i1c:APA91bF3kqo5Km-Ew5FuXz4UHwJWFFe3JuCimp5yQWm8Oy1Bw_bMcNAVRb-HxT3JFHEwGJ4JSFwYlu87sJO5_7FYMFRM0dVfuEFcSCxDatHWl9RqnkUWNV3cw3VmMnEjh_vKCn2vH2lz', '522365514566', 0, '2021-04-20 03:39:03', '2021-04-21 07:12:51'),
(43, 2, 'erbetb', 'tege', 1, 1, '3464', '6476475', 'hamada', 'fwrf', 'fwfrw', 'fwrfw', 'doctor@doctor.com', '$2y$10$shLmwJZrHZUEnykHe46DS.io4zkSF92S9fsMxzARYsblkxbB.KuTO', '333565875', 'erer', 'berbe', '54646', 'Female', '1618999114.png', NULL, NULL, NULL, '0.0', 1, NULL, '45647', 'fghfgnhfn', 'svfdbnfmnhf', 'getgtegetgte', 'rtbytfuymu', '35476587', NULL, '53765875', 0, '2021-04-21 07:58:35', '2021-04-21 07:58:35');

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

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `chatID` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `senderType` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chatID`, `sender_id`, `senderType`, `message`, `file`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 24, 24, 'السلام عليكم', '', '2021-04-14', '01:16', '2021-04-14 21:16:16', '2021-04-14 21:16:16'),
(2, 1, 34, 34, 'وعليكم السلام', '', '2021-04-14', NULL, '2021-04-14 21:21:57', '2021-04-14 21:21:57'),
(3, 1, 34, 34, 'm', '', '2021-04-14', NULL, '2021-04-14 21:22:40', '2021-04-14 21:22:40'),
(4, 1, 34, 34, '', '1618442597.jpg', '2021-04-14', NULL, '2021-04-14 21:23:17', '2021-04-14 21:23:17'),
(5, 1, 24, 24, 'مرحبا', '', '2021-04-15', '02:58', '2021-04-14 22:58:17', '2021-04-14 22:58:17'),
(6, 1, 24, 24, 'كيف الحال', '', '2021-04-15', '02:58', '2021-04-14 22:58:23', '2021-04-14 22:58:23'),
(7, 1, 24, 24, 'كلوو تمام', '', '2021-04-15', '02:58', '2021-04-14 22:58:30', '2021-04-14 22:58:30'),
(8, 1, 34, 34, 'الحمدلله تمام', '', '2021-04-15', NULL, '2021-04-14 22:58:42', '2021-04-14 22:58:42'),
(9, 1, 34, 34, 'اااس', '', '2021-04-15', NULL, '2021-04-14 22:58:54', '2021-04-14 22:58:54'),
(10, 1, 34, 34, 'معايا', '', '2021-04-15', NULL, '2021-04-15 08:44:32', '2021-04-15 08:44:32'),
(11, 2, 15, 15, 'السلام عليكم', '', '2021-04-15', '13:21', '2021-04-15 09:21:23', '2021-04-15 09:21:23'),
(12, 2, 34, 34, 'هلا', '', '2021-04-15', NULL, '2021-04-15 09:23:32', '2021-04-15 09:23:32'),
(13, 2, 15, 15, 'لا', '', '2021-04-15', '13:24', '2021-04-15 09:24:02', '2021-04-15 09:24:02'),
(14, 2, 15, 15, 'اتصل تاني', '', '2021-04-15', '13:24', '2021-04-15 09:24:07', '2021-04-15 09:24:07'),
(15, 2, 34, 34, '', '1618515364.jpg', '2021-04-15', NULL, '2021-04-15 17:36:04', '2021-04-15 17:36:04'),
(16, 2, 15, 15, 'نعم', '', '2021-04-15', '21:55', '2021-04-15 17:55:18', '2021-04-15 17:55:18'),
(17, 2, 34, 34, 'ok', '', '2021-04-15', NULL, '2021-04-15 18:29:05', '2021-04-15 18:29:05'),
(18, 3, 43, 43, 'السلام عليكم جنة', '', '2021-04-16', '13:49', '2021-04-16 09:49:23', '2021-04-16 09:49:23'),
(19, 3, 34, 34, 'وعليكم السلام نادر', '', '2021-04-16', NULL, '2021-04-16 09:54:49', '2021-04-16 09:54:49'),
(20, 4, 34, 34, 'نعم', '', '2021-04-17', NULL, '2021-04-17 08:37:43', '2021-04-17 08:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `messagess`
--

CREATE TABLE `messagess` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messagess`
--

INSERT INTO `messagess` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'vvvv', '2021-01-06 06:17:47', '2021-01-06 06:17:47'),
(2, 1, 'vvv', '2021-01-06 06:17:52', '2021-01-06 06:17:52'),
(3, 2, 'bbbb', '2021-01-10 03:23:48', '2021-01-10 03:23:48'),
(4, 2, 'vvvv', '2021-01-10 03:24:21', '2021-01-10 03:24:21'),
(5, 1, 'jgvjh', '2021-01-10 03:29:54', '2021-01-10 03:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_01_22_011911_create_categories_table', 1),
(5, '2020_04_05_120648_create_categoriess_table', 1),
(6, '2020_04_05_120856_create_sub_categoriess_table', 1),
(7, '2020_11_09_035609_create_specialities_table', 1),
(8, '2020_11_09_035701_create_sections_table', 1),
(9, '2020_11_09_035725_create_doctors_table', 1),
(10, '2020_11_09_040031_create_patients_table', 1),
(11, '2020_11_09_040055_create_appointments_table', 1),
(12, '2020_11_09_040117_create_days_table', 1),
(13, '2020_11_09_040310_create_times_table', 1),
(14, '2020_11_09_040401_create_offers_table', 1),
(15, '2020_11_09_040424_create_articles_table', 1),
(16, '2020_11_09_040446_create_comments_table', 1),
(17, '2020_11_09_040505_create_sliders_table', 1),
(18, '2020_11_09_040523_create_banners_table', 1),
(19, '2020_11_09_040539_create_contact_infos_table', 1),
(20, '2020_11_14_065921_create_diagnostics_table', 1),
(21, '2020_12_03_104434_create_services_table', 1),
(22, '2020_12_06_085433_create_working_days_table', 1),
(23, '2020_12_09_185231_create_country_tables', 1),
(24, '2020_12_09_185325_create_state_tables', 1),
(25, '2020_12_09_185418_create_city_tables', 1),
(26, '2020_12_30_150639_create_permission_tables', 1),
(27, '2021_01_02_051056_create_favorites_table', 1),
(28, '2021_01_02_080555_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(4, 'App\\User', 2),
(1, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `doctorId` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_name_ar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_name_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `doctorId`, `offer_name_ar`, `offer_name_en`, `description_ar`, `description_en`, `old_price`, `new_price`, `percent`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 34, 'زيركون', 'zirokon', 'زيركون', '‏zircon ‎des', 1000, 700, '30', '1618449078.jpg', 'خدمة واحدة', '2021-04-14 23:11:18', '2021-04-14 23:11:44'),
(2, 39, 'كراون', 'krawon', 'كراون١', 'krawon1', 500, 300, '40', '1618679235.jpg', 'خدمة واحدة', '2021-04-17 15:07:15', '2021-04-17 15:07:48'),
(3, 34, 'عرض', 'عرض', 'عرض', 'عرض', 500, 200, NULL, '1618696864.jpg', 'خدمة واحدة', '2021-04-17 20:01:04', '2021-04-17 20:01:04'),
(4, 42, 'العرض ‏الاول', 'First ‎offer', 'الوصف', 'description ‎', 22, 12, '45', '1618898388.jpg', 'خدمة واحدة', '2021-04-20 03:59:48', '2021-04-20 03:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hamada@hamada.com', '$2y$10$8peRNFUl2eBRKgu94kZ8JuD8bV9ouBFi0YqWkjVG01cbqbLfv9aiu', '2021-01-31 06:09:47'),
('hamadaali221133@gmail.com', '$2y$10$4hl/c5ZNL206BelhmFMSbOyUiBuEXoOpG1JHVP8i/H4zGUNLRNavi', '2021-01-31 06:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastVisit` varchar(33) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `paid` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name_ar`, `email_verified_at`, `last_name_ar`, `first_name_en`, `last_name_en`, `email`, `password`, `mobile`, `photo`, `gender`, `dateOfBirth`, `lastVisit`, `status`, `paid`, `token`, `device_token`, `is_activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'hamada', NULL, 'مريض', 'hamada ‎', 'patients', 'hamadaali221133@gmail.com', '$2y$10$SUSNepZCqHtRxTSt7dlpteRE.JOx9EoICe0yMeLK1AdhPH3rEW/nC', '1015024714', '1618896900.jpg', 'Male', NULL, NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODkyNjY5NSwiZXhwIjoxNjE4OTMwMjk1LCJuYmYiOjE2MTg5MjY2OTUsImp0aSI6ImFDcG5Na094RDNDMGpwOGEiLCJzdWIiOjQ2LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.7UpBQxfckH-T7kRTCMl9tGRr059N9Mg2shwS3IhL1ng', 'fXliy1wrx9I:APA91bGudIie_Wkm4hvNVHH1o9mpv8FNAm-0R0yPhlNZAb_XY_d63YM31oGPBAGna46Gk0qeecUDrmml5x_LBiF_GmmuQCDNomB6jajzPHrvyUsHQ92lLR1ZPOlpvzOyaYrOmoOhP9e_', 0, NULL, '2021-04-20 03:35:00', '2021-04-24 01:57:45'),
(24, 'محمد١', NULL, 'قسم الله١', 'Mohammed', 'Gesmalla', 'Mohammed.work44@gmail.com', '$2y$10$F/FhTRXdTH3AzBtsTNZ/CevBfWYzDk65dmUdMLSvdCVYVNGa3rKIW', '0595982250', '1618448759.jpg', 'Male', '2021-04-13', NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODQ0OTI2NCwiZXhwIjoxNjE4NDUyODY0LCJuYmYiOjE2MTg0NDkyNjQsImp0aSI6IllsR3RQWWlUbjFoUnZvV2QiLCJzdWIiOjI0LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.EoFfsm2Pmk8kz_uXIgAFJR-0ZZ4I68jzxnSNTgiK52Q', 'cE2QAG4ts3M:APA91bH7bK0pvtu58NIEzHHMobaZ6h_ZkX61_7obZN5mPoDx6YbTHHeIcDqlV1UPjCqCO112v3SCLWE3ipwEFcaoTxkHrkru8iWXHFX-P6q8_ZSLfayPxUdZNd847z08NNgw-s0RNpNT', 1, NULL, '2021-04-13 08:11:49', '2021-04-14 23:16:19'),
(25, 'محمد', NULL, 'خالد', 'moh', 'khalid', 'mohmonja@gmail.com', '$2y$10$/nCOOND6U/WK/W7xYeFFDODQjisUbnGXsRIJrpKA9wUtBHgqIFAsC', '0595982250', '1618449929.jpg', 'Male', '2021-04-15 00:00:00.000', NULL, 1, NULL, NULL, NULL, 0, NULL, '2021-04-14 23:25:29', '2021-04-14 23:25:29'),
(26, 'ضياء', NULL, 'سمير', 'diaa', 'samir', 'diaa@gmail.com', '$2y$10$fWN/8rJeAqUvx5ZRNY2lDu6qil3MVSG4JgVNvhda.xI7bjAZTn5DW', '0568645742', '1618483578.jpg', 'Male', '2021-04-15 00:00:00.000', NULL, 1, NULL, NULL, NULL, 0, NULL, '2021-04-15 08:46:18', '2021-04-15 08:46:18'),
(27, 'ضياء', NULL, 'سمير', 'diaa', 'samir', 'diaa2@gmail.com', '$2y$10$Hy0zgbRLrKvg40H6v6ntpe1LuWRJ8zjFVdlGiyuivW/clymDaXi8C', '0568645742', '1618569291.png', 'Female', NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2021-04-15 08:46:43', '2021-04-16 08:34:51'),
(41, 'محمد1', NULL, 'موسى1', 'Mohammed1', '1Mousa', 'admin@altakhses.com', '$2y$10$ggGrr2590CixS6YQ66ZNAOH4DNE77QJTkoQeyV1kUA.oVlXdvEBOe', '0568645742', '1618571127.png', 'Female', NULL, NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODU2ODIwNSwiZXhwIjoxNjE4NTcxODA1LCJuYmYiOjE2MTg1NjgyMDUsImp0aSI6IlY5ckFISXBQTmVLRWp6WFIiLCJzdWIiOjQxLCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.JOK4ammIBXYIO-_vgmO11kuEkF2y-_FL3dVQGIzNtvs', 'cE2QAG4ts3M:APA91bH7bK0pvtu58NIEzHHMobaZ6h_ZkX61_7obZN5mPoDx6YbTHHeIcDqlV1UPjCqCO112v3SCLWE3ipwEFcaoTxkHrkru8iWXHFX-P6q8_ZSLfayPxUdZNd847z08NNgw-s0RNpNT', 0, NULL, '2021-04-16 08:15:51', '2021-04-16 09:05:27'),
(42, 'نادر', NULL, 'خضر', 'nader', 'khader', 'diaa@gmail.com', '$2y$10$Zx7qfbpfU5sbmcmmOnOKguiD4G9CnRg13zSATdfa4Wn16BVbY3/jS', '0568645742', 'profile_image.png', 'Male', '2021-04-16', NULL, 1, NULL, NULL, NULL, 0, NULL, '2021-04-16 08:29:07', '2021-04-16 08:29:07'),
(43, 'نادر1', NULL, 'خضر1', 'nader', 'khader', 'nader@gmail.com', '$2y$10$W6KP1yaHVPfVdeStZpQNDOF/pzOaH52BEkhhLYNyIHanzaUKGvj7m', '0568645741', '1618569517.jpg', 'Female', '2021-04-01', NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODU3MzI4MCwiZXhwIjoxNjE4NTc2ODgwLCJuYmYiOjE2MTg1NzMyODAsImp0aSI6IkZkV2xvdWVCRzFjR1V4R0giLCJzdWIiOjQzLCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.qc1c1Xg8xF5QGExKq82Ow_z_CyPJPI3CcJBfoYuxsFA', 'cE2QAG4ts3M:APA91bH7bK0pvtu58NIEzHHMobaZ6h_ZkX61_7obZN5mPoDx6YbTHHeIcDqlV1UPjCqCO112v3SCLWE3ipwEFcaoTxkHrkru8iWXHFX-P6q8_ZSLfayPxUdZNd847z08NNgw-s0RNpNT', 0, NULL, '2021-04-16 08:37:26', '2021-04-16 09:41:20'),
(44, 'رمضان', NULL, 'كريم', 'ramdan', 'kareem', 'ramadan@gmail.com', '$2y$10$0KKwQUF3NVizl20dPfW3supbUYB6Eo94j4F0hIA41I3j.6lvThNra', '0568645742', '1618575056.jpg', 'Male', '2021-04-16 00:00:00.000', NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODU3NTA5MSwiZXhwIjoxNjE4NTc4NjkxLCJuYmYiOjE2MTg1NzUwOTEsImp0aSI6ImxPSVY4WnV4RUtPaU5TUjMiLCJzdWIiOjQ0LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.Tl8jiRGDTo49skYvwjBoKF-cF5BEaRzOzCLs1WO2U0I', 'cE2QAG4ts3M:APA91bH7bK0pvtu58NIEzHHMobaZ6h_ZkX61_7obZN5mPoDx6YbTHHeIcDqlV1UPjCqCO112v3SCLWE3ipwEFcaoTxkHrkru8iWXHFX-P6q8_ZSLfayPxUdZNd847z08NNgw-s0RNpNT', 0, NULL, '2021-04-16 10:10:56', '2021-04-16 10:11:31'),
(45, 'نادر', NULL, 'خضر', 'nader', 'khader', 'nader1@gmail.com', '$2y$10$MGga42jaWu5fT.zskJRkuOq2.y1YtpBqR83LpMNUCZIOYJiNRoT2e', '0568645742', '1618697098.jpg', 'Male', '2021-04-18', NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODY5NzE2NiwiZXhwIjoxNjE4NzAwNzY2LCJuYmYiOjE2MTg2OTcxNjYsImp0aSI6Ijd3a1p3emV6OVZkNEdodmYiLCJzdWIiOjQ1LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.ZmUnsI5URtKfFcLxI434BkzE3Mn1zROAlZEXfK0asjo', 'cE2QAG4ts3M:APA91bH7bK0pvtu58NIEzHHMobaZ6h_ZkX61_7obZN5mPoDx6YbTHHeIcDqlV1UPjCqCO112v3SCLWE3ipwEFcaoTxkHrkru8iWXHFX-P6q8_ZSLfayPxUdZNd847z08NNgw-s0RNpNT', 0, NULL, '2021-04-17 20:04:58', '2021-04-17 20:06:06'),
(80, 'احمد', NULL, 'علي', 'ahmed', 'ali', 'Mohammed@monja.com', '$2y$10$SUSNepZCqHtRxTSt7dlpteRE.JOx9EoICe0yMeLK1AdhPH3rEW/nC', '255', '1613549350.jpg', 'Male', '2021-02-11', '', 1, '', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxODg5NTgyMywiZXhwIjoxNjE4ODk5NDIzLCJuYmYiOjE2MTg4OTU4MjMsImp0aSI6IjJGRUhNWGdDaWVUbkNpSWMiLCJzdWIiOjE1LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.MLv0zphHQed8d-X6f2cyhu4whIzeZGWdLt0fIEL9j7A', 'e4Wwh-SMK8E:APA91bGIR6b0sm2O6-4lerAM-SkafjE84ZQAYyBNH8bmfJ6S1IF6Ln5xba2KpbsVNxTxQIRA5cM1EiXMs182hb_NiddAKRK4wqNuK8Jjvp-YNHetORSwWFaJSAzJl2kOmD7p-l_0mkzZ', 1, NULL, '2021-01-03 03:43:48', '2021-04-20 03:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `patientss`
--

CREATE TABLE `patientss` (
  `id` int(11) NOT NULL,
  `first_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `lastVisit` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `paid` int(11) DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patientss`
--

INSERT INTO `patientss` (`id`, `first_name_ar`, `last_name_ar`, `first_name_en`, `last_name_en`, `email`, `password`, `mobile`, `photo`, `gender`, `dateOfBirth`, `lastVisit`, `status`, `paid`, `token`, `device_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'خالد', 'محمد', 'khalid', 'Mohammed', 'Mohammed@monja.com', '$2y$10$SUSNepZCqHtRxTSt7dlpteRE.JOx9EoICe0yMeLK1AdhPH3rEW/nC', '0568645742', '1612255125.jpg', 'Female', '2021-02-01', NULL, 1, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC96bGl0bi5jb21cL3J5dGVydFwvdGVtcGxhdGUtcnRsXC9hcGlcL3YxXC9wYXRpZW50XC9sb2dpbiIsImlhdCI6MTYxMzM5NjU5NCwiZXhwIjoxNjEzNDAwMTk0LCJuYmYiOjE2MTMzOTY1OTQsImp0aSI6InB0MFNvWDFtVFpvUVUwR2oiLCJzdWIiOjE1LCJwcnYiOiIxZmQ1NDIzMTYyOGZlNzQ5N2RiNmY5MTYyYzI0NjU3OGE3Yzc4MWNhIn0.Rza4_Tln_fmQfu2A6UxxVVLs36m2HZogH9IHwocqqOM', 'rrrrr', NULL, '2021-02-02 06:38:45', '2021-02-15 11:43:14'),
(19, 'محمد', 'امين', 'mohammed ‎', 'ameen', 'mohammedhamafa@gmail.com', '$2y$10$.KbgGZjAzCELdn4/aNm.aeW7v7xXzXI4BRVyGt8TJ3m2QYqaQvn66', '0568645742', '1612430744.jpg', 'Male', '2021-02-18', NULL, 1, NULL, NULL, NULL, NULL, '2021-02-04 07:25:44', '2021-02-04 07:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `appointmentId` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `doctorId`, `patientId`, `appointmentId`, `type`, `company`, `name`, `number`, `cvc`, `month`, `year`, `date`, `time`, `amount`, `created_at`, `updated_at`) VALUES
(1, 34, 24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 350, '2021-04-14 21:13:47', '2021-04-14 21:13:47'),
(2, 34, 15, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, '2021-04-15 09:20:58', '2021-04-15 09:20:58'),
(3, 34, 43, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 350, '2021-04-16 09:48:24', '2021-04-16 09:48:24'),
(4, 34, 44, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, '2021-04-17 08:34:19', '2021-04-17 08:34:19'),
(5, 39, 44, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, '2021-04-17 14:41:23', '2021-04-17 14:41:23'),
(6, 39, 44, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, '2021-04-17 15:10:00', '2021-04-17 15:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'specialities', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(2, 'doctors', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(3, 'الفواتير المدفوعة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(4, 'الفواتير المدفوعة جزئيا', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(5, 'الفواتير الغير مدفوعة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(6, 'ارشيف الفواتير', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(7, 'التقارير', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(8, 'تقرير الفواتير', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(9, 'تقرير العملاء', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(10, 'المستخدمين', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(11, 'قائمة المستخدمين', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(12, 'صلاحيات المستخدمين', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(13, 'الاعدادات', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(14, 'المنتجات', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(15, 'الاقسام', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(16, 'اضافة فاتورة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(17, 'حذف الفاتورة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(18, 'تصدير EXCEL', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(19, 'تغير حالة الدفع', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(20, 'تعديل الفاتورة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(21, 'ارشفة الفاتورة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(22, 'طباعةالفاتورة', 'web', '2021-01-03 03:41:33', '2021-01-03 03:41:33'),
(23, 'اضافة مرفق', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(24, 'حذف المرفق', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(25, 'اضافة مستخدم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(26, 'تعديل مستخدم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(27, 'حذف مستخدم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(28, 'عرض صلاحية', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(29, 'اضافة صلاحية', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(30, 'تعديل صلاحية', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(31, 'حذف صلاحية', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(32, 'اضافة منتج', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(33, 'تعديل منتج', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(34, 'حذف منتج', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(35, 'اضافة قسم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(36, 'تعديل قسم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(37, 'حذف قسم', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34'),
(38, 'الاشعارات', 'web', '2021-01-03 03:41:34', '2021-01-03 03:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `doctorId`, `patientId`, `comment`, `rate`, `date`, `created_at`, `updated_at`) VALUES
(1, 34, 15, 'طبيب جيد جدا انصح به', '3.5', NULL, '2021-04-15 19:04:53', '2021-04-15 19:04:53'),
(2, 34, 15, 'ممتااااااز', '5.0', NULL, '2021-04-15 19:05:58', '2021-04-15 19:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-01-03 03:43:48', '2021-01-03 03:43:48'),
(2, 'editor', 'web', '2021-01-09 07:52:49', '2021-01-09 07:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(1, 2),
(2, 2),
(37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `specialityId` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `services_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_name_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `doctorId`, `services_name_ar`, `services_name_en`, `price`, `type`, `status`, `duration`, `icon`, `created_at`, `updated_at`) VALUES
(61, 1, 'كشف ف العيادة', 'Examination in the clinic', 10, 'reavel', 1, '', '', '2021-02-04 06:07:17', '2021-02-21 03:36:32'),
(62, 1, 'استشارة فيديو', 'Video consulting', 10, 'Video', 1, '', '', '2021-02-04 06:09:14', '2021-02-21 03:36:32'),
(63, 2, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-18 04:08:50', '2021-02-18 04:08:50'),
(64, 2, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-18 04:08:50', '2021-02-18 04:08:50'),
(65, 3, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-18 04:13:06', '2021-02-18 04:13:06'),
(66, 3, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-18 04:13:06', '2021-02-18 04:13:06'),
(67, 4, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-18 04:18:52', '2021-02-18 04:18:52'),
(68, 4, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-18 04:18:52', '2021-02-18 04:18:52'),
(69, 5, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-20 04:08:59', '2021-02-20 04:08:59'),
(70, 5, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-20 04:08:59', '2021-02-20 04:08:59'),
(71, 6, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-20 13:03:37', '2021-02-20 13:03:37'),
(72, 6, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-20 13:03:37', '2021-02-20 13:03:37'),
(73, 7, 'استشارة فيديو', 'Video consulting', 100, 'Video', 0, '', '', '2021-02-21 03:50:49', '2021-02-22 18:14:25'),
(74, 7, 'كشف ف العيادة', 'Examination in the clinic', 150, 'reavel', 1, '', '', '2021-02-21 03:50:49', '2021-02-22 18:14:01'),
(75, 8, 'استشارة فيديو', 'Video consulting', 3, 'Video', 1, '', '', '2021-02-21 06:30:24', '2021-02-21 07:38:46'),
(76, 8, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 1, '', '', '2021-02-21 06:30:24', '2021-02-21 07:38:46'),
(77, 10, 'استشارة فيديو', 'Video consulting', 75, 'Video', 1, '', '', '2021-02-24 05:12:33', '2021-02-24 07:12:19'),
(78, 10, 'كشف ف العيادة', 'Examination in the clinic', 50, 'reavel', 1, '', '', '2021-02-24 05:12:33', '2021-02-24 07:13:11'),
(79, 11, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-24 05:51:33', '2021-02-24 05:51:33'),
(80, 11, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-24 05:51:33', '2021-02-24 05:51:33'),
(81, 12, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-02-24 05:57:22', '2021-02-24 05:57:22'),
(82, 12, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-02-24 05:57:22', '2021-02-24 05:57:22'),
(83, 13, 'استشارة فيديو', 'Video consulting', 55, 'Video', 1, '', '', '2021-03-04 12:01:47', '2021-03-04 12:07:51'),
(84, 13, 'كشف ف العيادة', 'Examination in the clinic', 90, 'reavel', 1, '', '', '2021-03-04 12:01:47', '2021-03-04 12:08:06'),
(85, 30, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-13 00:07:36', '2021-04-13 00:07:36'),
(86, 30, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-13 00:07:36', '2021-04-13 00:07:36'),
(87, 31, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-13 00:08:48', '2021-04-13 00:08:48'),
(88, 31, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-13 00:08:48', '2021-04-13 00:08:48'),
(89, 32, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-13 02:17:19', '2021-04-13 02:17:19'),
(90, 32, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-13 02:17:19', '2021-04-13 02:17:19'),
(91, 33, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-13 08:16:45', '2021-04-13 08:16:45'),
(92, 33, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-13 08:16:45', '2021-04-13 08:16:45'),
(93, 34, 'استشارة فيديو', 'Video consulting', 300, 'Video', 1, '', '', '2021-04-14 10:38:02', '2021-04-14 12:51:12'),
(94, 34, 'كشف ف العيادة', 'Examination in the clinic', 350, 'reavel', 1, '', '', '2021-04-14 10:38:02', '2021-04-14 12:51:12'),
(95, 35, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-14 10:44:04', '2021-04-14 10:44:04'),
(96, 35, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-14 10:44:04', '2021-04-14 10:44:04'),
(97, 36, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-16 03:58:40', '2021-04-16 03:58:40'),
(98, 36, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-16 03:58:40', '2021-04-16 03:58:40'),
(99, 38, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-17 14:22:31', '2021-04-17 14:22:31'),
(100, 38, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-17 14:22:31', '2021-04-17 14:22:31'),
(101, 39, 'استشارة فيديو', 'Video consulting', 100, 'Video', 1, '', '', '2021-04-17 14:27:51', '2021-04-17 14:39:27'),
(102, 39, 'كشف ف العيادة', 'Examination in the clinic', 150, 'reavel', 1, '', '', '2021-04-17 14:27:51', '2021-04-17 14:39:27'),
(103, 42, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, '', '', '2021-04-20 03:39:04', '2021-04-20 03:39:04'),
(104, 42, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, '', '', '2021-04-20 03:39:04', '2021-04-20 03:39:04'),
(105, 47, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, NULL, NULL, '2021-04-21 08:08:25', '2021-04-21 08:08:25'),
(106, 47, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, NULL, NULL, '2021-04-21 08:08:25', '2021-04-21 08:08:25'),
(107, 48, 'استشارة فيديو', 'Video consulting', 3, 'Video', 0, NULL, NULL, '2021-04-24 02:49:53', '2021-04-24 02:49:53'),
(108, 48, 'كشف ف العيادة', 'Examination in the clinic', 3, 'reavel', 0, NULL, NULL, '2021-04-24 02:49:53', '2021-04-24 02:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'اسلايدر واحد', 'slider one', 'وصف', 'desc', '1611046136.jpg', '2021-01-09 04:56:12', '2021-01-28 06:30:57'),
(2, 'اسلايدر واحد', 'slider one', 'وصف', 'desc', '1611046136.jpg', '2021-01-09 04:56:12', '2021-01-28 06:30:57'),
(3, 'اسلايدر واحد', 'slider one', 'وصف', 'desc', '1611046136.jpg', '2021-01-09 04:56:12', '2021-01-28 06:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `icon`, `top`, `created_at`, `updated_at`) VALUES
(1, 'اسنان', 'teeth', 'grfcg', 'hgfvhg', '1611073759.png', 1, NULL, '2021-04-21 02:57:12'),
(2, 'جراحه', 'surgery', NULL, NULL, '1611073774.png', 0, '2021-01-07 08:40:11', '2021-01-19 14:29:34'),
(6, 'عيون', 'Optical', NULL, NULL, '1611047821.png', 0, '2021-01-19 07:17:01', '2021-01-19 07:17:01'),
(8, 'نساء و توليد', 'OBYG', NULL, NULL, '1612171149.png', 0, '2021-02-01 07:18:26', '2021-02-01 07:19:09'),
(9, 'طبيب عام', 'General', NULL, NULL, '1613842879.png', 0, '2021-02-20 15:41:19', '2021-02-20 15:41:19'),
(10, 'نفسي', 'نفسي', NULL, NULL, '1614878093.png', 0, '2021-03-04 15:14:53', '2021-03-04 15:14:53'),
(11, 'عظام', 'عظام', NULL, NULL, '1614878654.png', 0, '2021-03-04 15:24:14', '2021-03-04 15:24:14'),
(12, 'انف واذن وحنجرة', 'انف واذن وحنجرة', NULL, NULL, '1614878687.png', 0, '2021-03-04 15:24:47', '2021-03-04 15:24:47'),
(13, 'تناسولية', 'تناسولية', NULL, NULL, '1614878779.png', 0, '2021-03-04 15:26:19', '2021-03-04 15:26:19'),
(16, 'frfe', 'ferf', NULL, NULL, '1618981506.png', 0, '2021-04-21 03:05:06', '2021-04-21 03:05:06'),
(21, 'efe', 'fefe', NULL, NULL, '1618982189.png', NULL, '2021-04-21 03:16:29', '2021-04-21 03:16:29'),
(22, 'vteef', 'fefer', NULL, NULL, '1618982262.png', 0, '2021-04-21 03:17:42', '2021-04-21 03:17:42'),
(23, 'refe', 'ferfre', NULL, NULL, '1618982284.png', 0, '2021-04-21 03:18:04', '2021-04-21 03:18:04'),
(24, 'erfer', 'frefer', NULL, NULL, '1618982358.png', 1, '2021-04-21 03:19:18', '2021-04-21 03:19:18'),
(25, 'ferf', 'ferfre', NULL, NULL, '1618982373.png', 0, '2021-04-21 03:19:33', '2021-04-21 03:19:33'),
(26, 'vetefr', 'ferfre', NULL, NULL, '1618982396.png', 0, '2021-04-21 03:19:56', '2021-04-21 03:19:56'),
(27, 'efe', 'ferfr', NULL, NULL, '1618982414.png', 1, '2021-04-21 03:20:14', '2021-04-21 03:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `state_tables`
--

CREATE TABLE `state_tables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categoriess`
--

CREATE TABLE `sub_categoriess` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `dayId` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `roles_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dateOfBirth`, `mobile`, `address`, `photo`, `type`, `roles_name`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$v8B8idYHemGAR9EflO7MhebBTSKNWhvmQuqpxrQm0lCUFrRRIcm2m', NULL, '023454', 'القاهره', '1613493502.png', 'admin', '[\"owner\"]', 'مفعل', NULL, '2021-01-03 03:43:48', '2021-04-21 16:29:17'),
(2, 'hamada', 'hamada@hamada.com', '$2y$10$bOrXfCIhO5mCFWHeNoPNKuPHfpNxduJn4QDKGuZsnj72RPzSOTZK2', NULL, NULL, NULL, NULL, 'admin', '[\"employee\"]', 'مفعل', NULL, '2021-01-03 07:02:34', '2021-01-09 07:53:29'),
(3, 'Diaa', 'diaa@gmail.com', '$2y$10$Yc7zKvx/Tf9Cc1jb3qhxre9V9KUOV3ntaWRq3J140n8zA.fSpmzeu', '2021-04-18', '0568645742', 'hail', '1618695044.png', 'admin', '[\"Admin\"]', 'مفعل', NULL, '2021-04-17 19:30:44', '2021-04-17 19:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
(135, 48, 'zTzJAwrpfnS5gxHoJoeEVhx0X9BSLQPS', '2021-04-24 04:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(11) NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `id` int(11) NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_morning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_morning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_afternoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_afternoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_evening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_evening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `doctorId`, `from_date`, `to_date`, `day`, `day_number`, `from_morning`, `to_morning`, `from_afternoon`, `to_afternoon`, `from_evening`, `to_evening`, `duration`, `created_at`, `updated_at`) VALUES
(1, 34, '2021-04-15', '2021-04-30', 'sat', '6', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(2, 34, '2021-04-15', '2021-04-30', 'sun', '0', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(3, 34, '2021-04-15', '2021-04-30', 'mon', '1', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(4, 34, '2021-04-15', '2021-04-30', 'tus', '2', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(5, 34, '2021-04-15', '2021-04-30', 'wed', '3', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(6, 34, '2021-04-15', '2021-04-30', 'thu', '4', '8:0', '12:0', '13:0', '15:30', '16:0', '21:30', '18', '2021-04-14 21:09:43', '2021-04-14 21:09:43'),
(7, 34, '2021-04-15', '2021-04-22', 'fri', '5', NULL, NULL, NULL, NULL, '16:0', '21:0', '15', '2021-04-14 21:10:39', '2021-04-14 21:10:39'),
(8, 39, '2021-04-17', '2021-05-31', 'sat', '6', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(9, 39, '2021-04-17', '2021-05-31', 'wed', '3', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(10, 39, '2021-04-17', '2021-05-31', 'thu', '4', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(11, 39, '2021-04-17', '2021-05-31', 'sun', '0', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(12, 39, '2021-04-17', '2021-05-31', 'mon', '1', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(13, 39, '2021-04-17', '2021-05-31', 'tus', '2', '9:0', '12:0', NULL, NULL, '16:0', '21:0', '30', '2021-04-17 14:35:08', '2021-04-17 14:35:08'),
(20, 42, '2021-04-20', '2021-04-27', 'sat', '6', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52'),
(21, 42, '2021-04-20', '2021-04-27', 'sun', '0', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52'),
(22, 42, '2021-04-20', '2021-04-27', 'mon', '1', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52'),
(23, 42, '2021-04-20', '2021-04-27', 'tus', '2', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52'),
(24, 42, '2021-04-20', '2021-04-27', 'wed', '3', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52'),
(25, 42, '2021-04-20', '2021-04-27', 'thu', '4', '8:0', '10:0', '14:10', '16:0', '20:0', '10:0', '15', '2021-04-20 11:33:52', '2021-04-20 11:33:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoriess`
--
ALTER TABLE `categoriess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_articleid_foreign` (`articleId`),
  ADD KEY `comments_patientid_foreign` (`patientId`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnostics_doctorid_foreign` (`doctorId`),
  ADD KEY `diagnostics_patientid_foreign` (`patientId`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_doctorid_foreign` (`doctorId`),
  ADD KEY `favorites_patientid_foreign` (`patientId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagess`
--
ALTER TABLE `messagess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientss`
--
ALTER TABLE `patientss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_doctorid_foreign` (`doctorId`),
  ADD KEY `payments_patientid_foreign` (`patientId`),
  ADD KEY `payments_appointmentid_foreign` (`appointmentId`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_tables`
--
ALTER TABLE `state_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categoriess`
--
ALTER TABLE `sub_categoriess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
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
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnostics`
--
ALTER TABLE `diagnostics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messagess`
--
ALTER TABLE `messagess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `patientss`
--
ALTER TABLE `patientss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `state_tables`
--
ALTER TABLE `state_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categoriess`
--
ALTER TABLE `sub_categoriess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
