/*
 Navicat Premium Data Transfer

 Source Server         : db_localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : ticketsupport

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 30/09/2022 08:49:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for assigned_opt
-- ----------------------------
DROP TABLE IF EXISTS `assigned_opt`;
CREATE TABLE `assigned_opt`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assigned_opt
-- ----------------------------
INSERT INTO `assigned_opt` VALUES (1, 'PR');
INSERT INTO `assigned_opt` VALUES (2, 'QM');
INSERT INTO `assigned_opt` VALUES (3, 'TL');
INSERT INTO `assigned_opt` VALUES (4, 'ME');
INSERT INTO `assigned_opt` VALUES (5, 'FC');
INSERT INTO `assigned_opt` VALUES (6, 'HR');
INSERT INTO `assigned_opt` VALUES (7, 'MG');
INSERT INTO `assigned_opt` VALUES (8, 'FI');
INSERT INTO `assigned_opt` VALUES (9, 'PU');
INSERT INTO `assigned_opt` VALUES (10, 'SH');
INSERT INTO `assigned_opt` VALUES (11, 'IT');
INSERT INTO `assigned_opt` VALUES (12, 'WH');

-- ----------------------------
-- Table structure for assigned_to
-- ----------------------------
DROP TABLE IF EXISTS `assigned_to`;
CREATE TABLE `assigned_to`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `assigned_id` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `assigment`(`assigned_id`) USING BTREE,
  CONSTRAINT `assigned_to_ibfk_1` FOREIGN KEY (`assigned_id`) REFERENCES `assigned_opt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assigned_to
-- ----------------------------
INSERT INTO `assigned_to` VALUES (1, 'Machine Moulding', 1);
INSERT INTO `assigned_to` VALUES (2, 'Tooling', 3);
INSERT INTO `assigned_to` VALUES (3, 'Parameter', 1);
INSERT INTO `assigned_to` VALUES (4, 'Electricity', 5);
INSERT INTO `assigned_to` VALUES (5, 'General Facility', 5);
INSERT INTO `assigned_to` VALUES (6, 'Accessories MTC', 5);
INSERT INTO `assigned_to` VALUES (7, 'Accessories Hot Runner', 4);
INSERT INTO `assigned_to` VALUES (8, 'Shutt Off', 4);
INSERT INTO `assigned_to` VALUES (9, 'Core Puller', 4);
INSERT INTO `assigned_to` VALUES (10, 'Compressor', 5);
INSERT INTO `assigned_to` VALUES (11, 'Crushing', 5);
INSERT INTO `assigned_to` VALUES (12, 'Machine Printing', 5);
INSERT INTO `assigned_to` VALUES (13, 'Mixer', 1);
INSERT INTO `assigned_to` VALUES (14, 'IT Programmer', 11);
INSERT INTO `assigned_to` VALUES (15, 'IT Support', 11);

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_no` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `gender` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `confirm_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, '1', '0502', 'admin testing ', 'arifbacdhim8@gmail.com', '1996-10-25', 'M', 'Batam', 'download.png', NULL);
INSERT INTO `employees` VALUES (2, '3', '0408', 'Angga', 'arifbacdhim8@gmail.com', '1980-03-29', 'M', 'Palembang', '', NULL);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'function',
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'dept',
  `function` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'function',
  `e_category` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'employee  category',
  `e_group` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'employee  group',
  `designation` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Designation',
  `id_assigned_opt` int(1) NULL DEFAULT NULL,
  `group` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `groups` VALUES (2, 'it', 'IT', NULL, NULL, NULL, NULL, 11, NULL);
INSERT INTO `groups` VALUES (3, 'pr_pr1_f1_g1', 'PR', 'PR1', 'F1', 'G1', '', 1, 'PR-PR1-F1-G1');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_parent` int(10) NOT NULL,
  `menu_level` int(10) NOT NULL COMMENT '0=\"Level Header\", 1=\"Level Satu\", 2=\"Level Dua\", 3=\"Level Tiga\", 4=\"Level Empat\"',
  `menu_sortable` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'User Autorization', '#', '&#x;', 1, 1, 1);
INSERT INTO `menu` VALUES (2, 'User Autorization', '#autorization', '&#x;', 1, 2, 2);
INSERT INTO `menu` VALUES (3, 'User Master', 'user', '&#x;', 1, 2, 3);
INSERT INTO `menu` VALUES (4, 'Group Master', 'group', '&#x;', 1, 2, 4);
INSERT INTO `menu` VALUES (5, 'Menu Master', 'menu', '&#x;', 1, 2, 5);
INSERT INTO `menu` VALUES (6, 'Daschboard', '#', '', 0, 0, 6);
INSERT INTO `menu` VALUES (7, 'IT Software App', '#', '&#x;', 6, 1, 7);
INSERT INTO `menu` VALUES (8, 'Tooling System', 'tooling', '&#x;', 7, 2, 8);
INSERT INTO `menu` VALUES (9, 'Machine System', 'machine', '&#x;', 7, 2, 9);
INSERT INTO `menu` VALUES (10, 'Inventory System', 'inventory', '&#x;', 7, 2, 10);

-- ----------------------------
-- Table structure for ticket_machine
-- ----------------------------
DROP TABLE IF EXISTS `ticket_machine`;
CREATE TABLE `ticket_machine`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Number ticket',
  `id_request` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ID User Create Ticket',
  `date_create` datetime(0) NULL DEFAULT NULL COMMENT 'Date Create Ticket',
  `expected_date` datetime(0) NULL DEFAULT NULL COMMENT 'Expected Date',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `problem` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Description Problem',
  `attachment` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Image SS App Problem',
  `priority` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Prority ticket',
  `feedback` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'user want update',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '1. Open, 2.Accept, 3.Reject, 4.On-Progress, 5.Closed, 6. Discussion',
  `reason_reject` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '3. Reject (Reason)',
  `action` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Action Ticket',
  `date_progress` datetime(0) NULL DEFAULT NULL COMMENT 'Date Start Progress',
  `progress` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Action Progress',
  `date_discuss` datetime(0) NULL DEFAULT NULL COMMENT 'Start Date Discussion',
  `message` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'message for discussion',
  `date_closed` datetime(0) NULL DEFAULT NULL COMMENT 'Date Closed Ticket',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket_machine
-- ----------------------------
INSERT INTO `ticket_machine` VALUES (1, 'T220929214934', '3', '2022-09-29 21:49:34', '2022-09-30 21:49:34', 'Machine Trouble', 'Machine Off', NULL, 'Critical', '', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ticket_machine` VALUES (2, 'T220929214948', '3', '2022-09-29 21:49:48', '2022-09-30 21:49:48', 'Machine Trouble', 'Machine Off', NULL, 'Critical', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for ticket_tooling
-- ----------------------------
DROP TABLE IF EXISTS `ticket_tooling`;
CREATE TABLE `ticket_tooling`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Number ticket',
  `id_request` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ID User Create Ticket',
  `date_create` datetime(0) NULL DEFAULT NULL COMMENT 'Date Create Ticket',
  `expected_date` datetime(0) NULL DEFAULT NULL COMMENT 'Expected Date',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `problem` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Description Problem',
  `attachment` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Image SS App Problem',
  `priority` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Prority ticket',
  `feedback` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'user want update',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '1. Open, 2.Accept, 3.Reject, 4.On-Progress, 5.Closed, 6. Discussion',
  `reason_reject` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '3. Reject (Reason)',
  `action` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Action Ticket',
  `date_progress` datetime(0) NULL DEFAULT NULL COMMENT 'Date Start Progress',
  `progress` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Action Progress',
  `date_discuss` datetime(0) NULL DEFAULT NULL COMMENT 'Start Date Discussion',
  `message` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'message for discussion',
  `date_closed` datetime(0) NULL DEFAULT NULL COMMENT 'Date Closed Ticket',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket_tooling
-- ----------------------------
INSERT INTO `ticket_tooling` VALUES (1, 'T220929213331', '3', '2022-09-29 21:33:31', '2022-09-30 21:33:31', 'Tool Problem', 'Cant Running', NULL, 'Critical', 'Please fix bug', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ticket_tooling` VALUES (2, 'T220929225739', '3', '2022-09-29 22:57:39', '2022-10-13 22:57:39', 'Error Tooliing', 'Error', NULL, 'Low', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_uregister` int(11) NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED NULL DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_no` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `confirm_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_email`(`email`) USING BTREE,
  UNIQUE INDEX `uc_activation_selector`(`activation_selector`) USING BTREE,
  UNIQUE INDEX `uc_forgotten_password_selector`(`forgotten_password_selector`) USING BTREE,
  UNIQUE INDEX `uc_remember_selector`(`remember_selector`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, '127.0.0.1', 'administrator', '$2y$12$RaU4uxWOAcluCUUR1zdoKOYa6EYMubyaUAyncV4FxpvQqraJlICd2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1603077267, 1, 'Admin', '', 'istrator', 'ADMIN', '0', NULL);
INSERT INTO `users` VALUES (2, 1, '::1', 'arifbacdhim8@gmail.com', '$2y$12$F9Wrgjor9Wn26ZLR70Fb8ueuwF078HHa.ee9Zg4obT7IG8lOEJ1T2', 'arifbacdhim8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566378445, 1664502476, 1, 'Arif', '0502', 'super admin', '', '098921491029', '01XGS4SD27');
INSERT INTO `users` VALUES (3, 2, '::1', 'anggaardianto4@gmail.com', '$2y$10$wqBSHuGzEOePaQ9exJGMgeslcIaOXCrOVboTeYrbHZqaTT9vR/pEm', 'anggaardianto4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1605773487, 1626160662, 1, 'Angga', '0408', 'Masilamani', '', '0878967878678', NULL);

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE,
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (2, 1, 2);
INSERT INTO `users_groups` VALUES (3, 2, 1);
INSERT INTO `users_groups` VALUES (4, 3, 3);

-- ----------------------------
-- Table structure for users_role
-- ----------------------------
DROP TABLE IF EXISTS `users_role`;
CREATE TABLE `users_role`  (
  `id_user_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `user_permission` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_role
-- ----------------------------
INSERT INTO `users_role` VALUES (11, 19, 'N;');
INSERT INTO `users_role` VALUES (2, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (2, 2, 'N;');
INSERT INTO `users_role` VALUES (2, 3, 'N;');
INSERT INTO `users_role` VALUES (2, 4, 'N;');
INSERT INTO `users_role` VALUES (2, 5, 'N;');
INSERT INTO `users_role` VALUES (2, 6, 'N;');
INSERT INTO `users_role` VALUES (2, 7, 'N;');
INSERT INTO `users_role` VALUES (2, 8, 'N;');
INSERT INTO `users_role` VALUES (2, 9, 'N;');
INSERT INTO `users_role` VALUES (2, 10, 'N;');
INSERT INTO `users_role` VALUES (2, 11, 'N;');
INSERT INTO `users_role` VALUES (2, 12, 'N;');
INSERT INTO `users_role` VALUES (2, 13, 'N;');
INSERT INTO `users_role` VALUES (2, 14, 'N;');
INSERT INTO `users_role` VALUES (2, 15, 'N;');
INSERT INTO `users_role` VALUES (2, 16, 'N;');
INSERT INTO `users_role` VALUES (2, 17, 'N;');
INSERT INTO `users_role` VALUES (2, 18, 'N;');
INSERT INTO `users_role` VALUES (2, 19, 'N;');
INSERT INTO `users_role` VALUES (2, 20, 'N;');
INSERT INTO `users_role` VALUES (2, 21, 'N;');
INSERT INTO `users_role` VALUES (2, 22, 'N;');
INSERT INTO `users_role` VALUES (2, 23, 'N;');
INSERT INTO `users_role` VALUES (2, 24, 'N;');
INSERT INTO `users_role` VALUES (2, 25, 'N;');
INSERT INTO `users_role` VALUES (2, 26, 'N;');
INSERT INTO `users_role` VALUES (2, 27, 'N;');
INSERT INTO `users_role` VALUES (2, 28, 'N;');
INSERT INTO `users_role` VALUES (2, 29, 'N;');
INSERT INTO `users_role` VALUES (2, 30, 'N;');
INSERT INTO `users_role` VALUES (2, 31, 'N;');
INSERT INTO `users_role` VALUES (3, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (3, 2, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (3, 3, 'N;');
INSERT INTO `users_role` VALUES (3, 4, 'N;');
INSERT INTO `users_role` VALUES (3, 5, 'N;');
INSERT INTO `users_role` VALUES (3, 6, 'N;');
INSERT INTO `users_role` VALUES (3, 7, 'N;');
INSERT INTO `users_role` VALUES (3, 8, 'N;');
INSERT INTO `users_role` VALUES (3, 9, 'N;');
INSERT INTO `users_role` VALUES (3, 10, 'N;');
INSERT INTO `users_role` VALUES (3, 11, 'N;');
INSERT INTO `users_role` VALUES (3, 12, 'N;');
INSERT INTO `users_role` VALUES (3, 13, 'N;');
INSERT INTO `users_role` VALUES (3, 14, 'N;');
INSERT INTO `users_role` VALUES (3, 15, 'N;');
INSERT INTO `users_role` VALUES (3, 16, 'N;');
INSERT INTO `users_role` VALUES (3, 17, 'N;');
INSERT INTO `users_role` VALUES (3, 18, 'N;');
INSERT INTO `users_role` VALUES (3, 19, 'N;');
INSERT INTO `users_role` VALUES (3, 20, 'N;');
INSERT INTO `users_role` VALUES (3, 21, 'N;');
INSERT INTO `users_role` VALUES (3, 22, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (3, 23, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (3, 24, 'N;');
INSERT INTO `users_role` VALUES (3, 25, 'N;');
INSERT INTO `users_role` VALUES (3, 26, 'N;');
INSERT INTO `users_role` VALUES (3, 27, 'N;');
INSERT INTO `users_role` VALUES (3, 28, 'N;');
INSERT INTO `users_role` VALUES (3, 29, 'N;');
INSERT INTO `users_role` VALUES (3, 30, 'N;');
INSERT INTO `users_role` VALUES (3, 31, 'N;');
INSERT INTO `users_role` VALUES (3, 32, 'N;');
INSERT INTO `users_role` VALUES (347, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 2, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 3, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 4, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 5, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 6, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 7, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 8, 'N;');
INSERT INTO `users_role` VALUES (347, 11, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 12, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 13, 'N;');
INSERT INTO `users_role` VALUES (347, 14, 'N;');
INSERT INTO `users_role` VALUES (347, 15, 'N;');
INSERT INTO `users_role` VALUES (347, 16, 'N;');
INSERT INTO `users_role` VALUES (347, 17, 'N;');
INSERT INTO `users_role` VALUES (347, 18, 'N;');
INSERT INTO `users_role` VALUES (347, 19, 'N;');
INSERT INTO `users_role` VALUES (347, 20, 'N;');
INSERT INTO `users_role` VALUES (347, 21, 'N;');
INSERT INTO `users_role` VALUES (347, 22, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 23, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 24, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (347, 25, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 26, 'N;');
INSERT INTO `users_role` VALUES (347, 27, 'N;');
INSERT INTO `users_role` VALUES (347, 28, 'N;');
INSERT INTO `users_role` VALUES (347, 29, 'N;');
INSERT INTO `users_role` VALUES (347, 30, 'N;');
INSERT INTO `users_role` VALUES (347, 31, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (347, 32, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 2, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 3, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 4, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 5, 'N;');
INSERT INTO `users_role` VALUES (17, 6, 'N;');
INSERT INTO `users_role` VALUES (17, 7, 'N;');
INSERT INTO `users_role` VALUES (17, 8, 'N;');
INSERT INTO `users_role` VALUES (17, 11, 'N;');
INSERT INTO `users_role` VALUES (17, 12, 'N;');
INSERT INTO `users_role` VALUES (17, 13, 'N;');
INSERT INTO `users_role` VALUES (17, 14, 'N;');
INSERT INTO `users_role` VALUES (17, 15, 'N;');
INSERT INTO `users_role` VALUES (17, 16, 'N;');
INSERT INTO `users_role` VALUES (17, 17, 'N;');
INSERT INTO `users_role` VALUES (17, 18, 'N;');
INSERT INTO `users_role` VALUES (17, 19, 'N;');
INSERT INTO `users_role` VALUES (17, 20, 'N;');
INSERT INTO `users_role` VALUES (17, 21, 'N;');
INSERT INTO `users_role` VALUES (17, 22, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 23, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 24, 'a:2:{i:0;s:4:\"read\";i:1;s:6:\"update\";}');
INSERT INTO `users_role` VALUES (17, 25, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (17, 26, 'N;');
INSERT INTO `users_role` VALUES (17, 27, 'N;');
INSERT INTO `users_role` VALUES (17, 28, 'N;');
INSERT INTO `users_role` VALUES (17, 29, 'N;');
INSERT INTO `users_role` VALUES (17, 30, 'N;');
INSERT INTO `users_role` VALUES (17, 31, 'N;');
INSERT INTO `users_role` VALUES (17, 32, 'N;');
INSERT INTO `users_role` VALUES (4, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (4, 2, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (4, 3, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (4, 4, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (4, 5, 'N;');
INSERT INTO `users_role` VALUES (4, 6, 'N;');
INSERT INTO `users_role` VALUES (4, 7, 'N;');
INSERT INTO `users_role` VALUES (4, 8, 'N;');
INSERT INTO `users_role` VALUES (4, 11, 'N;');
INSERT INTO `users_role` VALUES (4, 12, 'N;');
INSERT INTO `users_role` VALUES (4, 13, 'N;');
INSERT INTO `users_role` VALUES (4, 14, 'N;');
INSERT INTO `users_role` VALUES (4, 15, 'N;');
INSERT INTO `users_role` VALUES (4, 16, 'N;');
INSERT INTO `users_role` VALUES (4, 17, 'N;');
INSERT INTO `users_role` VALUES (4, 18, 'N;');
INSERT INTO `users_role` VALUES (4, 19, 'N;');
INSERT INTO `users_role` VALUES (4, 20, 'N;');
INSERT INTO `users_role` VALUES (4, 21, 'N;');
INSERT INTO `users_role` VALUES (4, 22, 'N;');
INSERT INTO `users_role` VALUES (4, 23, 'N;');
INSERT INTO `users_role` VALUES (4, 24, 'N;');
INSERT INTO `users_role` VALUES (4, 25, 'N;');
INSERT INTO `users_role` VALUES (4, 26, 'N;');
INSERT INTO `users_role` VALUES (4, 27, 'N;');
INSERT INTO `users_role` VALUES (4, 28, 'N;');
INSERT INTO `users_role` VALUES (4, 29, 'N;');
INSERT INTO `users_role` VALUES (4, 30, 'N;');
INSERT INTO `users_role` VALUES (4, 31, 'N;');
INSERT INTO `users_role` VALUES (4, 32, 'N;');
INSERT INTO `users_role` VALUES (1, 1, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 2, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 3, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 4, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 5, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 6, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 7, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 8, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 11, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 12, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 13, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 14, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 15, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 16, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 17, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 18, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 19, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 20, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 21, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 22, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 23, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 24, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 25, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 26, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 27, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 28, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 29, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 30, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 31, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 32, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 33, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (1, 35, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (167, 1, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 2, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 3, 'N;');
INSERT INTO `users_role` VALUES (167, 4, 'N;');
INSERT INTO `users_role` VALUES (167, 5, 'N;');
INSERT INTO `users_role` VALUES (167, 6, 'N;');
INSERT INTO `users_role` VALUES (167, 7, 'N;');
INSERT INTO `users_role` VALUES (167, 8, 'N;');
INSERT INTO `users_role` VALUES (167, 11, 'N;');
INSERT INTO `users_role` VALUES (167, 12, 'N;');
INSERT INTO `users_role` VALUES (167, 13, 'N;');
INSERT INTO `users_role` VALUES (167, 14, 'N;');
INSERT INTO `users_role` VALUES (167, 15, 'N;');
INSERT INTO `users_role` VALUES (167, 16, 'N;');
INSERT INTO `users_role` VALUES (167, 17, 'N;');
INSERT INTO `users_role` VALUES (167, 18, 'N;');
INSERT INTO `users_role` VALUES (167, 19, 'N;');
INSERT INTO `users_role` VALUES (167, 20, 'N;');
INSERT INTO `users_role` VALUES (167, 21, 'N;');
INSERT INTO `users_role` VALUES (167, 22, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 23, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 24, 'a:4:{i:0;s:4:\"read\";i:1;s:6:\"update\";i:2;s:6:\"create\";i:3;s:6:\"delete\";}');
INSERT INTO `users_role` VALUES (167, 25, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 26, 'N;');
INSERT INTO `users_role` VALUES (167, 27, 'N;');
INSERT INTO `users_role` VALUES (167, 28, 'N;');
INSERT INTO `users_role` VALUES (167, 29, 'N;');
INSERT INTO `users_role` VALUES (167, 30, 'N;');
INSERT INTO `users_role` VALUES (167, 31, 'N;');
INSERT INTO `users_role` VALUES (167, 32, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 33, 'a:1:{i:0;s:4:\"read\";}');
INSERT INTO `users_role` VALUES (167, 35, 'N;');

SET FOREIGN_KEY_CHECKS = 1;
