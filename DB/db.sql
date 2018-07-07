-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: localhost    Database: ShopDB
-- ------------------------------------------------------
-- Server version	5.6.38

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'21.jpg','Household',NULL,NULL),(2,'21.jpg','Vegetables',NULL,NULL),(3,'21.jpg','Fruit',NULL,NULL),(4,'21.jpg','Soft_drinks',NULL,NULL),(5,'21.jpg','Juices',NULL,NULL),(6,'21.jpg','Energy_Drinks',NULL,NULL),(7,'21.jpg','Frozen_Snacks',NULL,NULL),(8,'21.jpg','Frozen_Vegetables',NULL,NULL),(9,'21.jpg','Bakery',NULL,NULL),(10,'21.jpg','Pet_food',NULL,NULL),(11,'21.jpg','Household_Cleaning',NULL,NULL),(12,'21.jpg','Household_Utensils',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characteristics`
--

DROP TABLE IF EXISTS `characteristics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characteristics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock` int(11) DEFAULT '0',
  `producer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produced` date NOT NULL,
  `expiration` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characteristics`
--

LOCK TABLES `characteristics` WRITE;
/*!40000 ALTER TABLE `characteristics` DISABLE KEYS */;
INSERT INTO `characteristics` VALUES (1,0,'Legros-Thompson','West Korbinburgh Apt. 360','1998-05-09','1992-06-15','888-391-3621','rhett67@kautzer.net','2018-06-28 17:13:29'),(2,0,'Stanton, Bins and Hansen','Port Maye Apt. 831','2004-07-08','2009-10-26','1-855-638-4700','mohr.furman@bins.net','2018-06-28 17:13:29'),(3,0,'Gusikowski, Hills and Emmerich','South Floyborough Apt. 066','2004-05-27','1974-08-29','(855) 379-9531','schuppe.jamel@osinski.com','2018-06-28 17:13:29'),(4,0,'Ziemann Ltd','Okunevabury Apt. 275','2016-08-25','1975-09-18','1-800-417-1329','emelia33@pfannerstill.info','2018-06-28 17:13:29'),(5,0,'Leannon-Lockman','New Emilianotown Apt. 011','1989-12-31','1971-08-08','1-866-997-1466','kreiger.octavia@rutherford.biz','2018-06-28 17:13:29'),(6,0,'Schinner, Swaniawski and O\'Connell','West Rhea Suite 179','2005-12-16','1973-06-21','1-855-391-1268','franecki.afton@gmail.com','2018-06-28 17:13:29'),(7,0,'Wunsch Ltd','Gutmannchester Apt. 479','2003-11-10','1971-05-31','(800) 766-9347','esteuber@kassulke.com','2018-06-28 17:13:29'),(8,0,'Stroman, Effertz and Jenkins','Lake Angel Apt. 127','2011-10-16','2015-09-28','(866) 317-3161','kaelyn.oconner@strosin.com','2018-06-28 17:13:29'),(9,0,'Klein, Schimmel and Torphy','Harrisville Apt. 890','1975-04-03','2000-11-25','(866) 662-2561','gilberto86@hotmail.com','2018-06-28 17:13:29'),(10,0,'Mraz, Beahan and Prohaska','Lake Verlie Suite 944','1985-06-19','2010-07-23','1-888-329-1141','hhickle@gmail.com','2018-06-28 17:13:29'),(11,0,'Ortiz-Pollich','North Daisy Suite 224','2014-01-09','1978-05-13','888.809.8215','archibald42@hotmail.com','2018-06-28 17:13:29'),(12,0,'Metz LLC','Siennamouth Apt. 612','2007-05-07','1971-07-18','(844) 586-0094','zokeefe@yahoo.com','2018-06-28 17:13:29'),(13,0,'Dibbert-Kirlin','Daughertyview Suite 672','2010-02-02','1977-06-20','844.810.6159','dakota.mayert@weissnat.com','2018-06-28 17:13:29'),(14,0,'Hauck-Davis','Kassulkemouth Suite 903','1971-12-15','1982-09-23','(855) 209-0146','davis.marques@kiehn.biz','2018-06-28 17:13:29'),(15,0,'Gutmann-Fritsch','Caleighberg Apt. 731','1991-10-25','1981-08-29','888.782.2349','sabina19@walker.info','2018-06-28 17:13:29'),(16,0,'Bergnaum Inc','Malachistad Suite 619','1991-10-22','1985-01-13','866-242-6594','jacobs.scotty@walker.net','2018-06-28 17:13:29'),(17,0,'Graham, Robel and Ullrich','Garrettland Suite 984','1978-05-28','2003-08-26','888.219.8178','marquise37@predovic.com','2018-06-28 17:13:29'),(18,0,'Wehner Inc','Caseybury Suite 201','1996-11-10','1984-07-16','866.838.0175','pacocha.brant@gmail.com','2018-06-28 17:13:29'),(19,0,'Weber-Lynch','Sabrinaburgh Suite 322','2002-09-01','1997-04-26','1-866-782-2538','afay@stroman.com','2018-06-28 17:13:30'),(20,0,'Mueller, Considine and Boehm','Lake London Apt. 635','1988-02-14','2009-02-25','1-844-723-3277','lmertz@hotmail.com','2018-06-28 17:13:30'),(21,0,'Deckow-Harvey','New Nathenberg Suite 713','1993-08-20','2010-01-02','877.245.3939','mathias77@gmail.com','2018-06-28 17:13:30'),(22,0,'Konopelski Group','East Samantha Suite 870','1995-02-26','2017-11-18','888.716.9595','jkihn@dibbert.com','2018-06-28 17:13:30'),(23,0,'Wuckert, Lind and Armstrong','Port Claudine Suite 661','2000-02-13','2013-05-27','855-415-7193','raquel44@yahoo.com','2018-06-28 17:13:30'),(24,0,'Predovic, Dach and Waelchi','Runteton Suite 713','2006-08-21','1970-11-07','866.764.2351','kade24@gmail.com','2018-06-28 17:13:30'),(25,0,'Baumbach, Hamill and Leannon','West Eltonborough Apt. 647','2017-07-08','1974-05-08','888-826-1000','russel.carter@marquardt.net','2018-06-28 17:13:30'),(26,0,'Heller PLC','East Kip Apt. 029','1978-07-20','1996-12-26','1-866-748-9008','steuber.silas@gmail.com','2018-06-28 17:13:30'),(27,0,'Rice-Lueilwitz','Shaniyahaven Suite 095','2017-07-17','1971-09-14','(855) 947-5499','ellis60@rau.biz','2018-06-28 17:13:30'),(28,0,'Strosin, Kihn and Beier','Kreigerhaven Suite 543','1989-11-16','2001-07-25','(844) 806-8542','qdeckow@gmail.com','2018-06-28 17:13:30'),(29,0,'Collins Inc','West Braxton Suite 572','2003-08-31','1995-10-20','1-800-888-7537','pierre.feest@breitenberg.org','2018-06-28 17:13:30'),(30,0,'Ortiz-Carroll','West Ruthe Suite 684','2011-06-02','1991-02-27','(888) 959-0225','tara.thiel@yahoo.com','2018-06-28 17:13:30'),(31,0,'Toy, Kulas and Pagac','Autumnfurt Suite 636','1971-11-17','2014-06-23','1-855-492-2869','cartwright.anika@yahoo.com','2018-06-28 17:13:30'),(32,0,'Dare Ltd','New Reynaport Apt. 220','2005-08-23','1995-10-10','888.845.7702','panderson@hotmail.com','2018-06-28 17:13:30'),(33,0,'Lynch, Schultz and Reichel','East Leopoldside Suite 330','2011-07-05','2001-08-03','877-549-2063','parisian.mauricio@gmail.com','2018-06-28 17:13:30'),(34,0,'Goodwin Inc','Coramouth Apt. 102','1989-11-24','2008-07-07','(844) 707-2339','clementina54@monahan.biz','2018-06-28 17:13:30'),(35,0,'Murphy, Trantow and Bartell','Anyaborough Apt. 965','2003-09-28','2014-05-03','866-963-8166','aglae.yost@fay.info','2018-06-28 17:13:30'),(36,0,'West-Stoltenberg','South Aurelie Suite 203','1999-12-24','1971-05-28','(888) 400-7318','grady.easter@hotmail.com','2018-06-28 17:13:30'),(37,0,'Schmeler-Boyle','West Elisabethside Suite 429','1992-10-18','2004-12-16','844-478-9512','orie94@labadie.biz','2018-06-28 17:13:30'),(38,0,'D\'Amore PLC','Port Ola Suite 635','2002-11-28','2012-11-10','1-888-226-6075','wbatz@gmail.com','2018-06-28 17:13:30'),(39,0,'Boyle-Stark','Idellburgh Apt. 814','1970-12-19','1996-02-05','1-800-482-1973','nathanael.padberg@vandervort.com','2018-06-28 17:13:30'),(40,0,'Schuppe-Trantow','Jamilland Apt. 174','1994-03-14','2001-02-07','800.998.0314','ddietrich@hotmail.com','2018-06-28 17:13:30'),(41,0,'Kub LLC','Wardview Suite 482','1995-03-11','2018-03-06','(888) 520-0824','rdubuque@hotmail.com','2018-06-28 17:13:30'),(42,0,'Cronin Inc','New Olga Suite 698','1979-10-25','2007-10-21','877-574-0080','gbartoletti@hotmail.com','2018-06-28 17:13:30'),(43,0,'Kshlerin-Stehr','North Adeline Suite 664','2002-03-22','1979-12-05','844.839.5940','jaquan.morissette@gmail.com','2018-06-28 17:13:30'),(44,0,'Frami Inc','East Destin Apt. 788','2012-07-26','1977-03-18','877-239-8172','vrempel@yahoo.com','2018-06-28 17:13:30'),(45,0,'Hackett, Schulist and Gerhold','South Nedra Apt. 085','1972-10-10','1994-01-14','877.628.8098','giovanni60@gaylord.com','2018-06-28 17:13:30'),(46,0,'Marquardt-Labadie','East Korbin Apt. 021','1981-07-01','2017-12-09','866.675.3748','zmarquardt@gmail.com','2018-06-28 17:13:30'),(47,0,'Emard and Sons','Kohlerberg Apt. 246','1970-04-14','1999-05-24','(855) 963-1321','presley46@gmail.com','2018-06-28 17:13:30'),(48,0,'Schmitt, McLaughlin and Macejkovic','South Abbigail Suite 532','1989-08-11','2003-03-08','1-800-323-7890','ypagac@kozey.info','2018-06-28 17:13:30'),(49,0,'Bayer, Heidenreich and Lakin','Hesselshire Suite 428','1994-10-06','2008-01-08','877-513-4206','brennan74@kirlin.biz','2018-06-28 17:13:31'),(50,0,'Nienow-Effertz','Lake Tatum Apt. 493','2000-04-14','1974-03-18','855-625-5378','pebert@gmail.com','2018-06-28 17:13:31'),(51,0,'Larson-Sawayn','West Iva Apt. 615','2002-05-04','2007-07-04','877.651.1614','thompson.pattie@ernser.com','2018-06-28 17:13:31'),(52,0,'Russel-Rath','Hermistonstad Apt. 002','1990-04-14','1995-11-01','855.543.9291','stoy@hotmail.com','2018-06-28 17:13:31'),(53,0,'Kassulke Group','South Uriel Apt. 643','2007-07-25','2002-11-22','1-866-815-9325','ihintz@keeling.info','2018-06-28 17:13:31'),(54,0,'Bernier, Nader and Stiedemann','Kieraland Apt. 955','2004-03-07','1992-08-05','800.309.3119','franecki.kellen@kunde.com','2018-06-28 17:13:31'),(55,0,'Nienow, Kunze and Carroll','South Courtneyborough Suite 162','2002-09-29','1972-07-24','(877) 897-2413','darryl66@muller.com','2018-06-28 17:13:31');
/*!40000 ALTER TABLE `characteristics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `categories_id` int(11) DEFAULT NULL,
  `characteristics_id` int(11) DEFAULT NULL,
  `sales_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'corporis','-.png','100kg',6.00,'2018-06-27 10:36:13','2018-06-27 10:36:13',9,1,NULL,0),(2,'alias','-.png','137',100.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',7,1,NULL,0),(3,'veniam','-.png','78.839',22.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',1,1,NULL,0),(4,'ab','-.png','2.7',29.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',9,1,NULL,0),(5,'molestias','-.png','265.52',47.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',10,1,NULL,0),(6,'vitae','-.png','492.752567862',86.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',3,2,NULL,0),(7,'quas','-.png','177.0945',70.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',2,2,NULL,0),(8,'ut','-.png','113.294',77.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',10,2,NULL,0),(9,'enim','-.png','188',57.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',9,2,NULL,0),(10,'fugiat','-.png','253.3',96.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',5,2,NULL,0),(11,'ratione','-.png','24.36640208',63.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',2,3,NULL,0),(12,'reprehenderit','-.png','229.8',58.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',5,3,NULL,0),(13,'et','-.png','459.2315',48.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',9,3,NULL,0),(14,'voluptate','-.png','10.568',79.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',6,3,NULL,0),(15,'saepe','-.png','176.505722',78.00,'2018-06-27 10:36:14','2018-06-27 10:36:14',2,3,NULL,0),(16,'maxime','-.png','232',98.00,'2018-06-27 10:36:14','2018-06-27 11:11:42',5,4,NULL,0),(17,'aut','-.png','100.36',69.00,'2018-06-27 10:36:14','2018-06-27 11:11:42',8,4,NULL,0),(18,'eum','-.png','408.485',19.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',8,4,NULL,0),(19,'repudiandae','-.png','197.68158',80.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',4,4,NULL,0),(20,'excepturi','-.png','211.36422535',34.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',7,4,NULL,0),(21,'eius','-.png','358.4577',70.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',10,5,NULL,0),(22,'fugiat','-.png','341.33521251',31.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',5,5,NULL,0),(23,'illum','-.png','11.61471173',77.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',5,5,NULL,0),(24,'aut','-.png','438',51.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',4,5,NULL,0),(25,'adipisci','-.png','255.672856353',3.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',7,5,NULL,0),(26,'est','-.png','140.67754389',47.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',10,6,NULL,0),(27,'et','-.png','435.459755331',31.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',9,6,NULL,0),(28,'sit','-.png','382.72',64.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',9,6,NULL,0),(29,'recusandae','-.png','73.198',1.00,'2018-06-27 10:36:14','2018-06-27 11:11:43',10,6,NULL,0),(30,'blanditiis','-.png','3.3191',12.00,'2018-06-27 10:36:15','2018-06-27 11:11:43',2,6,NULL,0),(31,'voluptatem','-.png','193.693985554',100.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',3,7,NULL,0),(32,'illum','-.png','391.221813341',31.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',8,7,NULL,0),(33,'sint','-.png','94.98',7.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',1,7,NULL,0),(34,'minima','-.png','98.92550581',31.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',5,7,NULL,0),(35,'voluptas','-.png','198',27.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',9,7,NULL,0),(36,'magni','-.png','427.2514884',16.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',2,8,NULL,0),(37,'eveniet','-.png','133.4083272',10.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',8,8,NULL,0),(38,'sapiente','-.png','371',41.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',9,8,NULL,0),(39,'ipsum','-.png','12.7925696',15.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',1,8,NULL,0),(40,'nemo','-.png','474.131408',3.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',2,8,NULL,0),(41,'modi','-.png','179.62',43.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',9,9,NULL,0),(42,'deserunt','-.png','312.263361',48.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',4,9,NULL,0),(43,'dignissimos','-.png','459.232',23.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',4,9,NULL,0),(44,'sint','-.png','34.288298122',16.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',3,9,NULL,0),(45,'voluptas','-.png','127.628467',87.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',3,9,NULL,0),(46,'doloribus','-.png','195.357042921',43.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',10,10,NULL,0),(47,'est','-.png','8.666',63.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',4,10,NULL,0),(48,'quasi','-.png','187.9800801',1.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',1,10,NULL,0),(49,'aperiam','-.png','430.87212',29.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',8,10,NULL,0),(50,'numquam','-.png','56.6953',48.00,'2018-06-27 14:18:49','2018-06-27 14:18:49',3,10,NULL,0),(51,'et','-.png','279',13.00,'2018-06-28 09:08:09','2018-06-28 09:08:09',1,3,NULL,0),(52,'quis','-.png','299.89',87.00,'2018-06-28 09:08:09','2018-06-28 09:08:09',2,7,NULL,0),(53,'voluptate','-.png','404.010512',57.00,'2018-06-28 09:08:09','2018-06-28 09:08:09',4,2,NULL,0),(54,'ut','-.png','492.444001',62.00,'2018-06-28 09:08:09','2018-06-28 09:08:09',5,5,NULL,0),(55,'eum','-.png','25.56018',62.00,'2018-06-28 09:08:09','2018-06-28 09:08:09',5,5,NULL,0);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_06_12_205216_laratrust_setup_tables',2),(4,'2018_06_24_152142_create_user_verifications_table',3),(5,'2018_06_26_164239_create_goods_table',4),(6,'2018_06_26_165137_create_categories_table',5),(7,'2018_06_26_165441_create_characteristics_table',6),(8,'2018_06_26_170617_create_good_categories_table',7),(10,'2018_06_26_171226_create_good_characteristics_table',8),(11,'2018_06_26_171808_create_good_char_table',8),(12,'2018_06_27_141244_create_subcategories_table',9),(13,'2018_06_28_092831_create_sales_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(1,2),(2,2),(3,2),(4,2),(9,2),(10,2),(9,3),(10,3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
INSERT INTO `permission_user` VALUES (9,4,'App\\User'),(10,4,'App\\User'),(11,4,'App\\User');
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-users','Create Users','Create Users','2018-06-12 18:00:14','2018-06-12 18:00:14'),(2,'read-users','Read Users','Read Users','2018-06-12 18:00:14','2018-06-12 18:00:14'),(3,'update-users','Update Users','Update Users','2018-06-12 18:00:14','2018-06-12 18:00:14'),(4,'delete-users','Delete Users','Delete Users','2018-06-12 18:00:15','2018-06-12 18:00:15'),(5,'create-acl','Create Acl','Create Acl','2018-06-12 18:00:15','2018-06-12 18:00:15'),(6,'read-acl','Read Acl','Read Acl','2018-06-12 18:00:15','2018-06-12 18:00:15'),(7,'update-acl','Update Acl','Update Acl','2018-06-12 18:00:15','2018-06-12 18:00:15'),(8,'delete-acl','Delete Acl','Delete Acl','2018-06-12 18:00:15','2018-06-12 18:00:15'),(9,'read-profile','Read Profile','Read Profile','2018-06-12 18:00:15','2018-06-12 18:00:15'),(10,'update-profile','Update Profile','Update Profile','2018-06-12 18:00:15','2018-06-12 18:00:15'),(11,'create-profile','Create Profile','Create Profile','2018-06-12 18:00:15','2018-06-12 18:00:15');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,'App\\User'),(2,2,'App\\User'),(3,3,'App\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','Administrator','Administrator','2018-06-12 18:00:14','2018-06-12 18:00:14'),(2,'admin_support','Admin Support','Admin Support','2018-06-12 18:00:15','2018-06-12 18:00:15'),(3,'user','User','User','2018-06-12 18:00:15','2018-06-12 18:00:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sale',
  `percentages` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_verifications`
--

DROP TABLE IF EXISTS `user_verifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_verifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verifications`
--

LOCK TABLES `user_verifications` WRITE;
/*!40000 ALTER TABLE `user_verifications` DISABLE KEYS */;
INSERT INTO `user_verifications` VALUES (16,0,'DFiVIWjuPXMk5HZeuiUVLHdwSO376F',NULL,NULL);
/*!40000 ALTER TABLE `user_verifications` ENABLE KEYS */;
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
  `locale` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Support','admin_support@app.com','$2y$10$OjMmUwV3XPxKYzZ9OjnVF.EqdJotZiy1Wq6su6c0i2gzBUhPqkuHK',NULL,'2018-06-12 18:00:15','2018-06-12 18:00:15','en'),(2,'Administrator','administrator@app.com','$2y$10$rkhAynFtvfhJPJny8UY/xOQtFVnhDyhkCYPx0f454Y3pBRJMjWRsK',NULL,'2018-06-12 18:00:15','2018-06-12 18:00:15','en'),(3,'Cru User','cru_user@app.com','$2y$10$j.2EYkqNDCowM6qSbXeJqu6rbjLWoAwvwiQELTvVIsgp9P02z7YnS','IkQwyk8Clc','2018-06-12 18:00:15','2018-06-12 18:00:15','en'),(4,'User','user@app.com','$2y$10$Ulb7NND5Ndu7vxiBOgFF1OlIdlqZXuGiqH1WLjdpR3DXJ3Xp1vAdK',NULL,'2018-06-12 18:00:15','2018-06-12 18:00:15','en'),(5,'Alexey','sinyavskij_00@mail.ru','$2y$10$K7kCisdoF5zyUjE4La1AWOqW2vHGNKCMhWYi/N1noqz1uUmzuCLPu',NULL,'2018-07-01 17:25:44','2018-07-02 21:11:05','uk');
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

-- Dump completed on 2018-07-04 14:03:12
