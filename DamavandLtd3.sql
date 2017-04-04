-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 10:46 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP DATABASE ctc353_4;


CREATE DATABASE ctc353_4;

USE ctc353_4;

--
-- Creating table 'CompanyStaff' 
--

CREATE TABLE CompanyStaff (
  staffID INT NOT NULL AUTO_INCREMENT,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  staffPosition varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  PRIMARY KEY (staffID)
) DEFAULT CHARSET=latin1;

--
-- Dumping data to table 'CompanyStaff' 
--

INSERT INTO CompanyStaff (staffID, staffPosition, firstName, lastName, email) VALUES
(101, 'Company Director', 'Henrietta', 'Park', 'HenrPark@damavand.com');
INSERT INTO companystaff (staffPosition, firstName, lastName, email) VALUES
('Project Manager', 'Kristen', 'Allison', 'KristAll@damavand.com'),
('Structural Engineer', 'Roman', 'Morgan', 'RomanMorg@damavand.com'),
('Architect', 'Rickey', 'Ngyuen', 'RickNgy@damavand.com'),
('Project Manager', 'Domingo', 'Stanley', 'DomingoStan@damavand.com'),
('Project Assistant', 'Luz', 'Huff', 'LuzHuff@damavand.com'),
('Project Assistant', 'Clarence', 'Cain', 'CCain@damavand.com'),
('Project Manager', 'Reginald', 'Singleton', 'RegSing@damavand.com'),
('Project Manager', 'Brandy', 'Edwards', 'BrandEd@damavand.com'),
('Project Assistant', 'Benny', 'Gonzalez', 'BennyGon@damavand.com');

-- --------------------------------------------------------

--
-- Table structure for table 'Customer'
--

CREATE TABLE Customer (
  customerID INT NOT NULL AUTO_INCREMENT,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  address varchar(50) NOT NULL,
  telephone varchar(15) NOT NULL,
  email varchar(25) NOT NULL,
  PRIMARY KEY (customerID)
) DEFAULT CHARSET=latin1;

--
-- Dumping data to table 'Customer'
--

INSERT INTO Customer (customerID, firstName, lastName, address, telephone, email) VALUES
(201, 'Preston', 'Holmes', '2031 40th Street, Montreal', '514-402-3109', 'PresHom@gmail.com');
INSERT INTO customer (firstName, lastName, address, telephone, email) VALUES
('Earnest', 'Perez', '2586 102nd Avenue, Longueuil', '514-402-3109', 'EarnPre@gmail.com'),
('Wesley', 'Blair', '4178 40th Street, Longueuil', '514-402-3109', 'WesBl@gmail.com'),
('Nelson', 'Cox', '4376 Nelson Street, Laval', '514-402-3109', 'NelCox@gmail.com'),
('Rosa', 'Fox', '2706 Leslie Street, Laval', '514-402-3109', 'RosaB@gmail.com'),
('Nellie', 'Harmon', '4013 47th Avenue, Montreal', '514-402-3109', 'NelHarm@gmail.com'),
('Sophia', 'Hamilton', '4168 Halsey Avenue, Montreal', '514-402-3109', 'SophHam@gmail.com'),
('Nora', 'Nunez', '3550 rue Saint-Édouard, Saint-Laurent', '514-402-3109', 'NorNun@gmail.com'),
('Lena', 'Little', '3131 St Jean Baptiste St, Montreal', '514-402-3109', 'LenLit@gmail.com'),
('Julio', 'Young', '133 Hyde Park Road, Montreal', '514-402-3109', 'JuliYou@gmail.com');


-- --------------------------------------------------------

--
-- Table structure for table 'Project'
--

CREATE TABLE Project (
  projectID INT NOT NULL AUTO_INCREMENT,
  projectName varchar(100) NOT NULL,
  projectManagerID int not null,
  customerID int not null,
  startDate date NOT NULL,
  estimatedEndDate date NOT NULL,
  siteAddress varchar(50) NOT NULL,
  status varchar(50) NOT NULL,
  estimatedCost decimal(10,0) NOT NULL,
  adjustedCost decimal(10,0) NOT NULL,
  PRIMARY KEY (projectID),
  FOREIGN KEY (projectManagerID) REFERENCES CompanyStaff (staffID)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (customerID) REFERENCES Customer (customerID)
  ON DELETE CASCADE
  ON UPDATE CASCADE
  ) DEFAULT CHARSET=latin1;


  
 
-- Dumping data to table 'Project': PM: 100-05, 08, 09, 12, 13; CUstomer: 200-01....20


INSERT INTO Project (projectID, projectName, projectManagerID, customerID, startDate, estimatedEndDate, siteAddress, status, estimatedCost, adjustedCost) VALUES
(1,'Construction of a bungalow house', 105, 210, '2016-07-15', '2016-09-18', 'Ahuntsic', 'finished', 286668, 294668);

INSERT INTO Project (projectName, projectManagerID, customerID, startDate, estimatedEndDate, siteAddress, status, estimatedCost, adjustedCost) VALUES
('Construction of a bungalow house type Diacono', 102, 208, '2015-04-27', '2015-07-02', 'Laval', 'finished', 282668, 331336),
('Construction of a bungalow house type Luberon', 108, 201, '2017-03-11', '2017-05-24', 'Saint-Laurent', 'on-going', 308000, 327336),
('Construction of a cottage house type Richburg', 105, 204, '2015-07-18', '2015-12-03', 'Brossard', 'finished', 706668, 702668),
('Construction of a cottage house type Richbur', 109, 209, '2017-02-19', '2017-07-12', 'Saint-Bruneau', 'on-going', 722668, 698800),
('Construction of a semi-detached house type Moscato', 102, 205, '2016-02-13', '2016-07-10', 'Verdun', 'finished', 749336, 722668),
('Construction of a semi-detached house type Ripasso', 109, 207, '2015-04-17', '2015-10-10', 'Verdun', 'finished', 705336, 730668),
('Construction of a condos building type Studio', 102, 202, '2015-03-12', '2015-10-25', 'Ville-Marie', 'finished', 13480, 16547868),
('Construction of a condos building type 1-2 bedroom2', 108, 203, '2016-05-01', '2017-01-06', 'West Island', 'finished', 24830668, 23477336),
('Construction of a condos building type Mixed', 109, 206, '2017-01-19', '2017-11-29', 'Saint-Lambert', 'on-going', 114342668, 112743600);




-- Table structure for table 'Phase'


CREATE TABLE Phase (
phaseID INT NOT NULL,
projectID INT NOT NULL,
phaseName VARCHAR (50),
estimatedStartDate DATE NOT NULL,
estimatedEndDate DATE NOT NULL,
PRIMARY KEY (phaseID, projectID),
FOREIGN KEY (projectID) REFERENCES Project (projectID)
ON DELETE CASCADE
ON UPDATE CASCADE
) DEFAULT CHARSET=latin1;




-- Dumping data to table 'Phase'


INSERT INTO Phase (phaseID, phaseName, projectID, estimatedStartDate, estimatedEndDate) VALUES
(1, 'Preliminary activities', 1, '2016-07-15', '2016-07-21'),
(1, 'Preliminary activities', 2, '2015-04-27', '2015-05-03'),
(1, 'Preliminary activities', 3, '2017-03-11', '2017-03-18'),
(1, 'Preliminary activities', 4, '2015-07-18', '2015-07-31'),
(1, 'Preliminary activities', 5, '2017-02-19', '2017-03-05'),
(1, 'Preliminary activities', 6, '2016-02-13', '2016-02-27'),
(1, 'Preliminary activities', 7, '2015-04-17', '2015-05-04'),
(1, 'Preliminary activities', 8, '2015-03-12', '2015-04-03'),
(1, 'Preliminary activities', 9, '2015-03-12', '2016-05-26'),
(1, 'Preliminary activities', 10, '2016-05-01', '2017-02-19'),
(2, 'External construction', 1, '2016-07-21', '2016-08-22'),
(2, 'External construction', 2, '2015-05-03', '2015-06-05'),
(2, 'External construction', 3, '2017-03-18', '2017-04-24'),
(2, 'External construction', 4, '2015-07-31', '2015-10-08'),
(2, 'External construction', 5, '2017-03-05', '2017-05-15'),
(2, 'External construction', 6, '2016-02-27', '2016-05-11'),
(2, 'External construction', 7, '2015-05-04', '2015-07-31'),
(2, 'External construction', 8, '2015-04-03', '2015-07-25'),
(2, 'External construction', 9, '2016-05-26', '2016-09-28'),
(2, 'External construction', 10, '2017-02-19', '2017-07-26'),
(3, 'Internal construction', 1, '2016-08-22', '2016-09-04'),
(3, 'Internal construction', 2, '2015-06-05', '2015-06-19'),
(3, 'Internal construction', 3, '2017-04-24', '2017-05-09'),
(3, 'Internal construction', 4, '2015-10-08', '2015-11-05'),
(3, 'Internal construction', 5, '2017-05-15', '2017-06-13'),
(3, 'Internal construction', 6, '2016-05-11', '2016-06-10'),
(3, 'Internal construction', 7, '2015-07-31', '2015-09-05'),
(3, 'Preliminary activities', 8, '2015-07-25', '2015-09-09'),
(3, 'Internal construction', 9, '2016-09-28', '2016-11-17'),
(3, 'Internal construction', 10, '2017-07-26', '2017-09-27'),
(4, 'Finishing', 1, '2016-09-04', '2016-09-18'),
(4, 'Finishing', 2, '2015-06-19', '2015-07-02'),
(4, 'Finishing', 3, '2017-05-09', '2017-05-24'),
(4, 'Finishing', 4, '2015-11-05', '2015-12-03'),
(4, 'Finishing', 5, '2017-06-13', '2017-07-12'),
(4, 'Finishing', 6, '2016-06-10', '2016-07-10'),
(4, 'Finishing', 7, '2015-09-05', '2015-10-10'),
(4, 'Finishing', 8, '2015-09-09', '2015-10-25'),
(4, 'Finishing', 9, '2016-11-17', '2017-01-06'),
(4, 'Finishing', 10, '2017-09-27', '2017-11-29');




-- Table structure for table 'Task'


CREATE TABLE Task (
taskID INT NOT NULL,
phaseID INT NOT NULL,
projectID INT NOT NULL,
taskName varchar(100) NOT NULL,
startDate date NOT NULL,
estimatedCost decimal(10,0) NOT NULL,
endDate date NOT NULL,
actualCost decimal(10,0) NOT NULL,
PRIMARY KEY (taskID, phaseID, projectID),
FOREIGN KEY (phaseID) REFERENCES Phase (phaseID)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (projectID) REFERENCES Project (projectID)
ON DELETE CASCADE
ON UPDATE CASCADE
)DEFAULT CHARSET=latin1;




-- Dumping data to table 'Task'


INSERT INTO Task (projectID, phaseID, taskID, taskName, startDate, estimatedCost, endDate, actualCost) VALUES
(1, 1, 1, 'Structural and architecture design', '2016-07-15', 716, '2016-07-21', 736),
(1, 1, 2, ' Acquisition of a construction permit ',  '2016-07-15', 238, '2016-07-21', 245),
(1, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2016-07-15', 22933, '2016-07-21', 23573),
(1, 2, 1, 'Excavation and foundation construction', '2016-07-21', 2866, '2016-07-27', 2946),
(1, 2, 2, ' Floor base/slab and walls ', '2016-07-27', 3822, '2016-08-12', 3928),
(1, 2, 3, ' Roof  trusses and cover ', '2016-08-12', 17200, '2016-08-22', 17680),
(1, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-08-22', 2150, '2016-08-30', 2210),
(1, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2016-08-22', 2150, '2016-08-30', 2210),
(1, 3, 3, ' Fixing the ceiling ', '2016-08-30', 2150, '2016-09-04', 20135),
(1, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-09-04', 716, '2016-09-08', 736),
(1, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2016-09-04', 716, '2016-09-09', 736),
(1, 4, 3, ' Floor base and walls finishing ', '2016-09-09', 1911, '2016-09-15', 1964),
(1, 4, 4, ' Retaining walls and gardens landscaping ', '2016-09-15', 20544, '2016-09-18', 21118),
(2, 1, 1, 'Structural and architecture design', '2015-04-27', 706, '2015-05-03', 828),
(2, 1, 2, ' Acquisition of a construction permit ',  '2015-04-27', 235, '2015-05-03', 276),
(2, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2015-04-27', 22613, '2015-05-03', 26507),
(2, 2, 1, 'Excavation and foundation construction', '2015-05-03', 2826, '2015-05-09', 3313),
(2, 2, 2, ' Floor base/slab and walls ', '2015-05-09', 3768, '2015-05-25', 4417),
(2, 2, 3, ' Roof  trusses and cover ', '2015-05-25', 16960, '2015-06-05', 19880),
(2, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-06-05', 2120, '2015-06-14', 2485),
(2, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2015-06-05', 2120, '2015-06-14', 2485),
(2, 3, 3, ' Fixing the ceiling ', '2015-06-14', 19315, '2015-06-19', 22641),
(2, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-06-19', 706, '2015-06-22', 828),
(2, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2015-06-19', 706, '2015-06-23', 828),
(2, 4, 3, ' Floor base and walls finishing ', '2015-06-23', 1884, '2015-06-29', 2208),
(2, 4, 4, ' Retaining walls and gardens landscaping ', '2015-06-29', 20258, '2015-07-02', 23746),
(3, 1, 1, 'Structural and architecture design', '2017-03-11', 770, '2017-03-18', 818),
(3, 1, 2, ' Acquisition of a construction permit ',  '2017-03-11', 256, '2017-03-18', 272),
(3, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2017-03-11', 24640, '2017-03-18', 26187),
(3, 2, 1, 'Excavation and foundation construction', '2017-03-18', 3080, '2017-03-25', 3273),
(3, 2, 2, ' Floor base/slab and walls ', '2017-03-25', 4106, '2017-04-12', 4364),
(3, 2, 3, ' Roof  trusses and cover ', '2017-04-12', 18480, '2017-04-24', 19640),
(3, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-04-24', 2310, '2017-05-03', 2455),
(3, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2017-04-24', 2310, '2017-05-03', 2455),
(3, 3, 3, ' Fixing the ceiling ', '2017-05-03', 21046, '2017-05-09', 22368),
(3, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-05-09', 770, '2017-05-13', 818),
(3, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2017-05-09', 770, '2017-05-14', 818),
(3, 4, 3, ' Floor base and walls finishing ', '2017-05-14', 2053, '2017-05-20', 2182),
(3, 4, 4, ' Retaining walls and gardens landscaping ', '2017-05-20', 22073, '2017-05-24', 23459),
(4, 1, 1, 'Structural and architecture design', '2015-07-18', 1766, '2015-07-31', 1756),
(4, 1, 2, ' Acquisition of a construction permit ',  '2015-07-18', 588, '2015-07-31', 585),
(4, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2015-07-18', 56533, '2015-07-31', 56213),
(4, 2, 1, 'Excavation and foundation construction', '2015-07-31', 7066, '2015-08-13', 7026),
(4, 2, 2, ' Floor base/slab and walls ', '2015-08-13', 9422, '2015-09-16', 9368),
(4, 2, 3, ' Roof  trusses and cover ', '2015-09-16', 42400, '2015-10-08', 42160),
(4, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-10-08', 5300, '2015-10-25', 5270),
(4, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2015-10-08', 5300, '2015-10-25', 5270),
(4, 3, 3, ' Fixing the ceiling ', '2015-10-25', 48289, '2015-11-05', 48015),
(4, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-11-05', 1766, '2015-11-13', 1756),
(4, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2015-11-05', 1766, '2015-11-14', 1756),
(4, 4, 3, ' Floor base and walls finishing ', '2016-09-09', 4711, '2015-11-26', 4684),
(4, 4, 4, ' Retaining walls and gardens landscaping ', '2015-11-26', 50644, '2015-12-03', 50358),
(5, 1, 1, 'Structural and architecture design', '2017-02-19', 1806, '2017-03-05', 1747),
(5, 1, 2, ' Acquisition of a construction permit ',  '2017-02-19', 602, '2017-03-05', 582),
(5, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2017-02-19', 57813, '2017-03-05', 55904),
(5, 2, 1, 'Excavation and foundation construction', '2017-03-05', 7226, '2017-03-19', 6988),
(5, 2, 2, ' Floor base/slab and walls ', '2017-03-19', 9635, '2017-04-23', 9317),
(5, 2, 3, ' Roof  trusses and cover ', '2017-04-23', 43360, '2017-05-15', 41928),
(5, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-05-15', 5420, '2017-06-02', 5241),
(5, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2017-05-15', 5420, '2017-06-02', 5241),
(5, 3, 3, ' Fixing the ceiling ', '2017-06-02', 49382, '2017-06-13', 47751),
(5, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-06-13', 1806, '2017-06-21', 1747),
(5, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2017-06-13', 1806, '2017-06-22', 1747),
(5, 4, 3, ' Floor base and walls finishing ', '2017-06-22', 4817, '2017-07-04', 4658),
(5, 4, 4, ' Retaining walls and gardens landscaping ', '2017-07-04', 51791, '2017-07-12', 50080),
(6, 1, 1, 'Structural and architecture design', '2017-07-04', 51791, '2017-07-12', 1806),
(6, 1, 2, ' Acquisition of a construction permit ',  '2016-02-13', 1873, '2016-02-27', 602),
(6, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2016-02-13', 59947, '2016-02-27', 57813),
(6, 2, 1, 'Excavation and foundation construction', '2016-02-27', 7493, '2016-03-12', 7226),
(6, 2, 2, ' Floor base/slab and walls ', '2016-03-12', 9991, '2016-04-18', 9635),
(6, 2, 3, ' Roof  trusses and cover ', '2016-04-18', 44960, '2016-05-11', 43360),
(6, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-05-11', 5620, '2016-05-29', 5420),
(6, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2016-05-11', 5620, '2016-05-29', 5420),
(6, 3, 3, ' Fixing the ceiling ', '2016-05-29', 51204, '2016-06-10', 49382),
(6, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-06-10', 1873, '2016-06-19', 1806),
(6, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2016-06-10', 1873, '2016-06-19', 1806),
(6, 4, 3, ' Floor base and walls finishing ', '2016-06-19', 4995, '2016-07-01', 4817),
(6, 4, 4, ' Retaining walls and gardens landscaping ', '2016-07-01', 53702, '2016-07-10', 51791),
(7, 1, 1, 'Structural and architecture design', '2015-03-12', 33700, '2015-04-03', 41369),
(7, 1, 2, ' Acquisition of a construction permit ',  '2015-04-17', 587, '2015-05-04', 608),
(7, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2015-04-17', 56427, '2015-05-04', 58453),
(7, 2, 1, 'Excavation and foundation construction', '2015-05-04', 7053, '2015-05-21', 7306),
(7, 2, 2, ' Floor base/slab and walls ', '2015-05-21', 9404, '2015-07-04', 9742),
(7, 2, 3, ' Roof  trusses and cover ', '2015-07-04', 42320, '2015-07-31', 43840),
(7, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-07-31', 5290, '2015-08-22', 5480),
(7, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2015-07-31', 5290, '2015-08-22', 5480),
(7, 3, 3, ' Fixing the ceiling ', '2015-08-22', 48198, '2015-09-05', 49929),
(7, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-09-05', 1763, '2015-09-15', 1826),
(7, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2015-09-05', 1763, '2015-09-16', 1826),
(7, 4, 3, ' Floor base and walls finishing ', '2015-09-16', 4702, '2015-09-30', 4871),
(7, 4, 4, ' Retaining walls and gardens landscaping ', '2015-09-30', 50549, '2015-10-10', 52364),
(8, 1, 1, 'Structural and architecture design', '2015-03-12', 33700, '2015-04-03', 41369),
(8, 1, 2, ' Acquisition of a construction permit ',  '2015-03-12', 11233, '2015-04-03', 13789),
(8, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2015-03-12', 1078400, '2015-04-03', 1323829),
(8, 2, 1, 'Excavation and foundation construction', '2015-04-03', 134800, '2015-04-25', 165478),
(8, 2, 2, ' Floor base/slab and walls ', '2015-04-25', 179733, '2015-06-20', 220638),
(8, 2, 3, ' Roof  trusses and cover ', '2015-06-20', 808800, '2015-07-25', 992872),
(8, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2015-07-25', 101100, '2015-08-22', 124109),
(8, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2015-07-25', 101100, '2015-08-22', 124109),
(8, 3, 3, ' Fixing the ceiling ', '2015-08-22', 921133, '2015-09-09', 1130771),
(8, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2015-09-09', 33700, '2015-09-22', 41369),
(8, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2015-09-09', 33700, '2015-09-23', 41369),
(8, 4, 3, ' Floor base and walls finishing ', '2015-09-23', 89866, '2015-10-12',110319),
(8, 4, 4, ' Retaining walls and gardens landscaping ', '2015-10-12', 966066, '2015-10-25', 1185930),
(9, 1, 1, 'Structural and architecture design', '2016-05-01', 62076, '2016-05-26', 58693),
(9, 1, 2, ' Acquisition of a construction permit ',  '2016-05-01', 20692, '2016-05-26', 19564),
(9, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2016-05-01', 1986453, '2016-05-26', 1878187),
(9, 2, 1, 'Excavation and foundation construction', '2016-05-26', 248306, '2016-06-20', 234773),
(9, 2, 2, ' Floor base/slab and walls ', '2016-06-20', 331075, '2016-08-21', 313031),
(9, 2, 3, ' Roof  trusses and cover ', '2016-08-21', 1489840, '2016-09-28', 1408640),
(9, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2016-09-28', 186230, '2016-10-28', 176080),
(9, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2016-09-28', 186230, '2016-10-28', 176080),
(9, 3, 3, ' Fixing the ceiling ', '2016-10-28', 1696762, '2016-11-17', 1604284),
(9, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2016-11-17', 62076, '2016-12-02', 58693),
(9, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2016-11-17', 62076, '2016-12-02', 58693),
(9, 4, 3, ' Floor base and walls finishing ', '2016-12-02', 165537, '2016-12-22', 156515),
(9, 4, 4, ' Retaining walls and gardens landscaping ', '2016-12-22', 1779531, '2017-01-06', 1682542),
(10, 1, 1, 'Structural and architecture design', '2017-01-19', 285856, '2017-02-19', 281859),
(10, 1, 2, ' Acquisition of a construction permit ',  '2017-01-19', 95285, '2017-02-19', 93953),
(10, 1, 3, ' Site clearing, levelling, and utilities accessibility ',  '2017-01-19', 9147413, '2017-02-19', 9019488),
(10, 2, 1, 'Excavation and foundation construction', '2017-02-19', 1143426, '2017-03-22', 1127436),
(10, 2, 2, ' Floor base/slab and walls ', '2017-06-08', 6860560, '2017-06-08', 1503248),
(10, 2, 3, ' Roof  trusses and cover ', '2017-07-26', 857570, '2017-09-02', 845577),
(10, 3, 1, ' HVAC, water systems and plumbing -SUBCONTRACTED', '2017-07-26', 857570, '2017-09-02', 845577),
(10, 3, 2, ' Wiring works (electricity, telephone, internet, fire safety) and building insulation -SUBCONTRACTED ', '2017-07-26', 857570, '2017-09-02', 845577),
(10, 3, 3, ' Fixing the ceiling ', '2017-09-02', 7813415, '2017-09-27', 7704146),
(10, 4, 1, ' utility fixtures (electricity, telephone, internet and fire safety) -SUBCONTRACTED', '2017-09-27', 285856, '2017-10-15', 281859),
(10, 4, 2, ' Kitchen cabinetry and rooms wardrobes ', '2017-09-27', 285856, '2017-10-16', 281859),
(10, 4, 3, ' Floor base and walls finishing ', '2017-10-16', 762284, '2017-11-11', 751624),
(10, 4, 4, ' Retaining walls and gardens landscaping ', '2017-11-11', 8194558, '2017-11-29', 8079958);




-- Table structure for table 'supplier'


CREATE TABLE Supplier (
  supplierID INT NOT NULL AUTO_INCREMENT,
  supplierName varchar(50) NOT NULL,
  contactPerson varchar(50) NOT NULL,
  address varchar(50) NOT NULL,
  phoneNumber varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (supplierID)
) DEFAULT CHARSET=latin1;



-- Dumping data for table 'Suppliers'

INSERT INTO Supplier (supplierID, supplierName, contactPerson, address, phonenumber, email) VALUES
(301, 'Laurentide Builders Supply Inc', 'Jeannie Neumann', '6275 Av Papineau, Montréal, QC H2G 2X1', '438-796-1171', 'j.neumann@gmail.com');
INSERT INTO Supplier (supplierName, contactPerson, address, phonenumber, email) VALUES
('Agrafbec Ltee', 'Mary Johnson', '11000, rue Mirabeau, Anjou, QC H1J 2S3', '514-353-3040', 'm.johnson@google.com'),
('Les Distributions BMB sec', 'Derik Lingham', '4500 rue Bernard-Lefèbvre, Laval, QC H7C 0A5', '514-382-6520', 'd.Lignham@hotamil.com'),
('Barette Structural Inc', 'Harry Schmitt', '2907, boul Dagenais O, Laval, QC H7P 1T2', '450-622-4900', 'h.Schmitt@gmail.com'),
('Acadia Drywall Supplies', 'Ludovik Gonzalez', '1289 rue Newton, Boucherville, QC J4B 5H2', '450-655-5100', 'l.Gonzalez@gmail.com'),
('Edouard Beauchesne Inc', 'Gregory Humphrey', '3600 rue Richelieu, Saint-Hubert, QC J3Y 7B1', '450-466-1637', 'g.humphrey@gmail.com'),
('Continental Building Products Canada Ltd', 'Harold White', '8802 boul Industriel, Chambly, QC J3L 4X3', '514-915-5694', 'h.white@gmail.com'),
('Nampac Building Products Intl', 'Kim Yanglei', '3333 boul Cavendish, Montréal, QC H4B 2M5', '514-935-5202', 'jk.yanglei@gmail.com'),
('Materiaux Coupal Inc', 'Liz Frey', '800 rue de la Gauchetière O, Montréal, QC H5A 1K6', '514-861-4103', 'l.frey@gmail.com'),
('NCA Accessoires pour Beton National', 'Charline Chavez', '9125, rue Pascal-Gagnon, Saint-Léonard, QC H1P 1Z4', '514-327-9333', 'c.chavez@gmail.com');




-- Table structure for table 'login'


CREATE TABLE login (
  userID int NOT NULL,
  username varchar(25) NOT NULL,
  password varchar(25) NOT NULL,
  PRIMARY KEY (userID)
) DEFAULT CHARSET=latin1;





-- Dumping data for table 'login'


INSERT INTO login (userID, username, password) VALUES
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


-- Table structure for table 'Orders'


CREATE TABLE Orders (
  orderID int NOT NULL AUTO_INCREMENT,
  projectID int NOT NULL,
  supplierID int NOT NULL,
  totalCost decimal(10,0) NOT NULL,
  orderDate date NOT NULL,
  estimatedDeliveryDate date NOT NULL,
  PRIMARY KEY (orderID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO Orders (orderID, projectID, supplierID, totalCost, orderDate, estimatedDeliveryDate) VALUES
(27,1, 301, 4000,'2017-10-16', '2017-12-16');
INSERT INTO Orders (projectID, supplierID, totalCost, orderDate, estimatedDeliveryDate) VALUES
(1, 301, 400,'2017-09-06', '2017-10-16'),
(1, 301, 100,'2017-01-16', '2017-03-23'),
(1, 303, 500,'2013-03-06', '2013-10-16'),
(2, 305, 5400,'2014-09-06', '2014-10-16'),
(3, 307, 4800,'2012-09-06', '2013-10-16'),
(2, 306, 300,'2017-09-06', '2017-10-16'),
(3, 305, 1400,'2017-09-06', '2017-10-16'),
(4, 310, 6400,'2017-09-06', '2017-10-16'),
(5, 307, 4700,'2017-09-06', '2017-10-16'),
(5, 309, 6800,'2017-09-06', '2017-10-16'),
(10, 303, 460,'2017-09-06', '2017-10-16'),
(6, 307, 1230,'2017-09-06', '2017-10-16'),
(8, 304, 4650,'2017-09-06', '2017-10-16'),
(9, 302, 5640,'2017-09-06', '2017-10-16'),
(6, 303, 4210,'2017-09-06', '2017-10-16'),
(7, 305, 500,'2017-09-06', '2017-10-16'),
(9, 306, 7400,'2017-09-06', '2017-10-16'),
(10, 306, 7800,'2017-09-06', '2017-10-16'),
(4, 304, 440,'2017-09-06', '2017-10-16'),
(6, 305, 900,'2017-09-06', '2017-10-16'),
(6, 306, 2100,'2017-09-06', '2017-10-16'),
(10, 304, 2100,'2017-09-06', '2017-10-16'),
(4, 308, 1230,'2017-09-06', '2017-10-16');








-- Table structure for table 'Items'


CREATE TABLE Items (
  itemID int(11) NOT NULL AUTO_INCREMENT,
  orderID int(11) NOT NULL,
  supplierID int(11) NOT NULL,
  itemName varchar(30) NOT NULL,
  unitCost decimal(10,0) NOT NULL,
  quantity int(11) NOT NULL,
  PRIMARY KEY (itemID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO Items (itemID, orderID, supplierID, itemName, unitCost, quantity) VALUES 
(1, 27, 301, 'Steel Nail 2.5"', 225, 50);
INSERT INTO Items (orderID, supplierID, itemName, unitCost, quantity) VALUES 
( 27, 302, 'Birch Plywood', 10, 1000),
( 28, 303, 'Binding wire 1kg', 5.50, 100),
( 27, 304, 'Wood Nail 3" 5kg', 18, 35),
( 29, 305, 'Steel Nail 2"', 216, 50),
( 30, 306, 'Steel Nail 3"', 252, 50),
( 31, 309, 'Site Work (Permit & Planning)', 16000, 1),
( 32, 307, 'Site Work (Permit & Planning)', 18000, 1),
( 33, 308, 'Site Work (Permit & Planning)', 17600, 1),
( 34, 309, 'Site Work (Permit & Planning)', 28000, 1),
( 35, 310, 'Site Work (Permit & Planning)', 16092, 1),
( 33, 301, 'Site Work (Permit & Planning)', 17650, 1),
( 28, 302, 'Site Work (Permit & Planning)', 18026, 1),
( 39, 303, 'Site Work (Permit & Planning)', 12065, 1),
( 40, 304, 'Site Work (Permit & Planning)', 13111, 1),
( 45, 305, 'Site Work (Permit & Planning)', 12654, 1),
( 46, 306, 'Site Work (Permit & Planning)', 15623, 1),
( 41, 307, 'Hessian cloth 1000 yard', 102, 30),
( 33, 308, 'Blue Fiber Mesh 50m', 62.40, 250),
( 44, 309, 'Polythene Sheet 100g', 6, 1000),
( 47, 310, 'Polythene Sheet 800g', 33.60, 80),
( 48, 301, 'PVC Bucket Yellow H/D', 10.80, 45),
( 49, 302, 'Hand Shovel China ', 30, 20),
( 50, 303, 'Safety Mesh  Orange 1x50', 54, 1),
( 44, 304, 'Leather Gloves', 54, 1),
( 50, 305, 'Warning Tape', 13.20, 1),
( 33, 306, 'Nylon Rope 3mm', 4.80, 1),
( 44, 307, 'Cement bags', 50, 50),
( 27, 308, 'Wall Tiles', 25, 250),
( 29, 309, 'Paving Stone', 48, 320),
( 31, 310, 'Flush Door', 100, 25),
( 30, 301, 'Window (32"W x 38" H)', 100, 5),
( 45, 302, 'Window (24"W x 19" H)', 80, 4),
( 47, 303, 'Insulation', 10, 22),
( 48, 304, 'Brick', 100, 25),
( 49, 305, 'Heatpump', 100, 25);


-- Table structure for table 'payments'


CREATE TABLE PaymentsOrders (
  paymentOrderID int(11) NOT NULL AUTO_INCREMENT,
  orderID int(11) NOT NULL,
  supplierID int(11) NOT NULL,
  paid int(11) NOT NULL,
  totalAmount int(11) NOT NULL,
  PRIMARY KEY (paymentOrderID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




INSERT INTO PaymentsOrders (paymentOrderID, orderID, supplierID, paid, totalAmount) VALUES
(1,27,301,500,4000);
INSERT INTO PaymentsOrders (orderID, supplierID, paid, totalAmount) VALUES
(28,302,400,400),
(29,303,50,100),
(30,304,400,500),
(31,305,5000,5400),
(32,306,4800,4800),
(33,307,300,300),
(34,308,1000,1400),
(35,309,5000,6400),
(36,310,4700,4700),
(37,301,6500,6800),
(38,302,460,460),
(39,303,1000,1230),
(40,304,3000,4650),
(41,305,5640,5640),
(42,306,4210,4210),
(43,307,500,500),
(44,308,7000,7400),
(45,309, 7800,7800),
(46,310,440,440),
(47,301,900,900),
(48,302,2000,2100),
(49,303,700,2100),
(50,304,1230,1230);





CREATE TABLE PaymentsTask (
  paymentTaskID int(11) NOT NULL AUTO_INCREMENT, 
  projectID int(11) NOT NULL, 
  phaseID int(11) NOT NULL,
  taskID int(11) NOT NULL,
  supplierID int(11) NOT NULL,
  paid int(11) NOT NULL,
  totalAmount int(11) NOT NULL,
  PRIMARY KEY (paymentTaskID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;





INSERT INTO PaymentsTask (paymentTaskID, projectID, phaseID, taskID, supplierID, paid, totalAmount) VALUES
(1,1, 1, 1, 310, 736, 736);
INSERT INTO PaymentsTask (projectID, phaseID, taskID, supplierID, paid, totalAmount) VALUES
(1,1,1,301,620,736),
(1,1,2,301,245,245),
(1,1,3,302,2300,23573),
(1,2,1,303,1856,2946),
(1,2,2,304,1500,3928),
(1,2,3,305,2632,17680),
(1,3,1,305,423,2210),
(1,3,2,301,123,2210),
(1,3,3,302,6773,20135),
(1,4,1,303,736,736),
(1,4,2,310,736,736),
(1,4,3,308,1964,1964),
(1,4,4,306,2233,21118),
(2,1,1,303,312,828),
(2,1,2,307,123,276),
(2,1,3,303,5422,26507),
(2,2,1,309,1234,3313),
(2,2,2,309,4417,4417),
(2,2,3,303,1234,19880),
(2,3,1,306,1234,2485),
(2,3,2,306,677,2485),
(2,3,3,302,8900,22641),
(2,4,1,303,512,828),
(2,4,2,307,123,828),
(2,4,3,307,2200,2208),
(2,4,4,309,21345,23746),
(3,1,1,308,818,818),
(3,1,2,305,272,272),
(3,1,3,309,26187,26187),
(3,2,1,307,3200,3273),
(3,2,2,303,2500,4364),
(3,2,3,308,596,19640),
(3,3,1,307,365,2455),
(3,3,2,309,369,2455),
(3,3,3,310,0,22368),
(3,4,1,310,818,818),
(3,4,2,301,818,818),
(3,4,3,301,2182,2182),
(3,4,4,303,2365,23459),
(4,1,1,304,255,1756),
(4,1,2,305,56,585),
(4,1,3,306,56200,56213),
(4,2,1,307,2000,7026),
(4,2,2,303,2563,9368),
(4,2,3,304,26593,42160),
(4,3,1,304,2569,5270),
(4,3,2,309,5230,5270),
(4,3,3,308,5930,48015),
(4,4,1,309,960,1756),
(4,4,2,301,369,1756),
(4,4,3,310,658,4684),
(4,4,4,310,28963,50358),
(5,1,1,305,815,1747),
(5,1,2,307,582,582),
(5,1,3,302,31698,55904),
(5,2,1,302,3829,6988),
(5,2,2,302,4166,9317),
(5,2,3,305,10474,41928),
(5,3,1,305,3382,5241),
(5,3,2,308,2154,5241),
(5,3,3,301,18877,47751),
(5,4,1,310,672,1747),
(5,4,2,301,1484,1747),
(5,4,3,310,1349,4658),
(5,4,4,308,17152,50080),
(6,1,1,310,623,1806),
(6,1,2,301,586,602),
(6,1,3,301,17410,57813),
(6,2,1,305,2925,7226),
(6,2,2,308,8708,9635),
(6,2,3,309,38869,43360),
(6,3,1,302,4713,5420),
(6,3,2,302,3322,5420),
(6,3,3,307,15917,49382),
(6,4,1,301,1781,1806),
(6,4,2,304,754,1806),
(6,4,3,303,625,4817),
(6,4,4,308,42295,51791),
(7,1,1,302,39868,41369),
(7,1,2,309,605,608),
(7,1,3,304,1207,58453),
(7,2,1,307,3314,7306),
(7,2,2,303,8097,9742),
(7,2,3,310,31143,43840),
(7,3,1,309,2711,5480),
(7,3,2,308,3172,5480),
(7,3,3,307,42491,49929),
(7,4,1,310,1733,1826),
(7,4,2,306,1661,1826),
(7,4,3,304,626,4871),
(7,4,4,310,32803,52364),
(8,1,1,304,2226,41369),
(8,1,2,305,8648,13789),
(8,1,3,306,537791,1323829),
(8,2,1,307,72071,165478),
(8,2,2,303,186769,220638),
(8,2,3,305,870257,992872),
(8,3,1,306,43528,124109),
(8,3,2,305,115039,124109),
(8,3,3,301,533658,1130771),
(8,4,1,304,27580,41369),
(8,4,2,306,23036,41369),
(8,4,3,310,6144,110319),
(8,4,4,307,944899,1185930),
(9,1,1,303,48541,58693),
(9,1,2,310,17934,19564),
(9,1,3,302,1794401,1878187),
(9,2,1,301,135139,234773),
(9,2,2,310,51814,313031),
(9,2,3,301,124486,1408640),
(9,3,1,303,102290,176080),
(9,3,2,309,77908,176080),
(9,3,3,302,1188632,1604284),
(9,4,1,308,16542,58693),
(9,4,2,308,3455,58693),
(9,4,3,306,91030,156515),
(9,4,4,307,697868,1682542),
(10,1,1,303,34763,281859),
(10,1,2,304,59091,93953),
(10,1,3,305,3953752,9019488),
(10,2,1,304,1005948,1127436),
(10,2,2,302,246384,1503248),
(10,2,3,310,662438,845577),
(10,3,1,301,697165,845577),
(10,3,2,309,283801,845577),
(10,3,3,309,6347933,7704146),
(10,4,1,309,226204,281859),
(10,4,2,302,50186,281859),
(10,4,3,301,677436,751624),
(10,4,4,305,5110749,8079958);



