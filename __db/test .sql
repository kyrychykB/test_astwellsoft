-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 24 2017 г., 17:20
-- Версия сервера: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1511446787),
('m171123_135558_create_shop_table', 1511446790),
('m171123_135846_create_work_table', 1511446790),
('m171124_143942_create_user_table', 1511535061);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name`) VALUES
(1, 'Amazon'),
(2, 'Ebay'),
(3, 'aliexpress'),
(4, 'walmart');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'IU0V_OJHGrPfWIgx2LdiCbOqYvo259ew', '$2y$13$pL/wYuj6iHorRLo7WHNOPOwcwFFk3bbK9AyR8noPoyPMkfKc443X6', NULL, 'admin@gmail.com', 10, 1511535166, 1511535166);

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `date` date NOT NULL,
  `time_open` time DEFAULT NULL,
  `time_close` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `work`
--

INSERT INTO `work` (`id`, `shop_id`, `status`, `date`, `time_open`, `time_close`) VALUES
(1, 1, 0, '2017-12-31', '00:00:00', '00:00:00'),
(2, 2, 1, '2017-11-26', '09:00:00', '18:00:00'),
(3, 3, 1, '2017-11-28', '10:00:00', '19:00:00'),
(4, 4, 1, '2017-11-29', '12:44:00', '19:44:00'),
(5, 4, 1, '2017-11-29', '09:15:00', '16:15:00'),
(6, 2, 0, '2017-11-24', '00:00:00', '00:00:00'),
(7, 1, 1, '2017-11-27', '09:16:00', '18:16:00'),
(8, 1, 1, '2017-11-29', '07:16:00', '21:16:00'),
(9, 3, 1, '2017-11-30', '10:17:00', '20:17:00'),
(10, 2, 0, '2017-12-02', '00:00:00', '00:00:00'),
(11, 1, 0, '2017-12-09', '00:00:00', '00:00:00'),
(12, 4, 0, '2017-12-01', '00:00:00', '00:00:00'),
(13, 4, 1, '2017-11-29', '11:19:00', '17:19:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-work-shop_id` (`shop_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `fk-work-shop_id` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
