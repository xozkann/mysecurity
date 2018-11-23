-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Kas 2018, 14:08:21
-- Sunucu sürümü: 5.5.60-MariaDB
-- PHP Sürümü: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `admin_mysecurity`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vt_kullanicilar`
--

CREATE TABLE `vt_kullanicilar` (
  `vt_id` int(11) NOT NULL,
  `vt_adsoyad` varchar(255) NOT NULL,
  `vt_eposta` varchar(255) NOT NULL,
  `vt_sifre` varchar(255) NOT NULL,
  `vt_telefon` varchar(255) NOT NULL,
  `vt_yetki` int(11) NOT NULL,
  `vt_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `vt_kullanicilar`
--

INSERT INTO `vt_kullanicilar` (`vt_id`, `vt_adsoyad`, `vt_eposta`, `vt_sifre`, `vt_telefon`, `vt_yetki`, `vt_durum`) VALUES
(5, 'Bilinmeyen Kullanıcı', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '05xxxxxxxxx', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vt_lisanslar`
--

CREATE TABLE `vt_lisanslar` (
  `vt_id` int(11) NOT NULL,
  `vt_alan_adi` varchar(255) NOT NULL,
  `vt_batarihi` varchar(255) NOT NULL,
  `vt_bitarihi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `vt_kullanicilar`
--
ALTER TABLE `vt_kullanicilar`
  ADD PRIMARY KEY (`vt_id`);

--
-- Tablo için indeksler `vt_lisanslar`
--
ALTER TABLE `vt_lisanslar`
  ADD PRIMARY KEY (`vt_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `vt_kullanicilar`
--
ALTER TABLE `vt_kullanicilar`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `vt_lisanslar`
--
ALTER TABLE `vt_lisanslar`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
