-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: denunciaciudadana
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_usuario` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `rol_usuario` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_administrador_idx` (`rol_usuario`),
  CONSTRAINT `id_rol_administrador` FOREIGN KEY (`rol_usuario`) REFERENCES `rol usuario` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('Ad-0001','Paul Lugo','ProyTer12**',1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asesor`
--

DROP TABLE IF EXISTS `asesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asesor` (
  `id_usuario` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `rol_usuario` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_asesor_idx` (`rol_usuario`),
  CONSTRAINT `id_rol_asesor` FOREIGN KEY (`rol_usuario`) REFERENCES `rol usuario` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesor`
--

LOCK TABLES `asesor` WRITE;
/*!40000 ALTER TABLE `asesor` DISABLE KEYS */;
INSERT INTO `asesor` VALUES ('As-0001','Paul Lugo','ProyTer12**',2),('As-0002','Brenda Luque','ProyTer12**',2);
/*!40000 ALTER TABLE `asesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buzon quejas`
--

DROP TABLE IF EXISTS `buzon quejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buzon quejas` (
  `id_queja` int NOT NULL AUTO_INCREMENT,
  `asunto` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id_queja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buzon quejas`
--

LOCK TABLES `buzon quejas` WRITE;
/*!40000 ALTER TABLE `buzon quejas` DISABLE KEYS */;
INSERT INTO `buzon quejas` VALUES (1,'Prueba queja','Probando el registro de quejas       ','2022-07-08 18:43:51'),(2,'Prueba de queja dos','Segunda prueba para registrar quejas','2022-07-08 18:47:00');
/*!40000 ALTER TABLE `buzon quejas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncia anonima`
--

DROP TABLE IF EXISTS `denuncia anonima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `denuncia anonima` (
  `id_denuncia` varchar(6) NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL,
  `tipo_denuncia` varchar(80) NOT NULL,
  `evidencia` mediumblob,
  `nombre_evidencia` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncia anonima`
--

LOCK TABLES `denuncia anonima` WRITE;
/*!40000 ALTER TABLE `denuncia anonima` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncia anonima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncia ciudadana`
--

DROP TABLE IF EXISTS `denuncia ciudadana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `denuncia ciudadana` (
  `id_denuncia` varchar(6) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `edad` int NOT NULL,
  `sexo` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL,
  `tipo_denuncia` varchar(80) NOT NULL,
  `evidencia` mediumblob,
  `nombre_evidencia` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncia ciudadana`
--

LOCK TABLES `denuncia ciudadana` WRITE;
/*!40000 ALTER TABLE `denuncia ciudadana` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncia ciudadana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncia servidor publico`
--

DROP TABLE IF EXISTS `denuncia servidor publico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `denuncia servidor publico` (
  `id_denuncia` varchar(6) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL,
  `tipo_denuncia` varchar(80) NOT NULL,
  `evidencia` mediumblob,
  `nombre_evidencia` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `servidor publico` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncia servidor publico`
--

LOCK TABLES `denuncia servidor publico` WRITE;
/*!40000 ALTER TABLE `denuncia servidor publico` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncia servidor publico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus de denuncia`
--

DROP TABLE IF EXISTS `estatus de denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus de denuncia` (
  `numero` int NOT NULL AUTO_INCREMENT,
  `id_asesor` varchar(10) DEFAULT NULL,
  `id_denuncia_a` varchar(6) DEFAULT NULL,
  `id_denuncia_c` varchar(6) DEFAULT NULL,
  `id_denuncia_sp` varchar(6) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `nota` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`numero`),
  KEY `id_asesor_idx` (`id_asesor`),
  KEY `id_danonima_idx` (`numero`),
  KEY `fk_denuncia_a_idx` (`id_denuncia_a`),
  KEY `fk_denuncia_c_idx` (`id_denuncia_c`),
  KEY `fk_denuncia_sp_idx` (`id_denuncia_sp`),
  CONSTRAINT `fk_asesor` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_denuncia_a` FOREIGN KEY (`id_denuncia_a`) REFERENCES `denuncia anonima` (`id_denuncia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_denuncia_c` FOREIGN KEY (`id_denuncia_c`) REFERENCES `denuncia ciudadana` (`id_denuncia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_denuncia_sp` FOREIGN KEY (`id_denuncia_sp`) REFERENCES `denuncia servidor publico` (`id_denuncia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus de denuncia`
--

LOCK TABLES `estatus de denuncia` WRITE;
/*!40000 ALTER TABLE `estatus de denuncia` DISABLE KEYS */;
/*!40000 ALTER TABLE `estatus de denuncia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol usuario`
--

DROP TABLE IF EXISTS `rol usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol usuario` (
  `id_rol` int NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol usuario`
--

LOCK TABLES `rol usuario` WRITE;
/*!40000 ALTER TABLE `rol usuario` DISABLE KEYS */;
INSERT INTO `rol usuario` VALUES (1,'Administrador'),(2,'Asesor'),(3,'Servidor público');
/*!40000 ALTER TABLE `rol usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servidor publico`
--

DROP TABLE IF EXISTS `servidor publico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servidor publico` (
  `id_usuario` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `edad` int NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `area` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `rol_usuario` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_servidor_idx` (`rol_usuario`),
  CONSTRAINT `id_rol_servidor` FOREIGN KEY (`rol_usuario`) REFERENCES `rol usuario` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servidor publico`
--

LOCK TABLES `servidor publico` WRITE;
/*!40000 ALTER TABLE `servidor publico` DISABLE KEYS */;
INSERT INTO `servidor publico` VALUES ('SP-1356E','Luis Higuera',42,'M','673 452 14 15','luis@gmail.com','Calle Argentina, #426, Colonia Internacional','Informática','ProyTer12*',3),('SP-1452E','Paul Lugo',39,'M','673 235 14 12','paul@gmail.com','Calle Emiliano Zapata, #156, Colonia Independencia','Informática','ProyTer12*',3),('SP-1654E','Francis Mejía',29,'F','673 254 54 58','francis@gmial.com','Calle Olivos, #1542, Colonia Jardines','Informática','ProyTer12*',3),('SP-243E','Laura Gómez',25,'F','673 958 65 47','laura@gmail.com','Calle Amapas, #654, Colonia Jardines','Recaudación','ProyTer56*',3),('SP-6545E','Sandra Benítez ',33,'F','672 452 14 54','sandra@gmail.com','Calle Bolivia, #6542, Colonia Internacional','Recaudación','ProyTer12*',3),('SP-7458E','Lucía Fernandez',23,'F','672 645 24 15','luci@gmail.com','Calle Girasoles, #4521, Colonia Jardines','Recaudación','ProyTer12*',3),('SP-9635E','Fernando Ornelas',23,'M','673 462 25 84','fer@gmail.com','Calle Francia, #4236, Colonia Internacional','Tránsito','ProyTer12*',3);
/*!40000 ALTER TABLE `servidor publico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-18 13:38:53
