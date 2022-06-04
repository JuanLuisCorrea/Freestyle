-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para freestyle
CREATE DATABASE IF NOT EXISTS `freestyle` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `freestyle`;

-- Volcando estructura para tabla freestyle.cita
CREATE TABLE IF NOT EXISTS `cita` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Client` varchar(11) DEFAULT NULL,
  `Services` varchar(75) DEFAULT NULL,
  `Date` varchar(30) DEFAULT NULL,
  `Hour` time DEFAULT NULL,
  `Finish_Hour` time DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.cita: ~0 rows (aproximadamente)
DELETE FROM `cita`;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` (`ID`, `Client`, `Services`, `Date`, `Hour`, `Finish_Hour`, `Duration`, `Price`) VALUES
	(51, '123456789', 'Corte de cabello,Corte barba', '2022-06-04', '16:45:00', '18:05:00', 80, 19000);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;

-- Volcando estructura para tabla freestyle.client
CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) NOT NULL,
  `Telephone` varchar(10) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` date DEFAULT NULL,
  `Cedula` varchar(11) DEFAULT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `administrador` int(1) unsigned zerofill DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.client: ~3 rows (aproximadamente)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`ID`, `Name`, `Telephone`, `Email`, `Date`, `Cedula`, `Contraseña`, `administrador`) VALUES
	(15, 'Juan Correa', '3017063712', 'jucs0709@gmail.com', '2003-09-07', '1193364423', 'asdasd', 1),
	(16, 'Luis Correa', '3012223333', 'luis@gmail.com', '2004-06-08', '123456789', 'dsadsa', 0),
	(17, 'Luis Solórzano', '3014445555', 'luisslorzano@gmail.com', '2003-01-01', '987654321', 'qwerty', 0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Volcando estructura para tabla freestyle.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name_BarberShop` varchar(80) NOT NULL,
  `Servicios` varchar(80) NOT NULL,
  `Telephone_BarberShop` int(11) DEFAULT NULL,
  `Total_Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.factura: ~0 rows (aproximadamente)
DELETE FROM `factura`;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla freestyle.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Price` int(11) NOT NULL,
  `Type_Service` varchar(30) DEFAULT NULL,
  `Duration_Service` int(11) DEFAULT NULL,
  `Employee` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.servicio: ~4 rows (aproximadamente)
DELETE FROM `servicio`;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` (`ID`, `Price`, `Type_Service`, `Duration_Service`, `Employee`) VALUES
	(1, 12000, 'Corte de cabello', 60, 'Juancho'),
	(2, 7000, 'Corte barba', 20, 'Juan Diego'),
	(3, 8000, 'Mascarilla facial', 20, 'Luis'),
	(4, 5000, 'Cejas', 10, 'JC');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
