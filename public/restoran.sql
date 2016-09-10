-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Вер 10 2016 р., 20:47
-- Версія сервера: 5.6.17
-- Версія PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `restoran`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Первое', 'Первое', '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(2, 'Второе', 'Второе', '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(3, 'Десерт', 'Десерт', '2016-09-10 15:47:44', '2016-09-10 15:47:44');

-- --------------------------------------------------------

--
-- Структура таблиці `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп даних таблиці `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Сало', 'Сало Сало Сало', 1, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(2, 'Хліб ', 'Хліб Хліб Хліб ', 1, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(3, 'Борщ ', 'Борщ Борщ Борщ Борщ Борщ', 1, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(4, 'Картопля ', 'Картопля Картопля Картопля Картопля ', 2, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(5, 'Каша ', 'Каша Каша Каша Каша Каша ', 2, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(6, 'Торт ', 'Торт Торт Торт Торт Торт ', 3, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(7, 'Сок ', 'Сок Сок Сок Сок Сок Сок Сок Сок ', 3, '2016-09-10 15:47:44', '2016-09-10 15:47:44');

-- --------------------------------------------------------

--
-- Структура таблиці `dish_order`
--

CREATE TABLE IF NOT EXISTS `dish_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `dish_order`
--

INSERT INTO `dish_order` (`id`, `dish_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_09_095840_create_dish_table', 1),
('2016_09_09_111116_create_orders_table', 1),
('2016_09_09_121626_create_categories_table', 1),
('2016_09_10_122954_create_dish_orders_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sent` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `sent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2016-09-10 15:47:44', '2016-09-10 15:47:44');

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dron', 'drons2p@ukr.net', '$2y$10$wfd4B4RBLzYL6Z.M81JaJufSwlNy0JnMJtLjbRSDfHLCZHIv8IZUq', NULL, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(2, 'Dron', 'drons2p2@ukr.net', '$2y$10$14o0DgNnh0kP.PnxleYCOObvIadvWf3V2/t4jTGPQv.du9/oyDuy.', NULL, '2016-09-10 15:47:44', '2016-09-10 15:47:44'),
(3, 'Dron', 'drons2p3@ukr.net', '$2y$10$naYh9u0HSKoJQ.GKli9s2ecTD32N7c7p2sZ001Uh9VdKbG8vkYaVG', NULL, '2016-09-10 15:47:44', '2016-09-10 15:47:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
