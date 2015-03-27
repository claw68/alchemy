/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.32 : Database - alchemy
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alchemy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alchemy`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ci_sessions` */

/*Table structure for table `demo` */

DROP TABLE IF EXISTS `demo`;

CREATE TABLE `demo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `demo` */

/*Table structure for table `effects` */

DROP TABLE IF EXISTS `effects`;

CREATE TABLE `effects` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `effects` */

insert  into `effects`(`id`,`name`,`price`,`create_date`) values (1,'Cure Disease',24,'2015-03-17 18:52:55'),(2,'Damage Health',6,'2015-03-17 18:52:55'),(3,'Damage Magicka',59,'2015-03-17 18:52:55'),(4,'Damage Magicka Regen',304,'2015-03-17 18:52:55'),(5,'Damage Stamina',48,'2015-03-17 18:52:55'),(6,'Damage Stamina Regen',182,'2015-03-17 18:52:55'),(7,'Fear',142,'2015-03-17 18:52:55'),(8,'Fortify Alteration',53,'2015-03-17 18:52:55'),(9,'Fortify Barter',56,'2015-03-17 18:52:55'),(10,'Fortify Block',195,'2015-03-17 18:52:55'),(11,'Fortify Carry Weight',238,'2015-03-17 18:52:55'),(12,'Fortify Conjuration',86,'2015-03-17 18:52:55'),(13,'Fortify Destruction',173,'2015-03-17 18:52:55'),(14,'Fortify Enchanting',17,'2015-03-17 18:52:55'),(15,'Fortify Health',94,'2015-03-17 18:52:55'),(16,'Fortify Heavy Armor',60,'2015-03-17 18:52:55'),(17,'Fortify Illusion',107,'2015-03-17 18:52:55'),(18,'Fortify Light Armor',60,'2015-03-17 18:52:55'),(19,'Fortify Lockpicking',28,'2015-03-17 18:52:55'),(20,'Fortify Magicka',80,'2015-03-17 18:52:55'),(21,'Fortify Marksman',134,'2015-03-17 18:52:55'),(22,'Fortify One-Handed',134,'2015-03-17 18:52:55'),(23,'Fortify Pickpocket',134,'2015-03-17 18:52:55'),(24,'Fortify Restoration',134,'2015-03-17 18:52:55'),(25,'Fortify Smithing',94,'2015-03-17 18:52:55'),(26,'Fortify Sneak',134,'2015-03-17 18:52:55'),(27,'Fortify Stamina',80,'2015-03-17 18:52:55'),(28,'Fortify Two-Handed',134,'2015-03-17 18:52:55'),(29,'Frenzy',127,'2015-03-17 18:52:55'),(30,'Invisibility',357,'2015-03-17 18:52:55'),(31,'Lingering Damage Health',102,'2015-03-17 18:52:55'),(32,'Lingering Damage Magicka',85,'2015-03-17 18:52:55'),(33,'Lingering Damage Stamina',15,'2015-03-17 18:52:55'),(34,'Paralysis',337,'2015-03-17 18:52:55'),(35,'Ravage Health',35,'2015-03-17 18:52:55'),(36,'Ravage Magicka',16,'2015-03-17 18:52:55'),(37,'Ravage Stamina',57,'2015-03-17 18:52:55'),(38,'Regenerate Health',203,'2015-03-17 18:52:55'),(39,'Regenerate Magicka',203,'2015-03-17 18:52:55'),(40,'Regenerate Stamina',203,'2015-03-17 18:52:55'),(41,'Resist Fire',96,'2015-03-17 18:52:55'),(42,'Resist Frost',96,'2015-03-17 18:52:55'),(43,'Resist Magic',61,'2015-03-17 18:52:55'),(44,'Resist Poison',134,'2015-03-17 18:52:55'),(45,'Resist Shock',96,'2015-03-17 18:52:55'),(46,'Restore Health',25,'2015-03-17 18:52:55'),(47,'Restore Magicka',29,'2015-03-17 18:52:55'),(48,'Restore Stamina',29,'2015-03-17 18:52:55'),(49,'Slow',284,'2015-03-17 18:52:55'),(50,'Waterbreathing',115,'2015-03-17 18:52:55'),(51,'Weakness to Fire',54,'2015-03-17 18:52:55'),(52,'Weakness to Frost',45,'2015-03-17 18:52:55'),(53,'Weakness to Magic',56,'2015-03-17 18:52:55'),(54,'Weakness to Poison',56,'2015-03-17 18:52:55'),(55,'Weakness to Shock',63,'2015-03-17 18:52:55');

/*Table structure for table `effects_map` */

DROP TABLE IF EXISTS `effects_map`;

CREATE TABLE `effects_map` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ingredient` int(255) NOT NULL,
  `effect` int(255) NOT NULL,
  `position` int(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `effects_map` */

insert  into `effects_map`(`id`,`ingredient`,`effect`,`position`,`create_date`) values (1,1,52,1,'2015-03-18 19:50:58'),(2,1,26,2,'2015-03-18 19:50:58'),(3,1,54,3,'2015-03-18 19:50:58'),(4,1,24,4,'2015-03-18 19:50:58'),(5,2,5,1,'2015-03-18 19:50:58'),(6,2,12,2,'2015-03-18 19:50:58'),(7,2,4,3,'2015-03-18 19:50:58'),(8,2,14,4,'2015-03-18 19:50:58'),(9,3,5,1,'2015-03-18 19:50:58'),(10,3,30,2,'2015-03-18 19:50:58'),(11,3,41,3,'2015-03-18 19:50:58'),(12,3,13,4,'2015-03-18 19:50:58'),(13,4,46,1,'2015-03-18 19:50:58'),(14,4,18,2,'2015-03-18 19:50:58'),(15,4,45,3,'2015-03-18 19:50:58'),(16,4,52,4,'2015-03-18 19:50:58'),(17,5,41,1,'2015-03-18 19:50:58'),(18,5,55,2,'2015-03-18 19:50:58'),(19,5,19,3,'2015-03-18 19:50:58'),(20,5,26,4,'2015-03-18 19:50:58'),(21,6,48,1,'2015-03-18 19:50:58'),(22,6,15,2,'2015-03-18 19:50:58'),(23,6,22,3,'2015-03-18 19:50:58'),(24,6,4,4,'2015-03-18 19:50:58'),(25,7,48,1,'2015-03-18 19:50:58'),(26,7,37,2,'2015-03-18 19:50:58'),(27,7,40,3,'2015-03-18 19:50:58'),(28,7,55,4,'2015-03-18 19:50:58'),(29,8,44,1,'2015-03-18 19:50:58'),(30,8,18,2,'2015-03-18 19:50:58'),(31,8,26,3,'2015-03-18 19:50:58'),(32,8,13,4,'2015-03-18 19:50:58'),(33,9,5,1,'2015-03-18 19:50:58'),(34,9,41,2,'2015-03-18 19:50:58'),(35,9,12,3,'2015-03-18 19:50:58'),(36,9,37,4,'2015-03-18 19:50:58'),(37,10,51,1,'2015-03-18 19:50:58'),(38,10,10,2,'2015-03-18 19:50:58'),(39,10,54,3,'2015-03-18 19:50:58'),(40,10,43,4,'2015-03-18 19:50:58'),(41,11,5,1,'2015-03-18 19:50:58'),(42,11,29,2,'2015-03-18 19:50:58'),(43,11,46,3,'2015-03-18 19:50:58'),(44,11,25,4,'2015-03-18 19:50:58'),(45,12,5,1,'2015-03-18 19:50:58'),(46,12,12,2,'2015-03-18 19:50:58'),(47,12,4,3,'2015-03-18 19:50:58'),(48,12,14,4,'2015-03-18 19:50:58'),(49,13,45,1,'2015-03-18 19:50:58'),(50,13,23,2,'2015-03-18 19:50:58'),(51,13,46,3,'2015-03-18 19:50:58'),(52,13,7,4,'2015-03-18 19:50:58'),(53,14,46,1,'2015-03-18 19:50:58'),(54,14,12,2,'2015-03-18 19:50:58'),(55,14,15,3,'2015-03-18 19:50:58'),(56,14,4,4,'2015-03-18 19:50:58'),(57,15,27,1,'2015-03-18 19:50:58'),(58,15,15,2,'2015-03-18 19:50:58'),(59,15,10,3,'2015-03-18 19:50:58'),(60,15,29,4,'2015-03-18 19:50:58'),(61,16,5,1,'2015-03-18 19:50:58'),(62,16,41,2,'2015-03-18 19:50:58'),(63,16,12,3,'2015-03-18 19:50:58'),(64,16,37,4,'2015-03-18 19:50:58'),(65,17,47,1,'2015-03-18 19:50:58'),(66,17,10,2,'2015-03-18 19:50:58'),(67,17,34,3,'2015-03-18 19:50:58'),(68,17,20,4,'2015-03-18 19:50:58'),(69,18,51,1,'2015-03-18 19:50:58'),(70,18,8,2,'2015-03-18 19:50:58'),(71,18,4,3,'2015-03-18 19:50:58'),(72,18,49,4,'2015-03-18 19:50:58'),(73,19,46,1,'2015-03-18 19:50:58'),(74,19,9,2,'2015-03-18 19:50:58'),(75,19,33,3,'2015-03-18 19:50:58'),(76,19,3,4,'2015-03-18 19:50:58'),(77,20,5,1,'2015-03-18 19:50:58'),(78,20,22,2,'2015-03-18 19:50:58'),(79,20,21,3,'2015-03-18 19:50:58'),(80,20,34,4,'2015-03-18 19:50:58'),(81,21,48,1,'2015-03-18 19:50:58'),(82,21,1,2,'2015-03-18 19:50:58'),(83,21,44,3,'2015-03-18 19:50:58'),(84,21,46,4,'2015-03-18 19:50:58'),(85,22,54,1,'2015-03-18 19:50:58'),(86,22,27,2,'2015-03-18 19:50:58'),(87,22,3,3,'2015-03-18 19:50:58'),(88,22,30,4,'2015-03-18 19:50:58'),(89,23,5,1,'2015-03-18 19:50:58'),(90,23,12,2,'2015-03-18 19:50:58'),(91,23,4,3,'2015-03-18 19:50:58'),(92,23,14,4,'2015-03-18 19:50:58'),(93,24,43,1,'2015-03-18 19:50:58'),(94,24,4,2,'2015-03-18 19:50:58'),(95,24,50,3,'2015-03-18 19:50:58'),(96,24,33,4,'2015-03-18 19:50:58'),(97,25,47,1,'2015-03-18 19:50:58'),(98,25,6,2,'2015-03-18 19:50:58'),(99,25,11,3,'2015-03-18 19:50:58'),(100,25,53,4,'2015-03-18 19:50:58'),(101,26,2,1,'2015-03-18 19:50:58'),(102,26,5,2,'2015-03-18 19:50:58'),(103,26,30,3,'2015-03-18 19:50:58'),(104,26,43,4,'2015-03-18 19:50:58'),(105,27,5,1,'2015-03-18 19:50:58'),(106,27,24,2,'2015-03-18 19:50:58'),(107,27,7,3,'2015-03-18 19:50:58'),(108,27,35,4,'2015-03-18 19:50:58'),(109,28,46,1,'2015-03-18 19:50:58'),(110,28,6,2,'2015-03-18 19:50:58'),(111,28,3,3,'2015-03-18 19:50:58'),(112,28,7,4,'2015-03-18 19:50:58'),(113,29,2,1,'2015-03-18 19:50:58'),(114,29,37,2,'2015-03-18 19:50:58'),(115,29,49,3,'2015-03-18 19:50:58'),(116,29,54,4,'2015-03-18 19:50:58'),(117,30,41,1,'2015-03-18 19:50:58'),(118,30,9,2,'2015-03-18 19:50:58'),(119,30,17,3,'2015-03-18 19:50:58'),(120,30,28,4,'2015-03-18 19:50:58'),(121,31,53,1,'2015-03-18 19:50:58'),(122,31,17,2,'2015-03-18 19:50:58'),(123,31,39,3,'2015-03-18 19:50:58'),(124,31,47,4,'2015-03-18 19:50:58'),(125,32,47,1,'2015-03-18 19:50:58'),(126,32,13,2,'2015-03-18 19:50:58'),(127,32,20,3,'2015-03-18 19:50:58'),(128,32,2,4,'2015-03-18 19:50:58'),(129,33,47,1,'2015-03-18 19:50:58'),(130,33,21,2,'2015-03-18 19:50:58'),(131,33,52,3,'2015-03-18 19:50:58'),(132,33,41,4,'2015-03-18 19:50:58'),(133,34,2,1,'2015-03-18 19:50:58'),(134,34,20,2,'2015-03-18 19:50:58'),(135,34,38,3,'2015-03-18 19:50:58'),(136,34,28,4,'2015-03-18 19:50:58'),(137,35,48,1,'2015-03-18 19:50:58'),(138,35,35,2,'2015-03-18 19:50:58'),(139,35,3,3,'2015-03-18 19:50:58'),(140,35,46,4,'2015-03-18 19:50:58'),(141,36,2,1,'2015-03-18 19:50:58'),(142,36,29,2,'2015-03-18 19:50:58'),(143,36,44,3,'2015-03-18 19:50:58'),(144,36,19,4,'2015-03-18 19:50:58'),(145,37,46,1,'2015-03-18 19:50:58'),(146,37,18,2,'2015-03-18 19:50:58'),(147,37,1,3,'2015-03-18 19:50:58'),(148,37,43,4,'2015-03-18 19:50:58'),(149,38,52,1,'2015-03-18 19:50:58'),(150,38,41,2,'2015-03-18 19:50:58'),(151,38,47,3,'2015-03-18 19:50:58'),(152,38,39,4,'2015-03-18 19:50:58'),(153,39,41,1,'2015-03-18 19:50:58'),(154,39,28,2,'2015-03-18 19:50:58'),(155,39,29,3,'2015-03-18 19:50:58'),(156,39,40,4,'2015-03-18 19:50:58'),(157,40,42,1,'2015-03-18 19:50:58'),(158,40,26,2,'2015-03-18 19:50:58'),(159,40,36,3,'2015-03-18 19:50:58'),(160,40,6,4,'2015-03-18 19:50:58'),(161,41,51,1,'2015-03-18 19:50:58'),(162,41,42,2,'2015-03-18 19:50:58'),(163,41,47,3,'2015-03-18 19:50:58'),(164,41,12,4,'2015-03-18 19:50:58'),(165,42,44,1,'2015-03-18 19:50:58'),(166,42,27,2,'2015-03-18 19:50:58'),(167,42,39,3,'2015-03-18 19:50:58'),(168,42,38,4,'2015-03-18 19:50:58'),(169,43,55,1,'2015-03-18 19:50:58'),(170,43,35,2,'2015-03-18 19:50:58'),(171,43,54,3,'2015-03-18 19:50:58'),(172,43,47,4,'2015-03-18 19:50:58'),(173,44,5,1,'2015-03-18 19:50:58'),(174,44,15,2,'2015-03-18 19:50:58'),(175,44,11,3,'2015-03-18 19:50:58'),(176,44,6,4,'2015-03-18 19:50:58'),(177,45,43,1,'2015-03-18 19:50:58'),(178,45,7,2,'2015-03-18 19:50:58'),(179,45,38,3,'2015-03-18 19:50:58'),(180,45,34,4,'2015-03-18 19:50:58'),(181,46,3,1,'2015-03-18 19:50:58'),(182,46,4,2,'2015-03-18 19:50:58'),(183,46,13,3,'2015-03-18 19:50:58'),(184,46,45,4,'2015-03-18 19:50:58'),(185,47,45,1,'2015-03-18 19:50:58'),(186,47,13,2,'2015-03-18 19:50:58'),(187,47,25,3,'2015-03-18 19:50:58'),(188,47,15,4,'2015-03-18 19:50:58'),(189,48,44,1,'2015-03-18 19:50:58'),(190,48,36,2,'2015-03-18 19:50:58'),(191,48,8,3,'2015-03-18 19:50:58'),(192,48,47,4,'2015-03-18 19:50:58'),(193,49,43,1,'2015-03-18 19:50:58'),(194,49,32,2,'2015-03-18 19:50:58'),(195,49,14,3,'2015-03-18 19:50:58'),(196,49,9,4,'2015-03-18 19:50:58'),(197,50,3,1,'2015-03-18 19:50:58'),(198,50,12,2,'2015-03-18 19:50:58'),(199,50,29,3,'2015-03-18 19:50:58'),(200,50,55,4,'2015-03-18 19:50:58'),(201,51,3,1,'2015-03-18 19:50:58'),(202,51,15,2,'2015-03-18 19:50:58'),(203,51,4,3,'2015-03-18 19:50:58'),(204,51,22,4,'2015-03-18 19:50:58'),(205,52,48,1,'2015-03-18 19:50:58'),(206,52,42,2,'2015-03-18 19:50:58'),(207,52,11,3,'2015-03-18 19:50:58'),(208,52,45,4,'2015-03-18 19:50:58'),(209,53,1,1,'2015-03-18 19:50:58'),(210,53,18,2,'2015-03-18 19:50:58'),(211,53,22,3,'2015-03-18 19:50:58'),(212,53,26,4,'2015-03-18 19:50:58'),(213,54,43,1,'2015-03-18 19:50:58'),(214,54,4,2,'2015-03-18 19:50:58'),(215,54,50,3,'2015-03-18 19:50:58'),(216,54,33,4,'2015-03-18 19:50:58'),(217,55,48,1,'2015-03-18 19:50:58'),(218,55,20,2,'2015-03-18 19:50:58'),(219,55,6,3,'2015-03-18 19:50:58'),(220,55,50,4,'2015-03-18 19:50:58'),(221,56,48,1,'2015-03-18 19:50:58'),(222,56,10,2,'2015-03-18 19:50:58'),(223,56,18,3,'2015-03-18 19:50:58'),(224,56,37,4,'2015-03-18 19:50:58'),(225,57,2,1,'2015-03-18 19:50:58'),(226,57,34,2,'2015-03-18 19:50:58'),(227,57,47,3,'2015-03-18 19:50:58'),(228,57,26,4,'2015-03-18 19:50:58'),(229,58,2,1,'2015-03-18 19:50:58'),(230,58,3,2,'2015-03-18 19:50:58'),(231,58,4,3,'2015-03-18 19:50:58'),(232,58,29,4,'2015-03-18 19:50:58'),(233,59,52,1,'2015-03-18 19:50:58'),(234,59,16,2,'2015-03-18 19:50:58'),(235,59,30,3,'2015-03-18 19:50:58'),(236,59,51,4,'2015-03-18 19:50:58'),(237,60,2,1,'2015-03-18 19:50:58'),(238,60,31,2,'2015-03-18 19:50:58'),(239,60,34,3,'2015-03-18 19:50:58'),(240,60,46,4,'2015-03-18 19:50:58'),(241,61,2,1,'2015-03-18 19:50:58'),(242,61,3,2,'2015-03-18 19:50:58'),(243,61,5,3,'2015-03-18 19:50:58'),(244,61,4,4,'2015-03-18 19:50:58'),(245,62,53,1,'2015-03-18 19:50:58'),(246,62,20,2,'2015-03-18 19:50:58'),(247,62,39,3,'2015-03-18 19:50:58'),(248,62,35,4,'2015-03-18 19:50:58'),(249,63,51,1,'2015-03-18 19:50:58'),(250,63,21,2,'2015-03-18 19:50:58'),(251,63,38,3,'2015-03-18 19:50:58'),(252,63,6,4,'2015-03-18 19:50:58'),(253,64,48,1,'2015-03-18 19:50:58'),(254,64,27,2,'2015-03-18 19:50:58'),(255,64,49,3,'2015-03-18 19:50:58'),(256,64,6,4,'2015-03-18 19:50:58'),(257,65,43,1,'2015-03-18 19:50:58'),(258,65,27,2,'2015-03-18 19:50:58'),(259,65,36,3,'2015-03-18 19:50:58'),(260,65,12,4,'2015-03-18 19:50:58'),(261,66,3,1,'2015-03-18 19:50:58'),(262,66,18,2,'2015-03-18 19:50:58'),(263,66,38,3,'2015-03-18 19:50:58'),(264,66,30,4,'2015-03-18 19:50:58'),(265,67,51,1,'2015-03-18 19:50:58'),(266,67,42,2,'2015-03-18 19:50:58'),(267,67,47,3,'2015-03-18 19:50:58'),(268,67,39,4,'2015-03-18 19:50:58'),(269,68,47,1,'2015-03-18 19:50:58'),(270,68,31,2,'2015-03-18 19:50:58'),(271,68,40,3,'2015-03-18 19:50:58'),(272,68,17,4,'2015-03-18 19:50:58'),(273,69,48,1,'2015-03-18 19:50:58'),(274,69,1,2,'2015-03-18 19:50:58'),(275,69,44,3,'2015-03-18 19:50:58'),(276,69,41,4,'2015-03-18 19:50:58'),(277,70,3,1,'2015-03-18 19:50:58'),(278,70,19,2,'2015-03-18 19:50:58'),(279,70,7,3,'2015-03-18 19:50:58'),(280,70,38,4,'2015-03-18 19:50:58'),(281,71,34,1,'2015-03-18 19:50:58'),(282,71,11,2,'2015-03-18 19:50:58'),(283,71,48,3,'2015-03-18 19:50:58'),(284,71,7,4,'2015-03-18 19:50:58'),(285,72,2,1,'2015-03-18 19:50:58'),(286,72,4,2,'2015-03-18 19:50:58'),(287,72,33,3,'2015-03-18 19:50:58'),(288,72,13,4,'2015-03-18 19:50:58'),(289,73,2,1,'2015-03-18 19:50:58'),(290,73,5,2,'2015-03-18 19:50:58'),(291,73,30,3,'2015-03-18 19:50:58'),(292,73,43,4,'2015-03-18 19:50:58'),(293,74,3,1,'2015-03-18 19:50:58'),(294,74,50,2,'2015-03-18 19:50:58'),(295,74,38,3,'2015-03-18 19:50:58'),(296,74,23,4,'2015-03-18 19:50:58'),(297,75,48,1,'2015-03-18 19:50:58'),(298,75,36,2,'2015-03-18 19:50:58'),(299,75,23,3,'2015-03-18 19:50:58'),(300,75,31,4,'2015-03-18 19:50:58'),(301,76,48,1,'2015-03-18 19:50:58'),(302,76,10,2,'2015-03-18 19:50:58'),(303,76,47,3,'2015-03-18 19:50:58'),(304,76,45,4,'2015-03-18 19:50:58'),(305,77,48,1,'2015-03-18 19:50:58'),(306,77,19,2,'2015-03-18 19:50:58'),(307,77,54,3,'2015-03-18 19:50:58'),(308,77,45,4,'2015-03-18 19:50:58'),(309,78,2,1,'2015-03-18 19:50:58'),(310,78,49,2,'2015-03-18 19:50:58'),(311,78,11,3,'2015-03-18 19:50:58'),(312,78,7,4,'2015-03-18 19:50:58'),(313,79,48,1,'2015-03-18 19:50:58'),(314,79,26,2,'2015-03-18 19:50:58'),(315,79,51,3,'2015-03-18 19:50:58'),(316,79,7,4,'2015-03-18 19:50:58'),(317,80,48,1,'2015-03-18 19:50:58'),(318,80,26,2,'2015-03-18 19:50:58'),(319,80,32,3,'2015-03-18 19:50:58'),(320,80,42,4,'2015-03-18 19:50:58'),(321,81,47,1,'2015-03-18 19:50:58'),(322,81,36,2,'2015-03-18 19:50:58'),(323,81,20,3,'2015-03-18 19:50:58'),(324,81,2,4,'2015-03-18 19:50:58'),(325,82,2,1,'2015-03-18 19:50:58'),(326,82,8,2,'2015-03-18 19:50:58'),(327,82,49,3,'2015-03-18 19:50:58'),(328,82,11,4,'2015-03-18 19:50:58'),(329,83,46,1,'2015-03-18 19:50:58'),(330,83,22,2,'2015-03-18 19:50:58'),(331,83,5,3,'2015-03-18 19:50:58'),(332,83,53,4,'2015-03-18 19:50:58'),(333,84,48,1,'2015-03-18 19:50:58'),(334,84,16,2,'2015-03-18 19:50:58'),(335,84,25,3,'2015-03-18 19:50:58'),(336,84,54,4,'2015-03-18 19:50:58'),(337,85,48,1,'2015-03-18 19:50:58'),(338,85,50,2,'2015-03-18 19:50:58'),(339,85,20,3,'2015-03-18 19:50:58'),(340,85,39,4,'2015-03-18 19:50:58'),(341,86,53,1,'2015-03-18 19:50:58'),(342,86,24,2,'2015-03-18 19:50:58'),(343,86,49,3,'2015-03-18 19:50:58'),(344,86,39,4,'2015-03-18 19:50:58'),(345,87,53,1,'2015-03-18 19:50:58'),(346,87,17,2,'2015-03-18 19:50:58'),(347,87,40,3,'2015-03-18 19:50:58'),(348,87,11,4,'2015-03-18 19:50:58'),(349,88,35,1,'2015-03-18 19:50:58'),(350,88,37,2,'2015-03-18 19:50:58'),(351,88,36,3,'2015-03-18 19:50:58'),(352,88,31,4,'2015-03-18 19:50:58'),(353,89,48,1,'2015-03-18 19:50:58'),(354,89,6,2,'2015-03-18 19:50:58'),(355,89,35,3,'2015-03-18 19:50:58'),(356,89,42,4,'2015-03-18 19:50:58'),(357,90,6,1,'2015-03-18 19:50:58'),(358,90,35,2,'2015-03-18 19:50:58'),(359,90,2,3,'2015-03-18 19:50:58'),(360,90,18,4,'2015-03-18 19:50:58'),(361,91,44,1,'2015-03-18 19:50:58'),(362,91,23,2,'2015-03-18 19:50:58'),(363,91,31,3,'2015-03-18 19:50:58'),(364,91,27,4,'2015-03-18 19:50:58'),(365,92,42,1,'2015-03-18 19:50:58'),(366,92,31,2,'2015-03-18 19:50:58'),(367,92,16,3,'2015-03-18 19:50:58'),(368,92,10,4,'2015-03-18 19:50:58'),(369,93,54,1,'2015-03-18 19:50:58'),(370,93,24,2,'2015-03-18 19:50:58'),(371,93,33,3,'2015-03-18 19:50:58'),(372,93,2,4,'2015-03-18 19:50:58'),(373,94,48,1,'2015-03-18 19:50:58'),(374,94,22,2,'2015-03-18 19:50:58'),(375,94,24,3,'2015-03-18 19:50:58'),(376,94,42,4,'2015-03-18 19:50:58'),(377,95,41,1,'2015-03-18 19:50:58'),(378,95,14,2,'2015-03-18 19:50:58'),(379,95,42,3,'2015-03-18 19:50:58'),(380,95,45,4,'2015-03-18 19:50:58'),(381,96,37,1,'2015-03-18 19:50:58'),(382,96,41,2,'2015-03-18 19:50:58'),(383,96,14,3,'2015-03-18 19:50:58'),(384,96,36,4,'2015-03-18 19:50:58'),(385,97,5,1,'2015-03-18 19:50:58'),(386,97,4,2,'2015-03-18 19:50:58'),(387,97,19,3,'2015-03-18 19:50:58'),(388,97,21,4,'2015-03-18 19:50:58'),(389,98,4,1,'2015-03-18 19:50:58'),(390,98,14,2,'2015-03-18 19:50:58'),(391,98,25,3,'2015-03-18 19:50:58'),(392,98,8,4,'2015-03-18 19:50:58'),(393,99,45,1,'2015-03-18 19:50:58'),(394,99,32,2,'2015-03-18 19:50:58'),(395,99,34,3,'2015-03-18 19:50:58'),(396,99,46,4,'2015-03-18 19:50:58'),(397,100,53,1,'2015-03-18 19:50:58'),(398,100,17,2,'2015-03-18 19:50:58'),(399,100,39,3,'2015-03-18 19:50:58'),(400,100,47,4,'2015-03-18 19:50:58'),(401,101,42,1,'2015-03-18 19:50:58'),(402,101,37,2,'2015-03-18 19:50:58'),(403,101,44,3,'2015-03-18 19:50:58'),(404,101,16,4,'2015-03-18 19:50:58'),(405,102,48,1,'2015-03-18 19:50:58'),(406,102,32,2,'2015-03-18 19:50:58'),(407,102,53,3,'2015-03-18 19:50:58'),(408,102,27,4,'2015-03-18 19:50:58'),(409,103,55,1,'2015-03-18 19:50:58'),(410,103,11,2,'2015-03-18 19:50:58'),(411,103,3,3,'2015-03-18 19:50:58'),(412,103,49,4,'2015-03-18 19:50:58'),(413,104,44,1,'2015-03-18 19:50:58'),(414,104,28,2,'2015-03-18 19:50:58'),(415,104,29,3,'2015-03-18 19:50:58'),(416,104,2,4,'2015-03-18 19:50:58'),(417,105,43,1,'2015-03-18 19:50:58'),(418,105,20,2,'2015-03-18 19:50:58'),(419,105,10,3,'2015-03-18 19:50:58'),(420,105,9,4,'2015-03-18 19:50:58'),(421,106,30,1,'2015-03-18 19:50:58'),(422,106,47,2,'2015-03-18 19:50:58'),(423,106,38,3,'2015-03-18 19:50:58'),(424,106,1,4,'2015-03-18 19:50:58'),(425,107,55,1,'2015-03-18 19:50:58'),(426,107,43,2,'2015-03-18 19:50:58'),(427,107,2,3,'2015-03-18 19:50:58'),(428,107,20,4,'2015-03-18 19:50:58'),(429,108,46,1,'2015-03-18 19:50:58'),(430,108,15,2,'2015-03-18 19:50:58'),(431,108,6,3,'2015-03-18 19:50:58'),(432,108,32,4,'2015-03-18 19:50:58'),(433,109,52,1,'2015-03-18 19:50:58'),(434,109,16,2,'2015-03-18 19:50:58'),(435,109,47,3,'2015-03-18 19:50:58'),(436,109,36,4,'2015-03-18 19:50:58'),(437,110,48,1,'2015-03-18 19:50:58'),(438,110,13,2,'2015-03-18 19:50:58'),(439,110,11,3,'2015-03-18 19:50:58'),(440,110,43,4,'2015-03-18 19:50:58'),(441,111,44,1,'2015-03-18 19:50:58'),(442,111,24,2,'2015-03-18 19:50:58'),(443,111,15,3,'2015-03-18 19:50:58'),(444,111,6,4,'2015-03-18 19:50:58');

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

/*Table structure for table `ingredients` */

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`name`,`create_date`) values (1,'Abecean Longfin','2015-03-17 18:33:03'),(2,'Ancestor Moth Wing','2015-03-17 18:33:03'),(3,'Ash Creep Cluster','2015-03-17 18:33:03'),(4,'Ash Hopper Jelly','2015-03-17 18:33:03'),(5,'Ashen Grass Pod','2015-03-17 18:33:03'),(6,'Bear Claws','2015-03-17 18:33:03'),(7,'Bee','2015-03-17 18:33:03'),(8,'Beehive Husk','2015-03-17 18:33:03'),(9,'Berit\'s Ashes','2015-03-17 18:33:03'),(10,'Bleeding Crown','2015-03-17 18:33:03'),(11,'Blisterwort','2015-03-17 18:33:03'),(12,'Blue Butterfly Wing','2015-03-17 18:33:03'),(13,'Blue Dartwing','2015-03-17 18:33:03'),(14,'Blue Mountain Flower','2015-03-17 18:33:03'),(15,'Boar Tusk','2015-03-17 18:33:03'),(16,'Bone Meal','2015-03-17 18:33:03'),(17,'Briar Heart','2015-03-17 18:33:03'),(18,'Burnt Spriggan Wood','2015-03-17 18:33:03'),(19,'Butterfly Wing','2015-03-17 18:33:03'),(20,'Canis Root','2015-03-17 18:33:03'),(21,'Charred Skeever Hide','2015-03-17 18:33:03'),(22,'Chaurus Eggs','2015-03-17 18:33:03'),(23,'Chaurus Hunter Antennae','2015-03-17 18:33:03'),(24,'Chicken\'s Egg','2015-03-17 18:33:03'),(25,'Creep Cluster','2015-03-17 18:33:03'),(26,'Crimson Nirnroot','2015-03-17 18:33:03'),(27,'Cyrodilic Spadetail','2015-03-17 18:33:03'),(28,'Daedra Heart','2015-03-17 18:33:03'),(29,'Deathbell','2015-03-17 18:33:03'),(30,'Dragon\'s Tongue','2015-03-17 18:33:03'),(31,'Dwarven Oil','2015-03-17 18:33:03'),(32,'Ectoplasm','2015-03-17 18:33:03'),(33,'Elves Ear','2015-03-17 18:33:03'),(34,'Emperor Parasol Moss','2015-03-17 18:33:03'),(35,'Eye of Sabre Cat','2015-03-17 18:33:03'),(36,'Falmer Ear','2015-03-17 18:33:03'),(37,'Felsaad Tern Feathers','2015-03-17 18:33:03'),(38,'Fire Salts','2015-03-17 18:33:03'),(39,'Fly Amanita','2015-03-17 18:33:03'),(40,'Frost Mirriam','2015-03-17 18:33:03'),(41,'Frost Salts','2015-03-17 18:33:03'),(42,'Garlic','2015-03-17 18:33:03'),(43,'Giant Lichen','2015-03-17 18:33:03'),(44,'Giant\'s Toe','2015-03-17 18:33:03'),(45,'Gleamblossom','2015-03-17 18:33:03'),(46,'Glow Dust','2015-03-17 18:33:03'),(47,'Glowing Mushroom','2015-03-17 18:33:03'),(48,'Grass Pod','2015-03-17 18:33:03'),(49,'Hagraven Claw','2015-03-17 18:33:03'),(50,'Hagraven Feathers','2015-03-17 18:33:03'),(51,'Hanging Moss','2015-03-17 18:33:03'),(52,'Hawk Beak','2015-03-17 18:33:03'),(53,'Hawk Feathers','2015-03-17 18:33:03'),(54,'Hawk\'s Egg','2015-03-17 18:33:03'),(55,'Histcarp','2015-03-17 18:33:03'),(56,'Honeycomb','2015-03-17 18:33:03'),(57,'Human Flesh','2015-03-17 18:33:03'),(58,'Human Heart','2015-03-17 18:33:03'),(59,'Ice Wraith Teeth','2015-03-17 18:33:03'),(60,'Imp Stool','2015-03-17 18:33:03'),(61,'Jarrin Root','2015-03-17 18:33:03'),(62,'Jazbay Grapes','2015-03-17 18:33:03'),(63,'Juniper Berries','2015-03-17 18:33:03'),(64,'Large Antlers','2015-03-17 18:33:03'),(65,'Lavender','2015-03-17 18:33:03'),(66,'Luna Moth Wing','2015-03-17 18:33:03'),(67,'Moon Sugar','2015-03-17 18:33:03'),(68,'Mora Tapinella','2015-03-17 18:33:03'),(69,'Mudcrab Chitin','2015-03-17 18:33:03'),(70,'Namira\'s Rot','2015-03-17 18:33:03'),(71,'Netch Jelly','2015-03-17 18:33:03'),(72,'Nightshade','2015-03-17 18:33:03'),(73,'Nirnroot','2015-03-17 18:33:03'),(74,'Nordic Barnacle','2015-03-17 18:33:03'),(75,'Orange Dartwing','2015-03-17 18:33:03'),(76,'Pearl','2015-03-17 18:33:03'),(77,'Pine Thrush Egg','2015-03-17 18:33:03'),(78,'Poison Bloom','2015-03-17 18:33:03'),(79,'Powdered Mammoth Tusk','2015-03-17 18:33:03'),(80,'Purple Mountain Flower','2015-03-17 18:33:03'),(81,'Red Mountain Flower','2015-03-17 18:33:03'),(82,'River Betty','2015-03-17 18:33:03'),(83,'Rock Warbler Egg','2015-03-17 18:33:03'),(84,'Sabre Cat Tooth','2015-03-17 18:33:03'),(85,'Salmon Roe','2015-03-17 18:33:03'),(86,'Salt Pile','2015-03-17 18:33:03'),(87,'Scaly Pholiota','2015-03-17 18:33:03'),(88,'Scathecraw','2015-03-17 18:33:03'),(89,'Silverside Perch','2015-03-17 18:33:03'),(90,'Skeever Tail','2015-03-17 18:33:03'),(91,'Slaughterfish Egg','2015-03-17 18:33:03'),(92,'Slaughterfish Scales','2015-03-17 18:33:03'),(93,'Small Antlers','2015-03-17 18:33:03'),(94,'Small Pearl','2015-03-17 18:33:03'),(95,'Snowberries','2015-03-17 18:33:03'),(96,'Spawn Ash','2015-03-17 18:33:03'),(97,'Spider Egg','2015-03-17 18:33:03'),(98,'Spriggan Sap','2015-03-17 18:33:03'),(99,'Swamp Fungal Pod','2015-03-17 18:33:03'),(100,'Taproot','2015-03-17 18:33:03'),(101,'Thistle Branch','2015-03-17 18:33:03'),(102,'Torchbug Thorax','2015-03-17 18:33:03'),(103,'Trama Root','2015-03-17 18:33:03'),(104,'Troll Fat','2015-03-17 18:33:03'),(105,'Tundra Cotton','2015-03-17 18:33:03'),(106,'Vampire Dust','2015-03-17 18:33:03'),(107,'Void Salts','2015-03-17 18:33:03'),(108,'Wheat','2015-03-17 18:33:03'),(109,'White Cap','2015-03-17 18:33:03'),(110,'Wisp Wrappings','2015-03-17 18:33:03'),(111,'Yellow Mountain Flower','2015-03-17 18:33:03');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `login_attempts` */

/*Table structure for table `max_price_index` */

DROP TABLE IF EXISTS `max_price_index`;

CREATE TABLE `max_price_index` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `primary` int(255) DEFAULT NULL,
  `secondary` int(255) DEFAULT NULL,
  `max_price` int(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `max_price_index` */

/*Table structure for table `object` */

DROP TABLE IF EXISTS `object`;

CREATE TABLE `object` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `object` */

insert  into `object`(`id`,`name`,`create_date`) values (1,'ingredients','2015-03-17 17:27:55'),(2,'effects','2015-03-17 17:33:07'),(3,'effects_map','2015-03-17 19:50:58'),(4,'max_price_index','2015-03-27 20:45:28');

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `table_id` int(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `uploads` */

/*Table structure for table `user_autologin` */

DROP TABLE IF EXISTS `user_autologin`;

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user_autologin` */

/*Table structure for table `user_profiles` */

DROP TABLE IF EXISTS `user_profiles`;

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user_profiles` */

insert  into `user_profiles`(`id`,`first_name`,`last_name`,`gender`,`birthdate`,`country`,`state`,`user_id`,`create_date`) values (1,'Franz Andrew','Vallente','M','1991-12-14','Philippines','Makati',1,'2013-11-26 16:10:31');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`activated`,`banned`,`ban_reason`,`new_password_key`,`new_password_requested`,`new_email`,`new_email_key`,`last_ip`,`last_login`,`created`,`modified`) values (1,'admin','$2a$08$3GqdJ0PRvk5axGx/vWRQiuH5NeU9TAUY0qbhBNeWo501XPCFb9BX2','franzandrew68@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'::1','2013-11-26 18:17:47','2013-11-26 16:10:31','2013-11-26 18:17:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
