/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : ikm_kelurahan

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 05/12/2020 12:32:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jawaban
-- ----------------------------
DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE `jawaban`  (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jawaban2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jawaban3` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jawaban4` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_soal` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jawaban
-- ----------------------------

-- ----------------------------
-- Table structure for jawaban_user
-- ----------------------------
DROP TABLE IF EXISTS `jawaban_user`;
CREATE TABLE `jawaban_user`  (
  `id_jawaban_user` int(11) NOT NULL,
  `jawaban1` int(11) NULL DEFAULT NULL,
  `jawaban2` int(11) NULL DEFAULT NULL,
  `jawaban3` int(11) NULL DEFAULT NULL,
  `jawaban4` int(11) NULL DEFAULT NULL,
  `jawaban5` int(11) NULL DEFAULT NULL,
  `jawaban6` int(11) NULL DEFAULT NULL,
  `jawaban7` int(11) NULL DEFAULT NULL,
  `jawaban8` int(11) NULL DEFAULT NULL,
  `jawaban9` int(11) NULL DEFAULT NULL,
  `jawaban10` int(11) NULL DEFAULT NULL,
  `id_responden` int(11) NULL DEFAULT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_jawaban_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jawaban_user
-- ----------------------------

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `persyaratan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Mantap', '<p>Mantap</p>', 1);

-- ----------------------------
-- Table structure for responden
-- ----------------------------
DROP TABLE IF EXISTS `responden`;
CREATE TABLE `responden`  (
  `id_responden` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `umur` int(3) NULL DEFAULT NULL,
  `jenis_kelamin` tinyint(1) NULL DEFAULT NULL,
  `jenis_pendidikan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_responden`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of responden
-- ----------------------------

-- ----------------------------
-- Table structure for soal
-- ----------------------------
DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal`  (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_soal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of soal
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` enum('admin','kepala_lurah') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
