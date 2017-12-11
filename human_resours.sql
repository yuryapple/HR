-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2017 at 10:42 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `human_resours`
--

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE `Departments` (
  `idDepartment` int(11) UNSIGNED NOT NULL,
  `nameOfDep` varchar(30) NOT NULL,
  `describeFunction` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`idDepartment`, `nameOfDep`, `describeFunction`) VALUES
(1, 'Human Resource', 'Hire or Fire employee'),
(2, 'IT department', 'Develop new programs'),
(3, 'Bookkeeping department', 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `idEmployee` int(11) UNSIGNED NOT NULL,
  `idDepartment` int(11) UNSIGNED DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `dateOfBirthday` date NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `eMail` varchar(40) NOT NULL,
  `status` enum('trainee','worker','fired') NOT NULL,
  `dateOfHire` date DEFAULT NULL,
  `dateOfFire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Main table for Employees. Consist primary Key. ';

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`idEmployee`, `idDepartment`, `firstName`, `lastName`, `dateOfBirthday`, `telephone`, `eMail`, `status`, `dateOfHire`, `dateOfFire`) VALUES
(1, 1, 'Tom', 'Wood', '1990-11-07', '(456)889-77-78', 'qr@fff.com', 'trainee', '2014-12-18', NULL),
(2, 2, 'Bill', 'White', '1960-10-07', '11111113', 'yg@fff.com', 'worker', '2017-12-06', NULL),
(3, 2, 'Bill', 'Moor', '1970-10-14', '53', 'dhffd@ggg.vo', 'trainee', '2017-12-05', NULL),
(4, 3, 'Brain', 'Tomson', '1950-05-19', '(097)543-24-52', 'hjhjhj@jjh.com', 'fired', '2011-05-18', '2017-12-03'),
(5, 3, 'Anna', 'Flint', '2000-10-26', '(012)353-22-23', 'a1@hhm.bn1', 'fired', '2017-12-07', '2017-12-10'),
(6, 2, 'Sally', 'Cook', '1968-01-28', '(024)678-87-13', 'ttt@ffb.com', 'fired', '2013-10-14', '2017-12-09'),
(7, 1, 'Keon', 'O\'Kon', '1964-01-19', '(095)234-56-78', 'qw@ghj.bgh', 'worker', '2017-12-05', NULL),
(8, 1, 'Tom', 'Glover', '1952-10-12', '(099)776-54-43', 'sfdsfds@hhh.com', 'worker', '2012-05-19', NULL),
(9, 2, 'Shayne', 'Wolf', '1980-04-01', '(095)592-14-43', 'pouros.katrine@friesen.org', 'trainee', '2015-02-09', NULL),
(10, 2, 'Leonel', 'Fadel', '1962-10-02', '(063)311-46-33', 'qmann@yahoo.com', 'trainee', '2015-02-09', NULL),
(11, 2, 'Mervin', 'Walter', '1962-10-02', '(098)501-36-03', 'erippin@blick.com', 'trainee', '2015-02-09', NULL),
(12, 2, 'Karl', 'Barton', '1962-10-02', '(063)311-46-33', 'cheyenne83@gmail.com', 'trainee', '2015-02-09', NULL),
(13, 2, 'Rosella', 'Nienow', '1980-04-01', '(098)501-11-03', 'fcollier@dare.com', 'trainee', '2015-02-09', NULL),
(14, 3, 'Vaughn', 'Kulas', '1980-04-01', '(068)451-76-93', 'alysha06@welch.com', 'worker', '2015-02-09', NULL),
(15, 2, 'Cicero', 'Ziemann', '1962-05-03', '(098)501-36-03', 'jarrell.homenick@roberts.com', 'trainee', '2015-02-09', NULL),
(16, 2, 'Violette', 'Murray', '1962-10-02', '(098)501-36-03', 'dhammes@carroll.com', 'trainee', '2015-02-09', NULL),
(17, 2, 'Eliseo', 'Stark', '1950-12-12', '(098)501-36-03', 'hyman97@donnelly.com', 'trainee', '2015-02-09', NULL),
(18, 2, 'Kay', 'Wiegand', '1950-12-12', '(098)501-36-03', 'wyman.chanelle@yahoo.com', 'trainee', '2015-02-09', NULL),
(19, 2, 'Oleta', 'Wilkinson', '1950-12-12', '(063)311-46-33', 'anya.steuber@harber.net', 'trainee', '2015-02-09', NULL),
(20, 2, 'Jazmyn', 'Bergnaum', '1962-10-02', '(098)501-36-03', 'beatrice.wintheiser@gmail.com', 'trainee', '2015-02-09', NULL),
(21, 2, 'Nella', 'Aufderhar', '1980-04-01', '(068)451-76-93', 'gusikowski.nina@yahoo.com', 'trainee', '2015-02-09', NULL),
(22, 2, 'Francisca', 'Lockman', '1962-10-02', '(095)592-14-43', 'estell.erdman@gmail.com', 'trainee', '2015-02-09', NULL),
(23, 2, 'Cathryn', 'Schmitt', '1962-10-02', '(095)592-14-43', 'katelynn81@hotmail.com', 'trainee', '2015-02-09', NULL),
(24, 2, 'Cathy', 'Schuppe', '1962-05-03', '(063)311-46-33', 'gschroeder@yaho.com', 'trainee', '2015-02-09', NULL),
(25, 2, 'Rubie', 'Beier', '1980-04-01', '(095)592-14-43', 'omcdermott@okeefe.info', 'trainee', '2015-02-09', NULL),
(26, 2, 'Albiny', 'Harvey', '1962-10-02', '(098)501-36-03', 'cstoltenberg@auer.com', 'trainee', '2015-02-09', NULL),
(27, 2, 'Miguel', 'Heathcote', '1962-10-02', '(095)592-14-43', 'gerhold.gerardo@yahoo.com', 'trainee', '2015-02-09', NULL),
(28, 2, 'Layla', 'Trantow', '1962-10-02', '(068)451-76-93', 'kenneth.cassin@hessel.com', 'trainee', '2015-02-09', NULL),
(29, 2, 'Bulah', 'Rohan', '1962-05-03', '(063)311-46-33', 'brekke.maudie@gmail.com', 'trainee', '2015-02-09', NULL),
(30, 2, 'Ryann', 'Jones', '1962-05-03', '(063)311-46-33', 'gaetano.runolfsdottir@larson.info', 'trainee', '2015-02-09', NULL),
(31, 2, 'Nelson', 'Boyle', '1962-10-02', '(095)592-14-43', 'charlie.collins@hotmail.com', 'trainee', '2015-02-09', NULL),
(32, 2, 'Marlin', 'Hammes', '1962-10-02', '(095)592-14-43', 'hazle56@hotmail.com', 'trainee', '2015-02-09', NULL),
(33, 2, 'Logan', 'Collier', '1962-10-02', '(095)592-14-43', 'wmorissette@yahoo.com', 'trainee', '2015-02-09', NULL),
(34, 2, 'Landen', 'Nitzsche', '1962-05-03', '(068)451-76-93', 'kbreitenberg@gmail.com', 'fired', '2015-02-09', '2017-12-03'),
(35, 2, 'Nama', 'Kirlin', '1980-04-01', '(068)451-76-93', 'brisa.ankunding@hotmail.com', 'trainee', '2015-02-09', NULL),
(36, 2, 'Vada', 'McKenzie', '1962-10-02', '(095)592-14-43', 'santino59@yahoo.com', 'trainee', '2015-02-09', NULL),
(37, 2, 'George', 'Connelly', '1962-10-02', '(063)311-46-33', 'rtrantow@gmail.com', 'trainee', '2015-02-09', NULL),
(38, 2, 'Gilberto', 'Heller', '1980-04-01', '(063)311-46-33', 'rocio19@yahoo.com', 'trainee', '2015-02-09', NULL),
(39, 2, 'Alexie', 'Feeney', '1950-12-12', '(098)501-36-03', 'keeling.roy@bergnaum.com', 'trainee', '2015-02-09', NULL),
(40, 2, 'Niko', 'Collins', '1962-05-03', '(098)501-36-03', 'wilhelmine19@okeefe.net', 'trainee', '2015-02-09', NULL),
(41, 2, 'Wilfred', 'Jakubowski', '1962-10-02', '(098)501-36-03', 'veffertz@hotmail.com', 'trainee', '2015-02-09', NULL),
(42, 2, 'Monica', 'Welch', '1962-10-02', '(063)311-46-33', 'lauretta40@okeefe.org', 'trainee', '2015-02-09', NULL),
(43, 2, 'Hilma', 'Labadie', '1950-12-12', '(068)451-76-93', 'muriel.adams@hotmail.com', 'trainee', '2015-02-09', NULL),
(44, 2, 'Torrance', 'Upton', '1950-12-12', '(098)501-36-03', 'owunsch@rolfson.net', 'trainee', '2015-02-09', NULL),
(45, 2, 'Reanna', 'Spinka', '1962-10-02', '(098)501-36-03', 'darron88@cormier.com', 'trainee', '2015-02-09', NULL),
(46, 2, 'Lura', 'Satterfield', '1950-12-12', '(098)501-36-03', 'davin26@adams.com', 'trainee', '2015-02-09', NULL),
(47, 2, 'Brianne', 'Quigley', '1962-05-03', '(063)311-46-33', 'wisoky.zula@yaho.com', 'trainee', '2015-02-09', NULL),
(48, 2, 'Hillary', 'Rippin', '1962-10-02', '(095)592-14-43', 'hazle.feeney@yahoo.com', 'trainee', '2015-02-09', NULL),
(49, 2, 'Andres', 'Jakubowski', '1962-10-02', '(068)451-76-93', 'jromaguera@gmail.com', 'trainee', '2015-02-09', NULL),
(50, 2, 'Marjorie', 'Lindgren', '1962-10-02', '(095)592-14-43', 'triston17@wiza.com', 'trainee', '2015-02-09', NULL),
(51, 2, 'Ir', 'Shanahan', '1962-05-03', '(063)311-46-33', 'slockman@yahoo.com', 'trainee', '2015-02-09', NULL),
(52, 2, 'Rhett', 'Reinger', '1980-04-01', '(095)592-14-43', 'quigley.jason@hotmail.com', 'trainee', '2015-02-09', NULL),
(53, 2, 'Tom', 'Glover', '1962-10-02', '(068)451-76-93', 'jackS1@ss.com', 'trainee', '2015-02-09', NULL),
(54, 2, 'Cheyanne', 'Mraz', '1962-05-03', '(095)592-14-43', 'dee.jacobson@gmail.com', 'trainee', '2015-02-09', NULL),
(55, 2, 'Christine', 'Zulauf', '1962-10-02', '(095)592-14-43', 'lucinda.quitzon@hotmail.com', 'trainee', '2015-02-09', NULL),
(56, 2, 'Meta', 'Hartmann', '1962-10-02', '(063)311-46-33', 'jwyman@gmail.com', 'trainee', '2015-02-09', NULL),
(57, 2, 'Yessenia', 'Goyette', '1980-04-01', '(095)592-14-43', 'jazmyn.lemke@hotmail.com', 'trainee', '2015-02-09', NULL),
(58, 2, 'Waldo', 'Cruickshank', '1962-10-02', '(095)592-14-43', 'demetris88@gmail.com', 'trainee', '2015-02-09', NULL),
(59, 2, 'Vicky', 'Breitenberg', '1962-10-02', '(068)451-76-93', 'donna49@yahoo.com', 'trainee', '2015-02-09', NULL),
(60, 2, 'Janis', 'Turcotte', '1962-10-02', '(063)311-46-33', 'umorar@yahoo.com', 'trainee', '2015-02-09', NULL),
(61, 2, 'Richard', 'Murphy', '1980-04-01', '(098)501-36-03', 'qcremin@frami.com', 'trainee', '2015-02-09', NULL),
(62, 2, 'Ruthie', 'Bruen', '1962-10-02', '(098)501-12-03', 'trantow.lexi@hotmail.com', 'trainee', '2015-02-09', NULL),
(63, 2, 'Shyanne', 'Reilly', '1962-10-02', '(068)451-76-93', 'polly08@volkman.com', 'trainee', '2015-02-09', NULL),
(64, 2, 'Arnold', 'Wolf', '1962-05-03', '(063)311-46-33', 'pgoodwin@runolfsson.org', 'trainee', '2015-02-09', NULL),
(65, 2, 'Thurman', 'Ziemann', '1962-10-02', '(095)592-14-43', 'vincent61@hotmail.com', 'trainee', '2015-02-09', NULL),
(66, 2, 'Fritz', 'Klein', '1950-12-12', '(095)592-14-43', 'micheal15@tremblay.net', 'trainee', '2015-02-09', NULL),
(67, 2, 'Torey', 'Vandervort', '1962-10-02', '(095)592-14-43', 'olson.zoie@kozey.net', 'trainee', '2015-02-09', NULL),
(68, 2, 'Alford', 'Ondricka', '1962-10-02', '(068)451-76-93', 'bradtke.andrew@kerluke.com', 'trainee', '2015-02-09', NULL),
(69, 2, 'Liliane', 'Quigley', '1950-12-12', '(063)311-46-33', 'margaret04@damore.biz', 'trainee', '2015-02-09', NULL),
(70, 2, 'Dagmar', 'Pfeffer', '1962-10-02', '(063)311-46-33', 'ywolf@hotmail.com', 'trainee', '2015-02-09', NULL),
(71, 2, 'Magnolia', 'Stark', '1962-10-02', '(068)451-76-93', 'ernser.rosina@gmail.com', 'trainee', '2015-02-09', NULL),
(72, 2, 'Dedric', 'Ebert', '1950-12-12', '(068)451-76-93', 'jewell80@carter.com', 'trainee', '2015-02-09', NULL),
(73, 2, 'Matteo', 'Lueilwitz', '1950-12-12', '(068)451-76-93', 'ecorkery@gmail.com', 'trainee', '2015-02-09', NULL),
(74, 2, 'Astrid', 'Beer', '1962-05-03', '(098)501-36-03', 'shanny.ledner@gmail.com', 'trainee', '2015-02-09', NULL),
(75, 2, 'America', 'Hickle', '1962-05-03', '(095)592-14-43', 'gayle.jones@brakus.org', 'trainee', '2015-02-09', NULL),
(76, 2, 'Colt', 'Lind', '1950-12-12', '(068)451-76-93', 'virgie30@nolan.com', 'trainee', '2015-02-09', NULL),
(77, 2, 'Mireya', 'Nikolaus', '1962-10-02', '(063)311-46-33', 'xavier.keeling@yahoo.com', 'trainee', '2015-02-09', NULL),
(78, 2, 'Katarina', 'Krajcik', '1962-10-02', '(095)592-14-43', 'bode.gustave@durgan.com', 'trainee', '2015-02-09', NULL),
(79, 2, 'Therese', 'Mayert', '1962-10-02', '(068)451-76-93', 'jazmyn59@gmail.com', 'trainee', '2015-02-09', NULL),
(80, 2, 'Jewell', 'Prosacco', '1962-10-02', '(098)501-36-03', 'vvolkman@thompson.com', 'trainee', '2015-02-09', NULL),
(81, 2, 'Mallory', 'Reichert', '1962-10-02', '(063)311-46-33', 'zita23@gibson.com', 'trainee', '2015-02-09', NULL),
(82, 2, 'Noel', 'Collins', '1962-10-02', '(068)451-76-93', 'smitham.osvaldo@gmail.com', 'trainee', '2015-02-09', NULL),
(83, 2, 'Keon', 'O\'Kon', '1962-10-02', '(098)501-36-03', 'macejkovic.cassandre@hotmail.com', 'trainee', '2015-02-09', NULL),
(84, 2, 'Mya', 'Buckridge', '1962-10-02', '(095)592-14-43', 'vschuster@runolfsson.com', 'trainee', '2015-02-09', NULL),
(85, 2, 'Lonnie', 'Rolfson', '1962-10-02', '(068)451-76-93', 'alejandrin98@gmail.com', 'trainee', '2015-02-09', NULL),
(86, 2, 'Destiney', 'Kunze', '1962-05-03', '(068)451-76-93', 'noemie.corwin@simonis.com', 'trainee', '2015-02-09', NULL),
(87, 2, 'Tianna', 'Bernier', '1980-04-01', '(068)451-76-93', 'medhurst.agustin@yahoo.com', 'trainee', '2015-02-09', NULL),
(88, 2, 'Laverna', 'Parker', '1980-04-01', '(068)451-76-93', 'zoie.connelly@gmail.com', 'trainee', '2015-02-09', NULL),
(89, 2, 'Cleora', 'Kozey', '1962-10-02', '(068)451-76-93', 'nikolaus.velva@hotmail.com', 'trainee', '2015-02-09', NULL),
(90, 2, 'Jayme', 'Pacocha', '1962-10-02', '(063)311-46-33', 'gutmann.emmanuel@olson.com', 'trainee', '2015-02-09', NULL),
(91, 2, 'Athena', 'Kerluke', '1962-10-02', '(068)451-76-93', 'michel.welch@yahoo.com', 'trainee', '2015-02-09', NULL),
(92, 2, 'Charlie', 'Wyman', '1962-05-03', '(063)311-46-33', 'eichmann.jaron@gmail.com', 'trainee', '2015-02-09', NULL),
(93, 1, 'aa', 'aa', '2004-12-07', '(123)456-67-78', 'aaaaaaaa@hhm.bn', 'trainee', '2017-12-11', NULL);

--
-- Triggers `Employees`
--
DELIMITER $$
CREATE TRIGGER `before_update_dateHire` BEFORE UPDATE ON `Employees` FOR EACH ROW BEGIN 

/* dateOfFire < dateOfHire  (no scence)" */
    IF !ISNULL(NEW.dateOfFire) AND NEW.dateOfFire < NEW.dateOfHire THEN
  	    SET NEW.dateOfFire = DATE(NOW()); 
    END IF;

/* always set status to "3-fired" */
    IF !ISNULL(NEW.dateOfFire)  THEN
    	SET NEW.status = 3;  
    END IF;
    
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Departments`
--
ALTER TABLE `Departments`
  ADD PRIMARY KEY (`idDepartment`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`idEmployee`),
  ADD KEY `idDepartment` (`idDepartment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Departments`
--
ALTER TABLE `Departments`
  MODIFY `idDepartment` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `idEmployee` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Employees`
--
ALTER TABLE `Employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`idDepartment`) REFERENCES `Departments` (`idDepartment`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
