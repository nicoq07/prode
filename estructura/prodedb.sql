CREATE DATABASE  IF NOT EXISTS `prodedb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prodedb`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: prodedb
-- ------------------------------------------------------
-- Server version	5.6.34

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
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `bandera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (1,'Argentina','Argentina.ico'),(2,'Brasil','Brazil.ico'),(3,'Rusia','Russia.ico'),(4,'Portugal','Portugal.ico');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos_usuarios`
--

DROP TABLE IF EXISTS `grupos_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_usuarios`
--

LOCK TABLES `grupos_usuarios` WRITE;
/*!40000 ALTER TABLE `grupos_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidos`
--

DROP TABLE IF EXISTS `partidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `torneo_id` int(11) NOT NULL,
  `equipo_id_local` int(11) NOT NULL,
  `equipo_id_visitante` int(11) NOT NULL,
  `equipo_id_ganador` int(11) DEFAULT NULL,
  `fecha` varchar(40) NOT NULL,
  `dia_partido` datetime NOT NULL,
  `goles_local` int(2) DEFAULT NULL,
  `goles_visitante` int(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `torneo_id` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  UNIQUE KEY `unique_index` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  UNIQUE KEY `unique_partidos` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  KEY `equipos_ganador_partidos_idx` (`equipo_id_ganador`),
  KEY `equipos_visitante_partidos_idx` (`equipo_id_visitante`),
  KEY `equipos_local_partidos_idx` (`equipo_id_local`),
  CONSTRAINT `equipos_ganador_partidos` FOREIGN KEY (`equipo_id_ganador`) REFERENCES `equipos` (`id`),
  CONSTRAINT `equipos_local_partidos` FOREIGN KEY (`equipo_id_local`) REFERENCES `equipos` (`id`),
  CONSTRAINT `equipos_visitante_partidos` FOREIGN KEY (`equipo_id_visitante`) REFERENCES `equipos` (`id`),
  CONSTRAINT `torneo_partidos` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos`
--

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
INSERT INTO `partidos` VALUES (1,1,2,3,NULL,'PRIMERA FECHA','2018-06-20 11:58:00',3,3,'2018-06-03 12:01:56','2018-06-07 00:23:08'),(6,1,1,3,NULL,'PRIMERA FECHA','2018-06-07 01:45:00',NULL,NULL,'2018-06-06 23:50:19','2018-06-06 23:50:19'),(7,1,3,4,NULL,'PRIMERA FECHA','2018-06-06 23:50:00',NULL,NULL,'2018-06-06 23:50:33','2018-06-06 23:50:33');
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidos_apuestas_users`
--

DROP TABLE IF EXISTS `partidos_apuestas_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partidos_apuestas_users` (
  `partido_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visitante` varchar(45) NOT NULL,
  `acertado` tinyint(1) NOT NULL DEFAULT '0',
  `cargado` tinyint(1) NOT NULL DEFAULT '0',
  `puntaje_obtenido` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_partidos_apuestas_usuarios` (`user_id`,`partido_id`),
  CONSTRAINT `apuestas_partidos` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`id`),
  CONSTRAINT `apuestas_usuarios` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos_apuestas_users`
--

LOCK TABLES `partidos_apuestas_users` WRITE;
/*!40000 ALTER TABLE `partidos_apuestas_users` DISABLE KEYS */;
INSERT INTO `partidos_apuestas_users` VALUES (1,20,2,'1',0,1,0,'2018-06-06 23:26:30','2018-06-06 23:39:15',1),(6,20,1,'2',0,1,0,'2018-06-07 00:04:14','2018-06-07 00:04:27',5);
/*!40000 ALTER TABLE `partidos_apuestas_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ADMINISTRADOR'),(2,'USUARIOS');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torneos`
--

DROP TABLE IF EXISTS `torneos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torneos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneos`
--

LOCK TABLES `torneos` WRITE;
/*!40000 ALTER TABLE `torneos` DISABLE KEYS */;
INSERT INTO `torneos` VALUES (1,'Mundial Rusia 2018','2018-06-19 10:00:00','2018-07-19 10:00:00','2018-06-03 11:12:00','2018-06-03 11:12:00',1);
/*!40000 ALTER TABLE `torneos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `apellido_UNIQUE` (`apellido`),
  KEY `roles_usuarios_idx` (`rol_id`),
  KEY `grupos_usuarios_usuarios_idx` (`grupo_id`),
  CONSTRAINT `grupos_usuarios_usuarios` FOREIGN KEY (`grupo_id`) REFERENCES `grupos_usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `roles_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (20,'admin','$2y$10$weYAS98Zf0Xuaj3waiizyOLV7mrDzF6V1G6nD1OZLtfMtCQGDk5Pa','Nicolas','Quiroga',NULL,1,1),(21,'usuario','$2y$10$DZHTOAaDCDpDcT4Dptvr5ORcXZ4jgVVnK3VXdQYqBqrvjSclkaAFa','usuario','usuario',NULL,2,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_torneos`
--

DROP TABLE IF EXISTS `users_torneos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_torneos` (
  `torneo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`torneo_id`,`user_id`,`id`),
  UNIQUE KEY `torneo_id_UNIQUE` (`torneo_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `users_users_idx` (`user_id`),
  CONSTRAINT `users_torneos_users` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`id`),
  CONSTRAINT `users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_torneos`
--

LOCK TABLES `users_torneos` WRITE;
/*!40000 ALTER TABLE `users_torneos` DISABLE KEYS */;
INSERT INTO `users_torneos` VALUES (1,20,0);
/*!40000 ALTER TABLE `users_torneos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-07  1:29:26
