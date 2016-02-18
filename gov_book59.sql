/*
Navicat MySQL Data Transfer

Source Server         : mariadb
Source Server Version : 50530
Source Host           : localhost:3310
Source Database       : gov_book59

Target Server Type    : MYSQL
Target Server Version : 50530
File Encoding         : 65001

Date: 2016-02-18 09:01:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','manager','user') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES ('1', 'Admin System', 'admin2', '1234', 'admin', 'admin@rorcommerce.com');
INSERT INTO `accounts` VALUES ('5', 'Tavon Seesenpila', 'tavon', '1234', 'manager', '');
INSERT INTO `accounts` VALUES ('6', 'Pai Pongsathon', 'pai', '1234', 'manager', 'pai@gmail.com');
INSERT INTO `accounts` VALUES ('7', 'พิชัย อาจทอง', 'pichai', 'ยรแ้ฟร', 'manager', 'pichaiarc@gmail.com');
INSERT INTO `accounts` VALUES ('8', 'pichai', 'pichai', '1234', 'user', 'pichaiarc@gmail.com');

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `id_book` varchar(50) DEFAULT NULL,
  `date_book` date DEFAULT NULL,
  `begin_book` varchar(200) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `date_recieve` date DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------

-- ----------------------------
-- Table structure for `book_configs`
-- ----------------------------
DROP TABLE IF EXISTS `book_configs`;
CREATE TABLE `book_configs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `backend_items_per_page` int(3) DEFAULT NULL,
  `frontend_items_per_page` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_configs
-- ----------------------------
INSERT INTO `book_configs` VALUES ('1', '5', '8');

-- ----------------------------
-- Table structure for `book_images`
-- ----------------------------
DROP TABLE IF EXISTS `book_images`;
CREATE TABLE `book_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_images
-- ----------------------------

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('2', '101', 'Service Plan', null);
INSERT INTO `categories` VALUES ('3', '102', 'นิเทศงาน', '');
INSERT INTO `categories` VALUES ('4', '103', 'ICT', 'sss');
INSERT INTO `categories` VALUES ('5', '104', 'Pher', 'อุบัติภัย');
INSERT INTO `categories` VALUES ('6', '105', 'พอสว', null);
INSERT INTO `categories` VALUES ('7', '106', 'ข้อมูลข่าวสาร', null);
INSERT INTO `categories` VALUES ('8', '107', 'งานประชุมผู้บริหาร', null);
INSERT INTO `categories` VALUES ('9', '108', 'งานแผนงาน', null);
INSERT INTO `categories` VALUES ('10', '109', 'โครงการพิเศษ', null);
INSERT INTO `categories` VALUES ('11', '110', 'ส่งต่อ', null);
INSERT INTO `categories` VALUES ('12', '111', 'ITA', null);
INSERT INTO `categories` VALUES ('13', '112', 'อื่นๆ', null);

-- ----------------------------
-- Table structure for `userbook`
-- ----------------------------
DROP TABLE IF EXISTS `userbook`;
CREATE TABLE `userbook` (
  `id_user` tinyint(4) DEFAULT NULL,
  `name_user` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userbook
-- ----------------------------
INSERT INTO `userbook` VALUES ('1', 'xxx  yyy');
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
INSERT INTO `userbook` VALUES (null, null);
