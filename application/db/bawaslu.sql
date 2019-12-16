/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.38-MariaDB : Database - bawaslu
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bawaslu` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bawaslu`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` text,
  `tempat` text,
  `penjelasn_kegiatan` text,
  `file_pendukung` text,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `dibaca` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text,
  `link` text,
  `foto` text COMMENT 'path foto',
  `keterangan_foto` text,
  `dibaca` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `galeri` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `is_upload` int(11) DEFAULT '0',
  `urutan` int(11) DEFAULT NULL COMMENT 'rencana untuk mengurutkan di list',
  `is_active` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`kategori`,`nama`,`is_upload`,`urutan`,`is_active`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_delete`) values (1,'ppid','PPID',1,1,1,'2019-12-07 04:32:22',1,NULL,NULL,0),(2,'publikasi','Publikasi',1,2,1,NULL,NULL,NULL,NULL,0),(3,'pengawasan','Pengawasan',1,3,1,NULL,NULL,NULL,NULL,0),(4,'putusan','Putusan',1,4,1,NULL,NULL,NULL,NULL,0),(5,'pengumuman','Pengumuman',1,5,1,NULL,NULL,NULL,NULL,0),(6,'seleksi-jpt-pratama','Seleksi JPT Pratama',1,6,1,NULL,NULL,NULL,NULL,0);

/*Table structure for table `konten` */

DROP TABLE IF EXISTS `konten`;

CREATE TABLE `konten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL COMMENT 'id kategori',
  `judul` text,
  `link` text,
  `isi_konten` longtext,
  `foto_thumbnail` text COMMENT 'path foto untuk thumbnail',
  `file_pendukung` text COMMENT 'file pendukung',
  `is_active` int(11) DEFAULT '0' COMMENT '1 muncul didepan, 0 tidak muncul didepan',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'id user',
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL COMMENT 'id user',
  `is_delete` int(11) DEFAULT '0' COMMENT 'soft delete',
  `dibaca` int(11) DEFAULT '0',
  `is_timeline` int(11) DEFAULT NULL COMMENT 'muncul di slideshow baranda',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `konten` */

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isi` mediumtext,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `profil` */

insert  into `profil`(`id`,`kategori`,`nama`,`isi`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'wewenang-kewajiban','Tugas, Wewenang, dan Kewajiban',NULL,'2019-12-16 06:40:44',1,NULL,NULL),(2,'visi-misi','Visi dan Misi',NULL,'2019-12-16 06:40:44',1,NULL,NULL),(3,'lokasi','Alamat Kantor',NULL,NULL,NULL,NULL,NULL),(4,'struktur-organisasi','Struktur Organisasi',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` text,
  `role` enum('superadmin','admin') DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'id user',
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL COMMENT 'id user',
  `is_active` int(11) DEFAULT '0',
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nama`,`email`,`no_hp`,`alamat`,`role`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_active`,`is_delete`) values (1,'superadmin','$2y$10$6j7XQbwk38kLJJDIAZBYReX/FvLS0FgdcK9tmWfoC2WwrMenF1igi','Superadmin','su@gmail.com','0817676868','Solo','superadmin','2019-12-07 04:30:26',1,NULL,NULL,1,0),(6,'admin','$2y$10$wwbdVx1K8L2wPF9xEuM98.uPNxsJBR./vXJQ8XKjGcHi3gANviYGu','Admin Pemulu','bbb@mmmm.nn','123456789','rrrrrrrrrrrrrrrrr','admin','2019-12-15 20:16:38',1,'2019-12-15 23:57:03',1,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
