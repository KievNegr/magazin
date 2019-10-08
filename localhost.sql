-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 02 2013 г., 10:52
-- Версия сервера: 5.5.28-0ubuntu0.12.10.2
-- Версия PHP: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `my_shop`
--
CREATE DATABASE `my_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `dt` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id_brand`, `name`, `text`, `image`, `dt`, `ip`, `login`) VALUES
(14, 'Apple', '<p>Самая дорогая контора в мире</p>', 'Apple-Logo2.png', '2012-10-23 16:24:04', '127.0.0.1', 'Admin'),
(15, 'Samsung', '<p>Galaxy</p>', 'samsung.png', '2012-08-03 14:53:21', '127.0.0.1', 'Admin'),
(16, 'Аtlas', '<p>Производитель видеорегистраторов</p>', 'no_brand.png', '2012-11-02 13:37:03', '127.0.0.1', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` int(11) NOT NULL,
  `rewrite` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  `image` varchar(64) NOT NULL,
  `dt` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `sub_category`, `rewrite`, `name`, `title`, `description`, `text`, `sort`, `image`, `dt`, `ip`, `login`) VALUES
(25, 0, 'computers', 'Компьютерная техника', 'Компьютерная техника', 'Компьютерная техника', '<p>Компы, ноуты, планшеты</p>', 1, 'computers.png', '2012-08-02 17:51:27', '127.0.0.1', 'Admin'),
(26, 25, 'tabletpc', 'Планшетные ПК', 'Планшетные ПК', 'Планшетные ПК', '<p>Планшетные компы</p>', 1, 'planshet.jpg', '2012-11-15 19:07:22', '127.0.0.1', 'Admin'),
(27, 0, 'mobilnuie-ustrostva', 'Мобильные устройства', 'Мобильные устройства', 'Мобильные устройства', '<p>Мобильные устройства</p>', 1, 'mobile.png', '2012-08-03 14:47:43', '127.0.0.1', 'Admin'),
(28, 27, 'smartfonui', 'Смартфоны', 'Смартфоны', 'Смартфоны', '<p>Смартфоны</p>', 1, 'mobile1.png', '2012-08-03 14:48:30', '127.0.0.1', 'Admin'),
(29, 26, 'chehlui-dlya-planshetnuih-kompyuterov', 'Чехлы для планшетных компьютеров', 'Чехлы для планшетных компьютеров', 'Чехлы для планшетных компьютеров', '<p>Чехлы для планшетных компьютеров</p>', 1, 'chexli.png', '2012-08-09 15:59:58', '127.0.0.1', 'Admin'),
(30, 26, 'zashchitnuie-plenki', 'Защитные пленки', 'Защитные пленки для планшетов', 'Защитные пленки', '<p>Защитные пленки</p>', 1, 'plenka.png', '2012-08-09 18:37:02', '127.0.0.1', 'Admin'),
(31, 27, 'mobilnuie-telefonui', 'Мобильные телефоны', 'Мобильные телефоны', 'Мобильные телефоны', '<p>Мобильные телефоны</p>', 1, 'b2710_12.png', '2012-08-09 21:24:59', '127.0.0.1', 'Admin'),
(32, 0, 'avtomobilnaya-elektronika', 'Автомобильная электроника', 'Автомобильная электроника', 'Автомобильная электроника', '<p>Автомобильная электроника</p>', 1, 'auto.png', '2012-08-10 13:52:42', '127.0.0.1', 'Admin'),
(33, 32, 'videoregistratorui', 'Видеорегистраторы', 'Видеорегистраторы', 'Видеорегистраторы', '<p>Видеорегистраторы</p>', 1, 'videoreg.png', '2012-08-10 13:54:31', '127.0.0.1', 'Admin'),
(34, 25, 'noutbuki', 'Ноутбуки', 'Ноутбуки', 'Ноуты', '<p>Ноутбуки на различную производительность</p>', 1, 'notebook.jpg', '2012-11-15 19:06:17', '127.0.0.1', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name_city` varchar(100) NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id_city`, `name_city`) VALUES
(1, 'Киев'),
(2, 'Чернигов'),
(3, 'Харьков');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_images` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `alt` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img_boss` int(11) NOT NULL,
  PRIMARY KEY (`id_images`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_images`, `id_product`, `id_page`, `alt`, `name`, `img_boss`) VALUES
(68, 73, 0, '', '1.png', 1),
(77, 73, 0, '', '2.png', 0),
(80, 73, 0, '', '3.png', 0),
(81, 74, 0, '', '1.jpg', 1),
(82, 74, 0, '', '2.jpg', 0),
(83, 74, 0, '', '3.jpg', 0),
(84, 74, 0, '', '4.jpg', 0),
(85, 74, 0, '', '5.jpg', 0),
(86, 75, 0, '', '4.png', 1),
(87, 76, 0, '', '11.png', 1),
(88, 76, 0, '', '21.png', 0),
(89, 76, 0, '', '31.png', 0),
(90, 76, 0, '', '41.png', 0),
(91, 76, 0, '', '5.png', 0),
(92, 77, 0, '', 'samsung-b7722-white-duos_1.jpg', 1),
(93, 77, 0, '', 'samsung_b7722i_pure_white_1.jpg', 0),
(95, 78, 0, '', '11.jpg', 1),
(96, 79, 0, '', 'large_12Dec2011_17-21-57iphone-4-1_jpg.jpg', 1),
(97, 79, 0, '', 'large_12Dec2011_17-21-57iphone-4-2_jpg.jpg', 0),
(99, 79, 0, '', 'large_12Dec2011_17-21-57iphone-4-4_jpg.jpg', 0),
(100, 79, 0, '', 'large_12Dec2011_17-21-57iphone-4-5_jpg.jpg', 0),
(101, 77, 0, '', 'gray.jpg', 0),
(102, 82, 0, '', 'atlas_vr1_0.jpg', 1),
(103, 83, 0, '', '12.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `money`
--

CREATE TABLE IF NOT EXISTS `money` (
  `id_money` int(11) NOT NULL AUTO_INCREMENT,
  `name_money` varchar(100) NOT NULL,
  `key_money` varchar(5) NOT NULL,
  `exchange_money` float NOT NULL,
  `default_money` int(11) NOT NULL,
  `view_money` int(11) NOT NULL,
  `boss` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_money`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `money`
--

INSERT INTO `money` (`id_money`, `name_money`, `key_money`, `exchange_money`, `default_money`, `view_money`, `boss`, `data`) VALUES
(1, 'Доллар', 'USD', 1, 1, 0, 0, '2012-11-12 19:58:43'),
(2, 'Гривна', 'грн', 8.2, 0, 1, 0, '2012-11-12 20:02:00');

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id_option` int(11) NOT NULL AUTO_INCREMENT,
  `name_option` varchar(100) NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id_option`, `name_option`) VALUES
(20, 'Процессор'),
(21, 'Диагональ экрана'),
(22, 'Разрешение экрана'),
(23, 'Оперативная память'),
(24, 'Обьем памяти'),
(25, 'Wi-Fi'),
(26, 'GSM'),
(27, 'Bluetooth'),
(28, 'GPS'),
(29, 'Операционная система'),
(30, 'Количество ядер'),
(31, 'Разрешение видео'),
(32, 'Запись звука');

-- --------------------------------------------------------

--
-- Структура таблицы `options_for_category`
--

CREATE TABLE IF NOT EXISTS `options_for_category` (
  `id_ofc` int(11) NOT NULL AUTO_INCREMENT,
  `id_option` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_ofc`),
  KEY `id_option` (`id_option`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- Дамп данных таблицы `options_for_category`
--

INSERT INTO `options_for_category` (`id_ofc`, `id_option`, `id_category`) VALUES
(79, 24, 28),
(80, 24, 26),
(81, 25, 28),
(82, 25, 26),
(83, 26, 28),
(84, 26, 26),
(85, 27, 28),
(86, 27, 26),
(87, 28, 28),
(88, 28, 26),
(89, 29, 28),
(90, 29, 26),
(96, 30, 28),
(97, 30, 26),
(107, 31, 33),
(108, 32, 33),
(131, 20, 34),
(132, 20, 28),
(133, 20, 26),
(134, 21, 34),
(135, 21, 28),
(136, 21, 26),
(137, 22, 34),
(138, 22, 31),
(139, 22, 26),
(140, 23, 34),
(141, 23, 28),
(142, 23, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `options_for_product`
--

CREATE TABLE IF NOT EXISTS `options_for_product` (
  `id_ofp` int(11) NOT NULL AUTO_INCREMENT,
  `id_option` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `text_option` varchar(500) NOT NULL,
  PRIMARY KEY (`id_ofp`),
  KEY `id_option` (`id_option`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Дамп данных таблицы `options_for_product`
--

INSERT INTO `options_for_product` (`id_ofp`, `id_option`, `id_product`, `text_option`) VALUES
(48, 20, 73, '1 ГГц'),
(49, 21, 73, '9.7'),
(50, 22, 73, '1024x768'),
(51, 23, 73, '512 МБ'),
(52, 24, 73, '32 Гб'),
(53, 25, 73, '+'),
(54, 26, 73, '+'),
(55, 27, 73, '+'),
(56, 28, 73, '+'),
(57, 29, 73, 'iOS'),
(58, 20, 74, '1,4 ГГц'),
(59, 21, 74, '5.3'),
(61, 23, 74, '1 ГБ'),
(62, 24, 74, '16/32 ГБ'),
(63, 25, 74, '+'),
(64, 26, 74, '+'),
(65, 27, 74, '+'),
(66, 28, 74, '+'),
(67, 29, 74, 'Android'),
(68, 20, 76, '1 ГГц'),
(69, 21, 76, '10.1'),
(70, 22, 76, '1280x800'),
(71, 23, 76, '1 ГБ'),
(72, 24, 76, '16 ГБ'),
(73, 25, 76, '+'),
(74, 26, 76, '-'),
(75, 27, 76, '+'),
(76, 28, 76, '+'),
(77, 29, 76, 'Android'),
(78, 20, 79, '800 МГц'),
(79, 21, 79, '3,5'),
(81, 23, 79, '512 Мб'),
(82, 24, 79, '8 Гб'),
(83, 25, 79, '+'),
(84, 26, 79, '+'),
(85, 27, 79, '+'),
(86, 28, 79, '+'),
(87, 29, 79, 'iOS'),
(88, 30, 79, '2'),
(89, 30, 76, '2'),
(90, 30, 73, '1'),
(91, 30, 74, '2'),
(94, 31, 82, '1280x960'),
(95, 32, 82, 'Да'),
(96, 31, 78, '640x480'),
(97, 32, 78, 'Да'),
(99, 22, 77, '640x480'),
(100, 20, 83, '2,9 ГГц'),
(101, 21, 83, '17'),
(102, 22, 83, '1440х1280'),
(103, 23, 83, '2 Гб');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `id_order_products` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` varchar(32) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_order_products`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id_order_products`, `id_orders`, `id_product`, `price`, `qty`) VALUES
(23, '2fea7ee85a7b5217a90a63ac3b74ca21', 77, 1654, 1),
(24, '8e5af896f5370b218d083c93aa887b91', 77, 1654, 1),
(25, '11d9ce45f30f015589d27a2a9deea09b', 79, 5455, 1),
(29, 'e27946ae23e75640aac97298918ff58a', 79, 5455, 1),
(32, 'e5c9e44b28d452506dd416a0015f643b', 77, 1654, 1),
(33, 'e5c9e44b28d452506dd416a0015f643b', 76, 4000, 1),
(34, '96b5171c07af2a10cc352952f3d22f47', 78, 350, 3),
(35, '96b5171c07af2a10cc352952f3d22f47', 82, 300, 1),
(36, '', 78, 350, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `key_order` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `key_order`, `status`) VALUES
(16, '2fea7ee85a7b5217a90a63ac3b74ca21', 1),
(17, 'e27946ae23e75640aac97298918ff58a', 1),
(18, '8e5af896f5370b218d083c93aa887b91', 1),
(19, '11d9ce45f30f015589d27a2a9deea09b', 1),
(20, 'e5c9e44b28d452506dd416a0015f643b', 3),
(21, '96b5171c07af2a10cc352952f3d22f47', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `rewrite` varchar(200) NOT NULL,
  `h1` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id_page`, `title`, `rewrite`, `h1`, `description`, `keywords`, `text`, `dt`) VALUES
(1, 'Помощь', 'help-page', 'Помощь', 'Помощь в работе с магазином', 'Помощь, магазин, FAQ', '<p>Поможем, расскажем<img style="max-width: 100%; float: left; margin: 10px;" src="../images/upload/1484741.png" alt="" width="200" height="184" /></p>', '2012-08-14 00:00:00'),
(2, 'Оплата', 'oplata', 'Оплата товара', 'Оплата товара, варианты', 'оплата', '<p>оплата товаров блеать</p>', '2012-10-17 18:40:20');

-- --------------------------------------------------------

--
-- Структура таблицы `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `id_pay` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `name_pay` varchar(100) NOT NULL,
  `markup` float NOT NULL,
  PRIMARY KEY (`id_pay`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pay`
--

INSERT INTO `pay` (`id_pay`, `data`, `name_pay`, `markup`) VALUES
(1, '2012-10-19 15:13:17', 'Наличная оплата', 0),
(2, '2012-06-11 20:07:51', 'Web Money', 3),
(3, '2012-06-05 18:05:39', 'Безналичная оплата', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `rewrite` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `price` int(11) NOT NULL,
  `dt` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `temp` int(11) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `id_brand`, `rewrite`, `name`, `title`, `description`, `text`, `price`, `dt`, `ip`, `login`, `temp`) VALUES
(73, 26, 14, 'planshetnui-kompyuter-apple-ipad-2-a1395-wi-fi-32gb-black', 'Apple iPad 2 A1395 Wi-Fi 32GB Black', 'Планшетный компьютер Apple iPad 2 A1395 Wi-Fi 32GB Black', 'Планшетный компьютер Apple iPad 2 A1395 Wi-Fi 32GB Black', '<p>Злопиздатый планшетный компьютер Apple&nbsp;iPad 2 A1395 Wi-Fi 32GB Black</p>', 5400, '2012-08-02 18:00:55', '', '', 0),
(74, 28, 15, 'samsung-galaxy-note', 'Samsung Galaxy Note', 'Samsung Galaxy Note', 'Samsung Galaxy Note', '<p>Samsung Galaxy Note &mdash; это телефон для успешных и уверенных в себе людей!&nbsp;</p>', 6654, '2012-08-03 14:54:26', '', '', 0),
(75, 29, 14, 'chehol-dlya-ipad-3', 'Чехол для iPad 3', 'Чехол для iPad 3', 'Чехол для iPad 3', '<p>Чехол для iPad 3</p>', 820, '2012-08-09 16:41:54', '', '', 0),
(76, 26, 15, 'samsung-galaxy-tab-2-10-1-gt-p5100-silver', 'Samsung galaxy tab 2 10.1 (GT-P5100) Silver', 'Samsung galaxy tab 2 10.1 (GT-P5100) Silver', 'Samsung galaxy tab 2 10.1 (GT-P5100) Silver', '<p><span>Планшет Samsung Galaxy Tab 2 10.1 (Wi-Fi+3g) Titanium Silver (GT-P5100) - это легендарное продолжение линейки Samsung Galaxy Tab, в котором сосредоточены все передовые технологии и функции. Операционная система Android 4.0 (Ice Cream Sandwich) обеспечивает стабильную работу и высокую производительность, и, кроме того, имеет усовершенствованную функциональность.&nbsp;</span></p>', 4000, '2012-08-09 17:16:33', '', '', 0),
(77, 31, 15, 'samsung-b7722i-white-ucrf', 'Samsung B7722i White UCRF', 'Samsung B7722i White UCRF', 'Samsung B7722i White UCRF', '<p><span>Экран 3.2", 240x400, сенсорный / Камера 5 Мп / Wi-Fi 802.11 b/g / Bluetooth 2.1 / microSD до 16Гб / Поддержка 2-х СИМ-карт / 3G / Черный&nbsp;</span></p>', 1654, '2012-08-09 21:15:09', '', '', 0),
(78, 33, 14, 'videoregistrator-cyclon-dvr-50', 'Видеорегистратор CYCLON DVR-50', 'Видеорегистратор CYCLON DVR-50', 'Видеорегистратор CYCLON DVR-50', '<p><span>CYCLON DVR-50 - Видеорегистратор&nbsp;</span><br /><br /><span>Угол обзора 120 градусов&nbsp;</span><br /><span>Разрешение 640X480&nbsp;</span><br /><span>Откидной дисплей с диагональю 2,5" и углом поворота 270 градусов&nbsp;</span><br /><span>Скорость кадров в секунду: 10, 20, 30&nbsp;</span><br /><span>Режим записи: автоматическая при включении, по датчику движения&nbsp;</span><br /><span>Видеоформат AVI (H264)&nbsp;</span><br /><span>Интревал записи в минутах 2,5,15&nbsp;</span><br /><span>Cлот для карт памяти SD/MMC&nbsp;</span><br /><span>Питание: внешняя Li-ion батарея или от прикуривателя авто 12V&nbsp;</span><br /><span>Встроенный микрофон&nbsp;</span><br /><span>Меню на русском языке&nbsp;</span><br /><span>Интерфейс USB 2.0&nbsp;</span><br /><span>ИК подсветка для ночной съемки&nbsp;</span><br /><span>Поддержка карт SD до 32GB&nbsp;</span></p>', 350, '2012-08-10 13:54:33', '', '', 0),
(79, 28, 14, 'apple-iphone-4s-16gb-black', 'Apple iPhone 4S 16Gb Black', 'Apple iPhone 4S 16Gb Black', 'Apple iPhone 4S 16Gb Black', '<p>В новом iPhone 4S за скорость работы отвечает двухъядерный процессор Apple A5</p>', 5455, '2012-08-10 14:04:44', '', '', 0),
(80, 0, 0, '', '', '', '', '', 0, '2012-11-02 13:39:51', '', '', 1),
(81, 0, 0, '', '', '', '', '', 0, '2012-11-02 13:41:56', '', '', 1),
(82, 33, 16, 'videoregistrator-atlas-vr1', 'Видеорегистратор Atlas VR1', 'Видеорегистратор Atlas VR1', 'Видеорегистратор Atlas VR1', '<ul class="short-detail">\r\n<li>Количество камер:&nbsp;1</li>\r\n<li>Разрешение сенсора:&nbsp;3 Мп</li>\r\n<li>Разрешение видео:&nbsp;1280x960</li>\r\n<li>Запись звука:&nbsp;Да<span id="copyinfo"><br /></span></li>\r\n</ul>', 300, '2012-11-02 13:43:28', '', '', 0),
(83, 34, 15, 'noutbuk-samsung-np300e7z-np300e7z-s02ru-silver', 'Ноутбук Samsung NP300E7Z (NP300E7Z-S02RU) Silver', 'Ноутбук Samsung NP300E7Z (NP300E7Z-S02RU) Silver', 'Ноутбук Samsung NP300E7Z (NP300E7Z-S02RU) Silver', '<p>Ноутбук / Samsung / 17'''' / Двухъядерный Intel Pentium B950 / От 2,2 до 2,9 ГГц / DDR3 / 2 Gb / HDD / 500 Гб / DVD Super Multi / nVidia GeForce GT 520M / Bluetooth, Wi-Fi, Ethernet / 0.3 MPix / Silver<span id="ctrlcopy"></span></p>', 520, '2012-11-15 19:09:09', '', '', 0),
(84, 0, 0, '', '', '', '', '', 0, '2012-11-20 19:05:27', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(200) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id_setting`, `name`, `value`, `width`, `height`) VALUES
(1, 'title_shop', 'Интернет-магазин у Спиридона Емельяновича', 0, 0),
(2, 'count_item_page', '30', 0, 0),
(3, 'image_list_item', '', 220, 160),
(4, 'image_boss_item', '', 270, 170),
(5, 'image_preview_item', '', 50, 50),
(6, 'image_category', '', 100, 70),
(7, 'image_logo_brand', '', 100, 100),
(8, 'description', 'Интернет магазин Спиридона Емельяновича по продаже разной электрохуйни', 0, 0),
(9, 'keywords', 'купить, техника, мобильный телефон, смартфон, магазин', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id_shipping` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `name_shipping` varchar(100) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id_shipping`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `shipping`
--

INSERT INTO `shipping` (`id_shipping`, `data`, `name_shipping`, `price`) VALUES
(1, '2012-06-05 17:46:52', 'Самовывоз', 0),
(2, '2012-06-11 20:18:28', 'Доставка курьером', 25),
(3, '2012-10-19 15:38:24', 'Автолюкс ', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `color` varchar(7) NOT NULL,
  `data` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name`, `color`, `data`, `ip`, `login`) VALUES
(1, 'В ожидании', '#f68e54', '2012-10-22 14:55:45', '127.0.0.1', 'Admin'),
(3, 'Выполнено', '', '2012-10-17 18:37:37', '127.0.0.1', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
  `id_tax` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `tax_val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `taxes`
--

INSERT INTO `taxes` (`id_tax`, `name`, `type`, `tax_val`) VALUES
(0, 'НДС', 1, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users_orders`
--

CREATE TABLE IF NOT EXISTS `users_orders` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `key_orders` varchar(32) NOT NULL,
  `name_user` varchar(300) NOT NULL,
  `mail_user` varchar(100) NOT NULL,
  `phone_user` varchar(100) NOT NULL,
  `fax_user` varchar(100) NOT NULL,
  `city_user` int(11) NOT NULL,
  `street_user` varchar(100) NOT NULL,
  `build_user` varchar(20) NOT NULL,
  `app_user` varchar(30) NOT NULL,
  `pay_user` int(11) NOT NULL,
  `ships_user` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `users_orders`
--

INSERT INTO `users_orders` (`id_user`, `key_orders`, `name_user`, `mail_user`, `phone_user`, `fax_user`, `city_user`, `street_user`, `build_user`, `app_user`, `pay_user`, `ships_user`, `data`) VALUES
(21, '2fea7ee85a7b5217a90a63ac3b74ca21', 'Владислав Витальевич Сухих', 'hissone@gmail.comss', '380674991340', '', 2, 'пр. Правды', '34', '4', 2, 2, '2012-09-21 13:13:35'),
(22, 'e27946ae23e75640aac97298918ff58a', 'Владислав Витальевич Сухих', 'hissone@gmail.com', '380632238628', '', 1, 'пр. Правды', '10', '4', 2, 2, '2012-09-21 13:34:52'),
(23, '8e5af896f5370b218d083c93aa887b91', 'Владислав Витальевич Сухих', 'hissone@gmail.com', '380632238628', '', 1, 'пр. Правды', '11', '101', 1, 1, '2012-09-21 13:35:24'),
(24, '11d9ce45f30f015589d27a2a9deea09b', 'Оран Гутанович', '', '380673298767', '', 2, 'победы', '12', '23', 2, 1, '2012-09-21 15:13:43'),
(25, 'e5c9e44b28d452506dd416a0015f643b', 'Тестовый Ебать Лох', 'test@lox.ru', '3901283', '111', 2, 'Тестовая', '23', '43', 1, 1, '2012-09-27 18:44:09'),
(26, '96b5171c07af2a10cc352952f3d22f47', 'Владислав Витальевич Сухих', 'hissone@gmail.com', '380632238628', '', 1, 'пр. Правды, 10, 4', '4', '4', 2, 2, '2012-11-02 15:42:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
