-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 07:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Email`, `Korisnicko_ime`, `Lozinka`) VALUES
(1, 'admin@mail.com', 'ADMIN', 'admin');

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

--
-- Dumping data for table `kupac`
--

INSERT INTO `kupac` (`ID`, `Korisnicko_ime`, `Lozinka`, `Ime`, `Prezime`, `Telefon`, `Email`, `Grad`, `Post_broj`, `Adresa`) VALUES
(1, 'azerty', 'password', 'Ivan', 'Ivanovic', '061/1234567', 'ivan@mail.com', 'Beograd', '11300', 'Novi bulevar 14/25');

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
(2, 1, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', 'Iz vremena kada su gitare bile gitare a sedma i osma žica bila rezervisana za neke druge instrumente, stiže Hollywood serija Framus gitara. Jedinstveni dizajn karakterističan za Evropske proizvodjače električnih gitara je ponovo aktuelan.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n- Set Neck\r\n- Framus Vintage Machine heads\r\n- 24.75\" Scale length\r\n- 21 Nickel Silver frets\r\n- Rosewood fingerboard\r\n- Dot inlays\r\n- Mahogany neck\r\n- Plywood Top and Back / with wooden rim in the middle of body\r\n- Finish Available In: High Polish (Black and Red Gold)\r\n- Cream binding colour\r\n- Framus Vintage Single Coil (Neck and Bridge) Pickups\r\n- Passive MEC electronics\r\n- Volume/Treble/Bass/ Rotary switch\r\n- Framus Bridge with Framus Vintage Tailpiece\r\n- Standard strap locks\r\n- Chrome hardware colour\r\n- Framus strings: 10” – 46”\r\nNeck Dimensions:\r\nWidth at Nut: 43,0 mm\r\nWidth at 12th fret 53,4 mm\r\nThickness at 1th fret 21,0 mm\r\nThickness at 12th fret 24,0 mm', 34, 24310, 'img/proizvodi/framus-hollywood-sc-v51-fr05131-elektricna-gitara-0.jpg'),
(3, 2, 'Marshall DSL1CR gitarsko pojačalo', 'Marshall DSL1 CR je lampaško gitarko pojačalo koje predstavlja spoj moderne tehnologije i klasičnog Marshall izgleda spakovanog u male gabarite. Krase ga veoma moderan i dobar Gain koji je inspirisan po uzoru na već legendarni model JCM2000 smešten u 1W izlazne snage. Od lampi, poseduje dve ECC83 lampe u predpojačanju i jednu ECC82 lamu u pojačanju. DSL1 CR je pojačalo koje nikoga ne ostavlja ravnodušnim. Footswitch dolazi u kompletu sa pojačalom.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n2 x ECC83 preamp valves, 1 x ECC82 power valve\r\nTwo Channels – Clean and Overdrive (footswitchable)\r\nVolume and Gain for each channel plus Bass, Middle, Treble controls.\r\nTone Shift, Deep, and Channel Switches.\r\nFX Loop\r\nEmulated Line Out\r\nFootswitch Included\r\nEra Correct Cosmetics\r\n8 & 16 Ohm Speaker Outputs\r\n8” Celestion Speaker (combo)\r\nPower Switch (1w > 0.1w)\r\nCommemorative Rear Panel Plaque', 3, 37500, 'img/proizvodi/7003.jpg'),
(4, 2, 'Roland Micro Cube-GX WH gitarsko pojačalo', 'MICRO CUBE je već 10 godina najprodavanije gitarsko pojačalo koje radi i na baterije. Najnovija verzija MICRO CUBE - GX je i dalje malih dimenzija i ogromnog zvuka kao i legendarni preci, ali poseduje i brojna poboljšanja i dodatke kao što su i-CUBE LINK, još veća snaga, hromatski tuner i MEMORY funkcija za snimanje omiljenih postavki. Dodata su dva efekta - snažan EXTREME sa visokim gainom i HEAVY OCTAVE za ultra duboke zvuke. i-CUBE LINK stvara nove mogućnosti za snimanje i sviranje uz ugrađeni audio interfejs za korišćenje muzičkih aplikacija sa iPhone, iPad ili iPod touch uređaja. MICRO CUBE GX je maleno gitarsko pojačalo koje radi i na baterije ali poseduje isto tako jak zvuk koji je proslavio originalni MICRO CUBE širom sveta. Možete uživati u maskimalno 25 sati sviranja sa samo 6 NiMH AA baterija i svirati kod kuće, na plaži, u kampu, na putovanju - bilo gde! Još veća snaga dodatno je poboljšanje kao i ugrađen hromatski štimer pa se ne mora ni posedovati dodatni štimer.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\nRated Power Output 3 WNominal Input Level (1 kHz) INPUT: -10 dBu/1 M ohm\r\ni-CUBE LINK/AUX IN: -10 dBu\r\nSpeaker 12 cm (5 inches) x 1Controls POWER switch\r\nAMP TYPE switch (ACOUSTIC SIM, JC CLEAN, BLACK PANEL, BRIT COMBO, CLASSIC STACK, R-FIER STACK, EXTREME, MIC)\r\nMEMORY button\r\nTUNER button\r\nGAIN knob\r\nVOLUME knob\r\nTONE knob\r\nEFX knob (CHORUS, FLANGER, PHASER, TREMOLO, HEAVY OCTAVE)\r\nDELAY/REVERB knob (DELAY, REVERB, SPRING)\r\nMASTER knob\r\nIndicators POWER\r\nMEMORY\r\nEFX\r\nDELAY/REVERB\r\nTUNER\r\nConnectors INPUT jack (1/4-inch phone type)\r\ni-CUBE LINK/AUX IN jack (4-pole miniature phone type)\r\nREC OUT/PHONES jack (Stereo miniature phone type)\r\nDC IN jack\r\nPower Supply AC adaptor\r\nAlkaline battery (AA, LR6) x 6\r\nRechargeable Ni-MH battery (AA, HR6) x 6\r\nCurrent Draw 155 mAExpected battery life under continuous use Alkaline battery: Approximately 20 hours\r\nRechargeable Ni-MH battery: Approximately 25 hours (When using batteries having a capacity of 2,400 mAh.)\r\n* This can vary depending on the capacity of the batteries and the conditions of use.\r\nAccessories Owner\'s Manual\r\nAC adaptor\r\nStrap\r\nMini cable (4-pole miniature phone type)\r\nSize and Weight\r\nWidth (W)247 mm9-3/4 inchesDepth (D)172 mm6-13/16 inchesHeight (H)227 mm8-15/16 inchesWeight 2.7 kg6 lbs.\r\n* 0 dBu = 0.775 Vrms', 14, 16800, 'img/proizvodi/roland-micro-cube-gx-gitarsko-pojacalo-0.jpg'),
(5, 1, 'Yamaha CG 182 SF Flamenko gitara', 'Yamaha CG 182 SF Klasična gitara je naslednik modela CG 171 SF.Ova autentična flamenko gitara zadovoljava potrebe flamenko gitarista.Za ovaj modek karakteristično je da ima nizu akciju,sjajan \"playability\",brz odgovor i attack.\r\n\r\n \r\n\r\nYamaha CG Shape\r\nSolid Spruce Top\r\nCypress Back & Sides\r\nNato Neck\r\nEbony Fingerboard\r\nTransparent Pickguard', 2, 60600, 'img/proizvodi/yamaha-cg-182-sf_2.jpg'),
(6, 1, 'Ibanez GRX70QA-TEB električna gitara', 'Ibanez GRX70QA-TEB električna gitara je dragulj GIO serije. Po estetici, svestranosti, i odnosu uloženo-dobijeno teško da ima pravu konkurenciju u svom cenovnom rangu. Quilted maple top na trupu od topole, udoban vrat sa 22 praga, Ibanez T106 tremolo. Dva Infinity R pasivna keramička humbucker-a kombinovana sa Infinity RS single coil magnetom u srednjoj poziciji, za svaki zamislivi muzički scenario. Prepoznatljiva Ibanez lakoća sviranja, jednako upotrebljiva kod kuće, ili na bini. Odličan izbor za spretnije početnike, hobiste, i sve koji žele moderan, kvalitetan, i lep instrument po prihvatljivoj ceni.\r\n\r\n\r\n\r\nZa više informacija posetite sajt proizvođača!\r\nPogledajte i ostatak Ibanez ponude!\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\nneck type: GRX neck Maple\r\ntop/back/body: Quilted Maple Art Grain top / Poplar body\r\nfretboard: Treated New Zealand Pine / White dot inlay\r\nfrets: Medium frets\r\nbridge: Ibanez T106 tremolo bridge\r\nneck pickup: Infinity R (H) neck pickup Passive/Ceramic\r\nmiddle pickup: Infinity RS (S) middle pickup Passive/Ceramic\r\nbridge pickup: Infinity R (H) bridge pickup Passive/Ceramic\r\nhardware color: Chrome', 7, 21995, 'img/proizvodi/Ibaney-GRX70QA-TEB-električna-gitara-1.jpg'),
(7, 1, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', 'Ibanez Elektro akustična gitara model PF15ECE crne boje. Standard elektro akustične gitare.\r\n\r\n \r\n\r\nModel : Dreadnought\r\nPrednja ploča : Spruce\r\nZadnja ploča i strane : Mahogany\r\nVrat : Mahogany\r\nSkala : 650 mm\r\nFretboard : Rosewood\r\n20 pragova\r\nŠirina nuta : 42.0 mm\r\nMagnet : Ibanez under saddle pickup\r\nIbanez AEQ2T electronics with built-in tuner\r\nKobilica : Rosewood bridge\r\nČivije : Diecast machine heads\r\nHromirani metalni delovi \r\nBoja : Black', 29, 29760, 'img/proizvodi/ibanez-pf15ece-bk-akusticna-gitara-0.jpg'),
(8, 1, 'LAG Arkane 100 GRS električna gitara', 'LAG Arcane 100 je ozbiljan alat za gitariste svih sviračkih stadijuma.Telo od basswood-a, 2 Duncan magneta, hardware u mat crnom finišu,šrafljen vrat od javora, grif platno od Indonežanskog ružinog drveta, 24 praga, nut od grafita. Gitara jako dobro leži u ruci, vrat je komforan i namenjen modernijem stilu sviranja.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n- Bridge: fixed bridge\r\n- Hardware: Black satin\r\n- Neck: Bolt-on, hard rock maple\r\n- Fingerboard: Indonesian Rosewood\r\n- Frets: 24 / Silver-Nickel\r\n- Body: Basswood carved top body\r\n- Finish: High gloss\r\n- Pickups: 2 Duncan Designed Humbuckers\r\n- Controls: 1 volume, 1 tone, 3-way switch\r\n- Bridge: fixed bridge\r\n- Hardware: Black satin\r\n- Neck: Bolt-on, hard rock maple\r\n- Fingerboard: Indonesian Rosewood\r\n- Trussrod: 2 Way System\r\n- Frets: 24 / Silver-Nickel\r\n- Headstock: Hard Rock Maple / Silver logo\r\n- Machine heads: 6 in line / Die cast high precision, black satin finish\r\n- Nut: Black graphite / 43 mm\r\n- Strings: D’Addario', 11, 32470, 'img/proizvodi/lag-arkane-100-grs-elektricna-gitara-0.jpg');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kupac`
--
ALTER TABLE `kupac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
