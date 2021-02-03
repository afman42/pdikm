/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - ikm_kelurahan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ikm_kelurahan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ikm_kelurahan`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `umur` int(2) DEFAULT NULL,
  `jenis_pendidikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`tgl_lahir`,`tempat_lahir`,`jenis_kelamin`,`pekerjaan`,`umur`,`jenis_pendidikan`) values 
(1,'2021-01-22','singkawang','Laki-Laki',NULL,NULL,NULL),
(3,'2021-01-21','sintang','Laki-Laki',NULL,NULL,NULL),
(4,'2021-01-21','pontianak','Laki-Laki','PNS',22,'SMA/SMK Kebawah');

/*Table structure for table `jawaban` */

DROP TABLE IF EXISTS `jawaban`;

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban1` varchar(20) DEFAULT NULL,
  `jawaban2` varchar(20) DEFAULT NULL,
  `jawaban3` varchar(20) DEFAULT NULL,
  `jawaban4` varchar(20) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `jawaban` */

insert  into `jawaban`(`id_jawaban`,`jawaban1`,`jawaban2`,`jawaban3`,`jawaban4`,`id_soal`) values 
(1,'sangat bagus','bagus','tidak bagus','sangat tidak bagus',1),
(2,'Bagus','Sangat Bagus','Tidak Bagus','Sangat Tidak Bagus',2),
(3,'1','2','3','4',3),
(4,'1','2','3','4',3),
(5,'1','2','3','4',3),
(6,'1','2','3','4',3),
(7,'1','2','3','4',3),
(8,'1','2','3','4',3);

/*Table structure for table `jawaban_user` */

DROP TABLE IF EXISTS `jawaban_user`;

CREATE TABLE `jawaban_user` (
  `id_jawaban_user` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban1` int(11) DEFAULT NULL,
  `jawaban2` int(11) DEFAULT NULL,
  `jawaban3` int(11) DEFAULT NULL,
  `jawaban4` int(11) DEFAULT NULL,
  `jawaban5` int(11) DEFAULT NULL,
  `jawaban6` int(11) DEFAULT NULL,
  `jawaban7` int(11) DEFAULT NULL,
  `jawaban8` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `id_masyarakat` char(4) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jawaban_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `jawaban_user` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `persyaratan` text DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`persyaratan`,`status`) values 
(1,'Mantap','<p>Mantap</p>',0),
(2,'Survei Jalan','<p>1. Penjelasan</p>',1);

/*Table structure for table `masyarakat` */

DROP TABLE IF EXISTS `masyarakat`;

CREATE TABLE `masyarakat` (
  `id_masyarakat` char(4) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `pendidikan` varchar(25) DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`id_masyarakat`,`tgl_lahir`,`nik`,`umur`,`jenis_kelamin`,`pendidikan`,`pekerjaan`,`nama`,`username`,`password`) values 
('M-01','2021-01-23','1234567',22,'Laki-laki','SMA','PNS',NULL,NULL,NULL),
('R-02','2021-01-25','61710425010001',12,'Laki-laki','D1-D3-D4','PNS','bangke','user','user'),
('M-03','2021-02-04','61122',21,'Laki-laki','SMA Kebawah','PNS','Arman','afif','afif');

/*Table structure for table `soal` */

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `soal` */

insert  into `soal`(`id_soal`,`soal`,`id_kategori`) values 
(1,'abc',1),
(2,'Surat Izin Tanah',1),
(3,'qwerty',1),
(4,'qwerty',1),
(5,'qwerty',1),
(6,'qwerty',1),
(7,'qwerty',1),
(8,'qwerty',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` enum('admin','kepala_lurah') DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id_user`,`nama`,`username`,`password`,`foto`,`level`) values 
(1,'admin','admin','admin','uploads/Screenshot_5.png','admin'),
(2,'lurah','lurah','123456',NULL,'kepala_lurah');

/*Table structure for table `v_graph` */

DROP TABLE IF EXISTS `v_graph`;

/*!50001 DROP VIEW IF EXISTS `v_graph` */;
/*!50001 DROP TABLE IF EXISTS `v_graph` */;

/*!50001 CREATE TABLE  `v_graph`(
 `id_jawaban_user` int(11) ,
 `jawaban1` int(11) ,
 `jawaban2` int(11) ,
 `jawaban3` int(11) ,
 `jawaban4` int(11) ,
 `jawaban5` int(11) ,
 `jawaban6` int(11) ,
 `jawaban7` int(11) ,
 `jawaban8` int(11) ,
 `komentar` text ,
 `id_masyarakat` char(4) ,
 `id_kategori` int(11) ,
 `tgl_lahir` date ,
 `nik` varchar(25) ,
 `umur` int(3) ,
 `jenis_kelamin` enum('Laki-laki','Perempuan') ,
 `pendidikan` varchar(25) ,
 `pekerjaan` varchar(25) ,
 `nama` varchar(30) ,
 `nama_kategori` varchar(255) ,
 `persyaratan` text ,
 `status` int(1) 
)*/;

/*View structure for view v_graph */

/*!50001 DROP TABLE IF EXISTS `v_graph` */;
/*!50001 DROP VIEW IF EXISTS `v_graph` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_graph` AS (select `jawaban_user`.`id_jawaban_user` AS `id_jawaban_user`,`jawaban_user`.`jawaban1` AS `jawaban1`,`jawaban_user`.`jawaban2` AS `jawaban2`,`jawaban_user`.`jawaban3` AS `jawaban3`,`jawaban_user`.`jawaban4` AS `jawaban4`,`jawaban_user`.`jawaban5` AS `jawaban5`,`jawaban_user`.`jawaban6` AS `jawaban6`,`jawaban_user`.`jawaban7` AS `jawaban7`,`jawaban_user`.`jawaban8` AS `jawaban8`,`jawaban_user`.`komentar` AS `komentar`,`jawaban_user`.`id_masyarakat` AS `id_masyarakat`,`jawaban_user`.`id_kategori` AS `id_kategori`,`masyarakat`.`tgl_lahir` AS `tgl_lahir`,`masyarakat`.`nik` AS `nik`,`masyarakat`.`umur` AS `umur`,`masyarakat`.`jenis_kelamin` AS `jenis_kelamin`,`masyarakat`.`pendidikan` AS `pendidikan`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`nama` AS `nama`,`kategori`.`nama_kategori` AS `nama_kategori`,`kategori`.`persyaratan` AS `persyaratan`,`kategori`.`status` AS `status` from ((`jawaban_user` join `masyarakat` on(`jawaban_user`.`id_masyarakat` = `masyarakat`.`id_masyarakat`)) join `kategori` on(`kategori`.`id_kategori` = `jawaban_user`.`id_kategori`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
