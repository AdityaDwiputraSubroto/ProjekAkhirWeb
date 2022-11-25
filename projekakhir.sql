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
  PRIMARY KEY (`id_badan`),
  KEY `id_user_idx` (`id_user`),
  KEY `id_exercise_idx` (`id_exercise`),
  CONSTRAINT `id_exercises` FOREIGN KEY (`id_exercise`) REFERENCES `exercise` (`id_exercise`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badan`
--

LOCK TABLES `badan` WRITE;
/*!40000 ALTER TABLE `badan` DISABLE KEYS */;
INSERT INTO `badan` VALUES (2,236236,236236,1,'2022-11-19',13,'active'),(3,24,25,2,'2022-11-19',14,'active'),(4,58,172,3,'2022-11-19',15,'active'),(5,58,172,4,'2022-11-20',16,'active'),(6,58,172,2,'2022-11-20',17,'not active'),(7,59,174,2,'2022-11-25',18,'active'),(8,75,180,4,'2022-11-25',17,'active');
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
  `nama` varchar(45) DEFAULT NULL,
  `kalori` int DEFAULT NULL,
  `ukuran` float DEFAULT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan`
--

LOCK TABLES `makanan` WRITE;
/*!40000 ALTER TABLE `makanan` DISABLE KEYS */;
INSERT INTO `makanan` VALUES (1,'Ayam goreng',192,78),(2,'Rendang',195,100),(3,'Nasi goreng',250,149),(4,'Nasi putih',135,105),(5,'Mie ayam',421,240),(6,'Tumis kangkung',85,106),(7,'Ayam bakar',286,450);
/*!40000 ALTER TABLE `makanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makanan_harian`
--

DROP TABLE IF EXISTS `makanan_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makanan_harian` (
  `id_makanan_harian` int NOT NULL,
  `id_makanan` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_riwayat_harian` int DEFAULT NULL,
  PRIMARY KEY (`id_makanan_harian`),
  KEY `id_maknan_idx` (`id_makanan`),
  KEY `id_riwayat_harian_idx` (`id_riwayat_harian`),
  CONSTRAINT `id_makanan` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`),
  CONSTRAINT `id_riwayat_harian` FOREIGN KEY (`id_riwayat_harian`) REFERENCES `riwayat_harian` (`id_riwayat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan_harian`
--

LOCK TABLES `makanan_harian` WRITE;
/*!40000 ALTER TABLE `makanan_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `makanan_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_harian`
--

DROP TABLE IF EXISTS `riwayat_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_harian` (
  `id_riwayat` int NOT NULL,
  `id_badan` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `tdee` float DEFAULT NULL,
  `kalori_makanan` float DEFAULT NULL,
  PRIMARY KEY (`id_riwayat`),
  KEY `id_badan_idx` (`id_badan`),
  CONSTRAINT `id_badan` FOREIGN KEY (`id_badan`) REFERENCES `badan` (`id_badan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_harian`
--

LOCK TABLES `riwayat_harian` WRITE;
/*!40000 ALTER TABLE `riwayat_harian` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (13,'ASDAD','1362-02-02','ASDADS','Female'),(14,'SAYA','4225-02-24','24124154','Male'),(15,'tes','2002-01-23','123','Male'),(16,'female','2002-01-23','123','Female'),(17,'gigachad','2002-01-23','123','Male'),(18,'baru','2002-01-23','baru','Male');
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

-- Dump completed on 2022-11-25 15:50:36
