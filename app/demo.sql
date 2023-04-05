

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `id` bigint UNSIGNED NOT NULL,
  `gateway_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'zootv', 1, '2023-02-22 06:51:13', '2023-02-22 06:51:13', NULL),
(2, 'circle', 1, '2023-02-22 06:51:58', '2023-02-22 06:51:58', NULL),
(3, 'CodeLab', 1, '2023-02-22 06:52:17', '2023-02-22 06:52:17', NULL),
(4, 'HEXLAB', 1, '2023-02-22 06:52:30', '2023-02-22 06:52:30', NULL),
(5, 'kanba', 1, '2023-02-22 06:52:45', '2023-02-22 06:52:45', NULL),
(6, 'treva', 1, '2023-02-22 06:52:59', '2023-02-22 06:52:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Writer', 1, '2023-02-21 07:33:51', NULL, NULL),
(2, 'Blog', 1, '2023-02-21 07:33:51', NULL, NULL),
(3, 'E-Mail', 1, '2023-02-21 07:33:51', NULL, NULL),
(4, 'Digital Ad', 1, '2023-02-21 07:33:51', NULL, NULL),
(5, 'Video', 1, '2023-02-21 07:33:51', NULL, NULL),
(6, 'Ecommerce', 1, '2023-02-21 07:33:51', NULL, NULL),
(7, 'Social media', 1, '2023-02-21 07:33:51', NULL, NULL),
(8, 'Brainstorm', 1, '2023-02-21 07:33:51', NULL, NULL),
(9, 'Framework', 1, '2023-02-21 07:33:51', NULL, NULL),
(10, 'SEO', 1, '2023-02-21 07:33:51', NULL, NULL),
(11, 'Travel', 1, '2023-02-21 07:33:51', NULL, NULL),
(12, 'Reviews', 1, '2023-02-21 07:33:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_placement` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'before' COMMENT 'before, after',
  `current_currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on' COMMENT 'on, off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `symbol`, `currency_placement`, `current_currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'USD', '$', 'before', 'on', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL),
(2, 'BDT', '৳', 'before', 'off', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL),
(3, 'INR', '₹', 'before', 'off', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL),
(4, 'GBP', '£', 'after', 'off', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL),
(5, 'MXN', '$', 'before', 'off', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL),
(6, 'SAR', 'SR', 'before', 'off', '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'What is ZaiwriteAI?', 'ZaiwriteAI is an AI content writer & copyright generator tool with SAAS that can help you create high-quality content quickly and easily.', 1, '2023-02-22 07:12:01', '2023-02-23 05:00:52', NULL),
(2, 'Is my data safe with ZaiwriteAI?', 'Yes, ZaiwriteAI takes data privacy and security very seriously. Your data is kept confidential and is not shared with any third parties.', 1, '2023-02-22 07:13:42', '2023-02-23 05:25:55', NULL),
(3, 'What kind of content can I create with ZaiwriteAI?', 'You can use ZaiwriteAI to generate various types of written content, including articles, reports, essays, blog posts, product descriptions, and more.', 1, '2023-02-22 07:16:10', '2023-02-23 05:01:42', NULL),
(4, 'How does ZaiwriteAI generate copyright-free content?', 'ZaiwriteAI uses a sophisticated plagiarism detection algorithm to ensure that the content it generates is unique and free of copyright infringement.', 1, '2023-02-22 07:16:54', '2023-02-23 05:02:11', NULL),
(5, 'Is ZaiwriteAI easy to use?', ': Yes, ZaiwriteAI is designed to be user-friendly and intuitive. You don\'t need to have any special technical skills to use it.', 1, '2023-02-22 07:17:55', '2023-02-23 05:02:43', NULL),
(6, 'How accurate is ZaiwriteAI?', 'ZaiwriteAI\'s accuracy depends on various factors, including the quality of your input and the complexity of the task. However, it is designed to generate high-quality content that is accurate, coherent, and grammatically correct.', 1, '2023-02-22 07:18:13', '2023-02-23 05:13:28', NULL),
(7, 'Can I customize ZaiwriteAI to suit my writing style?', 'Yes, ZaiwriteAI allows you to customize the tone and style of your writing to match your preferences.', 1, '2023-02-22 07:18:48', '2023-02-23 05:14:00', NULL),
(8, 'How does ZaiwriteAI differ from other content writing tools?', 'ZaiwriteAI uses advanced AI algorithms to analyze your input and generate unique, engaging text. It also has a built-in copyright generator feature that can help you avoid plagiarism.', 1, '2023-02-22 07:19:05', '2023-02-23 05:26:27', NULL),
(9, 'What are the benefits of using ZaiwriteAI?', 'Some benefits of using ZaiwriteAI include saving time, improving the quality of your writing, reducing the stress of writing, and avoiding plagiarism.', 1, '2023-02-22 07:19:20', '2023-02-23 05:14:44', NULL),
(10, 'Why use ZaiwriteAI ?', '1.Answering questions,\r\n2.Generating ideas ,\r\n3.Language learning,\r\n4.Research,\r\n5.Entertainment etc.', 1, '2023-02-22 07:19:34', '2023-02-23 05:17:23', NULL),
(11, 'Accusantium doloremque laudantium?', 'Numquam eius modi tempora incidunt ut labore et lorem sit dolorequaerat\r\n                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam\r\n                                            corporis lorem ipsum ', 1, '2023-02-22 07:19:48', '2023-02-23 05:04:42', '2023-02-23 05:04:42'),
(12, 'What are the benefits of using ZaiwriteAI?', 'Some benefits of using ZaiwriteAI include saving time, improving the quality of your writing, reducing the stress of writing, and avoiding plagiarism.', 1, '2023-02-23 05:20:01', '2023-02-23 05:20:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_managers`
--

DROP TABLE IF EXISTS `file_managers`;
CREATE TABLE `file_managers` (
  `id` bigint UNSIGNED NOT NULL,
  `folder_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_managers`
--

INSERT INTO `file_managers` (`id`, `folder_name`, `file_name`, `file_size`, `origin_type`, `origin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'files/Setting', 'logo-1677060115.png', NULL, 'App\\Models\\Setting', 25, '2023-02-22 05:18:59', '2023-02-22 10:01:55', NULL),
(2, 'files/Setting', 'favicon-1677043139.png', NULL, 'App\\Models\\Setting', 26, '2023-02-22 05:18:59', '2023-02-22 05:18:59', NULL),
(3, 'files/Setting', 'login-1677043189.webp', NULL, 'App\\Models\\Setting', 27, '2023-02-22 05:19:49', '2023-02-22 05:19:49', NULL),
(4, 'files/Testimonial', '1677063663.png', NULL, 'App\\Models\\Testimonial', 1, '2023-02-22 06:44:53', '2023-02-22 11:01:03', NULL),
(5, 'files/Brand', '1677048673.png', NULL, 'App\\Models\\Brand', 1, '2023-02-22 06:51:13', '2023-02-22 06:51:13', NULL),
(6, 'files/Brand', '1677048718.png', NULL, 'App\\Models\\Brand', 2, '2023-02-22 06:51:58', '2023-02-22 06:51:58', NULL),
(7, 'files/Brand', '1677048737.png', NULL, 'App\\Models\\Brand', 3, '2023-02-22 06:52:17', '2023-02-22 06:52:17', NULL),
(8, 'files/Brand', '1677048750.png', NULL, 'App\\Models\\Brand', 4, '2023-02-22 06:52:30', '2023-02-22 06:52:30', NULL),
(9, 'files/Brand', '1677048765.png', NULL, 'App\\Models\\Brand', 5, '2023-02-22 06:52:45', '2023-02-22 06:52:45', NULL),
(10, 'files/Brand', '1677048779.png', NULL, 'App\\Models\\Brand', 6, '2023-02-22 06:52:59', '2023-02-22 06:52:59', NULL),
(11, 'files/Setting', 'home-1677083176.png', NULL, 'App\\Models\\Setting', 45, '2023-02-22 06:56:58', '2023-02-22 16:26:16', NULL),
(12, 'files/Setting', 'home-1677151140.png', NULL, 'App\\Models\\Setting', 49, '2023-02-22 06:59:55', '2023-02-23 11:19:00', NULL),
(13, 'files/Setting', 'logo-black-1677060115.png', NULL, 'App\\Models\\Setting', 51, '2023-02-22 07:04:51', '2023-02-22 10:01:55', NULL),
(14, 'files/Setting', 'preloader-1677062474.png', NULL, 'App\\Models\\Setting', 54, '2023-02-22 07:48:04', '2023-02-22 10:41:14', NULL),
(15, 'files/User', '1677173660.png', NULL, 'App\\Models\\User', 1, '2023-02-22 10:22:57', '2023-02-23 17:34:20', NULL),
(16, 'files/User', '1677061816.png', NULL, 'App\\Models\\User', 2, '2023-02-22 10:30:16', '2023-02-22 10:30:16', NULL),
(17, 'files/Testimonial', '1677065297.png', NULL, 'App\\Models\\Testimonial', 2, '2023-02-22 11:28:17', '2023-02-22 11:28:17', NULL),
(18, 'files/Testimonial', '1677065829.png', NULL, 'App\\Models\\Testimonial', 3, '2023-02-22 11:37:09', '2023-02-22 11:37:09', NULL),
(19, 'files/SubCategory', '1677076917.svg', NULL, 'App\\Models\\SubCategory', 1, '2023-02-22 12:14:13', '2023-02-22 14:41:57', NULL),
(20, 'files/SubCategory', '1677077474.svg', NULL, 'App\\Models\\SubCategory', 2, '2023-02-22 12:30:59', '2023-02-22 14:51:14', NULL),
(21, 'files/Testimonial', '1677071817.png', NULL, 'App\\Models\\Testimonial', 4, '2023-02-22 13:16:57', '2023-02-22 13:16:57', NULL),
(22, 'files/HowItWork', '1677151913.png', NULL, 'App\\Models\\HowItWork', 1, '2023-02-22 14:19:19', '2023-02-23 11:31:53', NULL),
(23, 'files/HowItWork', '1677151926.png', NULL, 'App\\Models\\HowItWork', 2, '2023-02-22 14:19:30', '2023-02-23 11:32:06', NULL),
(24, 'files/HowItWork', '1677151936.png', NULL, 'App\\Models\\HowItWork', 3, '2023-02-22 14:19:38', '2023-02-23 11:32:16', NULL),
(25, 'files/SubCategory', '1677077489.svg', NULL, 'App\\Models\\SubCategory', 3, '2023-02-22 14:51:29', '2023-02-22 14:51:29', NULL),
(26, 'files/SubCategory', '1677077519.svg', NULL, 'App\\Models\\SubCategory', 4, '2023-02-22 14:51:59', '2023-02-22 14:51:59', NULL),
(27, 'files/SubCategory', '1677077578.svg', NULL, 'App\\Models\\SubCategory', 5, '2023-02-22 14:52:58', '2023-02-22 14:52:58', NULL),
(28, 'files/SubCategory', '1677077621.svg', NULL, 'App\\Models\\SubCategory', 6, '2023-02-22 14:53:41', '2023-02-22 14:53:41', NULL),
(29, 'files/SubCategory', '1677077668.svg', NULL, 'App\\Models\\SubCategory', 7, '2023-02-22 14:54:28', '2023-02-22 14:54:28', NULL),
(30, 'files/SubCategory', '1677077695.svg', NULL, 'App\\Models\\SubCategory', 8, '2023-02-22 14:54:55', '2023-02-22 14:54:55', NULL),
(31, 'files/SubCategory', '1677077736.svg', NULL, 'App\\Models\\SubCategory', 9, '2023-02-22 14:55:36', '2023-02-22 14:55:36', NULL),
(32, 'files/SubCategory', '1677077764.svg', NULL, 'App\\Models\\SubCategory', 10, '2023-02-22 14:56:04', '2023-02-22 14:56:04', NULL),
(33, 'files/SubCategory', '1677077788.svg', NULL, 'App\\Models\\SubCategory', 11, '2023-02-22 14:56:28', '2023-02-22 14:56:28', NULL),
(34, 'files/SubCategory', '1677143180.svg', NULL, 'App\\Models\\SubCategory', 12, '2023-02-22 14:56:55', '2023-02-23 09:06:20', NULL),
(35, 'files/Language', '1677079132.webp', NULL, 'App\\Models\\Language', 1, '2023-02-22 15:18:52', '2023-02-22 15:18:52', NULL),
(36, 'files/Category', '1677142544.svg', NULL, 'App\\Models\\Category', 1, '2023-02-22 15:58:17', '2023-02-23 08:55:44', NULL),
(37, 'files/Category', '1677142403.svg', NULL, 'App\\Models\\Category', 2, '2023-02-22 15:59:56', '2023-02-23 08:53:23', NULL),
(38, 'files/Category', '1677142438.svg', NULL, 'App\\Models\\Category', 4, '2023-02-23 08:53:58', '2023-02-23 08:53:58', NULL),
(39, 'files/Category', '1677142476.svg', NULL, 'App\\Models\\Category', 6, '2023-02-23 08:54:36', '2023-02-23 08:54:36', NULL),
(40, 'files/Category', '1677142507.svg', NULL, 'App\\Models\\Category', 7, '2023-02-23 08:55:07', '2023-02-23 08:55:07', NULL),
(41, 'files/Category', '1677142576.svg', NULL, 'App\\Models\\Category', 8, '2023-02-23 08:56:16', '2023-02-23 08:56:16', NULL),
(42, 'files/Category', '1677142604.svg', NULL, 'App\\Models\\Category', 10, '2023-02-23 08:56:44', '2023-02-23 08:56:44', NULL),
(43, 'files/Category', '1677142623.svg', NULL, 'App\\Models\\Category', 9, '2023-02-23 08:57:03', '2023-02-23 08:57:03', NULL),
(44, 'files/Category', '1677142651.svg', NULL, 'App\\Models\\Category', 3, '2023-02-23 08:57:31', '2023-02-23 08:57:31', NULL),
(45, 'files/Category', '1677142672.svg', NULL, 'App\\Models\\Category', 5, '2023-02-23 08:57:52', '2023-02-23 08:57:52', NULL),
(46, 'files/Category', '1677142706.svg', NULL, 'App\\Models\\Category', 11, '2023-02-23 08:58:26', '2023-02-23 08:58:26', NULL),
(47, 'files/Category', '1677142740.svg', NULL, 'App\\Models\\Category', 12, '2023-02-23 08:59:00', '2023-02-23 08:59:00', NULL),
(48, 'files/SubCategory', '1677143195.svg', NULL, 'App\\Models\\SubCategory', 13, '2023-02-23 09:06:35', '2023-02-23 09:06:35', NULL),
(49, 'files/SubCategory', '1677143215.svg', NULL, 'App\\Models\\SubCategory', 14, '2023-02-23 09:06:55', '2023-02-23 09:06:55', NULL),
(50, 'files/SubCategory', '1677143273.svg', NULL, 'App\\Models\\SubCategory', 15, '2023-02-23 09:07:16', '2023-02-23 09:07:53', NULL),
(51, 'files/SubCategory', '1677143506.svg', NULL, 'App\\Models\\SubCategory', 16, '2023-02-23 09:11:46', '2023-02-23 09:11:46', NULL),
(52, 'files/SubCategory', '1677143523.svg', NULL, 'App\\Models\\SubCategory', 17, '2023-02-23 09:12:03', '2023-02-23 09:12:03', NULL),
(53, 'files/SubCategory', '1677143538.svg', NULL, 'App\\Models\\SubCategory', 18, '2023-02-23 09:12:18', '2023-02-23 09:12:18', NULL),
(54, 'files/SubCategory', '1677143559.svg', NULL, 'App\\Models\\SubCategory', 19, '2023-02-23 09:12:39', '2023-02-23 09:12:39', NULL),
(55, 'files/SubCategory', '1677143574.svg', NULL, 'App\\Models\\SubCategory', 20, '2023-02-23 09:12:54', '2023-02-23 09:12:54', NULL),
(56, 'files/SubCategory', '1677143961.svg', NULL, 'App\\Models\\SubCategory', 23, '2023-02-23 09:19:21', '2023-02-23 09:19:21', NULL),
(57, 'files/SubCategory', '1677143995.svg', NULL, 'App\\Models\\SubCategory', 24, '2023-02-23 09:19:55', '2023-02-23 09:19:55', NULL),
(58, 'files/SubCategory', '1677144024.svg', NULL, 'App\\Models\\SubCategory', 25, '2023-02-23 09:20:24', '2023-02-23 09:20:24', NULL),
(59, 'files/SubCategory', '1677144058.svg', NULL, 'App\\Models\\SubCategory', 26, '2023-02-23 09:20:58', '2023-02-23 09:20:58', NULL),
(60, 'files/SubCategory', '1677144078.svg', NULL, 'App\\Models\\SubCategory', 27, '2023-02-23 09:21:18', '2023-02-23 09:21:18', NULL),
(61, 'files/SubCategory', '1677144095.svg', NULL, 'App\\Models\\SubCategory', 28, '2023-02-23 09:21:35', '2023-02-23 09:21:35', NULL),
(62, 'files/SubCategory', '1677144110.svg', NULL, 'App\\Models\\SubCategory', 29, '2023-02-23 09:21:50', '2023-02-23 09:21:50', NULL),
(63, 'files/SubCategory', '1677144130.svg', NULL, 'App\\Models\\SubCategory', 30, '2023-02-23 09:22:10', '2023-02-23 09:22:10', NULL),
(64, 'files/SubCategory', '1677144148.svg', NULL, 'App\\Models\\SubCategory', 31, '2023-02-23 09:22:28', '2023-02-23 09:22:28', NULL),
(65, 'files/SubCategory', '1677144162.svg', NULL, 'App\\Models\\SubCategory', 32, '2023-02-23 09:22:42', '2023-02-23 09:22:42', NULL),
(66, 'files/SubCategory', '1677144400.svg', NULL, 'App\\Models\\SubCategory', 33, '2023-02-23 09:26:40', '2023-02-23 09:26:40', NULL),
(67, 'files/SubCategory', '1677144418.svg', NULL, 'App\\Models\\SubCategory', 34, '2023-02-23 09:26:58', '2023-02-23 09:26:58', NULL),
(68, 'files/SubCategory', '1677144462.svg', NULL, 'App\\Models\\SubCategory', 35, '2023-02-23 09:27:42', '2023-02-23 09:27:42', NULL),
(69, 'files/SubCategory', '1677144505.svg', NULL, 'App\\Models\\SubCategory', 36, '2023-02-23 09:28:25', '2023-02-23 09:28:25', NULL),
(70, 'files/SubCategory', '1677144524.svg', NULL, 'App\\Models\\SubCategory', 37, '2023-02-23 09:28:44', '2023-02-23 09:28:44', NULL),
(71, 'files/SubCategory', '1677144554.svg', NULL, 'App\\Models\\SubCategory', 38, '2023-02-23 09:29:14', '2023-02-23 09:29:14', NULL),
(72, 'files/SubCategory', '1677144594.svg', NULL, 'App\\Models\\SubCategory', 39, '2023-02-23 09:29:54', '2023-02-23 09:29:54', NULL),
(73, 'files/SubCategory', '1677144655.svg', NULL, 'App\\Models\\SubCategory', 40, '2023-02-23 09:30:55', '2023-02-23 09:30:55', NULL),
(74, 'files/SubCategory', '1677144668.svg', NULL, 'App\\Models\\SubCategory', 41, '2023-02-23 09:31:08', '2023-02-23 09:31:08', NULL),
(75, 'files/SubCategory', '1677144716.svg', NULL, 'App\\Models\\SubCategory', 43, '2023-02-23 09:31:56', '2023-02-23 09:31:56', NULL),
(76, 'files/SubCategory', '1677144728.svg', NULL, 'App\\Models\\SubCategory', 44, '2023-02-23 09:32:08', '2023-02-23 09:32:08', NULL),
(77, 'files/SubCategory', '1677144739.svg', NULL, 'App\\Models\\SubCategory', 45, '2023-02-23 09:32:19', '2023-02-23 09:32:19', NULL),
(78, 'files/SubCategory', '1677144752.svg', NULL, 'App\\Models\\SubCategory', 46, '2023-02-23 09:32:32', '2023-02-23 09:32:32', NULL),
(79, 'files/SubCategory', '1677144774.svg', NULL, 'App\\Models\\SubCategory', 47, '2023-02-23 09:32:54', '2023-02-23 09:32:54', NULL),
(80, 'files/SubCategory', '1677144917.svg', NULL, 'App\\Models\\SubCategory', 48, '2023-02-23 09:35:17', '2023-02-23 09:35:17', NULL),
(81, 'files/SubCategory', '1677144933.svg', NULL, 'App\\Models\\SubCategory', 49, '2023-02-23 09:35:33', '2023-02-23 09:35:33', NULL),
(82, 'files/SubCategory', '1677144948.svg', NULL, 'App\\Models\\SubCategory', 50, '2023-02-23 09:35:48', '2023-02-23 09:35:48', NULL),
(83, 'files/SubCategory', '1677144965.svg', NULL, 'App\\Models\\SubCategory', 51, '2023-02-23 09:36:05', '2023-02-23 09:36:05', NULL),
(84, 'files/SubCategory', '1677144986.svg', NULL, 'App\\Models\\SubCategory', 52, '2023-02-23 09:36:26', '2023-02-23 09:36:26', NULL),
(85, 'files/SubCategory', '1677145262.svg', NULL, 'App\\Models\\SubCategory', 53, '2023-02-23 09:41:02', '2023-02-23 09:41:02', NULL),
(86, 'files/SubCategory', '1677145299.svg', NULL, 'App\\Models\\SubCategory', 54, '2023-02-23 09:41:39', '2023-02-23 09:41:39', NULL),
(87, 'files/SubCategory', '1677145333.svg', NULL, 'App\\Models\\SubCategory', 55, '2023-02-23 09:42:13', '2023-02-23 09:42:13', NULL),
(88, 'files/SubCategory', '1677145447.svg', NULL, 'App\\Models\\SubCategory', 57, '2023-02-23 09:44:07', '2023-02-23 09:44:07', NULL),
(89, 'files/SubCategory', '1677145466.svg', NULL, 'App\\Models\\SubCategory', 59, '2023-02-23 09:44:26', '2023-02-23 09:44:26', NULL),
(90, 'files/SubCategory', '1677145481.svg', NULL, 'App\\Models\\SubCategory', 58, '2023-02-23 09:44:41', '2023-02-23 09:44:41', NULL),
(91, 'files/SubCategory', '1677145510.svg', NULL, 'App\\Models\\SubCategory', 60, '2023-02-23 09:45:10', '2023-02-23 09:45:10', NULL),
(92, 'files/SubCategory', '1677145534.svg', NULL, 'App\\Models\\SubCategory', 61, '2023-02-23 09:45:34', '2023-02-23 09:45:34', NULL),
(93, 'files/SubCategory', '1677147038.svg', NULL, 'App\\Models\\SubCategory', 21, '2023-02-23 10:01:22', '2023-02-23 10:10:38', NULL),
(94, 'files/SubCategory', '1677146535.svg', NULL, 'App\\Models\\SubCategory', 56, '2023-02-23 10:02:15', '2023-02-23 10:02:15', NULL),
(95, 'files/SubCategory', '1677147050.svg', NULL, 'App\\Models\\SubCategory', 22, '2023-02-23 10:02:36', '2023-02-23 10:10:50', NULL),
(96, 'files/SubCategory', '1677146890.svg', NULL, 'App\\Models\\SubCategory', 42, '2023-02-23 10:08:10', '2023-02-23 10:08:10', NULL),
(97, 'files/SubCategory', '1677146916.svg', NULL, 'App\\Models\\SubCategory', 62, '2023-02-23 10:08:36', '2023-02-23 10:08:36', NULL),
(98, 'files/SubCategory', '1677146930.svg', NULL, 'App\\Models\\SubCategory', 63, '2023-02-23 10:08:50', '2023-02-23 10:08:50', NULL),
(99, 'files/SubCategory', '1677146948.svg', NULL, 'App\\Models\\SubCategory', 64, '2023-02-23 10:09:08', '2023-02-23 10:09:08', NULL),
(100, 'files/SubCategory', '1677146960.svg', NULL, 'App\\Models\\SubCategory', 65, '2023-02-23 10:09:20', '2023-02-23 10:09:20', NULL),
(101, 'files/SubCategory', '1677146972.svg', NULL, 'App\\Models\\SubCategory', 66, '2023-02-23 10:09:32', '2023-02-23 10:09:32', NULL),
(102, 'files/SubCategory', '1677146984.svg', NULL, 'App\\Models\\SubCategory', 67, '2023-02-23 10:09:44', '2023-02-23 10:09:44', NULL),
(103, 'files/SubCategory', '1677146995.svg', NULL, 'App\\Models\\SubCategory', 68, '2023-02-23 10:09:55', '2023-02-23 10:09:55', NULL),
(104, 'files/SubCategory', '1677147010.svg', NULL, 'App\\Models\\SubCategory', 69, '2023-02-23 10:10:10', '2023-02-23 10:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
CREATE TABLE `gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=Active,0=Disable',
  `mode` tinyint NOT NULL DEFAULT '2' COMMENT '1=live,2=sandbox',
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client id, public key, key, store id, api key',
  `secret` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client secret, secret, store password, auth token',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `title`, `slug`, `image`, `status`, `mode`, `url`, `key`, `secret`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paypal', 'paypal', 'assets/images/gateway-icon/paypal.png', 1, 2, NULL, '', '', NULL, null, NULL),
(2, 'Stripe', 'stripe', 'assets/images/gateway-icon/stripe.png', 1, 2, '', '', '', NULL, NULL, NULL),
(3, 'Razorpay', 'razorpay', 'assets/images/gateway-icon/razorpay.png', 1, 2, '', '', '', NULL, NULL, NULL),
(4, 'Instamojo', 'instamojo', 'assets/images/gateway-icon/instamojo.png', 1, 2, '', '', '', NULL, NULL, NULL),
(5, 'Mollie', 'mollie', 'assets/images/gateway-icon/mollie.png', 1, 2, '', '', '', NULL, NULL, NULL),
(6, 'Paystack', 'paystack', 'assets/images/gateway-icon/paystack.png', 1, 2, '', '', '', NULL, NULL, NULL),
(7, 'Sslcommerz', 'sslcommerz', 'assets/images/gateway-icon/sslcommerz.png', 1, 2, '', '', '', NULL, NULL, NULL),
(8, 'Flutterwave', 'flutterwave', 'assets/images/gateway-icon/flutterwave.png', 1, 2, '', '', '', NULL, NULL, NULL),
(9, 'Mercadopago', 'mercadopago', 'assets/images/gateway-icon/mercadopago.png', 1, 2, '', '', '', NULL, NULL, NULL),
(10, 'Coinbase', 'coinbase', 'assets/images/gateway-icon/coinbase.png', 1, 2, '', '', '', NULL, NULL, NULL),
(11, 'Bank', 'bank', 'assets/images/gateway-icon/bank.png', 1, 2, '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

DROP TABLE IF EXISTS `gateway_currencies`;
CREATE TABLE `gateway_currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `gateway_id` bigint UNSIGNED NOT NULL,
  `currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `conversion_rate` decimal(8,2) NOT NULL DEFAULT '1.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `gateway_id`, `currency`, `conversion_rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'USD', '1.00', NULL, NULL, NULL),
(2, 2, 'USD', '1.00', NULL, NULL, NULL),
(3, 3, 'INR', '80.00', NULL, NULL, NULL),
(4, 4, 'INR', '80.00', NULL, NULL, NULL),
(5, 5, 'USD', '1.00', NULL, NULL, NULL),
(6, 6, 'NGN', '464.00', NULL, NULL, NULL),
(7, 7, 'BDT', '100.00', NULL, NULL, NULL),
(8, 8, 'NGN', '464.00', NULL, NULL, NULL),
(9, 9, 'BRL', '5.00', NULL, NULL, NULL),
(10, 10, 'USD', '1.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

DROP TABLE IF EXISTS `how_it_works`;
CREATE TABLE `how_it_works` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `title`, `summery`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 Review, export and publish copy', NULL, 'Use our powerful AI editing tools to edit or write more content, then export it to wherever you need.\r\n\r\nExport in multiple formats like CSV and DOCX, orpublish directly to Shopify and WordPress\r\nGet peace of mind with a built-in plagiarism checker', 1, '2023-02-22 06:41:38', '2023-02-22 06:41:38', NULL),
(2, 'Batch generate quality, factual content', NULL, 'Writing great content isn\'t easy. We\'ve got a suite of tools that can help you create high quality content at scale.\r\n\r\nBlog article wizard takes you from title to a 1,000 word article in 5 minutes\r\nContent Detective helps you research up-to-date, factual', 1, '2023-02-22 06:43:01', '2023-02-22 06:43:01', NULL),
(3, 'Review, export and publish copy', NULL, 'Use our powerful AI editing tools to edit or write more content, then export it to wherever you need.\r\n\r\nExport in multiple formats like CSV and DOCX, orpublish directly to Shopify and WordPress\r\nGet peace of mind with a built-in plagiarism checker', 1, '2023-02-22 06:43:19', '2023-02-22 06:43:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Active,0=Disable',
  `default` tinyint NOT NULL DEFAULT '0' COMMENT '1=yes,0=no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `rtl`, `status`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'en', NULL, 0, 1, 1, '2023-02-21 07:33:51', '2023-02-22 10:41:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
CREATE TABLE `metas` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `url`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'login', 'Log In', 'ZAIPROPARTY A property management system', 'zaiproperty, property, property management system, property management software', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_14_123059_create_metas_table', 1),
(6, '2022_06_23_121213_create_settings_table', 1),
(7, '2022_06_25_110824_create_currencies_table', 1),
(8, '2022_06_25_111037_create_languages_table', 1),
(9, '2022_10_03_070043_create_transactions_table', 1),
(10, '2022_11_26_183258_create_file_managers_table', 1),
(11, '2022_11_30_040739_create_gateways_table', 1),
(12, '2022_11_30_043152_create_ticket_topics_table', 1),
(13, '2023_01_03_075827_create_gateway_currencies_table', 1),
(14, '2023_01_07_120244_create_banks_table', 1),
(15, '2023_01_12_131452_create_tickets_table', 1),
(16, '2023_01_22_070829_create_ticket_replies_table', 1),
(17, '2023_01_30_071830_create_orders_table', 1),
(18, '2023_02_01_094211_create_notifications_table', 1),
(19, '2023_02_11_130034_create_packages_table', 1),
(20, '2023_02_12_123347_create_user_packages_table', 1),
(21, '2023_02_13_131109_create_categories_table', 1),
(22, '2023_02_13_131312_create_sub_categories_table', 1),
(23, '2023_02_13_134427_create_search_results_table', 1),
(24, '2023_02_16_071606_create_search_result_items_table', 1),
(25, '2023_02_20_094128_create_brands_table', 1),
(26, '2023_02_20_115702_create_how_it_works_table', 1),
(27, '2023_02_20_144029_create_testimonials_table', 1),
(28, '2023_02_21_060037_create_faqs_table', 1),
(29, '2023_02_21_093634_create_contact_messages_table', 1),
(30, '2023_02_21_115017_create_user_favorites_table', 1),
(31, '2023_02_25_093030_add_field_to_search_results_table', 2),
(32, '2023_03_04_140321_change_field_to_search_results_table', 3),
(33, '2023_03_05_121439_add_field_to_banks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_seen` tinyint NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `sender_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `amount` double(8,2) DEFAULT '0.00',
  `tax_amount` double(8,2) DEFAULT NULL,
  `tax_percentage` double(8,2) DEFAULT NULL,
  `system_currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_id` bigint UNSIGNED NOT NULL,
  `gateway_currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversion_rate` double(8,2) DEFAULT '1.00',
  `duration_type` tinyint NOT NULL DEFAULT '1',
  `subtotal` double(8,2) NOT NULL DEFAULT '0.00',
  `total` double(8,2) DEFAULT '0.00',
  `transaction_amount` double(8,2) DEFAULT '0.00',
  `payment_status` tinyint DEFAULT '0' COMMENT '0=pending, 1=paid, 2=cancelled',
  `bank_id` tinyint DEFAULT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_slip_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `generate_characters` int NOT NULL DEFAULT '0',
  `access_use_cases` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `write_languages` int NOT NULL DEFAULT '0',
  `access_tones` int NOT NULL DEFAULT '0',
  `generate_images` int NOT NULL DEFAULT '0',
  `plagiarism_checker` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_community` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_use_cases` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dedicated_account` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `yearly_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `device_limit` int NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT 'active for 1 , deactivate for 0',
  `is_default` tinyint NOT NULL DEFAULT '0' COMMENT 'default for 1 , not default for 0',
  `is_trail` tinyint NOT NULL DEFAULT '0' COMMENT 'default for 1 , not default for 0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `generate_characters`, `access_use_cases`, `write_languages`, `access_tones`, `generate_images`, `plagiarism_checker`, `access_community`, `custom_use_cases`, `dedicated_account`, `support`, `monthly_price`, `yearly_price`, `device_limit`, `status`, `is_default`, `is_trail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trial', 'trial', 10000, '[\"1\"]', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 1, 1, 0, 1, '2023-02-21 07:33:52', '2023-02-23 05:24:03', NULL),
(2, 'Basic', 'Basic', 100000, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\"]', 10, 5, 0, NULL, 'Full Community', NULL, NULL, 'Basic Support', '9.00', '99.00', 1, 1, 0, 0, '2023-02-22 07:12:10', '2023-02-23 05:24:03', NULL),
(3, 'Standard', 'Standard', 300000, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\"]', 10, 5, 0, NULL, 'Full Community', NULL, NULL, 'Standard Support', '29.00', '299.00', 1, 1, 0, 0, '2023-02-22 07:13:37', '2023-02-22 07:13:37', NULL),
(4, 'Professional', 'Professional', 10000000, '[\"-1\"]', 10, 6, 0, NULL, 'Full Community', NULL, NULL, 'Professional Support', '59.00', '599.00', 1, 1, 0, 0, '2023-02-22 07:15:07', '2023-02-22 14:40:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

DROP TABLE IF EXISTS `search_results`;
CREATE TABLE `search_results` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `prompt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creativity_level` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tone_of_voice` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_action` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_results`
--

-- --------------------------------------------------------

--
-- Table structure for table `search_result_items`
--

DROP TABLE IF EXISTS `search_result_items`;
CREATE TABLE `search_result_items` (
  `id` bigint UNSIGNED NOT NULL,
  `search_result_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `output` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `react` tinyint DEFAULT NULL,
  `is_favorite` tinyint NOT NULL DEFAULT '0',
  `total_word` int NOT NULL DEFAULT '0',
  `total_characters` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_result_items`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `option_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'build_version', '6', NULL, '2023-02-21 07:33:51', '2023-02-21 07:33:51', NULL),
(2, 'current_version', '1.5', NULL, '2023-02-21 07:33:51', '2023-02-21 07:33:51', NULL),
(3, 'app_name', 'ZaiwriteAI - Ai Content Writer & Copyright Generator tool With SAAS', NULL, '2023-02-22 04:54:31', '2023-02-22 04:54:32', NULL),
(4, 'app_email', 'info@zaiwriteai.com', NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(5, 'app_contact_number', '01234567890', NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(6, 'app_location', 'usa', NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(7, 'app_copyright', '© 2023 ZaiwrteAi. All Rights Reserved.', NULL, '2023-02-22 04:54:32', '2023-02-22 10:25:36', NULL),
(8, 'app_footer_text', 'ZaiwriteAI is a powerful AI Content Writer & Copyright Generator tool designed to revolutionize the way businesses create content. Our cutting-edge software leverages advanced machine learnin', NULL, '2023-02-22 04:54:32', '2023-02-22 10:25:36', NULL),
(9, 'app_developed_by', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(10, 'currency_id', '1', NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(11, 'trail_duration', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(12, 'language_id', '1', NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(13, 'app_preloader_status', '1', NULL, '2023-02-22 04:54:32', '2023-02-22 10:41:34', NULL),
(14, 'sign_in_text_title', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(15, 'sign_in_text_subtitle', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(16, 'meta_keyword', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(17, 'meta_author', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(18, 'revisit', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(19, 'sitemap_link', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(20, 'meta_description', 'ZaiwriteAI is an innovative AI writing tool that uses advanced algorithms and machine learning to help you generate high-quality content with ease. From creating blog posts and articles to dr', NULL, '2023-02-22 04:54:32', '2023-02-22 04:57:24', NULL),
(21, 'facebook_url', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(22, 'twitter_url', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(23, 'linkedin_url', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(24, 'skype_url', NULL, NULL, '2023-02-22 04:54:32', '2023-02-22 04:54:32', NULL),
(25, 'app_logo', '1', NULL, '2023-02-22 05:18:59', '2023-02-22 05:18:59', NULL),
(26, 'app_fav_icon', '2', NULL, '2023-02-22 05:18:59', '2023-02-22 05:18:59', NULL),
(27, 'sign_in_image', '3', NULL, '2023-02-22 05:19:49', '2023-02-22 05:19:49', NULL),
(28, 'home_how_it_word_section_title', 'How It Works', NULL, '2023-02-22 06:41:15', '2023-02-22 06:41:15', NULL),
(29, 'home_how_it_word_section_summery', 'ZaiwriteAI is a research organization focused on advancing artificial intelligence technology in a safe and beneficial manner. ZaiwriteAI works on various AI-related projects.', NULL, '2023-02-22 06:41:15', '2023-02-22 13:04:12', NULL),
(30, 'home_how_it_word_section_status', '1', NULL, '2023-02-22 06:41:15', '2023-02-22 06:41:15', NULL),
(31, 'home_testimonial_section_title', 'What Our Clients Are Saying About Us', NULL, '2023-02-22 06:43:59', '2023-02-22 06:43:59', NULL),
(32, 'home_testimonial_section_status', '1', NULL, '2023-02-22 06:43:59', '2023-02-22 06:43:59', NULL),
(33, 'home_price_section_title_first', 'Try', NULL, '2023-02-22 06:46:32', '2023-02-22 09:21:38', NULL),
(34, 'home_price_section_title_color', '10,000 Words', NULL, '2023-02-22 06:46:32', '2023-02-22 09:21:07', NULL),
(35, 'home_price_section_title_last', 'Free Start Writing with ZaiwriteAi Now.', NULL, '2023-02-22 06:46:32', '2023-02-22 09:21:38', NULL),
(36, 'home_price_section_summery', 'When you get started today your account will be instantly loaded with 10,000 word credits FREE.', NULL, '2023-02-22 06:46:32', '2023-02-22 07:22:56', NULL),
(37, 'home_pricing_section_status', '1', NULL, '2023-02-22 06:46:32', '2023-02-22 06:46:32', NULL),
(38, 'home_brand_section_title', 'Trusted by 10,000+ marketing teams', NULL, '2023-02-22 06:49:06', '2023-02-22 06:49:06', NULL),
(39, 'home_brand_section_status', '1', NULL, '2023-02-22 06:49:06', '2023-02-22 06:49:06', NULL),
(40, 'home_hero_title_one', 'Best Ai', NULL, '2023-02-22 06:56:58', '2023-02-22 06:56:58', NULL),
(41, 'home_hero_title_two', 'Writer For Creating', NULL, '2023-02-22 06:56:58', '2023-02-22 06:56:58', NULL),
(42, 'home_hero_title_slider', 'Facebook Post Description,Youtube Description,Blog Description,Content', NULL, '2023-02-22 06:56:58', '2023-02-22 06:58:44', NULL),
(43, 'home_hero_title_summery', 'ZaiwriteAI is an advanced AI writing tool that can help you create high-quality content quickly and easily. Whether you need to write an article, a report, a blog post, or any other type of written content, ZaiwriteAI can assist you in generating unique and engaging text.', NULL, '2023-02-22 06:56:58', '2023-02-22 20:32:57', NULL),
(44, 'home_hero_section_status', '1', NULL, '2023-02-22 06:56:58', '2023-02-22 06:56:58', NULL),
(45, 'home_hero_area_image', '11', NULL, '2023-02-22 06:56:58', '2023-02-22 06:56:58', NULL),
(46, 'home_generate_content_section_title', 'Generate content in seconds', NULL, '2023-02-22 06:59:55', '2023-02-22 06:59:55', NULL),
(47, 'home_generate_content_section_summery', 'Generating content in seconds refers to using ZaiWriteAI algorithms that can automatically create text quickly based on a given input or prompt. These models include language models.', NULL, '2023-02-22 06:59:55', '2023-02-22 12:40:52', NULL),
(48, 'home_generate_content_section_status', '1', NULL, '2023-02-22 06:59:55', '2023-02-22 06:59:55', NULL),
(49, 'home_generate_content_section_image', '12', NULL, '2023-02-22 06:59:55', '2023-02-22 06:59:55', NULL),
(50, 'home_generate_content_section_category', '[\"1\",\"6\",\"7\",\"10\",\"12\"]', NULL, '2023-02-22 07:00:40', '2023-02-23 11:19:00', NULL),
(51, 'app_logo_black', '13', NULL, '2023-02-22 07:04:51', '2023-02-22 07:04:51', NULL),
(52, 'home_faq_section_title', 'Frequently Asked Questions', NULL, '2023-02-22 07:10:46', '2023-02-22 07:10:46', NULL),
(53, 'home_faq_section_status', '1', NULL, '2023-02-22 07:10:46', '2023-02-22 07:10:46', NULL),
(54, 'app_preloader', '14', NULL, '2023-02-22 07:48:04', '2023-02-22 07:48:04', NULL),
(55, 'chat_gpt_api', '', NULL, '2023-02-22 14:49:54', '2023-02-23 11:01:56', NULL),
(56, 'google_analytics_measurement_id', '', NULL, '2023-03-02 12:45:13', '2023-03-02 13:00:13', NULL),
(57, 'analytics_enable', '0', NULL, '2023-03-02 13:14:40', '2023-03-02 13:14:40', NULL);
insert into settings( option_key, option_value, created_at, updated_at) VALUES ('gateway_settings','{\"paypal\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Client ID\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Secret\",\"name\":\"secret\",\"is_show\":1}],\"stripe\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Public Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Secret Key\",\"name\":\"secret\",\"is_show\":0}],\"razorpay\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Secret\",\"name\":\"secret\",\"is_show\":1}],\"instamojo\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Api Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Auth Token\",\"name\":\"secret\",\"is_show\":1}],\"mollie\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Mollie Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Secret\",\"name\":\"secret\",\"is_show\":0}],\"paystack\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Public Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Secret Key\",\"name\":\"secret\",\"is_show\":0}],\"mercadopago\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Client ID\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Client Secret\",\"name\":\"secret\",\"is_show\":1}],\"sslcommerz\":[{\"label\":\"Url\",\"name\":\"url\",\"is_show\":0},{\"label\":\"Store ID\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Store Password\",\"name\":\"secret\",\"is_show\":1}],\"flutterwave\":[{\"label\":\"Hash\",\"name\":\"url\",\"is_show\":1},{\"label\":\"Public Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Client Secret\",\"name\":\"secret\",\"is_show\":1}],\"coinbase\":[{\"label\":\"Hash\",\"name\":\"url\",\"is_show\":0},{\"label\":\"API Key\",\"name\":\"key\",\"is_show\":1},{\"label\":\"Client Secret\",\"name\":\"secret\",\"is_show\":0}]}','2023-02-22 20:49:54','2023-02-22 20:49:54');
-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_favorite` tinyint NOT NULL DEFAULT '0',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `prompt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_form_prompt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default.svg',
  `status` tinyint NOT NULL DEFAULT '1',
  `is_long_form` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `summery`, `is_favorite`, `content`, `prompt`, `long_form_prompt`, `icon`, `status`, `is_long_form`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Headline', 'Looking to create headlines that\'ll grab attention? Just enter in a few words related to what you want to write about, and our tool will generate a list of potential headlines for you to choose from.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"headline\"},{\"label\":\"product\\/service\",\"type\":\"input\",\"name\":\"product\\/service\",\"placeholder\":\"eg. Creaitor\"}]', 'Write a headline about #description# and  product or service is #product/service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:44:57', NULL),
(2, 1, 'Text Summary', 'This is a tool which can be used to summarize a text quickly and easily. It can be used to identify the main ideas and points in a text, and to create a concise summary of the key points.', 1, '[{\"label\":\"Which content do you want to summarize?\",\"type\":\"textarea\",\"name\":\"which_content_do_you_want_to_summarize?\",\"placeholder\":\"Placeholder\"}]', 'Write text summary of this content #which_content_do_you_want_to_summarize?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:50:33', NULL),
(3, 1, 'Content Improve', 'This tool will help improve your text content by rewriting it for you. It will make sure that your text is error-free, well-written, and persuasive.', 1, '[{\"label\":\"Which content do you want to improve?\",\"type\":\"textarea\",\"name\":\"which_content_do_you_want_to_improve?\",\"placeholder\":\"Placeholder\"}]', 'Improve this content , content is #which_content_do_you_want_to_improve?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:50:51', NULL),
(4, 1, 'Creative Story', 'This is a tool which can help create a stunning creative story. It can provide ideas and help with the overall plot. It is easy to use and can make the story more exciting.', 1, '[{\"label\":\"About what do you want to have a creative story?\",\"type\":\"textarea\",\"name\":\"about_what_do_you_want_to_have_a_creative_story?\",\"placeholder\":\"e.g.A robot with AI which has feelings and want to discover the world.\"}]', 'Write a creative story based on #about_what_do_you_want_to_have_a_creative_story?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:07', NULL),
(5, 1, 'Testimonial Helper', 'Use this template to generate testimonials. This testimonial will get your customer\'s attention and make them feel great!', 0, '[{\"label\":\"What do you like about the product\\/service?\",\"type\":\"textarea\",\"name\":\"what_do_you_like_about_the_product\\/service?\",\"placeholder\":\"e.g.Super easy to use,love the value,save me so much time\"}]', 'Write a Testimonial helper by using the liked parts of #what_do_you_like_about_the_product/service?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:25', NULL),
(6, 1, 'Company Bio', 'Tell your company\'s story with a captivating bio.', 0, '[{\"label\":\"Company information\",\"type\":\"textarea\",\"name\":\"company_information\",\"placeholder\":\"e.g.My company\'s mission is to help other companies in digital marketing. We provide a wide range of services, including web design and development & social media\"},{\"label\":\"Company Name\",\"type\":\"input\",\"name\":\"company_name\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a brief bio for #company_name#, my company information is #company_information# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:58', NULL),
(7, 1, 'Content Rewrite', 'The Content rewriting tools help to improve the clarity and quality of your writing. They can also help to ensure that your content is free of plagiarism.', 0, '[{\"label\":\"Which content do you to rewrite?\",\"type\":\"textarea\",\"name\":\"which_content_do_you_to_rewrite?\",\"placeholder\":\"e.g.The Content rewriting tools to improve the clarity and quality of your writing.They can also help to ensure that your content is free of plagiarism.\"}]', 'Rewrite a text by using #which_content_do_you_to_rewrite?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:39', NULL),
(8, 1, 'Google My Business - Event Post', 'Generate event details for your Google My Business event posts', 0, '[{\"label\":\"Tell us about your event\",\"type\":\"textarea\",\"name\":\"tell_us_about_your_event\",\"placeholder\":\"Free outdoor fitness class in dubai.Thursday Mar27th 6-7pm.\"}]', 'Write a Google My Business - Event Post by using #tell_us_about_your_event# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:10', NULL),
(9, 1, 'Paraphrase Content', 'Looking to paraphrase your content quickly and easily? Look no further than our paraphrasing tool! Just enter your text into the box and in seconds, you\'ll have completely rewritten text that retains the original meaning.', 0, '[{\"label\":\"Which content do you want to Paraphrase? Tell us 3-4 Lines about.\",\"type\":\"textarea\",\"name\":\"which_content_do_you_want_to_paraphrase?_tell_us_3-4_lines_about.\",\"placeholder\":\"e.g.The Content rewriting tools help tp improve the clarity and quality of your writing. They can also help to ensure that you content is free of plagiarism.\"}]', 'write a paraphrased content by using #which_content_do_you_want_to_paraphrase?_tell_us_3-4_lines_about.# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:46', NULL),
(10, 1, 'Job Description Generator', 'This is a tool which can help create a stunning creative job description.', 0, '[{\"label\":\"Name of your company\",\"type\":\"input\",\"name\":\"name_of_your_company\",\"placeholder\":\"e.g.Creaitor.ai\"},{\"label\":\"tell us about your job\",\"type\":\"textarea\",\"name\":\"tell_us_about_your_job\",\"placeholder\":\"e.g.we search a marketing manager with facebook ad skills\"}]', 'Create a job description, my company name is #name_of_your_company# and  job details is #tell_us_about_your_job# in #language#', '•	Write the experience of #what_responsibilities_he_has_to_perform#\r\n•	Write the salary range of #what_responsibilities_he_has_to_perform#\r\n•	The qualification you need for #a_job_summary#\r\n•	Write down some skills of #what_responsibilities_he_has', '', 1, 1, '2023-02-21 07:33:51', '2023-03-15 11:52:33', NULL),
(11, 1, 'Resume', 'The resume Tool is here to help you get your resume. This easy-to-use tool will help you come up with ideas for what to write about.', 0, '[{\"label\":\"5 Keysentences about your personality & skills\",\"type\":\"textarea\",\"name\":\"5_keysentences_about_your_personality_&_skills\",\"placeholder\":\"e.g.creative,paid advertiser,data analyst,friendly and punctual\"},{\"label\":\"Your Name\",\"type\":\"input\",\"name\":\"your_name\",\"placeholder\":\"e.g.Thomas\"}]', 'Generate a resume, my skill is #5_keysentences_about_your_personality_&_skills# and my name is #your_name# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:14', NULL),
(12, 1, 'Interview Questions', 'Let the AI generate cool interview questions for you', 0, '[{\"label\":\"Job position & company\",\"type\":\"input\",\"name\":\"job_position_&_company\",\"placeholder\":\"e.g.marketing expert,creaitor\"},{\"label\":\"requirement of the position\",\"type\":\"textarea\",\"name\":\"requirement_of_the_position\",\"placeholder\":\"e.g.creative mindest,Them-player\"}]', 'Generate a list of interview questions for  position #job_position_&_company# and requairment is  #requirement_of_the_position# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:28', NULL),
(13, 1, 'FAQs', 'Let the AI generate cool FAQs for you', 1, '[{\"label\":\"Topic\",\"type\":\"input\",\"name\":\"topic\",\"placeholder\":\"e.g.Google Ads,AI Tools\"}]', 'Generate a list of frequently asked questions (FAQ) about  #topic# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:48', NULL),
(14, 1, 'Love letter', 'Generate a love letter for your beloved ones', 1, '[{\"label\":\"Name of your love\",\"type\":\"input\",\"name\":\"name_of_your_love\",\"placeholder\":\"e.g.Sarah\"},{\"label\":\"Tell us about your love\",\"type\":\"textarea\",\"name\":\"tell_us_about_your_love\",\"placeholder\":\"righteous,caring,tender\"}]', 'Write a love letter for me my lover name is #name_of_your_love# and  his/her details is #tell_us_about_your_love# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:56', NULL),
(15, 1, 'Answer to question', 'Get a answer for questions', 1, '[{\"label\":\"Ask the question\",\"type\":\"textarea\",\"name\":\"ask_the_question\",\"placeholder\":\"How many languages do you speak?\"}]', 'Write a love letter for #ask_the_question# using the characteristics of your love in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:17', NULL),
(16, 1, 'Conclusion', 'Get a creative conclusion that captures attention.', 0, '[{\"label\":\"Write 3-4 Sentences\",\"type\":\"textarea\",\"name\":\"write_3-4_sentences\",\"placeholder\":\"The idea of a flat earth or a disc of the earth is found as a mythological concept in many early cultures. The surface of the earth is thought of as flat and often in the shape of a disk. In educated circles, however, a model of the globe or terrestrial sphere has been valid since antiquity.\"}]', 'Write me conclusion for essay of this topics #write_3-4_sentences#in #language#.', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:02', NULL),
(17, 1, 'Song Lyrics', 'Write a creative songtext', 0, '[{\"label\":\"What is the song about? write 5-6 sentences\",\"type\":\"textarea\",\"name\":\"what_is_the_song_about?_write_5-6_sentences\",\"placeholder\":\"The song is about a boy who saw his great love again after years. He met her for the first time when he was in school.\"}]', 'Write me a Song Lyrics, the song name is #what_is_the_song_about?_write_5-6_sentences# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:33', NULL),
(18, 1, 'Food Recipe', 'this tool helps you to generate food recipes', 1, '[{\"label\":\"Name some aliments that you like\",\"type\":\"textarea\",\"name\":\"name_some_aliments_that_you_like\",\"placeholder\":\"pasta,wagyu beef & cocktail sauce\"}]', 'Write me  Food Recipe for #name_some_aliments_that_you_like# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:57', NULL),
(19, 1, 'Poems', 'this tool will help you generate creative poems that will stick in the reader\'s memory', 0, '[{\"label\":\"About what do you want to have the poem?\",\"type\":\"textarea\",\"name\":\"about_what_do_you_want_to_have_the_poem?\",\"placeholder\":\"e.g. A robot with AI which has feelings and want to discover the world.\"}]', 'Write me a poem about #about_what_do_you_want_to_have_the_poem?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:17', NULL),
(20, 1, 'Creative Letter', 'Generate a creative letter', 0, '[{\"label\":\"Tell us about the topic\",\"type\":\"textarea\",\"name\":\"tell_us_about_the_topic\",\"placeholder\":\"a battle were two world powers fight against each other\"}]', 'Write me a creative letter with unique ideas about #tell_us_about_the_topic# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:50', NULL),
(21, 1, 'Passive voice to active voice', 'This passive to active voice converter tool will help you to change a text from the passive voice to the active voice.', 0, '[{\"label\":\"Passive text\",\"type\":\"textarea\",\"name\":\"passive_text\",\"placeholder\":\"Anna painted a house.\"}]', 'Write me  active voice from passive voice #passive_text# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:15', NULL),
(22, 1, 'Active voice to passive voice', 'This active to active voice converter tool will help you to change a text from the active voice to the passive voice.', 0, '[{\"label\":\"Active text\",\"type\":\"textarea\",\"name\":\"active_text\",\"placeholder\":\"The house was painted by Anna\"}]', 'Write me passive voice from active voice #active_text# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:40', NULL),
(23, 2, 'Blog Intro', 'Looking to start a blog but not sure how to start? Use our blog intro tool to help you create a catchy and attention-grabbing intro for your first blog post!', 0, '[{\"label\":\"Write about your blog topic\",\"type\":\"textarea\",\"name\":\"write_about_your_blog_topic\",\"placeholder\":\"e.g. How AI will improve the future of content writing\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"Placeholder\"}]', 'Write me a short blog intro about #write_about_your_blog_topic#  and product or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:02', NULL),
(24, 2, 'Blog Body', 'The Blog Body Tool is here to help you get your blog up and running in no time. This easy-to-use tool will help you come up with ideas for what to write about.', 0, '[{\"label\":\"Write about your blog topic\",\"type\":\"textarea\",\"name\":\"write_about_your_blog_topic\",\"placeholder\":\"Placeholder\"},{\"label\":\"Brand \\/ Company\",\"type\":\"input\",\"name\":\"brand_\\/_company\",\"placeholder\":\"e.g. Creaitor.ai\"}]', 'Write me a brief blog body description about #write_about_your_blog_topic# and brand or company name is  #brand_/_company# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:26', NULL),
(25, 2, 'Text Summarizer', 'This is a tool which can be used to summarize a text quickly and easily. It can be used to identify the main ideas and points in a text, and to create a concise summary of the key points.', 1, '[{\"label\":\"Your Text\",\"type\":\"textarea\",\"name\":\"your_text\",\"placeholder\":\"AI writing assistant can help you generate high-quality articles, blog posts and landing pages in seconds. It knows what conerts with your audience so that they continue purchasing from or engaging towards the brand\'s social media account(s)\"}]', 'Can you give me a brief summary and overview of this topic #your_text# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:58', NULL),
(26, 2, 'Sports Report', 'Get a sports report', 1, '[{\"label\":\"Tell us some keyfacts\",\"type\":\"textarea\",\"name\":\"tell_us_some_keyfacts\",\"placeholder\":\"fc bayern played against chelsea london last week saturday. They won 3 to 0. It was a clear game\"}]', 'Give me a summary of the sports report storyline for #tell_us_some_keyfacts# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:21', NULL),
(27, 2, 'Short Story', 'Get a short story', 1, '[{\"label\":\"Tell us about the story\",\"type\":\"textarea\",\"name\":\"tell_us_about_the_story\",\"placeholder\":\"Romeo and Juliet. Who were a couple until the end of their lives...\"}]', 'Please write me a short story about #tell_us_about_the_story# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:45', NULL),
(28, 2, 'Blog Outline', 'Looking to start a blog but not sure how to start? Use our blog outline tool to help you create a outline for your first blog post!', 1, '[{\"label\":\"Write about your blog topic\",\"type\":\"textarea\",\"name\":\"write_about_your_blog_topic\",\"placeholder\":\"e.g. How AI will improve the future of content writing\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"Placeholder\"}]', 'Write me a blog outline about #write_about_your_blog_topic# and my product or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:57:07', NULL),
(29, 2, 'Blog Idea Generator', 'Looking to start a blog but not sure how to start? This template help you to generate blog ideas!', 1, '[{\"label\":\"Write about your blog topic\",\"type\":\"textarea\",\"name\":\"write_about_your_blog_topic\",\"placeholder\":\"e.g. How AI will improve the future of content writing\"},{\"label\":\"Keywords\",\"type\":\"input\",\"name\":\"keywords\",\"placeholder\":\"Online Marketing\"}]', 'Write a Blog Idea & Outline About #write_about_your_blog_topic# and #keywords# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:57:30', NULL),
(30, 2, 'Blog Conclusion', 'Get a blog conclusion that captures attention.', 1, '[{\"label\":\"Put a big length of your Blog body in\",\"type\":\"textarea\",\"name\":\"put_a_big_length_of_your_blog_body_in\",\"placeholder\":\"The idea of a flat earth or a disc of the earth is found as a mythological concept in many early cultures. The surface of the earth is thought of as flat and often in the shape of a disk. In educated circles, however, a model of the globe or terrestrial sphere has been valid since antiquity.\"}]', 'Write a blog conclusion about #put_a_big_length_of_your_blog_body_in# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:58:08', NULL),
(31, 2, 'Fictional Story Idea', 'Looking to write a story but not sure how to start? This template help you to generate story ideas!', 1, '[{\"label\":\"Write about your blog topic\",\"type\":\"textarea\",\"name\":\"write_about_your_blog_topic\",\"placeholder\":\"e.g. How AI will improve the future of content writing\"}]', 'write a short note about #write_about_your_blog_topic# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:38', NULL),
(32, 2, 'Blog Paragraph', 'This helps to easily create a paragraph on a particular topic.', 0, '[{\"label\":\"Write about your paragraph topic\",\"type\":\"textarea\",\"name\":\"write_about_your_paragraph_topic\",\"placeholder\":\"Placeholder\"},{\"label\":\"Brand \\/ Company\",\"type\":\"input\",\"name\":\"brand_\\/_company\",\"placeholder\":\"e.g. Creaitor.ai\"}]', 'Write a headline about #write_about_your_paragraph_topic#  for  #brand_/_company# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:59', NULL),
(33, 3, 'E-Mail Text', 'Looking to create the perfect email? Look no further than the Email Text Creator! This tool will help you to create email text that is clear, concise, and make sure to get your message across.', 0, '[{\"label\":\"What do you want to write?\",\"type\":\"textarea\",\"name\":\"what_do_you_want_to_write?\",\"placeholder\":\"Placeholder\"}]', 'Write a email text  about #what_do_you_want_to_write?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:20', NULL),
(34, 4, 'Facebook Ad Title', 'Use the Facebook Ads Title Text Generator tool to create the perfect title for your next Facebook ad campaign. Just enter your keyword and the tool will generate dozens of title options for you to choose from.', 0, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g. Creaitor\"}]', 'Write a short brief of faccbook ad title about #description# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:39', NULL),
(35, 4, 'Facebook Ad Text', 'If you\'re looking to create some killer Facebook ads, then you need to check out our Facebook Ad Text Tool. It\'s the perfect way to help create attention-grabbing, effective, and converting ad text.', 0, '[{\"label\":\"Describe your product \\/ service\",\"type\":\"textarea\",\"name\":\"describe_your_product_\\/_service\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of facebook ad text about #describe_your_product_/_service# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:54', NULL),
(36, 4, 'Google Ad Text', 'If you\'re looking to create some killer Google ads, then you need to check out our Google Ad Text Tool. It\'s the perfect way to help create attention-grabbing, effective, and converting ad text.', 1, '[{\"label\":\"Describe your product \\/ service\",\"type\":\"textarea\",\"name\":\"describe_your_product_\\/_service\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of google ad text about #Description# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:07', NULL),
(37, 4, 'Bing Ad Text', 'If you\'re looking to create some killer Bing Ad Text, then you need to check out our Google Ad Text Tool. It\'s the perfect way to help create attention-grabbing, effective, and converting ad text.', 1, '[{\"label\":\"Describe your product \\/ service\",\"type\":\"textarea\",\"name\":\"describe_your_product_\\/_service\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of bing ad text about #describe_your_product_/_service# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:20', NULL),
(38, 4, 'Pinterest Ad Title', 'Use the Pinterest Ad Titlee Text Generator tool to create the perfect title for your next ad campaign. Just enter your keyword and the tool will generate dozens of title options for you to choose from.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of Pinterest ad title about #description# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:34', NULL),
(39, 4, 'Yandex Ad Text', 'If you\'re looking to create some killer Yandex Ad Text, then you need to check out our Google Ad Text Tool. It\'s the perfect way to help create attention-grabbing, effective, and converting ad text.', 1, '[{\"label\":\"Descripe your product \\/ service\",\"type\":\"textarea\",\"name\":\"descripe_your_product_\\/_service\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of Yandex ad text about #descripe_your_product_/_service# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:47', NULL),
(40, 4, 'Google Ad Title', 'Use the Google Ads Title Text Generator tool to create the perfect title for your next Google ad campaign. Just enter your keyword and the tool will generate dozens of title options for you to choose from.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of google ad title about #description# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:00', NULL),
(41, 4, 'Snapchat Ad Title', 'Use the Snapchat Ads Title Text Generator tool to create the perfect title for your next Google ad campaign. Just enter your keyword and the tool will generate dozens of title options for you to choose from.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of Snapchat ad text about #description# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:14', NULL),
(42, 4, 'Taboola Ad Text', 'If you\'re looking to create some killer Taboola ads, then you need to check out our Taboola Ad Text Tool. It\'s the perfect way to help create attention-grabbing, effective, and converting ad text.', 0, '[{\"label\":\"Describe your product \\/ service\",\"type\":\"textarea\",\"name\":\"describe_your_product_\\/_service\",\"placeholder\":\"e.g. An AI powered content writing tool that helps create amazing content\"},{\"label\":\"Product \\/ Service\",\"type\":\"input\",\"name\":\"product_\\/_service\",\"placeholder\":\"e.g.Creaitor\"}]', 'Write a short brief of Taboola ad text about #describe_your_product_/_service# and the company or service is #product_/_service# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:29', NULL),
(43, 5, 'Youtube Video Title', 'Create engaging, click-worthy titles for your videos that will rank on Youtube. Just enter your keywords and the tool will generate dozens of title options for you to choose from.', 0, '[{\"label\":\"What is the video about?\",\"type\":\"textarea\",\"name\":\"what_is_the_video_about?\",\"placeholder\":\"e.g.how to build a online business\"},{\"label\":\"Keyword to rank for\",\"type\":\"input\",\"name\":\"keyword_to_rank_for\",\"placeholder\":\"e.g.Online business\"}]', 'Write a short brief of youtube video title about #what_is_the_video_about?# and the company or service is #keyword_to_rank_for# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:46', NULL),
(44, 5, 'Youtube Video Description', 'Create unique descriptions for Youtube videos that rank well in search.', 0, '[{\"label\":\"Video title?\",\"type\":\"textarea\",\"name\":\"video_title?\",\"placeholder\":\"e.g.10 tips to get rich in 2022\"},{\"label\":\"Keyword to rank for\",\"type\":\"input\",\"name\":\"keyword_to_rank_for\",\"placeholder\":\"e.g.Online business\"}]', 'Write a short brief of youtube video description about #video_title?# and the company or service is #keyword_to_rank_for# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:58', NULL),
(45, 5, 'Youtube Video topic idea', 'Brainstorm new video topics that will engage viewers and rank well on YouTube.', 0, '[{\"label\":\"What topic should the videos be about?\",\"type\":\"textarea\",\"name\":\"what_topic_should_the_videos_be_about?\",\"placeholder\":\"e.g.Making homemade cake\"},{\"label\":\"Keyword to rank\",\"type\":\"input\",\"name\":\"keyword_to_rank\",\"placeholder\":\"Cheescake\"}]', 'Generate idea for your youtube videos using #what_topic_should_the_videos_be_about?# and #keyword_to_rank# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:11', NULL),
(46, 5, 'Video Script Outline', 'Create script outlines for your videos. Works best for \"Listicle\" and \"How to\" style videos.', 0, '[{\"label\":\"Video title\\/ topic\",\"type\":\"textarea\",\"name\":\"video_title\\/_topic\",\"placeholder\":\"e.g.10 marketing trends in 2022\"}]', 'Create script outlines for your videos using #video title/topic# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:50:53', NULL),
(47, 5, 'Webinar Title ideas', 'Create engaging, click-worthy titles for your webinar videos. Just enter your keywords and the tool will generate dozens of title options for you to choose from.', 0, '[{\"label\":\"What is the webinar about?\",\"type\":\"textarea\",\"name\":\"what_is_the_webinar_about?\",\"placeholder\":\"e.g.how to build a online business\"},{\"label\":\"Keyword to rank for\",\"type\":\"input\",\"name\":\"keyword_to_rank_for\",\"placeholder\":\"e.g.Online business\"}]', 'Generate ideas for the title of your webinar videos using #what_is_the_webinar_about?# and #keyword to rank for# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:13', NULL),
(48, 6, 'Amazon Product Description', 'Create compelling product descriptions for Amazon listings.', 0, '[{\"label\":\"Key Benefits\\/ Features\",\"type\":\"textarea\",\"name\":\"key_benefits\\/_features\",\"placeholder\":\"e.g.high quality, high life time value,save time\"},{\"label\":\"Product name?\",\"type\":\"input\",\"name\":\"product_name?\",\"placeholder\":\"e.g. Creaitor\"}]', 'Create Amazon product description using #key_benefits/_features# of it and #product name?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:51:32', NULL),
(49, 6, 'Product Description', 'Create compelling product descriptions for your E-commerce.', 0, '[{\"label\":\"Key Benefits\\/ Features\",\"type\":\"textarea\",\"name\":\"key_benefits\\/_features\",\"placeholder\":\"e.g. high quality, high life time value, save time\"},{\"label\":\"Product name?\",\"type\":\"input\",\"name\":\"product_name?\",\"placeholder\":\"e.g.Creaitor\"}]', 'Generate product description using #key_benefits/_features# of it and #product name?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:00', NULL),
(50, 6, 'Shopify Product Description', 'Create compelling product descriptions.', 0, '[{\"label\":\"Key Benefits\\/ Features\",\"type\":\"textarea\",\"name\":\"key_benefits\\/_features\",\"placeholder\":\"e.g.high quality, high life time value,save time\"},{\"label\":\"Product name?\",\"type\":\"input\",\"name\":\"product_name?\",\"placeholder\":\"e.g. Creaitor\"}]', 'Create Shopify product description using #key benefits/features# of it and #product name?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:17', NULL),
(51, 6, 'Product review', 'Create compelling product review.', 1, '[{\"label\":\"Key Benefits\\/ Features\",\"type\":\"textarea\",\"name\":\"key_benefits\\/_features\",\"placeholder\":\"e.g.high quality, high life time value,save time\"},{\"label\":\"Product name?\",\"type\":\"input\",\"name\":\"product_name?\",\"placeholder\":\"e.g. Creaitor\"}]', 'Write a review of your product  using #key benefits/features# of it and #product name?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:37', NULL),
(52, 7, 'Photo Post Caption', 'Write catchy captions for your photo posts.', 1, '[{\"label\":\"What is your post about?\",\"type\":\"textarea\",\"name\":\"what_is_your_post_about?\",\"placeholder\":\"e.g.Travelling to Argentina to eat some tasty steak\"}]', 'Write captions for your photo posts by using #what_is_your_post_about?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:52:54', NULL),
(53, 7, 'Pinterest Pin Title', 'Create great Pinterest pin titles that drive engagement, traffic, and reach.', 1, '[{\"label\":\"tell us about the pin\",\"type\":\"textarea\",\"name\":\"tell_us_about_the_pin\",\"placeholder\":\"e.g.interior for couples\"},{\"label\":\"Keywords\",\"type\":\"input\",\"name\":\"keywords\",\"placeholder\":\"interior ,couples ,home\"}]', 'Write titles for the Pinterest pin by using #tell_us_about_the_pin# and #keywords# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:15', NULL),
(54, 7, 'Pinterest Description', 'Use short and catchy descriptions to help you get more engagement on your pins.', 1, '[{\"label\":\"Tell us about the pin\",\"type\":\"textarea\",\"name\":\"tell_us_about_the_pin\",\"placeholder\":\"e.g.Writing assistant that saves lot of time\"},{\"label\":\"Company name\",\"type\":\"input\",\"name\":\"company_name\",\"placeholder\":\"e.g.Creaitor\"},{\"label\":\"Keywords\",\"type\":\"input\",\"name\":\"keywords\",\"placeholder\":\"eg.write software\"}]', 'Write me a effective summary on Pinterest description about #tell_us_about_the_pin# and #company_name# and Keywords #keywords# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:53:35', NULL),
(55, 7, 'Personal Bio', 'Write a creative personal bio that captures attention.', 1, '[{\"label\":\"Personal information\",\"type\":\"textarea\",\"name\":\"personal_information\",\"placeholder\":\"Creative director of creaitor .ai.Play soccer and love reading books\"},{\"label\":\"Name\",\"type\":\"input\",\"name\":\"name\",\"placeholder\":\"Simun Funk\"}]', 'Write a short brief on personal bio about #personal_information# and #name# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:02', NULL),
(56, 7, 'Facebook Caption', 'Write creative Facebook captions.', 0, '[{\"label\":\"What is your post about?\",\"type\":\"textarea\",\"name\":\"what_is_your_post_about?\",\"placeholder\":\"undefined\"}]', 'Write me a short brief on social media caption for Facebook profile about #what_is_your_post_about?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:29', NULL),
(57, 7, 'LinkedIn Post', 'Write captions for your LinkedIn Post.', 0, '[{\"label\":\"What is your post about?\",\"type\":\"textarea\",\"name\":\"what_is_your_post_about?\",\"placeholder\":\"e.g. Travelling to germany to visit a marketing congress\"}]', 'Write a short conclusion of LinkedIn Post about #what_is_your_post_about?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:54:52', NULL),
(58, 7, 'Slack Textmessage', 'Looking to create Slack Messages? This tool will help you to create Slack text that is clear, concise, and make sure to get your message across.', 0, '[{\"label\":\"What do you want to write?\",\"type\":\"textarea\",\"name\":\"what_do_you_want_to_write?\",\"placeholder\":\"Placeholder\"}]', 'Write a short summary of Slack Message about #what_do_you_want_to_write?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:09', NULL),
(59, 7, 'LinkedIn Bio', 'Write captions for your LinkedIn bio', 1, '[{\"label\":\"Tell about your job and skills in 2-3 sentences\",\"type\":\"textarea\",\"name\":\"tell_about_your_job_and_skills_in_2-3_sentences\",\"placeholder\":\"e.g. performance marketer with a passion for SaaS projects\"}]', 'Write me a short brief of LinkedIn bio about #tell_about_your_job_and_skills_in_2-3_sentences# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:24', NULL),
(60, 7, 'Reddit post caption', 'Write catchy captions for your Reddit photo posts.', 1, '[{\"label\":\"What is your post about?\",\"type\":\"textarea\",\"name\":\"what_is_your_post_about?\",\"placeholder\":\"e.g. Travelling to Argentina to eat some tasty steak\"}]', 'Write  me a short brief of Reddit post caption about #what_is_your_post_about?# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:55:41', NULL),
(61, 7, 'TikTok Bio', 'Write captions for your TikTok bio', 1, '[{\"label\":\"Tell about your job and skills in 2-3 sentences\",\"type\":\"textarea\",\"name\":\"tell_about_your_job_and_skills_in_2-3_sentences\",\"placeholder\":\"e.g. performance marketer with a passion for SaaS projects\"}]', 'Write me a stylish Tiktok Bio about #tell_about_your_job_and_skills_in_2-3_sentences# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:00', NULL),
(62, 8, 'Business Or Product Name', 'The name of your business or product can make a world of difference. We’ll help you find the perfect one!', 1, '[{\"label\":\"Tell us about your business or product\",\"type\":\"textarea\",\"name\":\"tell_us_about_your_business_or_product\",\"placeholder\":\"e.g Marketing agency software\"}]', 'Write a business or product name, my business is #tell_us_about_your_business_or_product# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:20', NULL),
(63, 8, 'Slogan Generator', 'Generate a slogan for your company/ Business', 1, '[{\"label\":\"Tell us about your business or product\",\"type\":\"input\",\"name\":\"tell_us_about_your_business_or_product\",\"placeholder\":\"e.g. chocolate made from natural ingredients with 100% fair trade production\"}]', 'Write a Captivating Punchline for Local Business about #tell_us_about_your_business_or_product# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:38', NULL),
(64, 8, 'Pro\'s and Con\'s', 'Create pros & cons for your case.', 1, '[{\"label\":\"Product name?\",\"type\":\"input\",\"name\":\"product_name?\",\"placeholder\":\"e.g. Creator\"},{\"label\":\"Key Benefits\\/ Features\",\"type\":\"textarea\",\"name\":\"key_benefits\\/_features\",\"placeholder\":\"e.g. high quality high life time value, save time\"}]', 'write me a Pro\'s and Con\'s my product name is #product_name?# and key benefits is #key_benefits/_features# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:56:55', NULL),
(65, 9, 'PAS (Problem Agitate Solution) Framework', 'This tool helps you to get to the bottom of the problem according to the PAS (Problem Agitate Solution) framework.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"null\"}]', 'Write a Problem-Solution Copy for Online Marketing #description# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:57:13', NULL),
(66, 9, 'AIDA Framework', 'This tool helps you to get a AIDA marketing framework.', 1, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"Placeholder\"},{\"label\":\"Keywords\",\"type\":\"input\",\"name\":\"keywords\",\"placeholder\":\"Placeholder\"}]', 'Write a headline about #description# and  product or service is #keywords# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:57:30', NULL),
(67, 10, 'SEO Meta Description', 'Looking to create a Meta Description but not sure how to start? Use our tool to help you create a catchy and attention-grabbing Meta Description!', 0, '[{\"label\":\"Write about your site topic\",\"type\":\"textarea\",\"name\":\"write_about_your_site_topic\",\"placeholder\":\"e.g. How AI will improve the future of content writing\"}]', 'Write a SEO Meta Description about #write_about_your_site_topic# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:57:45', NULL),
(68, 11, 'Travel copy', 'This tool is designed to help you write compelling, interesting and useful travel copy.', 0, '[{\"label\":\"Description\",\"type\":\"textarea\",\"name\":\"description\",\"placeholder\":\"e.g we want to a nice, calm beach\"}]', 'Write me an inspiring travel copy about #description# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:58:01', NULL),
(69, 12, 'Reply to review', 'This tool helps you write answers for reviews! It is designed to make your answers more convincing, enthusiastic and exciting.', 0, '[{\"label\":\"Brand \\/ Company\",\"type\":\"input\",\"name\":\"brand_\\/_company\",\"placeholder\":\"e.g. Creaitor.ai\"},{\"label\":\"Keywords\",\"type\":\"input\",\"name\":\"keywords\",\"placeholder\":\"e.g. thank you, helpful, great, help, much, positive\"}]', 'Write me a review for #brand_/_company# about #keywords# in #language#', '', '', 1, 0, '2023-02-21 07:33:51', '2023-03-15 11:58:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `star` tinyint NOT NULL DEFAULT '5',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `star`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marek Hamsik', 'Businessman', 'ZaiwriteAI technology can be used by clients in various ways, such as integrating ZaiwriteAI-powered solutions into their business operations, using AI for data analysis and insights, or implementing chatbots or virtual assistants for customer service', 4, 1, '2023-02-22 06:44:53', '2023-02-22 11:01:03', NULL),
(2, 'Moussa Dembele', 'Teacher', 'ZaiwriteAI-powered predictive analytics can be used to anticipate client behavior and feedback. This can help businesses proactively address issues and improve their overall client experience. ZaiwriteAI algorithms can analyze customer feedback from vario', 5, 1, '2023-02-22 11:28:17', '2023-02-22 11:28:17', NULL),
(3, 'Kadeisha Buchanan', 'Businessman', 'ZaiwriteAI-powered chatbots can provide 24/7 customer service to clients, helping them resolve issues quickly and efficiently. Chatbots can be programmed to answer frequently asked questions, provide recommendations, and even personalize responses based o', 4, 1, '2023-02-22 11:37:09', '2023-02-22 11:37:09', NULL),
(4, 'Dominique Dropsy', 'Engineer', 'I had an amazing experience working with this ZaiwriteAI project team. They were professional, responsive, and really took the time to understand our needs. The ZaiwriteAI solution they developed for us exceeded our expectations, and has already helped us', 4, 1, '2023-02-22 13:16:57', '2023-02-22 13:16:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `ticket_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

DROP TABLE IF EXISTS `ticket_replies`;
CREATE TABLE `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_topics`
--

DROP TABLE IF EXISTS `ticket_topics`;
CREATE TABLE `ticket_topics` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1' COMMENT '0=deactivate,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `txn_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_time` datetime DEFAULT NULL,
  `status` enum('initiate','pending','completed','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT 'Active = 1, Deactivate = 0',
  `created_by` bigint DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '2',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `provider_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `contact_number`, `status`, `created_by`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Super', 'Admin', 'admin@gmail.com', '2023-02-21 07:33:51', '$2y$10$nr/CprMmoacTkC1PdZJXfe0CRxaZuztGDtYBemHe.ziIXIJjAdM6m', '123456789909', 1, NULL, 1, NULL, NULL, '2023-02-22 07:06:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

DROP TABLE IF EXISTS `user_favorites`;
CREATE TABLE `user_favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_favorites`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

DROP TABLE IF EXISTS `user_packages`;
CREATE TABLE `user_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `generate_characters` int NOT NULL DEFAULT '0',
  `access_use_cases` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `write_languages` int NOT NULL DEFAULT '0',
  `access_tones` int NOT NULL DEFAULT '0',
  `write_languageses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `access_toneses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `generate_images` int NOT NULL DEFAULT '0',
  `plagiarism_checker` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_community` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_use_cases` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dedicated_account` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `yearly_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `device_limit` int NOT NULL DEFAULT '1',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_trail` tinyint NOT NULL DEFAULT '0' COMMENT 'default for 1 , not default for 0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_packages`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_managers`
--
ALTER TABLE `file_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_managers_origin_type_origin_id_index` (`origin_type`,`origin_id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gateways_slug_unique` (`slug`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_name_unique` (`name`),
  ADD UNIQUE KEY `packages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `search_results`
--
ALTER TABLE `search_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_result_items`
--
ALTER TABLE `search_result_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_no_unique` (`ticket_no`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_topics`
--
ALTER TABLE `ticket_topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_topics_name_unique` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_txn_id_unique` (`txn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `file_managers`
--
ALTER TABLE `file_managers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_results`
--
ALTER TABLE `search_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=779;

--
-- AUTO_INCREMENT for table `search_result_items`
--
ALTER TABLE `search_result_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_topics`
--
ALTER TABLE `ticket_topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

