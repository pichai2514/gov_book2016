# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: db_icommerce
# Generation Time: 2558-04-17 18:41:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','manager','user') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `name`, `username`, `password`, `level`, `email`)
VALUES
	(1,'Admin System','admin2','1234','admin','admin@rorcommerce.com'),
	(5,'Tavon Seesenpila','tavon','1234','manager',''),
	(6,'Pai Pongsathon','pai','1234','user','pai@gmail.com');

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bill_order_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill_order_details`;

CREATE TABLE `bill_order_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bill_order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bill_order_details` WRITE;
/*!40000 ALTER TABLE `bill_order_details` DISABLE KEYS */;

INSERT INTO `bill_order_details` (`id`, `bill_order_id`, `product_id`, `price`, `qty`)
VALUES
	(5,4,17,233,1),
	(6,4,16,1196,1),
	(7,5,15,783,1),
	(8,5,14,1333,1),
	(9,6,16,1196,1),
	(10,6,17,233,1),
	(11,7,16,1196,1),
	(12,7,17,233,1),
	(13,7,15,783,1),
	(14,8,13,863,1),
	(15,8,12,1499,1);

/*!40000 ALTER TABLE `bill_order_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bill_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill_orders`;

CREATE TABLE `bill_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('wait','confirm','pay','send','cancel') DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `send_date` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(1200) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bill_orders` WRITE;
/*!40000 ALTER TABLE `bill_orders` DISABLE KEYS */;

INSERT INTO `bill_orders` (`id`, `member_id`, `ip`, `created_at`, `status`, `pay_date`, `send_date`, `name`, `address`, `tel`)
VALUES
	(4,NULL,'127.0.0.1','2015-03-25 10:01:04','wait',NULL,NULL,'Thonchai','99 / 7 moo 5','0853332009'),
	(5,1,'127.0.0.1','2015-03-26 22:59:28','pay','2015-03-31 19:49:27',NULL,'tavon','80 moo 5','085339887'),
	(6,5,'::1','2015-04-16 15:32:31','wait',NULL,NULL,'','',''),
	(7,5,'::1','2015-04-16 16:20:10','wait',NULL,NULL,'tavon','80 moo 5 banmad thambol seekai','0868776053'),
	(8,5,'::1','2015-04-16 16:35:23','pay','2015-04-17 14:25:17',NULL,'tavon seesenpila','80 moo 5 banmad thambol seekai','0868776053');

/*!40000 ALTER TABLE `bill_orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `code`, `name`, `remark`)
VALUES
	(2,'101','Tablet',NULL),
	(3,'102','Notebook',''),
	(4,'103','Mobile','');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `web_title` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fax` int(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `line_id` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `tax_code` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `payment` text,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`, `web_title`, `tel`, `email`, `fax`, `website`, `facebook`, `line_id`, `address`, `tax_code`, `logo`, `payment`, `about`)
VALUES
	(1,'tavon computer','Tavon Computer','0868776053','tavon-computer@gmail.com',NULL,'www.tavoncomputer.com','','','80 moo 5 ban mad thambol seekai warinchamrab ubonrachatanee thailand 34190','3847563748573','0845029001428987300.png','can pay by paypal to my account','my web about is sale tablet and notebook online');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`id`, `name`, `username`, `password`)
VALUES
	(1,'Tavon','tavon','1234'),
	(2,'Kob','kob','1234'),
	(3,'Seesen','tavon2','1234'),
	(5,'test','test','test'),
	(6,'tst2','test2','tet2'),
	(7,'test3','test3','test');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_configs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_configs`;

CREATE TABLE `product_configs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `backend_items_per_page` int(3) DEFAULT NULL,
  `frontend_items_per_page` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_configs` WRITE;
/*!40000 ALTER TABLE `product_configs` DISABLE KEYS */;

INSERT INTO `product_configs` (`id`, `backend_items_per_page`, `frontend_items_per_page`)
VALUES
	(1,5,8);

/*!40000 ALTER TABLE `product_configs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `name`, `url`)
VALUES
	(2,9,'front','product_image_2015-03-15T08:38:30+07:00.jpg'),
	(3,9,'use','product_image_2015-03-15T08:39:35+07:00.jpg'),
	(4,9,'top','product_image_2015-03-15T08:39:43+07:00.jpg'),
	(5,9,'side','product_image_2015-03-15T08:39:53+07:00.jpg'),
	(6,10,'close','product_image_2015-03-15T09:13:16+07:00.jpg'),
	(7,10,'use','product_image_2015-03-15T09:13:33+07:00.jpg'),
	(8,10,'top','product_image_2015-03-15T09:13:52+07:00.jpg'),
	(11,11,'keyboard','product_image_2015-03-15T16:18:14+07:00.jpg'),
	(12,11,'back','product_image_2015-03-15T16:18:30+07:00.jpg'),
	(13,11,'zoom','product_image_2015-03-15T16:18:45+07:00.jpg'),
	(14,12,'close','product_image_2015-03-15T16:21:49+07:00.jpg'),
	(15,12,'back','product_image_2015-03-15T16:22:04+07:00.jpg'),
	(17,12,'front','product_image_2015-03-15T16:22:56+07:00.jpg'),
	(18,14,'close','product_image_2015-03-15T16:39:03+07:00.jpg'),
	(19,14,'back','product_image_2015-03-15T16:39:17+07:00.jpg'),
	(20,14,'side','product_image_2015-03-15T16:39:31+07:00.jpg'),
	(21,14,'top','product_image_2015-03-15T16:39:45+07:00.jpg'),
	(22,15,'close','product_image_2015-03-15T16:46:39+07:00.jpg'),
	(23,15,'flip','product_image_2015-03-15T16:46:54+07:00.jpg'),
	(24,15,'zoom','product_image_2015-03-15T16:47:09+07:00.jpg'),
	(25,16,'back','product_image_2015-03-15T16:50:12+07:00.jpg'),
	(26,16,'side','product_image_2015-03-15T16:50:26+07:00.jpg'),
	(27,16,'top','product_image_2015-03-15T16:50:41+07:00.jpg'),
	(33,17,'test2','0639967001429015551.png');

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(15) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  `detail` text,
  `price` double DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `qty` int(7) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `code`, `category_id`, `name`, `remark`, `detail`, `price`, `cost`, `qty`, `img`)
VALUES
	(9,'1001',3,'DELL XPS 13 Gen5','','CPU Intel Core i7-5500U (2.40 GHz, 4MB L3 Cache, up to 3.00 GHz)\r\nGraphic Card Intel HD Graphics 5500\r\nMemory 8 GB DDR3L\r\nHDD 256 GB SSD\r\nDisplay',1833,1700,5,'product_2015-03-15T08:37:12+07:00.jpg'),
	(10,'1002',3,'MSI Z70 2BA-2291TH','','cpu Intel Core i7-4710MQ (2.50 GHz, 6 MB L3 Cache, up to 3.50 GHz)\r\ngraphics AMD Radeon R9 M290X (2GB GDDR5)\r\ndisplay 17.3 inch (1920x1080) Full HD\r\nmemory  8 GB DDR3L\r\nhdd 1 TB 7200 RPM\r\n',1763,1600,10,'product_2015-03-15T09:12:51+07:00.jpg'),
	(11,'1003',3,'LENOVO ThinkPad T440P-20AWA162TH','','cpu Intel Core i7-4710MQ (2.50 GHz, 6 MB L3 Cache, up to 3.50 GHz)\r\nram  8 GB DDR3\r\nvga NVIDIA GeForce GT 730M (1 GB GDDR3)\r\nhdd 1 TB 5400 RPM',1666,1500,5,'product_2015-03-15T16:14:43+07:00.jpg'),
	(12,'1004',3,'ASUS UX303LN-DQ195H','','cpu Intel Core i7-4510U (2.00 GHz, 4MB L3 Cache, up to 3.10 GHz)\r\nhdd 1 TB 5400RPM + 16GB SSD \r\ndisplay 13.3 inch LED (1920x1080) Full HD\r\nram  8 GB DDR3L',1499,1300,5,'product_2015-03-15T16:20:50+07:00.jpg'),
	(13,'1005',3,'ASUS K550JK-XX027D, XX109D','','cpu Intel Core i7-4710HQ (2.50 GHz, 6 MB L3 Cache, up to 3.50 GHz)\r\ndisplay 15.6 inch (1366x768) HD\r\nhdd 1 TB 5400 RPM\r\nram  4 GB DDR3L On Board',863,800,10,'product_2015-03-15T16:32:08+07:00.jpg'),
	(14,'1006',3,'LENOVO Y5070-59422156','','cpu Intel Core i7-4710HQ (2.50 GHz, 6 MB L3 Cache, up to 3.50 GHz)\r\nhdd 1 TB 5400 RPM + 8GB SSD (SSHD)\r\ndisplay 15.6 inch (1920x1080) Full HD TN Slim\r\nram  8 GB DDR3L',1333,1000,3,'product_2015-03-15T16:38:42+07:00.jpg'),
	(15,'1007',3,'LENOVO IdeaPad Z5070-59422137, 59424002','','cpu Intel Core i7-4510U (2.00 GHz, 4MB L3 Cache, up to 3.10 GHz)\r\nhdd 1 TB 5400 RPM\r\ndisplay 15.6 inch (1920x1080) Full HD\r\nram  4 GB DDR3L',783,600,5,'product_2015-03-15T16:45:35+07:00.jpg'),
	(16,'1008',3,'DELL Inspiron 7447-W560738TH','','cpu Intel Core i7-4710HQ (2.50 GHz, 6 MB L3 Cache, up to 3.50 GHz)\r\nhdd 1 TB 5400 RPM\r\ndisplay 14.0 inch (1920 x 1080) Full HD IPS\r\nram  8 GB DDR3',1196,900,8,'product_2015-03-15T16:49:46+07:00.jpg'),
	(17,'2001',2,'Asus Fonepad 7 (FE171CG)','out of stock','cpu Dual-Core Intel Atom Z2520 Processor ความเร็ว 1.2 GHz \r\nram 1 GB\r\nAndroid 4.4.2 (KitKat)',233,200,5,'product_2015-03-15T17:01:43+07:00.jpg');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
