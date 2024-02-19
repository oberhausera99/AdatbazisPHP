-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Nov 24. 09:25
-- Kiszolgáló verziója: 10.4.8-MariaDB
-- PHP verzió: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kozlemenyek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `folyoirat`
--

CREATE TABLE `folyoirat` (
  `nev` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `kiado` varchar(255) DEFAULT NULL,
  `kiadas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `folyoirat`
--

INSERT INTO `folyoirat` (`nev`, `id`, `kiado`, `kiadas`) VALUES
('Blikk', 1, 'Atlantic', '2018-02-18'),
('Bors', 2, 'Mogul', '2019-11-22'),
('Phantasy', 3, 'Pont', '2019-08-07'),
('Vezess', 4, 'Atlantic', '2019-10-15'),
('Országépítő', 5, 'Pont', '2014-05-20'),
('Astro', 6, 'Perfekt', '2019-09-21'),
('ITPlace', 7, 'Perfekt', '2017-01-22'),
('Kickback', 8, 'Saturn', '2018-04-22'),
('MindenAmiSport', 9, 'Mogul', '2019-11-21'),
('KonzolAréna', 10, 'Tevan', '2017-02-02'),
('Agromania', 11, 'Mogul', '2019-11-23'),
('Vezess', 12, 'Atlantic', '2017-02-02'),
('MaiPiac', 13, 'Tevan', '2017-03-22'),
('Neutral', 14, 'Unio', '2015-03-08'),
('Phantasy', 15, 'Pont', '2017-11-20'),
('Agromania', 16, 'Mogul', '2019-08-23'),
('MindenAmiSport', 17, 'Saturn', '2014-04-21'),
('FociMánia', 18, 'Unio', '2013-11-20'),
('Népi tájékoztató', 19, 'Perfekt', '2019-12-10'),
('Phantasy', 20, 'Atlantic', '2018-09-11'),
('Blikk', 21, 'Jelenkor', '2012-02-08'),
('Kickback', 22, 'Mogul', '2017-05-11'),
('Neutral', 23, 'Unio', '2018-11-20'),
('Nyugati Lap', 24, 'Atlantic', '2019-10-11'),
('Félegyházi Napló', 25, 'Vince', '2019-09-19'),
('Bors', 26, 'Perfekt', '2019-01-20'),
('Javalife', 27, 'Tevan', '2016-05-05'),
('Neutral', 28, 'Mogul', '2019-10-30'),
('Carforum', 29, 'Perfekt', '2019-03-30'),
('Országépítő', 30, 'Kingpin', '2019-11-15'),
('Országjáró', 31, 'Vince', '2014-06-12'),
('Országjáró', 32, 'Vince', '2012-01-12'),
('Agromania', 33, 'Saturn', '2019-11-13'),
('Nyugati Lap', 34, 'Jelenkor', '2019-11-20'),
('Astro', 35, 'Mogul', '2015-07-20'),
('Demokrata Fórum', 36, 'Pont', '2019-11-20'),
('Forma2', 37, 'Unio', '2019-11-20'),
('Forma2', 38, 'Unio', '2019-11-14'),
('Kortárs', 39, 'Unio', '2019-10-11'),
('Kortárs', 40, 'Atlantic', '2019-02-11'),
('Déli Hírportál', 41, 'Vince', '2019-10-21'),
('Kortárs', 42, 'Jelenkor', '2019-11-05'),
('Neutral', 43, 'Tevan', '2019-09-03'),
('Neutral', 44, 'Tevan', '2018-05-15'),
('Blikk', 45, 'Atlantic', '2019-04-14'),
('Országjáró', 46, 'Tevan', '2019-11-01'),
('Javalife', 47, 'Pont', '2019-11-20'),
('ITPlace', 48, 'Perfekt', '2019-10-30'),
('Blikk', 49, 'Unio', '2019-11-20'),
('Szegedi Hírportál', 50, 'Mogul', '2019-03-10'),
('Demokrata Fórum', 51, 'Atlantic', '2018-12-20');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kiado`
--

CREATE TABLE `kiado` (
  `nev` varchar(255) NOT NULL,
  `kozpont` varchar(255) NOT NULL,
  `alapitas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `kiado`
--

INSERT INTO `kiado` (`nev`, `kozpont`, `alapitas`) VALUES
('Atlantic', 'Budapest', '1986-03-31'),
('Jelenkor', 'Budapest', '2003-07-19'),
('Kingpin', 'Pécs', '1979-04-30'),
('Mogul', 'Budapest', '1973-06-21'),
('Perfekt', 'Debrecen', '1996-10-11'),
('Pont', 'Pécs', '1993-08-18'),
('Saturn', 'Budapest', '1964-04-19'),
('Tevan', 'Budapest', '2000-06-12'),
('Unio', 'Szeged', '1987-11-30'),
('Vince', 'Budapest', '1967-01-23');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kozlemeny`
--

CREATE TABLE `kozlemeny` (
  `cim` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `szerzo` varchar(255) NOT NULL,
  `megirva` date NOT NULL,
  `folyoirat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `kozlemeny`
--

INSERT INTO `kozlemeny` (`cim`, `tema`, `szerzo`, `megirva`, `folyoirat`) VALUES
('85 éve uralja a világot a Monopoly', 'közélet', 'Kertész Dominik', '2019-11-01', 'Országjáró'),
('A családi pótlék kétszer jön decemberben', 'gazdaság', 'Gelencsér Erika', '2019-11-23', 'Agromania'),
('A Fölszállott a páva ismét a gyerekeké', 'művészet', 'Révész Károly', '2019-10-21', 'Déli Hírportál'),
('Algapavilont tervezett a magyar építész', 'természettudomány', 'Diósvölgyi László', '2014-05-20', 'Országépítő'),
('Az ellenfélnek nem volt Baja', 'sport', 'Kulcsár Tamás', '2019-09-19', 'Félegyházi Napló'),
('Az osztrák válogatott nyerte a csapatversenyt', 'sport', 'Világosi Réka', '2018-04-22', 'Kickback'),
('Bizonytalan a legendássá vált budapesti Lenin-mozaik sorsa', 'művészet', 'Budavári Anna', '2019-10-11', 'Korstárs'),
('Decemberig kell várni a szezonvégi jutalmakra', 'játékok', 'Mezei Patrik', '2017-11-20', 'Phantasy'),
('Egykor kilenc emberi faj élt a Földön', 'természettudomány', 'Balogh Andrea', '2018-11-20', 'Neutral'),
('Elektromos offenzívába kezd a Lexus', 'autók', 'Székely Csaba', '2019-03-30', 'Carforum'),
('Elfogták a wow classic szervereket támadó hackert', 'játékok', 'Fehérvári Mklós', '2019-08-07', 'Phantasy'),
('Ellenzéki fölény Jászberényben a megismételt szavazás után', 'politika', 'Soproni István', '2019-10-11', 'Nyugati Lap'),
('Elpusztult az utolsó szumátrai orrszarvú', 'természettudomány', 'Nagy Szilvia', '2019-10-30', 'Neutral'),
('Farkastámadástól tartanak a faluban', 'közélet', 'Kertész Dominik', '2012-01-12', 'Országjáró'),
('Féltette apja a Konyhafőnöktől Sztarenki Dórit', 'sztárvilág', 'Dull Péter', '2019-01-20', 'Bors'),
('Hamarosan Peruban szórnak majd internetet a Loon ballonjai', 'informatika', 'Vetési Norbert', '2019-10-30', 'ITplace'),
('Három agancsú szarvast kaptak lencsevégre', 'természettudomány', 'Balogh Andrea', '2018-05-15', 'Neutral'),
('Hatalmas áttörést érhettek el magyar fizikusok', 'természettudomány', 'Nagy Szilvia', '2015-03-08', 'Neutral'),
('Hatalmas vihar csapott le Szegedre', 'közélet', 'Váji Mária', '2019-03-10', 'Szegedi Hírportál'),
('Hazudnak Schumacher állapotáról?', 'sport', 'Végvári Szabolcs', '2019-11-14', 'Forma2'),
('Idegenben is győzelmet aratott a Liverpool', 'sport', 'Schmidt János', '2014-04-21', 'MindenAmiSport'),
('Ingyen skin ütheti a markotokat regisztációért cserébe', 'játékok', 'Fehérvári Miklós', '2018-09-11', 'Phantasy'),
('Jennifer Garner 25 percen keresztül kereste a kocsiját', 'sztárvilág', 'Marosi Anita', '2019-11-20', 'Blikk'),
('Karácsony Gergely Budapest új főpolgármestere', 'politika', 'Elek Zoltán', '2019-12-10', 'Népi tájékoztató'),
('Karácsonyi utalványt kapnak a nyugdíjasok', 'gazdaság', 'Teleki Szilvia', '2019-11-13', 'Agromania'),
('Kásler Miklós új feladatot kapott a kormánytól', 'politika', 'Nyers Antal', '2019-11-20', 'Demokrata Fórum'),
('Kegyetlen becsúszást úszott meg Szalai', 'sport', 'Nagy Gábor', '2019-11-20', 'MindenAmiSport'),
('Lilába borult a Szegedi Dóm', 'természettudomány', 'Diósvölgyi László', '2019-11-15', 'Országépítő'),
('Máig rejtély övezi Tutanhamon halálát', 'történelem', 'Foki Attila', '2019-04-14', 'Blikk'),
('Megkapaszkodott a magyar piacon a Revolut', 'informatika', 'Halasi Kristóf', '2019-11-20', 'Javalife'),
('Megtalálták az ősi King-Kong ma is élő rokonát', 'természettudomány', 'Nagy Szilvia', '2019-09-03', 'Neutral'),
('Miért barátkozik velünk Törökország?', 'politika', 'Soproni István', '2019-11-20', 'Nyugati Lap'),
('Minden idő leggyorsabb döntőjét játszották', 'sport', 'Mák István', '2013-11-20', 'FociMánia'),
('Nem lesz drága a következő generációs xbox', 'informatika', 'Komor András', '2017-02-02', 'KonzolAréna'),
('Nőkkel szembeni erőszak ellen tűntettek Olaszországban', 'közélet', 'Fehér Anna', '2019-11-22', 'Bors'),
('Nyüzsögnek a legyek a lakásokban', 'közélet', 'Keszhtelyi Béla', '2014-06-12', 'Országjáró'),
('Önvezető autót mutatott be a Tesla', 'autók', 'Magyar Péter', '2019-05-24', 'Vezess'),
('Pénzhiány miatt koncerteket mondott le Magyarország leghíresebb zenekara', 'művészet', 'Környei Izabella', '2019-11-05', 'Kortárs'),
('Soha nem vettek ennyi autót az EU-ban', 'autók', 'Magyar Péter', '2019-10-25', 'Vezess'),
('Soha nem volt ennyi szmog a Kínai levegőben', 'közélet', 'Sánta Martin', '2012-02-08', 'Blikk'),
('Sokkal kevesebb lesz a bor idén', 'gazdaság', 'Gelencsér Erika', '2016-08-23', 'Agromania'),
('Szobrokat farag utcai fatuskókba egy római férfi', 'művészet', 'Budavári Anna', '2019-02-11', 'Kortárs'),
('Tüntetés készül Budapesten', 'politika', 'Nyers Antal', '2018-12-10', 'Demokrata Fórum'),
('Új erőművek épülhetnek, ha az oroszok pénzt adnak Iránnak', 'gazdaság', 'Kecskeméti Tamás', '2017-03-22', 'MaiPiac'),
('Új gamer telefont dobott piacra a Razer', 'informatika', 'Halasi Kristóf', '2016-05-05', 'Javalife'),
('Újabb felvételeket hoztak nyilvánosságra a Plutorol', 'természettudomány', 'Németh Péter', '2015-07-20', 'Astro'),
('Újra csúcson a Real Madrid', 'sport', 'Demjén Attila', '2017-05-11', 'Kickback'),
('Újságcikkel ítélték halálra Rejtő Jenőt', 'történelem', 'Pereszlényi Péter', '2018-02-18', 'Blikk'),
('Verstappen nyerte a káoszba torkolló Brazil Nagydíjat', 'sport', 'Csáki Tibor', '2019-11-20', 'Forma2'),
('Virágzik a merevlemez biznisz', 'infomatika', 'Semerkényi András', '2017-01-22', 'ITplace'),
('Vízgőzt találtak a Titánon', 'természettudomány', 'Németh Péter', '2019-09-21', 'Astro');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerzo`
--

CREATE TABLE `szerzo` (
  `nev` varchar(255) NOT NULL,
  `szemelyi` int(11) NOT NULL,
  `varos` varchar(255) NOT NULL,
  `szuletes` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `szerzo`
--

INSERT INTO `szerzo` (`nev`, `szemelyi`, `varos`, `szuletes`) VALUES
('Környei Izabella', 1111, 'Békéscsaba', '1960-08-04'),
('Demjén Attila', 1376846, 'Szeged', '1971-12-31'),
('Kertész Dominik', 11778844, 'Budapest', '1987-06-16'),
('Pereszlényi Péter', 12345678, 'Budapest', '1978-01-30'),
('Semerkényi András', 12356785, 'Budapest', '1965-08-22'),
('Soproni István', 12679345, 'Budapest', '1963-01-04'),
('Magyar Péter', 12857328, 'Szeged', '1976-12-11'),
('Végvári Szabolcs', 13459887, 'Szabadka', '1990-12-09'),
('Fehér Anna', 13689422, 'Pécs', '1989-04-23'),
('Nagy Gábor', 23567895, 'Budapest', '1980-06-04'),
('Világosi Réka', 23786543, 'Kecskemét', '1985-02-28'),
('Elek Zoltán', 26471120, 'Miskolc', '1970-10-10'),
('Németh Péter', 26486894, 'Budapest', '1980-04-20'),
('Mezei Patrik', 26574857, 'Budapest', '1990-03-08'),
('Kecskeméti Tamás', 27468395, 'Budaörs', '1976-08-21'),
('Balogh Andrea', 27564987, 'Budapest', '1976-02-03'),
('Csáki Tibor', 34556677, 'Zalaegerszeg', '1982-07-26'),
('Váji Mária', 34778123, 'Budapest', '1962-05-22'),
('Komor András', 36578374, 'Sopron', '1979-11-17'),
('Nagy Szilvia', 36578648, 'Szeged', '1980-10-04'),
('Fehérvári Miklós', 36791687, 'Budapest', '1987-08-13'),
('Halasi Kristóf', 38925784, 'Kiskunhalas', '1991-08-25'),
('Schmidt János', 39784652, 'Baja', '1969-02-21'),
('Foki Attila', 45688914, 'Dunaújváros', '1991-06-26'),
('Budavári Anna', 45911020, 'Budapest', '1995-12-05'),
('Révész Károly', 49986666, 'Szeged', '1971-03-21'),
('Gelencsér Erika', 56389659, 'Bécs', '1976-12-01'),
('Diósvölgyi László', 57385683, 'Debrecen', '1963-05-23'),
('Marosi Anita', 57689346, 'Balatonfüred', '1987-07-27'),
('Keszthelyi Béla', 57894321, 'Dunaújváros', '1988-04-12'),
('Dull Péter', 67932456, 'Budapest', '1976-02-20'),
('Kulcsár Tamás', 68923417, 'Debrecen', '1989-02-04'),
('Teleki Szilvia', 69937742, 'Pozsony', '1980-08-10'),
('Székely Csaba', 88472641, 'Kiskunfélegyháza', '1975-04-15'),
('Nyers Antal', 93485871, 'Pécs', '1971-10-19'),
('Mák István', 93857465, 'Budakalász', '1968-04-24');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `folyoirat`
--
ALTER TABLE `folyoirat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kiado`
--
ALTER TABLE `kiado`
  ADD PRIMARY KEY (`nev`);

--
-- A tábla indexei `kozlemeny`
--
ALTER TABLE `kozlemeny`
  ADD PRIMARY KEY (`cim`);

--
-- A tábla indexei `szerzo`
--
ALTER TABLE `szerzo`
  ADD PRIMARY KEY (`szemelyi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
