-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 25 2022 г., 02:28
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_bd`
--
CREATE DATABASE IF NOT EXISTS `my_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `my_bd`;

-- --------------------------------------------------------

--
-- Структура таблицы `social_info`
--

CREATE TABLE `social_info` (
  `id` int NOT NULL,
  `link_inst` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_linkedIn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `social_info`
--

INSERT INTO `social_info` (`id`, `link_inst`, `link_facebook`, `link_linkedIn`) VALUES
(1, '#', '#', '#'),
(2, '#', '#', '#'),
(3, '#', '#', '#'),
(4, '#', '#', '#');

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prof` varchar(255) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `social_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `link`, `name`, `prof`, `text`, `social_id`) VALUES
(1, 'assets/team/team-1.jpg', 'Ruth Wood', 'Founder', 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.                         Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.', 1),
(2, 'assets/team/team-2.jpg', 'Timothy Reed', 'Chef.co-founder', 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.                         Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.', 2),
(3, 'assets/team/team-3.jpg', 'Victoria Valdez', 'Manager', 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.                         Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.', 3),
(4, 'assets/team/team-4.jpg', 'Bevelry Little', 'Delivery Manager', 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.                         Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `works_images`
--

CREATE TABLE `works_images` (
  `id` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `works_title` varchar(255) NOT NULL,
  `works_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `works_images`
--

INSERT INTO `works_images` (`id`, `link`, `works_title`, `works_text`) VALUES
(1, 'assets/works/work-1.jpg', 'project_1', 'project_1_text'),
(2, 'assets/works/work-2.jpg', 'project_2', 'project_2_text'),
(3, 'assets/works/work-3.jpg', 'project_3', 'project_3_text'),
(4, 'assets/works/work-4.jpg', 'project_4', 'project_4_text'),
(5, 'assets/works/work-5.jpg', 'project_5', 'project_5_text'),
(6, 'assets/works/work-6.jpg', 'project_6', 'project_6_text'),
(7, 'assets/works/work-7.jpg', 'project_7', 'project_7_text'),
(8, 'assets/works/work-8.jpg', 'project_8', 'project_8_text');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `social_info`
--
ALTER TABLE `social_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_id` (`social_id`);

--
-- Индексы таблицы `works_images`
--
ALTER TABLE `works_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `social_info`
--
ALTER TABLE `social_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `works_images`
--
ALTER TABLE `works_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`social_id`) REFERENCES `social_info` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
