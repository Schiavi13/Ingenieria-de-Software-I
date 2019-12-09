CREATE DATABASE  IF NOT EXISTS `paquetes_turisticos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `paquetes_turisticos`;
-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: paquetes_turisticos
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `excursion`
--

DROP TABLE IF EXISTS `excursion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `excursion` (
  `idExcursion` int(11) NOT NULL AUTO_INCREMENT,
  `fechaExcursion` datetime NOT NULL,
  `precioExcursion` int(11) NOT NULL,
  `sitiosExcursion` varchar(45) NOT NULL,
  PRIMARY KEY (`idExcursion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `excursion`
--

LOCK TABLES `excursion` WRITE;
/*!40000 ALTER TABLE `excursion` DISABLE KEYS */;
INSERT INTO `excursion` VALUES (1,'2020-12-30 10:00:00',40000,'Armenia'),(2,'2020-12-30 10:00:00',40000,'Armenia'),(3,'2019-12-08 10:00:00',30000,'Medellin');
/*!40000 ALTER TABLE `excursion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete`
--

DROP TABLE IF EXISTS `paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `idExcursion` int(11) NOT NULL,
  `idTiquete_aereo` int(11) NOT NULL,
  `idReserva_hotel` int(11) NOT NULL,
  `idTiquete_bus` int(11) NOT NULL,
  PRIMARY KEY (`idPaquete`),
  KEY `idExcursion_idx` (`idExcursion`),
  KEY `idTiquete_aereo_idx` (`idTiquete_aereo`),
  KEY `idReserva_hotel_idx` (`idReserva_hotel`),
  KEY `idTiquete_bus_idx` (`idTiquete_bus`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete`
--

LOCK TABLES `paquete` WRITE;
/*!40000 ALTER TABLE `paquete` DISABLE KEYS */;
INSERT INTO `paquete` VALUES (2,2,2,2,2),(3,3,3,3,3);
/*!40000 ALTER TABLE `paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_hotel`
--

DROP TABLE IF EXISTS `reserva_hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva_hotel` (
  `idReserva_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `diaReserva_hotel` date NOT NULL,
  `nochesReserva_hotel` int(11) NOT NULL,
  `nombreHotelReserva_hotel` varchar(45) NOT NULL,
  `habitacionReserva_hotel` varchar(45) NOT NULL,
  `precioReserva_hotel` int(11) NOT NULL,
  PRIMARY KEY (`idReserva_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_hotel`
--

LOCK TABLES `reserva_hotel` WRITE;
/*!40000 ALTER TABLE `reserva_hotel` DISABLE KEYS */;
INSERT INTO `reserva_hotel` VALUES (1,'2000-01-01',0,'Ninguno','0',0),(2,'2000-01-01',0,'Ninguno','0',0),(3,'2019-12-06',3,'El paisita','20',60000);
/*!40000 ALTER TABLE `reserva_hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_paquete`
--

DROP TABLE IF EXISTS `reserva_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva_paquete` (
  `idReserva_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `estadoReserva_paquete` varchar(45) NOT NULL DEFAULT 'no pago',
  PRIMARY KEY (`idReserva_paquete`),
  KEY `idUsuario_idx` (`idUsuario`),
  KEY `idPaquete_idx` (`idPaquete`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_paquete`
--

LOCK TABLES `reserva_paquete` WRITE;
/*!40000 ALTER TABLE `reserva_paquete` DISABLE KEYS */;
INSERT INTO `reserva_paquete` VALUES (1,2,2,'no pago'),(2,3,3,'pago');
/*!40000 ALTER TABLE `reserva_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiquete_aereo`
--

DROP TABLE IF EXISTS `tiquete_aereo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiquete_aereo` (
  `idTiquete_aereo` int(11) NOT NULL AUTO_INCREMENT,
  `fechaTiquete_aereo` datetime NOT NULL,
  `asientoTiquete_aereo` int(11) NOT NULL,
  `vueloTiquete_aereo` varchar(45) NOT NULL,
  `destinoTiquete_aereo` varchar(45) NOT NULL,
  `origenTiquete_aereo` varchar(45) NOT NULL,
  `precioTiquete_aereo` int(11) NOT NULL,
  PRIMARY KEY (`idTiquete_aereo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiquete_aereo`
--

LOCK TABLES `tiquete_aereo` WRITE;
/*!40000 ALTER TABLE `tiquete_aereo` DISABLE KEYS */;
INSERT INTO `tiquete_aereo` VALUES (1,'2000-01-01 00:00:00',0,'Ninguno','Ninguno','Ninguno',0),(2,'2000-01-01 00:00:00',0,'Ninguno','Ninguno','Ninguno',0),(3,'2019-12-06 13:00:00',9,'XC483','Medellin','Pereira',300000);
/*!40000 ALTER TABLE `tiquete_aereo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiquete_bus`
--

DROP TABLE IF EXISTS `tiquete_bus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiquete_bus` (
  `idTiquete_bus` int(11) NOT NULL AUTO_INCREMENT,
  `fechaTiquete_bus` datetime NOT NULL,
  `destinoTiquete_bus` varchar(45) NOT NULL,
  `origenTiquete_bus` varchar(45) NOT NULL,
  `precioTiquete_bus` int(11) NOT NULL,
  PRIMARY KEY (`idTiquete_bus`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiquete_bus`
--

LOCK TABLES `tiquete_bus` WRITE;
/*!40000 ALTER TABLE `tiquete_bus` DISABLE KEYS */;
INSERT INTO `tiquete_bus` VALUES (1,'2020-12-30 08:00:00','Armenia','Pereira',15000),(2,'2020-12-30 08:00:00','Armenia','Pereira',15000),(3,'2000-01-01 00:00:00','Ninguno','Ninguno',0);
/*!40000 ALTER TABLE `tiquete_bus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomUsuario` varchar(45) NOT NULL,
  `contraUsuario` varchar(45) NOT NULL,
  `primerNombreUsuario` varchar(45) NOT NULL,
  `segundoNombreUsuario` varchar(45) DEFAULT NULL,
  `primerApellidoUsuario` varchar(45) NOT NULL,
  `segundoApellidoUsuario` varchar(45) NOT NULL,
  `identificacionUsuario` varchar(45) NOT NULL,
  `permisosUsuario` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `nomUsuario_UNIQUE` (`nomUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Lucho','123','Luis','Fernando','Martinez','Munoz','123456',1),(2,'Pepito','123','Pepe','','Perez','Pereira','123',2),(3,'Pablito','123','Pablo','','Clavo','Clavito','123',2),(4,'cerdo','123','Duran','Presto','Vuque','Barcos','123',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-06  3:45:42
