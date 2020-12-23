/*
 Navicat Premium Data Transfer

 Source Server         : localhot
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : ikm_kelurahan

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 23/12/2020 07:05:09
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban
-- ----------------------------
INSERT INTO `jawaban` VALUES (1, 'sangat bagus', 'bagus', 'tidak bagus', 'sangat tidak bagus', 1);
INSERT INTO `jawaban` VALUES (2, 'Bagus', 'Sangat Bagus', 'Tidak Bagus', 'Sangat Tidak Bagus', 2);

-- ----------------------------
-- Table structure for jawaban_user
-- ----------------------------
DROP TABLE IF EXISTS `jawaban_user`;
CREATE TABLE `jawaban_user`  (
  `id_jawaban_user` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban1` int(11) NULL DEFAULT NULL,
  `jawaban2` int(11) NULL DEFAULT NULL,
  `jawaban3` int(11) NULL DEFAULT NULL,
  `jawaban4` int(11) NULL DEFAULT NULL,
  `jawaban5` int(11) NULL DEFAULT NULL,
  `jawaban6` int(11) NULL DEFAULT NULL,
  `jawaban7` int(11) NULL DEFAULT NULL,
  `jawaban8` int(11) NULL DEFAULT NULL,
  `id_responden` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_jawaban_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban_user
-- ----------------------------
INSERT INTO `jawaban_user` VALUES (3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R-01', 'mantap');
INSERT INTO `jawaban_user` VALUES (4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R-02', 'Bagus');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Mantap', '<p>Mantap</p>', 0);
INSERT INTO `kategori` VALUES (2, 'Survei Jalan', '<p>1. Penjelasan</p>', 1);

-- ----------------------------
-- Table structure for responden
-- ----------------------------
DROP TABLE IF EXISTS `responden`;
CREATE TABLE `responden`  (
  `id_responden` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `umur` int(3) NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_pendidikan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of responden
-- ----------------------------
INSERT INTO `responden` VALUES ('R-01', '2020-12-21', 'Armandos', '12345678', 21, 'Laki-laki', 'SMA Kebawah', 'PNS', 1);
INSERT INTO `responden` VALUES ('R-02', '2020-12-22', 'Arman', '1912314', 22, 'Laki-laki', 'SMA Kebawah', 'PNS', 1);

-- ----------------------------
-- Table structure for soal
-- ----------------------------
DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal`  (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_soal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of soal
-- ----------------------------
INSERT INTO `soal` VALUES (1, 'abc', 1);
INSERT INTO `soal` VALUES (2, 'Surat Izin Tanah', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` enum('admin','kepala_lurah') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin', 'admin', 'uploads/Screenshot_5.png', 'admin');
INSERT INTO `users` VALUES (2, 'lurah', 'lurah', '123456', NULL, 'kepala_lurah');

SET FOREIGN_KEY_CHECKS = 1;
