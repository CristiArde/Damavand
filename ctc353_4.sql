-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 08:50 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

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
  `position` varchar(30) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companystaff`
--

INSERT INTO `companystaff` (`staffID`, `position`, `firstName`, `lastName`, `email`) VALUES
(1, 'Project Manager', 'Ramiro', 'Ortiz', 'RickOrt@damavand.com'),
(2, 'Project Manager', 'Kristen', 'Allison', 'KristAll@damavand.com'),
(3, 'Project Assistant', 'Roman', 'Morgan', 'RomanMorg@damavand.com'),
(4, 'Project Assistant', 'Rickey', 'Ngyuen', 'RickNgy@damavand.com'),
(5, 'Project Assistant', 'Domingo', 'Stanley', 'DomingoStan@damavand.com'),
(6, 'Project Assistant', 'Luz', 'Huff', 'LuzHuff@damavand.com'),
(7, 'Project Assistant', 'Clarence', 'Cain', 'CCain@damavand.com'),
(8, 'Project Manager', 'Reginald', 'Singleton', 'RegSing@damavand.com'),
(9, 'Project Manager', 'Brandy', 'Edwards', 'BrandEd@damavand.com'),
(10, 'Project Manager', 'Benny', 'Gonzalez', 'BennyGon@damavand.com'),
(11, 'Saftey Manager', 'Christy', 'Wilkerson', 'CWilker@damavand.com'),
(12, 'Saftey Manager', 'Wilfred', 'Malone', 'WilfMal@damavand.com'),
(13, 'Saftey Manager', 'Santiago', 'Fraizer', 'SanFraiz@damavand.com'),
(14, 'Saftey Manager', 'Alberto', 'Vaughn', 'AlbVaugh@damavand.com'),
(15, 'Site Manager', 'Leslie', 'Mccoy', 'LeslMc@damavand.com'),
(16, 'Site Manager', 'Karl', 'Conner', 'KarlCon@damavand.com'),
(17, 'Company Director', 'Steve', 'Mitchell', 'SteveMitch@damavand.com'),
(18, 'Company Director', 'Henrietta', 'Park', 'HenrPark@damavand.com'),
(19, 'Project Assistant', 'Rose', 'Graham', 'RoseGrah@damavand.com'),
(20, 'Project Assistant', 'Kim', 'Bowman', 'KimBow@damavand.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `address`, `email`) VALUES
(21, 'Preston', 'Holmes', '2031 40th Street', 'PresHom@gmail.com'),
(22, 'Earnest', 'Perez', '2586 102nd Avenue', 'EarnPre@gmail.com'),
(23, 'Wesley', 'Blair', '4178 40th Street', 'WesBl@gmail.com'),
(24, 'Nelson', 'Cox', '4376 Nelson Street', 'NelCox@gmail.com'),
(25, 'Rosa', 'Fox', '2706 Leslie Street', 'RosaB@gmail.com'),
(26, 'Nellie', 'Harmon', '4013 47th Avenue', 'NelHarm@gmail.com'),
(27, 'Sophia', 'Hamilton', '4168 Halsey Avenue', 'SophHam@gmail.com'),
(28, 'Nora', 'Nunez', '3550 rue Saint-Édouard', 'NorNun@gmail.com'),
(29, 'Lena', 'Little', '3131 St Jean Baptiste St', 'LenLit@gmail.com'),
(30, 'Julio', 'Young', '133 Hyde Park Road', 'JuliYou@gmail.com'),
(31, 'Alison', 'Ross', '1279 Seguin Street', 'AliRoss@gmail.com'),
(32, 'Gretchen', 'Walker', '1078 Main St', 'GretWalk@gmail.com'),
(33, 'Karl', 'Cunnigham', '3423 Baker Street', 'KarlSteph@gmail.com'),
(34, 'Timothy', 'Carlson', '4942 Montreal Road', 'TimCarl@gmail.com'),
(35, 'Marcus', 'Stephens', '3073 Nelson Street', 'MarcSteph@gmail.com'),
(36, 'Walter', 'Reid', '1035 Robson St', 'WalReid@gmail.com'),
(37, 'Byron', 'Beck', '3644 Princess St', 'ByrBeck@gmail.com'),
(38, 'Gwen', 'Stewart', '56 Main St', 'GweSte@gmail.com'),
(39, 'Marsha', 'Simpson', '1519 Central Street', 'MarSimp@gmail.com'),
(40, 'Julian', 'Watson', '4318 White Point Road', 'JuliWat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `unitCost` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'RickOrt@damavand.com', '1234'),
(2, 'KristAll@damavand.com', '1234'),
(3, 'RomanMorg@damavand.com', '1234'),
(4, 'RickNgy@damavand.com', '1234'),
(5, 'DomingoStan@damavand.com', '1234'),
(6, 'LuzHuff@damavand.com', '1234'),
(7, 'CCain@damavand.com', '1234'),
(8, 'RegSing@damavand.com', '1234'),
(9, 'BrandEd@damavand.com', '1234'),
(10, 'BennyGon@damavand.com', '1234'),
(11, 'CWilker@damavand.com', '1234'),
(12, 'WilfMal@damavand.com', '1234'),
(13, 'SanFraiz@damavand.com', '1234'),
(14, 'AlbVaugh@damavand.com', '1234'),
(15, 'LeslMc@damavand.com', '1234'),
(16, 'KarlCon@damavand.com', '1234'),
(17, 'SteveMitch@damavand.com', '1234'),
(18, 'HenrPark@damavand.com', '1234'),
(19, 'RoseGrah@damavand.com', '1234'),
(20, 'KimBow@damavand.com', '1234'),
(21, 'PresHom@gmail.com', '1234'),
(22, 'EarnPre@gmail.com', '1234'),
(23, 'WesBl@gmail.com', '1234'),
(24, 'NelCox@gmail.com', '1234'),
(25, 'RosaB@gmail.com', '1234'),
(26, 'NelHarm@gmail.com', '1234'),
(27, 'SophHam@gmail.com', '1234'),
(28, 'NorNun@gmail.com', '1234'),
(29, 'LenLit@gmail.com', '1234'),
(30, 'JuliYou@gmail.com', '1234'),
(31, 'AliRoss@gmail.com', '1234'),
(32, 'GretWalk@gmail.com', '1234'),
(33, 'KarlSteph@gmail.com', '1234'),
(34, 'TimCarl@gmail.com', '1234'),
(35, 'MarcSteph@gmail.com', '1234'),
(36, 'WalReid@gmail.com', '1234'),
(37, 'ByrBeck@gmail.com', '1234'),
(38, 'GweSte@gmail.com', '1234'),
(39, 'MarSimp@gmail.com', '1234'),
(40, 'JuliWat@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `phaseID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `totalCost` decimal(10,0) NOT NULL,
  `orderDate` date NOT NULL,
  `estimatedDeliveryDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(11) NOT NULL,
  `phaseID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE `phase` (
  `phaseID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `taskName` varchar(30) NOT NULL,
  `estimatedCost` decimal(10,0) NOT NULL,
  `actualCost` decimal(10,0) NOT NULL,
  `estimatedStartDate` date NOT NULL,
  `estimatedEndDate` date NOT NULL,
  `actualStartDate` date NOT NULL,
  `actualEndDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `projectName` varchar(30) NOT NULL,
  `projectManagerID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `siteAddress` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `estimatedCost` decimal(10,0) NOT NULL,
  `actualCost` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `projectName`, `projectManagerID`, `startDate`, `endDate`, `siteAddress`, `status`, `estimatedCost`, `actualCost`) VALUES
(1, 'Rajwinders Dog House', 3, '2015-12-17', '2017-03-28', '4931 Wilferem', 'InProgress', '10000000', '0'),
(2, 'Rajwinders Slave House', 7, '2016-10-01', '2018-05-29', '4931 Wilferem', 'InProgress', '100', '125'),
(3, 'Rajwinders Sacrifice House', 7, '2017-11-01', '2018-08-06', '4931 Wilferem', 'InProgress', '10100', '125000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(30) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`phaseID`,`projectID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
