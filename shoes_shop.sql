-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 29 2019 г., 14:36
-- Версия сервера: 5.7.25-0ubuntu0.18.04.2
-- Версия PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoes_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shp_manufacturer`
--

CREATE TABLE `shp_manufacturer` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shp_manufacturer`
--

INSERT INTO `shp_manufacturer` (`m_id`, `m_name`) VALUES
(1, 'CALVIN KLEIN'),
(2, 'KISS MOON'),
(3, 'ERNESTO DOLANI'),
(4, 'GIOVANNI FABIANI');

-- --------------------------------------------------------

--
-- Структура таблицы `shp_shoes`
--

CREATE TABLE `shp_shoes` (
  `articul` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT '0',
  `m_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shp_shoes`
--

INSERT INTO `shp_shoes` (`articul`, `s_name`, `price`, `m_id`) VALUES
(475321, 'Women\'s sneakers', 8990, 1),
(475154, 'Women\'s uggs', 7190, 2),
(475872, 'Women\'s shoes', 13790, 3),
(475956, 'Woman\'s pils', 17490, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `shp_shoes_size`
--

CREATE TABLE `shp_shoes_size` (
  `s_id` int(11) NOT NULL,
  `articul` int(11) NOT NULL DEFAULT '0',
  `s_size` int(11) DEFAULT NULL,
  `s_count` int(11) NOT NULL DEFAULT '0',
  `delivered_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shp_shoes_size`
--

INSERT INTO `shp_shoes_size` (`s_id`, `articul`, `s_size`, `s_count`, `delivered_at`) VALUES
(1, 475321, 34, 10, 43200000),
(2, 475321, 35, 15, 43200000),
(3, 475321, 36, 12, 43200000),
(4, 475321, 37, 1, 43200000),
(5, 475321, 38, 5, 43200000),
(6, 475321, 39, 26, 43200000),
(7, 475321, 40, 32, 43200000),
(8, 475154, 34, 11, 18000000),
(9, 475154, 35, 21, 18000000),
(10, 475154, 36, 8, 18000000),
(11, 475154, 37, 7, 18000000),
(12, 475154, 38, 10, 18000000),
(13, 475154, 39, 24, 18000000),
(14, 475154, 40, 20, 18000000),
(15, 475872, 34, 79, 0),
(16, 475872, 35, 24, 0),
(17, 475872, 36, 16, 0),
(18, 475872, 37, 18, 0),
(19, 475872, 38, 3, 0),
(20, 475872, 39, 39, 0),
(21, 475872, 40, 46, 0),
(22, 475956, 34, 2, 64800000),
(23, 475956, 35, 5, 64800000),
(24, 475956, 36, 11, 64800000),
(25, 475956, 37, 0, 64800000),
(26, 475956, 38, 3, 64800000),
(27, 475956, 39, 7, 64800000),
(28, 475956, 40, 14, 64800000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shp_manufacturer`
--
ALTER TABLE `shp_manufacturer`
  ADD PRIMARY KEY (`m_id`);

--
-- Индексы таблицы `shp_shoes`
--
ALTER TABLE `shp_shoes`
  ADD PRIMARY KEY (`articul`),
  ADD KEY `m_id` (`m_id`);

--
-- Индексы таблицы `shp_shoes_size`
--
ALTER TABLE `shp_shoes_size`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shp_manufacturer`
--
ALTER TABLE `shp_manufacturer`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `shp_shoes`
--
ALTER TABLE `shp_shoes`
  MODIFY `articul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475957;
--
-- AUTO_INCREMENT для таблицы `shp_shoes_size`
--
ALTER TABLE `shp_shoes_size`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
