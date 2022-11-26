CREATE DATABASE  IF NOT EXISTS `prakwebproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prakwebproject`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: prakwebproject
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
-- Table structure for table `badan`
--

DROP TABLE IF EXISTS `badan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badan` (
  `id_badan` int NOT NULL AUTO_INCREMENT,
  `berat` int DEFAULT NULL,
  `tinggi` int DEFAULT NULL,
  `id_exercise` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `tdee` int DEFAULT NULL,
  PRIMARY KEY (`id_badan`),
  KEY `id_user_idx` (`id_user`),
  KEY `id_exercise_idx` (`id_exercise`),
  CONSTRAINT `id_exercises` FOREIGN KEY (`id_exercise`) REFERENCES `exercise` (`id_exercise`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badan`
--

LOCK TABLES `badan` WRITE;
/*!40000 ALTER TABLE `badan` DISABLE KEYS */;
INSERT INTO `badan` VALUES (9,58,172,1,'2022-11-26',17,'active',19.61,1902),(10,55,165,2,'2022-11-25',17,'not active',20.2,2075),(11,75,178,3,'2022-11-26',20,'active',23.67,3075),(14,58,172,1,'2022-11-26',21,'active',19.61,2065),(15,58,172,1,'2022-11-26',22,'active',19.61,1902);
/*!40000 ALTER TABLE `badan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise`
--

DROP TABLE IF EXISTS `exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercise` (
  `id_exercise` int NOT NULL,
  `aktivitas` varchar(45) DEFAULT NULL,
  `poin` float DEFAULT NULL,
  PRIMARY KEY (`id_exercise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise`
--

LOCK TABLES `exercise` WRITE;
/*!40000 ALTER TABLE `exercise` DISABLE KEYS */;
INSERT INTO `exercise` VALUES (1,'Sangat jarang olahraga',1.2),(2,'Jarang olahraga (1-2 kali seminggu)',1.375),(3,'Olahraga normal (2-3 kali seminggu)',1.55),(4,'Sering olahraga (4-5 kali seminggu)',1.725),(5,'Sangat sering olahraga (2 kali sehari)',1.9);
/*!40000 ALTER TABLE `exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makanan`
--

DROP TABLE IF EXISTS `makanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makanan` (
  `id_makanan` int NOT NULL,
  `nama_makanan` varchar(45) DEFAULT NULL,
  `kalori` int DEFAULT NULL,
  `ukuran` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan`
--

LOCK TABLES `makanan` WRITE;
/*!40000 ALTER TABLE `makanan` DISABLE KEYS */;
INSERT INTO `makanan` VALUES (1,'Ayam goreng',391,'1 buah'),(2,'Rendang',468,'1 porsi (240g)'),(3,'Nasi goreng',250,'1 porsi (149 gr)'),(4,'Nasi putih',135,'1 porsi (105 gr)'),(5,'Mie ayam',421,'1 porsi (240 gr)'),(6,'Tumis kangkung',106,'1 porsi (85 gr)'),(7,'Ayam bakar',286,'1 buah');
/*!40000 ALTER TABLE `makanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makanan_harian`
--

DROP TABLE IF EXISTS `makanan_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makanan_harian` (
  `id_makanan_harian` int NOT NULL AUTO_INCREMENT,
  `id_makanan` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_riwayat` int DEFAULT NULL,
  PRIMARY KEY (`id_makanan_harian`),
  KEY `id_maknan_idx` (`id_makanan`),
  KEY `id_riwayat_harian_idx` (`id_riwayat`),
  CONSTRAINT `id_makanan` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`),
  CONSTRAINT `id_riwayat_harian` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat_harian` (`id_riwayat`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan_harian`
--

LOCK TABLES `makanan_harian` WRITE;
/*!40000 ALTER TABLE `makanan_harian` DISABLE KEYS */;
INSERT INTO `makanan_harian` VALUES (16,1,3,41),(17,1,1,41),(18,5,1,41),(22,1,3,25),(24,6,1,25);
/*!40000 ALTER TABLE `makanan_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_harian`
--

DROP TABLE IF EXISTS `riwayat_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_harian` (
  `id_riwayat` int NOT NULL AUTO_INCREMENT,
  `id_badan` int DEFAULT NULL,
  `date_riwayat` date DEFAULT NULL,
  `kalori_makanan` float DEFAULT NULL,
  PRIMARY KEY (`id_riwayat`),
  KEY `id_badan_idx` (`id_badan`),
  CONSTRAINT `id_badan` FOREIGN KEY (`id_badan`) REFERENCES `badan` (`id_badan`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_harian`
--

LOCK TABLES `riwayat_harian` WRITE;
/*!40000 ALTER TABLE `riwayat_harian` DISABLE KEYS */;
INSERT INTO `riwayat_harian` VALUES (25,11,'2022-11-26',1279),(30,14,'2022-11-26',0),(31,15,'2022-11-26',0),(41,9,'2022-11-26',1985);
/*!40000 ALTER TABLE `riwayat_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (17,'gigachad','2002-01-23','123','Male'),(20,'Megachad','2002-01-23','123','Male'),(21,'nochad','2002-01-23','123','Male'),(22,'baru','2002-01-23','baru','Male');
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

-- Dump completed on 2022-11-26 19:43:33
