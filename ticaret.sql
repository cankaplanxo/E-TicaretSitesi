-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 15 Oca 2019, 00:20:06
-- Sunucu sürümü: 5.7.23
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
-- Veritabanı: `ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `adi` text NOT NULL,
  `aciklama` text NOT NULL,
  `kat_link` text NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`sira`, `adi`, `aciklama`, `kat_link`) VALUES
(1, 'Kapüşonlu & Sweatshirt', 'Sportif ve havalı bir gün için harika kapüşonlu üst ve sweatshirt seçenekleri.', 'sweat'),
(2, 'Şapka', 'Göz alıcı şapkalar.', 'sapka'),
(4, 'Ayakkabı', 'Yeni ayakkabılarla tarzınızı çeşitlendirin. Kaliteli deri ayakkabılardan spor ayakkabılara, rahat kanvas ayakkabılardan sandaletlere her şeyi burada bulabilirsiniz. Klasik ayakkabıları veya sezonun yeni tarzlarını tercih edin.', 'ayakkabi'),
(5, 'Ceket & Kaban', 'Muhteşem ceketler ve kabanlar.', 'ceket');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `adi` text NOT NULL,
  `icerik` text NOT NULL,
  `sayfa_link` text NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sira`, `adi`, `icerik`, `sayfa_link`) VALUES
(1, 'Hakkında', '<b>Bu bir hakkında sayfasıdır</b>', 'hakkinda'),
(2, 'İletişim', '<i>iletişim sayfası</i>', 'iletisim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

DROP TABLE IF EXISTS `sepet`;
CREATE TABLE IF NOT EXISTS `sepet` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `urun_no` int(11) NOT NULL,
  `ksira` int(11) NOT NULL,
  `top_fiyat` int(11) NOT NULL,
  `top_adet` int(11) NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sira`, `urun_no`, `ksira`, `top_fiyat`, `top_adet`) VALUES
(1, 3, 2, 40, 1),
(3, 2, 2, 43, 2),
(5, 3, 2, 21, 2),
(7, 2, 1, 43, 1),
(8, 4, 1, 80, 1),
(15, 2, 3, 250, 1),
(16, 4, 3, 50, 1),
(17, 1, 3, 400, 2),
(18, 5, 3, 998, 2),
(19, 1, 4, 200, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `adi` text NOT NULL,
  `aciklama` text NOT NULL,
  `anahtarkelime` text NOT NULL,
  `hakkinda` text NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `site`
--

INSERT INTO `site` (`sira`, `adi`, `aciklama`, `anahtarkelime`, `hakkinda`) VALUES
(1, 'CAN XO SHOP', 'şimdilik yok', 'CAN XO SHOP', 'CAN XO SHOP\'UN ticaret konsepti, modayı ve kaliteyi en iyi fiyatla sürdürülebilir şekilde sunmaktır. 2019’da kurulan CAN XO SHOP, dünyanın önde gelen moda şirketlerinden biri durumuna geldi. Bu sayfanın içeriği telif hakları ile korunmaktadır ve CAN KAPLAN\'a aittir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `usira` int(11) NOT NULL AUTO_INCREMENT,
  `adi` text NOT NULL,
  `icerik` text NOT NULL,
  `fiyat` text NOT NULL,
  `kategori` text NOT NULL,
  `resim` text NOT NULL,
  `uhit` int(11) NOT NULL,
  `link` text NOT NULL,
  `cins` text NOT NULL,
  `ksira` text NOT NULL,
  PRIMARY KEY (`usira`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`usira`, `adi`, `icerik`, `fiyat`, `kategori`, `resim`, `uhit`, `link`, `cins`, `ksira`) VALUES
(1, 'XO BORDO SWEATSHIRT', 'Sportif ve havalı bir gün için harika kapüşonlu üst ve sweatshirt seçenekleri. Favori klasik kolej tarzı üstler, fermuarlı ceketler ve kapüşonlu sweatshirtleri online satın alın - yeni renkler, nötr tarzlar veya baskılarla.', '200', '1', 'resimler/URUN1', 26, '', 'urun', '1'),
(2, 'XO CEKET', 'Dokuma kumaştan, arkası baskı motifli, göğsünde aplikeli, kısa dik yakalı, önü fermuarlı pilot ceketi. Fermuarlı bir göğüs cepli, yan dikişlerde cepli, bir iç cepli, manşetleri ve etek ucu ribanalı. Astarlı.', '250', '5', 'resimler/URUN2', 68, '', 'urun', '2'),
(3, 'XO PİLOT CEKET', 'Hafif parlak kalın dokuma kumaştan pilot ceketi. Yakası ribanalı, önü fermuarlı ve aplikeli, yan cepleri biyeli, manşetleri ve etek ucu lastikli. Astarsız.', '120', '5', 'resimler/URUN4', 7, '', 'urun', '1'),
(4, 'XO ŞAPKA', 'Tarzınızdan ödün vermezken soğuğa karşı koymanıza yardımcı olacak çeşitli şapkalar.', '50', '2', 'resimler/URUN3', 4, '', 'urun', '2'),
(5, 'XO Parallel Ayakkabı', 'Yeni ayakkabılarla tarzınızı çeşitlendirin. Kaliteli deri ayakkabılardan spor ayakkabılara, rahat kanvas ayakkabılardan sandaletlere her şeyi burada bulabilirsiniz. Klasik ayakkabıları veya sezonun yeni tarzlarını tercih edin.', '499', '4', 'resimler/URUN5', 28, '', 'urun', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `ksira` int(11) NOT NULL AUTO_INCREMENT,
  `kadi` text NOT NULL,
  `ksifre` text NOT NULL,
  `krutbe` text NOT NULL,
  `kmail` text NOT NULL,
  `ktel` text NOT NULL,
  PRIMARY KEY (`ksira`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`ksira`, `kadi`, `ksifre`, `krutbe`, `kmail`, `ktel`) VALUES
(3, 'can', '2c61ebff5a7f675451467527df66788d', 'yonetici', 'cankaplanxo@gmail.com', '05340816876'),
(4, 'batuhan', '758634cabdc68f2050ce11900f51e379', 'uye', 'asdas@gmail.com', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
