-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 06:08 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctc353_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `companystaff`
--

CREATE TABLE `companystaff` (
  `staffID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `staffPosition` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companystaff`
--

INSERT INTO `companystaff` (`staffID`, `firstName`, `lastName`, `staffPosition`, `email`) VALUES
(101, 'Henrietta', 'Park', 'Company Director', 'HenrPark@damavand.com'),
(102, 'Kristen', 'Allison', 'Project Manager', 'KristAll@damavand.com'),
(103, 'Roman', 'Morgan', 'Structural Engineer', 'RomanMorg@damavand.com'),
(104, 'Rickey', 'Ngyuen', 'Architect', 'RickNgy@damavand.com'),
(105, 'Domingo', 'Stanley', 'Project Manager', 'DomingoStan@damavand.com'),
(106, 'Luz', 'Huff', 'Project Assistant', 'LuzHuff@damavand.com'),
(107, 'Clarence', 'Cain', 'Project Assistant', 'CCain@damavand.com'),
(108, 'Reginald', 'Singleton', 'Project Manager', 'RegSing@damavand.com'),
(109, 'Brandy', 'Edwards', 'Project Manager', 'BrandEd@damavand.com'),
(110, 'Benny', 'Gonzalez', 'Project Assistant', 'BennyGon@damavand.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `address`, `telephone`, `email`) VALUES
(201, 'Preston', 'Holmes', '2031 40th Street, Montreal', '514-402-3109', 'PresHom@gmail.com'),
(202, 'Earnest', 'Perez', '2586 102nd Avenue, Longueuil', '514-402-3109', 'EarnPre@gmail.com'),
(203, 'Wesley', 'Blair', '4178 40th Street, Longueuil', '514-402-3109', 'WesBl@gmail.com'),
(204, 'Nelson', 'Cox', '4376 Nelson Street, Laval', '514-402-3109', 'NelCox@gmail.com'),
(205, 'Rosa', 'Fox', '2706 Leslie Street, Laval', '514-402-3109', 'RosaB@gmail.com'),
(206, 'Nellie', 'Harmon', '4013 47th Avenue, Montreal', '514-402-3109', 'NelHarm@gmail.com'),
(207, 'Sophia', 'Hamilton', '4168 Halsey Avenue, Montreal', '514-402-3109', 'SophHam@gmail.com'),
(208, 'Nora', 'Nunez', '3550 rue Saint-Édouard, Saint-Laurent', '514-402-3109', 'NorNun@gmail.com'),
(209, 'Lena', 'Little', '3131 St Jean Baptiste St, Montreal', '514-402-3109', 'LenLit@gmail.com'),
(210, 'Julio', 'Young', '133 Hyde Park Road, Montreal', '514-402-3109', 'JuliYou@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `unitCost` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `orderID`, `supplierID`, `itemName`, `unitCost`, `quantity`) VALUES
(1, 27, 301, 'Steel Nail 2.5"', '225', 50),
(2, 27, 302, 'Birch Plywood', '10', 1000),
(3, 28, 303, 'Binding wire 1kg', '6', 100),
(4, 27, 304, 'Wood Nail 3" 5kg', '18', 35),
(5, 29, 305, 'Steel Nail 2"', '216', 50),
(6, 30, 306, 'Steel Nail 3"', '252', 50),
(7, 31, 309, 'Site Work (Permit & Planning)', '16000', 1),
(8, 32, 307, 'Site Work (Permit & Planning)', '18000', 1),
(9, 33, 308, 'Site Work (Permit & Planning)', '17600', 1),
(10, 34, 309, 'Site Work (Permit & Planning)', '28000', 1),
(11, 35, 310, 'Site Work (Permit & Planning)', '16092', 1),
(12, 37, 301, 'Site Work (Permit & Planning)', '17650', 1),
(13, 28, 302, 'Site Work (Permit & Planning)', '18026', 1),
(14, 39, 303, 'Site Work (Permit & Planning)', '12065', 1),
(15, 40, 304, 'Site Work (Permit & Planning)', '13111', 1),
(16, 45, 305, 'Site Work (Permit & Planning)', '12654', 1),
(17, 46, 306, 'Site Work (Permit & Planning)', '15623', 1),
(18, 41, 307, 'Hessian cloth 1000 yard', '102', 30),
(19, 33, 308, 'Blue Fiber Mesh 50m', '62', 250),
(20, 43, 309, 'Polythene Sheet 100g', '6', 1000),
(21, 47, 310, 'Polythene Sheet 800g', '34', 80),
(22, 48, 301, 'PVC Bucket Yellow H/D', '11', 45),
(23, 49, 302, 'Hand Shovel China ', '30', 20),
(24, 50, 303, 'Safety Mesh  Orange 1x50', '54', 1),
(25, 44, 304, 'Leather Gloves', '54', 1),
(26, 50, 305, 'Warning Tape', '13', 1),
(27, 33, 306, 'Nylon Rope 3mm', '5', 1),
(28, 44, 307, 'Cement bags', '50', 50),
(29, 27, 308, 'Wall Tiles', '25', 250),
(30, 29, 309, 'Paving Stone', '48', 320),
(31, 31, 310, 'Flush Door', '100', 25),
(32, 30, 301, 'Window (32"W x 38" H)', '100', 5),
(33, 45, 302, 'Window (24"W x 19" H)', '80', 4),
(34, 47, 303, 'Insulation', '10', 22),
(35, 48, 304, 'Brick', '100', 25),
(36, 49, 305, 'Heatpump', '100', 25);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userID`, `username`, `password`) VALUES
(101, 'HenrPark@damavand.com', '1234'),
(102, 'KristAll@damavand.com', '1234'),
(103, 'RomanMorg@damavand.com', '1234'),
(104, 'RickNgy@damavand.com', '1234'),
(105, 'DomingoStan@damavand.com', '1234'),
(106, 'LuzHuff@damavand.com', '1234'),
(107, 'CCain@damavand.com', '1234'),
(108, 'RegSing@damavand.com', '1234'),
(109, 'BrandEd@damavand.com', '1234'),
(110, 'BennyGon@damavand.com', '1234'),
(201, 'PresHom@gmail.com', '1234'),
(202, 'EarnPre@gmail.com', '1234'),
(203, 'WesBl@gmail.com', '1234'),
(204, 'NelCox@gmail.com', '1234'),
(205, 'RosaB@gmail.com', '1234'),
(206, 'NelHarm@gmail.com', '1234'),
(207, 'SophHam@gmail.com', '1234'),
(208, 'NorNun@gmail.com', '1234'),
(209, 'LenLit@gmail.com', '1234'),
(210, 'JuliYou@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `phaseID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `totalCost` decimal(10,0) NOT NULL,
  `orderDate` date NOT NULL,
  `estimatedDeliveryDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `projectID`, `phaseID`, `taskID`, `supplierID`, `totalCost`, `orderDate`, `estimatedDeliveryDate`) VALUES
(27, 1, 1, 1, 301, '4000', '2017-10-16', '2017-12-16'),
(28, 1, 2, 1, 301, '400', '2017-09-06', '2017-10-16'),
(29, 1, 3, 1, 301, '100', '2017-01-16', '2017-03-23'),
(30, 1, 2, 1, 303, '500', '2013-03-06', '2013-10-16'),
(31, 2, 1, 1, 305, '5400', '2014-09-06', '2014-10-16'),
(32, 3, 3, 1, 307, '4800', '2012-09-06', '2013-10-16'),
(33, 2, 2, 1, 306, '300', '2017-09-06', '2017-10-16'),
(34, 3, 2, 1, 305, '1400', '2017-09-06', '2017-10-16'),
(35, 4, 3, 1, 310, '6400', '2017-09-06', '2017-10-16'),
(36, 5, 1, 1, 307, '4700', '2017-09-06', '2017-10-16'),
(37, 5, 4, 1, 309, '6800', '2017-09-06', '2017-10-16'),
(38, 10, 2, 1, 303, '460', '2017-09-06', '2017-10-16'),
(39, 6, 3, 1, 307, '1230', '2017-09-06', '2017-10-16'),
(40, 8, 2, 1, 304, '4650', '2017-09-06', '2017-10-16'),
(41, 9, 3, 1, 302, '5640', '2017-09-06', '2017-10-16'),
(42, 6, 1, 1, 303, '4210', '2017-09-06', '2017-10-16'),
(43, 7, 1, 1, 305, '500', '2017-09-06', '2017-10-16'),
(44, 9, 1, 1, 306, '7400', '2017-09-06', '2017-10-16'),
(45, 10, 3, 1, 306, '7800', '2017-09-06', '2017-10-16'),
(46, 4, 2, 1, 304, '440', '2017-09-06', '2017-10-16'),
(47, 6, 2, 1, 305, '900', '2017-09-06', '2017-10-16'),
(48, 6, 3, 1, 306, '2100', '2017-09-06', '2017-10-16'),
(49, 10, 1, 1, 304, '2100', '2017-09-06', '2017-10-16'),
(50, 4, 1, 1, 308, '1230', '2017-09-06', '2017-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `paymentsorders`
--

CREATE TABLE `paymentsorders` (
  `paymentOrderID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentsorders`
--

INSERT INTO `paymentsorders` (`paymentOrderID`, `orderID`, `supplierID`, `paid`, `totalAmount`) VALUES
(1, 27, 301, 500, 4000),
(2, 28, 302, 400, 400),
(3, 29, 303, 50, 100),
(4, 30, 304, 400, 500),
(5, 31, 305, 5000, 5400),
(6, 32, 306, 4800, 4800),
(7, 33, 307, 300, 300),
(8, 34, 308, 1000, 1400),
(9, 35, 309, 5000, 6400),
(10, 36, 310, 4700, 4700),
(11, 37, 301, 6500, 6800),
(12, 38, 302, 460, 460),
(13, 39, 303, 1000, 1230),
(14, 40, 304, 3000, 4650),
(15, 41, 305, 5640, 5640),
(16, 42, 306, 4210, 4210),
(17, 43, 307, 500, 500),
(18, 44, 308, 7000, 7400),
(19, 45, 309, 7800, 7800),
(20, 46, 310, 440, 440),
(21, 47, 301, 900, 900),
(22, 48, 302, 2000, 2100),
(23, 49, 303, 700, 2100),
(24, 50, 304, 1230, 1230);

-- --------------------------------------------------------

--
-- Table structure for table `paymentstask`
--

CREATE TABLE `paymentstask` (
  `paymentTaskID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `phaseID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentstask`
--

INSERT INTO `paymentstask` (`paymentTaskID`, `projectID`, `phaseID`, `taskID`, `supplierID`, `paid`, `totalAmount`) VALUES
(1, 1, 1, 1, 310, 736, 736),
(2, 1, 1, 1, 301, 620, 736),
(3, 1, 1, 2, 301, 245, 245),
(4, 1, 1, 3, 302, 2300, 23573),
(5, 1, 2, 1, 303, 1856, 2946),
(6, 1, 2, 2, 304, 1500, 3928),
(7, 1, 2, 3, 305, 2632, 17680),
(8, 1, 3, 1, 305, 423, 2210),
(9, 1, 3, 2, 301, 123, 2210),
(10, 1, 3, 3, 302, 6773, 20135),
(11, 1, 4, 1, 303, 736, 736),
(12, 1, 4, 2, 310, 736, 736),
(13, 1, 4, 3, 308, 1964, 1964),
(14, 1, 4, 4, 306, 2233, 21118),
(15, 2, 1, 1, 303, 312, 828),
(16, 2, 1, 2, 307, 123, 276),
(17, 2, 1, 3, 303, 5422, 26507),
(18, 2, 2, 1, 309, 1234, 3313),
(19, 2, 2, 2, 309, 4417, 4417),
(20, 2, 2, 3, 303, 1234, 19880),
(21, 2, 3, 1, 306, 1234, 2485),
(22, 2, 3, 2, 306, 677, 2485),
(23, 2, 3, 3, 302, 8900, 22641),
(24, 2, 4, 1, 303, 512, 828),
(25, 2, 4, 2, 307, 123, 828),
(26, 2, 4, 3, 307, 2200, 2208),
(27, 2, 4, 4, 309, 21345, 23746),
(28, 3, 1, 1, 308, 818, 818),
(29, 3, 1, 2, 305, 272, 272),
(30, 3, 1, 3, 309, 26187, 26187),
(31, 3, 2, 1, 307, 3200, 3273),
(32, 3, 2, 2, 303, 2500, 4364),
(33, 3, 2, 3, 308, 596, 19640),
(34, 3, 3, 1, 307, 365, 2455),
(35, 3, 3, 2, 309, 369, 2455),
(36, 3, 3, 3, 310, 0, 22368),
(37, 3, 4, 1, 310, 818, 818),
(38, 3, 4, 2, 301, 818, 818),
(39, 3, 4, 3, 301, 2182, 2182),
(40, 3, 4, 4, 303, 2365, 23459),
(41, 4, 1, 1, 304, 255, 1756),
(42, 4, 1, 2, 305, 56, 585),
(43, 4, 1, 3, 306, 56200, 56213),
(44, 4, 2, 1, 307, 2000, 7026),
(45, 4, 2, 2, 303, 2563, 9368),
(46, 4, 2, 3, 304, 26593, 42160),
(47, 4, 3, 1, 304, 2569, 5270),
(48, 4, 3, 2, 309, 5230, 5270),
(49, 4, 3, 3, 308, 5930, 48015),
(50, 4, 4, 1, 309, 960, 1756),
(51, 4, 4, 2, 301, 369, 1756),
(52, 4, 4, 3, 310, 658, 4684),
(53, 4, 4, 4, 310, 28963, 50358),
(54, 5, 1, 1, 305, 815, 1747),
(55, 5, 1, 2, 307, 582, 582),
(56, 5, 1, 3, 302, 31698, 55904),
(57, 5, 2, 1, 302, 3829, 6988),
(58, 5, 2, 2, 302, 4166, 9317),
(59, 5, 2, 3, 305, 10474, 41928),
(60, 5, 3, 1, 305, 3382, 5241),
(61, 5, 3, 2, 308, 2154, 5241),
(62, 5, 3, 3, 301, 18877, 47751),
(63, 5, 4, 1, 310, 672, 1747),
(64, 5, 4, 2, 301, 1484, 1747),
(65, 5, 4, 3, 310, 1349, 4658),
(66, 5, 4, 4, 308, 17152, 50080),
(67, 6, 1, 1, 310, 623, 1806),
(68, 6, 1, 2, 301, 586, 602),
(69, 6, 1, 3, 301, 17410, 57813),
(70, 6, 2, 1, 305, 2925, 7226),
(71, 6, 2, 2, 308, 8708, 9635),
(72, 6, 2, 3, 309, 38869, 43360),
(73, 6, 3, 1, 302, 4713, 5420),
(74, 6, 3, 2, 302, 3322, 5420),
(75, 6, 3, 3, 307, 15917, 49382),
(76, 6, 4, 1, 301, 1781, 1806),
(77, 6, 4, 2, 304, 754, 1806),
(78, 6, 4, 3, 303, 625, 4817),
(79, 6, 4, 4, 308, 42295, 51791),
(80, 7, 1, 1, 302, 39868, 41369),
(81, 7, 1, 2, 309, 605, 608),
(82, 7, 1, 3, 304, 1207, 58453),
(83, 7, 2, 1, 307, 3314, 7306),
(84, 7, 2, 2, 303, 8097, 9742),
(85, 7, 2, 3, 310, 31143, 43840),
(86, 7, 3, 1, 309, 2711, 5480),
(87, 7, 3, 2, 308, 3172, 5480),
(88, 7, 3, 3, 307, 42491, 49929),
(89, 7, 4, 1, 310, 1733, 1826),
(90, 7, 4, 2, 306, 1661, 1826),
(91, 7, 4, 3, 304, 626, 4871),
(92, 7, 4, 4, 310, 32803, 52364),
(93, 8, 1, 1, 304, 2226, 41369),
(94, 8, 1, 2, 305, 8648, 13789),
(95, 8, 1, 3, 306, 537791, 1323829),
(96, 8, 2, 1, 307, 72071, 165478),
(97, 8, 2, 2, 303, 186769, 220638),
(98, 8, 2, 3, 305, 870257, 992872),
(99, 8, 3, 1, 306, 43528, 124109),
(100, 8, 3, 2, 305, 115039, 124109),
(101, 8, 3, 3, 301, 533658, 1130771),
(102, 8, 4, 1, 304, 27580, 41369),
(103, 8, 4, 2, 306, 23036, 41369),
(104, 8, 4, 3, 310, 6144, 110319),
(105, 8, 4, 4, 307, 944899, 1185930),
(106, 9, 1, 1, 303, 48541, 58693),
(107, 9, 1, 2, 310, 17934, 19564),
(108, 9, 1, 3, 302, 1794401, 1878187),
(109, 9, 2, 1, 301, 135139, 234773),
(110, 9, 2, 2, 310, 51814, 313031),
(111, 9, 2, 3, 301, 124486, 1408640),
(112, 9, 3, 1, 303, 102290, 176080),
(113, 9, 3, 2, 309, 77908, 176080),
(114, 9, 3, 3, 302, 1188632, 1604284),
(115, 9, 4, 1, 308, 16542, 58693),
(116, 9, 4, 2, 308, 3455, 58693),
(117, 9, 4, 3, 306, 91030, 156515),
(118, 9, 4, 4, 307, 697868, 1682542),
(119, 10, 1, 1, 303, 34763, 281859),
(120, 10, 1, 2, 304, 59091, 93953),
(121, 10, 1, 3, 305, 3953752, 9019488),
(122, 10, 2, 1, 304, 1005948, 1127436),
(123, 10, 2, 2, 302, 246384, 1503248),
(124, 10, 2, 3, 310, 662438, 845577),
(125, 10, 3, 1, 301, 697165, 845577),
(126, 10, 3, 2, 309, 283801, 845577),
(127, 10, 3, 3, 309, 6347933, 7704146),
(128, 10, 4, 1, 309, 226204, 281859),
(129, 10, 4, 2, 302, 50186, 281859),
(130, 10, 4, 3, 301, 677436, 751624),
(131, 10, 4, 4, 305, 5110749, 8079958);

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE `phase` (
  `phaseID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `phaseName` varchar(50) DEFAULT NULL,
  `estimatedStartDate` date NOT NULL,
  `estimatedEndDate` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `actualStartDate` date DEFAULT NULL,
  `actualEndDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`phaseID`, `projectID`, `phaseName`, `estimatedStartDate`, `estimatedEndDate`, `status`, `actualStartDate`, `actualEndDate`) VALUES
(1, 1, 'Preliminary activities', '2016-07-15', '2016-07-21', 'Complete', '2016-07-15', '2016-07-21'),
(1, 2, 'Preliminary activities', '2015-04-27', '2015-05-03', 'Complete', '2015-04-27', '2015-05-03'),
(1, 3, 'Preliminary activities', '2017-03-11', '2017-03-18', 'In Progress', '2017-03-11', '2017-03-18'),
(1, 4, 'Preliminary activities', '2015-07-18', '2015-07-31', 'Complete', '2015-07-18', '2015-07-31'),
(1, 5, 'Preliminary activities', '2017-02-19', '2017-03-05', 'In Progress', '2017-02-19', '2017-03-05'),
(1, 6, 'Preliminary activities', '2016-02-13', '2016-02-27', 'Complete', '2016-02-13', '2016-02-27'),
(1, 7, 'Preliminary activities', '2015-04-17', '2015-05-04', 'Complete', '2015-04-17', '2015-05-04'),
(1, 8, 'Preliminary activities', '2015-03-12', '2015-04-03', 'Complete', '2015-03-12', '2015-04-03'),
(1, 9, 'Preliminary activities', '2015-03-12', '2016-05-26', 'Complete', '2015-03-12', '2016-05-26'),
(1, 10, 'Preliminary activities', '2016-05-01', '2017-02-19', 'In Progress', '2016-05-01', '2017-02-19'),
(2, 1, 'External construction', '2016-07-21', '2016-08-22', 'Complete', '2016-07-21', '2016-08-22'),
(2, 2, 'External construction', '2015-05-03', '2015-06-05', 'Complete', '2015-05-03', '2015-06-05'),
(2, 3, 'External construction', '2017-03-18', '2017-04-24', 'In Progress', '2017-03-18', '2017-04-24'),
(2, 4, 'External construction', '2015-07-31', '2015-10-08', 'Complete', '2015-07-31', '2015-10-08'),
(2, 5, 'External construction', '2017-03-05', '2017-05-15', 'In Progress', '2017-03-05', '2017-05-15'),
(2, 6, 'External construction', '2016-02-27', '2016-05-11', 'Complete', '2016-02-27', '2016-05-11'),
(2, 7, 'External construction', '2015-05-04', '2015-07-31', 'Complete', '2015-05-04', '2015-07-31'),
(2, 8, 'External construction', '2015-04-03', '2015-07-25', 'Complete', '2015-04-03', '2015-07-25'),
(2, 9, 'External construction', '2016-05-26', '2016-09-28', 'Complete', '2016-05-26', '2016-09-28'),
(2, 10, 'External construction', '2017-02-19', '2017-07-26', 'In Progress', '2017-02-19', '2017-07-26'),
(3, 1, 'Internal construction', '2016-08-22', '2016-09-04', 'Complete', '2016-08-22', '2016-09-04'),
(3, 2, 'Internal construction', '2015-06-05', '2015-06-19', 'Complete', '2015-06-05', '2015-06-19'),
(3, 3, 'Internal construction', '2017-04-24', '2017-05-09', 'In Progress', '2017-04-24', '2017-05-09'),
(3, 4, 'Internal construction', '2015-10-08', '2015-11-05', 'Complete', '2015-10-08', '2015-11-05'),
(3, 5, 'Internal construction', '2017-05-15', '2017-06-13', 'In Progress', '2017-05-15', '2017-06-13'),
(3, 6, 'Internal construction', '2016-05-11', '2016-06-10', 'Complete', '2016-05-11', '2016-06-10'),
(3, 7, 'Internal construction', '2015-07-31', '2015-09-05', 'Complete', '2015-07-31', '2015-09-05'),
(3, 8, 'Preliminary activities', '2015-07-25', '2015-09-09', 'Complete', '2015-07-25', '2015-09-09'),
(3, 9, 'Internal construction', '2016-09-28', '2016-11-17', 'Complete', '2016-09-28', '2016-11-17'),
(3, 10, 'Internal construction', '2017-07-26', '2017-09-27', 'In Progress', '2017-07-26', '2017-09-27'),
(4, 1, 'Finishing', '2016-09-04', '2016-09-18', 'Complete', '2016-09-04', '2016-09-18'),
(4, 2, 'Finishing', '2015-06-19', '2015-07-02', 'Complete', '2015-06-19', '2015-07-02'),
(4, 3, 'Finishing', '2017-05-09', '2017-05-24', 'In Progress', '2017-05-09', '2017-05-24'),
(4, 4, 'Finishing', '2015-11-05', '2015-12-03', 'Complete', '2015-11-05', '2015-12-03'),
(4, 5, 'Finishing', '2017-06-13', '2017-07-12', 'In Progress', '2017-06-13', '2017-07-12'),
(4, 6, 'Finishing', '2016-06-10', '2016-07-10', 'Complete', '2016-06-10', '2016-07-10'),
(4, 7, 'Finishing', '2015-09-05', '2015-10-10', 'Complete', '2015-09-05', '2015-10-10'),
(4, 8, 'Finishing', '2015-09-09', '2015-10-25', 'Complete', '2015-09-09', '2015-10-25'),
(4, 9, 'Finishing', '2016-11-17', '2017-01-06', 'Complete', '2016-11-17', '2017-01-06'),
(4, 10, 'Finishing', '2017-09-27', '2017-11-29', 'In Progress', '2017-09-27', '2017-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `projectManagerID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `siteAddress` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `estimatedCost` decimal(10,0) NOT NULL,
  `actualCost` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `projectName`, `projectManagerID`, `customerID`, `startDate`, `endDate`, `siteAddress`, `status`, `estimatedCost`, `actualCost`) VALUES
(1, 'Construction of a bungalow house', 105, 210, '2016-07-15', '2016-09-18', 'Ahuntsic', 'Complete', '286668', '294668'),
(2, 'Construction of a bungalow house type Diacono', 102, 208, '2015-04-27', '2015-07-02', 'Laval', 'Complete', '282668', '331336'),
(3, 'Construction of a bungalow house type Luberon', 108, 201, '2017-03-11', '2017-05-24', 'Saint-Laurent', 'In Progress', '308000', '327336'),
(4, 'Construction of a cottage house type Richburg', 105, 204, '2015-07-18', '2015-12-03', 'Brossard', 'Complete', '706668', '702668'),
(5, 'Construction of a cottage house type Richbur', 109, 209, '2017-02-19', '2017-07-12', 'Saint-Bruneau', 'In Progress', '722668', '698800'),
(6, 'Construction of a semi-detached house type Moscato', 102, 205, '2016-02-13', '2016-07-10', 'Verdun', 'Complete', '749336', '722668'),
(7, 'Construction of a semi-detached house type Ripasso', 109, 207, '2015-04-17', '2015-10-10', 'Verdun', 'Complete', '705336', '730668'),
(8, 'Construction of a condos building type Studio', 102, 202, '2015-03-12', '2015-10-25', 'Ville-Marie', 'Complete', '13480', '16547868'),
(9, 'Construction of a condos building type 1-2 bedroom2', 108, 203, '2016-05-01', '2017-01-06', 'West Island', 'Complete', '24830668', '23477336'),
(10, 'Construction of a condos building type Mixed', 109, 206, '2017-01-19', '2017-11-29', 'Saint-Lambert', 'In Progress', '114342668', '112743600');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `contactPerson`, `address`, `phoneNumber`, `email`) VALUES
(301, 'Laurentide Builders Supply Inc', 'Jeannie Neumann', '6275 Av Papineau, Montréal, QC H2G 2X1', '438-796-1171', 'j.neumann@gmail.com'),
(302, 'Agrafbec Ltee', 'Mary Johnson', '11000, rue Mirabeau, Anjou, QC H1J 2S3', '514-353-3040', 'm.johnson@google.com'),
(303, 'Les Distributions BMB sec', 'Derik Lingham', '4500 rue Bernard-Lefèbvre, Laval, QC H7C 0A5', '514-382-6520', 'd.Lignham@hotamil.com'),
(304, 'Barette Structural Inc', 'Harry Schmitt', '2907, boul Dagenais O, Laval, QC H7P 1T2', '450-622-4900', 'h.Schmitt@gmail.com'),
(305, 'Acadia Drywall Supplies', 'Ludovik Gonzalez', '1289 rue Newton, Boucherville, QC J4B 5H2', '450-655-5100', 'l.Gonzalez@gmail.com'),
(306, 'Edouard Beauchesne Inc', 'Gregory Humphrey', '3600 rue Richelieu, Saint-Hubert, QC J3Y 7B1', '450-466-1637', 'g.humphrey@gmail.com'),
(307, 'Continental Building Products Canada Ltd', 'Harold White', '8802 boul Industriel, Chambly, QC J3L 4X3', '514-915-5694', 'h.white@gmail.com'),
(308, 'Nampac Building Products Intl', 'Kim Yanglei', '3333 boul Cavendish, Montréal, QC H4B 2M5', '514-935-5202', 'jk.yanglei@gmail.com'),
(309, 'Materiaux Coupal Inc', 'Liz Frey', '800 rue de la Gauchetière O, Montréal, QC H5A 1K6', '514-861-4103', 'l.frey@gmail.com'),
(310, 'NCA Accessoires pour Beton National', 'Charline Chavez', '9125, rue Pascal-Gagnon, Saint-Léonard, QC H1P 1Z4', '514-327-9333', 'c.chavez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskID` int(11) NOT NULL,
  `phaseID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `taskName` varchar(100) NOT NULL,
  `estimatedStartDate` date NOT NULL,
  `actualStartDate` date DEFAULT NULL,
  `estimatedCost` decimal(10,0) NOT NULL,
  `estimatedEndDate` date NOT NULL,
  `actualEndDate` date DEFAULT NULL,
  `actualCost` decimal(10,0) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskID`, `phaseID`, `projectID`, `taskName`, `estimatedStartDate`, `actualStartDate`, `estimatedCost`, `estimatedEndDate`, `actualEndDate`, `actualCost`, `status`) VALUES
(1, 1, 1, 'Structural and architecture design', '2016-07-15', '2016-07-15', '716', '2016-07-21', '2016-07-21', '736', 'Complete'),
(2, 1, 1, ' Acquisition of a construction permit ', '2016-07-15', '2016-07-15', '238', '2016-07-21', '2016-07-21', '245', 'Complete'),
(3, 1, 1, ' Site clearing, levelling, and utilities accessibility ', '2016-07-15', '2016-07-15', '22933', '2016-07-21', '2016-07-21', '23573', 'Complete'),
(1, 2, 1, 'Excavation and foundation construction', '2016-07-21', '2016-07-21', '2866', '2016-07-27', '2016-07-27', '2946', 'Complete'),
(2, 2, 1, ' Floor base/slab and walls ', '2016-07-27', '2016-07-27', '3822', '2016-08-12', '2016-08-12', '3928', 'Complete'),
(3, 2, 1, ' Roof  trusses and cover ', '2016-08-12', '2016-08-12', '17200', '2016-08-22', '2016-08-22', '17680', 'Complete'),
(1, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-08-22', '2016-08-22', '2150', '2016-08-30', '2016-08-30', '2210', 'Complete'),
(2, 3, 1, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2016-08-22', '2016-08-22', '2150', '2016-08-30', '2016-08-30', '2210', 'Complete'),
(3, 3, 1, ' Fixing the ceiling ', '2016-08-30', '2016-08-30', '2150', '2016-09-04', '2016-09-04', '20135', 'Complete'),
(1, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-09-04', '2016-09-04', '716', '2016-09-08', '2016-09-08', '736', 'Complete'),
(2, 4, 1, ' Kitchen cabinetry and rooms wardrobes ', '2016-09-04', '2016-09-04', '716', '2016-09-09', '2016-09-09', '736', 'Complete'),
(3, 4, 1, ' Floor base and walls finishing ', '2016-09-09', '2016-09-09', '1911', '2016-09-15', '2016-09-15', '1964', 'Complete'),
(4, 4, 1, ' Retaining walls and gardens landscaping ', '2016-09-15', '2016-09-15', '20544', '2016-09-18', '2016-09-18', '21118', 'Complete'),
(1, 1, 2, 'Structural and architecture design', '2015-04-27', '2015-04-27', '706', '2015-05-03', '2015-05-03', '828', 'Complete'),
(2, 1, 2, ' Acquisition of a construction permit ', '2015-04-27', '2015-04-27', '235', '2015-05-03', '2015-05-03', '276', 'Complete'),
(3, 1, 2, ' Site clearing, levelling, and utilities accessibility ', '2015-04-27', '2015-04-27', '22613', '2015-05-03', '2015-05-03', '26507', 'Complete'),
(1, 2, 2, 'Excavation and foundation construction', '2015-05-03', '2015-05-03', '2826', '2015-05-09', '2015-05-09', '3313', 'Complete'),
(2, 2, 2, ' Floor base/slab and walls ', '2015-05-09', '2015-05-09', '3768', '2015-05-25', '2015-05-25', '4417', 'Complete'),
(3, 2, 2, ' Roof  trusses and cover ', '2015-05-25', '2015-05-25', '16960', '2015-06-05', '2015-06-05', '19880', 'Complete'),
(1, 3, 2, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-06-05', '2015-06-05', '2120', '2015-06-14', '2015-06-14', '2485', 'Complete'),
(2, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2015-06-05', '2015-06-05', '2120', '2015-06-14', '2015-06-14', '2485', 'Complete'),
(3, 3, 2, ' Fixing the ceiling ', '2015-06-14', '2015-06-14', '19315', '2015-06-19', '2015-06-19', '22641', 'Complete'),
(1, 4, 2, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-06-19', '2015-06-19', '706', '2015-06-22', '2015-06-22', '828', 'Complete'),
(2, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2015-06-19', '2015-06-19', '706', '2015-06-23', '2015-06-23', '828', 'Complete'),
(3, 4, 2, ' Floor base and walls finishing ', '2015-06-23', '2015-06-23', '1884', '2015-06-29', '2015-06-29', '2208', 'Complete'),
(4, 4, 2, ' Retaining walls and gardens landscaping ', '2015-06-29', '2015-06-29', '20258', '2015-07-02', '2015-07-02', '23746', 'Complete'),
(1, 1, 3, 'Structural and architecture design', '2017-03-11', '2017-03-11', '770', '2017-03-18', '2017-03-18', '818', 'In Progress'),
(2, 1, 3, ' Acquisition of a construction permit ', '2017-03-11', '2017-03-11', '256', '2017-03-18', '2017-03-18', '272', 'In Progress'),
(3, 1, 3, ' Site clearing, levelling, and utilities accessibility ', '2017-03-11', '2017-03-11', '24640', '2017-03-18', '2017-03-18', '26187', 'In Progress'),
(1, 2, 3, 'Excavation and foundation construction', '2017-03-18', '2017-03-18', '3080', '2017-03-25', '2017-03-25', '3273', 'In Progress'),
(2, 2, 3, ' Floor base/slab and walls ', '2017-03-25', '2017-03-25', '4106', '2017-04-12', '2017-04-12', '4364', 'In Progress'),
(3, 2, 3, ' Roof  trusses and cover ', '2017-04-12', '2017-04-12', '18480', '2017-04-24', '2017-04-24', '19640', 'In Progress'),
(1, 3, 3, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-04-24', '2017-04-24', '2310', '2017-05-03', '2017-05-03', '2455', 'In Progress'),
(2, 3, 3, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2017-04-24', '2017-04-24', '2310', '2017-05-03', '2017-05-03', '2455', 'In Progress'),
(3, 3, 3, ' Fixing the ceiling ', '2017-05-03', '2017-05-03', '21046', '2017-05-09', '2017-05-09', '22368', 'In Progress'),
(1, 4, 3, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-05-09', '2017-05-09', '770', '2017-05-13', '2017-05-13', '818', 'In Progress'),
(2, 4, 3, ' Kitchen cabinetry and rooms wardrobes ', '2017-05-09', '2017-05-09', '770', '2017-05-14', '2017-05-14', '818', 'In Progress'),
(3, 4, 3, ' Floor base and walls finishing ', '2017-05-14', '2017-05-14', '2053', '2017-05-20', '2017-05-20', '2182', 'In Progress'),
(4, 4, 3, ' Retaining walls and gardens landscaping ', '2017-05-20', '2017-05-20', '22073', '2017-05-24', '2017-05-24', '23459', 'In Progress'),
(1, 1, 4, 'Structural and architecture design', '2015-07-18', '2015-07-18', '1766', '2015-07-31', '2015-07-31', '1756', 'Complete'),
(2, 1, 4, ' Acquisition of a construction permit ', '2015-07-18', '2015-07-18', '588', '2015-07-31', '2015-07-31', '585', 'Complete'),
(3, 1, 4, ' Site clearing, levelling, and utilities accessibility ', '2015-07-18', '2015-07-18', '56533', '2015-07-31', '2015-07-31', '56213', 'Complete'),
(1, 2, 4, 'Excavation and foundation construction', '2015-07-31', '2015-07-31', '7066', '2015-08-13', '2015-08-13', '7026', 'Complete'),
(2, 2, 4, ' Floor base/slab and walls ', '2015-08-13', '2015-08-13', '9422', '2015-09-16', '2015-09-16', '9368', 'Complete'),
(3, 2, 4, ' Roof  trusses and cover ', '2015-09-16', '2015-09-16', '42400', '2015-10-08', '2015-10-08', '42160', 'Complete'),
(1, 3, 4, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-10-08', '2015-10-08', '5300', '2015-10-25', '2015-10-25', '5270', 'Complete'),
(2, 3, 4, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2015-10-08', '2015-10-08', '5300', '2015-10-25', '2015-10-25', '5270', 'Complete'),
(3, 3, 4, ' Fixing the ceiling ', '2015-10-25', '2015-10-25', '48289', '2015-11-05', '2015-11-05', '48015', 'Complete'),
(1, 4, 4, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-11-05', '2015-11-05', '1766', '2015-11-13', '2015-11-13', '1756', 'Complete'),
(2, 4, 4, ' Kitchen cabinetry and rooms wardrobes ', '2015-11-05', '2015-11-05', '1766', '2015-11-14', '2015-11-14', '1756', 'Complete'),
(3, 4, 4, ' Floor base and walls finishing ', '2016-09-09', '2016-09-09', '4711', '2015-11-26', '2015-11-26', '4684', 'Complete'),
(4, 4, 4, ' Retaining walls and gardens landscaping ', '2015-11-26', '2015-11-26', '50644', '2015-12-03', '2015-12-03', '50358', 'Complete'),
(1, 1, 5, 'Structural and architecture design', '2017-02-19', '2017-02-19', '1806', '2017-03-05', '2017-03-05', '1747', 'In Progress'),
(2, 1, 5, ' Acquisition of a construction permit ', '2017-02-19', '2017-02-19', '602', '2017-03-05', '2017-03-05', '582', 'In Progress'),
(3, 1, 5, ' Site clearing, levelling, and utilities accessibility ', '2017-02-19', '2017-02-19', '57813', '2017-03-05', '2017-03-05', '55904', 'In Progress'),
(1, 2, 5, 'Excavation and foundation construction', '2017-03-05', '2017-03-05', '7226', '2017-03-19', '2017-03-19', '6988', 'In Progress'),
(2, 2, 5, ' Floor base/slab and walls ', '2017-03-19', '2017-03-19', '9635', '2017-04-23', '2017-04-23', '9317', 'In Progress'),
(3, 2, 5, ' Roof  trusses and cover ', '2017-04-23', '2017-04-23', '43360', '2017-05-15', '2017-05-15', '41928', 'In Progress'),
(1, 3, 5, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-05-15', '2017-05-15', '5420', '2017-06-02', '2017-06-02', '5241', 'In Progress'),
(2, 3, 5, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2017-05-15', '2017-05-15', '5420', '2017-06-02', '2017-06-02', '5241', 'In Progress'),
(3, 3, 5, ' Fixing the ceiling ', '2017-06-02', '2017-06-02', '49382', '2017-06-13', '2017-06-13', '47751', 'In Progress'),
(1, 4, 5, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-06-13', '2017-06-13', '1806', '2017-06-21', '2017-06-21', '1747', 'In Progress'),
(2, 4, 5, ' Kitchen cabinetry and rooms wardrobes ', '2017-06-13', '2017-06-13', '1806', '2017-06-22', '2017-06-22', '1747', 'In Progress'),
(3, 4, 5, ' Floor base and walls finishing ', '2017-06-22', '2017-06-22', '4817', '2017-07-04', '2017-07-04', '4658', 'In Progress'),
(4, 4, 5, ' Retaining walls and gardens landscaping ', '2017-07-04', '2017-07-04', '51791', '2017-07-12', '2017-07-12', '50080', 'In Progress'),
(1, 1, 6, 'Structural and architecture design', '2017-07-04', '2017-07-04', '51791', '2017-07-12', '2017-07-12', '1806', 'Complete'),
(2, 1, 6, ' Acquisition of a construction permit ', '2016-02-13', '2016-02-13', '1873', '2016-02-27', '2016-02-27', '602', 'Complete'),
(3, 1, 6, ' Site clearing, levelling, and utilities accessibility ', '2016-02-13', '2016-02-13', '59947', '2016-02-27', '2016-02-27', '57813', 'Complete'),
(1, 2, 6, 'Excavation and foundation construction', '2016-02-27', '2016-02-27', '7493', '2016-03-12', '2016-03-12', '7226', 'Complete'),
(2, 2, 6, ' Floor base/slab and walls ', '2016-03-12', '2016-03-12', '9991', '2016-04-18', '2016-04-18', '9635', 'Complete'),
(3, 2, 6, ' Roof  trusses and cover ', '2016-04-18', '2016-04-18', '44960', '2016-05-11', '2016-05-11', '43360', 'Complete'),
(1, 3, 6, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-05-11', '2016-05-11', '5620', '2016-05-29', '2016-05-29', '5420', 'Complete'),
(2, 3, 6, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2016-05-11', '2016-05-11', '5620', '2016-05-29', '2016-05-29', '5420', 'Complete'),
(3, 3, 6, ' Fixing the ceiling ', '2016-05-29', '2016-05-29', '51204', '2016-06-10', '2016-06-10', '49382', 'Complete'),
(1, 4, 6, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-06-10', '2016-06-10', '1873', '2016-06-19', '2016-06-19', '1806', 'Complete'),
(2, 4, 6, ' Kitchen cabinetry and rooms wardrobes ', '2016-06-10', '2016-06-10', '1873', '2016-06-19', '2016-06-19', '1806', 'Complete'),
(3, 4, 6, ' Floor base and walls finishing ', '2016-06-19', '2016-06-19', '4995', '2016-07-01', '2016-07-01', '4817', 'Complete'),
(4, 4, 6, ' Retaining walls and gardens landscaping ', '2016-07-01', '2016-07-01', '53702', '2016-07-10', '2016-07-10', '51791', 'Complete'),
(1, 1, 7, 'Structural and architecture design', '2015-03-12', '2015-03-12', '33700', '2015-04-03', '2015-04-03', '41369', 'Complete'),
(2, 1, 7, ' Acquisition of a construction permit ', '2015-04-17', '2015-04-17', '587', '2015-05-04', '2015-05-04', '608', 'Complete'),
(3, 1, 7, ' Site clearing, levelling, and utilities accessibility ', '2015-04-17', '2015-04-17', '56427', '2015-05-04', '2015-05-04', '58453', 'Complete'),
(1, 2, 7, 'Excavation and foundation construction', '2015-05-04', '2015-05-04', '7053', '2015-05-21', '2015-05-21', '7306', 'Complete'),
(2, 2, 7, ' Floor base/slab and walls ', '2015-05-21', '2015-05-21', '9404', '2015-07-04', '2015-07-04', '9742', 'Complete'),
(3, 2, 7, ' Roof  trusses and cover ', '2015-07-04', '2015-07-04', '42320', '2015-07-31', '2015-07-31', '43840', 'Complete'),
(1, 3, 7, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-07-31', '2015-07-31', '5290', '2015-08-22', '2015-08-22', '5480', 'Complete'),
(2, 3, 7, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2015-07-31', '2015-07-31', '5290', '2015-08-22', '2015-08-22', '5480', 'Complete'),
(3, 3, 7, ' Fixing the ceiling ', '2015-08-22', '2015-08-22', '48198', '2015-09-05', '2015-09-05', '49929', 'Complete'),
(1, 4, 7, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-09-05', '2015-09-05', '1763', '2015-09-15', '2015-09-15', '1826', 'Complete'),
(2, 4, 7, ' Kitchen cabinetry and rooms wardrobes ', '2015-09-05', '2015-09-05', '1763', '2015-09-16', '2015-09-16', '1826', 'Complete'),
(3, 4, 7, ' Floor base and walls finishing ', '2015-09-16', '2015-09-16', '4702', '2015-09-30', '2015-09-30', '4871', 'Complete'),
(4, 4, 7, ' Retaining walls and gardens landscaping ', '2015-09-30', '2015-09-30', '50549', '2015-10-10', '2015-10-10', '52364', 'Complete'),
(1, 1, 8, 'Structural and architecture design', '2015-03-12', '2015-03-12', '33700', '2015-04-03', '2015-04-03', '41369', 'Complete'),
(2, 1, 8, ' Acquisition of a construction permit ', '2015-03-12', '2015-03-12', '11233', '2015-04-03', '2015-04-03', '13789', 'Complete'),
(3, 1, 8, ' Site clearing, levelling, and utilities accessibility ', '2015-03-12', '2015-03-12', '1078400', '2015-04-03', '2015-04-03', '1323829', 'Complete'),
(1, 2, 8, 'Excavation and foundation construction', '2015-04-03', '2015-04-03', '134800', '2015-04-25', '2015-04-25', '165478', 'Complete'),
(2, 2, 8, ' Floor base/slab and walls ', '2015-04-25', '2015-04-25', '179733', '2015-06-20', '2015-06-20', '220638', 'Complete'),
(3, 2, 8, ' Roof  trusses and cover ', '2015-06-20', '2015-06-20', '808800', '2015-07-25', '2015-07-25', '992872', 'Complete'),
(1, 3, 8, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-07-25', '2015-07-25', '101100', '2015-08-22', '2015-08-22', '124109', 'Complete'),
(2, 3, 8, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2015-07-25', '2015-07-25', '101100', '2015-08-22', '2015-08-22', '124109', 'Complete'),
(3, 3, 8, ' Fixing the ceiling ', '2015-08-22', '2015-08-22', '921133', '2015-09-09', '2015-09-09', '1130771', 'Complete'),
(1, 4, 8, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-09-09', '2015-09-09', '33700', '2015-09-22', '2015-09-22', '41369', 'Complete'),
(2, 4, 8, ' Kitchen cabinetry and rooms wardrobes ', '2015-09-09', '2015-09-09', '33700', '2015-09-23', '2015-09-23', '41369', 'Complete'),
(3, 4, 8, ' Floor base and walls finishing ', '2015-09-23', '2015-09-23', '89866', '2015-10-12', '2015-10-12', '110319', 'Complete'),
(4, 4, 8, ' Retaining walls and gardens landscaping ', '2015-10-12', '2015-10-12', '966066', '2015-10-25', '2015-10-25', '1185930', 'Complete'),
(1, 1, 9, 'Structural and architecture design', '2016-05-01', '2016-05-01', '62076', '2016-05-26', '2016-05-26', '58693', 'Complete'),
(2, 1, 9, ' Acquisition of a construction permit ', '2016-05-01', '2016-05-01', '20692', '2016-05-26', '2016-05-26', '19564', 'Complete'),
(3, 1, 9, ' Site clearing, levelling, and utilities accessibility ', '2016-05-01', '2016-05-01', '1986453', '2016-05-26', '2016-05-26', '1878187', 'Complete'),
(1, 2, 9, 'Excavation and foundation construction', '2016-05-26', '2016-05-26', '248306', '2016-06-20', '2016-06-20', '234773', 'Complete'),
(2, 2, 9, ' Floor base/slab and walls ', '2016-06-20', '2016-06-20', '331075', '2016-08-21', '2016-08-21', '313031', 'Complete'),
(3, 2, 9, ' Roof  trusses and cover ', '2016-08-21', '2016-08-21', '1489840', '2016-09-28', '2016-09-28', '1408640', 'Complete'),
(1, 3, 9, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-09-28', '2016-09-28', '186230', '2016-10-28', '2016-10-28', '176080', 'Complete'),
(2, 3, 9, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2016-09-28', '2016-09-28', '186230', '2016-10-28', '2016-10-28', '176080', 'Complete'),
(3, 3, 9, ' Fixing the ceiling ', '2016-10-28', '2016-10-28', '1696762', '2016-11-17', '2016-11-17', '1604284', 'Complete'),
(1, 4, 9, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-11-17', '2016-11-17', '62076', '2016-12-02', '2016-12-02', '58693', 'Complete'),
(2, 4, 9, ' Kitchen cabinetry and rooms wardrobes ', '2016-11-17', '2016-11-17', '62076', '2016-12-02', '2016-12-02', '58693', 'Complete'),
(3, 4, 9, ' Floor base and walls finishing ', '2016-12-02', '2016-12-02', '165537', '2016-12-22', '2016-12-22', '156515', 'Complete'),
(4, 4, 9, ' Retaining walls and gardens landscaping ', '2016-12-22', '2016-12-22', '1779531', '2017-01-06', '2017-01-06', '1682542', 'Complete'),
(1, 1, 10, 'Structural and architecture design', '2017-01-19', '2017-01-19', '285856', '2017-02-19', '2017-02-19', '281859', 'In Progress'),
(2, 1, 10, ' Acquisition of a construction permit ', '2017-01-19', '2017-01-19', '95285', '2017-02-19', '2017-02-19', '93953', 'In Progress'),
(3, 1, 10, ' Site clearing, levelling, and utilities accessibility ', '2017-01-19', '2017-01-19', '9147413', '2017-02-19', '2017-02-19', '9019488', 'In Progress'),
(1, 2, 10, 'Excavation and foundation construction', '2017-02-19', '2017-02-19', '1143426', '2017-03-22', '2017-03-22', '1127436', 'In Progress'),
(2, 2, 10, ' Floor base/slab and walls ', '2017-06-08', '2017-06-08', '6860560', '2017-06-08', '2017-06-08', '1503248', 'In Progress'),
(3, 2, 10, ' Roof  trusses and cover ', '2017-07-26', '2017-07-26', '857570', '2017-09-02', '2017-09-02', '845577', 'In Progress'),
(1, 3, 10, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-07-26', '2017-07-26', '857570', '2017-09-02', '2017-09-02', '845577', 'In Progress'),
(2, 3, 10, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED', '2017-07-26', '2017-07-26', '857570', '2017-09-02', '2017-09-02', '845577', 'In Progress'),
(3, 3, 10, ' Fixing the ceiling ', '2017-09-02', '2017-09-02', '7813415', '2017-09-27', '2017-09-27', '7704146', 'In Progress'),
(1, 4, 10, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-09-27', '2017-09-27', '285856', '2017-10-15', '2017-10-15', '281859', 'In Progress'),
(2, 4, 10, ' Kitchen cabinetry and rooms wardrobes ', '2017-09-27', '2017-09-27', '285856', '2017-10-16', '2017-10-16', '281859', 'In Progress'),
(3, 4, 10, ' Floor base and walls finishing ', '2017-10-16', '2017-10-16', '762284', '2017-11-11', '2017-11-11', '751624', 'In Progress'),
(4, 4, 10, ' Retaining walls and gardens landscaping ', '2017-11-11', '2017-11-11', '8194558', '2017-11-29', '2017-11-29', '8079958', 'In Progress');

--
-- Triggers `task`
--
DELIMITER $$
CREATE TRIGGER `update_project_total_based_on_tasks_insert` AFTER INSERT ON `task` FOR EACH ROW update project p
inner join task t on 
	p.projectID = t.projectID
set p.actualCost = SUM(t.actualCost), p.estimatedCost = SUM(t.estimatedCost)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_project_total_based_on_tasks_update` AFTER UPDATE ON `task` FOR EACH ROW update project p
inner join task t on 
	p.projectID = t.projectID
set p.actualCost = SUM(t.actualCost), p.estimatedCost = SUM(t.estimatedCost)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companystaff`
--
ALTER TABLE `companystaff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `paymentsorders`
--
ALTER TABLE `paymentsorders`
  ADD PRIMARY KEY (`paymentOrderID`);

--
-- Indexes for table `paymentstask`
--
ALTER TABLE `paymentstask`
  ADD PRIMARY KEY (`paymentTaskID`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`phaseID`,`projectID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `projectManagerID` (`projectManagerID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`,`phaseID`,`projectID`),
  ADD KEY `phaseID` (`phaseID`),
  ADD KEY `projectID` (`projectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companystaff`
--
ALTER TABLE `companystaff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `paymentsorders`
--
ALTER TABLE `paymentsorders`
  MODIFY `paymentOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `paymentstask`
--
ALTER TABLE `paymentstask`
  MODIFY `paymentTaskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
