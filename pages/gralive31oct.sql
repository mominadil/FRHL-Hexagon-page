-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: gralive
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academy_details`
--

DROP TABLE IF EXISTS `academy_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academy_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports_academy_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academy_details`
--

LOCK TABLES `academy_details` WRITE;
/*!40000 ALTER TABLE `academy_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `academy_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academy_lists`
--

DROP TABLE IF EXISTS `academy_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academy_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `academy_lists_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `academy_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `sports_academy_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academy_lists`
--

LOCK TABLES `academy_lists` WRITE;
/*!40000 ALTER TABLE `academy_lists` DISABLE KEYS */;
INSERT INTO `academy_lists` VALUES (2,'GSK Football School','Aktiv Nation, Al Quaiz, Dubai',450,1,1,NULL,'2022-06-16 07:55:25'),(3,'GSK Football School','Velocity Recreation, Al Quaiz, Dubai',450,1,1,NULL,'2022-06-16 07:55:36'),(4,'GSK Football School','Insportz Club, Al Quaiz, Dubai',450,1,1,NULL,'2022-06-16 07:55:51'),(5,'GSK Football School','Dome, Abu Dhabi',450,1,1,NULL,'2022-06-16 07:56:24'),(6,'GSK Football School','Target Sports Club, Al Karama, Dubai',450,1,1,NULL,'2022-06-16 07:56:47'),(7,'Grasport Cricket Academy','Zabeel Sports District by Emaar, Dubai Mall, Dubai',450,2,1,NULL,'2022-06-16 07:57:14'),(8,'Grasport Cricket Academy','Insportz Club, Al Quaiz, Dubai',450,2,1,NULL,'2022-06-16 07:58:22'),(9,'Grasport Cricket Academy','Velocity Recreation, Al Quaiz, Dubai',450,2,1,NULL,'2022-06-16 07:58:44'),(10,'Grasport Hoop Nation','Zabeel Sports District by Emaar, Dubai Mall, Dubai',450,3,1,NULL,'2022-06-16 07:59:22'),(12,'Grasport Hoop Nation','Aktiv Nation, Al Quaiz, Dubai',450,3,1,'2022-06-07 00:06:59','2022-06-16 07:59:39'),(13,'Grasport Hoop Nation','Zabeel sports district',450,4,1,'2022-06-16 08:00:16','2022-06-16 08:00:16'),(14,'Grasport Hoop Nation','Zabeel sports district',450,9,1,'2022-06-16 08:00:55','2022-06-16 08:00:55');
/*!40000 ALTER TABLE `academy_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'mominadil864@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL),(2,'admin@gmail.com','4297f44b13955235245b2497399d7a93',NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNumber` bigint NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_injuries` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sports_academy_id` int NOT NULL,
  `academic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `session_list_id` int NOT NULL,
  `instamojo_order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (6,'yasin','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Dome, Abu Dhabi',0,'GSK Football School',750,2,'MOJO2610S05A86472789','Captured','2022-06-09 23:54:32','2022-06-09 23:54:32'),(7,'adil','momin','mominadil933@gmail.com',918286623829,'2022-06-05',NULL,'Dome, Abu Dhabi',0,'GSK Football School',271,1,'MOJO2610I05A86472830','Captured','2022-06-10 01:56:16','2022-06-10 01:56:16'),(8,'adil','momin','mominadil046@gmail.com',917715964487,'2022-06-01',NULL,'Zabeel sports district',0,'Grasport Hoop Nation',800,9,'MOJO2611V05A65942422','Captured','2022-06-11 00:58:38','2022-06-11 00:58:38'),(9,'sdygwgahds','SDGh','sharisk@gmail.com',7715964487,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',750,2,'0','Pending','2022-06-13 07:24:42','2022-06-13 07:24:42'),(10,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-05',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',271,1,'0','Pending','2022-06-14 05:33:43','2022-06-14 05:33:43'),(11,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',1,1,'0','Pending','2022-06-14 05:36:36','2022-06-14 05:36:36'),(12,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',9,1,'0','Pending','2022-06-14 05:37:19','2022-06-14 05:37:19'),(13,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',9,1,'MOJO2614D05D60064795','Captured','2022-06-14 05:43:52','2022-06-14 05:43:52'),(14,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai',0,'GSK Football School',9,1,'0','Pending','2022-06-14 23:44:37','2022-06-14 23:44:37'),(15,'adil','momin','sharik@makemelive.in',77159644487,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 05:24:02','2022-06-15 05:24:02'),(16,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:10','2022-06-15 06:03:10'),(17,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:12','2022-06-15 06:03:12'),(18,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:21','2022-06-15 06:03:21'),(19,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:26','2022-06-15 06:03:26'),(20,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:27','2022-06-15 06:03:27'),(21,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:03:27','2022-06-15 06:03:27'),(22,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 06:59:43','2022-06-15 06:59:43'),(23,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-17','Test','Sports Club, Al Karama, Dubai, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 15:10:16','2022-06-15 15:10:16'),(24,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-17','Test','Sports Club, Al Karama, Dubai, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 15:10:50','2022-06-15 15:10:50'),(25,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 15:22:27','2022-06-15 15:22:27'),(26,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-17','Test','Sports Club, Al Karama, Dubai, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 15:22:51','2022-06-15 15:22:51'),(27,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-17','Test','Sports Club, Al Karama, Dubai, Dubai',1,'GSK Football School',9,1,'MOJO2615305D29501349','Captured','2022-06-15 15:27:00','2022-06-15 15:27:00'),(28,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-17','Hello Test','Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'MOJO2615805A39561984','Captured','2022-06-15 15:34:12','2022-06-15 15:34:12'),(29,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'MOJO2615V05A39561985','Captured','2022-06-15 15:42:48','2022-06-15 15:42:48'),(30,'Sharik Test Order','Shaikh','sharik@makemelive.in',919167352347,'2022-06-25','Hello','Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'MOJO2615905A39561986','Captured','2022-06-15 15:51:41','2022-06-15 15:51:41'),(31,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'MOJO2615K05A39561987','Captured','2022-06-15 15:54:34','2022-06-15 15:54:34'),(32,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-02',NULL,'Insportz Club, Al Quaiz, Dubai',1,'GSK Football School',9,1,'0','Pending','2022-06-15 16:03:28','2022-06-15 16:03:28'),(33,'Musheer','Khan','khaanmusheer@gmail.com',918087809563,'2022-06-01',NULL,'Dome, Abu Dhabi',1,'GSK Football School',9,1,'MOJO2615E05D29507988','Captured','2022-06-15 18:01:05','2022-06-15 18:01:05'),(34,'sharik','22','sharik@makemelive.in',2240032470,'2022-06-28','aacas','Aktiv Nation, Al Quaiz, Dubai',1,'GSK Football School',750,2,'0','Pending','2022-06-16 14:50:00','2022-06-16 14:50:00'),(35,'Sharik','Shaikh','sharik@makemelive.in',9167352347,'2022-06-18','Hello','Zabeel Sports District by Emaar, Dubai Mall, Dubai',3,'Grasport Hoop Nation',250,5,'0','Pending','2022-06-16 14:53:54','2022-06-16 14:53:54'),(36,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-10',NULL,'Aktiv Nation, Al Quaiz, Dubai',1,'GSK Football School',270,1,'0','Pending','2022-06-22 09:16:55','2022-06-22 09:16:55'),(37,'son dep trai','son dep trai','ccc@me.me',888888888,'1999-03-02',NULL,'Dome, Abu Dhabi',1,'GSK Football School',270,1,'N.A.','Pending','2022-09-29 16:23:06','2022-09-29 16:23:06');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demo_registrations`
--

DROP TABLE IF EXISTS `demo_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demo_registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNumber` bigint NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_injuries` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demo_registrations`
--

LOCK TABLES `demo_registrations` WRITE;
/*!40000 ALTER TABLE `demo_registrations` DISABLE KEYS */;
INSERT INTO `demo_registrations` VALUES (1,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Dome, Abu Dhabi','GSK Football School','2022-06-10 06:55:40','2022-06-10 06:55:40'),(2,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Dome, Abu Dhabi','GSK Football School','2022-06-10 06:57:22','2022-06-10 06:57:22'),(3,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Dome, Abu Dhabi','GSK Football School','2022-06-10 07:05:22','2022-06-10 07:05:22'),(4,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Dome, Abu Dhabi','2 GSK Football School','2022-06-14 08:22:23','2022-06-14 08:22:23'),(5,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-02',NULL,'Dome, Abu Dhabi','2 GSK Football School','2022-06-14 08:27:18','2022-06-14 08:27:18'),(6,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-05',NULL,'Dome, Abu Dhabi','2 GSK Football School','2022-06-14 08:28:04','2022-06-14 08:28:04'),(7,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Dome, Abu Dhabi','2 GSK Football School','2022-06-14 08:32:13','2022-06-14 08:32:13'),(8,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Dome, Abu Dhabi','2 GSK Football School','2022-06-14 08:34:09','2022-06-14 08:34:09'),(9,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-14 23:46:25','2022-06-14 23:46:25'),(10,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-14 23:47:04','2022-06-14 23:47:04'),(11,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-14 23:48:06','2022-06-14 23:48:06'),(12,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-14 23:51:04','2022-06-14 23:51:04'),(13,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-14 23:59:54','2022-06-14 23:59:54'),(14,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 00:00:44','2022-06-15 00:00:44'),(15,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-04',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:26:59','2022-06-15 03:26:59'),(16,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-15','3TYHTYRHSEFSDG','Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:28:58','2022-06-15 03:28:58'),(17,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-16','WRDFVDSDC','Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:30:43','2022-06-15 03:30:43'),(18,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-15','sdxgfchv','Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:34:07','2022-06-15 03:34:07'),(19,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-02',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:37:31','2022-06-15 03:37:31'),(20,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-03',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:38:59','2022-06-15 03:38:59'),(21,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-08',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 03:40:14','2022-06-15 03:40:14'),(22,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-02',NULL,'Insportz Club, Al Quaiz, Dubai','GSK Football School','2022-06-15 05:26:42','2022-06-15 05:26:42'),(23,'Musheer','Khan','khaanmusheer@gmail.com',918087809563,'2022-06-02',NULL,'Dome, Abu Dhabi','GSK Football School','2022-06-15 18:02:49','2022-06-15 18:02:49'),(25,'TEST1','Sharik','ershaikhsharik@gmail.com',9167352347,'2022-06-30','aadada',NULL,'Football Academies','2022-06-16 14:48:51','2022-06-16 14:48:51'),(26,'Sharik','Dhaikh','sharik@makemelive.in',91567352347,'2022-06-26','Hrlo',NULL,'Badminton Academies','2022-06-16 14:56:54','2022-06-16 14:56:54'),(27,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-01','skdguhiurw',NULL,'Football Academies','2022-06-16 14:59:14','2022-06-16 14:59:14'),(28,'Mujahid','Shaikh','mjshaikh9029@gmail.com',7208399219,'2022-06-09','Gdjxnf',NULL,'Summer Camp Academies','2022-06-16 14:59:45','2022-06-16 14:59:45'),(29,'adil','momin','mominadil864@gmail.com',7715964487,'2022-06-01',NULL,NULL,'Cricket Academies','2022-06-20 13:22:27','2022-06-20 13:22:27'),(30,'adil','momin','mominadil864@gmail.com',918286623829,'2022-06-02',NULL,NULL,'Football Academies','2022-06-22 08:58:35','2022-06-22 08:58:35'),(31,'adil','momin','mominadil864@gmail.com',918286623829,'2022-07-01',NULL,NULL,'Badminton Academies','2022-07-04 16:21:52','2022-07-04 16:21:52');
/*!40000 ALTER TABLE `demo_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_05_13_124743_create_bookings_table',1),(6,'2022_05_14_075527_create_admins_table',1),(7,'2022_05_16_075732_sports_academy',1),(8,'2022_05_16_075815_academy_details',1),(9,'2022_05_16_075837_academy_lists',1),(10,'2022_06_06_134327_create_session_lists_table',2),(11,'2022_06_10_110936_create_demo_registrations_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_lists`
--

DROP TABLE IF EXISTS `session_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_lists` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `number_of_sessions` int DEFAULT NULL,
  `price` int NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `sports_academy_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `session_lists_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_lists`
--

LOCK TABLES `session_lists` WRITE;
/*!40000 ALTER TABLE `session_lists` DISABLE KEYS */;
INSERT INTO `session_lists` VALUES (1,3,270,'(Monday, Wednesday, Friday)',6,1,1,'2022-06-07 04:59:32','2022-06-16 08:04:05'),(2,12,750,NULL,9,1,1,'2022-06-07 05:07:59','2022-06-23 11:24:36'),(3,3,200,'(Monday, Wednesday, Friday)',6,2,1,'2022-06-07 05:08:42','2022-06-07 05:08:42'),(4,12,700,NULL,9,2,1,'2022-06-07 05:09:23','2022-06-23 11:25:01'),(5,3,250,'(Monday, Wednesday, Friday)',6,3,1,'2022-06-07 05:09:51','2022-06-07 05:09:51'),(6,12,700,NULL,9,3,1,'2022-06-07 05:11:15','2022-06-23 11:25:15'),(7,3,200,'(Monday, Wednesday, Friday)',6,4,1,'2022-06-07 05:37:22','2022-06-07 05:37:22'),(8,NULL,300,NULL,7,4,1,'2022-06-07 05:46:40','2022-06-16 08:08:20'),(9,12,600,NULL,9,4,1,'2022-06-07 06:01:11','2022-06-23 11:25:41'),(10,3,300,'(Monday, Wednesday, Friday)',6,9,1,'2022-06-16 08:09:58','2022-06-16 08:09:58'),(11,12,800,'(3 to 7 years)',9,9,1,'2022-06-16 08:10:58','2022-06-23 11:26:35');
/*!40000 ALTER TABLE `session_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_category` varchar(200) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (6,'Sơn dep tria',1),(7,'hihi',1),(9,'hihi',1);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sports_academy`
--

DROP TABLE IF EXISTS `sports_academy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sports_academy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sports_academy`
--

LOCK TABLES `sports_academy` WRITE;
/*!40000 ALTER TABLE `sports_academy` DISABLE KEYS */;
INSERT INTO `sports_academy` VALUES (1,'hihi','https://img.vn/uploads/version/img24-png-20190726133727cbvncjKzsQ.png','mbg1',1,NULL,'2022-05-17 07:01:35'),(2,'hihi','https://img.vn/uploads/version/img24-png-20190726133727cbvncjKzsQ.png','mbg1',1,NULL,NULL),(3,'hihi','https://img.vn/uploads/version/img24-png-20190726133727cbvncjKzsQ.png','mbg2',1,NULL,NULL),(4,'hihi','https://img.vn/uploads/version/img24-png-20190726133727cbvncjKzsQ.png','mbg2',1,NULL,'2022-06-06 23:50:07'),(9,'hihi','https://img.vn/uploads/version/img24-png-20190726133727cbvncjKzsQ.png','mbg3',1,'2022-06-06 23:49:12','2022-06-06 23:49:41');
/*!40000 ALTER TABLE `sports_academy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-10-31  6:07:39
