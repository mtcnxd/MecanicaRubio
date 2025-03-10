-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: mecanica_rubio
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.22.04.1

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
-- Table structure for table `autos`
--

DROP TABLE IF EXISTS `autos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Activo','Eliminado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autos`
--

LOCK TABLES `autos` WRITE;
/*!40000 ALTER TABLE `autos` DISABLE KEYS */;
INSERT INTO `autos` VALUES (1,'Nissan','Versa','2016','YYD-905-E',NULL,1,NULL,'Activo','2025-03-01 03:44:01','2025-03-01 03:44:01'),(2,'Mitsubishi','L200','2013','YS-6460-C',NULL,3,NULL,'Activo','2025-03-01 03:57:30','2025-03-01 03:57:30'),(3,'Ford','Ranger','2017','YS-6231-D',NULL,3,NULL,'Activo','2025-03-01 03:58:55','2025-03-01 03:58:55'),(4,'Chevrolet','Beat','2020','YZJ-137-E',NULL,4,NULL,'Activo','2025-03-01 04:04:27','2025-03-01 04:04:27'),(5,'Toyota','Camry','2007','ZBE-290-E',NULL,5,NULL,'Activo','2025-03-01 04:08:43','2025-03-01 04:08:43'),(6,'Mercedes Benz','GLK 280','2009',NULL,NULL,6,'Camioneta color Negra','Activo','2025-03-01 04:28:09','2025-03-01 04:28:09'),(7,'Mercedes Benz','GLK 300','2014',NULL,NULL,6,'Camioneta color Blanca','Activo','2025-03-01 04:30:12','2025-03-01 04:30:12'),(8,'Mazda','CX-7','2012',NULL,NULL,7,NULL,'Activo','2025-03-01 04:36:37','2025-03-01 04:36:37'),(9,'Mercedes Benz','C 180','2015',NULL,NULL,8,NULL,'Activo','2025-03-01 04:44:09','2025-03-01 04:44:09'),(10,'Lincoln','MKC','2017',NULL,NULL,8,NULL,'Activo','2025-03-01 04:46:37','2025-03-01 04:46:37'),(11,'Suzuki','Swift','2023',NULL,NULL,2,'Chaquetin','Activo','2025-03-01 04:53:41','2025-03-01 04:53:41'),(12,'Ford','Ranger','2008',NULL,'8AFDT50D886173565',9,NULL,'Activo','2025-03-03 16:32:49','2025-03-03 16:32:49'),(13,'Mercedes Benz','CLA 250','2017',NULL,'WDDSJ4EB2HN413842',10,NULL,'Activo','2025-03-03 16:50:34','2025-03-03 16:50:34');
/*!40000 ALTER TABLE `autos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Nissan',0,NULL),(2,'Mitsubishi',0,NULL),(3,'Ford',0,NULL),(4,'Chevrolet',0,NULL),(5,'Toyota',0,NULL),(6,'Mercedes Benz',1,NULL),(7,'Mazda',0,NULL),(8,'Lincoln',1,NULL),(9,'Suzuki',0,NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calendar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Activo','Eliminado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Sandra Elena Rosado Rodriguez','levicorazon7@gmail.com','9993623334','97143','C- 33 #336 x 20 y 22','Polígono 108','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 03:36:25','2025-03-01 03:36:25'),(2,'Uriel Antonio Ruiz Yupit','antonio_012994@hotmail.com','9991408358','97302',NULL,'Las Américas','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 03:50:19','2025-03-01 03:50:19'),(3,'Jovani Arodi',NULL,'9995887787','97143',NULL,'Boulevares de Oriente','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 03:52:55','2025-03-01 03:52:55'),(4,'Jose Eduardo Blanco Encalada',NULL,'9992029833','97392',NULL,'Piedra de Agua','Umán','Yucatán',NULL,NULL,'Activo','2025-03-01 04:02:22','2025-03-01 04:02:22'),(5,'Roberto Leal',NULL,'9991513495','97000',NULL,'Mérida Centro','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 04:05:27','2025-03-01 04:05:27'),(6,'Gerardo Abraham Pujula Tiburcio','gerardopujula@yahoo.com.mx','9993388788','97130','C- 23 #306 x 32 y 34','Montecarlo','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 04:23:54','2025-03-01 04:23:54'),(7,'Carlos Chan',NULL,'9993661948',NULL,NULL,'- Selecciona una colonia -',NULL,NULL,NULL,NULL,'Activo','2025-03-01 04:34:03','2025-03-01 04:34:03'),(8,'Armando López',NULL,'9991464650','97113','C-12b #318a x 17 y 19','Montebello','Mérida','Yucatán',NULL,NULL,'Activo','2025-03-01 04:43:13','2025-03-01 04:43:13'),(9,'Cesar Edgardo Aguilar Mex',NULL,'9995075694','97370','C- 25 #580 x 32 y 34','San Pedro Noh Pat','Kanasín','Yucatán',NULL,NULL,'Activo','2025-03-03 16:32:23','2025-03-03 16:32:23'),(10,'Omar Baeza',NULL,'9995689951',NULL,NULL,'- Selecciona una colonia -',NULL,NULL,NULL,NULL,'Activo','2025-03-03 16:48:15','2025-03-03 16:48:15');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configurations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configurations`
--

LOCK TABLES `configurations` WRITE;
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` VALUES (1,'telegram_api','bot8169963766:AAGGQYcAR-bwEew8p9Amo5SWb-PL79IQGAM','api'),(2,'whatsapp_api','EAARe8OvWY7MBO9XINyyUBxlqHa8Eim5r6ZAcLtGbAlhGZA8SP9vYlkdUWQhJfivKSUYCTu99Qq6zYZAfcX0cO1GhgGIb8bBw4NsfGs2RmomZCqihD0mAC49hSDRVkT2lyG8Ts8srQvkLGLZA0mchlP3D1y7JQFZANEqSyB7I0qKAhK7rQEZBYMoahp5A4u6SyUG2nXLXVNZCN9Lc9EGcvC2eYniD','api');
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `salary` double NOT NULL,
  `extra` double DEFAULT NULL,
  `periodicity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `depto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Activo','Inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,1,0,0,'','Admin','TUCM851227ES3',NULL,NULL,'Activo',NULL,NULL,NULL),(2,2,0,NULL,'Sin definir','Gerencia',NULL,NULL,NULL,'Activo',NULL,'2025-02-27 20:35:13','2025-02-27 20:35:13'),(3,3,3000,NULL,'Semanal','Mecanico',NULL,NULL,NULL,'Activo','Mecanico','2024-01-22 20:35:59','2025-02-27 20:35:59');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` int NOT NULL DEFAULT '1',
  `price` double NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pagado',
  `responsible` int NOT NULL,
  `attach` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (6,'Soldadura','1 kg de soldadura',1,75,'Pagado',2,'1741383797.jpg','2025-03-04 18:57:11','2025-03-04 18:57:11'),(7,'Gasto de prueba','Esta es una prueba de gasto',1,200,'Pendiente',1,'','2025-03-07 23:02:11','2025-03-07 23:02:11');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (550,'2014_10_12_000000_create_users_table',1),(551,'2014_10_12_100000_create_password_reset_tokens_table',1),(552,'2019_08_19_000000_create_failed_jobs_table',1),(553,'2019_12_14_000001_create_personal_access_tokens_table',1),(554,'2024_02_07_232401_create_clients',1),(555,'2024_02_08_002513_create_autos',1),(556,'2024_02_14_210419_create_postalcodes',1),(557,'2024_02_14_234752_create_brands',1),(558,'2024_02_14_234846_create_models',1),(559,'2024_02_16_181819_create_services_items',1),(560,'2024_02_16_215709_create_services',1),(561,'2024_02_20_103912_create_expenses',1),(562,'2024_02_23_130424_create_calendar',1),(563,'2024_03_27_185756_create_employees',1),(564,'2024_04_15_120025_create_salaries',1),(565,'2025_02_26_130943_create_salaries_details',1),(566,'2025_03_08_152251_create_configurations',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,'Nissan','Versa'),(2,'Mitsubishi','L200'),(3,'Ford','Ranger'),(4,'Chevrolet','Beat'),(5,'Toyota','Camry'),(6,'Mercedes Benz','GLK 280'),(7,'Mercedes Benz','GLK 300'),(8,'Mazda','CX-7'),(9,'Mercedes Benz','C 180'),(10,'Lincoln','MKC'),(11,'Suzuki','Swift'),(12,'Mercedes Benz','CLA 250');
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `postalcodes`
--

DROP TABLE IF EXISTS `postalcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postalcodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `postalcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1643 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postalcodes`
--

LOCK TABLES `postalcodes` WRITE;
/*!40000 ALTER TABLE `postalcodes` DISABLE KEYS */;
INSERT INTO `postalcodes` VALUES (1,'97000','Mérida Centro','Mérida','Yucatán'),(2,'97000','Itzaes','Mérida','Yucatán'),(3,'97000','Madrid','Mérida','Yucatán'),(4,'97000','Villa Fontana','Mérida','Yucatán'),(5,'97000','La Quinta','Mérida','Yucatán'),(6,'97000','Los Cocos','Mérida','Yucatán'),(7,'97000','Privada Del Maestro','Mérida','Yucatán'),(8,'97000','Jardines de San Sebastian','Mérida','Yucatán'),(9,'97003','Los Reyes','Mérida','Yucatán'),(10,'97050','Alcalá Martín','Mérida','Yucatán'),(11,'97050','Yucatán','Mérida','Yucatán'),(12,'97059','Señorial','Mérida','Yucatán'),(13,'97060','Carrillo Ancona','Mérida','Yucatán'),(14,'97069','Inalámbrica','Mérida','Yucatán'),(15,'97070','Dolores Patron','Mérida','Yucatán'),(16,'97070','Garcia Gineres','Mérida','Yucatán'),(17,'97070','El Pedregal','Mérida','Yucatán'),(18,'97080','La Huerta','Mérida','Yucatán'),(19,'97088','Santa Cecilia','Mérida','Yucatán'),(20,'97089','Cupules','Mérida','Yucatán'),(21,'97098','Lourdes','Mérida','Yucatán'),(22,'97099','Waspa','Mérida','Yucatán'),(23,'97100','Itzimna','Mérida','Yucatán'),(24,'97100','Itzimna','Mérida','Yucatán'),(25,'97100','Itzimna 2','Mérida','Yucatán'),(26,'97100','Rinconada Itzmina','Mérida','Yucatán'),(27,'97107','Manola','Mérida','Yucatán'),(28,'97108','Las Arboledas','Mérida','Yucatán'),(29,'97109','Ferrocarrileros','Mérida','Yucatán'),(30,'97109','Jesús Carranza','Mérida','Yucatán'),(31,'97110','Revolución (Cordemex)','Mérida','Yucatán'),(32,'97113','Montebello','Mérida','Yucatán'),(33,'97113','San Antonio','Mérida','Yucatán'),(34,'97113','Xaman-Tan','Mérida','Yucatán'),(35,'97114','Monte Alban','Mérida','Yucatán'),(36,'97114','Residencial Sol Campestre','Mérida','Yucatán'),(37,'97115','Sodzil Norte','Mérida','Yucatán'),(38,'97115','Montes de Ame','Mérida','Yucatán'),(39,'97115','Gonzalo Guerrero','Mérida','Yucatán'),(40,'97115','Residencial Montejo Norte','Mérida','Yucatán'),(41,'97115','Ampliación Revolución','Mérida','Yucatán'),(42,'97115','Residencial San Angelo','Mérida','Yucatán'),(43,'97116','San Antonio Cucul','Mérida','Yucatán'),(44,'97116','Privada San Antonio Cucul','Mérida','Yucatán'),(45,'97117','San Ramon Norte','Mérida','Yucatán'),(46,'97117','San Ramon Sur','Mérida','Yucatán'),(47,'97117','San Ramon Norte I','Mérida','Yucatán'),(48,'97117','Villareal','Mérida','Yucatán'),(49,'97117','Xaman-Kab','Mérida','Yucatán'),(50,'97118','Plan de Ayala','Mérida','Yucatán'),(51,'97118','Villas Del Sol','Mérida','Yucatán'),(52,'97118','Ampliación Plan de Ayala (Villas del Sol)','Mérida','Yucatán'),(53,'97119','Benito Juárez Nte','Mérida','Yucatán'),(54,'97119','Villas La Hacienda','Mérida','Yucatán'),(55,'97119','Gonzalo Guerrero','Mérida','Yucatán'),(56,'97119','Villas del Rey','Mérida','Yucatán'),(57,'97120','Campestre','Mérida','Yucatán'),(58,'97120','Del Norte','Mérida','Yucatán'),(59,'97120','Tecnológico','Mérida','Yucatán'),(60,'97120','Ampliación del Norte (1a. Ampliación)','Mérida','Yucatán'),(61,'97125','México','Mérida','Yucatán'),(62,'97125','Privada Nuevo México','Mérida','Yucatán'),(63,'97127','Buenavista','Mérida','Yucatán'),(64,'97127','Montejo','Mérida','Yucatán'),(65,'97128','México Norte','Mérida','Yucatán'),(66,'97128','Privada Mediterráneo','Mérida','Yucatán'),(67,'97128','Residencial Colonia México','Mérida','Yucatán'),(68,'97129','Emiliano Zapata Nte','Mérida','Yucatán'),(69,'97130','Torremolinos','Mérida','Yucatán'),(70,'97130','Diaz Ordaz','Mérida','Yucatán'),(71,'97130','San Carlos','Mérida','Yucatán'),(72,'97130','Vista Alegre','Mérida','Yucatán'),(73,'97130','Residencial Palmerales de Altabrisa','Mérida','Yucatán'),(74,'97130','Missan II','Mérida','Yucatán'),(75,'97130','Residencial Altabrisa','Mérida','Yucatán'),(76,'97130','Montecarlo','Mérida','Yucatán'),(77,'97130','Vista Alegre','Mérida','Yucatán'),(78,'97130','Vista Alegre Norte','Mérida','Yucatán'),(79,'97130','Altabrisa','Mérida','Yucatán'),(80,'97130','San Remo','Mérida','Yucatán'),(81,'97130','Santa Rita Cholul','Mérida','Yucatán'),(82,'97133','Montecristo','Mérida','Yucatán'),(83,'97133','Montevideo','Mérida','Yucatán'),(84,'97133','Residencial Camara de Comercio Norte','Mérida','Yucatán'),(85,'97133','Monterreal','Mérida','Yucatán'),(86,'97134','Maya','Mérida','Yucatán'),(87,'97134','Paraíso Maya','Mérida','Yucatán'),(88,'97134','Jose Maria Iturralde','Mérida','Yucatán'),(89,'97135','Jardines de Mérida','Mérida','Yucatán'),(90,'97136','Felipe Carrillo Puerto Nte','Mérida','Yucatán'),(91,'97137','México Oriente','Mérida','Yucatán'),(92,'97138','Jardines del Noreste','Mérida','Yucatán'),(93,'97138','Los Álamos','Mérida','Yucatán'),(94,'97138','Residencial Del Arco','Mérida','Yucatán'),(95,'97138','La Florida','Mérida','Yucatán'),(96,'97138','Los Pinos','Mérida','Yucatán'),(97,'97138','Jardines Del Norte','Mérida','Yucatán'),(98,'97138','Jardines de Vista Alegre','Mérida','Yucatán'),(99,'97138','Residencial Bancarios','Mérida','Yucatán'),(100,'97138','San Pedro Cholul','Mérida','Yucatán'),(101,'97138','Santa Maria','Mérida','Yucatán'),(102,'97138','El Arco','Mérida','Yucatán'),(103,'97138','Jardines de Vista Alegre II','Mérida','Yucatán'),(104,'97138','Vista Alegre Lotificacion','Mérida','Yucatán'),(105,'97138','Pinos Norte II','Mérida','Yucatán'),(106,'97139','Prado Norte','Mérida','Yucatán'),(107,'97139','San Antonio Cinta','Mérida','Yucatán'),(108,'97139','Jardines del Norte de Prado Norte','Mérida','Yucatán'),(109,'97140','Lopez Mateos','Mérida','Yucatán'),(110,'97140','San Luis','Mérida','Yucatán'),(111,'97140','San Miguel','Mérida','Yucatán'),(112,'97142','Unidad Habitacional CTM','Mérida','Yucatán'),(113,'97142','Antonia Jimenez Trava','Mérida','Yucatán'),(114,'97142','Antonia Jimenez Trava II','Mérida','Yucatán'),(115,'97142','San Vicente Oriente (La Isla)','Mérida','Yucatán'),(116,'97143','Polígono 108','Mérida','Yucatán'),(117,'97143','Vicente Guerrero','Mérida','Yucatán'),(118,'97143','Boulevares de Oriente','Mérida','Yucatán'),(119,'97143','Itzimna 108','Mérida','Yucatán'),(120,'97143','Luis Donaldo Colosio','Mérida','Yucatán'),(121,'97143','Leandro Valle','Mérida','Yucatán'),(122,'97143','Brisas Del Bosque','Mérida','Yucatán'),(123,'97144','Emiliano Zapata Ote','Mérida','Yucatán'),(124,'97144','Las Brisas','Mérida','Yucatán'),(125,'97144','Las Brisas Del Norte','Mérida','Yucatán'),(126,'97144','Ampliación las Brisas','Mérida','Yucatán'),(127,'97145','Las Palmas','Mérida','Yucatán'),(128,'97145','Pet-kanche','Mérida','Yucatán'),(129,'97145','San Juan Grande','Mérida','Yucatán'),(130,'97145','Noria II','Mérida','Yucatán'),(131,'97146','Nueva Alemán','Mérida','Yucatán'),(132,'97146','Las Flores','Mérida','Yucatán'),(133,'97147','Nuevo Yucatán','Mérida','Yucatán'),(134,'97147','San Nicolás','Mérida','Yucatán'),(135,'97148','Miguel Alemán','Mérida','Yucatán'),(136,'97149','San Esteban','Mérida','Yucatán'),(137,'97150','Industrial','Mérida','Yucatán'),(138,'97150','Trava Quintero','Mérida','Yucatán'),(139,'97155','Fenix','Mérida','Yucatán'),(140,'97155','Lourdes Industrial','Mérida','Yucatán'),(141,'97156','Los Reyes','Mérida','Yucatán'),(142,'97157','Lázaro Cárdenas Ote','Mérida','Yucatán'),(143,'97157','Nueva Mayapan','Mérida','Yucatán'),(144,'97158','Chuminopolis','Mérida','Yucatán'),(145,'97159','Máximo Ancona','Mérida','Yucatán'),(146,'97159','Manuel Avila Camacho','Mérida','Yucatán'),(147,'97159','Mayapan','Mérida','Yucatán'),(148,'97159','Nueva Pacabtun','Mérida','Yucatán'),(149,'97159','Nueva Mayapan','Mérida','Yucatán'),(150,'97159','Lotificacion las Brisas','Mérida','Yucatán'),(151,'97160','Del Parque','Mérida','Yucatán'),(152,'97160','Pacabtun','Mérida','Yucatán'),(153,'97160','Manuel Avila Camacho','Mérida','Yucatán'),(154,'97160','Privada Del Autotransporte CTM','Mérida','Yucatán'),(155,'97165','Melchor Ocampo','Mérida','Yucatán'),(156,'97165','Melchor Ocampo II','Mérida','Yucatán'),(157,'97166','Fidel Velázquez','Mérida','Yucatán'),(158,'97166','Salvador Alvarado Oriente','Mérida','Yucatán'),(159,'97166','Fidel Velázquez 2a Etapa','Mérida','Yucatán'),(160,'97167','Emilio Portes Gil','Mérida','Yucatán'),(161,'97167','Bosques de Oriente','Mérida','Yucatán'),(162,'97167','Privada Emilio Portes Gil','Mérida','Yucatán'),(163,'97168','Del Carmen','Mérida','Yucatán'),(164,'97168','Cortes Sarmiento','Mérida','Yucatán'),(165,'97168','Jardines de Miraflores','Mérida','Yucatán'),(166,'97168','Cerillera','Mérida','Yucatán'),(167,'97169','Esperanza','Mérida','Yucatán'),(168,'97169','Wallis','Mérida','Yucatán'),(169,'97170','Chichen-itza','Mérida','Yucatán'),(170,'97170','Nueva Chichen-itza','Mérida','Yucatán'),(171,'97173','Vergel','Mérida','Yucatán'),(172,'97173','Vergel II','Mérida','Yucatán'),(173,'97173','Vergel III','Mérida','Yucatán'),(174,'97173','Vergel IV','Mérida','Yucatán'),(175,'97173','San Jose Vergel','Mérida','Yucatán'),(176,'97173','Real San José','Mérida','Yucatán'),(177,'97173','Misne III','Mérida','Yucatán'),(178,'97174','Villas La Macarena','Mérida','Yucatán'),(179,'97174','Morelos Oriente','Mérida','Yucatán'),(180,'97175','Amalia Solorzano','Mérida','Yucatán'),(181,'97176','Misné II','Mérida','Yucatán'),(182,'97176','San Pablo Oriente','Mérida','Yucatán'),(183,'97176','Vergel 65','Mérida','Yucatán'),(184,'97176','San Antonio Kaua','Mérida','Yucatán'),(185,'97176','El Vergel','Mérida','Yucatán'),(186,'97177','Azcorra','Mérida','Yucatán'),(187,'97178','Benito Juárez Ote','Mérida','Yucatán'),(188,'97179','Miraflores','Mérida','Yucatán'),(189,'97179','Privada Miraflores','Mérida','Yucatán'),(190,'97180','Vicente Solis','Mérida','Yucatán'),(191,'97189','Canto','Mérida','Yucatán'),(192,'97189','San Jose','Mérida','Yucatán'),(193,'97190','Morelos','Mérida','Yucatán'),(194,'97190','Morelos Issste Fovissste','Mérida','Yucatán'),(195,'97195','Nueva Kukulkan','Mérida','Yucatán'),(196,'97195','San Antonio Kaua','Mérida','Yucatán'),(197,'97195','San Antonio Kaua II','Mérida','Yucatán'),(198,'97195','Miraflores II','Mérida','Yucatán'),(199,'97195','San Antonio Kaua I','Mérida','Yucatán'),(200,'97195','Aquaparque','Mérida','Yucatán'),(201,'97196','Salvador Alvarado Sur','Mérida','Yucatán'),(202,'97196','Militar','Mérida','Yucatán'),(203,'97196','Salvador Alvarado Sur II','Mérida','Yucatán'),(204,'97196','Ampliación Salvador Alvarado Sur','Mérida','Yucatán'),(205,'97198','Ampliación Granjas','Mérida','Yucatán'),(206,'97198','Reparto Granjas','Mérida','Yucatán'),(207,'97198','Kukulcan','Mérida','Yucatán'),(208,'97199','Maria Luisa','Mérida','Yucatán'),(209,'97203','Cordeleros de Chuburna','Mérida','Yucatán'),(210,'97203','El Prado','Mérida','Yucatán'),(211,'97203','San Pedro Uxmal','Mérida','Yucatán'),(212,'97203','Tulias de Chuburna','Mérida','Yucatán'),(213,'97203','Arcos del Sol','Mérida','Yucatán'),(214,'97203','Aurea Residencial','Mérida','Yucatán'),(215,'97203','Arekas','Mérida','Yucatán'),(216,'97203','Brisas de Chuburna','Mérida','Yucatán'),(217,'97203','Camara de La Construcción','Mérida','Yucatán'),(218,'97203','Cocoteros','Mérida','Yucatán'),(219,'97203','Del Bosque','Mérida','Yucatán'),(220,'97203','El Conquistador','Mérida','Yucatán'),(221,'97203','San Pablo','Mérida','Yucatán'),(222,'97203','Terranova','Mérida','Yucatán'),(223,'97203','Villas Palma Real','Mérida','Yucatán'),(224,'97203','Villas Del Prado','Mérida','Yucatán'),(225,'97203','Vista Alegre de Chuburna','Mérida','Yucatán'),(226,'97203','Privada Chuburna de Hidalgo (II)','Mérida','Yucatán'),(227,'97203','Privada Chuburna Plus','Mérida','Yucatán'),(228,'97203','Privada Palma Caribeña','Mérida','Yucatán'),(229,'97203','Francisco de Montejo','Mérida','Yucatán'),(230,'97203','San José Chuburna','Mérida','Yucatán'),(231,'97203','Magnolias','Mérida','Yucatán'),(232,'97203','Rincón Colonial','Mérida','Yucatán'),(233,'97203','Puesta del Sol','Mérida','Yucatán'),(234,'97203','Las Haciendas III','Mérida','Yucatán'),(235,'97203','La Castellana','Mérida','Yucatán'),(236,'97203','Privada Corozal','Mérida','Yucatán'),(237,'97203','Ampliación Francisco de Montejo','Mérida','Yucatán'),(238,'97203','Francisco de Montejo II','Mérida','Yucatán'),(239,'97203','Francisco de Montejo III','Mérida','Yucatán'),(240,'97203','Francisco de Montejo IV','Mérida','Yucatán'),(241,'97203','Francisco de Montejo V','Mérida','Yucatán'),(242,'97203','Platino','Mérida','Yucatán'),(243,'97204','Xcumpich','Mérida','Yucatán'),(244,'97204','Vía Montejo','Mérida','Yucatán'),(245,'97204','Residencial Piedrasul','Mérida','Yucatán'),(246,'97204','Residencial Galerias','Mérida','Yucatán'),(247,'97204','Revolución','Mérida','Yucatán'),(248,'97205','Residencial Hacienda Real','Mérida','Yucatán'),(249,'97205','Chuburna de Hidalgo','Mérida','Yucatán'),(250,'97205','Bugambilias','Mérida','Yucatán'),(251,'97205','El Cortijo I','Mérida','Yucatán'),(252,'97205','El Cortijo II','Mérida','Yucatán'),(253,'97205','Juan B Sosa','Mérida','Yucatán'),(254,'97205','Loma Bonita Xcumpich','Mérida','Yucatán'),(255,'97205','Residencial La Noria','Mérida','Yucatán'),(256,'97205','Callejones de Chuburna','Mérida','Yucatán'),(257,'97205','Las Hadas','Mérida','Yucatán'),(258,'97205','Boulevares de Chuburna','Mérida','Yucatán'),(259,'97205','Chuburna Inn','Mérida','Yucatán'),(260,'97205','El Campanario','Mérida','Yucatán'),(261,'97205','San Ángel','Mérida','Yucatán'),(262,'97205','Chuburna de Hidalgo (La Floresta)','Mérida','Yucatán'),(263,'97205','Las Dalias II','Mérida','Yucatán'),(264,'97205','Tabachines','Mérida','Yucatán'),(265,'97205','Villas Chuburna IV','Mérida','Yucatán'),(266,'97205','Paraíso','Mérida','Yucatán'),(267,'97205','San Luis Chuburna','Mérida','Yucatán'),(268,'97205','Pinzon','Mérida','Yucatán'),(269,'97205','Privada las Flores','Mérida','Yucatán'),(270,'97205','Privada Chuburna de Hidalgo I','Mérida','Yucatán'),(271,'97205','Privada Pedregal II','Mérida','Yucatán'),(272,'97205','Privada Arboledas','Mérida','Yucatán'),(273,'97205','Arboledas Chuburna','Mérida','Yucatán'),(274,'97205','Privada Campestre Chuburna','Mérida','Yucatán'),(275,'97205','Privada San Ángel Chuburna','Mérida','Yucatán'),(276,'97205','Loma Bonita','Mérida','Yucatán'),(277,'97206','El Rosario','Mérida','Yucatán'),(278,'97206','San Francisco Chuburna','Mérida','Yucatán'),(279,'97206','San Francisco Chuburna II','Mérida','Yucatán'),(280,'97206','San Jose I','Mérida','Yucatán'),(281,'97206','San Jose II','Mérida','Yucatán'),(282,'97206','Mérida (Elefante Grande)','Mérida','Yucatán'),(283,'97206','San Vicente Chuburna','Mérida','Yucatán'),(284,'97206','Privada Cipreses','Mérida','Yucatán'),(285,'97206','Residencial Turquesa','Mérida','Yucatán'),(286,'97207','Villas de Chuburna','Mérida','Yucatán'),(287,'97208','Malaga','Mérida','Yucatán'),(288,'97208','Rinconada de Chuburna','Mérida','Yucatán'),(289,'97208','Residencial Atlantis','Mérida','Yucatán'),(290,'97208','El Cedral','Mérida','Yucatán'),(291,'97208','Felipe Carrillo Puerto','Mérida','Yucatán'),(292,'97208','Las Quintas (Chuburna)','Mérida','Yucatán'),(293,'97208','Privada Chuburna de Hidalgo','Mérida','Yucatán'),(294,'97209','Jardines de Chuburna','Mérida','Yucatán'),(295,'97209','Privada San Jorge (Chuburna)','Mérida','Yucatán'),(296,'97210','Tanlum','Mérida','Yucatán'),(297,'97210','Joaquín Ceballos Mimenza','Mérida','Yucatán'),(298,'97210','Pedregales de Tanlum','Mérida','Yucatán'),(299,'97215','Colonial Buenavista','Mérida','Yucatán'),(300,'97215','Colonial Chuburna','Mérida','Yucatán'),(301,'97215','Águilas Chuburna','Mérida','Yucatán'),(302,'97217','Fovissste','Mérida','Yucatán'),(303,'97217','Residencial Pensiones I y II','Mérida','Yucatán'),(304,'97217','Francisco El Porvenir','Mérida','Yucatán'),(305,'97217','Residencial Pensiones III','Mérida','Yucatán'),(306,'97217','Residencial Pensiones IV','Mérida','Yucatán'),(307,'97217','Residencial Pensiones V','Mérida','Yucatán'),(308,'97217','Residencial Pensiones VI','Mérida','Yucatán'),(309,'97217','Residencial Pensiones III (1)','Mérida','Yucatán'),(310,'97217','Residencial Pensiones III (II)','Mérida','Yucatán'),(311,'97217','Pensiones Norte','Mérida','Yucatán'),(312,'97218','Roma','Mérida','Yucatán'),(313,'97218','San Damián','Mérida','Yucatán'),(314,'97218','Residencial Roma','Mérida','Yucatán'),(315,'97218','San Isidro','Mérida','Yucatán'),(316,'97218','Conjunto los Naranjos','Mérida','Yucatán'),(317,'97218','Lotificacion San Damián','Mérida','Yucatán'),(318,'97218','Privada San Damián','Mérida','Yucatán'),(319,'97219','Francisco Villa','Mérida','Yucatán'),(320,'97219','Lindavista','Mérida','Yucatán'),(321,'97219','Limones','Mérida','Yucatán'),(322,'97219','Privada Pensiones','Mérida','Yucatán'),(323,'97219','San Damiancito','Mérida','Yucatán'),(324,'97219','Jardines de Pensiones','Mérida','Yucatán'),(325,'97219','Residencial del Norte','Mérida','Yucatán'),(326,'97219','Amapola','Mérida','Yucatán'),(327,'97219','Lindavista II','Mérida','Yucatán'),(328,'97219','Jardines de Lindavista','Mérida','Yucatán'),(329,'97219','Lotificacion San Damiancito I','Mérida','Yucatán'),(330,'97219','Lotificacion San Damiancito II','Mérida','Yucatán'),(331,'97219','Quinta Versalles','Mérida','Yucatán'),(332,'97219','Unidad Habitacional Mérida Issste','Mérida','Yucatán'),(333,'97219','Residencial Pensiones VII','Mérida','Yucatán'),(334,'97219','Paseos de Pensiones','Mérida','Yucatán'),(335,'97219','Pensiones','Mérida','Yucatán'),(336,'97219','Ampliación Lindavista (Elefante Chico)','Mérida','Yucatán'),(337,'97219','Paseos de Chenku','Mérida','Yucatán'),(338,'97219','Pedregal de Lindavista','Mérida','Yucatán'),(339,'97220','Nueva Hidalgo','Mérida','Yucatán'),(340,'97220','La Vaca Feliz','Mérida','Yucatán'),(341,'97220','Miguel Hidalgo','Mérida','Yucatán'),(342,'97220','Zona Dorada','Mérida','Yucatán'),(343,'97220','Atlántida','Mérida','Yucatán'),(344,'97225','Paseo de las Fuentes','Mérida','Yucatán'),(345,'97225','Privada San Pedro','Mérida','Yucatán'),(346,'97226','El Porvenir','Mérida','Yucatán'),(347,'97227','Jacinto Canek','Mérida','Yucatán'),(348,'97227','Las Vigas','Mérida','Yucatán'),(349,'97229','Luis Echeverría Alvarez','Mérida','Yucatán'),(350,'97229','15 de Mayo','Mérida','Yucatán'),(351,'97229','Hacienda San Antonio','Mérida','Yucatán'),(352,'97229','Xcom','Mérida','Yucatán'),(353,'97229','Zona Dorada II','Mérida','Yucatán'),(354,'97229','Villa Zona Dorada','Mérida','Yucatán'),(355,'97229','Ampliación Roma (Luis Echeverría)','Mérida','Yucatán'),(356,'97229','Hacienda Inn','Mérida','Yucatán'),(357,'97230','Bojorquez','Mérida','Yucatán'),(358,'97230','Armando Avila Gurrutia','Mérida','Yucatán'),(359,'97237','Central de Abasto','Mérida','Yucatán'),(360,'97238','Nora Quintana','Mérida','Yucatán'),(361,'97238','Yucalpeten','Mérida','Yucatán'),(362,'97238','Villas de Yucalpeten','Mérida','Yucatán'),(363,'97238','Residencial Casa Blanca','Mérida','Yucatán'),(364,'97238','Brisas del Poniente (Yucalpeten)','Mérida','Yucatán'),(365,'97238','Jardines de Yucalpeten','Mérida','Yucatán'),(366,'97239','Yucalpeten Secc Florida','Mérida','Yucatán'),(367,'97240','Francisco I Madero','Mérida','Yucatán'),(368,'97245','Lopez Portillo','Mérida','Yucatán'),(369,'97245','Xoclan Canto','Mérida','Yucatán'),(370,'97245','Xoclan Santos','Mérida','Yucatán'),(371,'97246','Juan Pablo II Secc. Mérida 2000','Mérida','Yucatán'),(372,'97246','Bosques del Poniente','Mérida','Yucatán'),(373,'97246','Jardines de Nueva Mulsay','Mérida','Yucatán'),(374,'97246','La Reja','Mérida','Yucatán'),(375,'97246','Mulsay','Mérida','Yucatán'),(376,'97246','Mulsay de La Magdalena','Mérida','Yucatán'),(377,'97246','Xoclan','Mérida','Yucatán'),(378,'97246','Xoclan Xbech','Mérida','Yucatán'),(379,'97246','Juan Pablo II Cardenales','Mérida','Yucatán'),(380,'97246','Juan Pablo II','Mérida','Yucatán'),(381,'97246','México Poniente','Mérida','Yucatán'),(382,'97246','Xoclan Carmelitas','Mérida','Yucatán'),(383,'97246','Bosques de Mulsay','Mérida','Yucatán'),(384,'97246','Granja Fruticola Susula','Mérida','Yucatán'),(385,'97246','Mulsay Solidaridad','Mérida','Yucatán'),(386,'97246','Hacienda Mulsay','Mérida','Yucatán'),(387,'97246','Ampliación Juan Pablo II','Mérida','Yucatán'),(388,'97246','Paseos de Opichen','Mérida','Yucatán'),(389,'97246','Villas de Tixcacal','Mérida','Yucatán'),(390,'97246','Los Ángeles','Mérida','Yucatán'),(391,'97246','Angeles II','Mérida','Yucatán'),(392,'97246','Anexo Juan Pablo II','Mérida','Yucatán'),(393,'97247','San Lorenzo','Mérida','Yucatán'),(394,'97249','Mulsay','Mérida','Yucatán'),(395,'97249','Nueva Mulsay','Mérida','Yucatán'),(396,'97249','Nueva Mulsay I','Mérida','Yucatán'),(397,'97249','Plantel México','Mérida','Yucatán'),(398,'97249','Pedregales de Nueva Mulsay Etapa','Mérida','Yucatán'),(399,'97249','Xoclan Susula','Mérida','Yucatán'),(400,'97249','Jardines de Nueva Mulsay II','Mérida','Yucatán'),(401,'97249','Nueva Reforma Agraria','Mérida','Yucatán'),(402,'97249','Tixcacal Opichen','Mérida','Yucatán'),(403,'97249','Villa Magna','Mérida','Yucatán'),(404,'97249','Cinturón Verde','Mérida','Yucatán'),(405,'97249','Villa Magna II','Mérida','Yucatán'),(406,'97249','Ampliación Tixcacal Opichen','Mérida','Yucatán'),(407,'97249','Hacienda Opichen','Mérida','Yucatán'),(408,'97249','Jardines de Nueva Mulsay III','Mérida','Yucatán'),(409,'97249','Núcleo Mulsay','Mérida','Yucatán'),(410,'97249','Girasoles de Opichen','Mérida','Yucatán'),(411,'97249','Hacienda Opichen','Mérida','Yucatán'),(412,'97249','Residencial Valparaiso','Mérida','Yucatán'),(413,'97249','Diamante Paseos de Opichen','Mérida','Yucatán'),(414,'97250','Nueva Sambula','Mérida','Yucatán'),(415,'97250','Sambula','Mérida','Yucatán'),(416,'97255','Bicentenario','Mérida','Yucatán'),(417,'97255','El Roble','Mérida','Yucatán'),(418,'97255','Manuel Crescencio Rejon','Mérida','Yucatán'),(419,'97255','El Roble II','Mérida','Yucatán'),(420,'97255','Roble Agrícola III','Mérida','Yucatán'),(421,'97256','Álvaro Torres','Mérida','Yucatán'),(422,'97256','Graciano Ricalde','Mérida','Yucatán'),(423,'97256','Libertad II','Mérida','Yucatán'),(424,'97256','Villas Mérida','Mérida','Yucatán'),(425,'97256','Libertad III','Mérida','Yucatán'),(426,'97256','Lol-Be','Mérida','Yucatán'),(427,'97256','Residencial Nicte','Mérida','Yucatán'),(428,'97260','Obrera','Mérida','Yucatán'),(429,'97260','Villa de la Obrera II','Mérida','Yucatán'),(430,'97260','Villas del Mayab','Mérida','Yucatán'),(431,'97260','Nueva Obrera','Mérida','Yucatán'),(432,'97260','Bosques del Pedregal','Mérida','Yucatán'),(433,'97260','Circuito Colonias','Mérida','Yucatán'),(434,'97260','Villa Moderna','Mérida','Yucatán'),(435,'97267','Manzana 115','Mérida','Yucatán'),(436,'97268','Delio Moreno Canton','Mérida','Yucatán'),(437,'97268','Quinta Valencia','Mérida','Yucatán'),(438,'97269','Meliton Salazar','Mérida','Yucatán'),(439,'97269','Santa Maria de Guadalupe','Mérida','Yucatán'),(440,'97269','Renacimiento I','Mérida','Yucatán'),(441,'97270','Dolores Otero','Mérida','Yucatán'),(442,'97277','Mercedes Barrera','Mérida','Yucatán'),(443,'97278','Castilla Camara','Mérida','Yucatán'),(444,'97279','Santa Rosa','Mérida','Yucatán'),(445,'97279','Quinta Santa Rosa','Mérida','Yucatán'),(446,'97280','5 Colonias','Mérida','Yucatán'),(447,'97280','Santa Rita','Mérida','Yucatán'),(448,'97284','Lomas Del Sur','Mérida','Yucatán'),(449,'97284','Lindavista','Mérida','Yucatán'),(450,'97285','Bellavista','Mérida','Yucatán'),(451,'97285','Serapio Rendón','Mérida','Yucatán'),(452,'97285','San José Tzal','Mérida','Yucatán'),(453,'97285','Villa Bonita','Mérida','Yucatán'),(454,'97285','Ampliación Plan de Ayala','Mérida','Yucatán'),(455,'97285','Haltunchén','Mérida','Yucatán'),(456,'97285','Plan de Ayala Sur','Mérida','Yucatán'),(457,'97285','Serapio Rendón III','Mérida','Yucatán'),(458,'97285','Villas Del Sur','Mérida','Yucatán'),(459,'97285','Lotificacion Serapio Rendón 1','Mérida','Yucatán'),(460,'97285','San Carlos del Sur','Mérida','Yucatán'),(461,'97285','Villa Magna del Sur','Mérida','Yucatán'),(462,'97285','Jardines del Sur','Mérida','Yucatán'),(463,'97285','Álamos del Sur','Mérida','Yucatán'),(464,'97285','Plan de Ayala Sur III','Mérida','Yucatán'),(465,'97285','Serapio Rendón II','Mérida','Yucatán'),(466,'97285','Las Nubes','Mérida','Yucatán'),(467,'97285','Palmas del Sur','Mérida','Yucatán'),(468,'97286','Las Brisas Del Sur','Mérida','Yucatán'),(469,'97287','Del Sur','Mérida','Yucatán'),(470,'97288','Ciudad Industrial','Mérida','Yucatán'),(471,'97288','Industrial Bridec','Mérida','Yucatán'),(472,'97289','La Hacienda','Mérida','Yucatán'),(473,'97289','San Nicolás Del Sur','Mérida','Yucatán'),(474,'97289','Ampliación La Hacienda','Mérida','Yucatán'),(475,'97290','San Antonio Xluch','Mérida','Yucatán'),(476,'97290','Nueva San Jose Tecoh','Mérida','Yucatán'),(477,'97290','San Antonio Xluch II','Mérida','Yucatán'),(478,'97290','La Guadalupana','Mérida','Yucatán'),(479,'97295','Mérida (Lic. Manuel Crescencio Rejón)','Mérida','Yucatán'),(480,'97295','San Marcos','Mérida','Yucatán'),(481,'97295','Gran Roble','Mérida','Yucatán'),(482,'97295','El Roble Agrícola','Mérida','Yucatán'),(483,'97295','Santa Cruz','Mérida','Yucatán'),(484,'97296','San Marcos Nocoh','Mérida','Yucatán'),(485,'97297','Villas Quetzal','Mérida','Yucatán'),(486,'97297','Emiliano Zapata Sur','Mérida','Yucatán'),(487,'97297','El Rosal','Mérida','Yucatán'),(488,'97297','San Luis Sur','Mérida','Yucatán'),(489,'97297','Metropolitana','Mérida','Yucatán'),(490,'97297','San Antonio Xluch III','Mérida','Yucatán'),(491,'97298','Zacilha','Mérida','Yucatán'),(492,'97298','San Jose Tecoh Sur','Mérida','Yucatán'),(493,'97298','Privada Zuzil - Ha','Mérida','Yucatán'),(494,'97298','Zazil - Ha II','Mérida','Yucatán'),(495,'97298','Brisas de San José','Mérida','Yucatán'),(496,'97299','San Jose Tecoh','Mérida','Yucatán'),(497,'97302','Los Tamarindos','Mérida','Yucatán'),(498,'97302','Residencial Xcanatún','Mérida','Yucatán'),(499,'97302','Royal del Parque','Mérida','Yucatán'),(500,'97302','Chablekal','Mérida','Yucatán'),(501,'97302','Komchén','Mérida','Yucatán'),(502,'97302','Xcanatún','Mérida','Yucatán'),(503,'97302','Dzidzilché','Mérida','Yucatán'),(504,'97302','Sierra Papacal','Mérida','Yucatán'),(505,'97302','Piedra Antigua','Mérida','Yucatán'),(506,'97302','Palmequén','Mérida','Yucatán'),(507,'97302','Xotik','Mérida','Yucatán'),(508,'97302','San Antonio Residencial','Mérida','Yucatán'),(509,'97302','Residencial La Alborada','Mérida','Yucatán'),(510,'97302','Residencial Club Norte Mérida','Mérida','Yucatán'),(511,'97302','San Antonio Hool','Mérida','Yucatán'),(512,'97302','Real de Dzityá','Mérida','Yucatán'),(513,'97302','Punta Lago','Mérida','Yucatán'),(514,'97302','Parque Industrial Yucatán','Mérida','Yucatán'),(515,'97302','San Juan Bautista','Mérida','Yucatán'),(516,'97302','Dzityá','Mérida','Yucatán'),(517,'97302','Sac-Nicté','Mérida','Yucatán'),(518,'97302','Temozón Norte','Mérida','Yucatán'),(519,'97302','Club de Golf La Ceiba','Mérida','Yucatán'),(520,'97302','Las Américas','Mérida','Yucatán'),(521,'97302','Real Montejo','Mérida','Yucatán'),(522,'97302','Residencial del Mayab','Mérida','Yucatán'),(523,'97302','Las Fincas','Mérida','Yucatán'),(524,'97302','Núcleo Sodzil','Mérida','Yucatán'),(525,'97303','Cosgaya','Mérida','Yucatán'),(526,'97303','Kikteil','Mérida','Yucatán'),(527,'97303','Noc Ac','Mérida','Yucatán'),(528,'97303','Cheumán','Mérida','Yucatán'),(529,'97304','Xcunyá','Mérida','Yucatán'),(530,'97304','Tamanché','Mérida','Yucatán'),(531,'97305','Residencial Campestre Viladiu','Mérida','Yucatán'),(532,'97305','Gran San Pedro Cholul','Mérida','Yucatán'),(533,'97305','Villas Cholul','Mérida','Yucatán'),(534,'97305','Bogdan','Mérida','Yucatán'),(535,'97305','San Luis Cholul','Mérida','Yucatán'),(536,'97305','Cholul','Mérida','Yucatán'),(537,'97305','Parque Central','Mérida','Yucatán'),(538,'97305','Sian Kaan','Mérida','Yucatán'),(539,'97305','Residencial Anturio','Mérida','Yucatán'),(540,'97305','Altavista','Mérida','Yucatán'),(541,'97305','Granjas Cholul','Mérida','Yucatán'),(542,'97305','Alura','Mérida','Yucatán'),(543,'97305','Tixcuytún','Mérida','Yucatán'),(544,'97305','Villas del Bosque Cholul','Mérida','Yucatán'),(545,'97305','San Gabriel Tulipanes','Mérida','Yucatán'),(546,'97305','Cabo Norte','Mérida','Yucatán'),(547,'97305','Parque Natura','Mérida','Yucatán'),(548,'97305','El Triunfo','Mérida','Yucatán'),(549,'97305','Santa Gertrudis Copo','Mérida','Yucatán'),(550,'97305','Algarrobos Desarrollo Residencial','Mérida','Yucatán'),(551,'97305','Las Margaritas de Cholul','Mérida','Yucatán'),(552,'97305','Dzibilchaltún','Mérida','Yucatán'),(553,'97305','Cocoyoles','Mérida','Yucatán'),(554,'97305','Jalapa','Mérida','Yucatán'),(555,'97306','Chichi Suárez','Mérida','Yucatán'),(556,'97306','Sitpach','Mérida','Yucatán'),(557,'97306','Residencial Floresta','Mérida','Yucatán'),(558,'97306','Santa María Chí','Mérida','Yucatán'),(559,'97306','Los Héroes','Mérida','Yucatán'),(560,'97307','La Rejoyada','Mérida','Yucatán'),(561,'97307','Jardines de Rejoyada','Mérida','Yucatán'),(562,'97307','Komchén (Santuario)','Mérida','Yucatán'),(563,'97308','Santa María Yaxché','Mérida','Yucatán'),(564,'97308','Yucatán Country Club','Mérida','Yucatán'),(565,'97308','Misnébalam','Mérida','Yucatán'),(566,'97308','Universidad del Mayab','Mérida','Yucatán'),(567,'97309','Yaxché Casares','Mérida','Yucatán'),(568,'97310','Oncán','Mérida','Yucatán'),(569,'97312','Los Faisanes de Tixcacal','Mérida','Yucatán'),(570,'97312','Solana Residencial','Mérida','Yucatán'),(571,'97312','Providencia','Mérida','Yucatán'),(572,'97312','Tixcacal','Mérida','Yucatán'),(573,'97312','Chalmuch','Mérida','Yucatán'),(574,'97314','Balcones II','Mérida','Yucatán'),(575,'97314','Ciudad Caucel II','Mérida','Yucatán'),(576,'97314','Hogares Caucel','Mérida','Yucatán'),(577,'97314','Caucel','Mérida','Yucatán'),(578,'97314','Cerradas de la Herradura','Mérida','Yucatán'),(579,'97314','Villa Jardín','Mérida','Yucatán'),(580,'97314','La Ceiba','Mérida','Yucatán'),(581,'97314','La Perla Ciudad Caucel','Mérida','Yucatán'),(582,'97314','Gran Herradura','Mérida','Yucatán'),(583,'97314','La Ciudadela','Mérida','Yucatán'),(584,'97314','Piedra Norte Caucel','Mérida','Yucatán'),(585,'97314','Sol Caucel','Mérida','Yucatán'),(586,'97314','Jardines de Caucel','Mérida','Yucatán'),(587,'97314','Susulá','Mérida','Yucatán'),(588,'97314','Los Balcones','Mérida','Yucatán'),(589,'97314','Los Almendros','Mérida','Yucatán'),(590,'97314','Villas de Caucel','Mérida','Yucatán'),(591,'97314','Boulevares','Mérida','Yucatán'),(592,'97314','Arboleda','Mérida','Yucatán'),(593,'97314','Las Torres I','Mérida','Yucatán'),(594,'97314','Pedregales de Ciudad Caucel','Mérida','Yucatán'),(595,'97314','La Herradura II','Mérida','Yucatán'),(596,'97314','Gran Santa Fe','Mérida','Yucatán'),(597,'97314','Las Torres','Mérida','Yucatán'),(598,'97314','Viva Caucel','Mérida','Yucatán'),(599,'97314','Hacienda Caucel','Mérida','Yucatán'),(600,'97314','La Herradura III','Mérida','Yucatán'),(601,'97314','Las Torres II','Mérida','Yucatán'),(602,'97314','Centenario Cámara de Comercio Caucel','Mérida','Yucatán'),(603,'97314','Sol Caucel III','Mérida','Yucatán'),(604,'97314','Ciudad Caucel','Mérida','Yucatán'),(605,'97315','Nuevo San José Tecoh III','Mérida','Yucatán'),(606,'97315','Dzununcán','Mérida','Yucatán'),(607,'97315','Molas','Mérida','Yucatán'),(608,'97315','San José Tzal','Mérida','Yucatán'),(609,'97315','Tahdzibichén','Mérida','Yucatán'),(610,'97315','San Antonio Tzacalá','Mérida','Yucatán'),(611,'97315','Dzununcan','Mérida','Yucatán'),(612,'97315','Hunxectamán','Mérida','Yucatán'),(613,'97315','Jardines de Tahdzibichén','Mérida','Yucatán'),(614,'97315','San Pedro Chimay','Mérida','Yucatán'),(615,'97315','Texán Cámara','Mérida','Yucatán'),(616,'97315','Santa Cruz Palomeque','Mérida','Yucatán'),(617,'97315','Xmatkuil','Mérida','Yucatán'),(618,'97315','La Guadalupana','Mérida','Yucatán'),(619,'97315','Nuevo San José Tecoh','Mérida','Yucatán'),(620,'97315','Petac','Mérida','Yucatán'),(621,'97316','Dzoyaxché','Mérida','Yucatán'),(622,'97316','San Ignacio Tesip','Mérida','Yucatán'),(623,'97316','Yaxnic','Mérida','Yucatán'),(624,'97320','Vicente Guerrero','Progreso','Yucatán'),(625,'97320','Progreso Centro','Progreso','Yucatán'),(626,'97320','Feliciano Canul Reyes','Progreso','Yucatán'),(627,'97320','Ismael Garcia','Progreso','Yucatán'),(628,'97320','Juan Montalvo','Progreso','Yucatán'),(629,'97320','Nueva Yucalpeten','Progreso','Yucatán'),(630,'97320','Revolución','Progreso','Yucatán'),(631,'97320','Héctor Victoria','Progreso','Yucatán'),(632,'97320','Costa Azul','Progreso','Yucatán'),(633,'97320','23 de Noviembre','Progreso','Yucatán'),(634,'97320','Las Fuentes','Progreso','Yucatán'),(635,'97320','Fovissste','Progreso','Yucatán'),(636,'97320','Las Palmas','Progreso','Yucatán'),(637,'97320','Fovissste Brisas','Progreso','Yucatán'),(638,'97320','Ciénega 2000','Progreso','Yucatán'),(639,'97320','Francisco I. Madero','Progreso','Yucatán'),(640,'97324','Campestre Flamboyanes','Progreso','Yucatán'),(641,'97330','Chicxulub Puerto','Progreso','Yucatán'),(642,'97334','San Ignacio','Progreso','Yucatán'),(643,'97336','Chuburna Puerto','Progreso','Yucatán'),(644,'97336','Chelem','Progreso','Yucatán'),(645,'97336','Yucalpeten','Progreso','Yucatán'),(646,'97337','Muelle y Puerto de Altura','Progreso','Yucatán'),(647,'97340','Chicxulub','Chicxulub Pueblo','Yucatán'),(648,'97342','Quintas Baspul','Chicxulub Pueblo','Yucatán'),(649,'97343','Ixil','Ixil','Yucatán'),(650,'97343','Concepción','Ixil','Yucatán'),(651,'97343','San Rafael','Ixil','Yucatán'),(652,'97345','Jardines de Conkal','Conkal','Yucatán'),(653,'97345','Villas de Conkal','Conkal','Yucatán'),(654,'97345','Real de Conkal','Conkal','Yucatán'),(655,'97345','Paseo del Ángel','Conkal','Yucatán'),(656,'97345','Santa Cruz','Conkal','Yucatán'),(657,'97345','Pedregales de Conkal','Conkal','Yucatán'),(658,'97345','Palma Real','Conkal','Yucatán'),(659,'97345','Bosques de Conkal','Conkal','Yucatán'),(660,'97345','Magnolia Residencial','Conkal','Yucatán'),(661,'97345','Manere','Conkal','Yucatán'),(662,'97345','Conkal','Conkal','Yucatán'),(663,'97345','Los Laureles','Conkal','Yucatán'),(664,'97345','Verde Limón','Conkal','Yucatán'),(665,'97346','Vega del Mayab','Conkal','Yucatán'),(666,'97346','X-Cuyum','Conkal','Yucatán'),(667,'97346','Santa María Rosas','Conkal','Yucatán'),(668,'97347','Praderas del Mayab','Conkal','Yucatán'),(669,'97347','Kantoyna','Conkal','Yucatán'),(670,'97348','Yaxkukul','Yaxkukul','Yucatán'),(671,'97350','Papagayos','Hunucmá','Yucatán'),(672,'97350','Centro Hunucmá','Hunucmá','Yucatán'),(673,'97353','Texán de Palomeque','Hunucmá','Yucatán'),(674,'97353','San Antonio Chel','Hunucmá','Yucatán'),(675,'97353','Hunkanab','Hunucmá','Yucatán'),(676,'97356','Sisal','Hunucmá','Yucatán'),(677,'97357','San Juan','Ucú','Yucatán'),(678,'97357','Ucú','Ucú','Yucatán'),(679,'97357','Yaxche de Peón','Ucú','Yucatán'),(680,'97360','Kinchil','Kinchil','Yucatán'),(681,'97362','Tamchén','Kinchil','Yucatán'),(682,'97364','Tetiz','Tetiz','Yucatán'),(683,'97365','Nohuayun','Tetiz','Yucatán'),(684,'97367','Celestún','Celestún','Yucatán'),(685,'97367','Chac Canché','Celestún','Yucatán'),(686,'97367','Santa Cruz Xixim','Celestún','Yucatán'),(687,'97370','Santa Cecilia','Kanasín','Yucatán'),(688,'97370','Valle Azul','Kanasín','Yucatán'),(689,'97370','Privada del Sol','Kanasín','Yucatán'),(690,'97370','Girasoles','Kanasín','Yucatán'),(691,'97370','Fontana I','Kanasín','Yucatán'),(692,'97370','Las Palmeras','Kanasín','Yucatán'),(693,'97370','Arecas','Kanasín','Yucatán'),(694,'97370','San Haroldo San José Tzal','Kanasín','Yucatán'),(695,'97370','Leona Vicario','Kanasín','Yucatán'),(696,'97370','Jardines de San Pedro Noh Pat','Kanasín','Yucatán'),(697,'97370','Puerta del Sol','Kanasín','Yucatán'),(698,'97370','Pedregales de Kanasín II','Kanasín','Yucatán'),(699,'97370','Valle Oriente','Kanasín','Yucatán'),(700,'97370','Villas Turquesa','Kanasín','Yucatán'),(701,'97370','Álamos de Oriente','Kanasín','Yucatán'),(702,'97370','Cuauhtémoc','Kanasín','Yucatán'),(703,'97370','Los Pinos de Mulchechen','Kanasín','Yucatán'),(704,'97370','Puerta Esmeralda','Kanasín','Yucatán'),(705,'97370','La Ceiba','Kanasín','Yucatán'),(706,'97370','Pedregales del Oriente','Kanasín','Yucatán'),(707,'97370','Las Palmas Yucatán','Kanasín','Yucatán'),(708,'97370','Xelpac','Kanasín','Yucatán'),(709,'97370','Ampliación Xelpac','Kanasín','Yucatán'),(710,'97370','San Ignacio','Kanasín','Yucatán'),(711,'97370','Santa Ana','Kanasín','Yucatán'),(712,'97370','Condesa','Kanasín','Yucatán'),(713,'97370','Mulchechén II','Kanasín','Yucatán'),(714,'97370','Cielo Alto','Kanasín','Yucatán'),(715,'97370','Despertare','Kanasín','Yucatán'),(716,'97370','Coyoles','Kanasín','Yucatán'),(717,'97370','El Encanto Kanasín','Kanasín','Yucatán'),(718,'97370','Arboleda Kanasín','Kanasín','Yucatán'),(719,'97370','San José Kanasín','Kanasín','Yucatán'),(720,'97370','Villa Bonita','Kanasín','Yucatán'),(721,'97370','Rinconada Kanasín','Kanasín','Yucatán'),(722,'97370','Villa Mercedes','Kanasín','Yucatán'),(723,'97370','Las Perlas','Kanasín','Yucatán'),(724,'97370','Valle Oriente de San Pedro Noh Pat','Kanasín','Yucatán'),(725,'97370','Pedregales de Kanasín','Kanasín','Yucatán'),(726,'97370','Residencial','Kanasín','Yucatán'),(727,'97370','VIVAH','Kanasín','Yucatán'),(728,'97370','Las Haciendas','Kanasín','Yucatán'),(729,'97370','La Piedra','Kanasín','Yucatán'),(730,'97370','Andrés Quintana Roo','Kanasín','Yucatán'),(731,'97370','Alamos Mulchechen','Kanasín','Yucatán'),(732,'97370','El Cerrito','Kanasín','Yucatán'),(733,'97370','Vistana','Kanasín','Yucatán'),(734,'97370','Amalia Solorzano II','Kanasín','Yucatán'),(735,'97370','Kanasín Centro','Kanasín','Yucatán'),(736,'97370','Colibrí','Kanasín','Yucatán'),(737,'97370','CROC','Kanasín','Yucatán'),(738,'97370','Francisco Villa Oriente','Kanasín','Yucatán'),(739,'97370','Mulchechén','Kanasín','Yucatán'),(740,'97370','San Antonio Kaua III','Kanasín','Yucatán'),(741,'97370','Hector Victoria','Kanasín','Yucatán'),(742,'97370','Pablo Moreno','Kanasín','Yucatán'),(743,'97370','Reparto las Granjas','Kanasín','Yucatán'),(744,'97370','San Camilo','Kanasín','Yucatán'),(745,'97370','Los Encinos','Kanasín','Yucatán'),(746,'97370','San Pedro Noh Pat','Kanasín','Yucatán'),(747,'97370','Flor de Mayo','Kanasín','Yucatán'),(748,'97370','Jardines de Mulchechen','Kanasín','Yucatán'),(749,'97370','Jardines de Kanasín','Kanasín','Yucatán'),(750,'97370','Los Tulipanes','Kanasín','Yucatán'),(751,'97370','Palmas San Pedro','Kanasín','Yucatán'),(752,'97370','Las Flores','Kanasín','Yucatán'),(753,'97370','Los Robles III','Kanasín','Yucatán'),(754,'97370','La Joya','Kanasín','Yucatán'),(755,'97370','Los Robles','Kanasín','Yucatán'),(756,'97370','Villas del Oriente','Kanasín','Yucatán'),(757,'97370','Cecilio Chi','Kanasín','Yucatán'),(758,'97373','Santa Isabel','Kanasín','Yucatán'),(759,'97374','San Aroldo','Kanasín','Yucatán'),(760,'97374','San Pedro (Deshuesadero)','Kanasín','Yucatán'),(761,'97374','Teya','Kanasín','Yucatán'),(762,'97376','San Antonio Tehuitz','Kanasín','Yucatán'),(763,'97377','Tekik de Regil','Timucuy','Yucatán'),(764,'97377','Timucuy','Timucuy','Yucatán'),(765,'97378','Subincancab','Timucuy','Yucatán'),(766,'97380','Santiago','Acanceh','Yucatán'),(767,'97380','Acanceh','Acanceh','Yucatán'),(768,'97380','Canicab','Acanceh','Yucatán'),(769,'97380','Ticopó','Acanceh','Yucatán'),(770,'97380','El Zapotal','Acanceh','Yucatán'),(771,'97382','Tepich Carrillo','Acanceh','Yucatán'),(772,'97383','Cibceh','Acanceh','Yucatán'),(773,'97383','Petectunich','Acanceh','Yucatán'),(774,'97383','Sacchich','Acanceh','Yucatán'),(775,'97386','Tixpéhual','Tixpéhual','Yucatán'),(776,'97387','Chocho','Tixpéhual','Yucatán'),(777,'97387','Kilinche','Tixpéhual','Yucatán'),(778,'97388','Sahe','Tixpéhual','Yucatán'),(779,'97388','Cuca','Tixpéhual','Yucatán'),(780,'97389','Techoh','Tixpéhual','Yucatán'),(781,'97390','Brisas de Umán','Umán','Yucatán'),(782,'97390','Las Perlas de Umán','Umán','Yucatán'),(783,'97390','El Oasis','Umán','Yucatán'),(784,'97390','Camino Real','Umán','Yucatán'),(785,'97390','Los Arcos I','Umán','Yucatán'),(786,'97390','Residencial San Lázaro','Umán','Yucatán'),(787,'97390','Centro Umán','Umán','Yucatán'),(788,'97390','Acim I','Umán','Yucatán'),(789,'97390','Los Ceibos','Umán','Yucatán'),(790,'97390','Ampliación Ciudad Industrial','Umán','Yucatán'),(791,'97390','La Mejorada','Umán','Yucatán'),(792,'97390','Bosques de San Francisco','Umán','Yucatán'),(793,'97390','San Lorenzo','Umán','Yucatán'),(794,'97390','Cepeda Peraza','Umán','Yucatán'),(795,'97390','Lázaro Cárdenas','Umán','Yucatán'),(796,'97390','La Candelaria','Umán','Yucatán'),(797,'97390','Dzibikal','Umán','Yucatán'),(798,'97390','Santa Elena','Umán','Yucatán'),(799,'97390','Miguel Hidalgo y Costilla','Umán','Yucatán'),(800,'97390','Bosques de Umán','Umán','Yucatán'),(801,'97390','Los Arcos II','Umán','Yucatán'),(802,'97390','Acim II','Umán','Yucatán'),(803,'97390','San Carlos','Umán','Yucatán'),(804,'97392','Piedra de Agua','Umán','Yucatán'),(805,'97392','El Roble Agrícola IV','Umán','Yucatán'),(806,'97392','Itzincab','Umán','Yucatán'),(807,'97393','Oxcum','Umán','Yucatán'),(808,'97393','Dzibikak','Umán','Yucatán'),(809,'97394','Taníl','Umán','Yucatán'),(810,'97394','Xcucul Sur','Umán','Yucatán'),(811,'97394','Gran Santa Cruz','Umán','Yucatán'),(812,'97394','Tebec','Umán','Yucatán'),(813,'97394','Ticimul','Umán','Yucatán'),(814,'97394','Petecbiltun','Umán','Yucatán'),(815,'97394','Xtepen','Umán','Yucatán'),(816,'97395','Hotzuc','Umán','Yucatán'),(817,'97396','Yaxcopoil','Umán','Yucatán'),(818,'97396','San Antonio Mulix','Umán','Yucatán'),(819,'97397','Bolon','Umán','Yucatán'),(820,'97397','Oxholon','Umán','Yucatán'),(821,'97397','San Antonio Chun','Umán','Yucatán'),(822,'97397','Poxila','Umán','Yucatán'),(823,'97400','Centro Telchac Pueblo','Telchac Pueblo','Yucatán'),(824,'97404','INFONAVIT','Dzemul','Yucatán'),(825,'97404','Dzemul','Dzemul','Yucatán'),(826,'97405','Xtampú','Dzemul','Yucatán'),(827,'97405','Xcambó','Dzemul','Yucatán'),(828,'97406','San Eduardo','Dzemul','Yucatán'),(829,'97406','San Diego','Dzemul','Yucatán'),(830,'97407','Telchac Puerto','Telchac Puerto','Yucatán'),(831,'97410','Cansahcab','Cansahcab','Yucatán'),(832,'97414','Santa María','Cansahcab','Yucatán'),(833,'97415','San Antonio Xiat','Cansahcab','Yucatán'),(834,'97415','Kankabchen de Molina','Cansahcab','Yucatán'),(835,'97417','San Antonio','Cansahcab','Yucatán'),(836,'97420','Sinanché','Sinanché','Yucatán'),(837,'97420','Miguel Alemán','Sinanché','Yucatán'),(838,'97424','San Crisanto','Sinanché','Yucatán'),(839,'97425','Yobaín','Yobaín','Yucatán'),(840,'97426','Chabihau','Yobaín','Yucatán'),(841,'97430','Motul de Carrillo Puerto Centro','Motul','Yucatán'),(842,'97430','Sambulá','Motul','Yucatán'),(843,'97430','San Carlos','Motul','Yucatán'),(844,'97430','El Roble','Motul','Yucatán'),(845,'97430','Santa Cruz Pachón','Motul','Yucatán'),(846,'97432','San Silverio','Motul','Yucatán'),(847,'97432','Felipe Carrillo Puerto','Motul','Yucatán'),(848,'97432','Infonavit','Motul','Yucatán'),(849,'97432','Mario H Cuevas','Motul','Yucatán'),(850,'97432','Perla de La Costa','Motul','Yucatán'),(851,'97432','Las Huertas','Motul','Yucatán'),(852,'97432','Puerta del Sol','Motul','Yucatán'),(853,'97432','Londres','Motul','Yucatán'),(854,'97432','Vivah','Motul','Yucatán'),(855,'97433','Santiago Castillo','Motul','Yucatán'),(856,'97433','San Juan','Motul','Yucatán'),(857,'97434','Edesio Carrillo','Motul','Yucatán'),(858,'97434','Rogelio Chalé','Motul','Yucatán'),(859,'97434','La Herradura','Motul','Yucatán'),(860,'97434','San Roque','Motul','Yucatán'),(861,'97436','Sacapuc','Motul','Yucatán'),(862,'97436','Timul','Motul','Yucatán'),(863,'97437','Kini','Motul','Yucatán'),(864,'97440','Uci','Motul','Yucatán'),(865,'97440','Kancabchen','Motul','Yucatán'),(866,'97440','Komchén Martínez','Motul','Yucatán'),(867,'97440','Santa Teresa','Motul','Yucatán'),(868,'97440','San Pedro Chacabal','Motul','Yucatán'),(869,'97443','Tanya','Motul','Yucatán'),(870,'97443','Kancabal','Motul','Yucatán'),(871,'97444','Kaxatah','Motul','Yucatán'),(872,'97444','Mesatunich','Motul','Yucatán'),(873,'97444','Kopte','Motul','Yucatán'),(874,'97444','Kambul','Motul','Yucatán'),(875,'97444','Dzununcan','Motul','Yucatán'),(876,'97444','Kancabchén Uci','Motul','Yucatán'),(877,'97444','San Pedro Camara','Motul','Yucatán'),(878,'97445','San Antonio Dzinah','Motul','Yucatán'),(879,'97446','San José Hili','Motul','Yucatán'),(880,'97446','Sakolá','Motul','Yucatán'),(881,'97450','Baca','Baca','Yucatán'),(882,'97452','Tixkuncheil','Baca','Yucatán'),(883,'97452','Kankabchen','Baca','Yucatán'),(884,'97453','San Isidro Kuxub','Baca','Yucatán'),(885,'97453','San Nicolás','Baca','Yucatán'),(886,'97454','Mococha','Mocochá','Yucatán'),(887,'97455','Too','Mocochá','Yucatán'),(888,'97456','Tekat','Mocochá','Yucatán'),(889,'97457','Muxupip','Muxupip','Yucatán'),(890,'97458','San Juan Koop','Muxupip','Yucatán'),(891,'97458','San José Grande','Muxupip','Yucatán'),(892,'97460','Santa Teresa','Cacalchén','Yucatán'),(893,'97460','Cacalchen','Cacalchén','Yucatán'),(894,'97466','Bokobá','Bokobá','Yucatán'),(895,'97470','Tixkokob','Tixkokob','Yucatán'),(896,'97473','Kankabchen','Tixkokob','Yucatán'),(897,'97473','San José','Tixkokob','Yucatán'),(898,'97474','Ekmul','Tixkokob','Yucatán'),(899,'97474','Euan','Tixkokob','Yucatán'),(900,'97474','Ruinas de Ake','Tixkokob','Yucatán'),(901,'97475','Hubila','Tixkokob','Yucatán'),(902,'97476','San Antonio Millet','Tixkokob','Yucatán'),(903,'97477','Nolo','Tixkokob','Yucatán'),(904,'97480','Hoctun','Hoctún','Yucatán'),(905,'97483','Dziuche','Hoctún','Yucatán'),(906,'97486','San José Oriente','Hoctún','Yucatán'),(907,'97490','Tahmek','Tahmek','Yucatán'),(908,'97500','Dzidzantún','Dzidzantún','Yucatán'),(909,'97500','Emiliano Zapata','Dzidzantún','Yucatán'),(910,'97500','San Diego Chumul','Dzidzantún','Yucatán'),(911,'97500','San Juan','Dzidzantún','Yucatán'),(912,'97500','Vicente Guerrero','Dzidzantún','Yucatán'),(913,'97504','Mina de Oro','Dzidzantún','Yucatán'),(914,'97504','Santa Clara','Dzidzantún','Yucatán'),(915,'97506','San Francisco Manzanilla','Dzidzantún','Yucatán'),(916,'97510','Temax','Temax','Yucatán'),(917,'97513','San Antonio Camara','Temax','Yucatán'),(918,'97515','Chucmichén','Temax','Yucatán'),(919,'97515','Chenche de Las Torres','Temax','Yucatán'),(920,'97516','Santa Ursula','Temax','Yucatán'),(921,'97520','Tekantó','Tekantó','Yucatán'),(922,'97522','Tixkocho','Tekantó','Yucatán'),(923,'97522','Sanlatah','Tekantó','Yucatán'),(924,'97523','San Francisco Dzan','Tekantó','Yucatán'),(925,'97524','Teya','Teya','Yucatán'),(926,'97527','Suma','Suma','Yucatán'),(927,'97527','San Nicolás','Suma','Yucatán'),(928,'97530','Tepakán','Tepakán','Yucatán'),(929,'97532','Kantirix','Tepakán','Yucatán'),(930,'97535','Tekal de Venegas','Tekal de Venegas','Yucatán'),(931,'97536','El Ancla','Tekal de Venegas','Yucatán'),(932,'97536','Tohoku','Tekal de Venegas','Yucatán'),(933,'97536','San Felipe','Tekal de Venegas','Yucatán'),(934,'97540','Benito Juárez','Izamal','Yucatán'),(935,'97540','Quinta Real','Izamal','Yucatán'),(936,'97540','San Genaro','Izamal','Yucatán'),(937,'97540','Santo Domingo','Izamal','Yucatán'),(938,'97540','Emiliano Zapata','Izamal','Yucatán'),(939,'97540','Izamal','Izamal','Yucatán'),(940,'97540','Real del Sol','Izamal','Yucatán'),(941,'97540','San Juan Izamal','Izamal','Yucatán'),(942,'97545','Sitilpech','Izamal','Yucatán'),(943,'97550','Citilcum','Izamal','Yucatán'),(944,'97550','Kimbila','Izamal','Yucatán'),(945,'97553','San José Kanán','Izamal','Yucatán'),(946,'97555','Cuauhtémoc','Izamal','Yucatán'),(947,'97556','Xanabá','Izamal','Yucatán'),(948,'97556','Yaxché','Izamal','Yucatán'),(949,'97556','Popolá','Izamal','Yucatán'),(950,'97557','San José','Izamal','Yucatán'),(951,'97557','San Antonio','Izamal','Yucatán'),(952,'97560','Hocabá','Hocabá','Yucatán'),(953,'97563','El Nance','Hocabá','Yucatán'),(954,'97564','Sahcaba','Hocabá','Yucatán'),(955,'97566','Xocchel','Xocchel','Yucatán'),(956,'97570','Seyé','Seyé','Yucatán'),(957,'97570','Vicente Guerrero','Seyé','Yucatán'),(958,'97573','Holactún','Seyé','Yucatán'),(959,'97574','Xucu','Seyé','Yucatán'),(960,'97575','San Bernardino','Seyé','Yucatán'),(961,'97575','Nohcham','Seyé','Yucatán'),(962,'97577','Cuzama','Cuzamá','Yucatán'),(963,'97577','Eknacan','Cuzamá','Yucatán'),(964,'97577','Nohchacan','Cuzamá','Yucatán'),(965,'97578','Yaxkukul','Cuzamá','Yucatán'),(966,'97578','Chunkanan','Cuzamá','Yucatán'),(967,'97579','San Francisco Sisal','Cuzamá','Yucatán'),(968,'97580','Viva','Homún','Yucatán'),(969,'97580','Homun','Homún','Yucatán'),(970,'97583','Polabán','Homún','Yucatán'),(971,'97585','Yalahau','Homún','Yucatán'),(972,'97586','San Isidro Ochil','Homún','Yucatán'),(973,'97587','Sanahcat','Sanahcat','Yucatán'),(974,'97590','Huhí','Huhí','Yucatán'),(975,'97596','Tixcacal Quintero','Huhí','Yucatán'),(976,'97600','Dzilam González','Dzilam González','Yucatán'),(977,'97604','Dzonot Sabila','Dzilam González','Yucatán'),(978,'97606','Dzilam de Bravo','Dzilam de Bravo','Yucatán'),(979,'97608','Chun-Xaan','Dzilam de Bravo','Yucatán'),(980,'97609','Kennedy','Dzilam de Bravo','Yucatán'),(981,'97610','Panaba','Panabá','Yucatán'),(982,'97614','San Juan del Río','Panabá','Yucatán'),(983,'97614','Loche','Panabá','Yucatán'),(984,'97614','San Francisco','Panabá','Yucatán'),(985,'97615','San Antonio','Panabá','Yucatán'),(986,'97615','Cenote Yalsihón Buena Fe','Panabá','Yucatán'),(987,'97615','Vista Alegre','Panabá','Yucatán'),(988,'97615','Noczal','Panabá','Yucatán'),(989,'97616','San Felipe','San Felipe','Yucatán'),(990,'97620','Buctzotz','Buctzotz','Yucatán'),(991,'97623','X-bec','Buctzotz','Yucatán'),(992,'97623','Chanmotul','Buctzotz','Yucatán'),(993,'97624','Nohyaxche','Buctzotz','Yucatán'),(994,'97624','La Gran Lucha','Buctzotz','Yucatán'),(995,'97625','Nup-Dzonot','Buctzotz','Yucatán'),(996,'97625','B. Esperanza','Buctzotz','Yucatán'),(997,'97625','San Francisco','Buctzotz','Yucatán'),(998,'97625','Grano de Oro','Buctzotz','Yucatán'),(999,'97625','U. Juárez','Buctzotz','Yucatán'),(1000,'97626','San Juan','Buctzotz','Yucatán'),(1001,'97626','San Pedro','Buctzotz','Yucatán'),(1002,'97627','Santo Domingo','Buctzotz','Yucatán'),(1003,'97630','Sucilá','Sucilá','Yucatán'),(1004,'97634','Chan Panaba','Sucilá','Yucatán'),(1005,'97636','A.G. San Martín','Sucilá','Yucatán'),(1006,'97640','Cenotillo','Cenotillo','Yucatán'),(1007,'97645','Tixbacab','Cenotillo','Yucatán'),(1008,'97645','X-Lobos','Cenotillo','Yucatán'),(1009,'97645','Tucina','Cenotillo','Yucatán'),(1010,'97646','Dzoncauich','Dzoncauich','Yucatán'),(1011,'97647','Chacmay','Dzoncauich','Yucatán'),(1012,'97650','Tunkás','Tunkás','Yucatán'),(1013,'97653','San José Pibtuch','Tunkás','Yucatán'),(1014,'97653','Chabak','Tunkás','Yucatán'),(1015,'97654','Nicte Ha','Tunkás','Yucatán'),(1016,'97654','Mactun','Tunkás','Yucatán'),(1017,'97654','Kancabchén','Tunkás','Yucatán'),(1018,'97654','Noc Ac','Tunkás','Yucatán'),(1019,'97654','Chakan Ebula','Tunkás','Yucatán'),(1020,'97654','Onichen','Tunkás','Yucatán'),(1021,'97654','San Román','Tunkás','Yucatán'),(1022,'97654','San Antonio Chuc','Tunkás','Yucatán'),(1023,'97654','Yaxha','Tunkás','Yucatán'),(1024,'97654','Santa Rosa','Tunkás','Yucatán'),(1025,'97655','Quintana Roo','Quintana Roo','Yucatán'),(1026,'97660','Dzitás','Dzitás','Yucatán'),(1027,'97666','Xocempich','Dzitás','Yucatán'),(1028,'97666','Yaxche','Dzitás','Yucatán'),(1029,'97670','Kantunil','Kantunil','Yucatán'),(1030,'97675','Holcá','Kantunil','Yucatán'),(1031,'97676','Sudzal','Sudzal','Yucatán'),(1032,'97677','Brasil','Sudzal','Yucatán'),(1033,'97677','San Antonio Chalante','Sudzal','Yucatán'),(1034,'97677','San Juan','Sudzal','Yucatán'),(1035,'97677','Tzalam','Sudzal','Yucatán'),(1036,'97677','San Martín','Sudzal','Yucatán'),(1037,'97678','Chumbec','Sudzal','Yucatán'),(1038,'97678','Kamcabchen','Sudzal','Yucatán'),(1039,'97680','Tekit','Tekit','Yucatán'),(1040,'97684','Susula','Tekit','Yucatán'),(1041,'97686','Yaxic','Tekit','Yucatán'),(1042,'97690','Sotuta','Sotuta','Yucatán'),(1043,'97694','Tibolon','Sotuta','Yucatán'),(1044,'97695','Tabi','Sotuta','Yucatán'),(1045,'97697','Zavala','Sotuta','Yucatán'),(1046,'97700','Tizimin Centro','Tizimín','Yucatán'),(1047,'97700','Santa Cruz','Tizimín','Yucatán'),(1048,'97702','Las Palmas','Tizimín','Yucatán'),(1049,'97702','Residencial Tizimín','Tizimín','Yucatán'),(1050,'97702','Comichén','Tizimín','Yucatán'),(1051,'97702','Benito Juárez','Tizimín','Yucatán'),(1052,'97702','Fovissste','Tizimín','Yucatán'),(1053,'97702','Jacinto Canek','Tizimín','Yucatán'),(1054,'97702','8 Calles','Tizimín','Yucatán'),(1055,'97702','Los Reyes','Tizimín','Yucatán'),(1056,'97702','Aviación','Tizimín','Yucatán'),(1057,'97702','Santa Maria','Tizimín','Yucatán'),(1058,'97702','Zoológico','Tizimín','Yucatán'),(1059,'97702','Villas Campestre','Tizimín','Yucatán'),(1060,'97702','Campestre San Francisco','Tizimín','Yucatán'),(1061,'97702','Justo Sierra','Tizimín','Yucatán'),(1062,'97702','Viva','Tizimín','Yucatán'),(1063,'97702','San Martín','Tizimín','Yucatán'),(1064,'97703','Adolfo Lopez Mateos','Tizimín','Yucatán'),(1065,'97703','San Jose Nabalam','Tizimín','Yucatán'),(1066,'97703','Santo Domingo','Tizimín','Yucatán'),(1067,'97703','Lázaro Cárdenas','Tizimín','Yucatán'),(1068,'97703','San Carlos','Tizimín','Yucatán'),(1069,'97703','Huayita','Tizimín','Yucatán'),(1070,'97703','Los Reyes','Tizimín','Yucatán'),(1071,'97704','Adolfo López Mateos','Tizimín','Yucatán'),(1072,'97704','Los Aguacates','Tizimín','Yucatán'),(1073,'97704','Santa Maria de Lima','Tizimín','Yucatán'),(1074,'97704','Residencial Del Parque','Tizimín','Yucatán'),(1075,'97705','Sucopó','Tizimín','Yucatán'),(1076,'97705','Chan San Antonio','Tizimín','Yucatán'),(1077,'97705','Kikil','Tizimín','Yucatán'),(1078,'97705','Yokdzonot Meneses','Tizimín','Yucatán'),(1079,'97705','X-Pambihá','Tizimín','Yucatán'),(1080,'97706','Xkalax de Dzibalkú','Tizimín','Yucatán'),(1081,'97706','Santa Clara Dzibalkú','Tizimín','Yucatán'),(1082,'97706','Dzadz Palma','Tizimín','Yucatán'),(1083,'97706','San Antonio','Tizimín','Yucatán'),(1084,'97706','Libre Unión','Tizimín','Yucatán'),(1085,'97706','Dzonot Box','Tizimín','Yucatán'),(1086,'97706','San Román','Tizimín','Yucatán'),(1087,'97706','Chunsubul','Tizimín','Yucatán'),(1088,'97706','X-Panhatoro','Tizimín','Yucatán'),(1089,'97706','Chenkekén','Tizimín','Yucatán'),(1090,'97706','Buena Esperanza','Tizimín','Yucatán'),(1091,'97706','Bondzonot Número Dos','Tizimín','Yucatán'),(1092,'97706','X-Lal','Tizimín','Yucatán'),(1093,'97706','X-Cail','Tizimín','Yucatán'),(1094,'97706','Dzonot Tigre','Tizimín','Yucatán'),(1095,'97707','Yohactún de Hidalgo','Tizimín','Yucatán'),(1096,'97707','Dzonot Carretero','Tizimín','Yucatán'),(1097,'97707','El Cuyo','Tizimín','Yucatán'),(1098,'97707','San Francisco','Tizimín','Yucatán'),(1099,'97707','Benito Juárez','Tizimín','Yucatán'),(1100,'97707','San Juan','Tizimín','Yucatán'),(1101,'97707','Moctezuma','Tizimín','Yucatán'),(1102,'97707','Dolores','Tizimín','Yucatán'),(1103,'97707','Emiliano Zapata','Tizimín','Yucatán'),(1104,'97710','San Pedro Juárez','Tizimín','Yucatán'),(1105,'97710','Colonia Yucatán','Tizimín','Yucatán'),(1106,'97710','Dzonot Aké','Tizimín','Yucatán'),(1107,'97710','San Isidro Chuncopó','Tizimín','Yucatán'),(1108,'97710','Yaxchekú','Tizimín','Yucatán'),(1109,'97710','Teapa','Tizimín','Yucatán'),(1110,'97710','La Sierra','Tizimín','Yucatán'),(1111,'97710','Lázaro Cárdenas','Tizimín','Yucatán'),(1112,'97710','Felipe Carrillo Puerto Dos','Tizimín','Yucatán'),(1113,'97710','San Enrique','Tizimín','Yucatán'),(1114,'97710','Kabichén','Tizimín','Yucatán'),(1115,'97710','El Ramonal','Tizimín','Yucatán'),(1116,'97710','Orizaba','Tizimín','Yucatán'),(1117,'97710','San Luis Tzuctuk','Tizimín','Yucatán'),(1118,'97712','Santa Rosa Concepción','Tizimín','Yucatán'),(1119,'97713','San Miguel','Tizimín','Yucatán'),(1120,'97713','Santa Pilar','Tizimín','Yucatán'),(1121,'97713','Santa Isabel','Tizimín','Yucatán'),(1122,'97713','Santa Rosa y Anexas','Tizimín','Yucatán'),(1123,'97713','Cenote Azul','Tizimín','Yucatán'),(1124,'97713','Samaria','Tizimín','Yucatán'),(1125,'97713','Benito Juárez','Tizimín','Yucatán'),(1126,'97713','Rancho Grande','Tizimín','Yucatán'),(1127,'97713','Santa Ana','Tizimín','Yucatán'),(1128,'97713','Paraíso','Tizimín','Yucatán'),(1129,'97713','La Libertad','Tizimín','Yucatán'),(1130,'97714','Santa María','Tizimín','Yucatán'),(1131,'97714','San Pedro Sacboc','Tizimín','Yucatán'),(1132,'97715','San Hipólito','Tizimín','Yucatán'),(1133,'97715','El Limonar','Tizimín','Yucatán'),(1134,'97715','San Pedro Bacab','Tizimín','Yucatán'),(1135,'97715','Nuevo León','Tizimín','Yucatán'),(1136,'97715','Nuevo Tezoco','Tizimín','Yucatán'),(1137,'97715','San Arturo','Tizimín','Yucatán'),(1138,'97715','San Isidro','Tizimín','Yucatán'),(1139,'97715','Francisco Villa','Tizimín','Yucatán'),(1140,'97715','Manuel Cepeda Peraza','Tizimín','Yucatán'),(1141,'97715','Santa Clara','Tizimín','Yucatán'),(1142,'97715','Tres Marias','Tizimín','Yucatán'),(1143,'97715','San Juan','Tizimín','Yucatán'),(1144,'97715','Santa Elena','Tizimín','Yucatán'),(1145,'97715','Luis Rosado Vega','Tizimín','Yucatán'),(1146,'97716','San Manuel','Tizimín','Yucatán'),(1147,'97716','Papoinah','Tizimín','Yucatán'),(1148,'97716','El Edén (Yaxic)','Tizimín','Yucatán'),(1149,'97716','Adolfo López Mateos','Tizimín','Yucatán'),(1150,'97716','Santa Rosa','Tizimín','Yucatán'),(1151,'97716','Quintana','Tizimín','Yucatán'),(1152,'97716','San José Montecristo','Tizimín','Yucatán'),(1153,'97716','Felipe Carrillo Puerto Número Uno','Tizimín','Yucatán'),(1154,'97716','Chan Tres Reyes','Tizimín','Yucatán'),(1155,'97716','La Esperanza','Tizimín','Yucatán'),(1156,'97716','San Isidro Kilómetro Catorce (San Isidro)','Tizimín','Yucatán'),(1157,'97717','Tixcancal','Tizimín','Yucatán'),(1158,'97717','Chan Cenote','Tizimín','Yucatán'),(1159,'97717','San Isidro Kancabdzonot','Tizimín','Yucatán'),(1160,'97717','Trascorral','Tizimín','Yucatán'),(1161,'97717','Dzonot Mezo','Tizimín','Yucatán'),(1162,'97717','San Lorenzo','Tizimín','Yucatán'),(1163,'97717','San Lorenzo Chiquilá','Tizimín','Yucatán'),(1164,'97720','Río Lagartos','Río Lagartos','Yucatán'),(1165,'97723','Las Coloradas','Río Lagartos','Yucatán'),(1166,'97726','Quinientos','Río Lagartos','Yucatán'),(1167,'97730','Espita','Espita','Yucatán'),(1168,'97730','Santa Cruz Regario','Espita','Yucatán'),(1169,'97733','Nacuche','Espita','Yucatán'),(1170,'97734','San Antonio Xuilub','Espita','Yucatán'),(1171,'97734','Kunche','Espita','Yucatán'),(1172,'97734','San Pedro Chenchelo','Espita','Yucatán'),(1173,'97739','Holcá','Espita','Yucatán'),(1174,'97740','Temozón','Temozón','Yucatán'),(1175,'97743','Santa Rita','Temozón','Yucatán'),(1176,'97743','Xeb','Temozón','Yucatán'),(1177,'97743','Kante','Temozón','Yucatán'),(1178,'97743','Actuncah','Temozón','Yucatán'),(1179,'97743','Ekbalam','Temozón','Yucatán'),(1180,'97743','Xuch','Temozón','Yucatán'),(1181,'97744','Hunukú','Temozón','Yucatán'),(1182,'97744','Nahbalam','Temozón','Yucatán'),(1183,'97744','Yokdzonot Presentado','Temozón','Yucatán'),(1184,'97744','Xcanchechen','Temozón','Yucatán'),(1185,'97744','Xtut','Temozón','Yucatán'),(1186,'97744','Dzalbay','Temozón','Yucatán'),(1187,'97745','Calotmul','Calotmul','Yucatán'),(1188,'97746','Tahcabo','Calotmul','Yucatán'),(1189,'97747','Pocoboch','Calotmul','Yucatán'),(1190,'97748','Yokdzonot','Calotmul','Yucatán'),(1191,'97750','Tinum','Tinum','Yucatán'),(1192,'97751','Piste','Tinum','Yucatán'),(1193,'97753','Poom','Tinum','Yucatán'),(1194,'97754','Balantun','Tinum','Yucatán'),(1195,'97755','San Francisco','Tinum','Yucatán'),(1196,'97755','San Francisco Grande','Tinum','Yucatán'),(1197,'97755','Tohopku','Tinum','Yucatán'),(1198,'97756','X-Calakoop','Tinum','Yucatán'),(1199,'97756','San Felipe','Tinum','Yucatán'),(1200,'97757','Chichen-itza','Tinum','Yucatán'),(1201,'97758','Tzukmuc','Chankom','Yucatán'),(1202,'97758','Xanlá','Chankom','Yucatán'),(1203,'97758','Muchucuxcáh','Chankom','Yucatán'),(1204,'97758','Chankom','Chankom','Yucatán'),(1205,'97758','Ticimul','Chankom','Yucatán'),(1206,'97758','Xcopteil','Chankom','Yucatán'),(1207,'97758','Xcatun','Chankom','Yucatán'),(1208,'97758','Xtohil','Chankom','Yucatán'),(1209,'97758','San Isidro','Chankom','Yucatán'),(1210,'97758','Pambá','Chankom','Yucatán'),(1211,'97758','Nicte-Ha','Chankom','Yucatán'),(1212,'97758','X-Cocail','Chankom','Yucatán'),(1213,'97758','X-Bohom','Chankom','Yucatán'),(1214,'97758','Yokdzonot','Chankom','Yucatán'),(1215,'97758','San Juan','Chankom','Yucatán'),(1216,'97759','San Juan Xkalakdzonot','Chankom','Yucatán'),(1217,'97759','Xcalakdzonot','Chankom','Yucatán'),(1218,'97760','Chichimilá','Chichimilá','Yucatán'),(1219,'97760','San José','Chichimilá','Yucatán'),(1220,'97760','Celtun','Chichimilá','Yucatán'),(1221,'97760','X-Chay','Chichimilá','Yucatán'),(1222,'97760','Chan X-Cail','Chichimilá','Yucatán'),(1223,'97760','Tixcancal Dzonot','Chichimilá','Yucatán'),(1224,'97760','San Pedro','Chichimilá','Yucatán'),(1225,'97761','Dzitox','Chichimilá','Yucatán'),(1226,'97762','Tixcacalcupul','Tixcacalcupul','Yucatán'),(1227,'97763','Carolina','Tixcacalcupul','Yucatán'),(1228,'97763','San José','Tixcacalcupul','Yucatán'),(1229,'97763','Monte Verde','Tixcacalcupul','Yucatán'),(1230,'97763','Poop','Tixcacalcupul','Yucatán'),(1231,'97763','Ekpedz','Tixcacalcupul','Yucatán'),(1232,'97763','Mahas','Tixcacalcupul','Yucatán'),(1233,'97763','Xtobil','Tixcacalcupul','Yucatán'),(1234,'97764','Kaua','Kaua','Yucatán'),(1235,'97764','Xtzeal','Kaua','Yucatán'),(1236,'97765','San Esteban','Kaua','Yucatán'),(1237,'97766','Cuncunul','Cuncunul','Yucatán'),(1238,'97766','San Francisco','Cuncunul','Yucatán'),(1239,'97766','San Diego','Cuncunul','Yucatán'),(1240,'97767','Chebalam','Cuncunul','Yucatán'),(1241,'97768','Tekom','Tekom','Yucatán'),(1242,'97768','San Antonio','Tekom','Yucatán'),(1243,'97768','Dzidzilché','Tekom','Yucatán'),(1244,'97769','X-Cocmil','Tekom','Yucatán'),(1245,'97769','Chindzonot','Tekom','Yucatán'),(1246,'97769','Pocbichen','Tekom','Yucatán'),(1247,'97769','Xuxcab','Tekom','Yucatán'),(1248,'97769','Chibilub','Tekom','Yucatán'),(1249,'97770','Chemax','Chemax','Yucatán'),(1250,'97770','Benito Juárez García','Chemax','Yucatán'),(1251,'97773','X-Catzín (Catzín)','Chemax','Yucatán'),(1252,'97773','Uspibil','Chemax','Yucatán'),(1253,'97773','Chechmil','Chemax','Yucatán'),(1254,'97773','Xmaab','Chemax','Yucatán'),(1255,'97773','Xuneb','Chemax','Yucatán'),(1256,'97773','Xalaú','Chemax','Yucatán'),(1257,'97773','Kuxeb','Chemax','Yucatán'),(1258,'97774','X-can','Chemax','Yucatán'),(1259,'97774','Santa Cruz','Chemax','Yucatán'),(1260,'97774','Cholul','Chemax','Yucatán'),(1261,'97774','San Andrés','Chemax','Yucatán'),(1262,'97774','San Roman','Chemax','Yucatán'),(1263,'97774','San Pedro Chemax','Chemax','Yucatán'),(1264,'97774','Santa Elena','Chemax','Yucatán'),(1265,'97774','San Juan Chen','Chemax','Yucatán'),(1266,'97774','Mucel','Chemax','Yucatán'),(1267,'97774','Xtejas','Chemax','Yucatán'),(1268,'97775','Cocoyol','Chemax','Yucatán'),(1269,'97775','Buenavista','Chemax','Yucatán'),(1270,'97775','Santa Rita','Chemax','Yucatán'),(1271,'97776','Sisbichén','Chemax','Yucatán'),(1272,'97776','Pabalam','Chemax','Yucatán'),(1273,'97776','Champolin','Chemax','Yucatán'),(1274,'97777','Chachadzonot','Chemax','Yucatán'),(1275,'97777','Lol-Bé','Chemax','Yucatán'),(1276,'97777','Chuluntan','Chemax','Yucatán'),(1277,'97777','Yaxche','Chemax','Yucatán'),(1278,'97780','Valladolid Centro','Valladolid','Yucatán'),(1279,'97782','San Isidro','Valladolid','Yucatán'),(1280,'97782','Las Palmas','Valladolid','Yucatán'),(1281,'97782','Orquídeas','Valladolid','Yucatán'),(1282,'97782','Los Cipreses','Valladolid','Yucatán'),(1283,'97782','Candelaria','Valladolid','Yucatán'),(1284,'97782','Flor Campestre','Valladolid','Yucatán'),(1285,'97782','Jardines Del Oriente','Valladolid','Yucatán'),(1286,'97782','Lol-beh','Valladolid','Yucatán'),(1287,'97782','Residencial Campestre','Valladolid','Yucatán'),(1288,'97782','Santa Ana','Valladolid','Yucatán'),(1289,'97782','Santa Lucia','Valladolid','Yucatán'),(1290,'97782','Fernando Novelo','Valladolid','Yucatán'),(1291,'97782','Santa Ana','Valladolid','Yucatán'),(1292,'97782','Militar','Valladolid','Yucatán'),(1293,'97782','Santa Cruz','Valladolid','Yucatán'),(1294,'97783','Leonardo Rodríguez Alcaine','Valladolid','Yucatán'),(1295,'97783','Militar','Valladolid','Yucatán'),(1296,'97783','Oaxaqueña','Valladolid','Yucatán'),(1297,'97783','San Juan','Valladolid','Yucatán'),(1298,'97783','San Antonio','Valladolid','Yucatán'),(1299,'97783','Sacyabil','Valladolid','Yucatán'),(1300,'97783','Santana','Valladolid','Yucatán'),(1301,'97783','San Francisco','Valladolid','Yucatán'),(1302,'97783','San Vicente','Valladolid','Yucatán'),(1303,'97784','Residencial del Bosque','Valladolid','Yucatán'),(1304,'97784','Bacalar','Valladolid','Yucatán'),(1305,'97784','Sisal','Valladolid','Yucatán'),(1306,'97784','Xcorazon','Valladolid','Yucatán'),(1307,'97784','Emiliano Zapata','Valladolid','Yucatán'),(1308,'97784','Puesta Del Sol','Valladolid','Yucatán'),(1309,'97784','Capules','Valladolid','Yucatán'),(1310,'97784','Flamboyanes','Valladolid','Yucatán'),(1311,'97784','Colonos','Valladolid','Yucatán'),(1312,'97784','San Carlos','Valladolid','Yucatán'),(1313,'97784','Cruz Verde','Valladolid','Yucatán'),(1314,'97785','Kanxoc','Valladolid','Yucatán'),(1315,'97785','Xocen','Valladolid','Yucatán'),(1316,'97785','Batun','Valladolid','Yucatán'),(1317,'97785','Kampepén','Valladolid','Yucatán'),(1318,'97786','Sidra Kin','Valladolid','Yucatán'),(1319,'97786','Timas','Valladolid','Yucatán'),(1320,'97787','Santa Cruz','Valladolid','Yucatán'),(1321,'97787','Xuilib','Valladolid','Yucatán'),(1322,'97787','Nohsuytun','Valladolid','Yucatán'),(1323,'97787','Yaxche','Valladolid','Yucatán'),(1324,'97787','Chamul','Valladolid','Yucatán'),(1325,'97790','La Guadalupana','Valladolid','Yucatán'),(1326,'97790','Pixoy','Valladolid','Yucatán'),(1327,'97790','Popola','Valladolid','Yucatán'),(1328,'97793','Tesoco','Valladolid','Yucatán'),(1329,'97793','Ticúch','Valladolid','Yucatán'),(1330,'97793','Chan Yokdzonot','Valladolid','Yucatán'),(1331,'97793','Tepakan','Valladolid','Yucatán'),(1332,'97793','Tahmuy','Valladolid','Yucatán'),(1333,'97793','Zodzilchén','Valladolid','Yucatán'),(1334,'97793','Yunchen','Valladolid','Yucatán'),(1335,'97794','Yalcoba','Valladolid','Yucatán'),(1336,'97794','Chiople','Valladolid','Yucatán'),(1337,'97794','San Andres Bac','Valladolid','Yucatán'),(1338,'97795','Dzitnup','Valladolid','Yucatán'),(1339,'97795','Yalcon','Valladolid','Yucatán'),(1340,'97795','Ebtun','Valladolid','Yucatán'),(1341,'97795','X-Kekén','Valladolid','Yucatán'),(1342,'97795','Tixhualactún','Valladolid','Yucatán'),(1343,'97796','Uayma','Uayma','Yucatán'),(1344,'97798','Santa María','Uayma','Yucatán'),(1345,'97799','San Lorenzo','Uayma','Yucatán'),(1346,'97800','Maxcanu','Maxcanú','Yucatán'),(1347,'97800','Guadalupe','Maxcanú','Yucatán'),(1348,'97800','La Sirena','Maxcanú','Yucatán'),(1349,'97803','Chan Chocholá (Santa Eduviges Chan Chocholá)','Maxcanú','Yucatán'),(1350,'97803','Granada (Chican Granada)','Maxcanú','Yucatán'),(1351,'97803','Santa Cruz','Maxcanú','Yucatán'),(1352,'97803','Kanachén','Maxcanú','Yucatán'),(1353,'97804','Kochol','Maxcanú','Yucatán'),(1354,'97804','Santo Domingo','Maxcanú','Yucatán'),(1355,'97804','San Fernando','Maxcanú','Yucatán'),(1356,'97804','Santa Rosa','Maxcanú','Yucatán'),(1357,'97804','Paraíso','Maxcanú','Yucatán'),(1358,'97804','Coahuila (Santa Teresa Coahuila)','Maxcanú','Yucatán'),(1359,'97804','X-Cacal','Maxcanú','Yucatán'),(1360,'97804','Yaxcaba','Maxcanú','Yucatán'),(1361,'97804','Lázaro Cárdenas','Maxcanú','Yucatán'),(1362,'97805','Chunchucmil','Maxcanú','Yucatán'),(1363,'97805','San Simón Sinkehuel','Maxcanú','Yucatán'),(1364,'97806','San Rafael','Maxcanú','Yucatán'),(1365,'97807','Chencoh','Maxcanú','Yucatán'),(1366,'97810','Samahil','Samahil','Yucatán'),(1367,'97810','Kuchel','Samahil','Yucatán'),(1368,'97812','San Antonio Tedzidz','Samahil','Yucatán'),(1369,'97813','Opichen','Opichén','Yucatán'),(1370,'97814','Calcehtoc','Opichén','Yucatán'),(1371,'97816','Chochola','Chocholá','Yucatán'),(1372,'97816','San Antonio Chable','Chocholá','Yucatán'),(1373,'97818','Kopomá','Kopomá','Yucatán'),(1374,'97818','San Bernardo','Kopomá','Yucatán'),(1375,'97820','Tecoh','Tecoh','Yucatán'),(1376,'97822','Lepan','Tecoh','Yucatán'),(1377,'97822','Oxtapacab','Tecoh','Yucatán'),(1378,'97822','Itzincab','Tecoh','Yucatán'),(1379,'97822','Sotuta de Peón','Tecoh','Yucatán'),(1380,'97823','Chinkilá','Tecoh','Yucatán'),(1381,'97823','Sabacché','Tecoh','Yucatán'),(1382,'97823','Pixyah','Tecoh','Yucatán'),(1383,'97824','Telchaquillo','Tecoh','Yucatán'),(1384,'97824','Xcanchakan','Tecoh','Yucatán'),(1385,'97824','Mayapan','Tecoh','Yucatán'),(1386,'97824','Mahzucil','Tecoh','Yucatán'),(1387,'97825','Abalá','Abalá','Yucatán'),(1388,'97825','Mukuiche','Abalá','Yucatán'),(1389,'97825','Uayalceh','Abalá','Yucatán'),(1390,'97826','Sinhuchen','Abalá','Yucatán'),(1391,'97826','Cacao','Abalá','Yucatán'),(1392,'97826','Peba','Abalá','Yucatán'),(1393,'97827','Temozon Sur','Abalá','Yucatán'),(1394,'97830','Halacho','Halachó','Yucatán'),(1395,'97830','San José','Halachó','Yucatán'),(1396,'97835','Cepeda','Halachó','Yucatán'),(1397,'97835','Cuch Holoch','Halachó','Yucatán'),(1398,'97835','Siho','Halachó','Yucatán'),(1399,'97835','Unidad Agrícola Guadalupe','Halachó','Yucatán'),(1400,'97835','Concepción','Halachó','Yucatán'),(1401,'97836','San Mateo','Halachó','Yucatán'),(1402,'97836','Dzbzibachi','Halachó','Yucatán'),(1403,'97836','Kankabchen','Halachó','Yucatán'),(1404,'97837','Santa Maria Acu','Halachó','Yucatán'),(1405,'97837','Santa Sofia','Halachó','Yucatán'),(1406,'97840','Tepakán','Muna','Yucatán'),(1407,'97840','Muna de Leopoldo Arana Cabrera','Muna','Yucatán'),(1408,'97840','Benito Juárez','Muna','Yucatán'),(1409,'97840','San Bernardo','Muna','Yucatán'),(1410,'97840','San Mateo','Muna','Yucatán'),(1411,'97840','San Sebastián','Muna','Yucatán'),(1412,'97840','Víctor Cervera Pacheco','Muna','Yucatán'),(1413,'97843','Choyob','Muna','Yucatán'),(1414,'97843','Yaxha','Muna','Yucatán'),(1415,'97844','San Jose Tipceh','Muna','Yucatán'),(1416,'97844','U.F. Lázaro Cárdenas','Muna','Yucatán'),(1417,'97845','Sacalum','Sacalum','Yucatán'),(1418,'97847','San Antonio Sodzil','Sacalum','Yucatán'),(1419,'97848','Yunku','Sacalum','Yucatán'),(1420,'97850','Mani','Maní','Yucatán'),(1421,'97851','Tipikal','Maní','Yucatán'),(1422,'97854','Dzan','Dzan','Yucatán'),(1423,'97857','Chapab','Chapab','Yucatán'),(1424,'97858','Citincabchen','Chapab','Yucatán'),(1425,'97858','Hunabchen','Chapab','Yucatán'),(1426,'97858','San Cristóbal','Chapab','Yucatán'),(1427,'97860','Ticul Centro','Ticul','Yucatán'),(1428,'97862','De los Electricistas','Ticul','Yucatán'),(1429,'97862','Deportivo Campestre','Ticul','Yucatán'),(1430,'97862','Mejorada','Ticul','Yucatán'),(1431,'97862','Guadalupe','Ticul','Yucatán'),(1432,'97862','Obrera','Ticul','Yucatán'),(1433,'97862','Campestre','Ticul','Yucatán'),(1434,'97863','San Juan','Ticul','Yucatán'),(1435,'97864','San Joaquín','Ticul','Yucatán'),(1436,'97864','San Enrique','Ticul','Yucatán'),(1437,'97864','Las Tinajas','Ticul','Yucatán'),(1438,'97864','San Benito','Ticul','Yucatán'),(1439,'97864','Santa Maria','Ticul','Yucatán'),(1440,'97864','San Román','Ticul','Yucatán'),(1441,'97864','Santiago','Ticul','Yucatán'),(1442,'97870','Pustunich','Ticul','Yucatán'),(1443,'97873','Yotholin','Ticul','Yucatán'),(1444,'97880','Tutul Xiú','Oxkutzcab','Yucatán'),(1445,'97880','Oxkutzcab','Oxkutzcab','Yucatán'),(1446,'97882','San José Kunché','Oxkutzcab','Yucatán'),(1447,'97883','Lol-Tún','Oxkutzcab','Yucatán'),(1448,'97883','Yaaxhom','Oxkutzcab','Yucatán'),(1449,'97883','Emiliano Zapata','Oxkutzcab','Yucatán'),(1450,'97883','Xohuayan','Oxkutzcab','Yucatán'),(1451,'97884','Nohcacab','Oxkutzcab','Yucatán'),(1452,'97884','Xul','Oxkutzcab','Yucatán'),(1453,'97884','Sacamucuy','Oxkutzcab','Yucatán'),(1454,'97884','Xobenhaltun','Oxkutzcab','Yucatán'),(1455,'97885','Sayil','Oxkutzcab','Yucatán'),(1456,'97886','Yaxhacchen','Oxkutzcab','Yucatán'),(1457,'97886','Kihuic','Oxkutzcab','Yucatán'),(1458,'97887','Tabi','Oxkutzcab','Yucatán'),(1459,'97887','Xlapak','Oxkutzcab','Yucatán'),(1460,'97887','Labna','Oxkutzcab','Yucatán'),(1461,'97890','Santa Elena','Santa Elena','Yucatán'),(1462,'97890','San Agustín','Santa Elena','Yucatán'),(1463,'97894','Kabah','Santa Elena','Yucatán'),(1464,'97895','San Simón','Santa Elena','Yucatán'),(1465,'97899','Hotel Villas Arqueológicas','Santa Elena','Yucatán'),(1466,'97899','Hotel Hacienda Uxmal','Santa Elena','Yucatán'),(1467,'97900','Mama','Mama','Yucatán'),(1468,'97904','Chumayel','Chumayel','Yucatán'),(1469,'97908','Mayapan','Mayapán','Yucatán'),(1470,'97910','Teabo','Teabo','Yucatán'),(1471,'97915','Cantamayec','Cantamayec','Yucatán'),(1472,'97917','Nenela','Cantamayec','Yucatán'),(1473,'97918','Cholul','Cantamayec','Yucatán'),(1474,'97920','Yaxcaba','Yaxcabá','Yucatán'),(1475,'97922','Yokdzonot','Yaxcabá','Yucatán'),(1476,'97922','Mexil','Yaxcabá','Yucatán'),(1477,'97923','Libre Unión','Yaxcabá','Yucatán'),(1478,'97923','Cenote Xtohil','Yaxcabá','Yucatán'),(1479,'97924','Cenote Aban','Yaxcabá','Yucatán'),(1480,'97924','San Marcos','Yaxcabá','Yucatán'),(1481,'97924','Popola','Yaxcabá','Yucatán'),(1482,'97924','Chimay','Yaxcabá','Yucatán'),(1483,'97924','Yaxunah','Yaxcabá','Yucatán'),(1484,'97924','Z.A. Yaxuna','Yaxcabá','Yucatán'),(1485,'97925','Tiholop','Yaxcabá','Yucatán'),(1486,'97925','Santa Maria','Yaxcabá','Yucatán'),(1487,'97925','Kancabdzonot','Yaxcabá','Yucatán'),(1488,'97925','Yokdzonot-Hú','Yaxcabá','Yucatán'),(1489,'97925','Huechen Balam','Yaxcabá','Yucatán'),(1490,'97925','San Pedro','Yaxcabá','Yucatán'),(1491,'97925','Sahcabá','Yaxcabá','Yucatán'),(1492,'97926','Cacalchen','Yaxcabá','Yucatán'),(1493,'97926','Canakom','Yaxcabá','Yucatán'),(1494,'97927','Tahdzibichen','Yaxcabá','Yucatán'),(1495,'97927','Tixcacaltuyub','Yaxcabá','Yucatán'),(1496,'97929','Tinuncah','Yaxcabá','Yucatán'),(1497,'97929','Cipché','Yaxcabá','Yucatán'),(1498,'97930','Peto Centro','Peto','Yucatán'),(1499,'97930','Benito Juárez','Peto','Yucatán'),(1500,'97930','Francisco I Madero','Peto','Yucatán'),(1501,'97930','Francisco Sarabia','Peto','Yucatán'),(1502,'97930','Miraflores','Peto','Yucatán'),(1503,'97930','Morelos y Fátima','Peto','Yucatán'),(1504,'97930','3 Cruces','Peto','Yucatán'),(1505,'97930','Trinidad','Peto','Yucatán'),(1506,'97930','Felipe Carrillo Puerto','Peto','Yucatán'),(1507,'97930','Jacinto Kanek','Peto','Yucatán'),(1508,'97930','Ciprés','Peto','Yucatán'),(1509,'97932','Xoy','Peto','Yucatán'),(1510,'97933','Progresito','Peto','Yucatán'),(1511,'97933','Tixhualactun','Peto','Yucatán'),(1512,'97933','San Gregorio','Peto','Yucatán'),(1513,'97933','Temozon','Peto','Yucatán'),(1514,'97933','San Pedro','Peto','Yucatán'),(1515,'97934','Guadalupe','Peto','Yucatán'),(1516,'97934','San Diego','Peto','Yucatán'),(1517,'97934','Xcabanchen','Peto','Yucatán'),(1518,'97934','San Nicolás Yoactún','Peto','Yucatán'),(1519,'97934','San Bernabe','Peto','Yucatán'),(1520,'97935','Papacal','Peto','Yucatán'),(1521,'97935','Santa Elena','Peto','Yucatán'),(1522,'97935','San Francisco','Peto','Yucatán'),(1523,'97935','Dzonotchel','Peto','Yucatán'),(1524,'97935','Chan Calotmul','Peto','Yucatán'),(1525,'97935','San Mateo','Peto','Yucatán'),(1526,'97935','Santa Cruz','Peto','Yucatán'),(1527,'97936','Polinkin','Peto','Yucatán'),(1528,'97936','La Esperanza','Peto','Yucatán'),(1529,'97936','Kambul','Peto','Yucatán'),(1530,'97936','Abal','Peto','Yucatán'),(1531,'97936','San Sebastián','Peto','Yucatán'),(1532,'97936','San Dionisio','Peto','Yucatán'),(1533,'97936','Petulillo','Peto','Yucatán'),(1534,'97937','Tobxila','Peto','Yucatán'),(1535,'97937','San Miguel','Peto','Yucatán'),(1536,'97937','Uitzina','Peto','Yucatán'),(1537,'97937','Trapiche','Peto','Yucatán'),(1538,'97937','San Salvador','Peto','Yucatán'),(1539,'97937','Santa Rosa','Peto','Yucatán'),(1540,'97937','Justicia Social','Peto','Yucatán'),(1541,'97937','Santa Ursula','Peto','Yucatán'),(1542,'97937','Xpechil','Peto','Yucatán'),(1543,'97937','Candelaria (San Pedro)','Peto','Yucatán'),(1544,'97937','Macmay','Peto','Yucatán'),(1545,'97937','Yaxcopil','Peto','Yucatán'),(1546,'97940','Chikindzonot','Chikindzonot','Yucatán'),(1547,'97943','Chan Santa María','Chikindzonot','Yucatán'),(1548,'97943','Chanchimila','Chikindzonot','Yucatán'),(1549,'97943','X-Poxil','Chikindzonot','Yucatán'),(1550,'97943','Xcampana','Chikindzonot','Yucatán'),(1551,'97944','Ichmul','Chikindzonot','Yucatán'),(1552,'97945','Tahdziu','Tahdziú','Yucatán'),(1553,'97947','Timul','Tahdziú','Yucatán'),(1554,'97948','San Ignacio','Tahdziú','Yucatán'),(1555,'97948','Mocté','Tahdziú','Yucatán'),(1556,'97950','Tixmehuac','Tixméhuac','Yucatán'),(1557,'97953','Chuchub','Tixméhuac','Yucatán'),(1558,'97953','Chican','Tixméhuac','Yucatán'),(1559,'97953','Sabacche','Tixméhuac','Yucatán'),(1560,'97953','Sisbic','Tixméhuac','Yucatán'),(1561,'97953','Kimbila','Tixméhuac','Yucatán'),(1562,'97953','Dzutoh','Tixméhuac','Yucatán'),(1563,'97954','Sacchacan','Tixméhuac','Yucatán'),(1564,'97955','Chacsinkin','Chacsinkín','Yucatán'),(1565,'97956','Xno-Huayab','Chacsinkín','Yucatán'),(1566,'97957','Xbox','Chacsinkín','Yucatán'),(1567,'97960','Tzucacab Centro','Tzucacab','Yucatán'),(1568,'97963','Ekbalam','Tzucacab','Yucatán'),(1569,'97963','Dzi','Tzucacab','Yucatán'),(1570,'97963','Kakalnah','Tzucacab','Yucatán'),(1571,'97963','Solidaridad','Tzucacab','Yucatán'),(1572,'97964','Bichcopo','Tzucacab','Yucatán'),(1573,'97964','Hobonil','Tzucacab','Yucatán'),(1574,'97964','Sacbecan','Tzucacab','Yucatán'),(1575,'97964','Noh-bec','Tzucacab','Yucatán'),(1576,'97964','Polhuaczil','Tzucacab','Yucatán'),(1577,'97965','Corral','Tzucacab','Yucatán'),(1578,'97965','Blanca Flor','Tzucacab','Yucatán'),(1579,'97965','El Escondido','Tzucacab','Yucatán'),(1580,'97965','Tigre Grande','Tzucacab','Yucatán'),(1581,'97966','La Esperanza','Tzucacab','Yucatán'),(1582,'97966','San Isidro','Tzucacab','Yucatán'),(1583,'97966','San Salvador Piste Akal','Tzucacab','Yucatán'),(1584,'97967','Caxaytuk','Tzucacab','Yucatán'),(1585,'97967','Thul','Tzucacab','Yucatán'),(1586,'97967','Lázaro Cárdenas','Tzucacab','Yucatán'),(1587,'97967','Emiliano Zapata','Tzucacab','Yucatán'),(1588,'97969','Catmís','Tzucacab','Yucatán'),(1589,'97970','Los Cedros','Tekax','Yucatán'),(1590,'97970','Villas Santa María','Tekax','Yucatán'),(1591,'97970','San Francisco','Tekax','Yucatán'),(1592,'97970','Villa Flores','Tekax','Yucatán'),(1593,'97970','Paraíso Tekax','Tekax','Yucatán'),(1594,'97970','Lázaro Cárdenas','Tekax','Yucatán'),(1595,'97970','Tekax de Álvaro Obregón','Tekax','Yucatán'),(1596,'97970','Benito Juárez','Tekax','Yucatán'),(1597,'97970','Francisco I Madero','Tekax','Yucatán'),(1598,'97970','Padre Eterno','Tekax','Yucatán'),(1599,'97970','Yocchenkax','Tekax','Yucatán'),(1600,'97970','Chunchucun','Tekax','Yucatán'),(1601,'97970','Chobenche','Tekax','Yucatán'),(1602,'97970','San Ignacio','Tekax','Yucatán'),(1603,'97970','Ermita','Tekax','Yucatán'),(1604,'97970','Fovissste (Módulo Social)','Tekax','Yucatán'),(1605,'97970','Unidad Antigua','Tekax','Yucatán'),(1606,'97973','Kinil','Tekax','Yucatán'),(1607,'97973','Xaya','Tekax','Yucatán'),(1608,'97973','Penkuyut','Tekax','Yucatán'),(1609,'97973','Tixcuytun','Tekax','Yucatán'),(1610,'97974','Ticum','Tekax','Yucatán'),(1611,'97975','Kantemo','Tekax','Yucatán'),(1612,'97975','San Marcos','Tekax','Yucatán'),(1613,'97977','Kancab','Tekax','Yucatán'),(1614,'97977','Canek','Tekax','Yucatán'),(1615,'97977','Chacmultun','Tekax','Yucatán'),(1616,'97979','Manuel Cepeda Peraza','Tekax','Yucatán'),(1617,'97979','Alfonso Caso','Tekax','Yucatán'),(1618,'97980','Benito Juárez','Tekax','Yucatán'),(1619,'97980','San Agustín (Salvador Alvarado)','Tekax','Yucatán'),(1620,'97980','San Pedro Zula','Tekax','Yucatán'),(1621,'97980','San Martín Hili','Tekax','Yucatán'),(1622,'97983','Chan Dzinup','Tekax','Yucatán'),(1623,'97983','Huntochac','Tekax','Yucatán'),(1624,'97983','Nuevo Popolá','Tekax','Yucatán'),(1625,'97983','Pocoboh','Tekax','Yucatán'),(1626,'97983','San Isidro Yaxche','Tekax','Yucatán'),(1627,'97983','San Salvador','Tekax','Yucatán'),(1628,'97983','Nueva Santa Cruz (Santa Cruz Cutzá)','Tekax','Yucatán'),(1629,'97983','Mac-Yan (San Isidro Mac-Yan)','Tekax','Yucatán'),(1630,'97984','Sacpukenhá','Tekax','Yucatán'),(1631,'97984','Becanchen','Tekax','Yucatán'),(1632,'97984','San Gaspar','Tekax','Yucatán'),(1633,'97984','San Diego Buenavista','Tekax','Yucatán'),(1634,'97985','Nohalal','Tekax','Yucatán'),(1635,'97986','Ayim','Tekax','Yucatán'),(1636,'97987','San Felipe Segundo','Tekax','Yucatán'),(1637,'97987','Mesatunich','Tekax','Yucatán'),(1638,'97987','San Rufino','Tekax','Yucatán'),(1639,'97987','San Pedro Xtokil','Tekax','Yucatán'),(1640,'97987','San Juan Tekax','Tekax','Yucatán'),(1641,'97989','Sudzal Chico','Tekax','Yucatán'),(1642,'97990','Akil Centro','Akil','Yucatán');
/*!40000 ALTER TABLE `postalcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` enum('Pendiente','Pagado','Cancelado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `type` enum('Nomina','Aguinaldo','Finiquito','Liquidacion') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nomina',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
INSERT INTO `salaries` VALUES (1,3,'Pagado','Nomina','2025-02-03','2025-03-09',-50,'2025-02-07 17:27:46','2025-03-04 17:27:46'),(2,3,'Pagado','Nomina','2025-02-10','2025-03-16',-50,'2025-02-15 17:28:33','2025-03-04 17:28:33'),(3,3,'Pagado','Nomina','2025-02-17','2025-03-23',-50,'2025-02-21 17:29:22','2025-03-04 17:29:22'),(4,3,'Pagado','Nomina','2025-02-24','2025-03-02',-50,'2025-02-27 17:30:50','2025-03-04 17:30:50');
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries_details`
--

DROP TABLE IF EXISTS `salaries_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `salary_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `concept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries_details`
--

LOCK TABLES `salaries_details` WRITE;
/*!40000 ALTER TABLE `salaries_details` DISABLE KEYS */;
INSERT INTO `salaries_details` VALUES (1,'1','Caja de ahorro','',-50),(2,'2','Caja de ahorro','',-50),(3,'3','Caja de ahorro','',-50),(4,'4','Caja de ahorro','',-50);
/*!40000 ALTER TABLE `salaries_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `car_id` int NOT NULL,
  `odometer` int DEFAULT NULL,
  `fault` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,2,11,21697,'Servicio mayor',NULL,'Entregado',NULL,'2025-03-03',1600,'2025-03-01 06:00:00','2025-03-01 04:57:13'),(2,9,12,185909,'Fuga de anticongelante \r\nDepósitos de anticongelante y liquido limpiaparabrisas \r\nLuz de check engine encendido',NULL,'Pendiente',NULL,NULL,0,'2025-03-01 06:00:00','2025-03-03 16:40:41'),(3,10,13,84573,'Fallo en transmisión, falla en Reversa',NULL,'Entregado',NULL,'2025-03-07',6610,'2025-03-01 06:00:00','2025-03-03 16:51:39');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_items`
--

DROP TABLE IF EXISTS `services_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `amount` int DEFAULT NULL,
  `item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labour` tinyint(1) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_items`
--

LOCK TABLES `services_items` WRITE;
/*!40000 ALTER TABLE `services_items` DISABLE KEYS */;
INSERT INTO `services_items` VALUES (1,1,1,'Servicio (mano de obra)',NULL,1,1600),(2,3,1,'Sensor de ABS delantero derecho','Original',0,1690),(3,3,1,'Sensor de ABS trasero izquierdo','Original',0,2380),(4,3,2,'Orings de anticongelante','Original',0,80),(5,3,1,'Orings de aceite','Original',0,130),(6,3,1,'Galón de anticongelante','Autozone',0,290),(7,3,2,'Litros de aceite de motor','Original',0,230),(8,3,1,'Servicio (mano de obra)',NULL,1,1500);
/*!40000 ALTER TABLE `services_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `services_view`
--

DROP TABLE IF EXISTS `services_view`;
/*!50001 DROP VIEW IF EXISTS `services_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `services_view` AS SELECT 
 1 AS `id`,
 1 AS `client_id`,
 1 AS `car_id`,
 1 AS `odometer`,
 1 AS `fault`,
 1 AS `comments`,
 1 AS `status`,
 1 AS `notes`,
 1 AS `due_date`,
 1 AS `total`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `car`,
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Activo','Inactivo','Cancelado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('Admin','Limit','Client') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Marcos Tzuc Cen','9991210261','mtc.nxd@gmail.com','$2y$12$XOAUu56juXnI9yDDAOM9NeUQXFvs73AJRTXy/EjjILsYUNfBaIDq2','Activo','Admin',NULL,NULL,NULL,NULL),(2,'Javier Rubio Magaña','9994484463','j-ar-8@hotmail.com','$2y$12$MDgDGZxFldFebhxmJU7TR.pqpZJtpYpH8kebfUEw8K5qidIqkAymi','Activo','Limit',NULL,NULL,'2025-02-27 20:35:13','2025-02-27 20:35:13'),(3,'Alexander Xix Ortiz','9971035139','alexanderxixjr@gmail.com','$2y$12$/6yEZ5vTrp89WzSu9LAUS.nkCjsYFW99N26nwJZ.t/srrFTJC1YO6','Activo','Limit','Mecanico',NULL,'2024-01-22 20:35:59','2025-02-27 20:35:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `services_view`
--

/*!50001 DROP VIEW IF EXISTS `services_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`marcos`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `services_view` AS select `services`.`id` AS `id`,`services`.`client_id` AS `client_id`,`services`.`car_id` AS `car_id`,`services`.`odometer` AS `odometer`,`services`.`fault` AS `fault`,`services`.`comments` AS `comments`,`services`.`status` AS `status`,`services`.`notes` AS `notes`,`services`.`due_date` AS `due_date`,`services`.`total` AS `total`,`services`.`created_at` AS `created_at`,`services`.`updated_at` AS `updated_at`,concat(`autos`.`brand`,' ',`autos`.`model`) AS `car`,`clients`.`name` AS `name` from ((`services` join `autos` on((`services`.`car_id` = `autos`.`id`))) join `clients` on((`services`.`client_id` = `clients`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-10 14:10:24
