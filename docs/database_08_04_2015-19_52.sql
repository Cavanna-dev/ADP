-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ttls
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idDescription` int(11) DEFAULT NULL,
  `reference` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `isActive` int(1) DEFAULT '2',
  `dateCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,4,1,NULL,'UX630','Asus Premium R510LDV-XX1054H PC portable 15,6&quot; Argent (Intel Core i5, 4 Go de RAM, Disque dur 7','Asus','Asus Premium R510LDV-XX1054H PC portable 15,6&quot; Argent (Intel Core i5, 4 Go de RAM, Disque dur 750 Go, Carte NVIDIA 2 Go, Windows 8.1)','test.jpg',2,'2015-04-08 16:08:03','2015-04-08 16:08:03'),(3,4,1,NULL,'UX630','Asus Premium R510LDV-XX1054H PC portable 15,6','Asus','Asus Premium R510LDV-XX1054H PC portable 15,6','test.jpg',2,'2015-04-08 16:08:49','2015-04-08 16:08:49');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idArticle` int(11) NOT NULL,
  `idUserSales` int(11) NOT NULL,
  `idCommand` int(11) DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability`
--

LOCK TABLES `availability` WRITE;
/*!40000 ALTER TABLE `availability` DISABLE KEYS */;
INSERT INTO `availability` VALUES (1,3,1,NULL,350.00,'euro','occassion',1,1,'2015-04-08 18:50:35','2015-04-08 18:50:35'),(2,3,1,NULL,120.00,'euro','Test',1,1,'2015-04-08 19:14:02','2015-04-08 19:14:02');
/*!40000 ALTER TABLE `availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isHp` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel`
--

LOCK TABLES `carousel` WRITE;
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idParent` int(11) NOT NULL,
  `idAdminUser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,0,1,'Informatique',1,'2015-04-08 11:25:30','2015-04-08 11:25:30'),(2,1,1,'Tablette',1,'2015-04-08 11:25:37','2015-04-08 11:25:37'),(3,1,1,'Ordinateur de bureau',1,'2015-04-08 11:25:46','2015-04-08 11:25:46'),(4,3,1,'Asus',1,'2015-04-08 11:25:59','2015-04-08 11:25:59'),(5,3,1,'TG',0,'2015-04-08 11:27:04','2015-04-08 18:49:12');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `command`
--

DROP TABLE IF EXISTS `command`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUserBuy` int(11) NOT NULL,
  `nbProduct` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `currency` varchar(10) NOT NULL DEFAULT '€',
  `status` int(11) NOT NULL DEFAULT '0',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `command`
--

LOCK TABLES `command` WRITE;
/*!40000 ALTER TABLE `command` DISABLE KEYS */;
/*!40000 ALTER TABLE `command` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'nameBo','INTRANET',1,'2015-03-31 11:15:39','2015-04-03 23:20:33'),(2,'nameFo','TTLS',1,'2015-03-31 11:16:25','2015-04-03 23:21:02'),(3,'emailContact','leger.au@gmail.com',1,'2015-03-31 11:16:43','2015-04-03 23:36:42'),(4,'titleBo','Back Office',1,'2015-04-03 12:06:53','2015-04-03 23:20:48'),(5,'titleFo','TTLS',1,'2015-04-03 12:09:07','2015-04-03 23:20:59'),(6,'imgFavFo','Koala.jpg',1,'2015-04-03 12:27:31','2015-04-03 23:04:43'),(7,'imgFavBo','Penguins.jpg',1,'2015-04-03 12:27:41','2015-04-03 23:05:00'),(8,'imgFo','Koala.jpg',1,'2015-04-03 12:29:56','2015-04-03 23:04:40'),(9,'imgBo','Lighthouse.jpg',1,'2015-04-03 12:30:17','2015-04-03 23:04:56'),(10,'emailSend','no-reply@odyseus.com',1,'2015-04-03 22:53:52','2015-04-03 23:36:40');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_css`
--

DROP TABLE IF EXISTS `config_css`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_css` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) NOT NULL,
  `value` varchar(40) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_css`
--

LOCK TABLES `config_css` WRITE;
/*!40000 ALTER TABLE `config_css` DISABLE KEYS */;
INSERT INTO `config_css` VALUES (1,'templateFo','Superhero',0,'2015-04-03 20:42:18','2015-04-05 01:06:00'),(2,'templateFo','Slate',0,'2015-04-03 20:48:10','2015-04-08 18:47:19'),(3,'templateFo','Cerulean',0,'2015-04-03 21:09:44','2015-04-03 23:00:27'),(4,'templateFo','Cosmo',0,'2015-04-03 21:13:54','2015-04-08 11:24:33'),(5,'templateFo','Cyborg',0,'2015-04-03 21:17:20','2015-04-03 21:17:29'),(6,'templateFo','Darkly',0,'2015-04-03 21:21:53','2015-04-03 21:22:04'),(7,'templateFo','Flatly',0,'2015-04-03 21:28:56','2015-04-05 01:06:05'),(8,'templateFo','Journal',0,'2015-04-03 21:37:33','2015-04-03 23:57:40'),(9,'templateFo','Lumen',0,'2015-04-03 21:42:35','2015-04-03 21:42:42'),(10,'templateFo','Paper',0,'2015-04-03 21:45:22','2015-04-08 11:23:57'),(11,'templateFo','Readable',1,'2015-04-03 21:50:34','2015-04-08 18:54:32'),(12,'templateFo','Sandstone',0,'2015-04-03 21:54:29','2015-04-03 23:19:59'),(13,'templateFo','Simplex',0,'2015-04-03 21:58:29','2015-04-03 22:02:01'),(14,'templateFo','Spacelab',0,'2015-04-03 22:02:20','2015-04-08 18:47:14'),(15,'templateFo','United',0,'2015-04-03 22:04:13','2015-04-08 11:24:51'),(16,'templateFo','Yeti',0,'2015-04-03 22:06:09','2015-04-03 23:19:42'),(17,'templateBo','Superhero',0,'2015-04-03 22:41:58','2015-04-05 01:06:10'),(18,'templateBo','Slate',0,'2015-04-03 22:41:58','2015-04-04 11:55:27'),(19,'templateBo','Cerulean',0,'2015-04-03 22:42:30','2015-04-08 16:23:48'),(20,'templateBo','Cosmo',0,'2015-04-03 22:42:30','2015-04-08 18:45:50'),(21,'templateBo','Cyborg',0,'2015-04-03 22:42:54','2015-04-03 22:42:54'),(22,'templateBo','Darkly',0,'2015-04-03 22:42:54','2015-04-03 23:57:05'),(23,'templateBo','Flatly',0,'2015-04-03 22:43:20','2015-04-03 22:43:20'),(24,'templateBo','Journal',0,'2015-04-03 22:43:20','2015-04-03 23:08:38'),(25,'templateBo','Lumen',0,'2015-04-03 22:43:41','2015-04-03 22:43:41'),(26,'templateBo','Paper',0,'2015-04-03 22:43:41','2015-04-04 12:06:32'),(27,'templateBo','Readable',0,'2015-04-03 22:43:58','2015-04-04 12:06:36'),(28,'templateBo','Sandstone',0,'2015-04-03 22:43:58','2015-04-04 12:05:39'),(29,'templateBo','Simplex',0,'2015-04-03 22:44:26','2015-04-08 11:24:03'),(30,'templateBo','Spacelab',0,'2015-04-03 22:44:26','2015-04-08 18:47:47'),(31,'templateBo','United',1,'2015-04-03 22:44:49','2015-04-08 18:48:08'),(32,'templateBo','Yeti',0,'2015-04-03 22:44:49','2015-04-04 11:55:18');
/*!40000 ALTER TABLE `config_css` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `idAdminUser` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL,
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,1,'Nom','Prénom','leger.au@gmail.com',NULL,0,'Ticket contact Email','2015-04-04 22:36:47','2015-04-04 22:36:47'),(2,1,'Nom','Prénom','leger.au@gmail.com',1,1,'Ticket contact Email','2015-04-04 22:37:57','2015-04-04 23:21:59'),(3,1,'Nom','Prénom','leger.au@gmail.com',1,2,'Ticket contact Email','2015-04-04 22:55:33','2015-04-04 23:21:54');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `post` varchar(15) DEFAULT NULL,
  `dateBirth` date DEFAULT NULL,
  `passChange` int(11) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'leger.au@gmail.com','0348027d379d6d59cbfdae1938dd6f7e','Nom','Prénom','Adresse','Ville','75012','1991-09-06',1,1,'2015-04-04 22:15:05','2015-04-04 22:36:09');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `description`
--

DROP TABLE IF EXISTS `description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `idAdminUser` int(11) DEFAULT NULL,
  `valueA` varchar(255) NOT NULL,
  `valueB` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `description`
--

LOCK TABLES `description` WRITE;
/*!40000 ALTER TABLE `description` DISABLE KEYS */;
/*!40000 ALTER TABLE `description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `role` tinyint(4) DEFAULT '0',
  `isActive` tinyint(4) DEFAULT '1',
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'SuperAdmin','00703d3d6f4c6d520f7afc3d882a37df','Admin','Super',1,1,'2015-04-03 11:37:25','2015-04-03 23:51:06');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-08 19:52:02
