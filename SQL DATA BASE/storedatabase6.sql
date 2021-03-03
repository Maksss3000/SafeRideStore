-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedatabase6`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(10) UNSIGNED NOT NULL,
  `totalPrice` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(20) NOT NULL,
  `totalAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `totalPrice`, `userName`, `totalAmount`) VALUES
(22, 25, 'admin', 294),
(27, 0, 'user', 670),
(28, 0, 'user2', 0),
(29, 0, 'K_REKER', 720),
(30, 0, 'b999', 0),
(31, 0, 'a1', 0),
(32, 0, 'b1', 0),
(33, 0, 'a1', 0),
(34, 0, 'a1', 0),
(35, 0, 'a1', 0),
(36, 0, 'a1', 0),
(37, 0, 'b1', 0),
(38, 0, 'aa1', 0),
(39, 0, 'bb2', 0),
(40, 0, 'a111', 0),
(41, 0, 'a434', 0),
(42, 0, 'abc', 0),
(43, 0, 'abc', 0),
(44, 0, 'avb', 0),
(45, 0, 'abc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cartId` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `addedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userName`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `address`, `zipCode`, `city`, `cartId`, `role`, `addedAt`) VALUES
('admin', 'alex', 'tsiganenko', 'alextsi037@gmail.com', '$2y$10$.EL5AazKCyuD1YFQz3GHgOHyAqxWBnaOBb3HnX1kfD8iIJKWMiqaK', '0528426226', 'Yoav 7/5', '4542546', 'Haifa', 22, 'admin', '2020-10-21 16:43:51'),
('K_REKER', 'Maksimilian', 'Raykhman', 'K_REKER@inbo.xlv', '$2y$10$f4DzWSQ6Pda1rt1XC19KD.mg6dpY3LlQvoTXM2b7sXvk1XEFrMOIW', 'Haifa Bordetsky 55', '13232', 'Haifa', '050-42-38-317', 29, 'user', '2020-12-26 12:44:47'),
('user', 'Саня', 'Цыганенко', 'user@gmail.com', '$2y$10$KOtCdpot3Q6a.JcocdKuFep/ioM6FESwhdGT8aCFs2ZpLc8SZ46u2', 'Yoav 7/5', '454254', 'Haifa', '0528426226', 27, 'user', '2020-10-21 22:53:55'),
('user2', 'vasya', 'pupkin', 'asas@gmail.com', '$2y$10$A2r7CZ8xi5Tw..iBslhNAOKV1D8klX9JwELlcijMHrQbHD.HuquFW', 'street 3/4', '324243', 'haifa', '0528426226', 28, 'user', '2020-09-21 22:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `inStockId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `size` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_stock`
--

INSERT INTO `in_stock` (`inStockId`, `productId`, `size`, `color`, `amount`) VALUES
(1, 11111, 'large', 'Pink', 0),
(2, 11112, 'large', 'Red', 13),
(3, 11112, 'medium', 'Black', 4),
(6, 11111, 'small', 'Red', 5),
(7, 11111, 'small', 'Pink', 6),
(11, 69, 'small', 'Red', 4),
(12, 69, 'medium', 'Red', 8),
(13, 69, 'large', 'Red', 2),
(14, 69, 'small', 'Pink', 1),
(15, 69, 'large', 'Pink', 2),
(16, 26, 'small', 'Red', 8),
(17, 26, 'small', 'Pink', 3),
(18, 26, 'medium', 'Red', 1),
(19, 26, 'medium', 'Pink', 1),
(20, 20, 'small', 'Red', 18),
(21, 21, 'small', 'Red', 27),
(22, 21, 'medium', 'Red', 4),
(23, 21, 'small', 'Pink', 16),
(24, 21, 'large', 'Red', 4),
(25, 21, 'large', 'Pink', 2),
(26, 22, 'small', 'Red', 12),
(27, 10, 'large', 'Red', 41),
(28, 12, 'small', 'Red', 7),
(29, 12, 'small', 'Pink', 3),
(30, 12, 'medium', 'Red', 2),
(31, 12, 'large', 'Red', 1),
(32, 13, 'small', 'Red', 9),
(33, 13, 'small', 'Pink', 4),
(34, 13, 'medium', 'Red', 7),
(35, 13, 'large', 'Red', 11),
(36, 13, 'medium', 'Pink', 2),
(37, 13, 'large', 'Pink', 2),
(40, 60, 'large', 'Red', 6),
(41, 10, 'small', 'Red', 23),
(42, 10, 'medium', 'Red', 23),
(43, 10, 'medium', 'Pink', 23),
(44, 11, 'small', 'Red', 2),
(45, 11112, 'small', 'Pink', 7),
(46, 11112, 'small', 'Yellow', 6),
(47, 11112, 'large', 'Pink', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `txnId` varchar(255) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalAmount` int(11) NOT NULL,
  `orderStatus` varchar(255) NOT NULL DEFAULT 'new order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userName`, `paymentStatus`, `txnId`, `orderDate`, `totalAmount`, `orderStatus`) VALUES
(1, 'user', 'payed', '34567890', '2020-10-05 08:11:55', 546, 'in process'),
(2, 'user', 'payed', '3424523523', '2020-10-09 09:24:30', 456, 'new order'),
(3, 'user', 'payed', '3424523523', '2020-10-10 09:24:32', 456, 'new order'),
(4, 'user', 'payed', '23452523', '2020-10-11 09:24:57', 678, 'new order'),
(5, 'user', 'payed', '23452523', '2020-10-12 09:25:00', 678, 'new order');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `category` varchar(30) NOT NULL,
  `subCategory` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) UNSIGNED NOT NULL,
  `imgPath` varchar(512) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `discount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `category`, `subCategory`, `price`, `amount`, `imgPath`, `brand`, `discount`) VALUES
(10, 'Bell MX-9 Adventure MIPS DLX     ', 'helmet', 'Dual Sport', 180, 10, '/SafeRideStore/public/images/products/Bell/Dual Sport/10.jpg', 'Bell', 0),
(11, 'Shoei Hornet X2 - Solid', 'helmet', 'Dual Sport', 300, 10, '/SafeRideStore/public/images/products/shoei/dual sport/shoeiDualSport.jpg', 'SHOEI', 5),
(12, 'LS2 Pioneer V2 Element Helmet', 'helmet', 'Dual Sport', 160, 10, '/SafeRideStore/public/images/products/ls2/dual sport/ls2DualSport.jpg', 'LS2', 5),
(13, 'Shoei Hornet X2 Navigate ', 'helmet', 'Dual Sport', 500, 10, '/SafeRideStore/public/images/products/shoei/dual sport/shoeiDualSport2.jpg', 'SHOEI', 5),
(15, 'LS2 Ohm Black', 'helmet', 'Dual Sport', 150, 10, '/SafeRideStore/public/images/products/LS2/Dual Sport/LS2Ohm.jpg', 'LS2', 5),
(20, 'Icon Variant Pro Construct ', 'helmet', 'Dual Sport', 350, 10, '/SafeRideStore/public/images/products/icon/dual sport/IconDualSport.jpg', 'Icon', 5),
(21, 'Alpinestars Supertech M10 Carb', 'helmet', 'Dirt', 550, 10, '/SafeRideStore/public/images/products/alpinestars/Dirt/alpinestarsDirt.jpg', 'Alpinestars', 5),
(22, 'Alpinestars Supertech M10 Carb', 'helmet', 'Dirt', 600, 10, '/SafeRideStore/public/images/products/alpinestars/dirt/alpDirt.jpg', 'Alpinestars', 5),
(23, 'Bell Moto-9 MIPS Fasthouse    ', 'helmet', 'Dirt', 280, 10, '/SafeRideStore/public/images/products/Bell/Dirt/23.jpg', 'Bell', 1.78571),
(24, 'Bell Moto-9 MIPS Tomac Eagle', 'helmet', 'Dirt', 270, 10, '/SafeRideStore/public/images/products/bell/dirt/belldirt2.jpg', 'Bell', 1.85185),
(26, 'LS2 Subverter Straight Helmet', 'helmet', 'Dirt', 245, 10, '/SafeRideStore/public/images/products/ls2/dirt/ls2Dirt.jpg', 'LS2', 5),
(30, 'LS2 Subverter Supercollider He', 'helmet', 'Dirt', 300, 10, '/SafeRideStore/public/images/products/LS2/Dirt/ls2Dirt2.jpg', 'LS2', 5),
(35, 'Bell Pit Boss Helmet - Solid', 'helmet', 'Half', 200, 10, '/SafeRideStore/public/images/products/Bell/Half/bellHalf.jpg', 'Bell', 2.5),
(50, 'Alpinestars Viper v2 Air Jacket          ', 'protection', 'jackets', 200, 5, '/SafeRideStore/public/images/products/RidingGear/jackets/50.jpg', 'Alpinestars', 0),
(51, 'REV\'IT -  Wind Jacket', 'protection', 'jackets', 255, 5, '/SafeRideStore/public/images/products/RidingGear/Jackets/revit.jpg', 'revit', 0),
(52, 'Alpinestars Andes Honda Jacket', 'protection', 'jackets', 350, 5, '/SafeRideStore/public/images/products/RidingGear/Jackets/alp2.jpg', 'Alpinestars', 0),
(53, 'REV\'IT - Vertex Air Jacket', 'protection', 'jackets', 250, 5, '/SafeRideStore/public/images/products/RidingGear/Jackets/rev2.jpg', 'Revit', 0),
(54, 'Dainese Air Frame D1 Jacket', 'protection', 'jackets', 400, 5, '/SafeRideStore/public/images/products/RidingGear/Jackets/dain.jpg', 'Dainese', 0),
(55, 'Icon Wireform Jacket', 'protection', 'jackets', 350, 5, '/SafeRideStore/public/images/products/RidingGear/Jackets/icon.jpg', 'Icon', 0),
(56, 'Alpinestars GP Plus R Gloves', 'protection', 'gloves', 135, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/alp.jpg', 'Alpinestars', 0),
(59, 'Sedici Castro Gloves', 'protection', 'gloves', 75, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/sed.jpg', 'Sedici', 0),
(60, 'Dainese Steel Pro Gloves', 'protection', 'gloves', 220, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/dain.jpg', 'Dainese', 0),
(61, 'Joe Rocket Flexium TX Gloves', 'protection', 'gloves', 310, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/joe.jpg', 'Joe', 0),
(62, 'Dainese Druid 3 Gloves', 'protection', 'gloves', 200, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/dain2.jpg', 'Dainese', 0),
(63, 'Spidi G-Carbon Gloves', 'protection', 'gloves', 100, 5, '/SafeRideStore/public/images/products/RidingGear/Gloves/spidi.jpg', 'Spidi', 0),
(66, 'Bell Rogue Honor Helmet', 'helmet', 'Half', 250, 10, '/SafeRideStore/public/images/products/Bell/Half/bellHalf2.jpg', 'Bell', 2),
(67, 'LS2 Rebellion Bones Helmet', 'helmet', 'Half', 150, 10, '/SafeRideStore/public/images/products/LS2/Half/ls2Half.jpg', 'LS2', 5),
(68, 'LS2 Bagger Helmet', 'helmet', 'Half', 145, 10, '/SafeRideStore/public/images/products/LS2/Half/ls2Half2.jpg', 'LS2', 5),
(69, 'Bell Pit Boss Flames Helmet', 'helmet', 'Half', 125, 10, '/SafeRideStore/public/images/products/Bell/Half/bellHalf3.jpg', 'Bell', 4),
(75, 'AGV X70 Trofeo Helmet', 'helmet', 'OpenFace', 100, 10, '/SafeRideStore/public/images/products/Agv/OpenFace/agvOpenFace.jpg', 'AGV', 5),
(77, 'Arai Classic-V Helmet', 'helmet', 'OpenFace', 470, 10, '/SafeRideStore/public/images/products/Arai/OpenFace/araiOpenFace.jpg', 'Arai', 5),
(88, 'Bell Recon Asphalt Helmet - Ma', 'helmet', 'Half', 125, 10, '/SafeRideStore/public/images/products/Bell/Half/bellHalf4.jpg', 'Bell', 4),
(101, 'Shark Street Drak Zarco Malays', 'helmet', 'OpenFace', 345, 10, '/SafeRideStore/public/images/products/Shark/OpenFace/sharkOpenFace.jpg', 'Shark', 5),
(102, 'Shark S-Drak Carbon Helmet', 'helmet', 'OpenFace', 270, 10, '/SafeRideStore/public/images/products/Shark/OpenFace/sharkOpenFace2.jpg', 'Shark', 5),
(104, 'LS2 Spitfire Skull Rider Helme', 'helmet', 'OpenFace', 150, 10, '/SafeRideStore/public/images/products/LS2/OpenFace/ls2OpenFace.jpg', 'LS2', 5),
(106, 'Bell Custom 500 Rally Helmet', 'helmet', 'OpenFace', 165, 10, '/SafeRideStore/public/images/products/Bell/OpenFace/bellOpenFace.jpg', 'Bell', 3.0303),
(200, 'Sedici Ultimo Boots', 'protection', 'boots', 400, 6, '/SafeRideStore/public/images/products/RidingGear/Boots/sedici.jpg', 'Sedici', 0),
(201, 'Alpinestars SMX 6 v2 Gore-Tex ', 'protection', 'boots', 350, 6, '/SafeRideStore/public/images/products/RidingGear/Boots/alp.jpg', 'Alpinestars', 0),
(202, 'SIDI Rex Air Boots', 'protection', 'boots', 500, 5, '/SafeRideStore/public/images/products/RidingGear/Boots/sidi.jpg', 'Sidi', 0),
(203, 'Dainese Torque 3 Air Out Boots', 'protection', 'boots', 450, 5, '/SafeRideStore/public/images/products/RidingGear/Boots/dain.jpg', 'Dainese', 0),
(204, 'Forma Ice Pro Boots', 'protection', 'boots', 345, 5, '/SafeRideStore/public/images/products/RidingGear/Boots/forma.jpg', 'Forma', 0),
(205, 'SIDI Mag-1 Air Boots', 'protection', 'boots', 460, 5, '/SafeRideStore/public/images/products/RidingGear/Boots/sidi2.jpg', 'Sidi', 0),
(206, 'Alpinestars Missile Race Suit ', 'protection', 'RaceSuit', 1000, 7, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/alp.jpg', 'Alpinestars', 0),
(207, 'Alpinestars Motegi v2 1-Piece ', 'protection', 'RaceSuit', 1200, 7, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/alp2.jpg', 'Alpinestars', 0),
(208, 'Alpinestars GP Plus v2 Venom R', 'protection', 'RaceSuit', 1300, 7, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/alp3.jpg', 'Alpinestars', 0),
(209, 'Spidi Track Wind Pro Race Suit', 'protection', 'RaceSuit', 1500, 7, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/spidi.jpg', 'Spidi', 0),
(210, 'REV\'IT - Quantum Race Suit', 'protection', 'RaceSuit', 1350, 8, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/revit.jpg', 'Revit', 0),
(211, 'Dainese Mugello R D-Air Race Suit  ', 'protection', 'RaceSuit', 4500, 6, '/SafeRideStore/public/images/products/RidingGear/RaceSuit/211.jpg', 'Dainese', 0),
(212, 'Dainese Charger Jeans', 'jeans', 'jeans', 150, 10, '/SafeRideStore/public/images/products/RidingGear/Jeans/dain.jpg', 'Dainese', 0),
(213, 'Icon 1000 Akromont Riding Jean', 'jeans', 'jeans', 150, 5, '/SafeRideStore/public/images/products/RidingGear/Jeans/icon.jpg', 'Icon', 0),
(214, 'Scorpion EXO Covert Pro Jeans', 'jeans', 'jeans', 170, 5, '/SafeRideStore/public/images/products/RidingGear/Jeans/scorpion.jpg', 'Scorpion', 0),
(215, 'Alpinestars Copper Riding Jean', 'jeans', 'jeans', 130, 5, '/SafeRideStore/public/images/products/RidingGear/Jeans/alp.jpg', 'Alpinestars', 0),
(216, 'REV\'IT - Brentwood Jeans', 'jeans', 'jeans', 175, 5, '/SafeRideStore/public/images/products/RidingGear/Jeans/revit.jpg', 'Revit', 0),
(217, 'Alpinestars Oscar Charlie Ridi', 'jeans', 'jeans', 160, 5, '/SafeRideStore/public/images/products/RidingGear/Jeans/alp2.jpg', 'Alpinestars', 0),
(218, 'Icon PDX 2 Jacket', 'jacket', 'RainGear', 130, 10, '/SafeRideStore/public/images/products/RidingGear/Rain/icon.jpg', 'Icon', 0),
(220, 'REV\'IT - Pacific 2 H2O Rain Su', 'jacket', 'RainGear', 200, 10, '/SafeRideStore/public/images/products/RidingGear/Rain/revit.jpg', 'Revit', 0),
(221, 'REV\'IT - Cyclone 2 H2O Rain Ja', 'jacket', 'RainGear', 110, 10, '/SafeRideStore/public/images/products/RidingGear/Rain/revit2.jpg', 'Revit', 0),
(222, 'Dainese Rain Suit', 'jacket', 'RainGear', 130, 10, '/SafeRideStore/public/images/products/RidingGear/Rain/dain.jpg', 'Dainese', 0),
(223, 'Dainese Storm Jacket', 'jacket', 'RainGear', 210, 5, '/SafeRideStore/public/images/products/RidingGear/Rain/dain2.jpg', 'Dainese', 0),
(224, 'Alpinestars Qualifier Rain Jac', 'jacket', 'RainGear', 140, 5, '/SafeRideStore/public/images/products/RidingGear/Rain/alp.jpg', 'Alpinestars', 0),
(230, 'Alpinestars Bionic Action Jacket', 'protection', 'Armored', 170, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/alp.jpg', 'Alpinestars', 0),
(231, 'Thor Sentry XP Body Protector', 'protection', 'Armored', 165, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/thor.jpg', 'Thor', 0),
(232, 'Fly Racing Dirt Barricade Armo', 'protection', 'Armared', 200, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/fly.jpg', 'Fly', 0),
(233, 'Troy Lee Youth 7855 Long Sleev', 'protection', 'Armared', 245, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/troy.jpg', 'Troy', 0),
(234, 'Icon Stryker Rig', 'protection', 'Armored', 290, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/icon.jpg', 'Icon', 0),
(235, 'Alpinestars Sequence Jacket', 'protection', 'Armored', 280, 10, '/SafeRideStore/public/images/products/RidingGear/Armored/alp3.jpg', 'Alpinestars', 0),
(240, 'Cardo PackTalk BLACK JBL Heads', 'accessories', 'Electronic', 350, 5, '/SafeRideStore/public/images/products/Accessories/talk.jpg', 'Cardo', 0),
(500, 'AGV K3 SV Rossi Misano 2015 He', 'helmet', 'fullFace', 300, 5, '/SafeRideStore/public/images/products/Agv/FullFace/agv.jpg', 'AGV', 5),
(501, 'AGV Pista GP RR Carbon Perform', 'helmet', 'fullFace', 890, 3, '/SafeRideStore/public/images/products/Agv/FullFace/agv2.jpg', 'AGV', 5),
(502, 'AGV K5 S Tornado Helmet', 'helmet', 'fullFace', 550, 3, '/SafeRideStore/public/images/products/Agv/FullFace/agv3.jpg', 'AGV', 5),
(503, 'AGV K3 SV Liquefy Helmet', 'helmet', 'fullFace', 300, 10, '/SafeRideStore/public/images/products/Agv/FullFace/agv4.jpg', 'AGV', 5),
(505, 'Arai Corsair X IOM 2020', 'helmet', 'fullFace', 450, 5, '/SafeRideStore/public/images/products/Arai/FullFace/arai.jpg', 'Arai', 5),
(506, 'Arai Quantum-X Spine Helmet', 'helmet', 'fullFace', 480, 4, '/SafeRideStore/public/images/products/Arai/FullFace/arai2.jpg', 'Arai', 5),
(507, 'Arai Defiant-X Dragon Helmet', 'helmet', 'fullFace', 500, 5, '/SafeRideStore/public/images/products/Arai/FullFace/arai3.jpg', 'Arai', 5),
(508, 'Arai Corsair X Pedrosa Samurai', 'helmet', 'fullFace', 990, 5, '/SafeRideStore/public/images/products/Arai/FullFace/arai4.jpg', 'Arai', 5),
(509, 'Arai Signet-X Oriental Helmet', 'helmet', 'fullFace', 790, 5, '/SafeRideStore/public/images/products/Arai/FullFace/arai5.jpg', 'Arai', 5),
(992, 'Shoei Neotec 2 Splicer Helmet', 'helmet', 'Modular', 320, 10, '/SafeRideStore/public/images/products/shoei/modular/shoei_neotec2.jpg', 'SHOEI', 5),
(994, 'Bell Revolver EVO Helmet - Sol', 'helmet', 'Modular', 347, 10, '/SafeRideStore/public/images/products/bell/modular/bell modular.jpg', 'Bell', 1.44092),
(995, 'AGV Sportmodular Carbon', 'helmet', 'Modular', 350, 10, '/SafeRideStore/public/images/products/Agv/Modular/Agv Modular.jpg', 'AGV', 5),
(997, 'SHOEI NEOTEC 2 WHITE', 'helmet', 'Modular', 200, 10, '/SafeRideStore/public/images/products/shoei/modular/ShoeiWhite.jpg', 'SHOEI', 5),
(998, 'LS2 Valiant Helmet', 'helmet', 'Modular', 150, 10, '/SafeRideStore/public/images/products/LS2 Valiant Helmet Black.jpg', 'LS2', 5),
(9999, 'Shark EVO BLANK BLACK MAT', 'helmet', 'Modular', 170, 6, '/SafeRideStore/public/images/products/Shark EVO-ES BLANK BLACK MAT.jpg', 'Shark', 5),
(11111, 'Icon Airflite Synthwave', 'helmet', 'fullFace', 120, 15, '/SafeRideStore/public/images/products/Icon-Airflite-Synthwave.jpg', 'icon', 5),
(11112, 'Icon Airflite Battlescar', 'helmet', 'fullFace', 120, 10, '/SafeRideStore/public/images/products/Icon-Airflite-Battlescar.jpg', 'icon', 5),
(11113, 'Icon airflite inky', 'helmet', 'fullFace', 150, 10, '/SafeRideStore/public/images/products/icon-airflite-inky.jpg', 'icon', 5),
(11114, 'Icon Airflite QB2', 'helmet', 'fullFace', 140, 10, '/SafeRideStore/public/images/products/Icon-Airflite-QB2.jpg', 'icon', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products_in_cart`
--

CREATE TABLE `products_in_cart` (
  `cartId` int(10) UNSIGNED NOT NULL,
  `productId` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_in_cart`
--

INSERT INTO `products_in_cart` (`cartId`, `productId`, `quantity`) VALUES
(22, 7, 1),
(22, 43, 1),
(27, 2, 3),
(27, 3, 1),
(27, 7, 2),
(27, 13, 2),
(29, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products_in_order`
--

CREATE TABLE `products_in_order` (
  `orderId` int(11) NOT NULL,
  `inStockId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_in_order`
--

INSERT INTO `products_in_order` (`orderId`, `inStockId`, `quantity`) VALUES
(1, 1, 2),
(1, 2, 10),
(1, 11, 30),
(1, 13, 16),
(1, 16, 5),
(1, 20, 15),
(1, 21, 10),
(1, 27, 40),
(1, 29, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`vat`) VALUES
(17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD PRIMARY KEY (`inStockId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD PRIMARY KEY (`cartId`,`productId`);

--
-- Indexes for table `products_in_order`
--
ALTER TABLE `products_in_order`
  ADD PRIMARY KEY (`orderId`,`inStockId`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`vat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cartId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `in_stock`
--
ALTER TABLE `in_stock`
  MODIFY `inStockId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
