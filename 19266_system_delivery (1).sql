-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 13 2022 г., 14:56
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `19266_system_delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `Name_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `idTovar` int(11) NOT NULL,
  `Name_tovar` varchar(100) DEFAULT NULL,
  `Opisanie` varchar(500) DEFAULT NULL,
  `Stoimosti` int(11) DEFAULT NULL,
  `Kategori_idKategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Telegram` varchar(200) DEFAULT NULL,
  `VK` varchar(200) DEFAULT NULL,
  `WatsApp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `Telegram`, `VK`, `WatsApp`) VALUES
(2, 'dima', '$2y$10$ePNpz0rNyUsboLHjBAnMTOYFr1t1B.pV.2qRT2n9FvLAS3OjrFeOa', NULL, NULL, NULL),
(3, 'Ivan', '$2y$10$xoSowild7Sasa32W5OKccuGUzPEvNOYmDD88gI9NMUvzGphtBHM/u', '@Iva', 'https://vk.com/id573812042', 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=19266_system_delivery&table=user'),
(4, 'maximka', '$2y$10$4UEfexgq3RQcXfuzjOQzCebfGqXNtxKjTseRt/zZ2MgQ0PAM0.53u', '@maximka', 'https://vk.com/maximka_98', '89526125545'),
(31, 'Ivan1', '$2y$10$QdAIFrivcI3ys25ifLw1weihyyvSwAmxAiSZsY.3iJpkBX5Nfd3T6', '@csadfsaf', 'https://habr.com/ru/post/519662/', '223412352345'),
(32, 'Nikita', '$2y$10$ka2EP90Y5htiGrmJKZgBb.eXq68MtOXiybTCqgb6/pEFaagpMOHiG', '@Nikita', 'https://vk.com/abxir228', '89999');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazi`
--

CREATE TABLE `zakazi` (
  `idZakazi` int(11) NOT NULL,
  `Opisanie` varchar(200) DEFAULT NULL,
  `Otkuda` varchar(200) DEFAULT NULL,
  `Itog_Stoimosti` varchar(200) DEFAULT NULL,
  `Kuda` varchar(200) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazi`
--

INSERT INTO `zakazi` (`idZakazi`, `Opisanie`, `Otkuda`, `Itog_Stoimosti`, `Kuda`, `User_idUser`) VALUES
(107, 'привезите пожалуйста две однаразки полотенце и фруктов если возможно', 'adfasdf', 'asdfasdfasdf', 'беларусия', 3),
(120, 'adf', 'as', 'adf', 'adf', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`idTovar`,`Kategori_idKategori`),
  ADD KEY `fk_Tovar_Kategori1_idx` (`Kategori_idKategori`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Индексы таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD PRIMARY KEY (`idZakazi`),
  ADD KEY `fk_Zakazi_User_idx` (`User_idUser`),
  ADD KEY `User_idUser` (`User_idUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `idTovar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `zakazi`
--
ALTER TABLE `zakazi`
  MODIFY `idZakazi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `fk_Tovar_Kategori1` FOREIGN KEY (`Kategori_idKategori`) REFERENCES `kategori` (`idKategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD CONSTRAINT `fk_Zakazi_User` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
