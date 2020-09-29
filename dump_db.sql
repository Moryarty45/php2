-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Сен 29 2020 г., 13:18
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `idx` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `Size` int(11) NOT NULL,
  `Popularity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`idx`, `Name`, `address`, `Size`, `Popularity`) VALUES
(1, 'photo1', '1.jpg', 0, 6),
(2, 'photo2', '2.jpg', 0, 10),
(3, 'photo3', '3.jpg', 0, 26),
(4, 'photo4', '4.jpg', 0, 6),
(5, 'photo5', '5.jpg', 0, 66);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
