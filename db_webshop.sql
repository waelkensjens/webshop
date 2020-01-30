-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2020 at 10:46 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `postal` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `address`, `postal`, `city`, `country`, `user_id`) VALUES
(1, 'Kronevoordestraat 30', 8610, 'handzame', 'belgium', 2),
(2, 'Kronevoordestraat 30', 8610, 'test', 'be', 3),
(3, 'klaas33', 3333, 'klaas', 'klaas', 4),
(4, 'ff', 55, 'ff', 'ff', 6),
(6, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 8),
(7, 'cdx', 231, 'xs', 'xs', 9),
(8, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 10),
(9, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 11),
(10, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 12),
(11, 'zz', 55, 'zz', 'zz', 13),
(12, 'fff', 111, 'fff', 'Belgium', 14),
(13, 'hhhhhh', 8888, 'hhhh', 'belgium', 19),
(14, 'test', 111, 'test', 'test', 20),
(15, 'T', 8610, 'test', 'Belgium', 21),
(16, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 22),
(17, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 23),
(18, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 24),
(19, 'j', 1111, 'j', 'sd', 25),
(20, 'a', 1, 'a', 'a', 26),
(21, 'Kronevoordestraat 30', 8610, 'test', 'Belgium', 27);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'action'),
(2, 'adventure'),
(3, 'fighting'),
(4, 'flight'),
(5, 'horror'),
(6, 'mmo'),
(7, 'music'),
(8, 'party'),
(9, 'race'),
(10, 'rpg'),
(11, 'shooter'),
(12, 'simulation'),
(13, 'sport'),
(14, 'stealth'),
(15, 'strategy');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `countries_detailed`
--

DROP TABLE IF EXISTS `countries_detailed`;
CREATE TABLE IF NOT EXISTS `countries_detailed` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(100) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `north` varchar(30) DEFAULT NULL,
  `south` varchar(30) DEFAULT NULL,
  `east` varchar(30) DEFAULT NULL,
  `west` varchar(30) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(100) DEFAULT NULL,
  `continent` char(2) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `isoAlpha3` char(3) DEFAULT NULL,
  `geonameId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8 COMMENT='gedetailleerde country tabel geo,munteenheid,..';

--
-- Dumping data for table `countries_detailed`
--

INSERT INTO `countries_detailed` (`id`, `countryCode`, `countryName`, `currencyCode`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, `continent`, `languages`, `isoAlpha3`, `geonameId`) VALUES
(1, 'AD', 'Andorra', 'EUR', 'AN', '020', '42.65604389629997', '42.42849259876837', '1.7865427778319827', '1.4071867141112762', 'Andorra la Vella', 'Europe', 'EU', 'ca', 'AND', 3041565),
(2, 'AE', 'United Arab Emirates', 'AED', 'AE', '784', '26.08415985107422', '22.633329391479492', '56.38166046142578', '51.58332824707031', 'Abu Dhabi', 'Asia', 'AS', 'ar-AE,fa,en,hi,ur', 'ARE', 290557),
(3, 'AF', 'Afghanistan', 'AFN', 'AF', '004', '38.483418', '29.377472', '74.879448', '60.478443', 'Kabul', 'Asia', 'AS', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 'AC', '028', '17.729387', '16.996979', '-61.672421', '-61.906425', 'St. John\'s', 'North America', 'NA', 'en-AG', 'ATG', 3576396),
(5, 'AI', 'Anguilla', 'XCD', 'AV', '660', '18.283424', '18.166815', '-62.971359', '-63.172901', 'The Valley', 'North America', 'NA', 'en-AI', 'AIA', 3573511),
(6, 'AL', 'Albania', 'ALL', 'AL', '008', '42.665611', '39.648361', '21.068472', '19.293972', 'Tirana', 'Europe', 'EU', 'sq,el', 'ALB', 783754),
(7, 'AM', 'Armenia', 'AMD', 'AM', '051', '41.301834', '38.830528', '46.772435045159995', '43.44978', 'Yerevan', 'Asia', 'AS', 'hy', 'ARM', 174982),
(8, 'AO', 'Angola', 'AOA', 'AO', '024', '-4.376826', '-18.042076', '24.082119', '11.679219', 'Luanda', 'Africa', 'AF', 'pt-AO', 'AGO', 3351879),
(9, 'AQ', 'Antarctica', '', 'AY', '010', '-60.515533', '-89.9999', '179.9999', '-179.9999', '', 'Antarctica', 'AN', '', 'ATA', 6697173),
(10, 'AR', 'Argentina', 'ARS', 'AR', '032', '-21.781277', '-55.061314', '-53.591835', '-73.58297', 'Buenos Aires', 'South America', 'SA', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483),
(11, 'AS', 'American Samoa', 'USD', 'AQ', '016', '-11.0497', '-14.382478', '-169.416077', '-171.091888', 'Pago Pago', 'Oceania', 'OC', 'en-AS,sm,to', 'ASM', 5880801),
(12, 'AT', 'Austria', 'EUR', 'AU', '040', '49.0211627691393', '46.3726520216244', '17.1620685652599', '9.53095237240833', 'Vienna', 'Europe', 'EU', 'de-AT,hr,hu,sl', 'AUT', 2782113),
(13, 'AU', 'Australia', 'AUD', 'AS', '036', '-10.062805', '-43.64397', '153.639252', '112.911057', 'Canberra', 'Oceania', 'OC', 'en-AU', 'AUS', 2077456),
(14, 'AW', 'Aruba', 'AWG', 'AA', '533', '12.623718127152925', '12.411707706190716', '-69.86575120104982', '-70.0644737196045', 'Oranjestad', 'North America', 'NA', 'nl-AW,es,en', 'ABW', 3577279),
(15, 'AX', 'Åland Islands', 'EUR', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', 'sv-AX', 'ALA', 661882),
(16, 'AZ', 'Azerbaijan', 'AZN', 'AJ', '031', '41.90564', '38.38915252685547', '50.370083', '44.774113', 'Baku', 'Asia', 'AS', 'az,ru,hy', 'AZE', 587116),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 'BK', '070', '45.239193', '42.546112', '19.622223', '15.718945', 'Sarajevo', 'Europe', 'EU', 'bs,hr-BA,sr-BA', 'BIH', 3277605),
(18, 'BB', 'Barbados', 'BBD', 'BB', '052', '13.327257', '13.039844', '-59.420376', '-59.648922', 'Bridgetown', 'North America', 'NA', 'en-BB', 'BRB', 3374084),
(19, 'BD', 'Bangladesh', 'BDT', 'BG', '050', '26.631945', '20.743334', '92.673668', '88.028336', 'Dhaka', 'Asia', 'AS', 'bn-BD,en', 'BGD', 1210997),
(20, 'BE', 'Belgium', 'EUR', 'BE', '056', '51.505444', '49.49361', '6.403861', '2.546944', 'Brussels', 'Europe', 'EU', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361),
(21, 'BF', 'Burkina Faso', 'XOF', 'UV', '854', '15.082593', '9.401108', '2.405395', '-5.518916', 'Ouagadougou', 'Africa', 'AF', 'fr-BF', 'BFA', 2361809),
(22, 'BG', 'Bulgaria', 'BGN', 'BU', '100', '44.21764', '41.242084', '28.612167', '22.371166', 'Sofia', 'Europe', 'EU', 'bg,tr-BG,rom', 'BGR', 732800),
(23, 'BH', 'Bahrain', 'BHD', 'BA', '048', '26.282583', '25.796862', '50.664471', '50.45414', 'Manama', 'Asia', 'AS', 'ar-BH,en,fa,ur', 'BHR', 290291),
(24, 'BI', 'Burundi', 'BIF', 'BY', '108', '-2.310123', '-4.465713', '30.847729', '28.993061', 'Bujumbura', 'Africa', 'AF', 'fr-BI,rn', 'BDI', 433561),
(25, 'BJ', 'Benin', 'XOF', 'BN', '204', '12.418347', '6.225748', '3.851701', '0.774575', 'Porto-Novo', 'Africa', 'AF', 'fr-BJ', 'BEN', 2395170),
(26, 'BL', 'Saint Barthélemy', 'EUR', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', 'fr', 'BLM', 3578476),
(27, 'BM', 'Bermuda', 'BMD', 'BD', '060', '32.393833', '32.246639', '-64.651993', '-64.89605', 'Hamilton', 'North America', 'NA', 'en-BM,pt', 'BMU', 3573345),
(28, 'BN', 'Brunei Darussalam', 'BND', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', 'ms-BN,en-BN', 'BRN', 1820814),
(29, 'BO', 'Bolivia', 'BOB', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', 'es-BO,qu,ay', 'BOL', 3923057),
(30, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'USD', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', '', 'North America', 'NA', 'nl,pap,en', 'BES', 7626844),
(31, 'BR', 'Brazil', 'BRL', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Brasília', 'South America', 'SA', 'pt-BR,es,en,fr', 'BRA', 3469034),
(32, 'BS', 'Bahamas', 'BSD', 'BF', '044', '26.919243', '22.852743', '-74.423874', '-78.995911', 'Nassau', 'North America', 'NA', 'en-BS', 'BHS', 3572887),
(33, 'BT', 'Bhutan', 'BTN', 'BT', '064', '28.323778', '26.70764', '92.125191', '88.75972', 'Thimphu', 'Asia', 'AS', 'dz', 'BTN', 1252634),
(34, 'BV', 'Bouvet Island', 'NOK', 'BV', '074', '-54.400322', '-54.462383', '3.487976', '3.335499', '', 'Antarctica', 'AN', '', 'BVT', 3371123),
(35, 'BW', 'Botswana', 'BWP', 'BC', '072', '-17.780813', '-26.907246', '29.360781', '19.999535', 'Gaborone', 'Africa', 'AF', 'en-BW,tn-BW', 'BWA', 933860),
(36, 'BY', 'Belarus', 'BYR', 'BO', '112', '56.165806', '51.256416', '32.770805', '23.176889', 'Minsk', 'Europe', 'EU', 'be,ru', 'BLR', 630336),
(37, 'BZ', 'Belize', 'BZD', 'BH', '084', '18.496557', '15.8893', '-87.776985', '-89.224815', 'Belmopan', 'North America', 'NA', 'en-BZ,es', 'BLZ', 3582678),
(38, 'CA', 'Canada', 'CAD', 'CA', '124', '83.110626', '41.67598', '-52.636291', '-141', 'Ottawa', 'North America', 'NA', 'en-CA,fr-CA,iu', 'CAN', 6251999),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 'CK', '166', '-12.072459094', '-12.208725839', '96.929489344', '96.816941408', 'West Island', 'Asia', 'AS', 'ms-CC,en', 'CCK', 1547376),
(40, 'CD', 'Democratic Republic of the Congo', 'COD', 'CD', '180', '5.386098', '-13.455675', '31.305912', '12.204144', 'Kinshasa', 'Africa', 'AF', 'fr-CD,ln,kg', 'COD', 203312),
(41, 'CF', 'Central African Republic', 'XAF', 'CT', '140', '11.007569', '2.220514', '27.463421', '14.420097', 'Bangui', 'Africa', 'AF', 'fr-CF,sg,ln,kg', 'CAF', 239880),
(42, 'CG', 'Republic of the Congo', 'XAF', 'CF', '178', '3.703082', '-5.027223', '18.649839', '11.205009', 'Brazzaville', 'Africa', 'AF', 'fr-CG,kg,ln-CG', 'COG', 2260494),
(43, 'CH', 'Switzerland', 'CHF', 'SZ', '756', '47.805332', '45.825695', '10.491472', '5.957472', 'Berne', 'Europe', 'EU', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434),
(44, 'CI', 'Ivory Coast', 'XOF', 'IV', '384', '10.736642', '4.357067', '-2.494897', '-8.599302', 'Yamoussoukro', 'Africa', 'AF', 'fr-CI', 'CIV', 2287781),
(45, 'CK', 'Cook Islands', 'NZD', 'CW', '184', '-10.023114', '-21.944164', '-157.312134', '-161.093658', 'Avarua', 'Oceania', 'OC', 'en-CK,mi', 'COK', 1899402),
(46, 'CL', 'Chile', 'CLP', 'CI', '152', '-17.507553', '-55.9256225109217', '-66.417557', '-80.785851', 'Santiago', 'South America', 'SA', 'es-CL', 'CHL', 3895114),
(47, 'CM', 'Cameroon', 'XAF', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaoundé', 'Africa', 'AF', 'en-CM,fr-CM', 'CMR', 2233387),
(48, 'CN', 'China', 'CNY', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991),
(49, 'CO', 'Colombia', 'COP', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogotá', 'South America', 'SA', 'es-CO', 'COL', 3686110),
(50, 'CR', 'Costa Rica', 'CRC', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San José', 'North America', 'NA', 'es-CR,en', 'CRI', 3624060),
(51, 'CU', 'Cuba', 'CUP', 'CU', '192', '23.226042', '19.828083', '-74.131775', '-84.957428', 'Havana', 'North America', 'NA', 'es-CU', 'CUB', 3562981),
(52, 'CV', 'Cape Verde', 'CVE', 'CV', '132', '17.197178', '14.808022', '-22.669443', '-25.358747', 'Praia', 'Africa', 'AF', 'pt-CV', 'CPV', 3374766),
(53, 'CW', 'Curaçao', 'ANG', 'UC', '531', '12.385672', '12.032745', '-68.733948', '-69.157204', 'Willemstad', 'North America', 'NA', 'nl,pap', 'CUW', 7626836),
(54, 'CX', 'Christmas Island', 'AUD', 'KT', '162', '-10.412356007', '-10.5704829995', '105.712596992', '105.533276992', 'The Settlement', 'Asia', 'AS', 'en,zh,ms-CC', 'CXR', 2078138),
(55, 'CY', 'Cyprus', 'EUR', 'CY', '196', '35.701527', '34.6332846722908', '34.59791599999994', '32.27308300000004', 'Nicosia', 'Europe', 'EU', 'el-CY,tr-CY,en', 'CYP', 146669),
(56, 'CZ', 'Czech Republic', 'CZK', 'EZ', '203', '51.058887', '48.542915', '18.860111', '12.096194', 'Prague', 'Europe', 'EU', 'cs,sk', 'CZE', 3077311),
(57, 'DE', 'Germany', 'EUR', 'GM', '276', '55.055637', '47.275776', '15.039889', '5.865639', 'Berlin', 'Europe', 'EU', 'de', 'DEU', 2921044),
(58, 'DJ', 'Djibouti', 'DJF', 'DJ', '262', '12.706833', '10.909917', '43.416973', '41.773472', 'Djibouti', 'Africa', 'AF', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816),
(59, 'DK', 'Denmark', 'DKK', 'DA', '208', '57.748417', '54.562389', '15.158834', '8.075611', 'Copenhagen', 'Europe', 'EU', 'da-DK,en,fo,de-DK', 'DNK', 2623032),
(60, 'DM', 'Dominica', 'XCD', 'DO', '212', '15.631809', '15.20169', '-61.244152', '-61.484108', 'Roseau', 'North America', 'NA', 'en-DM', 'DMA', 3575830),
(61, 'DO', 'Dominican Republic', 'DOP', 'DR', '214', '19.929859', '17.543159', '-68.32', '-72.003487', 'Santo Domingo', 'North America', 'NA', 'es-DO', 'DOM', 3508796),
(62, 'DZ', 'Algeria', 'DZD', 'AG', '012', '37.093723', '18.960028', '11.979548', '-8.673868', 'Algiers', 'Africa', 'AF', 'ar-DZ', 'DZA', 2589581),
(63, 'EC', 'Ecuador', 'USD', 'EC', '218', '1.43902', '-4.998823', '-75.184586', '-81.078598', 'Quito', 'South America', 'SA', 'es-EC', 'ECU', 3658394),
(64, 'EE', 'Estonia', 'EUR', 'EN', '233', '59.676224', '57.516193', '28.209972', '21.837584', 'Tallinn', 'Europe', 'EU', 'et,ru', 'EST', 453733),
(65, 'EG', 'Egypt', 'EGP', 'EG', '818', '31.667334', '21.725389', '36.89833068847656', '24.698111', 'Cairo', 'Africa', 'AF', 'ar-EG,en,fr', 'EGY', 357994),
(66, 'EH', 'Western Sahara', 'MAD', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'El Aaiún', 'Africa', 'AF', 'ar,mey', 'ESH', 2461445),
(67, 'ER', 'Eritrea', 'ERN', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010),
(68, 'ES', 'Spain', 'EUR', 'SP', '724', '43.7913565913767', '36.0001044260548', '4.32778473043961', '-9.30151567231899', 'Madrid', 'Europe', 'EU', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769),
(69, 'ET', 'Ethiopia', 'ETB', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996),
(70, 'FI', 'Finland', 'EUR', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', 'fi-FI,sv-FI,smn', 'FIN', 660013),
(71, 'FJ', 'Fiji', 'FJD', 'FJ', '242', '-12.480111', '-20.67597', '-178.424438', '177.129334', 'Suva', 'Oceania', 'OC', 'en-FJ,fj', 'FJI', 2205218),
(72, 'FK', 'Falkland Islands', 'FKP', 'FK', '238', '-51.24065', '-52.360512', '-57.712486', '-61.345192', 'Stanley', 'South America', 'SA', 'en-FK', 'FLK', 3474414),
(73, 'FM', 'Micronesia', 'USD', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918),
(74, 'FO', 'Faroe Islands', 'DKK', 'FO', '234', '62.400749', '61.394943', '-6.399583', '-7.458', 'Tórshavn', 'Europe', 'EU', 'fo,da-FO', 'FRO', 2622320),
(75, 'FR', 'France', 'EUR', 'FR', '250', '51.092804', '41.371582', '9.561556', '-5.142222', 'Paris', 'Europe', 'EU', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382),
(76, 'GA', 'Gabon', 'XAF', 'GB', '266', '2.322612', '-3.978806', '14.502347', '8.695471', 'Libreville', 'Africa', 'AF', 'fr-GA', 'GAB', 2400553),
(77, 'GB', 'United Kingdom of Great Britain and Northern Ireland', 'GBP', 'UK', '826', '59.360249', '49.906193', '1.759', '-8.623555', 'London', 'Europe', 'EU', 'en-GB,cy-GB,gd', 'GBR', 2635167),
(78, 'GD', 'Grenada', 'XCD', 'GJ', '308', '12.318283928171299', '11.986893', '-61.57676970108031', '-61.802344', 'St. George\'s', 'North America', 'NA', 'en-GD', 'GRD', 3580239),
(79, 'GE', 'Georgia', 'GEL', 'GG', '268', '43.586498', '41.053196', '46.725971', '40.010139', 'Tbilisi', 'Asia', 'AS', 'ka,ru,hy,az', 'GEO', 614540),
(80, 'GF', 'French Guiana', 'EUR', 'FG', '254', '5.776496', '2.127094', '-51.613949', '-54.542511', 'Cayenne', 'South America', 'SA', 'fr-GF', 'GUF', 3381670),
(81, 'GG', 'Guernsey', 'GBP', 'GK', '831', '49.731727816705416', '49.40764156876899', '-2.1577152112246267', '-2.673194593476069', 'St Peter Port', 'Europe', 'EU', 'en,fr', 'GGY', 3042362),
(82, 'GH', 'Ghana', 'GHS', 'GH', '288', '11.173301', '4.736723', '1.191781', '-3.25542', 'Accra', 'Africa', 'AF', 'en-GH,ak,ee,tw', 'GHA', 2300660),
(83, 'GI', 'Gibraltar', 'GIP', 'GI', '292', '36.155439135670726', '36.10903070140248', '-5.338285164001491', '-5.36626149743654', 'Gibraltar', 'Europe', 'EU', 'en-GI,es,it,pt', 'GIB', 2411586),
(84, 'GL', 'Greenland', 'DKK', 'GL', '304', '83.627357', '59.777401', '-11.312319', '-73.04203', 'Nuuk', 'North America', 'NA', 'kl,da-GL,en', 'GRL', 3425505),
(85, 'GM', 'Gambia', 'GMD', 'GA', '270', '13.826571', '13.064252', '-13.797793', '-16.825079', 'Banjul', 'Africa', 'AF', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451),
(86, 'GN', 'Guinea', 'GNF', 'GV', '324', '12.67622', '7.193553', '-7.641071', '-14.926619', 'Conakry', 'Africa', 'AF', 'fr-GN', 'GIN', 2420477),
(87, 'GP', 'Guadeloupe', 'EUR', 'GP', '312', '16.516848', '15.867565', '-61', '-61.544765', 'Basse-Terre', 'North America', 'NA', 'fr-GP', 'GLP', 3579143),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 'EK', '226', '2.346989', '0.92086', '11.335724', '9.346865', 'Malabo', 'Africa', 'AF', 'es-GQ,fr', 'GNQ', 2309096),
(89, 'GR', 'Greece', 'EUR', 'GR', '300', '41.7484999849641', '34.8020663391466', '28.2470831714347', '19.3736035624134', 'Athens', 'Europe', 'EU', 'el-GR,en,fr', 'GRC', 390903),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 'SX', '239', '-53.970467', '-59.479259', '-26.229326', '-38.021175', 'Grytviken', 'Antarctica', 'AN', 'en', 'SGS', 3474415),
(91, 'GT', 'Guatemala', 'GTQ', 'GT', '320', '17.81522', '13.737302', '-88.223198', '-92.23629', 'Guatemala City', 'North America', 'NA', 'es-GT', 'GTM', 3595528),
(92, 'GU', 'Guam', 'USD', 'GQ', '316', '13.654402', '13.23376', '144.956894', '144.61806', 'Hagåtña', 'Oceania', 'OC', 'en-GU,ch-GU', 'GUM', 4043988),
(93, 'GW', 'Guinea-Bissau', 'XOF', 'PU', '624', '12.680789', '10.924265', '-13.636522', '-16.717535', 'Bissau', 'Africa', 'AF', 'pt-GW,pov', 'GNB', 2372248),
(94, 'GY', 'Guyana', 'GYD', 'GY', '328', '8.557567', '1.17508', '-56.480251', '-61.384762', 'Georgetown', 'South America', 'SA', 'en-GY', 'GUY', 3378535),
(95, 'HK', 'Hong Kong', 'HKD', 'HK', '344', '22.559778', '22.15325', '114.434753', '113.837753', 'Hong Kong', 'Asia', 'AS', 'zh-HK,yue,zh,en', 'HKG', 1819730),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', 'HM', '334', '-52.909416', '-53.192001', '73.859146', '72.596535', '', 'Antarctica', 'AN', '', 'HMD', 1547314),
(97, 'HN', 'Honduras', 'HNL', 'HO', '340', '16.510256', '12.982411', '-83.155403', '-89.350792', 'Tegucigalpa', 'North America', 'NA', 'es-HN', 'HND', 3608932),
(98, 'HR', 'Croatia', 'HRK', 'HR', '191', '46.53875', '42.43589', '19.427389', '13.493222', 'Zagreb', 'Europe', 'EU', 'hr-HR,sr', 'HRV', 3202326),
(99, 'HT', 'Haiti', 'HTG', 'HA', '332', '20.08782', '18.021032', '-71.613358', '-74.478584', 'Port-au-Prince', 'North America', 'NA', 'ht,fr-HT', 'HTI', 3723988),
(100, 'HU', 'Hungary', 'HUF', 'HU', '348', '48.585667', '45.74361', '22.906', '16.111889', 'Budapest', 'Europe', 'EU', 'hu-HU', 'HUN', 719819),
(101, 'ID', 'Indonesia', 'IDR', 'ID', '360', '5.904417', '-10.941861', '141.021805', '95.009331', 'Jakarta', 'Asia', 'AS', 'id,en,nl,jv', 'IDN', 1643084),
(102, 'IE', 'Ireland', 'EUR', 'EI', '372', '55.387917', '51.451584', '-6.002389', '-10.478556', 'Dublin', 'Europe', 'EU', 'en-IE,ga-IE', 'IRL', 2963597),
(103, 'IL', 'Israel', 'ILS', 'IS', '376', '33.340137', '29.496639', '35.876804', '34.270278754419145', '', 'Asia', 'AS', 'he,ar-IL,en-IL,', 'ISR', 294640),
(104, 'IM', 'Isle of Man', 'GBP', 'IM', '833', '54.419724', '54.055916', '-4.3115', '-4.798722', 'Douglas', 'Europe', 'EU', 'en,gv', 'IMN', 3042225),
(105, 'IN', 'India', 'INR', 'IN', '356', '35.504223', '6.747139', '97.403305', '68.186691', 'New Delhi', 'Asia', 'AS', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', 1269750),
(106, 'IO', 'British Indian Ocean Territory', 'USD', 'IO', '086', '-5.268333', '-7.438028', '72.493164', '71.259972', '', 'Asia', 'AS', 'en-IO', 'IOT', 1282588),
(107, 'IQ', 'Iraq', 'IQD', 'IZ', '368', '37.378029', '29.069445', '48.575916', '38.795887', 'Baghdad', 'Asia', 'AS', 'ar-IQ,ku,hy', 'IRQ', 99237),
(108, 'IR', 'Iran', 'IRR', 'IR', '364', '39.777222', '25.064083', '63.317471', '44.047279', 'Tehran', 'Asia', 'AS', 'fa-IR,ku', 'IRN', 130758),
(109, 'IS', 'Iceland', 'ISK', 'IC', '352', '66.53463', '63.393253', '-13.495815', '-24.546524', 'Reykjavik', 'Europe', 'EU', 'is,en,de,da,sv,no', 'ISL', 2629691),
(110, 'IT', 'Italy', 'EUR', 'IT', '380', '47.095196', '36.652779', '18.513445', '6.614889', 'Rome', 'Europe', 'EU', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395),
(111, 'JE', 'Jersey', 'GBP', 'JE', '832', '49.265057', '49.169834', '-2.022083', '-2.260028', 'Saint Helier', 'Europe', 'EU', 'en,pt', 'JEY', 3042142),
(112, 'JM', 'Jamaica', 'JMD', 'JM', '388', '18.526976', '17.703554', '-76.180321', '-78.366638', 'Kingston', 'North America', 'NA', 'en-JM', 'JAM', 3489940),
(113, 'JO', 'Jordan', 'JOD', 'JO', '400', '33.367668', '29.185888', '39.301167', '34.959999', 'Amman', 'Asia', 'AS', 'ar-JO,en', 'JOR', 248816),
(114, 'JP', 'Japan', 'JPY', 'JA', '392', '45.52314', '24.249472', '145.820892', '122.93853', 'Tokyo', 'Asia', 'AS', 'ja', 'JPN', 1861060),
(115, 'KE', 'Kenya', 'KES', 'KE', '404', '5.019938', '-4.678047', '41.899078', '33.908859', 'Nairobi', 'Africa', 'AF', 'en-KE,sw-KE', 'KEN', 192950),
(116, 'KG', 'Kyrgyzstan', 'KGS', 'KG', '417', '43.238224', '39.172832', '80.283165', '69.276611', 'Bishkek', 'Asia', 'AS', 'ky,uz,ru', 'KGZ', 1527747),
(117, 'KH', 'Cambodia', 'KHR', 'CB', '116', '14.686417', '10.409083', '107.627724', '102.339996', 'Phnom Penh', 'Asia', 'AS', 'km,fr,en', 'KHM', 1831722),
(118, 'KI', 'Kiribati', 'AUD', 'KR', '296', '4.71957', '-11.446881150186856', '-150.215347', '169.556137', 'Tarawa', 'Oceania', 'OC', 'en-KI,gil', 'KIR', 4030945),
(119, 'KM', 'Comoros', 'KMF', 'CN', '174', '-11.362381', '-12.387857', '44.538223', '43.21579', 'Moroni', 'Africa', 'AF', 'ar,fr-KM', 'COM', 921929),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 'SC', '659', '17.420118', '17.095343', '-62.543266', '-62.86956', 'Basseterre', 'North America', 'NA', 'en-KN', 'KNA', 3575174),
(121, 'KP', 'North Korea', 'KPW', 'KN', '408', '43.006054', '37.673332', '130.674866', '124.315887', 'Pyongyang', 'Asia', 'AS', 'ko-KP', 'PRK', 1873107),
(122, 'KR', 'South Korea', 'KRW', 'KS', '410', '38.612446', '33.190945', '129.584671', '125.887108', 'Seoul', 'Asia', 'AS', 'ko-KR,en', 'KOR', 1835841),
(123, 'KW', 'Kuwait', 'KWD', 'KU', '414', '30.095945', '28.524611', '48.431473', '46.555557', 'Kuwait City', 'Asia', 'AS', 'ar-KW,en', 'KWT', 285570),
(124, 'KY', 'Cayman Islands', 'KYD', 'CJ', '136', '19.7617', '19.263029', '-79.727272', '-81.432777', 'George Town', 'North America', 'NA', 'en-KY', 'CYM', 3580718),
(125, 'KZ', 'Kazakhstan', 'KZT', 'KZ', '398', '55.451195', '40.936333', '87.312668', '46.491859', 'Astana', 'Asia', 'AS', 'kk,ru', 'KAZ', 1522867),
(126, 'LA', 'Laos', 'LAK', 'LA', '418', '22.500389', '13.910027', '107.697029', '100.093056', 'Vientiane', 'Asia', 'AS', 'lo,fr,en', 'LAO', 1655842),
(127, 'LB', 'Lebanon', 'LBP', 'LE', '422', '34.691418', '33.05386', '36.639194', '35.114277', 'Beirut', 'Asia', 'AS', 'ar-LB,fr-LB,en,hy', 'LBN', 272103),
(128, 'LC', 'Saint Lucia', 'XCD', 'ST', '662', '14.103245', '13.704778', '-60.874203', '-61.07415', 'Castries', 'North America', 'NA', 'en-LC', 'LCA', 3576468),
(129, 'LI', 'Liechtenstein', 'CHF', 'LS', '438', '47.2706251386959', '47.0484284123471', '9.63564281136796', '9.47167359782014', 'Vaduz', 'Europe', 'EU', 'de-LI', 'LIE', 3042058),
(130, 'LK', 'Sri Lanka', 'LKR', 'CE', '144', '9.831361', '5.916833', '81.881279', '79.652916', 'Colombo', 'Asia', 'AS', 'si,ta,en', 'LKA', 1227603),
(131, 'LR', 'Liberia', 'LRD', 'LI', '430', '8.551791', '4.353057', '-7.365113', '-11.492083', 'Monrovia', 'Africa', 'AF', 'en-LR', 'LBR', 2275384),
(132, 'LS', 'Lesotho', 'LSL', 'LT', '426', '-28.572058', '-30.668964', '29.465761', '27.029068', 'Maseru', 'Africa', 'AF', 'en-LS,st,zu,xh', 'LSO', 932692),
(133, 'LT', 'Lithuania', 'EUR', 'LH', '440', '56.446918', '53.901306', '26.871944', '20.941528', 'Vilnius', 'Europe', 'EU', 'lt,ru,pl', 'LTU', 597427),
(134, 'LU', 'Luxembourg', 'EUR', 'LU', '442', '50.184944', '49.446583', '6.528472', '5.734556', 'Luxembourg', 'Europe', 'EU', 'lb,de-LU,fr-LU', 'LUX', 2960313),
(135, 'LV', 'Latvia', 'EUR', 'LG', '428', '58.082306', '55.668861', '28.241167', '20.974277', 'Riga', 'Europe', 'EU', 'lv,ru,lt', 'LVA', 458258),
(136, 'LY', 'Libya', 'LYD', 'LY', '434', '33.168999', '19.508045', '25.150612', '9.38702', 'Tripoli', 'Africa', 'AF', 'ar-LY,it,en', 'LBY', 2215636),
(137, 'MA', 'Morocco', 'MAD', 'MO', '504', '35.9224966985384', '27.662115', '-0.991750000000025', '-13.168586', 'Rabat', 'Africa', 'AF', 'ar-MA,fr', 'MAR', 2542007),
(138, 'MC', 'Monaco', 'EUR', 'MN', '492', '43.75196717037228', '43.72472839869377', '7.439939260482788', '7.408962249755859', 'Monaco', 'Europe', 'EU', 'fr-MC,en,it', 'MCO', 2993457),
(139, 'MD', 'Moldova', 'MDL', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chişinău', 'Europe', 'EU', 'ro,ru,gag,tr', 'MDA', 617790),
(140, 'ME', 'Montenegro', 'EUR', 'MJ', '499', '43.570137', '41.850166', '20.358833', '18.461306', 'Podgorica', 'Europe', 'EU', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884),
(141, 'MF', 'Saint Martin', 'EUR', 'RN', '663', '18.130354', '18.052231', '-63.012993', '-63.152767', 'Marigot', 'North America', 'NA', 'fr', 'MAF', 3578421),
(142, 'MG', 'Madagascar', 'MGA', 'MA', '450', '-11.945433', '-25.608952', '50.48378', '43.224876', 'Antananarivo', 'Africa', 'AF', 'fr-MG,mg', 'MDG', 1062947),
(143, 'MH', 'Marshall Islands', 'USD', 'RM', '584', '14.62', '5.587639', '171.931808', '165.524918', 'Majuro', 'Oceania', 'OC', 'mh,en-MH', 'MHL', 2080185),
(144, 'MK', 'North Macedonia', 'MKD', 'MK', '807', '42.361805', '40.860195', '23.038139', '20.464695', 'Skopje', 'Europe', 'EU', 'mk,sq,tr,rmm,sr', 'MKD', 718075),
(145, 'ML', 'Mali', 'XOF', 'ML', '466', '25.000002', '10.159513', '4.244968', '-12.242614', 'Bamako', 'Africa', 'AF', 'fr-ML,bm', 'MLI', 2453866),
(146, 'MM', 'Myanmar [Burma]', 'MMK', 'BM', '104', '28.543249', '9.784583', '101.176781', '92.189278', 'Nay Pyi Taw', 'Asia', 'AS', 'my', 'MMR', 1327865),
(147, 'MN', 'Mongolia', 'MNT', 'MG', '496', '52.154251', '41.567638', '119.924309', '87.749664', 'Ulan Bator', 'Asia', 'AS', 'mn,ru', 'MNG', 2029969),
(148, 'MO', 'Macao', 'MOP', 'MC', '446', '22.222334', '22.180389', '113.565834', '113.528946', 'Macao', 'Asia', 'AS', 'zh,zh-MO,pt', 'MAC', 1821275),
(149, 'MP', 'Northern Mariana Islands', 'USD', 'CQ', '580', '20.55344', '14.11023', '146.06528', '144.88626', 'Saipan', 'Oceania', 'OC', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468),
(150, 'MQ', 'Martinique', 'EUR', 'MB', '474', '14.878819', '14.392262', '-60.81551', '-61.230118', 'Fort-de-France', 'North America', 'NA', 'fr-MQ', 'MTQ', 3570311),
(151, 'MR', 'Mauritania', 'MRO', 'MR', '478', '27.298073', '14.715547', '-4.827674', '-17.066521', 'Nouakchott', 'Africa', 'AF', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080),
(152, 'MS', 'Montserrat', 'XCD', 'MH', '500', '16.824060205313184', '16.674768935441556', '-62.144100129608205', '-62.24138237036129', 'Plymouth', 'North America', 'NA', 'en-MS', 'MSR', 3578097),
(153, 'MT', 'Malta', 'EUR', 'MT', '470', '36.0821530995456', '35.8061835000002', '14.5764915000002', '14.1834251000001', 'Valletta', 'Europe', 'EU', 'mt,en-MT', 'MLT', 2562770),
(154, 'MU', 'Mauritius', 'MUR', 'MP', '480', '-10.319255', '-20.525717', '63.500179', '56.512718', 'Port Louis', 'Africa', 'AF', 'en-MU,bho,fr', 'MUS', 934292),
(155, 'MV', 'Maldives', 'MVR', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Malé', 'Asia', 'AS', 'dv,en', 'MDV', 1282028),
(156, 'MW', 'Malawi', 'MWK', 'MI', '454', '-9.367541', '-17.125', '35.916821', '32.67395', 'Lilongwe', 'Africa', 'AF', 'ny,yao,tum,swk', 'MWI', 927384),
(157, 'MX', 'Mexico', 'MXN', 'MX', '484', '32.716759', '14.532866', '-86.703392', '-118.453949', 'Mexico City', 'North America', 'NA', 'es-MX', 'MEX', 3996063),
(158, 'MY', 'Malaysia', 'MYR', 'MY', '458', '7.363417', '0.855222', '119.267502', '99.643448', 'Kuala Lumpur', 'Asia', 'AS', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045),
(159, 'MZ', 'Mozambique', 'MZN', 'MZ', '508', '-10.471883', '-26.868685', '40.842995', '30.217319', 'Maputo', 'Africa', 'AF', 'pt-MZ,vmw', 'MOZ', 1036973),
(160, 'NA', 'Namibia', 'NAD', 'WA', '516', '-16.959894', '-28.97143', '25.256701', '11.71563', 'Windhoek', 'Africa', 'AF', 'en-NA,af,de,hz,naq', 'NAM', 3355338),
(161, 'NC', 'New Caledonia', 'XPF', 'NC', '540', '-19.549778', '-22.698', '168.129135', '163.564667', 'Noumea', 'Oceania', 'OC', 'fr-NC', 'NCL', 2139685),
(162, 'NE', 'Niger', 'XOF', 'NG', '562', '23.525026', '11.696975', '15.995643', '0.16625', 'Niamey', 'Africa', 'AF', 'fr-NE,ha,kr,dje', 'NER', 2440476),
(163, 'NF', 'Norfolk Island', 'AUD', 'NF', '574', '-28.995170686948427', '-29.063076742954735', '167.99773740209957', '167.91543230151365', 'Kingston', 'Oceania', 'OC', 'en-NF', 'NFK', 2155115),
(164, 'NG', 'Nigeria', 'NGN', 'NI', '566', '13.892007', '4.277144', '14.680073', '2.668432', 'Abuja', 'Africa', 'AF', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926),
(165, 'NI', 'Nicaragua', 'NIO', 'NU', '558', '15.025909', '10.707543', '-82.738289', '-87.690308', 'Managua', 'North America', 'NA', 'es-NI,en', 'NIC', 3617476),
(166, 'NL', 'Netherlands', 'EUR', 'NL', '528', '53.512196', '50.753918', '7.227944', '3.362556', 'Amsterdam', 'Europe', 'EU', 'nl-NL,fy-NL', 'NLD', 2750405),
(167, 'NO', 'Norway', 'NOK', 'NO', '578', '71.18811', '57.977917', '31.078052520751953', '4.650167', 'Oslo', 'Europe', 'EU', 'no,nb,nn,se,fi', 'NOR', 3144096),
(168, 'NP', 'Nepal', 'NPR', 'NP', '524', '30.43339', '26.356722', '88.199333', '80.056274', 'Kathmandu', 'Asia', 'AS', 'ne,en', 'NPL', 1282988),
(169, 'NR', 'Nauru', 'AUD', 'NR', '520', '-0.504306', '-0.552333', '166.945282', '166.899033', '', 'Oceania', 'OC', 'na,en-NR', 'NRU', 2110425),
(170, 'NU', 'Niue', 'NZD', 'NE', '570', '-18.951069', '-19.152193', '-169.775177', '-169.951004', 'Alofi', 'Oceania', 'OC', 'niu,en-NU', 'NIU', 4036232),
(171, 'NZ', 'New Zealand', 'NZD', 'NZ', '554', '-34.389668', '-47.286026', '-180', '166.7155', 'Wellington', 'Oceania', 'OC', 'en-NZ,mi', 'NZL', 2186224),
(172, 'OM', 'Oman', 'OMR', 'MU', '512', '26.387972', '16.64575', '59.836582', '51.882', 'Muscat', 'Asia', 'AS', 'ar-OM,en,bal,ur', 'OMN', 286963),
(173, 'PA', 'Panama', 'PAB', 'PM', '591', '9.637514', '7.197906', '-77.17411', '-83.051445', 'Panama City', 'North America', 'NA', 'es-PA,en', 'PAN', 3703430),
(174, 'PE', 'Peru', 'PEN', 'PE', '604', '-0.012977', '-18.349728', '-68.677986', '-81.326744', 'Lima', 'South America', 'SA', 'es-PE,qu,ay', 'PER', 3932488),
(175, 'PF', 'French Polynesia', 'XPF', 'FP', '258', '-7.903573', '-27.653572', '-134.929825', '-152.877167', 'Papeete', 'Oceania', 'OC', 'fr-PF,ty', 'PYF', 4030656),
(176, 'PG', 'Papua New Guinea', 'PGK', 'PP', '598', '-1.318639', '-11.657861', '155.96344', '140.842865', 'Port Moresby', 'Oceania', 'OC', 'en-PG,ho,meu,tpi', 'PNG', 2088628),
(177, 'PH', 'Philippines', 'PHP', 'RP', '608', '21.120611', '4.643306', '126.601524', '116.931557', 'Manila', 'Asia', 'AS', 'tl,en-PH,fil', 'PHL', 1694008),
(178, 'PK', 'Pakistan', 'PKR', 'PK', '586', '37.097', '23.786722', '77.840919', '60.878613', 'Islamabad', 'Asia', 'AS', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579),
(179, 'PL', 'Poland', 'PLN', 'PL', '616', '54.839138', '49.006363', '24.150749', '14.123', 'Warsaw', 'Europe', 'EU', 'pl', 'POL', 798544),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 'SB', '666', '47.146286', '46.786041', '-56.252991', '-56.420658', 'Saint-Pierre', 'North America', 'NA', 'fr-PM', 'SPM', 3424932),
(181, 'PN', 'Pitcairn Islands', 'NZD', 'PC', '612', '-24.315865', '-24.672565', '-124.77285', '-128.346436', 'Adamstown', 'Oceania', 'OC', 'en-PN', 'PCN', 4030699),
(182, 'PR', 'Puerto Rico', 'USD', 'RQ', '630', '18.520166', '17.926405', '-65.242737', '-67.942726', 'San Juan', 'North America', 'NA', 'en-PR,es-PR', 'PRI', 4566966),
(183, 'PS', 'Palestine', 'ILS', 'WE', '275', '32.54638671875', '31.216541290283203', '35.5732955932617', '34.21665954589844', '', 'Asia', 'AS', 'ar-PS', 'PSE', 6254930),
(184, 'PT', 'Portugal', 'EUR', 'PO', '620', '42.154311127408', '36.96125', '-6.18915930748288', '-9.50052660716588', 'Lisbon', 'Europe', 'EU', 'pt-PT,mwl', 'PRT', 2264397),
(185, 'PW', 'Palau', 'USD', 'PS', '585', '8.46966', '2.8036', '134.72307', '131.11788', 'Melekeok - Palau State Capital', 'Oceania', 'OC', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582),
(186, 'PY', 'Paraguay', 'PYG', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunción', 'South America', 'SA', 'es-PY,gn', 'PRY', 3437598),
(187, 'QA', 'Qatar', 'QAR', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', 'ar-QA,es', 'QAT', 289688),
(188, 'RE', 'Réunion', 'EUR', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', 'fr-RE', 'REU', 935317),
(189, 'RO', 'Romania', 'RON', 'RO', '642', '48.266945', '43.627304', '29.691055', '20.269972', 'Bucharest', 'Europe', 'EU', 'ro,hu,rom', 'ROU', 798549),
(190, 'RS', 'Serbia', 'RSD', 'RI', '688', '46.18138885498047', '42.232215881347656', '23.00499725341797', '18.817020416259766', 'Belgrade', 'Europe', 'EU', 'sr,hu,bs,rom', 'SRB', 6290252),
(191, 'RU', 'Russia', 'RUB', 'RS', '643', '81.857361', '41.188862', '-169.05', '19.25', 'Moscow', 'Europe', 'EU', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', 2017370),
(192, 'RW', 'Rwanda', 'RWF', 'RW', '646', '-1.053481', '-2.840679', '30.895958', '28.856794', 'Kigali', 'Africa', 'AF', 'rw,en-RW,fr-RW,sw', 'RWA', 49518),
(193, 'SA', 'Saudi Arabia', 'SAR', 'SA', '682', '32.158333', '15.61425', '55.666584', '34.495693', 'Riyadh', 'Asia', 'AS', 'ar-SA', 'SAU', 102358),
(194, 'SB', 'Solomon Islands', 'SBD', 'BP', '090', '-6.589611', '-11.850555', '166.980865', '155.508606', 'Honiara', 'Oceania', 'OC', 'en-SB,tpi', 'SLB', 2103350),
(195, 'SC', 'Seychelles', 'SCR', 'SE', '690', '-4.283717', '-9.753867', '56.29770287937299', '46.204769', 'Victoria', 'Africa', 'AF', 'en-SC,fr-SC', 'SYC', 241170),
(196, 'SD', 'Sudan', 'SDG', 'SU', '729', '22.232219696044922', '8.684720993041992', '38.60749816894531', '21.827774047851562', 'Khartoum', 'Africa', 'AF', 'ar-SD,en,fia', 'SDN', 366755),
(197, 'SE', 'Sweden', 'SEK', 'SW', '752', '69.0625', '55.337112', '24.1562924839185', '11.118694', 'Stockholm', 'Europe', 'EU', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886),
(198, 'SG', 'Singapore', 'SGD', 'SN', '702', '1.471278', '1.258556', '104.007469', '103.638275', 'Singapore', 'Asia', 'AS', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251),
(199, 'SH', 'Saint Helena', 'SHP', 'SH', '654', '-7.887815', '-16.019543', '-5.638753', '-14.42123', 'Jamestown', 'Africa', 'AF', 'en-SH', 'SHN', 3370751),
(200, 'SI', 'Slovenia', 'EUR', 'SI', '705', '46.8766275518195', '45.421812998164', '16.6106311807', '13.3753342064709', 'Ljubljana', 'Europe', 'EU', 'sl,sh', 'SVN', 3190538),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 'SV', '744', '80.762085', '79.220306', '33.287334', '17.699389', 'Longyearbyen', 'Europe', 'EU', 'no,ru', 'SJM', 607072),
(202, 'SK', 'Slovakia', 'EUR', 'LO', '703', '49.603168', '47.728111', '22.570444', '16.84775', 'Bratislava', 'Europe', 'EU', 'sk,hu', 'SVK', 3057568),
(203, 'SL', 'Sierra Leone', 'SLL', 'SL', '694', '10', '6.929611', '-10.284238', '-13.307631', 'Freetown', 'Africa', 'AF', 'en-SL,men,tem', 'SLE', 2403846),
(204, 'SM', 'San Marino', 'EUR', 'SM', '674', '43.99223730851663', '43.8937092171425', '12.51653186779788', '12.403538978820734', 'San Marino', 'Europe', 'EU', 'it-SM', 'SMR', 3168068),
(205, 'SN', 'Senegal', 'XOF', 'SG', '686', '16.691633', '12.307275', '-11.355887', '-17.535236', 'Dakar', 'Africa', 'AF', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662),
(206, 'SO', 'Somalia', 'SOS', 'SO', '706', '11.979166', '-1.674868', '51.412636', '40.986595', 'Mogadishu', 'Africa', 'AF', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537),
(207, 'SR', 'Suriname', 'SRD', 'NS', '740', '6.004546', '1.831145', '-53.977493', '-58.086563', 'Paramaribo', 'South America', 'SA', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998),
(208, 'SS', 'South Sudan', 'SSP', 'OD', '728', '12.219148635864258', '3.493394374847412', '35.9405517578125', '24.140274047851562', 'Juba', 'Africa', 'AF', 'en', 'SSD', 7909807),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'São Tomé', 'Africa', 'AF', 'pt-ST', 'STP', 2410758),
(210, 'SV', 'El Salvador', 'USD', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', 'es-SV', 'SLV', 3585968),
(211, 'SX', 'Sint Maarten', 'ANG', 'NN', '534', '18.070248', '18.011692', '-63.012993', '-63.144039', 'Philipsburg', 'North America', 'NA', 'nl,en', 'SXM', 7609695),
(212, 'SY', 'Syria', 'SYP', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843),
(213, 'SZ', 'Swaziland', 'SZL', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', 'en-SZ,ss-SZ', 'SWZ', 934841),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', 'en-TC', 'TCA', 3576916),
(215, 'TD', 'Chad', 'XAF', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', 'fr-TD,ar-TD,sre', 'TCD', 2434508),
(216, 'TF', 'French Southern Territories', 'EUR', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Français', 'Antarctica', 'AN', 'fr', 'ATF', 1546748),
(217, 'TG', 'Togo', 'XOF', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lomé', 'Africa', 'AF', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686),
(218, 'TH', 'Thailand', 'THB', 'TH', '764', '20.463194', '5.61', '105.639389', '97.345642', 'Bangkok', 'Asia', 'AS', 'th,en', 'THA', 1605651),
(219, 'TJ', 'Tajikistan', 'TJS', 'TI', '762', '41.042252', '36.674137', '75.137222', '67.387138', 'Dushanbe', 'Asia', 'AS', 'tg,ru', 'TJK', 1220409),
(220, 'TK', 'Tokelau', 'NZD', 'TL', '772', '-8.553613662719727', '-9.381111145019531', '-171.21142578125', '-172.50033569335938', '', 'Oceania', 'OC', 'tkl,en-TK', 'TKL', 4031074),
(221, 'TL', 'East Timor', 'USD', 'TT', '626', '-8.135833740234375', '-9.463626861572266', '127.30859375', '124.04609680175781', 'Dili', 'Oceania', 'OC', 'tet,pt-TL,id,en', 'TLS', 1966436),
(222, 'TM', 'Turkmenistan', 'TMT', 'TX', '795', '42.795555', '35.141083', '66.684303', '52.441444', 'Ashgabat', 'Asia', 'AS', 'tk,ru,uz', 'TKM', 1218197),
(223, 'TN', 'Tunisia', 'TND', 'TS', '788', '37.543915', '30.240417', '11.598278', '7.524833', 'Tunis', 'Africa', 'AF', 'ar-TN,fr', 'TUN', 2464461),
(224, 'TO', 'Tonga', 'TOP', 'TN', '776', '-15.562988', '-21.455057', '-173.907578', '-175.682266', 'Nuku\'alofa', 'Oceania', 'OC', 'to,en-TO', 'TON', 4032283),
(225, 'TR', 'Turkey', 'TRY', 'TU', '792', '42.107613', '35.815418', '44.834999', '25.668501', 'Ankara', 'Asia', 'AS', 'tr-TR,ku,diq,az,av', 'TUR', 298795),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 'TD', '780', '11.338342', '10.036105', '-60.517933', '-61.923771', 'Port of Spain', 'North America', 'NA', 'en-TT,hns,fr,es,zh', 'TTO', 3573591),
(227, 'TV', 'Tuvalu', 'AUD', 'TV', '798', '-5.641972', '-10.801169', '179.863281', '176.064865', 'Funafuti', 'Oceania', 'OC', 'tvl,en,sm,gil', 'TUV', 2110297),
(228, 'TW', 'Taiwan', 'TWD', 'TW', '158', '25.3002899036181', '21.896606934717', '122.006739823315', '119.534691', 'Taipei', 'Asia', 'AS', 'zh-TW,zh,nan,hak', 'TWN', 1668284),
(229, 'TZ', 'Tanzania', 'TZS', 'TZ', '834', '-0.990736', '-11.745696', '40.443222', '29.327168', 'Dodoma', 'Africa', 'AF', 'sw-TZ,en,ar', 'TZA', 149590),
(230, 'UA', 'Ukraine', 'UAH', 'UP', '804', '52.369362', '44.390415', '40.20739', '22.128889', 'Kyiv', 'Europe', 'EU', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791),
(231, 'UG', 'Uganda', 'UGX', 'UG', '800', '4.214427', '-1.48405', '35.036049', '29.573252', 'Kampala', 'Africa', 'AF', 'en-UG,lg,sw,ar', 'UGA', 226074),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '', '581', '28.219814', '-0.389006', '166.654526', '-177.392029', '', 'Oceania', 'OC', 'en-UM', 'UMI', 5854968),
(233, 'US', 'United States', 'USD', 'US', '840', '49.388611', '24.544245', '-66.954811', '-124.733253', 'Washington', 'North America', 'NA', 'en-US,es-US,haw,fr', 'USA', 6252001),
(234, 'UY', 'Uruguay', 'UYU', 'UY', '858', '-30.082224', '-34.980816', '-53.073933', '-58.442722', 'Montevideo', 'South America', 'SA', 'es-UY', 'URY', 3439705),
(235, 'UZ', 'Uzbekistan', 'UZS', 'UZ', '860', '45.575001', '37.184444', '73.132278', '55.996639', 'Tashkent', 'Asia', 'AS', 'uz,ru,tg', 'UZB', 1512440),
(236, 'VA', 'Vatican City', 'EUR', 'VT', '336', '41.90743830885576', '41.90027960306854', '12.45837546629481', '12.44570678169205', 'Vatican', 'Europe', 'EU', 'la,it,fr', 'VAT', 3164670),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 'VC', '670', '13.377834', '12.583984810969037', '-61.11388', '-61.46090317727658', 'Kingstown', 'North America', 'NA', 'en-VC,fr', 'VCT', 3577815),
(238, 'VE', 'Venezuela', 'VEF', 'VE', '862', '12.201903', '0.626311', '-59.80378', '-73.354073', 'Caracas', 'South America', 'SA', 'es-VE', 'VEN', 3625428),
(239, 'VG', 'British Virgin Islands', 'USD', 'VI', '092', '18.757221', '18.383710898211305', '-64.268768', '-64.71312752730364', 'Road Town', 'North America', 'NA', 'en-VG', 'VGB', 3577718),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 'VQ', '850', '18.415382', '17.673931', '-64.565193', '-65.101333', 'Charlotte Amalie', 'North America', 'NA', 'en-VI', 'VIR', 4796775),
(241, 'VN', 'Vietnam', 'VND', 'VM', '704', '23.388834', '8.559611', '109.464638', '102.148224', 'Hanoi', 'Asia', 'AS', 'vi,en,fr,zh,km', 'VNM', 1562822),
(242, 'VU', 'Vanuatu', 'VUV', 'NH', '548', '-13.073444', '-20.248945', '169.904785', '166.524979', 'Port Vila', 'Oceania', 'OC', 'bi,en-VU,fr-VU', 'VUT', 2134431),
(243, 'WF', 'Wallis and Futuna', 'XPF', 'WF', '876', '-13.216758181061444', '-14.314559989820843', '-176.16174317718253', '-178.1848112896414', 'Mata-Utu', 'Oceania', 'OC', 'wls,fud,fr-WF', 'WLF', 4034749),
(244, 'WS', 'Samoa', 'WST', 'WS', '882', '-13.432207', '-14.040939', '-171.415741', '-172.798599', 'Apia', 'Oceania', 'OC', 'sm,en-WS', 'WSM', 4034894),
(245, 'XK', 'Kosovo', 'EUR', 'KV', '0', '43.2682495807952', '41.856369601859925', '21.80335088694943', '19.977481504492914', 'Pristina', 'Europe', 'EU', 'sq,sr', 'XKX', 831053),
(246, 'YE', 'Yemen', 'YER', 'YM', '887', '18.9999989031009', '12.1110910264462', '54.5305388163283', '42.5325394314234', 'Sanaa', 'Asia', 'AS', 'ar-YE', 'YEM', 69543),
(247, 'YT', 'Mayotte', 'EUR', 'MF', '175', '-12.648891', '-13.000132', '45.29295', '45.03796', 'Mamoutzou', 'Africa', 'AF', 'fr-YT', 'MYT', 1024031),
(248, 'ZA', 'South Africa', 'ZAR', 'SF', '710', '-22.126612', '-34.839828', '32.895973', '16.458021', 'Pretoria', 'Africa', 'AF', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', 953987),
(249, 'ZM', 'Zambia', 'ZMW', 'ZA', '894', '-8.22436', '-18.079473', '33.705704', '21.999371', 'Lusaka', 'Africa', 'AF', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949),
(250, 'ZW', 'Zimbabwe', 'ZWL', 'ZI', '716', '-15.608835', '-22.417738', '33.056305', '25.237028', 'Harare', 'Africa', 'AF', 'en-ZW,sn,nr,nd', 'ZWE', 878675);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) NOT NULL,
  `coupondiscount` decimal(8,2) DEFAULT NULL,
  `couponpercent` decimal(3,2) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `coupondiscount`, `couponpercent`, `active`) VALUES
(1, 'TEST_COUPON', NULL, '5.00', 1),
(2, 'percent', NULL, '5.00', 1),
(3, 'minfiveeuro', '5.00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `developper`
--

DROP TABLE IF EXISTS `developper`;
CREATE TABLE IF NOT EXISTS `developper` (
  `dev_id` int(11) NOT NULL,
  `dev_name` varchar(255) NOT NULL,
  PRIMARY KEY (`dev_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `gesproken` varchar(255) NOT NULL,
  `geschreven` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nr_players`
--

DROP TABLE IF EXISTS `nr_players`;
CREATE TABLE IF NOT EXISTS `nr_players` (
  `players_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`players_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 22, 2, 1, '65'),
(2, 23, 2, 1, '65'),
(3, 24, 2, 1, '65'),
(4, 25, 7, 1, '65'),
(5, 26, 2, 1, '65'),
(6, 26, 6, 1, '65'),
(7, 26, 7, 1, '65'),
(8, 27, 2, 1, '65'),
(9, 27, 6, 1, '65'),
(10, 27, 7, 1, '65'),
(11, 28, 2, 1, '65'),
(12, 28, 6, 1, '65'),
(13, 28, 7, 1, '65'),
(14, 29, 2, 1, '65');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `transactionID` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `shipping_address_id`, `order_date`, `transactionID`) VALUES
(1, 22, '65.00', 11, '2020-01-29 15:28:24', '4MG8604985886411F'),
(2, 24, '65.00', 13, '2020-01-29 16:16:39', '5V344247S5097881U'),
(3, 25, '195.00', 14, '2020-01-29 18:48:08', '3V8517771R1209108'),
(4, 25, '195.00', 14, '2020-01-29 18:48:30', '3V8517771R1209108'),
(5, 25, '195.00', 14, '2020-01-29 18:49:49', '3V8517771R1209108'),
(6, 25, '195.00', 14, '2020-01-29 18:50:36', '3V8517771R1209108'),
(7, 25, '195.00', 14, '2020-01-29 18:51:11', '3V8517771R1209108'),
(8, 25, '195.00', 14, '2020-01-29 18:52:02', '3V8517771R1209108'),
(9, 25, '195.00', 14, '2020-01-29 18:52:56', '3V8517771R1209108'),
(10, 25, '195.00', 14, '2020-01-29 18:54:12', '3V8517771R1209108'),
(11, 25, '195.00', 14, '2020-01-29 18:58:04', '3V8517771R1209108'),
(12, 25, '195.00', 14, '2020-01-29 18:59:50', '3V8517771R1209108'),
(13, 25, '195.00', 14, '2020-01-29 19:01:31', '3V8517771R1209108'),
(14, 25, '195.00', 14, '2020-01-29 19:04:18', '3V8517771R1209108'),
(15, 25, '195.00', 14, '2020-01-29 19:07:39', '3V8517771R1209108'),
(16, 25, '195.00', 14, '2020-01-29 19:10:25', '3V8517771R1209108'),
(17, 25, '195.00', 14, '2020-01-29 19:18:40', '3V8517771R1209108'),
(18, 25, '195.00', 14, '2020-01-29 19:19:04', '3V8517771R1209108'),
(19, 25, '195.00', 14, '2020-01-29 19:20:40', '3V8517771R1209108'),
(20, 25, '195.00', 14, '2020-01-29 19:21:46', '3V8517771R1209108'),
(21, 25, '195.00', 14, '2020-01-29 19:23:22', '3V8517771R1209108'),
(22, 25, '195.00', 14, '2020-01-29 19:26:22', '3V8517771R1209108'),
(23, 25, '195.00', 14, '2020-01-29 19:27:26', '3V8517771R1209108'),
(24, 25, '195.00', 14, '2020-01-29 19:29:07', '3V8517771R1209108'),
(25, 25, '195.00', 14, '2020-01-29 19:32:55', '3V8517771R1209108'),
(26, 25, '195.00', 14, '2020-01-29 19:35:50', '3V8517771R1209108'),
(27, 25, '195.00', 14, '2020-01-29 19:37:48', '3V8517771R1209108'),
(28, 26, '195.00', 15, '2020-01-29 19:43:32', '7JS54034DM8243717'),
(29, 27, '65.00', 16, '2020-01-29 19:46:18', '0NS74019B10251538');

-- --------------------------------------------------------

--
-- Table structure for table `pegi_age`
--

DROP TABLE IF EXISTS `pegi_age`;
CREATE TABLE IF NOT EXISTS `pegi_age` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegi_content`
--

DROP TABLE IF EXISTS `pegi_content`;
CREATE TABLE IF NOT EXISTS `pegi_content` (
  `pegi_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`pegi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prijs` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `specs_id` int(11) DEFAULT NULL,
  `EAN` bigint(255) NOT NULL,
  `release_date` date NOT NULL,
  `dev` varchar(255) NOT NULL DEFAULT '',
  `publisher` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `caption`, `description`, `prijs`, `category_id`, `specs_id`, `EAN`, `release_date`, `dev`, `publisher`) VALUES
(1, 'fifa20', 'FIFA 20', 'FIFA 20\r\nEA SPORTS™ FIFA 20 voor PlayStation 4, Xbox One en PC, aangedreven door Frostbite™, brengt de twee aspecten van \'The World\'s Game\' tot leven: het prestige van het als prof spelen en de totaal nieuwe straatvoetbalervaring in EA SPORTS VOLTA. FIFA 20 vernieuwt het hele spel. FOOTBALL INTELLIGENCE ontgrendelt een ongekend platform voor realisme wat betreft gameplay, FIFA Ultimate Team™ biedt meer manieren om je droomteam samen te stellen en met EA SPORTS VOLTA speel je authentiek straatvoetbal.\r\n\r\nVOLTA VOETBAL\r\nEA SPORTS VOLTA brengt voetballen terug naar de straat met de authentieke cultuur, creativiteit en stijl van het kleinschalige en laagdrempelige spel overal ter wereld. Creëer je personage, laat je stijl blijken en speel diverse soorten vrij voetbal in omgevingen over de hele wereld.\r\n\r\nVOLTA-gameplay: Speel in je eigen stijl met een geheel nieuw gameplaysysteem, gebaseerd op voetbalrealisme. VOLTA is geïnspireerd door de authentieke, kleinere variant van voetbal die op straat, in voetbalkooien en in de zaal wordt gespeeld. Het biedt nieuwe manieren om op te gaan in de speelstijl van de straat, zoals versimpelde snelle bewegingen en skillmoves, nieuwe animaties van vaardigheden en zelfs de mogelijkheid om de muur als teamgenoot te gebruiken.\r\n\r\nSpeler: VOLTA Football biedt talloze manier om je speler aan te passen en te personaliseren, van kleding, kapsel en tatoeages tot manieren om te juichen. Maak je eigen mannelijke of vrouwelijke speler en ga ermee aan de slag in verschillende speltypen in VOLTA Voetbal.\r\n\r\nUiterlijk: Laat je eigen stijl in VOLTA Football zien door het uiterlijk van je speler op allerlei manieren aan te passen, zoals met shirts, schoenen, truien, tatoeages en kapsels. Ontgrendel meer van dit soort aanpassingen als je voortgang maakt in VOLTA door uitdagingen in de game te voltooien.\r\n\r\nLocaties: VOLTA Football brengt de interessantste voetballocaties ter wereld tot leven. Het biedt spelers de mogelijkheid om deze wereldgame op een lokale wijze te ervaren, zoals bij een viaduct in Amsterdam, een voetbalkooi in Londen of op een dak in Tokio.\r\n\r\nWedstrijdtypen: Zelf dingen aanpassen staat centraal in VOLTA Football. Speel 3-tegen-3 (Geen DM), 4-tegen-4, 4-tegen-4 (Geen DM), 5-tegen-5 en Futsal, oftewel professioneel zaalvoetbal. Daarnaast biedt VOLTA arena\'s van verschillende afmetingen, met of zonder muren om spelers de vrijheid te geven deze prachtige sport te spelen hoe zij het willen.\r\n\r\nSpeltypen:\r\n\r\nVOLTA-aftrap: Neem je favoriete teams mee de straat op en speel verschillende wedstrijdvarianten op allerlei VOLTAlocaties. Speel PSG tegen Lyon in Parijs, de Madrileense derby op straat in Spanje of Chelsea tegen de Spurs in een voetbalkooi in Londen.\r\nVOLTA-wereld: Bouw je VOLTA-team op door singleplayer-wedstrijden in allerlei varianten en op verschillende locaties te spelen tegen selecties die door de community zijn gemaakt. Na elke overwinning krijg je een speler van de tegenstander waarmee je aan de vaardigheden en teamgeest van je team werkt.\r\nVOLTA-verhaal: Speel met je speler in een verhaal, waarin je het opneemt tegen allerlei straatlegendes van over de hele wereld. Verdien beloningen, pas je speler aan en trek nieuwe spelers voor je selectie aan op weg naar het VOLTA World Championship-toernooi in Buenos Aires.\r\nVOLTA-competitie: Werk voor promotie en voorkom degradatie in de online VOLTA-competitie. In de nieuwe varianten waarin spelers het tegen elkaar opnemen, speel je tegen anderen online en dragen overwinningen bij aan promotie naareen hogere divisie.\r\nSIERD DE VOS EN JEROEN GRUETER VERZORGEN NEDERLANDSTALIG COMMENTAAR IN FIFA 20\r\nIn FIFA 20 zullen Sierd de Vos en Jeroen Grueter het Nederlandstalige commentaar verzorgen. Verschillende reeds legendarische uitspraken van “El Sierd” zullen in de game de revue passeren, naast een reeks volledig nieuwe uitspraken van dit dynamische duo. Jeroen en Sierd hebben een compleet eigen invulling gegeven aan het becommentariëren van de wedstrijden die de speler op de mat zal leggen in FIFA 20. Entertainment gegarandeerd!\r\n\r\nGAMEPLAY\r\nErvaar FOOTBALL INTELLIGENCE, dat helemaal opnieuw is ontwikkeld en tot ongekend realistisch voetbal leidt. FOOTBALL INTELLIGENCE maakt elk moment op het veld beter: aan de bal, zonder de bal en door de bal. Het is gebaseerd op drie pijlers: DEFINING MOMENTS (aan de bal), AUTHENTIC GAME FLOW (zonder de bal) en BALL PHYSICS (door de bal). Deze benadering is bedoeld om de gebruiker in elke wedstrijd centraal te plaatsen.\r\n\r\nAUTHENTIC GAME FLOW: Inzicht in tijd, ruimte en positie en fundamentele intelligentie van voetballers van wereldklasse. Met AUTHENTIC GAME FLOW zal elke door de AI bestuurde speler handelen op een manier waarin met deze onderdelen rekening gehouden wordt, waardoor er een situatie ontstaat waarin meer tijd en ruimte wordt gecreëerd en er meer nadruk wordt gelegd op het spel van de gebruiker.\r\n\r\nDynamische 1-tegen-1-duels: De opnieuw ontworpen gameflow, die gebaseerd is op het speeltempo van \'s werelds beste competities, biedt meer levensechte positionering en spel, wat resulteert in meer 1-tegen-1- duels met de nadruk op door de gebruiker bestuurde DEFINING MOMENTS.\r\nAI-verdediging: het positiespel en het tacklesysteem zijn opnieuw ontworpen, wat leidt tot een situatie waarin de AI beter de door de gebruiker bestuurde speler aanvult. AI biedt intelligente ondersteuning in de verdediging terwijl verdedigen door de gebruiker beloond wordt en voordeel oplevert.\r\nREAL PLAYER MOTION TECHNOLOGY: Door verbeteringen in motoriek en positiespel bewegen AI-spelers natuurlijker en rustiger dan ooit, wat leidt tot realistische voetbalbewegingen voor alle spelers op het veld.\r\nDEFINING MOMENTS: Voetbal bestaat uit een aantal cruciale momenten die de uitkomst van een wedstrijd bepalen. Wedstrijden worden gewonnen of verloren door DEFINING MOMENTS die door de gebruiker worden bestuurd, zoals COMPOSED FINISHING bij het doelgebied of gecontroleerd tackelen achterin.\r\n\r\nZijwaarts dribbelen: Het nieuwe zijwaartse dribbelen biedt nieuwe dimensies in de aanval en maakt je wendbaarder dan ooit om de tegenstander uit de tent te lokken en hem dan op snelheid of vaardigheid te verslaan.\r\nGecontroleerd tackelen: Door het Active Touch System wordt verdedigen door de gebruiker beloond en levert voordeel op via allerlei nieuwe tackleanimaties. Hoe beter de tackle, hoe groter de kans dat de spelers de bal in bezit krijgen.\r\nVernieuwde dode spelmomenten: Dit systeem is aangepakt en geeft spelers meer opties om directe vrije trappen en strafschoppen te richten, met een nieuwe manier om te schieten die meer op vaardigheid is gebaseerd en de speler meer dan ooit beloont.\r\nCOMPOSED FINISHING: De manier waarop je schiet is helemaal vernieuwd, waardoor het afmaken consistenter en meer klinisch is. Dit zorgt voor een meer levensechte ervaring die authentiek afmaken beter beloont en risico en beloning biedt in moeilijker situaties, zoals voorzetten met een volley.\r\nBALL PHYSICS: Het laatste dynamische onderdeel van een voetbalwedstrijd is de bal. Het balbewegingssysteem tilt de gameplay naar een nieuw niveau van realisme, met nieuwe banen van schoten, meer realistische tackle-interacties en balgedrag op basis van natuurkundewetten.\r\n\r\nVoetbal Informed Motion: Een nieuw bewegingssysteem laat de bal realistischer draaien en stuiteren, wat meer realisme dan ooit oplevert. Dit levert een meer levensechte voetbalervaring op.\r\nNieuwe banen van schoten: Met het nieuwe balbewegingssysteem wordt een aantal realistische banen van schoten ontgrendeld, zoals technische ballen die opeens dalen, draaiende ballen bij dode spelmomenten en ballen die in één keer worden geraakt en omhoog gaan.\r\nUEFA CHAMPIONS LEAGUE, UEFA EUROPA LEAGUE EN UEFA SUPER CUP\r\nDe meest prestigieuze clubcompetities zoals de UEFA Champions League, Europa League en Super Cup komen in FIFA 20 opnieuw tot leven met authentieke UEFA-elementen zoals een grafische schil van een officiële uitzending, tenuebadges, wedstrijdballen en de beroemde trofeeën, en in allerlei verschillende speltypen, zoals FIFA 20 Ultimate Team, het speltype Carrière en een op zichzelf staand speltype Champions League.', '65.00', 13, NULL, 5021290084827, '2019-09-19', 'EA Canada', 'EA'),
(2, 'Marvels Avengers', 'Marvel\'s Avengers', 'Marvel\'s Avengers nodigt spelers uit om hun super helden dromen waar te maken. Een prachtige verhaallijn en een steeds groter universum komen samen in deze ultieme Avengers Game ervaring. Leer buitengewone vaardigheden beheersen, pas je helden aan en team up met vier spelers om de aarde de verdedigen van alle gevaren. Marvel\'s Avengers begint op A-Day, waar Captain America, Iron Man, The Hulk, Black Widow en Thor hun hi-tech Avengers Headquarters in San Francisco onthullen. De feestelijkheden nemen een ommekeer wanneer er een catastrofisch accident resulteert in massale verwoesting. De Avengers krijgen de schuld van deze tragedie en hun wegen scheiden. Vijf jaar later zijn alle superhelden outcasts en de wereld in gevaar. De enige redding is om de Earth\'s Mightiest Heroes terug samen te brengen.  Marvel\'s Avengers heeft een cinematisch verhaal, compleet met ontvlambare actie waar Crystal Dynamics bekend voor is. De game zal spelers meenemen op een epische reis, over verschillende jaren, dankzij regelmatige content updates. Dit is de toekomst voor de Avengers.  Speel een origineel Avengers verhaal, met een unieke kijk op deze iconische super helden Een character-driven verhaal in een cinematische campaign Single-player en co-op missions Bouw je eigen versie van jouw Earth\'s Mightiest Heroe via skills en gear die je kan unlocken Team up online! Met 4 spelers kan je online samen de gevaren die de aarde bedreigen bevechten!', '65.00', 1, NULL, 5021290084827, '2020-05-15', 'Crystal Dynamics', 'Square Enix'),
(3, 'Borderlands 3', 'Borderlands 3', 'De klassieke shooter-looter keert terug, met ontelbare wapens en een gloednieuw avontuur vol chaos! Schiet je weg langs nieuwe werelden en vijanden als een van de vier gloednieuwe Vault Hunters, de ultieme, schatzoekende vechtersbazen van de Borderlands, elk voorzien van uitgebreide skill trees, vaardigheden en aanpassingsmogelijkheden. Speel solo of met vrienden en bind de strijd aan met bizarre vijanden, scoor tonnen aan buit en red je thuiswereld van de meest meedogenloze sekteleiders uit het heelal.  Een wilde rit vol chaos Voorkom dat de extremistische Calypso Twins de bandietenclans met elkaar verenigen en de grootste macht van het heelal in handen krijgen. Alleen jij, een Vault Hunter op zoek naar avontuur, beschikt over de wapens en bondgenoten om ze te kunnen verslaan.  Jouw Vault Hunter, jouw speelstijl Word een van de vier unieke Vault Hunters, elk met eigen vaardigheden, speelstijlen, uitgebreide skill trees en legio aanpassingsmogelijkheden. Alle Vault Hunters zijn in hun eentje al in staat om chaos te ontketenen, maar samen zijn ze niet te stoppen.  Moze als DE SOLDAAT: Als Moze versterking nodig heeft, geeft ze digistructies aan haar robot â€“ Iron Bear â€“ om een mokerslag aan extra vuurkracht uit te delen. Amara als DE SIRENE: Een kundige vechtersbaas met zelfvertrouwen, bezit de vaardigheid om hemelse vuisten op te roepen. Met haar Sirene-krachten verplettert Amara haar vijanden. FL4K als de DIERENTEMMER: FL4K leeft om te jagen. Net als de roofdieren die elk bevel van hun meester opvolgen. Hun favoriete prooi? Nietsvermoedende bandieten, die arme sukkels. Zane als de SPION: Zane, een specialist in oorlogsgadgets, is uiterst bedreven in het betreden van een slagveld, het laten ontstaan van chaos, en daarna weer verdwijnen alsof hij er nooit is geweest. Laden, richten en plunderen  Door het bestaan van ontelbare wapens en gadgets is elk gevecht een mogelijkheid om nieuwe uitrusting te scoren. Wapens met schilddragende kogels? Hebben we. Geweren die vuurspuwende vulkanen laten ontstaan? Uiteraard. Geweren die pootjes krijgen en vijanden achtervolgen, terwijl ze hen ook nog verwensingen naroepen? Ja, die zijn er ook.  Nieuwe Borderlands  Ontdek na Pandora nieuwe werelden, elk met unieke omgevingen om te verkennen en vijanden om te vernietigen. Scheur door vijandelijke woestijnen, vind al vechtend je weg in door oorlog verwoeste steden, vaar door dodelijke moerassen, en meer!  Snelle en soepele coÃ¶p-actie  Speel met wie dan ook, wanneer dan ook, online of in split-screen coÃ¶p-modus, ongeacht je level of voortgang. Werk in een team, versla vijanden en voltooi uitdagingen, maar verdien beloningen die alleen voor jou zijn - iedereen ontvangt buit.', '65.00', 11, NULL, 5026555425858, '2019-09-19', 'Gearbox Software', '2K Games'),
(4, 'Call of Duty - Modern Warfare', 'Call of Duty - Modern Warfare', 'Bereid je voor op de terugkeer van Modern Warfare! Kruip in de huid van dodelijke Tier One-operators in een bloedstollend verhaal dat de internationale machtsverhoudingen zal doen kantelen. Nog nooit stond er zo veel op het spel! Infinity Ward, de studio waarmee het allemaal begon, neemt je in Call of Duty: Modern Warfare mee op een ongelooflijk rauw, keihard en provocerend avontuur dat op intense wijze laat zien hoe de moderne oorlogsvoering verandert. De van de eerste tot de laatste pixel opnieuw ontwikkelde game is een epische nieuwe versie van de iconische Modern Warfare-serie. De dramatische gebeurtenissen van het snoeiharde singleplayer verhaal van Call of Duty: Modern Warfare zijn grensverleggend en taboedoorbrekend op een manier die we gewend zijn van Modern Warfare. Stort je op adembenemende geheime operaties met internationale special forces en reis af naar beroemde Europese steden en fictieve conflict gebieden in het Midden-Oosten.  Maar daar eindigt het verhaal niet. In Call of Duty: Modern Warfare kom je in een meeslepend verhaal terecht dat de hele game omvat. In de klassieke multiplayer ga je los op het ultieme online speelterrein, maar je kunt ook samenwerken in een team om eliteoperaties uit te voeren voor elk niveau.  Kruip in de huid van dodelijke Tier One-operators in een bloedstollend, snoeihard singleplayer verhaal vol dramatische gebeurtenissen, dat de internationale machtsverhoudingen zal doen kantelen. Nog nooit stond er zo veel op het spel! Ga los op het ultieme online speelterrein met de klassieke multiplayer. Vorm een team en speel samen eliteoperaties voor elk niveau. Speel cross-platform: PS4-, Xbox One- en pc-spelers kunnen voor het eerst in de geschiedenis van de franchise online tegen elkaar spelen!', '47.00', 11, NULL, 5030917285189, '2019-10-25', 'Infinity Ward', 'Activision'),
(5, 'Cyberpunk 2077', 'Cyberpunk 2077', 'GA ALS OUTLAW OP PAD  Word een cyberpunk; een huurling voorzien van cybernetische uitbreidingen en maak het tot de top van de straten van Night City.  LEEF IN DE STAD VAN DE TOEKOMST  Betreed de open wereld van Night City, de plaats waar nieuwe standaarden worden gezet op gebied van graphics, complexiteit en diepgang.  STEEL HET IMPLANTAAT DAT HET EEUWIGE LEVEN VERLEENT  Neem de meest risicovolle job van je leven aan en ga het prototype-implantaat achterna dat de sleutel is tot onsterfelijkheid.', '65.00', 10, NULL, 3391892006032, '2020-04-16', 'CD Projekt RED', 'Bandai Namco Entertainment'),
(6, 'Dragon Ball Z Kakarot', 'Dragon Ball Z: Kakarot', 'Herbeleef het verhaal van Goku en Z Fighters in DRAGON BALL Z: KAKAROT! Je staat niet enkel op een episch strijdtoneel, maar ervaart ook hoe het is om te leven in de wereld van DRAGON BALL Z terwijl je vecht, vist, eet en traint met Goku, Gohan, Vegeta en anderen karakters. Verken nieuwe gebieden en avonturen naarmate je vordert in het verhaal en smeed sterke banden met andere helden uit de wereld van DRAGON BALL Z.  Dompel je onder in het verhaal van DRAGON BALL Z en beleef zowel epische taferelen als luchtigere zoektochten. Beleef bovendien nooit eerder vertoonde episodes die voor het allereerst een antwoord geven op enkele prangende vragen van Dragon Ball lore! Speel mee in de iconische gevechten van DRAGON BALL Z op een unieke schaal. Vecht over uitgestrekte slagvelden in omgevingen die je kunt vernietigen en ervaar epische eindbaasgevechten tegen de meest iconische vijanden (Raditz, Frieza, Cell enz ...). Die je vechtkunsten op de proef zullen stellen.  Verhoog je niveau via RPG-mechanica en ga de uitdaging aan! Vecht niet gewoon als Z Fighters. Leef als Z Fighters. Vis, vlieg, eet, train en vecht je een weg door de saga\'s van DRAGON BALL Z, maak vrienden en smeed banden met een enorme cast DRAGON BALL-personages.', '65.00', 1, NULL, 3391892005721, '2020-01-17', 'CyberConnect2', 'Bandai Namco Entertainment'),
(7, 'Death Stranding', 'Death Stranding', 'Beleef een avontuur dat je nog nooit eerder hebt gezien â€” van de legendarische game-ontwerper Hideo Kojima. Speel als de alledaagse Sam Bridges terwijl hij het opneemt tegen een dodelijke en mysterieuze wereld waar de dood overal op de loer ligt.  Death Stranding is een unieke en onvergetelijke game met een sterrencast, waaronder Norman Reedus, Mads Mikkelsen, Lindsay Wagner, LÃ©a Seydoux en Guillermo del Toro.', '65.00', 2, NULL, 711719951407, '2019-11-08', 'Kojima Productions', 'Sony'),
(8, 'Doom Eternal', 'Doom Eternal', 'DOOM Eternal, ontwikkeld door id Software, is het vervolg op DOOM, winnaar van The Game Awardsâ€™ Best Action Game uit 2016. Ervaar de ultieme combinatie van snelheid en kracht terwijl je je een weg door verschillende dimensies knalt met de volgende sprong voorwaarts in push-forward first-person combat. DOOM Eternal maakt gebruik van idTech 7 en wordt begeleid door een splinternieuwe zinderende soundrack van Mick Gordon. Je speelt als de onstuitbare DOOM Slayer terwijl je nieuwe en bekende demonen aan stukken schiet met krachtige wapens in ongelofelijke, nooit eerder vertoonde werelden.  Als de DOOM slayer keer je terug en leer je dat de aarde is getroffen door een demonische invasie. Raze Hell en ontdek de oorsprong van de Slayer en zijn voortdurende missie om alles kapot te maken totdat er niks meer over is.  Krijg toegang tot de nieuwste vernietigende technologie met de DOOM Slayerâ€™s geavanceerde Praetor Suit, waaronder een schouderkanon met vlammenwerper en uitschuifbaar DOOM mes. Vernietig elke demon op je pad met een reeks verbeterde geweren en mods, waaronder de nieuwe Meat Hook-uitbreiding voor de Super Shotgun en vaardigheden zoals Double Dash die je sneller en dodelijker maken dan ooit.  Unholy Trinity  Je kan geen demonen vernietigen wanneer je dood bent en je kan niet overleven zonder middelen. Maak Glory Kills voor extra Health, krijg bepantsering door de vlammenwerper te gebruiken en val demonen aan met je kettingzaag om munitie te verzamelen. Deze hulpmiddelen zijn essentieel om te overleven en de ultieme Slayer te worden.  Een nieuwe Demon  Vernietig meer demonen dan ooit tevoren, elk met hun eigen aanvallen en vaardigheden. Populaire klassiekers zoals de Pain Elemental, Archvile en Arachnotron zijn weer terug. Daar komt ook nog eens een horde nieuwe demonen bij, waaronder de DOOM Hunter, Marauder en de Gladiator. Scheur je favoriete demonen uit elkaar met het \'destructible demons\'-systeem van DOOM Eternal en til de demonvernietiging naar nieuwe hoogten.  Demonische Invasie gedetecteerd  Als de Slayer kun je echte spelers toestaan om jouw campaign binnen te vallen als demonen voor dramatische en onvoorspelbare wendingen tijdens het spelen van de campaign. Of word een demon, alleen of met een andere speler, en val de campagne van een andere speler binnen om de Slayer een helse les te leren.  Betreed de BATTLEMODE  BATTLEMODE is de nieuwe 2 vs.1 multiplayer-ervaring helemaal opnieuw gemaakt door id Software. Een volledig bewapende DOOM Slayer neemt het op tegen twee demonen die worden bestuurd door andere spelers. Ga de uitdaging aan in drie rondes van intense first-person gevechten. Binnenkort meer informatie. ', '65.00', 11, NULL, 5055856422679, '2020-03-20', 'id Software', 'Bethesda'),
(9, 'Dying Light 2', 'Dying Light 2', 'Dying Light 2 is een ambitieuze sequel van Techland, een Poolse spelontwikkelaar die bekend werd met succesvolle first person shooters als Call of Juarez, Dead Island en hun doorbraak game uit 2015 Dying Light. De game zal in alle aspecten verbeteren op zijn voorganger.  Chris Avellone, bekend als schrijver voor talloze RPG\'s en videogames. Op zijn palmares staan games als Fallout 2, Fallout-New Vegas, en recentere games als Pillars of Eternity, Prey en een game van Belgische bodem: Divinity Original Sin II. Dat Chris Avellone het team bij Techland ondersteunt is geen toeval. Op narratief vlak probeert Dying Light 2 een nieuwe richting uit te gaan.  Dying Light 2 situeert zich 15 jaar na de gebeurtenissen in de eerste game. Het Harran virus heeft zich verder verspreid over de wereld. Mensen moeten overleven in Moderne Middeleeuwse tijden: water is schaars, districten van steden worden gerund door bendes en dodelijke zombies terroriseren de stad na avondval. In deze barre omstandigheden moet de speler overleven en helpen de stad her op te bouwen. De speler zal verschillende gebeurtenissen in de stad kunnen beÃ¯nvloeden met de keuzes die hij/zij maakt. Beslis je om water te delen met de bendes dan creÃ«er je meer chaos in de straten. Besluit je de bendes hardhandig aan te pakken dan creÃ«er je een politiestaat die met een ijzeren hand heerst. Alle keuzes van de speler zullen een visuele impact hebben van de stad.  Welke beslissing maak jij om de stad te redden?', '65.00', 2, NULL, 1, '2020-06-22', 'Techland', 'Warner Bros Interactive'),
(10, 'Ghost of Tsushima', 'Ghost of Tsushima', 'In Ghost of Tsushima speel je als de gehavende samurai Jin, die tegen een overweldigende overmacht moet zien terug te vechten. Reis door het feodale Japan met een boog op je rug en een katana aan je zijde, versla de indringers en bouw je legende uit als \"the Ghost\"!  Staal en zwaardvechtkunst. Twee belangrijke ingrediÃ«nten voor het overleven van deze kolossale missie in het Japan van 1274, waar het Mongoolse leger het eiland Tsushima heeft veroverd. Trek je pantser aan, scherp je katana bij en haal je pijl-en-boog tevoorschijn als Jin, een door de wol geverfde samoerai die het eiland moet beschermen tegen de meedogenloze Khan en zijn rijk.  Reis door weldadige bamboebossen, bezoek prachtige kastelen, geniet van indrukwekkende landschappen en sla keihard terug om het tij te keren. Kun jij de legendarische \'Geest\' worden in dit bloedige verhaal vol verraad en opoffering, geÃ¯nspireerd door klassieke samoeraiverhalen?  Open-wereld game van Sucker Punch, de makers van de inFAMOUS en Sly Cooper games Voice-acting in zowel Engels als Japans voor de liefhebbers van authenticiteit', '65.00', 2, NULL, 2, '2020-11-19', 'Sucker Punch', 'Sony'),
(11, 'God of War ', 'God of War ', 'De God van de Oorlog is veranderd. Dit is niet de Kratos die je kende.  Een wrede en onbekende wereld wacht op je. Verken een prachtige hervertelling van een klassiek verhaal. Kruip in de huid van Kratos en ga met hem mee op een diepzinnige reis vol groei, geweld en het verlangen om een betere man te worden voor zijn zoon. In een wereld vol monsters, draken en goden is verantwoordelijkheid een zware last. En als je leven gevuld is met bloed en chaos, hoe behoed je de toekomst dan voor de fouten uit je verleden.  Een nieuw tijdperk vol gevaar In deze nieuwe God of War zijn de belangrijkste elementen van de serie op spectaculaire wijze opnieuw vormgegeven; keiharde gevechtsactie, adembenemende graphics en een meeslepende verhaallijn.    Een indrukwekkend nieuw verhaal Kratos is de mentor en beschermer van een zoon die zijn respect probeert te verdienen. Wanneer hij de duistere zijde van zijn nageslacht onderzoekt, krijgt hij onverwacht de kans om zijn ongetemde woede te beteugelen en de tekortkomingen en verschrikkingen uit zijn verleden te compenseren.  Een wereld vol duisternis De game speelt zich af in de ongerepte natuur van wouden en bergen, en in rijken vol Noordse pracht. Bereid je voor op een opvallend nieuwe en gevaarlijke omgeving met een uitgebreid scala aan wezens, monsters en goden.   Kwaadaardige, fysieke gevechtsactie De vrije camera zorgt voor een persoonlijk beeld over de schouder en brengt de woeste, onverschrokken gevechtsactie dichter bij dan ooit. De krachtige magische bijl van Kratos is een wreed wapen dat je ook kunt gebruiken om de omgeving te verkennen. Wees altijd op je hoede. ', '33.00', 2, NULL, 711719963400, '2019-10-12', 'Santa Monica Studios', 'Sony'),
(12, 'Just Dance 2020', 'Just Dance 2020', 'Trommel al je vrienden en familieleden op en dans alsof niemand kijkt met Just Dance 2020! De #1 muziekgamefranchise aller tijden met meer dan 67 miljoen verkochte exemplaren komt dit najaar terug. De nieuwste Just Dance viert 10 jaar samen dansen met 40 monsterhits, betoverende werelden en exclusieve verrassingen voor spelers om te ontdekken!  Voeg je bij een community van meer dan 120 miljoen spelers overal ter wereld en zet de dansvloer in vuur en vlam. Of je nu iets te vieren hebt of gewoon zin hebt om te dansen, Just Dance is er voor elke gelegenheid!  De grote favorieten zijn terug in 2020, samen met 40 nieuwe tophits voor het hele gezin! Van beroemde hits tot grote favorieten voor het hele gezin en van internetfenomenen tot rijzende sterren: Just Dance heeft voor ieder wat wils om op te dansen:  God Is A Woman â€“ Ariana Grande Skibidi â€“ Little Big Vodovorot â€“ XS Project Bangarang â€“ Skrillex ft. Sirah Con Calma - Daddy Yankee Ft. Snow Bad Boy - Riton & Kah-Lo High Hopes â€“ Panic! At The Disco Kill This Love â€“ BLACKPINK Sushi - Merk & Kremont I like It - Cardi B, Bad Bunny & J Balvin Policeman - Eva Simons Ft. Konshens Rain Over Me - Pitbull Ft. Marc Anthony Geniet van creatieve werelden die zijn gemaakt met gloednieuwe productietechnieken zoals je ze nog nooit hebt gezien in Just Dance. Houd bij hoeveel calorieÃ«n je hebt verbrand en hoe lang je al danst en blijf gemotiveerd met de populaire Sweat-modus!  Just Dance 2020 viert een decennium lang samen dansen met spannende, nieuwe content! Duik in de wereld van Just Dance en geniet van 10 jaar speelplezier en eindeloze creativiteit met een digitale verzameling stickers, gebaseerd op 10 jaar Just Dance! Sla de handen ineen met vrienden voor nog meer speelplezier in coÃ¶p, speciaal voor Just Dance 2020. CoÃ¶p brengt spelers dichter bij elkaar om scores te combineren en de dansvloer over te nemen! Zelfs de kleintjes kunnen spelen met de populaire Kids-modus. Dankzij deze speciale spelmodus kunnen ook de allerkleinsten meedoen met 8 nieuwe kindvriendelijke en speciaal uitgezochte nummers voor de leukste danservaring voor kinderen. Met Just Dance Unlimited, de dance-on-demand-streamingservice, heb je toegang tot meer dan 500 nummers en meer! Bij elk exemplaar van het spel krijg je gratis 1 maand toegang!  Word de ster van je eigen show! Just Dance 2020 is persoonlijker dan ooit tevoren dankzij het verbeterde aanbevelingssysteem. Het spel leert jouw dansgewoontes kennen en laat je content zien die perfect bij jou past! Volg je gevoel en kies de perfecte, bestaande afspeellijst die bij jouw stemming past of laat het spel aanbevelingen tonen die op jou zijn afgestemd. Voor elk moment is er een Just Dance-afspeellijst.  Dankzij de intuÃ¯tieve interface kun je je ervaring in een handomdraai aanpassen aan jouw wensen. Kies jouw favorieten uit de voortdurend groeiende Just Dance-catalogus en creÃ«er je eigen playlists voor jouw Just Dance-feestjes! Voetjes van de vloer! Het feest gaat maar door met Just Dance 2020. Neem een kijkje op de verbeterde homepage voor het laatste nieuws over in-game events en meer aanbevelingen voor nummers of afspeellijsten om op te dansen en filmpjes om te bekijken. Breng een bezoekje aan de World Dance Floor voor een online feestje met de Just Dance-community en geniet van thema-events, Happy Hours, toernooien en nieuwe baasfamilies om te verslaan, het hele jaar door! Dans tot je niet meer kunt met Just Dance Unlimited! Er worden gedurende het jaar meer nummers en content toegevoegd om de ervaring in Just Dance 2020 nog beter te maken. Er zijn geen extra accessoires nodig om mee te doen. Gebruik gewoon je smartphone met de Just Dance Controller app! Gebruik je smartphone om in het spel te navigeren en om je moves te volgen en een score te krijgen - zonder camera, Kinect of PS Move! Maximaal 6 spelers kunnen tegelijkertijd spelen met hun telefoon.', '65.00', 7, NULL, 3307216125006, '2019-11-05', 'Ubisoft Paris', 'Ubisoft'),
(13, 'NBA 2K20', 'NBA 2K20', 'De NBA 2K20 Standard Edition bevat de volgende digitale voorwerpen (mogelijk niet aanwezig bij USED-aankoop)  5000 Virtual Currency 5000 MyTEAM-punten 5 MyCAREER Skill Boosts MyPLAYER-kledingcapsule 10 MyTEAM League-packs (Ã©Ã©n per week) 5 Heat Check-packs (Ã©Ã©n per week vanaf de start van het NBA-seizoen) NBA 2K is zoveel meer geworden dan een basketbal-simulatie. NBA 2K20 blijft de grenzen verleggen van wat mogelijk is in sportgames, met de allerbeste graphics en gameplay, baanbrekende speltypen, ongeÃ«venaarde controle en aanpassingsmogelijkheden. Met de meeslepende open wereld van de Neighborhood is NBA 2K20 een platform voor gamers om samen te komen en de toekomst van de basketbal-cultuur vorm te geven.', '22.00', 13, NULL, 5026555426381, '2019-09-06', 'Visual Concepts', '2K Games'),
(14, 'Need for Speed Heat', 'Need for Speed Heat', 'Leef je overdag uit en riskeer het allemaal \'s nachts in Need for Speed â„¢ Heat, een zeer intense race game waarin je het opneemt tegen de kwaadaardige politiemacht van de stad terwijl je je eigen plek veroverd in de straatrace-elite. Overdag neem je deel aan de Speedhunter Showdown - een wedstrijd waarin je punten verdient om je garage met high performance auto\'s te customizen en te upgraden. Wanneer je wagen perfect is vormgegeven en optimaal getuned is, en je klaar bent om de intensiteit op te voeren, rijd je de nacht in waar jij en je bemanning de concurrentie aangaan in illegale straatraces die je reputatie opbouwen en je toegang geven tot grotere races en betere onderdelen. Maar onder de dekking van de duisternis patrouilleert een kwaadaardige strijdmacht die je onderuit wil halen en alles wil afpakken wat je hebt verdiend. Ga de strijd aan en riskeer het allemaal voor ondergrondse glorie of keer terug naar je safehouse en begin aan een nieuwe spannende dag. De wegen, de risico\'s en de wagens eindigen nooit in deze straatrace game waarin je crew flink het gaspedaal intrapt, je garage vol met te gekke auto\'s staat en de stad non-stop jouw speeltuin is.  Neem risicoâ€™s en ga voor je overwinningen Laat je overdag gaan in de Speedhunter Showdown en strijd om punten te verdienen tijdens race-, drift- en off-road evenementen. Neem het \'s nachts op tegen de stad en voer ondergrondse straatraces uit om je reputatie op te bouwen. Pas alleen wel op als het op politie aankomt, want als de zon ondergaat ben je niet de enige die de regels overtreedt. De spanning houdt nooit op terwijl je grote risico\'s loopt die ervoor zorgen die je bloeddruk zullen verhogen.  Wees onhandelbaar, wees expressief Met nog meer opties om je autoâ€™s te customizen en je identiteit achter het stuur tot uiting te laten komen, is dit niet het moment om terughoudend te zijn - wees uniek en zorg ervoor dat iedereen weet wie je bent. En dat betekent ook jouw wagen - stem de prestaties en het rijgedrag van je auto af op jouw stijl, bouw daarna een team van online vrienden op en maak de straten in Palm City onveilig. En als iemand je probeert te stoppen ... dan begint het echte plezier.  Kijk uit voor de politie Je zult je best moeten doen om de politie, die overdag in Palm City patrouilleert, op de kast te jagen. Maar in het donker veranderen de regels wanneer een kwaadaardigere strijdmacht tevoorschijn komt - nu zijn ze op jacht naar jou en je wagen. Duik dieper in het verhaal en neem het op tegen het hoofd van de politie, Lt. Mercer, die een corrupte operatie uitvoert gericht op racers en hun autoâ€™s in beslag neemt voor geld. Nu je in het zicht van Mercer bent, moet je racen om de onjuiste handelingen van de agent aan het licht te brengen, als je enige hoop hebt om in leven te blijven en de elite van straatracen te worden.  Hybrid Description Leef je overdag uit en riskeer het allemaal \'s nachts in Need for Speed â„¢ Heat, een spannende raceervaring waarin je het opneemt tegen de kwaadaardige politiemacht van de stad terwijl je je eigen plek veroverd tussen de straatrace-elite.  Neem risicoâ€™s en ga voor je overwinningen Laat je overdag gaan in de Speedhunter Showdown en strijd om punten te verdienen tijdens race-, drift- en off-road evenementen. Neem het \'s nachts op tegen de stad en voer ondergrondse straatraces uit om je reputatie op te bouwen. Wees onhandelbaar, wees expressief â€“ Met nog meer opties om je autoâ€™s te customizen en je identiteit achter het stuur tot uiting te laten komen, is dit niet het moment om terughoudend te zijn - wees uniek en zorg ervoor dat iedereen weet wie je bent.  Kijk uit voor de politie Je zult je best moeten doen om de politie, die overdag in Palm City patrouilleert, op de kast te jagen. Maar in het donker veranderen de regels wanneer een kwaadaardigere strijdmacht tevoorschijn komt - nu zijn ze op jacht naar jou en je wagen.', '65.00', 9, NULL, 5035223122470, '2019-11-08', 'Ghost', 'EA'),
(15, 'NHL 20', 'NHL 20', 'EA SPORTS NHL 20 introduceert geavanceerde gameplay-innovatie om je vaardigheden te demonstreren, meer aanpassingsmogelijkheden om een eigen stijl te creÃ«ren, en nieuwe modes om met vrienden te spelen.  RPM Tech-gameplay introduceert Signature Shots die de echte schietstijlen van je favoriete NHLspelers tot leven brengen. Meer dan 45 nieuwe schotanimaties maken van elke aanval een bedreiging, en nieuwe passes en puck pick-ups zorgen voor snellere, vloeiende gameplay die op volle snelheid wordt uitgevoerd.  Een vernieuwd broadcast-pakket bevat gloednieuwe beelden en commentaren. In combinatie met meer dan 1100 nieuwe accessoires voor je club en personage zien je grootste goals er ongelooflijk uit tijdens de acties en de hoogtepunten.  Ten slotte voegt NHL 20 drie nieuwe game modes toe. HUT Squad Battles featuren wekelijkse teams, die zijn samengesteld door atleten en artiesten, om je uit te dagen voor unieke beloningen. Het populaire ONES kan nu worden gespeeld met vrienden op de bank, en de gloednieuwe Eliminatormodus in World of CHEL introduceert een winner-take-all competitie waarin jij en je vrienden strijden om te kijken wie er het beste is.  Snelheid en schietacties op basis van RPM Tech   NHL 20 introduceert de volgende grote innovatie in RPM Tech-gameplay met Superstar Signature Shots. Je favoriete NHL-sterren ogen en voelen nu nog authentieker met de kenmerkende schietstijlen die je herkent uit de echte wereld. Daarnaast maken meer dan 45 nieuwe contextgevoelige animaties het schietwerk levendiger, terwijl spelers nieuwe tools gebruiken om de puck in het net te krijgen.  RPM Tech brengt tevens meer snelheid in de gameplay via vernieuwde animatie-overgangen, waarmee spelers schoten, passes en puck pickups kunnen uitvoeren zonder het tempo van een schaatser te vertragen; zodat je snellere, betere en vloeiendere plays neer kunt zetten op het ijs.  Ten slotte bevat de nieuwe keeper-A.I. een complete offensieve dreigingsanalyse, waarmee keepers de positionering en het dreigingsniveau van elke aanval kunnen lezen voordat ze rebounds actief gaan onderdrukken en pucks uit de richting van het gevaar wegschieten.  Een nieuwe generatie ijshockey broadcasting  Een vernieuwd broadcast-pakket zorgt elke play voor gekleurd commentaar op NHL 20, in combinatie met vernieuwde scoreborden, overlays en motion graphics; allemaal samengesteld om jou volledig te laten opgaan in de grootste momenten van het spel. Zie je meest gedenkwaardige plays tot leven komen in nieuwe Play Of The Game-hoogtepunten die zijn bedoeld om je grootste vaardigheden op een voetstuk te plaatsen voor je teamleden en tegenstanders.  Nieuwe modus en nieuwe iconen in Hockey Ultimate Team  Hockey Ultimate Team introduceert een nieuwe manier om te spelen in Squad Battles, de populaire modus van EA SPORTS FIFA waarin je offline wedstrijden kunt spelen om grote beloningen te verdienen. Elke dag worden de tegenstanders vernieuwd, inclusief wekelijkse Featured Squads die zijn samengesteld door NHL-spelers, populaire muziekartiesten, ijshockey influencers en supersteratleten uit andere grote sporten. Squad Battles introduceert een gloednieuwe manier om te spelen en je droomteam op te bouwen, terwijl je het tegen de beste teams opneemt die zijn samengesteld door de grootste namen uit de sport- en entertainmentwereld.  Hockey Ultimate Team verwelkomt tevens een nieuw assortiment speelbare ijshockey-iconen, waardoor het totale aantal verzamel- en speelbare iconen boven de 400 uitkomt.  Nieuwe manieren om met vrienden te spelen  NHL 20 voegt een gloednieuwe competitieve spelmodus toe: Eliminator. Eliminator, dat is geÃ¯nspireerd door de winner-take-all competitie in battle royale, is een nieuwe manier om NHL ONES en NHL THREES te spelen, waarin 81 spelers het tegen elkaar opnemen in een survivaltoernooibracket om tot de ultieme winnaar te worden gekroond. Speel alleen in ONES Eliminator, of werk samen met vrienden in THREES Eliminator terwijl je probeert om vier eliminatierondes achterelkaar te winnen tegen steeds sterkere tegenstanders, zodat je op ultieme wijze de show kunt stelen.  Ook nieuw in NHL 20 is de populaire free-for-all-modus van vorig jaar, ONES, die nu kan worden gespeeld in lokale multiplayer. Jij en twee vrienden kunnen kiezen uit een eliteselectie van je favoriete NHL-spelers, elk met een unieke klasse-speelstijl, om vanuit je luie stoel te strijden op acht buitenbanen in de ultieme partymodus.  Het continu groeiende World of CHEL  Nieuw in World of CHEL zijn CHEL Challenges, wekelijkse in-game evenementen in al je favoriete modes die toegang bieden tot unieke aanpassingsmogelijkheden, personage-XP en nog veel meer. Naast de robuuste opties voor personage-aanpassing die zijn geÃ¯ntroduceerd in NHL 19 biedt World of CHEL nu meer dan 2000 unieke accessoires waarmee je je uiterlijk en speelstijl kunt creÃ«ren: van uitrustingen tot lifestyle-outfits van de grootste ijshockey-merken. Vier nieuwe buitenlocaties voeren je naar nog nooit geziene plassen in de afgelegen wildernis en bekende plekken in steden die zijn geÃ¯nspireerd door iconische locaties. ', '33.00', 13, NULL, 5030947122485, '2019-09-13', 'EA Canada', 'EA'),
(16, 'Star Wars - Jedi Fallen Order', 'Star Wars - Jedi: Fallen Order', 'Er wacht een galactisch avontuur in Star Wars Jedi: Fallen Order, een nieuwe 3rd person action-adventure van Respawn Entertainment. In deze verhaalgedreven singleplayer-game kruip je in de huid van een Jedi Padawan, die ternauwernood is ontsnapt aan de slachting van Order 66 na de gebeurtenissen in Episode 3: Revenge of the Sith. Tijdens een missie om de Jedi-orde opnieuw op te bouwen, zoek je de stukken van je verscheurde verleden bij elkaar om je training te voltooien, nieuwe krachtige Force-vaardigheden te ontwikkelen en de iconische lightsaber te bedwingen, dit allemaal terwijl je de Empire en de dodelijke Inquisitors Ã©Ã©n stap voor blijft.  Terwijl je je vaardigheden onder de knie krijgt, storten spelers zich in filmische lightsaber- en Force-gevechten die net zo intens zijn als de lightsabergevechten uit de Star Wars-films. Spelers moeten hun vijanden strategisch benaderen, sterke en zwakke punten tegen elkaar afzetten en slim gebruikmaken van Jedi-training om de tegenstander te overwinnen en de mysteries op te lossen die je tegenkomt.  Star Wars-fans herkennen iconische locaties, wapens, uitrustingen en vijanden, en maken ook kennis met een selectie nieuwe personages, locaties, monsters, droids en tegenstanders in Star Wars. Als onderdeel van dit authentieke Star Wars-verhaal gaan fans naar een sterrenstelsel dat recentelijk door de Empire is veroverd. Als voormalige Jedi-helden die nu op de vlucht zijn geslagen, moeten spelers vechten om te overleven terwijl ze de mysteries van een lang uitgestorven beschaving verkennen om de restanten van de Jedi-orde te herbouwen terwijl de Empire de Jedi volledig wil wegvagen.  Cinematische, realistische gevechten â€“ Jedi: Fallen Order laat je Jedi-dromen uitkomen via het innovatieve lightsaber-vechtsysteem: val aan, weer af en ontwijk met een pakket krachtige Force-vaardigheden waarvan je moet profiteren om obstakels te overwinnen die in de weg staan. Dit vechtsysteem is intuÃ¯tief, maar als je de nuances onder de knie wilt krijgen, zul je moeten trainen en oefenen terwijl je tijdens het avontuur nieuwe krachten en vaardigheden opdoet. Het begin van een nieuw Jedi-verhaal - Als voormalige Padawan op de vlucht voor de Empire moet je de training voltooien voordat Imperial Inquisitors je plan ontdekken om de Jedi-orde nieuw leven in te blazen. Geholpen door een voormalige Jedi Knight, een weerspannige piloot en een onverschrokken droid moet je ontsnappen aan de boosaardige plannen van de Empire in een verhaalgedreven avontuur. Verken en overwin talloze uitdagingen die zijn gericht op gevechten, verkenning en puzzels. Het heelal wacht - Oude bossen, door de wind geteisterde rotswanden en spookachtige jungles zijn allemaal unieke omgevingen die je in Jedi: Fallen Order zult verkennen, met de vrijheid om te bepalen wanneer en waar je hierna naartoe gaat. Als je nieuwe krachten en vaardigheden vrijspeelt, ontstaan er kansen om op nieuwe manieren door bekende maps te reizen; gebruik de Force om je verkenningsmethoden te verbeteren. Maar wees snel, want de Empire jaagt actief tijdens elke stap die je zet om alle restanten van de Jedi-orde te verdelgen.', '65.00', 1, NULL, 5030935122442, '2019-11-15', 'Respawn Entertainment', 'EA'),
(17, 'Tony Hawk\'s Pro Skater 5', 'Tony Hawk\'s Pro Skater 5', 'Na 13 jaar afwezigheid komt de legendarische Pro Skater-serie van Activision terug met een mix van classic action, nieuwe levels en spannende online play.  Met de release van Tony Hawk\'s Pro Skater 5 is de Birdman terug van weggeweest. De game behoudt de tijdloze, combo-driven energy en strak ontworpen levels van de Pro Skater games en wordt uitgebreid met online gameplay. In Tony Hawk\'s Pro Skater 5 komt de kenmerkende stijl van de orginele Pro Skater games terug in nieuwe levels. Zo ligt de focus weer op uitdagende doelstellingen, perfecte technieken en high-score trucs, waaronder manuals en reverts. Nieuwe items zoals power-ups en projectiles versterken de skateboard ervaring en zorgen voor vernieuwing en extra vermaak. In de nieuwe game scheur je over straat in de gedaante van Ã©Ã©n van de topprofs van het moment, zoals Tony Hawk zelf, Nyjah Huston, Riley Hawk, Aaron \"Jaws\" Homoki, Ishod Wair, Leticia Bufoni, Chris Cole, David Gonzalez, Andrew Reynolds en Lizzie Armanto. Ook is het mogelijk om je eigen personage te creÃ«ren.  Met de online multiplayer laat Tony Hawk\'s Pro Skater 5 het beste van zichzelf zien. Als gamer begin je sessies met vrienden waar ook ter wereld en wanneer je maar wilt. Voltooi missies, ontdek nieuwe content, verbeter je level online of offline of bindt de strijd aan met uitdagers in competitieve wedstrijden. Daarnaast kun je je eigen skatepark bouwen en delen met de community.', '22.00', 13, NULL, 5030917172038, '2010-02-25', 'Activision', 'Activision'),
(18, 'The Last of Us Part II', 'The Last of Us Part II', 'Vijf jaar later...  Na een dodelijke reis door het post-pandemische Amerika besluiten Ellie en Joel neer te strijken in Wyoming.  Het leven in een bloeiende gemeenschap zorgt voor stabiliteit, ondanks de voortdurende bedreiging van geÃ¯nfecteerden en wanhopige overlevenden.  Wanneer een gewelddadige gebeurtenis de vrede verstoort, gaat Ellie op zoek naar gerechtigheid. Tijdens deze reis wordt ze geconfronteerd met de verwoestende lichamelijke en emotionele gevolgen van haar daden.  Beleef een emotioneel verhaal waarin goed en fout soms overlappen. Ga op avontuur in een schitterende maar gevaarlijke wereld, met vredige bergen en overwoekerde ruÃ¯nes. Ervaar de spannende gameplay en zet alles op alles om te overleven met mÃªleegevechten, vloeiende bewegingen en dynamische sluipacties.', '65.00', 2, NULL, 711719340607, '2020-05-29', 'Naughty Dog', 'Sony'),
(19, 'Watch Dogs Legion - Resistance Edition', 'Watch Dogs Legion - Resistance Edition', 'Exemplaar van Watch Dogs Legion Het Resistant Pack: ontgrendel Lynx, een nieuwe hacker met een dierenmasker- en outfit, en krijg een week lang VIP-status om samen met je vrienden sneller XP en valuta te verdienen in de game. In de nabije toekomst gaat Londen haar ondergang tegemoet: het volk wordt onderdrukt door een alziende bewakingsstaat, privÃ©legers beheren de straten en een machtig misdaadsyndicaat heeft het op de zwakken gemunt.  Het is tijd, tijd om Londen terug te nemen! Iedereen die je ontmoet in deze iconische stad kan je rekruteren voor het verzet. Hack, infiltreer en vecht om Londen te bevrijden. Leer de bewoners van Londen kennen en ontdek steeds een uniek verhaal, een eigen persoonlijkheid en unieke vaardigheden. Met de \"Play as Anyone\"-functie heb je volledig de vrijheid om zelf je verhaal te bepalen. Hack bewapende drones, zet spider-bots uit en haal vijanden neer met een Augmented Reality Cloak. Ga op ontdekking in Londen van de nabije toekomst, een massieve open wereld waar je de meest iconische locaties kan bezoeken, net als verschillende leuke activiteiten. Neem je rekruten mee, ga online en team up met je vrienden om missies en de uitdagende endgame content aan te gaan.  Elke keuze die je maakt heeft gevolgen in je verhaal.  Welkom bij het verzet.  DE OPEN WERELD VAN LONDEN - Begeef je in een gigantische open wereld en bezoek een aantal van de bekendste attracties van Londen.  IEDEREEN IS SPEELBAAR - Ervaar een nooit eerder vertoonde gameplay-innovatie. Iedereen die je tegenkomt kan lid worden van je team en heeft een eigen verhaal, persoonlijkheid en unieke vaardigheden.  HACKEN IS JE WAPEN - Gebruik de technische infrastructuur van Londen als wapen. Kaap gewapende gevechtsdrones, zet heimelijke spinrobots in, haal vijanden neer met een Augmented Reality Cloak en nog veel meer.  MAAK EEN GROEP MET JE VRIENDEN - Bundel je krachten online met maximaal drie vrienden. Verken de wereld samen en breng geheel nieuwe coÃ¶pmissies en uitdagende endgamecontent tot een goed eind.', '65.00', 1, NULL, 3, '2020-01-01', 'Ubisoft Toronto', 'Ubisoft');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `image_name`) VALUES
(1, 1, 'fifa20-0.jpg'),
(2, 1, 'fifa20-1.jpg'),
(3, 1, 'fifa20-2.jpg'),
(4, 1, 'fifa20-3.jpg'),
(5, 1, 'fifa20-4.jpg'),
(6, 2, 'Marvel\'s Avengers-0.jpg'),
(7, 2, 'Marvel\'s Avengers-1.jpg'),
(8, 2, 'Marvel\'s Avengers-2.jpg'),
(9, 2, 'Marvel\'s Avengers-3.jpg'),
(10, 2, 'Marvel\'s Avengers-4.jpg'),
(11, 2, 'Marvel\'s Avengers-5.jpg'),
(12, 3, 'Borderlands 3-0.jpg'),
(13, 3, 'Borderlands 3-1.jpg'),
(14, 3, 'Borderlands 3-2.jpg'),
(15, 3, 'Borderlands 3-3.jpg'),
(16, 3, 'Borderlands 3-4.jpg'),
(17, 3, 'Borderlands 3-5.jpg'),
(18, 4, 'Call of Duty - Modern Warfare-0.jpg'),
(19, 4, 'Call of Duty - Modern Warfare-1.jpg'),
(20, 4, 'Call of Duty - Modern Warfare-2.jpg'),
(21, 4, 'Call of Duty - Modern Warfare-3.jpg'),
(22, 4, 'Call of Duty - Modern Warfare-4.jpg'),
(23, 4, 'Call of Duty - Modern Warfare-5.jpg'),
(24, 5, 'Cyberpunk 2077-0.jpg'),
(25, 5, 'Cyberpunk 2077-1.jpg'),
(26, 5, 'Cyberpunk 2077-2.jpg'),
(27, 5, 'Cyberpunk 2077-3.jpg'),
(28, 5, 'Cyberpunk 2077-4.jpg'),
(29, 5, 'Cyberpunk 2077-5.jpg'),
(30, 6, 'Dragon Ball Z Kakarot-0.jpg'),
(31, 6, 'Dragon Ball Z Kakarot-1.jpg'),
(32, 6, 'Dragon Ball Z Kakarot-2.jpg'),
(33, 6, 'Dragon Ball Z Kakarot-3.jpg'),
(34, 6, 'Dragon Ball Z Kakarot-4.jpg'),
(35, 6, 'Dragon Ball Z Kakarot-5.jpg'),
(36, 6, 'Dragon Ball Z Kakarot-6.jpg'),
(37, 7, 'Death Stranding-0.jpg'),
(38, 7, 'Death Stranding-1.jpg'),
(39, 7, 'Death Stranding-2.jpg'),
(40, 7, 'Death Stranding-3.jpg'),
(41, 7, 'Death Stranding-4.jpg'),
(42, 7, 'Death Stranding-5.jpg'),
(43, 7, 'Death Stranding-6.jpg'),
(44, 8, 'Doom Eternal-0.jpg'),
(45, 8, 'Doom Eternal-1.jpg'),
(46, 8, 'Doom Eternal-2.jpg'),
(47, 8, 'Doom Eternal-3.jpg'),
(48, 8, 'Doom Eternal-4.jpg'),
(49, 8, 'Doom Eternal-5.jpg'),
(50, 9, 'Dying Light 2-0.jpg'),
(51, 9, 'Dying Light 2-1.jpg'),
(52, 9, 'Dying Light 2-2.jpg'),
(53, 9, 'Dying Light 2-3.jpg'),
(54, 9, 'Dying Light 2-4.jpg'),
(55, 9, 'Dying Light 2-5.jpg'),
(56, 9, 'Dying Light 2-6.jpg'),
(57, 10, 'Ghost of Tsushima-0.jpg'),
(58, 10, 'Ghost of Tsushima-1.jpg'),
(59, 10, 'Ghost of Tsushima-2.jpg'),
(60, 10, 'Ghost of Tsushima-3.jpg'),
(61, 10, 'Ghost of Tsushima-4.jpg'),
(62, 11, 'God of War -0.jpg'),
(63, 11, 'God of War -1.jpg'),
(64, 11, 'God of War -2.jpg'),
(65, 11, 'God of War -3.jpg'),
(66, 11, 'God of War -4.jpg'),
(67, 11, 'God of War -5.jpg'),
(68, 11, 'God of War -6.jpg'),
(69, 11, 'God of War -7.jpg'),
(70, 12, 'Just Dance 2020-0.jpg'),
(71, 12, 'Just Dance 2020-1.jpg'),
(72, 12, 'Just Dance 2020-2.jpg'),
(73, 12, 'Just Dance 2020-3.jpg'),
(74, 12, 'Just Dance 2020-4.jpg'),
(75, 12, 'Just Dance 2020-5.jpg'),
(76, 13, 'NBA 2K20-0.jpg'),
(77, 13, 'NBA 2K20-1.jpg'),
(78, 13, 'NBA 2K20-2.jpg'),
(79, 13, 'NBA 2K20-3.jpg'),
(80, 13, 'NBA 2K20-4.jpg'),
(81, 13, 'NBA 2K20-5.jpg'),
(82, 13, 'NBA 2K20-6.jpg'),
(83, 14, 'Need for Speed Heat-0.jpg'),
(84, 14, 'Need for Speed Heat-1.jpg'),
(85, 14, 'Need for Speed Heat-2.jpg'),
(86, 14, 'Need for Speed Heat-3.jpg'),
(87, 14, 'Need for Speed Heat-4.jpg'),
(88, 14, 'Need for Speed Heat-5.jpg'),
(89, 15, 'NHL 20-0.jpg'),
(90, 15, 'NHL 20-1.jpg'),
(91, 15, 'NHL 20-2.jpg'),
(92, 15, 'NHL 20-3.jpg'),
(93, 15, 'NHL 20-4.jpg'),
(94, 16, 'Star Wars - Jedi Fallen Order-0.jpg'),
(95, 16, 'Star Wars - Jedi Fallen Order-1.jpg'),
(96, 16, 'Star Wars - Jedi Fallen Order-2.jpg'),
(97, 16, 'Star Wars - Jedi Fallen Order-3.jpg'),
(98, 16, 'Star Wars - Jedi Fallen Order-4.jpg'),
(99, 16, 'Star Wars - Jedi Fallen Order-5.jpg'),
(100, 17, 'Tony Hawk\'s Pro Skater 5-0.jpg'),
(101, 17, 'Tony Hawk\'s Pro Skater 5-1.jpg'),
(102, 17, 'Tony Hawk\'s Pro Skater 5-2.jpg'),
(103, 17, 'Tony Hawk\'s Pro Skater 5-3.jpg'),
(104, 17, 'Tony Hawk\'s Pro Skater 5-4.jpg'),
(105, 17, 'Tony Hawk\'s Pro Skater 5-5.jpg'),
(106, 18, 'The Last of Us Part II-0.jpg'),
(107, 18, 'The Last of Us Part II-1.jpg'),
(108, 18, 'The Last of Us Part II-2.jpg'),
(109, 18, 'The Last of Us Part II-3.jpg'),
(110, 18, 'The Last of Us Part II-4.jpg'),
(111, 18, 'The Last of Us Part II-5.jpg'),
(112, 19, 'Watch Dogs Legion - Resistance Edition-0.jpg'),
(113, 19, 'Watch Dogs Legion - Resistance Edition-1.jpg'),
(114, 19, 'Watch Dogs Legion - Resistance Edition-2.jpg'),
(115, 19, 'Watch Dogs Legion - Resistance Edition-3.jpg'),
(116, 19, 'Watch Dogs Legion - Resistance Edition-4.jpg'),
(117, 19, 'Watch Dogs Legion - Resistance Edition-5.jpg'),
(118, 19, 'Watch Dogs Legion - Resistance Edition-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_specs`
--

DROP TABLE IF EXISTS `product_specs`;
CREATE TABLE IF NOT EXISTS `product_specs` (
  `specs_id` int(11) NOT NULL AUTO_INCREMENT,
  `EAN` int(255) NOT NULL,
  `release_date` date NOT NULL,
  `players_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  `pegi_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `dev_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`specs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
CREATE TABLE IF NOT EXISTS `publishers` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher` varchar(255) NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resetpasswords`
--

DROP TABLE IF EXISTS `resetpasswords`;
CREATE TABLE IF NOT EXISTS `resetpasswords` (
  `reset_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  PRIMARY KEY (`reset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resetpasswords`
--

INSERT INTO `resetpasswords` (`reset_id`, `code`, `user_mail`) VALUES
(1, '15def6d5d7455e', 'gamerzpluswebshop@gmail.com'),
(2, '15def6d7a6598b', 'gamerzpluswebshop@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) NOT NULL,
  `authorisation` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `rolename`, `authorisation`) VALUES
(1, 'admin', 'full'),
(2, 'owner', 'less'),
(3, 'employee', 'lesser'),
(4, 'customer', 'frontend');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE IF NOT EXISTS `shipping_address` (
  `shipping_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`shipping_address_id`),
  KEY `customer_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_address_id`, `user_id`, `address`, `postal`, `city`, `country`) VALUES
(1, 13, 'zz', '55', 'zz', 'zz'),
(2, 13, 'zz', '55', 'zz', 'zz'),
(3, 13, 'zz', '55', 'zz', 'zz'),
(4, 13, 'zz', '55', 'zz', 'zz'),
(5, 13, 'zz', '55', 'zz', 'zz'),
(6, 13, 'zz', '55', 'zz', 'zz'),
(7, 14, 'fff', '111', 'fff', 'Belgium'),
(8, 19, 'hhhhhh', '8888', 'hhhh', 'belgium'),
(9, 20, 'test', '111', 'test', 'test'),
(10, 21, 'T', '8610', 'test', 'Belgium'),
(11, 22, 'Kronevoordestraat 30', '8610', 'test', 'Belgium'),
(12, 23, 'Kronevoordestraat 30', '8610', 'test', 'Belgium'),
(13, 24, 'Kronevoordestraat 30', '8610', 'test', 'Belgium'),
(14, 25, 'j', '1111', 'j', 'sd'),
(15, 26, 'a', '1', 'a', 'a'),
(16, 27, 'Kronevoordestraat 30', '8610', 'test', 'Belgium');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `user_mail`, `user_image`, `role_id`) VALUES
(2, 'SuPeRUsEr', 'super', 'user', 'V1c^q*6BP*8^SO!U6MK!^bIud%fsiJ1$p&nlCHC$oWgLOEVTT2Rbv@Ch@2nCe$nHiJiyP%t&WOg6Q%y2&$Vlv2vr8@7Jfql3U8q', 'gamerzpluswebshop@gmail.com', ' 2020-01-10 14-17-16 gamerzblack.png', 1),
(3, 'j', 'su', 'hhh', 'j', 'jj@jj.com', ' 2020-01-11 17-11-47 images (6).jpg', 4),
(4, 'klaas', 'klaas', 'klaas', 'klaas', 'klaas@klaas.be', ' 2020-01-11 17-26-31 images (5).jpg', 4),
(6, 'ff', 'ff', 'ff', 'ff', 'ff@ff.com', ' 2020-01-11 17-30-19 images (4).jpg', 4),
(8, 'testkl', 'kk', 'kk', 'kk', 'lkkk@dd.com', ' 2020-01-11 17-35-30 images (4).jpg', 4),
(9, 'sze', 'xs', 'xs', 'xs', 'sze@jj.com', ' 2020-01-11 17-40-31 images (5).jpg', 4),
(10, 'hjk', 'kk', 'kk', 'fggg', 'kfgggk@dd.com', ' 2020-01-11 17-57-55 cyberdt.png', 4),
(11, 'jaydee', 'joyce', 'de', 'joyce', 'joyce@jd.be', ' 2020-01-12 13-32-18 images (3).jpg', 4),
(12, 'diesel', 'diesel', 'de', 'diesel', 'diesel@d.com', ' 2020-01-12 13-33-36 Hacking-Illustration.jpg', 4),
(13, 'zzzz', 'zz', 'zz', 'zz', 'zz@zz.com', ' 2020-01-12 13-34-40 cropped-password-hacking.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE IF NOT EXISTS `vouchers` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_code` varchar(255) NOT NULL,
  `voucherdiscount` int(11) DEFAULT NULL,
  `voucherpercent` decimal(3,2) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `voucher_code`, `voucherdiscount`, `voucherpercent`, `active`) VALUES
(1, 'voucherpercent', NULL, '5.00', 1),
(2, 'voucher5euro', 5, NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
