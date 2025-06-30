-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2024 г., 20:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoesStore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(655) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `image`) VALUES
(1, 'О нас', 'Компания «ОБУВЬПРЕСТИЖ» более 20 лет занимается производством практичной женской и мужской обуви. Все это время мы работали исключительно с оптовыми клиентами, однако в 2016 году мы представили в России свою новую торговую марку — «ОБУВЬПРЕСТИЖ». Она разработана специально для розничного рынка в ответ на многочисленные пожелания и запросы клиентов. «ОБУВЬПРЕСТИЖ» — это оптимальное сочетание качества, универсального стиля и невысокой цены. Модели разработаны с учетом потребительского спроса. Они отличаются комфортностью, легкостью и простотой в уходе. Носите с удовольствием!', 'about-picture.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `address`, `phone`, `email`, `mode`) VALUES
(1, 'г. Барнаул, 85 Гвардейской Дивизии, 55', '+7-953-036-1955', 'shoes_Prestige@mail.ru', 'Ежедневно с 12:00 до 20:00');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `about` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `new` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `about`, `old_price`, `price`, `hit`, `new`, `image`) VALUES
(1, 'Ботинки мужские Rieker', 'Кожаные теплые мужские ботинки кеды для активного отдыха с шнурками. Высокие кроссовки с мехом со спортивным подкладом для мужчин противостоят влаге и обеспечивают надежное сцепление со скользкой поверхностью в любое время года благодаря резиновой подошве с протектором.', '10000₽', '7000₽', 'Хит', '', 'shoes_picture-1.jpg'),
(2, 'Тимберленды мужские quattrocomforto', 'Коричневые тимберленды из кожаного спилка идеально завершат повседневные образы мужчин в зимний сезон. Подкладка из шерсти практически не промокает, благодаря чему ногам будет комфортно и сухо.', '', '10000₽', '', 'New', 'shoes_picture-2.jpg'),
(3, 'Мужские кроссовки New Balance 725', '725 — повседневные кроссовки в ретро-стиле, вобравшие в себя удобство и стилистические особенности беговой линейки New Balance 2000-х годов.', '22399₽', '18499₽', '', '', 'shoes_picture-8.jpg'),
(4, 'Полуботинки Salamander мужские', 'Стильные мужские дерби выполнены из натуральной кожи высокого качества. Пара идеально подойдет как под джинсы, так и под брюки. Трендовая подошва с глубоким протектором и контрастной прострочкой ранта повысит ощущение комфорта за счет своей невесомости.', '', '12000₽', 'Хит', 'New', 'shoes_picture-5.jpg'),
(5, 'Женские челси MAISON DAVID', 'При создании каждой пары используются только премиальные материалы и комплектующие.', '', '11999₽', '', '', 'shoes_picture-4.jpg'),
(6, 'Женские туфли VERSACE JEANS COUTURE SCARLETT', 'Кожаные туфли-лодочки на высоком каблуке с острым носком украшены декоративной фурнитурой с выгравированным логотипом на кончике носка.', '25000₽', '21999₽', 'Хит', '', 'shoes_picture-6.jpg'),
(7, 'Мужские высокие кеды ADIDAS FORUM MID', 'Культовая баскетбольная модель 80-х в новом исполнении! Легендарные кроссы, которые доминировали на площадках, возвращаются с новым дизайном, чтобы покорять улицы современного города. Кроссовки adidas Forum Mid — твой стиль на новом уровне.', '17000₽', '15000₽', 'Хит', 'New', 'shoes_picture-7.jpg'),
(8, 'Мужские кроссовки ASICS GT-1000 11', 'Промежуточная подошва разной плотности обеспечивает умеренную поддержку, что позволяет использовать кроссовки как людям с гиперпронацией, так и с нейтральной постановкой стопы.', '', '13999₽', '', 'New', 'shoes_picture-3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `phone`, `password`) VALUES
(9, 'vladislav', 'vladq@mail.ru', '+7 (923) 192-57-88', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'max', 'zxc@mail.ru', '+7 (953) 123-45-80', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'eva', 'asd@mail.ru', '+7 (913) 623-27-97', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'ivan', 'vlad12@mail.ru', '+7 (923) 567-67-67', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'slava', 'slavaq@mail.ru', '+7 (953) 036-78-91', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, '123', '123@mail.ru', '+7 (123) 123-12-31', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, '1234', '1234@mail.ru', '+7 (123) 123-12-31', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
