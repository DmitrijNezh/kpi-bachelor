/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : bac_proj

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-04-28 22:28:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chart_data`
-- ----------------------------
DROP TABLE IF EXISTS `chart_data`;
CREATE TABLE `chart_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_obj` int(10) unsigned NOT NULL,
  `id_ground` int(10) unsigned NOT NULL,
  `type` enum('area','rectangle') NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_obj` (`id_obj`),
  KEY `id_ground` (`id_ground`),
  CONSTRAINT `chart_data_ibfk_1` FOREIGN KEY (`id_obj`) REFERENCES `map_objects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chart_data_ibfk_2` FOREIGN KEY (`id_ground`) REFERENCES `ground_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `configs`
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `c_key` varchar(128) NOT NULL,
  `c_value` varchar(512) NOT NULL,
  PRIMARY KEY (`c_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES ('main_title', 'GPR');

-- ----------------------------
-- Table structure for `ground_types`
-- ----------------------------
DROP TABLE IF EXISTS `ground_types`;
CREATE TABLE `ground_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `color` char(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `import_log`
-- ----------------------------
DROP TABLE IF EXISTS `import_log`;
CREATE TABLE `import_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_map` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(32) NOT NULL,
  `status` varchar(128) NOT NULL,
  `objects_list` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_map` (`id_map`),
  CONSTRAINT `import_log_ibfk_2` FOREIGN KEY (`id_map`) REFERENCES `maps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `import_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `maps`
-- ----------------------------
DROP TABLE IF EXISTS `maps`;
CREATE TABLE `maps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `zoom` tinyint(3) unsigned NOT NULL,
  `is_public` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`,`id_user`),
  KEY `id_user` (`id_user`),
  KEY `id` (`id`),
  CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `map_objects`
-- ----------------------------
DROP TABLE IF EXISTS `map_objects`;
CREATE TABLE `map_objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_map` int(10) unsigned NOT NULL,
  `type` enum('point','line') NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_map` (`id_map`),
  KEY `id` (`id`),
  CONSTRAINT `map_objects_ibfk_1` FOREIGN KEY (`id_map`) REFERENCES `maps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `code` varchar(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('404', '404', 'Not founded');
INSERT INTO `pages` VALUES ('help', 'Справка', 'ХАЛП');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(512) NOT NULL,
  `pass` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '989553121d963b187dd3f9288115cf27');
