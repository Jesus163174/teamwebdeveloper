/*
 Navicat Premium Data Transfer

 Source Server         : master
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : financiera

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 01/06/2019 17:09:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for credits
-- ----------------------------
DROP TABLE IF EXISTS `credits`;
CREATE TABLE `credits`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `totalamount` double NOT NULL,
  `wainnings` double NOT NULL,
  `totalpayments` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'prestado',
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `credits_customer_id_foreign`(`customer_id`) USING BTREE,
  CONSTRAINT `credits_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of credits
-- ----------------------------
INSERT INTO `credits` VALUES (1, 3000, 600, 10, '2019-06-01', 'prestado', 1, NULL, NULL);
INSERT INTO `credits` VALUES (4, 4000, 800, 20, '2019-06-01', 'prestado', 2, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
