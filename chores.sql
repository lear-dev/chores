/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100327
 Source Host           : localhost:3306
 Source Schema         : chores

 Target Server Type    : MySQL
 Target Server Version : 100327
 File Encoding         : 65001

 Date: 02/12/2020 00:24:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `passcode` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'admin');
INSERT INTO `admin` VALUES (2, 'jaime', 'mcnish');
INSERT INTO `admin` VALUES (3, 'leo', 'arce');

-- ----------------------------
-- Table structure for chore_list
-- ----------------------------
DROP TABLE IF EXISTS `chore_list`;
CREATE TABLE `chore_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chore` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `frequency` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chore_list
-- ----------------------------
INSERT INTO `chore_list` VALUES (1, 'MAINROOM - Cleaned coffee table (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (2, 'MAINROOM - Vacuumed rug (main)', 'Weekly');
INSERT INTO `chore_list` VALUES (3, 'MAINROOM - Did dishes (a little)', 'Weekly');
INSERT INTO `chore_list` VALUES (6, 'BATHROOM - Cleaned toilet (top)', 'Weekly');
INSERT INTO `chore_list` VALUES (7, 'MAINROOM - Cleaned coffee table (bottom)', 'Weekly');
INSERT INTO `chore_list` VALUES (8, 'MAINROOM - Cleaned coffee table (top)', 'Weekly');
INSERT INTO `chore_list` VALUES (9, 'BATHROOM - Cleaned toilet (bottom)', 'Weekly');
INSERT INTO `chore_list` VALUES (10, 'BATHROOM - Cleaned toilet (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (11, 'MAINROOM - Cleaned A/C (unit and metal box attached to it)', 'Weekly');
INSERT INTO `chore_list` VALUES (12, 'MAINROOM - Did dishes (medium amount)', 'Weekly');
INSERT INTO `chore_list` VALUES (13, 'MAINROOM - Did dishes (a lot)', 'Weekly');
INSERT INTO `chore_list` VALUES (14, 'MAINROOM - Cleaned behind A/C (back and side wall)', 'Weekly');
INSERT INTO `chore_list` VALUES (15, 'MAINROOM - Cleaned back window (inside) (window and sill)', 'Weekly');
INSERT INTO `chore_list` VALUES (16, 'OUTSIDE - Cleaned back window (outside) (window and sill)', 'Weekly');
INSERT INTO `chore_list` VALUES (17, 'MAINROOM - Sweeped main room', 'Weekly');
INSERT INTO `chore_list` VALUES (18, 'BEDROOM - Sweeped bedroom', 'Weekly');
INSERT INTO `chore_list` VALUES (19, 'BATHROOM - Sweeped bathroom', 'Weekly');
INSERT INTO `chore_list` VALUES (20, 'BATHROOM - Cleaned bathroom sink', 'Weekly');
INSERT INTO `chore_list` VALUES (21, 'BATHROOM - Cleaned bathroom mirror', 'As Needed');
INSERT INTO `chore_list` VALUES (22, 'BATHROOM - Cleaned bathroom tub (all plastic, shower head, and faucet)', 'Bi-Monthly');
INSERT INTO `chore_list` VALUES (23, 'BATHROOM - Cleaned bathroom walls (includes wall above tub and door)', 'Weekly');
INSERT INTO `chore_list` VALUES (24, 'MAINROOM - Cleaned stove (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (25, 'MAINROOM - Cleaned stove (top)', 'Weekly');
INSERT INTO `chore_list` VALUES (26, 'MAINROOM - Cleaned stove (inside)', 'Weekly');
INSERT INTO `chore_list` VALUES (27, 'MAINROOM - Cleaned fridge (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (28, 'MAINROOM - Cleaned fridge (outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (29, 'MAINROOM - Cleaned fridge (inside)', 'Weekly');
INSERT INTO `chore_list` VALUES (30, 'MAINROOM - Vacuumed rug (runner)', 'Weekly');
INSERT INTO `chore_list` VALUES (31, 'BEDROOM - Vacuumed rug (leo bedside)', 'Weekly');
INSERT INTO `chore_list` VALUES (32, 'BEDROOM - Vacuumed rug (jaime bedside)', 'Weekly');
INSERT INTO `chore_list` VALUES (33, 'MAINROOM, BEDROOM, BATHROOM - Vacummed (spot vacuumed misc. areas) (can be mixture of rug, tile, wood, and rooms)', 'Weekly');
INSERT INTO `chore_list` VALUES (34, 'MAINROOM - Cleaned kitchen counter (around objects)', 'Weekly');
INSERT INTO `chore_list` VALUES (35, 'MAINROOM - Cleaned kitchen counter (under and around objects)', 'Weekly');
INSERT INTO `chore_list` VALUES (36, 'MAINROOM - Cleaned microwave (inside) (glass platform)', 'Weekly');
INSERT INTO `chore_list` VALUES (37, 'MAINROOM - Cleaned microwave (inside) (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (38, 'MAINROOM - Cleaned microwave (inside) (little carboard patch so microwave lasts longer)', 'Weekly');
INSERT INTO `chore_list` VALUES (39, 'MAINROOM - Cleaned microwave (outside) (all)', 'Weekly');
INSERT INTO `chore_list` VALUES (40, 'MAINROOM - Cleaned microwave (all inside and all outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (41, 'MAINROOM - Cleaned toaster oven (inside)', 'Weekly');
INSERT INTO `chore_list` VALUES (42, 'MAINROOM - Cleaned toaster oven (outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (43, 'MAINROOM - Cleaned toaster oven (inside and outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (44, 'MAINROOM - Wiped down TV (main)', 'Weekly');
INSERT INTO `chore_list` VALUES (45, 'BEDROOM - Wiped down TV (bedroom)', 'Weekly');
INSERT INTO `chore_list` VALUES (46, 'MAINROOM, BEDROOM - Dusted and cleaned gaming consoles (all 3 Sony boxes)', 'Weekly');
INSERT INTO `chore_list` VALUES (47, 'MAINROOM - Dusted and cleaned entertainment unit (around objects)', 'Weekly');
INSERT INTO `chore_list` VALUES (48, 'MAINROOM - Dusted and cleaned entertainment unit (under and around objects)', 'Weekly');
INSERT INTO `chore_list` VALUES (49, 'MAINROOM - Dusted and cleaned printer', 'Weekly');
INSERT INTO `chore_list` VALUES (50, 'MAINROOM, BEDROOM, BATHROOM - Threw all trash and garbage into trash cans and garbage bags (all rooms)', 'Weekly');
INSERT INTO `chore_list` VALUES (51, 'OUTSIDE - Took garbage bag to dumpster (x1)', 'Weekly');
INSERT INTO `chore_list` VALUES (52, 'OUTSIDE - Took garbage bags to dumpster (x2)', 'Weekly');
INSERT INTO `chore_list` VALUES (53, 'OUTSIDE - Took garbage bags to dumpster (x3)', 'Weekly');
INSERT INTO `chore_list` VALUES (54, 'MAINROOM - Cleaned ceiling fan (main room) (all parts and top of blades)', 'Weekly');
INSERT INTO `chore_list` VALUES (55, 'BEDROOM - Cleaned ceiling fan (bedroom) (all parts and top of blades)', 'Weekly');
INSERT INTO `chore_list` VALUES (56, 'MAINROOM, BEDROOM - Cleaned ceiling fans (both rooms) (all parts and top of blades)', 'Weekly');
INSERT INTO `chore_list` VALUES (57, 'MAINROOM - Dusted and cleand all other objects in entertainment unit that are not gaming consoles', 'Weekly');
INSERT INTO `chore_list` VALUES (58, 'MAINROOM - Cleaned stove hood (top)', 'Weekly');
INSERT INTO `chore_list` VALUES (59, 'MAINROOM - Cleaned stove hood (top and bottom)', 'Weekly');
INSERT INTO `chore_list` VALUES (60, 'MAINROOM - Cleaned stove hood (bottom)', 'Weekly');
INSERT INTO `chore_list` VALUES (61, 'MAINROOM - Cleaned back door and door window (inside)', 'Weekly');
INSERT INTO `chore_list` VALUES (62, 'OUTSIDE - Cleaned back door and door window (outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (63, 'MAINROOM, OUTSIDE - Cleaned back door and door window (inside and outside)', 'Weekly');
INSERT INTO `chore_list` VALUES (64, 'OUTSIDE - Sweeped outside patio area', 'Weekly');
INSERT INTO `chore_list` VALUES (65, 'OUTSIDE - Cleaned outside railing', 'Weekly');
INSERT INTO `chore_list` VALUES (66, 'BEDROOM - Cleaned A/C vent (bedroom side)', 'Weekly');

-- ----------------------------
-- Table structure for main_menu
-- ----------------------------
DROP TABLE IF EXISTS `main_menu`;
CREATE TABLE `main_menu`  (
  `m_menu_id` int(2) NOT NULL AUTO_INCREMENT,
  `m_menu_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `m_menu_link` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `m_menu_order` int(2) NOT NULL,
  PRIMARY KEY (`m_menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of main_menu
-- ----------------------------
INSERT INTO `main_menu` VALUES (24, 'Home', '/simple/', 1);
INSERT INTO `main_menu` VALUES (25, 'Services', '/simple/services.php', 2);
INSERT INTO `main_menu` VALUES (26, 'About Us', '/simple/about-us.php', 3);
INSERT INTO `main_menu` VALUES (27, 'Contact Us', '/simple/contact-us.php', 4);

-- ----------------------------
-- Table structure for sub_menu
-- ----------------------------
DROP TABLE IF EXISTS `sub_menu`;
CREATE TABLE `sub_menu`  (
  `s_menu_id` int(2) NOT NULL AUTO_INCREMENT,
  `m_menu_id` int(2) NOT NULL,
  `s_menu_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `s_menu_link` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `s_menu_order` int(2) NOT NULL,
  PRIMARY KEY (`s_menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_menu
-- ----------------------------
INSERT INTO `sub_menu` VALUES (27, 25, 'Web Stuff', '/simple/web-stuff.php', 1);

-- ----------------------------
-- Table structure for user_chore_relations
-- ----------------------------
DROP TABLE IF EXISTS `user_chore_relations`;
CREATE TABLE `user_chore_relations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `choreid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `roll` int(11) NULL DEFAULT NULL,
  `last_done` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 130 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_chore_relations
-- ----------------------------
INSERT INTO `user_chore_relations` VALUES (1, 2, 1, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (2, 2, 2, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (3, 3, 3, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (5, 3, 1, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (6, 2, 3, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (7, 3, 2, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (8, 2, 6, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (9, 3, 6, 1, NULL, '2016-07-08');
INSERT INTO `user_chore_relations` VALUES (10, 3, 21, 3, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (11, 3, 20, 2, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (12, 3, 22, 2, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (13, 3, 23, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (14, 3, 10, 2, NULL, '2016-07-08');
INSERT INTO `user_chore_relations` VALUES (15, 3, 9, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (16, 3, 19, 1, NULL, '2016-07-08');
INSERT INTO `user_chore_relations` VALUES (17, 3, 66, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (18, 3, 55, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (19, 3, 18, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (20, 3, 32, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (21, 3, 31, 0, 76, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (22, 3, 45, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (23, 3, 11, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (24, 3, 61, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (25, 3, 15, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (26, 3, 14, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (27, 3, 54, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (28, 3, 7, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (29, 3, 8, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (30, 3, 27, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (31, 3, 29, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (32, 3, 28, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (33, 3, 34, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (34, 3, 35, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (35, 3, 40, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (36, 3, 37, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (37, 3, 36, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (38, 3, 38, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (39, 3, 39, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (40, 3, 24, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (41, 3, 26, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (42, 3, 25, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (43, 3, 60, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (44, 3, 59, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (45, 3, 58, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (46, 3, 43, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (47, 3, 41, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (48, 3, 42, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (49, 3, 13, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (50, 3, 12, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (51, 3, 57, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (52, 3, 47, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (53, 3, 48, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (54, 3, 49, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (55, 3, 17, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (56, 3, 30, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (57, 3, 44, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (58, 3, 56, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (59, 3, 46, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (60, 3, 50, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (61, 3, 33, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (62, 3, 63, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (63, 3, 62, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (64, 3, 16, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (65, 3, 65, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (66, 3, 64, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (67, 3, 51, 1, NULL, '2016-07-06');
INSERT INTO `user_chore_relations` VALUES (68, 3, 52, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (69, 3, 53, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (70, 2, 21, 4, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (71, 2, 20, 3, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (72, 2, 22, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (73, 2, 23, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (74, 2, 10, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (75, 2, 9, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (76, 2, 19, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (77, 2, 66, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (78, 2, 55, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (79, 2, 18, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (80, 2, 32, 1, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (81, 2, 31, 0, 19, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (82, 2, 45, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (83, 2, 11, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (84, 2, 61, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (85, 2, 15, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (86, 2, 14, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (87, 2, 54, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (88, 2, 7, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (89, 2, 8, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (90, 2, 27, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (91, 2, 29, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (92, 2, 28, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (93, 2, 34, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (94, 2, 35, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (95, 2, 40, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (96, 2, 37, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (97, 2, 36, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (98, 2, 38, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (99, 2, 39, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (100, 2, 24, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (101, 2, 26, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (102, 2, 25, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (103, 2, 60, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (104, 2, 59, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (105, 2, 58, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (106, 2, 43, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (107, 2, 41, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (108, 2, 42, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (109, 2, 13, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (110, 2, 12, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (111, 2, 57, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (112, 2, 47, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (113, 2, 48, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (114, 2, 49, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (115, 2, 17, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (116, 2, 30, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (117, 2, 44, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (118, 2, 56, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (119, 2, 46, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (120, 2, 50, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (121, 2, 33, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (122, 2, 63, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (123, 2, 62, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (124, 2, 16, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (125, 2, 65, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (126, 2, 64, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (127, 2, 51, 1, NULL, '2016-07-06');
INSERT INTO `user_chore_relations` VALUES (128, 2, 52, 0, NULL, '0000-00-00');
INSERT INTO `user_chore_relations` VALUES (129, 2, 53, 0, NULL, '0000-00-00');

SET FOREIGN_KEY_CHECKS = 1;
