-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 30 2022 г., 16:52
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `talaba`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fakultet`
--

CREATE TABLE IF NOT EXISTS `fakultet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fakultet`
--

INSERT INTO `fakultet` (`id`, `name`) VALUES
(2, 'Raqamli texnologiyalar'),
(3, 'Biologiya');

-- --------------------------------------------------------

--
-- Структура таблицы `guruh`
--

CREATE TABLE IF NOT EXISTS `guruh` (
  `id` int(11) NOT NULL,
  `name` int(3) NOT NULL,
  `fak_id` int(11) NOT NULL,
  `yun_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guruh`
--

INSERT INTO `guruh` (`id`, `name`, `fak_id`, `yun_id`, `kurs_id`) VALUES
(4, 201, 2, 1, 2),
(6, 301, 2, 1, 3),
(8, 101, 2, 1, 1),
(9, 105, 2, 1, 1),
(10, 106, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `imtiyoz`
--

CREATE TABLE IF NOT EXISTS `imtiyoz` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `imtiyoz`
--

INSERT INTO `imtiyoz` (`id`, `name`) VALUES
(1, 'Harbiy imtiyoz');

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `id` int(11) NOT NULL,
  `kurs` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id`, `kurs`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Структура таблицы `talaba`
--

CREATE TABLE IF NOT EXISTS `talaba` (
  `id` int(11) NOT NULL,
  `fam` varchar(20) NOT NULL,
  `ism` varchar(20) NOT NULL,
  `sharif` varchar(20) NOT NULL,
  `born` varchar(80) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `millat` varchar(20) NOT NULL,
  `pasport` varchar(150) NOT NULL,
  `vil_id` int(11) NOT NULL,
  `tuman_id` int(11) NOT NULL,
  `manzil` varchar(100) NOT NULL,
  `ijara_manzil` varchar(100) NOT NULL,
  `turar_joy` enum('ijara','yotoqxona','qarindosh','uyidan') NOT NULL,
  `grand` enum('shartnoma','grand') NOT NULL DEFAULT 'shartnoma',
  `temir_daftar` enum('0','1') NOT NULL DEFAULT '0',
  `oilaviy` enum('oliasiz','oilali') NOT NULL DEFAULT 'oliasiz',
  `nogiron` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `imtiyoz_id` int(11) NOT NULL,
  `yutuq_id` int(11) NOT NULL,
  `fak_id` int(11) NOT NULL,
  `yun_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `guruh_id` int(11) NOT NULL,
  `otasi` varchar(200) NOT NULL,
  `onasi` varchar(200) NOT NULL,
  `yetimlik` enum('0','1') NOT NULL DEFAULT '0',
  `jins` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `talaba`
--

INSERT INTO `talaba` (`id`, `fam`, `ism`, `sharif`, `born`, `tel`, `millat`, `pasport`, `vil_id`, `tuman_id`, `manzil`, `ijara_manzil`, `turar_joy`, `grand`, `temir_daftar`, `oilaviy`, `nogiron`, `imtiyoz_id`, `yutuq_id`, `fak_id`, `yun_id`, `kurs_id`, `guruh_id`, `otasi`, `onasi`, `yetimlik`, `jins`) VALUES
(57, 'Primov', 'Anvar', 'Rustamovich', '1995,12,08 Samarqand v,Pastdarg''om t', '907035133', 'O''zbek', 'AB 3603551 07,04,2016 Pastdarg''om IIB', 9, 1, 'Juma sh, Po''latchi m, Yangiobob k,3-uy', 'Istiqbol 3', 'ijara', 'grand', '0', 'oliasiz', '0', 1, 1, 2, 1, 2, 4, 'Jurayev Rustam Primovich 1959,05,25 +998915436359 Nafaqada', 'Pardayeva Gulsara Maxamadeyevna 1963,10,13 Nafaqada', '0', '1'),
(58, 'Abdumannonov', 'Asadbek', 'Azamat o''g''li', '05.09.2001 Samarqand viloyati Payariq tumani', '945373730', 'O''zbek', 'AB 7745925 21.09.2017 Payariq tumani IIB', 9, 5, 'Ko''ktepa MFY, Chandir qishloq', 'Ko''ktepa MFY, Chandir qishloq', 'ijara', 'shartnoma', '0', 'oliasiz', '1', 0, 0, 2, 1, 2, 4, 'Voxidov Azamat Abdumannonovich (1977) 932841755', 'Voxidova Shaxlo Mamadaliyevna (1978) 939632265', '0', '1'),
(59, 'Abduvaxoboov', 'Murodbek', 'Baxriddin o''g''li', '21.10.2001 Yil Jizzax viloyati G''allaorol tumani', '945373730', 'O''zbek', 'AB 4997242 23.11.2017 Jizzax viloyati G''allaorol tumani IIB', 9, 5, 'Jizzax viloyati G''allaorol tumani Alamli MFY Abdulla Qodiriy ko''chasi 61-uy', 'Samarqand shahar Abdulla Qodiriy mahallasi Buyuk ipak yo''li ko''chasi 67B/17', 'ijara', 'grand', '0', 'oliasiz', '2', 0, 0, 2, 1, 2, 4, 'Nazarov Baxriddin Abduvaxobovich (1964) O''qituvchi +998945733464', 'Nazarova Nasima Mixlibaevna (1969) Hamshira', '1', '1'),
(60, 'Burxonov', 'Jaxongir', 'Ilxomjon o''g''li', 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', '945373730', 'O''zbek', 'AB 7469112 Samarqand viloyat Bulungir tuman IIB', 9, 21, 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', 'Gallaobod-k 53-uy', 'qarindosh', 'shartnoma', '1', 'oliasiz', '3', 0, 0, 2, 1, 2, 4, 'Musayev Ilxomjon ishsiz', 'Musayeva Jamila o`qituvchi 979173970', '1', '1'),
(61, 'Ibroximova', 'Gulnoza', 'Xasan qizi', '10.08.2001 Samarqand viloyati Samarqand shahar', '945373730', 'O''zbek', 'AB7676087 07.09.2017 Samarqand viloyati, Samarqand shahar IIB', 1, 18, 'Sattepo 172/60', 'Sattepo 172/60', 'uyidan', 'grand', '0', 'oilali', '4', 0, 0, 2, 1, 2, 4, 'Otasi: Turdibekov Hasan Ibragimovich (1975) +99890 213-89-07', 'Turdibekova Malika Xamroyevna (1980) +99891 553-35-26', '0', '0'),
(62, 'Salimova', 'Maxbuba', 'Xidirboy qizi', '2.03.2000-yil Qoraqalpog''iston Respublikasi\nBeruniy tumani', '945373730', 'O''zbek', 'AB6413263\n08.04.2017\nSamarqand viloyati\nSamarqand shahar IIB', 2, 19, 'Samarqand shahar Sartepo markazi 27-uy 35-xonadon', 'Samarqand shahar Sartepo markazi 27-uy 35-xonadon', 'uyidan', 'shartnoma', '1', 'oliasiz', '0', 0, 1, 2, 1, 2, 4, 'Sultonov Xidirboy Salimovich(1968) Aerogeodeziya\n+998979257333', 'Kulbayeva Ra''no Sharipovna(1976)\nUy bekasi', '0', '0'),
(63, 'Kodirova', 'Robiya', 'Voxidjon qizi', '27.08.2000-yil Navoiy viloyati Xatirchi tumani', '945373730', 'O''zbek', 'AB 7429533 08.08.2017 Navoiy viloyati Xatirchi tumani IIB', 1, 18, 'Navoiy viloyati Xatirchi tumani Tasmachi MFY Mirzo Ulug''bek ko''chasi 83-uy', 'SamDU 4- sonli Talabalar turarjJoyi', 'yotoqxona', 'shartnoma', '0', 'oliasiz', '0', 0, 0, 2, 1, 2, 4, 'Kodirov Voxidjon Miyassarovich (1976) Xirurg +998935102356', 'Shomurodova Feruza Saydalimovna (1977) Uy Bekasi +998935172708', '0', '0'),
(72, 'Primov', 'Anvar', 'Rustamovich', '1995,12,08 Samarqand v,Pastdarg''om t', '907035133', 'O''zbek', 'AB 3603551 07,04,2016 Pastdarg''om IIB', 9, 1, 'Juma sh, Po''latchi m, Yangiobob k,3-uy', 'Istiqbol 3', 'ijara', 'grand', '0', 'oliasiz', '3', 1, 1, 2, 1, 1, 8, 'Jurayev Rustam Primovich 1959,05,25 +998915436359 Nafaqada', 'Pardayeva Gulsara Maxamadeyevna 1963,10,13 Nafaqada', '0', '1'),
(74, 'Abduvaxoboov', 'Murodbek', 'Baxriddin o''g''li', '21.10.2001 Yil Jizzax viloyati G''allaorol tumani', '945373730', 'O''zbek', 'AB 4997242 23.11.2017 Jizzax viloyati G''allaorol tumani IIB', 9, 5, 'Jizzax viloyati G''allaorol tumani Alamli MFY Abdulla Qodiriy ko''chasi 61-uy', 'Samarqand shahar Abdulla Qodiriy mahallasi Buyuk ipak yo''li ko''chasi 67B/17', 'ijara', 'grand', '0', 'oliasiz', '2', 0, 0, 2, 1, 1, 8, 'Nazarov Baxriddin Abduvaxobovich (1964) O''qituvchi +998945733464', 'Nazarova Nasima Mixlibaevna (1969) Hamshira', '0', '1'),
(75, 'Burxonov', 'Jaxongir', 'Ilxomjon o''g''li', 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', '945373730', 'O''zbek', 'AB 7469112 Samarqand viloyat Bulungir tuman IIB', 9, 21, 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', 'Gallaobod-k 53-uy', 'qarindosh', 'shartnoma', '1', 'oliasiz', '3', 0, 0, 2, 1, 1, 8, 'Musayev Ilxomjon ishsiz', 'Musayeva Jamila o`qituvchi 979173970', '0', '1'),
(76, 'Ibroximova', 'Gulnoza', 'Xasan qizi', '10.08.2001 Samarqand viloyati Samarqand shahar', '945373730', 'O''zbek', 'AB7676087 07.09.2017 Samarqand viloyati, Samarqand shahar IIB', 1, 18, 'Sattepo 172/60', 'Sattepo 172/60', 'uyidan', 'grand', '0', 'oilali', '4', 0, 0, 2, 1, 1, 8, 'Otasi: Turdibekov Hasan Ibragimovich (1975) +99890 213-89-07', 'Turdibekova Malika Xamroyevna (1980) +99891 553-35-26', '0', '0'),
(78, 'Kodirova', 'Robiya', 'Voxidjon qizi', '27.08.2000-yil Navoiy viloyati Xatirchi tumani', '945373730', 'O''zbek', 'AB 7429533 08.08.2017 Navoiy viloyati Xatirchi tumani IIB', 1, 18, 'Navoiy viloyati Xatirchi tumani Tasmachi MFY Mirzo Ulug''bek ko''chasi 83-uy', 'SamDU 4- sonli Talabalar turarjJoyi', 'yotoqxona', 'shartnoma', '0', 'oliasiz', '0', 0, 0, 2, 1, 1, 8, 'Kodirov Voxidjon Miyassarovich (1976) Xirurg +998935102356', 'Shomurodova Feruza Saydalimovna (1977) Uy Bekasi +998935172708', '0', '0'),
(79, 'Hamidova', 'Adiba', 'Aliyevna', '27.08.2000-yil Andijon viloyati Xatirchi Pop', '945373730', 'Rus', 'AB 7429533 08.08.2017 Andijon viloyati Pop tumani IIB', 1, 23, 'Yaxhilik  ko''chasi 5-uy', 'SamDU 4- sonli Talabalar turarjJoyi', 'ijara', 'grand', '0', 'oilali', '0', 1, 1, 2, 1, 1, 8, 'Aliyev Ali Aliyevich (1970)', 'Sadanova Zulayho Zamazanovna (1977)', '0', '1'),
(81, 'Primov', 'Anvar', 'Rustamovich', '1995,12,08 Samarqand v,Pastdarg''om t', '907035133', 'O''zbek', 'AB 3603551 07,04,2016 Pastdarg''om IIB', 9, 1, 'Juma sh, Po''latchi m, Yangiobob k,3-uy', 'Istiqbol 3', 'ijara', 'grand', '0', 'oliasiz', '3', 1, 1, 2, 2, 1, 10, 'Jurayev Rustam Primovich 1959,05,25 +998915436359 Nafaqada', 'Pardayeva Gulsara Maxamadeyevna 1963,10,13 Nafaqada', '0', '1'),
(82, 'Abdumannonov', 'Asadbek', 'Azamat o''g''li', '05.09.2001 Samarqand viloyati Payariq tumani', '945373730', 'O''zbek', 'AB 7745925 21.09.2017 Payariq tumani IIB', 9, 5, 'Ko''ktepa MFY, Chandir qishloq', 'Ko''ktepa MFY, Chandir qishloq', 'ijara', 'shartnoma', '0', 'oliasiz', '1', 0, 0, 2, 2, 1, 10, 'Voxidov Azamat Abdumannonovich (1977) 932841755', 'Voxidova Shaxlo Mamadaliyevna (1978) 939632265', '0', '1'),
(83, 'Abduvaxoboov', 'Murodbek', 'Baxriddin o''g''li', '21.10.2001 Yil Jizzax viloyati G''allaorol tumani', '945373730', 'O''zbek', 'AB 4997242 23.11.2017 Jizzax viloyati G''allaorol tumani IIB', 9, 5, 'Jizzax viloyati G''allaorol tumani Alamli MFY Abdulla Qodiriy ko''chasi 61-uy', 'Samarqand shahar Abdulla Qodiriy mahallasi Buyuk ipak yo''li ko''chasi 67B/17', 'ijara', 'grand', '0', 'oliasiz', '2', 0, 0, 2, 2, 1, 10, 'Nazarov Baxriddin Abduvaxobovich (1964) O''qituvchi +998945733464', 'Nazarova Nasima Mixlibaevna (1969) Hamshira', '0', '1'),
(84, 'Burxonov', 'Jaxongir', 'Ilxomjon o''g''li', 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', '945373730', 'O''zbek', 'AB 7469112 Samarqand viloyat Bulungir tuman IIB', 9, 21, 'Samarqand viloyat Bulungur tuman Zarafshon mahalla.', 'Gallaobod-k 53-uy', 'qarindosh', 'shartnoma', '1', 'oliasiz', '3', 0, 0, 2, 2, 1, 10, 'Musayev Ilxomjon ishsiz', 'Musayeva Jamila o`qituvchi 979173970', '0', '1'),
(85, 'Ibroximova', 'Gulnoza', 'Xasan qizi', '10.08.2001 Samarqand viloyati Samarqand shahar', '945373730', 'O''zbek', 'AB7676087 07.09.2017 Samarqand viloyati, Samarqand shahar IIB', 1, 18, 'Sattepo 172/60', 'Sattepo 172/60', 'uyidan', 'grand', '0', 'oilali', '4', 0, 0, 2, 2, 1, 10, 'Otasi: Turdibekov Hasan Ibragimovich (1975) +99890 213-89-07', 'Turdibekova Malika Xamroyevna (1980) +99891 553-35-26', '0', '0'),
(86, 'Salimova', 'Maxbuba', 'Xidirboy qizi', '2.03.2000-yil Qoraqalpog''iston Respublikasi\nBeruniy tumani', '945373730', 'O''zbek', 'AB6413263\n08.04.2017\nSamarqand viloyati\nSamarqand shahar IIB', 2, 19, 'Samarqand shahar Sartepo markazi 27-uy 35-xonadon', 'Samarqand shahar Sartepo markazi 27-uy 35-xonadon', 'uyidan', 'shartnoma', '1', 'oliasiz', '0', 0, 1, 2, 2, 1, 10, 'Sultonov Xidirboy Salimovich(1968) Aerogeodeziya\n+998979257333', 'Kulbayeva Ra''no Sharipovna(1976)\nUy bekasi', '0', '0'),
(87, 'Kodirova', 'Robiya', 'Voxidjon qizi', '27.08.2000-yil Navoiy viloyati Xatirchi tumani', '945373730', 'O''zbek', 'AB 7429533 08.08.2017 Navoiy viloyati Xatirchi tumani IIB', 1, 18, 'Navoiy viloyati Xatirchi tumani Tasmachi MFY Mirzo Ulug''bek ko''chasi 83-uy', 'SamDU 4- sonli Talabalar turarjJoyi', 'yotoqxona', 'shartnoma', '0', 'oliasiz', '0', 0, 0, 2, 2, 1, 10, 'Kodirov Voxidjon Miyassarovich (1976) Xirurg +998935102356', 'Shomurodova Feruza Saydalimovna (1977) Uy Bekasi +998935172708', '0', '0'),
(88, 'Hamidov', 'Isom', 'Aliyevich', '27.08.2000-yil Andijon viloyati Xatirchi Pop', '945373730', 'O''zbek', 'AB 7429533 08.08.2017 Andijon viloyati Pop tumani IIB', 1, 18, 'Yaxhilik  ko''chasi 5-uy', 'SamDU 4- sonli Talabalar turarjJoyi', 'yotoqxona', 'shartnoma', '1', 'oilali', '1', 0, 0, 2, 2, 1, 10, 'Aliyev Ali Aliyevich (1970)', 'Sadanova Zulayho Zamazanovna (1977)', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `tuman`
--

CREATE TABLE IF NOT EXISTS `tuman` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tuman`
--

INSERT INTO `tuman` (`id`, `name`, `vid`) VALUES
(1, 'Pastdarg''om', 9),
(3, 'Samarqand', 9),
(5, 'Payariq', 9),
(9, 'Paxtachi', 9),
(10, 'Kattaqo''rg''on', 9),
(11, 'Nurobod', 9),
(12, 'Narpay', 9),
(14, 'Jomboy', 9),
(17, 'Xo''shrobot', 9),
(18, 'AAsdss fd', 1),
(19, 'Olot', 2),
(21, 'Bulung''ur', 9),
(23, 'Payariq', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `ism` varchar(15) NOT NULL,
  `fam` varchar(15) NOT NULL,
  `sharif` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `login` varchar(32) NOT NULL,
  `parol` varchar(32) NOT NULL,
  `rol` enum('admin','user') NOT NULL,
  `fak_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `ism`, `fam`, `sharif`, `tel`, `login`, `parol`, `rol`, `fak_id`) VALUES
(1, 'Anvar', 'Primov', 'Rustamovich', '+998937035133', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', 0),
(4, 'Otabek', 'Esanov', 'Olimjon o''gli', '+898332030036', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'user', 2),
(5, 'Ali', 'Aliyev', 'Aliyevich', '+998332030036', 'biolog', '5a09e356f590b3ec5ff5c64df94c90b4', 'user', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `viloyat`
--

CREATE TABLE IF NOT EXISTS `viloyat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `viloyat`
--

INSERT INTO `viloyat` (`id`, `name`) VALUES
(1, 'Andijon'),
(2, 'Buxoro'),
(3, 'Farg''ona'),
(4, 'Jizzax'),
(5, 'Namangan'),
(6, 'Navoiy'),
(7, 'Qashqadaryo'),
(8, 'Qoraqalpog''iston Respublikasi'),
(9, 'Samarqand'),
(10, 'Sirdaryo'),
(11, 'Surxondaryo'),
(12, 'Toshkent'),
(13, 'Xorazm');

-- --------------------------------------------------------

--
-- Структура таблицы `yunalish`
--

CREATE TABLE IF NOT EXISTS `yunalish` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fak_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yunalish`
--

INSERT INTO `yunalish` (`id`, `name`, `fak_id`) VALUES
(1, 'Amaliy matematika va informatika', 2),
(2, 'Informatika o''qitish metodikasi', 2),
(3, 'Hayvonlar biologiyasi', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `yutuq`
--

CREATE TABLE IF NOT EXISTS `yutuq` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yutuq`
--

INSERT INTO `yutuq` (`id`, `name`) VALUES
(1, 'IELTS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fakultet`
--
ALTER TABLE `fakultet`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guruh`
--
ALTER TABLE `guruh`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `imtiyoz`
--
ALTER TABLE `imtiyoz`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `talaba`
--
ALTER TABLE `talaba`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tuman`
--
ALTER TABLE `tuman`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `viloyat`
--
ALTER TABLE `viloyat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `yunalish`
--
ALTER TABLE `yunalish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `yutuq`
--
ALTER TABLE `yutuq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fakultet`
--
ALTER TABLE `fakultet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `guruh`
--
ALTER TABLE `guruh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `imtiyoz`
--
ALTER TABLE `imtiyoz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `talaba`
--
ALTER TABLE `talaba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT для таблицы `tuman`
--
ALTER TABLE `tuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `viloyat`
--
ALTER TABLE `viloyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `yunalish`
--
ALTER TABLE `yunalish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `yutuq`
--
ALTER TABLE `yutuq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
