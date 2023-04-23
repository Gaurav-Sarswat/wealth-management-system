-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2023 at 04:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Crypto', 'crypto', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(3, 'Real Estate', 'real-estate', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(4, 'Bonds', 'bonds', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(5, 'Equity', 'equity', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(6, 'Private Equity', 'private-equity', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(7, 'Forex', 'forex', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(8, 'NFTs', 'nfts', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(9, 'Live Stock', 'live-stock', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(10, 'Agro', 'agro', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(11, 'Random', 'random', '2023-03-22 12:41:22', '2023-03-22 12:41:22'),
(12, 'test', 'test', '2023-04-12 23:28:33', '2023-04-12 23:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `category_idea`
--

CREATE TABLE `category_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_idea`
--

INSERT INTO `category_idea` (`id`, `idea_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 1, 10, NULL, NULL),
(6, 1, 11, NULL, NULL),
(7, 2, 5, NULL, NULL),
(8, 3, 2, NULL, NULL),
(9, 3, 5, NULL, NULL),
(10, 3, 7, NULL, NULL),
(11, 3, 9, NULL, NULL),
(12, 3, 10, NULL, NULL),
(13, 3, 11, NULL, NULL),
(14, 4, 5, NULL, NULL),
(15, 4, 9, NULL, NULL),
(16, 5, 5, NULL, NULL),
(17, 6, 2, NULL, NULL),
(18, 6, 4, NULL, NULL),
(19, 6, 8, NULL, NULL),
(20, 7, 5, NULL, NULL),
(21, 7, 8, NULL, NULL),
(22, 8, 2, NULL, NULL),
(23, 8, 3, NULL, NULL),
(24, 9, 5, NULL, NULL),
(25, 9, 7, NULL, NULL),
(26, 9, 8, NULL, NULL),
(27, 10, 5, NULL, NULL),
(28, 11, 2, NULL, NULL),
(29, 11, 3, NULL, NULL),
(30, 11, 4, NULL, NULL),
(31, 11, 6, NULL, NULL),
(32, 11, 8, NULL, NULL),
(33, 11, 9, NULL, NULL),
(34, 11, 12, NULL, NULL),
(35, 12, 2, NULL, NULL),
(36, 12, 11, NULL, NULL),
(37, 13, 2, NULL, NULL),
(38, 14, 5, NULL, NULL),
(39, 15, 3, NULL, NULL),
(40, 16, 8, NULL, NULL),
(41, 17, 4, NULL, NULL),
(42, 17, 5, NULL, NULL),
(43, 17, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE `category_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 5, 3, NULL, NULL),
(7, 5, 7, NULL, NULL),
(8, 5, 8, NULL, NULL),
(9, 8, 2, NULL, NULL),
(10, 8, 3, NULL, NULL),
(11, 8, 7, NULL, NULL),
(12, 11, 3, NULL, NULL),
(13, 11, 7, NULL, NULL),
(14, 12, 5, NULL, NULL),
(15, 12, 7, NULL, NULL),
(16, 12, 8, NULL, NULL),
(17, 13, 2, NULL, NULL),
(18, 13, 5, NULL, NULL),
(19, 13, 7, NULL, NULL),
(20, 1, 3, '2023-04-13 14:07:33', '2023-04-13 14:07:33'),
(24, 1, 5, '2023-04-15 12:29:43', '2023-04-15 12:29:43'),
(25, 1, 9, '2023-04-15 12:29:43', '2023-04-15 12:29:43'),
(29, 1, 11, '2023-04-15 12:30:04', '2023-04-15 12:30:04'),
(31, 1, 2, '2023-04-19 09:37:06', '2023-04-19 09:37:06'),
(32, 1, 6, '2023-04-19 09:37:06', '2023-04-19 09:37:06'),
(33, 1, 7, '2023-04-19 09:37:06', '2023-04-19 09:37:06'),
(34, 1, 8, '2023-04-19 09:37:06', '2023-04-19 09:37:06'),
(35, 14, 2, '2023-04-19 09:48:15', '2023-04-19 09:48:15'),
(36, 14, 6, '2023-04-19 09:48:15', '2023-04-19 09:48:15'),
(37, 14, 7, '2023-04-19 09:48:15', '2023-04-19 09:48:15'),
(38, 14, 3, '2023-04-22 22:38:12', '2023-04-22 22:38:12'),
(39, 14, 4, '2023-04-22 22:38:12', '2023-04-22 22:38:12'),
(40, 14, 5, '2023-04-22 22:38:12', '2023-04-22 22:38:12'),
(41, 14, 9, '2023-04-22 22:38:12', '2023-04-22 22:38:12'),
(42, 14, 11, '2023-04-22 22:38:12', '2023-04-22 22:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'India', 1, '2023-04-06 20:05:50', '2023-04-06 20:05:50'),
(2, 'China', 1, '2023-04-06 20:05:58', '2023-04-06 20:05:58'),
(3, 'UK', 2, '2023-04-06 20:06:06', '2023-04-06 20:06:06'),
(4, 'Pakistan', 1, '2023-04-19 09:53:22', '2023-04-19 09:53:22'),
(5, 'France', 2, '2023-04-19 09:53:51', '2023-04-19 09:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `country_idea`
--

CREATE TABLE `country_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countries_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_idea`
--

INSERT INTO `country_idea` (`id`, `countries_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, NULL),
(2, 3, 6, NULL, NULL),
(3, 3, 7, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 3, 9, NULL, NULL),
(6, 3, 10, NULL, NULL),
(7, 3, 11, NULL, NULL),
(8, 3, 12, NULL, NULL),
(9, 1, 13, NULL, NULL),
(10, 1, 14, NULL, NULL),
(11, 3, 15, NULL, NULL),
(12, 2, 16, NULL, NULL),
(13, 3, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'INR', '2023-04-02 23:49:35', '2023-04-02 23:49:35'),
(6, 'GBP', '2023-04-02 23:50:17', '2023-04-02 23:50:17'),
(7, 'USD', '2023-04-03 02:05:00', '2023-04-03 02:05:00'),
(8, 'EURO', '2023-04-03 02:05:54', '2023-04-03 02:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `currency_idea`
--

CREATE TABLE `currency_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_idea`
--

INSERT INTO `currency_idea` (`id`, `currency_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 6, 5, NULL, NULL),
(2, 7, 5, NULL, NULL),
(3, 8, 6, NULL, NULL),
(4, 8, 7, NULL, NULL),
(5, 8, 8, NULL, NULL),
(6, 6, 9, NULL, NULL),
(7, 6, 10, NULL, NULL),
(8, 7, 10, NULL, NULL),
(9, 8, 10, NULL, NULL),
(10, 6, 11, NULL, NULL),
(11, 6, 12, NULL, NULL),
(12, 8, 12, NULL, NULL),
(13, 6, 13, NULL, NULL),
(14, 5, 14, NULL, NULL),
(15, 6, 15, NULL, NULL),
(16, 7, 16, NULL, NULL),
(17, 6, 17, NULL, NULL),
(18, 7, 17, NULL, NULL);

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
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_rating` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `instruments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supporting_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Draft','Published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `verification_status` enum('accepted','rejected','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `title`, `abstract`, `content`, `risk_rating`, `expiry_date`, `instruments`, `image`, `supporting_file`, `user_id`, `published_date`, `created_at`, `updated_at`, `slug`, `status`, `verification_status`, `deleted_at`) VALUES
(1, 'Sunt debitis est qui', 'Ea blanditiis except', 'Commodo id qui accus', 9, '2002-07-09', 'Deleniti magni fuga', NULL, NULL, 3, '2023-03-28 22:55:37', '2023-03-28 21:55:37', '2023-04-04 23:38:29', 'sunt-debitis-est-qui', 'Published', 'pending', '2023-04-04 23:38:29'),
(2, 'Praesentium omnis ni', 'Praesentium qui eius', 'Eaque et voluptatem', 5, '2011-07-28', 'Maiores quod quod fu', NULL, NULL, 3, '2023-03-29 00:14:32', '2023-03-28 23:14:32', '2023-04-19 09:02:37', 'praesentium-omnis-ni', 'Published', 'rejected', '2023-04-19 09:02:37'),
(3, 'Amet dolore aliquip', 'Do et sed voluptatem', 'Odit nobis ad qui re', 9, '1998-09-28', 'Quidem maxime expedi', NULL, NULL, 3, '2023-03-29 00:15:12', '2023-03-28 23:15:12', '2023-04-19 09:02:43', 'amet-dolore-aliquip', 'Published', 'accepted', '2023-04-19 09:02:43'),
(4, 'Deleniti aperiam qui', 'Itaque non doloribus', 'Reprehenderit minim', 9, '2010-03-19', 'Accusamus dolores et', NULL, NULL, 3, '2023-04-05 00:06:08', '2023-04-04 23:06:08', '2023-04-04 23:36:28', 'deleniti-aperiam-qui', 'Published', 'pending', '2023-04-04 23:36:28'),
(5, 'Architecto soluta su', 'Soluta eum sunt non', 'Voluptate corrupti', 0, '1981-04-13', 'Officia ratione aut', 'public/images/hj1fh7B24kCzTjS4Ky2g61jMINvADtLqFcIJgvkP.png', NULL, 3, '2023-04-06 21:07:16', '2023-04-06 20:07:16', '2023-04-19 09:02:48', 'architecto-soluta-su', 'Published', 'accepted', '2023-04-19 09:02:48'),
(6, 'Hic iure assumenda r', 'Aut repudiandae nece', 'Irure id ipsum nequ', 2, '2012-03-28', 'Qui dolorem occaecat', 'public/images/s0L6IgcalVd9gJQVISuuOYjnHTSwoelRd84FHVtY.png', NULL, 3, '2023-04-06 21:08:39', '2023-04-06 20:08:39', '2023-04-19 09:02:53', 'hic-iure-assumenda-r', 'Published', 'accepted', '2023-04-19 09:02:53'),
(7, 'Eveniet laborum ame', 'Et dolorem commodi q', 'Accusantium aliqua', 10, '2015-12-29', 'Voluptatem sint re', 'public/storage/images/RsDM9fbCfIOZo5VcUqqWsVc0V5ape3C7eHdDmEau.png', NULL, 3, '2023-04-06 21:21:36', '2023-04-06 20:21:36', '2023-04-19 09:02:58', 'eveniet-laborum-ame', 'Published', 'accepted', '2023-04-19 09:02:58'),
(8, 'Magna eveniet ullam', 'Ipsam optio duis ac', 'Et dolore sint provi', 10, '1989-01-09', 'Sed ad quis sed id', 'public/images/i9kmPQtG3MCk84lLquXf692MWethikiITx4iWSzT.png', NULL, 3, '2023-04-06 21:23:26', '2023-04-06 20:23:26', '2023-04-19 09:03:03', 'magna-eveniet-ullam', 'Published', 'pending', '2023-04-19 09:03:03'),
(9, 'Molestiae natus ea q', 'Iste suscipit cupida', 'Sit culpa iure sed', 0, '1991-11-08', 'Incididunt omnis con', 'images/wL18t60QxNTStQitfPTkMV88gedO9BCzI6hem12G.png', NULL, 3, '2023-04-06 21:28:16', '2023-04-06 20:28:16', '2023-04-19 09:03:08', 'molestiae-natus-ea-q', 'Published', 'pending', '2023-04-19 09:03:08'),
(10, 'Voluptate et labore', 'Dolor temporibus sin', 'Velit sunt labore i', 6, '2010-08-10', 'Est reiciendis nisi', '/storage/images/j34kirF6vyYo5b17g1ASJxwvmTtDJnNSWeEglvqQ.png', NULL, 3, '2023-04-06 21:32:29', '2023-04-06 20:32:29', '2023-04-19 09:03:15', 'voluptate-et-labore', 'Published', 'pending', '2023-04-19 09:03:15'),
(11, 'Eos eum dicta lorem', 'Autem est ex quas ni', 'Officia mollitia ut', 1, '2010-11-26', 'Molestiae culpa quos', NULL, NULL, 3, '2023-04-15 12:50:01', '2023-04-15 11:50:01', '2023-04-19 09:03:21', 'eos-eum-dicta-lorem', 'Draft', 'pending', '2023-04-19 09:03:21'),
(12, 'Laudantium impedit', 'Exercitation consequ', 'Nisi quas laborum A', 3, '1975-03-18', 'A autem ex fugiat v', '/storage/images/pRWt8e3ANceddzuGx3gdfjMd5SCIXcNW30NNPAnW.png', '/storage/files/RRvF2uIPP8KYdrPBsGuNCxequ6ggVUlYmaKhiG1J.pdf', 3, '2023-04-17 10:43:48', '2023-04-17 09:43:48', '2023-04-19 09:03:27', 'laudantium-impedit', 'Published', 'pending', '2023-04-19 09:03:27'),
(13, 'Invest in Bitcoin', 'Buy bitcoin it will increase by 10% in one week', 'Invest in Bitcoin now you will get a 10% profit in a week.\r\nInvest as soon as possible. this is one of the least risky investments in crypto.', 3, '2023-04-23', 'Bitcoin', '/storage/images/hAxipUX1myppsoJkxrRUfrsbmYqaViumRpiKbvgq.jpg', '/storage/files/VlfV85ztqBe2rc2ijk0Cf4RZuw35ycIwqRiSbIIL.pdf', 3, '2023-04-19 10:13:52', '2023-04-19 09:13:52', '2023-04-19 09:13:52', 'invest-in-bitcoin', 'Published', 'pending', NULL),
(14, 'Invest in IT Stocks', 'Investing in IT stocks can provide good returns with less risk', 'There are IT stocks to consider for investing, and the best approach will depend on your investment goals and risk tolerance.', 5, '2023-07-12', 'TCS', '/storage/images/jM5RfeXa956AzrAOTWeNlHJnKsLXt7kLkGefqaUo.png', NULL, 3, '2023-04-19 10:21:17', '2023-04-19 09:21:17', '2023-04-19 09:34:22', 'invest-in-it-stocks', 'Published', 'accepted', NULL),
(15, 'Real Estate Investment tip', 'Invest in commercial real estate for long term to make good profits', 'Real estate can be a great investment option for those who are looking to diversify their portfolio and build long-term wealth.', 2, '2026-11-19', 'Commercial Property', '/storage/images/s43wj2ZociNwvlgNqhD4mfrONEQEqBqWAUhqdXI4.jpg', NULL, 3, '2023-04-19 10:25:15', '2023-04-19 09:25:15', '2023-04-19 09:25:15', 'real-estate-investment-tip', 'Draft', 'pending', NULL),
(16, 'Invest in NFT', 'invest in NFT to get high returns but with high risk', 'NFTs (Non-Fungible Tokens) have gained a lot of attention recently as a new investment option. NFTs are unique digital assets that can represent anything from artwork and music to virtual real estate and collectibles.', 9, '2023-05-27', 'CryptoPunk', '/storage/images/2ma6KbOiLTQ6KUmz1mkSK0yg9Vvdd9g0J7JlRJvn.jpg', NULL, 3, '2023-04-19 10:29:41', '2023-04-19 09:29:41', '2023-04-19 09:29:41', 'invest-in-nft', 'Published', 'pending', NULL),
(17, 'Labore ut laudantium', 'Aliquid quo ea dolor Aliquid quo ea dolor Aliquid quo ea dolor', 'Tempora dolor libero', 6, '1997-01-08', 'Ex eiusmod ullam ips', NULL, NULL, 3, '2023-04-19 10:32:25', '2023-04-19 09:32:25', '2023-04-19 09:34:38', 'labore-ut-laudantium', 'Published', 'rejected', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `major_sectors`
--

CREATE TABLE `major_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `major_sectors`
--

INSERT INTO `major_sectors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'IT', NULL, NULL),
(3, 'test', '2023-04-03 00:45:43', '2023-04-03 00:45:43'),
(4, 'pharma', '2023-04-03 00:46:19', '2023-04-03 00:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `major_sector_idea`
--

CREATE TABLE `major_sector_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_sector_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `major_sector_idea`
--

INSERT INTO `major_sector_idea` (`id`, `major_sector_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, NULL),
(2, 4, 5, NULL, NULL),
(3, 3, 6, NULL, NULL),
(4, 4, 6, NULL, NULL),
(5, 3, 7, NULL, NULL),
(6, 4, 7, NULL, NULL),
(7, 4, 8, NULL, NULL),
(8, 2, 9, NULL, NULL),
(9, 2, 10, NULL, NULL),
(10, 2, 11, NULL, NULL),
(11, 4, 12, NULL, NULL),
(12, 2, 13, NULL, NULL),
(13, 2, 14, NULL, NULL),
(14, 4, 15, NULL, NULL),
(15, 2, 16, NULL, NULL),
(16, 4, 17, NULL, NULL);

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_03_04_195318_update_table_users', 1),
(16, '2023_03_04_215920_update_table_users_numbers', 2),
(17, '2023_03_05_150604_create_relationship_managers_table', 3),
(18, '2023_03_08_233908_update_users_table_type', 4),
(19, '2023_03_12_234243_create_idea_table', 5),
(20, '2023_03_22_120645_create_categories_table', 6),
(21, '2023_03_22_121825_create_idea_category_table', 7),
(22, '2023_03_22_122933_add_slug_to_categories', 8),
(23, '2023_03_22_132203_add_preferences_to_users', 9),
(24, '2023_03_22_132258_create_user_preferences_table', 9),
(25, '2023_03_24_014109_update_field_category', 10),
(26, '2023_03_24_014936_add_slug_to_ideas', 11),
(28, '2023_03_24_021033_make_categories_nullable', 13),
(29, '2023_03_24_015817_create_idea_category_table', 14),
(30, '2023_03_24_021749_rename_idea_category_to_category_idea_table', 15),
(31, '2023_03_24_030922_drop_categories_column_from_ideas_table', 16),
(32, '2023_03_27_125645_update_idea_table_status', 17),
(36, '2023_04_02_233753_create_currencies_table', 18),
(37, '2023_04_03_004525_add_timestamp_currency_table', 19),
(38, '2023_04_03_010318_create_major_sectors_table', 20),
(39, '2023_04_03_010338_create_minor_sectors_table', 20),
(40, '2023_04_02_233215_update_ideas', 21),
(41, '2023_04_03_012020_create_regions_table', 21),
(42, '2023_04_03_012143_create_countries_table', 21),
(43, '2023_04_03_013701_update_boolean_field_to_enum_in_ideas', 21),
(44, '2023_04_05_001416_update_ideas_table_soft_delete', 22),
(45, '2023_04_05_231044_create_currency_idea_table', 23),
(46, '2023_04_05_232630_remove_currency_idea_table', 23),
(47, '2023_04_06_122306_create_major_sector_idea_table', 24),
(48, '2023_04_06_122744_update_idea_remove_major_minor_sectors', 24),
(49, '2023_04_06_122916_create_minor_sector_idea_table', 24),
(50, '2023_04_06_123443_create_region_idea_table', 24),
(51, '2023_04_06_123452_create_country_idea_table', 24),
(52, '2023_04_06_123646_update_idea_remove_region_country', 24),
(53, '2023_04_11_111715_user_portfolio_idea_table', 25),
(54, '2023_04_11_111821_user_wishlist_idea_table', 25),
(55, '2023_04_11_222324_add_rm_id_to_users_table', 25),
(56, '2023_04_12_235337_add_profile_picture_to_users_table', 26),
(57, '2023_04_13_154412_add_supporting_files_idea_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `minor_sectors`
--

CREATE TABLE `minor_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_sectors_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minor_sectors`
--

INSERT INTO `minor_sectors` (`id`, `name`, `major_sectors_id`, `created_at`, `updated_at`) VALUES
(2, 'TCS', 2, NULL, NULL),
(3, 'Cipla', 4, '2023-04-03 02:03:32', '2023-04-03 02:03:32'),
(4, 'test1', 3, '2023-04-19 09:52:47', '2023-04-19 09:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `minor_sector_idea`
--

CREATE TABLE `minor_sector_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `minor_sector_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minor_sector_idea`
--

INSERT INTO `minor_sector_idea` (`id`, `minor_sector_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, NULL),
(2, 3, 6, NULL, NULL),
(3, 3, 7, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 2, 10, NULL, NULL),
(7, 2, 11, NULL, NULL),
(8, 3, 12, NULL, NULL),
(9, 2, 13, NULL, NULL),
(10, 2, 14, NULL, NULL),
(11, 3, 15, NULL, NULL),
(12, 2, 16, NULL, NULL),
(13, 3, 17, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Asia', '2023-04-06 20:05:31', '2023-04-06 20:05:31'),
(2, 'Europe', '2023-04-06 20:05:38', '2023-04-06 20:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `region_idea`
--

CREATE TABLE `region_idea` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_idea`
--

INSERT INTO `region_idea` (`id`, `region_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, NULL),
(2, 2, 6, NULL, NULL),
(3, 2, 7, NULL, NULL),
(4, 2, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 2, 10, NULL, NULL),
(7, 2, 11, NULL, NULL),
(8, 2, 12, NULL, NULL),
(9, 1, 13, NULL, NULL),
(10, 1, 14, NULL, NULL),
(11, 2, 15, NULL, NULL),
(12, 1, 16, NULL, NULL),
(13, 2, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relationship_managers`
--

CREATE TABLE `relationship_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relationship_managers`
--

INSERT INTO `relationship_managers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'John Doe', 'john@rm.com', NULL, '$2y$10$DYPt6qmOgyhh/OGaFvoCe.Rr5ZtCMTMcnDZDdW5AECHh3ZLttU56G', NULL, '2023-03-05 18:19:08', '2023-03-05 18:19:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client' COMMENT 'admin,rm,client,ideator',
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `profile_picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `number`, `manager_id`) VALUES
(1, 'Test', 'harry@user.com', 'client', '/storage/uploads/Bd1CPZGaMdTXnbZLJnaI7eSTw3tYAiUQDxnotj0n.jpg', NULL, '$2y$10$9JZ7CICqxjbs9id04VG71eY6s7bzsENcn10/iff16XjAYhGSBXfDG', NULL, '2023-03-04 22:00:03', '2023-04-15 12:31:58', '1231231231', 2),
(2, 'Elton Ross', 'rubufum@mailinator.com', 'rm', '/storage/uploads/5zLhOd2pRiRFJqTMFoYjudLGcEBWFtmEWdd7XVCH.jpg', NULL, '$2y$10$qtVntzK.Wbo2BenO7WAK8evteisxMaxhy.79HYRpGSHpWl/uvQElG', NULL, '2023-03-08 12:52:10', '2023-04-17 09:40:44', '1234567890', NULL),
(3, 'Uriah Battle', 'hiha@mailinator.com', 'ideator', '/storage/uploads/FvG79ECs4fDjWQw1aZeZFSbrzgnEcM5LBTZx3wkT.jpg', NULL, '$2y$10$6vLV.WAqB3/Sx4O5VVL0m.AyqjGGUa8sgZb1ZM2GjTUU2GTmtjLEG', NULL, '2023-03-08 15:00:13', '2023-04-17 09:41:41', '1234567896', NULL),
(4, 'Zenaida Waterssa', 'admin@mailinator.com', 'admin', '/storage/uploads/RKt2Rv7PJrJOZIyLk1Z2dXwmP2ouXPYFP4W2KizZ.jpg', NULL, '$2y$10$L65FVU7tyxRcm4gQ4/.ZmukpEj37yC4UErr8.odAWbhXYd9EW7uGy', NULL, '2023-03-09 00:42:26', '2023-04-18 11:30:51', '1234567098', NULL),
(5, 'Clare Conley', 'dicejicuf@mailinator.com', 'client', NULL, NULL, '$2y$10$cDXlsY5fxv8PftoV8AffyuSX7SLFsLVjePkR5WMSorzxxidcOrQyW', NULL, '2023-03-12 20:37:03', '2023-03-12 20:37:03', '3453453453', 2),
(6, 'Jane Hancock', 'kezusi@mailinator.com', 'client', NULL, NULL, '$2y$10$YQFTmmczhO5OvWroSIfLZeEEbxSHP2Q71SWSVTm3agDAHGWkCgCK2', NULL, '2023-03-12 21:00:30', '2023-03-12 21:00:30', '0909094302', 2),
(7, 'Guinevere Meyer', 'bacaqaces@mailinator.com', 'client', NULL, NULL, '$2y$10$FlJSVkav6i1tKKJEE9zZjehi5C2axFv6QJDCpcaseCcISNfsX3qyK', NULL, '2023-03-12 21:35:24', '2023-03-12 21:35:24', '4563453643', 2),
(8, 'Clark Faulkner', 'necux@mailinator.com', 'client', NULL, NULL, '$2y$10$Y26cb6PkgfW1fexm89NOhOp4fIPLLHtgJfWSqfsc240HbSAy1XvMW', NULL, '2023-03-12 22:28:41', '2023-03-12 22:28:41', '1231231234', NULL),
(9, 'Tiger Harris', 'qibaqoto@mailinator.com', 'rm', NULL, NULL, '$2y$10$cxh/mcH95PcgWUX/c69NJ.L04lWdZSnu1TrkI00L42Eb8Cridfyaq', NULL, '2023-03-12 22:33:26', '2023-03-12 22:33:26', '8158745597', NULL),
(10, 'Barclay Morgan', 'tivamywe@mailinator.com', 'ideator', NULL, NULL, '$2y$10$zmdvVgbcc5zUap0jqid.RuJgih2zD.bf2hm7MpDUYlgNZmc0OfZM6', NULL, '2023-03-15 12:50:07', '2023-03-15 12:50:07', '7657657657', NULL),
(11, 'Francesca Butler', 'datunomehu@mailinator.com', 'client', NULL, NULL, '$2y$10$cSLKjnFkGsaed49ynChhoOTMRqGhfyBgmkb7ujprPHMJKcNGCpsuS', NULL, '2023-03-24 03:14:24', '2023-03-24 03:14:24', '6307693475', NULL),
(12, 'Steel Willis', 'vyqikywa@mailinator.com', 'client', NULL, NULL, '$2y$10$aLASz9eY1a7eqzr97czMGO7HU3pVdtf7355O1NTUg0LD4knzrIE0K', NULL, '2023-03-24 10:16:38', '2023-03-24 10:16:38', '8453923497', NULL),
(13, 'Mason Castillo', 'bosi@mailinator.com', 'client', NULL, NULL, '$2y$10$4F6.Ae/aK6WR.8S7dGju..7e1n/anXh2NRV83YY8FDpA7nFBatbWW', NULL, '2023-03-24 10:31:59', '2023-03-24 10:31:59', '0975434587', NULL),
(14, 'Rama Carroll', 'symy@mailinator.com', 'client', NULL, NULL, '$2y$10$PHuokhT6tXCKABQxarzOauVDWr4Pvgt3JswBVmr3LyvcoSV1at34S', NULL, '2023-04-19 09:47:57', '2023-04-19 09:47:57', '7665880815', 9),
(15, 'Orla Jimenez', 'gokefepuse@mailinator.com', 'client', NULL, NULL, '$2y$10$itPjCz3.dKLDpzyLeXo9cecP3729B8thadgvbsdp0mCwPpjJPp0ZK', NULL, '2023-04-23 12:42:03', '2023-04-23 12:42:03', '0867896789', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(2, 1, 3, NULL, NULL),
(6, 1, 6, NULL, NULL),
(8, 1, 7, '2023-04-17 10:47:16', '2023-04-17 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wishlist`
--

INSERT INTO `user_wishlist` (`id`, `user_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2023-04-15 12:31:19', '2023-04-15 12:31:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_idea`
--
ALTER TABLE `category_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_category_idea_id_foreign` (`idea_id`),
  ADD KEY `idea_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_preferences_user_id_foreign` (`user_id`),
  ADD KEY `user_preferences_category_id_foreign` (`category_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_region_id_foreign` (`region_id`);

--
-- Indexes for table `country_idea`
--
ALTER TABLE `country_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_idea_countries_id_foreign` (`countries_id`),
  ADD KEY `country_idea_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_idea`
--
ALTER TABLE `currency_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_idea_currency_id_foreign` (`currency_id`),
  ADD KEY `currency_idea_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`);

--
-- Indexes for table `major_sectors`
--
ALTER TABLE `major_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major_sector_idea`
--
ALTER TABLE `major_sector_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_sector_idea_major_sector_id_foreign` (`major_sector_id`),
  ADD KEY `major_sector_idea_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minor_sectors`
--
ALTER TABLE `minor_sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `minor_sectors_major_sectors_id_foreign` (`major_sectors_id`);

--
-- Indexes for table `minor_sector_idea`
--
ALTER TABLE `minor_sector_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `minor_sector_idea_minor_sector_id_foreign` (`minor_sector_id`),
  ADD KEY `minor_sector_idea_idea_id_foreign` (`idea_id`);

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
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_idea`
--
ALTER TABLE `region_idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_idea_region_id_foreign` (`region_id`),
  ADD KEY `region_idea_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `relationship_managers`
--
ALTER TABLE `relationship_managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relationship_managers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_portfolio_user_id_foreign` (`user_id`),
  ADD KEY `user_portfolio_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wishlist_user_id_foreign` (`user_id`),
  ADD KEY `user_wishlist_idea_id_foreign` (`idea_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_idea`
--
ALTER TABLE `category_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category_user`
--
ALTER TABLE `category_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country_idea`
--
ALTER TABLE `country_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currency_idea`
--
ALTER TABLE `currency_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `major_sectors`
--
ALTER TABLE `major_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `major_sector_idea`
--
ALTER TABLE `major_sector_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `minor_sectors`
--
ALTER TABLE `minor_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `minor_sector_idea`
--
ALTER TABLE `minor_sector_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `region_idea`
--
ALTER TABLE `region_idea`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `relationship_managers`
--
ALTER TABLE `relationship_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_idea`
--
ALTER TABLE `category_idea`
  ADD CONSTRAINT `idea_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `idea_category_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`);

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `user_preferences_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `user_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `country_idea`
--
ALTER TABLE `country_idea`
  ADD CONSTRAINT `country_idea_countries_id_foreign` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `country_idea_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`);

--
-- Constraints for table `currency_idea`
--
ALTER TABLE `currency_idea`
  ADD CONSTRAINT `currency_idea_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `currency_idea_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`);

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `major_sector_idea`
--
ALTER TABLE `major_sector_idea`
  ADD CONSTRAINT `major_sector_idea_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`),
  ADD CONSTRAINT `major_sector_idea_major_sector_id_foreign` FOREIGN KEY (`major_sector_id`) REFERENCES `major_sectors` (`id`);

--
-- Constraints for table `minor_sectors`
--
ALTER TABLE `minor_sectors`
  ADD CONSTRAINT `minor_sectors_major_sectors_id_foreign` FOREIGN KEY (`major_sectors_id`) REFERENCES `major_sectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `minor_sector_idea`
--
ALTER TABLE `minor_sector_idea`
  ADD CONSTRAINT `minor_sector_idea_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`),
  ADD CONSTRAINT `minor_sector_idea_minor_sector_id_foreign` FOREIGN KEY (`minor_sector_id`) REFERENCES `minor_sectors` (`id`);

--
-- Constraints for table `region_idea`
--
ALTER TABLE `region_idea`
  ADD CONSTRAINT `region_idea_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`),
  ADD CONSTRAINT `region_idea_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `user_portfolio_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`),
  ADD CONSTRAINT `user_portfolio_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD CONSTRAINT `user_wishlist_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`),
  ADD CONSTRAINT `user_wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
