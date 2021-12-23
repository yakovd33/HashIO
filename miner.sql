-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2021 at 05:21 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miner`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `uid`, `type`, `timestamp`) VALUES
(1, 5, 'login', 1519481093),
(2, 5, 'settings', 1519489976),
(3, 5, 'settings', 1519489980),
(4, 5, 'settings', 1519489990),
(5, 5, 'settings', 1519490065),
(6, 5, 'settings', 1519490088),
(7, 5, 'settings', 1519490120),
(8, 6, 'register', 1519498712),
(9, 5, 'login', 1519633378),
(10, 5, 'login', 1519638219),
(11, 5, 'login', 1519638283),
(12, 7, 'register', 1519638918),
(13, 8, 'register', 1519639033),
(14, 9, 'register', 1519639088),
(15, 5, 'login', 1519639664),
(16, 5, 'settings', 1519642549),
(17, 5, 'login', 1519647014),
(18, 5, 'login', 1519647253),
(19, 10, 'register', 1519654651),
(20, 5, 'login', 1519654916),
(21, 10, 'login', 1519657900),
(22, 5, 'login', 1519663353),
(23, 10, 'login', 1519668564),
(24, 5, 'login', 1519668705),
(25, 10, 'login', 1519719328),
(26, 5, 'login', 1519722199),
(27, 5, 'login', 1519738647),
(28, 10, 'login', 1519804879),
(29, 5, 'login', 1519806346),
(30, 10, 'login', 1519806579),
(31, 5, 'login', 1519811114),
(32, 5, 'login', 1519815936),
(33, 5, 'login', 1519819078),
(34, 5, 'login', 1519825387),
(35, 5, 'login', 1519860477),
(36, 5, 'login', 1519930324),
(37, 5, 'login', 1520014491),
(38, 5, 'login', 1520014578),
(39, 5, 'login', 1520016022),
(40, 10, 'login', 1520065543),
(41, 5, 'login', 1520066596),
(42, 5, 'login', 1520072669),
(43, 10, 'login', 1520072795),
(44, 10, 'login', 1520081679),
(45, 10, 'login', 1520084758),
(46, 10, 'login', 1520106340),
(47, 10, 'login', 1520181796),
(48, 5, 'login', 1520193825),
(49, 5, 'login', 1520252817),
(50, 5, 'login', 1520334696),
(51, 11, 'register', 1520342129),
(52, 10, 'login', 1520344938),
(53, 10, 'login', 1520347229),
(54, 5, 'login', 1520357515),
(55, 5, 'login', 1520365326),
(56, 10, 'login', 1520365388),
(57, 5, 'login', 1520419928),
(58, 10, 'login', 1520420223),
(59, 10, 'login', 1520440506),
(60, 5, 'login', 1520543345),
(61, 5, 'login', 1520594715),
(62, 10, 'login', 1520594774),
(63, 10, 'login', 1520778698),
(64, 5, 'login', 1520780032),
(65, 10, 'login', 1520780217),
(66, 10, 'login', 1521120718),
(67, 10, 'login', 1521121640),
(68, 5, 'login', 1521121757),
(69, 11, 'login', 1521121876),
(70, 11, 'login', 1521297967),
(71, 5, 'login', 1521468731),
(72, 10, 'login', 1521471263),
(73, 5, 'settings', 1521471291),
(74, 5, 'settings', 1521471291),
(75, 5, 'login', 1521486170),
(76, 10, 'login', 1521519260),
(77, 10, 'login', 1521568386),
(78, 5, 'login', 1521641654),
(79, 11, 'login', 1521647244),
(80, 5, 'login', 1521712863),
(81, 5, 'login', 1521723139),
(82, 5, 'login', 1521744544),
(83, 5, 'login', 1521745051),
(84, 5, 'login', 1521977710),
(85, 10, 'login', 1522060645),
(86, 11, 'login', 1522066421),
(87, 11, 'login', 1522337309),
(88, 10, 'login', 1522571970),
(89, 10, 'login', 1522605317),
(90, 5, 'login', 1522827272),
(91, 11, 'login', 1523220336),
(92, 11, 'login', 1523295625),
(93, 5, 'login', 1523795031),
(94, 11, 'login', 1523813513),
(95, 11, 'login', 1523879260),
(96, 10, 'login', 1524914052),
(97, 11, 'login', 1525303247),
(98, 10, 'login', 1534754120),
(99, 10, 'login', 1535366241),
(100, 10, 'login', 1640279788);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `price`, `address`) VALUES
(1, 'BTC', 7385, '3NPuZXWgyVEmB2eNHrR8FXhYTKbEFQjVaQ'),
(2, 'ETH', 407, '0xb8c8396aeb142323ee42df5db0482d3943b00cb1'),
(3, 'DASH', 337, 'XiGRtBaezjA8Eqr8GpJD2ma1VLoa6bjL1p'),
(4, 'ZEC', 201, 't1MViaSBWwMfm6nZQYG5xBrWYAfeHmL4AY4');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short`, `img`) VALUES
(1, 'English', 'en', 'http://flags.fmcdn.net/data/flags/w580/us.png'),
(2, 'Hebrew', 'he', 'http://flags.fmcdn.net/data/flags/w580/il.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency` int(2) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `price_usd` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `confirms` int(255) DEFAULT NULL,
  `recived` varchar(255) DEFAULT NULL,
  `timestamp` int(25) NOT NULL,
  `revenue` float NOT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status_text` varchar(255) NOT NULL DEFAULT 'Processing',
  `status` int(1) NOT NULL DEFAULT '0',
  `timeout` int(11) DEFAULT NULL,
  `is_bought_from_balance` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `type_id`, `user_id`, `currency`, `amount`, `price`, `price_usd`, `txn_id`, `confirms`, `recived`, `timestamp`, `revenue`, `qrcode`, `address`, `status_text`, `status`, `timeout`, `is_bought_from_balance`) VALUES
(8, 1, 5, 0, 0, '0.04869565', '560', 'CPCC5AI6WS0XIH2BXDVYOXTFQ4', 0, '', 1520334933, 0, '', '', 'Cancelled / Timed Out', 2, 0, 0),
(9, 1, 5, 0, 0, '0.00173913', '20', 'CPCC6BX6AIT85E5CLH9CGTM6EC', 2, '', 1520335785, 0, '', '', 'Complete', 100, 0, 0),
(15, 1, 5, 0, 0, '0.00173913', '20', 'CPCC4KBHRYGN6F1TZXOE1J14YR', 0, '', 1520365533, 0, '', '', 'Cancelled / Timed Out', 2, 0, 0),
(72, 3, 10, NULL, 10, '0.072387', '0.00086957', 'bfd3870990f5e7b953b325b693912cde', NULL, NULL, 1523881396, 0.0000245245, NULL, NULL, 'Processing', 0, NULL, 1),
(70, 1, 5, NULL, 2500, '19.675', '0.2173913', '043d8285a386b8f036d45704cf47dee3', NULL, NULL, 1521745171, 0.0834834, NULL, NULL, '', 2, NULL, 1),
(71, 2, 11, NULL, 2, '0.01978358954', '0.00019722', '39d9bc54e7e67ee9b1e0f8616a306868', NULL, NULL, 1523813728, 0.00082374, NULL, NULL, 'Processing', 0, NULL, 1),
(68, 1, 5, NULL, 3, '0.021677915', '0.00023952', '133ff73b42014c1f0b6a18e0a9d85ef5', NULL, NULL, 1521744583, 16, NULL, NULL, '', 2, NULL, 1),
(69, 1, 5, NULL, 250, '1.9675', '0.02173913', '4dc6061df5e79023025549bd49d9e031', NULL, NULL, 1521745149, 0.0834834, NULL, NULL, '', 2, NULL, 1),
(65, 1, 10, NULL, 600, '600', '0.05217391', 'da5ba68ed504f9fdfaecbe3872fe9437', NULL, NULL, 1521570334, 15, NULL, NULL, '', 2, NULL, 1),
(66, 1, 11, NULL, 5, '5', '0.00043478', 'e9214e13b5429a8e2b1fea8454982a32', NULL, NULL, 1521712882, 15, NULL, NULL, '', 2, NULL, 1),
(63, 1, 10, NULL, 100, '100', '0.00869565', 'dcccef7269f30eb272b943d29d2e1e00', NULL, NULL, 1521570202, 15, NULL, NULL, '', 2, NULL, 1),
(64, 1, 10, NULL, 100, '100', '0.00869565', 'c35c7d5d53290e5b9ec4928a165bd3de', NULL, NULL, 1521570221, 15, NULL, NULL, '', 2, NULL, 1),
(67, 1, 5, NULL, 3, '0.021677915', '0.00023952', 'faca1aeaecb6e34e968812b5ab28d957', NULL, NULL, 1521744560, 16, NULL, NULL, '', 2, NULL, 1),
(53, 1, 5, 1, 2900, '0.00173913', '20', 'CPCC4A4LL1SSJKGPERSZDVXSFK', 0, '', 1521122517, 15, 'https://www.coinpayments.net/qrgen.php?id=CPCC4A4LL1SSJKGPERSZDVXSFK&key=004158fae4d232889583a3b4f26d7b9b', '3JqdrkimWFPFqp2mM2zrEHc9qjJwwxvGWB', 'Cancelled / Timed Out', 2, 97200, 0),
(54, 1, 11, 2, 2600, '0.00173913', '20', 'CPCC354I7A7WSV5V7QIDTKSWD5', 0, '', 1521122676, 15, 'https://www.coinpayments.net/qrgen.php?id=CPCC354I7A7WSV5V7QIDTKSWD5&key=2016c1212e54b5c25b048d3706da0399', '0x4e29c6ac6f6f529d0cb77861c209d379c1b821dc', 'Cancelled / Timed Out', 2, 86400, 0),
(59, 3, 10, NULL, 100, '100', '0.00869565', '272abdc7a11ee08ca50166c3650e8d20', NULL, NULL, 1521479815, 10, NULL, NULL, '', 2, NULL, 1),
(62, 1, 10, NULL, 100, '100', '0.00869565', '0d94fe22bfb444c7c95e90ee320cf5b7', NULL, NULL, 1521570143, 15, NULL, NULL, '', 2, NULL, 1),
(56, 1, 1, 1, 100, '100', '100', '12312312', NULL, NULL, 1231412, 12, NULL, NULL, '', 2, NULL, 1),
(61, 1, 10, 1, 100, '100', '0.00869565', 'a1e49d81687d5cdb7dbf9b6af63e6d22', NULL, NULL, 1521570125, 15, NULL, NULL, '', 2, NULL, 0),
(73, 2, 10, NULL, 4, '0.03424082805', '0.00034133', '589ebe3aecd4ff535250fbca15a3706c', NULL, NULL, 1640279872, 0.00082374, NULL, NULL, 'Processing', 0, NULL, 1),
(74, 2, 10, NULL, 4, '0.03424082805', '0.00034133', 'd4c05a3b6725d46c4b556a676b63d902', NULL, NULL, 1640279875, 0.00082374, NULL, NULL, 'Processing', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
CREATE TABLE IF NOT EXISTS `payouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `user_id`, `currency_id`, `date`, `amount`) VALUES
(24, 10, 4, '2018-04-01', 0),
(23, 10, 2, '2018-04-01', 17721.1),
(22, 10, 1, '2018-04-01', 0),
(21, 10, 1, '2018-04-01', 15000),
(20, 11, 4, '2018-04-01', 0),
(19, 11, 2, '2018-04-01', 0),
(18, 11, 1, '2018-04-01', 0),
(17, 11, 1, '2018-04-01', 39075),
(16, 5, 4, '2018-04-01', 0),
(15, 5, 2, '2018-04-01', 0),
(14, 5, 1, '2018-04-01', 0),
(13, 5, 1, '2018-04-01', 43825.6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `description`, `value`) VALUES
(1, 'name', 'Site name', 'HashIO'),
(2, 'desc', 'Site description', 'Buy your hashrate now'),
(3, 'min_withdraw', 'Minimum withdraw', '0.5'),
(4, 'coinpayments_public', 'Coinpayments public API Key', 'ad326c6c4108fb8b98164f1a0f22ccf5b76a5cd3'),
(5, 'coinpayments_private', 'Coinpayments private API Key', 'A4A855f6B6c72666E531d4555fba1CD5933671f5');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `thousand` varchar(15) NOT NULL,
  `price` double NOT NULL,
  `unit_name` varchar(10) NOT NULL,
  `revenue` float NOT NULL,
  `shortname` varchar(99) NOT NULL,
  `revenue_currency` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `unit`, `thousand`, `price`, `unit_name`, `revenue`, `shortname`, `revenue_currency`) VALUES
(1, 'SHA-256', 'GH/s', 'TH/s', 0.00787, 'giga', 0.0834834, 'sha', 1),
(2, 'Scrypt', 'MH/s', 'GH/s', 0.008723, 'mega', 0.00082374, 'scrypt', 1),
(3, 'ETHASH', 'KH/s', 'MH/s', 0.0072387, 'kilo', 0.0000245245, 'ethash', 2),
(4, 'EQUIHASH', 'mH/s', 'GH/s', 0.008273, 'mega', 0.000347348, 'equihash', 4);

-- --------------------------------------------------------

--
-- Table structure for table `types_revenues`
--

DROP TABLE IF EXISTS `types_revenues`;
CREATE TABLE IF NOT EXISTS `types_revenues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `revenue` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types_revenues`
--

INSERT INTO `types_revenues` (`id`, `type_id`, `date`, `revenue`) VALUES
(1, 1, '2018-02-27', 9),
(2, 1, '2018-02-28', 10),
(3, 1, '2018-03-01', 9),
(4, 1, '2018-03-02', 8),
(5, 1, '2018-03-03', 11),
(6, 2, '2018-02-27', 9),
(7, 2, '2018-02-28', 10),
(8, 2, '2018-03-01', 9),
(9, 2, '2018-03-02', 8),
(10, 2, '2018-03-03', 11),
(11, 3, '2018-02-27', 9),
(12, 3, '2018-02-28', 10),
(13, 3, '2018-03-01', 9),
(14, 3, '2018-03-02', 8),
(15, 3, '2018-03-03', 11),
(16, 4, '2018-02-27', 9),
(17, 4, '2018-02-28', 10),
(18, 4, '2018-03-01', 9),
(19, 4, '2018-03-02', 8),
(20, 4, '2018-03-03', 11),
(25, 1, '2018-03-06', 15),
(26, 2, '2018-03-06', 14),
(27, 3, '2018-03-06', 10),
(28, 4, '2018-03-06', 18),
(55, 3, '2018-03-19', 10),
(54, 2, '2018-03-19', 14),
(53, 1, '2018-03-19', 15),
(49, 1, '2018-03-10', 15),
(50, 2, '2018-03-10', 14),
(51, 3, '2018-03-10', 10),
(52, 4, '2018-03-10', 18),
(44, 4, '2018-03-09', 18),
(43, 3, '2018-03-09', 10),
(42, 2, '2018-03-09', 14),
(41, 1, '2018-03-09', 15),
(40, 4, '0000-00-00', 18),
(56, 4, '2018-03-19', 18),
(57, 1, '2018-03-19', 15),
(58, 2, '2018-03-19', 14),
(59, 3, '2018-03-19', 10),
(60, 4, '2018-03-19', 18),
(61, 1, '2018-03-19', 15),
(62, 2, '2018-03-19', 14),
(63, 3, '2018-03-19', 10),
(64, 4, '2018-03-19', 18),
(65, 1, '2018-03-19', 15),
(66, 2, '2018-03-19', 14),
(67, 3, '2018-03-19', 10),
(68, 4, '2018-03-19', 18),
(69, 1, '2018-03-19', 15),
(70, 2, '2018-03-19', 14),
(71, 3, '2018-03-19', 10),
(72, 4, '2018-03-19', 18),
(73, 1, '2018-03-19', 15),
(74, 2, '2018-03-19', 14),
(75, 3, '2018-03-19', 10),
(76, 4, '2018-03-19', 18),
(77, 1, '2018-03-19', 15),
(78, 2, '2018-03-19', 14),
(79, 3, '2018-03-19', 10),
(80, 4, '2018-03-19', 18),
(81, 1, '2018-03-19', 15),
(82, 2, '2018-03-19', 14),
(83, 3, '2018-03-19', 10),
(84, 4, '2018-03-19', 18),
(85, 1, '2018-04-01', 0.0834834),
(86, 2, '2018-04-01', 0.00082374),
(87, 3, '2018-04-01', 0.0000245245),
(88, 4, '2018-04-01', 0.000347348),
(89, 1, '2018-04-01', 0.0834834),
(90, 2, '2018-04-01', 0.00082374),
(91, 3, '2018-04-01', 0.0000245245),
(92, 4, '2018-04-01', 0.000347348),
(93, 1, '2018-04-01', 0.0834834),
(94, 2, '2018-04-01', 0.00082374),
(95, 3, '2018-04-01', 0.0000245245),
(96, 4, '2018-04-01', 0.000347348),
(97, 1, '2018-04-01', 0.0834834),
(98, 2, '2018-04-01', 0.00082374),
(99, 3, '2018-04-01', 0.0000245245),
(100, 4, '2018-04-01', 0.000347348),
(101, 1, '2018-04-01', 0.0834834),
(102, 2, '2018-04-01', 0.00082374),
(103, 3, '2018-04-01', 0.0000245245),
(104, 4, '2018-04-01', 0.000347348),
(105, 1, '2018-04-01', 0.0834834),
(106, 2, '2018-04-01', 0.00082374),
(107, 3, '2018-04-01', 0.0000245245),
(108, 4, '2018-04-01', 0.000347348),
(109, 1, '2018-04-01', 0.0834834),
(110, 2, '2018-04-01', 0.00082374),
(111, 3, '2018-04-01', 0.0000245245),
(112, 4, '2018-04-01', 0.000347348),
(113, 1, '2018-04-01', 0.0834834),
(114, 2, '2018-04-01', 0.00082374),
(115, 3, '2018-04-01', 0.0000245245),
(116, 4, '2018-04-01', 0.000347348),
(117, 1, '2018-04-01', 0.0834834),
(118, 2, '2018-04-01', 0.00082374),
(119, 3, '2018-04-01', 0.0000245245),
(120, 4, '2018-04-01', 0.000347348),
(121, 1, '2018-04-01', 0.0834834),
(122, 2, '2018-04-01', 0.00082374),
(123, 3, '2018-04-01', 0.0000245245),
(124, 4, '2018-04-01', 0.000347348),
(125, 1, '2018-04-01', 0.0834834),
(126, 2, '2018-04-01', 0.00082374),
(127, 3, '2018-04-01', 0.0000245245),
(128, 4, '2018-04-01', 0.000347348),
(129, 1, '2018-04-01', 0.0834834),
(130, 2, '2018-04-01', 0.00082374),
(131, 3, '2018-04-01', 0.0000245245),
(132, 4, '2018-04-01', 0.000347348),
(133, 1, '2018-04-01', 0.0834834),
(134, 2, '2018-04-01', 0.00082374),
(135, 3, '2018-04-01', 0.0000245245),
(136, 4, '2018-04-01', 0.000347348),
(137, 1, '2018-04-01', 0.0834834),
(138, 2, '2018-04-01', 0.00082374),
(139, 3, '2018-04-01', 0.0000245245),
(140, 4, '2018-04-01', 0.000347348),
(141, 1, '2018-04-01', 0.0834834),
(142, 2, '2018-04-01', 0.00082374),
(143, 3, '2018-04-01', 0.0000245245),
(144, 4, '2018-04-01', 0.000347348),
(145, 1, '2018-04-01', 0.0834834),
(146, 2, '2018-04-01', 0.00082374),
(147, 3, '2018-04-01', 0.0000245245),
(148, 4, '2018-04-01', 0.000347348),
(149, 1, '2018-04-01', 0.0834834),
(150, 2, '2018-04-01', 0.00082374),
(151, 3, '2018-04-01', 0.0000245245),
(152, 4, '2018-04-01', 0.000347348),
(153, 1, '2018-04-01', 0.0834834),
(154, 2, '2018-04-01', 0.00082374),
(155, 3, '2018-04-01', 0.0000245245),
(156, 4, '2018-04-01', 0.000347348),
(157, 1, '2018-04-01', 0.0834834),
(158, 2, '2018-04-01', 0.00082374),
(159, 3, '2018-04-01', 0.0000245245),
(160, 4, '2018-04-01', 0.000347348),
(161, 1, '2018-04-01', 0.0834834),
(162, 2, '2018-04-01', 0.00082374),
(163, 3, '2018-04-01', 0.0000245245),
(164, 4, '2018-04-01', 0.000347348),
(165, 1, '2018-04-01', 0.0834834),
(166, 2, '2018-04-01', 0.00082374),
(167, 3, '2018-04-01', 0.0000245245),
(168, 4, '2018-04-01', 0.000347348),
(169, 1, '2018-04-01', 0.0834834),
(170, 2, '2018-04-01', 0.00082374),
(171, 3, '2018-04-01', 0.0000245245),
(172, 4, '2018-04-01', 0.000347348),
(173, 1, '2018-04-01', 0.0834834),
(174, 2, '2018-04-01', 0.00082374),
(175, 3, '2018-04-01', 0.0000245245),
(176, 4, '2018-04-01', 0.000347348),
(177, 1, '2018-04-01', 0.0834834),
(178, 2, '2018-04-01', 0.00082374),
(179, 3, '2018-04-01', 0.0000245245),
(180, 4, '2018-04-01', 0.000347348);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) DEFAULT '1',
  `balance` varchar(30) NOT NULL DEFAULT '0.00',
  `country` varchar(255) NOT NULL,
  `bday` int(10) NOT NULL,
  `bmonth` int(10) NOT NULL,
  `byear` int(10) NOT NULL,
  `btc` varchar(255) NOT NULL,
  `eth` varchar(255) NOT NULL,
  `dash` varchar(255) NOT NULL,
  `zec` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `VAT` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `post_code` varchar(25) NOT NULL,
  `phone_extension` int(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `registerd_at` int(255) NOT NULL,
  `logged_at` int(255) NOT NULL,
  `last_activity` int(255) NOT NULL,
  `btc_balance` float DEFAULT '0',
  `eth_balance` float DEFAULT '0',
  `dash_balance` float DEFAULT '0',
  `zec_balance` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `level`, `balance`, `country`, `bday`, `bmonth`, `byear`, `btc`, `eth`, `dash`, `zec`, `company`, `company_code`, `VAT`, `address`, `address2`, `city`, `region`, `post_code`, `phone_extension`, `phone_number`, `registerd_at`, `logged_at`, `last_activity`, `btc_balance`, `eth_balance`, `dash_balance`, `zec_balance`) VALUES
(5, 'Maor', 'Ben Lulu', 'kingplease9@gmail.com', '669cab6d33eca6e9c4a6a6609b0c5ebb', 2, '86204.95664416999', 'IL', 30, 9, 1999, '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', 'Golstar LTD', '234235', '298329872', 'Shitrit', '', 'Beer sheva', 'hadram', '84834', 972, 526837443, 1519427877, 1523795031, 1523797384, 0, 71245.8, 0, 0),
(11, 'alex', 'alex', 'alex@alex.com', 'a39e3064a9e52b1422dd254dd9675a85', 2, '77199.98021641046', 'AU', 15, 2, 1980, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 1520342129, 1525303247, 1525303429, 0, 71245.8, 0, 0),
(10, 'Yakov', 'Shitrit', 'yakovd33@gmail.com', '533e12c0697f634ca9e56960d241839f', 2, '15628.4493419839', 'IL', 9, 11, 2000, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 1519654651, 1640279788, 1640279949, 0, 71245.8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_daily_currencies_balances`
--

DROP TABLE IF EXISTS `user_daily_currencies_balances`;
CREATE TABLE IF NOT EXISTS `user_daily_currencies_balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_daily_currencies_balances`
--

INSERT INTO `user_daily_currencies_balances` (`id`, `user_id`, `currency_id`, `balance`, `date`) VALUES
(26, 10, 4, 0, '2018-04-01'),
(25, 10, 2, 35767.4, '2018-04-01'),
(24, 10, 1, 0, '2018-04-01'),
(23, 10, 1, 15000, '2018-04-01'),
(22, 11, 4, 0, '2018-04-01'),
(21, 11, 2, 17877, '2018-04-01'),
(20, 11, 1, 0, '2018-04-01'),
(19, 11, 1, 39075, '2018-04-01'),
(18, 5, 4, 0, '2018-04-01'),
(17, 5, 2, 17877, '2018-04-01'),
(16, 5, 1, 0, '2018-04-01'),
(15, 5, 1, 43825.6, '2018-04-01'),
(27, 5, 1, 43825.6, '2018-04-01'),
(28, 5, 1, 0, '2018-04-01'),
(29, 5, 2, 35767.4, '2018-04-01'),
(30, 5, 4, 0, '2018-04-01'),
(31, 11, 1, 39075, '2018-04-01'),
(32, 11, 1, 0, '2018-04-01'),
(33, 11, 2, 35767.4, '2018-04-01'),
(34, 11, 4, 0, '2018-04-01'),
(35, 10, 1, 15000, '2018-04-01'),
(36, 10, 1, 0, '2018-04-01'),
(37, 10, 2, 53524.7, '2018-04-01'),
(38, 10, 4, 0, '2018-04-01'),
(39, 5, 1, 43825.6, '2018-04-01'),
(40, 5, 1, 0, '2018-04-01'),
(41, 5, 2, 53524.7, '2018-04-01'),
(42, 5, 4, 0, '2018-04-01'),
(43, 11, 1, 39075, '2018-04-01'),
(44, 11, 1, 0, '2018-04-01'),
(45, 11, 2, 53524.7, '2018-04-01'),
(46, 11, 4, 0, '2018-04-01'),
(47, 10, 1, 15000, '2018-04-01'),
(48, 10, 1, 0, '2018-04-01'),
(49, 10, 2, 71245.8, '2018-04-01'),
(50, 10, 4, 0, '2018-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

DROP TABLE IF EXISTS `withdraw_requests`;
CREATE TABLE IF NOT EXISTS `withdraw_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `approved` int(2) NOT NULL DEFAULT '0',
  `timestamp` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdraw_requests`
--

INSERT INTO `withdraw_requests` (`id`, `uid`, `amount`, `currency`, `approved`, `timestamp`) VALUES
(12, 5, '2', 'btc', 0, 1519643319),
(11, 5, '3', 'btc', 0, 1519643304),
(15, 10, '699', 'zec', 0, 1520780420),
(14, 10, '700', 'dash', 0, 1520780373),
(16, 10, '699', 'zec', 0, 1520780420),
(17, 10, '699', 'zec', 0, 1520780420),
(18, 10, '700', 'dash', 0, 1520780373),
(19, 10, '699', 'zec', 0, 1520780420),
(20, 10, '699', 'zec', 0, 1520780420),
(21, 10, '700', 'dash', 0, 1520780373),
(22, 10, '699', 'zec', 0, 1520780420),
(23, 10, '699', 'zec', 0, 1520780420),
(24, 10, '700', 'dash', 0, 1520780373),
(25, 10, '699', 'zec', 0, 1520780420);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
