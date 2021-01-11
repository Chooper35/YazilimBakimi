-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 11 Oca 2021, 12:50:21
-- Sunucu sürümü: 8.0.21
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `shopapp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Yenercan Barker', 'a@a.com', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`) VALUES
(93, 18, 2),
(96, 18, 3),
(94, 18, 30);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(1000) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `details` varchar(2500) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`, `photo`, `details`, `price`) VALUES
(1, 'iPhone 11 Pro Max', 'iphone11promax.jpg', 'iPhone 11 Pro Max Details', 1000),
(2, 'MSI GE 75 Raider', 'msige75raider.jpg', 'MSI GE 75 Raider Detail', 1250),
(3, 'Razer Ornata Chroma', 'razerornatachroma.jpg', 'Razer Ornata Chroma Details', 90),
(30, 'Test Ürünü', '47007810.jpg', 'Ürün Açıklaması', 2570);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_question_answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone_number`, `email`, `password`, `security_question`, `security_question_answer`) VALUES
(3, 'Ali Kullanıcı', '123123123', 'a@a.com', 'şifre123', '0', 'cyan'),
(14, 'test', '122333444', 'test@test.com', 'test', '2', 'test'),
(19, '3', '33333333333', '3@4e', '33', '0', '33'),
(17, 'testBcrypt', '123', '123@123.com', '123', '1', '123'),
(18, '111', '21', '1@1.com', '111', '3', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
