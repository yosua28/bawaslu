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

insert  into `kategori`(`id`,`kategori`,`is_upload`,`urutan`,`is_active`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_delete`) values (1,'berita',0,1,1,'2019-12-07 04:32:22',1,NULL,NULL,0),(2,'publikasi',0,2,1,NULL,NULL,NULL,NULL,0),(3,'pengawasan',1,3,1,NULL,NULL,NULL,NULL,0),(4,'putusan',1,4,1,NULL,NULL,NULL,NULL,0),(5,'pengumuman',1,5,1,NULL,NULL,NULL,NULL,0),(6,'siaran-pers',1,6,1,NULL,NULL,NULL,NULL,0),(7,'bawaslu-memanggil',1,7,0,NULL,NULL,NULL,NULL,0),(8,'bawaslu-mendengar',1,8,0,NULL,NULL,NULL,NULL,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `konten` */

insert  into `konten`(`id`,`id_kategori`,`judul`,`link`,`isi_konten`,`foto_thumbnail`,`file_pendukung`,`is_active`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_delete`,`dibaca`,`is_timeline`) values (21,1,'Di Komnas HAM, Bagja Sampaikan Prinsip Pelaksananaan Mediasi Bawaslu','1576187571-di-komnas-ham-bagja-sampaikan-prinsip-pelaksananaan-mediasi-bawaslu','<p>Ditulis oleh&nbsp;Rama Agusta&nbsp;pada Kamis, 12 Desember 2019 - 20:31 WIB</p>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\"><img alt=\"\" src=\"https://www.bawaslu.go.id/sites/default/files/styles/gambar_berita_besar/public/foto_berita/IMG-20191212-WA0023.jpg?itok=wGGahqp6\" style=\"float:left; height:auto; margin:0px 15px 5px 0px\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\">Koordinator Divisi Penyelesaian Sengketa Bawaslu Rahmat Bagja saat menjadi pembicara seminar yang diadakan Komnas HAM di Jakarta, Kamis 12 Desember 2019/Foto: Rama Agusta</div>\r\n</div>\r\n</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<div style=\"background:transparent; border:0px; padding:0px\">\r\n<p>Jakarta, Badan Pengawas Pemilihan Umum - Di depan peserta seminar yang diadakan Komisi Nasional Hak Asasi Manusia (Komnas HAM), Koordinator Divisi Penyelesaian Sengketa Bawaslu Rahmat Bagja menyampaikan prinsip pelaksanaan penyelesaian sengketa proses pemilu melalui mediasi.</p>\r\n\r\n<p>Bagja mengatakan, proses penyelesaian sengketa pemilu diatur dalam Pasal 466 UU Nomor 7 Tahun 2017 Tentang Pemilihan Umum. Menurutnya, yang menjadi objek mediasi adalah surat keputusan (SK) dan berita acara (BA) yang dikeluarkan KPU.</p>\r\n\r\n<p>Dia menjelaskan, BA dapat dijadikan objek mediasi karena pada tahapan Pemilu 2019 lalu, KPU melalui BA pernah tidak meloloskan Partai Bulan Bintang dikarenakan dianggap tidak memenuhi syarat (TMS) akibat keanggotaan kepengurusan kabupaten/kota tak memenuhi syarat 75% sesuai Peraturan KPU Nomor 11 Tahun 2017.</p>\r\n\r\n<p>&quot;Sebenarnya di UU objeknya hanya SK. Namun karena KPU pernah menjadikan BA sebagai dasar keputusan, maka BA juga kami jadikan objek sengketa,&quot; sebutnya di Jakarta, Kamis (12/12/2019).</p>\r\n\r\n<p>Bagja menambahkan, mediasi bersifat tertutup karena hanya dihadiri oleh pemohon, termohon, dan mediator. Selain itu sifatnya rahasia karena segala pernyataan dalam bentuk lisan dan tulisan dalam proses mediasi tidak boleh diungkap ke publik. Hal ini sekaligus menjadi alat bukti dalam proses pembuktian pada sidang ajudikasi.</p>\r\n\r\n<p>Kemudian dalam mediasi, lanjutnya, mediator hanya memfasilitasi proses mediasi dan tidak bertindak layaknya seorang hakim atau juri yang memutuskan salah atau benar terhadap pernyataan para pihak atau mendukung pendapat dari salah satu pihak. Bagja memastikan mefiator pun tidak memaksakan pendapat dan penyelesaian kepada para pihak.</p>\r\n\r\n<p>&quot;Itulah salah satu prinsip pelaksanaan mediasi sengketa proses pemilu,&quot; ungkap dia.</p>\r\n\r\n<p>Sementara itu mantan Wakil Presiden Jusuf Kala menilai, seorang mediator harus orang yang independen dan menguasai masalah yang menjadi objek sengketa.</p>\r\n\r\n<p>&quot;Ada prinsip netralitas dalam diri mediator namun tetap harus memahami masalah,&quot; tuturnya.</p>\r\n\r\n<p>Editor: Ranap THS</p>\r\n</div>\r\n</div>\r\n</div>\r\n','/assets/uploads/foto_thumbnail/1576187571_image_2019-12-03_15-02-11.png','/assets/uploads/file_pendukung/1576187571_DT.012-Cuti Bersama Natal 2019 (1).pdf',1,'2019-12-12 22:52:51',1,'2019-12-13 05:42:52',1,1,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nama`,`email`,`no_hp`,`alamat`,`role`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_active`,`is_delete`) values (1,'superadmin','$2y$10$6j7XQbwk38kLJJDIAZBYReX/FvLS0FgdcK9tmWfoC2WwrMenF1igi','Superadmin','su@gmail.com','0817676868','Solo','superadmin','2019-12-07 04:30:26',1,NULL,NULL,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
