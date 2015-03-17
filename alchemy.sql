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
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `effects` */

insert  into `effects`(`id`,`name`,`create_date`) values (1,'Cure Disease','2015-03-17 18:52:55'),(2,'Damage Health','2015-03-17 18:52:55'),(3,'Damage Magicka','2015-03-17 18:52:55'),(4,'Damage Magicka Regen','2015-03-17 18:52:55'),(5,'Damage Stamina','2015-03-17 18:52:55'),(6,'Damage Stamina Regen','2015-03-17 18:52:55'),(7,'Fear','2015-03-17 18:52:55'),(8,'Fortify Alteration','2015-03-17 18:52:55'),(9,'Fortify Barter','2015-03-17 18:52:55'),(10,'Fortify Block','2015-03-17 18:52:55'),(11,'Fortify Carry Weight','2015-03-17 18:52:55'),(12,'Fortify Conjuration','2015-03-17 18:52:55'),(13,'Fortify Destruction','2015-03-17 18:52:55'),(14,'Fortify Enchanting','2015-03-17 18:52:55'),(15,'Fortify Health','2015-03-17 18:52:55'),(16,'Fortify Heavy Armor','2015-03-17 18:52:55'),(17,'Fortify Illusion','2015-03-17 18:52:55'),(18,'Fortify Light Armor','2015-03-17 18:52:55'),(19,'Fortify Lockpicking','2015-03-17 18:52:55'),(20,'Fortify Magicka','2015-03-17 18:52:55'),(21,'Fortify Marksman','2015-03-17 18:52:55'),(22,'Fortify One-handed','2015-03-17 18:52:55'),(23,'Fortify Pickpocket','2015-03-17 18:52:55'),(24,'Fortify Restoration','2015-03-17 18:52:55'),(25,'Fortify Smithing','2015-03-17 18:52:55'),(26,'Fortify Sneak','2015-03-17 18:52:55'),(27,'Fortify Stamina','2015-03-17 18:52:55'),(28,'Fortify Two-handed','2015-03-17 18:52:55'),(29,'Frenzy','2015-03-17 18:52:55'),(30,'Invisibility','2015-03-17 18:52:55'),(31,'Lingering Damage Health','2015-03-17 18:52:55'),(32,'Lingering Damage Magicka','2015-03-17 18:52:55'),(33,'Lingering Damage Stamina','2015-03-17 18:52:55'),(34,'Paralysis','2015-03-17 18:52:55'),(35,'Ravage Health','2015-03-17 18:52:55'),(36,'Ravage Magicka','2015-03-17 18:52:55'),(37,'Ravage Stamina','2015-03-17 18:52:55'),(38,'Regenerate Health','2015-03-17 18:52:55'),(39,'Regenerate Magicka','2015-03-17 18:52:55'),(40,'Regenerate Stamina','2015-03-17 18:52:55'),(41,'Resist Fire','2015-03-17 18:52:55'),(42,'Resist Frost','2015-03-17 18:52:55'),(43,'Resist Magic','2015-03-17 18:52:55'),(44,'Resist Poison','2015-03-17 18:52:55'),(45,'Resist Shock','2015-03-17 18:52:55'),(46,'Restore Health','2015-03-17 18:52:55'),(47,'Restore Magicka','2015-03-17 18:52:55'),(48,'Restore Stamina','2015-03-17 18:52:55'),(49,'Slow','2015-03-17 18:52:55'),(50,'Waterbreathing','2015-03-17 18:52:55'),(51,'Weakness to Fire','2015-03-17 18:52:55'),(52,'Weakness to Frost','2015-03-17 18:52:55'),(53,'Weakness to Magic','2015-03-17 18:52:55'),(54,'Weakness to Poison','2015-03-17 18:52:55'),(55,'Weakness to Shock','2015-03-17 18:52:55');

/*Table structure for table `effects_map` */

DROP TABLE IF EXISTS `effects_map`;

CREATE TABLE `effects_map` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `effects_map` */

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

/*Table structure for table `object` */

DROP TABLE IF EXISTS `object`;

CREATE TABLE `object` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `object` */

insert  into `object`(`id`,`name`,`create_date`) values (1,'ingredients','2015-03-17 17:27:55'),(2,'effects','2015-03-17 17:33:07'),(3,'effects_map','2015-03-17 19:50:58');

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
