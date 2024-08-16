-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: client_management
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+03:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `check_ins`
--

DROP TABLE IF EXISTS `check_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_ins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `check_in_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `check_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_name` (`client_name`),
  CONSTRAINT `check_ins_ibfk_1` FOREIGN KEY (`client_name`) REFERENCES `clients` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_ins`
--

LOCK TABLES `check_ins` WRITE;
/*!40000 ALTER TABLE `check_ins` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_ins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_no` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text COLLATE utf8mb4_general_ci,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computer`
--

DROP TABLE IF EXISTS `computer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comp_name` (`comp_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer`
--

LOCK TABLES `computer` WRITE;
/*!40000 ALTER TABLE `computer` DISABLE KEYS */;
INSERT INTO `computer` VALUES (6,'ERE 11'),(8,'ERE 12'),(1,'ERE 13'),(2,'ERE 14'),(5,'ERE 15'),(9,'ERE 16'),(7,'ERE 17');
/*!40000 ALTER TABLE `computer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computer_check_in`
--

DROP TABLE IF EXISTS `computer_check_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer_check_in` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `client_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `check_in_time` datetime NOT NULL,
  `check_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer_check_in`
--

LOCK TABLES `computer_check_in` WRITE;
/*!40000 ALTER TABLE `computer_check_in` DISABLE KEYS */;
INSERT INTO `computer_check_in` VALUES (1,'ERE13','kip','2024-06-22 09:15:57','2024-06-22 09:33:16'),(3,'','fff','2024-06-22 10:57:24',NULL),(6,'222222','kip','2024-06-22 10:27:44','2024-06-22 10:46:20'),(7,'ERE13','fff','2024-06-22 10:34:07','2024-06-22 10:46:25'),(8,'222222','winner','2024-06-22 10:34:48','2024-06-22 10:46:28'),(11,'ERE14','kip','2024-06-22 11:11:00','2024-06-22 11:11:18'),(12,'222222','pov','2024-06-22 11:11:40','2024-06-22 11:12:44'),(13,'ERE13','winner','2024-06-22 11:11:46','2024-06-22 11:23:10'),(15,'ERE13','pov','2024-06-22 11:23:22','2024-06-22 11:23:40'),(16,'ere34','kip','2024-06-22 12:12:47','2024-06-22 12:13:12'),(25,'222222','kip','2024-06-24 16:12:10','2024-06-24 16:12:51'),(26,'ERE14','kip','2024-06-24 16:12:19','2024-06-24 16:14:52'),(27,'ere34','kip','2024-06-24 16:12:27','2024-06-24 17:16:09'),(28,'ERE13','fff','2024-06-24 16:12:34','2024-06-24 16:13:10'),(29,'222222','kip','2024-06-24 16:13:02','2024-06-24 17:16:24'),(30,'ERE13','winner','2024-06-24 16:13:19','2024-06-24 16:13:28'),(31,'ERE13','winner','2024-06-24 16:14:03','2024-06-24 16:14:10'),(32,'ERE13','pov','2024-06-24 16:14:44','2024-06-24 17:16:17');
/*!40000 ALTER TABLE `computer_check_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` enum('available','checked-out','checked-in') DEFAULT 'available',
  `date_registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (1,'PAUL','LAPTOP','333333','gr','checked-out','2024-07-24 08:35:05'),(2,'SAMMY','LAPTOP','233234','HP','checked-in','2024-07-24 08:43:28'),(3,'SAMMY','LAPTOP','333333','HP','checked-out','2024-07-24 08:47:47'),(4,'paul','LAPTOP','333333','HP','checked-out','2024-07-24 08:50:41'),(5,'paul','MOUSE','233234','HP','checked-out','2024-07-24 08:50:41'),(6,'40167873','LAPTOP','333333','HP','available','2024-07-24 09:15:29'),(7,'20123453','LAPTOP','333333','HP','available','2024-07-24 09:35:08'),(8,'20123453','MOUSE','233234','HP','available','2024-07-24 09:35:08'),(9,'20123453','CHARGER','4444444','HP','available','2024-07-24 09:35:09'),(10,'paul','LAPTOP','333333','HP','available','2024-07-24 12:25:21'),(11,'paul','LAPTOP','333333','HP','available','2024-07-24 12:42:46'),(12,'paul','LAPTOP','333333','HP','available','2024-07-24 12:44:07'),(13,'paul','LAPTOP','333333','HP','available','2024-07-24 12:45:19'),(14,'paul','LAPTOP','333333','HP','available','2024-07-24 12:54:13'),(15,'paul','LAPTOP','333333','HP','available','2024-07-24 12:54:32'),(16,'paul','LAPTOP','333333','HP','available','2024-07-24 12:55:13'),(17,'paul','LAPTOP','333333','HP','available','2024-07-24 13:06:54'),(18,'paul','LAPTOP','333333','HP','available','2024-07-24 13:09:03');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_log`
--

DROP TABLE IF EXISTS `equipment_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `equipment_id` int DEFAULT NULL,
  `action` enum('check-in','check-out') NOT NULL,
  `action_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `equipment_log_ibfk_1` (`equipment_id`),
  CONSTRAINT `equipment_log_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_log`
--

LOCK TABLES `equipment_log` WRITE;
/*!40000 ALTER TABLE `equipment_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (1,'poppixieempire@gmail.com','f1ffc6b3e0fec86083d3fccd8557cf9a1646e0e28181eb900241a8962654e7eaccf775a1dfa348b7a9ef1f5ff83903635d8b','2024-06-21 18:17:35'),(2,'poppixieempire@gmail.com','3a3ff3e5a7da18f90558a11e999642ccdbeb7f42f41d2c783c4f4ee30cc70947c22a89447059ff2dc841ee29cb309342cfea','2024-06-21 18:21:14'),(3,'poppixieempire@gmail.com','6c476066a076fa7f0f4fa46d6e821cd032524fe9cf7896d12fd40a2b2cd69f8b361fd70b9a13e97d29e3645dd2e2f93d18a0','2024-06-21 18:26:41'),(4,'poppixieempire@gmail.com','0c6655ef49a42eca0a975d1c606f241b738592decc6ef984ce3e5c12c216a61f86eccdffd3bfec5312e21352ca97c8028edf','2024-06-21 18:45:53'),(5,'poppixieempire@gmail.com','9767fa880b2c54127860d8ac7211314333089ec8f706f6fdaf527d63f47a5b5cebdd57485a1d02ceceff8231d828f8b806ab','2024-06-21 19:57:42'),(6,'poppixieempire@gmail.com','e78e36319c96ad7b474c6fa2f41d9b855540c1156c66c5ddf0989449507536178eb6756773bec97a3353599ac3828a2b7d77','2024-06-21 20:26:38'),(7,'pogba1762@gmail.com','bb6acbca94a9f35c47274514afa2b96617ad8c0ac9fc235ae0e0f042482e4182e5cad031c2926df9c460be84850efda514dc','2024-06-21 20:28:32'),(8,'pogba1762@gmail.com','b8ffdaa7fc4668ed56509c9e83b1fd0fd95f8a5dd5f5d32cc0ac8a5986699641919dc8518a7776377eda4a2bc5d0e2558240','2024-06-21 20:34:54'),(9,'pogba1762@gmail.com','870a6164c1e90bb486f83b0f8af4ac8ed5735d35d2d9348fe3ba6b0b443adb6ed44cac2816124b9fdaf9c21106dcabc824e0','2024-06-21 20:35:36'),(10,'pogba1762@gmail.com','b14624368cd615e390a35d439534b7347cf066dad69812b49f42737a24c64a17998cdd7902340001be84352b354a69a758a8','2024-06-21 20:37:37'),(11,'pogba1762@gmail.com','79f96a363209bec2a52eab9e861faf15639a430cece198a2bce2bf4be11fe814a1884eb2d1fce71709fcdc5e8a3b5674ecc6','2024-06-21 20:38:54'),(12,'pogba1762@gmail.com','f003bb3f77ae2afad34c0eb662803d93e496b4ded3070d92ae9aa8592c21669df41a981b6487d8ce58c57e059cde61b0587d','2024-06-21 20:40:12'),(13,'pogba1762@gmail.com','dc8a9e43f11697139cd31643e71a686327ca535f3e103e2fdac7c1afd64dcfcd0d766fb6c4dd0b5b85106017cfd73730e242','2024-06-21 20:41:25'),(14,'pogba1762@gmail.com','3fabbeefb88ff995c3349d5c7537d532297098f0728e0c6254d30d3ee3bd65cfba79e6c1ea732d53c94547c35051f8b83855','2024-06-21 20:41:29');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'C:\\xampp\\htdocs\\KNLS\\KNLS\\images\\users',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'poze','','$2y$10$JOp4kFTbVqnGjhQsYEK./eBpWHa3gCN7cryFQQiGuGUJD.hxgEKCu','admin','default_profile_pic_url'),(8,'william','pogba1762@gmail.com','$2y$10$HX1B5YmnAFgF61P1Z37DSOak8VpzfZthp7Q9DqleknL5Xh5tFIvVe','user','default_profile_pic_url'),(9,'cele','pogba1762@gmail.com','$2y$10$KUJGhlE0CesyzmL.SLkuruWjJd6DZgMZYsO9Nb2YS7bW2Vyiwv.FW','user','download.jfif'),(11,'sammy','njorogestanley186@gmail.com','$2y$10$z9YdzKa2h2oR/Hsts5oe9O.ZaPABl8epiqG.nLBUJl9zJuJ1dcov2','user','Untitled.jpg'),(12,'poppixie','poppixieempire@gmail.com','$2y$10$YJnvrGLOBaXATa8X6ZabHe5AOANDwHBxxlhfey5DFBF71wcvBnrFq','user','Untitled.jpg'),(13,'winner','7416.2020@students.ku.ac.ke','$2y$10$SYJxoftYjHn5kvj2EvPC.uiM9Kj1ik.IpaKVJ95c5u9KaHrlVaw0K','user','download.jfif');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-26 15:15:06
