-- MySQL dump 10.13  Distrib 5.5.22, for Win32 (x86)
--
-- Host: localhost    Database: Bibliotecaa
-- ------------------------------------------------------
-- Server version	5.5.22

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
-- Current Database: `Bibliotecaa`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bibliotecaa` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;

USE `Bibliotecaa`;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros` (
  `codLibro` int(45) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombreAutor` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido1Autor` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2Autor` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tema` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `unidades` int(45) DEFAULT NULL,
  `isbn` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numPaginas` int(45) DEFAULT NULL,
  `descripcion` varchar(1000) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES (103,'El hombre lobo','Pedro','Lopez','Vega','Misterio',20,'0-937383-18-X',100,'Hombre humana que se transforma en lobo.<br>'),(104,'Una vacante imprevista','Eva','Gimenez','Vega','actualidad',100,'9788498384925',605,'Habla sobre la actualidad<br>'),(108,'E lhombre ambulante','Pablo','Jimenez','Lopez','vida misma',300,'444-444-67776',242,'El libro se centra en contarnos la vida de una mbulante.'),(109,'El hombre vampiro','James','Lopez','Vega','vampirismo',130,'54545-54545',700,'La vida de un vampiro<br>'),(110,'La maquina del tiempo','Max','Barranca','Esquinas','futuro',130,'545-2112-33',349,'<font color=\"#FF0066\">Grupo de personas que se teletrasportan al futuro.</font><br>');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `codLibro` int(45) NOT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  PRIMARY KEY (`usuario`,`codLibro`),
  KEY `FK1_idx` (`codLibro`),
  KEY `FK2_idx` (`usuario`),
  KEY `FK1_idx1` (`codLibro`),
  CONSTRAINT `FK1` FOREIGN KEY (`codLibro`) REFERENCES `libros` (`codLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` VALUES ('albert',104,'2012-12-11'),('andreu',108,'2012-12-20'),('ivan',108,'2012-12-22'),('ivan',110,'2012-12-14'),('marc',103,'2012-12-31'),('nerea',109,'2012-12-08');
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido1` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `edad` int(45) DEFAULT NULL,
  `direccion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `dni` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('albert','albert','Albert','Fuster','Bataller',21,'Sant Domingo nº 10',962814578,'20078851S','albert@gmail.com','cliente'),('andreu','andreu','Andreu','Bosca','Catala',25,' Xorret Nº 2',962815474,'20047752d','andreu@gmail.com','cliente'),('esther','esther','Esther','Gimenez','Lopez',24,'Martorell Nº 24',962813475,'20080062S','esther@gmail.com','empleado'),('ivan','ivan','Ivan','Fuester','Bataller',22,'La pedrera',962814578,'20060081G','ivan@gmail.com','cliente'),('marc','marc','Marc','Mengual','Albors',20,'sant vicent nº 1',962815471,'20060081x','mengual.marc@gmail.com','administrador'),('nerea','nerea','Nerea','Fuester','Bataller',19,'Sant Pablo nº10',962815496,'20070061Z','nereaa@gmail.com','cliente');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Bibliotecaa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-18 13:40:51
