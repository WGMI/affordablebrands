-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 02:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/**/


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affordable_brands`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2021-02-18 05:47:29', '2021-02-18 05:47:29'),
(2, NULL, 1, 'Category 2', 'category-2', '2021-02-18 05:47:29', '2021-02-18 05:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', NULL, NULL),
(2, 'Kitchenware', 'kitchenware', NULL, NULL),
(3, 'Appliances', 'appliances', NULL, NULL),
(4, 'Accessories', 'accessories', '2021-02-19 05:22:45', '2021-02-19 05:22:45'),
(6, 'Additions', 'additions', '2021-03-27 09:40:24', '2021-03-27 09:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 3, NULL, NULL),
(9, 2, 1, NULL, NULL),
(10, 3, 1, NULL, NULL),
(11, 4, 1, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 6, 3, NULL, NULL),
(15, 1, 1, '2021-02-24 04:29:52', '2021-02-24 04:29:52'),
(21, 21, 1, '2021-02-24 07:08:41', '2021-02-24 07:08:41'),
(22, 21, 3, '2021-02-24 07:08:41', '2021-02-24 07:08:41'),
(23, 21, 4, '2021-02-24 07:08:41', '2021-02-24 07:08:41'),
(30, 15, 1, '2021-03-13 06:38:19', '2021-03-13 06:38:19'),
(31, 15, 3, '2021-03-13 06:38:20', '2021-03-13 06:38:20'),
(38, 28, 1, '2021-03-27 09:41:44', '2021-03-27 09:41:44'),
(39, 28, 4, '2021-03-27 09:41:45', '2021-03-27 09:41:45'),
(41, 28, 6, '2021-03-27 09:41:45', '2021-03-27 09:41:45'),
(42, 29, 1, '2021-04-22 05:53:23', '2021-04-22 05:53:23'),
(43, 30, 1, '2021-04-24 09:42:03', '2021-04-24 09:42:03'),
(44, 30, 2, '2021-04-24 09:42:03', '2021-04-24 09:42:03'),
(45, 31, 4, '2021-04-24 09:52:13', '2021-04-24 09:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 8, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 0, '{}', 1),
(57, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 8, 'description', 'rich_text_box', 'Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 8, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 4),
(60, 8, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{}', 5),
(61, 8, 'available', 'checkbox', 'Available', 1, 1, 1, 1, 1, 1, '{\"on\":\"Yes\",\"off\":\"No\"}', 6),
(62, 8, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{}', 7),
(63, 8, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{\"on\":\"Yes\",\"off\":\"No\"}', 8),
(64, 8, 'model', 'text', 'Model', 1, 1, 1, 1, 1, 1, '{\"default\":\"NA\"}', 9),
(65, 8, 'colour', 'text', 'Colour', 1, 1, 1, 1, 1, 1, '{\"default\":\"NA\"}', 10),
(66, 8, 'brand', 'text', 'Brand', 1, 1, 1, 1, 1, 1, '{\"default\":\"NA\"}', 11),
(67, 8, 'tax', 'number', 'Tax', 1, 1, 1, 1, 1, 1, '{\"default\":0}', 12),
(68, 8, 'information', 'rich_text_box', 'Information', 1, 1, 1, 1, 1, 1, '{}', 13),
(69, 8, 'additional_information', 'text_area', 'Additional Information', 1, 1, 1, 1, 1, 1, '{\"default\":\"NA\"}', 14),
(70, 8, 'quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, '{}', 15),
(71, 8, 'sku', 'text', 'Sku', 1, 1, 1, 1, 1, 1, '{}', 16),
(72, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 17),
(73, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 18),
(74, 9, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 0, '{}', 1),
(75, 9, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(76, 9, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{}', 3),
(77, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(78, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(79, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(80, 10, 'product_id', 'number', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(81, 10, 'category_id', 'number', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(82, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(83, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(84, 8, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 6),
(85, 11, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 0, '{}', 1),
(86, 11, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(87, 11, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(88, 11, 'county', 'text', 'County', 1, 1, 1, 1, 1, 1, '{}', 4),
(89, 11, 'city', 'text', 'City', 1, 1, 1, 1, 1, 1, '{}', 5),
(90, 11, 'street', 'text', 'Street', 1, 1, 1, 1, 1, 1, '{}', 6),
(91, 11, 'zip', 'text', 'Zip', 0, 1, 1, 1, 1, 1, '{}', 7),
(92, 11, 'phone', 'text', 'Phone', 1, 1, 1, 1, 1, 1, '{}', 8),
(93, 11, 'payment', 'text', 'Payment', 1, 1, 1, 1, 1, 1, '{}', 9),
(94, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 10),
(95, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(96, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(97, 16, 'category_id', 'hidden', 'Category Id', 1, 0, 0, 1, 1, 1, '{}', 2),
(98, 16, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(99, 16, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{}', 4),
(100, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 5),
(101, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2021-02-18 05:46:46', '2021-02-18 05:46:46'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-02-18 05:46:46', '2021-02-18 05:46:46'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-02-18 05:46:47', '2021-02-18 05:46:47'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2021-02-18 05:47:25', '2021-02-18 05:47:25'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2021-02-18 05:47:30', '2021-02-18 05:47:30'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2021-02-18 05:47:34', '2021-02-18 05:47:34'),
(8, 'products', 'products', 'Product', 'Products', 'voyager-bag', 'App\\Product', NULL, '\\App\\Http\\Controllers\\Voyager\\ProductsController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-02-19 04:40:35', '2021-04-24 09:51:11'),
(9, 'category', 'category', 'Category', 'Categories', 'voyager-categories', 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-02-19 05:21:30', '2021-02-19 05:21:30'),
(10, 'category_product', 'category-product', 'Category Product', 'Category Products', 'voyager-tag', 'App\\CategoryProduct', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-02-19 05:28:28', '2021-02-19 05:29:08'),
(11, 'orders', 'orders', 'Order', 'Orders', 'voyager-buy', 'App\\Order', NULL, '\\App\\Http\\Controllers\\Voyager\\OrdersController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-03-02 05:40:25', '2021-03-02 05:47:38'),
(16, 'sub_categories', 'sub-categories', 'Sub Category', 'Sub Categories', 'voyager-double-right', 'App\\SubCategory', NULL, '\\App\\Http\\Controllers\\Voyager\\SubCategoriesController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-04-27 03:59:45', '2021-04-27 05:33:56');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-02-18 05:46:50', '2021-02-18 05:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-02-18 05:46:50', '2021-02-18 05:46:50', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 9, '2021-02-18 05:46:51', '2021-04-27 04:00:41', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 8, '2021-02-18 05:46:51', '2021-04-27 04:00:41', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 7, '2021-02-18 05:46:51', '2021-04-27 04:00:41', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2021-02-18 05:46:52', '2021-04-27 04:00:37', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-02-18 05:46:52', '2021-02-19 05:15:40', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-02-18 05:46:52', '2021-02-19 05:15:40', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-02-18 05:46:52', '2021-02-19 05:15:40', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-02-18 05:46:52', '2021-02-19 05:15:40', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2021-02-18 05:46:52', '2021-04-27 04:00:37', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 12, '2021-02-18 05:47:28', '2021-04-27 04:00:37', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 10, '2021-02-18 05:47:33', '2021-04-27 04:00:42', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 11, '2021-02-18 05:47:36', '2021-04-27 04:00:37', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2021-02-18 05:47:42', '2021-02-19 05:15:40', 'voyager.hooks', NULL),
(15, 1, 'Products', '', '_self', 'voyager-bag', NULL, NULL, 2, '2021-02-19 04:40:37', '2021-02-19 05:15:49', 'voyager.products.index', NULL),
(16, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 3, '2021-02-19 05:21:31', '2021-02-19 05:22:03', 'voyager.category.index', NULL),
(17, 1, 'Category Products', '', '_self', 'voyager-tag', NULL, NULL, 5, '2021-02-19 05:28:29', '2021-04-27 04:00:41', 'voyager.category-product.index', NULL),
(18, 1, 'Orders', '', '_self', 'voyager-buy', '#000000', NULL, 6, '2021-03-02 05:40:26', '2021-04-27 04:00:41', 'voyager.orders.index', 'null'),
(19, 1, 'Sub Categories', '', '_self', 'voyager-double-right', NULL, NULL, 4, '2021-04-27 03:59:45', '2021-04-27 04:00:41', 'voyager.sub-categories.index', NULL);

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
(4, '2021_01_27_065443_create_products_table', 1),
(5, '2021_02_15_083805_create_categories_table', 1),
(6, '2021_02_15_085126_create_category_product_table', 2),
(7, '2016_01_01_000000_add_voyager_user_fields', 3),
(8, '2016_01_01_000000_create_data_types_table', 3),
(9, '2016_05_19_173453_create_menu_table', 3),
(10, '2016_10_21_190000_create_roles_table', 3),
(11, '2016_10_21_190000_create_settings_table', 3),
(12, '2016_11_30_135954_create_permission_table', 3),
(13, '2016_11_30_141208_create_permission_role_table', 3),
(14, '2016_12_26_201236_data_types__add__server_side', 3),
(15, '2017_01_13_000000_add_route_to_menu_items_table', 3),
(16, '2017_01_14_005015_create_translations_table', 3),
(17, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 3),
(18, '2017_03_06_000000_add_controller_to_data_types_table', 3),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 3),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 3),
(21, '2017_08_05_000000_add_group_to_settings_table', 3),
(22, '2017_11_26_013050_add_user_role_relationship', 3),
(23, '2017_11_26_015000_create_user_roles_table', 3),
(24, '2018_03_11_000000_add_user_settings', 3),
(25, '2018_03_14_000000_add_details_to_data_types_table', 3),
(26, '2018_03_16_000000_make_settings_value_nullable', 3),
(27, '2016_01_01_000000_create_pages_table', 4),
(28, '2016_01_01_000000_create_posts_table', 4),
(29, '2016_02_15_204651_create_categories_table', 4),
(30, '2017_04_11_000000_alter_post_nullable_fields_table', 4),
(32, '2021_03_01_080838_create_orders_table', 5),
(33, '2021_03_01_104221_create_order_product_table', 6),
(34, '2021_04_24_123351_change_product_desc_and_info', 7),
(35, '2021_04_24_124802_change_product_add_info', 8),
(36, '2021_04_27_061502_create_sub_categories_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `email`, `county`, `city`, `street`, `zip`, `phone`, `payment`, `created_at`, `updated_at`) VALUES
(1, 2, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-03-01 08:13:11', '2021-03-01 08:13:11'),
(2, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-03-02 06:05:04', '2021-03-02 06:05:04'),
(3, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-02 06:08:31', '2021-03-02 06:08:31'),
(4, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:35:13', '2021-03-06 10:35:13'),
(5, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:35:29', '2021-03-06 10:35:29'),
(6, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:35:54', '2021-03-06 10:35:54'),
(7, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:37:22', '2021-03-06 10:37:22'),
(8, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:46:54', '2021-03-06 10:46:54'),
(9, 2, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-03-06 10:47:01', '2021-03-06 10:47:01'),
(10, 2, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-03-06 10:48:06', '2021-03-06 10:48:06'),
(11, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-06 10:48:21', '2021-03-06 10:48:21'),
(12, NULL, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-12 05:29:57', '2021-03-12 05:29:57'),
(13, NULL, 't@t.test', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-12 06:11:52', '2021-03-12 06:11:52'),
(14, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-03-13 06:00:34', '2021-03-13 06:00:34'),
(15, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-04-23 05:33:14', '2021-04-23 05:33:14'),
(16, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-04-23 05:33:14', '2021-04-23 05:33:14'),
(17, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '0708627024', 'mod', '2021-04-23 05:33:14', '2021-04-23 05:33:14'),
(18, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 05:53:28', '2021-04-23 05:53:28'),
(19, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 05:54:07', '2021-04-23 05:54:07'),
(20, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 06:06:18', '2021-04-23 06:06:18'),
(21, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 06:15:34', '2021-04-23 06:15:34'),
(22, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 06:20:42', '2021-04-23 06:20:42'),
(23, 1, 'admin@admin.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-23 06:21:04', '2021-04-23 06:21:04'),
(24, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-23 06:21:24', '2021-04-23 06:21:24'),
(25, 1, 'imo.muganda21@gmail.com', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-24 05:20:55', '2021-04-24 05:20:55'),
(26, NULL, 'imo.muganda21@gmail.comm', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-24 05:22:30', '2021-04-24 05:22:30'),
(27, NULL, 'imo.muganda21@gmail.comm', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-24 05:23:58', '2021-04-24 05:23:58'),
(28, NULL, 'imo.muganda21@gmail.comm', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-24 05:24:29', '2021-04-24 05:24:29'),
(29, NULL, 'admin@admin.comm', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+10708627024', 'mod', '2021-04-24 05:26:37', '2021-04-24 05:26:37'),
(30, NULL, 'imo.muganda21@gmail.comm', 'Nairobi', 'Nairobi', 'Nairobi', '00506', '+254708627024', 'mod', '2021-04-24 05:27:25', '2021-04-24 05:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2021-03-01 08:13:11', '2021-03-01 08:13:11'),
(2, 2, 2, 1, '2021-03-02 06:05:04', '2021-03-02 06:05:04'),
(3, 3, 1, 1, '2021-03-02 06:08:31', '2021-03-02 06:08:31'),
(4, 3, 2, 1, '2021-03-02 06:08:31', '2021-03-02 06:08:31'),
(5, 3, 3, 1, '2021-03-02 06:08:31', '2021-03-02 06:08:31'),
(6, 4, 1, 1, '2021-03-06 10:35:14', '2021-03-06 10:35:14'),
(7, 5, 1, 1, '2021-03-06 10:35:29', '2021-03-06 10:35:29'),
(8, 6, 1, 1, '2021-03-06 10:35:54', '2021-03-06 10:35:54'),
(9, 7, 1, 2, '2021-03-06 10:37:22', '2021-03-06 10:37:22'),
(10, 10, 1, 1, '2021-03-06 10:48:06', '2021-03-06 10:48:06'),
(11, 11, 1, 1, '2021-03-06 10:48:21', '2021-03-06 10:48:21'),
(12, 12, 1, 1, '2021-03-12 05:29:57', '2021-03-12 05:29:57'),
(13, 13, 1, 1, '2021-03-12 06:11:52', '2021-03-12 06:11:52'),
(14, 14, 2, 2, '2021-03-13 06:00:35', '2021-03-13 06:00:35'),
(15, 14, 3, 1, '2021-03-13 06:00:36', '2021-03-13 06:00:36'),
(16, 16, 1, 2, '2021-04-23 05:33:17', '2021-04-23 05:33:17'),
(17, 17, 1, 2, '2021-04-23 05:33:17', '2021-04-23 05:33:17'),
(18, 15, 1, 2, '2021-04-23 05:33:17', '2021-04-23 05:33:17'),
(19, 18, 2, 1, '2021-04-23 05:53:29', '2021-04-23 05:53:29'),
(20, 19, 1, 1, '2021-04-23 05:54:07', '2021-04-23 05:54:07'),
(21, 20, 2, 1, '2021-04-23 06:06:19', '2021-04-23 06:06:19'),
(22, 21, 2, 1, '2021-04-23 06:15:35', '2021-04-23 06:15:35'),
(23, 22, 1, 1, '2021-04-23 06:20:43', '2021-04-23 06:20:43'),
(24, 23, 2, 1, '2021-04-23 06:21:04', '2021-04-23 06:21:04'),
(25, 24, 2, 1, '2021-04-23 06:21:24', '2021-04-23 06:21:24'),
(26, 25, 2, 1, '2021-04-24 05:20:55', '2021-04-24 05:20:55'),
(27, 26, 5, 1, '2021-04-24 05:22:30', '2021-04-24 05:22:30'),
(28, 27, 5, 1, '2021-04-24 05:23:59', '2021-04-24 05:23:59'),
(29, 28, 5, 1, '2021-04-24 05:24:29', '2021-04-24 05:24:29'),
(30, 29, 6, 1, '2021-04-24 05:26:37', '2021-04-24 05:26:37'),
(31, 30, 2, 1, '2021-04-24 05:27:25', '2021-04-24 05:27:25'),
(32, 30, 3, 2, '2021-04-24 05:27:25', '2021-04-24 05:27:25'),
(33, 30, 11, 1, '2021-04-24 05:27:25', '2021-04-24 05:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2021-02-18 05:47:37', '2021-02-18 05:47:37');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(2, 'browse_bread', NULL, '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(3, 'browse_database', NULL, '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(4, 'browse_media', NULL, '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(5, 'browse_compass', NULL, '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(6, 'browse_menus', 'menus', '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(7, 'read_menus', 'menus', '2021-02-18 05:46:53', '2021-02-18 05:46:53'),
(8, 'edit_menus', 'menus', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(9, 'add_menus', 'menus', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(10, 'delete_menus', 'menus', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(11, 'browse_roles', 'roles', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(12, 'read_roles', 'roles', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(13, 'edit_roles', 'roles', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(14, 'add_roles', 'roles', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(15, 'delete_roles', 'roles', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(16, 'browse_users', 'users', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(17, 'read_users', 'users', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(18, 'edit_users', 'users', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(19, 'add_users', 'users', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(20, 'delete_users', 'users', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(21, 'browse_settings', 'settings', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(22, 'read_settings', 'settings', '2021-02-18 05:46:54', '2021-02-18 05:46:54'),
(23, 'edit_settings', 'settings', '2021-02-18 05:46:55', '2021-02-18 05:46:55'),
(24, 'add_settings', 'settings', '2021-02-18 05:46:55', '2021-02-18 05:46:55'),
(25, 'delete_settings', 'settings', '2021-02-18 05:46:55', '2021-02-18 05:46:55'),
(26, 'browse_categories', 'categories', '2021-02-18 05:47:28', '2021-02-18 05:47:28'),
(27, 'read_categories', 'categories', '2021-02-18 05:47:28', '2021-02-18 05:47:28'),
(28, 'edit_categories', 'categories', '2021-02-18 05:47:28', '2021-02-18 05:47:28'),
(29, 'add_categories', 'categories', '2021-02-18 05:47:29', '2021-02-18 05:47:29'),
(30, 'delete_categories', 'categories', '2021-02-18 05:47:29', '2021-02-18 05:47:29'),
(31, 'browse_posts', 'posts', '2021-02-18 05:47:33', '2021-02-18 05:47:33'),
(32, 'read_posts', 'posts', '2021-02-18 05:47:33', '2021-02-18 05:47:33'),
(33, 'edit_posts', 'posts', '2021-02-18 05:47:33', '2021-02-18 05:47:33'),
(34, 'add_posts', 'posts', '2021-02-18 05:47:33', '2021-02-18 05:47:33'),
(35, 'delete_posts', 'posts', '2021-02-18 05:47:34', '2021-02-18 05:47:34'),
(36, 'browse_pages', 'pages', '2021-02-18 05:47:36', '2021-02-18 05:47:36'),
(37, 'read_pages', 'pages', '2021-02-18 05:47:36', '2021-02-18 05:47:36'),
(38, 'edit_pages', 'pages', '2021-02-18 05:47:36', '2021-02-18 05:47:36'),
(39, 'add_pages', 'pages', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(40, 'delete_pages', 'pages', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(41, 'browse_hooks', NULL, '2021-02-18 05:47:42', '2021-02-18 05:47:42'),
(42, 'browse_products', 'products', '2021-02-19 04:40:36', '2021-02-19 04:40:36'),
(43, 'read_products', 'products', '2021-02-19 04:40:36', '2021-02-19 04:40:36'),
(44, 'edit_products', 'products', '2021-02-19 04:40:36', '2021-02-19 04:40:36'),
(45, 'add_products', 'products', '2021-02-19 04:40:36', '2021-02-19 04:40:36'),
(46, 'delete_products', 'products', '2021-02-19 04:40:36', '2021-02-19 04:40:36'),
(47, 'browse_category', 'category', '2021-02-19 05:21:31', '2021-02-19 05:21:31'),
(48, 'read_category', 'category', '2021-02-19 05:21:31', '2021-02-19 05:21:31'),
(49, 'edit_category', 'category', '2021-02-19 05:21:31', '2021-02-19 05:21:31'),
(50, 'add_category', 'category', '2021-02-19 05:21:31', '2021-02-19 05:21:31'),
(51, 'delete_category', 'category', '2021-02-19 05:21:31', '2021-02-19 05:21:31'),
(52, 'browse_category_product', 'category_product', '2021-02-19 05:28:28', '2021-02-19 05:28:28'),
(53, 'read_category_product', 'category_product', '2021-02-19 05:28:28', '2021-02-19 05:28:28'),
(54, 'edit_category_product', 'category_product', '2021-02-19 05:28:28', '2021-02-19 05:28:28'),
(55, 'add_category_product', 'category_product', '2021-02-19 05:28:28', '2021-02-19 05:28:28'),
(56, 'delete_category_product', 'category_product', '2021-02-19 05:28:28', '2021-02-19 05:28:28'),
(57, 'browse_orders', 'orders', '2021-03-02 05:40:25', '2021-03-02 05:40:25'),
(58, 'read_orders', 'orders', '2021-03-02 05:40:25', '2021-03-02 05:40:25'),
(59, 'edit_orders', 'orders', '2021-03-02 05:40:25', '2021-03-02 05:40:25'),
(60, 'add_orders', 'orders', '2021-03-02 05:40:25', '2021-03-02 05:40:25'),
(61, 'delete_orders', 'orders', '2021-03-02 05:40:25', '2021-03-02 05:40:25'),
(62, 'browse_sub_categories', 'sub_categories', '2021-04-27 03:59:45', '2021-04-27 03:59:45'),
(63, 'read_sub_categories', 'sub_categories', '2021-04-27 03:59:45', '2021-04-27 03:59:45'),
(64, 'edit_sub_categories', 'sub_categories', '2021-04-27 03:59:45', '2021-04-27 03:59:45'),
(65, 'add_sub_categories', 'sub_categories', '2021-04-27 03:59:45', '2021-04-27 03:59:45'),
(66, 'delete_sub_categories', 'sub_categories', '2021-04-27 03:59:45', '2021-04-27 03:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
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
(39, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-02-18 05:47:34', '2021-02-18 05:47:34'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\r\n                <h2>We can use all kinds of format!</h2>\r\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-02-18 05:47:34', '2021-02-18 05:47:34'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-02-18 05:47:34', '2021-02-18 05:47:34'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\r\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\r\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-02-18 05:47:34', '2021-02-18 05:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` double(8,2) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `images`, `available`, `slug`, `featured`, `model`, `colour`, `brand`, `tax`, `information`, `additional_information`, `quantity`, `sku`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Bag', '<p>Waterproof, stylish, laptop, colourful bag</p>', 2000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', '[\"products\\\\February2021\\\\NxXdisaQUVqsDcdXB3IZ.jpg\",\"products\\\\February2021\\\\WbfAWDSFznGtws39cFkB.jpg\",\"products\\\\February2021\\\\Cfl50BiyKmPISYDOtyUI.jpg\",\"products\\\\February2021\\\\gqMMrWrrGBXo4V2OYc1Q.jpg\"]', 1, 'LaptopBag', 0, 'NA', 'Yellow', 'NA', 0.00, '<p>qwerty</p>', '<p>qwerty</p>', 0, 'qwerty', '2021-01-26 22:40:12', '2021-04-23 06:20:43'),
(2, 'Laptop', '<p>HP 250GB SSD 16GB RAM</p>', 200000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'Laptop', 1, 'LG', 'Silver', 'LG', 0.00, '<p>qerty</p>', '<p>qerty</p>', 0, 'qwerty', '2021-01-26 22:40:12', '2021-04-24 05:27:30'),
(3, 'Headphones', '<p>Bluetooth Headphones Noise cancelling</p>', 4000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', '[\"products\\\\February2021\\\\NxXdisaQUVqsDcdXB3IZ.jpg\",\"products\\\\February2021\\\\WbfAWDSFznGtws39cFkB.jpg\",\"products\\\\February2021\\\\Cfl50BiyKmPISYDOtyUI.jpg\",\"products\\\\February2021\\\\gqMMrWrrGBXo4V2OYc1Q.jpg\"]', 1, 'Headphones', 1, 'LG', 'White', 'NA', 0.00, '<p>qwerty</p>', '<p>qwerty</p>', 4, 'qwerty', '2021-01-26 22:40:12', '2021-04-24 05:27:30'),
(4, 'Bluetooth Speaker', 'Bluetooth Speaker all devices compatible', 8000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'BluetoothSpeaker', 1, '', '', '', 0.00, '', '', 6, '', '2021-01-26 22:40:12', '2021-01-26 22:40:12'),
(5, 'Earphones', 'Sony Earphones all devices compatible', 500, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'Earphones', 1, '', '', '', 0.00, '', '', 5, '', '2021-01-26 22:40:12', '2021-04-24 05:24:37'),
(6, 'Earpods', 'Sony Earpods all devices compatible', 600, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'Earpods', 0, '', '', '', 0.00, '', '', 5, '', '2021-01-26 22:40:12', '2021-04-24 05:26:41'),
(7, 'Voltaire PC', 'High end gaming PC', 2000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'voltairepc', 0, '', '', '', 0.00, '', '', 6, '', '2021-01-26 22:40:12', '2021-01-26 22:40:12'),
(9, 'Keyes PC', 'High end work PC', 200000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'keyespc', 0, '', '', '', 0.00, '', '', 6, '', '2021-01-26 22:40:12', '2021-01-26 22:40:12'),
(11, 'Rene PC', 'High end AI PC', 200000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'renepc', 0, '', '', '', 0.00, '', '', 5, '', '2021-01-26 22:40:12', '2021-04-24 05:27:30'),
(12, 'RBC Headphones', 'Bluetooth Headphones Noise cancelling', 4000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'RBC Headphones', 0, '', '', '', 0.00, '', '', 6, '', '2021-01-26 22:40:12', '2021-01-26 22:40:12'),
(15, 'Mouse', '<p>Bluetooth mouse</p>', 2000, 'products\\February2021\\VlfgebLWjN2L847uXk96.jpg', '[\"products\\\\February2021\\\\yKbfOMFxkx7tJoIXxcvP.jpg\",\"products\\\\February2021\\\\ra8zmEjIhGqtTgjblHDM.jpg\"]', 0, 'mouse', 1, 'Mouse', 'Black', 'Rat', 0.00, '<p>Great mouse</p>', '<p>Really great mouse</p>', 6, 'qwerty', '2021-02-24 04:38:26', '2021-02-24 04:38:26'),
(20, 'Gaming Mouse', '<p>Mouse for high speed gaming</p>', 200, 'products\\February2021\\j6wkcsHzOUSpPtsNODu2.jpg', NULL, 1, 'gamingmse', 1, 'test', 'test', 'test', 0.00, '<p>test</p>', '<p>test</p>', 6, 's', '2021-02-24 04:47:10', '2021-02-24 04:47:10'),
(21, 'Gaming Mouse', '<p>Mouse for high speed gaming</p>', 250, 'products\\February2021\\CcQYq4SOLxmrG5Fn04Xl.jpg', NULL, 0, 'gamingmouse', 1, 'test', 'test', 'test', 0.00, '<p>test</p>', '<p>test</p>', 6, 's', '2021-02-24 04:47:52', '2021-02-24 04:47:52'),
(24, 'LG Phone', '<p>Great phone. 32 GB storage</p>', 24994, 'products\\March2021\\LEqy1gC3HmR3mHNjqiiy.jpg', '[\"products\\\\March2021\\\\6OkP6VUmjsuV8jpEznxB.jpg\",\"products\\\\March2021\\\\ej2uBABVHj2znNBXS9Hs.jpg\"]', 1, 'lgphone2', 0, 'LG', 'Blue', 'LG', 0.00, '<p>USB C</p>', '<p>NA</p>', 6, 'qwerty', '2021-03-13 06:25:03', '2021-03-13 06:26:59'),
(28, 'Keyes Home PC', '<p>High end work PC</p>', 200000, 'products\\February2021\\BxnU0WYckYMX25J7nWWS.jpg', NULL, 1, 'keyeshomepc', 0, 'na', 'white', 'na', 0.00, '<p>na</p>', '<p>na</p>', 6, 'qwerty', '2021-01-26 22:40:12', '2021-03-27 09:37:41'),
(29, 'LG Phone S', '<p>LG Phone (the new one)</p>', 20000, 'products\\April2021\\7cidBrwPrUxkYV1OI54B.jpg', NULL, 1, 'lgphones', 0, 'LG', 'Silver', 'LG', 0.00, '<p>Great</p>', '<p>Great</p>', 7, 'qwerty', '2021-04-22 05:53:22', '2021-04-22 05:53:22'),
(30, 'test', '<p>HP EliteBook 8460P&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</p>\r\n<p>With Intel Core i5 Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</p>\r\n<p>This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</p>\r\n<p>&nbsp;</p>\r\n<p>The metal lid on the 8460P&nbsp; is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp; Ports and WebcamOn the right side of the 8460P&nbsp; is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</p>', 10, 'products\\April2021\\Wp3HmXgxE6Rkh6PU2n2k.jpg', NULL, 1, 'testprod', 0, 'NA', 'Black', 'NA', 0.00, '<p>HP EliteBook 8460P&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</p>\r\n<p>With Intel Core i5 Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</p>\r\n<p>This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</p>\r\n<p>&nbsp;</p>\r\n<p>The metal lid on the 8460P&nbsp; is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp; Ports and WebcamOn the right side of the 8460P&nbsp; is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</p>', '<p>HP EliteBook 8460P&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</p>\r\n<p>With Intel Core i5 Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</p>\r\n<p>This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</p>\r\n<p>&nbsp;</p>\r\n<p>The metal lid on the 8460P&nbsp; is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp; Ports and WebcamOn the right side of the 8460P&nbsp; is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</p>', 10, 'qwerty', '2021-04-24 09:42:03', '2021-04-24 09:42:03'),
(31, 'test2', '<p><strong style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">HP EliteBook 8460P</strong><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">With&nbsp;Intel Core i5&nbsp;Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">The metal lid on the 8460P&nbsp;&nbsp;is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp;&nbsp;Ports and WebcamOn the right side of the 8460P&nbsp;&nbsp;is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</span><strong style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">HP EliteBook 8460P</strong><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</span></p>\r\n<p><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">With&nbsp;Intel Core i5&nbsp;Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">The metal lid on the 8460P&nbsp;&nbsp;is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp;&nbsp;Ports and WebcamOn the right side of the 8460P&nbsp;&nbsp;is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</span></p>', 1000, 'products\\April2021\\pu2vLL6KJFcVuiJXqjFT.jpg', NULL, 1, 'test2', 0, 'NA', 'NA', 'NA', 0.00, '<p><strong style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">HP EliteBook 8460P</strong><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">With&nbsp;Intel Core i5&nbsp;Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">The metal lid on the 8460P&nbsp;&nbsp;is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp;&nbsp;Ports and WebcamOn the right side of the 8460P&nbsp;&nbsp;is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</span><strong style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">HP EliteBook 8460P</strong><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">&nbsp; has made everyday computing&nbsp; easier. With the HP EliteBook 8460P Notebook PC you enjoy true reliability on the road or at home with a simple, yet powerful value-packed Notebook that gets the job done.</span></p>\r\n<p><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">With&nbsp;Intel Core i5&nbsp;Processor and 4GB Memory, the EliteBook 8460 makes for a speedy and efficient PC. The 500 GB Hard Drive provides ample space to store all crucial data safely.</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">This HP 8460P comes equipped with an Intel Core i5 processor to ensure fast processing of data for your heavy tasks and browsing</span><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><br style=\"box-sizing: border-box; color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\" /><span style=\"color: #282828; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Segoe UI\', \'Helvetica Neue\', Arial, sans-serif;\">The metal lid on the 8460P&nbsp;&nbsp;is not just for looks; it also helps protect the notebook from the hazards of travel, being able to withstand up to 300 pounds of pressure. Also, a spill-resistant keyboard with drains keeps small amounts of liquid from damaging the system&nbsp;&nbsp;Ports and WebcamOn the right side of the 8460P&nbsp;&nbsp;is a DVD drive, Ethernet, modem, and a combo eSATA/USB 2.0 port that can provide juice to USB-powered devices even when the system is off. On the left are three more USB ports, FireWire, headphone and mic, and an ExpressCard/54 slot. On the front edge is an SD Card reader, and on the back is VGA and DisplayPort connections for outputting video to a larger screen.&nbsp;</span></p>', 'NA', 100, 'qwerty', '2021-04-24 09:52:13', '2021-04-24 09:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-02-18 05:46:52', '2021-02-18 05:46:52'),
(2, 'user', 'Normal User', '2021-02-18 05:46:53', '2021-02-18 05:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Affordable Brands', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Administrator Suite', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.quantity_threshold', 'Quantity Threshold', '5', NULL, 'text', 6, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 2, 'q', 'w', '2021-04-27 04:33:13', '2021-04-27 04:34:16'),
(2, 1, 'test', 'testslug', '2021-04-27 05:06:22', '2021-04-27 05:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2021-02-18 05:47:37', '2021-02-18 05:47:37'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2021-02-18 05:47:38', '2021-02-18 05:47:38'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2021-02-18 05:47:39', '2021-02-18 05:47:39'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2021-02-18 05:47:40', '2021-02-18 05:47:40'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2021-02-18 05:47:40', '2021-02-18 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '2021-04-22 07:59:08', '$2y$10$uy.Gd1broIJZJxIhBRXcKuaigWDg7DoammRqjYQlxqXQe13we9aLu', 'DgHyvbW3agxMSr5smXR7WVbJ67zXmA42FBNvIzfNGUjvCSAVV7C8YmLn66rl', NULL, '2021-02-18 05:47:30', '2021-04-23 09:25:58'),
(2, 2, 'Will', 'a@a.com', 'users/default.png', NULL, '$2y$10$wC.NpJaw4iUZ3.0IwuPoQeWT0g0vyc5wYQllBjuPDa5JCETjWUiGi', NULL, NULL, '2021-02-22 08:12:53', '2021-02-22 08:12:55'),
(3, 2, 'John', 'b@b.b', 'users/default.png', NULL, '$2y$10$nRCmp4UK6d/E5mt7q8q4E.60Y0Dun5pULovGOU/0wUqKlbr.9l9qu', NULL, NULL, '2021-02-23 05:36:37', '2021-02-23 05:36:37'),
(4, 1, 'Will Imo', 'w@w.com', 'users/default.png', NULL, '$2y$10$Jsb9P9hHSBWKWMkBBL2/UeVorqSLPeyhZYUacBWnm2NnuhOkh43oq', NULL, '{\"locale\":\"en\"}', '2021-03-13 06:20:07', '2021-03-13 06:20:54'),
(5, 2, 'Will', 'w@w.ww', 'users/default.png', '2021-04-22 07:59:08', '$2y$10$83jP1FrvwrPRnLdcPJaxpuqFbxab6qOwwp0bppwUKJyZBZKJPQXYi', NULL, NULL, '2021-04-24 07:51:41', '2021-04-24 07:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_name_unique` (`name`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
