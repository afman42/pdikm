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

 Date: 03/02/2021 09:08:48
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
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, '2021-01-22', 'singkawang', 'Laki-Laki', NULL, 21, NULL);
INSERT INTO `admin` VALUES (2, '2021-01-21', 'sintang', 'Laki-Laki', NULL, 22, NULL);
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
  `komentar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_masyarakat` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_jawaban_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jawaban_user
-- ----------------------------
INSERT INTO `jawaban_user` VALUES (18, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'mantap', 'M-01', 1, '2021-02-03');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `persyaratan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(1) NULL DEFAULT 0,
  `id_admin` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Mantap', '<p>Mantap</p>', 0, 1);
INSERT INTO `kategori` VALUES (2, 'Survei Jalan', '<p>1. Penjelasan</p>', 1, 1);

-- ----------------------------
-- Table structure for masyarakat
-- ----------------------------
DROP TABLE IF EXISTS `masyarakat`;
CREATE TABLE `masyarakat`  (
  `id_masyarakat` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `umur` int(3) NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidikan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_ktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of masyarakat
-- ----------------------------
INSERT INTO `masyarakat` VALUES ('M-01', '2021-02-10', '1235566', 21, 'Laki-laki', 'SMA/SMK Ke bawah', 'PNS', 'Afif', 'afif', 'afif', NULL);
INSERT INTO `masyarakat` VALUES ('M-02', '2021-02-03', '14444', 22, 'Laki-laki', 'SMA/SMK Ke bawah', 'PNS', 'Armandos', 'armand', 'arman', 'uploads/icon2.png');

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
  `id_admin` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin', 'admin', 'uploads/Screenshot_5.png', 'admin', 1);
INSERT INTO `users` VALUES (2, 'lurah', 'lurah', '123456', NULL, 'kepala_lurah', 2);

-- ----------------------------
-- View structure for v_graph
-- ----------------------------
DROP VIEW IF EXISTS `v_graph`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_graph` AS (select `jawaban_user`.`id_jawaban_user` AS `id_jawaban_user`,`jawaban_user`.`jawaban1` AS `jawaban1`,`jawaban_user`.`jawaban2` AS `jawaban2`,`jawaban_user`.`jawaban3` AS `jawaban3`,`jawaban_user`.`jawaban4` AS `jawaban4`,`jawaban_user`.`jawaban5` AS `jawaban5`,`jawaban_user`.`jawaban6` AS `jawaban6`,`jawaban_user`.`jawaban7` AS `jawaban7`,`jawaban_user`.`jawaban8` AS `jawaban8`,`jawaban_user`.`komentar` AS `komentar`,`jawaban_user`.`id_masyarakat` AS `id_masyarakat`,`jawaban_user`.`id_kategori` AS `id_kategori`,`masyarakat`.`tgl_lahir` AS `tgl_lahir`,`masyarakat`.`nik` AS `nik`,`masyarakat`.`umur` AS `umur`,`masyarakat`.`jenis_kelamin` AS `jenis_kelamin`,`masyarakat`.`pendidikan` AS `pendidikan`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`nama` AS `nama`,`kategori`.`nama_kategori` AS `nama_kategori`,`kategori`.`persyaratan` AS `persyaratan`,`kategori`.`status` AS `status` from ((`jawaban_user` join `masyarakat` on(`jawaban_user`.`id_masyarakat` = `masyarakat`.`id_masyarakat`)) join `kategori` on(`kategori`.`id_kategori` = `jawaban_user`.`id_kategori`))) ;

SET FOREIGN_KEY_CHECKS = 1;
