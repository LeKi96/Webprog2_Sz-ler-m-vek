-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Dec 13. 19:49
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szeleromuvek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL,
  `vezetek_nev` varchar(45) NOT NULL DEFAULT '',
  `kereszt_nev` varchar(45) NOT NULL DEFAULT '',
  `felhasznalo` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `jog` varchar(3) NOT NULL DEFAULT '_1_'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `vezetek_nev`, `kereszt_nev`, `felhasznalo`, `jelszo`, `jog`) VALUES
(1, 'Rendszer', 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1'),
(2, 'Családi_2', 'Utónév_2', 'Login2', '6cf8efacae19431476020c1e2ebd2d8acca8f5c0', '_1_'),
(3, 'Családi_3', 'Utónév_3', 'Login3', 'df4d8ad070f0d1585e172a2150038df5cc6c891a', '_1_'),
(4, 'Családi_4', 'Utónév_4', 'Login4', 'b020c308c155d6bbd7eb7d27bd30c0573acbba5b', '_1_'),
(5, 'Családi_5', 'Utónév_5', 'Login5', '9ab1a4743b30b5e9c037e6a645f0cfee80fb41d4', '_1_'),
(6, 'Családi_6', 'Utónév_6', 'Login6', '7ca01f28594b1a06239b1d96fc716477d198470b', '_1_'),
(7, 'Családi_7', 'Utónév_7', 'Login7', '41ad7e5406d8f1af2deef2ade4753009976328f8', '_1_'),
(8, 'Családi_8', 'Utónév_8', 'Login8', '3a340fe3599746234ef89591e372d4dd8b590053', '_1_'),
(9, 'Családi_9', 'Utónév_9', 'Login9', 'c0298f7d314ecbc5651da5679a0a240833a88238', '_1_'),
(10, 'Családi_10', 'Utónév_10', 'Login10', 'a477427c183664b57f977661ac3167b64823f366', '_1_'),
(11, 'Kiss', 'Pista', 'KissPista13', 'b4e59c95695d3625fb11705139e2b2cd5a46c1f9', '_1_'),
(12, 'Nagy', 'János', 'Janó11', 'b7527bfd3e82e31142e7742e75e57e45ce0df0f0', '_1_');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `helyszin`
--

CREATE TABLE `helyszin` (
  `id` int(11) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `megyeid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `helyszin`
--

INSERT INTO `helyszin` (`id`, `nev`, `megyeid`) VALUES
(1, 'Várpalota', 14),
(2, 'Kulcs', 13),
(3, 'Mosonszolnok', 15),
(4, 'Mosonmagyaróvár', 15),
(5, 'Bükkaranyos', 1),
(6, 'Erk', 2),
(7, 'Újrónafő', 15),
(8, 'Szápár', 14),
(9, 'Vép', 16),
(11, 'Mezőtúr', 5),
(12, 'Törökszentmiklós', 5),
(14, 'Felsőzsolca', 1),
(15, 'Csetény', 14),
(16, 'Ostffyasszonyfa', 16),
(17, 'Levél', 15),
(19, 'Csorna', 15),
(20, 'Mecsér', 15),
(21, 'Bakonycsernye', 13),
(22, 'Sopronkövesd', 15),
(23, 'Nagylózs', 15),
(25, 'Jánossomorja', 15),
(26, 'Ács', 12),
(27, 'Pápakovácsi', 14),
(28, 'Vönöck', 16),
(29, 'Kisigmánd', 12),
(30, 'Bőny', 15),
(31, 'Csém', 12),
(32, 'Nagyigmánd', 12),
(35, 'Bábolna', 12),
(37, 'Ikervár', 16),
(38, 'Lövő', 15);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirek`
--

CREATE TABLE `hirek` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `hir` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `hirek`
--

INSERT INTO `hirek` (`id`, `userid`, `datum`, `hir`) VALUES
(1, 1, '2023-11-15 21:00:00', 'teszthír'),
(2, 2, '2023-11-15 21:25:38', 'teszthír 2'),
(3, 1, '2023-11-15 21:38:22', 'Beküldött hír 1'),
(0, 11, '2023-12-11 16:52:08', 'Ez egy nagyon jó hír'),
(0, 12, '2023-12-12 19:11:21', 'Még egy Teszt Hír!');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kommentek`
--

CREATE TABLE `kommentek` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `hirid` int(10) UNSIGNED NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `komment` tinytext NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kommentek`
--

INSERT INTO `kommentek` (`id`, `userid`, `hirid`, `datum`, `komment`) VALUES
(1, 3, 1, '2023-11-15 19:28:34', 'tesztkomment1'),
(4, 12, 0, '2023-12-12 19:11:31', 'Ugye?');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megye`
--

CREATE TABLE `megye` (
  `id` int(11) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `regio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `megye`
--

INSERT INTO `megye` (`id`, `nev`, `regio`) VALUES
(1, 'Borsod-Abaúj-Zemplén', 'Észak-Magyarország'),
(2, 'Heves', 'Észak-Magyarország'),
(3, 'Nógrád', 'Észak-Magyarország'),
(4, 'Hajdú-Bihar', 'Észak-Alföld'),
(5, 'Jász-Nagykun-Szolnok', 'Észak-Alföld'),
(6, 'Szabolcs-Szatmár-Ber', 'Észak-Alföld'),
(7, 'Bács-Kiskun', 'Dél-Alföld'),
(8, 'Békés', 'Dél-Alföld'),
(9, 'Csongrád', 'Dél-Alföld'),
(10, 'Pest', 'Közép-Magyarország'),
(11, 'Budapest', 'Közép-Magyarország'),
(12, 'Komárom-Esztergom', 'Közép-Dunántúl'),
(13, 'Fejér', 'Közép-Dunántúl'),
(14, 'Veszprém', 'Közép-Dunántúl'),
(15, 'Győr-Moson-Sopron', 'Nyugat-Dunántúl'),
(16, 'Vas', 'Nyugat-Dunántúl'),
(17, 'Zala', 'Nyugat-Dunántúl'),
(18, 'Baranya', 'Dél-Dunántúl'),
(19, 'Somogy', 'Dél-Dunántúl'),
(20, 'Tolna', 'Dél-Dunántúl');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `url` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `parent` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `privilage` varchar(3) COLLATE utf8_hungarian_ci NOT NULL,
  `list` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`url`, `name`, `parent`, `privilage`, `list`) VALUES
('alapinfok', 'Devizák', 'elerhetoseg', '111', 40),
('belepes', 'Bejelentkezés', '', '100', 60),
('elerhetoseg', 'Lekérdezések', '', '111', 30),
('hirek', 'Hírek', '', '111', 20),
('kiegeszitesek', 'Szélturbinák', 'elerhetoseg', '011', 50),
('kilepes', 'Kilépés', '', '011', 70),
('nyitolap', 'Főoldal', '', '111', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `torony`
--

CREATE TABLE `torony` (
  `id` int(11) NOT NULL,
  `darab` int(3) NOT NULL,
  `teljesitmeny` int(5) NOT NULL,
  `kezdev` int(4) NOT NULL,
  `helyszinid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `torony`
--

INSERT INTO `torony` (`id`, `darab`, `teljesitmeny`, `kezdev`, `helyszinid`) VALUES
(1, 1, 250, 2000, 1),
(2, 1, 600, 2001, 2),
(3, 2, 600, 2002, 3),
(4, 2, 600, 2003, 4),
(5, 1, 225, 2005, 5),
(6, 1, 800, 2005, 6),
(7, 1, 800, 2005, 7),
(8, 1, 1800, 2005, 8),
(9, 1, 600, 2005, 9),
(10, 5, 2000, 2005, 4),
(11, 1, 1500, 2006, 11),
(12, 1, 1500, 2006, 12),
(13, 5, 2000, 2006, 4),
(14, 1, 1800, 2006, 14),
(15, 2, 2000, 2006, 15),
(16, 1, 600, 2006, 16),
(17, 12, 2000, 2006, 17),
(18, 1, 800, 2007, 3),
(19, 1, 800, 2007, 19),
(20, 1, 800, 2007, 20),
(21, 1, 2000, 2007, 21),
(22, 4, 3000, 2008, 22),
(23, 3, 3000, 2008, 23),
(24, 1, 2000, 2008, 23),
(25, 12, 2000, 2008, 17),
(26, 4, 2000, 2008, 25),
(27, 1, 1800, 2008, 25),
(28, 1, 2000, 2008, 26),
(29, 1, 2000, 2008, 27),
(30, 1, 850, 2008, 28),
(31, 19, 2000, 2009, 29),
(32, 8, 2000, 2009, 30),
(33, 4, 1800, 2010, 30),
(34, 1, 1800, 2010, 30),
(35, 6, 2000, 2010, 31),
(36, 7, 2000, 2010, 32),
(37, 6, 2000, 2010, 26),
(38, 2, 2000, 2010, 32),
(39, 6, 2000, 2010, 35),
(40, 1, 3000, 2010, 35),
(41, 1, 2000, 2010, 25),
(42, 4, 2000, 2011, 37),
(43, 13, 2000, 2011, 37),
(44, 1, 2000, 2010, 38);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `helyszin`
--
ALTER TABLE `helyszin`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kommentek`
--
ALTER TABLE `kommentek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `megye`
--
ALTER TABLE `megye`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`url`);

--
-- A tábla indexei `torony`
--
ALTER TABLE `torony`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `helyszin`
--
ALTER TABLE `helyszin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT a táblához `kommentek`
--
ALTER TABLE `kommentek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `megye`
--
ALTER TABLE `megye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `torony`
--
ALTER TABLE `torony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
