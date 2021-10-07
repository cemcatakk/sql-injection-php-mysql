-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 25 May 2021, 01:41:20
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sqlinjection`
--
CREATE DATABASE IF NOT EXISTS `sqlinjection` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sqlinjection`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bankbilgileri`
--

CREATE TABLE `bankbilgileri` (
  `id` int(11) NOT NULL,
  `tc` varchar(50) NOT NULL,
  `kartno` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bankbilgileri`
--

INSERT INTO `bankbilgileri` (`id`, `tc`, `kartno`, `sifre`) VALUES
(1, '12345678901', '9875548774486693', '9898'),
(2, '32658994814', '1548639645124863', '2015');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int(11) NOT NULL,
  `tc` bigint(20) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `meslek` varchar(100) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `tc`, `ad`, `soyad`, `meslek`, `telefon`, `sifre`) VALUES
(1, 1, '2', '3', '4', '5', '1234'),
(2, 0, 'cem', 'cem', 'cem', 'cem', '4321');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bankbilgileri`
--
ALTER TABLE `bankbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kayitlar`
--
ALTER TABLE `kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bankbilgileri`
--
ALTER TABLE `bankbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kayitlar`
--
ALTER TABLE `kayitlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
