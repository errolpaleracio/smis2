-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: low
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_add` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'Branch 1','Lagasca St. Laoag City'),(2,'Branch 2',' Shamrock Laoag City'),(3,'Owner',NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (85,'Apple'),(77,'Armak'),(68,'BOSNY'),(58,'Domino'),(69,'DSK'),(55,'E-power'),(57,'Global'),(79,'Gonvince'),(53,'GPC'),(80,'Japan'),(82,'Kawasaki'),(54,'Kawata'),(65,'KMN'),(50,'KSR'),(62,'MKT'),(81,'Mokoto'),(66,'Monster'),(49,'Motolight'),(59,'MTR'),(60,'NGK'),(71,'NHK'),(56,'POSH'),(64,'RG3'),(67,'Rizoma'),(84,'SPD'),(86,'Sun'),(83,'Suzuki'),(61,'Tamago'),(78,'Top 1'),(51,'Total'),(52,'Type R'),(63,'Yamaha'),(48,'Yamakoto'),(76,'YSK');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `critical_lvl` int(11) DEFAULT NULL,
  `archived` bit(1) DEFAULT b'0',
  `branch_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (11,'Hand Grip',150.00,220,30,'\0',1,58),(12,'Air Filter',150.00,250,20,'\0',1,48),(13,'Handle Lever',500.00,70,20,'\0',1,59),(14,'Horn',200.00,79,20,'\0',1,57),(15,'Slider',350.00,115,40,'\0',1,67),(16,'Brake Lamp',100.00,50,10,'\0',1,52),(17,'Volt Meter',200.00,50,15,'\0',1,69),(18,'Led',450.00,85,20,'\0',1,57),(19,'Ignition Switch',150.00,90,20,'\0',1,61),(20,'Spark Plug',150.00,100,20,'\0',1,60),(21,'Flasher',100.00,120,20,'\0',1,56),(22,'Break Shoe',100.00,90,15,'\0',1,54),(23,'Rear Sprocket',250.00,120,20,'\0',1,50),(24,'Side Mirror',100.00,110,30,'\0',1,65),(25,'Flyball',250.00,90,20,'\0',1,57),(26,'CDI',250.00,100,20,'\0',1,55),(27,'Bulb',35.00,130,20,'\0',1,55),(28,'Spray Paint',120.00,90,10,'\0',1,68),(29,'Oil Filter',85.00,110,20,'\0',1,63),(30,'Bering',75.00,100,20,'\0',1,50),(31,'Break Pad',100.00,115,20,'\0',1,53),(32,'Battery',570.00,15,10,'\0',1,49),(33,'Helmet',3000.00,20,5,'\0',1,71),(34,'Shocks',650.00,30,10,'\0',1,64),(35,'Sit Cover',150.00,80,20,'\0',1,66),(36,'Brake Fluid',50.00,110,20,'\0',1,51),(37,'Knee Pad',550.00,60,15,'\0',1,62),(38,'Battery',570.00,60,10,'\0',2,49),(39,'Head Packing',250.00,100,10,'\0',2,79),(40,'Helmet',3000.00,40,10,'\0',2,71),(41,'Electrical Tape',30.00,100,20,'\0',2,77),(42,'Side Gasket',85.00,50,10,'\0',2,85),(43,'Gear Oil',120.00,60,10,'\0',2,78),(44,'Mirror',170.00,70,10,'\0',2,81),(45,'Headlight',300.00,95,15,'\0',2,80),(46,'Tail Light',200.00,50,10,'\0',2,80),(47,'Oil Filter',85.00,80,15,'\0',2,63),(48,'Oil Filter',85.00,60,10,'\0',2,83),(49,'Oil Filter',85.00,65,15,'\0',2,82),(50,'Spark Plug cap',35.00,80,15,'\0',2,55),(51,'Throttle cable',100.00,80,10,'\0',2,76),(52,'Clutch cable',100.00,80,10,'\0',2,76),(53,'Brake cable',100.00,85,10,'\0',2,76),(54,'Speedo cable',100.00,90,15,'\0',2,76),(55,'Fuel tank cap',250.00,80,15,'\0',2,50),(56,'Sprocket',85.00,90,20,'\0',2,86),(57,'Spray Paint',120.00,90,10,'\0',2,68),(58,'Rim',1000.00,80,10,'\0',2,84),(59,'Sit Cover',150.00,80,10,'\0',2,66),(60,'Volt Meter',200.00,50,10,'\0',2,69),(61,'Horn',200.00,70,15,'\0',2,57);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'owner');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` date NOT NULL,
  `unit_price` decimal(13,2) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,12,10,'2019-04-01',150.00,20.00,1),(2,15,5,'2019-04-02',350.00,20.00,1),(3,11,3,'2019-04-02',150.00,0.00,1),(4,11,7,'2019-04-02',150.00,10.00,1);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'pending'),(2,'approved'),(3,'denied');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_account` (
  `user_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `password_hint` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT '1',
  PRIMARY KEY (`user_account_id`),
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `user_account_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_account`
--

LOCK TABLES `user_account` WRITE;
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` VALUES (1,'branch1','5f4dcc3b5aa765d61d8327deb882cf99','Lowie Pogi','Brgy 12 Magat Salamat Street Laoag City','09175340121','p******d',1,1),(4,'owner','5f4dcc3b5aa765d61d8327deb882cf99','Owner','321321','321321','p******d',3,1),(6,'branch2','5f4dcc3b5aa765d61d8327deb882cf99','Pat','Brgy 12 Magat Salamat Street Laoag City','09055383063','p******d',2,1),(10,'jmsaldua','5f4dcc3b5aa765d61d8327deb882cf99','jm saldua','address','12313','p******d',1,1);
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-13 22:31:59
