/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : oms

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-07-03 09:27:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '账号',
  `password` char(32) CHARACTER SET utf8 NOT NULL,
  `akey` char(8) CHARACTER SET utf8 DEFAULT NULL,
  `add_time` timestamp NULL DEFAULT NULL,
  `last_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `admin_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `level` tinyint(3) unsigned DEFAULT '3' COMMENT '等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '007769599f62e02244f1eecc0b91f39d', 'dlr06c', '2017-06-28 15:11:08', '2017-06-30 15:05:14', 'wangyuankan', '1', '3');
