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

 Date: 23/01/2021 22:19:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int(11) NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `umur` int(2) NULL DEFAULT NULL,
  `jenis_pendidikan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, '2021-01-22', 'singkawang', 'Laki-Laki', NULL, NULL, NULL);
INSERT INTO `admin` VALUES (3, '2021-01-21', 'sintang', 'Laki-Laki', NULL, NULL, NULL);
INSERT INTO `admin` VALUES (4, '2021-01-21', 'pontianak', 'Laki-Laki', 'PNS', 22, 'SMA/SMK Kebawah');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban
-- ----------------------------
INSERT INTO `jawaban` VALUES (1, 'Baik', 'Sangat Baik', 'Tidak Baik', 'sangat tidak bagus', 17);

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
  `id_masyarakat` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_jawaban_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban_user
-- ----------------------------
INSERT INTO `jawaban_user` VALUES (1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'M-01', 'bagus', 3);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NULL DEFAULT NULL,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `persyaratan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (3, 1, 'ABC', '<p>ABC</p>', 0);
INSERT INTO `kategori` VALUES (4, 3, 'ABC', '<p>CDE</p>', 0);

-- ----------------------------
-- Table structure for masyarakat
-- ----------------------------
DROP TABLE IF EXISTS `masyarakat`;
CREATE TABLE `masyarakat`  (
  `id_masyarakat` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `umur` int(3) NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_pendidikan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_ktp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of masyarakat
-- ----------------------------
INSERT INTO `masyarakat` VALUES ('M-01', '2021-01-23', '1234567', 22, 'Laki-laki', 'SMA', 'PNS', NULL);

-- ----------------------------
-- Table structure for soal
-- ----------------------------
DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal`  (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_soal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of soal
-- ----------------------------
INSERT INTO `soal` VALUES (1, 'abc', 1);
INSERT INTO `soal` VALUES (2, 'Surat Izin Tanah', 1);
INSERT INTO `soal` VALUES (3, 'qwerty', 1);
INSERT INTO `soal` VALUES (4, 'qwerty', 1);
INSERT INTO `soal` VALUES (5, 'qwerty', 1);
INSERT INTO `soal` VALUES (6, 'qwerty', 1);
INSERT INTO `soal` VALUES (7, 'qwerty', 1);
INSERT INTO `soal` VALUES (8, 'qwerty', 1);
INSERT INTO `soal` VALUES (9, 'Apakah ini Survei bagus', 2);
INSERT INTO `soal` VALUES (10, 'Apakah ini bagus juga ?', 2);
INSERT INTO `soal` VALUES (11, 'Sebutkan dua macam warna ?', 2);
INSERT INTO `soal` VALUES (12, 'Diisi juga minimal 8', 2);
INSERT INTO `soal` VALUES (13, 'horeka', 2);
INSERT INTO `soal` VALUES (14, 'hoaks', 2);
INSERT INTO `soal` VALUES (15, 'apakah ini hoaks', 2);
INSERT INTO `soal` VALUES (16, 'Awokwkwkw', 2);
INSERT INTO `soal` VALUES (17, 'ABC', 3);

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
  `level` enum('admin','kepala_lurah','masyarakat','admin_root') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_masyarakat` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin', 'admin', 'uploads/Screenshot_5.png', 'admin_root', NULL, 1);
INSERT INTO `users` VALUES (2, 'lurah', 'lurah', '123456', NULL, 'kepala_lurah', NULL, 2);
INSERT INTO `users` VALUES (3, 'admin kedua', 'admin_kedua', 'admin', NULL, 'admin', NULL, 3);
INSERT INTO `users` VALUES (6, 'afif', 'afif', 'admin123', 'uploads/bank1.jpg', 'admin', NULL, 4);
INSERT INTO `users` VALUES (8, 'afman', 'afman', 'afman', NULL, 'masyarakat', 'M-01', NULL);

-- ----------------------------
-- View structure for v_hasil
-- ----------------------------
DROP VIEW IF EXISTS `v_hasil`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_hasil` AS (select `jawaban_user`.`id_jawaban_user` AS `id_jawaban_user`,`jawaban_user`.`jawaban1` AS `jawaban1`,`jawaban_user`.`jawaban2` AS `jawaban2`,`jawaban_user`.`jawaban3` AS `jawaban3`,`jawaban_user`.`jawaban4` AS `jawaban4`,`jawaban_user`.`jawaban5` AS `jawaban5`,`jawaban_user`.`jawaban6` AS `jawaban6`,`jawaban_user`.`jawaban7` AS `jawaban7`,`jawaban_user`.`jawaban8` AS `jawaban8`,`jawaban_user`.`id_responden` AS `id_responden`,`kategori`.`nama_kategori` AS `nama_kategori`,`kategori`.`id_kategori` AS `id_kategori` from ((`responden` join `jawaban_user` on(`responden`.`id_responden` = `jawaban_user`.`id_responden`)) join `kategori` on(`responden`.`id_kategori` = `kategori`.`id_kategori`))) ;

SET FOREIGN_KEY_CHECKS = 1;
