-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 09:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbf`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `image`, `mission`, `created_at`, `updated_at`) VALUES
(1, '<p>Muktir Bondhon Foundation(MBF) is a non-profit, non-political, non-government organization working to ensure the betterment of human beings by protecting the environment, creating provision of education, health, social safety, environmental safety, and gender balance in Bangladesh. With the ground belief, people are the driver of all solutions, Muktir Bondhon engages youth in conservation, disaster management, education, legal support for underprivileged people. MBF has formed in 2014 with the support of some enthusiastic people like Iqbal Hossain and others. In 2018 registered to join stock as a nonprofit organization in Bangladesh.</p>', 'VceF7POz5Ccover-image.jpg', '<p>Muktir Bondhon Foundation(MBF) is a non-profit, non-political, non-government organization working to ensure the betterment of human beings by protecting the environment, creating provision of education, health, social safety, environmental safety, and gender balance in Bangladesh. With the ground belief, people are the driver of all solutions, Muktir Bondhon engages youth in conservation, disaster management, education, legal support for underprivileged people. MBF has formed in 2014 with the support of some enthusiastic people like Iqbal Hossain and others. In 2018 registered to join stock as a nonprofit organization in Bangladesh.</p>', '2022-06-19 18:59:14', '2022-06-25 16:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `name`, `designation`, `image`, `email`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'AFZALUR RAHMAN BHUIYAN', 'Professor, Department of Bangla, Netrokona College', 'afzalur-rahman-bhuiyan-image-oEpe7.jpg', NULL, 5, '2022-06-24 19:15:58', '2022-06-24 19:19:51'),
(2, 'Bhanulal Das', 'DIG-CID, BANGLADESH POLICE', 'bhanulal-das-image-XGHLU.jpg', NULL, 4, '2022-06-24 19:17:16', '2022-06-24 19:19:51'),
(3, 'Mostaque Hassan', 'NDC, ADDITIONAL SECRETARY', 'mostaque-hassan-image-kQ3Fx.jpg', NULL, 3, '2022-06-24 19:17:57', '2022-06-24 19:19:51'),
(4, 'Zahir Uddin Ahmed', 'FORMER DEPUTY CHIEF CONSERVATOR OF FOREST', 'zahir-uddin-ahmed-image-Pmt6k.jpg', NULL, 2, '2022-06-24 19:18:44', '2022-06-24 19:19:35'),
(5, 'Tasmima Hossain', 'EDITOR OF THE DAILY ITTEFAQ', 'tasmima-hossain-image-xwOYc.jpg', NULL, 1, '2022-06-24 19:19:21', '2022-06-24 19:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `advisor_socials`
--

CREATE TABLE `advisor_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `platform_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_and_basic_infos`
--

CREATE TABLE `contact_and_basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_and_basic_infos`
--

INSERT INTO `contact_and_basic_infos` (`id`, `platform_id`, `username`, `created_at`, `updated_at`) VALUES
(11, 9, '01783674575', '2022-04-21 07:16:46', '2022-04-21 12:47:49'),
(14, 1, 'muktirbondhonfoundation', '2022-04-21 07:18:06', '2022-04-21 13:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Barguna', 1, 8700, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(2, 'Barishal', 1, 8200, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(3, 'Bhola', 1, 8300, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(4, 'Jhalokati', 1, 8400, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(5, 'Patuakhali', 1, 8600, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(6, 'Pirojpur', 1, 8500, '2021-10-17 12:11:06', '2021-10-17 12:11:06'),
(7, 'Bandarban', 2, 4600, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(8, 'Brahmanbaria', 2, 3400, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(9, 'Chandpur', 2, 3600, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(10, 'Chattogram', 2, 4000, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(11, 'Cumilla', 2, 3500, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(12, 'Cox\'s Bazar', 2, 4700, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(13, 'Feni', 2, 3900, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(14, 'Khagrachhari', 2, 4400, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(15, 'Lakshmipur', 2, 3700, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(16, 'Noakhali', 2, 3800, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(17, 'Rangamati', 2, 4500, '2021-10-17 12:19:30', '2021-10-17 12:19:30'),
(18, 'Dhaka', 3, 1000, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(19, 'Faridpur', 3, 7800, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(20, 'Gazipur', 3, 1700, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(21, 'Gopalganj', 3, 8100, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(22, 'Kishoreganj', 3, 2300, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(23, 'Madaripur', 3, 7900, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(24, 'Manikganj', 3, 1800, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(25, 'Munshiganj', 3, 1500, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(26, 'Narayanganj', 3, 1400, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(27, 'Narsingdi', 3, 1600, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(28, 'Rajbari', 3, 7700, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(29, 'Shariatpur', 3, 8000, '2021-10-17 12:27:59', '2021-10-18 12:27:59'),
(30, 'Tangail', 3, 1900, '2021-10-17 12:27:59', '2021-10-17 12:27:59'),
(31, 'Bagerhat', 4, 9300, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(32, 'Chuadanga', 4, 7200, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(33, 'Jashore', 4, 7400, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(34, 'Jhenaidah', 4, 7300, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(35, 'Khulna', 4, 9100, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(36, 'Kushtia', 4, 7000, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(37, 'Magura', 4, 7600, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(38, 'Meherpur', 4, 7100, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(39, 'Narail', 4, 7500, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(40, 'Satkhira', 4, 9400, '2021-10-17 12:39:20', '2021-10-17 12:39:20'),
(41, 'Jamalpur', 5, 2000, '2021-10-17 12:49:05', '2021-10-17 12:49:05'),
(42, 'Mymensingh', 5, 2200, '2021-10-17 12:49:05', '2021-10-17 12:49:05'),
(43, 'Netrokona', 5, 2400, '2021-10-17 12:49:05', '2021-10-17 12:49:05'),
(44, 'Sherpur', 5, 2100, '2021-10-17 12:49:05', '2021-10-17 12:49:05'),
(45, 'Bogura', 6, 5800, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(46, 'Chapai Nawabganj', 6, 6300, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(47, 'Joypurhat', 6, 5900, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(48, 'Naogaon', 6, 6500, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(49, 'Natore', 6, 6400, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(50, 'Pabna', 6, 6600, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(51, 'Rajshahi', 6, 6000, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(52, 'Sirajganj', 6, 6700, '2021-10-17 12:52:28', '2021-10-17 12:52:28'),
(53, 'Dinajpur', 7, 5200, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(54, 'Gaibandha', 7, 5700, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(55, 'Kurigram', 7, 5600, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(56, 'Lalmonirhat', 7, 5500, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(57, 'Nilphamari', 7, 5300, '2021-10-24 20:15:29', '2021-10-17 20:15:29'),
(58, 'Panchagarh', 7, 5000, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(59, 'Rangpur', 7, 5400, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(60, 'Thakurgaon', 7, 5100, '2021-10-17 20:15:29', '2021-10-17 20:15:29'),
(61, 'Habiganj', 8, 3300, '2021-10-17 20:26:47', '2021-10-17 20:26:47'),
(62, 'Moulvibazar', 8, 3200, '2021-10-17 20:26:47', '2021-10-17 20:26:47'),
(63, 'Sunamganj', 8, 3000, '2021-10-17 20:26:47', '2021-10-17 20:26:47'),
(64, 'Sylhet', 8, 3100, '2021-10-17 20:26:47', '2021-10-17 20:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', '2021-10-17 11:58:33', '2021-10-17 11:58:33'),
(2, 'Chattogram', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(3, 'Dhaka', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(4, 'Khulna', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(5, 'Mymensingh', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(6, 'Rajshahi', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(7, 'Rangpur', '2021-10-18 11:58:33', '2021-10-18 11:58:33'),
(8, 'Sylhet', '2021-10-18 11:58:33', '2021-10-18 11:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `project_id`, `title`, `slug`, `image`, `description`, `location`, `likes`, `tags`, `event_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7', 'Distribution of powdered milk among the flooded children', 'distribution-of-powdered-milk-among-the-flooded-children', 'distribution-of-powdered-milk-among-the-flooded-children19KWC.jpg', '<p>The flood victims rushed to Sunamganj as soon as they saw the truck loaded with relief vehicles. Behind the truckloads of dried food, they look for food for their children. 2-5 year old children will no longer be able to eat dry food. So our team in Sunamganj yesterday distributed high quality milk powder in the market for children.</p>', 'Sunamgonj, Sylhet', '0', 'Flood,Sylhet Flood,বন্যা,সিলেটের বন্য,সুনামগঞ্জ বন্যা,বন্যার্ত,মুক্তির বন্ধন ফাউন্ডেশন', '2022-06-22', '2022-06-24 20:36:47', '2022-09-02 17:58:25', NULL),
(2, '1', 'Muktir Bondhon Foundation\'s First Eid Festival', 'muktir-bondhon-foundations-first-eid-festival', 'muktir-bondhon-foundations-first-eid-festivalepwz1.jpg', '<p>Our rural children have been amazed by the unexpected gift! New clothes! Mehedi, lipstick, silk bangles, hair bands to dress up again !!! It&#39;s amazing !!!<br />\r\nIt is as if they are happily toggling inside the stomach !!</p>', 'Atharabari', '0', 'muktirbondhon', '2017-08-31', '2022-06-26 10:11:32', '2022-09-02 17:58:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '2' COMMENT '1 = active, 2 = inactive',
  `new_user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `logo`, `icon`, `tagline`, `admin_email`, `membership`, `new_user_role`, `timezone`, `date_format`, `time_format`, `created_at`, `updated_at`) VALUES
(1, 'Muktir Bondhon Foundation', 'muktir-bondhon-foundation-logo.png', 'muktir-bondhon-foundation-icon.png', 'We care for creation', 'anik.mbf@gmail.com', '1', 'Subscriber', 'Asia/Dhaka', 'dd/mm/yyyy', '12', '2021-09-09 14:50:19', '2022-06-24 17:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `image`, `alt_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Image-gallery6H4zy1656103317.jpg', '288493078_779731086535538_1414739795530787201_n', '2022-06-24 20:41:57', '2022-06-24 20:41:57', NULL),
(3, 'Image-galleryJTrMu1656103317.jpg', '288651604_440135040946343_3242644288655899761_n', '2022-06-24 20:41:57', '2022-06-24 20:41:57', NULL),
(4, 'Image-gallery4C6xK1656103317.jpg', '288655073_727696761837416_7084464112344587331_n', '2022-06-24 20:41:58', '2022-06-24 20:41:58', NULL),
(5, 'Image-galleryzDobK1656103318.jpg', '288663517_717081772888741_1637326417838940657_n', '2022-06-24 20:41:58', '2022-06-24 20:41:58', NULL),
(6, 'Image-gallery0SYDE1656103318.jpg', '288668431_587653202877675_7866084412478899214_n', '2022-06-24 20:41:58', '2022-06-24 20:41:58', NULL),
(7, 'Image-gallerymkpoi1656103318.jpg', '289368010_711878793472613_8742460346170553994_n', '2022-06-24 20:41:58', '2022-06-24 20:41:58', NULL),
(8, 'Image-galleryqnvg51656103318.jpg', '289450978_440816138049157_2833661336671569361_n', '2022-06-24 20:41:58', '2022-06-24 20:41:58', NULL),
(9, 'Image-galleryIQOHk1656103361.jpg', '131978536_1407929269557295_4293900323283779026_n', '2022-06-24 20:42:41', '2022-06-24 20:42:41', NULL),
(10, 'Image-galleryEEMUL1656103361.jpg', '132446453_1407929096223979_7810874552061000192_n', '2022-06-24 20:42:41', '2022-06-24 20:42:41', NULL),
(11, 'Image-gallery7zADn1656103361.jpg', '132791904_1407929026223986_1555842872223560933_n (1)', '2022-06-24 20:42:41', '2022-06-24 20:42:41', NULL),
(12, 'Image-gallerypYLph1656103361.jpg', '132791904_1407929026223986_1555842872223560933_n', '2022-06-24 20:42:41', '2022-06-24 20:42:41', NULL),
(13, 'Image-galleryZcRw81656103361.jpg', '133086449_1407929149557307_8227106978124744503_n', '2022-06-24 20:42:41', '2022-06-24 20:42:41', NULL),
(14, 'Image-galleryOYDJ91656103372.jpg', '269631488_1671019643248255_7109262574815160540_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(15, 'Image-gallerydo8cL1656103372.jpg', '269687069_1671019509914935_8076172460347254033_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(16, 'Image-galleryFEqCG1656103372.jpg', '269694980_1671019939914892_493610796851660984_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(17, 'Image-galleryL3rQO1656103372.jpg', '269786643_1671019723248247_6029304425745813521_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(18, 'Image-gallery4hZUl1656103372.jpg', '269819386_1671019416581611_3863904135459979969_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(19, 'Image-gallerysx9iN1656103372.jpg', '269845405_1671019583248261_915375744992663384_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(20, 'Image-gallery0aIVW1656103372.jpg', '269847778_1671019859914900_8627867062682863144_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(21, 'Image-galleryFIRTi1656103372.jpg', '269856369_1671019793248240_442585994588928653_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(22, 'Image-galleryahW8h1656103372.jpg', '269856735_1671019766581576_4614108425847989183_n', '2022-06-24 20:42:52', '2022-06-24 20:42:52', NULL),
(23, 'Image-galleryi6r741656103373.jpg', '269870872_1671019626581590_2648931704059153799_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(24, 'Image-galleryg2kZd1656103373.jpg', '269958174_1671019779914908_2294685567179960554_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(25, 'Image-galleryd83q31656103373.jpg', '270009614_1671019453248274_8304057536885317116_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(26, 'Image-gallery3J8Sy1656103373.jpg', '270065874_1671019549914931_7915631543754387670_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(27, 'Image-galleryqoqH01656103373.jpg', '270110504_1671019899914896_6695685425906796583_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(28, 'Image-galleryrWvjK1656103373.jpg', '270128586_1671019693248250_1087489013977494005_n', '2022-06-24 20:42:53', '2022-06-24 20:42:53', NULL),
(29, 'Image-gallery9NcaD1656103386.jpg', '21167116_534893553527542_5574225427015884046_o', '2022-06-24 20:43:06', '2022-06-24 20:43:06', NULL),
(30, 'Image-galleryr68Fo1656103386.jpg', '21192856_535560733460824_7052768308411589151_n', '2022-06-24 20:43:06', '2022-06-24 20:43:06', NULL),
(31, 'Image-galleryFia4B1656103386.jpg', '21231136_535560740127490_1891709072922036118_n', '2022-06-24 20:43:06', '2022-06-24 20:43:06', NULL),
(32, 'Image-galleryRLfB01656103386.jpg', '21232001_535560730127491_8868263868166797545_n', '2022-06-24 20:43:06', '2022-06-24 20:43:06', NULL),
(33, 'Image-galleryyAzaJ1656103399.jpg', '35329301_679271715756391_4710426496223674368_n', '2022-06-24 20:43:19', '2022-06-24 20:43:19', NULL),
(34, 'Image-galleryjRNkZ1656103399.jpg', '39467265_747911695559059_2748619017483714560_n', '2022-06-24 20:43:19', '2022-06-24 20:43:19', NULL),
(35, 'Image-gallery1Kv051656103399.jpg', '39496776_747910352225860_2841109338611777536_n', '2022-06-24 20:43:19', '2022-06-24 20:43:19', NULL),
(36, 'Image-galleryUaaGB1656103399.jpg', '39568653_747911722225723_7260904035094364160_n', '2022-06-24 20:43:19', '2022-06-24 20:43:19', NULL),
(37, 'Image-galleryFeal61656103409.jpg', '67842492_974776416205918_2877457977550307328_n', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(38, 'Image-galleryZ6d8I1656103409.jpg', '67879781_977069649309928_5015874618875969536_n', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(39, 'Image-galleryGatQ11656103409.jpg', '68303362_974776489539244_7074886729466904576_n', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(40, 'Image-gallery7iMPW1656103409.jpg', '68308874_974776302872596_8787958568897740800_n (1)', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(41, 'Image-galleryIL6Qw1656103409.jpg', '68308874_974776302872596_8787958568897740800_n (2)', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(42, 'Image-galleryyusRi1656103409.jpg', '68308874_974776302872596_8787958568897740800_n', '2022-06-24 20:43:29', '2022-06-24 20:43:29', NULL),
(43, 'Image-galleryAAmfB1656103421.jpg', '97969503_1223230031360554_2600398338889089024_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(44, 'Image-galleryiGoeo1656103421.jpg', '98033194_1223978594619031_1429270515159138304_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(45, 'Image-gallerysf7qN1656103421.jpg', '98149897_1224790541204503_131883254360834048_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(46, 'Image-galleryYLg401656103421.jpg', '98197316_1223978627952361_357582608944594944_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(47, 'Image-galleryaJjUG1656103421.jpg', '98205631_1223978497952374_5986589351495073792_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(48, 'Image-galleryISOET1656103421.jpg', '98209737_1223230061360551_3898581208019238912_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(49, 'Image-galleryYER4P1656103421.jpg', '98346538_1224790457871178_1769776823761108992_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(50, 'Image-galleryEsv3L1656103421.jpg', '98364852_1223978557952368_8697791661868056576_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(51, 'Image-galleryFQbr31656103421.jpg', '98593894_1224790517871172_7290307424152453120_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(52, 'Image-gallery7Tot71656103421.jpg', '99010807_1223230001360557_462703239184252928_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(53, 'Image-gallery1KsG71656103421.jpg', '99123219_1223230084693882_6284869684831453184_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(54, 'Image-galleryEA7mZ1656103421.jpg', '99238440_1224790497871174_4827180646679969792_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(55, 'Image-galleryXOguv1656103421.jpg', '110211330_1275404319476458_723809125955718118_n', '2022-06-24 20:43:41', '2022-06-24 20:43:41', NULL),
(56, 'Image-gallery2mtZ41656103445.jpg', '181351994_1504589306557957_9112371066856146792_n', '2022-06-24 20:44:05', '2022-06-24 20:44:05', NULL),
(57, 'Image-galleryA3FmI1656103445.jpg', '181466980_1504362193247335_3707101068562080761_n', '2022-06-24 20:44:05', '2022-06-24 20:44:05', NULL),
(58, 'Image-gallerym2Zrt1656103445.jpg', '181483519_1504362133247341_701509935528888754_n', '2022-06-24 20:44:05', '2022-06-24 20:44:05', NULL),
(59, 'Image-gallerySSLQS1656103445.jpg', '182418402_1504589523224602_1075451351099208670_n', '2022-06-24 20:44:05', '2022-06-24 20:44:05', NULL),
(60, 'Image-galleryuU1bD1656103445.jpg', '182510968_1505240599826161_5033427708723561933_n', '2022-06-24 20:44:05', '2022-06-24 20:44:05', NULL),
(61, 'Image-galleryHI3Cw1656103445.jpg', '182539970_1504589439891277_5221891497858793511_n', '2022-06-24 20:44:06', '2022-06-24 20:44:06', NULL),
(62, 'Image-galleryVSloP1656103446.jpg', '182994128_1504362023247352_8855509014806626303_n', '2022-06-24 20:44:06', '2022-06-24 20:44:06', NULL),
(63, 'Image-galleryM8Igg1656103446.jpg', '183316533_1504361893247365_108864007123773877_n', '2022-06-24 20:44:06', '2022-06-24 20:44:06', NULL),
(64, 'Image-galleryn3lV21656103446.jpg', '183557729_1505240566492831_7891431910528254189_n', '2022-06-24 20:44:06', '2022-06-24 20:44:06', NULL),
(65, 'Image-galleryFVmKw1656103446.jpg', '183740942_1505241933159361_1225703808048030835_n', '2022-06-24 20:44:06', '2022-06-24 20:44:06', NULL),
(66, 'Image-galleryegx761656103455.jpg', '184786598_1504589206557967_3278192590765701944_n', '2022-06-24 20:44:15', '2022-06-24 20:44:15', NULL),
(67, 'Image-gallerydHMdT1656103455.jpg', '184921012_1505240466492841_3760361342032522158_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(68, 'Image-galleryAzkDv1656103456.jpg', '185217323_1505805646436323_6274231407299201907_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(69, 'Image-galleryERQub1656103456.jpg', '185416230_1510014849348736_6632334405218409389_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(70, 'Image-gallery0NUcP1656103456.jpg', '185557017_1505804946436393_366766975379007086_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(71, 'Image-gallerymF4571656103456.jpg', '186178307_1505805213103033_913532996008364863_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(72, 'Image-galleryZ2sJh1656103456.jpg', '186448983_1510014776015410_1955285032380980452_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(73, 'Image-galleryu7ekE1656103456.jpg', '186455971_1505804896436398_1766644355651029506_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(74, 'Image-galleryj2Qg01656103456.jpg', '186558205_1512393895777498_7679719064855988562_n', '2022-06-24 20:44:16', '2022-06-24 20:44:16', NULL),
(75, 'Image-gallery2fJpS1656103456.jpg', '186982528_1510014862682068_6190266385694292594_n', '2022-06-24 20:44:17', '2022-06-24 20:44:17', NULL),
(76, 'Image-galleryGNUVH1656103457.jpg', '187558565_1512394065777481_6901359056810677866_n', '2022-06-24 20:44:17', '2022-06-24 20:44:17', NULL),
(77, 'Image-gallerySOaQt1656103467.jpg', '277418519_1393138951117077_4867865510918293289_n', '2022-06-24 20:44:27', '2022-06-24 20:44:27', NULL),
(78, 'Image-galleryGkTeR1656103467.jpg', '277596168_1026434944976943_6067567503403352749_n', '2022-06-24 20:44:27', '2022-06-24 20:44:27', NULL),
(79, 'Image-galleryz276A1656103467.jpg', '277833426_722661085411658_4483021013516151660_n', '2022-06-24 20:44:27', '2022-06-24 20:44:27', NULL),
(80, 'Image-galleryKu7O51656103468.jpg', '278133708_1405722406543036_7616899434226994436_n', '2022-06-24 20:44:28', '2022-06-24 20:44:28', NULL),
(81, 'Image-galleryZtdH31656103468.jpg', '278649457_5118629194888641_7667082824856624611_n', '2022-06-24 20:44:28', '2022-06-24 20:44:28', NULL),
(82, 'Image-galleryhUaQo1656103468.jpg', '278834192_980289119294192_6900940852527726022_n', '2022-06-24 20:44:28', '2022-06-24 20:44:28', NULL),
(83, 'Image-galleryEmSGo1656103468.jpg', '278928675_717522982940078_6311386794981613502_n', '2022-06-24 20:44:28', '2022-06-24 20:44:28', NULL),
(84, 'Image-galleryT0zvW1656103483.jpg', '75303687_1065715803778645_8934674213642436608_n (1)', '2022-06-24 20:44:43', '2022-06-24 20:44:43', NULL),
(85, 'Image-galleryQtP0h1656103484.jpg', '75303687_1065715803778645_8934674213642436608_n', '2022-06-24 20:44:44', '2022-06-24 20:44:44', NULL),
(86, 'Image-gallery9pac31656103484.jpg', '75513487_1065715677111991_8065270866113462272_n', '2022-06-24 20:44:44', '2022-06-24 20:44:44', NULL),
(87, 'Image-gallerySMLEK1656103484.jpg', '75636091_1065715623778663_3343757019189346304_n', '2022-06-24 20:44:44', '2022-06-24 20:44:44', NULL),
(88, 'Image-gallerydMjj61656103484.jpg', '78310283_1065715760445316_3703841223245561856_n', '2022-06-24 20:44:44', '2022-06-24 20:44:44', NULL),
(89, 'Image-galleryAGAtX1656103495.jpg', '56119931_884031345280426_5504080003769303040_n', '2022-06-24 20:44:55', '2022-06-24 20:44:55', NULL),
(90, 'Image-galleryntwwP1656103510.jpg', '138310778_1426071634409725_3354660392585746728_n', '2022-06-24 20:45:10', '2022-06-24 20:45:10', NULL),
(91, 'Image-gallery0UNlf1656103510.jpg', '138374828_1426125637737658_4028520061456054976_n', '2022-06-24 20:45:10', '2022-06-24 20:45:10', NULL),
(92, 'Image-galleryt7HGO1656103510.jpg', '138641672_1426071614409727_6421452917251548974_n', '2022-06-24 20:45:11', '2022-06-24 20:45:11', NULL),
(93, 'Image-galleryRY9Bo1656103511.jpg', '139267228_1426125774404311_213228042621898062_n', '2022-06-24 20:45:11', '2022-06-24 20:45:11', NULL),
(94, 'Image-gallerypWVn61656103520.jpg', '192225344_1528074687542752_4612680187798913052_n', '2022-06-24 20:45:20', '2022-06-24 20:45:20', NULL),
(95, 'Image-galleryBmzml1656103520.jpg', '192460247_1528074807542740_5753100357016120963_n', '2022-06-24 20:45:20', '2022-06-24 20:45:20', NULL),
(96, 'Image-galleryOCg3E1656103520.jpg', '193544665_1528074750876079_2582897141835506275_n', '2022-06-24 20:45:20', '2022-06-24 20:45:20', NULL),
(97, 'Image-galleryV5gbo1656103520.jpg', '236708036_1574447832905437_4668387233471343241_n', '2022-06-24 20:45:20', '2022-06-24 20:45:20', NULL),
(98, 'Image-galleryEewOF1656103520.jpg', '237455910_1574447679572119_469829430301966915_n', '2022-06-24 20:45:20', '2022-06-24 20:45:20', NULL),
(99, 'Image-galleryCBLam1656103520.jpg', '237858788_1574447769572110_3243675635815878638_n', '2022-06-24 20:45:21', '2022-06-24 20:45:21', NULL),
(100, 'Image-gallerycffgC1656103521.jpg', '238147751_1574447639572123_6333246078784203857_n', '2022-06-24 20:45:21', '2022-06-24 20:45:21', NULL),
(101, 'Image-galleryPcZqZ1656103534.jpg', '275808186_1732543820429170_6330830846941881653_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(102, 'Image-galleryAZEHA1656103534.jpg', '276060682_1732543997095819_2373811308556490033_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(103, 'Image-galleryFUL8R1656103534.jpg', '276194169_1732543903762495_5627940114705871369_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(104, 'Image-galleryH3Hed1656103534.jpg', '276322064_1732543967095822_8360066550601832685_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(105, 'Image-gallery9LNmU1656103534.jpg', '276995700_1732543500429202_5887502135893459847_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(106, 'Image-galleryyzYK11656103534.jpg', '276997484_1732543460429206_8692991283283987597_n', '2022-06-24 20:45:34', '2022-06-24 20:45:34', NULL),
(107, 'Image-galleryAzhOB1656103544.jpg', '275108967_1719561091727443_2476355955148468798_n', '2022-06-24 20:45:44', '2022-06-24 20:45:44', NULL),
(108, 'Image-galleryowZVZ1656103544.jpg', '275109487_1719561128394106_286404026379189351_n', '2022-06-24 20:45:44', '2022-06-24 20:45:44', NULL),
(109, 'Image-galleryAHQqS1656103544.jpg', '275121778_1719561011727451_7371177653188164905_n', '2022-06-24 20:45:44', '2022-06-24 20:45:44', NULL),
(110, 'Image-galleryh3CZz1656103544.jpg', '275154195_1719561055060780_4111596997021236590_n', '2022-06-24 20:45:44', '2022-06-24 20:45:44', NULL),
(111, 'Image-galleryfum4c1656103561.jpg', '280466817_572054274278571_3413230784600232601_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(112, 'Image-galleryhsPWR1656103561.jpg', '280593361_1088794275183761_5236132879420609925_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(113, 'Image-gallerya1Yh91656103561.jpg', '280635438_3333905786852814_4275481866562417610_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(114, 'Image-galleryXFlbu1656103561.jpg', '280717344_3239664336271183_4571602149884137360_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(115, 'Image-galleryMGDWX1656103561.jpg', '280741788_416461266705499_2846642191267545106_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(116, 'Image-gallery9Yrrb1656103561.jpg', '281278151_410054330756860_1706407985592206151_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(117, 'Image-galleryvFdfs1656103561.jpg', '281329457_561923192161396_7783743276712481490_n', '2022-06-24 20:46:01', '2022-06-24 20:46:01', NULL),
(118, 'Image-galleryEjm6G1656103582.jpg', 'Untitled-6-samakal-5f947f65131d9', '2022-06-24 20:46:22', '2022-06-24 20:46:22', NULL),
(119, 'Image-galleryTO7Ph1656103597.jpg', '245745136_1618404915176395_8213299677461749665_n', '2022-06-24 20:46:37', '2022-06-24 20:46:37', NULL),
(120, 'Image-gallerymIcQj1656103597.jpg', '245773331_1618404791843074_3902357064278626306_n', '2022-06-24 20:46:37', '2022-06-24 20:46:37', NULL),
(121, 'Image-galleryTSG3o1656103597.jpg', '245806635_1618404745176412_4745018603784400392_n', '2022-06-24 20:46:37', '2022-06-24 20:46:37', NULL),
(122, 'Image-galleryIe4Rw1656103597.jpg', '245924213_1618404861843067_115437629252235207_n', '2022-06-24 20:46:37', '2022-06-24 20:46:37', NULL),
(123, 'Image-galleryCSmlZ1656103614.jpg', 'FB_IMG_1595175006973', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(124, 'Image-gallery0UbLj1656103614.jpg', 'FB_IMG_1595175013628', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(125, 'Image-galleryCkTrS1656103614.jpg', 'FB_IMG_1595175017547', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(126, 'Image-galleryjnNRM1656103614.jpg', 'FB_IMG_1595175021616', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(127, 'Image-gallerybQ3kW1656103614.jpg', 'FB_IMG_1595175037211', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(128, 'Image-gallerysQ4CC1656103614.jpg', 'FB_IMG_1595175046459 - Copy', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(129, 'Image-gallerynmIGg1656103614.jpg', 'FB_IMG_1595175046459', '2022-06-24 20:46:54', '2022-06-24 20:46:54', NULL),
(130, 'Image-galleryAX7QE1656103623.jpg', 'FB_IMG_1595175119752', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(131, 'Image-gallerywfNMQ1656103623.jpg', 'FB_IMG_1595175122787', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(132, 'Image-galleryA3nAm1656103623.jpg', 'FB_IMG_1595175125479', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(133, 'Image-galleryIeCTs1656103623.jpg', 'FB_IMG_1595175127970', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(134, 'Image-gallery8IOBO1656103623.jpg', 'FB_IMG_1595175137064', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(135, 'Image-galleryvI32a1656103623.jpg', 'FB_IMG_1595175143014', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(136, 'Image-gallery9xqms1656103623.jpg', 'FB_IMG_1595175158614', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(137, 'Image-gallery350Jw1656103623.jpg', 'FB_IMG_1595175165005', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(138, 'Image-gallerypgkXa1656103623.jpg', 'FB_IMG_1595175168720', '2022-06-24 20:47:03', '2022-06-24 20:47:03', NULL),
(139, 'Image-galleryGQb8G1656103643.jpg', 'FB_IMG_1595173928919', '2022-06-24 20:47:23', '2022-06-24 20:47:23', NULL),
(140, 'Image-galleryoprlb1656103656.jpg', '172129329_1486266061723615_7234188694535550322_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(141, 'Image-galleryfEUQJ1656103656.jpg', '173860172_1486265975056957_2716262292642081039_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(142, 'Image-gallerynFlqv1656103656.jpg', '173992003_1486265878390300_2377954505759963922_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(143, 'Image-galleryRaTgr1656103656.jpg', '178513355_1500917463591808_1471363934864714935_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(144, 'Image-galleryVNxMQ1656103656.jpg', '181720074_1500917393591815_8742392004755049371_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(145, 'Image-galleryKgtO71656103656.jpg', '181755622_1500917426925145_2896109951473631298_n', '2022-06-24 20:47:36', '2022-06-24 20:47:36', NULL),
(146, 'Image-galleryRTalB1656103687.jpg', '277531693_1741913152825570_8810724568932182471_n', '2022-06-24 20:48:07', '2022-06-24 20:48:07', NULL),
(147, 'Image-gallery93Bre1656103687.jpg', '277582435_1741913296158889_4255475766419745983_n', '2022-06-24 20:48:07', '2022-06-24 20:48:07', NULL),
(148, 'Image-gallery97srX1656103687.jpg', '277588651_1741913389492213_1519015491835247952_n', '2022-06-24 20:48:07', '2022-06-24 20:48:07', NULL),
(149, 'Image-galleryoMpgs1656103687.jpg', '277672235_1741913459492206_2768041130442687482_n', '2022-06-24 20:48:07', '2022-06-24 20:48:07', NULL),
(150, 'Image-galleryF8jac1656103687.jpg', 'free-haat-for-ramadan', '2022-06-24 20:48:07', '2022-06-24 20:48:07', NULL),
(151, 'Image-galleryyAbK31656103703.jpg', '130695252_1396934770656745_6819286275584537734_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(152, 'Image-galleryUpr3u1656103703.jpg', '130751360_1401003186916570_2553098538201324081_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(153, 'Image-galleryfjVvl1656103703.jpg', '131011238_1401003290249893_4317303486941890227_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(154, 'Image-gallery20iBp1656103703.jpg', '131059552_1396934713990084_4508289833094939195_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(155, 'Image-galleryibtyr1656103703.jpg', '131115545_1401003266916562_8787167623699689016_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(156, 'Image-galleryRpvik1656103703.jpg', '131378348_1403999923283563_7500072169861244649_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(157, 'Image-galleryxyIv51656103703.jpg', '131418445_1403999989950223_2355277057412527977_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(158, 'Image-gallery3xxy81656103703.jpg', '131419086_1401676996849189_3961491120217651778_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(159, 'Image-galleryCADrp1656103703.jpg', '131444053_1401003233583232_3280785480755196342_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(160, 'Image-galleryygOnp1656103703.jpg', '131625553_1403999759950246_4329168246106599345_n', '2022-06-24 20:48:23', '2022-06-24 20:48:23', NULL),
(161, 'Image-galleryCFQVa1656103717.jpg', '262916928_1653820908301462_7410437354268750580_n', '2022-06-24 20:48:37', '2022-06-24 20:48:37', NULL),
(162, 'Image-gallerymZfXt1656103717.jpg', '265238161_1658932007790352_7448960431376656588_n', '2022-06-24 20:48:37', '2022-06-24 20:48:37', NULL),
(163, 'Image-gallerydoVXR1656103717.jpg', '265312223_1658932254456994_3345702672040712086_n', '2022-06-24 20:48:37', '2022-06-24 20:48:37', NULL),
(164, 'Image-galleryFOc0x1656103717.jpg', '265554641_1658933441123542_7606724196665352242_n', '2022-06-24 20:48:37', '2022-06-24 20:48:37', NULL),
(165, 'Image-galleryIviD71656103717.jpg', '267728465_1665231970493689_5297783659321458159_n', '2022-06-24 20:48:38', '2022-06-24 20:48:38', NULL),
(166, 'Image-galleryxuZU81656103718.jpg', '269378920_1665231973827022_7212187968748075851_n', '2022-06-24 20:48:38', '2022-06-24 20:48:38', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_09_08_180536_create_general_settings_table', 2),
(6, '2021_09_10_133050_create_permission_tables', 3),
(7, '2021_09_23_220922_create_social_platforms_table', 4),
(8, '2021_09_23_212413_create_contact_and_basic_infos_table', 5),
(9, '2022_04_23_231627_create_abouts_table', 6),
(10, '2022_04_25_002739_create_advisors_table', 6),
(11, '2022_04_26_121523_create_advisor_socials_table', 6),
(12, '2022_05_09_233532_create_offcial_teams_table', 6),
(13, '2022_05_10_200900_create_official_team_socials_table', 6),
(14, '2022_05_11_115234_add_priority_to_advisors', 6),
(15, '2022_05_11_141402_add_priority_to_offcial_teams', 6),
(16, '2022_05_12_115955_create_sliders_table', 6),
(17, '2022_05_15_234609_create_projects_table', 6),
(18, '2022_05_17_020612_create_project_image_galleries_table', 6),
(19, '2022_05_24_124458_create_events_table', 6),
(20, '2022_05_30_224024_create_image_galleries_table', 6),
(21, '2022_06_01_221736_create_publications_table', 6),
(23, '2022_06_19_181121_create_divisions_table', 6),
(24, '2022_06_19_181442_create_districts_table', 6),
(25, '2022_06_19_181818_create_thanas_table', 6),
(26, '2022_06_19_235041_create_countries_table', 6),
(28, '2022_06_19_010708_create_volunteers_table', 7),
(30, '2022_10_27_230036_create_term_conditions_table', 8);

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
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offcial_teams`
--

CREATE TABLE `offcial_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offcial_teams`
--

INSERT INTO `offcial_teams` (`id`, `name`, `designation`, `image`, `email`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Md. Iqbal Hossain Hira', 'CHAIRMAN', 'md-iqbal-hossain-hira-image-kPx4x.png', 'cman@muktirbondhon.org', 1, '2022-06-24 19:23:47', '2022-06-24 19:23:47'),
(2, 'Sultana Pervin', 'Executive Director', 'sultana-pervin-image-KiPqj.jpg', 'director@muktirbondhon.org', 2, '2022-06-24 19:26:03', '2022-06-24 19:26:03'),
(3, 'Mrinal Chowdhury', 'Manager (Administration)', 'mrinal-chowdhury-image-UzwjS.jpg', 'manager.admin@muktirbondhon.org', 3, '2022-06-24 19:29:40', '2022-06-24 19:29:40'),
(4, 'Azharul Islam Palash', 'CO-ORDINATOR', 'azharul-islam-palash-image-wW5lo.jpg', 'palash@muktirbondhon.org', 5, '2022-06-24 19:30:35', '2022-06-24 19:33:22'),
(5, 'Alal Uddin', 'Manager (operation)', 'alal-uddin-image-JkIMO.jpeg', NULL, 4, '2022-06-24 19:33:07', '2022-06-24 19:33:22'),
(6, 'Anik Kumar Nandi', 'Program Officer', 'anik-kumar-nandi-image-nSlvP.jpg', 'anik@muktirbondhon.org', 6, '2022-06-24 19:38:06', '2022-06-24 19:38:06'),
(7, 'Md. Habibul Basar Sumon', 'OFFICE SECRETARY', 'md-habibul-basar-sumon-image-JtelM.jpg', 'sumonmasum85@gmail.com', 7, '2022-06-24 19:41:49', '2022-06-24 19:41:49'),
(8, 'Atikur Rahman Shohag', 'GRAPHIC DESIGNER', 'atikur-rahman-shohag-image-5cjOZ.jpg', 'shohag@muktirbondhon.org', 8, '2022-06-24 19:45:58', '2022-06-24 19:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `official_team_socials`
--

CREATE TABLE `official_team_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `official_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `platform_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `official_team_socials`
--

INSERT INTO `official_team_socials` (`id`, `official_team_id`, `platform_id`, `username`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'profile.php?id=100004742054702', '2022-06-24 19:23:47', '2022-06-24 19:23:47'),
(2, 2, 1, 'profile.php?id=100005407454690', '2022-06-24 19:26:03', '2022-06-24 19:26:03'),
(3, 3, 1, 'mrinal.chowdhury.7', '2022-06-24 19:29:40', '2022-06-24 19:29:40'),
(4, 4, 1, 'azahrulislam.palash', '2022-06-24 19:30:35', '2022-06-24 19:30:35'),
(5, 6, 1, 'anik.web.developer', '2022-06-24 19:38:06', '2022-06-24 19:38:06'),
(6, 6, 6, 'anik_kumar_nandi/?hl=en', '2022-06-24 19:38:06', '2022-06-24 19:38:06'),
(7, 6, 3, 'AnikKumarNandi1', '2022-06-24 19:38:06', '2022-06-24 19:38:06'),
(8, 6, 9, '01783674575', '2022-06-24 19:38:06', '2022-06-24 19:38:06'),
(9, 6, 4, 'in/anik-kumar-nandi-9b645319a/', '2022-06-24 19:39:30', '2022-06-24 19:39:30'),
(10, 7, 1, 'mdhabibul.basar.3551', '2022-06-24 19:41:49', '2022-06-24 19:41:49'),
(11, 8, 1, 'Shohag.smile', '2022-06-24 19:45:58', '2022-06-24 19:45:58'),
(12, 5, 1, 'alal.uddin.10441', '2022-06-24 19:47:07', '2022-06-24 19:47:07');

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
('surjo.nondi.sn@gmail.com', '$2y$10$jKborIi5hFZ6eLszFZ.CD.DNGuL31NQmKmFrN7AUnUl0UuChbGdXG', '2022-06-24 14:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'general settings', 'web', '2021-09-10 09:06:34', '2021-09-10 09:06:34'),
(2, 'role management', 'web', '2021-09-15 08:11:05', '2021-09-15 08:11:05'),
(3, 'visit website', 'web', '2021-09-15 10:20:03', '2021-09-15 10:20:03'),
(4, 'contact and basic info', 'web', '2021-09-23 15:21:58', '2021-09-23 15:21:58'),
(5, 'project management', 'web', '2022-06-19 19:09:14', '2022-06-19 19:09:14'),
(6, 'slider management', 'web', '2022-06-19 19:09:14', '2022-06-19 19:09:14'),
(7, 'event management', 'web', '2022-06-19 19:09:14', '2022-06-19 19:09:14'),
(8, 'team management', 'web', '2022-06-19 19:09:14', '2022-06-19 19:09:14'),
(9, 'volunteers management', 'web', '2022-06-23 16:09:44', '2022-06-23 16:09:44'),
(10, 'media management', 'web', '2022-06-23 16:09:44', '2022-06-23 16:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `featured_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ramdan\'s Free Haat', 'ramdans-free-haat', '<p>Ramdan&#39;s Free Haat</p>', 'ramdans-free-haat-image-Pn9Iu.jpg', '2022-06-24 20:06:14', '2022-06-24 20:23:43', NULL),
(2, 'Eid\'s Free Haat', 'eids-free-haat', '<p>Eid&#39;s Free Haat</p>', 'eids-free-haat-image-mJT4j.jpg', '2022-06-24 20:07:35', '2022-06-24 20:20:17', NULL),
(3, 'Puja\'s Free Haat', 'pujas-free-haat', '<p>Puja&#39;s Free Haat</p>', 'pujas-free-haat-image-sQGs0.jpg', '2022-06-24 20:08:32', '2022-06-24 20:22:45', NULL),
(4, 'Ushnotar Free Haat', 'ushnotar-free-haat', '<p>Ushnotar Free Haat</p>', 'ushnotar-free-haat-image-QWrm0.jpg', '2022-06-24 20:09:18', '2022-06-24 20:26:58', NULL),
(5, 'Star Sunday Free Haat', 'star-sunday-free-haat', '<p>Star Sunday Free Haat</p>', 'star-sunday-free-haat-image-pprqL.jpg', '2022-06-24 20:10:41', '2022-06-24 20:25:56', NULL),
(6, 'Wildlife and Biodiversity conservation and public awareness', 'wildlife-and-biodiversity-conservation-and-public-awareness', '<p>Wildlife and Biodiversity conservation and public awareness</p>', 'wildlife-and-biodiversity-conservation-and-public-awareness-image-rPLD8.jpg', '2022-06-24 20:13:04', '2022-06-24 20:27:41', NULL),
(7, 'Relief activities', 'relief-activities', '<p>Relief activities</p>', 'relief-activities-image-GVMp8.jpg', '2022-06-24 20:16:28', '2022-06-24 20:25:01', NULL),
(8, 'Fruit Festival', 'fruit-festival', '<p>Fruit Festival</p>', 'fruit-festival-image-7LOef.jpg', '2022-06-24 20:17:24', '2022-06-24 20:21:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_image_galleries`
--

CREATE TABLE `project_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2021-09-10 09:29:15', '2021-09-10 09:29:15'),
(2, 'Editor', 'web', '2021-09-10 15:52:10', '2021-09-10 15:52:10'),
(3, 'Content Manager', 'web', '2021-09-10 16:06:36', '2021-09-10 16:06:36'),
(4, 'Customer', 'web', '2021-09-15 07:30:38', '2021-09-15 07:30:38'),
(5, 'Subscriber', 'web', '2021-09-15 10:20:22', '2021-09-15 10:20:22'),
(6, 'Hello', 'web', '2021-09-15 12:15:30', '2021-09-15 12:15:30'),
(7, 'Contributor', 'web', '2021-09-15 16:11:13', '2021-09-15 16:11:13');

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
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(3, 5),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `align` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `button_name`, `button_link`, `align`, `priority`, `created_at`, `updated_at`) VALUES
(15, 'Ramdan\'s Free Haat', 'We care for Creation', 'ramdans-free-haat-slider-LnphY.jpg', 'See More', 'http://muktirbondhon.org/project/ramdans-free-haat', 'left', 1, '2022-06-25 19:36:41', '2022-06-25 19:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_platforms`
--

CREATE TABLE `social_platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_platforms`
--

INSERT INTO `social_platforms` (`id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'fab fa-facebook', 'facebook.com', '2021-09-23 16:16:01', NULL),
(2, 'youtube', 'fab fa-youtube', 'youtube.com', '2021-09-23 16:16:01', NULL),
(3, 'twitter', 'fab fa-twitter', 'twitter.com', '2021-09-23 16:20:00', NULL),
(4, 'linkedin', 'fab fa-linkedin', 'linkedin.com', '2021-09-23 16:20:00', NULL),
(5, 'behance', 'fab fa-behance', 'behance.com', '0000-00-00 00:00:00', NULL),
(6, 'instagram', 'fab fa-instagram', 'instagram.com', '2021-09-23 16:23:07', NULL),
(7, 'tumblr', 'fab fa-tumblr-square', 'tumblr.com', '2021-09-23 16:28:05', NULL),
(8, 'pinterest', 'fab fa-pinterest', 'pinterest.com', '2021-09-23 16:32:39', NULL),
(9, 'whatsapp', 'fab fa-whatsapp', '', '2021-09-23 16:35:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_conditions`
--

CREATE TABLE `term_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_conditions`
--

INSERT INTO `term_conditions` (`id`, `term`, `description`, `created_at`, `updated_at`) VALUES
(1, 'What do you mean by item and end product?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis, accusantium a laboriosam cumque consequatur voluptates fuga assumenda corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam, culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam quaerat iusto obcaecati doloremque, dolor praesentium a!\r\n\r\nVestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Ut tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit at lacus blandit, commodo iaculis justo viverra. Etiam vitae est arcu. Mauris vel congue dolor. Aliquam eget mi mi. Fusce quam tortor, commodo ac dui quis, bibendum viverra erat. Maecenas mattis lectus enim, quis tincidunt dui molestie euismod. Curabitur et diam tristique, accumsan nunc eu, hendrerit tellus.', '2022-10-27 19:17:18', '2022-10-27 19:17:18'),
(2, 'What are some examples of permitted end products?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis, accusantium a laboriosam cumque consequatur voluptates fuga assumenda corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam, culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam quaerat iusto obcaecati doloremque, dolor praesentium a!\r\n\r\nVestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Ut tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit at lacus blandit, commodo iaculis justo viverra. Etiam vitae est arcu. Mauris vel congue dolor. Aliquam eget mi mi. Fusce quam tortor, commodo ac dui quis, bibendum viverra erat. Maecenas mattis lectus enim, quis tincidunt dui molestie euismod. Curabitur et diam tristique, accumsan nunc eu, hendrerit tellus.', '2022-10-27 19:17:18', '2022-10-27 19:17:18'),
(3, 'What does non-exclusive mean?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis, accusantium a laboriosam cumque consequatur voluptates fuga assumenda corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam, culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam quaerat iusto obcaecati doloremque, dolor praesentium a! Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Ut tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.', '2022-10-27 19:32:12', '2022-10-27 19:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `name`, `division_id`, `district_id`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Amtali', 1, 1, 8710, '2021-10-18 01:05:35', '2021-10-18 01:05:36'),
(2, 'Bamna', 1, 1, 8730, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(3, 'Barguna Sadar', 1, 1, 8700, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(4, 'Betagi', 1, 1, 8740, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(5, 'Patharghata', 1, 1, 8720, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(6, 'Taltali', 1, 1, 8750, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(7, 'Agailjhara', 1, 2, 8240, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(8, 'Babuganj', 1, 2, 8210, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(9, 'Bakerganj', 1, 2, 8280, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(10, 'Banaripara', 1, 2, 8530, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(11, 'Barishal Sadar', 1, 2, 8200, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(12, 'Gouranadi', 1, 2, 8230, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(13, 'Hizla', 1, 2, 8230, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(14, 'Mehendiganj', 1, 2, 8270, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(15, 'Muladi', 1, 2, 8250, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(16, 'Uzirpur', 1, 2, 8220, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(17, 'Bhola Sadar', 1, 3, 8300, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(18, 'Borhanuddin', 1, 3, 8320, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(19, 'Charfassion', 1, 3, 8340, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(20, 'Daulatkhan', 1, 3, 8310, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(21, 'Lalmohan', 1, 3, 8330, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(22, 'Manpura', 1, 3, 8360, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(23, 'Tazumuddin', 1, 3, 8350, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(24, 'Jhalokathi Sadar', 1, 4, 8400, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(25, 'Kathalia', 1, 4, 8430, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(26, 'Nalchity', 1, 4, 8420, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(27, 'Rajapur', 1, 4, 8410, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(36, 'Bauphal', 1, 5, 8620, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(37, 'Dashmina', 1, 5, 8630, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(38, 'Dumki', 1, 5, 8602, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(39, 'Galachipa', 1, 5, 8640, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(40, 'Kalapara', 1, 5, 8650, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(41, 'Mirzaganj', 1, 5, NULL, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(42, 'Patuakhali Sadar', 1, 5, 8600, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(43, 'Rangabali', 1, 5, NULL, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(44, 'Bhandaria', 1, 6, 8550, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(45, 'Kaukhali', 1, 6, 8510, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(46, 'Mathbaria', 1, 6, 8560, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(47, 'Nazirpur', 1, 6, 8540, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(48, 'Swarupkathi (Nesarabad)', 1, 6, 8520, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(49, 'Pirojpur Sadar', 1, 6, 8500, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(50, 'Indurkani', 1, 6, 8502, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(51, 'Bandarban Sadar', 2, 7, 4600, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(52, 'Lama', 2, 7, 4641, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(53, 'Naikhongchhari', 2, 7, 4660, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(54, 'Rowangchhari', 2, 7, 4610, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(55, 'Ruma', 2, 7, 4620, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(56, 'Thanchi', 2, 7, 4630, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(57, 'Akhaura', 2, 8, 3450, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(58, 'Ashuganj', 2, 8, 3402, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(59, 'Brahmanbaria Sadar', 2, 8, 3400, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(60, 'Bancharampur', 2, 8, 3420, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(61, 'Bijoynagar', 2, 8, NULL, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(62, 'Kasba', 2, 8, 3460, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(63, 'Nabinagar', 2, 8, 3410, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(64, 'Nasirnagar', 2, 8, 3443, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(65, 'Sarail', 2, 8, 3430, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(66, 'Chandpur Sadar', 2, 9, 3600, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(67, 'Faridganj', 2, 9, 3650, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(68, 'Haimchar', 2, 9, 3660, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(69, 'Hajiganj', 2, 9, 3610, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(70, 'Kachua', 2, 9, 3630, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(71, 'Matlab (Dakshin)', 2, 9, 3640, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(72, 'Matlab (Uttar)', 2, 9, 3640, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(73, 'Shahrasti', 2, 9, 3620, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(74, 'Anwara', 2, 10, 4376, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(75, 'Banskhali', 2, 10, 4390, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(76, 'Boalkhali', 2, 10, 4366, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(77, 'Chandanaish', 2, 10, NULL, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(78, 'Chattogram Sadar', 2, 10, 4000, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(79, 'Fatikchari', 2, 10, 4350, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(80, 'Hathazari', 2, 10, 4330, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(81, 'Karnaphuli', 2, 10, NULL, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(82, 'Lohagara', 2, 10, 4396, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(83, 'Mirsharai', 2, 10, 4320, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(84, 'Patiya', 2, 10, 4370, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(85, 'Rangunia', 2, 10, 4360, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(86, 'Raozan', 2, 10, 4340, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(87, 'Sandwip', 2, 10, 4300, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(88, 'Satkania', 2, 10, 4386, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(89, 'Sitakunda', 2, 10, 4310, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(90, 'Chakaria', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(91, 'Cox\'s Bazar Sadar', 2, 12, 4700, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(92, 'Kutubdia', 2, 12, 4720, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(93, 'Moheskhali', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(94, 'Pekua', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(95, 'Ramu', 2, 12, 4730, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(96, 'Teknaf', 2, 12, 4760, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(97, 'Ukhiya', 2, 12, 4750, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(98, 'Barura', 2, 11, 3560, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(99, 'Brahmanpara', 2, 11, 3526, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(100, 'Burichang', 2, 11, 3520, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(101, 'Chandina', 2, 11, 3510, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(102, 'Chouddagram', 2, 11, 3550, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(103, 'Cumilla Sadar', 2, 11, 3500, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(104, 'Cumilla Sadar Dakshin', 2, 11, 3500, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(105, 'Daudkandi', 2, 11, 3516, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(106, 'Debidwar', 2, 11, 3530, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(107, 'Homna', 2, 11, 3546, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(108, 'Laksham', 2, 11, 3570, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(109, 'Lalmai', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(110, 'Meghna', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(111, 'Monohorganj', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(112, 'Muradnagar', 2, 11, 3540, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(113, 'Nangalkot', 2, 11, 3580, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(114, 'Titas', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(115, 'Chhagalnaiya', 2, 13, 3910, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(116, 'Daganbhuiyan', 2, 13, 3920, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(117, 'Feni Sadar', 2, 13, 3900, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(118, 'Fulgazi', 2, 13, 3942, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(119, 'Porshuram', 2, 13, 3940, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(120, 'Sonagazi', 2, 13, 3930, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(121, 'Dighinala', 2, 14, 4420, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(122, 'Guimara', 2, 14, NULL, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(123, 'Khagrachari Sadar', 2, 14, 4400, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(124, 'Laxmichari', 2, 14, 4470, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(125, 'Mahalchari', 2, 14, 4430, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(126, 'Manikchari', 2, 14, 4460, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(127, 'Matiranga', 2, 14, 4450, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(128, 'Panchari', 2, 14, 4410, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(129, 'Ramgarh', 2, 14, 4440, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(130, 'Komol Nagar', 2, 15, NULL, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(131, 'Lakshmipur Sadar', 2, 15, 3700, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(132, 'Raipur', 2, 15, 3710, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(133, 'Ramganj', 2, 15, 3720, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(134, 'Ramgati', 2, 15, 3732, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(135, 'Begumganj', 2, 16, 3820, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(136, 'Chatkhil', 2, 16, 3870, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(137, 'Companiganj', 2, 16, NULL, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(138, 'Hatiya', 2, 16, 3890, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(139, 'Kabir Hat', 2, 16, 3807, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(140, 'Noakhali Sadar', 2, 16, 3800, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(141, 'Senbag', 2, 16, 3860, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(142, 'Sonaimuri', 2, 16, 3827, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(143, 'Subarna Char', 2, 16, NULL, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(144, 'Baghaichari', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(145, 'Barkal', 2, 17, 4570, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(146, 'Belaichari', 2, 17, 4550, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(147, 'Juraichari', 2, 17, 4560, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(148, 'Kaptai', 2, 17, 4530, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(149, 'Kaukhali', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(150, 'Langadu', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(151, 'Naniarchar', 2, 17, 4520, '2021-10-26 02:41:23', '2021-10-19 02:41:23'),
(152, 'Rajasthali', 2, 17, 4540, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(153, 'Rangamati Sadar', 2, 17, 4500, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(154, 'Dhamrai', 3, 18, 1350, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(155, 'Dohar', 3, 18, 1330, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(156, 'Keraniganj', 3, 18, 1310, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(157, 'Nawabganj', 3, 18, 1320, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(158, 'Savar', 3, 18, 1340, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(177, 'Alfadanga', 3, 19, 7870, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(178, 'Bhanga', 3, 19, 7830, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(179, 'Boalmari', 3, 19, 7860, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(180, 'Charbhadrasan', 3, 19, 7810, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(181, 'Faridpur Sadar', 3, 19, 7800, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(182, 'Madhukhali', 3, 19, 7850, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(183, 'Nagarkanda', 3, 19, 7840, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(184, 'Sadarpur', 3, 19, 7820, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(185, 'Saltha', 3, 19, NULL, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(186, 'Gazipur Sadar', 3, 20, 1700, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(187, 'Kaliakair', 3, 20, 1750, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(188, 'Kaliganj', 3, 20, 1720, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(189, 'Kapasia', 3, 20, 1730, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(190, 'Sreepur', 3, 20, 1740, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(191, 'Gopalganj Sadar', 3, 21, 8100, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(192, 'Kashiani', 3, 21, 8130, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(193, 'Kotalipara', 3, 21, 8110, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(194, 'Muksudpur', 3, 21, 8140, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(195, 'Tungipara', 3, 21, 8120, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(196, 'Austagram', 3, 22, 2380, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(197, 'Bajitpur', 3, 22, 2336, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(198, 'Bhairab', 3, 22, 2350, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(199, 'Hossainpur', 3, 22, 2320, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(200, 'Itna', 3, 22, 2390, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(201, 'Karimganj', 3, 22, 2310, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(202, 'Katiadi', 3, 22, 2330, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(203, 'Kishoreganj Sadar', 3, 22, 2300, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(204, 'Kuliarchar', 3, 22, 2340, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(205, 'Mithamoin', 3, 22, 2370, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(206, 'Nikli', 3, 22, 2360, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(207, 'Pakundia', 3, 22, 2326, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(208, 'Tarail', 3, 22, 2316, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(209, 'Kalkini', 3, 23, 7920, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(210, 'Madaripur Sadar', 3, 23, 7900, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(211, 'Rajoir', 3, 23, 7910, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(212, 'Shibchar', 3, 23, NULL, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(213, 'Daulatpur', 3, 24, 1860, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(214, 'Ghior', 3, 24, 1840, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(215, 'Harirampur', 3, 24, 1830, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(216, 'Manikganj Sadar', 3, 24, 1800, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(217, 'Saturia', 3, 24, 1810, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(218, 'Shivalaya', 3, 24, 1850, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(219, 'Singair', 3, 24, 1820, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(220, 'Gazaria', 3, 25, 1510, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(221, 'Lohajang', 3, 25, 1530, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(222, 'Munshiganj Sadar', 3, 25, 1500, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(223, 'Sirajdikhan', 3, 25, 1540, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(224, 'Sreenagar', 3, 25, 1550, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(225, 'Tongibari', 3, 25, 1520, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(226, 'Araihazar', 3, 26, 1450, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(227, 'Bandar', 3, 26, 1410, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(228, 'Narayanganj Sadar', 3, 26, 1400, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(229, 'Rupganj', 3, 26, 1460, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(230, 'Sonargaon', 3, 26, NULL, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(231, 'Belabo', 3, 27, 1640, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(232, 'Monohardi', 3, 27, 1650, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(233, 'Narshingdi Sadar', 3, 27, 1600, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(234, 'Palash', 3, 27, 1610, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(235, 'Raipura', 3, 27, 1630, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(236, 'Shibpur', 3, 27, 1620, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(237, 'Baliakandi', 3, 28, 7730, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(238, 'Goalanda', 3, 28, 7710, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(239, 'Kalukhali', 3, 28, NULL, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(240, 'Pangsha', 3, 28, 7720, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(241, 'Rajbari Sadar', 3, 28, 7700, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(242, 'Bhedarganj', 3, 29, 8030, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(243, 'Damudya', 3, 29, 8040, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(244, 'Gosairhat', 3, 29, 8050, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(245, 'Zajira', 3, 29, 8010, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(246, 'Naria', 3, 29, 8020, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(247, 'Shariatpur Sadar', 3, 29, 8000, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(248, 'Basail', 3, 30, 1920, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(249, 'Bhuapur', 3, 30, 1960, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(250, 'Delduar', 3, 30, 1910, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(251, 'Dhanbari', 3, 30, 1997, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(252, 'Ghatail', 3, 30, 1980, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(253, 'Gopalpur', 3, 30, 1990, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(254, 'Kalihati', 3, 30, 1970, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(255, 'Madhupur', 3, 30, 1996, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(256, 'Mirzapur', 3, 30, 1940, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(257, 'Nagarpur', 3, 30, 1936, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(258, 'Shakhipur', 3, 30, 1950, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(259, 'Tangail Sadar', 3, 30, 1900, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(260, 'Bagerhat Sadar', 4, 31, 9300, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(261, 'Chitalmari', 4, 31, 9360, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(262, 'Fakirhat', 4, 31, 9370, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(263, 'Kachua', 4, 31, 9310, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(264, 'Mollahat', 4, 31, 9380, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(265, 'Mongla', 4, 31, NULL, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(266, 'Morrelganj', 4, 31, 9320, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(267, 'Rampal', 4, 31, 9340, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(268, 'Sarankhola', 4, 31, NULL, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(269, 'Alamdanga', 4, 32, 7210, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(270, 'Chuadanga Sadar', 4, 32, 7200, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(271, 'Damurhuda', 4, 32, 7220, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(272, 'Jibannagar', 4, 32, NULL, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(273, 'Abhoynagar', 4, 33, NULL, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(274, 'Bagherpara', 4, 33, 7470, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(275, 'Chaugachha', 4, 33, 7410, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(276, 'Jashore Sadar', 4, 33, 7400, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(277, 'Jhikargacha', 4, 33, 7420, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(278, 'Keshabpur', 4, 33, 7450, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(279, 'Monirampur', 4, 33, 7440, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(280, 'Sharsha', 4, 33, 7430, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(281, 'Harinakunda', 4, 34, 7310, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(282, 'Jhenaidah Sadar', 4, 34, 7300, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(283, 'Kaliganj', 4, 34, NULL, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(284, 'Kotchandpur', 4, 34, 7330, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(285, 'Maheshpur', 4, 34, 7340, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(286, 'Shailkupa', 4, 34, 7320, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(287, 'Batiaghata', 4, 35, 9260, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(288, 'Dacope', 4, 35, 9271, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(289, 'Dighalia', 4, 35, 9220, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(290, 'Dumuria', 4, 35, NULL, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(291, 'Khulna Sadar', 4, 35, 9100, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(292, 'Koyra', 4, 35, 9290, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(293, 'Paikgachha', 4, 35, 9280, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(294, 'Phultala', 4, 35, 9210, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(295, 'Rupsa', 4, 35, 9241, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(296, 'Terokhada', 4, 35, 9230, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(297, 'Bheramara', 4, 36, 7040, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(298, 'Daulatpur', 4, 36, 7042, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(299, 'Khoksa', 4, 36, 7021, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(300, 'Kumarkhali', 4, 36, 7010, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(301, 'Kushtia Sadar', 4, 36, 7000, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(302, 'Mirpur', 4, 36, 7030, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(303, 'Magura Sadar', 4, 37, 7600, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(304, 'Mohammadpur', 4, 37, 7630, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(305, 'Salikha', 4, 37, NULL, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(306, 'Sreepur', 4, 37, 7610, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(307, 'Gangni', 4, 38, 7110, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(308, 'Meherpur Sadar', 4, 38, 7100, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(309, 'Mujib Nagar', 4, 38, 7102, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(310, 'Kalia', 4, 39, 7520, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(311, 'Lohagara', 4, 39, 7511, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(312, 'Narail Sadar', 4, 39, 7500, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(313, 'Assasuni', 4, 40, 9460, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(314, 'Debhata', 4, 40, 9430, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(315, 'Kalaroa', 4, 40, 9410, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(316, 'Kaliganj', 4, 40, 9440, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(317, 'Satkhira Sadar', 4, 40, 9400, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(318, 'Shyamnagar', 4, 40, NULL, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(319, 'Tala', 4, 40, 9420, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(320, 'Bakshiganj', 5, 41, 2140, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(321, 'Dewanganj', 5, 41, 2140, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(322, 'Islampur', 5, 41, 2020, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(323, 'Jamalpur Sadar', 5, 41, 2000, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(324, 'Madarganj', 5, 41, 2040, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(325, 'Melandah', 5, 41, 2010, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(326, 'Sarishabari', 5, 41, 2050, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(327, 'Bhaluka', 5, 42, 2240, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(328, 'Fulbaria', 5, 42, 2216, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(329, 'Gafargaon', 5, 42, 2230, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(330, 'Gouripur', 5, 42, 2270, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(331, 'Haluaghat', 5, 42, 2260, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(332, 'Ishwarganj', 5, 42, 2280, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(333, 'Muktagacha', 5, 42, 2210, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(334, 'Mymensingh Sadar', 5, 42, 2200, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(335, 'Nandail', 5, 42, 2290, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(336, 'Phulpur', 5, 42, 2250, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(337, 'Tarakanda', 5, 42, 2252, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(338, 'Trishal', 5, 42, 2220, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(339, 'Atpara', 5, 43, 2470, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(340, 'Barhatta', 5, 43, 2440, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(341, 'Dhobaura', 5, 43, 2416, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(342, 'Durgapur', 5, 43, 2420, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(343, 'Kalmakanda', 5, 43, 2430, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(344, 'Kendua', 5, 43, 2480, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(345, 'Khaliajuri', 5, 43, 2460, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(346, 'Madan', 5, 43, 2490, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(347, 'Mohanganj', 5, 43, 2446, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(348, 'Netrakona Sadar', 5, 43, 2400, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(349, 'Purbadhala', 5, 43, 2410, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(350, 'Jhenaigati', 5, 44, 2120, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(351, 'Nakla', 5, 44, 2150, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(352, 'Nalitabari', 5, 44, 2110, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(353, 'Sherpur Sadar', 5, 44, 2100, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(354, 'Sreebordi', 5, 44, 2130, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(355, 'Adamdighi', 6, 45, 5890, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(356, 'Bogura Sadar', 6, 45, 5800, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(357, 'Dhunot', 6, 45, 5850, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(358, 'Dhupchancia', 6, 45, 5880, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(359, 'Gabtali', 6, 45, 5820, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(360, 'Kahaloo', 6, 45, 5870, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(361, 'Nandigram', 6, 45, 5860, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(362, 'Sariakandi', 6, 45, 5830, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(363, 'Shajahanpur', 6, 45, NULL, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(364, 'Sherpur', 6, 45, 5840, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(365, 'Shibganj', 6, 45, 5810, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(366, 'Sonatala', 6, 45, 5826, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(367, 'Bholahat', 6, 46, 6330, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(368, 'Gomostapur', 6, 46, 6321, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(369, 'Nachol', 6, 46, 6310, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(370, 'Nawabganj Sadar', 6, 46, 6300, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(371, 'Shibganj', 6, 46, 6340, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(372, 'Akkelpur', 6, 47, 5940, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(373, 'Joypurhat Sadar', 6, 47, 5900, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(374, 'Kalai', 6, 47, 5930, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(375, 'Khetlal', 6, 47, 5920, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(376, 'Panchbibi', 6, 47, 5910, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(377, 'Atrai', 6, 48, NULL, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(378, 'Badalgacchi', 6, 48, 6570, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(379, 'Dhamoirhat', 6, 48, 6580, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(380, 'Manda', 6, 48, NULL, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(381, 'Mohadevpur', 6, 48, 6530, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(382, 'Naogaon Sadar', 6, 48, 6500, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(383, 'Niamatpur', 6, 48, 6520, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(384, 'Patnitala', 6, 48, 6540, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(385, 'Porsha', 6, 48, 6551, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(386, 'Raninagar', 6, 48, 6590, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(387, 'Sapahar', 6, 48, 6560, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(388, 'Bagatipara', 6, 49, NULL, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(389, 'Baraigram', 6, 49, 6432, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(390, 'Gurudaspur', 6, 49, 6440, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(391, 'Lalpur', 6, 49, 6421, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(392, 'Naldanga', 6, 49, NULL, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(393, 'Natore Sadar', 6, 49, 6400, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(394, 'Singra', 6, 49, 6450, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(395, 'Atghoria', 6, 50, 6610, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(396, 'Bera', 6, 50, 6680, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(397, 'Bhangura', 6, 50, 6640, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(398, 'Chatmohar', 6, 50, 6630, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(399, 'Faridpur', 6, 50, NULL, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(400, 'Ishwardi', 6, 50, 6620, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(401, 'Pabna Sadar', 6, 50, 6600, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(402, 'Santhia', 6, 50, 6670, '2021-10-24 08:27:25', '2021-10-24 08:27:25'),
(403, 'Sujanagar', 6, 50, 6660, '2021-10-24 08:27:25', '2021-10-24 08:27:25'),
(414, 'Bagha', 6, 51, 6280, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(415, 'Bagmara', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(416, 'Charghat', 6, 51, 6270, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(417, 'Durgapur', 6, 51, 6240, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(418, 'Godagari', 6, 51, 6290, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(419, 'Mohanpur', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(420, 'Paba', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(421, 'Puthia', 6, 51, 6260, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(422, 'Rajshahi Sadar', 6, 51, 6000, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(423, 'Tanore', 6, 51, 6230, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(424, 'Belkuchi', 6, 52, 6740, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(425, 'Chowhali', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(426, 'Kamarkhand', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(427, 'Kazipur', 6, 52, 6710, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(428, 'Raiganj', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(429, 'Shahzadpur', 6, 52, 6770, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(430, 'Sirajganj Sadar', 6, 52, 6700, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(431, 'Tarash', 6, 52, 6780, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(432, 'Ullapara', 6, 52, 6760, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(433, 'Birampur', 7, 53, 5266, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(434, 'Birganj', 7, 53, 5220, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(435, 'Biral', 7, 53, 5210, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(436, 'Bochaganj', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(437, 'Chirirbandar', 7, 53, 5240, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(438, 'Dinajpur Sadar', 7, 53, 5200, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(439, 'Fulbari', 7, 53, 5260, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(440, 'Ghoraghat', 7, 53, 5291, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(441, 'Hakimpur', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(442, 'Kaharol', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(443, 'Khansama', 7, 53, 5230, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(444, 'Nawabganj', 7, 53, 5280, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(445, 'Parbatipur', 7, 53, 5250, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(446, 'Phulchhari', 7, 54, 5760, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(447, 'Gaibandha Sadar', 7, 54, 5700, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(448, 'Gobindaganj', 7, 54, 5740, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(449, 'Palashbari', 7, 54, 5730, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(450, 'Sadullapur', 7, 54, 5710, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(451, 'Saghata', 7, 54, 5751, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(452, 'Sundarganj', 7, 54, 5720, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(453, 'Bhurungamari', 7, 55, 5670, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(454, 'Chilmari', 7, 55, 5630, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(455, 'Fulbari', 7, 55, 5680, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(456, 'Kurigram Sadar', 7, 55, 5600, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(457, 'Nageshwari', 7, 55, 5660, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(458, 'Rajarhat', 7, 55, 5610, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(459, 'Rajibpur', 7, 55, 5650, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(460, 'Rowmari', 7, 55, 5640, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(461, 'Ulipur', 7, 55, 5620, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(462, 'Aditmari', 7, 56, 5510, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(463, 'Hatibandha', 7, 56, 5530, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(464, 'Kaliganj', 7, 56, NULL, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(465, 'Lalmonirhat Sadar', 7, 56, 5500, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(466, 'Patgram', 7, 56, 5540, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(467, 'Dimla', 7, 57, 5350, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(468, 'Domar', 7, 57, 5340, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(469, 'Jaldhaka', 7, 57, 5330, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(470, 'Kishorganj', 7, 57, 5320, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(471, 'Nilphamari Sadar', 7, 57, 5300, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(472, 'Saidpur', 7, 57, 5310, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(473, 'Atwari', 7, 58, NULL, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(474, 'Boda', 7, 58, 5010, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(475, 'Debiganj', 7, 58, 5020, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(476, 'Panchagarh Sadar', 7, 58, 5000, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(477, 'Tetulia', 7, 58, 5030, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(478, 'Badarganj', 7, 59, 5430, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(479, 'Gangachara', 7, 59, 5410, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(480, 'Kaunia', 7, 59, 5440, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(481, 'Mithapukur', 7, 59, 5460, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(482, 'Pirgacha', 7, 59, 5450, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(483, 'Pirganj', 7, 59, NULL, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(484, 'Rangpur Sadar', 7, 59, 5400, '2021-10-24 09:20:54', NULL),
(485, 'Taraganj', 7, 59, 5420, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(486, 'Baliadangi', 7, 60, 5140, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(487, 'Haripur', 7, 60, NULL, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(488, 'Pirganj', 7, 60, 5110, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(489, 'Ranisankail', 7, 60, 5120, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(490, 'Thakurgaon Sadar', 7, 60, 5100, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(491, 'Ajmiriganj', 8, 61, 3360, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(492, 'Bahubal', 8, 61, 3310, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(493, 'Baniachong', 8, 61, 3350, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(494, 'Chunarughat', 8, 61, 3320, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(495, 'Habiganj Sadar', 8, 61, 3300, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(496, 'Lakhai', 8, 61, 3341, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(497, 'Madhabpur', 8, 61, 3330, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(498, 'Nabiganj', 8, 61, 3370, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(499, 'Sayestaganj', 8, 61, NULL, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(500, 'Barlekha', 8, 62, 3250, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(501, 'Juri', 8, 62, 3251, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(502, 'Kamalganj', 8, 62, 3220, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(503, 'Kulaura', 8, 62, 3230, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(504, 'Moulvibazar Sadar', 8, 62, 3200, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(505, 'Rajnagar', 8, 62, 3240, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(506, 'Sreemangal', 8, 62, 3210, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(518, 'Biswamvarpur', 8, 63, 3010, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(519, 'Chhatak', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(520, 'Dakhin Sunamganj', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(521, 'Derai', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(522, 'Dharmapasha', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(523, 'Dowarabazar', 8, 63, 3070, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(524, 'Jagannathpur', 8, 63, 3060, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(525, 'Jamalganj', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(526, 'Sulla', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(527, 'Sunamganj Sadar', 8, 63, 3000, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(528, 'Tahirpur', 8, 63, 3030, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(529, 'Balaganj', 8, 64, 3120, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(530, 'Beanibazar', 8, 64, 3170, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(531, 'Biswanath', 8, 64, 3130, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(532, 'Companiganj', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(533, 'Dakshin Surma', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(534, 'Fenchuganj', 8, 64, 3116, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(535, 'Golapganj', 8, 64, 3160, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(536, 'Gowainghat', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(537, 'Jaintiapur', 8, 64, 3156, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(538, 'Kanaighat', 8, 64, 3180, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(539, 'Osmaninagar', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(540, 'Sylhet Sadar', 8, 64, 3100, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(541, 'Zakiganj', 8, 64, 3190, '2021-10-24 10:03:52', '2021-10-24 10:03:52');

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
(1, 'Anik Kumar Nandi', 'anik.mbf@gmail.com', '2022-06-24 15:39:54', '$2y$10$c7jzvP4DN0EvHCllcZgzM.JrbD1jzqvXccwX14nNpzElrrhCPJfwi', 'rKw0sYGyEbyNB2wmTFfyYCnzfioPgTZIf3sWXf5fOHKrkjWph5PiUMoH0YfV', '2021-09-02 01:39:17', '2022-10-27 16:24:57'),
(2, 'John DOE', 'john@gmail.com', NULL, '$2y$10$3QliVKb3rSLraq0xn7fBOuWMLBQ9O9uFeHlq3oA8G9uw8CbEvCuDe', NULL, '2021-09-15 10:22:48', '2021-09-15 10:22:48'),
(3, 'Dipika Padukone', 'dipika@gmail.com', NULL, '$2y$10$zGpT6e2a95F5ObRtjfy9kO8jCNnBCYduGsB7o2GiGR8Cwfh/gbIxK', NULL, '2021-09-15 10:24:54', '2021-09-15 10:24:54'),
(4, 'Mim Sarker', 'mim@gmail.com', NULL, '$2y$10$aPBgn2tW3F/cETFQLEEVkuCUQnalF6NuOY1VVfDNlSc7D4eFYU2S.', NULL, '2021-12-04 16:08:34', '2021-12-04 16:08:34'),
(5, 'Anik Kumar Nandi', 'surjo.nondi.sn@gmail.com', '2022-06-24 15:37:17', '$2y$10$3YVMF48RwfT7nRtOkH/KWeszS1Hc2sECY09UqyVHZKYoRRcbQ5gle', NULL, '2022-06-24 14:03:09', '2022-06-24 15:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volunteer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giverFromInspiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prDivison` bigint(20) UNSIGNED NOT NULL,
  `prDistrict` bigint(20) UNSIGNED NOT NULL,
  `prThana` bigint(20) UNSIGNED NOT NULL,
  `prPostOffice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prZIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prVillage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmDivison` bigint(20) UNSIGNED NOT NULL,
  `pmDistrict` bigint(20) UNSIGNED NOT NULL,
  `pmThana` bigint(20) UNSIGNED NOT NULL,
  `pmPostOffice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmZIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmVillage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=applicant, 2=volunteer, 3=resticted, 4=suspanded',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisor_socials`
--
ALTER TABLE `advisor_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_and_basic_infos`
--
ALTER TABLE `contact_and_basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
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
-- Indexes for table `offcial_teams`
--
ALTER TABLE `offcial_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_team_socials`
--
ALTER TABLE `official_team_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_image_galleries`
--
ALTER TABLE `project_image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_platforms`
--
ALTER TABLE `social_platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_conditions`
--
ALTER TABLE `term_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `volunteers_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `volunteers_applicant_id_unique` (`applicant_id`),
  ADD UNIQUE KEY `volunteers_volunteer_id_unique` (`volunteer_id`),
  ADD UNIQUE KEY `volunteers_email_unique` (`email`),
  ADD UNIQUE KEY `volunteers_nid_unique` (`nid`),
  ADD UNIQUE KEY `volunteers_bcn_unique` (`bcn`),
  ADD UNIQUE KEY `volunteers_facebook_url_unique` (`facebook_url`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advisor_socials`
--
ALTER TABLE `advisor_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_and_basic_infos`
--
ALTER TABLE `contact_and_basic_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `offcial_teams`
--
ALTER TABLE `offcial_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `official_team_socials`
--
ALTER TABLE `official_team_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_image_galleries`
--
ALTER TABLE `project_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_platforms`
--
ALTER TABLE `social_platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `term_conditions`
--
ALTER TABLE `term_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
