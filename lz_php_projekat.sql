-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 12:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lz_php_projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(11) NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Korisnicko_ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `ID` int(11) NOT NULL,
  `Naziv` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slika` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`ID`, `Naziv`, `Slika`) VALUES
(1, 'Музички инструменти', 'img/kategorije/katinstrumenti.jpg'),
(2, 'Техничка опрема', 'img/kategorije/katoprema.jpg'),
(3, 'Остало', 'img/kategorije/katostalo.jpg'),
(4, 'Албуми', 'img/kategorije/katalbumi.jpeg'),
(5, 'Слушалице', 'img/kategorije/katslusalice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kupac`
--

CREATE TABLE `kupac` (
  `ID` int(11) NOT NULL,
  `Korisnicko_ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grad` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Post_broj` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ID` int(11) NOT NULL,
  `Kategorija` int(11) DEFAULT NULL,
  `Naziv` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `Cena` int(11) NOT NULL,
  `Slika` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ID`, `Kategorija`, `Naziv`, `Opis`, `Kolicina`, `Cena`, `Slika`) VALUES
(1, 2, 'Boss-KTN-50-2 pojacalo', 'Stage-ready 50-watt combo amp with a custom 12-inch speaker\r\nFive unique amp characters: Clean, Crunch, Lead, Brown (derived from the Waza amp), and Acoustic (for acoustic-electric guitars)\r\nChoose from a huge selection of customizable effects and effect routing configurations with the BOSS Tone Studio editor software\r\nDedicated gain, EQ, and effects controls for adjusting sounds quickly\r\nFour Tone Setting memories for storing and recalling all amp and effect settings\r\nPower Control for achieving cranked-amp tone and dynamic response at low volumes\r\nThree Cabinet Resonance types for fine-tuning the tone and feel\r\nMic’d cabinet emulation on the USB and phones/recording outputs, with customizable tone via three Air Feel settings\r\nChannel and global parametric EQs for refined sound shaping\r\nBuilt-in tilt stand for optimal monitoring and sound projection\r\nPro setups available at BOSS Tone Central\r\n\r\nKatana Version 3 Newly Added Features\r\nEffects selection expanded to 61 different types; Roland DC-30 Analog Chorus-Echo, BOSS GE-10 Graphic Equalizer, and 95E pedal wah added\r\nAssign favorite effects parameters to the front-panel effects knobs\r\nAssign specific effects parameters for control from an expression pedal connected via the rear panel\r\nRecord with stereo mod, EQ, delay, and reverb effects in a DAW via USB', 2, 19800, 'img/proizvodi/Boss-KTN-50-2.jpg'),
(2, 1, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', 'Iz vremena kada su gitare bile gitare a sedma i osma žica bila rezervisana za neke druge instrumente, stiže Hollywood serija Framus gitara. Jedinstveni dizajn karakterističan za Evropske proizvodjače električnih gitara je ponovo aktuelan.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n- Set Neck\r\n- Framus Vintage Machine heads\r\n- 24.75\" Scale length\r\n- 21 Nickel Silver frets\r\n- Rosewood fingerboard\r\n- Dot inlays\r\n- Mahogany neck\r\n- Plywood Top and Back / with wooden rim in the middle of body\r\n- Finish Available In: High Polish (Black and Red Gold)\r\n- Cream binding colour\r\n- Framus Vintage Single Coil (Neck and Bridge) Pickups\r\n- Passive MEC electronics\r\n- Volume/Treble/Bass/ Rotary switch\r\n- Framus Bridge with Framus Vintage Tailpiece\r\n- Standard strap locks\r\n- Chrome hardware colour\r\n- Framus strings: 10” – 46”\r\nNeck Dimensions:\r\nWidth at Nut: 43,0 mm\r\nWidth at 12th fret 53,4 mm\r\nThickness at 1th fret 21,0 mm\r\nThickness at 12th fret 24,0 mm', 34, 24310, 'img/proizvodi/framus-hollywood-sc-v51-fr05131-elektricna-gitara-0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kupac`
--
ALTER TABLE `kupac`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Kategorija` (`Kategorija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kupac`
--
ALTER TABLE `kupac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`Kategorija`) REFERENCES `kategorija` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
