-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 30 2017 г., 00:50
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todomanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lists`
--

CREATE TABLE `lists` (
  `caption` varchar(32) NOT NULL,
  `id` int(11) NOT NULL,
  `userId` int(64) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lists`
--

INSERT INTO `lists` (`caption`, `id`, `userId`) VALUES
('toDo for toDoManager', 6, 1),
('Guitar', 7, 1),
('Wise Learning', 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `listId` int(11) NOT NULL COMMENT 'To create relationships with lists',
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `title` varchar(64) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `expiredBy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `listId`, `active`, `title`, `description`, `expiredBy`) VALUES
(13, 6, '1', 'PDO+OOP', 'Full refactoring to PDO+OOP', '2017-03-29'),
(14, 6, '0', 'Time of life task', 'Need to add fields in DB;\nNeed to create function for set time of life task;', '2017-03-29'),
(15, 6, '1', 'Telegram', 'Work on telegram sender if time of life for task <= 2 days', '2017-03-29'),
(16, 6, '0', 'Pagination', 'Add a pagination	    ', '2017-03-29'),
(18, 6, '0', 'isActive', 'Now added a field with bool type `active`;\r\nNeed to show a icon for task status;\r\nNeed to can change task status.	    	    	    	    	    ', '2017-03-29'),
(19, 6, '0', 'Fields with values', 'At the editions forms need to change attribute of filds "value"	.', '2017-03-29'),
(21, 7, '1', 'House of the Rising Sun', 'Learn this song', '2017-04-30'),
(22, 6, '0', 'Data in tasks', '	    		    		    	Need to realize a "enter"	    	    	    ', '2017-03-29'),
(23, 10, '1', 'Registration', 'Complete a registration script', '2017-03-31'),
(24, 6, '1', 'Work with users', 'Add registration;\r\nAdd auth;\r\nRework lists and tasks for users', '2017-04-08'),
(25, 6, '1', 'Statuses', 'Showing task status;\r\nShowing counter active/all tasks in list;', '2017-04-15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `chatId` int(64) NOT NULL DEFAULT '1',
  `salt` varchar(100) NOT NULL,
  `ipp` int(3) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `chatId`, `salt`, `ipp`) VALUES
(1, 'Ksardarion', '097ebd28c84c8e4e7f0769aec2446f6d', 130561339, '58dc4c8f90113', 5),
(2, 'Admin', '097ebd28c84c8e4e7f0769aec2446f6d', 1, '58dc4c8f90113', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT для таблицы `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
