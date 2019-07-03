-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Чрв 30 2019 р., 13:02
-- Версія сервера: 8.0.16
-- Версія PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS minishop;
USE minishop;

--
-- База даних: `minishop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `the_order` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `user`, `the_order`) VALUES
(7, 'vadym', 'a:3:{i:3;i:1;i:2;i:1;i:7;i:2;}');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `img_path` varchar(256) NOT NULL,
  `cost` float DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name`, `img_path`, `cost`, `category`) VALUES
(2, 'IKRA mogatex elm 1653', 'ikra_mogatex_elm_1653.jpg', 160.7, 'electro'),
(3, 'Intertool dt-2262', 'intertool_dt-2262.jpg', 260.3, 'electro'),
(4, 'Stige collector 46s', 'stige_collector_46s.jpg', 120.9, 'electro'),
(7, 'Al-Ko Robolinho 500e', 'al_ko_robolinho_500e.jpg', 410.45, 'battery'),
(8, 'Al-Ko Robolinho 4100', 'al_ko_robolinho_4100.jpg', 315.1, 'battery'),
(9, 'Bosch Indego 400 Connect', 'bosch_indego_400_connect.jpg', 300.6, 'battery'),
(10, 'Gardena R50Li', 'gardena_r50li.jpg', 570.4, 'battery'),
(11, 'Gardena Sileno City 250', 'gardena_sileno_city_250.jpg', 730.9, 'battery'),
(12, 'Husqvarna Am 315', 'husqvarna_am_315.jpg', 999.99, 'battery'),
(13, 'Stiga Autoclip M3', 'stiga_autoclip_m3.jpg', 250.99, 'battery'),
(14, 'Al-Ko Highline 528 vsi', 'al_ko_highline_528_vsi.jpg', 410.6, 'gasoline'),
(15, 'Hecht 587', 'hecht_587.png', 230.8, 'gasoline'),
(16, 'Hecht 5060 EU', 'hecht_5060_eu.jpg', 169.99, 'gasoline'),
(17, 'Husqvarna Lc 451s', 'husqvarna_lc_451s.jpg', 180.4, 'gasoline'),
(18, 'Stige Twinclip 55 SVEGB', 'stige_twinclip55sveqb.jpg', 310.35, 'gasoline'),
(19, 'Bosch Arm 37', 'bosch_arm_37.jpg', 305.6, 'electro');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `name` varchar(40) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`name`, `password`) VALUES
('vadym', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
