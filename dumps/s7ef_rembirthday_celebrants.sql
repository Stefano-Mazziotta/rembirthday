-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: s7ef_rembirthday
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `celebrants`
--

DROP TABLE IF EXISTS `celebrants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `celebrants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `relationship_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `celebrants_relationship_id_foreign` (`relationship_id`),
  CONSTRAINT `celebrants_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `celebrants`
--

LOCK TABLES `celebrants` WRITE;
/*!40000 ALTER TABLE `celebrants` DISABLE KEYS */;
INSERT INTO `celebrants` VALUES (2,'Carmela','Noya','2001-01-18',3,'2023-11-28 04:04:08','2023-11-28 04:04:08'),(3,'Stefano','Mazziotta','2001-01-12',3,'2023-11-28 04:16:03','2023-11-28 04:16:03'),(4,'Nacho','De Lorenzi','1998-01-18',4,'2024-01-03 00:00:35','2024-01-03 00:00:35'),(5,'Sofia','Tomassetti','2001-09-12',3,'2024-01-04 21:03:27','2024-01-04 21:03:27'),(6,'Juancho','El gordo','1990-09-13',3,'2024-01-04 21:05:36','2024-01-04 21:05:36'),(7,'Carina','Garrido','1963-09-12',3,'2024-01-04 21:12:28','2024-01-04 21:12:28'),(8,'Silvia','Mauro','1963-11-06',3,'2024-01-04 21:13:05','2024-01-04 21:13:05'),(9,'Claudio','Mazziotta','1963-11-19',3,'2024-01-04 21:13:33','2024-01-04 21:13:33'),(10,'Chalo','Perez','2001-05-25',3,'2024-01-04 21:13:52','2024-01-04 21:13:52'),(11,'Chalo','Perez','2001-05-25',3,'2024-01-04 21:13:54','2024-01-04 21:13:54'),(12,'Raul','Garrido','1930-05-25',3,'2024-01-04 21:14:33','2024-01-04 21:14:33'),(13,'Popi','Poggi','1992-12-03',3,'2024-01-04 21:14:54','2024-01-04 21:14:54'),(14,'Laucha','Frontons','2001-04-20',3,'2024-01-04 21:15:21','2024-01-04 21:15:21'),(15,'Gino','Mazziotta','1995-03-07',3,'2024-01-04 21:15:48','2024-01-04 21:15:48'),(16,'Giuliano','Mazziotta','1993-12-24',3,'2024-01-04 21:16:53','2024-01-04 21:16:53'),(17,'Violeta','Mazziotta','2003-12-26',3,'2024-01-04 21:17:12','2024-01-04 21:17:12'),(18,'Solana','Mazziotta','1997-12-26',3,'2024-01-04 21:17:26','2024-01-04 21:17:26'),(19,'Tio Fer','Mazziotta','1968-11-25',3,'2024-01-04 21:17:54','2024-01-04 21:17:54'),(20,'Facu','Fibla','1999-01-25',3,'2024-01-04 21:18:13','2024-01-04 21:18:13'),(21,'Tomi','Mazziotta','2002-01-28',3,'2024-01-04 21:18:34','2024-01-04 21:18:34'),(22,'Lalo','Pagliaretti','1988-02-07',3,'2024-01-04 21:19:00','2024-01-04 21:19:00'),(23,'Valen','Ruiz','2001-02-01',3,'2024-01-04 21:24:33','2024-01-04 21:24:33'),(24,'Ana','Maria','1930-02-07',3,'2024-01-04 21:25:01','2024-01-04 21:25:01'),(25,'Tai','Perez','2001-02-15',3,'2024-01-04 21:25:17','2024-01-04 21:25:17'),(26,'Pao','Galassi','1985-02-20',3,'2024-01-04 21:25:46','2024-01-04 21:25:46'),(27,'Tomás G.','Gonzalez','2001-03-10',3,'2024-01-04 21:26:07','2024-01-04 21:26:07'),(28,'Waso','Ramos','2001-04-01',3,'2024-01-04 21:26:28','2024-01-04 21:26:28'),(29,'Sole','Mazziotta','1990-07-21',3,'2024-01-04 21:26:41','2024-01-04 21:26:41'),(30,'Tia Marcela','Garrido','1960-07-18',3,'2024-01-04 21:27:01','2024-01-04 21:27:01'),(31,'Tio Ariel','Noya','1960-07-24',3,'2024-01-04 21:27:17','2024-01-04 21:27:17'),(32,'Javinho','-','1960-07-24',3,'2024-01-04 21:27:33','2024-01-04 21:27:33'),(33,'Juan','Frontons','1970-08-23',3,'2024-01-04 21:27:50','2024-01-04 21:27:50');
/*!40000 ALTER TABLE `celebrants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-04 15:35:09
