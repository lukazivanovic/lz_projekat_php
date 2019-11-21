-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:30 PM
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

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Email`, `Korisnicko_ime`, `Lozinka`) VALUES
(1, 'a@aol.com', 'ADMIN', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `ID` int(11) NOT NULL,
  `Naslov` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Opis` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Slika` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alt` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`ID`, `Naslov`, `Opis`, `Slika`, `Alt`) VALUES
(1, 'First slide label', 'Nulla vitae elit libero, a pharetra augue mollis interdum.', 'carousel01.jpg', 'alt1'),
(2, 'Second slide label', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'carousel02.jpg', 'alt2'),
(3, 'Third slide label', 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.', 'carousel03.jpg', 'alt3'),
(4, 'Fourth slide label', 'fpqefjef qefkqenfpef eqqefnqepf enqfenfpngsv bbtgwb.', 'carousel04.jpg', 'alt4'),
(5, 'Peta slika', 'opis...', 'upload_29919_1.jpg', 'alt5'),
(6, 'metal majice', 'metal', 'rock-metal-majice-slika-87954764.jpg', 'alt6');

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
(1, 'Музички инструменти', 'katinstrumenti.jpg'),
(2, 'Техничка опрема', 'katoprema.jpg'),
(3, 'Остало', 'katostalo.jpg'),
(4, 'Албуми', 'katalbumi.jpeg'),
(5, 'Слушалице', 'katslusalice.jpg'),
(9, 'Мајице', '1573663727_3568.jpg');

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
(1, 'azerty123', 'pass', 'Bob', 'Smith', '060/1234567', 'b@b.com', 'Toronto', '55555', 'Novi bulevar 310/34'),
(2, 'ana', 'ana', 'Ana', 'Jovic', '061/6655447', 'ana@a.com', 'Chicago', '12321', '2. Rimska 3a'),
(3, 'alan', 'alan', 'Alan', 'Davidson', '064/354-9752', 'alen@al.com', 'Boston', '8798493', '53b Central Street');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ID` int(11) NOT NULL,
  `Kategorija` int(11) DEFAULT NULL,
  `Naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `Cena` decimal(9,2) NOT NULL,
  `Slika` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ID`, `Kategorija`, `Naziv`, `Opis`, `Kolicina`, `Cena`, `Slika`) VALUES
(1, 2, 'Boss-KTN-50-2 pojacalo', 'Stage-ready 50-watt combo amp with a custom 12-inch speaker\r\nFive unique amp characters: Clean, Crunch, Lead, Brown (derived from the Waza amp), and Acoustic (for acoustic-electric guitars)\r\nChoose from a huge selection of customizable effects and effect routing configurations with the BOSS Tone Studio editor software\r\nDedicated gain, EQ, and effects controls for adjusting sounds quickly\r\nFour Tone Setting memories for storing and recalling all amp and effect settings\r\nPower Control for achieving cranked-amp tone and dynamic response at low volumes\r\nThree Cabinet Resonance types for fine-tuning the tone and feel\r\nMic’d cabinet emulation on the USB and phones/recording outputs, with customizable tone via three Air Feel settings\r\nChannel and global parametric EQs for refined sound shaping\r\nBuilt-in tilt stand for optimal monitoring and sound projection\r\nPro setups available at BOSS Tone Central\r\n\r\nKatana Version 3 Newly Added Features\r\nEffects selection expanded to 61 different types; Roland DC-30 Analog Chorus-Echo, BOSS GE-10 Graphic Equalizer, and 95E pedal wah added\r\nAssign favorite effects parameters to the front-panel effects knobs\r\nAssign specific effects parameters for control from an expression pedal connected via the rear panel\r\nRecord with stereo mod, EQ, delay, and reverb effects in a DAW via USB', 0, '19800.00', 'Boss-KTN-50-2.jpg'),
(2, 1, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', 'Iz vremena kada su gitare bile gitare a sedma i osma žica bila rezervisana za neke druge instrumente, stiže Hollywood serija Framus gitara. Jedinstveni dizajn karakterističan za Evropske proizvodjače električnih gitara je ponovo aktuelan.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n- Set Neck\r\n- Framus Vintage Machine heads\r\n- 24.75\" Scale length\r\n- 21 Nickel Silver frets\r\n- Rosewood fingerboard\r\n- Dot inlays\r\n- Mahogany neck\r\n- Plywood Top and Back / with wooden rim in the middle of body\r\n- Finish Available In: High Polish (Black and Red Gold)\r\n- Cream binding colour\r\n- Framus Vintage Single Coil (Neck and Bridge) Pickups\r\n- Passive MEC electronics\r\n- Volume/Treble/Bass/ Rotary switch\r\n- Framus Bridge with Framus Vintage Tailpiece\r\n- Standard strap locks\r\n- Chrome hardware colour\r\n- Framus strings: 10” – 46”\r\nNeck Dimensions:\r\nWidth at Nut: 43,0 mm\r\nWidth at 12th fret 53,4 mm\r\nThickness at 1th fret 21,0 mm\r\nThickness at 12th fret 24,0 mm', 34, '24310.00', 'framus-hollywood-sc-v51-fr05131-elektricna-gitara-0.jpg'),
(3, 2, 'Marshall DSL1CR gitarsko pojačalo', 'Marshall DSL1 CR je lampaško gitarko pojačalo koje predstavlja spoj moderne tehnologije i klasičnog Marshall izgleda spakovanog u male gabarite. Krase ga veoma moderan i dobar Gain koji je inspirisan po uzoru na već legendarni model JCM2000 smešten u 1W izlazne snage. Od lampi, poseduje dve ECC83 lampe u predpojačanju i jednu ECC82 lamu u pojačanju. DSL1 CR je pojačalo koje nikoga ne ostavlja ravnodušnim. Footswitch dolazi u kompletu sa pojačalom.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n2 x ECC83 preamp valves, 1 x ECC82 power valve\r\nTwo Channels – Clean and Overdrive (footswitchable)\r\nVolume and Gain for each channel plus Bass, Middle, Treble controls.\r\nTone Shift, Deep, and Channel Switches.\r\nFX Loop\r\nEmulated Line Out\r\nFootswitch Included\r\nEra Correct Cosmetics\r\n8 & 16 Ohm Speaker Outputs\r\n8” Celestion Speaker (combo)\r\nPower Switch (1w > 0.1w)\r\nCommemorative Rear Panel Plaque', 3, '37500.00', '7003.jpg'),
(4, 2, 'Roland Micro Cube-GX WH gitarsko pojačalo', 'MICRO CUBE je već 10 godina najprodavanije gitarsko pojačalo koje radi i na baterije. Najnovija verzija MICRO CUBE - GX je i dalje malih dimenzija i ogromnog zvuka kao i legendarni preci, ali poseduje i brojna poboljšanja i dodatke kao što su i-CUBE LINK, još veća snaga, hromatski tuner i MEMORY funkcija za snimanje omiljenih postavki. Dodata su dva efekta - snažan EXTREME sa visokim gainom i HEAVY OCTAVE za ultra duboke zvuke. i-CUBE LINK stvara nove mogućnosti za snimanje i sviranje uz ugrađeni audio interfejs za korišćenje muzičkih aplikacija sa iPhone, iPad ili iPod touch uređaja. MICRO CUBE GX je maleno gitarsko pojačalo koje radi i na baterije ali poseduje isto tako jak zvuk koji je proslavio originalni MICRO CUBE širom sveta. Možete uživati u maskimalno 25 sati sviranja sa samo 6 NiMH AA baterija i svirati kod kuće, na plaži, u kampu, na putovanju - bilo gde! Još veća snaga dodatno je poboljšanje kao i ugrađen hromatski štimer pa se ne mora ni posedovati dodatni štimer.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\nRated Power Output 3 WNominal Input Level (1 kHz) INPUT: -10 dBu/1 M ohm\r\ni-CUBE LINK/AUX IN: -10 dBu\r\nSpeaker 12 cm (5 inches) x 1Controls POWER switch\r\nAMP TYPE switch (ACOUSTIC SIM, JC CLEAN, BLACK PANEL, BRIT COMBO, CLASSIC STACK, R-FIER STACK, EXTREME, MIC)\r\nMEMORY button\r\nTUNER button\r\nGAIN knob\r\nVOLUME knob\r\nTONE knob\r\nEFX knob (CHORUS, FLANGER, PHASER, TREMOLO, HEAVY OCTAVE)\r\nDELAY/REVERB knob (DELAY, REVERB, SPRING)\r\nMASTER knob\r\nIndicators POWER\r\nMEMORY\r\nEFX\r\nDELAY/REVERB\r\nTUNER\r\nConnectors INPUT jack (1/4-inch phone type)\r\ni-CUBE LINK/AUX IN jack (4-pole miniature phone type)\r\nREC OUT/PHONES jack (Stereo miniature phone type)\r\nDC IN jack\r\nPower Supply AC adaptor\r\nAlkaline battery (AA, LR6) x 6\r\nRechargeable Ni-MH battery (AA, HR6) x 6\r\nCurrent Draw 155 mAExpected battery life under continuous use Alkaline battery: Approximately 20 hours\r\nRechargeable Ni-MH battery: Approximately 25 hours (When using batteries having a capacity of 2,400 mAh.)\r\n* This can vary depending on the capacity of the batteries and the conditions of use.\r\nAccessories Owner\'s Manual\r\nAC adaptor\r\nStrap\r\nMini cable (4-pole miniature phone type)\r\nSize and Weight\r\nWidth (W)247 mm9-3/4 inchesDepth (D)172 mm6-13/16 inchesHeight (H)227 mm8-15/16 inchesWeight 2.7 kg6 lbs.\r\n* 0 dBu = 0.775 Vrms', 14, '16800.00', 'roland-micro-cube-gx-gitarsko-pojacalo-0.jpg'),
(5, 1, 'Yamaha CG 182 SF Flamenko gitara', 'Yamaha CG 182 SF Klasična gitara je naslednik modela CG 171 SF.Ova autentična flamenko gitara zadovoljava potrebe flamenko gitarista.Za ovaj modek karakteristično je da ima nizu akciju,sjajan \"playability\",brz odgovor i attack.\r\n\r\n \r\n\r\nYamaha CG Shape\r\nSolid Spruce Top\r\nCypress Back & Sides\r\nNato Neck\r\nEbony Fingerboard\r\nTransparent Pickguard', 2, '60600.00', 'yamaha-cg-182-sf_2.jpg'),
(6, 1, 'Ibanez GRX70QA-TEB električna gitara', 'Ibanez GRX70QA-TEB električna gitara je dragulj GIO serije. Po estetici, svestranosti, i odnosu uloženo-dobijeno teško da ima pravu konkurenciju u svom cenovnom rangu. Quilted maple top na trupu od topole, udoban vrat sa 22 praga, Ibanez T106 tremolo. Dva Infinity R pasivna keramička humbucker-a kombinovana sa Infinity RS single coil magnetom u srednjoj poziciji, za svaki zamislivi muzički scenario. Prepoznatljiva Ibanez lakoća sviranja, jednako upotrebljiva kod kuće, ili na bini. Odličan izbor za spretnije početnike, hobiste, i sve koji žele moderan, kvalitetan, i lep instrument po prihvatljivoj ceni.\r\n\r\n\r\n\r\nZa više informacija posetite sajt proizvođača!\r\nPogledajte i ostatak Ibanez ponude!\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\nneck type: GRX neck Maple\r\ntop/back/body: Quilted Maple Art Grain top / Poplar body\r\nfretboard: Treated New Zealand Pine / White dot inlay\r\nfrets: Medium frets\r\nbridge: Ibanez T106 tremolo bridge\r\nneck pickup: Infinity R (H) neck pickup Passive/Ceramic\r\nmiddle pickup: Infinity RS (S) middle pickup Passive/Ceramic\r\nbridge pickup: Infinity R (H) bridge pickup Passive/Ceramic\r\nhardware color: Chrome', 0, '21995.00', 'Ibaney-GRX70QA-TEB-električna-gitara-1.jpg'),
(7, 1, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', 'Ibanez Elektro akustična gitara model PF15ECE crne boje. Standard elektro akustične gitare.\r\n\r\n \r\n\r\nModel : Dreadnought\r\nPrednja ploča : Spruce\r\nZadnja ploča i strane : Mahogany\r\nVrat : Mahogany\r\nSkala : 650 mm\r\nFretboard : Rosewood\r\n20 pragova\r\nŠirina nuta : 42.0 mm\r\nMagnet : Ibanez under saddle pickup\r\nIbanez AEQ2T electronics with built-in tuner\r\nKobilica : Rosewood bridge\r\nČivije : Diecast machine heads\r\nHromirani metalni delovi \r\nBoja : Black', 29, '29760.00', 'ibanez-pf15ece-bk-akusticna-gitara-0.jpg'),
(8, 1, 'LAG Arkane 100 GRS električna gitara', 'LAG Arcane 100 je ozbiljan alat za gitariste svih sviračkih stadijuma.Telo od basswood-a, 2 Duncan magneta, hardware u mat crnom finišu,šrafljen vrat od javora, grif platno od Indonežanskog ružinog drveta, 24 praga, nut od grafita. Gitara jako dobro leži u ruci, vrat je komforan i namenjen modernijem stilu sviranja.\r\n\r\nFacebookTwitterPinterestEmailShare\r\nTehničke specifikacije proizvoda\r\n- Bridge: fixed bridge\r\n- Hardware: Black satin\r\n- Neck: Bolt-on, hard rock maple\r\n- Fingerboard: Indonesian Rosewood\r\n- Frets: 24 / Silver-Nickel\r\n- Body: Basswood carved top body\r\n- Finish: High gloss\r\n- Pickups: 2 Duncan Designed Humbuckers\r\n- Controls: 1 volume, 1 tone, 3-way switch\r\n- Bridge: fixed bridge\r\n- Hardware: Black satin\r\n- Neck: Bolt-on, hard rock maple\r\n- Fingerboard: Indonesian Rosewood\r\n- Trussrod: 2 Way System\r\n- Frets: 24 / Silver-Nickel\r\n- Headstock: Hard Rock Maple / Silver logo\r\n- Machine heads: 6 in line / Die cast high precision, black satin finish\r\n- Nut: Black graphite / 43 mm\r\n- Strings: D’Addario', 11, '32470.00', 'lag-arkane-100-grs-elektricna-gitara-0.jpg'),
(9, 5, 'Slušalice AKG K 141 MK II', 'Slušalice AKG K 141 MK II  je nova verzija legendarnih AKG slušalica sa XXL transduserima sa Varimotion™ tehnologijom koji daju veću osetljivost, širi dinamički opseg i visoku osetljivost SPL. Njihova niska impedanca im omogućuje odlične porfomanse prilikom prsalušavanja sa računara i CD playera. Odlične su za monitoring jer imaju odličnu punoću zvuka koji je pun detalja.\r\n\r\nOsetljivost : 101 dB/mW, 114 dB/V Frekventni opseg : 18 to 24,000 Hz Impedansa : 55 ohms Max. input power : 200 mW Masa : 225g', 67, '10111.00', '1574266686_7722.jpg'),
(10, 5, 'Slušalice AKG K 240 MK II', 'Slušalice AKG K 240 MK II je nova verzija AKG-ovih slušalica sa Varimotion™ tehnologijom.Dobar bas, precizni srednji tonovi i kristalno jasni visoki tonovi su odlika ovih slušalica.Profesionalna hi-fi stereo i studio slušalica koja vam otvara nove dimenzije zvuka.', 54, '20060.00', '1574266814_1473.jpg'),
(11, 5, 'Slušalice AKG K 44', 'Slušalice AKG K 44 su pristupačne za razne primene kao što je Home Recording.  Ove zatvorene slušalice su veoma svestrane sa solidnim basom i čistim visokim tonovima po pristupačnoj ceni. Ove slušalice imaju i podesivu traku za glavu što omogućava udobnost. Većina slušalica posle određenog vremena počinju da smetaju ali AKG se potrudio i rešio taj problem. \r\n\r\nImpedanca : 32 Ohm\r\nFrekventni opseg : 18 Hz - 20 kHz\r\nOsetljivost : 115 dB\r\nDužina kabla : 3m', 0, '4521.00', '1574266886_4552.jpg'),
(12, 3, 'Trzalice DUNLOP', 'Trzalice Dunlop raznih promera i boja. Delrin, Tortex, Stubby\r\n\r\nCena je za jedan komad.', 1758, '70.00', '1574267165_6322.jpg'),
(13, 1, 'Violina Valencia V160 1/2', 'Violina Valencia V160 1/2  za početnike, u paketu koji se sastoji od:\r\n\r\nvioline\r\nkofera\r\ngudala\r\npodbratka', 27, '12500.00', '1574267311_9509.jpg'),
(14, 3, 'Trzalice Jim Dunlop Jazz XL', 'Trzalice Jim Dunlop Jazz XL savrsen jazzy ton, jedna od boljih XL series Jim Dunlop familije.\r\n\r\nDostupne u dve boje: Crna i Crvena', 1213, '120.00', '1574267423_9152.png'),
(15, 1, 'Violina Valencia V160 4/4', 'Violina Valencia V160 4/4 za početnike, u paketu koji se sastoji od:\r\n\r\nvioline\r\nkofera\r\ngudala\r\npodbratka', 2, '12500.00', '1574267557_1681.jpg'),
(16, 3, 'Trzalice Jim Dunlop Ultex', 'Trzalice Jim Dunlop Ultex najmodernije generacije, dostupne u svim velicinama.', 1111, '90.00', '1574267640_6577.jpg'),
(17, 3, 'Futrola za akustičnu gitaru Ibanez ISAB501-BK', 'Futrola za akustičnu gitaru Ibanez ISAB501-BK, Thicker Shoulder Pads Improved Strap Angle Waist Belt Water-Proof Additional Flat Pocket Bottle Holder Internal Neck Holding Belt', 315, '4013.00', '1574267720_5718.jpg'),
(18, 3, 'Kofer za električnu gitaru EC-450', 'Kofer za električnu gitaru EC-450 je uradjen od PVC plastike u kombinaciji sa aluminijumom. Kofer je zaista dobar i kvalitetan za svoj cenovni rang.', 535, '8024.00', '1574267820_8450.jpg'),
(19, 2, 'Magnet za električnu gitaru EMG 81', 'Najčuveniji EMG, magnet koji je pokrenuo revoluciju. Moćan keramički magnet, sa visokim frekvencijama koje režu i neprevazidjenim sustain-om. Predviđen za bridge poziciju, omogućiće vam uvek jasan i prepoznatljiv zvuk..', 78, '10350.00', '1574267959_6894.jpg'),
(20, 2, 'EMG BQS kontrole za bas gitaru', 'EMG BQS kontrole za bas gitaru\r\n\r\nBass, treble i potpuna mid kontrola (Mid Frequency & Mid EQ) za Vaš bas sa EMG magnetima.', 39, '17160.00', '1574268036_7145.jpg'),
(21, 2, 'Kapice za potenciometar Dr. Parts PNB1/V', 'Kapice za potenciometar marke Dr. Parts u beloj i crnoj varijanti.', 444, '250.00', '1574268085_6507.jpg'),
(22, 2, 'Žice za akustičnu gitaru Martin Darco D-5000', 'Žice za akustičnu gitaru Martin Darco D-5000 za akustičnu gitaru Martin kvaliteta. Prepoznatljiv zvuk i na svakoj gitari umeju da zazvuče kako treba..\r\nDebljina : 0010-047', 647, '604.00', '1574268180_9215.gif'),
(23, 2, 'Boss BF-3 Flanger', 'Zahvaljujući svom 20 godišnjem iskustvu i poznatoj BOSS BF-2, nova BF-3 Flanger pedala pruža gitaristima i basistima unapređenu verziju klasičnog BOSS flangera najboljim stereo flanging zvucima. Dva nova modusa (Ultra i Gate/Pan) kreiraju efekat sa izuzetnom dubinom, čak i efekte i zvuke Slicera i zvuk koji kao da se vrti oko slušaoca.', 64, '12390.00', '1574268260_1630.jpg'),
(24, 2, 'Mikrofon SHURE Beta57A', 'The Shure Beta 57A® is a high output supercardioid dynamic microphone designed for professional sound reinforcement and project studio recording. It maintains a true supercardioid pattern throughout its frequency range. This insures high gain-before-feedback, maximum isolation from other sound sources, and minimum off–axis tone coloration. Excellent for acoustic and electric instruments as well as for vocals, the extremely versatile Beta 57A dynamic microphone provides optimal warmth and presence. Typical applications include drums, guitar amplifiers, brass, woodwinds and vocals.', 75, '17853.00', '1574268513_4244.jpg'),
(25, 3, 'Hercules GS405B stalak za gitaru', 'Odličan kvalitet izrade, dizajn i fleksibilnost. Bez obzira da li snimate u studiju ili svirate kod kuće, hercules stalak je uvek dobrodošao za vaš instrument. ', 6, '2010.00', '1574268589_8631.jpg'),
(26, 3, 'Kabl Samson TIL20', 'Profesionalni instrumentalni kabal sa Neutric konekcijom dužine 6m, idealan za električne gitare, bas ili akustične gitare, sa jednim pravim konektorom i jednim pod uglom.\r\n\r\nGenuine Neutrik® nickel-plated phone plug\r\nNylon insulator\r\nLarge diameter stranded copper conductor\r\nCarbon insulator reduces capacitance, eliminating RFI/EMI noise\r\nBraided copper shield with 96% coverage to greatly reduce noise\r\nHeavy-duty flexible 6mm PVC outer jacket', 79, '2399.00', '1574268644_7505.jpg'),
(27, 1, 'Bubnjevi Gretsch Blackhawk E825H2', 'Bubnjevi Gretsch Blackhawk E825H2,Petodelni set od poznate čuvene kompanije Gretsch. Ovi akustični bubnjevi imaju odličan i zadivljujući finiš koji  vas neće ostaviti ravnodušnim. Odnos cena-kvalitet je po našoj proceni više nego očekivan. Bubanj ima inzvaredan pun zvuk.\r\n\r\n \r\n\r\nTom : 10\" x 8\" TT, 12\" x 9\"\r\n\r\n \r\n\r\nFloor Tom : 14\" x 14\"\r\n\r\nBass Bubanj : 22\" x 18\"\r\n\r\nDodoš : 14\" x 5.5\"\r\n\r\nBoja : Liquid Black\r\n\r\nInc Hardware\r\n\r\nGretsch BH-E825H2-LB Blackhawk', 28, '55342.00', '1574270883_7500.jpg'),
(28, 4, 'Les Vents Francais - Beethoven: Wind Chamber Music', 'Godina: 2018\r\nŽanr: Classical\r\nPakovanje: CD \r\n                                                                                            Opis\r\n\r\nOvo izdanje Warner Classics je sastavljeno od Betovenove muzike. Les Vents Français je iskusio veliki uspeh na koncertima i snimanim izdanjima pa su želeli da se oprobaju i u Betovenovoj muzici, ulazeći tako u veoma nesigurnu teritoriju. \r\n\r\nTracklist\r\n\r\nCD:\r\n\r\n    Trio for 2 oboes & English horn in C major, Op. 87\r\n    Trio for piano, flute & bassoon in G major, WoO 37\r\n    Variations for 2 oboes & English horn in C major on Mozarts La ci darem, WoO 28\r\n    Sonata for horn & piano in F major, Op. 17\r\n    Duo for clarinet & bassoon in B flat major, WoO 27/3', 5, '1599.00', 'Les-Vents-Francais-Beethoven-Wind-Chamber-Music_1533111358.jpg'),
(29, 4, 'John Coltrane - MY FAVORITE THINGS', ' Godina: 2016\r\nŽanr: Rock\r\nPakovanje: LP \r\nTracklist\r\n\r\n\r\n1. My Favorite Things\r\n2. Ev\'ry Time We Say Goodbye\r\n3. But Not for Me ', 3, '2639.00', '1574270237_1593.jpg'),
(30, 9, 't-shirt metal mens AC-DC - FOR THOSE ABOUT TO ROCK - AMPLIFIED', 'Stylish mens high quality sports t-shirt (rashguard/ jersey), by AMPLIFIED.\r\n\r\nIdeal for both sport and casual wear.\r\nThe fabric is slightly elastic.\r\nThe applied fabric ensures excellent transport of sweat away from the skin and guarantees a very high comfort of wearing. \r\nComposition: 100% polyester.\r\n\r\nApprox. dimensions in centimeters (CIRC. is 2x width)\r\n\r\nMeasured in idle state on a flat surface.', 4, '6190.00', '1574270770_6723.jpg'),
(31, 4, 'The Doors - L.A.WOMAN', ' Godina: 1971\r\nŽanr: Rock\r\nPakovanje: LP \r\n Opis\r\n\r\nL.A. Woman je sedmi album američke rok grupe The Doors, ujedno i poslednji njihov album objavljen za života Džima Morisona, izdat u aprilu 1971. godine.\r\n\r\nTracklist\r\n\r\n\r\n1. The Changeling\r\n2. Love Her Madly\r\n3. Been Down So Long\r\n4. Cars Hiss By My Window\r\n5. L.A. Woman\r\n6. L\'America\r\n7. Hyacinth House\r\n8. Crawling King Snake\r\n9. The Wasp ( Texas Radio And The Big Beat )\r\n10. Riders On The Storm\r\n11. Orange County Suite\r\n12. (You Need Meat) Don\'t Go No Further\r\n|\r\nReizdanje klasi?nog albuma legendarnih The Doors na vinilu - u obliku u kom se pojavio kada je prvi put ugledao svetlost dana.', 6, '3513.00', '1574270415_1779.jpg'),
(32, 9, 't-shirt metal mens Kiss - RETRO DESTROYER - PLASTIC HEAD', 'Stylish mens t-shirt with high quality print.\r\n\r\nColor: black.\r\n\r\nComposition: 100%. cotton\r\n\r\nApprox. dimensions in centimeters (CIRC. is 2x width) \r\n\r\nPlease note that the dimensions stated in the size chart are only approximate. The actual sizes may slightly vary between different products (or styles). ', 7, '1700.00', '115103_s014.jpg'),
(33, 9, 't-shirt metal mens Queen - FREDDIE MERCURY - PLASTIC HEAD', 'Stylish mens t-shirt with high quality print.\r\n\r\nColor: black.\r\n\r\nComposition: 100%. cotton\r\n\r\nApprox. dimensions in centimeters (CIRC. is 2x width) \r\n\r\nPlease note that the dimensions stated in the size chart are only approximate. The actual sizes may slightly vary between different products (or styles). ', 6, '1690.00', '115027_a011.jpg'),
(34, 9, 't-shirt metal mens Stone Temple Pilots - LOGO - PLASTIC HEAD', 'Stylish mens t-shirt with high quality print.\r\n\r\nColor: black.\r\n\r\nComposition: 100%. cotton\r\n\r\nApprox. dimensions in centimeters (CIRC. is 2x width) \r\n\r\nPlease note that the dimensions stated in the size chart are only approximate. The actual sizes may slightly vary between different products (or styles). ', 3, '1555.00', '115051_as008.jpg'),
(35, 4, 'Steve Reich - Music For 18 Musicians', ' Godina: 2018\r\nŽanr: ECM\r\nPakovanje: CD \r\nOpis\r\nMusic for 18 Musicians je delo koje je komponovao Steve Reich u periodu 1974–1976. Svetska premijera je bila 24. aprila 1976. godine u Nju Jorku a album je objavljen za ECM New Series. \r\nTracklist\r\nCD:\r\nPulse - Sections I-X - Pulse', 8, '1990.00', '1574272324_8793.jpg'),
(36, 4, 'Rod Stewart - You\'re In My Heart: Rod Stewart with the Royal Philharmonic Orchestra', ' Dostupno od: 22.11.2019.\r\nŽanr: Rock\r\nPakovanje: 2LP \r\nTracklist\r\n\r\nLP. 1-2\r\n\r\nMaggie May\r\nReason To Believe\r\nHandbags & Gladrags\r\nSailing\r\nTonight’s The Night (Gonna Be Alright)\r\nThe Killing Of Georgie (Part I and II)\r\nI Don’t Want To Talk About It\r\nThe First Cut Is The Deepest\r\nYou’re In My Heart (The Final Acclaim)\r\nI Was Only Joking\r\nIt Takes Two (with Robbie Williams)\r\nStay With Me (with Faces)\r\nYoung Turks\r\nWhat Am I Gonna Do (I’m So In Love With You)\r\nEvery Beat Of My Heart\r\nForever Young\r\nDowntown Train\r\nRhythm Of My Heart\r\nHave I Told You Lately\r\nTom Traubert’s Blues (Waltzing Matilda)\r\nIf We Fall In Love Tonight\r\nStop Loving Her Today', 2, '2799.00', '1574272455_3386.jpg'),
(37, 4, 'Radiohead - OK Computer OKNOTOK 1997 2017', ' Godina: 2018\r\nŽanr: Rock\r\nPakovanje: 2CD \r\nOpis\r\n\r\nOK Computer treći je studijski album britanskog alternativnog rock sastava Radiohead. U Velikoj Britaniji 16. juna 1997. objavio ga je Parlophone, a u SAD-u ga je 1. jula 1997. objavio Capitol Records. Ovo remasterovano izdanje albuma objavljeno je 23. juna 2017. godine za XL Recordings.', 9, '2399.00', 'Radiohead-OK-Computer-OK_1544193130.jpg'),
(38, 4, 'Gary Moore - Still Got The Blues', 'Godina: 2019\r\nŽanr: Rock\r\nPakovanje: LP \r\n\r\nTracklist\r\nLP: 1\r\n    Moving On\r\n    Oh Pretty Woman\r\n    Walking by Myself\r\n    Still Got the Blues\r\n    Texas Strut\r\n    Too Tired\r\n    King of the Blues\r\n    As the Years Go Passing By\r\n    Midnight Blue', 5, '3499.00', '1574272786_9017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `ID` int(11) NOT NULL,
  `Kupac_naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Datum` date NOT NULL,
  `Ukupna_cena` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`ID`, `Kupac_naziv`, `Datum`, `Ukupna_cena`) VALUES
(1, 'ana', '2019-11-19', '129880.00'),
(2, 'ana', '2019-11-19', '72930.00'),
(3, 'ana', '2019-11-19', '129880.00'),
(4, 'ana', '2019-11-19', '72930.00'),
(5, 'ana', '2019-11-19', '129880.00'),
(6, 'ana', '2019-11-19', '72930.00'),
(7, 'ana', '2019-11-19', '129880.00'),
(8, 'ana', '2019-11-19', '72930.00'),
(9, 'ana', '2019-11-19', '129880.00'),
(10, 'ana', '2019-11-19', '72930.00'),
(11, 'ana', '2019-11-19', '129880.00'),
(12, 'ana', '2019-11-19', '72930.00'),
(13, 'ana', '2019-11-19', '59400.00'),
(14, 'ana', '2019-11-19', '59400.00'),
(15, 'ana', '2019-11-19', '24310.00'),
(16, 'ana', '2019-11-19', '59400.00'),
(17, 'ana', '2019-11-19', '24310.00'),
(18, 'ana', '2019-11-19', '64940.00'),
(19, 'ana', '2019-11-19', '59400.00'),
(20, 'ana', '2019-11-19', '24310.00'),
(21, 'ana', '2019-11-19', '64940.00'),
(22, 'ana', '2019-11-19', '59400.00'),
(23, 'ana', '2019-11-19', '24310.00'),
(24, 'ana', '2019-11-19', '64940.00'),
(25, 'ana', '2019-11-19', '59400.00'),
(26, 'ana', '2019-11-19', '24310.00'),
(27, 'ana', '2019-11-19', '64940.00'),
(28, 'ana', '2019-11-19', '64940.00'),
(29, 'ana', '2019-11-19', '97240.00'),
(30, 'ana', '2019-11-19', '64940.00'),
(31, 'ana', '2019-11-19', '84000.00'),
(32, 'ana', '2019-11-19', '84000.00'),
(33, 'ana', '2019-11-19', '148800.00'),
(34, 'ana', '2019-11-19', '84000.00'),
(35, 'ana', '2019-11-19', '148800.00'),
(36, 'ana', '2019-11-19', '121200.00'),
(37, 'ana', '2019-11-19', '84000.00'),
(38, 'ana', '2019-11-19', '148800.00'),
(39, 'ana', '2019-11-19', '121200.00'),
(40, 'ana', '2019-11-19', '84000.00'),
(41, 'ana', '2019-11-19', '148800.00'),
(42, 'ana', '2019-11-19', '121200.00'),
(43, 'ana', '2019-11-19', '84000.00'),
(44, 'ana', '2019-11-19', '148800.00'),
(45, 'ana', '2019-11-19', '121200.00'),
(46, 'ana', '2019-11-19', '84000.00'),
(47, 'ana', '2019-11-19', '148800.00'),
(48, 'ana', '2019-11-19', '121200.00'),
(49, 'ana', '2019-11-19', '84000.00'),
(50, 'ana', '2019-11-19', '148800.00'),
(51, 'ana', '2019-11-19', '121200.00'),
(52, 'ana', '2019-11-19', '84000.00'),
(53, 'ana', '2019-11-19', '148800.00'),
(54, 'ana', '2019-11-19', '121200.00'),
(55, 'ana', '2019-11-19', '84000.00'),
(56, 'ana', '2019-11-19', '148800.00'),
(57, 'ana', '2019-11-19', '121200.00'),
(58, 'ana', '2019-11-19', '84000.00'),
(59, 'ana', '2019-11-19', '148800.00'),
(60, 'ana', '2019-11-19', '121200.00'),
(61, 'ana', '2019-11-19', '84000.00'),
(62, 'ana', '2019-11-19', '148800.00'),
(63, 'ana', '2019-11-19', '121200.00'),
(64, 'ana', '2019-11-19', '84000.00'),
(65, 'ana', '2019-11-19', '148800.00'),
(66, 'ana', '2019-11-19', '121200.00'),
(67, 'ana', '2019-11-19', '84000.00'),
(68, 'ana', '2019-11-19', '148800.00'),
(69, 'ana', '2019-11-19', '84000.00'),
(70, 'ana', '2019-11-19', '148800.00'),
(71, 'ana', '2019-11-19', '148800.00'),
(72, 'ana', '2019-11-19', '170170.00'),
(73, 'ana', '2019-11-19', '170170.00'),
(74, 'alan', '2019-11-19', '75000.00'),
(75, 'alan', '2019-11-19', '75000.00'),
(76, 'alan', '2019-11-19', '181800.00'),
(77, 'alan', '2019-11-19', '75000.00'),
(78, 'alan', '2019-11-19', '181800.00'),
(79, 'alan', '2019-11-19', '32470.00'),
(80, 'alan', '2019-11-19', '32470.00'),
(81, 'alan', '2019-11-19', '24310.00'),
(82, 'alan', '2019-11-19', '32470.00'),
(83, 'alan', '2019-11-19', '24310.00'),
(84, 'alan', '2019-11-19', '37500.00'),
(85, 'alan', '2019-11-19', '37500.00'),
(86, 'alan', '2019-11-19', '32470.00'),
(87, 'alan', '2019-11-19', '37500.00'),
(88, 'alan', '2019-11-19', '32470.00'),
(89, 'alan', '2019-11-19', '64940.00'),
(90, 'alan', '2019-11-19', '64940.00'),
(91, 'alan', '2019-11-19', '39600.00'),
(92, 'alan', '2019-11-19', '64940.00'),
(93, 'alan', '2019-11-19', '39600.00'),
(94, 'alan', '2019-11-19', '39600.00'),
(95, 'alan', '2019-11-19', '242400.00'),
(96, 'alan', '2019-11-19', '242400.00'),
(97, 'alan', '2019-11-19', '89280.00'),
(98, 'alan', '2019-11-19', '48620.00'),
(100, 'alan', '2019-11-19', '363600.00'),
(101, 'alan', '2019-11-19', '481200.00'),
(102, 'alan', '2019-11-19', '481200.00'),
(103, 'alan', '2019-11-20', '207000.00'),
(104, 'alan', '2019-11-20', '207000.00'),
(105, 'alan', '2019-11-20', '207000.00'),
(106, 'alan', '2019-11-20', '123620.00'),
(107, 'alan', '2019-11-20', '123620.00'),
(108, 'alan', '2019-11-20', '0.00'),
(109, 'alan', '2019-11-20', '0.00'),
(110, 'alan', '2019-11-20', '0.00'),
(111, 'azerty123', '2019-11-20', '0.00'),
(112, 'azerty123', '2019-11-20', '0.00'),
(113, 'azerty123', '2019-11-20', '0.00'),
(114, 'azerty123', '2019-11-20', '0.00'),
(115, 'azerty123', '2019-11-20', '316430.00'),
(116, 'azerty123', '2019-11-20', '316430.00'),
(117, 'azerty123', '2019-11-20', '316430.00'),
(118, 'azerty123', '2019-11-20', '49560.00'),
(119, 'ana', '2019-11-20', '88670.00'),
(123, 'azerty123', '2019-11-21', '63321.00'),
(124, 'azerty123', '2019-11-21', '95113.00');

-- --------------------------------------------------------

--
-- Table structure for table `stavke_racuna`
--

CREATE TABLE `stavke_racuna` (
  `ID` int(11) NOT NULL,
  `Racun_id` int(11) NOT NULL,
  `Proizvod_id` int(11) NOT NULL,
  `Proizvod_naziv` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Proizvod_cena` decimal(9,2) NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `Ukupna_cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavke_racuna`
--

INSERT INTO `stavke_racuna` (`ID`, `Racun_id`, `Proizvod_id`, `Proizvod_naziv`, `Proizvod_cena`, `Kolicina`, `Ukupna_cena`) VALUES
(1, 4, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(2, 4, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(3, 6, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(4, 6, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(5, 8, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(6, 8, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(7, 10, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(8, 10, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(9, 12, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(10, 12, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(11, 27, 1, 'Boss-KTN-50-2 pojacalo', '19800.00', 3, 59400),
(12, 27, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 1, 24310),
(13, 27, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 2, 64940),
(36, 63, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 5, 84000),
(37, 63, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 5, 148800),
(38, 63, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 2, 121200),
(39, 70, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 5, 84000),
(40, 70, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 5, 148800),
(41, 73, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 7, 170170),
(42, 78, 3, 'Marshall DSL1CR gitarsko pojačalo', '37500.00', 2, 75000),
(43, 78, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 3, 181800),
(44, 83, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 1, 32470),
(45, 83, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 1, 24310),
(46, 88, 3, 'Marshall DSL1CR gitarsko pojačalo', '37500.00', 1, 37500),
(47, 88, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 1, 32470),
(48, 93, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 2, 64940),
(49, 93, 1, 'Boss-KTN-50-2 pojacalo', '19800.00', 2, 39600),
(50, 96, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 4, 242400),
(51, 98, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 3, 89280),
(52, 98, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 2, 48620),
(53, 100, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 7, 117600),
(54, 100, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 6, 363600),
(55, 102, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 7, 117600),
(56, 102, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 6, 363600),
(57, 105, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 1, 60600),
(58, 105, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 4, 67200),
(59, 105, 1, 'Boss-KTN-50-2 pojacalo', '19800.00', 4, 79200),
(60, 107, 3, 'Marshall DSL1CR gitarsko pojačalo', '37500.00', 2, 75000),
(61, 107, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 2, 48620),
(62, 110, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 4, 119040),
(63, 110, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 4, 129880),
(64, 110, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 1, 24310),
(65, 114, 4, 'Roland Micro Cube-GX WH gitarsko pojačalo', '16800.00', 2, 33600),
(66, 114, 1, 'Boss-KTN-50-2 pojacalo', '19800.00', 1, 19800),
(67, 114, 3, 'Marshall DSL1CR gitarsko pojačalo', '37500.00', 5, 187500),
(68, 114, 5, 'Yamaha CG 182 SF Flamenko gitara', '60600.00', 2, 121200),
(69, 117, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 2, 64940),
(70, 117, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 6, 178560),
(71, 117, 2, 'Framus HOLLYWOOD SC V51 (FR05131) električna gitara', '24310.00', 3, 72930),
(72, 118, 1, 'Boss-KTN-50-2 pojacalo', '19800.00', 1, 19800),
(73, 118, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 1, 29760),
(74, 119, 13, 'Violina Valencia V160 1/2', '12500.00', 2, 25000),
(75, 119, 9, 'Slušalice AKG K 141 MK II', '10111.00', 1, 10111),
(76, 119, 24, 'Mikrofon SHURE Beta57A', '17853.00', 3, 53559),
(87, 123, 22, 'Žice za akustičnu gitaru Martin Darco D-5000', '604.00', 1, 604),
(88, 123, 16, 'Trzalice Jim Dunlop Ultex', '90.00', 107, 9630),
(89, 123, 31, 'The Doors - L.A.WOMAN', '3513.00', 2, 7026),
(90, 123, 9, 'Slušalice AKG K 141 MK II', '10111.00', 1, 10111),
(91, 123, 7, 'Ibanez PF 15 ECE BK Akustična ozvučena gitara', '29760.00', 1, 29760),
(92, 123, 30, 't-shirt metal mens AC-DC - FOR THOSE ABOUT TO ROCK - AMPLIFIED', '6190.00', 1, 6190),
(93, 124, 14, 'Trzalice Jim Dunlop Jazz XL', '120.00', 55, 6600),
(94, 124, 10, 'Slušalice AKG K 240 MK II', '20060.00', 1, 20060),
(95, 124, 31, 'The Doors - L.A.WOMAN', '3513.00', 1, 3513),
(96, 124, 8, 'LAG Arkane 100 GRS električna gitara', '32470.00', 2, 64940);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
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
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Racun_id` (`Racun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kupac`
--
ALTER TABLE `kupac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`Kategorija`) REFERENCES `kategorija` (`ID`);

--
-- Constraints for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  ADD CONSTRAINT `stavke_racuna_ibfk_1` FOREIGN KEY (`Racun_id`) REFERENCES `racun` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
