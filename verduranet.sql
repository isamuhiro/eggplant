-- MySQL dump 10.13  Distrib 5.7.21, for osx10.12 (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razao_social` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inscricao_estadual` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_users_id_foreign` (`users_id`),
  CONSTRAINT `clients_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Mr. Freddy Nikolaus DVM','Sydney Schultz IV','Dr. Garth Miller','Vincenzo Carroll',0,1,'2018-04-04 22:27:08','2018-04-04 22:27:08'),(2,'Kyler Hickle','Haleigh Hintz','Reilly Gottlieb','Damian Strosin Jr.',0,2,'2018-04-04 22:27:08','2018-04-04 22:27:08'),(3,'Jessika Wisozk','Marlee Grady V','Mr. Stefan Sauer V','Mr. Javon Glover',0,3,'2018-04-04 22:27:08','2018-04-04 22:27:08');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerentes`
--

DROP TABLE IF EXISTS `gerentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerentes`
--

LOCK TABLES `gerentes` WRITE;
/*!40000 ALTER TABLE `gerentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `gerentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `managers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `stores_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `managers_clients_id_foreign` (`clients_id`),
  KEY `managers_users_id_foreign` (`users_id`),
  KEY `managers_stores_id_foreign` (`stores_id`),
  CONSTRAINT `managers_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `managers_stores_id_foreign` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `managers_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` VALUES (1,'000.111.222-33',1,4,4,'2018-04-04 22:29:08','2018-04-04 22:50:41'),(2,'000.111.222-33',1,5,1,'2018-04-04 22:29:08','2018-04-04 22:29:08'),(3,'000.111.222-33',1,6,1,'2018-04-04 22:29:08','2018-04-04 22:29:08'),(4,'000.111.222-33',1,7,1,'2018-04-04 22:43:45','2018-04-04 22:43:45'),(5,'000.111.222-33',1,8,1,'2018-04-04 22:43:45','2018-04-04 22:43:45'),(6,'000.111.222-33',1,9,1,'2018-04-04 22:43:45','2018-04-04 22:43:45'),(7,'036.467.680-96',1,10,1,'2018-04-04 23:01:11','2018-04-04 23:01:11');
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_01_30_102337_create_products_table',1),(4,'2018_02_06_151602_create_clients_table',1),(5,'2018_02_08_151602_create_stores_table',1),(6,'2018_02_10_151602_create_managers_table',1),(7,'2018_02_11_110207_create_orders_table',1),(8,'2018_02_12_110855_create_product_orders_table',1),(9,'old.2018_02_23_174341_create_gerentes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `managers_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `stores_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_managers_id_foreign` (`managers_id`),
  KEY `orders_products_id_foreign` (`products_id`),
  KEY `orders_stores_id_foreign` (`stores_id`),
  CONSTRAINT `orders_managers_id_foreign` FOREIGN KEY (`managers_id`) REFERENCES `managers` (`id`),
  CONSTRAINT `orders_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `orders_stores_id_foreign` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'001',4.70,0,1,2,1,'2018-04-04 22:41:52','2018-04-04 22:41:52'),(2,1,'001',4.70,0,1,3,1,'2018-04-04 22:41:52','2018-04-04 22:41:52');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `product_orders`
--

DROP TABLE IF EXISTS `product_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_orders_orders_id_foreign` (`orders_id`),
  KEY `product_orders_products_id_foreign` (`products_id`),
  CONSTRAINT `product_orders_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `product_orders_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_orders`
--

LOCK TABLES `product_orders` WRITE;
/*!40000 ALTER TABLE `product_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `weight` double(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'tempore','https://lorempixel.com/640/480/?17080',7.17,4.00,10,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(2,'qui','https://lorempixel.com/640/480/?61154',9.54,2.00,6,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(3,'exercitationem','https://lorempixel.com/640/480/?97278',2.20,4.00,7,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(4,'eius','https://lorempixel.com/640/480/?57532',4.01,9.00,1,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(5,'aperiam','https://lorempixel.com/640/480/?79207',4.71,7.00,8,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(6,'et','https://lorempixel.com/640/480/?28006',2.55,4.00,5,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(7,'tempore','https://lorempixel.com/640/480/?99152',2.08,2.00,2,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(8,'voluptate','https://lorempixel.com/640/480/?45668',1.22,10.00,2,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(9,'qui','https://lorempixel.com/640/480/?20126',3.30,10.00,7,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(10,'et','https://lorempixel.com/640/480/?66928',5.73,2.00,2,'2018-04-04 22:41:44','2018-04-04 22:41:44'),(11,'totam','https://lorempixel.com/640/480/?83618',8.22,5.00,3,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(12,'illo','https://lorempixel.com/640/480/?65929',2.10,4.00,7,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(13,'molestias','https://lorempixel.com/640/480/?51439',9.66,10.00,10,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(14,'similique','https://lorempixel.com/640/480/?49358',1.20,8.00,5,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(15,'neque','https://lorempixel.com/640/480/?12544',9.07,10.00,8,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(16,'assumenda','https://lorempixel.com/640/480/?38456',3.89,10.00,3,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(17,'aut','https://lorempixel.com/640/480/?68968',1.33,9.00,9,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(18,'occaecati','https://lorempixel.com/640/480/?46600',5.83,9.00,5,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(19,'aperiam','https://lorempixel.com/640/480/?62196',4.08,9.00,7,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(20,'incidunt','https://lorempixel.com/640/480/?58193',4.35,1.00,2,'2018-04-04 22:41:45','2018-04-04 22:41:45'),(21,'natus','https://lorempixel.com/640/480/?70388',3.94,9.00,3,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(22,'sapiente','https://lorempixel.com/640/480/?78304',7.36,3.00,6,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(23,'repellendus','https://lorempixel.com/640/480/?59771',1.91,9.00,4,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(24,'dignissimos','https://lorempixel.com/640/480/?22023',8.94,6.00,2,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(25,'ut','https://lorempixel.com/640/480/?80761',4.39,6.00,2,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(26,'porro','https://lorempixel.com/640/480/?57227',1.23,6.00,6,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(27,'natus','https://lorempixel.com/640/480/?75978',8.44,7.00,8,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(28,'porro','https://lorempixel.com/640/480/?61948',2.69,3.00,8,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(29,'doloribus','https://lorempixel.com/640/480/?23271',7.25,7.00,1,'2018-04-04 22:41:46','2018-04-04 22:41:46'),(30,'rem','https://lorempixel.com/640/480/?54829',5.71,2.00,8,'2018-04-04 22:41:46','2018-04-04 22:41:46');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stores_clients_id_foreign` (`clients_id`),
  CONSTRAINT `stores_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,'culpa','sit','eos','doloribus','(11)98877-6655','(11)98877-6655',NULL,NULL,NULL,1,'2018-04-04 22:28:30','2018-04-04 22:28:30',NULL),(2,'aspernatur','vero','vero','soluta','(11)98877-6655','(11)98877-6655',NULL,NULL,NULL,1,'2018-04-04 22:28:35','2018-04-04 22:28:35',NULL),(3,'natus','nostrum','aut','voluptatem','(11)98877-6655','(11)98877-6655',NULL,NULL,NULL,1,'2018-04-04 22:28:39','2018-04-04 22:28:39',NULL),(4,'airbnb','Porto alegre','RS','Brazil','(51) 99305-9136',NULL,'rua tal, 2202','03646-788','suport@airbnb.com.br',1,'2018-04-04 22:50:41','2018-04-04 22:50:41',NULL);
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sigurd Hagenes','champlin.dorothy@example.com','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','dzrUKBbwlM','2018-04-04 22:27:08','2018-04-04 22:27:08'),(2,'Lenna Bosco','mconn@example.net','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','643VM1L4RI','2018-04-04 22:27:08','2018-04-04 22:27:08'),(3,'Velda Windler','hettinger.maurice@example.com','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','bCEkzaMkUC','2018-04-04 22:27:08','2018-04-04 22:27:08'),(4,'Charles Rath','schoen.christy@example.com','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','C2vsLWn2ez','2018-04-04 22:29:08','2018-04-04 22:29:08'),(5,'Casimir Simonis','keith.reynolds@example.net','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','8oODDOxeSp','2018-04-04 22:29:08','2018-04-04 22:29:08'),(6,'Dr. Kirk Price V','jacinthe89@example.com','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','Lo1wd9I8yq','2018-04-04 22:29:08','2018-04-04 22:29:08'),(7,'Marcellus Blanda','brakus.jewel@example.org','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','JcXg4Ct81w','2018-04-04 22:43:45','2018-04-04 22:43:45'),(8,'Trevor Murray MD','brianne18@example.com','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','GWymAWonUt','2018-04-04 22:43:45','2018-04-04 22:43:45'),(9,'Terrence Bartoletti','kuhic.layla@example.org','$2y$10$p1Kmu6/OMBkpFOOJO95GG.31/LoSOMU3sCSDidX3d8OVT5nm7o3XW','IjaPDfcZEF','2018-04-04 22:43:45','2018-04-04 22:43:45'),(10,'kekekeke','ekekkeke@gmail.com','$2y$10$9UIHeBetyaN1rGw3Vj7RpubyOJ8VhXWCtfpyNaDiuBEyZE7YWMgfG',NULL,'2018-04-04 23:01:11','2018-04-04 23:01:11');
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

-- Dump completed on 2018-04-04 17:46:12
