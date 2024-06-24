-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2022 г., 17:11
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_todolist_main`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE `todo` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `case` varchar(250) NOT NULL,
  `data_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `todo`
--

INSERT INTO `todo` (`id`, `user_id`, `case`, `data_time`) VALUES
(2, 35, 'дело 1', '2022-01-06 19:09:11'),
(7, 2222, 'пить', '2022-01-06 21:01:37'),
(8, 2222, 'пить', '2022-01-06 21:01:59'),
(12, 35, 'пить', '2022-01-06 21:06:55'),
(16, 35, 'Принести воды, искупаться в речке, попить воды', '2022-01-06 21:10:36'),
(17, 37, 'Купить еды', '2022-01-07 16:54:22'),
(19, 37, 'Зарядка', '2022-01-07 16:55:27'),
(20, 36, 'Зарядка', '2022-01-07 17:15:25'),
(21, 36, 'Принести воды', '2022-01-07 17:20:30');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `nikname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `hash` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nikname`, `email`, `password`, `role`, `hash`) VALUES
(35, 'Nik', 'bjiax@yandex.ru', '$2y$10$CZ1xTNNMEWeqfio48jc/3OlS8pfYl6HjFQWMhE1SBUN6Y6hhabFbu', 0, '58903315496e2d8f21ba5f5cb7254a07181db9ab4fd216f9769b2870e43fd97176ac36d188aea374'),
(36, 'DIM', 'bjiax1@yandex.ru', '$2y$10$x361eWHDDl8D336MtiCivOZx0L86.MCSNuZCGymV0Rv1TfNrwlhm.', 0, '70529b5401f30b3f8f7d6c669f1e6ee1364cb09c57273ae29c007eef0fed59a6f95f32c08f5c8f72'),
(37, 'VAN', 'bjiax10@yandex.ru', '$2y$10$Mzt1E6yrIG8EKkebPi.Q5e4VR37xDErlTVYgTIccyu/e.cfrnrdly', 0, '5586a3e8f75a0b3fc9cf836a1b51537f99341f15c035ab245c008a2a9fcb5390b251fda3bf4b5363');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
