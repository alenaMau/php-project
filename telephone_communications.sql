-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 05 2024 г., 05:31
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `telephone communications`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abonent_telepnone`
--

CREATE TABLE `abonent_telepnone` (
  `id` int(11) NOT NULL,
  `id_abonent` int(11) NOT NULL,
  `id_telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `abonent_telepnone`
--

INSERT INTO `abonent_telepnone` (`id`, `id_abonent`, `id_telephone`) VALUES
(3, 1, 2),
(9, 1, 3),
(10, 1, 4),
(11, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'administrator'),
(2, 'system_administrator');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `id_type_of_room` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `id_subdivision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id`, `id_type_of_room`, `name`, `id_subdivision`) VALUES
(1, 1, 'room_1', 9),
(2, 1, 'romantic', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `subdivision`
--

CREATE TABLE `subdivision` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `id_type_of_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subdivision`
--

INSERT INTO `subdivision` (`id`, `name`, `id_type_of_unit`) VALUES
(9, 'subvision_1', 1),
(10, 'sub_2', 2),
(11, 'кабинет', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `patronymic` varchar(225) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `id_subdivision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subscriber`
--

INSERT INTO `subscriber` (`id`, `surname`, `name`, `patronymic`, `date_of_birth`, `id_subdivision`) VALUES
(1, 'зеленина', 'Алёна', 'отчество', '28.09.1828', 9),
(3, 'Губарь', 'Таня', 'По батюшке не знаю', '13.05.2004', 9),
(4, 'saddasads', 'adssdaasd', 'adsadsasdsda', 'adsadsads', 11),
(5, 'Корчагина', 'Алина', 'Алексеевна', '8.05.2002', 11),
(11, 'Мамуров', 'Сабир', 'Жамалович', '4.10.2004', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `telephone`
--

CREATE TABLE `telephone` (
  `id` int(11) NOT NULL,
  `number_telephone` varchar(225) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_subdivision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `telephone`
--

INSERT INTO `telephone` (`id`, `number_telephone`, `id_room`, `id_subdivision`) VALUES
(2, '534543534453', 1, 9),
(3, '1234567890', 1, 11),
(4, '987654321', 1, 10),
(5, '89539125882', 1, 9),
(6, 'sdAasgfh', 1, 9),
(7, 'sdAasgfh', 1, 9),
(8, '89539125882', 1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_room`
--

CREATE TABLE `type_of_room` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_of_room`
--

INSERT INTO `type_of_room` (`id`, `type`) VALUES
(1, 'Серый'),
(2, 'Красный');

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_unit`
--

CREATE TABLE `type_of_unit` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_of_unit`
--

INSERT INTO `type_of_unit` (`id`, `type`) VALUES
(1, 'белый'),
(2, 'черный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_rol`) VALUES
(1, 'asdasd@mail.ru', '4297f44b13955235245b2497399d7a93', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abonent_telepnone`
--
ALTER TABLE `abonent_telepnone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_abonent` (`id_abonent`,`id_telephone`),
  ADD KEY `id_telephone` (`id_telephone`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_subdivision` (`id_subdivision`),
  ADD KEY `id_subdivision` (`id_subdivision`),
  ADD KEY `id_type_of_room` (`id_type_of_room`);

--
-- Индексы таблицы `subdivision`
--
ALTER TABLE `subdivision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_of_unit` (`id_type_of_unit`);

--
-- Индексы таблицы `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subdivision` (`id_subdivision`) USING BTREE;

--
-- Индексы таблицы `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`id_room`) USING BTREE,
  ADD KEY `id_subdivision` (`id_subdivision`);

--
-- Индексы таблицы `type_of_room`
--
ALTER TABLE `type_of_room`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_of_unit`
--
ALTER TABLE `type_of_unit`
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
-- AUTO_INCREMENT для таблицы `abonent_telepnone`
--
ALTER TABLE `abonent_telepnone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subdivision`
--
ALTER TABLE `subdivision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `telephone`
--
ALTER TABLE `telephone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `type_of_room`
--
ALTER TABLE `type_of_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_of_unit`
--
ALTER TABLE `type_of_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `abonent_telepnone`
--
ALTER TABLE `abonent_telepnone`
  ADD CONSTRAINT `abonent_telepnone_ibfk_1` FOREIGN KEY (`id_abonent`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abonent_telepnone_ibfk_2` FOREIGN KEY (`id_telephone`) REFERENCES `telephone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_id_subvision` FOREIGN KEY (`id_subdivision`) REFERENCES `subdivision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`id_type_of_room`) REFERENCES `type_of_room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subdivision`
--
ALTER TABLE `subdivision`
  ADD CONSTRAINT `subdivision_ibfk_1` FOREIGN KEY (`id_type_of_unit`) REFERENCES `type_of_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`id_subdivision`) REFERENCES `subdivision` (`id`);

--
-- Ограничения внешнего ключа таблицы `telephone`
--
ALTER TABLE `telephone`
  ADD CONSTRAINT `telephone_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `telephone_ibfk_2` FOREIGN KEY (`id_subdivision`) REFERENCES `subdivision` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
