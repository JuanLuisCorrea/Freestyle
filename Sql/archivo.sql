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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.cita: ~4 rows (aproximadamente)
DELETE FROM `cita`;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` (`ID`, `Client`, `Services`, `Date`, `Hour`, `Finish_Hour`, `Duration`, `Price`) VALUES
	(52, '123456789', 'corte_de_barba,mascarilla_facial', '2022-06-10', '17:00:00', '17:40:00', 40, 15000),
	(54, '123456789', 'corte_de_cabello,corte_de_barba', '2022-06-06', '19:20:00', '20:40:00', 80, 19000),
	(55, '123456789', 'corte_de_cabello,mascarilla_facial', '2022-06-08', '10:50:00', '12:10:00', 80, 20000),
	(61, '123456789', 'corte_de_barba,mascarilla_facial', '2022-06-24', '10:10:00', '10:50:00', 40, 15000);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.client: ~3 rows (aproximadamente)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`ID`, `Name`, `Telephone`, `Email`, `Date`, `Cedula`, `Contraseña`, `administrador`) VALUES
	(15, 'Juan Correa', '3017063712', 'jucs0709@gmail.com', '2003-09-07', '1193364423', 'asdasd', 1),
	(16, 'Luis Correa', '3012223333', 'luis@gmail.com', '2004-06-08', '123456789', 'dsadsa', 0),
	(17, 'Luis Solórzano', '3014445555', 'luisslorzano@gmail.com', '2003-01-01', '987654321', 'qwerty', 0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Volcando estructura para tabla freestyle.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Price` int(11) NOT NULL,
  `Type_Service` varchar(30) DEFAULT NULL,
  `Duration_Service` int(11) DEFAULT NULL,
  `Employee` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla freestyle.servicio: ~4 rows (aproximadamente)
DELETE FROM `servicio`;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` (`ID`, `Price`, `Type_Service`, `Duration_Service`, `Employee`) VALUES
	(1, 12000, 'corte_de_cabello', 60, 'Juancho'),
	(2, 7000, 'corte_de_barba', 20, 'Juan Diego'),
	(3, 8000, 'mascarilla_facial', 20, 'Luis'),
	(4, 5000, 'cejas', 10, 'Juan Carlos');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
