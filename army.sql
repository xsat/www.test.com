-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 11 2016 г., 07:36
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `army`
--

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` bigint(20) unsigned NOT NULL,
  `position_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `rank` varchar(128) NOT NULL,
  `email` int(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id`, `position_id`, `name`, `rank`, `email`, `birthday`, `photo`) VALUES
(13, 26, 'ÐÐ½Ñ‚Ð¾Ð½Ñ‡Ð¸Ðº', 'Ð¡Ð¾Ð»Ð´Ð°Ñ‚', 0, '1990-01-21', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `id` bigint(20) unsigned NOT NULL,
  `person_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `_order` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id`, `person_id`, `name`, `number`, `_order`) VALUES
(4, 13, '', '234', 2),
(5, 13, '', '1', 5),
(6, 13, '', '5', 1),
(7, 13, '1', '23', 3),
(8, 13, '', '5', 4),
(9, 13, '', '6', 6),
(10, 13, '', '7', 7),
(11, 13, '', '4', 8),
(12, 13, '', '7', 9),
(13, 13, '', '5', 10),
(14, 13, '', '7', 11),
(15, 13, '', '4', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` bigint(20) unsigned NOT NULL,
  `place_id` bigint(20) unsigned DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `level` int(5) DEFAULT NULL,
  `_order` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `place_id`, `name`, `alias`, `level`, `_order`) VALUES
(7, 0, 'Ð¥Ð°Ñ€ÐºÑ–Ð² Ð·Ð°Ð³Ñ–Ð½', 'Ð¥Ð°Ñ€ÐºÑ–Ð² Ð·Ð°Ð³Ñ–Ð½', 0, 1),
(8, 7, 'Ð’ÐŸÐ¡ Ð’ÐµÑÐµÐ»Ðµ', 'Ð’ÐŸÐ¡ Ð’ÐµÑÐµÐ»Ðµ', 0, 3),
(9, 7, 'Ð’ÐŸÐ¡ Ð“Ð¾Ð¿Ñ‚Ñ–Ð²ÐºÐ°', 'Ð’ÐŸÐ¡ Ð“Ð¾Ð¿Ñ‚Ñ–Ð²ÐºÐ°', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` bigint(20) unsigned NOT NULL,
  `place_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(128) DEFAULT NULL,
  `level` int(5) DEFAULT NULL,
  `_order` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `place_id`, `name`, `rank`, `level`, `_order`) VALUES
(26, 7, 'Ð¢ÐµÑ…Ð½Ñ–Ðº', 'Ð¡Ð¾Ð»Ð´Ð°Ñ‚', NULL, 3),
(27, 0, 'Ð¢ÐµÑ…Ð½Ñ–Ðº', 'Ð¡Ð¾Ð»Ð´Ð°Ñ‚', NULL, 2),
(28, 7, '123', 'ÐŸÑ€Ð°Ð¿Ð¾Ñ€Ñ‰Ð¸Ðº', NULL, 1),
(29, 8, '23423', 'Ð›ÐµÐ¹Ñ‚ÐµÐ½Ð°Ð½Ñ‚', NULL, 4),
(30, 0, '23423', 'Ð›ÐµÐ¹Ñ‚ÐµÐ½Ð°Ð½Ñ‚', NULL, 5),
(31, 0, '23423', 'Ð›ÐµÐ¹Ñ‚ÐµÐ½Ð°Ð½Ñ‚', NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'test', 'ËÁb*3¾97b_ûvë\n»Mo%ãh$£Î[]nU\r™]»htíêt¤k+|×Þ@¾sÎ4øOu~ºµ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
